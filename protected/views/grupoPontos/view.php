<?php
/* @var $this GrupoPontosController */
/* @var $model GrupoPontos */

$this->breadcrumbs=array(
	'Grupo Pontoses'=>array('index'),
	$model->int,
);

$this->menu=array(
	array('label'=>'List GrupoPontos', 'url'=>array('index')),
	array('label'=>'Create GrupoPontos', 'url'=>array('create')),
	array('label'=>'Update GrupoPontos', 'url'=>array('update', 'id'=>$model->int)),
	array('label'=>'Delete GrupoPontos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->int),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GrupoPontos', 'url'=>array('admin')),
);
?>

<h1>View GrupoPontos #<?php echo $model->int; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'int',
		'id_grupo',
		'id_pontos',
	),
)); ?>
