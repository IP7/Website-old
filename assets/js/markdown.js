define([
    'jquery',
    'Markdown.Converter',
    'Markdown.Editor',
    'Markdown.Sanitizer',
    'pagedown-i18n-fr'], function( $ ) {

    var modules = [].slice.call(arguments, 1);

    modules.unshift({});

    return $.extend.apply($, modules);
});
