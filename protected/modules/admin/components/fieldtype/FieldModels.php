<?php

class FieldModels extends FieldAbstract
{
	public function getValue($value, $param, $id = 0)
	{
		return unserialize($value);
	}

	public function getEditBlock($key, $db_data, $param, $prefix = "edit_")
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';
		$this->view->key = $key;
		$this->view->db_value = $db_value;
		$this->view->value = $this->getValue($db_value, $param, (isset($db_data['id']) ? $db_data['id'] : 0));
		$this->view->field = $param;
		return $this->render('editblocks/' . $param['type'] . '.phtml');
	}

	public function getStoredData($key)
	{
		$th = array();
		$tr = array();
		if (isset($_REQUEST['th']) && $_REQUEST['th']) {
			foreach ($_REQUEST['th'] as $n => $i) {
				$th[] = $i;
			}
			$th[] = 'Стоимость';
			if (isset($_REQUEST['td']) && $_REQUEST['td']) {
				foreach ($_REQUEST['td'] as $n2 => $i2) {
					$flag = false;
					foreach ($i2 as $x) { if (trim($x)) $flag = true; }
					if ($flag) $tr[] = $i2;
				}
			}
		}
		$data = array('th' => $th, 'tr' => $tr);
//		print_r($data); exit();
		return serialize($data);
	}
}