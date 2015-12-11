<?php
/* @var $this GrupoTimeController */
/* @var $model GrupoTime */

$this->breadcrumbs=array(
	'Grupo Times'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GrupoTime', 'url'=>array('index')),
	array('label'=>'Create GrupoTime', 'url'=>array('create')),
	array('label'=>'Update GrupoTime', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GrupoTime', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GrupoTime', 'url'=>array('admin')),
);
?>

<h1>View GrupoTime #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_grupo',
		'id_time',
	),
)); ?>
