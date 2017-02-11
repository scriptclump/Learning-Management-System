<div class="categoriesCourses view">
<h2><?php echo __('Categories Course'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesCourse['CategoriesCourse']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCourse['Category']['title'], array('controller' => 'categories', 'action' => 'view', $categoriesCourse['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesCourse['Course']['title'], array('controller' => 'courses', 'action' => 'view', $categoriesCourse['Course']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Course'), array('action' => 'edit', $categoriesCourse['CategoriesCourse']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Course'), array('action' => 'delete', $categoriesCourse['CategoriesCourse']['id']), null, __('Are you sure you want to delete # %s?', $categoriesCourse['CategoriesCourse']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
	</ul>
</div>
