<?php
/* @var $this PontosController */
/* @var $model Pontos */

$this->breadcrumbs=array(
	'Pontoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pontos', 'url'=>array('index')),
	array('label'=>'Create Pontos', 'url'=>array('create')),
	array('label'=>'View Pontos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Pontos', 'url'=>array('admin')),
);
?>

<h1>Update Pontos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>