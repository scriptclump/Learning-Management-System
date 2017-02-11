<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Add Page'); ?></h3>
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

		echo $this->Form->create('Cmspage', $inputDefaults);
		// echo $this->Form->input('parent_id', array(
		//     'options' => $parents,
		//     'empty' => '(choose one)', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Parent Page')
		// ));

		echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('body', array('class' => 'ckeditor', 'id' => 'content', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Content')) );
		?>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="CmspageTitle">&nbsp;</label>
			<div class="col-sm-10" align="center"><strong>Below fields are for SEO purpose only</strong></div>
		</div>
		<?php
		echo $this->Form->input('meta_title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('meta_keyword', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('meta_desc', array('class' => 'form-control parsley-validated', 'required' => 'required', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Meta Description') ));
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