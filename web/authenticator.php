<?php
if ($_SESSION['user_logged'] == true && isset($_COOKIE["SECURED_COOKIE_PETDORA"])){
  // $storecookie = md5(uniqid('', true));
  // $cookiecache = explode("\n", file_get_contents('../backend/secure_cookies.txt'));
  //
  // $cache_verify = true;
  // foreach ($cookiecache as &$cookiename) {
  //   $tempcookie = explode("+++++", $cookiename);
  //   if ($tempcookie[0] == $_SESSION["user_name"]) {
  //     $tempcookie[1] = $storecookie;
  //     $newcookiecache[] = $tempcookie;
  //     $cache_verify = true;
  //   }
  // }
  //
  // $cookie_str = "";
  // foreach ($newcookiecache as $newcookie) {
  //   $cookie_str .= $newcookie[0]."+++++".$newcookie[1]."\n";
  // }
  // file_put_contents("../../../backend/secure_cookies.txt", $cookie_str);

  // if ($cache_verify == true) {
    echo '<script type="text/javascript">
    var sgnon = document.getElementById( \'sgn\' );
    sgnon.parentNode.removeChild( sgnon );
    var div = document.createElement("a");
    div.className = "signin";
    div.innerHTML = "TESTE";
    document.getElementById("nvsg").appendChild(div);
    $(".signin").append("TEST");
    </script>';
  // }
}

 ?>
