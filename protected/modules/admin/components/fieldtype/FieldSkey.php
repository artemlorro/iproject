<?php

class FieldSkey extends FieldAbstract
{
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
		$data = GenerateService::instance()->generateAlias($_REQUEST['edit_name']);
//		$data = $_REQUEST['edit_' . $key];
		return $data;
	}
}