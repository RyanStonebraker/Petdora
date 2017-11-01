var sys = require("util");
var mhttp = require("http");
var fs = require("fs");

jsonbody = "";

var MongoClient = require('mongodb').MongoClient;
var url = "mongodb://localhost/petdora_test";

mhttp.createServer(function(request, response){
  req = request.url.substring(1);

  if (req != "favicon.ico") {
    MongoClient.connect (url, function(err, db) {
      if (err) {
        console.log(err);
      }
      else {
        var items = db.collection(req).find();
        jsonbody = "";
        items.each(function(err, doc) {
          if (doc != null) {
            if (jsonbody.length > 0)
              jsonbody += ","
            jsonbody += JSON.stringify(doc);
          }
        });

        db.close();
      }
    });
  }

  response.writeHeader(200, {"Content-Type": "text/html"});
  response.writeHeader(200, {"Access-Control-Allow-Origin":"http://localhost:8181"});

  response.end(jsonbody);
}).listen(8383);
