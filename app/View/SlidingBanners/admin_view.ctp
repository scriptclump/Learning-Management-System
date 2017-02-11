	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Sliding Banner'), array('action' => 'edit', $slidingBanner['SlidingBanner']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Sliding Banner'), array('action' => 'delete', $slidingBanner['SlidingBanner']['id']), null, __('Are you sure you want to delete # %s?', $slidingBanner['SlidingBanner']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Sliding Banner'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('SlidingBanner'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Alt Tag'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['alt_tag']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Banner Image'); ?></strong></td>
                        <td width="75%" valign="top"><?php if($slidingBanner['SlidingBanner']['banner_img_medium'] != "") {
                                   echo $this->Html->image('/'.$slidingBanner['SlidingBanner']['banner_img_medium'], array('alt' => h($slidingBanner['SlidingBanner']['title'])  ));
                               } else {
                                   echo 'No Image';
                               }  ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Sort Order'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['sort_order']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($slidingBanner['SlidingBanner']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
