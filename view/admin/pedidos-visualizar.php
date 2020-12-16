<?php include __DIR__ . "/header.php" ?>
    <div class="corpo grid-custom mob-fix" style="--cols: 1fr 1fr">
        <div class="left">
        <?php $parametro = get_param('/admin/pedidos-visualizar/:id'); $os = cart_calc($parametro['id']); $client_id = $os["client_id"]; $client = get_client($client_id); ?>
            <h4>Alterar status</h4>
            <form action="" method="POST" class="detalhes-formularios bef grid-custom" style="--cols: 1fr 100px" >
                <select name="status" id="status" require >
                    <option value="abandoned">Abandonado</option>
                    <option value="canceled">Cancelado</option>
                    <option value="finished">Finalizado</option>
                    <option value="waiting">Aguardando</option>
                </select>
                <input type="submit" value="Atualizar">
            </form>

            <div class="space"></div>
            <h4>Detalhes do Cliente</h4>
            <div class="bef">
                <form action="" method="POST" class="detalhes-formularios grid-custom" style="--cols: 1fr 100px" action="">
                    <select name="client_id" disabled>
                        <option value="">Julio Cesar</option>
                        <option value="">Guilherme Alves</option>
                        <option value="">Frank Aguiar</option>
                    </select>
                    <input type="submit" value="Alterar" disabled>
                </form>

                <div class="space"></div>

                <div>
                    <label for="email">E-mail: </label> <span class="email">contato@kaisosushi.pt</span>
                </div>
                <div>
                    <label for="telefone">Telefone: </label><span class="telefone">(11)94777-6320</span>
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
                    <p>R. Alberto de Sousa</p>
                    <p>1600-201 R. Alberto de Sousa</p>
                </div>
            </div>
        </div>
        <div>
            <h4>Detalhes do Pedido</h4>
            <div class="right bef">                
                <form action="" method="POST" class="lista-de-produtos">
                    <div class="grid-custom titulo-cinza" style="--cols: 40px 1fr 100px 70px">
                        <span></span>
                        <span>Item</span>
                        <span>Quantidade</span>
                        <span>Valor</span>
                    </div>

                    <?php foreach ($os["prods"] as $prod) : ?>
                        <div class="grid-custom" style="--cols: 40px 1fr 100px 70px">
                            <form action="" method="POST">
                                <button class="lixo" type="submit"></button>
                            </form>
                            <form action="" method="POST">
                                <section><?= $prod["name"]?></section>
                            </form>
                            <form class="pedidos-botoes-container" action="" method="POST">
                                <button class="botao-mais-menos">+</button>
                                <input type="text" name="" id="" value="<?= $prod["quantity"]?>">
                                <button class="botao-mais-menos">-</button>
                                <button class="refresh" type="submit"></button>
                            </form>
                            <section><?= $prod["price_html"]?></section>
                        </div>
                    <?php  endforeach; ?>
                </form>
                
                
                
                <div class="space"></div>
                <div class="space"></div>

                
                <br>
                <form class="detalhes-formularios grid-detalhes-formularios" action="" method="POST">
                    <div>
                        <label for="produto">Produto</label>
                        <select name="" id="produto">
                        <option value="">Sushi</option>
                        <option value="">Sashimi</option>
                        <option value="">Yakisoba</option>
                        </select>
                    </div>
                            
                    <div>
                        <label for="quantidade">Quantidade</label>
                        <input type="number" name="" id="quantidade" require>
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Adicionar">
                    </div>
                </form>
                            
                <form class="detalhes-formularios grid-detalhes-formularios" action="" method="POST">
                    <div>
                        <label for="escolha">Entrega</label>    
                        <select name="" id="escolha">
                            <option value="">Delivery</option>
                            <option value="">Retirada</option>
                        </select>
                    </div>

                    <div>   
                        <label for="frete">Frete</label>
                        <input type="text" name="frete" id="frete">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Aplicar">
                    </div>
                </form>
                
                
                <form class="detalhes-formularios grid-detalhes-formularios" action="" method="POST">
                    <div>
                        <label for="">Desconto %</label>
                        <input type="number" name="" id="porcentagem">
                    </div>

                    <div>    
                        <label for="fixo">Desconto €</label>
                        <input type="number" name="" id="fixo">
                    </div>
                    <div>
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Aplicar">
                    </div>
                </form>

                
                <form class="detalhes-formularios grid-custom grid-tres" action="">
                    <div>
                        <label for="">Isira o código do cupom</label>
                        <input type="text" name="" id="cupom">
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