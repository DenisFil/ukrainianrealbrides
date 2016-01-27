$(document).ready(function(){
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
        console.log(text);
        if(text == 0){
            $(this).parent().removeClass('points');
        }else{
            $(this).parent().addClass('points');
        }
    });
});