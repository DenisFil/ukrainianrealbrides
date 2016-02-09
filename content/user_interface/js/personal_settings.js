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
    });

//Проверка обязательного заполнения поля
    function required(field){
        var value = $(field).val();

        if (value == ''){
            $('.error').text('Sorry, this field is required');
        }
    }

//Проверка введенных данных
    $('#user-name').blur(function(){

    });
});