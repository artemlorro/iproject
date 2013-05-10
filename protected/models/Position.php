<?php

/**
 * @property integer $id
 * @property string $cid
 * @property string $name
 */
class Position extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Должности агентов';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
	);

	public function getCid()
	{
		return $this->cid;
	}

	public function getName()
	{
		return $this->name;
	}





	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Branch
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'position';
	}

	public function rules()
	{
		return array();
	}

	public function relations()
	{
		return array();
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array();
	}
}