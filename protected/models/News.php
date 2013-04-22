<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property string $id
 * @property string $dt
 * @property string $name
 * @property string $ann
 * @property string $text
 * @property string $preview
 * @property integer $onoff
 */
class News extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Новости';
	public $fields = array(
		'skey' => array('type' => 'skey', 'name' => 'Ключ (сам генерируется)', 'skiplist' => true),
		'dt' => array('type' => 'datetime', 'name' => 'Дата новости'),
		'name' => array('type' => 'text', 'name' => 'Наименование'),
		'preview' => array('type' => 'images', 'name' => 'Превью', 'skiplist' => true,
			'count' => 1, 'dirname' => 'files/news', 'w' => 200),
		'ann' => array('type' => 'editor', 'name' => 'Аннотация', 'skiplist' => true),
		'text' => array('type' => 'editor', 'name' => 'Текст новости', 'skiplist' => true),
		'onoff' => array('type' => 'values', 'name' => 'Отображать страницу', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return News the static model class
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
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('onoff', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('dt, ann, text, preview', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, dt, name, ann, text, preview, onoff', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'dt' => 'Dt',
			'skey' => 'Skey',
			'name' => 'Name',
			'ann' => 'Ann',
			'text' => 'Text',
			'preview' => 'Preview',
			'onoff' => 'Onoff',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('dt',$this->dt,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ann',$this->ann,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('preview',$this->preview,true);
		$criteria->compare('onoff',$this->onoff);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}