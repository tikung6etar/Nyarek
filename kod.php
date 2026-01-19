<?php
$url = "https://github.com/kalcaddle/KodExplorer/archive/refs/heads/master.zip";
$zipFile = "master.zip"; 

echo "Sedang mencoba download dari GitHub...<br>";

$fp = fopen($zipFile, 'w+');
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
curl_setopt($ch, CURLOPT_FILE, $fp); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Matikan cek SSL (PENTING!)
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0'); // Nyamar jadi browser

$exec = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
fclose($fp);

if ($exec && $info['http_code'] == 200) {
    echo "<b>SUKSES BROK!</b> File $zipFile berhasil ditarik.<br>";
    echo "Ukuran: " . filesize($zipFile) . " bytes.";
} else {
    echo "<b>GAGAL!</b> Cek permission folder atau koneksi server.<br>";
    echo "Error Info: " . print_r($info, true);
}
?>
