<?php

class FieldSelect extends FieldAbstract
{
	protected $model = null;
	
	function getValue ($value, $param, $id = 0)
	{
		if (!$value) return '-';

		$modelClass = $param['modelClass'];
		$model = new $modelClass();

		$data = Yii::app()->db->createCommand()
			->select('id, name')
			->from($model->tableName())
			->where('id=:id', array(':id'=>$value))
			->queryRow();

		return isset($data['name']) ? $data['name'] : '-';
	}
	
	function getEditBlock ($key, $db_data, $param, $prefix = "edit_")
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';

		$modelClass = $param['modelClass'];
		$model = $this->model = new $modelClass();

		$this->view->key = $key;
		$this->view->db_value = (int)$db_value;
		$this->view->field = $param;
		$this->view->prefixName = $prefix;
		
		$parentField = false;
		foreach ($this->model->fields as $k => $f) {
			if ($f['type'] == 'parent') {
				$parentField = $k; break;
			}
		}

		$options = '';
		$this->parseOption($options, $parentField);
		$this->view->options = $options;
		return $this->render('editblocks/' . $param['type'] . '.phtml');
	}

	function parseOption (&$options, $parentField = false, $parent_id = 0, $lvl = 0)
	{
		$idField = $this->view->idField = 'id';
		$this->view->nameField = 'name';

		$command = Yii::app()->db->createCommand()
			->select('id, name')
			->from($this->model->tableName())
			->order('name');

		if ($parentField) $command->where($parentField . '=:id', array(':id'=>$parent_id));

		$data = $command->queryAll();

		if ($data) foreach ($data as $i) {
			$i['lvl'] = $lvl;
			$this->view->dataOption = $i;
			$options .= $this->render('editblocks/select_option.phtml');

			if (!$parentField) continue;

			$this->parseOption($options, $parentField, $i[$idField], $lvl + 1);
		}
	}
}