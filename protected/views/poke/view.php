<?php
/* @var $this PokeController */
/* @var $model Poke */

$this->breadcrumbs=array(
	'Pokes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Poke', 'url'=>array('index')),
	array('label'=>'Create Poke', 'url'=>array('create')),
	array('label'=>'Update Poke', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Poke', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Poke', 'url'=>array('admin')),
);
?>

<h1>View Poke #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'foto',
		'numero',
		'pego',
		'onde',
	),
)); ?>
