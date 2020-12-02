<?php include __DIR__ . "/header.php" ?>

        <!------------ Começo do Corpo-->
        <div class="corpo">
            <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
                <h4>Categorias</h4>
                <a class="add-cupom" href="<?php echo dir_template( '/admin/editar-categorias' ); ?>">Adicionar Categoria</a>
            </div>
            <div class="space"></div>
            <div class="bef produtos-lista">
                <div class="corL grid-custom" style="--cols:1fr 1fr 40px">
                    <span>Categorias</span>
                    <span></span>
                </div>
                 <?php foreach( get_all_category() as $cat ) : ?>
                    <div class="grid-custom" style="--cols:1fr 80px">
                    <span><?= $cat["title"] ?></span>
                    <div class="grid-custom produtos-icones" style="--cols: 40px 40px">
                        <a class="pencil-bg" href="<?php echo dir_template( '/admin/editar-categorias' ); ?>/<?php echo $cat["id"]??0?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                        <a class="bin-bg" href="#"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                    </div>
                    </div>     
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>