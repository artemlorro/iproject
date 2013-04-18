<?php
$cs=Yii::app()->clientScript;
$baseUrl=$this->module->assetsUrl;
$cs->registerCssFile($baseUrl.'/css/reset.css');
$cs->registerCssFile($baseUrl.'/css/style.css');
$cs->registerCssFile($baseUrl.'/css/colors.css');
$cs->registerCssFile($baseUrl.'/css/print.css', 'print');
$cs->registerCssFile($baseUrl.'/css/480.css', 'only all and (min-width: 480px)');
$cs->registerCssFile($baseUrl.'/css/768.css', 'only all and (min-width: 768px)');
$cs->registerCssFile($baseUrl.'/css/992.css', 'only all and (min-width: 992px)');
$cs->registerCssFile($baseUrl.'/css/1200.css', 'only all and (min-width: 1200px)');
$cs->registerCssFile($baseUrl.'/css/2x.css', 'only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)');
$cs->registerCssFile($baseUrl.'/css/styles/agenda.css');
$cs->registerCssFile($baseUrl.'/css/styles/dashboard.css');
$cs->registerCssFile($baseUrl.'/css/styles/files.css');
$cs->registerCssFile($baseUrl.'/css/styles/form.css');
$cs->registerCssFile($baseUrl.'/css/styles/modal.css');
$cs->registerCssFile($baseUrl.'/css/styles/progress-slider.css');
$cs->registerCssFile($baseUrl.'/css/styles/switches.css');
$cs->registerCssFile($baseUrl.'/css/login.css');
$cs->registerCssFile($baseUrl.'/js/libs/modernizr.custom.js');
?>
<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie linen"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie linen" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie linen" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9 linen" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!-->
<html class="no-js linen" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Admin Panel</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">
</head>

<body>

<div id="container">

	<form method="post" action="" id="form-login">
		<ul class="inputs black-input large">
			<!-- The autocomplete="off" attributes is the only way to prevent webkit browsers from filling the inputs with yellow -->
			<li><span class="icon-user mid-margin-right"></span><input type="text" name="login" id="login" value=""
			                                                           class="input-unstyled" placeholder="Логин"
			                                                           autocomplete="on"></li>
			<li><span class="icon-lock mid-margin-right"></span><input type="password" name="pass" id="pass" value=""
			                                                           class="input-unstyled" placeholder="Пароль"
			                                                           autocomplete="on"></li>
		</ul>

		<button type="submit" class="button glossy full-width huge">Войти</button>
	</form>

</div>

<!-- JavaScript at the bottom for fast page loading -->

<!-- Scripts -->
<script src="/adm/js/libs/jquery-1.7.2.min.js"></script>
<script src="/adm/js/setup.js"></script>

<!-- Template functions -->
<script src="/adm/js/developr.input.js"></script>
<script src="/adm/js/developr.message.js"></script>
<script src="/adm/js/developr.notify.js"></script>
<script src="/adm/js/developr.tooltip.js"></script>

<script>

	/*
	 * How do I hook my login script to this?
	 * --------------------------------------
	 *
	 * This script is meant to be non-obtrusive: if the user has disabled javascript or if an error occurs, the login form
	 * works fine without ajax.
	 *
	 * The only part you need to edit is the login script between the EDIT SECTION tags, which does inputs validation
	 * and send data to server. For instance, you may keep the validation and add an AJAX call to the server with the
	 * credentials, then redirect to the dashboard or display an error depending on server return.
	 *
	 * Or if you don't trust AJAX calls, just remove the event.preventDefault() part and let the form be submitted.
	 */

	$(document).ready(function () {
		/*
		 * JS login effect
		 * This script will enable effects for the login page
		 */
		// Elements
		var doc = $('html').addClass('js-login'),
			container = $('#container'),
			formLogin = $('#form-login'),

		// If layout is centered
			centered;

		/******* EDIT THIS SECTION *******/

		/*
		 * AJAX login
		 * This function will handle the login process through AJAX
		 */
		formLogin.submit(function (event) {
			// Values
			var login = $.trim($('#login').val()),
				pass = $.trim($('#pass').val());

			// Check inputs
			if (login.length === 0) {
				// Display message
				displayError('Пожалуйста введите Ваш логин');
				return false;
			}
			else if (pass.length === 0) {
				// Remove empty login message if displayed
				formLogin.clearMessages('Пожалуйста введите Ваш логин');

				// Display message
				displayError('Пожалуйста введите Ваш пароль');
				return false;
			}
			else {
				// Remove previous messages
				formLogin.clearMessages();

				// Show progress
				displayLoading('Проверка логина и пароля...');
				event.preventDefault();

				// Stop normal behavior
				event.preventDefault();

				$.ajax('/admin/auth/auth/', {
					cache: false,
					data:{
						login:login,
						password:pass
					},
					success:function (data) {
						if (data && data.type == 'ok') {
							document.location.href = '/admin';
						}
						else {
//						document.location.href = '/admin';
							formLogin.clearMessages();
							displayError('Неверный логин/пароль, пожалуйста введите снова');
						}
					},
					error:function () {
//					document.location.href = '/admin';
						formLogin.clearMessages();
						displayError('Ошибка сервера, пожалуйста повторите позже');
					}
				});
			}
		});

		/******* END OF EDIT SECTION *******/

			// Handle resizing (mostly for debugging)
		function handleLoginResize() {
			// Detect mode
			centered = (container.css('position') === 'absolute');

			// Set min-height for mobile layout
			if (!centered) {
				container.css('margin-top', '');
			}
			else {
				if (parseInt(container.css('margin-top'), 10) === 0) {
					centerForm(false);
				}
			}
		}

		;

		// Register and first call
		$(window).bind('normalized-resize', handleLoginResize);
		handleLoginResize();

		/*
		 * Center function
		 * @param boolean animate whether or not to animate the position change
		 * @param string|element|array any jQuery selector, DOM element or set of DOM elements which should be ignored
		 * @return void
		 */
		function centerForm(animate, ignore) {
			// If layout is centered
			if (centered) {
				var siblings = formLogin.siblings(),
					finalSize = formLogin.outerHeight();

				// Ignored elements
				if (ignore) {
					siblings = siblings.not(ignore);
				}

				// Get other elements height
				siblings.each(function (i) {
					finalSize += $(this).outerHeight(true);
				});

				// Setup
				container[animate ? 'animate' : 'css']({ marginTop:-Math.round(finalSize / 2) + 'px' });
			}
		}

		;

		// Initial vertical adjust
		centerForm(false);

		/**
		 * Function to display error messages
		 * @param string message the error to display
		 */
		function displayError(message) {
			// Show message
			var message = formLogin.message(message, {
				append:false,
				arrow:'bottom',
				classes:['red-gradient'],
				animate:false					// We'll do animation later, we need to know the message height first
			});

			// Vertical centering (where we need the message height)
			centerForm(true, 'fast');

			// Watch for closing and show with effect
			message.bind('endfade',
				function (event) {
					// This will be called once the message has faded away and is removed
					centerForm(true, message.get(0));

				}).hide().slideDown('fast');
		}

		/**
		 * Function to display loading messages
		 * @param string message the message to display
		 */
		function displayLoading(message) {
			// Show message
			var message = formLogin.message('<strong>' + message + '</strong>', {
				append:false,
				arrow:'bottom',
				classes:['blue-gradient', 'align-center'],
				stripes:true,
				darkStripes:false,
				closable:false,
				animate:false					// We'll do animation later, we need to know the message height first
			});

			// Vertical centering (where we need the message height)
			centerForm(true, 'fast');

			// Watch for closing and show with effect
			message.bind('endfade',
				function (event) {
					// This will be called once the message has faded away and is removed
					centerForm(true, message.get(0));

				}).hide().slideDown('fast');
		}
	});

</script>

</body>
</html>