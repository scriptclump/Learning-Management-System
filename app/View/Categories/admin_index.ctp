<div class="md-overlay"></div>
<div class="page-head">
   <ol class="breadcrumb">
      <li class="active"><i class="fa fa-plus-square"></i>&nbsp;<?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
   </ol>
</div>
<div class="block block-color primary">
   <div class="header">
      <h3><?php echo __('Categories'); ?></h3>
   </div>
   <div class="content">
      <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-6 col-md-6">
            <div class="bs_border_container">
               <div class="header">
                  <h3>Search Records</h3>
               </div>
               <div class="content">
                  <?php
                     $inputDefaults = array(
                        'class' => 'form-horizontal',
                        'inputDefaults' => array(
                           'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
                           'label' => array('class' => 'col-sm-2 control-label'),
                           'class' => 'form-control',
                           'div' => 'form-group',
                           'between' => '<div class="col-sm-10">',
                           'error' => array(
                              'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
                           ),
                           'after' => '</div>'
                        ),
                        'novalidate' => true,
                        'parsley-validate' => ''
                     );
                     echo $this->Form->create('', $inputDefaults);
                     echo $this->Form->input('title', array('class' => 'form-control parsley-validated', 'placeholder' => 'Enter the page title' ));
                     echo $this->Form->input('status', array('options' => array('' => '(choose one)', '1' => 'Active', '0' => 'Inactive')));
                  ?>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <?php
                        echo $this->Form->button('Submit', array(
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'data-dismiss'  => 'modal'
                        ));
                        echo $this->Form->button('Reset', array(
                            'type' => 'reset',
                            'class' => 'btn btn-default',
                            'data-dismiss'  => 'modal'
                        ));
                        echo $this->Html->link(__('Reset Search'), array('action' => 'index'), array('class' => 'btn btn-warning') );
                        ?>
                    </div>
                  </div>
                  <?php echo $this->Form->end(); ?>
               </div>
            </div>
         </div>
         <div class="col-sm-3"></div>
      </div>
      <div class="row">&nbsp;</div>
      <?php echo $this->Form->create('Category', array('action' => 'bulk_action/','onsubmit'=>'return confirm("Are you sure, you want to perform the bulk actions?");')); ?>
         <div class="table-responsive">
            <div id="datatable2_wrapper" class="dataTables_wrapper form-inline no-footer">
               <table class="table table-bordered" id="datatable2" >
                  <thead>
                     <tr>
                        <th><?php echo $this->Form->checkbox('del_item', array('id' => 'selectall') ); ?></th>
                        <th><?php echo $this->Paginator->sort('id'); ?></th>
                        <th><?php echo $this->Paginator->sort('title'); ?></th>
                        <th><?php echo $this->Paginator->sort('parent_id','Parent Category'); ?></th>
                        <th><?php echo $this->Paginator->sort('status'); ?></th>
                      <!--   <th><?php echo $this->Paginator->sort('created'); ?></th>
                        <th><?php echo $this->Paginator->sort('modified'); ?></th> -->
                        <th><?php echo __('Actions'); ?></th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                        foreach ($categories as $category):  ?>
                     <tr>
                        <td><?php echo $this->Form->checkbox('del_item.', array('class' => 'del_item', 'hiddenField' => false, 'value' => $category['Category']['id'] ) ); ?></td>
                        <td><?php echo h($category['Category']['id']) ?></td>
                        <td><?php echo h($category['Category']['title']);  ?></td>
                        <td><?php if($category['ParentCategory']['id'] != 0) {
                           echo $this->Html->link($category['ParentCategory']['title'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id']));
                           } else {
                           echo 'Itself a parent';
                           }  ?></td>
                        <td align="center"><?php echo $this->Html->link($this->Html->image('icon_' . $category['Category']['status'] . '.png'), array('controller' => 'categories', 'action' => 'switch', 'status', $category['Category']['id']), array('class' => 'status', 'escape' => false)); ?></td>
                       <!--  <td><?php echo h($category['Category']['created']); ?></td>
                        <td><?php echo h($category['Category']['modified']); ?></td> -->
                        <td>
                           <div class="btn-group">
                              <button class="btn btn-default btn-xs" type="button">Actions</button><button data-toggle="dropdown" class="btn btn-xs btn-primary dropdown-toggle" type="button"><span class="caret"></span><span class="sr-only">Toggle Dropdown</span></button>
                              <ul role="menu" class="dropdown-menu">
                                 <li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?></li>
                                 <li><?php echo $this->Html->link(__('Details'), array('action' => 'view', $category['Category']['id'])); ?></li>
                                 <li class="divider"></li>
                                 <li>
                                    <?php
                                       echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id']));
                                       ?>
                                 </li>
                              </ul>
                           </div>
                        </td>
                     </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
               <div class="row">
                   <div class="col-sm-12">
                     <div class="pull-right">&nbsp;</div>
                     <div class="pull-left">
                        <div class="dataTables_length" id="datatable2_length">
                           <label>
                              <?php
                              echo $this->Form->input('do_action', array(
                              'options' => array('' => 'Bulk Actions', 'activate' => 'Activate', 'deactivate' => 'Deactivate', 'delete' => 'Delete'),
                              'class' => 'form-control',
                              'div' => false,
                              'label' => false
                              ));

                              echo $this->Form->button('Apply', array(
                                  'type' => 'submit',
                                  'class' => 'btn btn-prusia btn-rad',
                                  'data-dismiss'  => 'modal'
                              ));
                              ?>
                           </label>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12">
                     <div class="pull-left">
                        <div class="dataTables_info" id="datatable2_info" role="status" aria-live="polite">
                           <?php
                              echo $this->Paginator->counter(array(
                              'format' => __('Showing {:start} to {:end} of {:count} entries')
                              ));
                           ?>
                        </div>
                     </div>
                     <div class="pull-right">
                        <div class="dataTables_paginate paging_bs_normal" id="datatable2_paginate">
                          <?php if( $this->Paginator->params['paging']['Category']['pageCount'] > 1 ){ ?>
                           <ul class="pagination">
                              <?php
                                 echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                                 echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'active'));
                                 echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
                              ?>
                           </ul>
                           <?php } ?>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>
      <?php echo $this->Form->end(); ?>
   </div>
</div>
<?php echo $this->Html->css(
         array(
            '/back_end/js/jquery.datatables/bootstrap-adapter/css/datatables'
            )
         );?>