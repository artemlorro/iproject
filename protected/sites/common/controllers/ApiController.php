<?php

class ApiController extends CController
{
    protected $_data;


    public function init()
    {
        $_REQUEST['data'] = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<request key="BLpwhTm7LHlq4CQb" lineid="Ветка0002" name="Правобережная
линия">
</request>
XML;
        $this->_data = json_decode(json_encode((array) simplexml_load_string($_REQUEST['data'])), 1);
        if (!isset($this->_data['@attributes']) || !isset($this->_data['@attributes']['key']) || $this->_data['@attributes']['key'] != 'BLpwhTm7LHlq4CQb') {
            $this->error(0, 'Key incorect');
        }
    }

	public function actionAddUpdateLine()
	{
        $cid = isset($this->_data['@attributes']['lineid']) ? $this->_data['@attributes']['lineid'] : '';
        $name = isset($this->_data['@attributes']['name']) ? $this->_data['@attributes']['name'] : '';
        if (!$cid || !$name) {
            $this->error(3, 'Переданы не все параметры');
        }

        $obj = MetroLine::model()->find('cid = :cid', array(':cid' => $cid));
        if ($obj === NULL) {
            $obj = new MetroLine();
            $obj->cid = $cid;
        }

        $obj->name = $name;
        $obj->save();

        if ($obj->id) {
            $this->ok();
        }

        $this->error(100, 'Какая-то ошибка на сервере');
	}

    protected function error($error_code, $error_text)
    {
        header("Content-type: text/xml; charset=utf-8");
        echo '<?xml version="1.0" encoding="utf-8"?><response code="' . $error_code . '"><error>' . $error_text . '</error></response>';
        exit();
    }

    protected function ok()
    {
        header("Content-type: text/xml; charset=utf-8");
        echo '<?xml version="1.0" encoding="utf-8"?><response code="0"></response>';
        exit();
    }

    protected function isAuth()
    {
        return true;
    }


}