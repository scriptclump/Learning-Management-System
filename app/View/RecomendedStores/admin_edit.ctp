<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Recomended Stores'), array('action' => 'index')); ?></li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('RecomendedStore.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('RecomendedStore.id'))); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Edit Recomended Store'); ?></h3>
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
		echo $this->Form->create('RecomendedStore', $inputDefaults);
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('alt_tag', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('store_url', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo '<div class="form-group required"><label for="RecomendedStoreTitle" class="col-sm-2 control-label">Store Url Example:</label><div class="col-sm-10"><strong>http://www.google.com</strong></div></div>';
		if($this->data['RecomendedStore']['store_img_small'] != ""){
			echo '<div class="form-group">
					<label class="col-sm-2 control-label" for="RecomendedStoreTitle">Uploaded Store Image</label>
					<div class="col-sm-10">';
					echo $this->Html->image('/'.$this->data['RecomendedStore']['store_img_small'], array('alt' => h($this->data['RecomendedStore']['title'])  ));
			echo '</div>
				   </div>';
		}
		echo $this->Form->input('store_img', array('class' => 'form-control parsley-validated', 'required' => 'required','type' => 'file', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Upload Store Image') ));
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