<?php
// Author Name : Bangka 6etar
// Information List : 2000 list
// contact here : BangkaXploiter@gmail.com
// Fb : http://facebook.com/AkbarUy
// greetz : Bangka 6etar

print "   
	
 _  _______ __  __    __   _____ _____  _    ____
| |/ / ____|  \/  |  / /_ | ____|_   _|/ \  |  _ \
| ' /|  _| | |\/| | | '_ \|  _|   | | / _ \ | |_) |
| . \| |___| |  | | | (_) | |___  | |/ ___ \|  _ <
|_|\_\_____|_|  |_|  \___/|_____| |_/_/   \_\_| \_\
                                                                                         
                Admin Finder - coded by Bangka 6etar
  Information list : 2000 list
  Thanks to  :Akbar Dravinky
";

echo "masukan site  : ";
$target = trim(fgets(STDIN));
$list = "bar_wordlist.txt";
if(!preg_match("/^http:\/\//",$target) AND !preg_match("/^https:\/\//",$target)){
	$targetnya = "http://$target";
}else{
	$targetnya = $target;
}

$buka = fopen("$list","r");
$ukuran = filesize("$list");
$baca = fread($buka,$ukuran);
$lists = explode("\r\n",$baca);

foreach($lists as $login){
	$log = "$targetnya/$login";
	$ch = curl_init("$log");
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_exec($ch);
	$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($httpcode == 200){
		 $handle = fopen("result.txt", "a+");
		fwrite($handle, "$log\n");
		print "\n\n [".date('H:m:s')."] Mencoba : $log => Ditemukan\n";
	}else{
		print "\n[".date('H:m:s')."] Mencoba : $log => tidak di temukan";
	}
}
  
?>
