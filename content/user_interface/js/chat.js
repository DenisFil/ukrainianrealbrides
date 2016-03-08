$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    setInterval(function () {
         $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat/users_online',
            dataType: 'json',
            success: function (data) {
                /** hz hz hz ;) **/
            }
        });
    }, 1000);

    $('.dialog-partner-avatar').children().click(function () {
        var link = $(this).attr('src');
        link = link.split('_');
        link = link[0] + '_full.jpg';

    });

    $('.dialog-partner').click(function () {
        var link = $(this).children().next().children().children().attr('src');

        $('.chat-partner-avatar').children().attr('src', link);
    });
});