<?php

// format a text using Markdown
function format_text($txt) {
    static $md_parser;
   
    if (!isset($md_parser)) {
        $md_parser = new MarkdownExtra_Parser();
    }

    return $md_parser->transform($txt);
}

?>
