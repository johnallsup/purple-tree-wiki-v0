<!DOCTYPE html>
<html>
<head>
<meta charset='utf8'/>
<title>ThePurpleTree - Wiki Tutorial</title>
<style>
body {
  background: #280069 url(img/tpt_bg.jpg) no-repeat;
  background-position: center top;
  background-size: 95vw;
  font-family: Helvetica, Arial, sans-serif;
  text-align: center;
}
#content {
  color: white;
  margin-top: 40vw;
}
#content a {
  font-size: 2vw;
  display: inline-block;
  padding: 2vw;
  margin-right: 2vw;
  margin-bottom: 2vw;
  border: 1px solid black;
  background-color: #103;
  color: white;
  text-decoration: none;
}
p.note {
  font-size: 1.5vw;
  color: white;
  font-style: italic;
}
</style>
</head>
<body>
<div id='content'>
<?php
$a = glob("*/wiki.php");
$b = array();
foreach($a as $v) {
  $c = explode("/",$v);
  $d = $c[0];
  echo "<a href='$d'>$d</a>";
}
?>
</div>
<p class='note'>Yes, learning modern responsive web design is somewhere on my todo list.</p>
</body>
</html>
