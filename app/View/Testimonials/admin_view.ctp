	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Testimonial'), array('action' => 'edit', $testimonial['Testimonial']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Testimonial'), array('action' => 'delete', $testimonial['Testimonial']['id']), null, __('Are you sure you want to delete # %s?', $testimonial['Testimonial']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Testimonial'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Testimonial'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($testimonial['Testimonial']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Testimonial'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($testimonial['Testimonial']['body']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Sort Order'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($testimonial['Testimonial']['sort_order']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($testimonial['Testimonial']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($testimonial['Testimonial']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($testimonial['Testimonial']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
