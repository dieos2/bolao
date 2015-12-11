<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_time_casa'); ?>
		<?php echo $form->textField($model,'id_time_casa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_time_visitante'); ?>
		<?php echo $form->textField($model,'id_time_visitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'data'); ?>
		<?php echo $form->textField($model,'data'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placar_casa'); ?>
		<?php echo $form->textField($model,'placar_casa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placar_visitante'); ?>
		<?php echo $form->textField($model,'placar_visitante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vencedor'); ?>
		<?php echo $form->textField($model,'vencedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'empate'); ?>
		<?php echo $form->textField($model,'empate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->