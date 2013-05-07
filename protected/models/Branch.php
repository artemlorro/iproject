<?php

/**
 * @property integer $id
 * @property string $cid
 * @property string $name
 * @property integer $onoff
 * @method published()
 */
class Branch extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Направления';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'onoff' => array('type' => 'values', 'name' => 'Отображать страницу', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	public function getName()
	{
		return $this->name;
	}

	public function getOnoff()
	{
		return $this->onoff;
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
		return 'branch';
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

	public function scopes()
	{
		return array(
			'published' => array(
				'condition' => 'onoff = 1',
				'order' => 'name asc',
			),
		);
	}
}