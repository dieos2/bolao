<?php
/* @var $this GrupoPontosController */
/* @var $model GrupoPontos */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'int'); ?>
		<?php echo $form->textField($model,'int'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_grupo'); ?>
		<?php echo $form->textField($model,'id_grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pontos'); ?>
		<?php echo $form->textField($model,'id_pontos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->