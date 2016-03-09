$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    function dialogActivation(index) {
        var selector = '.dialog-partner-info';
        var name = $(selector).eq(index).children().eq(0).text();
        var location = $(selector).eq(index).children().eq(1).text();
        console.log(location);
        $('.chat-partner-name').children().next().text(name).parent().next().text(location);
    }

    function checkExistence(length) {
        console.log('hello');
    }

    setInterval(function () {
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat/users_online',
            dataType: 'json',
            success: function (data) {
                var dataLength = data.length;
                /*checkExistence(dataLength);*/
            }
        });
    }, 1000);

    $('.dialog-partner-avatar').children().click(function () {
        var link = $(this).attr('src');
        link = link.split('_');
        link = link[0] + '_full.jpg';

    });

    $('.dialog-partner').click(function () {
        var index = $(this).index();
        dialogActivation(index);

        $('.dialog-partner').each(function () {
            var className = $(this).attr('class');
            className = className.split(' ');
            if (className.length > 1) {
                $(this).removeClass('active-dialog');
            }
        });

        $(this).addClass('active-dialog');

        var link = $(this).children().next().children().children().attr('src');

        $('.chat-partner-avatar').children().attr('src', link);
        $('.chat-header-left').show();
    });
});