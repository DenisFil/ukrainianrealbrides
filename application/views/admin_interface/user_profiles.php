<div class="container-fluid">
	<div class="row">
		<div class="col-lg-9">
			<ul class="nav nav-justified nav-pills">
			  <li role="presentation" class="active"><a href="#">Все</a></li>
			  <li role="presentation"><a href="#">Активные <span class="bg-danger profiles-notification">1</span></a> </li>
			  <li role="presentation"><a href="#">Неактивные <span class="bg-danger profiles-notification">1</span></a></li>
			  <li role="presentation"><a href="#">Проверить <span class="bg-danger profiles-notification">1</span></a></li>
			  <li role="presentation"><a href="#">Заблокированные <span class="bg-danger profiles-notification">1</span></a></li>
			</ul>
		</div>
		<div class="col-lg-3">
		  	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Поиск">
	        </div>
	        <button type="submit" class="btn btn-default">Найти</button>
	      </form>
		</div>
	</div>
	<div class="row property-row">
		<div class="col-lg-12">
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
				    <input class="form-control" type="text" readonly />
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
                <th>ID</th>
                <th>Имя</th>
                <th>Агенство (id)</th>
                <th>Дата регистрации</th>
                <th>Время регистрации</th>
                <th>Статус</th>
				<th>Кредиты</th>
				<th>Инфориация</th>
				<th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Valeria Bila</td>
                <td>Happy Bride (1)</td>
                <td>27/06/2015</td>
                <td>16:05:01</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Milana Znatok</td>
                <td>Happy Bride (1)</td>
                <td>02/03/2015</td>
                <td>10:05:01</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Vladlena Nos</td>
                <td>Happy Bride (1)</td>
                <td>15/03/2015</td>
                <td>13:22:00</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Svetlana Petrova</td>
                <td>Happy Bride (1)</td>
                <td>18/03/2015</td>
                <td>12:12:00</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Viktoria Tkach</td>
                <td>Happy Bride (1)</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td>Galina Semenova</td>
                <td>Happy Bride (1)</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>Девушка</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Richard Watson</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>1200</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>9</td>
                <td>Anna Lyashenko</td>
                <td>Девушка</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Bekky Thompsnn</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>11</td>
                <td>John Peterson</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>12</td>
                <td>John Peterson</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>13</td>
                <td>John Peterson</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
            <tr>
                <td>14</td>
                <td>John Peterson</td>
                <td>None</td>
                <td>12/07/2015</td>
                <td>11:12:00</td>
                <td>Активная</td>
                <td>500</td>
                <td>
					<a href="#" role="button" type="button" data-toggle="modal" data-target="#modalProfileInfo">Показать</a>
                </td>
                <td class="buttons-cell">
					<button class="btn btn-success" type="button">Active</button>
					<button class="btn btn-danger" type="button" type="button" data-toggle="modal" data-target="#modalAction">Delete</button>
					<button class="btn btn-warning" type="button" data-toggle="modal" data-target="#modalCredits">Credits</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


<div class="modal fade" id="modalProfileInfo" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
		<img src="http://blog.atlasrfidstore.com/wp-content/uploads/2014/06/biometric-passport.png" alt="#" class="img-thumbnail" width="268">	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCredits" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center" id="myModalLabel">Кредиты</h3>
      </div>
      <div class="modal-body text-left">
	    <div class="row text-center">
		   <h2>Kate Lington</h2>
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
				  <input type="text" class="form-control messageSubject" id="#" placeholder="Тема сообщения" disabled>
				  <textarea class="form-control" rows="3" resize="none" placeholder="Введите текст" disabled></textarea>
				</form>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreditsSuccess" data-dismiss="modal" aria-label="Close">Выполнить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalCreditsSuccess" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center" id="myModalLabel">Кредиты</h3>
      </div>
      <div class="modal-body">
		<h4>Операция успешно выполнена</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">Закрыть</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAction" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
			  <input type="text" class="form-control messageSubject" id="#" placeholder="Тема сообщения" disabled>
			  <textarea class="form-control" rows="3" resize="none" placeholder="Введите текст" disabled></textarea>
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalActionSuccess" data-dismiss="modal" aria-label="Close">Выполнить</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalActionSuccess" tabindex="-1" role="dialog" aria-labelledby="#">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title text-center" id="myModalLabel">Информация</h3>
      </div>
      <div class="modal-body">
		<h4>Операция успешно выполнена</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" class="close" data-dismiss="modal" aria-label="Close">Закрыть</button>
      </div>
    </div>
  </div>
</div>