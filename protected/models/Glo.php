<?php

/**
 * @property string $id
 * @property string $header_phone1_code
 * @property string $header_phone1
 * @property string $header_phone2_code
 * @property string $header_phone2
 * @property string $main_slider_images
 * @property string $main_ceo_text
 * @property string $main_ceo_sub
 * @property string $main_ceo_img
 * @property string $main_ceo_fio
 * @property string $url_vk
 * @property string $url_fb
 * @property string $url_tw
 */
class Glo extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Основные настройки';
	public $fields = array(
		'header_phone1_code' => array('type' => 'text', 'name' => 'Телефон Единого диспетческого центра - код'),
		'header_phone1' => array('type' => 'text', 'name' => 'Телефон Единого диспетческого центра - номер'),
		'header_phone2_code' => array('type' => 'text', 'name' => 'Телефон по России - код'),
		'header_phone2' => array('type' => 'text', 'name' => 'Телефон по России - номер'),
		'main_slider_images' => array('type' => 'images', 'name' => 'Главная страница - слайдер изображений', 'skiplist' => true,
			'count' => 10, 'dirname' => 'files/main', 'w' => 640, 'h' => 319),
		'main_ceo_text' => array('type' => 'editor', 'name' => 'Главная страница - обращение ген. директора'),
		'main_ceo_sub' => array('type' => 'text', 'name' => 'Главная страница - подпись фото ген. директора'),
		'main_ceo_fio' => array('type' => 'text', 'name' => 'Главная страница - ФИО ген. директора'),
		'main_ceo_img' => array('type' => 'images', 'name' => 'Главная страница - фото ген. директора', 'skiplist' => true,
			'count' => 1, 'dirname' => 'files/main', 'w' => 185, 'h' => 195),
		'url_vk' => array('type' => 'text', 'name' => 'URL Vkontakte'),
		'url_fb' => array('type' => 'text', 'name' => 'URL Facebook'),
		'url_tw' => array('type' => 'text', 'name' => 'URL Twitter'),
	);

	public function getHeaderPhone1()
	{
		return $this->header_phone1;
	}

	public function getHeaderPhone1Code()
	{
		return $this->header_phone1_code;
	}

	public function getHeaderPhone2()
	{
		return $this->header_phone2;
	}

	public function getHeaderPhone2Code()
	{
		return $this->header_phone2_code;
	}

	public function getMainCeoFio()
	{
		return $this->main_ceo_fio;
	}

	public function getMainCeoImg()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->main_ceo_img, $this->fields['main_ceo_img']);
		$a = $value ? current($value) : false;
		return $a ? $a['url'] : false;
	}

	public function getMainCeoSub()
	{
		return $this->main_ceo_sub;
	}

	public function getMainCeoText()
	{
		return $this->main_ceo_text;
	}

	public function getMainSliderImages()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->main_slider_images, $this->fields['main_slider_images']);
		return $value;
	}

	public function getUrlFb()
	{
		return $this->url_fb;
	}

	public function getUrlTw()
	{
		return $this->url_tw;
	}

	public function getUrlVk()
	{
		return $this->url_vk;
	}




	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Glo
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
		return 'glo';
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