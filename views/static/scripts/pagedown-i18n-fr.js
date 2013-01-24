/**!
 * Pagedown-i18n
 * Repo: github.com/bfontaine/pagedown-i18n
 * License: MIT
 *
 * Language: French
 * Author: Baptiste Fontaine
 **/
(function() {

    var _ME = Markdown.Editor;

    Markdown.Editor = function (markdownConverter, idPostfix, options) {

        var strings, s;

        options = options || {};
        strings = options.strings || {};

        options.strings = {
            
            bold: "Gras <strong> Ctrl+B",
            boldexample: "texte en gras",

            italic: "Italique <em> Ctrl+I",
            italicexample: "texte en italique",

            link: "Hyperlien <a> Ctrl+L",
            linkdescription: "entrez la description du lien ici",
            linkdialog: "<p><b>Insérer un hyperlien</b></p><p>http://exemple.fr/ \"titre optionnel\"</p>",

            quote: "Citation <blockquote> Ctrl+Q",
            quoteexample: "Citation",

            code: "Code <pre><code> Ctrl+K",
            codeexample: "entrez le code ici",

            image: "Image <img> Ctrl+G",
            imagedescription: "entrez la description de l'image ici",
            imagedialog: "<p><b>Insérer une image</b></p><p>http://exemple.fr/images/diagram.jpg \"titre optionnel\"<br><br>Besoin d'<a href='http://www.google.fr/search?q=hébergement-images-gratuit' target='_blank'>hébergement d'images gratuit</a>?</p>",

            olist: "Liste numérotée <ol> Ctrl+O",
            ulist: "Liste à points <ul> Ctrl+U",
            litem: "Élément de liste",

            heading: "Titre <h1>/<h2> Ctrl+H",
            headingexample: "Titre",

            hr: "Ligne horizontale <hr> Ctrl+R",

            undo: "Annuler - Ctrl+Z",
            redo: "Refaire - Ctrl+Y",
            redomac: "Refaire - Ctrl+Shift+Z",

            help: "Aide pour l'édition en Markdown"

        };

        for ( s in strings ) {
            if ( strings.hasOwnProperty( s ) ) {
                
                options.strings[ s ] = strings[ s ];

            }
        }

        return _ME.call( this, markdownConverter, idPostfix, options );

    };

})();
