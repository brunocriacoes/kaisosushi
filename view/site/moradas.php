<?php include __DIR__ . "/header.php" ?>
    <div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="tabs-perfil">
        <a href="<?= dir_template( '/perfil' ) ?>" >Meus Dados</a>
        <a href="<?= dir_template( '/perfil/pedidos' ) ?>">Pedidos</a>
        <a href="<?= dir_template( '/perfil/moradas' ) ?>" class="active">Moradas</a>
        <a href="<?= dir_template( '/perfil/alterar-senha' ) ?>" >Alterar Senha</a>
        <a href="<?= dir_template( '/logout' ) ?>">Sair</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <div class="box-max">
            <h2 class="title-pages">Minhas Moradas</h2>
            <?php foreach( get_moradas() as $morada ): ?>   
            <form action="" method="POST" class="form grid-morada">
                <input type="text" name="id" value="<?= $morada['id'] ?>" hidden>
                <input type="text" name="client_id" value="<?= $morada['client_id'] ?>" hidden>
                <div>
                    <small>Nome</small>
                    <input type="text" name="name" value="<?= $morada['name'] ?>" required>
                </div>
                <div>
                    <small>Endereço</small>
                    <input type="text" name="address" value="<?= $morada['address'] ?>" required>
                </div>
                <div>
                    <small>Número</small>
                    <input type="" name="number" value="<?= $morada['number'] ?>" required>
                </div>
                <div>
                    <small>Complemento</small>
                    <input type="" name="complement" value="<?= $morada['complement'] ?>">
                </div>
                <div>
                    <small>Distrito</small>
                    <input type="" name="city" value="<?= $morada['city'] ?>" required>
                </div>
                <div>
                    <small>Código postal</small>
                    <input type="" name="post_code" value="<?= $morada['post_code'] ?>" required>
                </div>
                <div>
                    <small> </small>
                    <button type="submit" class="btn-morada">Alterar</button>
                </div>           
            </form>
            <?php endforeach; ?>
            <div class="space" style="--line:50px"></div>
            <div class="box-add-morada">    
                <h2 class="title-pages">Adicionar Nova</h2>
                <form action="" method="POST" class="form grid-morada">
                    <input type="text" name="client_id" value="<?= $_SESSION["CLIENT"] ?>" hidden>
                    <div>
                        <small>Nome</small>
                        <input type="text" name="name" required>
                    </div>
                    <div>
                        <small>Endereço</small>
                        <input type="text" name="address" required>
                    </div>
                    <div>
                        <small>Número</small>
                        <input type="" name="number" required>
                    </div>
                    <div>
                        <small>Complemento</small>
                        <input type="" name="complement">
                    </div>
                    <div>
                        <small>Distrito</small>
                        <input type="" name="city" required>
                    </div>
                    <div>
                        <small>Código postal</small>
                        <input type="" name="post_code" required>
                    </div>
                    <div>
                        <small> </small>
                        <button type="submit" class="btn-morada">Adicionar</button>
                    </div>           
                </form>
            </div> 
        </div>        
    </div>
    <div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>