<?php include __DIR__ . "/header.php" ?>
<?php $client = get_details_client() ?>
<!------------ Começo do Corpo-->
        <div class="corpo">
            <h4>Detalhes do Cliente</h4>
            <div class="clientes-container bef">
                <div class="clientes-inner-grid">
                    <div class="corL grid-custom detalhes-do-cliente" style="--cols: 1fr 1fr 1fr">
                    <span>Nome<span class="mobye">:</span></span>
                    <span>E-mail<span class="mobye">:</span></span>
                    <span>Telefone<span class="mobye">:</span></span>
                    </div>
                    <div class="grid-custom detalhes-do-cliente" style="--cols: 1fr 1fr 1fr">
                    <span><?= $client["user"]["name"] ?></span>
                    <span><?= $client["user"]["email"] ?></span>
                    <span><?= $client["user"]["phone"] ?></span>
                    </div>
                </div>    
                <div class="space"></div>
                <div class="space mobye"></div>
                <div class="corL enderecos-title">
                    Endereços
                </div>

                <div class="space"></div>
                <div class="enderecos grid" style="--cols: 3">
                    <?php foreach($client["address"] as $address):  ?>
                    <div class="enderecos-card">
                        <span><b><?= $address["name"] ?></b></span>
                        <div class="space" style="height: 10px"></div>
                        <div><?= $address["name"] ?></div>
                        <div><?= $address["city"] ?></div>
                        <div><?= $address["number"] ?></div>            
                        <div><?= $address["complement"] ?></div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php include __DIR__ . "/footer.php" ?>