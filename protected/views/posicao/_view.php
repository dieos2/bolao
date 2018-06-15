<?php
/* @var $this PosicaoController */
/* @var $data Posicao */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_user')); ?>:</b>
	<?php echo CHtml::encode($data->id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('antiga')); ?>:</b>
	<?php echo CHtml::encode($data->antiga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atual')); ?>:</b>
	<?php echo CHtml::encode($data->atual); ?>
	<br />


</div>