<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo">
           <h4>Destaques</h4>
           <form action="" method="POST" class="detalhes-formularios destaques-form bef grid-custom" action="" style="--cols: 1fr 200px">
               <input type="file" name="photo" id="photo" require accept="image/png, image/jpeg">
               <input type="submit" value="Adicionar imagem">
           </form>
           <div class="space"></div>
           <h4>Imagens Cadastradas</h4>
           <div class="destaques-grid grid bef" style="--cols: 3">
                <?php foreach(get_banner() as $_banner): ?>
                <div>
                    <img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" class="apagar" alt="">
                    <img src="<?= $_banner ?>" alt="">
                </div>
                <?php endforeach; ?>
           </div>
        </div>
    </div>
    <?php include __DIR__ . "/footer.php" ?>