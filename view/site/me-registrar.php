<?php include __DIR__ . "/header.php" ?>



    <div class="inner inner-title" style="background-image: url('<?= dir_template( '/view/site/src/bg/1.jpg' ) ?>');">
        <h1>Registro</h1>
    </div>
    <div class="space"></div>
    <form action="<?= dir_template( '/perfil' ) ?>" class="form box-login">
        <label for="to-upload-gravatar" class="gravatar gravatar-center">
            <img src="<?= dir_template( '/view/site/src/image/user.png' ) ?>" alt="user">
            <img src="<?= dir_template( '/view/site/src/ico/photo.svg' ) ?>" alt="photo">
        </label>
        <input type="file" id="to-upload-gravatar" hidden>
        <div class="space"></div>
        <input type="text" placeholder="Nome" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Senha" required>
        <input type="password" placeholder="Confirmação de Senha" required>
        <button type="submit" class="btn-center">registrar</button>
    </form>
    <div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>