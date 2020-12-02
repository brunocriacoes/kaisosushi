<?php include __DIR__ . "/header.php" ?>

        <!------------ Começo do Corpo-->
        <div class="corpo">
            <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
                <h4>Categorias</h4>
                <a class="add-cupom" href="<?php echo dir_template( '/view/admin/editar-categoria.php' ); ?>">Adicionar Categoria</a>
            </div>
            <div class="space"></div>
            <div class="bef produtos-lista">
                <div class="corL grid-custom" style="--cols:1fr 1fr 40px">
                    <span>Categorias</span>
                    <span>Produtos</span>
                    <span></span>
                </div>
                <div class="grid-custom" style="--cols:1fr 1fr 40px">
                    <span>Categoria A</span>
                    <span>Produtos</span>
                    <a class="eye" href="<?php echo dir_template( '/view/admin/editar-categoria.php' ); ?>"><img class="ico" src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt=""></a>
                </div>
                <div class="grid-custom" style="--cols:1fr 1fr 40px">
                    <span>Categoria B</span>
                    <span>Produtos</span>
                    <a class="eye" href="<?php echo dir_template( '/view/admin/editar-categoria.php' ); ?>"><img class="ico" src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>