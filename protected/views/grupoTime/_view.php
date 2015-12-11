<?php
/* @var $this GrupoTimeController */
/* @var $data GrupoTime */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::encode($data->id_grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_time')); ?>:</b>
	<?php echo CHtml::encode($data->id_time); ?>
	<br />


</div>