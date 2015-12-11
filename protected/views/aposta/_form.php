<?php
/* @var $this ApostaController */
/* @var $model Aposta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'aposta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_confronto'); ?>
		<?php echo $form->textField($model,'id_confronto'); ?>
		<?php echo $form->error($model,'id_confronto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placar_casa'); ?>
		<?php echo $form->textField($model,'placar_casa'); ?>
		<?php echo $form->error($model,'placar_casa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'placar_visitante'); ?>
		<?php echo $form->textField($model,'placar_visitante'); ?>
		<?php echo $form->error($model,'placar_visitante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->