<?php
//контроллер авторизации для панели управления сайтом
class AuthController extends BaseController
{
	public $layout='application.modules.admin.views.layouts.auth';

	public function actionIndex()
	{
		//пользователь администратор?
                if ($this->_isAdmin) {
			header('location:/admin/'); exit();
		}
		$this->render('index');
	}

	//проверка авторизации в админке сайта
        public function actionAuth()
	{
		//пользователь админ?
                if (isset($this->__session['isAdmin']) && $this->__session['isAdmin']) {
			$this->dataJsonOk();
			return;//уходим. он уже админ
		}

		//пользователь оказался не админом. попробуем его авторизовать
                $login = $this->_getParam('login', '-');
		$pass = $this->_getParam('password', '-');

		$slogin = Yii::app()->getModule('admin')->login;
		$spass = Yii::app()->getModule('admin')->password;

		//пароль подошел?
                if ($slogin == strtolower($login) && $spass == $pass) {
			$this->__session['isAdmin'] = true;
			$this->dataJsonOk();//уходим. теперь он админ
			return;
		}

		$this->dataJsonError();
		return;//пользователь не угадал пароль
	}
}