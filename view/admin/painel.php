<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo">
        <div class="space mobye"></div>
        <h4>Intervalor de data</h4>
        <select name="" id="" class="bef">
            <option value="">Últimos 30 dias</option>
            <option value="">Últimos 60 dias</option>
            <option value="">Últimos 90 dias</option>
        </select>
        <div class="space"></div>

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
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar' ); ?>">
                    <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                </a>
            </div>
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar' ); ?>">
                    <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                </a>
            </div>
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar' ); ?>">
                    <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                </a>
            </div>
        </div>
    </div>    
</div>

<?php include __DIR__ . "/footer.php" ?>