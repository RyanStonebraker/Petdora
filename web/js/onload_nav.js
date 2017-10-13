var scrollStatus = false;
$(document).ready(function() {
  $(window).scroll(function () {
    if ($(window).scrollTop() > 115 && scrollStatus) {
      $('nav').addClass('nav-fixed');
      $('nav').prepend("<img src=\"img/cat.png\" class = \"fimg\"></img>");
      $('nav').append("<img src=\"img/fedora.png\" class = \"fedimg\"></img>");
      $('.signin').css('top', '10px');
      $('h1').css('margin-bottom','42px');
      $('nav').css('padding-top', "0");
      $('nav').css('padding-bottom', "0");
      scrollStatus = false;
    }
    if ($(window).scrollTop() < 116 && !scrollStatus) {
      $('.fimg').remove();
      $('.fedimg').remove();
      $('nav').removeClass('nav-fixed');
      $('.signin').css('top', '');
      $('h1').css('margin-bottom', '');
      $('nav').css('padding-top', "0.5vh");
      $('nav').css('padding-bottom', "0.5vh");
      scrollStatus = true;
    }
  });
});
