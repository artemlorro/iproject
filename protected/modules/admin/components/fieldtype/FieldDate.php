<?php

class FieldDate extends FieldAbstract
{
	public function getStoredData($key)
	{
		$data = $_REQUEST['edit_' . $key];
		return date('Y-m-d', strtotime($data));
	}
}