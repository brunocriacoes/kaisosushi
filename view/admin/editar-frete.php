<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Editar Frete</h4>
           <form class="editor-frete bef" action="" method="POST">
               <div class="corL">
               <input type="text" name="type" hidden>
                <div>
                    <label for="localizacao">KM</label>
                    <input required type="text" name="address" value="<?= $_REQUEST["address"] ?? '' ?>" id="localizacao">
                </div>
                <div>
                    <label for="taxa">Taxa</label>
                    <input required type="text" name="money" value="<?= $_REQUEST["money"] ?? '' ?>" id="money">
                </div>
                
                <input type="submit" value="Adicionar">
                </div>
           </form>
        </div>
    </div>

<?php include __DIR__ . "/footer.php" ?>