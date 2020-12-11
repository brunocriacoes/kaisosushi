<?php include __DIR__ . "/header.php" ?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/banner-2.jpeg') ?>');">
    <h1>Finalizar Pedido</h1>
</div>
<div class="space"></div>
<div class="container">
    <div class="grid-finalizar">
        <div>
            <h3 class="title-pages">Escolha o tipo da entrega</h3>
            <div class="grid-3">
                <div>
                    <input type="radio" name="type_send" checked mix-box hidden id="type_1" >
                    <label for="type_1" class="box-checkout-morada">
                        <h3>Delivery</h3>
                    </label>
                </div>
                <div>
                    <input type="radio" name="type_send" mix-box hidden id="type_2" >
                    <label for="type_2" class="box-checkout-morada">
                        <h3>Takeway</h3>
                    </label>
                </div>
            </div>
            <h3 class="title-pages">Escolha morada</h3>
            <div class="grid-3">
                <div>
                    <input type="radio" name="morada" mix-box hidden id="morada_1" >
                    <label for="morada_1" class="box-checkout-morada">
                        <b>Casa</b>
                        <h3>00000-000</h3>
                        <p>Rua das capivaras Nº 42 - SP</p>
                    </label>
                </div>
                <div>
                    <input type="radio" name="morada" mix-box hidden id="morada_2" >
                    <label for="morada_2" class="box-checkout-morada">
                        <b>Casa</b>
                        <h3>00000-000</h3>
                        <p>Rua das capivaras Nº 42 - SP</p>
                    </label>
                </div>
            </div>
            <a href="<?= dir_template('/perfil/moradas') ?>" class="btn-morada">Adicionar Morada</a>
            <h3 class="title-pages">Adicionar cupom</h3>
            <form class="form" action="jasvascript:void(0)">
                <input type="text">
                <button type="submit" class="btn-morada">Aplicar Cupom</button>
            </form>
            <h3 class="title-pages">Adicionar gorjeta</h3>
            <form class="form" action="jasvascript:void(0)">
                <input type="text">
                <button type="submit" class="btn-morada">+ Adicionar</button>
            </form>
            <h3 class="title-pages">Instruções para entrega</h3>
            <form action="javascript:void(0)">
                <textarea name="" rows="7"></textarea>
            </form>
        </div>   
        <div>
            <h3 class="title-pages">Detalhes</h3>
        </div>
    </div>
</div>
<div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>