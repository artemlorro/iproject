<?php

/**
 * @property string $id
 * @property string $skey
 * @property string $dt
 * @property string $name
 * @property string $ann
 * @property string $text
 * @property string $preview
 * @property integer $onoff
 * @method published()
 * @method recently()
 */
class Bnews extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Новости рынка';
	public $fields = array(
		'skey' => array('type' => 'skey', 'name' => 'Ключ (сам генерируется)', 'skiplist' => true),
		'dt' => array('type' => 'datetime', 'name' => 'Дата новости'),
		'branches' =>  array('type' => 'multiselect', 'name' => 'Направления', 'skiplist' => true,
			'modelClass' => 'Branch', 'data' => array('dbTable' => 'bnews_branches', 'pkField' => 'bnews_id', 'skField' => 'branch_id')),
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

	public function findAllByBranch($branch_id, $condition = '')
	{
		$sql = 'select bnews.* from bnews
			join bnews_branches bb on bb.bnews_id = bnews.id
			where bnews.onoff = 1 and bb.branch_id = ' . $branch_id . ($condition ? ' and ' . $condition : '');
		$result = array();
		$a = Yii::app()->db->createCommand($sql)->queryAll();
		foreach ($a as $i) {
			$x = new Bnews;
			foreach ($i as $k => $v) {
				$x->$k = $v;
			}
			$result[] = $x;
		}
		return $result;
	}

	public function url()
	{
		return '/bnews/' . $this->skey;
	}


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bnews the static model class
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
		return 'bnews';
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
			'recently' => array(
				'order' => 'dt DESC',
				'limit' => 6,
			),
		);
	}
}