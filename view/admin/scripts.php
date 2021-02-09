<?php include __DIR__ . "/header.php" ?>
<div class="corpo">
    <h1>Scripts</h1>
    <form method="POST" action="">
    
        <label for="header">Header</label>
        <textarea name="header" id="header" cols="30" rows="10">
        <?= get_header() ?>
        </textarea>

        <label for="">Inicio do body</label>
        <textarea name="inicioDoBody" id="iniciobody" cols="30" rows="10">
        <?= get_body() ?>
        </textarea>

        <label for="">Final do Body</label>
        <textarea name="finalDoBody" id="" cols="30" rows="10">
        <?= get_end() ?>
        </textarea>

    <button class="btn" type="submit">Salvar</button>
    </form>

</div>
<?php include __DIR__ . "/footer.php" ?>