<?php
// Common approach is to just store a hashed/salted version of username
// w/ip-address to give appearance of persistent login, but then when the user
// tries to make a change, they are prompted to login again and then a
// non-persistent authenticated cookie is sent to the server.

// CAN DELETE, JUST FOR TESTING PURPOSES
ob_start();

session_start();

$username = $_POST["username"];
$password = $_POST["password"];

// stripslashes() and mysql_real_escape_string() can be used to prevent sql injections
// if this is hooked to a MySQL database

// phpinfo();

// Also, typically a database
$allowedusersRAW = file_get_contents('../../../backend/secure_accounts.txt');
$allowedusersCombo = explode("\n", $allowedusersRAW);

foreach ($allowedusersCombo as $userstring) {
  $allowedusers[] = explode("+++++", $userstring);
}

$options = [
    'cost' => 12,
];

foreach ($allowedusers as &$userpass) {
  if (password_verify($username, $userpass[0]) && password_verify($password, $userpass[1])) {
    echo "Welcome ".$username."!";

    // Check/update stored cookie
    $storecookie = md5(uniqid('', true));
    $cookiecache = explode("\n", file_get_contents('../../../backend/secure_cookies.txt'));

    $cache_updated = false;
    foreach ($cookiecache as &$cookiename) {
      $tempcookie = explode("+++++", $cookiename);
      if ($tempcookie[0] == $username) {
        $tempcookie[1] = $storecookie;
        $cache_updated = true;
      }
      $newcookiecache[] = $tempcookie;
    }

    if ($cache_update == false) {
      $newcookiecache[] = [$username, $storecookie];
    }
    $cookie_str = "";
    foreach ($newcookiecache as $newcookie) {
      $cookie_str .= $newcookie[0]."+++++".$newcookie[1]."\n";
    }
    file_put_contents("../../../backend/secure_cookies.txt", $cookie_str);
    // End Check/update

    $_SESSION['user_logged'] = true;
    $_SESSION['user_name'] = $username;

    setcookie('SECURED_COOKIE_PETDORA', $storecookie, time() + 12000, '/');

  }
}
echo '
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Ryan Stonebraker">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petdora | For all your fedora wearing pet needs.</title>
    <link rel="stylesheet" href="../../css/styles.css">
    <link rel="shortcut icon" href="../../img/icon.png" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.4/js.cookie.min.js"></script>
    <script type="text/javascript" src="../../js/onload_nav.js"></script>
    <script type = "text/javascript" src = "../../js/static_cms.js"></script>
  </head>
  <body>
    <header>
      <h1>Petdora</h1><img src = "../../img/logo.png" class = "logo"></img>
      <nav>
        <a href = "../..//index.html">Home</a>
        <a href = "./products.html">Products</a>
        <a href = "./game.html">Game</a>
        <a href = "./contact.html">Contact</a>
        <a class = "signin">Welcome '.$username.'!</a>
      </nav>
    </header>

    <section class = "center-wrap">
    </section>

    <footer>
      <h3>Ryan Stonebraker &copy; 2017 </h3>
    </footer>

    <script src="../../js/sign_on.js"></script>
    <script type = "text/javascript">
      var load_CMS = new static_cms_load("../../home_entries");
    </script>
  </body>
</html>

'

// header('Location: '.$_SERVER['HTTP_REFERER']);
?>
