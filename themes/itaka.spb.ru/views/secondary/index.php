<div id="main">
	<div id="headline_block" class="bg_home">
		<div id="headline"><h1 class="h1name h1home">ВТОРИЧНЫЙ РЫНОК</h1></div>
		<div id="counters">
			<div class="counter">
				<div class="num">8</div>
				<div class="num separator">4</div>
				<div class="num">4</div>
				<div class="num">7</div>
				<div class="num">9</div>
			</div>
			<div class="counter">
				<div class="num">8</div>
				<div class="num separator">4</div>
				<div class="num">4</div>
				<div class="num">7</div>
				<div class="num">9</div>
			</div>
		</div>
		<div id="counter_names">
			<div class="counter_name">Домов в базе</div>
			<div class="counter_name">Квартир в базе</div>
		</div>
		<ul class="menu">
			<li><a href="#">Риэлторы</a></li>
			<li><a href="#">Вопрос-ответ</a></li>
			<li class="last">Полезная информация
				<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/useful_info.png" alt="">
				<ul class="useful_info_nav">
					<li><a href="#">Полезная инфо1</a></li>
					<li><a href="#">Полезная инфо2</a></li>
					<li><a href="#">Полезная инфо3</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<div id="content">
	<ul class="tabs_select">
		<li><a href="ajax/home1.htm">Лучшие предложения</a></li>
		<li><a href="ajax/home2.htm">Лучшие по районам</a></li>
		<li><a href="ajax/home3.htm">Самые популярные</a></li>
		<li><a href="ajax/home4.htm">Квартиры в ипотеку</a></li>
		<li>В ваш бюджет</li>
	</ul>
	<select name="dropdown_home" class="obj_select_tabs dropdown_home obj_menu">
		<option value="0">Лучшие предложения</option>
		<option value="1">Лучшие по районам</option>
		<option value="2">Самые популярные</option>
		<option value="3">Квартиры в ипотеку</option>
		<option value="4">В ваш бюджет</option>
	</select>
	<div class="arrow_select"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/arrow_obj_theme.png" alt=""></div>
	<div class="panes">
	<div style="display:block">
	<div class="objects">
	<div class="obj_one_room">
<!--		--><?// foreach($this->view->objects as $i): ?>
		<div class="object">
			<div class="flags_col">
				<div class="mortgage flag_st"></div>
				<div class="exclusive flag_st"></div>
			</div>
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat1.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">1-комн. квартира Большевиков проспект</a>
					<a class="object_info" href="#">Выборгский район <br>пр. Руставелли, ж.132-143</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Ломоносовская</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png" alt=""><span>Московская</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
<!--		--><?// endforeach; ?>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat1.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">1-комн. квартира Большевиков проспект</a>
					<a class="object_info" href="#">Выборгский район <br>пр. Руставелли, ж.132-143</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Ломоносовская</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png" alt=""><span>Московская</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat1.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">1-комн. квартира Большевиков проспект</a>
					<a class="object_info" href="#">Выборгский район <br>пр. Руставелли, ж.132-143</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Ломоносовская</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png" alt=""><span>Московская</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="obj_two_room">
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat2.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">2-комн. квартира около метро Балтийская</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/green_metro_line.png" alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>2 100 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat2.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">2-комн. квартира около метро Балтийская</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/green_metro_line.png" alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>2 100 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat2.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">2-комн. квартира около метро Балтийская</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/green_metro_line.png" alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>2 100 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="obj_three_room">
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat3.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">3-комн. квартира около метро Восстания пл.</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png" alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>4 500 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat3.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">3-комн. квартира около метро Восстания пл.</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png"alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>4 500 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat3.jpg" alt="" ></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">3-комн. квартира около метро Восстания пл.</a>
					<a class="object_info" href="#">Калининский район <br>Гжатская улица, 132</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/red_metro_line.png" alt=""><span>Проспект Большевиков</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/purple_metro_line.png" alt=""><span>Чкаловская</span>
					</a>
					<a class="price"><span>4 500 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="obj_four_room">
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat4.jpg" alt="" ></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">4-комн. квартира около метро Чернышевская</a>
					<a class="object_info" href="#">Петроградский район <br>Большой проспекс, 42</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Озерки</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/orange_metro_line.png" alt=""><span>Гражданский проспект</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat4.jpg" alt=""></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">4-комн. квартира около метро Чернышевская</a>
					<a class="object_info" href="#">Петроградский район <br>Большой проспекс, 42</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Озерки</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/orange_metro_line.png" alt=""><span>Гражданский проспект</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
		<div class="object">
			<div class="photo"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/objects/flat4.jpg" alt="" ></a></div>
			<div class="description">
				<div class="description_text">
					<a class="object_name" href="#">4-комн. квартира около метро Чернышевская</a>
					<a class="object_info" href="#">Петроградский район <br>Большой проспекс, 42</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/blue_metro_line.png" alt=""><span>Озерки</span>
					</a>
					<a class="metro_station">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/orange_metro_line.png" alt=""><span>Гражданский проспект</span>
					</a>
					<a class="price"><span>3 390 000</span> <span class="price_normal">руб.</span></a>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	<div id="pages">
		<div class="page return_page"></div>
		<div class="page prev_page"></div>
		<div class="page activ_page"><div class="page_center">1</div></div>
		<div class="page"><div class="page_center">2</div></div>
		<div class="page"><div class="page_center">3</div></div>
		<div class="page"><div class="page_center">4</div></div>
		<div class="page"><div class="page_center">5</div></div>
		<div class="page_write"><input name="page_number" type="text" value=""></div>
		<div class="page_comment">из</div>
		<div class="page"><div class="page_center">24</div></div>
		<div class="page next_page"></div>
	</div>
	</div>
	<div id="sidebar">
		<div style="display:none">
			<div id="metro_choice_show" class="mod">
				<form name="metro_choice_form" action="" >
					<div class="text_mod1">Выберите станцию метро</div>
					<div class="checkboxes_column">
						<input id="avtovo" name="avtovo" type="checkbox"><label class="home_check">Автово</label><br>
						<input id="admiralteiskaya" name="admiralteiskaya" type="checkbox"><label class="home_check">Адмиралтейская</label><br>
						<input id="akademicheskaya" name="akademicheskaya" type="checkbox"><label class="home_check">Академическая</label><br>
						<input id="baltiyskaya" name="baltiyskaya" type="checkbox"><label class="home_check">Балтийская</label><br>
						<input id="byharestskaya" name="byharestskaya" type="checkbox"><label class="home_check">Бухарестская</label><br>
						<input id="vasileostrovskaya" name="vasileostrovskaya" type="checkbox"><label class="home_check">Василеостровская</label><br>
						<input id="vladimirskaya" name="vladimirskaya" type="checkbox"><label class="home_check">Владимирская</label><br>
						<input id="volkovskaya" name="volkovskaya" type="checkbox"><label class="home_check">Волковская</label><br>
						<input id="vyborgskaya" name="vyborgskaya" type="checkbox"><label class="home_check">Выборгская</label><br>
						<input id="gorkovskaya" name="gorkovskaya" type="checkbox"><label class="home_check">Горьковская</label><br>
						<input id="gostiniy_dvor" name="gostiniy_dvor" type="checkbox"><label class="home_check">Гостиный двор</label><br>
						<input id="grajdanskiy_pr" name="grajdanskiy_pr" type="checkbox"><label class="home_check">Гражданский пр-т</label><br>
						<input id="devyatkino" name="devyatkino" type="checkbox"><label class="home_check">Девяткино</label><br>
						<input id="dostoevskaya" name="dostoevskaya" type="checkbox"><label class="home_check">Достоевская</label><br>
						<input id="elizarovskaya" name="elizarovskaya" type="checkbox"><label class="home_check">Елизаровская</label><br>
						<input id="zvezdnaya" name="zvezdnaya" type="checkbox"><label class="home_check">Звездная</label><br>
						<input id="zvenigorodskaya" name="zvenigorodskaya" type="checkbox"><label class="home_check">Звенигородская</label><br>
						<input id="kirovskiy_zavod" name="kirovskiy_zavod" type="checkbox"><label class="home_check">Кировский завод</label><br>
						<input id="komendantskiy_pr" name="komendantskiy_pr" type="checkbox"><label class="home_check">Комендантский пр-т</label><br>
						<input id="krestovskiy_ostrov" name="krestovskiy_ostrov" type="checkbox"><label class="home_check">Крестовский остров</label><br>
						<input id="kupchino" name="kupchino" type="checkbox"><label class="home_check">Купчино</label><br>
						<input id="ladojskaya" name="ladojskaya" type="checkbox"><label class="home_check">Ладожская</label><br>
						<input id="leninskiy_pr" name="leninskiy_pr" type="checkbox"><label class="home_check">Ленинский пр-т</label>
					</div>
					<div class="checkboxes_column">
						<input id="lesnaya" name="lesnaya" type="checkbox"><label class="home_check">Лесная</label><br>
						<input id="ligovskiy_pr" name="ligovskiy_pr" type="checkbox"><label class="home_check" >Лиговский пр-т</label><br>
						<input id="lomonosovskaya" name="lomonosovskaya" type="checkbox"><label class="home_check">Ломоносовская</label><br>
						<input id="mayakovskaya" name="mayakovskaya" type="checkbox"><label class="home_check">Маяковская</label><br>
						<input id="mejdunarodnaya" name="mejdunarodnaya" type="checkbox"><label class="home_check">Международная</label><br>
						<input id="moskovskaya" name="moskovskaya" type="checkbox"><label class="home_check">Московская</label><br>
						<input id="moskovskie_vorota" name="moskovskie_vorota" type="checkbox"><label class="home_check">Московские ворота</label><br>
						<input id="narvskaya" name="narvskaya" type="checkbox"><label class="home_check">Нарвская</label><br>
						<input id="nevskiy_pr" name="nevskiy_pr" type="checkbox"><label class="home_check">Невский пр-т</label><br>
						<input id="novocherkasskaya" name="novocherkasskaya" type="checkbox"><label class="home_check">Новочекасская</label><br>
						<input id="obvodnyi_kanal" name="obvodnyi_kanal" type="checkbox"><label class="home_check">Обводный канал</label><br>
						<input id="obyhovo" name="obyhovo" type="checkbox"><label class="home_check">Обухово</label><br>
						<input id="ozerki" name="ozerki" type="checkbox"><label class="home_check">Озерки</label><br>
						<input id="park_pobedi" name="park_pobedi" type="checkbox"><label class="home_check">Парк Победы</label><br>
						<input id="parnas" name="parnas" type="checkbox"><label class="home_check">Парнас</label><br>
						<input id="petrogradskaya" name="petrogradskaya" type="checkbox"><label class="home_check">Петроградская</label><br>
						<input id="pionerskaya" name="pionerskaya" type="checkbox"><label class="home_check">Пионерская</label><br>
						<input id="alexandra_nevskogo_one" name="alexandra_nevskogo_one" type="checkbox"><label class="home_check">Площадь Александра Невского I</label><br>
						<input id="alexandra_nevskogo_two" name="alexandra_nevskogo_two" type="checkbox"><label class="home_check">Площадь Александра Невского II</label><br>
						<input id="ploshad_vosstania" name="ploshad_vosstania" type="checkbox"><label class="home_check">Площадь Восстания</label><br>
						<input id="ploshad_lenina" name="ploshad_lenina" type="checkbox"><label class="home_check">Площадь Ленина</label><br>
						<input id="ploshad_mujestva" name="ploshad_mujestva" type="checkbox"><label class="home_check">Площадь Мужества</label><br>
						<input id="politehnicheskaya" name="politehnicheskaya" type="checkbox"><label class="home_check">Политехническая</label>
					</div>
					<div class="checkboxes_column">
						<input id="primorskaya" name="primorskaya" type="checkbox"><label class="home_check">Приморская</label><br>
						<input id="proletarskaya" name="proletarskaya" type="checkbox"><label class="home_check">Пролетарская</label><br>
						<input id="bolshevikov" name="bolshevikov" type="checkbox"><label class="home_check">Пр-т Большевиков</label><br>
						<input id="veteranov" name="veteranov" type="checkbox"><label class="home_check">Пр-т Ветеранов</label><br>
						<input id="prosveshenia" name="prosveshenia" type="checkbox"><label class="home_check">Пр-т Просвещения</label><br>
						<input id="pushkinskaya" name="pushkinskaya" type="checkbox"><label class="home_check">Пушкинская</label><br>
						<input id="ribackoe" name="ribackoe" type="checkbox"><label class="home_check">Рыбацкое</label><br>
						<input id="sadovaya" name="sadovaya" type="checkbox"><label class="home_check">Садовая</label><br>
						<input id="sennaya" name="sennaya" type="checkbox"><label class="home_check">Сенная площадь</label><br>
						<input id="spasskaya" name="spasskaya" type="checkbox"><label class="home_check">Спасская</label><br>
						<input id="sportivnaya" name="sportivnaya" type="checkbox"><label class="home_check">Спортивная</label><br>
						<input id="staraya_derevnia" name="staraya_derevnia" type="checkbox"><label class="home_check">Старая деревня</label><br>
						<input id="technologicheskiy_institut_one" name="technologicheskiy_institut_one" type="checkbox"><label class="home_check">Технологический институт I</label><br>
						<input id="technologicheskiy_institut_two" name="technologicheskiy_institut_two" type="checkbox"><label class="home_check">Технологический институт II</label><br>
						<input id="ydelnaya" name="ydelnaya" type="checkbox"><label class="home_check">Удельная</label><br>
						<input id="dibenko" name="dibenko" type="checkbox"><label class="home_check">Улица Дыбенко</label><br>
						<input id="frunzenskaya" name="frunzenskaya" type="checkbox"><label class="home_check">Фрунзенская</label><br>
						<input id="chernaya_rechka" name="chernaya_rechka" type="checkbox"><label class="home_check">Черная речка</label><br>
						<input id="chernishevskaya" name="chernishevskaya" type="checkbox"><label class="home_check">Чернышевская</label><br>
						<input id="chkalovskaya" name="chkalovskaya" type="checkbox"><label class="home_check">Чкаловская</label><br>
						<input id="electrosila" name="electrosila" type="checkbox"><label class="home_check">Электросила</label>
					</div>
					<div id="metro_but" class="button_style">
						<input id="metro_button" type="submit" value="Продолжить">
					</div>
				</form>
			</div>
		</div>

		<div style="display:none">
			<div id="city_region_choice_show" class="mod">
				<form name="city_region_choice_form" action="">
					<div class="text_mod1">Выберите район</div>
					<div class="text_mod2">Группы районов</div>
					<div class="check_boxes_inline">
						<input id="no_center" name="no_center" type="checkbox"><label class="home_check" for="no_center">Город без центра</label>
						<input id="city_center" name="city_center" type="checkbox"><label class="home_check" for="city_center">Центр города</label>
						<input id="region" name="region" type="checkbox" ><label class="home_check" for="region">Область</label>
						<input id="environs" name="environs" type="checkbox"><label class="home_check" for="four"> Пригороды</label>
					</div>
					<div class="text_mod2">Районы</div>
					<div class="checkboxes_column">
						<input id="admiralteiskiy" name="admiralteiskiy" type="checkbox"><label class="home_check">Адмиралтейский</label><br>
						<input id="vasileostrovskiy" name="vasileostrovskiy" type="checkbox"><label class="home_check">Василеостровский</label><br>
						<input id="kalininskiy" name="kalininskiy" type="checkbox"><label class="home_check">Калининский</label><br>
						<input id="krasnoselskiy" name="krasnoselskiy" type="checkbox"><label class="home_check">Красносельский</label><br>
						<input id="nevskiy" name="nevskiy" type="checkbox"><label class="home_check">Невский</label><br>
						<input id="pavlovskiy" name="pavlovskiy" type="checkbox"><label class="home_check">Павловский</label><br>
						<input id="tosnenskiy" name="tosnenskiy" type="checkbox"><label class="home_check">Тосненский</label><br>
						<input id="primorskiy" name="primorskiy" type="checkbox"><label class="home_check">Приморский</label>
					</div>
					<div class="checkboxes_column">
						<input id="centralniy" name="centralniy" type="checkbox"><label class="home_check">Центральный</label><br>
						<input id="vyborgskiy" name="vyborgskiy" type="checkbox"><label class="home_check">Выборгский</label><br>
						<input id="krasnogvardeiskiy" name="krasnogvardeiskiy" type="checkbox"><label class="home_check">Красногвардейский</label><br>
						<input id="moskovskiy" name="moskovskiy" type="checkbox"><label class="home_check">Московский</label><br>
						<input id="vsevolojskiy" name="vsevolojskiy" type="checkbox"><label class="home_check">Область Всеволожский</label><br>
						<input id="pushkinskiy" name="pushkinskiy" type="checkbox"><label class="home_check">Область Пушкинский</label><br>
						<input id="petrogradskiy" name="petrogradskiy" type="checkbox"><label class="home_check">Петроградский</label><br>
						<input id="frunzenskiy" name="frunzenskiy" type="checkbox"><label class="home_check">Фрунзенский</label>
					</div>
					<div id="city_region_but" class="button_style">
						<input id="city_region_button" type="submit" value="Продолжить">
					</div>
				</form>
			</div>
		</div>


		<div style="display:none">
			<div id="house_choice_show" class="mod">
				<form id="house_choice_form" action="">
					<div class="text_mod1">Выберите тип дома:</div>
					<div class="checkboxes_column">
						<input id="type1" type="checkbox" name="type1" value="Кирпичный" checked><label class="home_check" for="not_first">Кирпичный</label> <br>
						<input id="type2" type="checkbox" name="type2" value="Панельный старый"><label class="home_check" for="not_first">Панельный старый</label><br>
						<input id="type3" type="checkbox" name="type3" value="Панельный современный"><label class="home_check" for="not_first">Панельный современный</label><br>
						<input id="type4" type="checkbox" name="type4" value="Сталинский"><label class="home_check" for="not_first">Сталинский</label><br>
						<input id="type5" type="checkbox" name="type5" value="Старый фонд"><label class="home_check" for="not_first">Старый фонд</label><br>
						<input id="type6" type="checkbox" name="type6" value="Монолитный"><label class="home_check" for="not_first">Монолитный</label><br>
						<input id="type7" type="checkbox" name="type7" value="Другое"><label class="home_check" for="not_first">Другое</label>
					</div>
					<div id="house_choice_but" class="button_style">
						<input id="house_choice_button" type="submit" value="Продолжить">
					</div>
				</form>
			</div>
		</div>

		<div style="display:none">
			<div id="floor_choice_show" class="mod">
				<form id="floor_choice_form" action="">
					<div class="text_mod1">Выберите этаж:</div>
					<div class="checkboxes check_home">
						<input id="not_first" type="checkbox" name="not_first" value="Не первый" checked><label class="home_check" for="not_first">Не первый</label>
						<input id="not_last" type="checkbox" name="not_last" value="Не последний"><label class="home_check" for="not_last">Не последний</label>
					</div>

					<div class="choice_param_floor">
						<div id="floor_label">
							<div class="floor_comment1">Этаж: от </div>
							<div class="floor_input_min inp_search">
								<span class="min pos"></span>
							</div>
							<div class="floor_comment2">до</div>
							<div class="floor_input_max inp_search">
								<span class="max pos"></span>
							</div>
						</div>
						<input id="floor_min" type="hidden">
						<input id="floor_max" type="hidden">
						<div id="slider-floor-range"></div>
					</div>

					<div id="floor_choice_but" class="button_style">
						<input id="floor_choice_button" type="submit" value="Продолжить">
					</div>
				</form>
			</div>
		</div>

		<div id="catalog">
			<ul class="sidebar_menu">
				<li class="current"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/cat_img_transp.png" alt="Каталог"><span>Каталог</span></li>
				<li><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/map_img_transp.png" alt="На карте"><span>На карте</span></li>
			</ul>
			<div id="catalogue_title" class="tabs_side_search">
				<div class="active_choice" operation-type="buy"><span>Купить</span></div>
				<div operation-type="sell"><span>Продать</span></div>
			</div>
			<div class="panes_side_search">
				<div id="choice_form_home1" class="choice_form">
					<ul id="search_option_home1" class="search_option">
						<li obj-type="room">Комнату</li>
						<li obj-type="flat" class="current_option">Квартиру</li>
					</ul>
					<form action="">
						<div class="choice_links">
							<a href="#metro_choice_show" class="choice_link metro_choice">Выбрать Метро</a>
							<a href="#city_region_choice_show" class="choice_link city_region_choice">Выбрать Район</a>
						</div>
						<div class="checkboxes check_home">
							<input id="one" type="checkbox" name="one" value="1" checked><label class="home_check" for="one">1</label>
							<input id="two" type="checkbox" name="two" value="2"><label class="home_check" for="two">2</label>
							<input id="three" type="checkbox" name="three" value="3"><label class="home_check" for="three">3</label>
							<input id="four" type="checkbox" name="four" value="4"><label class="home_check" for="four">4+ Комнат</label>
						</div>
						<div class="choice_param">
							<div id="price_label">
								<div class="price_comment1">Цена: от </div>
								<div class="price_input_min inp_search">
									<span class="min pos"></span>
								</div>
								<div class="price_comment2">до</div>
								<div class="price_input_max inp_search">
									<span class="max pos"></span>
								</div>
								<div class="price_comment3">млн.р.</div>
							</div>
							<input id="price_min" type="hidden">
							<input id="price_max" type="hidden">
							<div id="slider-range"></div>
						</div>
						<div class="advanced_search">
							<div class="choice_links">
								<a href="#house_choice_show" class="choice_link house_choice">Тип дома</a>
								<a href="#floor_choice_show" class="choice_link floor_choice">Этаж</a>
							</div>
							<div class="big_inp_wrap">
								<div class="type_comment">Номер объекта</div>
								<div class="big_inp_style">
									<input class="inp_big" type="text">
								</div>
							</div>
							<div class="big_inp_wrap">
								<div class="type_comment">Адрес объекта</div>
								<div class="big_inp_style">
									<input class="inp_big" type="text">
								</div>
							</div>
							<div class="checkboxes check_home_use">
								<div class="checkbox_line">
									<input id="comercial_use" type="checkbox" name="not_first" value="возможно коммерческое использование" checked>
									<div>возможно коммерческое использование </div>
								</div>
								<div class="checkbox_line">
									<input id="morgage" type="checkbox" name="not_last" value="в ипотеку">
									<div>в ипотеку</div>
								</div>
								<div class="checkbox_line">
									<input id="itaka_exclusive" type="checkbox" name="not_last" value="только в Итаке">
									<div>только в "Итаке"</div>
								</div>
							</div>
							<div class="choice_param">
								<div id="square_all_label">
									<div class="square_all_comment1">S <span class="small_sq">общ.</span>: от </div>
									<div class="square_all_input_min inp_search">
										<span class="min pos"></span>
									</div>
									<div class="square_all_comment2">до</div>
									<div class="square_all_input_max inp_search">
										<span class="max pos"></span>
									</div>
									<div class="square_all_comment3">м<span class="super">2</span></div>
								</div>
								<input id="square_all_min" type="hidden">
								<input id="square_all_max" type="hidden">
								<div id="slider-square_all-range"></div>
							</div>
							<div class="choice_param">
								<div id="living_space_label">
									<div class="living_space_comment1">S <span class="small_sq">жил.</span>: от </div>
									<div class="living_space_input_min inp_search">
										<span class="min pos"></span>
									</div>
									<div class="living_space_comment2">до</div>
									<div class="living_space_input_max inp_search">
										<span class="max pos"></span>
									</div>
									<div class="living_space_comment3">м<span class="super">2</span></div>
								</div>
								<input id="living_space_min" type="hidden">
								<input id="living_space_max" type="hidden">
								<div id="slider-living_space-range"></div>
							</div>
							<div class="choice_param">
								<div id="kitchen_space_label">
									<div class="kitchen_space_comment1">S <span class="small_sq">кух.</span>: от </div>
									<div class="kitchen_space_input_min inp_search">
										<span class="min pos"></span>
									</div>
									<div class="kitchen_space_comment2">до</div>
									<div class="kitchen_space_input_max inp_search">
										<span class="max pos"></span>
									</div>
									<div class="kitchen_space_comment3">м<span class="super">2</span></div>
								</div>
								<input id="kitchen_space_min" type="hidden">
								<input id="kitchen_space_max" type="hidden">
								<div id="slider-kitchen_space-range"></div>
							</div>
						</div>
						<input id="home_make" class="choice_make" type="submit" value="Подобрать">
						<input id="object_type" name="object_type" type="hidden" value="flat">
						<input id="operation_type" name="opertion_type" type="hidden" value="buy">
					</form>
					<div class="choice_search">
						<a href="#" id="home_adv_link" class="choice_link">Расширенный поиск <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/choice_search.png" alt=""></a>
					</div>
				</div>

				<div id="choice_form_home2" class="choice_form">
					<ul id="search_option_home2" class="search_option">
						<li obj-type="room">Комнату</li>
						<li obj-type="flat" class="current_option">Квартиру</li>
					</ul>
					<form action="">
						<div class="choice_links">
							<a href="#metro_choice_show" class="choice_link metro_choice">Выбрать Метро</a>
							<a href="#city_region_choice_show" class="choice_link region_choice">Выбрать Район</a>
						</div>
						<div class="checkboxes check_home">
							<input type="checkbox" name="one" value="1" checked><label class="home_check" for="one">1</label>
							<input type="checkbox" name="two" value="2"><label class="home_check" for="two">2</label>
							<input type="checkbox" name="three" value="3"><label class="home_check" for="three">3</label>
							<input type="checkbox" name="four" value="4"><label class="home_check" for="four">4+ Комнат</label>
						</div>
						<div class="choice_param">
							<div id="price_label2">
								<div class="price_comment1">Цена: от </div>
								<div class="price_input_min inp_search">
									<span class="min pos"></span>
								</div>
								<div class="price_comment2">до</div>
								<div class="price_input_max inp_search">
									<span class="max pos"></span>
								</div>
								<div class="price_comment3">млн.р.</div>
							</div>
							<input id="price_min2" type="hidden">
							<input id="price_max2" type="hidden">
							<div id="slider-range2"></div>
						</div>
						<div class="big_inp_wrap">
							<div class="type_comment">Ващ номер телефона</div>
							<div class="big_inp_style">
								<input class="inp_big" type="text">
							</div>
						</div>
						<div class="big_inp_wrap">
							<div class="type_comment">Ваше имя</div>
							<div class="big_inp_style">
								<input class="inp_big" type="text">
							</div>
						</div>
						<input id="home_make2" class="choice_make" type="submit" value="Отправить заявку">
						<input id="object_type2" name="object_type2" type="hidden" value="flat">
						<input id="operation_type2" name="opertion_type2" type="hidden" value="buy">
					</form>
				</div>
			</div>
		</div>
		<div id="news">
			<h3 class="sidebar_header">Новости</h3>
			<div class="entry">
				<span class="news_day">21.06.2012</span>
				<a href="#"><span class="news-text">Прошел аккредитацию жилой комплекс </span><span class="news_marked">"во Всеволожске"</span><span class="news-text">и II очереди в банке "ВТБ 24"</span></a>
			</div>
			<div class="entry">
				<span class="news_day">21.06.2012</span>
				<a href="#"><span class="news-text">Комплекс </span><span class="news_marked">"Mistola Hills"</span> <span class="news-text">прошел аккредитацию в МТС-банке</span></a>
			</div>
			<div class="entry">
				<span class="news_day">21.06.2012</span>
				<a href="#"><span class="news-text">Подведены результаты конкурса </span><span class="news_marked">"Лучший онлайн-консультант"</span></a>
			</div>
			<div class="news_but"><a href="#">Все новости</a></div>
		</div>
		<div id="quiz"><h3 class="sidebar_header">Опрос</h3>
			<form action="#">
				<p>Кто должен стать тренером сборной России после Евро-2012?</p>
				<input class="quiz_points" type="radio" name="answer1" value="a1" checked><label>иностранный специалист</label><br>
				<input class="quiz_points" type="radio" name="answer2" value="a2">российский тренер <br>
				<input class="quiz_points" type="radio" name="answer3" value="a3">Сергей Фурсенко<br>
				<input class="quiz_points" type="radio" name="answer4" value="a4">оставьте Адвоката!
				<p><input class="submit sub_home" type="submit" value="Голосовать"></p>
			</form>
		</div>
	</div>
</div>
