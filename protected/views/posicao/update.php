<?php
/* @var $this PosicaoController */
/* @var $model Posicao */

$this->breadcrumbs=array(
	'Posicaos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Posicao', 'url'=>array('index')),
	array('label'=>'Create Posicao', 'url'=>array('create')),
	array('label'=>'View Posicao', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Posicao', 'url'=>array('admin')),
);
?>

<h1>Update Posicao <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>