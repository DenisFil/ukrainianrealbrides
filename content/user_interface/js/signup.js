$(document).ready(function(){
    var baseUrl = 'http://ukrainianrealbrides.int/';

  /************************Добавление удаление классов****************************/
    //Добавление ксласснов и текста error`ов
        function addErrorClass (id, error){
            $(id + '-feedback').addClass('has-error');
            $(id + '-error').addClass('glyphicon-remove');
            $(id + '-error-text').text(error);
        }

    //Удалеие классов и текста error`ов
        function removeClass (id){
            $(id + '-feedback').removeClass('has-error');
            $(id + '-error').removeClass('glyphicon-remove');
            $(id + '-error-text').text('');
            $(id + '-feedback').removeClass('has-success');
            $(id + '-error').removeClass('glyphicon-ok');
        }

    //Добавление класса success
        function addSuccessClass(id){
            $(id + '-feedback').addClass('has-success');
            $(id + '-error').addClass('glyphicon-ok');
        }

  /************************Проверка правил валидации*******************************/
    //Обязательное заполнение поля
        function requiredField(data){
            if (data == ''){
                return 'Sorry, this field is required';
            }else{
                return true;
            }
        }

    //Проверка длины введенных данных
        function lengthField(length, id){
            if (length < 3 || length > 20){
                addErrorClass(id, 'Sorry, this field must be 3 to 20 symbols');
                $(id).focus(function(){
                    removeClass(id);
                });
            }else{
                addSuccessClass(id);
            }
        }

  /******************Проверка данных которые вводит пользователь******************/
    //Проверка имени юзера
        $('#user-name').blur(function(){
           var name = $(this).val();
           var id = '#user-name';
           var requiredResult = requiredField(name);
            if (requiredResult != true){
                addErrorClass(id, requiredResult);
            }else{
                var pattern = /^[a-zA-Z]+$/;
                if (name.search(pattern) != 0){
                    addErrorClass(id, 'Please enter your name in English');
                }else{
                    var length = name.length;
                    lengthField(length, id);
                }
            }
            $(this).focus(function(){
                removeClass(id);
            });
        });

    //Проверка email`a
        $('#user-email').blur(function(){
           var email = $(this).val();
           var id = '#user-email';
           var requiredResult = requiredField(email);
            if (requiredResult != true){
                addErrorClass(id, requiredResult);
            }else{
                if (email.indexOf('@') == -1){
                    addErrorClass(id, 'Please enter valid email');
                }else{
                    $.ajax({
                        type: 'post',
                        data: {email : email},
                        url: baseUrl + 'user_interface/signup/email',
                        dataType: 'json',
                        success: function(data){
                            if (data.result == 1){
                                addSuccessClass(id);
                            }else{
                                addErrorClass(id, 'User with this email already register');
                            }
                        }
                    })
                }
            }
            $(this).focus(function(){
                removeClass(id);
            });
        });

    //Проверка пароля
        $('#user-password').blur(function(){
            var password = $(this).val();
            var id = '#user-password';
            var requiredResult = requiredField(password);
            if (requiredResult != true) {
                addErrorClass(id, requiredResult);
            }else{
                var pattern = /^[a-zA-Z0-9]+$/;
                if (password.search(pattern) != 0){
                    addErrorClass(id, 'Please use letters and numbers only');
                }else{
                    var length = password.length;
                    lengthField(length, id);
                }
            }
            $(this).focus(function(){
                removeClass(id);
            });
        });

  /*****************************Отправка формы*********************************/
    $(document).on('click', '#signUp', function(){
        //Получение введенных данных
        var data = {
            name: $('#user-name').val(),
            email: $('#user-email').val(),
            password: $('#user-password').val()
        };
        var html = '<h3>Thank you!</h3><p>For complete registration we sent to your ' + data.email + ' mail.</p><p>Please check you email.</p>';

        //Запись в базу
        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/signup',
            dataType: 'json',
            success: function(data){
                if (data.result == 1){
                    $('#signup-form').empty();
                    $('#signup-form').append(html);
                }
            }
        });
   });
});
