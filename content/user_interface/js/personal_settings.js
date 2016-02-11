$(document).ready(function(){
    var baseUrl = 'http://ukrainianrealbrides.int/';

//Загрузка существующих данных
    $.ajax({
        type: 'post',
        url: baseUrl + 'user_interface/profile_settings/user_data',
        dataType: 'json',
        success: function(data){
            $('#user-name').val(data[0][0].name);
            $('#user-lastname').val(data[0][0].lastname);

            if (data[0][0].gender == 1 || data[0][0].gender == 0){
                $('#gender').val('Male');
            }
            if (data[0][0].gender == 2){
                $('#gender').val('Female');
            }
            if (data[1][0].country != 0){
                $('#user-country').val(data[1][0].country);
            }
            if (data[1][0].birthday){
                $('#day').val(data[1][0].birthday[0]);
                $('#month').val(data[1][0].birthday[1]);
                $('#year').val(data[1][0].birthday[2]);
            }
        }
    });

//Выбор страны
    var selector = '#user-country';

    function dropCountry(){
        var pattern =  $(selector).val();
        $('.location-drop span').each(function(){
            var search = $(this).text().indexOf(pattern) + 1;
            if (search == 0){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    }

    $(selector).focus(function(){
        $('.location-drop').show();
    });

    $(selector).blur(function(){
        setTimeout(function(){ $('.location-drop').hide(); }, 100);
        dropCountry();
    });

    $(document).on('input', selector, function(){
        dropCountry();
    });

    $(document).on('click', '.country', function(){
        var country = $(this).text();
        $(selector).val(country);
        dropCountry();
    });

//Проверка обязательного заполнения поля
    function required(field){
        var value = $(field).val();

        if (value == ''){
            $(field).next().text('Sorry, this field is required');
            $(field).addClass('error');
        }
    }

    function onFocus(field){
        $(field).next().text('');
        $(field).removeClass('error');
    }

    function requiredFromButton(indexSpan){
        $('.profile-form-row .form-error-message').each(function(index){
             if (index == indexSpan){
                 var selector = '.form-error-message';
                 $(selector).eq(index).text('Sorry, this field is required');
                 $(selector).eq(index).prev().addClass('error');
             }
        });
    }

//Проверка введенных данных
    $('#user-name, #user-country').blur(function(){
        var field = '#' + $(this).attr('id');
        required(field);
    }).focus(function(){
        var field = '#' + $(this).attr('id');
        onFocus(field);
    });

    $('#day, #month, #year').focus(function(){
        $('.birthday-block').next().text('');
    });

    $('.save, .next').click(function(){
        //Проверка заполнения даты рождения
        var birthday = {
            day: $('#day').val(),
            month: $('#month').val(),
            year: $('#year').val()
        };

        if (birthday.day == 'DD' || birthday.month == 'MM' || birthday.year == 'YYYY'){
            $('.birthday-block').next().text('Sorry, this field is required');
        }

        //Проверка заполнения полей формы
        var data = {
            name: $('#user-name').val(),
            lastname: $('#user-lastname').val(),
            gender: $('#gender').val(),
            birthday: birthday.day + '.' + birthday.month + '.' + birthday.year,
            country: $('#user-country').val()
        };

        var dataArray = [data.name, data.lastname, data.gender, data.birthday, data.country];

        $.each(dataArray, function(index, value){
            if (value == '' && index != 1){
                requiredFromButton(index);
            }
        });

        if ($('.form-error-message').text() == ''){
            $.ajax({
                type: 'post',
                data: data,
                url: baseUrl + 'user_interface/profile_settings/insert_data',
                dataType: 'json',
                success: function(data){
                    if (data.result == 1){
                        location.reload();
                    }
                }
            });
        }
    });
});