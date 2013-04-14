<?php

class BaseController extends CController
{
    public $layout='application.modules.admin.views.layouts.main';

    protected $__session;
    protected $_isAdmin;

    public function init()
    {
        $this->__session = Yii::app()->session;;

        if ($this->_getParam('logout'))
            $this->__session->destroy();
//echo Yii::app()->controller->id; exit();
//        $this->checkAuth();
//        $this->menu();
    }


    protected function checkAuth($redirect = true)
    {
        if (in_array($this->view->ACTION_NAME, array('upload-image', 'upload-file'))) {
            return true;
        }

        if ($this->__session->isAdmin) {
            $this->_isAdmin = $this->__session->isAdmin;
            return true;
        }

        return false;
    }

    public function menu()
    {
        $menu = array(
            'order' => 'Заказы',
            'content' => 'Страницы',
            'menu' => 'Верхнее меню',
            'main_banner' => 'Слайдер на главной',
            'category' => 'Категории товаров',
            'brand' => 'Производители (бренды)',
            'group' => 'Группы товаров',
            'item' => 'Товары',
            'news' => 'Новости',
            'article' => 'Статьи',
            'sale' => 'Скидки и акции',
        );
        return $menu;
//        $this->view->menu = $menu;
    }

    public function _getParam($name, $default = null)
    {
        return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
    }
}