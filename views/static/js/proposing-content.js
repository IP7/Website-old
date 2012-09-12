$(function(){
    var d  = document,
        dc = d.createElement.bind(d),
        f  = d.getElementsByClassName('files_inputs')[0],

        inp = function() {
            var i = dc('input'),
                p = dc('p'),
                l = dc('label'),
                t = d.createTextNode('Fichier :');

            i.type = 'file';
            i.name = 'userfiles[]';
            i.accept = 'text/*,application/*';
            p.className = 'microcopy';
            p.innerText = 'Facultatif, 2Mio max.';

            [t,i,p].forEach(function(e){l.appendChild(e)});

            return l;
        },

        desc = function() {
            var i = dc('input'),
                p = dc('p'),
                l = dc('label'),
                t = d.createTextNode('Description :');

            i.name = 'desc[]';
            i.type = 'text';
            p.className = 'microcopy';
            p.innerText = 'Facultatif';

            [t,i,p].forEach(function(e){l.appendChild(e)});

            return l;
        }

    f.appendChild(inp());
    f.appendChild(desc());
});
