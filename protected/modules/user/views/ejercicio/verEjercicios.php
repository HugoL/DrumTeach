<?php
/* @var $this EjercicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ejercicios',
);
?>

<h1>Ejercicios por categorías</h1>

<div class="panel">
	<div class="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>
    Control de fechas:</strong> <label class="label label-success">Menos de 2 semanas</label> <label class="label label-info">Menos de 4 semanas</label> <label class="label label-warning">Menos de 6 semanas</label> <label class="label label-important">Menos de 8 semanas</label> <label class="label label-inverse">Más de 8 semanas</label>
	</div>
</div>
<div class="alert alert-info">Pincha en el botón de la categoría para ver u ocultar los ejercicios</div>

<?php if( empty($categorias) ): ?>
	<div class="alert alert-danger"><b>Todavía no tienes ningún ejercicio guardado</b>.<br/> Pulsa en <b>"Nuevo ejercicio"</b> del menú para comenzar.</div>
<?php endif; ?>
<?php foreach ($categorias as $key => $categoria) { ?>
		<div class="clearfix">
	<?php /*$this->widget('zii.widgets.jui.CJuiButton', array(
    'name'=>$categoria,
    'caption'=>'Save',
    // you can easily change the look of the button by providing the correct class
    // ui-button-error, ui-button-primary, ui-button-success
    'htmlOptions' => array('class'=>'ui-button-primary'),
    'onclick'=>new CJavaScriptExpression('function(this){ $("#this.name").fadeIn(); }'),
    )); */?>
    	<?php
    	//nombre de la categoría sin espacios 
    	$cat = str_replace(" ","",$categoria); 
    	?>
    	<?php $this->widget('bootstrap.widgets.TbButton', array(
    		'buttonType'=>'button',
    		'type'=>'warning',    		
    		'label'=>$categoria,
    		'size'=>'large',
    		'toggle'=>true,
    		'htmlOptions'=>array('class'=>'boton','onclick'=>'javascript:mostrar();', 'name'=>$cat),
		)); ?>
	    <div class="well" id="<?php echo $cat; ?>" style="display:none">
	    <?php foreach ($ejercicios as $key => $ejercicio) {
			if( strcmp($ejercicio->categoria->nombre,$categoria)==0 ){ ?>
				<?php 
					//Para ver cuánto tiempo ha pasado desde que no se modifica la fecha (en semanas)
					$label = "";
					$fecha = date("d-m-Y",strtotime($ejercicio->fecha)); 
					$hoy = date("d-m-Y");

					$semanas = $this->datediff('ww', $fecha, $hoy, false);

					if( $semanas <= 2 ) {
						$label = "success";
					} else {
						if( $semanas <= 4 ){
							$label = "info";
						} else {
							if( $semanas <= 6 ){
								$label = "warning";
							} else {
								if( $semanas <= 8 ){
									$label = "important";
								} else {
									$label = "inverse";
								}
							}					

						}					
					}
					    					
				?>
				<?php $form=$this->beginWidget('CActiveForm', array(					
					'enableAjaxValidation'=>false,
					'action'=>array('ejercicio/update/id/'.$ejercicio->id),
					'htmlOptions'=>array('class'=>'form form-horizontal'),
					)); ?>
				<div class="well well-small">
					<?php echo $form->hiddenField($ejercicio,'id'); ?>
					<b><?php echo $ejercicio->nombre; ?></b><br/>
					<div class="clearfix">					
						<div ><?php echo $form->textField($ejercicio,'velocidad',array('size'=>20,'maxlength'=>128,'class'=>'input-mini'));
					 	echo CHtml::submitButton('Guardar',array('class'=>'btn btn-mini btn-inverse guardar'));?></div>
					 </div>
					Fecha: <span class="label label-<?php echo $label; ?>"><?php echo $fecha; ?></span>
					<?php if( !empty( $ejercicio->observaciones) ) 
						echo "<br/>".$ejercicio->observaciones; ?>
					
					<br/><a class="btn btn-warning btn-mini" href="<?php echo "update/id/".$ejercicio->id; ?>"><i class="icon icon-pencil icon-white"></i> </a> 
					<?php 
					echo CHtml::link(CHtml::encode('Borrar'), array('ejercicio/delete', 'id'=>$ejercicio->id),
					  array(
					    'submit'=>array('ejercicio/delete', 'id'=>$ejercicio->id),
					    'class' => 'btn btn-danger btn-mini','confirm'=>'¿Borrar el ejercicio?'
					  )
					); ?>
				</div>
				<?php $this->endWidget(); ?>

			<?php }			
		} ?>
		</div><hr>
		</div>
<?php } ?>
<script>
$(document).ready(function() {
	$("div.well").fadeOut;
	$(".boton").click( function() {
		if( $(this).hasClass('active') ){
			$("#"+this.name).fadeOut("slow");							
		}else{
			$("#"+this.name).fadeIn("slow");			
		}		
	});
});
</script>
