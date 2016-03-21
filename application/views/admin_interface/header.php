<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link media="all" rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/admin_interface/css/header.css" type="text/css"/>
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/admin_interface/css/user_profiles.css" type="text/css"/>
    <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/admin_interface/css/add_user.css" type="text/css"/>
</head>
<body>

<div id="header">
    <div class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>admin_interface/main_admin">Панель администратора</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url(); ?>admin_interface/user_profiles">Анкеты <span
                                class="bg-success notification-number">0</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Сервисы <span class="bg-success notification-number">0</span><span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Подарки</a></li>
                            <li><a href="#">Туры</a></li>
                            <li><a href="#">Переписка</a></li>
                            <li><a href="#">Диалог / Чат</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Администрация <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Админы</a></li>
                            <li><a href="#">Партнеры</a></li>
                            <li><a href="#">Операторы</a></li>
                            <li><a href="#">Рассылка</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Техподдержка <span class="bg-success notification-number">0</span><span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Партнеры</a></li>
                            <li><a href="#">Пользователи</a></li>
                            <li><a href="#">Операторы</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Аналитика <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Финансы</a></li>
                            <li><a href="#">Пользователи</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#add-agency-modal" data-toggle="modal" class="add-agency-link">+ Добавить агенство</a>
                    </li>
                    <li>
                        <a href="#" title="Настройки">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>" title="На главную">
                            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#" title="Выход из админ панели">
                            <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                        </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div>
</div>

<div class="modal fade" id="add-agency-modal" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center">Добавить агенство</h3>
      </div>
      <div class="modal-body">
      <div class="container-fluid text-center modal-col">
        <div class="col-md-12 modal-col">
            <div class="col-md-4 modal-col">
                <h4>Общ. инфо</h4>
                <input type="text" class="form-control" placeholder="Название агенства">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="ФИО владельца">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="ФИО контактоного лица">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="Страна">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="Город">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="Адрес">
                <span class="error-message">Error message</span>
            </div>
            <div class="col-md-4 modal-col">
                <h4>Контакты</h4>
                <input type="text" class="form-control" placeholder="Email адрес">
                <span class="error-message">Error message</span> 
                <input type="text" class="form-control" placeholder="Телефон владельца">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="Телефон конт. лица">
                <span class="error-message">Error message</span>
                <textarea name="" id="" cols="1" rows="6" class="form-control requisite" placeholder="Реквизиты"></textarea>
            </div>
            <div class="col-md-4 modal-col text-left">
                <h4 class="text-center">Безопасность</h4>
                <input type="text" class="form-control" placeholder="Пароль">
                <span class="error-message">Error message</span>
                <input type="text" class="form-control" placeholder="Повт. пароль">
                <span class="error-message">Error message</span>
                <button class="btn btn-primary btn-pass disabled-button">Изменить пароль</button>
                <h4 class="text-center mail-notific">E-mail оповещения</h4>
                <div class="checkbox">
                    <label for=""><input type="checkbox" checked>Акции</label>
                </div>
                <div class="checkbox">
                    <label for=""><input type="checkbox" checked>Обновления</label>
                </div>
                <div class="checkbox">
                    <label for=""><input type="checkbox" checked>Сообщения</label>
                </div>
                <button class="btn btn-primary">Добавить партнера</button>
            </div>
        </div>    
      </div>
      </div>
        <div class="modal-footer">
            <h5 class="text-center">С <a href="#">"Условиями использования"</a> и <a href="#">"Политикой конфинденциальности"</a> согласен</h5>  
        </div>
    </div>

  </div>
</div>

  