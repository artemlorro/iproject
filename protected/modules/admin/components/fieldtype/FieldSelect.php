<?php

class FieldSelect extends FieldAbstract
{
	/**
	 * @var A_Model_Mapper_EntityMapper
	 */
	protected $_mapper;
	
	function getValue ($value, $param, $id = 0)
	{
		if (!$value) return '-';
		$this->_mapper = $param['mapper'];
		$row = $this->_mapper->find($value);
		return $row ? $row->{$this->_mapper->nameField} : '';
	}
	
	function getEditBlock ($key, $db_data, $param, $prefix = "edit_")
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';

		$this->_mapper = $param['mapper'];

		$this->view->key = $key;
		$this->view->db_value = (int)$db_value;
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
			$options .= $this->render('editblocks/select_option.phtml');

			if (!$parentField) continue;
			
			$select = $this->_mapper->getGateway()->select();
			$select->reset('order')->from($this->_mapper->getTableName(), array('sum' => new Zend_Db_Expr('count(id)')));
			$count = current(current($this->_mapper->getGateway()->fetchRow($select)));

			if ($count) {
				$this->parseOption($options, $parentField, $i[$idField], $lvl + 1);
			}
		}
	}
}