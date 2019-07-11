<?php
set_time_limit(0);
error_reporting(0);
$list<?php
set_time_limit(0);
error_reporting(0);
$list['bar.txt'] =;
function template() {
echo '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta **********="Content-Type" *********"text/html; charset=utf-8" />
<title>Nyari admin</title>

<style type="text/css">

h1.technique-two {
        width: 795px; height: 120px;
        background: url(http://x0rg.org/styles/blackbox_red/imageset/site_logo.gif) no-repeat top center;
        margin: 0 auto;
}
body{
    background: #070707;
    margin: 0;
    padding: 0;
    padding-top: 10px;
    color: red;
    font-family: Sancreek;
    font-size: 13px;
}
a{
    color: #FFF;
    text-decoration: none;
    font-weight: bold;
}
.wrapper{
    width: 1000px;
    margin: 0 auto;
}
.tube{
    padding: 10px;
}
.red{
    width: 998px;
    border: 2px dashed grey;
    background: #191919;
    color: red;
}
.red input{
    background: transparent;
    border: 2px inset grey;
   height: 30px;
   width: 200px
    font-color: red;
    color: red;
}
.blue{
    float: left;
    width: 1000px;
    border: 2px dashed grey;
    background: #191919;
    color: skyblue;
}
.green{
    float: left;
    width: 1000px;
    border: 2px dashed grey ;
    background: #191919;
    color: red;
}
</style>
<script type="text/javascript">
<!--
function insertcode($text, $place, $replace)
{
    var $this = $text;
    var logbox = document.getElementById($place);
    if($replace == 0)
        document.getElementById($place).innerHTML = logbox.innerHTML+$this;
    else
        document.getElementById($place).innerHTML = $this;
//document.getElementById("helpbox").innerHTML = $this;
}
-->
</script>
</head>
<body>
<br />
<p align="center">
<font style="text-align:center;color:skyblue;font-family:Cardo;font-size:50px; text-shadow:0px 0px 5px blue;">=>habang login<=</font>
</p>
<h1 class="technique-two">
       


</h1>

<div class="wrapper">
<div class="red">
<div class="tube">
<form action="" method="post" name="xploit_form">
URL:<br /><input type="text" name="xploit_url" value="'.$_POST['xploit_url'].'" style="width: 50%;" />
<input type="submit" name="xploit_submit" value="hajar" align="right" />
<input type="hidden" name="xploit_404string" value="'.$_POST['xploit_404string'].'" style="width: 50%;" /><br />
<span style="float: right;"></span>
</form>
<br />
</div> <!-- /tube -->
</div> <!-- /red -->
<div class="green">
<div class="tube" id="rightcol">
Verificat: <span id="verified">0</span> / <span id="total">0</span><br />
kimcil yang di temukan:<br />
</div> <!-- /tube -->
</div> <!-- /green -->
<br clear="all" /><br />
<div class="red">
<div class="tube" id="logbox">
tempet login by akbar <br /><br />
</div> <!-- /tube -->
</div> <!-- /red -->
</div> <!-- /wrapper -->
<br clear="all">';
}
function show($msg, $br=1, $stop=0, $place='logbox', $replace=0) {
    if($br == 1) $msg .= "<br />";
    echo "<script type=\"text/javascript\">insertcode('".$msg."', '".$place."', '".$replace."');</script>";
    if($stop == 1) exit;
    @flush();@ob_flush();
}
function check($x, $front=0) {
    global $_POST,$site,$false;
    if($front == 0) $t = $site.$x;
    else $t = 'http://'.$x.'.'.$site.'/';
    $headers = get_headers($t);
    if (!eregi('200', $headers[0])) return 0;
    $data = @file_get_contents($t);
    if($_POST['xploit_404string'] == "") if($data == $false) return 0;
    if($_POST['xploit_404string'] != "") if(strpos($data, $_POST['xploit_404string'])) return 0;
    return 1;
}
   
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
template();
if(!isset($_POST['xploit_url'])) die;
if($_POST['xploit_url'] == '') die;
$site = $_POST['xploit_url'];
if ($site[strlen($site)-1] != "/") $site .= "/";
if($_POST['xploit_404string'] == "") $false = @file_get_contents($site."d65897f5380a21a42db94b3927b823d56ee1099a-this_can-t_exist.html");
$list['end'] = str_replace("\r", "", $list['end']);
$list['front'] = str_replace("\r", "", $list['front']);
$pathes = explode("\n", $list['end']);
$frontpathes = explode("\n", $list['front']);
show(count($pathes)+count($frontpathes), 1, 0, 'total', 1);
$verificate = 0;
foreach($pathes as $path) {
    show('Checking '.$site.$path.' : ', 0, 0, 'logbox', 0);
    $verificate++; show($verificate, 0, 0, 'verified', 1);
    if(check($path) == 0) show('not found', 1, 0, 'logbox', 0);
    else{
        show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
        show('<a href="'.$site.$path.'">'.$site.$path.'</a>', 1, 0, 'rightcol', 0);
    }
}
preg_match("/\/\/(.*?)\//i", $site, $xx); $site = $xx[1];
if(substr($site, 0, 3) == "www") $site = substr($site, 4);
foreach($frontpathes as $frontpath) {
    show('Checking http://'.$frontpath.'.'.$site.'/ : ', 0, 0, 'logbox', 0);
    $verificate++; show($verificate, 0, 0, 'verified', 1);
    if(check($frontpath, 1) == 0) show('not found', 1, 0, 'logbox', 0);
    else{
        show('<span style="color: #00FF00;"><strong>found</strong></span>', 1, 0, 'logbox', 0);
        show('<a href="http://'.$frontpath.'.'.$site.'/">'.$frontpath.'.'.$site.'</a>', 1, 0, 'rightcol', 0);
    }
   
}
?>
