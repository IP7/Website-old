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
if (!document.body.textContent) {
    HTMLElement.prototype.__defineGetter__('textContent', function() {
        return this.innerText;
    });
}
