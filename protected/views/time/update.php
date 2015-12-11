<?php
/* @var $this TimeController */
/* @var $model Time */

$this->breadcrumbs=array(
	'Times'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Time', 'url'=>array('index')),
	array('label'=>'Create Time', 'url'=>array('create')),
	array('label'=>'View Time', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Time', 'url'=>array('admin')),
);
?>

<h1>Update Time <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>