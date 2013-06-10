<?php

define('XML_FILES_PATH', 'files/xml');

class ApiController extends CController
{
	private $log = '';
	private $_attr = array();

	protected $update_cnt = 0;
	protected $create_cnt = 0;

    public function init()
    {
//		$this->loadXmlBuildingType();
//		$this->loadXmlGroundStatus();
//		$this->loadXmlLavatoryType();
//	    $this->loadXmlLines();
//	    $this->loadXmlStations();
	    $this->loadXmlSecondary();
	    exit();
    }

	protected function beginParse($filename)
	{
		$this->log($filename . "<br/>", true);
		$this->update_cnt = 0;
		$this->create_cnt = 0;
	}

	protected function endParse()
	{
		$this->log('<br/>Добавлено записей: ' . $this->create_cnt);
		$this->log('<br/>Обновлено записей: ' . $this->update_cnt);
		echo $this->log;
	}

	/**
	 * Загрузка Типов домов
	 */
	public function loadXmlBuildingType()
	{
		$filename = 'BuildingType.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];

				$cid = $this->getAttr('buildtypeid');
				$name = $this->getAttr('name');

				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$obj = BuildingType::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						BuildingType::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new BuildingType();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->name = $name;
					$obj->save();
				}
			}
		}

		$this->endParse();
	}


	/**
	 * Загрузка GroundStatus.xml
	 */
	public function loadXmlGroundStatus()
	{
		$filename = 'GroundStatus.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];

				$cid = $this->getAttr('groundstatusid');
				$name = $this->getAttr('name');

				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$obj = GroundStatus::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						GroundStatus::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new GroundStatus();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->name = $name;
					$obj->save();
				}
			}
		}

		$this->endParse();
	}


	/**
	 * Загрузка LavatoryType.xml
	 */
	public function loadXmlLavatoryType()
	{
		$filename = 'LavatoryType.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];

				$cid = $this->getAttr('lavatorytypeid');
				$name = $this->getAttr('name');

				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$obj = LavatoryType::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						LavatoryType::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new LavatoryType();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->name = $name;
					$obj->save();
				}
			}
		}

		$this->endParse();
	}


	/**
	 * Загрузка Lines.xml
	 */
	public function loadXmlLines()
	{
		$filename = 'Lines.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];

				$cid = $this->getAttr('lineid');
				$name = $this->getAttr('name');

				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$obj = MetroLine::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						MetroLine::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new MetroLine();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->name = $name;
					$obj->save();
				}
			}
		}

		$this->endParse();
	}


	/**
	 * Загрузка Stations.xml
	 */
	public function loadXmlStations()
	{
		$filename = 'Stations.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];

				$cid = $this->getAttr('stationid');
				$name = $this->getAttr('name');
				$line = $this->getAttr('lineid');

				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$metroLine = null;
				if (!$line) {
					$this->log('Error! Не передан параметр lineid. Запись #' . $n);
				} else {
					$metroLine = MetroLine::model()->find('cid = :cid', array(':cid' => $line));
					if (!$metroLine) {
						$this->log('Error! Не найдена данная линия метро в базе. Запись #' . $n);
					}
				}



				$obj = MetroStation::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						MetroStation::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new MetroStation();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->name = $name;
					$obj->metro_line_id = $metroLine ? $metroLine->id : 0;
					$obj->save();
				}
			}
		}

		$this->endParse();
	}


	/**
	 * Загрузка Secondary.xml
	 */
	public function loadXmlSecondary()
	{
		$filename = 'Secondary.xml';

		$this->beginParse($filename);

		$xml = $this->getXML($filename);

		if (isset($xml['request']) && $xml['request']) {
			foreach ($xml['request'] as $n => $i) {
				$attr = $this->_attr = $i['@attributes'];
				$metro = isset($i['metro']) && isset($i['metro']['station']) ? $i['metro']['station'] : array();
				$metro = isset($metro['@attributes']) ? array($metro) : $metro;
				$images = isset($i['images']) && $i['images'] ? $i['images'] : array();

				$cid = $this->getAttr('objectid');
				$cnt_rooms_total = $this->getAttr('cnt_rooms_total');
				$price = $this->getAttr('price');
				$address = $this->getAttr('address');
				$s_total = $this->getAttr('s_total');
				$s_live = $this->getAttr('s_live');
				$s_kitchen = $this->getAttr('s_kitchen');
				$buildingtypeid = $this->getAttr('buildingtypeid');
				$floor = (int) $this->getAttr('floor');
				$cnt_floor = (int) $this->getAttr('cnt_floor');
				$has_phone = (int) $this->getAttr('has_phone');
				$has_balcony = (int) $this->getAttr('has_balcony');
				$lavatorytypeid = $this->getAttr('lavatorytypeid');
				$adv_text = $this->getAttr('adv_text');
				$is_active = (int) $this->getAttr('is_active');
				$type = (int) $this->getAttr('type');
				$has_lift = (int) $this->getAttr('has_lift');
				$districtid = $this->getAttr('districtid');


				if (!$cid) {
					$this->log('Error! Не передан идектификатор. Запись #' . $n);
					continue;
				}

				$buildingType = null;
				if (!$buildingtypeid) {
					$this->log('Error! Не передан параметр buildingtypeid. Запись #' . $n);
				} else {
					$buildingType = BuildingType::model()->find('cid = :cid', array(':cid' => $buildingtypeid));
					if (!$buildingType) {
						$this->log('Error! Не найден тип дома в базе. Запись #' . $n);
					}
				}

				$lavatoryType = null;
				if (!$lavatorytypeid) {
					$this->log('Error! Не передан параметр lavatorytypeid. Запись #' . $n);
				} else {
					$lavatoryType = LavatoryType::model()->find('cid = :cid', array(':cid' => $lavatorytypeid));
					if (!$lavatoryType) {
						$this->log('Error! Не найден тип санузла в базе. Запись #' . $n);
					}
				}

				$district = null;
				if (!$districtid) {
					$this->log('Error! Не передан параметр districtid. Запись #' . $n);
				} else {
					$district = BuildingType::model()->find('cid = :cid', array(':cid' => $districtid));
					if (!$district) {
						$this->log('Error! Не найден регион в базе. Запись #' . $n);
					}
				}


				if ($metro) {
					$resMetro = array();
					foreach ($metro as $m) {
						$stationid = isset($m['@attributes']) && isset($m['@attributes']['stationid']) ? $m['@attributes']['stationid'] : '';
						if (!$stationid) {
							$this->log('Error! Не найден параметр stationid. Запись #' . $n);
							continue;
						}
						$mertoStation = MetroStation::model()->find('cid = :cid', array(':cid' => $stationid));
						if (!$mertoStation) {
							$this->log('Error! Не найдена станция метро в базе. Запись #' . $n);
							continue;
						}

						$time = isset($m['time']) ? $m['time'] : null;
						$min_auto = 0; $min_people = 0;
						if ($time) {
							$time = isset($time['@attributes']) ? array($time) : $time;
							foreach ($time as $t) {
								$t = $t['@attributes'];
								if ($t['type'] == 0) $min_auto = (int) $t['value'];
								if ($t['type'] == 1) $min_people = (int) $t['value'];
							}
						}

						$resMetro[] = array('station_id' => $mertoStation->id, 'min_auto' => $min_auto, 'min_people' => $min_people);
					}

					$metro = $resMetro;
				}


				if ($images) {
					$resImages = array();
					$images = isset($images['img']) && isset($images['img'][0]) ? $images['img'] : array($images['img']);
					foreach ($images as $img) {
						$img = $img['@attributes'];
						$resImages[] = $img['filename'];
					}

					$images = implode(';', $resImages);
				}

				$obj = ObjSecondary::model()->find('cid = :cid', array(':cid' => $cid));

				if ($attr['is_delete']) {
					// удаление элемента
					if ($obj->id) {
						ObjSecondary::model()->deleteByPk($obj->id);
					}
				} else {
					//обновление или добавление записи
					if ($obj === NULL) {
						$obj = new ObjSecondary();
						$obj->cid = $cid;
						$this->create_cnt++;
					} else {
						$this->update_cnt++;
					}

					$obj->address = $address;
					$obj->adv_text = $adv_text;
//					$obj->agent_id = 0;
					$obj->building_type_id = $buildingType ? $buildingType->id : 0;
					$obj->district_id = $district ? $district->id : 0;
					$obj->floor = $floor;
					$obj->has_balcony = $has_balcony;
					$obj->has_lift = $has_lift;
					$obj->has_phone = $has_phone;
					$obj->lavatory_type_id = $lavatoryType ? $lavatoryType->id : 0;
					$obj->price = $price;
					$obj->s_kitchen = $s_kitchen;
					$obj->s_live = $s_live;
					$obj->s_total = $s_total;
					$obj->type = $type;
					$obj->qty_rooms_total = $cnt_rooms_total;
					$obj->qty_floor = $cnt_floor;
					$obj->is_active = $is_active;
					$obj->save();



				}
			}
		}

		$this->endParse();
	}



	protected function log($str, $clear_log = false)
	{
		if ($clear_log) {
			$this->log = '';
		}

		$this->log .= $str . "<br/>\n\r";
	}

	protected function getXML($filename)
	{
		$path = Yii::app()->basePath . '/../' . XML_FILES_PATH . '/' . $filename;
		if (!file_exists($path)) {
			echo 'error! file not exists'; exit();
		}

		return json_decode(json_encode((array) simplexml_load_string(file_get_contents($path))), 1);
	}

	protected function getAttr($name)
	{
		$res = isset($this->_attr[$name]) ? $this->_attr[$name] : null;
		return $res;
	}



}