<?php
/* @var $this TimeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Times',
);

$this->menu=array(
	array('label'=>'Create Time', 'url'=>array('create')),
	array('label'=>'Manage Time', 'url'=>array('admin')),
);
?>

<h1>Times</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
