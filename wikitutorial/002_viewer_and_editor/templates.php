<?php
$view_template = <<<'EOT'
<!DOCTYPE html>
<html>
<head>
<title>MyWiki - WIKI_WORD</title>
<style>
pre {
  font-family: 'Fira Code', monospace;
  whitespace: pre-wrap;
}
</style>
</head>
<body>
<h1>WIKI_WORD</h1>
<pre>
WIKI_PAGE_BODY
</pre>
</body>
</html>
EOT;
$edit_template = <<<'EOT'
<!DOCTYPE html>
<html>
<head>
<title>MyWiki - WIKI_WORD - edit</title>
<style>
pre {
  font-family: 'Fira Code', monospace;
  whitespace: pre-wrap;
}
</style>
</head>
<body>
<h1>WIKI_WORD</h1>
<form method='post' action='WIKI_WORD'>
<textarea name='source' cols='80' rows='25' autofocus>
WIKI_PAGE_SOURCE
</textarea>
<input type='submit' class='save_button' value='Save'/>
</form>
</body>
</html>
EOT;
