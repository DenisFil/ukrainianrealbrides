$(document).ready(function(){
    var baseUrl = 'http://ukrainianrealbrides.int/';

    /****************************Смена модальных окон******************************/
        function changeModal(window){
            $('.exit').click();
            setTimeout(function(){$('#' + window + '-button').click();}, 500);
        }

        $('#login-modal-start').click(function(){
            var window = $(this).attr('name');
            changeModal(window);
        });

        $('#signup-modal-start').click(function(){
            var window = $(this).attr('name');
            changeModal(window);
        });

  /************************Добавление удаление классов****************************/
    //Добавление ксласснов и текста error`ов
        function addErrorClass (id, error){
            $(id).addClass('error');
            $(id + '-error-text').text(error);
        }

    //Удалеие классов и текста error`ов
        function removeClass (id){
            $(id).removeClass('error');
            $(id + '-error-text').text('');
        }

    //Добавление класса success
        function addSuccessClass(id){
            $(id).addClass('success');
        }

    //Обычное отображение пароля
        function viewPassword(window){
            var type = $('#' + window + 'user-password').attr('type');
            if (type == 'password'){
                $('#' + window + 'user-password').attr('type', 'text');
            }else{
                $('#' + window + 'user-password').attr('type', 'password');
            }
        }

        $('.icon').click(function(){
            var window = $(this).attr('name');
                if (window != ''){
                    window = window + '-';
                }
            viewPassword(window);
        });

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

    //Проверка приглашения
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

  /*****************************Отправка формы*********************************/
  //Обработчик фомы регистрации
        function userSignup(){
          //Проверка приглашения
          var letter = getUrlVars();
          var invite;
              if (letter.invite_code){
                  invite = 1;
              }else{
                  invite = 0;
              }
          //Получение введенных данных
          var data = {
              name: $('#user-name').val(),
              email: $('#user-email').val(),
              password: $('#user-password').val(),
              invite: ''
          };
            if (invite == 1){
                data.invite = letter.invite_code;
            }
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
        }

  //Обработчик формы авторизации
        function userLogin(){
            //Получение данных
            var data = {
                email: $('#login-user-email').val(),
                password: $('#login-user-password').val()
            };

            //Проверка введенных данных на существование
            $.ajax({
                type: 'post',
                data: data,
                url: baseUrl + 'user_interface/login',
                dataType: 'json',
                success: function(data){
                    if (data.result == 1){
                        if (data.user_status == 0) {
                            location.replace(baseUrl + 'user_interface/profile_settings');
                        } else {
                            location.replace(baseUrl + 'user_interface/personal_area');
                        }
                    }else{
                        alert(data.error);
                    }
                }
            });
        }

  //Отправка формы по клику
        $(document).on('click', '#signUp', function(){
        userSignup();
    });

        $('#login').click(function(){
        userLogin();
    });

  //Отправка формы по нажатию Enter`a
        $(document).on('keydown', function(e){
        if (e.keyCode === 13) {
            var display = $('#signUp-modal').css('display');
            console.log(display);
            if (display == 'block'){
                userSignup();
            }else{
                userLogin();
            }
        }
    });

  /******************************Google авторизация****************************/
        $('#google-signup, #google-signup-login').click(function(){
        initGapi();

        function initGapi()
        {
            gapi.load('auth2', function()
            {
                GoogleAuth = gapi.auth2.init({
                    client_id: '146371657817-gtln93fv8s6l781t0sh564e3av0fprug.apps.googleusercontent.com',
                    scope: 'https://www.googleapis.com/auth/plus.me'
                });

                GoogleAuth.isSignedIn.listen(function(isSignedIn)
                {
                    if(isSignedIn)
                    {
                        onSignIn();
                    }
                    else
                    {
                        console.log('listener say false');
                    }
                });

                GoogleAuth.signIn().then(onFailure);
            });
        }

        function onSignIn()
        {
            var googleUser = GoogleAuth.currentUser.get();
            console.log(googleUser);
            var profile = googleUser.getBasicProfile();
            console.log(profile);
            var userData = {
                name: profile.getName(),
                email: profile.getEmail()
            };
            $.ajax({
                type: 'post',
                data: userData,
                url: baseUrl + 'user_interface/signup/google_signup',
                dataType: 'json',
                success: function(data){
                    if (data.result === true){
                        location.replace(baseUrl + 'user_interface/personal_area');
                    }else{
                        alert('User with this email already register');
                    }
                }
            });
        }

        function onFailure(error)
        {
            console.log(error);
        }
    });
});
