<?php include __DIR__ . "/header.php" ?>
<?php
$cart = is_cart() ? cart_calc() : [];
if ($cart['client_id'] == '0') {
    redirect('/login?error=401');
}
$valo_frete = $cart['meta']['FEE_FRETE'] ?? '0';
$valo_frete = floatval($valo_frete);
$type_send = !empty($cart["meta"]["TYPE_SEND"]) ? $cart["meta"]["TYPE_SEND"] : 'delivery';
$takeway = $type_send == 'takeway' ? 'active' : '';
$delivery = $type_send == 'delivery' ? 'active' : '';
$takeway_check = $type_send == 'takeway' ? 'checked' : '';
$delivery_check = $type_send == 'delivery' ? 'checked' : '';
$metas = get_meta(get_id_cart());
$address = !empty($cart["meta"]["ADDRESS_SEND"]) ? $cart["meta"]["ADDRESS_SEND"] : '';

$pay_type = $metas['PAY_TYPE'] ?? 'money';
$local = json_decode($metas['ADDRESS_DATA'] ?? '{}', true);
$nao_definido_zip_code = empty($local['zip_code']??'');

$cliente_data = (object) get_client();
$id = $cliente_data->id;
$address = $cliente_data->address ?? '';
$number = $cliente_data->number ?? '';
$provincia = $cliente_data->provincia ?? '';
$post_code = $cliente_data->post_code ?? '';
$distance = $cliente_data->distance ?? '';

$type_frete = 'hidden';
if(!$nao_definido_zip_code) {
    $type_frete = $valo_frete == 0   ? '' : 'hidden';
}


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
                <input hidden type="radio" id="html-delivery" checked name="frete" value="delivery">
                <input hidden type="radio" id="html-takeway" name="frete" value="takeway">
                <input hidden type="text" name="distance" class="js-f-distance" value="<?= $distance ?>">
                <div>
                    <div class="space"></div>
                    <div class="grid-2">
                        <div>
                            <small class="label--finalizar">Código postal</small>
                            <input class="js-f-post-code" type="" name="post_code" value="<?= $post_code ?>">
                        </div>
                        <div>
                            <small class="label--finalizar">Provincia</small>
                            <input class="js-f-provincia" type="text" name="provincia" value="<?= $provincia ?>">
                        </div>                       
                    </div>
                    <div class="grid-2">
                        <div>
                            <small class="label--finalizar">Endereço</small>
                            <input class="js-f-address" onblur="globalThis.cart.address_blur( this )" type="text" name="address" value="<?= $address ?>">
                        </div>
                        <div>
                            <small class="label--finalizar">Número</small>
                            <input type="text" name="number" value="<?= $number ?>">
                        </div>
                    </div>                   
                </div>
                <span class="alert--delivery" <?= $type_frete ?>>
                    A opção de <b>Delivery</b> esta desabilitada para você, Entregamos até <?= get_max_km() ?>km de distância.
                </span>
                <p class="to-takeway" <?= $type_frete ?>> <b>Retirada</b> Rua Carlos Reis, 43 - Lisboa / <b>1600-032</b> </p>
                <div class="space"></div>
                <div class="grid-cupom">
                    <div>
                        <small class="label--finalizar">Codigo do cupom</small>
                        <input type="text" id="js-coupon" value="<?= $metas['COUPON'] ?? '' ?>">
                    </div>
                    <div>
                        <small> </small>
                        <a href="javascript:void(globalThis.cart.apply_coupon('js-coupon'))" class="btn-morada-finalizar">Aplicar Cupom</a>
                    </div>
                </div>
                <div class="space"></div>
                <div>
                    <!-- <small>Instruções para entrega</small> -->
                    <textarea name="obs" rows="4" hidden><?= $metas['OS_OBS'] ?? '' ?></textarea>
                </div>
            </div>
            <div>
                <div class="itens-detalhes" id="js-end-list-iten">
                    <?php foreach ($cart["prods"] as $prod) : ?>
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
                        <span>-&euro;<span id="js-end-coupon-html"><?= $cart['fee']['coupon_html'] ?? '0,00' ?></span></span>
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
                        <input type="radio" <?= $pay_type == 'money' ? 'checked' : '' ?> name="type_payment" mix-box hidden id="money" value="money">
                        <div>
                            <small>Valor para facilitar troco</small>
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mb_way" <?= $pay_type == 'mbway_create' ? 'checked' : '' ?> value="mbway_create">
                        <div>
                            <small>NÚMERO DE TELEFONE REGISTADO NO MBWAY</small>
                            <span class="obs_pay">DIGITE O NÚMERO DO TELEMÓVEL SEM ESPAÇO E SEM O CÓDIGO DE PORTUGAL +351</span>
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mult_bank" <?= $pay_type == 'multibanco_create' ? 'checked' : '' ?> value="multibanco_create">
                        <div>
                            <small>PAGAMENTO DE SERVIÇOS NO MULTIBANCO</small>
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