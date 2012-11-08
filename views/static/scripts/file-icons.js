(function() {

    // using an object is easier than an array to check if an
    // element is in a set
    var exts = {
            'aac':1,  'aiff':1, 'ai':1,   'avi':1, 'bmp':1,  'c':1,   'cpp':1,
            'css':1,  'dat':1,  'dmg':1,  'doc':1, 'dotx':1, 'dwg':1, 'dxf':1,
            'eps':1,  'exe':1,  'flv':1,  'gif':1, 'h':1,    'hpp':1, 'html':1,
            'ics':1,  'iso':1,  'java':1, 'jpg':1, 'key':1,  'mid':1, 'mp3':1,
            'mp4':1,  'mpg':1,  'odf':1,  'ods':1, 'odt':1,  'otp':1, 'ots':1,
            'ott':1,  'pdf':1,  'php':1,  'png':1, 'ppt':1,  'psd':1, 'py':1,
            'qt':1,   'rar':1,  'rb':1,   'rtf':1, 'sql':1,  'tga':1, 'tgz':1,
            'tiff':1, 'txt':1,  'wav':1,  'xls':1, 'xlsx':1, 'xml':1, 'yml':1,
            'zip':1
        },

        lis  = document.getElementsByClassName('file-li'),

        i=0, _l = lis.length, ext;

    for (;i<_l; i++) {
        ext = lis[i].textContent.trimRight().split('.').slice(-1)[0];
        if (!ext)
            continue;

        _ = ext;
        ext = ext.toLocaleLowerCase();

        if (exts[ext]) {
            lis[i].style.backgroundImage =
                "url('/views/static/images/file-icons-16px/"+ext+".png')";
        }
    }

})();
