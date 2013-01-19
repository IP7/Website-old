$(function(){

    var $tabs = $('.tab[data-for]'),
        $tb_contents = $('.tab-content[data-type]'),

        selected = 'selected',
        displayed = 'displayed',
        w = window,

        hist = w.history && w.history.replaceState.bind(w.history, '') || $.noop,

        hash = w.location.hash.slice(1),

        $old_tab = $tabs.first(), tmp;

    $tabs.each(function(i, e) {

        $(e).data( 'ct', $tb_contents.eq(i) )
            .data( 'title', e.innerText.toLocaleUpperCase() );

    }).click(function() {
        var $this = $(this),
            hash  = $this.data('for'),
            $ct   = $this.data('ct');

        if ($this === $old_tab) return;

        hist($this.data('title'), '#' + hash);

        $old_tab.removeClass(selected);
        $old_tab.data('ct').removeClass(displayed);

        $old_tab = $this.addClass(selected);
        $ct.addClass(displayed);
    });

    if ( hash != '' && (tmp = $tabs.filter('[data-for='+hash+']').first()).length === 1 ) {

        $old_tab = tmp;

    }

    $old_tb_content = $old_tab.data('ct');
    $old_tab.click();

});
