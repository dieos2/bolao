<?php
/* @var $this GrupoPontosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Grupo Pontoses',
);

$this->menu=array(
	array('label'=>'Create GrupoPontos', 'url'=>array('create')),
	array('label'=>'Manage GrupoPontos', 'url'=>array('admin')),
);
?>

<h1>Grupo Pontoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
