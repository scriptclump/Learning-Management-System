<!-- footer start here -->
<div class="footer_wrap">
    <div class="row">
      <div class="footer_container">
        <div class="footer_top">
          <div class="quick_links">
              <h2><?=__('Quick Links')?></h2>
              <ul>
                  <li><a href="<?=BASE_URL?>"><?=__('Inicio')?></a></li>
                 <?php
                  $ids = array('2', '3', '4', '5', '6');
                  $footer_menu = $this->requestAction(
                          array('controller' => 'Cmspages', 'action' => 'menu'),
                          array('ids' => $ids )
                      );
                  if ( count($footer_menu) ) :
                      foreach ($footer_menu as $key => $value):
                  ?>
                          <li><a href="<?=BASE_URL.$footer_menu[$key]['Cmspage']['slug']?>"><?=$footer_menu[$key]['Cmspage']['title']?></a></li>
                  <?php
                      endforeach;
                  ?>
                  <?php
                  endif;
                  ?>
              </ul>
          </div>
          <div class="about_us_box">
              <?php $about_us = $this->requestAction('Cmspages/getContentByID/7'); ?>
              <h2><?=$about_us['Cmspage']['title'];?></h2>
              <p><?php echo strip_tags($this->Text->truncate( $about_us['Cmspage']['body'], 228,
                            array(
                                'ending' => ' ...',
                                'exact' => false,
                                'html' => true
                            )) )?></p>
              <a href="<?=BASE_URL.$about_us['Cmspage']['slug']?>" class="read_more"><?=__('Read More')?></a>
          </div>
          <div class="newsletter_box">
              <h2><?=__('Newsletter')?></h2>
              <?php
              $inputDefaults = array(
                  'class' => 'form-horizontal',
                  'inputDefaults' => array(
                     'label' => false,
                     'div' => false,
                     'error' => array(
                          'attributes' => array('wrap' => 'span', 'class' => 'help-inline')
                     )
                  ),
                  'url' => array('controller' => 'NewsletterSubscribers', 'action' => 'thank_you')
               );
               echo $this->Form->create('NewsletterSubscriber', $inputDefaults);
               echo $this->Form->input('name', array( 'placeholder' => 'Name' ));
               echo $this->Form->input('email', array( 'placeholder' => 'Email' ));
               echo $this->Form->end('Send');
               ?>
          </div>
          <div class="footer_right_box">
              <div class="f_logo"><a href="<?=BASE_URL?>"><?php echo $this->Html->image('/front_end/images/f_logo.png', array('alt' => ''));?></a></div>
              <div class="footer_social_icon">
                  <ul>
                      <li><a href="https://www.facebook.com/icargobox" target="_blank" class="facebook">Facebook</a></li>
                      <li><a href="https://twitter.com/icargobox" target="_blank" class="twitter">Twitter</a></li>
                      <li><a href="https://plus.google.com/100272117215477412793/about" target="_blank" class="g_plus">Google Plus</a></li>
                  </ul>
              </div>
          </div>
        </div>
        <div class="footer_bottom">
          <div class="footer_copyright"><?=__('Copyright')?> &copy; <?=date('Y')?> <?=__('icargobox. All rights reserved.')?></div>
        </div>
      </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $("#NewsletterSubscriberRegisterForm").validate({
      lang: 'spanish',
        rules: {
            "data[NewsletterSubscriber][name]"                 : "required",
            "data[NewsletterSubscriber][email]"                : {
                                                                  required: true,
                                                                  email: true
                                                               }
        },
        messages: {
            "data[NewsletterSubscriber][name]"                 : "<?=__('Please enter the name')?>",
            "data[NewsletterSubscriber][email]"                : {
                                                                  required: "<?=__('Por favor , introduce una dirección de correo electrónico válida')?>",
                                                                  email: "<?=__('Please enter the correct email address')?>"
                                                                }
        }
    });
});
</script>
<!-- footer end here -->
</body>
</html>