<?php
setcookie("session", "", time()-3600, "/");
header("Location: index.php");
exit;
?>
