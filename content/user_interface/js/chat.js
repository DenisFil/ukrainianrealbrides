$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    //Активация диалогового окна
    function dialogActivation(index) {
        var selector = '.dialog-partner-info';
        var name = $(selector).eq(index).children().eq(0).text();
        var location = $(selector).eq(index).children().eq(1).text();
        var link = $(selector).eq(index).children().eq(0).attr('href');
        $('.chat-partner-name').children().next().attr('href', link).text(name).parent().next().text(location);
    }

    //Проверка актуальности online`а
    function checkExistence(dataLength, data) {
        $('.nav-tabs li').each(function () {
            var className = $(this).attr('class');
            if (className == 'active') {
                var index = $(this).index();
                var selector = '.tab-body:eq(' + index + ') .dialog-partner';
                var length = $(selector).length;
                var usersId = [];

                if (dataLength != length) {
                    $(selector).each(function () {
                        var userId = $(this).attr('id');
                        if (!data[userId]) {
                            $('#' + userId).remove();
                        }
                        usersId.push(userId);
                    });

                    $.each(data, function (key, value) {
                        var search = $.inArray(key, usersId);
                        if (search == -1) {
                            if (value.city != null) {
                                var location = value.country_name + ', ' + value.city;
                            } else {
                                location = value.country_name;
                            }

                            var html =  '<div class="dialog-partner" id="' + value.id + '"><div class="new-message-count"><em></em><span>0</span></div><div class="dialog-partner-left"><button class="dialog-partner-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_preview.jpg" width="35" height="35"><span class="chat-avatar-status online-avatar-status"></span></button><div class="dialog-partner-info"><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + value.id + '" target="_blank">' + value.name + '</a><em>' + location + '</em></div></div><div class="dialog-partner-right"><button class="start-dialog">Start a dialogue</button></div></div>';

                            $('.tab-body:eq(' + index + ')').append(html);
                        }
                    });
                }
            }
        });
    }

    //Запрос информации пользователей online
    setInterval(function () {
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat/users_online',
            dataType: 'json',
            success: function (data) {
                var dataLength = data.length;
                checkExistence(dataLength, data);
            }
        });
    }, 1000);

    //Просмотр аватара
    $('.dialog-partner-avatar').children().click(function () {
        var link = $(this).attr('src');
        link = link.split('_');
        link = link[0] + '_full.jpg';

    });

    //Активация диалогового окна
    $(document).on('click', '.dialog-partner', function () {
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

    $(document).on('click', '.start-dialog', function () {
        var toUserId = {
            to_user_id: $(this).parent().prev().prev().parent().attr('id')
        };

        $.ajax({
            type: 'post',
            data: toUserId,
            url: baseUrl + 'user_interface/chat/invite_to_chat'
        });
    });
});