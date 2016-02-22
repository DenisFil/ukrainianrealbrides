$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    //Вывод профилей
    $.ajax({
        type: 'post',
        url: baseUrl + 'user_interface/search/first_get_profiles',
        dataType: 'json',
        success: function (data) {
            var length = data.length;

            $.each(data, function (index, value) {
                if (index <= 8) {
                    var html = '<div class="search-profile-block"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" alt="Profile photo" width="196" height="298" ><div class="search-profile-info"><strong>' + value.name + ', ' + '<span>' + value.birthday + '</span></strong><span>' + value.country_name + ', ' + value.city + '</span><em>Online</em><ul><li><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/messaging.png" width="23" height="23" alt="Send letter" /><span>Send Letter</span></a></li><li class="search-chat-invite"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/chat.png" width="25" height="25" alt="Invite to chat" /><span>Invite to chat</span></a></li><li class="search-send-gift"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/gift-service.png" width="22" height="29" alt="Send gift" /><span>Send Gift</span></a></li></ul><a href="#" class="view-profile-button">View Profile</a></div></div>';

                    $('.search-results').append(html);
                }
            });

            var index = 9;
            setInterval(function () {
                if (length >= index) {
                    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                        for (var i = index; i <= index + 2; i++) {
                            if (i < length) {
                                var html = '<div class="search-profile-block"><img src="' + baseUrl + 'content/profiles/avatars/' + data[i].id + '/' + data[i].avatar + '_avatar.jpg" alt="Profile photo" width="196" height="298" ><div class="search-profile-info"><strong>' + data[i].name + ', ' + '<span>' + data[i].birthday + '</span></strong><span>' + data[i].country_name + ', ' + data[i].city + '</span><em>Online</em><ul><li><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/messaging.png" width="23" height="23" alt="Send letter" /><span>Send Letter</span></a></li><li class="search-chat-invite"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/chat.png" width="25" height="25" alt="Invite to chat" /><span>Invite to chat</span></a></li><li class="search-send-gift"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/gift-service.png" width="22" height="29" alt="Send gift" /><span>Send Gift</span></a></li></ul><a href="#" class="view-profile-button">View Profile</a></div></div>';

                                $('.search-results').append(html);
                            }
                        }
                        index = index + 3;
                    }
                }
            }, 100);
        }
    });

    //Страна
    $('#country').focus(function () {
        $('.location-drop').show();
    });
});