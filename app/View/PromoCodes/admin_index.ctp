<div class="promoCodes index">
	<h2><?php echo __('Promo Codes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('applied_type'); ?></th>
			<th><?php echo $this->Paginator->sort('amt'); ?></th>
			<th><?php echo $this->Paginator->sort('expiration_date'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promoCodes as $promoCode): ?>
	<tr>
		<td><?php echo h($promoCode['PromoCode']['id']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['title']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['applied_type']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['amt']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['expiration_date']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['status']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['created']); ?>&nbsp;</td>
		<td><?php echo h($promoCode['PromoCode']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promoCode['PromoCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promoCode['PromoCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promoCode['PromoCode']['id']), null, __('Are you sure you want to delete # %s?', $promoCode['PromoCode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promo Code'), array('action' => 'add')); ?></li>
	</ul>
</div>
