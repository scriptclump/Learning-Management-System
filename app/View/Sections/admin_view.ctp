<div class="sections view">
<h2><?php echo __('Section'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($section['Section']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($section['Course']['title'], array('controller' => 'courses', 'action' => 'view', $section['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($section['Section']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Desc'); ?></dt>
		<dd>
			<?php echo h($section['Section']['short_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($section['Section']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($section['Section']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($section['Section']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($section['Section']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($section['Section']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Section'), array('action' => 'edit', $section['Section']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Section'), array('action' => 'delete', $section['Section']['id']), null, __('Are you sure you want to delete # %s?', $section['Section']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('controller' => 'attachments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('controller' => 'attachments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('controller' => 'lectures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Attachments'); ?></h3>
	<?php if (!empty($section['Attachment'])): ?>
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
	<?php foreach ($section['Attachment'] as $attachment): ?>
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
<div class="related">
	<h3><?php echo __('Related Lectures'); ?></h3>
	<?php if (!empty($section['Lecture'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Section Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Short Desc'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Sort Order'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($section['Lecture'] as $lecture): ?>
		<tr>
			<td><?php echo $lecture['id']; ?></td>
			<td><?php echo $lecture['course_id']; ?></td>
			<td><?php echo $lecture['section_id']; ?></td>
			<td><?php echo $lecture['title']; ?></td>
			<td><?php echo $lecture['short_desc']; ?></td>
			<td><?php echo $lecture['content']; ?></td>
			<td><?php echo $lecture['sort_order']; ?></td>
			<td><?php echo $lecture['slug']; ?></td>
			<td><?php echo $lecture['status']; ?></td>
			<td><?php echo $lecture['created']; ?></td>
			<td><?php echo $lecture['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'lectures', 'action' => 'view', $lecture['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'lectures', 'action' => 'edit', $lecture['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'lectures', 'action' => 'delete', $lecture['id']), null, __('Are you sure you want to delete # %s?', $lecture['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
