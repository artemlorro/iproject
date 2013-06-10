<?php

/**
 * @property string $id
 * @property string $cid
 * @property integer $agent_id
 * @property integer $is_active
 * @property integer $type
 * @property integer $qty_rooms_total
 * @property integer $qty_to_sale
 * @property float $price
 * @property string $address
 * @property string $metro
 * @property string $train_station
 * @property float $s_total
 * @property float $s_live
 * @property float $s_kitchen
 * @property float $room_height
 * @property integer $building_type_id
 * @property integer $floor
 * @property integer $qty_floor
 * @property integer $has_phone
 * @property integer $has_balcony
 * @property integer $has_lift
 * @property string $adv_text
 * @property string $images
 * @property integer $district_id
 * @property integer $itaka_only
 * @property integer $lavatory_type_id
 * @method published()
 */
class ObjSecondary extends CActiveRecord
{
	public $searchFields = array();
	public $tableName = 'Вторичная недвижимость';
	public $fields = array(
		'cid' => array('type' => 'text', 'name' => 'CRM ID'),
		'agent_id' => array('type' => 'text', 'name' => 'Агент ID', 'skiplist' => true),
		'type' => array('type' => 'values', 'name' => 'Тип Объекта', 'values' => array(0 => 'Квартира', 1 => 'Комната', 2 => 'Прочее')),
		'qty_rooms_total' => array('type' => 'text', 'name' => 'Общее количество комнат в Объекте', 'skiplist' => true),
		'qty_to_sale' => array('type' => 'text', 'name' => 'Количество комнат на продажу', 'skiplist' => true),
		'price' => array('type' => 'text', 'name' => 'Цена'),
		'address' => array('type' => 'text', 'name' => 'Адрес'),
//		'metro' =>  array('type' => 'text', 'name' => 'Ближайшие станции метро (формат: metro_id1,min1,min2; metro_id2,min1,min2)', 'skiplist' => true),
		'train_station' => array('type' => 'text', 'name' => 'Название ближайшей станции Электрички', 'skiplist' => true),
		's_total' => array('type' => 'text', 'name' => 'Общая площадь Объекта', 'skiplist' => true),
		's_live' => array('type' => 'text', 'name' => 'Жилая площадь Объекта', 'skiplist' => true),
		's_kitchen' => array('type' => 'text', 'name' => 'Площадь кухни', 'skiplist' => true),
		'room_height' => array('type' => 'text', 'name' => 'Высота потолка', 'skiplist' => true),
		'building_type_id' => array('type' => 'select', 'name' => 'Тип дома', 'modelClass' => 'BuildingType', 'skiplist' => true),
		'floor' => array('type' => 'text', 'name' => 'Этаж', 'skiplist' => true),
		'qty_floor' => array('type' => 'text', 'name' => 'Всего этажей', 'skiplist' => true),
		'has_phone' => array('type' => 'values', 'name' => 'Наличие телефона', 'values' => array(0 => 'Нет', 1 => 'Да'), 'skiplist' => true),
		'has_balcony' => array('type' => 'values', 'name' => 'Наличие балкона', 'values' => array(0 => 'Нет', 1 => 'Да'), 'skiplist' => true),
		'has_lift' => array('type' => 'values', 'name' => 'Наличие лифта', 'values' => array(0 => 'Нет', 1 => 'Да'), 'skiplist' => true),
		'adv_text' => array('type' => 'text', 'name' => 'Общая строка в рекламу', 'skiplist' => true),
		'images' => array('type' => 'images', 'name' => 'Фото', 'skiplist' => true,
			'count' => 20, 'dirname' => 'files/photos', 'w' => 700, 'h' => 500,
			'tmb' => array('w' => 201, 'h' => 132),
			'tmb2' => array('w' => 132, 'h' => 132, 'maintain_ratio' => false)
		),
		'district_id' => array('type' => 'select', 'name' => 'Район', 'modelClass' => 'Distinct', 'skiplist' => true),
		'itaka_only' => array('type' => 'values', 'name' => 'Только в ИТАКА', 'values' => array(0 => 'Нет', 1 => 'Да'), 'skiplist' => true),
		'lavatory_type_id' => array('type' => 'select', 'name' => 'Тип санузла', 'modelClass' => 'LavatoryType', 'skiplist' => true),
		'is_active' => array('type' => 'values', 'name' => 'Отображать', 'values' => array(0 => 'Нет', 1 => 'Да')),
	);

	public function getAddress()
	{
		return $this->address;
	}

	public function getAdvText()
	{
		return $this->adv_text;
	}

	public function getAgentId()
	{
		return $this->agent_id;
	}

	public function getBuildingTypeId()
	{
		return $this->building_type_id;
	}

	public function getCid()
	{
		return $this->cid;
	}

	public function getDistrictId()
	{
		return $this->district_id;
	}

	public function getFloor()
	{
		return $this->floor;
	}

	public function getHasBalcony()
	{
		return $this->has_balcony;
	}

	public function getHasLift()
	{
		return $this->has_lift;
	}

	public function getHasPhone()
	{
		return $this->has_phone;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getImages()
	{
		$imgType = new ImagesInfo();
		$value = $imgType->getValue($this->images, $this->fields['images']);
		return $value ? $value : false;
	}

	public function getIsActive()
	{
		return $this->is_active;
	}

	public function getItakaOnly()
	{
		return $this->itaka_only;
	}

	public function getLavatoryTypeId()
	{
		return $this->lavatory_type_id;
	}

	public function getPrice()
	{
		return $this->price;
	}

	public function getQtyFloor()
	{
		return $this->qty_floor;
	}

	public function getQtyRoomsTotal()
	{
		return $this->qty_rooms_total;
	}

	public function getQtyToSale()
	{
		return $this->qty_to_sale;
	}

	public function getRoomHeight()
	{
		return $this->room_height;
	}

	public function getSKitchen()
	{
		return $this->s_kitchen;
	}

	public function getSLive()
	{
		return $this->s_live;
	}

	public function getSTotal()
	{
		return $this->s_total;
	}

	public function getTrainStation()
	{
		return $this->train_station;
	}

	public function getType()
	{
		return $this->type;
	}

	// выбирать из таблицы obj_secondary_metro
	public function getMetro()
	{
		$result = array();
//		if ($this->metro) foreach(explode(';', $this->metro) as $i) {
//			list ($metro_id, $min_auto, $min_people) = explode(',', $i);
//			$a = new strClass();
//			$a->metro = MetroStation::model()->findByPk(trim($metro_id));
//			$a->min_auto = trim($min_auto);
//			$a->min_people = trim($min_people);
//			$result[] = $a;
//		}
		return $result;
	}



	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MetroLine the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'obj_secondary';
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
				'condition' => 'is_active = 1',
			),
		);
	}
}