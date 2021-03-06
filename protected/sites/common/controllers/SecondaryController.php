<?php

class SecondaryController extends FrontController
{
	public function actions()
	{}

	public function actionIndex()
	{
		$page = $this->_getParam('page', 1);
		$limit = 20;

		//получаем список объектов вторичной недвижимости
                $objects = ObjSecondary::model()->published()->findAll(array(
			'limit' => $limit,
			'offset' => ($page - 1)*$limit,
		));

		$this->view->objects = $objects;
		$this->render('index');
	}

	public function actionView()
	{
		$skey = $this->_getParam('skey');
                //если не получили ЧПУ-ключ страницы
		if (!$skey) {
			// todo 404 page
		}
		$Page = Page::model()->find('skey=:skey', array('skey' => $skey));
                //страница с указанным ЧПУ найдена?
		if (!$Page) {
			// todo 404 page
		}
		$this->view->page = $Page;
		$this->render('view');
	}

}