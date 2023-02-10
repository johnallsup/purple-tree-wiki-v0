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
div.edit_link a {
  display: inline-block;
  padding: 0.3em;
  background-color: #070;
  color: white;
  border: 1px solid black;
}
p.instructions {
  color: #555;
  font-style: italic;
}
</style>
<script>
window.addEventListener('load',_ => {
  window.addEventListener('keydown', e => {
    if( e.key === "e" ) {
      e.preventDefault()
      const uri = window.location
      const new_uri = `${uri}?edit`
      window.location.href = new_uri
    }
  })
})
</script>
</head>
<body>
<h1>WIKI_WORD</h1>
<p class='instructions'>Press e to edit, or click the edit button.</p>
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
<title>MyWiki - WIKI_WORD -- edit</title>
<style>
pre {
  font-family: 'Fira Code', monospace;
  whitespace: pre-wrap;
}
.save_button {
  display: inline-block;
  padding: 0.3em;
  background-color: #070;
  color: white;
  border: 1px solid black;
}
p.instructions {
  color: #555;
  font-style: italic;
}
</style>
<script>
const q = x => document.querySelector(x)
window.addEventListener("load", _ => {
  window.addEventListener("keydown", e => {
    if( e.code === "Backquote" && e.shiftKey ) {
      e.preventDefault()
      q("form").submit()
    }
  })
})
</script>
</head>
<body>
<h1>WIKI_WORD</h1>
<p class='instructions'>Press shift+backquote to save, or click the save button.</p>
<form method='post' action='WIKI_WORD'>
<textarea name='source' cols='80' rows='25' autofocus>
WIKI_PAGE_SOURCE
</textarea>
<input type='submit' class='save_button' value='Save'/>
</body>
</html>
EOT;
