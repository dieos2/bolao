<?php
/* @var $this PokeController */
/* @var $model Poke */

$this->breadcrumbs=array(
	'Pokes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Poke', 'url'=>array('index')),
	array('label'=>'Manage Poke', 'url'=>array('admin')),
);
?>

<h1>Create Poke</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>