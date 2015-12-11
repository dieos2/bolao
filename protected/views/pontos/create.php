<?php
/* @var $this PontosController */
/* @var $model Pontos */

$this->breadcrumbs=array(
	'Pontoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pontos', 'url'=>array('index')),
	array('label'=>'Manage Pontos', 'url'=>array('admin')),
);
?>

<h1>Create Pontos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>