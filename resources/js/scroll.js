$(document).ready(function() {
    var $panelLeft = $('.panel-left');
    var $panelRight = $('.panel-right');

    $(window).on('scroll', function() {
        var scrollTop = $(window).scrollTop();
        $panelLeft.css('top', scrollTop);
    });
});