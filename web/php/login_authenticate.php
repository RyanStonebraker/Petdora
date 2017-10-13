<?php

// CAN DELETE, JUST FOR TESTING PURPOSES
ob_start();

$username = $_POST["username"];
$password = $_POST["password"];

$userPassHash = $username . $password;

$allowedusersRAW = file_get_contents('accounts.txt');
$allowedusers = explode("\n", $allowedusersRAW);

for ($i=0; $i < count($allowedusers); $i++) {
  if ($userPassHash == $allowedusers[$i]) {
    echo "Welcome ".$username."!";
    setcookie('PETDORA_USER_ACCOUNT', $username.",".$userPassHash, time() + 1200, '/');
  }
  echo "<br>";
}

header('Location: '.$_SERVER['HTTP_REFERER']);
?>
