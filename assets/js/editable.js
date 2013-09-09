define(['jquery', 'logging'], function( $, log ) {

    /**
     * This is mostly a wrapper around Jeditable
     * opts must have the following properties:
     *
     * - target: the editable element
     * - saveurl: the URL where the text will be sent
     *
     * it may also have these optional properties:
     *
     * - id: this must be provided if the target element doesn't have an id
     *   attribute. This is used by Jeditable.
     * - loadurl: the URL where the markdown text will be loaded. This is used
     *   by Jeditable when a content may be editable using Markdown instead
     *   of plain text.
     * - indicator (same as with Jeditable. Default: 'sauvegarde…')
     * - tooltip (same as with Jeditable. Default: 'Cliquez pour éditer')
     * - cols: used for textareas, default: 80
     * - rows: used for textareas, default: 8
     * - event (same as with Jeditable, default: dblclick)
     *
     * All other properties are given to Jeditable.
     **/
    return {
        setEditable: function ip7w_setEditable(opts) {
            if (!$.fn.editable) { return; }
            
            if (!opts || !opts.target || !opts.saveurl) {
                
                log.error('IP7W#editable: wrong argument:', opts);
                return;
            }

            var $el = $(opts.target), jeditable_opts, url;

            if (opts.id) { $el.attr('id', opts.id); delete opts.id; }
            else if (!$el.attr('id')) {

                log.error("IP7W#editable: no id for element.");
                return;

            }

            url = opts.saveurl;

            delete opts.saveurl;
            delete opts.target;

            jeditable_opts = $.extend({

                // defaults

                indicator:   'sauvegarde…',
                tooltip:     'Double-cliquez pour éditer',
                onblur:      'ignore', // the only way to cancel is to press ESC
                cols:        80,
                rows:        8,
                event:       'dblclick'
            }, opts)

            $el.editable( url, jeditable_opts );

        }
    };

});
