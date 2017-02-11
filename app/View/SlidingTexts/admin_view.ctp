	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Sliding Text'), array('action' => 'edit', $slidingText['SlidingText']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Sliding Text'), array('action' => 'delete', $slidingText['SlidingText']['id']), null, __('Are you sure you want to delete # %s?', $slidingText['SlidingText']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Sliding Text'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Sliding Text'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingText['SlidingText']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Sliding Text'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($slidingText['SlidingText']['body']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Sort Order'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingText['SlidingText']['sort_order']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingText['SlidingText']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingText['SlidingText']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingText['SlidingText']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
