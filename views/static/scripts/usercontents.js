$(function() {
    if (typeof prettyPrint === 'function') {
        $('.user_content_text code').addClass('prettyprint');
        prettyPrint();
    }
});
