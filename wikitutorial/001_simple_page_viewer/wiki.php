<?php
define('WIKIWORD','[A-Z][a-zA-Z0-9]*[A-Z][a-zA-Z0-9]*');
define('HOMEPAGE','HomePage');
if( array_key_exists("word",$_GET) ) {
  $word = $_GET['word'];
} else {
  header("Location: ".HOMEPAGE."", true, 303);
  exit();
}
include('templates.php');
$page_filename = "pages/$word.txt";
if( file_exists($page_filename) ) {
  $page_src = @file_get_contents($page_filename);
} else {
  $page_src = "Page $word does not exist yet.";
}
function wiki_word_to_link($xs) {
  return "<a href='$xs[0]'>$xs[0]</a>";
}
function render() {
  global $word, $page_src, $view_template;
  // process source to produce output
  $tmp = preg_replace_callback("/".WIKIWORD."/",'wiki_word_to_link', $page_src);
  // Stick processed source into view template
  $output = str_replace(
    array("WIKI_WORD","WIKI_PAGE_BODY"),
    array($word,$tmp),
    $view_template);
  echo $output;
}
render();
?>
