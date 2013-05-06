<?php

class FieldMultiselect extends FieldAbstract
{
	protected $model = null;

	public function getValue ($value, $param, $id = 0)
	{
		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$modelClass = $param['modelClass'];
		$model = new $modelClass();

		$data = Yii::app()->db->createCommand()
			->select('id, name')
			->from($model->tableName() . ' t')
			->join($dbTable . ' j', 't.id=j.' . $skField)
			->where('j.'.$pkField.'=:id', array(':id'=>$id))
			->queryAll();

		$values = array();
		foreach ($data as $d) {
			$values[] = $d['name'];
		}

		return implode(', ', $values);
	}
	
	function getEditBlock ($key, $db_data, $param, $prefix = "edit_")
	{
		$modelClass = $param['modelClass'];
		$model = $this->model = new $modelClass();

		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$data = Yii::app()->db->createCommand()
			->select('id, name')
			->from($model->tableName() . ' t')
			->join($dbTable . ' j', 't.id=j.' . $skField)
			->where('j.'.$pkField.'=:id', array(':id'=>$db_data['id']))
			->queryAll();

		$values = array();
		foreach ($data as $d) {
			$values[] = $d['id'];
		}

		$this->view->key = $key;
		$this->view->db_value = $values;
		$this->view->field = $param;
		$this->view->prefixName = $prefix;
		
		$parentField = false;
		foreach ($model->fields as $k => $f) {
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

		$data = Yii::app()->db->createCommand()
			->select('id, name')
			->from($this->model->tableName() . ' t')
			->order('t.name')
			->queryAll();

		// на будущее
//		if ($parentField) $select->where("$parentField = ?", $parent_id);

		if ($data) foreach ($data as $i) {
			$i['lvl'] = $lvl;
			$this->view->dataOption = $i;
			$options .= $this->render('editblocks/multiselect_option.phtml');

//			if (!$parentField) continue;
//
//			$select = $this->_mapper->getGateway()->select();
//			$select->reset('order')->from($this->_mapper->getTableName(), array('sum' => new Zend_Db_Expr('count(id)')));
//			$count = current(current($this->_mapper->getGateway()->fetchRow($select)));
//
//			if ($count) {
//				$this->parseOption($options, $parentField, $i[$idField], $lvl + 1);
//			}
		}
	}

	function saveData($key, $param, $id)
	{
		$data = isset($_REQUEST['edit_' . $key]) ? $_REQUEST['edit_' . $key] : false;

		$modelClass = $param['modelClass'];
		$model = $this->model = new $modelClass();

		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$deleteSql = 'delete from ' . $dbTable . ' where ' . $pkField . ' = ' . $id;
		Yii::app()->db->createCommand($deleteSql)->execute();

		if ($data) {
			$insertSql = 'insert into ' . $dbTable . ' ('.$pkField.', '.$skField.') values ';
			foreach ($data as $k => $d) {
				if ((int)$d) $insertSql .= ($k ? ',' : '') . '('.$id.', '.(int)$d.')';
			}
			Yii::app()->db->createCommand($insertSql)->execute();
		}

		return $data;
	}
}