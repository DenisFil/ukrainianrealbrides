$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

    //Переход по вкладкам
    $('.nav-top').click(function () {
        $('.nav-top').each(function () {
            var classBlock = $(this).attr('class');
            classBlock = classBlock.split(' ');
            if (classBlock.length > 1) {
                $(this).removeClass('active');
            }
        });
        $(this).addClass('active');

        var index = $(this).index();
        var profilesType;
        if (index == 0) {
            profilesType = {user_status: 3};
        }
        if (index == 1) {
            profilesType = {user_status: 1};
        }
        if (index == 2) {
            profilesType = {user_status: 0};
        }
        if (index == 3) {
            profilesType = {user_status: 4};
        }
        if (index == 4) {
            profilesType = {user_status: 2};
        }
        $.ajax({
            type: 'post',
            data: profilesType,
            url: baseUrl + 'admin_interface/user_profiles/get_profiles_data',
            dataType: 'json',
            success: function (data) {
                $('#table-body').empty();
                $.each(data, function (key, value) {
                    var select;
                    if (value.user_status == 0) {
                        select = '<option selected>Не активная</option><option>Активная</option><option>Заблокирован</option>';
                    }
                    if (value.user_status == 1) {
                        select = '<option selected>Активная</option><option>Не активная</option><option>Заблокирован</option>';
                    }
                    if (value.user_status == 2) {
                        select = '<option selected>Заблокирован</option><option>Не активная</option><option>Активная</option>';
                    }
                    var html =  '<tr><td class="checkbox-column"><label><input type="checkbox" value=""></label></td><td>' + value.id + '</td><td><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + value.id + '" class="profile-link" target="_blank">' + value.name + '</a></td><td>' + value.country_name + '</td><td>' + value.agency + '</td><td>' + value.register_date + '</td><td>' + value.register_time + '</td><td class="action-select text-center form-group-sm"><select class="form-control">' + select + '</select><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalActionSuccess">Изменить</button></td><td class="credits-column text-center form-group-sm"><span class="bg-success credits-status">' + value.credits + ' Cr</span><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalCredits">Добавить / Снять</button></td></tr>';
                    $('#table-body').append(html);
                });
            }
        });
    });

    //Изменение статуса анкеты


    //Добавление партнера
    $('#agency-name, #password').blur(function () {
        var agencyName = $(this).val();
        var pattern = /^[a-zA-Z0-9]+$/;
        if (agencyName.search(pattern) != 0) {
            $(this).next().text('Поле заполнено не верно').css('visibility', 'visible');
        }
    }).focus(function () {
        $(this).next().css('visibility', 'hidden');
    });

    $(document).on('click', '#add-partner', function () {
        var data = {
            agency_name: $('#agency-name').val(),
            owner_name: $('#owner-name').val(),
            contact_name: $('#contact-name').val(),
            country: $('#country').val(),
            city: $('#city').val(),
            address: $('#address').val(),
            email: $('#email').val(),
            owner_number: $('#owner-number').val(),
            contact_number: $('#contact-number').val(),
            requisites: $('#requisites').val(),
            password: $('#password').val()
        };

        if ($('.error-message:eq(0)').text() == '' && $('.error-message:eq(9)').text() == '') {
            $.ajax({
                type: 'post',
                data: data,
                url: baseUrl + 'admin_interface/user_profiles/add_new_partner',
                dataType: 'json',
                success: function (data) {
                    
                }
            });
        }
    });
});