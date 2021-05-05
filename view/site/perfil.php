<?php include __DIR__ . "/header.php" ?>
    <div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="tabs-perfil">
        <a href="<?= dir_template( '/perfil' ) ?>" class="active">Meus Dados</a>
        <a href="<?= dir_template( '/perfil/pedidos' ) ?>">Pedidos</a>
        <a href="<?= dir_template( '/perfil/moradas' ) ?>">Morada</a>
        <a href="<?= dir_template( '/perfil/alterar-senha' ) ?>">Alterar Senha</a>
        <a href="<?= dir_template( '/logout' ) ?>">Sair</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <div class="box-center">
            <form action="" method="POST" class="form">
                <label for="to-upload-gravatar" class="gravatar gravatar-center" style="--size:100px">
                    <img src="<?= gravatar( $_GET['email'] ) ?>" alt="user">
                    <!-- <img src="<?= dir_template( '/view/site/src/image/user.png' ) ?>" alt="user"> -->
                    <!-- <img src="<?= dir_template( '/view/site/src/ico/photo.svg' ) ?>" alt="photo"> -->
                </label>
                <a href="https://br.gravatar.com" target="_blank" class="gravatar-link">Registre seu Gravatar</a>
                <input type="file" id="to-upload-gravatar" hidden>
                <div class="space"></div>
                <small class="label--finalizar">Nome</small>
                <input type="text" name="name" placeholder="Nome" value="<?= $_GET['name'] ?>" required>
                <small class="label--finalizar">Apelido</small>
                <input type="text" name="last_name" placeholder="Apelido" value="<?= $_GET['last_name'] ?>">
                <small class="label--finalizar">Email</small>
                <input type="email" placeholder="Email" value="<?= $_GET['email'] ?>" disabled required>
                <small class="label--finalizar">Telemóvel</small>
                <input type="text" name="phone" placeholder="Telemóvel" value="<?= $_GET['phone'] ?>">
                <small class="label--finalizar">WhatsApp</small>
                <input type="text" name="whatsapp" placeholder="WhatsApp" value="<?= $_GET['whatsapp'] ?>">
                <button type="submit" class="btn-center">Alterar</button>
            </form>
        </div>
    </div>
    <div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>