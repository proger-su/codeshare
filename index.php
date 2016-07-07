<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ace Editor Demo</title>
        <style type="text/css">
            #editor { 
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
            }
        </style>
    </head>
    <body>
        <div id="editor"></div>
        <script src="/bower_components/ace-builds/src-min-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
        <script>
			var editor = ace.edit("editor");
			editor.setTheme("ace/theme/monokai");
			editor.session.setMode("ace/mode/javascript");
        </script>
    </body>
</html>