<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends CController
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
		$this->__session = Yii::app()->session;
		$this->glo = $this->view->glo = Glo::model()->findByPk(1);
	}

	public function _getParam($name, $default = null)
	{
		return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
	}
}