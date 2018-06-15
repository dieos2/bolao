<?php
/* @var $this PosicaoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Posicaos',
);

$this->menu=array(
	array('label'=>'Create Posicao', 'url'=>array('create')),
	array('label'=>'Manage Posicao', 'url'=>array('admin')),
);
?>

<h1>Posicaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
