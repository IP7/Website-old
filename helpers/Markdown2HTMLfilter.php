<?php

namespace IP7Website\Twig\Extension;
 
class Markdown2HTMLfilter extends \Twig_Extension {

    private static $md_parser;

    public function getFilters() {
        return array(
            'md2html' => new \Twig_Filter_Method($this, 'md2html')
        );
    }
 
    public function md2html($value) {
        if (!isset(self::$md_parser)) {
            self::$md_parser = new \MarkdownExtra_Parser();
        }

        return self::$md_parser->transform($value);
    }
 
    public function getName() {
        return 'md2html_extension';
    }
 
}
?>
