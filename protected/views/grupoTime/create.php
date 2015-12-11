<?php
/* @var $this GrupoTimeController */
/* @var $model GrupoTime */

$this->breadcrumbs=array(
	'Grupo Times'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GrupoTime', 'url'=>array('index')),
	array('label'=>'Manage GrupoTime', 'url'=>array('admin')),
);
?>

<h1>Create GrupoTime</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>