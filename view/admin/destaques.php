<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
           <h4>Destaques</h4>
           <form class="detalhes-formularios destaques-form bef grid-custom" action="" style="--cols: 1fr 200px">
               <input type="file" name="adicionar_imagem" id="escolher" accept="image/png, image/jpeg">
               <input type="submit" value="Adicionar imagem">
           </form>
           <div class="space"></div>
           <h4>Imagens Cadastradas</h4>
           <div class="destaques-grid grid bef" style="--cols: 3">
                <div>
                    <img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" class="apagar" alt="">
                    <img src="<?php echo dir_template( '/view/admin/img/sushi-destaqu.jpg' ); ?>" alt="">
                </div>
                <div>
                    <img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" class="apagar" alt="">
                    <img src="<?php echo dir_template( '/view/admin/img/sushi-destaque-bandeja.jpg' ); ?>" alt="">
                </div>
           </div>
        </div>
    </div>
    <?php include __DIR__ . "/footer.php" ?>