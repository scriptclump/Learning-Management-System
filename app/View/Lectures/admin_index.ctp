<div class="lectures index">
	<h2><?php echo __('Lectures'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('section_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('short_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('sort_order'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lectures as $lecture): ?>
	<tr>
		<td><?php echo h($lecture['Lecture']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($lecture['Course']['title'], array('controller' => 'courses', 'action' => 'view', $lecture['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($lecture['Section']['title'], array('controller' => 'sections', 'action' => 'view', $lecture['Section']['id'])); ?>
		</td>
		<td><?php echo h($lecture['Lecture']['title']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['short_desc']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['content']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['sort_order']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['slug']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['status']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['created']); ?>&nbsp;</td>
		<td><?php echo h($lecture['Lecture']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $lecture['Lecture']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $lecture['Lecture']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $lecture['Lecture']['id']), null, __('Are you sure you want to delete # %s?', $lecture['Lecture']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Lecture'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
	</ul>
</div>
