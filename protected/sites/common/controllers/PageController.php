<?php

class PageController extends FrontController
{
	public function actions()
	{}

	public function actionView()
	{
		$skey = $this->_getParam('skey');
		if (!$skey) {
			// todo 404 page
		}
		$Page = Page::model()->find('skey=:skey', array('skey' => $skey));
		if (!$Page) {
			// todo 404 page
		}
		$this->view->page = $Page;
		$this->render('view');
	}

}