$(function(){
    (function($ta,s) {
        // automatically open the first tab if no tab is selected
        if(!window.location.hash)window.location.hash=$ta.first().attr('href');

        // add a .selected class on the selected tab
        $(window).bind('hashchange', function(h){
            h=window.location.hash;
            $ta.removeClass(s);
            $('.tabs a[href='+h+']').addClass(s);
        });
    })($('.tab a'), 'selected');
});
