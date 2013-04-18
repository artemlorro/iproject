<?php

class AuthController extends CController
{
	public $layout='application.modules.admin.views.layouts.auth';
	public $breadcrumbs = array();

	public $view = null;

	public function actionIndex()
	{
		$this->render('index');
	}
}