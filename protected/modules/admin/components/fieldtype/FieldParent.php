<?php

class FieldParent extends FieldAbstract
{
	/**
	 * @var A_Model_Mapper_EntityMapper
	 */
	protected $_mapper;
	
	public function getValue ($value, $param, $id = 0)
	{
		if (!$value) return '-';
		$this->_mapper = $param['mapper'];
		$row = $this->_mapper->find($value);
		return $row->{$this->_mapper->nameField};
	}

	public function getEditBlock ($key, $db_data, $param, $prefixName = 'edit_')
	{
		$db_value = $db_data && isset($db_data[$key]) ? $db_data[$key] : '';

		$this->_mapper = $param['mapper'];

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
		$this->view->nameField = $this->_mapper->nameField;
		
		$select = $this->_mapper->getGateway()->select()->order('id');
		$select->where("$key = ?", $parent_id);
		$data = $this->_mapper->getGateway()->fetchAll($select);

		if ($data) foreach ($data as $i) {
			$i = $i->toArray();
			$i['lvl'] = $lvl;
			$this->view->dataOption = $i;
			$options .= $this->render('editblocks/parent_option.phtml');

			$select = $this->_mapper->getGateway()->select();
			$select->reset('order')->from($this->_mapper->getTableName(), array('sum' => new Zend_Db_Expr('count(id)')));
			$count = current(current($this->_mapper->getGateway()->fetchRow($select)));

			if ($count) {
				$this->parseOption($options, $key, $i[$idField], $lvl + 1);
			}
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