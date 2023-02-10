<?php
define('WIKIWORD','[A-Z][a-zA-Z0-9]*[A-Z][a-zA-Z0-9]*');
define('HOMEPAGE','HomePage');
if( array_key_exists("word",$_GET) ) {
  $word = $_GET['word'];
  if( ! preg_match("/".WIKIWORD."/",$word) ) {
    header("Location: NotAWikiWord", true, 303);
    exit();
  }
} else {
  header("Location: ".HOMEPAGE."", true, 303);
  exit();
}
if( array_key_exists("action",$_GET) ) {
  $action = $_GET['action'];
} else {
  $action = "view";
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
function edit_link() {
  global $word;
  return "<div class='edit_link'><a href='$word?edit'>Edit</a></div>";
}
$protected_wiki_pages = array("NotAWikiWord","TooManyPages");
function handle_post() {
  global $word,$protected_wiki_pages,$page_filename;
  $num_pages = count(glob("pages/*.txt"));
  if( in_array($word,$protected_wiki_pages) ) {
    header("Location: ${_SERVER['REQUEST_URI']}", true, 303);
    exit();
  } else if( $num_pages < 1024 || file_exists($page_filename) ) {
    $new_src = $_POST['source'];
    file_put_contents("pages/$word.txt",$new_src);
    header("Location: ${_SERVER['REQUEST_URI']}", true, 303);
    exit();
  } else {
    header("Location: TooManyPages", true, 303);
    exit();
  }
}
function action_view() {
  global $word, $page_src, $view_template;
  if ($_SERVER["REQUEST_METHOD"] == "POST") handle_post();
  $tmp = preg_replace_callback("/".WIKIWORD."/",'wiki_word_to_link', $page_src)." ".edit_link();
  $output = str_replace( array("WIKI_WORD","WIKI_PAGE_BODY"), array($word,$tmp), $view_template);
  echo $output;
}
function action_edit() {
  global $word, $page_src, $edit_template;
  $output = str_replace( array("WIKI_WORD","WIKI_PAGE_SOURCE"), array($word,$page_src), $edit_template);
  echo $output;
}
$dispatch = "action_$action";
if( function_exists($dispatch) ) {
  $dispatch();
} else {
  die("Invalid action: $action");
}
?>
