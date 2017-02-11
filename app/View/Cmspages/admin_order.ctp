<?php echo $this->Html->script('ckeditor/ckeditor');?>
<div class="page-head">
	<ol class="breadcrumb">
   		<li><i class="fa fa-bars"></i>&nbsp;<?php echo $this->Html->link(__('List Pages'), array('action' => 'index')); ?></li>
 	</ol>
</div>
<div class="block block-color primary">
  <div class="header">
    <h3><?php echo __('Change Page Order'); ?></h3>
  </div>
  <div class="content">
	<div id="list2" class="dd">
	  <ol class="dd-list">
	    <li data-id="13" class="dd-item dd3-item">
	      <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 13</div>
	      <ol class="dd-list" style="">
	        <li data-id="14" class="dd-item dd3-item">
	          <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 14</div>
	        </li>
	      <li data-id="15" class="dd-item dd3-item">
	        <div class="dd-handle dd3-handle"></div>
	        <div class="dd3-content">Item 15</div>
	        <ol class="dd-list" style="">
	          <li data-id="16" class="dd-item dd3-item">
	            <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 16</div>
	          </li>
	          <li data-id="17" class="dd-item dd3-item">
	            <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 17</div>
	          </li>
	          <li data-id="18" class="dd-item dd3-item">
	            <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 18</div>
	          </li>
	        </ol>
	      </li>
	      </ol>
	    </li>
	  </ol>
	</div>
	<div class="spacer2">
	  <h4>Serialized Output:</h4>
	  <pre><code id="out2"></code></pre>
	</div>
	</div>
  </div>

<?php
      echo $this->Html->script(
            array(
                '/admin/js/jquery.nestable/jquery.nestable'
                )
            );
?>

<script type="text/javascript">

    $('.dd').nestable();
    //Watch for list changes and show serialized output
    function update_out(selector, sel2){
      var out = $(selector).nestable('serialize');
      $(sel2).html(window.JSON.stringify(out));
    }

    update_out('#list2',"#out2");
    $('#list2').on('change', function() {
      update_out('#list2',"#out2");
    });
</script>