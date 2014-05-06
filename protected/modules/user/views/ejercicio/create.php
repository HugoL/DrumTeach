<?php
/* @var $this EjercicioController */
/* @var $model Ejercicio */

$this->breadcrumbs=array(
	'Ejercicios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ejercicio', 'url'=>array('index')),
	array('label'=>'Manage Ejercicio', 'url'=>array('admin')),
);
?>

<h1>Nuevo Ejercicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>