<?php

/**
 * @property string $id
 * @property string $сid
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $photos
 * @property string $info
 */
class Office extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Офисы';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'branches' =>  array('type' => 'multiselect', 'name' => 'Направления', 'skiplist' => true,
			'modelClass' => 'Branch', 'data' => array('dbTable' => 'offices_branches', 'pkField' => 'office_id', 'skField' => 'branch_id')),
		'photos' => array('type' => 'images', 'name' => 'Фото', 'skiplist' => true,
			'count' => 20, 'dirname' => 'files/offices', 'w' => 535, 'h' => 356,
			'tmb' => array('w' => 130, 'h' => 89),
		),
		'phone' => array('type' => 'text', 'name' => 'Телефон'),
		'email' => array('type' => 'text', 'name' => 'E-mail'),
		'text' => array('type' => 'editor', 'name' => 'Описание', 'skiplist' => true),
	);

	public function getEmail()
	{
		return $this->email;
	}

	public function getInfo()
	{
		return $this->info;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getPhotos()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->photos, $this->fields['photos']);
		return $value;
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
		return 'office';
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