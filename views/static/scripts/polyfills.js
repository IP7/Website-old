// For IE <= 8
if (!Object.prototype.hasOwnProperty.call(HTMLElement.prototype, 'textContent')) {
    HTMLElement.prototype.__defineGetter__('textContent', function() {
        return this.innerText;
    });
    HTMLElement.prototype.__defineSetter__('textContent', function(e) {
        this.innerText = e;
    });
}

// For Firefox <4 & old browsers
if ( typeof Object.create === 'undefined' ) {

    // From Douglas Crockford's "JavaScript: The Good Parts"
    Object.create = function (o) {
        function F() {}
        F.prototype = o;
        return new F();
    };

}
