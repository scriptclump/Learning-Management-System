<div class="courses view">
<h2><?php echo __('Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($course['User']['username'], array('controller' => 'users', 'action' => 'view', $course['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($course['Course']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Desc'); ?></dt>
		<dd>
			<?php echo h($course['Course']['short_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($course['Course']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($course['Course']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount Type'); ?></dt>
		<dd>
			<?php echo h($course['Course']['discount_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount Amt'); ?></dt>
		<dd>
			<?php echo h($course['Course']['discount_amt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Offering'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_offering']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Certified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['certified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cartificate Detail'); ?></dt>
		<dd>
			<?php echo h($course['Course']['cartificate_detail']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cartificate Src'); ?></dt>
		<dd>
			<?php echo h($course['Course']['cartificate_src']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($course['Course']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($course['Course']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($course['Course']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Desc'); ?></dt>
		<dd>
			<?php echo h($course['Course']['meta_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($course['Course']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($course['Course']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Attachments'); ?></h3>
	<?php if (!empty($course['Attachment'])): ?>
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
	<?php foreach ($course['Attachment'] as $attachment): ?>
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
	<?php if (!empty($course['Lecture'])): ?>
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
	<?php foreach ($course['Lecture'] as $lecture): ?>
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
<div class="related">
	<h3><?php echo __('Related Sections'); ?></h3>
	<?php if (!empty($course['Section'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Short Desc'); ?></th>
		<th><?php echo __('Sort Order'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Section'] as $section): ?>
		<tr>
			<td><?php echo $section['id']; ?></td>
			<td><?php echo $section['course_id']; ?></td>
			<td><?php echo $section['title']; ?></td>
			<td><?php echo $section['short_desc']; ?></td>
			<td><?php echo $section['sort_order']; ?></td>
			<td><?php echo $section['slug']; ?></td>
			<td><?php echo $section['status']; ?></td>
			<td><?php echo $section['created']; ?></td>
			<td><?php echo $section['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sections', 'action' => 'view', $section['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sections', 'action' => 'edit', $section['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sections', 'action' => 'delete', $section['id']), null, __('Are you sure you want to delete # %s?', $section['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($course['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Lft'); ?></th>
		<th><?php echo __('Rght'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Body'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keyword'); ?></th>
		<th><?php echo __('Meta Desc'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['parent_id']; ?></td>
			<td><?php echo $category['lft']; ?></td>
			<td><?php echo $category['rght']; ?></td>
			<td><?php echo $category['title']; ?></td>
			<td><?php echo $category['body']; ?></td>
			<td><?php echo $category['meta_title']; ?></td>
			<td><?php echo $category['meta_keyword']; ?></td>
			<td><?php echo $category['meta_desc']; ?></td>
			<td><?php echo $category['slug']; ?></td>
			<td><?php echo $category['status']; ?></td>
			<td><?php echo $category['created']; ?></td>
			<td><?php echo $category['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Tags'); ?></h3>
	<?php if (!empty($course['Tag'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Sort Order'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($course['Tag'] as $tag): ?>
		<tr>
			<td><?php echo $tag['id']; ?></td>
			<td><?php echo $tag['title']; ?></td>
			<td><?php echo $tag['sort_order']; ?></td>
			<td><?php echo $tag['slug']; ?></td>
			<td><?php echo $tag['status']; ?></td>
			<td><?php echo $tag['created']; ?></td>
			<td><?php echo $tag['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
