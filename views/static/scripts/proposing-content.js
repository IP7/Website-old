$(function(){

    /**
     * Show/hide file inputs
     **/

    var $files = $('.files_inputs').first(),
        $f = $('<label>Fichier&nbsp;:&nbsp;<input type="file" name="userfiles[]" />' +
               '<p class="microcopy">Facultatif, 10Mio max.</p></label>'),
        maxf = $files.data( 'max' ),

        title_inp = document.querySelector('input[name=title]'),
        type_inp  = document.querySelector('select[name=type]'),

        addInp = function() {
            if ($files.children().length >= maxf) { return; }
            $f.clone().appendTo($files);
        },

        keepOnlyOneEmptyInput = function() {
            var count = 0;

            $files.find('label').each(function(i, e) {

                var $label = $(e);

                if (!$label.find('input').val()) {
                    if (++count > 1) {
                        $label.remove();
                    }
                }

            });

            if (count === 0) { addInp(); }
        };

    $files.on('change', 'input[type="file"]', function(e) {
        keepOnlyOneEmptyInput();

        var $f = $(e.target);

        // show/hide the microcopy
        $f.parent().find('p.microcopy').toggle($f.val() === '');
    });

    keepOnlyOneEmptyInput();

    /**
     * Update the type of the content, according to its title (if possible).
     **/

    if (title_inp && type_inp) {

        // for each type, an array of its words
        var types = [].slice.apply(type_inp.options)
                        .map(function(o){
                            return o.textContent
                                        .replace(/^\s+|\s+$/g,'') // strip
                                        .toLocaleLowerCase()
                                        .split(/\s+/);
                        }),
            tl = types.length;

        // update the 'type' input accordingly to 'title' input’s value

        title_inp.onblur = function() {
            if (+type_inp.value > 0) { return; }

            // words of the title
            title_words = title_inp.value.toLocaleLowerCase().split(/\s+/);
            var wl = title_words.length,
                max = 0,
                i, index, j, type, tll, local_max;

            for (i=0; i<tl; i++) {
                // for each type, we count the number of words which are in
                // the title. 'max' is the maximum number found until now,
                // 'index' the index of the type which has this 'max' number of
                // matching words.
                type = types[i];
                tll = type.length;
                local_max = 0;

                for (j=0; j<tll; j++) {
                    if (title_words.indexOf(type[j]) > -1) { local_max++; }
                }

                if (local_max > max) {
                    max = local_max;
                    index = i;
                }
            }

            type_inp.value = index;
            title_inp.onblur = null;
        };
    }

    /**
     * Markdown
     **/

    var converter = Markdown.getSanitizingConverter(),
        editor    = new Markdown.Editor(converter);

    editor.run();

    (function() {

        // Display the "Previzualize" title when the user type
        // something.
        var previewTitle = document.getElementById( '_preview-title' ),
            inp          = document.getElementById( 'wmd-input' );

        previewTitle.style.display = 'none';

        function showPreviewTitle() {

            previewTitle.style.display = 'block';
            inp.removeEventListener( 'keydown', showPreviewTitle );

        }

        inp.addEventListener( 'keydown', showPreviewTitle, false );

    })();


});
