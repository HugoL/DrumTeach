<?php
/* @var $this CategoriaController */

$this->breadcrumbs=array(
	'Categoria',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	<?php echo sizeof($dataProvider); ?>
	<?php foreach ($dataProvider as $key => $categoria) { ?>
		<div class="well well-small"><?php //echo $categoria->nombre; ?></div>
	<?php } ?>
</p>
