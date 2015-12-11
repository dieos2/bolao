<?php
/* @var $this ApostaController */
/* @var $model Aposta */

$this->breadcrumbs=array(
	'Apostas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Aposta', 'url'=>array('index')),
	array('label'=>'Create Aposta', 'url'=>array('create')),
	array('label'=>'Update Aposta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Aposta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Aposta', 'url'=>array('admin')),
);
?>

<h1>View Aposta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_confronto',
		'id_user',
		'data',
		'placar_casa',
		'placar_visitante',
	),
)); ?>
