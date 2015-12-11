<?php
/* @var $this GrupoTimeController */
/* @var $model GrupoTime */

$this->breadcrumbs=array(
	'Grupo Times'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GrupoTime', 'url'=>array('index')),
	array('label'=>'Create GrupoTime', 'url'=>array('create')),
	array('label'=>'View GrupoTime', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GrupoTime', 'url'=>array('admin')),
);
?>

<h1>Update GrupoTime <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>