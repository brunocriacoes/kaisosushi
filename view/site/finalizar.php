<?php include __DIR__ . "/header.php" ?>
<div class="inner inner-title" style="background-image: url('<?= dir_template('/view/site/src/bg/banner-2.jpeg') ?>');">
    <h1>Finalizar Pedido</h1>
</div>
<div class="space" style="--line:50px"></div>
<div class="container">
    <form action="" method="POST" class="form">
        <div class="grid-finalizar">
            <div>
                <div class="change_send">
                    <label for="html-delivery" class="active">Delivery</label>
                    <label for="html-takeway">Takeway</label>
                </div>
                <div class="space"></div>
                <div>
                    <input type="radio" name="type_send" checked mix-box hidden  id="html-delivery">
                    <div>
                        <div class="grid-locais">
                            <span>
                                <b>Casa</b>
                                <h3>00000-000</h3>
                                <p>Rua das capivaras Nº 42 - SP</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                            <span>
                                <b>Casa 2</b>
                                <h3>00000-000</h3>
                                <p>Rua das capivaras Nº 42 - SP</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                        </div>
                        <div class="space"></div>
                        <div class="grid-2">
                            <div>
                                <small>Código postal</small>
                                <input type="" name="post_code" value="" required>
                            </div>
                            <div>
                                <small>Nome</small>
                                <input type="text" name="name" value="" required>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Endereço</small>
                                <input type="text" name="address" value="" required>
                            </div>
                            <div>
                                <small>Número</small>
                                <input type="" name="number" value="" required>
                            </div>
                        </div>
                        <div class="grid-2">
                            <div>
                                <small>Complemento</small>
                                <input type="" name="complement" value="">
                            </div>
                            <div>
                                <small>Distrito</small>
                                <input type="" name="city" value="" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <input type="radio" name="type_send" mix-box hidden id="html-takeway">
                    <div>
                        <div class="grid-locais">
                            <span>
                                <b>Retirada</b>
                                <h3>ONDE NOS ENCONTRAR</h3>
                                <p>Rua Carlos Reis, 43</p>
                                <p>Lisboa - Portugal</p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <div class="grid-cupom">
                    <div>
                        <small>Codigo do cupom</small>
                        <input type="text" name="cupom">
                    </div>
                    <div>
                        <small> </small>
                        <button type="submit" class="btn-morada">Aplicar Cupom</button>
                    </div>
                </div>
                <div class="space"></div>
                <div>
                    <small>Instruções para entrega</small>
                    <textarea name="" rows="7"></textarea>

                </div>
            </div>
            <div>
                <div class="itens-detalhes">
                    <div>
                        <span class="btn-more btn-remove">X</span>
                        <span>Prod</span>
                        <span class="btn-more">-</span>
                        <b class="quantity-more">2</b>
                        <span class="btn-more">+</span>
                        <span>&euro;15,00</span>
                        <b>&euro;30,00</b>
                    </div>
                    <div>
                        <span class="btn-more btn-remove">X</span>
                        <span>Prod</span>
                        <span class="btn-more">-</span>
                        <b class="quantity-more">2</b>
                        <span class="btn-more">+</span>
                        <span>&euro;15,00</span>
                        <b>&euro;30,00</b>
                    </div>
                </div>
                <div class="space"></div>
                <div class="sub_totais">
                    <div>
                        <span>Sub total</span>
                        <span>&euro;30,00</span>
                    </div>
                    <div>
                        <span>Frete</span>
                        <span>&euro;5,00</span>
                    </div>
                    <div>
                        <span>Cupon</span>
                        <span>&euro;-2,00</span>
                    </div>
                    <div>
                        <span>Total</span>
                        <span>&euro;33,00</span>
                    </div>
                </div>   
                <div class="space"></div>
                <div class="box-payment">
                    <div class="payment-options">
                        <label for="money" class="active">Dinheiro</label>
                        <label for="mult_bank">Multibanco</label>
                        <label for="mb_way">MB WAY</label>
                    </div>
                    <div class="space"></div>
                    <div>
                        <input type="radio" name="type_payment" checked mix-box hidden id="money" value="money">
                        <div>
                            <small>Valor para facilitar troco</small>
                            <input type="text">
                        </div>
                    </div>
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mult_bank" value="mult_bank">
                        <div>                        
                            <small>PAGAMENTO DE SERVIÇOS NO MULTIBANCO</small>
                            <input type="text">
                        </div>
                    </div>
                    
                    <div>
                        <input type="radio" name="type_payment" mix-box hidden id="mb_way" value="mb_way">
                        <div>
                            <small>NÚMERO DE TELEFONE REGISTADO NO MBWAY</small>
                            <input type="text">
                        </div>
                    </div>
                </div>
                <div class="space"></div>
                <input type="submit" class="btn-finalizar" value="Finalizar">
            </div>
        </div>
    </form>
</div>
<div class="space"></div>
<?php include __DIR__ . "/footer.php" ?>