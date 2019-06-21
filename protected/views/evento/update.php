<?php
/* @var $this EventoController */
/* @var $model Evento */

$this->breadcrumbs=array(
	'Eventos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Evento', 'url'=>array('index')),
	array('label'=>'Create Evento', 'url'=>array('create')),
	array('label'=>'View Evento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Evento', 'url'=>array('admin')),
);
?>

<h1>Update Evento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>