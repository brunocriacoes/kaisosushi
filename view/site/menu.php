<?php include __DIR__ . "/header.php" ?>

    <div class="inner inner-header-category">
        <div>
            <div class="container">
                <div class="grid-header-category">
                    <div>
                        <b>ESCOLHA O TIPO DE ENTREGA</b>
                        <div>
                            <span>TAKE AWAY</span>
                            <span>DELIVERY</span>
                        </div>
                    </div>
                    <div>
                        <b>DATA</b>
                        <span>HOJE</span>
                    </div>
                    <div class="grid-header-local">
                        <img src="./src/ico/map.svg" alt="map">
                        <span>José Mauro de Vasconcelos,8</span>
                    </div>
                    <span class="btn-alter">ALTERAR</span>
                </div>
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
                           <select name="" id="">
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
                            <i> 
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