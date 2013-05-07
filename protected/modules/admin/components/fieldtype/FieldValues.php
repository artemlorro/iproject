<?php

class FieldValues extends FieldAbstract
{
	function getValue ($value, $param, $id = 0)
	{
		return isset($param['values'][$value]) ? $param['values'][$value] : '-';
	}
	
	function getEditBlock ($key, $db_data, $param, $prefix = "edit_")
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';

		$this->view->key = $key;
		$this->view->db_value = (int) $db_value;
		$this->view->field = $param;
		$this->view->prefixName = $prefix;

		return $this->render('editblocks/' . $param['type'] . '.phtml');
	}

}