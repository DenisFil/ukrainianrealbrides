$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

//Загрузка существующих данных
    $.ajax({
        type: 'post',
        url: baseUrl + 'user_interface/profile_settings/user_data',
        dataType: 'json',
        success: function (data) {

            $('#user-name').val(data[0][0].name);
            $('#user-lastname').val(data[0][0].lastname);
            $('#email-change').val(data[0][0].email);

            if (data[0][0].gender == 1 || data[0][0].gender == 0) {
                $('#gender').val('Male');
            }
            if (data[0][0].gender == 2) {
                $('#gender').val('Female');
            }
            if (data[1][0].country != 0) {
                $('#user-country').val(data[1][0].country);
            }
            if (data[1][0].birthday != 0) {
                $('#day').val(data[1][0].birthday[0]);
                $('#month').val(data[1][0].birthday[1]);
                $('#year').val(data[1][0].birthday[2]);
            }
            $('#height').val(data[1][0].height);
            $('#weight').val(data[1][0].weight);
            $('#eyes').val(data[1][0].eyes_color);
            $('#hair').val(data[1][0].hair_color);
            $('#children').val(data[1][0].children);
            $('#religion').val(data[1][0].religion);
            $('#education').val(data[1][0].education);
            $('#drinking').val(data[1][0].drinking);
            $('#smoking').val(data[1][0].smoking);
            $('#hobbies').val(data[1][0].hobbies);
            $('#about').val(data[1][0].about_me);
            if (data[2]) {
                $('#partner-children').val(data[2][0].partner_children);
                $('#partner-drinking').val(data[2][0].partner_drinking);
                $('#partner-smoking').val(data[2][0].partner_smoking);
                $('#about-my-partner').val(data[2][0].about_my_partner);
            }

            /*if (data[0][0].social_network == ''){
                $('#email-change, #new-password, #confirm-new-password').removeAttr('disabled');
            }*/
        }
    });

//Выбор страны
    var selector = '#user-country';

    function dropCountry() {
        var pattern = $(selector).val();
        $('.location-drop span').each(function () {
            var search = $(this).text().indexOf(pattern) + 1;
            if (search == 0) {
                $(this).hide();
            } else {
                $(this).show();
            }
        });
    }

    $(selector).focus(function () {
        dropCountry();
        $('.location-drop').show();
    });

    $(selector).blur(function () {
        setTimeout(function () {
            $('.location-drop').hide();
        }, 100);
        dropCountry();
    });

    $(document).on('input', selector, function () {
        dropCountry();
    });

    $(document).on('click', '.country', function () {
        var country = $(this).text();
        $(selector).val(country);
        dropCountry();
    });

//Проверка обязательного заполнения поля
    function required(field) {
        var value = $(field).val();

        if (value == '') {
            $(field).next().text('Sorry, this field is required');
            $(field).addClass('error');
        }
    }

    function onFocus(field) {
        $(field).next().text('');
        $(field).removeClass('error');
    }

    function requiredFromButton(indexSpan) {
        $('.profile-form-row .form-error-message').each(function (index) {
            if (index == indexSpan) {
                var selector = '.form-error-message';
                $(selector).eq(index).text('Sorry, this field is required');
                $(selector).eq(index).prev().addClass('error');
            }
        });
    }

//Проверка введенных данных
    $('#user-name, #user-country').blur(function () {
        var field = '#' + $(this).attr('id');
        required(field);
    }).focus(function () {
        var field = '#' + $(this).attr('id');
        onFocus(field);
    });

    $('#day, #month, #year').focus(function () {
        $('.birthday-block').next().text('');
    });

/****************************Вкладка Security************************************/
    //Активация кнопки
    $(document).on('input', '#email-change, #new-password, #confirm-new-password', function(){
        var selector = '#' + $(this).attr('id');
        if (selector === '#email-change'){
            $('#email-change').next().removeClass('btn-default').addClass('btn-success');
        }else{
            $('#confirm-new-password').next().removeClass('btn-default').addClass('btn-success');
        }
    });

    //Изменение Email`a
    function emailChange(){
        var selector = '#email-change';
        var newEmail = {
            email: $(selector).val()
        };
        var pattern = '@';
        var search = newEmail.email.indexOf(pattern) + 1;
        $(selector).focus(function(){
            $(selector).removeClass('error').parent().next().text('');
        });
            if (search == 0){
                $(selector).addClass('error').parent().next().text('Please enter valid email');
            }else{
                $.ajax({
                    type: 'post',
                    data: newEmail,
                    url: baseUrl + 'user_interface/profile_settings/change_email',
                    dataType: 'json',
                    success: function(data){
                        if (data.result == 1){
                            $('.nav-tabs li').each(function (index) {
                                var className = $(this).attr('class');
                                if (className == 'active') {
                                    $('.save-message-block').text('Request for change email was submitted. Please check your new email to confirm it.');
                                    $('.tab-body').eq(index).children().next().next().addClass('successfully-saved');
                                    $('#email-change').next().addClass('btn-default').removeClass('btn-success');
                                }
                            });
                        }
                    }
                });
            }
    }

    //Изменение данных
    $('.change-button').click(function(){
        var buttonStatus = $(this).attr('class');
        buttonStatus = buttonStatus.split(' ');
        if (buttonStatus[2] == 'btn-success'){
            var change = $(this).prev().attr('id');
            if (change == 'email-change'){
                emailChange();
            }else{
                passwordChange();
            }
        }
    });

//Запись в БД
    function ajaxRequest(data, dataName) {
        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/profile_settings/insert_' + dataName + '_data',
            dataType: 'json',
            success: function (data) {
                if (data.result == 1){
                    $('.nav-tabs li').each(function (index) {
                        var className = $(this).attr('class');
                        if (className == 'active') {
                            $('.tab-body').eq(index).children().next().next().addClass('successfully-saved');
                        }
                    });
                }
            }
        });
    }

    function saveData(index) {
        switch (index) {
            case 0:
                var birthday = {
                    day: $('#day').val(),
                    month: $('#month').val(),
                    year: $('#year').val()
                };

                if (birthday.day == 'DD' || birthday.month == 'MM' || birthday.year == 'YYYY') {
                    $('.birthday-block').next().text('Sorry, this field is required');
                }

                var generalData = {
                    name: $('#user-name').val(),
                    lastname: $('#user-lastname').val(),
                    gender: $('#gender').val(),
                    birthday: birthday.day + '.' + birthday.month + '.' + birthday.year,
                    country: $('#user-country').val()
                };

                var dataArray = [generalData.name, generalData.lastname, generalData.gender, generalData.birthday, generalData.country];

                $.each(dataArray, function (index, value) {
                    if (value == '' && index != 1) {
                        requiredFromButton(index);
                    }
                });
                var dataName = 'general';
                ajaxRequest(generalData, dataName);
                break;
            case 1:
                var personalData = {
                    height: $('#height').val(),
                    weight: $('#weight').val(),
                    eyes_color: $('#eyes').val(),
                    hair_color: $('#hair').val(),
                    children: $('#children').val(),
                    religion: $('#religion').val()
                };
                dataName = 'personal';
                ajaxRequest(personalData, dataName);
                break;
            case 2:
                var backgroundData = {
                    education: $('#education').val(),
                    drinking: $('#drinking').val(),
                    smoking: $('#smoking').val(),
                    hobbies: $('#hobbies').val(),
                    about_me: $('#about').val()
                };
                dataName = 'background';
                ajaxRequest(backgroundData, dataName);
                break;
            case 3:
                var ageRange = {
                    from: $('.price-range-min').text(),
                    to: $('.price-range-max').text()
                };
                var partnerData = {
                    age: ageRange.from + '/' + ageRange.to,
                    partner_children: $('#partner-children').val(),
                    partner_drinking: $('#partner-drinking').val(),
                    partner_smoking: $('#partner-smoking').val(),
                    about_my_partner: $('#about-my-partner').val()
                };
                dataName = 'partner';
                ajaxRequest(partnerData, dataName);
                break;
        }
    }

    function checkErrors() {
        var result;
        $('.form-error-message').each(function (index) {
            if ($('.form-error-message').eq(index).text() != ''){
                result = 0;
                return false;
            }else{
                result = 1;
            }
        });
        return result;
    }

    function tabChange(direction) {
        $('.nav-tabs li').each(function (index) {
            var className = $(this).attr('class');
            if (className == 'active') {
                if (direction == 'next') {
                    $('.nav-tabs li').eq(index).next().children().click();
                } else {
                    $('.nav-tabs li').eq(index).prev().children().click();
                }
                $('body').animate({'scrollTop': 170}, 'slow');
                return false;
            }
        });
    }

    $('.save').click(function () {
        var errors = checkErrors();
        if (errors == 1){
            $('.nav-tabs li').each(function (index) {
                var className = $(this).attr('class');
                if (className == 'active') {
                    saveData(index);
                }
            });
        }else{
            return false;
        }

    });

    $('.next').click(function () {
        var errors = checkErrors();
        if (errors == 1){
            $('.nav-tabs li').each(function (index) {
                var className = $(this).attr('class');
                if (className == 'active') {
                    $('.tab-body').eq(index + 1).children().next().next().removeClass('successfully-saved');
                    saveData(index);
                }
            });

            setTimeout(function() { tabChange('next'); }, 2000);
        }
    });

    $('.prev').click(function () {
        var errors = checkErrors();
        if (errors == 1){
            $('.nav-tabs li').each(function (index) {
                var className = $(this).attr('class');
                if (className == 'active') {
                    $('.tab-body').eq(index - 1).children().next().next().removeClass('successfully-saved');
                    saveData(index);
                }
            });

            setTimeout(function() { tabChange('prev'); }, 2000);
        }
    });
});