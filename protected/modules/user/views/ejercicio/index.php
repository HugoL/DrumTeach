<?php
/* @var $this EjercicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ejercicios',
);

$this->menu=array(
	array('label'=>'Create Ejercicio', 'url'=>array('create')),
	array('label'=>'Manage Ejercicio', 'url'=>array('admin')),
);
?>

<h1>Ejercicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>