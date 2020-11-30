
<?php include __DIR__ . "/header.php" ?>

    <div class="inner inner-title" style="background-image: url('<?= dir_template( '/view/site/src/bg/4.jpg' ) ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="container">
        <div class="grid-2">
            <form action="javascript:void(0)" class="form">
                <label for="to-upload-gravatar" class="gravatar gravatar-center" style="--size:100px">
                    <img src="<?= dir_template( '/view/site/src/image/user.png' ) ?>" alt="user">
                    <img src="<?= dir_template( '/view/site/src/ico/photo.svg' ) ?>" alt="photo">
                </label>
                <input type="file" id="to-upload-gravatar" hidden>
                <div class="space"></div>
                <input type="text" placeholder="Nome" required>
                <input type="text" placeholder="Sobre Nome">
                <input type="email" placeholder="Email" required>
                <input type="text" placeholder="Telemóve">
                <input type="text" placeholder="WhatsApp">
                <button type="submit" class="btn-center">Alterar</button>
            </form>
            <div>
                <div class="menu-perfil">
                    <span class="active">Minha conta</span>
                    <span>Pedidos</span>
                    <span>Moradas</span>
                    <span>Alterar Senha</span>
                </div>

            </div>
        </div>
    </div>
    <div class="space"></div>

<?php include __DIR__ . "/footer.php" ?>