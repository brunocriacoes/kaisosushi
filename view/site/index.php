<?php include __DIR__ . "/header.php" ?>

    <div class="inner inner-slider">
        <div class="inner inner-shadow inner-shadow-splide">
            <div class="container-frete">
                <h2 class="title-seach">
                    INSIRA A SUA LOCALIDADE E ESCOLHA <br>
                    O TIPO DE ENTREGA
                </h2>
                <div class="perquisa-box">
                    <div class="perquisa-title">
                        <span class="active">DELIVERY</span>
                        <span>TAKEWAY</span>
                    </div>
                    <form action="javascript:void(0)" class="search">
                        <input type="text" placeholder="INTRODUZA A SUA MORADA OU CÓDIGO POSTAL">
                        <button type="submit"> <img src="<?= dir_template( '/view/site/src/ico/search.svg' ) ?>" alt=""> </button>
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