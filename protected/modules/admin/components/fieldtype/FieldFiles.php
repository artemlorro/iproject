<?php

class FieldFiles extends FieldAbstract
{

	public function getValue ($value, $param, $id = 0)
	{
		$files = unserialize($value);
		$values = array();
		if ($files && is_array($files)) {
			foreach ($files as $k => $i) {
				$fileParam = $this->getFileInfo($param, $i['filename']);
				if ($fileParam) $values[$k] = array_merge($i, $fileParam);
			}
		}
		return $values;
	}

	function getFileInfo ($paramField, $fileName = '')
	{
		$url = $paramField['dirname'] . '/' . $fileName;
		$path = PUBLIC_PATH . '/' . $url;
		if (!$fileName || !file_exists($path)) return false;
		$fileParam['path'] = $path;
		$fileParam['url'] = $url;
		$fileParam['filename'] = $fileName;
		$fileParam['size'] = filesize($path);
		return $fileParam;
	}

	function upload ($key, $paramField, $uploadFieldName = 'uploadfile')
	{
		$uploaddir = PUBLIC_PATH . '/' . $paramField['dirname'] . '/';
		if (!is_dir($uploaddir)) {
			mkdir($uploaddir);
			chmod($uploaddir, 0775);
		}
		if (!$_FILES[$uploadFieldName]) return false;

		$data['filename'] = time() . rand(10, 99);
		$data['name'] = $_FILES[$uploadFieldName]['name'];
		if (move_uploaded_file($_FILES[$uploadFieldName]['tmp_name'], $uploaddir . $data['filename'])) {
			return $data;
		} else {
			throw new A_Exception("A_Admin_Model_FieldType_Files::NOT_UPLOAD", 'Ошибка! Файл не загружен!');
			return false;
		}
	}

	function addFile ($value, $fileData = false)
	{
		if (!$fileData || !is_array($fileData)) return $value;
		$value = unserialize($value);
		$value[$fileData['filename']] = $fileData;
		return serialize($value);
	}

	function deleteFile ($value, $fileName, $paramField)
	{
		$files = unserialize($value);
		if (isset($files[$fileName])) {
			unset($files[$fileName]);
			$path = PUBLIC_PATH . '/' . $paramField['dirname'] . '/';
			$pathFile = $path . $fileName;
			if (file_exists($pathFile)) unlink($pathFile);
		}
		return serialize($files);
	}


}