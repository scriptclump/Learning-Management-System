	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Newsletter'), array('action' => 'edit', $newsletter['Newsletter']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Newsletter'), array('action' => 'delete', $newsletter['Newsletter']['id']), null, __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Newsletter'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Newsletter'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletter['Newsletter']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Subject'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($newsletter['Newsletter']['subject']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Newsletter Content'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($newsletter['Newsletter']['body']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletter['Newsletter']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletter['Newsletter']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletter['Newsletter']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
