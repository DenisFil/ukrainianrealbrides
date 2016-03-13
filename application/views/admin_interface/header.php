<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/admin_interface/css/header.css" type="text/css" />

  </head>
  <body>

  <header id="header">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Admin panel</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li>
              <a href="#">Анкеты <span class="bg-success notification-number">0</a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Сервисы <span class="bg-success notification-number">0</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Подарки</a></li>
                <li><a href="#">Туры</a></li>
                <li><a href="#">Переписка</a></li>
                <li><a href="#">Диалог / Чат</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Администрация <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Админы</a></li>
                <li><a href="#">Партнеры</a></li>
                <li><a href="#">Операторы</a></li>
                <li><a href="#">Рассылка</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Техподдержка <span class="bg-success notification-number">0</span><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Партнеры</a></li>
                <li><a href="#">Пользователи</a></li>
                <li><a href="#">Операторы</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Аналитика <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Финансы</a></li>
                <li><a href="#">Пользователи</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="#" title="Настройки">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
            </li>
            <li>
              <a href="#" title="На главную">
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
    </nav>
  </header>


  