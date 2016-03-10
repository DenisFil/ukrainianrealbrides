$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    setInterval(function () {
        $.ajax({
            type: 'post',
            url: baseUrl + 'user_interface/chat/check_invites_chat',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (key, value) {
                    var selector = '.message-notifier';

                    if ($(selector).length == 0) {
                        var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s meet...</em><div class="notifier-buttons"><button type="button" class="notifier-button">Accept</button><button type="button" class="notifier-link">Decline</button></div></div></div>';

                        $('.notification-holder').append(html);
                    } else {
                        $(selector).each(function () {
                            var blocId = $(this).attr('id');
                            var blocsId = [];
                            blocsId.push(blocId);
                            var search = $.inArray(value.id, blocsId);
                            if (search == -1) {
                                var html =  '<div class="message-notifier" id="' + value.id + '"><div class="notifier-avatar"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" width="96" height="145" alt="Profile photo"></div><div class="notifier-right"><span>' + value.name + '</span><em>Hello you liked me Let\'s meet...</em><div class="notifier-buttons"><button type="button" class="notifier-button">Accept</button><button type="button" class="notifier-link">Decline</button></div></div></div>';

                                $('.notification-holder').append(html);
                            }
                        });
                    }

                });
            }
        });
    }, 10000);
});