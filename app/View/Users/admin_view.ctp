	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('User'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['User']['id']); ?></td>
                    </tr>
                    <!-- <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Username'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['User']['username']); ?></td>
                    </tr> -->
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Email'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo $this->Text->autoLinkEmails($user['User']['email']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('First Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['fname']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Last Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['lname']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Date Of Birth'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                        echo $this->Time->format($user['Profile']['dob'], '%d-%m-%Y', 'Not Mentioned');
                        ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Land Phone'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['land_phone']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Cell Phone'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['cell_phone']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Reffered By'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['reffered_by']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('City'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['city_id']); ?></td>
                    </tr>
                     <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Department'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['Profile']['department_id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                           if($user['User']['status'] == '0'){
                              echo "Waiting for activation";
                           } else if($user['User']['status'] == '1'){
                              echo "Active";
                           } else if($user['User']['status'] == '2'){
                              echo "Suspended";
                           } else if($user['User']['status'] == '3'){
                              echo "Expired";
                           } else{
                              echo "";
                           }
                           ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Last Login'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['User']['last_login']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Registered On'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['User']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Updated'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($user['User']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
