<?php /* @var $this Controller */ $view = $this->view; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" >
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/jquery.fancybox.css" type="text/css"/>
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/dropkick.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/index.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/dk_theme_obj.css" type="text/css">
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/home.css" type="text/css" >
	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/all.css" type="text/css">
    <link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/medium_responsive.css" type="text/css">
	<!--<link id="responsive_style" rel="stylesheet" type="text/css"> -->
	<!--<link rel="stylesheet" href="jquery.ui.slider.css" type="text/css"/> -->
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tools.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.fancybox-1.3.4.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.9.2.custom.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/dropkick.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/home.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/index.js"></script>
</head>
<body>
<div id="wrap">
<div id="header">
	<div id="top_menu">
		<div id="top_menu_line">
			<? foreach($view->top_menu as $k => $i): $k=$k>=7?$k+1:$k;?>
			<div id="top_menu_line<?=$k+1?>"></div>
			<? endforeach; ?>
		</div>
		<div id="top_menu_content">
			<? foreach($view->top_menu as $k => $i): $k=$k>=7?$k+1:$k; $childs = $i->getChilds(); ?>
				<div id="top_menu<?=$k+1?>">
					<a class="top_menu_link<?=$k+1?>" href="<?=$i->getUrl()?>"><?=$i->getName()?>
						<? if(count($childs)): ?><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/strelka_menu.png" alt=""><? endif; ?></a>
					<? if(count($childs)): ?>
					<ul class="top_menu_nav">
						<? foreach($childs as $c): ?>
						<li><a href="<?=$c->getUrl() ?>"><?=$c->getName() ?></a></li>
						<? endforeach; ?>
					</ul>
					<? endif; ?>
				</div>
			<? endforeach; ?>
		</div>
	</div>
	<div id="info_line">
		<div id="logo">
			<a href="/"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="АН ИТАКА"></a>
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
			<div id="consultant_photo"><a id="consultation_link1" href="#consultation"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/home/users/konsyltant.png" /></a></div>
			<div id="online_consultant">
				<div id="consultant"><a id="consultation_link2" href="#consultation">Консультант</a></div>
				<div id="online_image"><a id="consultation_link3" href="#consultation"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/online.png" /></a></div>
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
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dialog_star.png" alt="">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dialog_star.png" alt="">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dialog_star.png" alt="">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dialog_star.png" alt="">
						<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/dialog_star.png" alt="">
					</div>
				</div>
				<div class="dialog_agent_block">
					<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/user/consultant1.png" alt=""><br>
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
		<div id="video_but"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/vid_strelka.png" />Посмотрите видео</a></div>
		<ul class="menu_main">
			<li class="first"><a href="#">Офисы на карте</a></li>
			<li><a href="/page/o_kompanii">О компании</a></li>
			<li><a href="/page/o_kompanii">Услуги</a></li>
			<li><a href="/page/o_kompanii">Карьера</a></li>
			<li><a href="/page/o_kompanii">Пресс-центр</a></li>
			<li><a href="/page/o_kompanii">Контакты</a></li>
		</ul>
	</div>
</div>

<? echo $content; ?>

<div id="footer">
	<? if ($view->show_subfooter_top): ?>
	<div id="subfooter_title">
		<div id="footer_title"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/7.png" alt="7 причин для выбора нашей компании" /></div>
	</div>
	<div id="subfooter_top">
		<div id="footer_top">
			<div id="ind_block1">
				<div class="block_num">20<span class="font38">лет</span></div>
				<span class="block_name">на рынке <br> недвижимости</span>
			</div>
			<div id="ind_block2">
				<img class="block_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon_key.png" alt="все услуги по недвижимости" /><br />
				<span class="block_name">все услуги <br> по недвижимости</span>
			</div>
			<div id="ind_block3">
				<div class="block_num">46 <span class="font27">офисов</span></div>
				<span class="block_name">в Северо-западном <br> регионе</span>
			</div>
			<div id="ind_block4">
				<img class="block_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon_case.png" alt="профессиональные риэлторы" /><br />
				<span class="block_name">профессиональные <br> риэлторы</span>
			</div>
			<div id="ind_block5">
				<img class="block_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon05.png" alt="высокие стандарты качества" /><br />
				<span class="block_name">высокий <br> стандарт качества</span>
			</div>
			<div id="ind_block6">
				<img class="block_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon_notebook.png" alt="Единая информационная система" /><br />
				<span class="block_name">единая<br> информационная <br>система</span>
			</div>
			<div id="ind_block7">
				<img class="block_image" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/icon04.png" alt="актуальная база объектов" /><br />
				<span class="block_name">актуальная <br> база объектов</span>
			</div>
		</div>
	</div>
	<? endif; ?>
	<div id="subfooter_bottom">
		<div id="footer_bottom">
			<ul class="footer_menu">
				<? foreach ($view->bottom_menu[0] as $k => $i): ?>
				<li <? if(!$k): ?>class="first_sin_border"<? endif; ?>><a href="<?=$i->getUrl()?>"><?=$i->getName()?></a></li>
				<? endforeach; ?>
			</ul>
			<ul class="footer_menu">
				<? foreach ($view->bottom_menu[1] as $k => $i): ?>
					<li <? if(!$k): ?>class="first_sin_border"<? endif; ?>><a href="<?=$i->getUrl()?>"><?=$i->getName()?></a></li>
				<? endforeach; ?>
			</ul>
			<ul class="footer_menu">
				<? foreach ($view->bottom_menu[2] as $k => $i): ?>
					<li <? if(!$k): ?>class="first_sin_border"<? endif; ?>><a href="<?=$i->getUrl()?>"><?=$i->getName()?></a></li>
				<? endforeach; ?>
			</ul>
			<ul class="footer_menu">
				<? foreach ($view->bottom_menu[3] as $k => $i): ?>
					<li <? if(!$k): ?>class="first_sin_border"<? endif; ?>><a href="<?=$i->getUrl()?>"><?=$i->getName()?></a></li>
				<? endforeach; ?>
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
					<a class="social_but vk" href="<?=$view->glo->getUrlVk()?>"></a>
					<a class="social_but fb" href="<?=$view->glo->getUrlFb()?>"></a>
					<a class="social_but tw" href="<?=$view->glo->getUrlTw()?>"></a>
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
