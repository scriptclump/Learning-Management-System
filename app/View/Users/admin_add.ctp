<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Add User'); ?></h3>
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
		echo $this->Form->input('username', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		echo $this->Form->input('password', array('class' => 'form-control parsley-validated', 'required' => 'required' ));
		// echo $this->Form->input('re_password', array('class' => 'form-control parsley-validated', 'required' => 'required',  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Retype Password') ));
		echo $this->Form->input('email', array('class' => 'form-control parsley-validated', 'required' => 'required', 'type' => 'email' ));
		echo $this->Form->input('Profile.fname', array('class' => 'form-control parsley-validated', 'required' => 'required',  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'First Name') ));
		echo $this->Form->input('Profile.lname', array('class' => 'form-control parsley-validated', 'required' => 'required',  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Last Name') ));
		echo $this->Form->input('Profile.dob', array('class' => 'form-control parsley-validated datetime', 'required' => 'required', 'placeholder' => 'Select Date', 'type' => 'text' ,  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Date of Birth')));
		echo $this->Form->input('Profile.land_phone', array('class' => 'form-control parsley-validated', 'required' => 'required',  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Land Phone') ));
		echo $this->Form->input('Profile.cell_phone', array('class' => 'form-control parsley-validated', 'required' => 'required',  'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Cell Phone') ));
		echo $this->Form->input('Profile.reffered_by', array('class' => 'form-control parsley-validated', 'label' => array('class' => 'col-sm-2 control-label', 'text' => 'Reffered By') ));
		echo $this->Form->input('Profile.address_correspondence_to', array( 'type' => 'textarea' ));
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
<?php
$this->Js->get('#ProfileCityId')->event('change',
  $this->Js->request(array(
    'controller'=>'users',
    'action'=>'admin_city_to_departmentAjax'
    ), array(
    'update'=>'#ProfileDepartmentId',
    'async' => true,
    'method' => 'post',
    'dataExpression'=>true,
    'data'=> $this->Js->serializeForm(array(
      'isForm' => true,
      'inline' => true
      ))
    ))
  );
?>