<div class="attachments form">
<?php echo $this->Form->create('Attachment'); ?>
	<fieldset>
		<legend><?php echo __('Add Attachment'); ?></legend>
	<?php
		echo $this->Form->input('course_id');
		echo $this->Form->input('section_id');
		echo $this->Form->input('lecture_id');
		echo $this->Form->input('title');
		echo $this->Form->input('short_desc');
		echo $this->Form->input('content');
		echo $this->Form->input('attachment_type');
		echo $this->Form->input('file_type');
		echo $this->Form->input('file_src');
		echo $this->Form->input('sort_order');
		echo $this->Form->input('slug');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('controller' => 'lectures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
	</ul>
</div>
