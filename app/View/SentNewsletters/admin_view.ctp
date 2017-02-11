<div class="sentNewsletters view">
<h2><?php echo __('Sent Newsletter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($sentNewsletter['SentNewsletter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newsletter Subscriber'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sentNewsletter['NewsletterSubscriber']['name'], array('controller' => 'newsletter_subscribers', 'action' => 'view', $sentNewsletter['NewsletterSubscriber']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Newsletter'); ?></dt>
		<dd>
			<?php echo $this->Html->link($sentNewsletter['Newsletter']['id'], array('controller' => 'newsletters', 'action' => 'view', $sentNewsletter['Newsletter']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($sentNewsletter['SentNewsletter']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($sentNewsletter['SentNewsletter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($sentNewsletter['SentNewsletter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sent Newsletter'), array('action' => 'edit', $sentNewsletter['SentNewsletter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Sent Newsletter'), array('action' => 'delete', $sentNewsletter['SentNewsletter']['id']), null, __('Are you sure you want to delete # %s?', $sentNewsletter['SentNewsletter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sent Newsletters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sent Newsletter'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newsletter Subscribers'), array('controller' => 'newsletter_subscribers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter Subscriber'), array('controller' => 'newsletter_subscribers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Newsletters'), array('controller' => 'newsletters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletter'), array('controller' => 'newsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>
