<?php
/**
 * @author A. Osipov, 10.05.13
 */

class UserIdentity extends CUserIdentity
{

	private $_id;

	public function authenticate()
	{
		$record = Agent::model()->findByAttributes(array(
			'email' => $this->username
		));

		if ($record === null) {
			$this->errorCode = self::ERROR_USERNAME_INVALID;
//		} else if ($record->password !== crypt($this->password, $record->password)) {
		} else if ($record->password !== $this->password) {
			$this->errorCode = self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id = $record->id;
			$this->setState('model', $record);
			$this->setState('rules', array(
				'profile' => true,
			));

			$this->errorCode = self::ERROR_NONE;
		}

		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}

}