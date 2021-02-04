<?php include __DIR__ . "/header.php" ?>
<?php 
    $cart = is_cart() ? cart_calc() : [];
    $type_send = !empty($cart["meta"]["TYPE_SEND"]) ? $cart["meta"]["TYPE_SEND"] : 'delivery';
    $takeway = $type_send == 'takeway' ? 'active' : '';
    $delivery = $type_send == 'delivery' ? 'active' : '';
    $address = !empty($cart["meta"]["ADDRESS_SEND"]) ? $cart["meta"]["ADDRESS_SEND"] : '';
?>

    <div class="inner inner-slider">
        <div class="inner inner-shadow inner-shadow-splide">
            <div class="container-frete">
                <h2 class="title-seach">
                    INSIRA A SUA LOCALIDADE E ESCOLHA <br>
                    O TIPO DE ENTREGA
                </h2>
                <div class="perquisa-box">
                    <div class="perquisa-title">
                        <span class="js-type_send <?= $takeway ?>" onclick="globalThis.cart.set_type_send('takeway', this)">DELIVERY</span>
                        <span class="js-type_send <?= $delivery ?>" onclick="globalThis.cart.set_type_send('delivery', this)">TAKEWAY</span>
                    </div>
                    <form  action="javascript:void(0)" method="POST" onsubmit="globalThis.cart.set_address_send('js-address-send')" class="search">
                        <input onchange="globalThis.cart.set_data_list()"  list="js-address-box" onkeyup="globalThis.cart.postcode('js-address-send', 'js-address-box')" type="search" value="<?= $address ?>" id="js-address-send" placeholder="INTRODUZA A SUA MORADA OU CÓDIGO POSTAL">
                        <button type="submit"> <img src="<?= dir_template( '/view/site/src/ico/search.svg' ) ?>" alt=""> </button>
                        <datalist id="js-address-box"></datalist>
                    </form>
                </div>
            </div>
            <div class="play"></div>
        </div>
        <a href="#go-destaque" class="go">
            <img src="<?= dir_template( '/view/site/src/ico/arrow-bottom.svg' ) ?>" width="50" alt="">
        </a>
    </div>
    <div class="inner inner-destaque" id="go-destaque">
        <div class="container">
            <div class="space" style="--line: 50px"></div>
            <h2>Nossos destaques</h2>
            <div class="space"></div>
            <div class="grid-destaque">
                <?php foreach( get_last_product(6) as $prod ) : ?>
                    <div>
                        <a href="<?= $prod['link'] ?>" title="<?= $prod['title'] ?>">
                            <img src="<?= $prod['photo'] ?>" alt="<?= $prod['title'] ?>">
                            <span><?= $prod['title'] ?></span>
                        </a>
                        <i onclick="globalThis.cart.add( <?= $prod['id'] ?> )"> 
                            <?= $prod['price'] ?>
                            <img src="./view/site/src/ico/cart.svg" alt="<?= $prod['title'] ?>">
                        </i>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="space" style="--line: 50px"></div>
        </div>
    </div>
    <div class="inner inner-about">
        <div class="inner inner-shadow">
            <div class="container">
                <div class="space"></div>
                <h2>EXCELÊNCIA</h2>
                <p>
                    SOMOS REFERÊNCIA NA CULINÁRIA JAPONESA, 
                    NOSSOS PRATOS SÃO ELABORADOS E PROJETADOS  <br>
                    PARA ENTREGAR SABOR E UMA EXPERIÊNCIA ÚNICA 
                    AOS NOSSOS CLIENTES.
                </p>
                <div class="space"></div>
            </div>
        </div>
    </div>

<?php include __DIR__ . "/footer.php" ?>