<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $name
 * @property string $announce
 * @property string $content
 * @property string $update_time
 * @property integer $act
 * @property string $pub_date
 */
class Article extends CActiveRecord
{
    public $searchFields = array();
    public $tableName = 'Статьи';
    public $fields = array(
        'url' => array('type' => 'skey', 'name' => 'Ключ (сам генерируется)', 'skiplist' => true),
        'pub_date' => array('type' => 'datetime', 'name' => 'Дата статьи'),
        'name' => array('type' => 'text', 'name' => 'Заголовок'),
        'image' => array('type' => 'images', 'name' => 'Превью', 'skiplist' => true,
            'count' => 1, 'dirname' => 'files/articles', 'w' => 129),
        'announce' => array('type' => 'editor', 'name' => 'Аннотация', 'skiplist' => true),
        'content' => array('type' => 'editor', 'name' => 'Текст статьи', 'skiplist' => true),
        'act' => array('type' => 'values', 'name' => 'Отображать страницу', 'values' => array(0 => 'Нет', 1 => 'Да')),
    );

    public function getPreview()
    {
        $imgType = new ImagesInfo();
        $value = $imgType->getValue($this->image, $this->fields['image']);
        return $value ? current($value) : false;
    }

    public function url()
    {
        return Yii::app()->createUrl('articles/view', array('skey'=>$this->url));
    }
    public function getText()
    {
        return $this->content;
    }
    public function getAnn()
    {
        return $this->announce;
    }

    public function getDt()
    {
        return $this->pub_date;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getOnoff()
    {
        return $this->act;
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

    public function defaultScope() {
        return array(
            //'condition'=>'news.act=1',
            'alias'=>'articles'
        );
    }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, act, pub_date', 'required'),
			array('act', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('announce, content', 'safe'),

            array('image', 'file', 'types' => 'png, gif, jpg', 'allowEmpty' => true),
            array('image', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, announce, content, update_time, act, pub_date', 'safe', 'on'=>'search'),
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
			'name' => 'Заголовок',
			'announce' => 'Анонс',
			'content' => 'Содержимое',
            //'category' => 'Тип новости',
			'act' => 'Активность',
			'pub_date' => 'Дата публикации',
            'image' => 'Изоражение',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('announce',$this->announce,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('act',$this->act);
        $criteria->compare('category',$this->category);
		$criteria->compare('pub_date',$this->pub_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    public function scopes()
    {
        return array(
            'published' => array(
                'condition' => 'act = 1',
            ),
            'recently' => array(
                'order' => 'pub_date DESC',
                'limit' => 2,
            ),
        );
    }
    /*
    public $adminNames = array('Новости', 'новость', "новости");

    public function attributeWidgets() {
        return array(
            array('name','textField'),
            array('announce','textArea'),
            array('content','wysiwyg'),
            array('category','dropDown'),
            array('act','boolean'),
            array('pub_date','datetime'),
            array('image','image')
        );
    }


    public function adminSearch()
    {
        return array(
            'columns'=>array(
                array(
                    'imagePathExpression'=>'$data->getThumbnailUrl(48,48)',
                    'usePlaceHoldIt'=>true,
                    'class'=>'bootstrap.widgets.TbImageColumn'
                ),
                'id',
                'name',
                array(
                    'name'=>'category',
                    'value'=>'($data->category) ? $data->getCategoryName() : "Нет категории"',
                    'filter'=>$this->categoryChoices(),
                ),
            ),
        );
    }

    public function getThumbnailUrl($w=48, $h=48) {
        return Image::get($this->getImageUrl(),implode('/',array($w, $h, 'crop')));
    }

    public function getImageUrl() {
        $img = $this->image ? $this->image : 'nophoto.png';
        return Yii::app()->baseUrl."/files/article/image/".$img;
    }

    const CATEGORY_BUBBLE = 1;
    const CATEGORY_FEATURE = 2;
    const CATEGORY_ACTUAL = 3;
    const CATEGORY_ARCHIVE = 4;

    public function categoryChoices() {
        return array(
            self::CATEGORY_ACTUAL => 'Актуальные новости',
            self::CATEGORY_ARCHIVE => 'Архив',
            self::CATEGORY_BUBBLE => 'Бабл',
            self::CATEGORY_FEATURE => 'Преимущество работы с нами',
        );
    }

    public function getCategoryName() {
        $ctg = $this->categoryChoices();
        return $ctg[$this->category];
    }
    */
}