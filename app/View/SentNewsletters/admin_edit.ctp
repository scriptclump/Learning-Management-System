<div class="sentNewsletters form">
<?php echo $this->Form->create('SentNewsletter'); ?>
	<fieldset>
		<legend><?php echo __('Edit Sent Newsletter'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('newsletter_subscriber_id');
		echo $this->Form->input('newsletter_id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('SentNewsletter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('SentNewsletter.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sent Newsletters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Newsletter Subscribers'), array('controller' => 'newsletter_subscribers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter Subscriber'), array('controller' => 'newsletter_subscribers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newsletters'), array('controller' => 'newsletters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter'), array('controller' => 'newsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>
