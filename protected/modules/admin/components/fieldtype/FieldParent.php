<?php

class FieldParent extends FieldAbstract
{
	protected $model = null;
	
	public function getValue ($value, $param, $id = 0)
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

	public function getEditBlock ($key, $db_data, $param, $prefixName = 'edit_')
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';

		$modelClass = $param['modelClass'];
		$model = $this->model = new $modelClass();

		$this->view->key = $key;
		$this->view->db_value = (int)$db_value;
		$this->view->field = $param;
		$this->view->prefixName = $prefixName;

		$options = '';
		$this->parseOption($options, $key);
		$this->view->options = $options;
		return $this->render('editblocks/' . $param['type'] . '.phtml');
	}

	public function parseOption (&$options, $key, $parent_id = 0, $lvl = 0)
	{
		$idField = $this->view->idField = 'id';
		$this->view->nameField = 'name';

		$data = Yii::app()->db->createCommand()
			->select('id, name')
			->from($this->model->tableName())
			->order('name')
			->where($key . '=:id', array(':id'=>$parent_id))
			->queryAll();

		if ($data) foreach ($data as $i) {
			$i['lvl'] = $lvl;
			$this->view->dataOption = $i;
			$options .= $this->render('editblocks/parent_option.phtml');

			$this->parseOption($options, $key, $i[$idField], $lvl + 1);
		}
	}

	public function getParents($key, $mapper, $id)
	{
		$this->_mapper = $mapper;

		$result = array();
		$this->_getParent($result, $key, $id);
		
		if (isset($result[0])) unset($result[0]);

		$result = array_reverse($result);
		return $result;
	}

	protected function _getParent(&$result, $key, $id)
	{
		$row = $this->_mapper->getRow($id);
		if ($row) {
			$result[] = $row;
			if ($row->$key) $this->_getParent($result, $key, $row->$key);
		}
	}
}