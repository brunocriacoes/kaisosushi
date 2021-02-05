<?php include __DIR__ . "/header.php" ?>
    <div class="corpo">
        <h4>Clientes</h4>
        <div class="clientes-lista bef">
            <div class="corL grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                <span>Nome</span>
                <span class="mobno">E-mail</span>
                <span class="mobno">Telefone</span>
            </div>
            <?php foreach (get_all_client() as $client) : ?>
                <div class="grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span><?=utf8_encode( $client["name"]) ?></span>
                    <span class="mobno"><?=utf8_encode($client["email"]) ?></span>
                    <span class="mobno"><?= $client["phone"] ?></span>
                    <a href="<?= dir_template('/admin/clientes-detalhe') ?>/<?= $client["id"] ?>" class="eye"><img src="<?= dir_template('/view/admin/img/eye.svg') ?>"></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php include __DIR__ . "/footer.php" ?>