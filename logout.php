<?php
session_start();
session_destroy();
setcookie("userid", "", time() - 3600);
header("Location: index.php");


?>