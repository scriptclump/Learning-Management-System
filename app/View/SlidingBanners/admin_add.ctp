<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Sliding Banners'), array('action' => 'index')); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Add Sliding Banner'); ?></h3>
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
			'parsley-validate' => '',
			'type' => 'file'
		);

		echo $this->Form->create('SlidingBanner', $inputDefaults);
		echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('alt_tag', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('banner_img', array('class' => 'form-control parsley-validated', 'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Banner') ));
		echo $this->Form->input('sort_order', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('status',
			array(
			'options' => array('' => '(choose one)', '1' => 'Active', '0' => 'Inactive'),
			'required' => 'required'
			));
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
<script type="text/javascript">
$(document).ready(function(){
  $('form').parsley();
});
</script>