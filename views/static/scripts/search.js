$(function() {
    var cache = {},
        urls = {},
    lastXhr;
    $("#q").autocomplete({
        minLength: 2,
        source: function(request, response) {
            var term = request.term;
            if (term in cache) {
                return response(cache[term]);
            }

            lastXhr = $.getJSON('/api/1/search.json', {q:term}, function( data, status, xhr,/*placeholder:*/results) {
                results = data['data'];
                if (xhr === lastXhr) {

                    response(cache[term] = results.map(function(r){
                        urls[r.title] = r.href;
                        return r.title;
                    }));
                }
            });
        },
        select: function(u, o) {
            if (u = urls[o.item.label]) {
                window.location.pathname = u;
            }
        }
    });

    $(document.head).append($('<link>').attr({rel:'stylesheet', href:'/views/static/styles/jquery-ui-1.8.23.custom.css'}));
});
