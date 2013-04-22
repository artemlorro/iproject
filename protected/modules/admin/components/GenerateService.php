<?php

class GenerateService
{
	static private $_instance;

	private function __construct ()
	{}

	public static function instance ()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function generateAlias ($text)
	{
		$trans = array("а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e",
			"ё" => "jo", "ж" => "zh", "з" => "z", "и" => "i", "й" => "j", "к" => "k", "л" => "l",
			"м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u",
			"ф" => "f", "х" => "kh", "ц" => "c", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ы" => "y",
			"э" => "eh", "ю" => "yu", "я" => "ya", "А" => "a", "Б" => "b", "В" => "v", "Г" => "g",
			"Д" => "d", "Е" => "e", "Ё" => "jo", "Ж" => "zh", "З" => "z", "И" => "i", "Й" => "jj",
			"К" => "k", "Л" => "l", "М" => "m", "Н" => "n", "О" => "o", "П" => "p", "Р" => "r", "С" => "s",
			"Т" => "t", "У" => "u", "Ф" => "f", "Х" => "kh", "Ц" => "c", "Ч" => "ch", "Ш" => "sh",
			"Щ" => "shh", "Ы" => "y", "Э" => "eh", "Ю" => "yu", "Я" => "ya", " " => "_", "." => "_",
			"," => "_", "-" => "_", "+" => "_", ":" => "_", ";" => "_", "!" => "_", "?" => "_");
		$alias = strip_tags(strtr($text, $trans));
		$alias = preg_replace('/&.+?;/', '', $alias);
		$alias = preg_replace("/[^a-zA-Z0-9_]/", "", $alias);
		$alias = preg_replace('/([_]){2,}/', '\1', $alias);
		$alias = trim($alias, '_');
		$alias = strtolower($alias);
		return $alias;
	}
}