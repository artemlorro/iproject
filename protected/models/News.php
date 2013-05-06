<?php

/**
 * @property string $id
 * @property string $skey
 * @property string $name
 * @property string $ann
 * @property string $text
 * @property string $preview
 * @property integer $onoff
 * @method published()
 * @method recently()
 */
class News extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Новости компании';
	public $fields = array(
		'skey' => array('type' => 'skey', 'name' => 'Ключ (сам генерируется)', 'skiplist' => true),
		'dt' => array('type' => 'datetime', 'name' => 'Дата новости'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'preview' => array('type' => 'images', 'name' => 'Превью', 'skiplist' => true,
			'count' => 1, 'dirname' => 'files/news', 'w' => 135),
		'ann' => array('type' => 'editor', 'name' => 'Аннотация', 'skiplist' => true),
		'text' => array('type' => 'editor', 'name' => 'Текст новости', 'skiplist' => true),
		'onoff' => array('type' => 'values', 'name' => 'Отображать страницу', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	public function getAnn()
	{
		return $this->ann;
	}

	public function getDt()
	{
		return $this->dt;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getOnoff()
	{
		return $this->onoff;
	}

	public function getPreview()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->preview, $this->fields['preview']);
		return $value ? current($value) : false;
	}

	public function getText()
	{
		return $this->text;
	}

	public function url()
	{
		return '/news/view/' . $this->skey;
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
		return 'news';
	}

	public function rules()
	{
		return array(
			array('onoff', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('dt, ann, text, preview', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dt, name, ann, text, preview, onoff', 'safe', 'on'=>'search'),
		);
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
			'recently' => array(
				'order' => 'dt DESC',
				'limit' => 6,
			),
		);
	}
}