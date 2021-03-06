<?php

class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$password = Yii::app()->getModule('admin')->password;
		if ($password === null) {
			throw new CException('Please configure the "password" property of the "admin" module.');
        }
		else if ($password === false || $password === $this->password) {
			$this->errorCode = self::ERROR_NONE;
        }
        else {
            $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
        }
		return !$this->errorCode;
	}
}
