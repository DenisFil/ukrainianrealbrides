$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';
    var firstData;

    //Вывод профилей
    $.ajax({
        type: 'post',
        url: baseUrl + 'user_interface/search/first_get_profiles',
        dataType: 'json',
        success: function (data) {
            firstData = data;
            var length = firstData.length;

            $.each(firstData, function (index, value) {
                if (index <= 8) {
                    var html = '<div class="search-profile-block"><img src="' + baseUrl + 'content/profiles/avatars/' + value.id + '/' + value.avatar + '_avatar.jpg" alt="Profile photo" width="196" height="298" ><div class="search-profile-info"><strong>' + value.name + ', ' + '<span>' + value.birthday + '</span></strong><span>' + value.country_name + ', ' + value.city + '</span><em>Online</em><ul><li><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/messaging.png" width="23" height="23" alt="Send letter" /><span>Send Letter</span></a></li><li class="search-chat-invite"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/chat.png" width="25" height="25" alt="Invite to chat" /><span>Invite to chat</span></a></li><li class="search-send-gift"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/gift-service.png" width="22" height="29" alt="Send gift" /><span>Send Gift</span></a></li></ul><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + value.id + '" class="view-profile-button">View Profile</a></div></div>';

                    $('.search-results').append(html);
                }
            });

            var index = 9;
            setInterval(function () {
                if (length >= index) {
                    if ($(window).scrollTop() + $(window).height() == $(document).height()) {
                        for (var i = index; i <= index + 2; i++) {
                            if (firstData != null){
                                if (i < length) {
                                    var html = '<div class="search-profile-block"><img src="' + baseUrl + 'content/profiles/avatars/' + firstData[i].id + '/' + firstData[i].avatar + '_avatar.jpg" alt="Profile photo" width="196" height="298" ><div class="search-profile-info"><strong>' + firstData[i].name + ', ' + '<span>' + firstData[i].birthday + '</span></strong><span>' + firstData[i].country_name + ', ' + firstData[i].city + '</span><em>Online</em><ul><li><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/messaging.png" width="23" height="23" alt="Send letter" /><span>Send Letter</span></a></li><li class="search-chat-invite"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/chat.png" width="25" height="25" alt="Invite to chat" /><span>Invite to chat</span></a></li><li class="search-send-gift"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/gift-service.png" width="22" height="29" alt="Send gift" /><span>Send Gift</span></a></li></ul><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + firstData[i].id + '" class="view-profile-button">View Profile</a></div></div>';

                                    $('.search-results').append(html);
                                }
                            }
                        }
                        index = index + 3;
                    }
                }
            }, 100);
        }
    });

    //Страна
    var selector = '#country-top';

    function dropCountry() {
        var pattern = $(selector).val();
        $('.location-drop span').each(function () {
            var search = $(this).text().indexOf(pattern) + 1;
            if (search == 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    }

    $(selector).focus(function () {
        dropCountry();
        $('.location-drop').show();
    }).blur(function () {
        setTimeout(function () {
            $('.location-drop').hide();
        }, 100);
        dropCountry();
    });

    $(document).on('input', selector, function () {
        dropCountry();
    });

    $(document).on('click', '.country', function () {
        var country = $(this).text();
        $(selector).val(country);
        dropCountry();
    });

    /*******************************Быстрый поиск******************************/
    function switcher(selector) {
        $(selector).each(function (index) {
            switch (index) {
                case 0:
                    var className = $(selector).eq(index).attr('class').split(' ');
                    if (className.length > 1) {
                        console.log('hello');
                        $(selector).eq(index).removeClass('active');
                        $(selector).eq(index + 1).addClass('active');
                    } else {
                        console.log('hi');
                        $(selector).eq(index).addClass('active');
                        $(selector).eq(index + 1).removeClass('active');
                    }
                    break;
            }
        });
    }

    $('#switch-holder-top').click(function () {
        switcher('#switch-holder-top span');
    });

    $(document).on('click', '#switch-holder-bottom', function () { switcher('#switch-holder-bottom span'); });

    function onlineStatus() {
        var newIndex;
        $('.switch-holder span').each(function (index) {
            var className = $(this).attr('class').split(' ');
            if (className.length > 1) {
                newIndex = index;
            }
        });
        return newIndex;
    }

    $('#search-top').click(function () {
        var data = {
            id: $('#id-top').val(),
            from: $('.price-range-min').text(),
            to: $('.price-range-max').text(),
            country: $('#country-top').val(),
            online: onlineStatus()
        };

        firstData = null;

        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/search/search',
            dataType: 'json',
            success: function (data) {
                var selector = '.search-results';
                var heightResults = Math.ceil(data.length/3) * 363;
                $(selector).animate({ 'height' : heightResults, 'opacity' : 0 }, 300);

                setTimeout(function () {
                    $(selector).empty();

                    setTimeout(function () {
                        for (var i = 0; i < data.length; i++) {
                            var html = '<div class="search-profile-block"><img src="' + baseUrl + 'content/profiles/avatars/' + data[i].id + '/' + data[i].avatar + '_avatar.jpg" alt="Profile photo" width="196" height="298" ><div class="search-profile-info"><strong>' + data[i].name + ', ' + '<span>' + data[i].birthday + '</span></strong><span>' + data[i].country_name + ', ' + data[i].city + '</span><em>Online</em><ul><li><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/messaging.png" width="23" height="23" alt="Send letter" /><span>Send Letter</span></a></li><li class="search-chat-invite"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/chat.png" width="25" height="25" alt="Invite to chat" /><span>Invite to chat</span></a></li><li class="search-send-gift"><a href="#"><img src="' + baseUrl + 'content/user_interface/img/main/gift-service.png" width="22" height="29" alt="Send gift" /><span>Send Gift</span></a></li></ul><a href="#" class="view-profile-button">View Profile</a></div></div>';

                            $(selector).append(html);
                        }
                    }, 200);
                }, 400);

                setTimeout(function () {
                    $(selector).animate({ 'height' : heightResults, 'opacity' : 1 }, 300);
                }, 600);
            }
        });
    });

    /******************************Расширенный поиск***************************/
    $.ajax({
        type: 'post',
        url: baseUrl + 'user_interface/search/cities',
        dataType: 'json',
        success: function (data) {
            if (data.cities.length > 0){
                $('#city').removeAttr('disabled');
            }
        }
    });

    $('.advanced-search-button').click(function () {
        $('.search').animate({'opacity': 'hide', 'height': '492px'}, 1000);
        setTimeout(function () {
            $('.advanced-search').animate({'opacity': 'show'}, 1000);
        }, 1000);
    });
});