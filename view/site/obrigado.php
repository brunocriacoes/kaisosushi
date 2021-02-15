<?php include __DIR__ . "/header.php" ?>

<div class="inner inner-produto-title" style="background-image: url('<?= dir_template('/view/site/src/bg/sobre.jpg') ?>');">
    <h1>Obrigado</h1>
</div>
<div class="inner inner-produto">
    <div class="container">
        <div class="space" style="--line:70px"></div>
        <h2>Pedido Finalizado com sucesso</h2>
        <p>Seu pedido ja esta sendo processado</p>
        <p>para acompanhar o status do seu pedido entre em seu perfil e acesse a aba pedidos</p>
        <?php if( !empty($_GET['referencia']) ): ?>
            <div class="space"></div>
            <h2>Pagamento Multíbanco</h2>
            <p>
                Na sua conta online  ou no Multíbanco, escolha 
                <b>"Pagamento de outros serviçoes"</b> e depois 
                <b>"Pagamento de serviçoes/compras"</b>.
            </p>
            <p> Entidade(Kaiso SUSHI): <?= $_GET['entidade'] ?> </p>
            <p> Referência: <?= $_GET['referencia'] ?> </p>
            <p> Montante: &euro;<?= number_format( floatval($_GET['valor']) , 2, ',', '.' ) ?> </p>
        <?php endif; ?>
        <div class="space" style="--line:70px"></div>
    </div>
</div>

<?php include __DIR__ . "/footer.php" ?>