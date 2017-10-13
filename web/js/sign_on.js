$(document).ready(function() {

  var stored_cookie = Cookies.get('PETDORA_USER_ACCOUNT');

  validID = jQuery.get('../php/accounts.txt', function(data){
    var validID = false;
    var splitInfo = data.split("\n");
    if (stored_cookie) {
      stored_cookie = stored_cookie.split(',');
      for (var i = 0; i < splitInfo.length; ++i) {
        if (stored_cookie[1] == splitInfo[i]) {
          validID = true;
        }
      }
    }
    console.log(validID);
    if (validID) {
      $('.signin').remove();
      $('nav').append('<a class = "signin">' + "Welcome " + stored_cookie[0] + '!</a>');
      $('.signin').css('color', 'black');
      $('.signin').css('cursor', 'auto');

      // TODO: REPLACE with more content for final
      var secretText = "These are secret premium features that can ONLY be accessed \
      with a purchased account...\
      <img src=\"https://kahanelaw.com/wp-content/uploads/2016/02/Cat-Helps-Drug-Dealer.jpg\"style=\"width:50%;\"></img>";

      $('.center-wrap').append("<article><h2>Secret Premium Account Features!</h2>\
      <div class='article-head'></div>"+secretText+"</article>");
    }

    else if (!validID) {
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

    }

  });
});
