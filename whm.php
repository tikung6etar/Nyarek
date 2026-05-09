<?php
session_start();

function call_whm_api($domain, $username, $apitoken, $endpoint, $data = [])
{
    $url = "https://{$domain}:2087/json-api/{$endpoint}?api.version=1";

    $headers = [
        "Authorization: whm {$username}:{$apitoken}"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if (!empty($data)) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    }
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "cURL Error: " . curl_error($ch);
        curl_close($ch);
        exit();
    }

    curl_close($ch);
    return json_decode($response, true);
}

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $_SESSION['domain'] = $_POST['domain'];
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['apitoken'] = $_POST['apitoken'];
    header("Location: whm.php");
    exit();
}

// Proses logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: whm.php");
    exit();
}

// Jika belum login, tampilkan form login
if (!isset($_SESSION['domain'], $_SESSION['username'], $_SESSION['apitoken'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login to WHM</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f1f5f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            form {
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                width: 350px;
            }
            input, button {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1px solid #ddd;
                border-radius: 4px;
            }
            button {
                background: #007bff;
                color: white;
                border: none;
                cursor: pointer;
                font-weight: bold;
            }
            button:hover {
                background: #0056b3;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }
        </style>
    </head>
    <body>
        <form method="post" action="">
            <h2>Login to WHM</h2>
            <input type="text" name="domain" placeholder="Domain" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="apitoken" placeholder="API Token" required>
            <button type="submit" name="login">Login</button>
        </form>
    </body>
    </html>
    <?php
    exit();
}

// Ambil parameter pagination
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 20;
$startIndex = ($page - 1) * $perPage;

$domain = $_SESSION['domain'];
$username = $_SESSION['username'];
$apitoken = $_SESSION['apitoken'];

// Ambil daftar akun dari WHM
$accounts = call_whm_api($domain, $username, $apitoken, 'listaccts');
$totalAccounts = !empty($accounts['data']['acct']) ? count($accounts['data']['acct']) : 0;
$totalPages = ceil($totalAccounts / $perPage);

// Fitur Create User Session
if (isset($_POST['create_session'])) {
    $user = $_POST['user']; // Username cPanel
    $domain = $_SESSION['domain'];
    $whmUsername = $_SESSION['username'];
    $apiToken = $_SESSION['apitoken'];

    $response = call_whm_api($domain, $whmUsername, $apiToken, 'create_user_session', [
        'user' => $user,
        'service' => 'cpaneld' // Ubah ke 'cpaneld'
    ]);

    if (isset($response['data']['url'])) {
        $sessionUrl = $response['data']['url'];
        echo "<p>Sesi berhasil dibuat! <a href='{$sessionUrl}' target='_blank'>Klik di sini untuk membuka cPanel</a></p>";
    } else {
        echo "<p>Gagal membuat sesi: " . htmlspecialchars(json_encode($response)) . "</p>";
    }
}

// Ambil data akun untuk halaman saat ini
$paginatedAccounts = array_slice($accounts['data']['acct'], $startIndex, $perPage);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WHM Management</title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f9f9f9;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
        }
        a.logout {
            display: inline-block;
            margin-bottom: 20px;
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a.logout:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>WHM Management</h1>
        <a href="?logout=true" class="logout">Logout</a>
        <form method="post" action="">
            <h3>Create User Session</h3>
            <input type="text" name="user" placeholder="cPanel Username" required style="padding: 10px; width: 100%; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px;">
            <button type="submit" name="create_session" style="padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer;">Create Session</button>
        </form>

        <h2>Account List</h2>
        <table id="accountsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Domain</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Owner</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($accounts['data']['acct'])): ?>
                    <?php foreach ($accounts['data']['acct'] as $account): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($account['domain']); ?></td>
                            <td><?php echo htmlspecialchars($account['user']); ?></td>
                            <td><?php echo htmlspecialchars($account['email']); ?></td>
                            <td><?php echo htmlspecialchars($account['owner']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No accounts found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Include jQuery and DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#accountsTable').DataTable({
                "pageLength": 20,
                "searching": true,
                "lengthChange": false
            });
        });
    </script>
</body>
</html>