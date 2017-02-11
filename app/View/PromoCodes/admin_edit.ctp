<div class="promoCodes form">
<?php echo $this->Form->create('PromoCode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promo Code'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PromoCode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PromoCode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promo Codes'), array('action' => 'index')); ?></li>
	</ul>
</div>
