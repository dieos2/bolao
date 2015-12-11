<?php
/* @var $this ApostaController */
/* @var $model Aposta */

$this->breadcrumbs=array(
	'Apostas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Aposta', 'url'=>array('index')),
	array('label'=>'Manage Aposta', 'url'=>array('admin')),
);
?>

<h1>Create Aposta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>