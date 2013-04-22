<?php

class FieldOnoff extends FieldAbstract
{
	public function getStoredData($key)
	{
		$data = isset($_REQUEST['edit_' . $key]) ? 1 : 0;
		return $data;
	}
}