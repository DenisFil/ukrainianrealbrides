$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';
    var chatRooms = [];

    //Проверка состояния запросов
    setInterval(function () {
        if (chatRooms.length > 0) {
            var rooms = {
                rooms: chatRooms
            };
            $.ajax({
                type: 'post',
                data: rooms,
                url: baseUrl + 'user_interface/chat_engine/check_chat_status',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        var search = $.inArray(key, chatRooms);
                        if (search != -1) {
                            if (value[0].invite_status == 1) {
                                var text = $('#' + key + ' .time').text();
                                if (text == '') {
                                    $('#' + key).children().next().next().children().removeClass('start-dialog').addClass('stop-dialog').text('Stop').parent().prepend('<span class="time">0:00</span>');
                                    chatTime();
                                }
                            }
                        }
                    });
                }
            });
        }
    }, 1000);

    //Время чата
    function chatTime () {
        setInterval(function () { trackTime(); }, 1000);
        var seconds = 0;
        var minutes = 0;

        function trackTime () {
            seconds += 1;
            if (seconds > 9 && seconds < 60) {
                var timeStr = minutes + ':' + seconds;
            } else {
                timeStr = minutes + ':0' + seconds;
                if (seconds >= 60) {
                    minutes += 1;
                    seconds = 0;
                    if (seconds > 9 && seconds < 60) {
                        timeStr = minutes + ':' + seconds;
                    } else {
                        timeStr = minutes + ':0' + seconds;
                    }
                }
            }
            $('.time').text(timeStr);
        }

    }

    //Проверка перехода по приглашению
    var searchGET = window.location.href.indexOf('?') + 1;
    if (searchGET != 0) {
        var chatId = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

        if (chatId.length > 0) {
            chatId = chatId[0].split('=');
            $('.dialog-partner').each(function () {
                if ($(this).attr('id') == chatId[1]) {
                    dialogActivation($(this).index());
                    $(this).children().next().next().children().removeClass('start-dialog').addClass('stop-dialog').text('Stop').parent().prepend('<span class="time">0:00</span>');
                    chatTime();
                }
            });
        }
    }

    //Активация диалогового окна
    function dialogActivation(index) {
        var selector = '.dialog-partner-info';
        var name = $(selector).eq(index).children().eq(0).text();
        var location = $(selector).eq(index).children().eq(1).text();
        var link = $(selector).eq(index).children().eq(0).attr('href');
        $('.chat-partner-name').children().next().attr('href', link).text(name).parent().next().text(location);

        selector = '.dialog-partner';
        $(selector).each(function () {
            var className = $(this).attr('class');
            className = className.split(' ');
            if (className.length > 1) {
                $(this).removeClass('active-dialog');
            }
        });

        $(selector).eq(index).addClass('active-dialog');

        link = $(selector).eq(index).children().next().children().children().attr('src');

        $('.chat-partner-avatar').children().attr('src', link);
        $('.chat-header-left').show();
    }

    //Отправка сообщений
    $('.send-message-button').click(function () {
        var messageFiledSelector = '.message-field';
        var date = new Date();

        var messageData = {
            message: $(messageFiledSelector).val(),
            to_user_id: $('.active-dialog').attr('id'),
            date: date.getDate() + '.' + (date.getMonth() + 1) + '.' + date.getFullYear() + ' ' + date.getHours() + ':' + date.getMinutes()
        };

        $(messageFiledSelector).val('');

        date = date.getHours() + ':' + date.getMinutes();
        var myMessageHtml = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message outgoing-message">' + messageData.message +'</span></div><span class="chat-row-right">' + date + '</span></div>';
        $('.chat-field').append(myMessageHtml);

        $.ajax({
            type: 'post',
            data: messageData,
            url: baseUrl + 'user_interface/chat_engine/send_message',
            dataType: 'json',
            success: function () {

            }
        });
    });

    //Проверка новых сообщений
    setInterval(function () {
        var fromUserId = {};
        $('.dialog-partner').each(function () {
            var blockClass = $(this).attr('class');
            blockClass = blockClass.split(' ');
            if (blockClass.length > 1) {
                fromUserId = {
                    from_user_id: $(this).attr('id')
                }
            }
        });

        $.ajax({
            type: 'post',
            data: fromUserId,
            url: baseUrl + 'user_interface/chat_engine/check_new_messages',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    var newMessage = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message incoming-message">' + data[key].message +'</span></div><span class="chat-row-right">' + data[key].time_message + '</span></div>';
                    $('.chat-field').append(newMessage);
                });
            }
        });
    }, 1000);

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
            url: baseUrl + 'user_interface/chat_engine/users_online',
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
        $('#user-photo').attr('src', link);

    });

    //Активация диалогового окна
    $(document).on('click', '.dialog-partner', function () {
        var index = $(this).index();
        dialogActivation(index);
    });

    $(document).on('click', '.start-dialog', function () {
        var toUserId = {
            to_user_id: $(this).parent().prev().prev().parent().attr('id')
        };

        chatRooms.push(toUserId.to_user_id);

        $.ajax({
            type: 'post',
            data: toUserId,
            url: baseUrl + 'user_interface/chat_engine/invite_to_chat'
        });
    });
});