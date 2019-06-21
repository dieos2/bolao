<?php
/* @var $this GrupoPontosController */
/* @var $model GrupoPontos */

$this->breadcrumbs=array(
	'Grupo Pontoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GrupoPontos', 'url'=>array('index')),
	array('label'=>'Manage GrupoPontos', 'url'=>array('admin')),
);
?>

<h1>Create GrupoPontos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>