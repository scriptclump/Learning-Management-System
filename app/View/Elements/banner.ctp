<!-- banner start here -->
<div class="banner_wrap">
    <div class="row">
        <div class="banner_container">
            <?php $sliding_banners = $this->requestAction('SlidingBanners/display/');
                    if ( isset($sliding_banners) && ( count($sliding_banners) > 0 ) ) : ?>
                <div class="banner_slider">
                    <ul class="bxslider">
                       <?php $i=0;
                        foreach($sliding_banners as $sliding_banner): ?>
                            <li><?php if($sliding_banners[$i]['SlidingBanner']['banner_img'] != "") {
                                       echo $this->Html->image('/'.$sliding_banners[$i]['SlidingBanner']['banner_img'], array('alt' => h($sliding_banners[$i]['SlidingBanner']['title'])  ));
                                   } else {
                                       echo 'No Image';
                                   } ?></li>
                        <?php $i++; endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php $sliding_texts = $this->requestAction('SlidingTexts/display/');
                    if ( isset($sliding_texts) && ( count($sliding_texts) > 0 ) ) : ?>
                <div class="content_slider">
                    <ul id="content_slider">
                        <?php $i=0;
                        foreach($sliding_texts as $sliding_text): ?>
                            <li>
                                <div class="content_slide">
                                    <?php if($sliding_texts[$i]['SlidingText']['body'] != "") {
                                           echo $sliding_texts[$i]['SlidingText']['body'];
                                       } else {
                                           echo __('No record available');
                                       } ?>
                                </div>
                            </li>
                        <?php $i++; endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="banner_right">
                <ul>
                    <li><a href="<?=BASE_URL?>register" class="register"><?=__('Regístrate Ahora')?></a></li>
                    <li><a href="<?=BASE_URL?>login" class="sign_in"><?=__('Ingresar a mi Cuenta')?></a></li>
                    <li><a href="<?=BASE_URL?>contactenos" class="contact"><?=__('Contáctenos')?></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- banner end here -->