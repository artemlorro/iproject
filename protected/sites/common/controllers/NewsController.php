<?php
//контроллер для отображения новостей
class NewsController extends FrontController
{
	public function actions()
	{}

	public function actionIndex()
	{
		$year = (int) $this->_getParam('year', date('Y'));
		$month = (int) $this->_getParam('month');

		$params = array('order' => 'dt DESC');
		if (!$month) {
			$params['limit'] = 20;
			$dt_from = mktime(0, 0, 0, 1, 1, $year);
			$dt_to = strtotime('+1 year', $dt_from);
		} else {
			$dt_from = mktime(0, 0, 0, $month, 1, $year);
			$dt_to = strtotime('+1 month', $dt_from);
		}
		$params['condition'] = "dt >= '" . date('Y-m-d H:i:s', $dt_from) . "' and dt < '" . date('Y-m-d H:i:s', $dt_to) . "'";

		$list = News::model()->published()->findAll($params);

		$this->view->year = $year;
		$this->view->month = $month;
		$this->view->list = $list;
		$this->render('index');
	}

	public function actionView()
	{
		$skey = $this->_getParam('skey');
                //если не получили ЧПУ-ключ страницы
		if (!$skey) {
			// todo 404 page
		}
		$news = News::model()->find('skey=:skey', array('skey' => $skey));
                //страница с указанным ЧПУ найдена?
		if (!$news) {
			// todo 404 page
		}
		$this->view->page = $news;
		$this->render('view');
	}

}