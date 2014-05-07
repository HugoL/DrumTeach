<?php $this->beginContent('//layouts/main'); ?>
      <div class="row-fluid">
        <div class="span3">
        	<div id="sidebar">
    			<?php if(!Yii::app()->user->isGuest) $this->widget('UserMenu'); ?>
			</div>
		</div><!-- sidebar span3 -->

	<div class="span9">
		<div class="main">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
