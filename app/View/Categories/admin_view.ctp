	<div class="page-head"><ol class="breadcrumb">
   		<li><i class="fa fa-pencil-square-o"></i>&nbsp;<?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><i class="fa fa-times"></i>&nbsp;<?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
  </ol></div>
	<div class="block block-color primary">
	  <div class="header">
	    <h3><?php echo __('Category'); ?></h3>
	  </div>
	  <div class="content">
	    <div class="table-responsive">
			<table class="table-bordered table-striped">
                <tbody>
                    <tr>
                    	<td width="25%" valign="top"><strong><?php echo __('ID'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['id']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Parent Name'); ?></strong></td>
                        <td width="75%" valign="top"><?php
                        if($category['ParentCategory']['title'] == 0 ){
                            echo "Itself a Parent";
                        } else{
                            echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id']));
                        }
                         ?></td>
                    </tr>
					<tr>
                        <td width="25%" valign="top"><strong><?php echo __('Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Status'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['status']==0?"Inactive":"Active"); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Created'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['created']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Modified'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['modified']); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center" valign="top"><strong><?php echo __('SEO Details'); ?></strong></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Title'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['meta_title']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Keyword'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['meta_keyword']); ?></td>
                    </tr>
                    <tr>
                        <td width="25%" valign="top"><strong><?php echo __('Meta Description'); ?></strong></td>
                        <td width="75%" valign="top"><?php echo h($category['Category']['meta_desc']); ?></td>
                    </tr>
                </tbody>
            </table>
		</div>
	  </div>

<div class="block block-color primary">
    <div class="header">
        <h3><?php echo __('Assigned Listing Types'); ?></h3>
    </div>
    <div class="content">
        <div class="table-responsive">
            <?php
            if (!empty($category['ListingType'])): ?>
                <table class="table table-bordered" id="datatable2" >
                    <thead>
                        <tr>
                            <th><strong><?php echo __('Id'); ?></strong></th>
                            <th><strong><?php echo __('Title'); ?></strong></th>
                            <th><strong><?php echo __('Created'); ?></strong></th>
                            <th><strong><?php echo __('Modified'); ?></strong></th>
                            <th><strong><?php echo __('Action'); ?></strong></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($category['ListingType'] as $category): ?>
                        <tr>
                            <td><?php echo $category['id']; ?></td>
                            <td><?php echo $category['title']; ?></td>
                            <td><?php echo $category['created']; ?></td>
                            <td><?php echo $category['modified']; ?></td>
                            <td><?php echo $this->Html->link(__('View'), array('controller' => 'listing_types', 'action' => 'view', $category['id'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>