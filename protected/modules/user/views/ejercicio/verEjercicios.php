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

		<?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
	        'type'=>'warning', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'	        
	        'buttons'=>array(
	            array('label'=>$categoria, 'items'=>array(
	                array('label'=>'Action', 'url'=>'#'),	                
	            )),
	        ),
	    )); ?>
	    <div class="well" id="<?php echo $categoria ?>">
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
				<div class="well well-small">
					<b><?php echo $ejercicio->nombre; ?></b><br/>
					<b><?php echo $ejercicio->velocidad; ?></b> bpm<br/>
					Fecha: <label class="label label-<?php echo $label; ?>"><?php echo $fecha; ?></label>
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
			<?php }			
		} ?>
		</div>
		</div>
<?php } ?>

<script>
$().ready(function(){
    $('#myButton').click(function(){
        $('#myDiv').toggleClass('hidden');
    });
});
</script>
