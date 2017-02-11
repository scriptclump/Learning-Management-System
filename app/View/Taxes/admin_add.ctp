<div class="taxes form">
<?php echo $this->Form->create('Tax'); ?>
	<fieldset>
		<legend><?php echo __('Add Tax'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('applied_type');
		echo $this->Form->input('amt');
		echo $this->Form->input('sort_order');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?></li>
	</ul>
</div>
