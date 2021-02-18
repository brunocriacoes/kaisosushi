<?php

$all_os = get_all_pedido();
if (!empty($_GET['filter']) && $_GET['filter'] != 'all') :
    $status = $_GET['filter'];
    $all_os = array_filter($all_os, function ($os) use ($status) {
        return $os['status'] == $status;
    });
endif;

?>
<?php include __DIR__ . "/header.php" ?>

<!------------ Começo do Corpo-->
<div class="corpo">
    <h4>Filtre por status</h4>
    <form action="javascript:void(0)">
        <select onchange="globalThis.linkMenu( this )" name="selecPainel" id="" class="bef">
            <option value="<?= dir_template('/admin/pedidos?filter=all') ?>">Todos</option>
            <?= selectCreator($_REQUEST['filter'] ?? 'all',  dir_template('/admin/pedidos?filter=')); ?>
        </select>
    </form>
    <div class="space"></div>
    <div class="space"></div>
    <h4>Pedidos</h4>
    <div class="bef lista-de-pedidos">
        <div class="grid-custom grid-pedido" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
            <span>Pedido</span>
            <span>Cliente</span>
            <span>Data</span>
            <span class="mobye">Valor</span>
            <span>Status</span>
            <span></span>
        </div>
        <?php foreach ($all_os as $pedido) : ?>
            <?php
            $client_id = $pedido["client_id"] == 0 ? 2 : $pedido["client_id"];
            $client = get_client($client_id);
            ?>
            <div class="grid-custom grid-list-pedidos" style="--cols: 1fr 1fr 1fr 1fr 1fr 30px">
                <span><?= $pedido["id"] + 1200 ?></span>
                <span class="mobno"><?= $client["name"] ?? 'Não definido' ?></span>
                <span class="mobno"><?= date("d/m/y", strtotime($pedido["date_update"])) ?></span>
                <span> <b>€<?= corretorNum($pedido["total"]) ?></b> </span>
                <span><?= ucfirst(tradutor($pedido["status"])); ?></span>
                <a class="eye" href="<?php echo dir_template('/admin/pedidos-visualizar/'); ?><?= $pedido["ref"] ?>">
                    <img src="<?php echo dir_template('/view/admin/img/eye.svg'); ?>" alt="">
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</div>
<?php include __DIR__ . "/footer.php" ?>