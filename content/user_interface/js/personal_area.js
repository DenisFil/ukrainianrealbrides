$(document).ready(function(){
    $('.status-bar em').each(function(){
        var text = $(this).text();
        if (text == 0){
            $().removeClass('points');
        }
    });
});