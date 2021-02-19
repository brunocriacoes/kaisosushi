<?php include __DIR__ . "/header.php" ?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
    <h1>RECUPERAR SENHA</h1>
</div>
<div class="space"></div>
<form action="" method="POST" class="form box-login">
    <?php if (!empty(the_error())) : ?>
        <span class="alert"> <?= the_error() ?> </span>
        <div class="space"></div>
    <?php endif; ?>
    <p class="text-white">
        Insira abaixo seu email, 
        enviaremos uma senha temporaria, 
        isso pode demorar uns minutos,
        confira tambem se o email com a senha não esta no span
    </p>
    <input type="email" name="email" placeholder="Email" required>
    <button type="submit" class="btn-center">Enviar nova senha</button>
    <a href="<?= dir_template( '/login' ) ?>" class="link--login">Entrar</a>
</form>
<div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>