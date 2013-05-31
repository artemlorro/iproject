<?php
/**
 * User: Kir Melnikov
 * Date: 31.05.13
 * Time: 12:33
 */

class MailController extends FrontController {
    public function actionCeo()
    {
        if(!Yii::app()->request->isAjaxRequest) {
            //throw new CHttpException(404, 'Страница не найдена');
        }
        $model=new CeoLetterForm();
        //$this->performAjaxValidation($model);
        if(isset($_POST['CeoLetterForm']))
        {
            $model->attributes=$_POST['CeoLetterForm'];
            if($model->validate() && $model->send()) {
                $this->renderPartial('success', array(), false, false);
                //return;
                Yii::app()->end();
            }
        }

        $this->renderPartial('ceo',array('model'=>$model), false, false);
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}