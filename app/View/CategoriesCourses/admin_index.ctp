<div class="categoriesCourses index">
	<h2><?php echo __('Categories Courses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('category_id'); ?></th>
			<th><?php echo $this->Paginator->sort('course_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($categoriesCourses as $categoriesCourse): ?>
	<tr>
		<td><?php echo h($categoriesCourse['CategoriesCourse']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($categoriesCourse['Category']['title'], array('controller' => 'categories', 'action' => 'view', $categoriesCourse['Category']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($categoriesCourse['Course']['title'], array('controller' => 'courses', 'action' => 'view', $categoriesCourse['Course']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $categoriesCourse['CategoriesCourse']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $categoriesCourse['CategoriesCourse']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $categoriesCourse['CategoriesCourse']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCourse['CategoriesCourse']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Categories Course'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
