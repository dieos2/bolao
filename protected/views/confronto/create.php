<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */

$this->breadcrumbs=array(
	'Confrontos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Confronto', 'url'=>array('index')),
	array('label'=>'Manage Confronto', 'url'=>array('admin')),
);
?>

<h1>Create Confronto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>