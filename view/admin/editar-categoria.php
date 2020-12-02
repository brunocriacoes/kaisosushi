
<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo grid produto-grid" style="--cols: 2">
        <div class="produto-left categoria-list">
            <h4>Categorias</h4>
            <div class="bef">
                <form action="" method="POST">
                    <div>
                    <label for="nome">
                        Nome da categoria
                    </label>
                    <input type="text" name="name" value="<?= $_REQUEST["nome"] ?? '' ?>" require id="nome">
                    </div>
                    <div>
                    <label for="nome">
                        Slug
                    </label>
                    <input type="text" name="slug" value="<?= $_REQUEST["slug"] ?? '' ?>" require id="nome">
                    </div>
                    <div>
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>

        </div>
        <div class="produto-right">
            <h4>Incluir Produto</h4>
            <div class="bef lista-categorias">
                <div class="grid-custom" style="--cols: 1fr 20px">
                    <span>Produtos 1</span>
                    <input type="checkbox" name="" id="">
                </div>
                <div class="grid-custom" style="--cols: 1fr 20px">
                    <span>Produtos 2</span>
                    <input type="checkbox" name="" id="">
                </div>
                <div class="grid-custom" style="--cols: 1fr 20px">
                    <span>Produtos 3</span>
                    <input type="checkbox" name="" id="">
                </div>
                <div class="grid-custom" style="--cols: 1fr 20px">
                    <span>Produtos 4</span>
                    <input type="checkbox" name="" id="">
                </div>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>