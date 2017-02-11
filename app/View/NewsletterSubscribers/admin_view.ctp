	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit NewsletterSubscriber'), array('action' => 'edit', $newsletterSubscriber['NewsletterSubscriber']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete NewsletterSubscriber'), array('action' => 'delete', $newsletterSubscriber['NewsletterSubscriber']['id']), null, __('Are you sure you want to delete # %s?', $newsletterSubscriber['NewsletterSubscriber']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New NewsletterSubscriber'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('NewsletterSubscriber'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletterSubscriber['NewsletterSubscriber']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($newsletterSubscriber['NewsletterSubscriber']['name']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Email'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletterSubscriber['NewsletterSubscriber']['email']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletterSubscriber['NewsletterSubscriber']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletterSubscriber['NewsletterSubscriber']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($newsletterSubscriber['NewsletterSubscriber']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
