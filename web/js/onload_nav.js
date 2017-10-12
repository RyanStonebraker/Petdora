var scrollStatus = false;
$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 115 && scrollStatus) {
      $('nav').addClass('nav-fixed');
      $('nav').prepend("<img src=\"img/cat.png\" class = \"fimg\"></img>");
      $('nav').append("<img src=\"img/fedora.png\" class = \"fedimg\"></img>");
      $('.signin').css('top', '10px');
      $('h1').css('margin-bottom','32px');
      scrollStatus = false;
    }
    if ($(window).scrollTop() < 116 && !scrollStatus) {
      $('.fimg').remove();
      $('.fedimg').remove();
      $('nav').removeClass('nav-fixed');
      $('.signin').css('top', '');
      $('h1').css('margin-bottom', '');
      scrollStatus = true;
    }
  });
});
