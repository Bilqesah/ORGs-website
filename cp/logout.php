<?php
if (!isset($_SESSION)) session_start();
unset($_SESSION['username']);
header("location:log.php");
?>