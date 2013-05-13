<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends AController
{
	/**
	 * @var Glo
	 */
	public $glo = null;

	public $view = null;

	protected $__session;

	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


	public function init()
	{
		parent::init();
		
                $this->view = new FrontView();
		
                //получаем сессию
                $this->__session = Yii::app()->session;

		//получачем общие параметры сайта
                $this->glo = $this->view->glo = Glo::model()->findByPk(1);

		//получаем информацию о верхнем меню
                $this->view->top_menu = TopMenu::model()->published()->firstLevel()->findAll();
                
		//получает информацию о нижнем меню
                $bottom_menu = array();
		//перебираем все активныне пункты нижнего меню
                foreach (BottomMenu::model()->published()->findAll() as $i) {
			$bottom_menu[$i->col][] = $i;
		}
		$this->view->bottom_menu = $bottom_menu;
	}

	public function _getParam($name, $default = null)
	{
                return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
	}
}