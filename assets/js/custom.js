/*global console, document, $, jQuery */
(function ($) {
    'use strict';
    $(document).ready(function () {

        // Appel du plugin
        $('.pagination1').pagination({
            itemsToPaginate: ".post",
            activeClass: 'active'
        });

    });

}(jQuery));