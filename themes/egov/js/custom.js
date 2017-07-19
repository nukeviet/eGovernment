$(function() {
    // Cookie
    var themecolor = ($.cookie('egovthemecolor') || 'default');
    $('.linkcolorsite').prop('disabled', true);
    if (themecolor != 'default') {
        $('#' + themecolor).prop('disabled', false);
    }
    $('[data-toggle="changethemcolor"]').each(function() {
        if ($(this).data('color') == themecolor) {
            $(this).addClass('active');
        }
    });
    // Phần tìm kiếm trên thanh menu
    $('[data-toggle="mycollapse"]').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $($(this).attr('href')).toggleClass('in');
    });
    $('#toggleearch').click(function(e) {
        e.stopPropagation();
    });
    $(window).on('click', function() {
        $('#toggleearch').removeClass('in');
    });
    $('#siteformsearch').submit(function(e) {
        var q = trim($('[name="q"]', $(this)).val());
        if (q.length < $(this).data('minlen') || q.length > $(this).data('maxlen')) {
            e.preventDefault();
            $(this).addClass('has-error');
        }
    });
    // Tab hỏi đáp, lấy ý kiến người dân
    $('[data-toggle="faqoptab"]').click(function(e) {
        e.preventDefault();
        var tabarea = $(this).parent().parent().parent().parent();
        $('.tptabcontent > div', tabarea).hide();
        $('.tptabtitle a', tabarea).removeClass('active');
        $($(this).attr('href')).show();
        $(this).addClass('active');
    });
    // Tab tin tức
    $('[data-toggle="newtabslide"]').click(function(e) {
        e.preventDefault();
        var tabarea = $(this).parent().parent().parent().parent().parent();
        $('.newstabhomejcarousel-ctn', tabarea).hide();
        $('[data-toggle="newtabslide"]').removeClass('active');
        $($(this).attr('href')).show();
        $(this).addClass('active');
        $('.newstabhomejcarousel', $(this).attr('href')).jcarousel('scroll', 0);
        $('.newstabhomejcarousel', $(this).attr('href')).jcarousel('destroy');
        $('.newstabhomejcarousel', $(this).attr('href')).jcarousel({
            wrap: 'circular',
        }).jcarouselAutoscroll({
            interval: 5000,
            target: '+=1',
            autostart: true
        });
    });
    // Kích thước font
    $('[data-toggle="postfsize"]').click(function(e) {
        e.preventDefault();
        var size = $(this).data('size');
        if (size == 0.8) {
            size = 1;
        } else if (size == 1) {
            size = 1.2;
        } else if (size == 1.2) {
            size = 1.5;
        } else if (size == 1.5) {
            size = 2;
        } else {
            size = 0.8;
        }
        $(this).data('size', size);
        $('.bodytext,.hometext').css("font-size", size + 'em');
    });
    // Show/Hide
    $('[data-toggle="showhide"]').click(function(e) {
        e.preventDefault();
        $($(this).data('target')).toggleClass('hidden');
    });
    // Đổi màu giao diện
    $('[data-toggle="changethemcolor"]').click(function(e) {
        e.preventDefault();
        var color = $(this).data('color');
        $.cookie('egovthemecolor', color);
        $('.linkcolorsite').prop('disabled', true);
        if (color != 'default') {
            $('#' + color).prop('disabled', false);
        }
        $('[data-toggle="changethemcolor"]').removeClass('active');
        $(this).addClass('active');
    });
});