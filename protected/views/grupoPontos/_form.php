<?php
/* @var $this GrupoPontosController */
/* @var $model GrupoPontos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupo-pontos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
		<?php echo $form->error($model,'id_grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pontos'); ?>
		<?php echo $form->textField($model,'id_pontos'); ?>
		<?php echo $form->error($model,'id_pontos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->