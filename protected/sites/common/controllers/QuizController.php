<?php
/**
 * User: Kir Melnikov
 * Date: 05.06.13
 * Time: 19:21
 */

class QuizController extends FrontController {
    public function actionIndex() {
        if(isset($_POST) && isset($_POST['answer'])) {
            $answer = QuizAnswer::model()->findByPk((int)$_POST['answer']);
            if($answer) {
                $answer->votes++;
                $answer->save();
                $this->renderPartial('results', array('quiz'=>$answer->quiz, 'voted'=>true));
            }
        }
    }
}