 <div class="content_right">
                <div class="right_box">
                    <ul>
                        <li class="alert">
                            <h5><a href="#"><?=__("Alert")?></a></h5>
                            <p><?=__("Háganos saber lo que nos enviado")?></p>
                        </li>
                        <li class="calcuator">
                            <h5><a href="#popup" class="fancybox"><?=__("Calculadora")?></a></h5>
                            <p><?=__("Aquí puedes cotizar el valor aproximado del envío")?></p>
                            <div id="popup" class="popup_box">
                                <h1><?=__("calculadora")?></h1>
                                <div class="popup_box_top">
                                    <div class="popup_box_top_row">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                          <tr>
                                            <td width="50%"><?=__("Peso (Lb)")?>*:</td>
                                            <td width="50%"><input name="" type="text" /></td>
                                          </tr>
                                          <tr>
                                            <td><?=__("Valor Declarado (US $)")?>*:</td>
                                            <td><input name="" type="text" /></td>
                                          </tr>
                                        </table>
                                    </div>
                                    <div class="calculate_box">
                                        <p><?=__("Si cuenta con las medidas del paquete, ingréselas a continuación")?> <span><?=__("(en Pulgadas)")?></span></p>
                                        <div class="calculate_box_left"><?php echo $this->Html->image('/front_end/images/cal_box.jpg', array('alt' => ''));?></div>
                                        <div class="calculate_box_right">
                                            <div class="calculate_box_right_row">
                                                <label><?=__("Largo")?>:</label>
                                                <input name="" type="text" />
                                            </div>
                                            <div class="calculate_box_right_row">
                                                <label><?=__("Ancho")?>:</label>
                                                <input name="" type="text" />
                                            </div>
                                            <div class="calculate_box_right_row">
                                                <label><?=__("Alto")?>:</label>
                                                <input name="" type="text" />
                                            </div>
                                        </div>
                                        <div class="calculate_box_btn"><input name="" type="submit" value="<?=__("calcular")?>" /></div>
                                    </div>
                                </div>
                                <div class="popup_box_bottom">
                                    <table width="100%" border="0" cellspacing="1" cellpadding="0">
                                      <tr>
                                        <td><?=__("Costo por Lb")?>:</td>
                                        <td>US$ 1.59</td>
                                      </tr>
                                      <tr>
                                        <td><?=__("Libra(s)")?>:</td>
                                        <td>0.0</td>
                                      </tr>
                                      <tr>
                                        <td><?=__("Valor envió")?>: <small>$5.00 US por cada $100</small></td>
                                        <td>US$ 0.00</td>
                                      </tr>
                                      <tr>
                                        <td><?=__("Seguro")?>:</td>
                                        <td>US$ 5.00</td>
                                      </tr>
                                      <tr>
                                        <td><?=__("Impuestos")?>:</td>
                                        <td>US$ 0.00</td>
                                      </tr>
                                      <tr>
                                        <td class="total_txt"><?=__("Valor Total a Pagar")?></td>
                                        <td class="total_amt"><?=__("US$ 0.00")?></td>
                                      </tr>
                                    </table>
                                    <p><?=__("Esta tarifa es aproximada y no la exacta a cobrar. Si a la llegada a Colombia, la Aduana estima que se debe pagar un valor diferente en impuestos, el cliente deber&aacute;realizar los pagos adicionales.")?></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="facebook_box">
                 <!--  <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Ficargobox&amp;width=237&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:237px; height:290px;" allowTransparency="true"></iframe> -->
                </div>
            </div>