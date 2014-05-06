<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="clearfix">&nbsp;</div>
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>CHtml::encode(Yii::app()->name),
)); ?>
 
    <p>Aplicación web que te permite estar al corriente de tus progresos en tus clases de batería.</p>

    <p><strong>Totalmente gratuita.</strong> Solo tienes que registrarte y ya la puedes disfrutar.</p>
    
    <div class="clearfix">&nbsp;</div>
    <center><p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'inverse',
        'size'=>'large',
        'label'=>'¡Regístrate gratis!',
    )); ?></p></center>
<?php $this->endWidget(); ?>