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
});