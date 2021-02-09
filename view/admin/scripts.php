<?php include __DIR__ . "/header.php" ?>
<div class="corpo">
    <h1>Scripts</h1>
    <form method="POST" action="">
        <label class="label--post">Header</label>
        <textarea class="textarea--post" name="header" rows="10"><?= get_header() ?></textarea>
        <label class="label--post">Inicio do body</label>
        <textarea class="textarea--post" name="inicioDoBody" rows="10"><?= get_body() ?></textarea>
        <label class="label--post">Final do Body</label>
        <textarea class="textarea--post" name="finalDoBody" rows="10"><?= get_end() ?></textarea>
        <button class="btn" type="submit">Salvar</button>
    </form>
</div>
<?php include __DIR__ . "/footer.php" ?>