// $('article').append(\"testTSETSETSE\");
$(document).ready(function() {
  $(".signin").on("click", function() {
    $("body").prepend("\
    <div class = \"login_focus\">\
      <a class = \"login_disappear\">X</a>\
      <h2>Login</h2>\
      <form action = \"php/login_authenticate.php\" method=\"post\">\
        Username: <input type=\"text\" name = \"username\" placeholder=\"Username\"></textarea>\
        Password: <input type=\"password\" name = \"password\" placeholder=\"Password\"></textarea>\
        <input type=\"submit\" name = \"submitCreds\" value = \"Login\">\
      </form>\
    </div>\
    <div class = \"faded_overlay\">\
    </div>\
    ");
    $("body").css('overflow', 'hidden');

    $(".login_disappear").on("click", function() {
        $(".login_focus").remove();
        $(".faded_overlay").remove();
        $('body').css('overflow','');
    });
  });
});
