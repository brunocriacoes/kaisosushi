<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Editar Frete</h4>
           <form class="editor-frete bef" action="" method="POST">
               <div class="corL">
               <div>
                    <label for="type">Entrega</label>
                    <select name="type"  id="type">
                        <option value="takeway">Takeway</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>
                <div>
                    <label for="localizacao">Localização</label>
                    <input type="text" name="address" value="<?= $_REQUEST["address"] ?? '' ?>" id="localizacao">
                </div>
                <div>
                    <label for="taxa">Taxa</label>
                    <input type="text" name="money" value="<?= $_REQUEST["money"] ?? '' ?>" id="money">
                </div>
                
                <input type="submit" value="Adicionar">
                </div>
           </form>
        </div>
    </div>

<?php include __DIR__ . "/footer.php" ?>