<?php /* @var $this Controller */ $view = $this->view; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.fancybox.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropkick.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/index.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/all.css" type="text/css">
	<link id="responsive_style" rel="stylesheet" type="text/css">
	<!--<link rel="stylesheet" href="jquery.ui.slider.css" type="text/css"/> -->
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.fancybox-1.3.4.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/dropkick.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/dropkick.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/index.js"></script>
</head>
<body>
<div id="wrap">
<div id="header">
	<div id="top_menu">
		<div id="top_menu_line">
			<div id="top_menu_line1"></div>
			<div id="top_menu_line2"></div>
			<div id="top_menu_line3"></div>
			<div id="top_menu_line4"></div>
			<div id="top_menu_line5"></div>
			<div id="top_menu_line6"></div>
			<div id="top_menu_line7"></div>
			<!--<div id="top_menu_line8"></div>-->
			<div id="top_menu_line9"></div>
			<div id="top_menu_line10"></div>
		</div>
		<div id="top_menu_content">
			<div id="top_menu1"><a class="top_menu_link1" href="#">Новостройки</a></div>
			<div id="top_menu2"><a class="top_menu_link2" href="#">Вторичный рынок</a></div>
			<div id="top_menu3"><a class="top_menu_link3" href="#">Аренда</a></div>
			<div id="top_menu4"><a class="top_menu_link4" href="#">Элитная</a></div>
			<div id="top_menu5"><a class="top_menu_link5" href="#">Коммерческая</a></div>
			<div id="top_menu6"><a class="top_menu_link6" href="#">Коттеджи</a></div>
			<div id="top_menu7"><a class="top_menu_link7" href="#">Загородная</a></div>
			<!--<div id="top_menu8"><a class="top_menu_link8" href="#">Зарубежная</a></div> -->
			<div id="top_menu9"><a class="top_menu_link9" href="#">Ипотека</a></div>
			<div id="top_menu10"><a class="top_menu_link10" href="#">Другие услуги
					<img src="/images/strelka_menu.png" alt=""></a>
				<ul class="top_menu_nav">
					<li><a href="#">Другая услуга1</a></li>
					<li><a href="#">Другая услуга2</a></li>
					<li><a href="#">Другая услуга3</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div id="info_line">
		<div id="logo">
			<a href="/"><img src="/images/logo.png" alt="АН ИТАКА"></a>
		</div>
		<div id="services" class="home_serv"> Профессиональные <br /> риэлторы!</div>
		<div class="phone">
			<span class="service"> Единый диспетческий центр </span> <br />
			<span class="code_phone"><?=$view->glo->getHeaderPhone1Code()?> </span><span class="number_phone"> <?=$view->glo->getHeaderPhone1()?></span>
		</div>
		<div class="phone">
			<span class="service"> Звонок по России бесплатный </span> <br />
			<span class="code_phone"><?=$view->glo->getHeaderPhone2Code()?> </span><span class="number_phone"> <?=$view->glo->getHeaderPhone2()?></span>
		</div>
		<div id="puzomerka">
			<span class="service"> Объектов в нашей базе </span> <br />
			<div id="puzo">
				<div class="num">8</div>
				<div class="num separator">4</div>
				<div class="num">4</div>
				<div class="num">7</div>
				<div class="num">9</div>
			</div>
		</div>
		<div id="registration">
			<!--	<div id="reg_button"><span>Регистрация</span></div> -->
			<div id="log_in"><a>Вход</a></div>
		</div>
		<div id="consultant_online">
			<div id="consultant_photo"><a id="consultation_link1" href="#consultation"><img src="/images/home/users/konsyltant.png" /></a></div>
			<div id="online_consultant">
				<div id="consultant"><a id="consultation_link2" href="#consultation">Консультант</a></div>
				<div id="online_image"><a id="consultation_link3" href="#consultation"><img src="/images/online.png" /></a></div>
			</div>
		</div>
	</div>

	<div style="display:none">
		<div id="consultation" class="mod">
			<form id="consultation_form" action="">
				<div class="dialog_top">Онлайн-консультант</div>
				<div class="mod_logo"></div>
				<div class="dialog_consult_block">
					<div class="message">
						<span class="time">00:10</span><span class="participant1">Посетитель:</span><span>Включился в диалог</span>
					</div>
					<div class="message">
						<span class="time">00:12</span><span class="participant2">Яна Белявская:</span><span>Включился в диалог</span>
					</div>
					<div class="message">
						<span class="time">00:10</span><span class="participant1">Посетитель:</span><span>Как дела?</span>
					</div>
					<div class="message">
						<span class="time">00:12</span><span class="participant2">Яна Белявская:</span><span>Спасибо, хорошо, приходите ещё</span>
					</div>
					<div class="end_dialog">
						<div>Чат закончен. Оцените работу консультанта</div>
						<img src="/images/dialog_star.png" alt="">
						<img src="/images/dialog_star.png" alt="">
						<img src="/images/dialog_star.png" alt="">
						<img src="/images/dialog_star.png" alt="">
						<img src="/images/dialog_star.png" alt="">
					</div>
				</div>
				<div class="dialog_agent_block">
					<img src="/images/user/consultant1.png" alt=""><br>
					<span>Маргарита<br>Барова-Бирюкова</span>
				</div>
				<div class="dialog_type_block">
					<textarea cols="15" rows="5"></textarea>
				</div>
				<div id="dialog_but" class="button_style">
					<input id="dialog_button" type="submit" value="Отправить">
				</div>
			</form>
		</div>
	</div>

	<div id="menu">
		<div id="video_but"><a href="#"><img src="/images/vid_strelka.png" />Посмотрите видео</a></div>
		<ul class="menu_main">
			<li class="first"><a href="#">Офисы на карте</a></li>
			<li><a href="#">О компании</a></li>
			<li><a href="#">Услуги</a></li>
			<li><a href="#">Карьера</a></li>
			<li><a href="#">Пресс-центр</a></li>
			<li><a href="#">Блог</a></li>
			<li><a href="#">Контакты</a></li>
		</ul>
	</div>
</div>

<? echo $content; ?>

<div id="footer">
	<? if ($view->show_subfooter_top): ?>
	<div id="subfooter_title">
		<div id="footer_title"><img src="/images/7.png" alt="7 причин для выбора нашей компании" /></div>
	</div>
	<div id="subfooter_top">
		<div id="footer_top">
			<div id="ind_block1">
				<div class="block_num">20<span class="font38">лет</span></div>
				<span class="block_name">на рынке <br> недвижимости</span>
			</div>
			<div id="ind_block2">
				<img class="block_image" src="/images/icon_key.png" alt="все услуги по недвижимости" /><br />
				<span class="block_name">все услуги <br> по недвижимости</span>
			</div>
			<div id="ind_block3">
				<div class="block_num">46 <span class="font27">офисов</span></div>
				<span class="block_name">в Северо-западном <br> регионе</span>
			</div>
			<div id="ind_block4">
				<img class="block_image" src="/images/icon_case.png" alt="профессиональные риэлторы" /><br />
				<span class="block_name">профессиональные <br> риэлторы</span>
			</div>
			<div id="ind_block5">
				<img class="block_image" src="/images/icon05.png" alt="высокие стандарты качества" /><br />
				<span class="block_name">высокий <br> стандарт качества</span>
			</div>
			<div id="ind_block6">
				<img class="block_image" src="/images/icon_notebook.png" alt="Единая информационная система" /><br />
				<span class="block_name">единая<br> информационная <br>система</span>
			</div>
			<div id="ind_block7">
				<img class="block_image" src="/images/icon04.png" alt="актуальная база объектов" /><br />
				<span class="block_name">актуальная <br> база объектов</span>
			</div>
		</div>
	</div>
	<? endif; ?>
	<div id="subfooter_bottom">
		<div id="footer_bottom">
			<ul class="footer_menu">
				<li class="first_sin_border"><a href="#">Новостройки</a></li>
				<li><a href="#">Вторичный рынок</a></li>
				<li><a href="#">Аренда</a></li>
				<li><a href="#">Элитная</a></li>
				<li><a href="#">Коммерческая</a></li>
			</ul>
			<ul class="footer_menu">
				<li class="first_sin_border"><a href="#">Коттеджи</a></li>
				<li><a href="#">Загородная</a></li>
				<li><a href="#">Зарубежная</a></li>
				<li><a href="#">Ипотека</a></li>
				<li><a href="#">Другие услуги</a></li>
			</ul>
			<ul class="footer_menu">
				<li class="first_sin_border"><a href="#">О компании</a></li>
				<li><a href="#">Услуги</a></li>
				<li><a href="#">Новости</a></li>
				<li><a href="#">Вакансии</a></li>
			</ul>
			<ul class="footer_menu">
				<li class="first_sin_border"><a href="#">Пресс-центр</a></li>
				<li><a href="#">FAQ</a></li>
				<li><a href="#">Блог / Форум</a></li>
				<li><a href="#">Контакты</a></li>
			</ul>
			<div id="info_footer">
				<div class="phone_foot_style"><?=$view->glo->getHeaderPhone1Code()?> <?=$view->glo->getHeaderPhone1()?></div>
				<div class="phone_foot_style"><?=$view->glo->getHeaderPhone2Code()?> <?=$view->glo->getHeaderPhone2()?></div>
				<div class="ar12">Посетителей сегодня</div>
				<div id="visitor_counter">
					<div class="num_visit">2</div>
					<div class="num_visit">1</div>
					<div class="num_visit">3</div>
					<div class="num_visit">8</div>
				</div>
			</div>
			<div id="social_block">
				<div id="social_buttons">
					<a class="social_but vk" href="#"></a>
					<a class="social_but fb" href="#"></a>
					<a class="social_but tw" href="#"></a>
				</div>
				<div id="search">
					<input class="search_text" type="text" name="search" value="Найти" />
					<input class="search_button" type="submit" value="" name="search_submit" />
				</div>
				<div id="copyright" class="ar12">&copy; <?=date('Y')?> АН &laquo;Итака&raquo; <br />Над сайтом работали</div>
			</div>
		</div>
	</div>
</div>

</div>
</body>

</html>
