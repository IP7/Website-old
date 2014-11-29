$(document).ready(function() {

    var $divs = $('div.input-field');

    $divs.each(function(i,d) {

        var $d = $(d),
            $lab = $('label.inset-label', $d).first(),
            $inp = $('input#'+$lab.attr('for'), $d).first(),
            addfocus = function() { $d.addClass('focused'); };

        $inp.focusin(addfocus);
        $lab.click(addfocus);

        $inp.focusout(function(){
            $d.removeClass('focused');

            if ($inp.val() === '')
                $lab.show();
        });

        $inp.keypress(function() { $lab.hide(); });
        $inp.keyup(function() {
            if ($inp.val() === '')
                $lab.show();
        });

        window.setTimeout(function() {
            if ($inp[0].value !== '') {
                $lab.hide();
            }
        }, 100);
    });

});
