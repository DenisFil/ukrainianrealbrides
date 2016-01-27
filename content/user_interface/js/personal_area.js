$(document).ready(function(){
//Изменение иконок в header`e
    $('.status-bar em').each(function(){
        var text = $(this).text();
        var cell = $(this).attr('name');
        if (text == 0){
            $('.' + cell + '-status').removeClass('points');
        }else{
            $('.' + cell + '-status').addClass('points');
        }
    });
});