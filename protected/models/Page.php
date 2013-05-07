<?php

/**
 * @property string $id
 * @property string $skey
 * @property string $name
 * @property string $text
 * @property integer $onoff
 * @method published()
 */
class Page extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Страницы';
	public $fields = array(
		'skey' => array('type' => 'skey', 'name' => 'Ключ (сам генерируется)'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'text' => array('type' => 'editor', 'name' => 'Текст', 'skiplist' => true),
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

	public function getSkey()
	{
		return $this->skey;
	}

	public function getText()
	{
		return $this->text;
	}

	public function url()
	{
		return '/page/' . $this->skey;
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
		return 'page';
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
				'condition' => 'onoff = 1',
			),
		);
	}
}