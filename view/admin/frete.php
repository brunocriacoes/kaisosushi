<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
                <h4>Regras de Frete</h4>
                <a class="add-cupom" href="<?php echo dir_template( '/admin/editar-frete' ); ?>">Adicionar novo Frete</a>
                <div style="height: 10px"></div>
            </div>
            <div class="bef produtos-lista">
                <div class="corL grid-custom grid-frete-mob" style="--cols: 1fr 1fr 50px 70px">
                    <span class="mobno">Entrega</span>
                    <span>Loc.</span>
                    <span>Taxa</span>
                    <span></span>
                </div>
                <div class="grid-custom grid-frete-mob" style="--cols: 1fr 1fr 50px 70px">
                    <span class="mobno">Delivery</span>
                    <span>Lisboa</span>
                    <span>€2,50</span>
                    <div class="grid produtos-icones" style="--cols: 2">
                        <a class="pencil-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                        <a class="bin-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                    </div>
                </div>
                <div class="grid-custom grid-frete-mob" style="--cols: 1fr 1fr 50px 70px">
                    <span class="mobno">Delivery</span>
                    <span>Sintra</span>
                    <span>€2,50</span>
                    <div class="grid produtos-icones" style="--cols: 2">
                    <a class="pencil-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                    <a class="bin-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                </div>
                </div>
                <div class="grid-custom grid-frete-mob" style="--cols: 1fr 1fr 50px 70px">
                    <span class="mobno">Delivery</span>
                    <span>Santarém</span>
                    <span>€10.35</span>
                    <div class="grid produtos-icones" style="--cols: 2">
                    <a class="pencil-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                    <a class="bin-bg" href="<?php echo dir_template( '/admin/editar-frete' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                </div>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>