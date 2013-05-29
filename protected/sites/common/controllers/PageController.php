<?php
//контроллер для отображения текстовых страниц
class PageController extends FrontController
{
	public function actions()
	{}

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