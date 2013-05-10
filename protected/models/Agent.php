<?php

/**
 * @property string $id
 * @property string $сid
 * @property string $email
 * @property string $password
 * @property string $name
 * @property string $last_name
 * @property string $middle_name
 * @property string $about
 * @property integer $show_site
 * @property string $photo
 * @property string $roles
 */
class Agent extends CActiveRecord
{
	const ROLE_EDIT_AGENT_PAGE = 1;
	const ROLE_CREATE_NEWS = 2;

	public $searchFields = array();
	public $tableName = 'Агенты';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'last_name' => array('type' => 'text', 'name' => 'Фамилия'),
		'name' => array('type' => 'text', 'name' => 'Имя'),
		'middle_name' => array('type' => 'text', 'name' => 'Отчество'),
		'email' => array('type' => 'text', 'name' => 'Email'),
		'password' => array('type' => 'text', 'name' => 'Пароль', 'skiplist' => true),
		'photo' => array('type' => 'images', 'name' => 'Фото', 'skiplist' => true,
			'count' => 1, 'dirname' => 'files/agents', 'w' => 210, 'h' => 160
		),
		'about' => array('type' => 'editor', 'name' => 'Личная страница', 'skiplist' => true),
		'show_site' => array('type' => 'values', 'name' => 'Показывать личную страницу', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	public function getAbout()
	{
		return $this->about;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getMiddleName()
	{
		return $this->middle_name;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function getPhoto()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->photo, $this->fields['photo']);
		return $value ? current($value) : false;
	}

	public function getRoles()
	{
		return array(
			self::ROLE_EDIT_AGENT_PAGE,
			self::ROLE_CREATE_NEWS
		);
//		return $this->roles;
	}

	public function getShowSite()
	{
		return $this->show_site;
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
		return 'agent';
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