<?php
session_start();
require '../config.php';

unset($_SESSION['logado']);
echo "<script>location.href='login.php';</script>";
exit;
?>