<div class="block-flat">
         <div>
            <h3 class="text-center"><?php //echo $this->Html->image('/back_end/images/Logo.png', array('alt' => ''));?></h3>
         </div>
         <div>
	    	<?php echo $this->Form->create('User', array(
									'class' => 'form-horizontal',
								    'inputDefaults' => array(
								        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
								        'label' => false,
								        'div' => 'form-group',
								        'between' => '',
								        'error' => array(
								            'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
								        ),
								        'after' => '</div></div>'
								    )
								)); ?>
			<div class="content">
					<h4 class="title">Login Access</h4>

					<?php echo $this->Form->input('username', array('autofocus'=>'autofocus','parsley-trigger'=>'change', 'placeholder' => 'Username','class'=>'form-control','between' => '<div class="col-sm-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>'));?>
					<?php echo $this->Form->input('password', array('autofocus'=>'autofocus','parsley-trigger'=>'change', 'placeholder' => 'Password','class'=>'form-control','between' => '<div class="col-sm-12"><div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>'));?>
			</div>
			<div class="foot">
			<?php echo $this->Form->button('Reset', array(
			    'type' => 'reset',
			    'class' => 'btn btn-default',
			    'data-dismiss'  => 'modal'
			)); ?>
			<?php echo $this->Form->button('Log me in', array(
			    'type' => 'submit',
			    'class' => 'btn btn-primary',
			    'data-dismiss'  => 'modal'
			)); ?>
			</div>
			<?php echo $this->Form->end();?>
			<div style="padding:0 20px 20px 20px;"><?php //echo $this->Html->image('/back_end/images/logoBox.png', array('alt' => ''));?></div>
         </div>
      </div>