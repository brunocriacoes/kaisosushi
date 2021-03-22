<?php include __DIR__ . "/header.php" ?>
    <div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
        <h1>Área do cliente</h1>
    </div>
    <div class="space"></div>
    <div class="tabs-perfil">
        <a href="<?= dir_template( '/perfil' ) ?>" >Meus Dados</a>
        <a href="<?= dir_template( '/perfil/pedidos' ) ?>">Pedidos</a>
        <a href="<?= dir_template( '/perfil/moradas' ) ?>" class="active">Morada</a>
        <a href="<?= dir_template( '/perfil/alterar-senha' ) ?>" >Alterar Senha</a>
        <a href="<?= dir_template( '/logout' ) ?>">Sair</a>
    </div>
    <div class="space"></div>
    <div class="container">
        <div class="box-max">
            <h2 class="title-pages">Minha Morada </h2>
            <?php
               $cliente_data = (object) get_client();
               $id = $cliente_data->id;
               $address = $cliente_data->address;
               $number = $cliente_data->number;
               $provincia = $cliente_data->provincia;
               $post_code = $cliente_data->post_code;
            ?>
            <div class="box-center">
                <form action="" method="POST" class="form ">
                    <input type="text" name="id" value="<?= $id ?>" hidden>                   
                    <div>
                        <small class="label--finalizar">Código postal</small>
                        <input type="" name="post_code" maxlength="8" value="<?= $post_code ?>" required>
                    </div>
                    <div>
                        <small class="label--finalizar">Endereço</small>
                        <input type="text" name="address" value="<?= $address ?>" required>
                    </div>
                    <div>
                        <small class="label--finalizar">Número</small>
                        <input type="" name="number" maxlength="12" value="<?= $number ?>" required>
                    </div>                   
                    <div>
                        <small class="label--finalizar">Distrito</small>
                        <input type="" name="provincia" value="<?= $provincia ?>" required>
                    </div>
                    <div>
                        <small> </small>
                        <button type="submit" class="btn-morada">Salvar</button>
                    </div>           
                </form> 
            </div>
        </div>        
    </div>
    <div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>