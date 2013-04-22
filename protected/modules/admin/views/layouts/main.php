<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Administration Panel</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- For all browsers -->
	<link rel="stylesheet" href="/adm/css/reset.css?v=1">
	<link rel="stylesheet" href="/adm/css/style.css?v=1">
	<link rel="stylesheet" href="/adm/css/colors.css?v=1">
	<link rel="stylesheet" media="print" href="/adm/css/print.css?v=1">
	<!-- For progressively larger displays -->
	<link rel="stylesheet" media="only all and (min-width: 480px)" href="/adm/css/480.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 768px)" href="/adm/css/768.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 992px)" href="/adm/css/992.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="/adm/css/1200.css?v=1">
	<!-- For Retina displays -->
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="/adm/css/2x.css?v=1">

	<!-- Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>

	<!-- Additional styles -->
	<link rel="stylesheet" href="/adm/css/styles/agenda.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/dashboard.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/files.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/form.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/modal.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/progress-slider.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/switches.css?v=1">
	<link rel="stylesheet" href="/adm/css/styles/table.css?v=1">

	<!-- glDatePicker -->
	<link rel="stylesheet" href="/adm/js/libs/glDatePicker/developr.css?v=1">

	<!-- CLEditor -->
	<link rel="stylesheet" href="/adm/js/libs/CLEditor/jquery.cleditor.css">

	<!-- JavaScript at bottom except for Modernizr -->
	<script src="/adm/js/libs/modernizr.custom.js"></script>

	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="/adm/img/favicons/favicon.png">
	<!-- For everything else -->
	<link rel="shortcut icon" href="/adm/img/favicons/favicon.ico">
	<!-- For retina screens -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="/adm/img/favicons/apple-touch-icon-retina.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="/adm/img/favicons/apple-touch-icon-ipad.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="/adm/img/favicons/apple-touch-icon.png">

	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="/adm/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="/adm/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="/adm/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

	<!-- Scripts -->
	<script src="/adm/js/libs/jquery-1.7.2.min.js"></script>
	<script src="/adm/js/libs/jquery-ui.min.js"></script>

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">
</head>

<body class="clearfix with-menu reversed">

<!-- Prompt IE 6 users to install Chrome Frame -->
<!--[if lt IE 7]><p class="message red-gradient simpler">Ваш браузер <em>устарел!</em> <a href="http://browsehappy.com/">Обновите ваш браузер</a> или <a href="http://www.google.com/chromeframe/?redirect=true">установите Google Chrome Frame</a> для работы с этим сайтом.</p><![endif]-->

<!-- Title bar -->
<header role="banner" id="title-bar">
	<h2></h2>
</header>

<!-- Button to open/hide menu -->
<a href="#" id="open-menu"><span>Меню</span></a>

<!-- Main content -->
<section role="main" id="main">

	<noscript class="message black-gradient simpler">Ваш браузер не поддерживает JavaScript! Некоторые функции не будут работать, сколько интересного Вы упускаете...</noscript>

	<?php echo $content; ?>

</section>

<!-- Sidebar/drop-down menu -->
<section id="menu" role="complementary">

	<!-- This wrapper is used by several responsive layouts -->
	<div id="menu-content">

		<header>
			Admin Panel
		</header>

		<!-- By default, this section is made for 4 icons, see the doc to learn how to change this, in "basic markup explained" -->
		<ul id="access" class="children-tooltip">
			<li>
<!--				<a href="/admin/help/" title="Инструкция"><span class="icon-question"></span></a>-->
			</li>
			<li></li>
			<li></li>
			<li><a class="confirm with-tooltip" href="/admin/?logout=1" title="Выйти"><span class="icon-extract"></span></a></li>
		</ul>

		<section class="navigable">
			<? if ($this->view->IS_ADMIN): ?>
			<ul class="big-menu">
				<li><a href="/admin/content/edit/model/glo/id/1/<?=rand(1,999)?>" <? if('glo'==$this->view->MODEL_NAME): ?>class="navigable-current current"<? endif; ?>>Общие настройки</a></li>

				<? foreach($this->view->menu as $model => $value): ?>
					<? if (is_array($value)): ?>
						<li class="with-right-arrow">
							<span><?=$value['name']?></span>
							<ul class="big-menu">
								<? foreach($value['values'] as $k => $v): ?>
									<li><a href="/admin/content/view/model/<?=$k?>/<?=rand(111,999)?>" title="<?=$v?>" <? if($k==$this->view->MODEL_NAME): ?>class="navigable-current current"<? endif; ?>><?=$v?></a></li>
								<? endforeach; ?>
							</ul>
						</li>
					<? else: ?>
						<li><a href="/admin/content/view/model/<?=$model?>/<?=rand(111,999)?>" title="<?=$value?>" <? if($model==$this->view->MODEL_NAME): ?>class="navigable-current current"<? endif; ?>><?=$value?></a></li>
					<? endif; ?>
				<? endforeach; ?>
			</ul>
			<? endif; ?>
		</section>

	</div>

</section>
<!-- End sidebar/drop-down menu -->

<!-- JavaScript at the bottom for fast page loading -->

<script src="/adm/js/setup.js"></script>

<!-- Template functions -->
<script src="/adm/js/developr.accordions.js"></script>
<script src="/adm/js/developr.auto-resizing.js"></script>
<script src="/adm/js/developr.input.js"></script>
<script src="/adm/js/developr.message.js"></script>
<script src="/adm/js/developr.modal.js"></script>
<script src="/adm/js/developr.navigable.js"></script>
<script src="/adm/js/developr.notify.js"></script>
<script src="/adm/js/developr.scroll.js"></script>
<script src="/adm/js/developr.progress-slider.js"></script>
<script src="/adm/js/developr.tooltip.js"></script>
<script src="/adm/js/developr.confirm.js"></script>
<script src="/adm/js/developr.agenda.js"></script>
<script src="/adm/js/developr.table.js"></script>
<script src="/adm/js/developr.tabs.js"></script>

<!-- Must be loaded last -->

<!-- Tinycon -->
<script src="/adm/js/libs/tinycon.min.js"></script>

<!-- Google code prettifier -->
<script src="/adm/js/libs/google-code-prettify/prettify.js?v=1"></script>

<!-- glDatePicker -->
<script src="/adm/js/libs/glDatePicker/glDatePicker.min.js?v=1"></script>

<!-- Hashchange polyfill -->
<!--<script src="/adm/js/libs/jquery.ba-hashchange.min.js?v=1"></script>-->

<!-- CKEditor -->
<script type="text/javascript" src="/adm/js/libs/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/adm/js/libs/ckeditor/adapters/jquery.js"></script>

<!-- Form Plugin -->
<script type="text/javascript" src="/adm/js/libs/jquery.form.js"></script>

<!-- Tablesorter -->
<!--<script src="/adm/js/libs/jquery.tablesorter.min.js"></script>-->

<!-- Ajax Upload -->
<script type="text/javascript" src="/adm/js/libs/ajax-upload/ajaxupload.js"></script>

<script src="/adm/js/content.js"></script>

<script>

	$('.table').on('click', 'tbody td', function(event)
	{
		// Do not process if something else has been clicked
		if (event.target !== this)
		{
			return;
		}

		var tr = $(this).parent(),
			row = tr.next('.row-drop'),
			rows;

		// If there is already a special row
		if (row.length > 0)
		{
			// Un-style row
			tr.children().removeClass('anthracite-gradient glossy');

			// Remove row
			row.remove();

			return;
		}

		// Remove existing special rows
		rows = tr.siblings('.row-drop');
		if (rows.length > 0)
		{
			// Un-style previous rows
			rows.prev().children().removeClass('anthracite-gradient glossy');

			// Remove rows
			rows.remove();
		}

		// Style row
		tr.children().addClass('anthracite-gradient glossy');

		var row_id = parseInt(tr.attr('id').replace('row-', ''))

		// Add fake row
		$('<tr class="row-drop">'+
			'<td colspan="'+tr.children().length+'">'+
			$('#row-info-' + row_id).html() +
			'</td>'+
			'</tr>').insertAfter(tr);
	});

	//	$('.show-on-parent-parent-hover').each(function(){
	//		$(this).hover(function(){
	//			$(this).show();
	//		});
	//	});

</script>


</body>
</html>
