<?php include __DIR__ . "/header.php" ?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
    <h1>ENTRAR</h1>
</div>
<div class="space"></div>
<form action="" method="POST" class="form box-login">
    <?php if (!empty($_REQUEST['error'])) : ?>
        <span class="alert"> Para continuar você precisa está logado </span>
        <div class="space"></div>
        <input type="text" value="1" name="goback_cart" hidden>
    <?php endif; ?>
    <?php if (!empty(the_error())) : ?>
        <span class="alert"> Usuário ou senha está errado </span>
        <div class="space"></div>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="pass" placeholder="Senha" required>
    <button type="submit" class="btn-center">Entrar</button>
    <a href="<?= dir_template( '/me-registrar' ) ?>" class="link--login">Me Registrar</a>
    <a href="<?= dir_template( '/recuperar-senha' ) ?>" class="link--login">Esqueceu sua senha ?</a>
</form>
<div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>