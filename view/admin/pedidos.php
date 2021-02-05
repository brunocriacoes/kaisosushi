<?php include __DIR__ . "/header.php" ?>

        <!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Filtre por status</h4>
            <form action="javascript:void(0)">
                <select onchange="globalThis.linkMenu( this )" name="selecPainel" id="" class="bef">
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=all">Todos</option>
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=cancelled">Cancelado</option>
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=delivery">Entrega</option>
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=waiting">Esperando</option>
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=finished">Finalizado</option>
                    <option value="http://dev.kaisosushi.con/admin/pedidos?filter=takeway">Retirada</option>
                </select>
            </form>
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
                <?php
                    $client_id = $pedido["client_id"] == 0 ? 2 : $pedido["client_id"] ; 
                    $client = get_client($client_id);
                    ?>
                    <div class="grid-custom" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                        <span><?= $pedido["id"]+1200 ?></span>
                        <span class="mobno"><?= $client["name"] ?? 'Não definido' ?></span>
                        <span><?= date("d/m/y", strtotime($pedido["date_update"])) ?></span>
                        <span class="mobno">€<?= corretorNum($pedido["total"]) ?></span>
                        <span><?= ucfirst(estadoPedido($pedido["id"]));?></span>
                        <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar/' ); ?><?= $pedido["ref"] ?>">
                            <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
<?php include __DIR__ . "/footer.php" ?>