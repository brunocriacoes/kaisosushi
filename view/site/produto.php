<?php include __DIR__ . "/header.php" ?>

    <div class="inner inner-produto-title" style="background-image: url('<?= dir_template( '/view/site/src/bg/4.jpg' ) ?>');">
        <h1>Produto Name</h1>
    </div>
    <div class="inner inner-produto">
        <div class="container">
            <div class="space" style="--line:70px"></div>
            <div class="grid-single-prod">
                <img src="" alt="foto" id="product_image">
                <div>
                    <h4 id="product_title"></h4>
                    <span id="product_price" class="prod-price"></span>
                    <p id="product_description"></p>
                    <div class="grid-quant">
                        <img src="<?= dir_template( '/view/site/src/ico/minus.svg' ) ?>" class="prod-ico" alt="del">
                        <span class="prod-quant">1</span>
                        <img src="<?= dir_template( '/view/site/src/ico/plus.svg' ) ?>" class="prod-ico" alt="add">
                        <div>
                            <span class="btn-add-to-cart">
                                <img src="<?= dir_template( '/view/site/src/ico/cart.svg' ) ?>" alt="carrinho">
                                <span>ADICIONAR</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space" style="--line:70px"></div>
        </div>
    </div>

<?php include __DIR__ . "/footer.php" ?>