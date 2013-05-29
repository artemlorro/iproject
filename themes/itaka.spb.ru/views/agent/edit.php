<?php /* @var $this FrontController */ ?>
<div id="main">
	<? if (true === $this->user->rules['profile']) { ?>
		<div class="form_block">
			<h2>Редактирование личной информации</h2>

			<?php $form = $this->beginWidget('CActiveForm', array(
				'htmlOptions' => array('enctype' => 'multipart/form-data'),
			)); ?>

			<?php echo $form->errorSummary($model); ?>

			<?php echo $form->label($model, 'name'); ?>
			<div class="input_style">
				<?php echo $form->textField($model, 'name') ?>
			</div>

			<?php echo $form->label($model, 'last_name'); ?>
			<div class="input_style">
				<?php echo $form->textField($model, 'last_name') ?>
			</div>

			<?php echo $form->label($model, 'middle_name'); ?>
			<div class="input_style">
				<?php echo $form->textField($model, 'middle_name') ?>
			</div>

			<?php echo $form->label($model, 'email'); ?>
			<div class="input_style">
				<?php echo $form->emailField($model, 'email') ?>
			</div>

			<?php echo $form->label($model, 'password'); ?>
			<div class="input_style">
				<?php echo $form->passwordField($model, 'password') ?>
			</div>

			<?php echo $form->label($model, 'photo'); ?>
			<div class="file_style">
				<?php echo $form->fileField($model, 'photo') ?>
			</div>

			<?php echo $form->label($model, 'about'); ?>
			<div class="textarea_style">
				<?php echo $form->textArea($model, 'about') ?>
			</div>

			<div class="button_style">
				<?php echo CHtml::submitButton('Сохранить'); ?>
			</div>

			<?php $this->endWidget(); ?>
		</div>
	<? } ?>
</div>