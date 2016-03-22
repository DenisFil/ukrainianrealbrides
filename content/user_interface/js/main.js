$(document).ready(function(){
    var baseUrl = 'http://ukrainianrealbrides.int/';

    $('.to-service-button').delay(2000);

    function getUrlVars(){
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for(var i = 0; i < hashes.length; i++)
        {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    }

    var letter = getUrlVars();
        if (letter.name){
            $('#signup-button').click();
            $('#user-name').val(letter.name);
            $('#user-email').val(letter.email);
        }

//Нижняя форма для регистрации
    $('.subscribe-button').click(function(){
        var email = {
            email: $('.email').val()
        };
        $.ajax({
            type: 'post',
            data: email,
            url: baseUrl + 'user_interface/signup/email',
            dataType: 'json',
            success: function(data){
                if (data.result == 0){
                    $('#login-button').click();
                    $('#login-user-email').val(email.email);
                }else{
                    $('#signup-button').click();
                    $('#user-email').val(email.email);
                }
            }
        });
    });

    $('.to-service-button').click(function () {
        $('body').css('padding-right', '0px');
        $('.exit').click();
    });
});
