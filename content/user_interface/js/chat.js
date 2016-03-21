$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';
    var chatRooms = [];
    var chatRoom = [];

    //Проверка активности чата
    setInterval(function () {
        if (chatRoom.length > 0) {
            $.ajax({
                type: 'post',
                data: {rooms: chatRoom},
                url: baseUrl + 'user_interface/chat_engine/check_life_status',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        if (value[0].invite_status == 1) {
                            /*$('.dialog-partner').each(function () {*/
                                /*var text = $('.dialog-partner:eq(' + inspection + ') .time').text();
                                if (text == '') {*/
                                    $('#' + value[0].invite_code).removeClass('start-dialog').addClass('stop-dialog').text('Stop')/*.parent().prepend('<span class="time">0:00</span>')*/;
                                    /*chatTime();*/
                                /*}*/
                            /*});*/
                        }
                        if (value[0].invite_status == 0) {
                            $('#' + value[0].invite_code).removeClass('stop-dialog').addClass('start-dialog').text('Start a dialogue')/*.prev().remove()*/;
                        }
                    });
                }
            });
        }
    }, 1000);

    //Проверка состояния инвайтов
    /*setInterval(function () {
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
     $('#' + key).children().next().next().children().removeClass('start-dialog').addClass('stop-dialog').text('Stop').attr('id', value[0].invite_code).parent().prepend('<span class="time">0:00</span>');
     chatTime();
     }
     }
     }
     });
     }
     });
     }
     }, 1000);*/

    //Время чата
    /*function chatTime() {
        setInterval(function () {
            trackTime();
        }, 1000);
        var seconds = 0;
        var minutes = 0;

        function trackTime() {
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

    }*/

    //Проверка перехода по приглашению
    var searchGET = window.location.href.indexOf('?') + 1;
    if (searchGET != 0) {
        var chatId = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');

        if (chatId.length > 0) {
            chatId = chatId[0].split('=');
            $('.dialog-partner').each(function () {
                if ($(this).attr('id') == chatId[1]) {
                    var index = $(this).index();
                    chatRooms.push($(this).attr('id'));
                    $.ajax({
                        type: 'post',
                        data: { partner_id: $(this).attr('id') },
                        url: baseUrl + 'user_interface/chat_engine/get_invite_code',
                        dataType: 'json',
                        success: function (data) {
                            dialogActivation(index);
                            $('.dialog-partner').eq(index).children().next().next().children().removeClass('start-dialog').addClass('stop-dialog').text('Stop').attr('id', data.invite_code)/*.parent().prepend('<span class="time">0:00</span>')*/;
                            chatRoom.push(data.invite_code);
                            /*chatTime();*/
                            loadHistory(index);
                        }
                    });
                }
            });
        }
    }

    //Активация диалогового окна
    function dialogActivation(index) {
        $('.chat-field').empty();
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
        var dialogStatus = $('.active-dialog .stop-dialog').length;
        if (dialogStatus > 0) {
            var messageData = {
                message: $(messageFiledSelector).val(),
                to_user_id: $('.active-dialog').attr('id')
            };

            $(messageFiledSelector).val('');

            $.ajax({
                type: 'post',
                data: messageData,
                url: baseUrl + 'user_interface/chat_engine/send_message',
                dataType: 'json',
                success: function (data) {
                    var date = data.date.split(' ');
                    date = date[3].split(':');
                    date = date[0] + ':' + date[1];

                    var myMessageHtml = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message outgoing-message">' + messageData.message + '</span></div><span class="chat-row-right">' + date + '</span></div>';
                    $('.chat-field').append(myMessageHtml);

                    var chatRowsSelector = '.chat-field-row';
                    var rows = $(chatRowsSelector).length;
                    $(chatRowsSelector).eq(rows - 2).removeClass('last-message');
                    $(chatRowsSelector).eq(rows - 1).addClass('last-message');

                    var selector = '.chat-field';
                    var height = $(selector).height();
                    $(selector).scrollTop(height);
                }
            });
        }
    });

    //Проверка новых сообщений
    setInterval(function () {
        var countActiveRooms = $('.dialog-partner .stop-dialog').length;
        if (countActiveRooms > 0) {
            var chatActiveRooms = [];
            $('.stop-dialog').each(function () {
                chatActiveRooms.push($(this).parent().prev().prev().parent().attr('id'));
            });
            var objChatActiveRooms = {};
            for (var i = 0; i < chatActiveRooms.length; i++) {
                objChatActiveRooms[chatActiveRooms[i]] = chatActiveRooms[i];
            }
            $.ajax({
                type: 'post',
                data: objChatActiveRooms,
                url: baseUrl + 'user_interface/chat_engine/check_new_messages',
                dataType: 'json',
                success: function (data) {
                    $.each(data, function (key, value) {
                        var activeRoom = $('.active-dialog').attr('id');
                        if (key == activeRoom) {
                            $.each(value, function (k, v) {
                                var time = v.date.split(' ');
                                time = time[3].split(':');
                                time = time[0] + ':' + time[1];
                                var newMessage = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message incoming-message">' + v.message + '</span></div><span class="chat-row-right">' + time + '</span></div>';
                                $('.chat-field').append(newMessage);

                                var chatRowsSelector = '.chat-field-row';
                                var rows = $(chatRowsSelector).length;
                                $(chatRowsSelector).eq(rows - 2).removeClass('last-message');
                                $(chatRowsSelector).eq(rows - 1).addClass('last-message');

                                var selector = '.chat-field';
                                var height = $(selector).height();
                                $(selector).scrollTop(height);
                                
                                var messageId = {
                                    message_id: v.message_id
                                };
                                $.ajax({
                                    type: 'post',
                                    data: messageId,
                                    url: baseUrl + 'user_interface/chat_engine/read_message'
                                });
                            });
                        } else {
                            var countNewMessages = value.length;
                            if (countNewMessages > 0) {
                                var selector = '#' + key + ' .new-message-count';
                                var count = $(selector).text();
                                count = Number(count);
                                $(selector).css('visibility', 'visible').children().next().text(countNewMessages + count);
                            }
                        }
                    });
                }
            });
        }
    }, 1000);

    //Проверка актуальности online`а
    function checkExistence(dataLength, data) {
        $('.nav-tabs li').each(function () {
            var className = $(this).attr('class');
            if (className == 'active') {
                var index = $(this).index();
                if (index == 0) {
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

                                var html = '<div class="dialog-partner" id="' + value.id + '"><div class="new-message-count"><em></em><span>0</span></div><div class="dialog-partner-left"><button class="dialog-partner-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_preview.jpg" width="35" height="35"><span class="chat-avatar-status online-avatar-status"></span></button><div class="dialog-partner-info"><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + value.id + '" target="_blank">' + value.name + '</a><em>' + location + '</em></div></div><div class="dialog-partner-right"><button class="start-dialog">Start a dialogue</button></div></div>';

                                $('.tab-body:eq(' + index + ')').append(html);
                            }
                        });
                    }
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
    }, 10000);

    //Списание средств с баланса
    function writeOffCredits () {
        var length = $('.stop-dialog').length;
        if (length > 0) {
            var sum = {
                credits: length
            };
            $.ajax({
                type: 'post',
                data: sum,
                url: baseUrl + 'user_interface/chat_engine/write_off_credits',
                dataType: 'json',
                success: function (data) {
                    if (data.credits == 0) {
                        $('.stop-dialog').each(function () {
                            $(this).click();
                        });
                        $('#credits-modal').click();
                    } else {
                        $('.credit-status').children().next().text(data.credits);
                    }
                }
            });
        }
    }
    setInterval(function () { writeOffCredits(); }, 60000);

    //Загрузка истории
    function loadHistory(index) {
        $.ajax({
            type: 'post',
            data: {partner_id: $('.dialog-partner').eq(index).attr('id')},
            url: baseUrl + 'user_interface/chat_engine/load_history',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    var date = value.date.split(' ');
                    var day = date[0] + ' ' + date[1] + ' ' + date[2];
                    date = date[3].split(':');
                    date = date[0] + ':' + date[1];
                    var dialogId = $('.active-dialog').attr('id');
                    var chatDivider = '<div class="chat-divider"><span>' + day + '</span></div>';

                    function addMessageDivider() {
                        if (value.from_user_id == dialogId) {
                            var message = chatDivider + '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message incoming-message">' + value.message + '</span></div><span class="chat-row-right">' + date + '</span></div>';
                            $('.chat-field').append(message);
                        } else {
                            message = chatDivider + '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message outgoing-message">' + value.message + '</span></div><span class="chat-row-right">' + date + '</span></div>';
                            $('.chat-field').append(message);
                        }
                    }
                    
                    function addMessage() {
                        if (value.from_user_id == dialogId) {
                            var message = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message incoming-message">' + value.message + '</span></div><span class="chat-row-right">' + date + '</span></div>';
                            $('.chat-field').append(message);
                        } else {
                            message = '<div class="chat-field-row"><div class="chat-row-left"><span class="chat-message outgoing-message">' + value.message + '</span></div><span class="chat-row-right">' + date + '</span></div>';
                            $('.chat-field').append(message);
                        }
                    }

                    if (key == 0) {
                        addMessageDivider();
                    } else {
                        var dates = [];
                        $('.chat-divider').each(function () {
                            dates.push($(this).children().text());
                        });
                        var search = $.inArray(day, dates);
                        if (search == -1) {
                            addMessageDivider();
                        } else {
                            addMessage();
                        }
                    }
                    var messageId = {
                        message_id: value.message_id
                    };
                    $.ajax({
                        type: 'post',
                        data: messageId,
                        url: baseUrl + 'user_interface/chat_engine/read_message'
                    });
                });

                var chatRowsSelector = '.chat-field-row';
                var rows = $(chatRowsSelector).length;
                $(chatRowsSelector).eq(rows - 1).addClass('last-message');

                var selector = '.chat-field';
                var height = $(selector).height();
                $(selector).scrollTop(height);
            }
        });
    }

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
        var chatContent = $('.chat-field').html();
        if (chatContent == 0) {
            loadHistory(index);
        }
        $('.dialog-partner .new-message-count').eq(index).css('visibility', 'hidden');
        chatRooms.push($(this).attr('id'));
    });

    //Приглашение в чат
    $(document).on('click', '.start-dialog', function () {
        var userId = $(this).parent().prev().prev().parent().attr('id');
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat_engine/check_credits',
            dataType: 'json',
            success: function (data) {
                if (data.result == 0) {
                    $('#credits-modal').click();
                } else {
                    var toUserId = {
                        to_user_id: userId
                    };

                    $.ajax({
                        type: 'post',
                        data: toUserId,
                        url: baseUrl + 'user_interface/chat_engine/invite_to_chat',
                        dataType: 'json',
                        success: function (data) {
                            $('#' + userId).children().next().next().children().attr('id', data.invite_code);
                            chatRoom.push(data.invite_code);
                        }
                    });
                }
            }
        });
    });

    //Закрытие чата
    $(document).on('click', '.stop-dialog', function () {
        var inviteCode = $(this).attr('id');
        $.ajax({
            type: 'post',
            data: {invite_code: inviteCode},
            url: baseUrl + 'user_interface/chat_engine/close_room',
            dataType: 'json',
            success: function (data) {
                if (data.result == 1) {
                    $('#' + inviteCode).addClass('start-dialog').removeClass('stop-dialog').text('Start a dialogue').prev().remove();
                }
            }
        });
    });
});