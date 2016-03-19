<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin panel sign in</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link media="all" rel="stylesheet" href="<?php echo base_url(); ?>content/admin_interface/css/login.css" type="text/css"/>
    </head>

  <body>
    <div class="container">
      <form class="form-signin">
        <a href="#" class="logo">
            <img src="<?php echo base_url(); ?>content/admin_interface/img/logo.png" alt="Ukrainian real brides" width="177" height="68">
        </a>
        <h3 class="text-center">Вход в админ панель</h3>
        <label for="login" class="sr-only">Логин</label>
        <input type="text" id="login" class="form-control" placeholder="Логин" autofocus>
        <label for="password" class="sr-only">Пароль</label>
        <input type="password" id="password" class="form-control" placeholder="Пароль">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Запомнить меня
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </body>
</html>