function static_cms_load(folder) {

  if (folder[folder.length-1] != "/")
    folder += "/";

  this.getEntries(folder);
}

static_cms_load.prototype.getEntries = function (folder) {
  $(document).ready(function () {
      jQuery.get(folder, function(data) {
      var rawText = data;
      var counter = 0;

      // LIMITS THE NUMBER OF ENTRIES TO 10,000
      while (rawText.search('<li>') != -1 && counter < 10000) {
        ++counter;
        var entrStart = rawText.search("<li>");
        var entrEnd = rawText.search("</a>");

        var entr = rawText.substr(entrStart, entrEnd-entrStart);
        entr = (entr.substr(entr.search("\">")+2));
        if (entr == "index.php") {
          rawText = rawText.substr(entrEnd+4);
          continue
        }
        static_cms_load.prototype.getEntry(folder + entr);

        rawText = rawText.substr(entrEnd+4);
      }
      });
    });
}

static_cms_load.prototype.getEntry = function (file) {
  $(document).ready(function () {
      jQuery.get(file, function(data) {
      var rawText = data;
      var splitText = rawText.split("\n-***-\n");

      var headArticle = "<h2>" + splitText[0] + "</h2>";
      var hdAnimUl = "<div class = \"article-head\"></div>";

      var content = splitText[1];

      var innerElements;
      if (splitText.length <= 1)
        innerElements = splitText[0];

      else
        innerElements = headArticle + hdAnimUl + content

      $(".center-wrap").append("<article>" + innerElements + "</article>");
      });
    });
}
