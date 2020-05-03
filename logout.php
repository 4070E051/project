<?php
session_start();
unset($_SESSION['username']);
echo "<meta http-equiv=REFRESH CONTENT=1;url=index.php>";
?>