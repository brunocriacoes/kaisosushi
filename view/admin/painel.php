<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo">
        <div class="space mobye"></div>
        <h4>Intervalor de data</h4>
        <form action="javascript:void(0)">
        <select onchange="globalThis.linkMenu( this )" name="" id="" class="bef">
            <option value="http://dev.kaisosushi.con/admin/painel?filter=30">Últimos 30 dias</option>
            <option value="http://dev.kaisosushi.con/admin/painel?filter=60">Últimos 60 dias</option>
            <option value="http://dev.kaisosushi.con/admin/painel?filter=90">Últimos 90 dias</option>
        </select>
        <div class="space"></div>
        </form>
        <h4>Performance</h4>
        <div class="perfbox">
            <ul class="bef perf">
                <li class="corL">Total de vendas</li>
                <li><h3><span class="perfNum">100</span></h3></li>
            </ul>
            <ul class="bef perf vendas">
                <li>Vendas</li>
                <li><h3><span class="perfNum">€ 100,00</span></h3></li>
            </ul>
            <ul class="bef perf">
                <li class="corL">Total de encomendas</li>
                <li><h3><span class="perfNum">100</span></h3></li>
            </ul>
        </div>

        <div class="space"></div>
        <h4>Pedidos em aberto (Hoje)</h4>
        <div class="bef lista-de-pedidos">
            <div class="grid-custom grid-pedido">
                <span>Pedido</span>
                <span class="mobno">Cliente</span>
                <span>Valor</span>
                <span class="mobno">Tipo de Entrega</span>
                <span>Status</span>
                <span></span>
            </div>
            <?php foreach( get_all_pedido() as $pedido ) : ?>
                    <div class="grid-custom" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                        <span><?= $pedido["id"]*1200 ?></span>
                        <span class="mobno"><?= $pedido["client_id"] ?></span>
                        <span><?= $pedido["date_update"] ?></span>
                        <span class="mobno"><?= $pedido["total"] ?></span>
                        <span><?= $pedido["status"] ?></span>
                        <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar/' ); ?><?= $pedido["ref"] ?>">
                            <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>    
</div>

<?php include __DIR__ . "/footer.php" ?>