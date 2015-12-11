<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */
/* @var $form CActiveForm */
?>



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'confronto-form',
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
		 <span>Time da Casa</span>
		<?php echo $form->dropDownList($model, 'id_time_casa', CHtml::listData(Time::model()->findAll(),'id','nome')); ?>
		<?php echo $form->error($model,'id_time_casa'); ?>
	</div>

	<div class="row">
		 <span>Time Visitante</span>
		<?php echo $form->dropDownList($model, 'id_time_visitante', CHtml::listData(Time::model()->findAll(),'id','nome')); ?>
		<?php echo $form->error($model,'id_time_visitante'); ?>
	</div>

	<div class="row">
		 <span>Data</span>
		<?php echo $form->textField($model,'data'); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row">
		 <span>Placar Casa</span>
		<?php echo $form->textField($model,'placar_casa'); ?>
		<?php echo $form->error($model,'placar_casa'); ?>
	</div>

	<div class="row">
		 <span>Placar Visitante</span>
		<?php echo $form->textField($model,'placar_visitante'); ?>
		<?php echo $form->error($model,'placar_visitante'); ?>
	</div>

	<div class="row">
		 <span>Vencedor</span>
		<?php echo $form->dropDownList($model, 'vencedor', CHtml::listData(Time::model()->findAll(),'id','nome')); ?>
		<?php echo $form->error($model,'vencedor'); ?>
	</div>

	<div class="row">
		 <span>Empate</span>
		<?php echo $form->textField($model,'empate'); ?>
		<?php echo $form->error($model,'empate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->