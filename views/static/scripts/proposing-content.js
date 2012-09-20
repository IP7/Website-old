$(function(){
    var d  = document,
        dc = d.createElement.bind(d),
        f  = d.getElementsByClassName('files_inputs')[0],
        maxf = f.dataset['max'],
        maxf_s = Math.floor(maxf/1000000),

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
            i.onchange = function(){
                this.parentElement
                        .children[1]
                            .classList[this.value?'add':'remove']('hidden');
                addInp();
            };
            p.className = 'microcopy';
            p.innerText = 'Facultatif, '+maxf_s+'Mio max.';

            // description
            j.name = 'desc[]';
            j.type = 'text';
            j.onchange = i.onchange;
            q.className = 'microcopy';
            q.innerText = 'Facultatif';

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

    addInp();
});
