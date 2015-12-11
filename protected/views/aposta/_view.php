<?php
/* @var $this ApostaController */
/* @var $data Aposta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_confronto')); ?>:</b>
	<?php echo CHtml::encode($data->id_confronto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('placar_casa')); ?>:</b>
	<?php echo CHtml::encode($data->placar_casa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('placar_visitante')); ?>:</b>
	<?php echo CHtml::encode($data->placar_visitante); ?>
	<br />


</div>