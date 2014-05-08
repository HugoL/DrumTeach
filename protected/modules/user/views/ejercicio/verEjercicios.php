<?php
/* @var $this EjercicioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ejercicios',
);
?>

<h1>Ejercicios por categorías</h1>

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
				<div class="well well-small">
					<b><?php echo $ejercicio->nombre; ?></b><br/>
					<b><?php echo $ejercicio->velocidad; ?></b>
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
