	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Recomended Store'), array('action' => 'edit', $recomendedStore['RecomendedStore']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Recomended Store'), array('action' => 'delete', $recomendedStore['RecomendedStore']['id']), null, __('Are you sure you want to delete # %s?', $recomendedStore['RecomendedStore']['id'])); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Recomended Store'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Recomended Store'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Alt Tag'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['alt_tag']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Store URL'); ?></strong></td>
                        <td width="75%" valign="top"><a href="<?=$recomendedStore['RecomendedStore']['store_url']?>" target="_blank"><?php echo h($recomendedStore['RecomendedStore']['store_url']); ?></a></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Store Image'); ?></strong></td>
                        <td width="75%" valign="top"><?php if($recomendedStore['RecomendedStore']['store_img_medium'] != "") {
                                   echo $this->Html->image('/'.$recomendedStore['RecomendedStore']['store_img_medium'], array('alt' => h($recomendedStore['RecomendedStore']['title'])  ));
                               } else {
                                   echo 'No Image';
                               }  ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Sort Order'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['sort_order']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($recomendedStore['RecomendedStore']['modified']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>
