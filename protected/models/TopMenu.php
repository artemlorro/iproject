<?php

/**
 * @property string $id
 * @property integer $ordr
 * @property integer $parent_id
 * @property string $name
 * @property string $url
 * @property integer $onoff
 * @method published()
 * @method firstLevel()
 */
class TopMenu extends CActiveRecord
{
	public $searchFields = array('parent_id');
	public $tableName = 'Верхнее меню';
	public $fields = array(
		'ordr' => array('type' => 'order', 'name' => 'Порядок'),
		'parent_id' => array('type' => 'parent', 'name' => 'Родительский пункт', 'modelClass' => 'TopMenu', 'skiplist' => true),
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

	public function getChilds()
	{
		$res = TopMenu::model()->published()->findAll('parent_id=:parent_id', array('parent_id' => $this->id));
		return $res;
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
		return 'top_menu';
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
			'firstLevel' => array(
				'condition' => 'parent_id = 0',
			),
		);
	}
}