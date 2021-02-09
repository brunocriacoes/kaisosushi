<?php include __DIR__ . "/header.php" ?>
<div class="corpo grid produto-grid" style="--cols: 2">
    <div class="produto-left categoria-list">
        <h4>Categorias</h4>
        <div class="bef">
            <form action="" method="POST">
                <div>
                    <label for="nome">
                        Nome da categoria
                    </label>
                    <input required type="text" name="name" value="<?= $_REQUEST["name"] ?? '' ?>" require id="nome">
                </div>
                <div>
                    <label for="nome">
                        Slug
                    </label>
                    <input required type="text" name="slug" value="<?= $_REQUEST["slug"] ?? '' ?>" require id="nome">
                </div>
                <div>
                    <input type="submit" value="Salvar">
                </div>
            </form>
        </div>
    </div>
    <div class="produto-right">
        <h4>Incluir Produto</h4>
        <div class="bef lista-categorias <?= $GLOBALS["is_category"] ? '' : 'is_disabled' ?>">
            <?php foreach (get_last_product(1000) as $prods) : ?>                
                <div class="grid-custom" style="--cols: 1fr 20px">
                    <span><?= $prods["title"] ?></span>
                    <input type="checkbox" <?= $GLOBALS["is_category"] ? '' : 'disabled' ?>  data-set-cat="<?= $prods["id"] ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>