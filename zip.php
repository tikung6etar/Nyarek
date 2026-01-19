<?php
$currentDir = __DIR__;

$zipFiles = glob($currentDir . DIRECTORY_SEPARATOR . "*.zip");
if (empty($zipFiles)) {
    die("Tidak ada file .zip ditemukan di folder: " . $currentDir);
}

$zipFilePath = $zipFiles[0];
$destinationPath = $currentDir;

if (!file_exists($zipFilePath)) {
    die("File ZIP tidak ditemukan: " . $zipFilePath);
}

if (!is_dir($destinationPath)) {
    if (!mkdir($destinationPath, 0755, true)) {
        die("Gagal membuat direktori tujuan: " . $destinationPath);
    }
}

$zip = new ZipArchive();
if ($zip->open($zipFilePath) === TRUE) {
    if ($zip->extractTo($destinationPath)) {
        echo "Berhasil diekstrak ke: " . $destinationPath;
    } else {
        echo "Gagal mengekstrak file ZIP.";
    }
    $zip->close();
} else {
    echo "Gagal membuka file ZIP: " . $zipFilePath;
}
?>
