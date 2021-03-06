<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Ryan Stonebraker">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petdora | For all your fedora wearing pet needs.</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.1.4/js.cookie.min.js"></script>
    <script type="text/javascript" src="js/onload_nav.js"></script>
    <script type = "text/javascript" src = "js/static_cms.js"></script>
  </head>
  <body>
    <header>
      <h1>Petdora</h1><img src = "img/logo.png" class = "logo"></img>
      <nav id = "nvsg">
        <a href = "./index.html">Home</a>
        <a href = "./products.html">Products</a>
        <a href = "./game.html">Game</a>
        <a href = "./contact.html">Contact</a>
        <a class = "signin" id = "sgn">Sign In</a>
      </nav>
    </header>

    <section class = "center-wrap">
    </section>

    <footer>
      <h3>Ryan Stonebraker &copy; 2017 </h3>
    </footer>

    <script src="js/secured/secure_sign_on.js"></script>
    <script type = "text/javascript">
      var load_CMS = new static_cms_load("home_entries");
    </script>
    <?php include 'authenticator.php';?>
  </body>
</html>
