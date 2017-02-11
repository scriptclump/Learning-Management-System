<div class="lectures view">
<h2><?php echo __('Lecture'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lecture['Course']['title'], array('controller' => 'courses', 'action' => 'view', $lecture['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($lecture['Section']['title'], array('controller' => 'sections', 'action' => 'view', $lecture['Section']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Desc'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['short_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($lecture['Lecture']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Lecture'), array('action' => 'edit', $lecture['Lecture']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Lecture'), array('action' => 'delete', $lecture['Lecture']['id']), null, __('Are you sure you want to delete # %s?', $lecture['Lecture']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attachments'); ?></h3>
	<?php if (!empty($lecture['Attachment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Section Id'); ?></th>
		<th><?php echo __('Lecture Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Short Desc'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Attachment Type'); ?></th>
		<th><?php echo __('File Type'); ?></th>
		<th><?php echo __('File Src'); ?></th>
		<th><?php echo __('Sort Order'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($lecture['Attachment'] as $attachment): ?>
		<tr>
			<td><?php echo $attachment['id']; ?></td>
			<td><?php echo $attachment['course_id']; ?></td>
			<td><?php echo $attachment['section_id']; ?></td>
			<td><?php echo $attachment['lecture_id']; ?></td>
			<td><?php echo $attachment['title']; ?></td>
			<td><?php echo $attachment['short_desc']; ?></td>
			<td><?php echo $attachment['content']; ?></td>
			<td><?php echo $attachment['attachment_type']; ?></td>
			<td><?php echo $attachment['file_type']; ?></td>
			<td><?php echo $attachment['file_src']; ?></td>
			<td><?php echo $attachment['sort_order']; ?></td>
			<td><?php echo $attachment['slug']; ?></td>
			<td><?php echo $attachment['status']; ?></td>
			<td><?php echo $attachment['created']; ?></td>
			<td><?php echo $attachment['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'attachments', 'action' => 'view', $attachment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'attachments', 'action' => 'edit', $attachment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'attachments', 'action' => 'delete', $attachment['id']), null, __('Are you sure you want to delete # %s?', $attachment['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
