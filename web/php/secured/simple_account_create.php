<?php

ob_start();

session_start();

$options = [
    'cost' => 12,
];

$username = $_POST["username"];
$password = $_POST["password"];

$userlist = explode("\n",file_get_contents('../../../backend/secure_accounts.txt'));
$newuserlist = [];
foreach ($userlist as $user) {
  $tempuser = explode("+++++",$user);
  echo (password_verify($username, $tempuser[0]));
  if (password_verify($username, $tempuser[0])) {
    die;
  }
  if (strlen($user) > 10) {
    $newuserlist[] = $tempuser;
  }
}

$newuserlist[] = [password_hash($username, PASSWORD_BCRYPT, $options), password_hash($password, PASSWORD_BCRYPT, $options)];

$stroutlist = "";
foreach($newuserlist as $finaluser) {
  $stroutlist .= $finaluser[0]."+++++".$finaluser[1]."\n";
}
file_put_contents("../../../backend/secure_accounts.txt", $stroutlist);

  echo "<br>";

header('Location: '.$_SERVER['HTTP_REFERER']);
?>
