$(document).ready(function(){
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

//Изменение ссылок online
    $('.inbox-online span').each(function(){
        var text = $(this).text();
        if(text == 0){
            $(this).parent().removeClass('points');
        }else{
            $(this).parent().addClass('points');
        }
    });

//Отправка приглашений друзьям
    $('#invite').click(function(){
        var data = {
            name: $('#user-name').val(),
            email: $('#user-email').val()
        };
        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/personal_area/invite_friend',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    location.reload();
                }
            }
        });
    });

/******************************Загрузка аватара************************************/
    $('#avatar-photo').change(function(){
        var avatar = new FormData($('#avatar')[0]);

        //Загрузка и сохранение фото
        $.ajax({
            type: 'post',
            processData: false,
            contentType: false,
            data: avatar,
            url: baseUrl + 'user_interface/personal_area/loading_avatar',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    //Кроп для аватара
                    $('.new-user-avatar').attr('src', data.link);
                    $('#avatar-link').click();
                    $('#target').Jcrop({
                        aspectRatio: 0.66,
                        minSize: [186, 281],
                        setSelect: [0, 0, 0, 0]
                    });

                    //Сохранение аватара
                    $(document).on('click', '#save-avatar', function() {
                        var coordinates = {
                            coordinates: $('.jcrop-current').attr('style'),
                            link: $('#target').attr('src')
                        };
                        $.ajax({
                            type: 'post',
                            data: coordinates,
                            url: baseUrl + 'user_interface/personal_area/crop_avatar',
                            dataType: 'json',
                            success: function (data) {
                                if (data.result == 1) {
                                    $('.exit').click();
                                    if (data.width < 260) {

                                        //Перестройка модального окна
                                        $('.modal-body h4').attr('style', 'width: 186px; display: inline-block;');
                                        $('.modal-body p').attr('style', 'width: 186px;');
                                    }
                                    $('#save-avatar').attr('id', 'save-preview');
                                    $('.modal-body h4').text('').text('Create your preview photo');
                                    $('.modal-body p').text('').text('Crop your preview photo here');
                                    $('.new-user-avatar').attr('src', data.link);
                                    $('.jcrop-active').attr('style', '').attr('style', 'width: ' + data.width + ';');
                                    setTimeout(function () {
                                        $('#avatar-link').click();
                                    }, 500);

                                    //Кроп preview фото
                                    $('#target').Jcrop({
                                        aspectRatio: 1,
                                        minSize: [100, 100],
                                        setSelect: [0, 0, 0, 0]
                                    });
                                    $('.jcrop-shades').attr('style', 'display: none;');
                                }
                            }
                        });
                    });

                    //Сохранение preview
                    $(document).on('click', '#save-preview', function(){
                        var crop = {
                            coordinates: $('.jcrop-current').attr('style')
                        };
                        $.ajax({
                            type: 'post',
                            data: crop,
                            url: baseUrl + 'user_interface/personal_area/crop_preview',
                            dataType: 'json',
                            success: function(data){
                                if (data.result == 1){
                                    location.reload();
                                }
                            }
                        });
                    });
                }
            }
        });
    });

/*********************************Загрузка фото***********************************/
    $('#upload-photo').change(function(){
        var photo = new FormData($('#photo')[0]);

        $.ajax({
            type: 'post',
            processData: false,
            contentType: false,
            data: photo,
            url: baseUrl + 'user_interface/personal_area/loading_photo',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    //Кроп для аватара
                    $('.new-user-avatar').attr('src', data.link);
                    $('#avatar-link').click();
                    $('#target').Jcrop({
                        aspectRatio: 1.69,
                        minSize: [196, 116],
                        setSelect: [0, 0, 0, 0]
                    });
                    var photoName = data.photo_name;

                    //Сохранение аватара
                    $(document).on('click', '#save-avatar', function() {
                        var coordinates = {
                            coordinates: $('.jcrop-current').attr('style'),
                            link: photoName
                        };
                        $.ajax({
                            type: 'post',
                            data: coordinates,
                            url: baseUrl + 'user_interface/personal_area/crop_photo',
                            dataType: 'json',
                            success: function (data) {
                                if (data.result == 1) {
                                    location.reload();
                                }
                            }
                        });
                    });
                }
            }
        });
    });

/********************************Просмотр фото************************************/
    $('.photo-view').click(function(){
        var link = $(this).children().attr('src');
        $('#user-photo').children().attr('src', link);
        var nextLink = $(this).parent().next().children().children().attr('src');
        $('#user-photo').attr('href', nextLink);
    });
});