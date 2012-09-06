$(function(){
    (function($ta,s,$w,e) {
        // add a .selected class on the selected tab
        $w.bind(e, function(h){
            h=window.location.hash;
            $ta.parent().removeClass(s);
            $('.tab a[href='+h+']').parent().addClass(s);
        });

        // automatically open the first tab if no tab is selected
        if(!window.location.hash)window.location.hash=$ta.first().attr('href');
        // trigger hashchange on pageload
        $w.trigger(e);
    })($('.tab a'), 'selected', $(window), 'hashchange');
});
