<?php include __DIR__ . "/header.php" ?>
    <div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="tabs-perfil">
        <a href="<?= dir_template( '/perfil' ) ?>" >Meus Dados</a>
        <a href="<?= dir_template( '/perfil/pedidos' ) ?>">Pedidos</a>
        <a href="<?= dir_template( '/perfil/moradas' ) ?>">Moradas</a>
        <a href="<?= dir_template( '/perfil/alterar-senha' ) ?>" class="active">Alterar Senha</a>
        <a href="<?= dir_template( '/logout' ) ?>">Sair</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <div class="box-center">
            <form action="" method="POST" class="form">
                <h2 class="title-pages">Alterar minha Senha</h2>
                <?php if (!empty(the_error())) : ?>
                    <span class="alert"> As senhas tem que ser iguais </span>
                    <div class="space"></div>
                <?php endif; ?>                       
                <small>Nova senha</small>
                <input type="password" name="pass" required>
                <small>Confirmar senha</small>
                <input type="password" name="confirm_pass" required>
                <button type="submit" class="btn-center">Alterar Senha</button>
            </form>
        </div>
    </div>
    <div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>