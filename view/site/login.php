<?php include __DIR__ . "/header.php" ?>

    <div class="inner inner-title" style="background-image: url('<?= dir_template( '/view/site/src/bg/login.jpg' ) ?>');">
        <h1>ENTRAR</h1>
    </div>
    <div class="space"></div>
    <form action="./perfil.html" class="form box-login">
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Senha" required>
        <button type="submit" class="btn-center">Entrar</button>
    </form>
    <div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>