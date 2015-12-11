<?php
/* @var $this PokeController */
/* @var $model Poke */

$this->breadcrumbs=array(
	'Pokes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Poke', 'url'=>array('index')),
	array('label'=>'Create Poke', 'url'=>array('create')),
	array('label'=>'View Poke', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Poke', 'url'=>array('admin')),
);
?>

<h1>Update Poke <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>