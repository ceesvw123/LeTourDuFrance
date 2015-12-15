function dayAlert(clickedDay){
    var d = new Date();
    var currentday = d.getDate();
    clickedDay = clickedDay - currentday;

    if(clickedDay == 1){
        window.alert("MELDING -> Deze pagina is over "+ clickedDay + " dag beschikbaar");
    }else{
        window.alert("MELDING -> Deze pagina is over "+ clickedDay + " dagen beschikbaar");
    }
}
function warningComment(){
    window.alert("MELDING -> U melding is doorgegeven aan de redactie");
}

(function($){
    $.fn.extend({
        rotaterator: function(options) {

            var defaults = {
                fadeSpeed: 500,
                pauseSpeed: 500,
                child:null
            };

            var options = $.extend(defaults, options);

            return this.each(function() {
                var o =options;
                var obj = $(this);
                var items = $(obj.children(), obj);
                items.each(function() {$(this).hide();})
                if(!o.child){var next = $(obj).children(':first');
                }else{var next = o.child;
                }
                $(next).fadeIn(o.fadeSpeed, function() {
                    $(next).delay(o.pauseSpeed).fadeOut(o.fadeSpeed, function() {
                        var next = $(this).next();
                        if (next.length == 0){
                            next = $(obj).children(':first');
                        }
                        $(obj).rotaterator({child : next, fadeSpeed : o.fadeSpeed, pauseSpeed : o.pauseSpeed});
                    })
                });
            });
        }
    });
})(jQuery);

$(document).ready(function() {
    $('#dynamic-text').rotaterator({fadeSpeed:3000, pauseSpeed:200});
});