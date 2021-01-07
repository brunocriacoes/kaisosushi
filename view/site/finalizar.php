<?php include __DIR__ . "/header.php" ?>
<?php
    $cart = is_cart() ? cart_calc() : [];
    $type_send = !empty($cart["meta"]["TYPE_SEND"]) ? $cart["meta"]["TYPE_SEND"] : 'delivery';
    $takeway = $type_send == 'takeway' ? 'active' : '';
    $delivery = $type_send == 'delivery' ? 'active' : '';
    $takeway_check = $type_send == 'takeway' ? 'checked' : '';
    $delivery_check = $type_send == 'delivery' ? 'checked' : '';
    $metas = get_meta(get_id_cart());
    $address = !empty($cart["meta"]["ADDRESS_SEND"]) ? $cart["meta"]["ADDRESS_SEND"] : '';
    $postcode = preg_replace( '/(.*)(\d{7})(.*)/', "$2", $address );
    $pay_type = $metas['PAY_TYPE'] ?? 'money';
?>
<span id="js-is-finalizar"></span>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/banner-2.jpeg') ?>');">
    <h1>Finalizar Pedido</h1>
</div>
<div class="space" style="--line:50px"></div>
<div class="container">
    <?php if (!empty(the_error())) : ?>
        <span class="alert"> <?= $GLOBALS['error'] ?> </span>
        <div class="space"></div>
    <?php endif; ?>
    <form action="" method="POST" class="form">
        <div class="grid-finalizar">
            <div>
                <div class="change_send">
                    <label for="html-delivery" class="js-type_send <?= $delivery ?>" onclick="globalThis.cart.set_type_send('delivery', this)">Delivery</label>
                    <label for="html-takeway" class="js-type_send <?= $takeway ?>" onclick="globalThis.cart.set_type_send('takeway', this)">Takeway</label>
                </div>
                <div class="space"></div>
                <input type="text" disabled value="<?= $address ?>">
                <div>
                    <input type="radio" name="type_send" <?= $delivery_check ?> mix-box hidden  id="html-delivery">
                    <div>
                        <div class="grid-locais">
                            <?php foreach( get_moradas() as $morada ): ?>
                                <?php $is_addrress = is_postcode( $morada['post_code'], $postcode ) ? $morada : []; ?>
                                <span class="<?= conmpare_postcode( $morada['post_code'], $postcode ) ?>">
                                    <b><?= $morada['name'] ?></b>
                                    <h3><?= $morada['post_code'] ?></h3>
                                    <p><?= $morada['address'] ?> Nº <?= $morada['number'] ?></p>
                                    <p><?= $morada['city'] ?></p>
                                </span>
                            <?php endforeach; ?>
                        </div>
                        <div class="space"></div>
                        <div class="grid-2">
                            <div>
                                <small>Código postal</small>
                                <input type="" name="post_code" value="<?= $is_addrress['post_code'] ?? '' ?>">
                            </div>
                            <div>
                                <small>Nome</small>
                                <input type="text" name="name" value="<?= $is_addrress['name'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Endereço</small>
                                <input type="text" name="address" value="<?= $is_addrress['address'] ?? '' ?>">
                            </div>
                            <div>
                                <small>Número</small>
                                <input type="" name="number" value="<?= $is_addrress['number'] ?? '' ?>">
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Complemento</small>
                                <input type="" name="complement" value="<?= $is_addrress['complement'] ?? '' ?>">
                            </div>
                            <div>
                                <small>Distrito</small>
                                <input type="" name="city" value="<?= $is_addrress['city'] ?? '' ?>">
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
                        <input type="text" id="js-coupon" value="<?= $metas['COUPON'] ?? '' ?>">
                    </div>
                    <div>
                        <small> </small>
                        <a href="javascript:void(globalThis.cart.apply_coupon('js-coupon'))" class="btn-morada-finalizar">Aplicar Cupom</a>
                    </div>
                </div>
                <div class="space"></div>
                <div>
                    <small>Instruções para entrega</small>
                    <textarea name="obs" rows="7"><?= $metas['OS_OBS'] ?? '' ?></textarea>

                </div>
            </div>
            <div>
                <div class="itens-detalhes" id="js-end-list-iten">
                    <?php foreach( $cart["prods"] as $prod ) : ?>
                        <div>
                            <span class="btn-more btn-remove" onclick="globalThis.cart.remove('<?= $prod['id'] ?>')">X</span>
                            <span><?= $prod["name"] ?></span>
                            <span class="btn-more" onclick="globalThis.cart.minus('<?= $prod['id'] ?>', 'js-end-quant-<?= $prod['id'] ?>')">-</span>
                            <b class="quantity-more" id="js-end-quant-<?= $prod['id'] ?>"><?= $prod["quantity"] ?></b>
                            <span class="btn-more" onclick="globalThis.cart.plus('<?= $prod['id'] ?>', 'js-end-quant-<?= $prod['id'] ?>')">+</span>
                            <span>&euro;<span><?= $prod["price_html"] ?></span></span>
                            <b>&euro;<span><?= $prod["sub_total_html"] ?></span></b>
                        </div>
                    <?php endforeach; ?>                   
                </div>
                <div class="space"></div>
                <div class="sub_totais">
                    <div>
                        <span>Sub total</span>
                        <span>&euro;<span id="js-end-total-html"><?= $cart["total_html"] ?></span></span>
                    </div>
                    <div>
                        <span>Frete</span> 
                        <span>&euro;<span id="js-end-fee-frete-html"><?= $cart['meta']['FEE_FRETE_HTML'] ?></span></span>
                    </div>
                    <div>
                        <span>Cupon</span>
                        <span>&euro;<span id="js-end-coupon-html"><?= $cart['fee']['coupon_html'] ?? '0,00' ?></span></span>
                    </div>
                    <div>
                        <span>Total</span>
                        <span>&euro;<span id="js-end-total-fee-html"><?= $cart["total_fee_html"] ?></span></span>
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
                        <input type="radio" <?= $pay_type == 'money' ? 'checked' : '' ?> name="type_payment"  mix-box hidden id="money" value="money">
                        <div>
                            <small>Valor para facilitar troco</small>
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mult_bank" <?= $pay_type == 'mbway_create' ? 'checked' : '' ?> value="mbway_create">
                        <div>                        
                            <small>PAGAMENTO DE SERVIÇOS NO MULTIBANCO</small>
                        </div>
                    </div>                    
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mb_way" <?= $pay_type == 'multibanco_create' ? 'checked' : '' ?> value="multibanco_create">
                        <div>
                            <small>NÚMERO DE TELEFONE REGISTADO NO MBWAY</small>
                        </div>
                    </div>
                    <input type="text" name="paymento_value" value="<?= $metas['PAY_VALUE'] ?? '' ?>">
                </div>
                <div class="space"></div>
                <input type="submit" class="btn-finalizar" value="Finalizar">
            </div>
        </div>
    </form>
</div>
<div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>