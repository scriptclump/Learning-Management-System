<div class="courses index">
	<h2><?php echo __('Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('short_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('price'); ?></th>
			<th><?php echo $this->Paginator->sort('discount_type'); ?></th>
			<th><?php echo $this->Paginator->sort('discount_amt'); ?></th>
			<th><?php echo $this->Paginator->sort('course_offering'); ?></th>
			<th><?php echo $this->Paginator->sort('certified'); ?></th>
			<th><?php echo $this->Paginator->sort('cartificate_detail'); ?></th>
			<th><?php echo $this->Paginator->sort('cartificate_src'); ?></th>
			<th><?php echo $this->Paginator->sort('sort_order'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_title'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($courses as $course): ?>
	<tr>
		<td><?php echo h($course['Course']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($course['User']['username'], array('controller' => 'users', 'action' => 'view', $course['User']['id'])); ?>
		</td>
		<td><?php echo h($course['Course']['title']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['short_desc']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['content']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['price']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['discount_type']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['discount_amt']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['course_offering']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['certified']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['cartificate_detail']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['cartificate_src']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['sort_order']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['meta_keyword']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['meta_desc']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['slug']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['status']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['created']); ?>&nbsp;</td>
		<td><?php echo h($course['Course']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $course['Course']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $course['Course']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('controller' => 'lectures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
