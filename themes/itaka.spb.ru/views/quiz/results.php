<?php
/**
 * User: Kir Melnikov
 * Date: 05.06.13
 * Time: 19:40
 */
?>
<? if($voted): ?>
    <div class="title">Опрос</div>
<p><?= $quiz->name ?></p>
<div class="quiz_ind">
    <dl>
        <? foreach($quiz->answers as $i=>$answer): ?>
            <dt><?= $answer->name ?></dt><dd><?= $answer->votes ?></dd>
        <? endforeach ?>
    </dl>
</div>
<? else: ?>
    <div class="title">Опрос</div>
    <? $form=$this->beginWidget('CActiveForm') ?>
    <p><?= $quiz->name ?></p>
    <div class="quiz_ind">
        <? foreach($quiz->answers as $i=>$answer): ?>
            <input class="quiz_points" type="radio" name="answer" value="<?= $answer->id ?>" <?= $i ? '':'checked'?>><label><?= $answer->name ?></label><br />
        <? endforeach ?>
        <?= CHtml::ajaxButton('Голосовать', Yii::app()->createUrl('quiz'), array('type'=>'post','update'=>'#main-quiz'), array('class'=>'submit')) ?>
    </div>
    <? $this->endWidget() ?>
<? endif ?>