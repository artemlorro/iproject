<?php
/**
 * User: Kir Melnikov
 * Date: 04.06.13
 * Time: 11:21
 */

class ArticlesController extends FrontController {

    public function actions()
    {}

    public function actionIndex()
    {
        $year = (int) $this->_getParam('year', date('Y'));
        $month = (int) $this->_getParam('month');

        $params = array('order' => 'pub_date DESC');
        if (!$month) {
            $params['limit'] = 20;
            $dt_from = mktime(0, 0, 0, 1, 1, $year);
            $dt_to = strtotime('+1 year', $dt_from);
        } else {
            $dt_from = mktime(0, 0, 0, $month, 1, $year);
            $dt_to = strtotime('+1 month', $dt_from);
        }
        $params['condition'] = "pub_date >= '" . date('Y-m-d H:i:s', $dt_from) . "' and pub_date < '" . date('Y-m-d H:i:s', $dt_to) . "'";

        $list = Article::model()->published()->findAll($params);

        $this->view->year = $year;
        $this->view->month = $month;
        $this->view->list = $list;
        $this->render('index');
    }

    public function actionView()
    {
        $url = $this->_getParam('skey');
        //если не получили ЧПУ-ключ страницы
        if (!$url) {
            throw new CHttpException(404, 'Статья не найдена');
        }
        $news = Article::model()->find('url=:url', array('url' => $url));
        //страница с указанным ЧПУ найдена?
        if (!$news) {
            throw new CHttpException(404, 'Статья не найдена');
        }
        $this->view->page = $news;
        $this->render('view');
    }

}