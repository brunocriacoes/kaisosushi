<?php include __DIR__ . "/header.php" ?>
<div class="corpo">
    <?php
        if (!empty($_FILES["photo"])) :
            $rand = time();
            $name = remove_accent($_FILES["photo"]["name"]);
            $name = str_replace(' ', '', $name);
            $name = strtolower($name);
            copy($_FILES["photo"]["tmp_name"], __DIR__ . "/../upload/banner/{$rand}-{$name}");
        endif;
    ?>
    <h4>Destaques</h4>
    <form action="" method="POST" enctype="multipart/form-data" class="detalhes-formularios destaques-form bef grid-custom" action="" style="--cols: 1fr 200px">
        <input type="file" name="photo" id="photo" required accept="image/png, image/jpeg">
        <input type="submit" value="Adicionar imagem">
    </form>
    <div class="space"></div>
    <h4>Imagens Cadastradas</h4>
    <div class="destaques-grid grid bef" style="--cols: 3">
        <?php foreach (get_banner() as $_banner) : ?>
            <div>
                <a href="<?= dir_template("/admin/destaques/apagar/?file={$_banner}"); ?>">
                    <img src="<?php echo dir_template('/view/admin/img/delete.svg'); ?>" class="apagar" alt="">
                </a>
                <img src="<?= $_banner ?>" alt="foto">
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>