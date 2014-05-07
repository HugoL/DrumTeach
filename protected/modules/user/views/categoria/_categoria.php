<?php
/* @var $this EjercicioController */
/* @var $data Ejercicio */
?>

<div class="view">
<div class="btn-toolbar">
	    <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	        'type'=>'warning', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
	        'buttons'=>array(
	            array('label'=>$data->nombre, 'items'=>array(
	                array('label'=>'Action', 'url'=>'#'),	                
	            )),
	        ),
	    )); ?>
	</div>
</div>