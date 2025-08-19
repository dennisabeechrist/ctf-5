<?php
if (!isset($_COOKIE['session'])) {
    header("Location: index.php");
    exit;
}

$session_id = $_COOKIE['session'];

// Super insecure check
if ($session_id == 1) {
    // Admin mode
    $flag = file_get_contents("flag.txt");
    $message = "Welcome back, <b>admin</b>! 🎉<br><br>FLAG: " . $flag;
} else {
    $message = "Hello, user #$session_id<br><br>Sorry, you are not admin.";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { background:#0d0d0d; color:#00ff99; font-family: monospace; text-align:center; }
        .box { margin-top:100px; padding:20px; border:1px solid #00ff99; display:inline-block; }
        a { color:#00ff99; text-decoration:none; }
    </style>
</head>
<body>
    <div class="box">
        <h1>💻 Dashboard</h1>
        <p><?php echo $message; ?></p>
        <br>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
