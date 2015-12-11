<?php
/* @var $this GrupoTimeController */
/* @var $model GrupoTime */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'grupo-time-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <span>Grupo</span>
		<?php echo $form->dropDownList($model, 'id_grupo', CHtml::listData(Grupo::model()->findAll(),'id','nome')); ?>
		<?php echo $form->error($model,'id_grupo'); ?>
	</div>

	<div class="row">
		  <span>Time</span>
		<?php echo $form->dropDownList($model, 'id_time', CHtml::listData(Time::model()->findAll(),'id','nome')); ?>
		<?php echo $form->error($model,'id_time'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->