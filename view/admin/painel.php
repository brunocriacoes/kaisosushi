<?php include __DIR__ . "/header.php" ?>
<?php
    $pedidos = get_all_pedido();
    $total = count($pedidos);
    $total_finished = array_reduce( $pedidos, function( $acc, $os ) {
        if(
            $os['status'] == "finished" || 
            $os['status'] == "preparing" ||
            $os['status'] == "en_route" ||
            $os['status'] == "delivered"
        ) {
            $acc += $os['total'];
        }
        return $acc;
    }, 0 );
    $total_finished = number_format( $total_finished, 2, ',', '.' );
    $total_encomendas = array_reduce( $pedidos, function( $acc, $os ) {
        if($os['status'] == "finished") {
            $acc += 1;
        }
        return $acc;
    }, 0 );
    $pedido_filtrado = $pedidos;
    if ( !empty($_GET['filter']) ) :
        $day = intval($_GET['filter']);
        $base_day = strtotime("-{$day} day");
        $pedido_filtrado  = array_filter( $pedido_filtrado, function( $os ) use ( $base_day ) {
            $data_publish = strtotime($os['date_register']);
            return $data_publish > $base_day;
        } );        
    endif;
?>
    <!------------ Começo do Corpo ----------->
    <div class="corpo painel">
        <div class="space mobye"></div>
        <h4>Intervalor de data</h4>
        <form action="javascript:void(0)">
        <select onchange="globalThis.linkMenu( this )" name="selecPainel" id="" class="bef alvo">
            <option value="<?php echo dir_template( '/admin/painel?filter=30' ); ?>">Últimos 30 dias</option>
            <option value="<?php echo dir_template( '/admin/painel?filter=60' ); ?>">Últimos 60 dias</option>
            <option value="<?php echo dir_template( '/admin/painel?filter=90' ); ?>">Últimos 90 dias</option>
        </select>
        <div class="space"></div>
        </form>
        <h4>Performance</h4>
        <div class="perfbox">
            <ul class="bef perf">
                <li class="corL">Total de vendas</li>
                <li><h3><span class="perfNum"><?= $total_encomendas ?></span></h3></li>
            </ul>
            <ul class="bef perf vendas">
                <li>Vendas</li>
                <li><h3><span class="perfNum">€<?= $total_finished ?></span></h3></li>
            </ul>
            <ul class="bef perf">
                <li class="corL">Total de encomendas</li>
                <li><h3><span class="perfNum"><?= $total ?></span></h3></li>
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
            <?php foreach($pedido_filtrado as $pedido ) : 
            $client_id = $pedido["client_id"] == 0 ? 2 : $pedido["client_id"] ;
            //var_dump($pedido);
                $client = get_client($client_id);
                    ?>
                    <div class="grid-custom grid-pedido" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                        <span><?= $pedido["id"]+1200 ?></span>
                        <span class="mobno"><?= $client["name"] ?? 'Não definido' ?></span>
                        <span> <b>€<?= corretorNum($pedido["total"]) ?></b> </span>
                        <span class="mobno"><?= ucfirst(estadoPedido($pedido["id"]));?></span>
                        <span><?= tradutor($pedido["status"]) ?></span>
                        <a class="eye" href="<?php echo dir_template( '/admin/pedidos-visualizar/' ); ?><?= $pedido["ref"] ?>">
                            <img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt="">
                        </a>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>    
</div>

<?php include __DIR__ . "/footer.php" ?>