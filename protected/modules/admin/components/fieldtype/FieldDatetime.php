<?php

class FieldDatetime extends FieldAbstract
{
	public function getStoredData($key)
	{
		$data = $_REQUEST['edit_' . $key . '_date'] . ' ' . $_REQUEST['edit_' . $key . '_time'];
		return date('Y-m-d H:i:s', strtotime($data));
	}
}