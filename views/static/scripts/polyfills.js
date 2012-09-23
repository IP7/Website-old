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
