<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px;">
                <h4>Cupom</h4>
                <a class="add-cupom" href="<?php echo dir_template( '/admin/criacao-cupom' ); ?>">Adicionar Cupom</a>
            </div>
            <div class="space"></div>
            <div class="bef cupom-lista">
                <div class="grid-custom corL" style="--cols: 1fr 1fr  40px">
                    <span>Código</span>
                    <span>€</span>
                    <span></span>
                </div>
                
                <?php foreach( get_all_coupon() as $coupon ) : ?>
                    <div class="grid-custom" style="--cols: 1fr 1fr  40px">
                        <span><?= $coupon["code"] ?></span>
                        <span> <b>€<?= corretorNum($coupon["money"]) ?></b> </span>
                        <a class="bin-bg" href="<?= dir_template( '/admin/cupom/deletar' ) ?>/<?= $coupon["id"] ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>"></a>
                    </div>
                <?php endforeach; ?>
                
            </div>
    </div>
    <?php include __DIR__ . "/footer.php" ?>