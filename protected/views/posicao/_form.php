<?php
/* @var $this PosicaoController */
/* @var $model Posicao */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posicao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_user'); ?>
		<?php echo $form->textField($model,'id_user'); ?>
		<?php echo $form->error($model,'id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'antiga'); ?>
		<?php echo $form->textField($model,'antiga'); ?>
		<?php echo $form->error($model,'antiga'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atual'); ?>
		<?php echo $form->textField($model,'atual'); ?>
		<?php echo $form->error($model,'atual'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->