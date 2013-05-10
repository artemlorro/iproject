<?php

class BaseController extends CController
{
    public $layout='application.modules.admin.views.layouts.main';
	public $breadcrumbs = array();

	public $view = null;

    protected $__session;
    protected $_isAdmin = false;

    public function init()
    {
	    $this->view = new Admin_View();
        $this->__session = Yii::app()->session;

        if ($this->_getParam('logout'))
            unset($this->__session['isAdmin']);

        if (!$this->checkAuth() && Yii::app()->controller->id != 'auth') {
	        header('location:/admin/auth'); exit();
        };
        $this->menu();
    }


    protected function checkAuth()
    {
        if (isset($this->__session['isAdmin']) && $this->__session['isAdmin']) {
            $this->view->IS_ADMIN = $this->_isAdmin = $this->__session['isAdmin'];
            return true;
        }

        return false;
    }

    public function menu()
    {
        $menu = array(
            'branch' => 'Направления',
            'page' => 'Страницы',
	        'nedv' => array('name' => 'Объекты недвижимости',
		        'values' => array(
			        'obj_secondary' => 'Вторичная недвижимость',
		        )),
	        'news' => array('name' => 'Новости',
		        'values' => array(
                    'bnews' => 'Новости компании',
                    'news' => 'Новости рынка',
		        )),
	        'menu' => array('name' => 'Меню сайта',
		        'values' => array(
	                'top_menu' => 'Верхнее меню',
	                'bottom_menu' => 'Нижнее меню',
		        )),
	        'metro' => array('name' => 'Метро',
		        'values' => array(
			        'metro_line' => 'Линии метро',
			        'metro_station' => 'Станции метро',
		        )),
	        'distinct' => 'Районы',
	        'ground_status' => 'Статусы участков земли',
	        'building_type' => 'Типы домов',
	        'lavatory_type' => 'Типы санузла',
	        'pay_type' => 'Типы оплаты',
	        'office' => 'Офисы',
	        'position' => 'Должности агентов',
	        'agent' => 'Агенты',
	        'agent_info' => 'Агенты по должностям',
        );
        $this->view->menu = $menu;
    }

    public function _getParam($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }

	protected function _dataJsonMessage ($message = '', $type = 'OK', $viewRenderJson = true)
	{
		$message = array(
			'type' => $type,
			'data' => $message,
		);
//		if (!Yii::app()->request->isAjaxRequest) {
//			echo "<pre>"; print_r($message);
//			Yii::app()->end();
//			return;
//		}

		echo json_encode($message);
		Yii::app()->end();
		return;
	}

	public function dataJsonOk ($message = '', $viewRenderJson = true)
	{
		$this->_dataJsonMessage($message, 'ok', $viewRenderJson);
	}

	public function dataJsonError ($message = '', $viewRenderJson = true)
	{
		$this->_dataJsonMessage($message, 'error', $viewRenderJson);
	}

	protected function _camelCase ($word)
	{
		$a = explode('_', $word);
		$res = '';
		foreach ($a as $i) {
			$res .= ucfirst($i);
		}
		return $res;
	}
}

class Admin_View extends stdClass
{
	public function __get($name)
	{
		return null;
	}
}
