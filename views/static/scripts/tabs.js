$(function(){

    var $tabs = $('.tab[data-for]'),
        $tb_contents = $('.tab-content[data-type]'),

        selected = 'selected',
        displayed = 'displayed'

        $old_tab = $tabs.first(),
        $old_tb_content = $tb_contents.first();

    
    $tabs.click(function() {
        var $this = $(this);

        if ($this === $old_tab) return;

        var type  = $this.data('for'),
            $ct   = $tb_contents.filter('[data-type="'+type+'"]');
        
        $old_tab.removeClass(selected);
        $old_tb_content.removeClass(displayed);

        $old_tab = $this.addClass(selected);
        $old_tb_content = $ct.addClass(displayed);
    });

    $tabs.first().click();
});
