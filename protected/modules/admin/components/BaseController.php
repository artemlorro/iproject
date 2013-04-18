<?php

class BaseController extends CController
{
    public $layout='application.modules.admin.views.layouts.main';
	public $breadcrumbs = array();

	public $view = null;

    protected $__session;
    protected $_isAdmin;

    public function init()
    {
	    $this->view = new stdClass();
        $this->__session = Yii::app()->session;

        if ($this->_getParam('logout'))
            $this->__session->destroy();
//echo Yii::app()->controller->id; exit();
        if (!$this->checkAuth()) {
	        header('location:/admin/auth'); exit();
        };
        $this->menu();
    }


    protected function checkAuth($redirect = true)
    {
//        if (in_array($this->view->ACTION_NAME, array('upload-image', 'upload-file'))) {
//            return true;
//        }

        if (isset($this->__session->isAdmin) && $this->__session->isAdmin) {
            $this->view->IS_ADMIN = $this->_isAdmin = $this->__session->isAdmin;
            return true;
        }

        return false;
    }

    public function menu()
    {
        $menu = array(
            'news' => 'Новости',
        );
        return $menu;
        $this->view->menu = $menu;
    }

    public function _getParam($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }
}