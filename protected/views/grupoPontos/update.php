<?php
/* @var $this GrupoPontosController */
/* @var $model GrupoPontos */

$this->breadcrumbs=array(
	'Grupo Pontoses'=>array('index'),
	$model->int=>array('view','id'=>$model->int),
	'Update',
);

$this->menu=array(
	array('label'=>'List GrupoPontos', 'url'=>array('index')),
	array('label'=>'Create GrupoPontos', 'url'=>array('create')),
	array('label'=>'View GrupoPontos', 'url'=>array('view', 'id'=>$model->int)),
	array('label'=>'Manage GrupoPontos', 'url'=>array('admin')),
);
?>

<h1>Update GrupoPontos <?php echo $model->int; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>