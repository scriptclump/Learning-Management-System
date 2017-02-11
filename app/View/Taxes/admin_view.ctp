<div class="taxes view">
<h2><?php echo __('Tax'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Applied Type'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['applied_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amt'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tax['Tax']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tax'), array('action' => 'edit', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tax'), array('action' => 'delete', $tax['Tax']['id']), null, __('Are you sure you want to delete # %s?', $tax['Tax']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Taxes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tax'), array('action' => 'add')); ?> </li>
	</ul>
</div>
