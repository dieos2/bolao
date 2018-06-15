<?php
/* @var $this PosicaoController */
/* @var $model Posicao */

$this->breadcrumbs=array(
	'Posicaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Posicao', 'url'=>array('index')),
	array('label'=>'Manage Posicao', 'url'=>array('admin')),
);
?>

<h1>Create Posicao</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>