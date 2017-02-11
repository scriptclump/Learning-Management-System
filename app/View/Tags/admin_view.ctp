<div class="tags view">
<h2><?php echo __('Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tag['Tag']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tag'), array('action' => 'edit', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tag'), array('action' => 'delete', $tag['Tag']['id']), null, __('Are you sure you want to delete # %s?', $tag['Tag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($tag['Course'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Short Desc'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Discount Type'); ?></th>
		<th><?php echo __('Discount Amt'); ?></th>
		<th><?php echo __('Course Offering'); ?></th>
		<th><?php echo __('Certified'); ?></th>
		<th><?php echo __('Cartificate Detail'); ?></th>
		<th><?php echo __('Cartificate Src'); ?></th>
		<th><?php echo __('Sort Order'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keyword'); ?></th>
		<th><?php echo __('Meta Desc'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($tag['Course'] as $course): ?>
		<tr>
			<td><?php echo $course['id']; ?></td>
			<td><?php echo $course['user_id']; ?></td>
			<td><?php echo $course['title']; ?></td>
			<td><?php echo $course['short_desc']; ?></td>
			<td><?php echo $course['content']; ?></td>
			<td><?php echo $course['price']; ?></td>
			<td><?php echo $course['discount_type']; ?></td>
			<td><?php echo $course['discount_amt']; ?></td>
			<td><?php echo $course['course_offering']; ?></td>
			<td><?php echo $course['certified']; ?></td>
			<td><?php echo $course['cartificate_detail']; ?></td>
			<td><?php echo $course['cartificate_src']; ?></td>
			<td><?php echo $course['sort_order']; ?></td>
			<td><?php echo $course['meta_title']; ?></td>
			<td><?php echo $course['meta_keyword']; ?></td>
			<td><?php echo $course['meta_desc']; ?></td>
			<td><?php echo $course['slug']; ?></td>
			<td><?php echo $course['status']; ?></td>
			<td><?php echo $course['created']; ?></td>
			<td><?php echo $course['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'courses', 'action' => 'view', $course['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'courses', 'action' => 'edit', $course['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'courses', 'action' => 'delete', $course['id']), null, __('Are you sure you want to delete # %s?', $course['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
