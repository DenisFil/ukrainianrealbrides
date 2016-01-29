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
                        setSelect: [275, 100, 400, 300]
                    });

                    $('#save-avatar').click(function(){
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