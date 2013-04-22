<?php

class AuthController extends BaseController
{
	public $layout='application.modules.admin.views.layouts.auth';

	public function actionIndex()
	{
		if ($this->_isAdmin) {
			header('location:/admin/'); exit();
		}
		$this->render('index');
	}

	public function actionAuth()
	{
		if (isset($this->__session['isAdmin']) && $this->__session['isAdmin']) {
			$this->dataJsonOk();
			return;
		}

		$login = $this->_getParam('login', '-');
		$pass = $this->_getParam('password', '-');

		$slogin = Yii::app()->getModule('admin')->login;
		$spass = Yii::app()->getModule('admin')->password;

		if ($slogin == strtolower($login) && $spass == $pass) {
			$this->__session['isAdmin'] = true;
			$this->dataJsonOk();
			return;
		}

		$this->dataJsonError();
		return;
	}
}