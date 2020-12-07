<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Filtre por status</h4>
            <select name="" id="" class="bef">
                <option value="processo">Processando</option>
            </select>
            <div class="space"></div>
            <div class="space"></div>
            <h4>Pedidos</h4>
            <div class="bef lista-de-pedidos">
                <div class="grid-custom " style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                    <span>Pedido</span>
                    <span class="mobno">Cliente</span>
                    <span>Data</span>
                    <span class="mobye"></span>
                    <span class="mobno">Valor</span>
                    <span>Status</span>
                    <span></span>
                </div>
                <?php foreach( get_all_pedido() as $pedido ) : ?>
                    <div class="grid-custom" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                        <span><?= $pedido["code"] ?></span>
                        <span class="mobno"><?= $pedido["client"] ?></span>
                        <span><?= $pedido["date"] ?></span>
                        <span class="mobno"><?= $pedido["money"] ?></span>
                        <span><?= $pedido["status"] ?></span>
                        <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar' ); ?>">
                            <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<?php include __DIR__ . "/footer.php" ?>