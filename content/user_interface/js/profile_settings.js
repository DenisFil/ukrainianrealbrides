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
            if (data[1][0].birthday != 0){
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
            /*if (data[2]){
                $('#partner-children').val(data[2][0].partner_children);
                $('#partner-drinking').val(data[2][0].partner_drinking);
                $('#partner-smoking').val(data[2][0].partner_smoking);
                $('#about-my-partner').val(data[2][0].about_my_partner);
            }*/
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

//Запись в БД
    function ajaxRequest(data, dataName){
        $.ajax({
            type: 'post',
            data: data,
            url: baseUrl + 'user_interface/profile_settings/insert_' + dataName + '_data',
            dataType: 'json',
            success: function(data){

            }
        });
    }

    $('.save').click(function(){
        $('.nav-tabs li').each(function(index){
            var className = $(this).attr('class');
            if (className == 'active'){

                switch (index){
                    case 0:
                        var birthday = {
                            day: $('#day').val(),
                            month: $('#month').val(),
                            year: $('#year').val()
                        };

                        if (birthday.day == 'DD' || birthday.month == 'MM' || birthday.year == 'YYYY'){
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

                        $.each(dataArray, function(index, value){
                            if (value == '' && index != 1){
                                requiredFromButton(index);
                            }
                        });

                        $('.form-error-message').each(function(){
                            var text = $(this).text();
                            if (text != ''){
                                return false;
                            }
                            return false;
                        });

                        $.ajax({
                            type: 'post',
                            data: generalData,
                            url: baseUrl + 'user_interface/profile_settings/insert_general_data',
                            dataType: 'json',
                            success: function(data){
                                if (data.result == 1){
                                    location.reload();
                                }
                            }
                        });
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
                        var dataName = 'personal';
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
                            partner_children: $('#partner-children'),
                            partner_drinking: $('#partner-drinking'),
                            partner_smoking: $('#partner-smoking'),
                            about_my_partner: $('#about-my-partner')
                        };
                        dataName = 'partner';
                        ajaxRequest(partnerData, dataName);
                        break;
                }
            }
        });
    });

    function tabChange(direction){
        $('.nav-tabs li').each(function(index){
            var className = $(this).attr('class');
            if (className == 'active'){
                if (direction == 'next'){
                    $('.nav-tabs li').eq(index).next().children().click();
                }else{
                    $('.nav-tabs li').eq(index).prev().children().click();
                }
                $('body').animate({'scrollTop' : 170}, 'slow');
                return false;
            }
        });
    }

    $('.next').click(function(){
        tabChange('next');
    });

    $('.prev').click(function(){
        tabChange('prev');
    });
});