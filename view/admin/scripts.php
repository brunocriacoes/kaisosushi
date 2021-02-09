<?php include __DIR__ . "/header.php" ?>
<div class="corpo">
    <h1>Scripts</h1>
    <form action="">
    
    <label for="header">Header</label>
    <textarea name="" id="header" cols="30" rows="10">
    <?= get_header() ?>
    </textarea>

    <label for="">Inicio do body</label>
    <textarea name="" id="iniciobody" cols="30" rows="10">
    <?= get_body() ?>
    </textarea>

    <label for="">Final do Body</label>
    <textarea name="" id="" cols="30" rows="10">
    <?= get_end() ?>
    </textarea>

    <button type="submit">Salvar</button>
    </form>

</div>
<?php include __DIR__ . "/footer.php" ?>