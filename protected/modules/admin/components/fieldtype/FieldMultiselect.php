<?php

class FieldMultiselect extends FieldAbstract
{
	/**
	 * @var A_Model_Mapper_EntityMapper
	 */
	protected $_mapper;
	
	public function getValue ($value, $param, $id = 0)
	{
		$this->_mapper = $param['mapper'];

		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$select = $this->_mapper->getGateway()->select()->from(array('t' => $this->_mapper->getTableName()));
		$select->setIntegrityCheck(false);
		$select->joinLeft(array($dbTable => $dbTable), $dbTable . '.' . $skField . ' = t.id', array());
		$select->where($dbTable . '.' . $pkField . ' = ?', $id);
		$data = $this->_mapper->getGateway()->fetchAll($select);
		$values = array();
		foreach ($data->toArray() as $d) {
			$values[] = $d[$this->_mapper->nameField];
		}

		return implode(', ', $values);
	}
	
	function getEditBlock ($key, $db_data, $param, $prefix = "edit_")
	{
		$this->_mapper = $param['mapper'];
		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$select = $this->_mapper->getGateway()->select()->from(array('t' => $this->_mapper->getTableName()));
		$select->setIntegrityCheck(false);
		$select->joinLeft(array($dbTable => $dbTable), $dbTable . '.' . $skField . ' = t.id', array());
		$select->where($dbTable . '.' . $pkField . ' = ?', $db_data['id']);
		$data = $this->_mapper->getGateway()->fetchAll($select);
		$values = array();
		foreach ($data as $d) {
			$values[] = $d['id'];
		}

		$this->view->key = $key;
		$this->view->db_value = $values;
		$this->view->field = $param;
		$this->view->prefixName = $prefix;
		
		$parentField = false;
		foreach ($this->_mapper->fields as $k => $f) {
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
		$this->view->nameField = $this->_mapper->nameField;
		
		$select = $this->_mapper->getGateway()->select()->order($this->_mapper->nameField);
		if ($parentField) $select->where("$parentField = ?", $parent_id);
		$data = $this->_mapper->getGateway()->fetchAll($select);		

		if ($data) foreach ($data as $i) {
			$i = $i->toArray();
			$i['lvl'] = $lvl;
			$this->view->dataOption = $i;
			$options .= $this->render('editblocks/multiselect_option.phtml');

			if (!$parentField) continue;
			
			$select = $this->_mapper->getGateway()->select();
			$select->reset('order')->from($this->_mapper->getTableName(), array('sum' => new Zend_Db_Expr('count(id)')));
			$count = current(current($this->_mapper->getGateway()->fetchRow($select)));

			if ($count) {
				$this->parseOption($options, $parentField, $i[$idField], $lvl + 1);
			}
		}
	}

	function saveData($key, $param, $id)
	{
		$data = isset($_REQUEST['edit_' . $key]) ? $_REQUEST['edit_' . $key] : false;
		/**
		 * @var A_Model_Mapper_EntityMapper $mapper
		 */
		$mapper = $param['mapper'];
		$dbTable = $param['data']['dbTable'];
		$pkField = $param['data']['pkField'];
		$skField = $param['data']['skField'];

		$deleteSql = 'delete from ' . $dbTable . ' where ' . $pkField . ' = ' . $id;
		$mapper->getGateway()->getAdapter()->query($deleteSql);

		if ($data) {
			$insertSql = 'insert into ' . $dbTable . ' ('.$pkField.', '.$skField.') values ';
			foreach ($data as $k => $d) {
				$insertSql .= ($k ? ',' : '') . '('.$id.', '.(int)$d.')';
			}
			$mapper->getGateway()->getAdapter()->query($insertSql);
		}

		return $data;
	}
}