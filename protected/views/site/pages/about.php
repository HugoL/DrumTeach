<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>Sobre DrumTeach</h1>
<div class="texto">
<p>DrumTeach es un proyecto personal que me permite estar al corriente de mis progresos con mis clases de batería.</p>

<p>El único propósito por el que desarrollo esta aplicación es para poder tener la información que necesito, relacionada con mis clases de batería, en cualquier momento y en cualquier lugar, gracias a la presencia de los smartphones, que hoy en día te permiten conectarte a la red desde casi cualquier sitio.</p>

<center><div class=""><?php echo CHtml::image(Yii::app()->baseUrl.Yii::app()->params['images']."/drums.png", 'bateria');  ?></div></center><br/>

<p>Aunque la aplicación está destinada a mi uso personal, he decido hacerla multiusuario, para que cualquiera la pueda utilizar igual que yo.</p>

<p><strong>Esto es totalmente gratis.</strong> Si te resulta útil, la usas y ya está ;-)</p>
</div>
<p></p>