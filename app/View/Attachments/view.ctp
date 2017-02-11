<div class="attachments view">
<h2><?php echo __('Attachment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachment['Course']['title'], array('controller' => 'courses', 'action' => 'view', $attachment['Course']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachment['Section']['title'], array('controller' => 'sections', 'action' => 'view', $attachment['Section']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lecture'); ?></dt>
		<dd>
			<?php echo $this->Html->link($attachment['Lecture']['title'], array('controller' => 'lectures', 'action' => 'view', $attachment['Lecture']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Desc'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['short_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Attachment Type'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['attachment_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File Type'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['file_type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('File Src'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['file_src']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sort Order'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['sort_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($attachment['Attachment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Attachment'), array('action' => 'edit', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Attachment'), array('action' => 'delete', $attachment['Attachment']['id']), null, __('Are you sure you want to delete # %s?', $attachment['Attachment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Attachments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Attachment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sections'), array('controller' => 'sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Section'), array('controller' => 'sections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Lectures'), array('controller' => 'lectures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Lecture'), array('controller' => 'lectures', 'action' => 'add')); ?> </li>
	</ul>
</div>
