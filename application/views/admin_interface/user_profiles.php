<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12s">
            <ul class="nav nav-justified nav-pills">
                <li role="presentation" class="nav-top active">
                    <a role="button" type="button">Все</a>
                </li>
                <li role="presentation" class="nav-top">
                    <a role="button" type="button">Активные
                        <span class="bg-danger profiles-notification">
                            <?php echo $active; ?>
                        </span>
                    </a>
                </li>
                <li role="presentation" class="nav-top">
                    <a role="button" type="button">Неактивные
                        <span class="bg-danger profiles-notification">
                            <?php echo $anactive; ?>
                        </span>
                    </a>
                </li>
                <li role="presentation" class="nav-top">
                    <a role="button" type="button">Проверить
                        <span class="bg-danger profiles-notification">1</span>
                    </a>
                </li>
                <li role="presentation" class="nav-top">
                    <a role="button" type="button">Заблокированные
                        <span class="bg-danger profiles-notification">
                            <?php echo $locked; ?>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
        <!--
                <div class="col-lg-3">
                            <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Поиск">
                    </div>
                    <button type="submit" class="btn btn-default">Найти</button>
                  </form>
                </div>
        -->
    </div>
    <div class="row property-row">
        <div class="col-md-10">
            <div class="form-group select-property">
                <select class="form-control" id="#">
                    <option>Пол</option>
                    <option>Мужчина</option>
                    <option>Женщина</option>
                </select>
            </div>
            <div class="form-group select-property">
                <select class="form-control" id="#">
                    <option>Агенство</option>
                    <option>Happy Brides</option>
                </select>
            </div>
            <div class="datepicker-holder">
                <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                    <input class="form-control" type="text" readonly/>
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                </div>
            </div>
            <button class="btn btn-success btn-show">Показать</button>
        </div>


    </div>
</div>
<div class="container-fluid table-holder">
    <table id="profiles-data" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>

        <tr>
            <th></th>
            <th>ID</th>
            <th>Имя</th>
            <th>Страна</th>
            <th>Агенство (id)</th>
            <th>Дата регистрации</th>
            <th>Время регистрации</th>
            <th>Статус</th>
            <th>Баланс счёта</th>
        </tr>
        </thead>
        <tfoot>
        <th></th>
        <th>ID</th>
        <th>Имя</th>
        <th>Страна</th>
        <th>Агенство (id)</th>
        <th>Дата регистрации</th>
        <th>Время регистрации</th>
        <th>Статус</th>
        <th>Баланс счёта</th>
        </tfoot>
        <tbody id="table-body">
        <?php foreach ($users_all_data as $value): ?>
            <tr>
                <td class="checkbox-column">
                    <label><input type="checkbox" value=""></label>
                </td>
                <td><?php echo $value->id; ?></td>
                <td>
                    <a href="<?php echo base_url(); ?>user_interface/user_profile_preview?id=<?php echo $value->id; ?>" class="profile-link" target="_blank"><?php echo $value->name; ?></a>
                </td>
                <td><?php echo $value->country_name; ?></td>
                <td><?php echo $value->agency; ?></td>
                <td><?php echo $value->register_date; ?></td>
                <td><?php echo $value->register_time; ?></td>
                <td class="action-select">
                    <div class="form-group-sm">
                        <select class="form-control">
                            <?php if ($value->user_status == 0): ?>
                                <option selected>Не активная</option>
                                <option>Активная</option>
                                <option>Заблокирован</option>
                            <?php elseif ($value->user_status == 1): ?>
                                <option selected>Активная</option>
                                <option>Не активная</option>
                                <option>Заблокирован</option>
                            <?php else: ?>
                                <option selected>Заблокирован</option>
                                <option>Не активная</option>
                                <option>Активная</option>
                            <?php endif; ?>
                        </select>
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalActionSuccess">Изменить</button>
                    </div>
                </td>
                <td class="credits-column">
                    <div class="form-group-sm">
                        <span class="bg-success credits-status"><?php echo $value->credits; ?> Cr</span>
                        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalCredits">Добавить / Снять</button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        <!--<tr>
            <td class="checkbox-column">
                  <label><input type="checkbox" value=""></label>
            </td>
            <td>1</td>
            <td>Anya Lyashenko</td>
            <td>Ukraine</td>
            <td>none</td>
            <td>12/07/2015</td>
            <td>11:12:00</td>
            <td class="action-select">
                <div class="form-group-sm">
                  <select class="form-control" id="#">
                    <option>Активная</option>
                    <option>Не активная</option>
                    <option>Заблокировать</option>
                  </select>
                  <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalActionSuccess">Изменить</button>
                </div>
            </td>
            <td class="credits-column">
                <div class="form-group-sm">
                    <span class="bg-success credits-status">500 Cr</span>
                    <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-target="#modalCredits">Добавить / Снять</button>
                </div>
            </td>
        </tr>-->
        </tbody>
    </table>
</div>


<div class="modal fade" id="modalProfileInfo" tabindex="-1" role="dialog" aria-labelledby="#">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center">Информация</h3>
            </div>
            <div class="modal-body text-left">
                <div class="row text-center">
                    <h2>Anna Lyashenko</h2>
                </div>
                <div class="row text-center">
                    <h4>ID 001</h4>
                </div>
                <h4>E-mail: ann_l@gmail.com</h4>
                <h4>Телефон: +38 050 000 00 01</h4>
                <a href="#" type="button">
                    <img src="http://blog.atlasrfidstore.com/wp-content/uploads/2014/06/biometric-passport.png" alt="#"
                         class="img-thumbnail" width="268">
                </a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCredits" tabindex="-1" role="dialog" aria-labelledby="#">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">Кредиты</h3>
            </div>
            <div class="modal-body text-left">
                <div class="row text-center profileName">
                    <h2>Jacob Green</h2>
                </div>
                <div class="row text-center">
                    <h4>ID 201</h4>
                </div>
                <h4>Текущий баланс: <span class="bg-success">200 cr</span></h4>
                <h4>Выберите действие:</h4>
                <div class="radio">
                    <label><input type="radio" name="optradio">Начислить</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="optradio">Снять</label>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="#" placeholder="Введите сумму">
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" value="">Добавить сообщение</label>
                </div>
                <div class="form-group">
                    <form action="#">
                        <input type="text" class="form-control messageSubject" id="" placeholder="Тема сообщения"
                               disabled>
                        <textarea class="form-control" rows="3" placeholder="Введите текст" disabled></textarea>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreditsSuccess"
                        data-dismiss="modal" aria-label="Close">Выполнить
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalCreditsSuccess" tabindex="-1" role="dialog" aria-labelledby="#">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">Кредиты</h3>
            </div>
            <div class="modal-body">
                <h4>Операция успешно выполнена</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="#">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">$Действие</h3>
            </div>
            <div class="modal-body text-center action-dialog">
                <h5>Вы собираетесь $действие</h5>
                <h4>анкету Nelly Thompson ID 098</h4>
                <div class="checkbox text-left">
                    <label><input type="checkbox" value="">Добавить сообщение</label>
                </div>
                <div class="form-group">
                    <form action="#">
                        <input type="text" class="form-control messageSubject" id="#" placeholder="Тема сообщения"
                               disabled>
                        <textarea class="form-control" rows="3" resize="none" placeholder="Введите текст"
                                  disabled></textarea>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalActionSuccess"
                        data-dismiss="modal" aria-label="Close">Выполнить
                </button>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalActionSuccess" tabindex="-1" role="dialog" aria-labelledby="#">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title text-center" id="myModalLabel">Информация</h3>
            </div>
            <div class="modal-body">
                <h4>Операция успешно выполнена</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">
                    Закрыть
                </button>
            </div>
        </div>
    </div>
</div>