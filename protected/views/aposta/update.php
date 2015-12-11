<?php
/* @var $this ApostaController */
/* @var $model Aposta */

$this->breadcrumbs=array(
	'Apostas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Aposta', 'url'=>array('index')),
	array('label'=>'Create Aposta', 'url'=>array('create')),
	array('label'=>'View Aposta', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Aposta', 'url'=>array('admin')),
);
?>

<h1>Update Aposta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>