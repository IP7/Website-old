$(function(){
    var d  = document,
        dc = d.createElement.bind(d),
        f  = d.getElementsByClassName('files_inputs')[0],
        maxf = f.dataset['max'],

        title_inp = d.querySelector('input[name=title]'),
        type_inp  = d.querySelector('select[name=type]'),

        inps = [],

        addInp = function() {
            if (inps.length >= maxf) {return;}
            var i = dc('input'), j = dc('input'),
                p = dc('p'),     q = dc('p'),
                l = dc('label'), k = dc('label'),
                t = d.createTextNode('Fichier :'), u = d.createTextNode('Description :');

            // input
            i.type = 'file';
            i.name = 'userfiles[]';
            i.accept = 'text/*,application/*';

            // display/hide microcopy
            i.onchange = function(){
                this.parentElement
                        .children[1]
                            .classList[this.value?'add':'remove']('hidden');
                if (this.value)
                    addInp();
            };
            p.className = 'microcopy';
            p.textContent = 'Facultatif, 10Mio max.';

            // description
            j.name = 'desc[]';
            j.type = 'text';
            j.onchange = i.onchange;
            q.className = 'microcopy';
            q.textContent = 'Facultatif';

            [t,i,p].forEach(function(e){l.appendChild(e)});
            [u,j,q].forEach(function(e){k.appendChild(e)});

            inps.push({
                input : i,
                desc  : j,
                microcopy : q
            });

            f.appendChild(l);
            f.appendChild(k);
        };

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

            title_inp.onblur = function(/*placeholder:*/words, i, wl, index, max) {
                if (+type_inp.value > 0) { return; }

                // words of the title
                title_words = title_inp.value.toLocaleLowerCase().split(/\s+/);
                var wl = title_words.length,
                max = 0,
                j, type, tll, local_max;

                for (i=0; i<tl; i++) {
                    // for each type, we count the number of words which are in
                    // the title. 'max' is the maximum number found until now,
                    // 'index' the index of the type which has this 'max' number of
                    // matching words.
                    type=types[i], tll=type.length, local_max=0;

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

    addInp();
    
    // Markdown
    var converter = Markdown.getSanitizingConverter(),
        editor    = new Markdown.Editor(converter);

    editor.run();
});
