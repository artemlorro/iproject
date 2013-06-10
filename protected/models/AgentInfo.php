<?php

/**
 * @property integer $id
 * @property integer $agent_id
 * @property integer $office_id
 * @property integer $branch_id
 * @property integer $position_id
 * @property integer $parent_id
 * @property string $phone
 * @property string $email
 */
class AgentInfo extends CActiveRecord
{
	const ROLE_EDIT_AGENT_PAGE = 1;
	const ROLE_CREATE_NEWS = 2;

	public $searchFields = array();
	public $tableName = 'Агенты по должностям';
	public $fields = array(
		'agent_id' => array('type' => 'text', 'name' => 'AgentID'),
		'office_id' => array('type' => 'select', 'name' => 'Офис', 'modelClass' => 'Office', 'skiplist' => true),
		'branch_id' => array('type' => 'select', 'name' => 'Направление', 'modelClass' => 'Branch'),
		'position_id' => array('type' => 'select', 'name' => 'Должность', 'modelClass' => 'Position'),
		'parent_id' => array('type' => 'text', 'name' => 'AgentID - кому подчиняется'),
		'email' => array('type' => 'text', 'name' => 'Email'),
		'phone' => array('type' => 'text', 'name' => 'Телефон'),
	);

	public function getAgentId()
	{
		return $this->agent_id;
	}

	public function getBranchId()
	{
		return $this->branch_id;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getOfficeId()
	{
		return $this->office_id;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function getParentId()
	{
		return $this->parent_id;
	}

	public function getPositionId()
	{
		return $this->position_id;
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
		return 'agent_info';
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