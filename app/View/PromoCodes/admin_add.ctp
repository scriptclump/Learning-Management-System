<div class="promoCodes form">
<?php echo $this->Form->create('PromoCode'); ?>
	<fieldset>
		<legend><?php echo __('Add Promo Code'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('applied_type');
		echo $this->Form->input('amt');
		echo $this->Form->input('expiration_date');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Promo Codes'), array('action' => 'index')); ?></li>
	</ul>
</div>
