<?php include __DIR__ . "/header.php" ?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/login.jpg') ?>');">
    <h1>Registro</h1>
</div>
<div class="space"></div>
<form action="" method="POST" class="form box-login">
    <!-- <label for="to-upload-gravatar" class="gravatar gravatar-center">
        <img src="<?= dir_template('/view/site/src/image/user.png') ?>" alt="user">
        <img src="<?= dir_template('/view/site/src/ico/photo.svg') ?>" alt="photo">
    </label>
    <input type="file" id="to-upload-gravatar" hidden> -->
    <div class="space"></div>
    <?php if (!empty(the_error())) : ?>
        <span class="alert"> <?= the_error() ?> </span>
        <div class="space"></div>
    <?php endif; ?> 
    <input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" placeholder="Nome" required>
    <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" placeholder="Email" required>
    <input type="password" name="pass" value="<?= $_POST['pass'] ?? '' ?>" placeholder="Senha" required>
    <input type="password" name="confirm_pass" value="<?= $_POST['confirm_pass'] ?? '' ?>" placeholder="Confirmação de Senha" required>
    <button type="submit" class="btn-center">registrar</button>
</form>
<div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>