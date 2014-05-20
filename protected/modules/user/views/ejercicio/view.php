<?php
/* @var $this EjercicioController */
/* @var $model Ejercicio */

$this->breadcrumbs=array(
	'Ejercicios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ejercicio', 'url'=>array('index')),
	array('label'=>'Create Ejercicio', 'url'=>array('create')),
	array('label'=>'Update Ejercicio', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ejercicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ejercicio', 'url'=>array('admin')),
);
?>

<h1>Ejercicio <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(		
		'nombre',
		'velocidad',
		'observaciones',		
	),
)); ?>
<div class="clearfix">&nbsp;</div>
<?php echo CHtml::link('Volver a Mis ejercicios',array('ejercicio/ejerciciosCategorias'),array('class'=>'btn btn-warning')) ?>
