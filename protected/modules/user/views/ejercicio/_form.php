<?php
/* @var $this EjercicioController */
/* @var $model Ejercicio */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ejercicio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>512)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'velocidad'); ?>
		<?php echo $form->textField($model,'velocidad',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'velocidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categoria'); ?>
		<?php echo $form->dropDownList($model,'id_categoria',CHtml::listData(Categoria::model()->findAll(), 'id', 'nombre'));
		?>
		<?php echo $form->error($model,'id_categoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->