function frontend_load() {
  this.getContent();
}

frontend_load.prototype.getContent = function() {
  $.ajax({
    type: 'get',
    url: 'http://0.0.0.0:8383/',
    success: function (data) {
      var linesep = "<div class = \"article-head\"></div>";
      var jsonObj = "[" + data + "]";
      jsonObj = $.parseJSON(jsonObj);

      jsonObj.forEach(function(entry) {
        var articleEntry = "<h2>" + entry["Header"] + "</h2>" + linesep + entry["Content"];
        $(".center-wrap").append("<article>" + articleEntry + "</article>");
      });
    }
  })
}
