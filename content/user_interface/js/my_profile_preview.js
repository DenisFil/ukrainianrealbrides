$(document).ready(function () {
    function aboutMyPartnerTextHide(field) {
        var text = $(field).text();
        var textLength = text.length;
        if (textLength > 105) {
            var newText = text.substring(0, 105) + '...';
            $(field).text(newText).next().show();
        }
        return text;
    }

    var allAboutPartnerText = aboutMyPartnerTextHide('#about-my-partner');
    $('#about-my-partner').next().click(function () {
        $('#about-my-partner').text(allAboutPartnerText);
        $(this).hide();

        if (allAboutPartnerText.length <= 584) {
            var height = $('#preview-about-partner-tab').height();
            $('.tab-body').animate({'scrollTop': height}, 'slow');
        }else{
            $('.tab-body').animate({'scrollTop': 186}, 'slow');
        }
    });

    //Просмотр фото
    var set = $('.item img');
    var index;
    $('.item').on('click', 'img', function () {
        var photoCount = $('.item img').length;
        var selector = '#user-photo';
        index = set.index(this);
        var link = $(this).attr('src');
        $(selector).children().attr('src', link);
        $(selector).prev().text(index + 1 + '/' + photoCount);

        $(selector).children().click(function () {
            if (index + 1 <= photoCount) {
                index = index + 1;
                $(selector).prev().text(index + 1 + '/' + photoCount).next().children().attr('src', $('.item img').eq(index).attr('src'));
            }
            if (index + 1 > photoCount) {
                index = 0;
                $(selector).prev().text(index + 1 + '/' + photoCount).next().children().attr('src', $('.item img').eq(index).attr('src'));
            }
        });
    });
});