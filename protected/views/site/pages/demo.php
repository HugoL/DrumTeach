<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Demostración';
$this->breadcrumbs=array(
	'Demostración',
);
?>
<h1>Demostración</h1>
<div class="texto">
<p>Algunas imágenes de lo que puedes encontrar dentro de <b>DrumTeach</b>:</p>

<div class="clearfix">&nbsp;</div>
<center><div class="thumbnail"><img src="<?php echo Yii::app()->baseUrl.Yii::app()->params['images'] ?>demo_movil.png" /><br/>
<p>Listado de ejercicios organizado por categorías. El diseño se adapta a cualquier tamaño de pantalla para que se vea correctamente en los dispósitivos móviles.</p></div>

<div class="clearfix">&nbsp;</div>
<center><div class="thumbnail"><img src="<?php echo Yii::app()->baseUrl.Yii::app()->params['images'] ?>demo_ejercicio_nuevo.png" /><br/>
<p>El usuario introduce un ejercicio nuevo.</p></div>
<div class="clearfix">&nbsp;</div>

<p></p>