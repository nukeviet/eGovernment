$(function() {
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
});