<?php include __DIR__ . "/header.php" ?>
    <div class="corpo">
        <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
            <h4>Regras de Frete</h4>
            <a class="add-cupom" href="<?php echo dir_template( '/admin/editar-frete' ); ?>">Adicionar novo Frete</a>
            <div style="height: 10px"></div>
        </div>
        <div class="bef produtos-lista">
            <div class="corL grid-custom grid-frete-mob" style="--cols: 1fr 1fr 80px ">
                <span>Km</span>
                <span>Taxa</span>
                <span></span>
            </div>
            <?php foreach( get_all_frete() as $frete ) : ?>
                <div class="grid-custom grid-frete-mob" style="--cols: 1fr 1fr 80px">
                    <span><?= $frete["address"] ?>km</span>
                    <span> <b>€<?= corretorNum($frete["money"]) ?></b> </span>
                    <div class="grid produtos-icones" style="--cols: 2">
                        <a class="pencil-bg" href="<?= dir_template( '/admin/editar-frete' ) ?>/<?= $frete["id"] ?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                        <a class="bin-bg" href="<?= dir_template( '/admin/frete/deletar' ) ?>/<?= $frete["id"] ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php include __DIR__ . "/footer.php" ?>