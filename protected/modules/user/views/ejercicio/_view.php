<?php
/* @var $this EjercicioController */
/* @var $data Ejercicio */
?>

<div class="view well well-small">

	<?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<?php 
	switch ( $data->categoria->id ) {
		case 1:
			$tipo = "success";
			break;
		case 2:
			$tipo = "warning";
			break;
		case 3:
			$tipo = "important";
			break;
		
		default:
			$tipo = "success";
			break;
	}
	$this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>$tipo, // 'success', 'warning', 'important', 'info' or 'inverse'
    'label'=>CHtml::encode($data->categoria->nombre),
	)); ?><br/>

	<b><?php echo CHtml::encode($data->nombre); ?></b><br/> Velocidad: 

	<?php echo CHtml::encode($data->velocidad); ?> bpm<br/>

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<?php //echo CHtml::encode($data->id_usuario); ?>

</div>