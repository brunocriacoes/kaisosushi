<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo">
        <h4>Criação de Cupom</h4>
        <div class="criacao-cupom-lista bef">
            <div>
                <label class="yo" for="codigo">Código #</label>
                <input type="text" name="" id="codigo">
            </div>
            <div>
                <label for="desconto-porcento">Desconto %</label>
                <input type="number" name="" id="desconto-porcento">
            </div>
            <div>
                <label for="desconto-euro">Desconto €</label>
                <input type="number" name="" id="desconto-euro">
            </div>
                <input type="submit" value="Adicionar">
        </div>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>