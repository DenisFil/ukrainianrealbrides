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
                        var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s meet...</em><div class="notifier-buttons"><button type="button" class="notifier-button">Accept</button><button type="button" class="notifier-link">Decline</button></div></div></div>';

                        $('.notification-holder').append(html);
                        $('.message-notifier').animate( {'right' : '0'}, 1000);

                    } else {
                        $(selector).each(function () {
                            var blocId = $(this).attr('id');
                            var blocsId = [];
                            blocsId.push(blocId);
                            var search = $.inArray(value.id, blocsId);
                            if (search == -1) {
                                var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s meet...</em><div class="notifier-buttons"><button type="button" class="notifier-button">Accept</button><button type="button" class="notifier-link">Decline</button></div></div></div>';

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
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat_engine/check_credits',
            dataType: 'json',
            success: function (data) {
                if (data.result == 0) {
                    $('#credits-modal').click();
                } else {
                    var partnerId = { partner_id: $('.notifier-button').parent().prev().prev().parent().prev().parent().attr('id') };
                    $.ajax({
                        type: 'post',
                        data: partnerId,
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
    });
    $(document).on('click', '.notifier-link', function () {
        var partnerId = { partner_id: $(this).parent().prev().prev().parent().prev().parent().attr('id') };
        $.ajax({
            type: 'post',
            data: partnerId,
            url: baseUrl + 'user_interface/chat_engine/close_room'
        });
        $('#' + partnerId.partner_id).hide();
    });
});