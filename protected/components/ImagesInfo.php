<?php

class ImagesInfo
{
	public function getValue ($value, $param)
	{
		$files = explode(';', $value);
		$values = array();
		if ($value) {
			foreach ($files as $i) {
				$imageParam = $this->getImageInfo($param, $i);
				if ($imageParam) $values[] = $imageParam;
			}
		}
		return $values;
	}

	function getImageInfo ($paramField, $fileName = '')
	{
		$url = '/' . $paramField['dirname'] . '/' . $fileName;
		$path = Yii::app()->basePath . '/../' . $url;
		if (!$fileName || !file_exists($path)) return false;
		$imageParam = getimagesize($path);
		$imageParam['path'] = $path;
		$imageParam['url'] = $url;
		$imageParam['filename'] = $fileName;
		$imageParam['preview'] = $this->getImagePreview($paramField, $fileName);
		if (isset($paramField['tmb'])) $imageParam['tmb'] = $this->getImagePreview($paramField, $fileName, $paramField['tmb'], 'tmb_');
		if (isset($paramField['tmb2'])) $imageParam['tmb2'] = $this->getImagePreview($paramField, $fileName, $paramField['tmb2'], 'tmb2_');
		return $imageParam;
	}

	function getImagePreview ($paramField, $fileName = '', $tmb = false, $tmbname = false)
	{
		$path = Yii::app()->basePath . '/../' . $paramField['dirname'] . '/';
		if (!is_dir($path)) {
			mkdir($path);
			chmod($path, 0775);
		}
		$pathFile = $path . $fileName;
		$prefix = $tmb ? $tmbname : 'p_';
		$previewName = $prefix . $fileName;
		$pathPreview = $path . $previewName;
		$urlPreview = '/' . $paramField['dirname'] . '/' .$previewName;

		if (!file_exists($pathPreview)) {
			$w = $tmb ? (isset($tmb['w']) ? $tmb['w'] : 900) : 120;
			$h = $tmb ? (isset($tmb['h']) ? $tmb['h'] : 900) : 120;
			$maintain_ratio = ($tmb && isset($tmb['maintain_ratio'])) ? $tmb['maintain_ratio'] : true;
			$this->imageResize($pathFile, $pathPreview, $w, $h, $maintain_ratio);
		}

		if (!file_exists($pathPreview)) return false;

		$imageParam = getimagesize($pathPreview);
		$imageParam['path'] = $pathPreview;
		$imageParam['url'] = $urlPreview;
		$imageParam['filename'] = $fileName;
		return $imageParam;
	}

	function imageResize ($filePath = '', $newFile = false, $weight = 100, $height = 100, $maintain_ratio = true)
	{
		if (!$filePath) return false;

		$newFile = $newFile ? $newFile : $filePath;

//		if (class_exists('Imagick')) {
			$image = new Imagick($filePath);
//			$image->resizeimage($this->version()->width, $this->version()->height, imagick::FILTER_BESSEL, 1, $save_proportion);
			$image->thumbnailImage($weight, $height, true, false);
			$image->writeImages($newFile, true);
//		}
//		else {
//			$imageLib = new A_ImageLib();
//			$im   = $imageLib->readImage($filePath);
//			$new  = $imageLib->resize($im, $weight, $height, true);
//			$type = $imageLib->filenameToMime($filePath);
//			$imageLib->writeImage($new, $type, $newFile);
//		}
	}

}