<?php
/**
 * User: Kir Melnikov
 * Date: 31.05.13
 * Time: 13:03
 */
$successScript = <<<EOT
function(data) {
    $('#letter_to_ceo').html(data);
	$('.dropdown').dropkick();
}
EOT;


$cs = Yii::app()->clientScript;
//$cs->registerScriptFile(Yii::app()->theme->baseUrl."/js/dropkick.js");
//$cs->registerScript('dropkick', $script, CClientScript::POS_READY);
$form = $this->beginWidget('CActiveForm', array(
    'id'=>'letter_top',
    //'enableAjaxValidation'=>true,
    //'enableClientValidation'=>true,
    //'clientOptions'=>array('validateOnSubmit'=>true),
    'focus'=>array($model,'name'),
)) ?>

    <div class="letter_top">Письмо генеральному директору</div>
    <div id="letter1" class="letter_block">
        <div class="inp_label"><?= $form->label($model, 'name') ?></div>
        <div class="inp_style"><?= $form->textField($model, 'name') ?></div>
        <?= $form->error($model,'name') ?>
    </div>
    <div id="letter2" class="letter_block">
        <div class="inp_label"><?= $form->label($model, 'email') ?></div>
        <div class="inp_style"><?= $form->textField($model, 'email') ?></div>
        <?= $form->error($model,'email') ?>
    </div>
    <div id="letter3" class="letter_block">
        <div class="inp_label"><?= $form->label($model, 'phone') ?></div>
        <div class="inp_style"><?= $form->textField($model, 'phone') ?></div>
        <?= $form->error($model,'phone') ?>
    </div>
    <div id="letter4">
        <div class="inp_label"><?= $form->label($model, 'subject') ?></div>
        <?= $form->dropDownList($model,'subject', $model::getSubjects(), array('class'=>'dropdown')) ?>
        <?= $form->error($model,'subject') ?>
    </div>
    <div id="letter5" class="letter_text_block">
        <div class="inp_label"><?= $form->label($model, 'body') ?></div>
        <div class="textarea_style"><?= $form->textArea($model, 'body') ?></div>
        <?= $form->error($model,'body') ?>
    </div>
    <div id="letter_but" class="button_style">
        <?= CHtml::ajaxButton('Отправить', array('mail/ceo'), array('success'=>$successScript,'type'=>'post')) ?>
    </div>
<? $this->endWidget() ?>