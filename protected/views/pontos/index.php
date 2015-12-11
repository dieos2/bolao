<?php
/* @var $this PontosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pontoses',
);

$this->menu=array(
	array('label'=>'Create Pontos', 'url'=>array('create')),
	array('label'=>'Manage Pontos', 'url'=>array('admin')),
);
?>

<h1>Pontoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
