<?php include __DIR__ . "/header.php" ?>

<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
    <h1>ENTRAR</h1>
</div>
<div class="space"></div>
<form action="" method="POST" class="form box-login">
    <?php if (!empty(the_error())) : ?>
        <span class="alert"> Usuário ou senha está errado </span>
        <div class="space"></div>
    <?php endif; ?>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="pass" placeholder="Senha" required>
    <button type="submit" class="btn-center">Entrar</button>
</form>
<div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>