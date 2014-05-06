<?php
/* @var $this EjercicioController */
/* @var $model Ejercicio */

$this->breadcrumbs=array(
	'Ejercicios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ejercicio', 'url'=>array('index')),
	array('label'=>'Create Ejercicio', 'url'=>array('create')),
	array('label'=>'View Ejercicio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ejercicio', 'url'=>array('admin')),
);
?>

<h1>Update Ejercicio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>