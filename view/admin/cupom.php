<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px;">
                <h4>Cupom</h4>
                <a class="add-cupom" href="<?php echo dir_template( '/admin/criacao-cupom' ); ?>">Adicionar Cupom</a>
            </div>
            <div class="space"></div>
            <div class="bef cupom-lista">
                <div class="grid-custom corL" style="--cols: 1fr 1fr 1fr 70px">
                    <span>Código</span>
                    <span>Desconto %</span>
                    <span>Desconto €</span>
                    <span></span>
                </div>
                <div class="grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span>654654#</span>
                    <span>25%</span>
                    <span>€1.50</span>
                    <img class="ico-bin" src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt="">
                </div>
                <div class="grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span>654654#</span>
                    <span>25%</span>
                    <span>€1.50</span>
                    <img class="ico-bin" src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt="">
                </div>
                <div class="grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span>654654#</span>
                    <span>25%</span>
                    <span>€1.50</span>
                    <img class="ico-bin" src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt="">
                </div>
            </div>
    </div>
    <?php include __DIR__ . "/footer.php" ?>