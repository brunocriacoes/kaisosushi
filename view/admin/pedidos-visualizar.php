<?php include __DIR__ . "/header.php" ?>
    <div class="corpo grid-custom mob-fix" style="--cols: 1fr 1fr">
        <div class="left">
        <?php $parametro = get_param('/admin/pedidos-visualizar/:id'); 
        $os = cart_calc($parametro['id']); 
        $client_id = $os["client_id"] == 0 ? 2 : $os["client_id"] ; 
        $client = get_client($client_id);
        $metas = get_meta($parametro['id']);
        $pay_type = $os['meta']['PAY_TYPE'] ?? 'money';
        $address = [
            'cyte' => 'Não definido',
            'zip_code' => 'Não definido',
            'logadouro' => 'Não definido',
            'number' => 'Não definido',
        ];
        if(!empty($metas['ADDRESS_DATA'])) {
            $address = json_decode($metas['ADDRESS_DATA'], true);
        }
        ?>
        
            <h4>Alterar status</h4>
            <form action="" method="POST" class="detalhes-formularios bef grid-custom" style="--cols: 1fr 100px" >
                <select name="status" id="status" required >
                    <?= selectCreator($os['status']); ?>
                </select>
                <input type="submit" value="Atualizar">
            </form>

            <div class="space"></div>
            <h4>Detalhes do Cliente</h4>
            
            <div class="bef">
                <form action="" method="POST" class="detalhes-formularios grid-custom" style="--cols: 1fr 100px" action="">
                    <select name="client_id" disabled>
                        <option value=""><?= $client["name"] ?? "Não definido"?></option>
                    </select>
                    <input type="submit" value="Alterar" disabled>
                </form>
                <div class="space"></div>
                <div>
                    <label for="email">E-mail: </label><span><?= $client["email"] ?? "Não definido"?></span>
                </div>
                
                <div>
                    <label for="telefone">Telefone: </label><span><?= $client["phone"] ?? "Não definido"?></span>
                </div>
                <div class="space"></div>
                
                <form action="" method="POST" class="detalhes-formularios grid-custom" style="--cols: 1fr 100px" action="">
                    <select name="address" disabled>
                        <option value="">Casa</option>
                        <option value="">Trabalho</option>
                        <option value="">Casa 2</option>
                    </select>
                    <input type="submit" value="Alterar" disabled>
                </form>

                
                <div class="space"></div>
                <div>
                    <p><?= $address['cyte'] ?? "Não definido" ?>, <?= $address['zip_code'] ?? "Não definido" ?>,</p>
                    <p><?= $address['logadouro'] ?? "Não definido" ?>, <?= $address['number'] ?? "Não definido" ?></p>
                </div>
            </div>
        </div>
        <div>
            <h4>Detalhes do Pedido</h4>
            <div class="right bef">                
                <form action="" method="POST">
                    <div class="grid-custom titulo-cinza" style="--cols: 40px 1fr 100px 70px">
                        <span></span>
                        <span>Item</span>
                        <span>Quantidade</span>
                        <span>Valor</span>
                    </div>

                    <div class="lista-de-produtos">
                    <?php foreach ($os["prods"] as $prod) : ?>
                        <div class="grid-custom" style="--cols: 40px 1fr 100px 70px">
                            <form action="" method="POST">
                                <button class="lixo" type="submit"></button>
                                <input type="text" name="del" value="<?= $prod["id"]?>" hidden>
                            </form>
                            <form action="" method="POST">
                                <section><?= $prod["name"]?></section>
                            </form>
                            <form class="pedidos-botoes-container" action="" method="POST">

                                <button id="sub" class="botao-mais-menos">-</button>
                                <input type="text" name="quantity" id="input" value="<?= $prod["quantity"]?>">
                                <button id="add" class="botao-mais-menos">+</button>


                                <button class="refresh" type="submit"></button>
                                <input type="text" name="prod_id" value="<?= $prod["id"] ?>" hidden>
                            </form>
                            <section>€<?= $prod["price_html"]?></section>
                        </div>
                        <?php  endforeach; ?>
                    </div>
                </form>
                
                
                <div class="space"></div>
                <div class="space"></div>

                
                <br>
                <form class="detalhes-formularios grid-detalhes-formularios" action="" method="POST">
                    <div>
                        <label for="produto">Produto</label>
                        <select name="add_prod_id" id="produto">
                        <?php foreach (get_last_product(1000) as $prods) : ?>
                            <option value="<?= $prods["id"] ?>"><?= $prods["name"] ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                            
                    <div>
                        <label for="quantidade">Quantidade</label>
                        <input type="number" name="quant" id="quantidade" required minlength="1">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Adicionar">
                    </div>
                </form>
                            
                <form class="detalhes-formularios grid-detalhes-formularios" action="" method="POST">
                    <div>
                        <label for="escolha">Entrega</label>    
                        <select disabled name="" id="escolha">
                            <option value=""><?= ucfirst(tradutor($os['meta']['TYPE_SEND'])); ?></option>
                            <option value="">Retirada</option>
                        </select>
                    </div>
                    
                    <div>   
                        <label for="frete">Frete</label>
                        <input disabled type="text" name="frete" id="frete" value="<?= $os['meta']['FEE_FRETE_HTML'] ?? '' ?>">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input disabled type="submit" value="Aplicar">
                    </div>
                </form>                
                <form class="detalhes-formularios grid-custom grid-tres" action="" method="POST">
                    <div>
                        <label for="">Insira o código do cupom</label>
                        <input type="text" name="coupon" id="cupom" value="<?= $os['meta']['COUPON'] ?? "" ;?>">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Aplicar">
                    </div>
                </form>
                            
                <div class="space"></div>
                <div class="grid-custom" style="--cols: 1fr 70px" text-right>
                    <p>meio pagamento: </p><b><?= tradutor( $pay_type ) ?></b>
                    <p>Sub-total: </p><b>€<?= $os['prods']['0']['sub_total_html'] ?? "00,00" ?></b>
                    <p>Frete: </p><b>€<?=$os['meta']['FEE_FRETE_HTML'] ?? "00,00" ;?></b>
                    <p>Cupom <b></b>: </p><b>-&euro;<?= $os['fee']['coupon_html'] ?? "00,00" ;?></b>
                    <p>Total: </p><b>€<?= $os['total_fee_html'] ?? "00,00" ?></b>
                    
                </div>             
                
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>