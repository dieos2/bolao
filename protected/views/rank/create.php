<?php
/* @var $this RankController */
/* @var $model Rank */

$this->breadcrumbs=array(
	'Ranks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Rank', 'url'=>array('index')),
	array('label'=>'Manage Rank', 'url'=>array('admin')),
);
?>

<h1>Create Rank</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>