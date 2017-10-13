<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Directory listing</title>
</head>
<body>
<h1>Directory listing</h1>
<hr>
<ul>
  <?php $dir = substr(dirname($_SERVER['PHP_SELF']),strlen($_SERVER['DOCUMENT_ROOT']));
  $g = glob("*"); usort($g,function($a,$b) {
      if(is_dir($a) == is_dir($b))
          return strnatcasecmp($a,$b);
      else
          return is_dir($a) ? -1 : 1;
  });
  echo implode(array_map(function($a) {return '<li><a href="'.$a.'">'.$a.'</a></li>';},$g));?>
</ul>
<hr>
</body>
</html>
