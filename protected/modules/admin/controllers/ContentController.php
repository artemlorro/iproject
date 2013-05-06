<?php

class ContentController extends BaseController
{
	protected $_entityClass;

	protected $modelName = '';
	protected $model;

	protected $fields;

	protected $fieldTypeObjects;

	protected $orderField;
	protected $order;

	protected $searchFields = array();


	public function init ()
	{
		parent::init();

		$this->modelName = $this->view->MODEL_NAME = $this->_getParam('model', false);

		if (!$this->modelName) {
			return false;
		}

		$this->_entityClass = $this->_camelCase($this->modelName);
		$this->model = new $this->_entityClass;
		$this->fields = $this->view->fields = $this->model->fields;

		$this->initDefaultParam();
//		$this->initSearchFields();
//
		$this->view->urlQueryString = $this->_getUrlQuery();
	}

	protected function initDefaultParam ()
	{
		$this->view->tableName = $this->model->tableName;
		$this->view->idField = 'id';

		$this->orderField = $this->view->idField;
		$this->order = $this->view->idField . ' desc';

		foreach ($this->fields as $key => &$field) {
			if ($field['type'] == 'order') {
				$this->orderField = $this->order = $key;
			}
			if ($field['type'] == 'parent') {
				$this->searchFields[$key] = 0;
			}
			if ($field['type'] == 'select' || $field['type'] == 'multiselect') {
//				$field['model'] = new $field['modelClass']();
			}
		}

		$this->view->orderField = $this->orderField;
		$this->view->order = $this->order;
	}

	protected function initSearchFields()
	{
		foreach($_REQUEST as $key => $value) {
			if (strpos($key, 'cond_') !== false && trim($value)) {
				$this->searchFields[str_replace('cond_', '', $key)] = $value;
			}
		}
	}

    public function actionIndex()
    {}

	public function actionView()
	{
		$limit = $this->view->limit = $this->_getParam('limit', 20);
		$page = $this->view->page = $this->_getParam('page', 1);
		$offset = ($page - 1) * $limit;

		$count = $this->view->count = $this->_getCount();
		$this->view->collection = $this->_getAll($this->order, $limit, $offset);

		$searchBlocks = array();
		foreach ($this->model->searchFields as $key) {
			$value = isset($this->searchFields[$key]) ? $this->searchFields[$key] : '';
			$fieldTypeObject = $this->_getFieldTypeObject($this->fields[$key]['type']);
			$searchBlocks[$key] = $fieldTypeObject->getEditBlock($key, $value, $this->fields[$key], "cond_");
		}

		$this->view->searchBlocks = $searchBlocks;

		$paginator = new Paginator();
		$this->view->paginator = $paginator->init($count, $limit, $page, '/admin/content/view/model/' . $this->view->MODEL_NAME . '/?'.$this->view->urlQueryString.'&page=_PAGE_');

		$this->render('view');
	}

	public function actionEdit()
	{
		$id = $this->view->id = $this->_getParam('id', 0);

		$data = $id ? $this->_getRow($id) : null;

		if (!$id) {
			$obj = new $this->model;
			$obj->save();
			$id = $this->view->id = $obj->id;
			header('location: /admin/content/edit/model/' . $this->modelName . '/id/' . $id . '/' . rand(111, 999));
			exit();
		}

		$editBlocks = array();
		foreach ($this->fields as $key => $field) {
			$fieldTypeObject = $this->_getFieldTypeObject($field['type']);
			$editBlocks[$key] = $fieldTypeObject->getEditBlock($key, $data, $field);
		}

		$this->view->data = $data;
		$this->view->editBlocks = $editBlocks;
		$this->view->backUrl = $this->_getBackUrl();

		$this->render('edit');
	}

	public function actionSave()
	{
		$id = $this->_getParam('id', 0);
		$dataDb = array();
		foreach ($this->fields as $key => $field) {
			if (in_array($field['type'], array('order', 'images', 'files'))) continue;
			$fieldTypeObject = $this->_getFieldTypeObject($field['type']);

			switch ($field['type']) {
				case 'multiselect':
					$fieldTypeObject->saveData($key, $field, $id);
					break;
				case 'skey':
					$dataDb[$key] = $fieldTypeObject->getStoredData($key);
					$dataDb[$key] = $this->getUniqueFieldById($this->model->tableName(), $id, 'skey', $dataDb[$key]);
					break;
				default:
					$dataDb[$key] = $fieldTypeObject->getStoredData($key);
					break;
			}

		}

		if ($id) {
			$a = $this->_entityClass;
			$a::model()->updateByPk($id, $dataDb);
		}

		$this->dataJsonOk('Данные сохранены!');
	}

	public function actionDelete ()
	{
		$id = $this->_getParam('id', 0);
		$url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] . rand(10,90) : '/admin/content/view/model/' . $this->modelName . '/' . rand(100,900);
		if ($id) {
			$a = $this->_entityClass;
			$a::model()->deleteByPk($id);
		}
		header('location:' . $url);
		exit();
	}

	public function actionMove ()
	{
		$type = $this->_getParam('type', '');
		$id = $this->_getParam('id', 0);

		if (!$id || !$type) return false;

		$select = $this->_selectSql();
		$select->order($this->order);
		$data = $this->_mapper->getGateway()->fetchAll($select);
		$dataKeys = $this->_getKeysArray($data);

		$key = array_search($id, $dataKeys);

		switch ($type) {
			case "upup":
				$temp = $dataKeys[$key];
				unset($dataKeys[$key]);
				array_unshift($dataKeys, $temp);
				break;
			case "up":
				if ($key) {
					$temp = $dataKeys[$key - 1];
					$dataKeys[$key - 1] = $dataKeys[$key];
					$dataKeys[$key] = $temp;
				}
				break;
			case "down":
				if ($dataKeys[$key + 1]) {
					$temp = $dataKeys[$key + 1];
					$dataKeys[$key + 1] = $dataKeys[$key];
					$dataKeys[$key] = $temp;
				}
				break;
			case "downdown":
				$temp = $dataKeys[$key];
				unset($dataKeys[$key]);
				array_push($dataKeys, $temp);
				break;
		}

		foreach ($dataKeys as $i => $id) {
			$a = $this->_entityClass;
			$a::model()->updateByPk($id, array($this->orderField => $i));
		}

		$this->dataJsonOk();
	}

	function actionUploadimage ()
	{
		$id = $this->_getParam('id', 0);
		$fieldName = $this->_getParam('key');

		if (!$id) return false;

		$fieldTypeObject = $this->_getFieldTypeObject('images');

		$result = $fieldTypeObject->upload($fieldName, $this->fields[$fieldName]);

		$data = $this->_getRow($id);
		$value = $data[$fieldName];

		$value = $fieldTypeObject->addFile($value, $result['filename']);

		$dataDb = array($fieldName => $value);

		$a = $this->_entityClass;
		$a::model()->updateByPk($id, $dataDb);

		$this->dataJsonOk(array('value' => $value, 'preview' => $result['preview']));
	}

	function actionDeleteimage ()
	{
		$id = $this->_getParam('id', 0);
		$fieldName = $this->_getParam('key');
		$fileName = $this->_getParam('file');

		if (!$id || !$fileName) return false;

		$data = $this->_getRow($id);
		$value = $data[$fieldName];
		$fieldTypeObject = $this->_getFieldTypeObject('images');
		$value = $fieldTypeObject->deleteFile($value, $fileName, $this->fields[$fieldName]);
		$dataDb = array($fieldName => $value);

		$a = $this->_entityClass;
		$a::model()->updateByPk($id, $dataDb);

		$this->dataJsonOk($value);
	}

	function actionUploadfile ()
	{
		$id = $this->_getParam('id', 0);
		$fieldName = $this->_getParam('key');

		$fieldTypeObject = $this->_getFieldTypeObject('files');

		$result = $fieldTypeObject->upload($fieldName, $this->fields[$fieldName]);

		if ($id) {
			$data = $this->_getRow($id);
			$value = $data[$fieldName];
		}
		else {
			$value = '';
		}

		$value = $fieldTypeObject->addFile($value, $result);
		$this->dataJsonOk(array('value' => $value, 'file' => $result));

		if (!$id) return false;

		$dataDb = array($fieldName => $value);
		$this->_mapper->getGateway()->update($dataDb, array('`id` = ?' => $id));
	}

	function actionDeletefile ()
	{
		$id = $this->_getParam('id', 0);
		$fieldName = $this->_getParam('key');
		$fileName = $this->_getParam('file');

		if (!$id || !$fileName) return false;

		$data = $this->_getRow($id);
		$value = $data[$fieldName];
		$fieldTypeObject = $this->_getFieldTypeObject('files');
		$value = $fieldTypeObject->deleteFile($value, $fileName, $this->fields[$fieldName]);
		$dataDb = array($fieldName => $value);
		$this->dataJsonOk($value);
		$this->_mapper->getGateway()->update($dataDb, array('`id` = ?' => $id));
	}

	function actionGetfile ()
	{
		$id = $this->_getParam('id', 0);
		$fieldName = $this->_getParam('key');
		$fileName = $this->_getParam('file');

		if (!$fileName) return false;

		$data = $this->_getRow($id);
		$files = $data[$fieldName . 'Value'];

		$this->disableRender();

		if (!isset($files[$fileName]) && !file_exists($files[$fileName]['path'])) {
			echo 'Файл не найден!';
			return false;
		}

		header("Content-type: application/x-download");
		header("Content-Disposition: attachment; filename=" . $files[$fileName]['name'] . ";");
		header("Accept-Ranges: bytes");
		header("Content-Length: " . filesize($files[$fileName]['path']));

		readfile($files[$fileName]['path']);
	}


	protected function getUniqueFieldById($tableName, $id, $fieldName, $value, $separator = '_')
	{
		$sql = "select CONVERT(REPLACE(" . $fieldName . ",'" . $value . $separator . "',''), signed) as i
				from " . $tableName . " where " . $fieldName . " like '" . $value . "%' and id <> " . $id . " order by i desc limit 1";
		$max = Yii::app()->db->createCommand($sql)->queryRow();

		$newValue = $value;
		if ($max) {
			$newValue .= $separator . ($max['i'] ? $max['i'] + 1 : 2);
		}

		return $newValue;
	}

	protected function _getCount()
	{
		$sql = "select count(*) as cnt from " . $this->model->tableName();
		$count = Yii::app()->db->createCommand($sql)->queryColumn();
		return $count ? (int) current($count) : 0;
	}

	protected function _getAll ($order, $limit, $offset)
	{
		$command = Yii::app()->db->createCommand()
			->select('*')
			->from($this->model->tableName() . ' t')
			->limit($limit, $offset);

		foreach ($this->searchFields as $key => $value) {
			$param = $this->model->fields[$key];
			if ($param['type'] == 'text') {
				$command->where(array('like', $key, '%'.(string)$value.'%'));
			} else {
				$command->where($key.' = :'.$key, array(':'.$key => (string) $value));
			}
		}


		$res = array();
		foreach ($command->queryAll() as $row) {
			$res[] = $this->_getRowValues($row);
		}
		return $res;
	}

	protected function _getRowValues ($row)
	{
//		print_r($row->toArray()); exit();
		$result = $row;

		foreach ($this->fields as $key => $field) {
			$fieldTypeObject = $this->_getFieldTypeObject($field['type']);
			$result[$key . 'Value'] = $fieldTypeObject->getValue(isset($result[$key]) ? $result[$key] : null, $this->fields[$key], isset($result['id']) ? $result['id'] : 0);
		}
		return $result;
	}

	protected function _getRow ($id)
	{
		$command = Yii::app()->db->createCommand()
			->select('*')
			->from($this->model->tableName() . ' t')
			->where('id = :id', array(':id' => $id));
		$data = $command->queryRow();
		if (!$data) {
			return false;
		}
		$data = $this->_getRowValues($data);
		return $data;
	}

	protected function _getBackUrl()
	{
		$url = @$_SERVER['HTTP_REFERER'];
		$url .= (strpos($url, '?') ? '&' : '?') . rand(111,999);
		return $url;
	}

	protected function _getUrlQuery()
	{
		$x = $_GET;
		if (isset($x['page'])) unset($x['page']);
		return http_build_query($x);
	}

	protected function _getFieldTypeObject ($fieldType)
	{
		if (!isset($this->fieldTypeObjects[$fieldType]) || !is_object($this->fieldTypeObjects[$fieldType])) {
			$name = 'Field' . ucfirst($fieldType);
			$this->fieldTypeObjects[$fieldType] = new $name($this->view);
		}

		return $this->fieldTypeObjects[$fieldType];
	}
}