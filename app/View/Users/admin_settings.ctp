<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
		<!--<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		 <li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li> -->
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Settings'); ?></h3>
  </div>
  <div class="content">
	<?php
		$inputDefaults = array(
			'class' => 'form-horizontal',
			'inputDefaults' => array(
				'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
				'label' => array('class' => 'col-sm-2 control-label'),
				'class' => 'form-control',
				'div' => 'form-group',
				'between' => '<div class="col-sm-10">',
				'error' => array(
					'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
				),
				'after' => '</div>'
			),
			'novalidate' => true,
			'parsley-validate' => ''
		);
		echo $this->Form->create('User', $inputDefaults);
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		//echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'author' => 'Author')
		//));
		?>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10">
	      <?php
			echo $this->Form->button('Submit', array(
			    'type' => 'submit',
			    'class' => 'btn btn-primary',
			    'data-dismiss'  => 'modal'
			));
			echo $this->Form->button('Reset', array(
			    'type' => 'reset',
			    'class' => 'btn btn-default',
			    'data-dismiss'  => 'modal'
			));
			?>
	  </div>
	</div>
	<?php echo $this->Form->end(); ?>
  </div>
</div>