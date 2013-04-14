<?php

/**
 * This is the model class for table "agent".
 *
 * The followings are the available columns in table 'agent':
 * @property string $id
 * @property string $email
 * @property string $password
 */
class Agent extends CActiveRecord
{
    // Model plural names
    public $adminName='Агенты';
    public $pluralNames=array('Агента','Агенты');

    // Config for attribute widgets
    public function attributeWidgets()
    {
        return array(
            array('email','text'),
            array('password','text'),
        );
    }

    // Config for CGridView class
    public function adminSearch()
    {
        return array(
            // Data provider, by default is "search()"
            //'dataProvider'=>$this->search(),
            'columns'=>array(
                'id',
                'email',
            ),
        );
    }


    /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Agent the static model class
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
		return 'agent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('email, password', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}