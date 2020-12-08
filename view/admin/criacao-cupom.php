<?php include __DIR__ . "/header.php" ?>
    <div class="corpo">
        <h4>Criação de Cupom</h4>
        <form action="" method="POST" class="criacao-cupom-lista bef">
            <div>
                <label class="yo" for="code">Código #</label>
                <input type="text" name="code" id="code" value="<?= $_REQUEST["code"] ?? '' ?>">
            </div>
            <div>
                <label for="desconto-porcento">Desconto %</label>
                <input type="text" name="percentage" value="<?= $_REQUEST["percentage"] ?? '' ?>">
            </div>
            <div>
                <label for="desconto-euro">Desconto €</label>
                <input type="text" name="money" id="money" value=<?= $_REQUEST["money"] ?? '' ?>>
            </div>
            <input type="submit" value="Adicionar">
        </form>
    </div>
<?php include __DIR__ . "/footer.php" ?>