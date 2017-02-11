<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lft'); ?></dt>
		<dd>
			<?php echo h($category['Category']['lft']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rght'); ?></dt>
		<dd>
			<?php echo h($category['Category']['rght']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Body'); ?></dt>
		<dd>
			<?php echo h($category['Category']['body']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Desc'); ?></dt>
		<dd>
			<?php echo h($category['Category']['meta_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($category['Category']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($category['Category']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($category['ChildCategory'])): ?>
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
	<?php foreach ($category['ChildCategory'] as $childCategory): ?>
		<tr>
			<td><?php echo $childCategory['id']; ?></td>
			<td><?php echo $childCategory['parent_id']; ?></td>
			<td><?php echo $childCategory['lft']; ?></td>
			<td><?php echo $childCategory['rght']; ?></td>
			<td><?php echo $childCategory['title']; ?></td>
			<td><?php echo $childCategory['body']; ?></td>
			<td><?php echo $childCategory['meta_title']; ?></td>
			<td><?php echo $childCategory['meta_keyword']; ?></td>
			<td><?php echo $childCategory['meta_desc']; ?></td>
			<td><?php echo $childCategory['slug']; ?></td>
			<td><?php echo $childCategory['status']; ?></td>
			<td><?php echo $childCategory['created']; ?></td>
			<td><?php echo $childCategory['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $childCategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $childCategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $childCategory['id']), null, __('Are you sure you want to delete # %s?', $childCategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Courses'); ?></h3>
	<?php if (!empty($category['Course'])): ?>
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
	<?php foreach ($category['Course'] as $course): ?>
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
