<?php include __DIR__ . "/header.php" ?>
<?php 
    $cart = is_cart() ? cart_calc() : [];
    $type_send = !empty($cart["meta"]["TYPE_SEND"]) ? $cart["meta"]["TYPE_SEND"] : 'delivery';
    $takeway = $type_send == 'takeway' ? 'active' : '';
    $delivery = $type_send == 'delivery' ? 'active' : '';
    $address = !empty($cart["meta"]["ADDRESS_SEND"]) ? $cart["meta"]["ADDRESS_SEND"] : '';
?>
    <div class="inner inner-header-category">
        <div>
            <div class="container">
                <div class="space"></div>
                <div class="grid-header-category">
                    <div>
                        <b>ESCOLHA O TIPO DE ENTREGA</b>
                        <div class="space"></div>
                        <div class="tipo_entrega">
                            <span class="js-type_send <?= $takeway ?>" onclick="globalThis.cart.set_type_send('takeway', this)">TAKE AWAY</span>
                            <span class="js-type_send <?= $delivery ?>" onclick="globalThis.cart.set_type_send('delivery', this)">DELIVERY</span>
                        </div>
                    </div>
                    <div>
                        <b>DATA</b>
                        <div class="space"></div>
                        <span class="hoje">HOJE</span>
                    </div>
                    <div>
                        <b>&nbsp;</b>
                        <div class="space"></div>
                        <div class="is_delivery">
                            <img src="<?= dir_template( '/view/site/src/ico/map.svg' ) ?>" alt="map">
                            <span id="js-edite-address" contenteditable><?= $address ?></span>
                            <span onclick="globalThis.cart.edit_address_send('js-edite-address')" class="btn-alter">ALTERAR</span>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </div>
    </div>
    <div class="inner inner-produto">
        <div class="container">
            <div class="space" style="--line:70px"></div>
            <div class="grid-category">
                <div>
                   <h3>Menu</h3>
                   <div class="hidden-md">
                       <div id="list-cat" class="list-cat">
                            <?php foreach( get_all_category() as $cat ) : ?>
                                <a href="<?= $cat["link"] ?>" title="<?= $cat["title"] ?>"><?= $cat["title"] ?></a>
                            <?php endforeach; ?>
                       </div>
                   </div>
                   <div class="hidden-log">
                       <form action="javascript:void(0)" class="form">
                           <select onchange="globalThis.linkMenu( this )">
                                <?php foreach( get_all_category() as $cat ) : ?>
                                    <option value="<?= $cat["link"] ?>"><?= $cat["title"] ?></option>
                                <?php endforeach; ?>
                           </select>
                       </form>
                   </div>
                </div>
                <div id="list-prod" class="grid-destaque">
                    <?php foreach( get_product_corruent_cat() as $prod ) : ?>
                        <div>
                            <a href="<?= $prod['link'] ?>" title="<?= $prod['title'] ?>">
                                <img src="<?= $prod['photo'] ?>" alt="<?= $prod['title'] ?>">
                                <span><?= $prod['title'] ?></span>
                            </a>
                            <i onclick="globalThis.cart.add( <?= $prod['id'] ?> )"> 
                                <?= $prod['price'] ?>
                                <img src="<?= dir_template( '/view/site/src/ico/cart.svg' ) ?>" alt="<?= $prod['title'] ?>">
                            </i>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="space" style="--line:70px"></div>
        </div>
    </div>

<?php include __DIR__ . "/footer.php" ?>