$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    //Изменение иконок в header`e
        $('.status-bar em').each(function(){
            var text = $(this).text();
            if (text == 0){
                $(this).parent().removeClass('points');
            }else{
                $(this).parent().addClass('points');
            }
        });

    setInterval(function () {
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat_engine/check_invites_chat',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    var selector = '.message-notifier';

                    if ($(selector).length == 0) {
                        var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s chat...</em><div class="notifier-buttons"><button type="button" class="notifier-button" id="' + value.invite_code + '">Accept</button><button type="button" class="notifier-link" id="' + value.invite_code + '">Decline</button></div></div></div>';

                        $('.notification-holder').append(html);
                        $('.message-notifier').animate( {'right' : '0'}, 1000);

                    } else {
                        $(selector).each(function () {
                            var blocId = $(this).attr('id');
                            var blocsId = [];
                            blocsId.push(blocId);
                            var search = $.inArray(value.id, blocsId);
                            if (search == -1) {
                                var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s chat...</em><div class="notifier-buttons"><button type="button" class="notifier-button" id="' + value.invite_code + '">Accept</button><button type="button" class="notifier-link" id="' + value.invite_code + '">Decline</button></div></div></div>';

                                $('.notification-holder').append(html);
                                $('.message-notifier').animate( {'right' : '0'}, 1000);
                            }
                        });
                    }

                });
            }
        });
    }, 10000);

    $(document).on('click', '.notifier-button', function () {
        /*var url = window.location.href;
        url = url.split('/');
        url = url[url.length - 1];
        if (url == 'chat') {
            var index = $(this).index();
            $.ajax({
                type: 'post',
                url: baseUrl + 'user_interface/chat_engine/check_credits',
                dataType: 'json',
                success: function (data) {
                    if (data.result == 0) {
                        $('#credits-modal').click();
                    } else {
                        var selector = '.notifier-button';
                        var roomId = { invite_code: $(selector).eq(index).attr('id') };
                        var partnerId = { partner_id: $(selector).eq(index).parent().prev().prev().parent().prev().parent().attr('id') };
                        $.ajax({
                            type: 'post',
                            data: roomId,
                            url: baseUrl + 'user_interface/chat_engine/open_room',
                            dataType: 'json',
                            success: function (data) {
                                if (data.result == 1) {
                                    $('.message-notifier').each(function () {
                                        var notifierId = $(this).attr('id');
                                        if (notifierId == partnerId.partner_id) {
                                            $(this).hide();
                                        }
                                    });
                                    $('.dialog-partner').each(function () {
                                        var dialogBlockId = $(this).attr('id');
                                        if (dialogBlockId == partnerId.partner_id) {
                                            $(this).click();
                                            $('.active-dialog .start-dialog').attr('id', roomId.invite_code).removeClass('start-dialog').addClass('stop-dialog').text('Stop');
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
            });
        } else {*/
            var index = $(this).index();
            $.ajax({
                type: 'post',
                url: baseUrl + 'user_interface/chat_engine/check_credits',
                dataType: 'json',
                success: function (data) {
                    if (data.result == 0) {
                        $('#credits-modal').click();
                    } else {
                        var selector = '.notifier-button';
                        var roomId = { invite_code: $(selector).eq(index).attr('id') };
                        var partnerId = { partner_id: $(selector).eq(index).parent().prev().prev().parent().prev().parent().attr('id') };
                        $.ajax({
                            type: 'post',
                            data: roomId,
                            url: baseUrl + 'user_interface/chat_engine/open_room',
                            dataType: 'json',
                            success: function (data) {
                                if (data.result == 1) {
                                    $('#' + partnerId.partner_id).hide();
                                    window.open(baseUrl + 'user_interface/chat?id=' + partnerId.partner_id, '_blank');
                                }
                            }
                        });
                    }
                }
            });
        /*}*/
    });
    $(document).on('click', '.notifier-link', function () {
        var roomId = { invite_code: $(this).attr('id') };
        var partnerId = { partner_id: $(this).parent().prev().prev().parent().prev().parent().attr('id') };
        $.ajax({
            type: 'post',
            data: roomId,
            url: baseUrl + 'user_interface/chat_engine/close_room'
        });
        $('#' + partnerId.partner_id).hide();
    });

    $('#top-search-button').click(function () {
        $('.search-drop').show();
    });
});