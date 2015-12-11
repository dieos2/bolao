<?php
/* @var $this ConfrontoController */
/* @var $model Confronto */

$this->breadcrumbs=array(
	'Confrontos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Confronto', 'url'=>array('index')),
	array('label'=>'Create Confronto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#confronto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Confrontos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'confronto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_grupo',
		'id_time_casa',
		'id_time_visitante',
		'data',
		'placar_casa',
		/*
		'placar_visitante',
		'vencedor',
		'empate',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
