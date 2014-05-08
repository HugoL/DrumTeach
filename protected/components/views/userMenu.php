<br/>
<ul>
	<li <?php if(  Yii::app()->controller->id == "ejercicio" && Yii::app()->controller->action->id == "create") {?>class="active"<?php } ?>><?php echo CHtml::link('Nuevo ejercicio',array('ejercicio/create')); ?><hr></li>
    <li <?php if(  Yii::app()->controller->id == "ejercicio" && Yii::app()->controller->action->id == "ejerciciosCategorias") {?>class="active"<?php } ?>><?php echo CHtml::link('Mis ejercicios',array('ejercicio/ejerciciosCategorias')); ?><hr></li>
    <li <?php if(  Yii::app()->controller->id == "categoria" && Yii::app()->controller->action->id == "index") {?>class="active"<?php } ?>><?php echo CHtml::link('Categorias',array('categoria/')); ?><hr></li>
     <li <?php if(  Yii::app()->controller->id == "profile" && Yii::app()->controller->action->id == "profile") {?>class="active"<?php } ?>><?php echo CHtml::link('Mi perfil',array('/user/profile')); ?></li>
</ul>