<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>CHtml::encode(Yii::app()->name),
)); ?>
 
    <p>Aplicación web que te permite estar al corriente de tus progresos en tus clases de batería.</p>
    <div class="clearfix">&nbsp;</div>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'inverse',
        'size'=>'large',
        'label'=>'¡Regístrate gratis!',
    )); ?></p>
 
<?php $this->endWidget(); ?>
