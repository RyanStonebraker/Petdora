<?php
$username = $_POST["username"];
$password = $_POST["password"];

$userPassHash = $username+$password;

setcookie('PETDORA_USER_ACCOUNT', '$userPassHash', time() + 120, '/');
?>
