<?php
return CMap::mergeArray(
	array(
		'basePath' => dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
		'name' =>' Itaka',
		'theme' => 'itaka.spb.ru',

		'modules' =>array(
		),

		'import'=>array(
			'application.sites.common.controllers.*',
		),

		'controllerMap' => array(
			'site' => 'application.sites.common.controllers.SiteController',
			'page' => 'application.sites.common.controllers.PageController',
			'api' => 'application.sites.common.controllers.ApiController',
			'news' => 'application.sites.common.controllers.NewsController',
			'bnews' => 'application.sites.common.controllers.BnewsController',
			'agent' => 'application.sites.common.controllers.AgentController',
		),

		'components'=>array(
			'urlManager'=>array(
				'urlFormat'=>'path',
				'showScriptName' => false,
				'urlSuffix' => '/',
				'rules' => array(

				),
			),
			'errorHandler'=>array(
				'errorAction'=>'site/error',
			),

		),
		'params'=>array(
			'adminEmail'=>'admin@itaka.spb.ru',
			'arCustomParams' => array(
			),
		),
	),
	require_once(dirname(__FILE__).'/main.php')
);