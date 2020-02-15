(function($) {
    $.extend({
        getUrlVars: function() {
            var vars = {},
                queryString = window.location.href.slice(window.location.href.indexOf('?') + 1),
                hashes = queryString.split('&');

            for (var i = 0; i < hashes.length; i++) {
                var key = hashes[i].split('=')[0],
                    value = hashes[i].split('=')[1];

                vars[key] = value;
            }

            return vars;
        },
        getUrlVar: function(name) {
            if (!name) {
                console.error('Name cannot be blank');
            }

            return this.getUrlVars()[name];
        }
    });
})(jQuery);
