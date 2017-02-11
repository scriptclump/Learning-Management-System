<div class="attachments index">
	<h2><?php echo __('Attachments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th><?php echo $this->Paginator->sort('section_id'); ?></th>
			<th><?php echo $this->Paginator->sort('lecture_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('short_desc'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('attachment_type'); ?></th>
			<th><?php echo $this->Paginator->sort('file_type'); ?></th>
			<th><?php echo $this->Paginator->sort('file_src'); ?></th>
			<th><?php echo $this->Paginator->sort('sort_order'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($attachments as $attachment): ?>
	<tr>
		<td><?php echo h($attachment['Attachment']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($attachment['Course']['title'], array('controller' => 'courses', 'action' => 'view', $attachment['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attachment['Section']['title'], array('controller' => 'sections', 'action' => 'view', $attachment['Section']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($attachment['Lecture']['title'], array('controller' => 'lectures', 'action' => 'view', $attachment['Lecture']['id'])); ?>
		</td>
		<td><?php echo h($attachment['Attachment']['title']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['short_desc']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['content']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['attachment_type']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['file_type']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['file_src']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['sort_order']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['slug']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['status']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['created']); ?>&nbsp;</td>
		<td><?php echo h($attachment['Attachment']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $attachment['Attachment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $attachment['Attachment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $attachment['Attachment']['id']), null, __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('controller' => 'lectures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
	</ul>
</div>
