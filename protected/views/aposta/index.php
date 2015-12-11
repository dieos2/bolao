<?php
/* @var $this ApostaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Apostas',
);

$this->menu=array(
	array('label'=>'Create Aposta', 'url'=>array('create')),
	array('label'=>'Manage Aposta', 'url'=>array('admin')),
);
?>

<h1>Apostas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
