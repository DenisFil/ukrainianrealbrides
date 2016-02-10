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
        }
    });

//Выбор страны
    var selector = '#user-country';

    $(selector).focus(function(){
        $('.location-drop').show();
    });

    $(selector).blur(function(){
        setTimeout(function(){ $('.location-drop').hide(); }, 100);
        var pattern =  $(selector).val();
        $('.location-drop span').each(function(){
            var search = $(this).text().indexOf(pattern) + 1;
            if (search == 0){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });

    $(document).on('input', selector, function(){
        var pattern =  $(selector).val();
        $('.location-drop span').each(function(){
            var search = $(this).text().indexOf(pattern) + 1;
                if (search == 0){
                    $(this).hide();
                }else{
                    $(this).show();
                }
        });
    });

    $(document).on('click', '.country', function(){
        var country = $(this).text();
        $(selector).val(country);
        var pattern =  $(selector).val();
        $('.location-drop span').each(function(){
            var search = $(this).text().indexOf(pattern) + 1;
            if (search == 0){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });

//Проверка обязательного заполнения поля
    function required(field){
        var value = $(field).val();

        if (value == ''){
            $('.error').text('Sorry, this field is required');
        }
    }

    function requiredFromButton(indexSpan){
        $('.profile-form-row .error').each(function(index){
             if (index == indexSpan){
                 $(this).text('Sorry, this field is required');
             }
        });
    }

//Проверка введенных данных
    $('#user-name').blur(function(){
        required('#user-name');
    });

    $('#user-country').blur(function(){
        required('#user-country');
    });

    $('.save, .next').click(function(){
        var data = {
            name: $('#user-name').val(),
            lastname: $('#user-lastname').val(),
            gender: $('#gender').val(),
            day: $('#day').val(),
            month: $('#month').val(),
            year: $('#year').val(),
            country: $('#user-country').val()
        };

        /*$.each(data, function(index, value){
            if (value == '' && index != 1){
                requiredFromButton(index);
            }

        });*/
        console.log(data);
    });
});