<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo">
        <h4>Criação de Cupom</h4>
        <form action="" method="POST" class="criacao-cupom-lista bef">
            <div>
                <label class="yo" for="code">Código #</label>
                <input type="text" name="code" id="code" value="<?= $_REQUEST["code"] ?? '' ?>">
            </div>
            <div>
                <label for="desconto-porcento">Desconto %</label>
                <input type="number" name="porcentage" id="porcentage" value="<?= $_REQUEST["porcentage"] ?? '' ?>">
            </div>
            <div>
                <label for="desconto-euro">Desconto €</label>
                <input type="number" name="money" id="money" value=<?= $_REQUEST["money"] ?? '' ?>>
            </div>
                <input type="submit" value="Adicionar">
    </form>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>