<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Kaiso Admin - Painel</title>
</head>
<body>
    <!--------------- Menu ------------------->
<div class="wrapper">
    <div id="menu" onclick="show()">
        <div>
            <div class="header">
                <img class="logo" src="./img/logo.png" alt="Logo-Kaiso">
                <div>
                    <span>Olá, Leandro!</span>
                    <img class="user" src="./img/user.svg" alt="Perfil">
                </div>
            </div>
            <a class="cor" href="painel.html"><img class="mIco" src="./img/gauge.svg" alt=""><h2>Painel</h2></a>
            <a href="./pedidos.html"><img class="mIco" src="./img/box.svg" alt=""><h2>Pedidos</h2></a>
            <a href="./clientes.html"><img class="mIco" src="./img/user.svg" alt=""><h2>Clientes</h2></a>
            <a href="./destaques.html"><img class="mIco" src="./img/shooting-stars.svg" alt=""><h2>Destaques</h2></a>
            <a href="./cupom.html"><img class="mIco" src="./img/coupon.svg" alt=""><h2>Cupom</h2></a>
            <a href="./produtos.html"><img class="mIco" src="./img/sushi.svg" alt=""><h2>Produtos</h2></a>
            <a href="./frete.html"><img class="mIco" src="./img/truck.svg" alt=""><h2>Frete</h2></a>
            <a href="./categorias.html"><img class="mIco" src="./img/list.svg" alt=""><h2>Categorias</h2></a>
            <a href="./index.html"><img class="mIco" src="./img/logout.svg" alt=""><h2>Sair</h2></a>
            
        </div>
        <div class="mobMenu">
            <div>
                <img class="menuArrows" src="./img/arrows.svg" alt="">
            </div>
            <div>
                <img src="./img/logo.png" alt="" class="smalllogo">
            </div>
            <div>
                <img id="close" src="./img/close.svg" alt="">
            </div>
        </div>
    </div>
    <!----------- End of Menu-->
    <!------------ Começo do Corpo-->












    <div class="corpo">
        <div class="space mobye"></div>
        <h4>Intervalor de data</h4>
        <select name="" id="" class="bef">
            <option value="">Últimos 30 dias</option>
            <option value="">Últimos 60 dias</option>
            <option value="">Últimos 90 dias</option>
        </select>
        <div class="space"></div>

        <h4>Performance</h4>
        <div class="perfbox">
            <ul class="bef perf">
                <li class="corL">Total de vendas</li>
                <li><h3><span class="perfNum">100</span></h3></li>
            </ul>
            <ul class="bef perf vendas">
                <li>Vendas</li>
                <li><h3><span class="perfNum">€ 100,00</span></h3></li>
            </ul>
            <ul class="bef perf">
                <li class="corL">Total de encomendas</li>
                <li><h3><span class="perfNum">100</span></h3></li>
            </ul>
        </div>

        <div class="space"></div>
        <h4>Pedidos em aberto (Hoje)</h4>
        <div class="bef lista-de-pedidos">
            <div class="grid-custom grid-pedido">
                <span>Pedido</span>
                <span class="mobno">Cliente</span>
                <span>Valor</span>
                <span class="mobno">Tipo de Entrega</span>
                <span>Status</span>
                <span></span>
            </div>
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="./pedidos-visualizar.html">
                    <img src="./img/eye.svg" alt="">
                </a>
            </div>
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="./pedidos-visualizar.html">
                    <img src="./img/eye.svg" alt="">
                </a>
            </div>
            <div class="grid-custom grid-pedido">
                <span>#1001</span>
                <span class="mobno">Estevão</span>
                <span><b>€ 23,35</b></span>
                <span class="mobno">Delivery</span>
                <span>Pendente</span>
                <a class="eye" href="./pedidos-visualizar.html">
                    <img src="./img/eye.svg" alt="">
                </a>
            </div>
        </div>
    </div>










    
</div>

    <script src="script.js"></script>
</body>
</html>