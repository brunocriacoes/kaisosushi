<?php include __DIR__ . "/header.php" ?>
    <div class="corpo grid-custom mob-fix" style="--cols: 1fr 1fr">
        <div class="left">
        <?php $parametro = get_param('/admin/pedidos-visualizar/:id'); 
        $os = cart_calc($parametro['id']); 
        $client_id = $os["client_id"] == 0 ? 2 : $os["client_id"] ; 
        $client = get_client($client_id);

        $metas = get_meta($parametro['id']);
        $address = [
            'cyte' => 'Não definido',
            'zip_code' => 'Não definido',
            'logadouro' => 'Não definido',
            'number' => 'Não definido',
        ];

        if(!empty($metas['ADDRESS_DATA'])) {
            $address = json_decode($metas['ADDRESS_DATA'], true);
        }
    
        // if(empty($metas) == true) {
        //     $city = "Não informado";
        //     $zip_code = "Não informado";
        //     $address = "Não informado";
        //     $number = "Não informado";
        // }
        // else {
        //     $city = $metas['cyte'];
        //     $zip_code = $metas['zip_code'];
        //     $address = $metas['logadouro'];
        //     $number = $metas['number'];
        // }
        
        
        ?>
            <h4>Alterar status</h4>
            <form action="" method="POST" class="detalhes-formularios bef grid-custom" style="--cols: 1fr 100px" >
                <select name="status" id="status" required >
                    <option value="abandoned">Abandonado</option>
                    <option <?= "selected"?> value="canceled">Cancelado</option>
                    <option value="finished">Pago</option>
                    <option value="waiting">Esperando pagamento</option>
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
                <?= var_dump($os['status']) ?>
                <div class="space"></div>
                <div>
                    <label for="email">E-mail: </label><?= $client["email"] ?? "Não definido"?></span>
                </div>
                <div>
                    <label for="telefone">Telefone: </label><span></span>
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
                    <p><?= $address['cyte'] ?>, <?= $address['zip_code'] ?>,</p>
                    <p><?= $address['logadouro'] ?>, <?= $address['number'] ?>.</p>
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
                            <section><?= $prod["price_html"]?></section>
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
                            <option value="<?= $prods["id"] ?>"><?= $prods["title"] ?></option>
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
                            <option value="">Delivery</option>
                            <option value="">Retirada</option>
                        </select>
                    </div>

                    <div>   
                        <label for="frete">Frete</label>
                        <input disabled type="text" name="frete" id="frete">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input disabled type="submit" value="Aplicar">
                    </div>
                </form>                
                <form class="detalhes-formularios grid-custom grid-tres" action="" method="POST">
                    <div>
                        <label for="">Isira o código do cupom</label>
                        <input type="text" name="coupon" id="cupom">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Aplicar">
                    </div>
                </form>
                            
                <div class="space"></div>

                <div class="grid-custom" style="--cols: 1fr 70px" text-right>
                    <p>Sub-total: </p><b>€53,33</b>
                    <p>Desconto: </p><b>-€1,00</b>
                    <p>Frete: </p><b>€3,00</b>
                    <p>Cupom: </p><b>-€5,00</b>
                    <p>Total: </p><b>€<?= $os['total_fee_html']?></b>
                </div>             
                
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . "/footer.php" ?>