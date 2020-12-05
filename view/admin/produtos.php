<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo">
        <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
            <h4>Lista de produtos</h4>
            <a href="<?php echo dir_template( '/view/admin/editar-produto.php' ); ?>" class="add-cupom">Adicionar Produto</a>
        </div>
        <br>
        <div class="bef produtos-lista">
            <div class="corL grid-custom " style="--cols: 1fr 50px 70px">
                <span>Nome</span>
                <span>Valor</span>
                <span></span>
            </div>
            <?php foreach(get_last_product(1000) as $prods ) : ?>
            <div class="grid-custom " style="--cols: 1fr 70px 70px">
                <span><?= $prods["title"]?></span>
                <span><?= $prods["price"]?></span>                
                <div class="grid produtos-icones" style="--cols: 2">
                    <a class="pencil-bg" href="<?php echo dir_template( '/admin/editar-produto' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/pencil.svg' ); ?>" alt=""></a>
                    <a class="bin-bg" href="<?php echo dir_template( '/admin/editar-produto' ); ?>"><img src="<?php echo dir_template( '/view/admin/img/bin.svg' ); ?>" alt=""></a>
                </div>                
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include __DIR__ . "/footer.php" ?>