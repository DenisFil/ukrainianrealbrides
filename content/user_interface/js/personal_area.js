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

//Загрузка фото
    $('#avatar-photo').change(function(){
        var avatar = new FormData($('#avatar')[0]);
        $.ajax({
            type: 'post',
            processData: false,
            contentType: false,
            data: avatar,
            url: baseUrl + 'user_interface/personal_area/loading_avatar',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    $('.new-user-avatar').attr('src', data.link);
                    $('#avatar-link').click();
                    $('#target').Jcrop({
                        aspectRatio: 0.66,
                        minSize: [186, 281],
                        setSelect: [0, 0, 0, 0]
                    });

                    $(document).on('click', '#save-avatar', function() {
                        var coordinates = {
                            coordinates: $('.jcrop-current').attr('style'),
                            link: $('#target').attr('src')
                        };
                        console.log(coordinates);
                        $.ajax({
                            type: 'post',
                            data: coordinates,
                            url: baseUrl + 'user_interface/personal_area/crop_avatar',
                            dataType: 'json',
                            success: function (data) {
                                if (data.result == 1) {
                                    $('.exit').click();
                                    if (data.width < 260) {
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
});