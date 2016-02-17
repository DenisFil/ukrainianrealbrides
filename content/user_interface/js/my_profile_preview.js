$(document).ready(function () {
    var set = $('.item img');
    var index;
    $('.item').on('click', 'img', function () {
        var photoCount = $('.item img').length;
        var selector = '#user-photo';
        index = set.index(this);
        var link = $(this).attr('src');
        $(selector).children().attr('src', link);
        $(selector).prev().text(index + 1 + '/' + photoCount);

        $(selector).children().click(function(){
            if (index + 1 <= photoCount){
                index = index + 1;
                $(selector).prev().text(index + 1 + '/' + photoCount).next().children().attr('src', $('.item img').eq(index).attr('src'));
            }
            if (index + 1 > photoCount){
                index = 0;
                $(selector).prev().text(index + 1 + '/' + photoCount).next().children().attr('src', $('.item img').eq(index).attr('src'));
            }
        });
    });
});