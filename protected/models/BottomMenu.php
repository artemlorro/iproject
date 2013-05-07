<?php

/**
 * @property string $id
 * @property integer $ordr
 * @property integer $col
 * @property string $name
 * @property string $url
 * @property integer $onoff
 * @method published()
 */
class BottomMenu extends CActiveRecord
{
	public $searchFields = array('col');
	public $tableName = 'Нижнее меню';
	public $fields = array(
		'ordr' => array('type' => 'order', 'name' => 'Порядок'),
		'col' => array('type' => 'values', 'name' => 'Колонка', 'values' => array(0 => '1я', 1 => '2я', 2 => '3я', 3 => '4я')),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'url' => array('type' => 'text', 'name' => 'URL'),
		'onoff' => array('type' => 'values', 'name' => 'Отображать', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	public function getName()
	{
		return $this->name;
	}

	public function getOnoff()
	{
		return $this->onoff;
	}

	public function getUrl()
	{
		return $this->url;
	}



	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'bottom_menu';
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

	public function scopes()
	{
		return array(
			'published' => array(
				'order' => 'ordr asc',
				'condition' => 'onoff = 1',
			),
		);
	}
}