$(document).ready(function(){
    var baseUrl = 'http://ukrainianrealbrides.int/';

  /************************************Log In***************************************/
    $('#login').click(function(){
  //Получение данных
        var data = {
            email: $('#login-user-email').val(),
            password: $('#login-user-password').val()
        };
console.log(data);
  //Проверка введенных данных на существование
        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/login',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    location.reload();
                }else{
                    alert(data.error);
                }
            }
        });
    });
});
