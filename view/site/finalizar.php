<?php include __DIR__ . "/header.php" ?>
<?php
    $cart = is_cart() ? cart_calc() : [];
    $type_send = !empty($cart["meta"]["TYPE_SEND"]) ? $cart["meta"]["TYPE_SEND"] : 'delivery';
    $takeway = $type_send == 'takeway' ? 'active' : '';
    $delivery = $type_send == 'delivery' ? 'active' : '';
    $takeway_check = $type_send == 'takeway' ? 'checked' : '';
    $delivery_check = $type_send == 'delivery' ? 'checked' : '';
    $metas = get_meta(get_id_cart());
?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/banner-2.jpeg') ?>');">
    <h1>Finalizar Pedido</h1>
</div>
<div class="space" style="--line:50px"></div>
<div class="container">
    <form action="" method="POST" class="form">
        <div class="grid-finalizar">
            <div>
                <div class="change_send">
                    <label for="html-delivery" class="js-type_send <?= $delivery ?>" onclick="globalThis.cart.set_type_send('delivery', this)">Delivery</label>
                    <label for="html-takeway" class="js-type_send <?= $takeway ?>" onclick="globalThis.cart.set_type_send('takeway', this)">Takeway</label>
                </div>
                <div class="space"></div>
                <div>
                    <input type="radio" name="type_send" <?= $delivery_check ?> mix-box hidden  id="html-delivery">
                    <div>
                        <div class="grid-locais">
                            <span>
                                <b>Casa</b>
                                <h3>00000-000</h3>
                                <p>Rua das capivaras Nº 42 - SP</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                            <span>
                                <b>Casa 2</b>
                                <h3>00000-000</h3>
                                <p>Rua das capivaras Nº 42 - SP</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                        </div>
                        <div class="space"></div>
                        <div class="grid-2">
                            <div>
                                <small>Código postal</small>
                                <input type="" name="post_code" value="" required>
                            </div>
                            <div>
                                <small>Nome</small>
                                <input type="text" name="name" value="" required>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Endereço</small>
                                <input type="text" name="address" value="" required>
                            </div>
                            <div>
                                <small>Número</small>
                                <input type="" name="number" value="" required>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Complemento</small>
                                <input type="" name="complement" value="">
                            </div>
                            <div>
                                <small>Distrito</small>
                                <input type="" name="city" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="radio" name="type_send" <?= $takeway_check ?> mix-box hidden id="html-takeway">
                    <div>
                        <div class="grid-locais">
                            <span>
                                <b>Retirada</b>
                                <h3>ONDE NOS ENCONTRAR</h3>
                                <p>Rua Carlos Reis, 43</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="grid-cupom">
                    <div>
                        <small>Codigo do cupom</small>
                        <input type="text" value="<?= $metas['COUPON'] ?? '' ?>">
                    </div>
                    <div>
                        <small> </small>
                        <a href="javascript:void(0)" class="btn-morada-finalizar">Aplicar Cupom</a>
                    </div>
                </div>
                <div class="space"></div>
                <div>
                    <small>Instruções para entrega</small>
                    <textarea name="obs" rows="7"></textarea>

                </div>
            </div>
            <div>
                <div class="itens-detalhes">
                    <?php foreach( $cart["prods"] as $prod ) : ?>
                        <div>
                            <span class="btn-more btn-remove">X</span>
                            <span><?= $prod["name"] ?></span>
                            <span class="btn-more">-</span>
                            <b class="quantity-more"><?= $prod["quantity"] ?></b>
                            <span class="btn-more">+</span>
                            <span>&euro;<span><?= $prod["price_html"] ?></span></span>
                            <b>&euro;<span><?= $prod["sub_total_html"] ?></span></b>
                        </div>
                    <?php endforeach; ?>
                   
                </div>
                <div class="space"></div>
                <div class="sub_totais">
                    <div>
                        <span>Sub total</span>
                        <span>&euro;<span><?= $cart["total_html"] ?></span></span>
                    </div>
                    <div>
                        <span>Frete</span>
                        <span>&euro;5,00</span>
                    </div>
                    <div>
                        <span>Cupon</span>
                        <span>&euro;<span><?= $cart['fee']['coupon_html'] ?></span></span>
                    </div>
                    <div>
                        <span>Total</span>
                        <span>&euro;<span><?= $cart["total_fee_html"] ?></span></span>
                    </div>
                </div>   
                <div class="space"></div>
                <div class="box-payment">
                    <div class="payment-options">
                        <label onclick="globalThis.cart.set_method_payment( this, 'js-options-payment' )" for="money" class="js-options-payment active">Dinheiro</label>
                        <label onclick="globalThis.cart.set_method_payment( this, 'js-options-payment' )" for="mult_bank" class="js-options-payment">Multibanco</label>
                        <label onclick="globalThis.cart.set_method_payment( this, 'js-options-payment' )" for="mb_way" class="js-options-payment">MB WAY</label>
                    </div>
                    <div class="space"></div>
                    <div>
                        <input type="radio" name="type_payment" checked mix-box hidden id="money" value="money">
                        <div>
                            <small>Valor para facilitar troco</small>
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mult_bank" value="mult_bank">
                        <div>                        
                            <small>PAGAMENTO DE SERVIÇOS NO MULTIBANCO</small>
                        </div>
                    </div>                    
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mb_way" value="mb_way">
                        <div>
                            <small>NÚMERO DE TELEFONE REGISTADO NO MBWAY</small>
                        </div>
                    </div>
                    <input type="text" name="paymento_value">
                </div>
                <div class="space"></div>
                <input type="submit" class="btn-finalizar" value="Finalizar">
            </div>
        </div>
    </form>
</div>
<div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>