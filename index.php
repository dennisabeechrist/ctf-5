<?php
// Simple login form (no password check to keep it easy)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];

    // Assign session id = just a number (very insecure!)
    if ($username === "admin") {
        $session_id = 1; // hardcoded for admin
    } else {
        $session_id = rand(1000, 9999); // normal users get random IDs
    }

    // Set cookie
    setcookie("session", $session_id, time()+3600, "/");
    header("Location: dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Fixer Login</title>
    <style>
        body { background:#0d0d0d; color:#00ff99; font-family: monospace; text-align:center; }
        .box { margin-top:100px; padding:20px; border:1px solid #00ff99; display:inline-block; }
        input { margin:5px; padding:5px; background:#1a1a1a; border:1px solid #00ff99; color:#00ff99; }
        button { padding:5px 15px; background:#00ff99; color:black; border:none; cursor:pointer; }
    </style>
</head>
<body>
    <div class="box">
        <h1>🔐 Session Fixer</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Enter username" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
