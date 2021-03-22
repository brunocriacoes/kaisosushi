<?php include __DIR__ . "/header.php" ?>
    <?php set_corruent_prod(); ?>
    <div class="inner inner-produto-title" style="background-image: url('<?= photo() ?>');">
        <h1><?= title() ?></h1>
    </div>
    <div class="inner inner-produto">
        <div class="container">
            <div class="space" style="--line:70px"></div>
            <div class="grid-single-prod">
                <img src="<?= photo() ?>" alt="foto" id="product_image">
                <div>
                    <h4 id="product_title"> <?= title() ?> </h4>
                    <span id="product_price" class="prod-price"><?= price() ?></span>
                    <p id="product_description"><?= description() ?></p>
                    <div class="grid-quant">
                        <img onclick="globalThis.cart.minus('<?= id() ?>', 'js-single-quant')" src="<?= dir_template( '/view/site/src/ico/minus.svg' ) ?>" class="prod-ico" alt="del">
                        <span class="prod-quant" id="js-single-quant">1</span>
                        <img onclick="globalThis.cart.plus('<?= id() ?>', 'js-single-quant')" src="<?= dir_template( '/view/site/src/ico/plus.svg' ) ?>" class="prod-ico" alt="add">
                        <div>
                            <span class="btn-add-to-cart" onclick="globalThis.cart.addSingle('<?= id() ?>', 'js-single-quant')">
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