// API Endpoints
define(function() {
    
    var root  = '/api/1/',
        exts  = { json: 'json', markdown: 'md', html: 'html' };

    function mkURL( parts, ext ) {
        ext || (ext = exts.json);

        return root + parts + '.' + ext;
    }

    return {
        contents: {
            last: mkURL(['contents', 'last'])
        },
        edit: {
            course: {
                intro: {
                    load: mkURL('edit/course/intro', exts.markdown),
                    save: mkURL('edit/course/intro', exts.html)
                }
            }, cursus: {
                intro: {
                    load: '/jsapi/edit/cursus/intro.md',
                    save: '/jsapi/edit/cursus/intro.html'
                }
            }
        }
    };
});
