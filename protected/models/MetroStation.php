<?php

/**
 * @property string $id
 * @property string $cid
 * @property string $name
 * @property integer $metro_line_id
 */
class MetroStation extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Станции метро';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'metro_line_id' => array('type' => 'select', 'name' => 'Линия метро', 'modelClass' => 'MetroLine'),
	);

	public function getName()
	{
		return $this->name;
	}

	public function getCid()
	{
		return $this->cid;
	}

	public function getMetroLineId()
	{
		return $this->metro_line_id;
	}

	public function getMetroLine()
	{
		return MetroLine::model()->findByPk($this->getMetroLineId());
	}




	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MetroLine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'metro_station';
	}

	public function rules()
	{
		return array();
	}

	public function relations()
	{
		return array();
	}

	public function attributeLabels()
	{
		return array();
	}
}