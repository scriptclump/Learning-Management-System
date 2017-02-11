	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Page'), array('action' => 'edit', $cmspage['Cmspage']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Page'), array('action' => 'delete', $cmspage['Cmspage']['id']), null, __('Are you sure you want to delete # %s?', $cmspage['Cmspage']['id'])); ?> </li>
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Page'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Page'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['id']); ?></td>
                    </tr>
                   <!--  <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Parent Page Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                        if($cmspage['ParentCmspage']['title'] == 0 ){
                            echo "Itself a Parent";
                        } else{
                            echo $this->Html->link($cmspage['ParentCmspage']['title'], array('controller' => 'cmspages', 'action' => 'view', $cmspage['ParentCmspage']['id']));
                        }
                         ?></td>
                    </tr> -->
					<tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Content'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo ($cmspage['Cmspage']['body']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['modified']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" valign="top"><strong><?php echo __('SEO Details'); ?></strong></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['meta_title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Keyword'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['meta_keyword']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Description'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($cmspage['Cmspage']['meta_desc']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
