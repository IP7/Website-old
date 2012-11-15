// For iOS <= 4
Function.prototype.bind = Function.prototype.bind || function (){
    var that = this,
        args = [].slice.apply(arguments),
        context = args.shift();

    return function(){
        return that.apply(
            context,
            args.concat([].slice.apply(arguments))
        );
    };
};

// For IE <= 8
if (!Object.prototype.hasOwnProperty.call(HTMLElement.prototype, 'textContent')) {
    HTMLElement.prototype.__defineGetter__('textContent', function() {
        return this.innerText;
    });
    HTMLElement.prototype.__defineSetter__('textContent', function(e) {
        this.innerText = e;
    });
}
