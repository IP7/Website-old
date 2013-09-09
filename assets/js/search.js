require(['jquery'], function( $ ) {
$(function() {
    var cache = {},
        urls = {},
        prefetched = [],
        display_limit = 5,
        xhrlastXhr;

    function toResults( arr ) {
        return arr.map(function(o) {
            urls[o.title] = o.href;
            return o.title;
        });
    }

    $("#q").autocomplete({
        minLength: 1,
        source: function(request, response) {
            var term    = request.term,
                len     = 0,
                results = [];

            if (term in cache) {
                return response(cache[term]);
            }

            results = toResults($.grep(prefetched, function(o, i) {
                if (len <= display_limit
                    && o
                    && o.title.toLocaleLowerCase().indexOf(term) >= 0) {
                    return !!++len;
                }
                return false
            }));

            // since content search is not currently implemented, the Ajax request
            // below is useless.

            //if (results.length >= 10) { // enough results
                return response(cache[term] = results);
            /*}

            lastXhr = $.getJSON('/api/1/search.json', {
                q: term,
                types: 'content' // all other types are prefetched
            }, function(data, status, xhr) {
                results = results.concat(toResults(data['data']));
                if (xhr === lastXhr) {
                    response(cache[term] = results);
                }
            });*/
        },
        select: function(u, obj) {
            if (u = urls[obj.item.label]) {
                window.location.pathname = u;
            }
        }
    }).focus(function() {
        var $this = $(this), w = $this.width();

        $this.data('oldWidth', w)
             .animate({ width: w*1.5 + 'px' }, 200);
    }).blur(function() {
        var $this = $(this);

        $this.animate({ width: $this.data('oldWidth') + 'px' }, 300);
    });

    // populate the `prefetched` array with users, courses, cursus, paths
    $.getJSON('/api/1/links_list.json', {
            types: 'user,course,cursus,educational_path'
    }, function(data) {
        prefetched = data;
    });

});
});
