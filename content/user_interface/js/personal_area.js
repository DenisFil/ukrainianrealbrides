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
        console.log('hello');
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
                    $('#new-user-avatar').attr('src', data.link);
                    $('#new-avatar').show();
                }
            }
        });
    });
});