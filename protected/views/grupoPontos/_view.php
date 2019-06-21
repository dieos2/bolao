<?php
/* @var $this GrupoPontosController */
/* @var $data GrupoPontos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('int')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->int), array('view', 'id'=>$data->int)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_grupo')); ?>:</b>
	<?php echo CHtml::encode($data->id_grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pontos')); ?>:</b>
	<?php echo CHtml::encode($data->id_pontos); ?>
	<br />


</div>