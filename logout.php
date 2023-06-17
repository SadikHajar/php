<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "user_management");
$_SESSION = [];
session_unset();
session_destroy();
header("Location: login.php");
?>