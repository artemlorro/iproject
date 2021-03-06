<?php

/**
 * @property string $id
 * @property string $cid
 * @property string $name
 */
class GroundStatus extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Статусы участков земли';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
	);

	public function getName()
	{
		return $this->name;
	}

	public function getCid()
	{
		return $this->cid;
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
		return 'ground_status';
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