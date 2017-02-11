<div class="promoCodes view">
<h2><?php echo __('Promo Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Applied Type'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['applied_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amt'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiration Date'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['expiration_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promoCode['PromoCode']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promo Code'), array('action' => 'edit', $promoCode['PromoCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promo Code'), array('action' => 'delete', $promoCode['PromoCode']['id']), null, __('Are you sure you want to delete # %s?', $promoCode['PromoCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promo Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promo Code'), array('action' => 'add')); ?> </li>
	</ul>
</div>
