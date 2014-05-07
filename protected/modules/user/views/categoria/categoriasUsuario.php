<?php
/* @var $this CategoriaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categorias',
);
?>

<h1>Ejercicios por Categorias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_categoria',
)); ?>