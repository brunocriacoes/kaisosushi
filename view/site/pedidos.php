<?php include __DIR__ . "/header.php" ?>
    <div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="tabs-perfil">
        <a href="<?= dir_template( '/perfil' ) ?>" >Meus Dados</a>
        <a href="<?= dir_template( '/perfil/pedidos' ) ?>" class="active">Pedidos</a>
        <a href="<?= dir_template( '/perfil/moradas' ) ?>" >Moradas</a>
        <a href="<?= dir_template( '/perfil/alterar-senha' ) ?>" >Alterar Senha</a>
        <a href="<?= dir_template( '/logout' ) ?>">Sair</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <h2 class="title-pages">Pedidos</h2>
        <div class="zebrado-os">
            <?php foreach( get_may_os() as $os ): ?>
                <?php
                    $meta = get_meta($os["id"]); 
                    $meta_by_ref = get_meta($os["ref"]); 
                    $address = json_decode( $meta_by_ref['ADDRESS_DATA'] ?? '{}', true );
                    $meta_by_ref["PAY_TYPE"] = $meta_by_ref["PAY_TYPE"] ?? 'money';
                ?>
                <div class="grid-os text-white">
                    <div>
                        <small>Numero</small>
                        <b><?= $os["id"] + 1200 ?></b>
                    </div>
                    <div>
                        <small>Total</small>
                        <b><?= $os["total"] ?? '' ?></b>
                    </div>
                    <div class="hidden-md">
                        <small>Entrega</small>
                        <b><?= $meta["TYPE_SEND"] ?? '' ?></b>
                    </div>
                    <div class="hidden-md">
                        <small>Endereço </small>
                        <b>
                            <?= $address["logadouro"] ?? '' ?> - 
                            <?= $address["number"] ?? '' ?> - 
                            <?= $address["cyte"] ?? '' ?> -
                            <?= $address["zip_code"] ?? '' ?>
                        </b>
                    </div>
                    <div class="hidden-md">
                        <small>Meio Pagamento </small>
                        <b><?=  __(  $meta_by_ref["PAY_TYPE"] ) ?? ''  ?></b>
                    </div>
                    <div>
                        <small>Status</small>
                        <b><?=  __( $os["status"] ?? '' ) ?? ''  ?></b>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>