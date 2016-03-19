$(document).ready(function () {
    var baseUrl = 'http://ukrainianrealbrides.int/';

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
                    var html =  '<tr><td class="checkbox-column"><label><input type="checkbox" value=""></label></td><td>' + value.id + '</td><td><a href="' + baseUrl + 'user_interface/user_profile_preview?id=' + value.id + '" class="profile-link" target="_blank">' + value.name + '</a></td><td>' + value.country_name + '</td><td>' + value.agency + '</td><td>' + value.register_date + '</td><td>' + value.register_time + '</td><td class="action-select"><div class="form-group-sm"><select class="form-control">' + select + '</select><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalActionSuccess">Изменить</button></div></td><td class="credits-column"><div class="form-group-sm"><span class="bg-success credits-status">' + value.credits + ' Cr</span><button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalCredits">Добавить / Снять</button></div></td></tr>';
                    $('#table-body').append(html);
                });
            }
        });
    });
});