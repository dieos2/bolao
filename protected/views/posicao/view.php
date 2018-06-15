<?php
/* @var $this PosicaoController */
/* @var $model Posicao */

$this->breadcrumbs=array(
	'Posicaos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Posicao', 'url'=>array('index')),
	array('label'=>'Create Posicao', 'url'=>array('create')),
	array('label'=>'Update Posicao', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Posicao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Posicao', 'url'=>array('admin')),
);
?>

<h1>View Posicao #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_user',
		'antiga',
		'atual',
	),
)); ?>
