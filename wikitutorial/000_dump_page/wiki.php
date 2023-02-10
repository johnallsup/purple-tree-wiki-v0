<?php
define('HOMEPAGE','HomePage');
if( array_key_exists("word",$_GET) ) {
  $word = $_GET['word'];
} else {
  header("Location: ".HOMEPAGE."", true, 303);
  exit();
}
$page_filename = "pages/$word.txt";
if( file_exists($page_filename) ) {
  $page_src = @file_get_contents($page_filename);
} else {
  $page_src = "Page $word does not exist yet.";
}
function render() {
  global $word, $page_src;
  echo $page_src; 
}
render();
?>
