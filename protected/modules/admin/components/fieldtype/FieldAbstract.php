<?php

class FieldAbstract
{
	public $view;
	public $tplPath = '';

	public function __construct($view = null)
	{
		$this->view = $view ? $view : new Admin_View();
		$this->tplPath = Yii::app()->basePath.'/modules/admin/views/fieldtypes';
	}

	public function getValue($value, $param, $id = 0)
	{
		return $value;
	}

	public function getEditBlock($key, $db_data, $param, $prefix = "edit_")
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';
		$this->view->key = $key;
		$this->view->db_value = $db_value;
		$this->view->value = $this->getValue($db_value, $param, isset($db_data['id']) ? $db_data['id'] : 0);
		$this->view->field = $param;
		$this->view->prefixName = $prefix;
		return $this->render('editblocks/' . $param['type'] . '.phtml');
	}

	public function getStoredData($key)
	{
		$data = $_REQUEST['edit_' . $key];
		return $data;
	}

	public function render($tpl)
	{
		ob_start();
		Yii::app()->controller->renderInternal($this->tplPath. '/' . $tpl);
		return ob_get_clean();
	}
}