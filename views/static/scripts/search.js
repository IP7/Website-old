$(function() {
    var cache = {},
    lastXhr;
    $("#q").autocomplete({
        minLength: 2,
        source: function(request, response) {
            var term = request.term;
            if (term in cache) {
                return response(cache[term]);
            }

            lastXhr = $.getJSON('/api/1/search.json', {q:term}, function( data, status, xhr ) {
                cache[term] = data;
                if (xhr === lastXhr) {
                    // TODO format data
                    response(data);
                }
            });
        }
    });
});
