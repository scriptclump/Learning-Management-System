<div class="coursesTags view">
<h2><?php echo __('Courses Tag'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coursesTag['CoursesTag']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesTag['Course']['title'], array('controller' => 'courses', 'action' => 'view', $coursesTag['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coursesTag['Tag']['title'], array('controller' => 'tags', 'action' => 'view', $coursesTag['Tag']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Courses Tag'), array('action' => 'edit', $coursesTag['CoursesTag']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Courses Tag'), array('action' => 'delete', $coursesTag['CoursesTag']['id']), null, __('Are you sure you want to delete # %s?', $coursesTag['CoursesTag']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses Tags'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Courses Tag'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
	</ul>
</div>
