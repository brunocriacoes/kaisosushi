<?php include __DIR__ . "/header.php" ?>
        <!------------ Começo do Corpo-->
        <div class="corpo grid1 mob-fix">
            <div class="left">
                <h4>Alterar status</h4>
                <form action="" method="POST" class="detalhes-formularios bef grid-custom" style="--cols: 1fr 100px" >
                    <select name="status" id="status" require >
                        <option value="entregue">Entregue</option>
                        <option value="cancelado">Cancelado</option>
                        <option value="a-caminho">À caminho</option>
                    </select>
                    <button class="">Atualizar</button>
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
                    <p>R. Alberto de Sousa</p>
                    <p>1600-201 R. Alberto de Sousa</p>
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
                    
                    <div class="grid-custom" style="--cols: 40px 1fr 100px 70px">
                    <span><img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" alt="" class="ico ico-lixeira"></span>
                    <span>item 1</span>
                        <span class="grid-custom" style="--cols: 25px 30px 20px 30px; gap: 0px; height: 20px;">
                            <button class="botao-mais-menos">-</button>
                            <input type="number">
                            <button class="botao-mais-menos">+</button>
                            <button class="detalhes-pedido-refresh-container"><img class="detalhes-pedido-refresh"src="<?php echo dir_template( '/view/admin/img/refresh.svg' ); ?>" alt=""></button>
                        </span>                    
                    <span>€53,33</span>
                    </div>
                    <div class="grid-custom" style="--cols: 40px 1fr 100px 70px">
                    <span><img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" alt="" class="ico ico-lixeira"></span>
                    <span>item 1</span>
                    <span class="grid-custom" style="--cols: 25px 30px 20px 30px; gap: 0px; height: 20px;">
                            <button class="botao-mais-menos">-</button>
                            <input type="number">
                            <button class="botao-mais-menos">+</button>
                            <button class="detalhes-pedido-refresh-container"><img class="detalhes-pedido-refresh"src="<?php echo dir_template( '/view/admin/img/refresh.svg' ); ?>" alt=""></button>
                    </span>                    
                    <span>€53,33</span>
                    </div>
                    <div class="grid-custom" style="--cols: 40px 1fr 100px 70px">
                    <span><img src="<?php echo dir_template( '/view/admin/img/delete.svg' ); ?>" alt="" class="ico ico-lixeira"></span>
                    <span>item 1</span>
                        <span class="grid-custom" style="--cols: 25px 30px 20px 30px; gap: 0px; height: 20px;">
                            <button class="botao-mais-menos">-</button>
                            <input type="number">
                            <button class="botao-mais-menos">+</button>
                            <button class="detalhes-pedido-refresh-container"><img class="detalhes-pedido-refresh"src="<?php echo dir_template( '/view/admin/img/refresh.svg' ); ?>" alt=""></button>
                        </span>                    
                    <span>€53,33</span>
                    </div>
                </form>
                
                
                <div class="space"></div>
                <div class="space"></div>

                
                <br>
                <form class="detalhes-formularios grid-detalhes-formularios" action="">
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

                
                <form class="detalhes-formularios grid-detalhes-formularios" action="">
                    <div>
                    <label for="escolha">Entrega</label>    
                        <select name="" id="escolha">
                                <option value="">Delivery</option>
                                <option value="">Retirar no Estabelescimento</option>
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
                
                
                <form class="detalhes-formularios grid-detalhes-formularios" action="">
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
                    <p>Total: </p><b>€99,99</b>
                </div>             
                
            </div>
        </div>
        </div>

    </div>
<?php include __DIR__ . "/footer.php" ?>