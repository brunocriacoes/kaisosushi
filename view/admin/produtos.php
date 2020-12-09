<?php include __DIR__ . "/header.php" ?>
<div class="corpo produtos_corpo">
    <div class="titulo-cupom-grid grid-custom" style="--cols: 1fr 200px">
        <h4>Lista de produtos</h4>
        <a href="<?php echo dir_template('/admin/editar-produto'); ?>" class="add-cupom">Adicionar Produto</a>
    </div>
    <br>
    <div class="bef produtos-lista">
        <div class="corL grid-custom " style="--cols: 1fr 50px 70px">
            <span>Nome</span>
            <span>Valor</span>
            <span></span>
        </div>
        <?php foreach (get_last_product(1000) as $prods) : ?>
            <div class="grid-custom " style="--cols: 1fr 70px 70px">
                <span><?= $prods["title"] ?></span>
                <span><?= $prods["price"] ?></span>
                <div class="grid produtos-icones" style="--cols: 2">
                    <a class="pencil-bg" href="<?= dir_template('/admin/editar-produto') ?>/<?= $prods["id"] ?>"><img src="<?php echo dir_template('/view/admin/img/pencil.svg'); ?>" alt=""></a>
                    <a onclick="aviso()" ondblclick="remover(this)" class="bin-bg" data-href="<?= dir_template('/admin/produto/del') ?>/<?= $prods["id"] ?>"><img src="<?php echo dir_template('/view/admin/img/bin.svg'); ?>" alt=""></a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="alerta_rem">
            Clique novamente para remover.
    </div>
    
</div>
<?php include __DIR__ . "/footer.php" ?>