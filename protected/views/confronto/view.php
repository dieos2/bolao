<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */

$this->breadcrumbs=array(
	'Confrontos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Confronto', 'url'=>array('index')),
	array('label'=>'Create Confronto', 'url'=>array('create')),
	array('label'=>'Update Confronto', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Confronto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Confronto', 'url'=>array('admin')),
);
?>

<h1>View Confronto #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_grupo',
		'id_time_casa',
		'id_time_visitante',
		'data',
		'placar_casa',
		'placar_visitante',
		'vencedor',
		'empate',
	),
)); ?>
