<?php
/* @var $this TimeController */
/* @var $model Time */

$this->breadcrumbs=array(
	'Times'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Time', 'url'=>array('index')),
	array('label'=>'Create Time', 'url'=>array('create')),
	array('label'=>'Update Time', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Time', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Time', 'url'=>array('admin')),
);
?>

<h1>View Time #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'escudo',
	),
)); ?>
