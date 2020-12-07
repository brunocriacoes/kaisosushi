<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Clientes</h4>
            <div class="clientes-lista bef">
                <div class="corL grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span>Nome</span>
                    <span class="mobno">E-mail</span>
                    <span class="mobno">Telefone</span>
                </div>
                <?php foreach( get_all_client() as $client ) : ?>
                <div class="grid-custom" style="--cols: 1fr 1fr 1fr 70px">
                    <span><?= $client["name"] ?></span>
                    <span class="mobno"><?= $client["email"] ?></span>
                    <span class="mobno"><?= $client["phone"] ?></span>
                    <a href="<?php echo dir_template( '/admin/clientes-detalhe' ); ?>" class="eye"><img src="<?php echo dir_template( '/view/admin/img/eye.svg' ); ?>" alt=""></a>
                </div>
                <?php endforeach ?>
            </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>