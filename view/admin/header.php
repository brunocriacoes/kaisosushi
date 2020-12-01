<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/maki.png' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body>
    <div class="wrapper">
        <div id="menu" onclick="show()">
            <div>
                <div class="header">
                    <img class="logo" src="<?php echo dir_template( '/view/admin/img/logo.png' ); ?>" alt="Logo-Kaiso">
                    <div>
                        <span>Olá, Leandro!</span>
                        <img class="user" src="<?php echo dir_template( '/view/admin/img/user.svg' ); ?>" alt="Perfil">
                    </div>
                </div>
                <a href="<?php echo dir_template( '/view/admin/painel.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/gauge.svg' ); ?>" alt=""><h2>Painel</h2></a>
                <a href="<?php echo dir_template( '/view/admin/pedidos.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/box.svg' ); ?>" alt=""><h2>Pedidos</h2></a>
                <a href="<?php echo dir_template( '/view/admin/clientes.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/user.svg' ); ?>" alt=""><h2>Clientes</h2></a>
                <a href="<?php echo dir_template( '/view/admin/destaques.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/shooting-stars.svg' ); ?>" alt=""><h2>Destaques</h2></a>
                <a href="<?php echo dir_template( '/view/admin/cupom.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/coupon.svg' ); ?>" alt=""><h2>Cupom</h2></a>
                <a href="<?php echo dir_template( '/view/admin/produtos.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/sushi.svg' ); ?>" alt=""><h2>Produtos</h2></a>
                <a href="<?php echo dir_template( '/view/admin/frete.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/truck.svg' ); ?>" alt=""><h2>Frete</h2></a>
                <a href="<?php echo dir_template( '/view/admin/categorias.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/list.svg' ); ?>" alt=""><h2>Categorias</h2></a>
                <a href="<?php echo dir_template( '/view/admin/index.php' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/logout.svg' ); ?>" alt=""><h2>Sair</h2></a>
            </div>
            <div class="mobMenu">
                <div>
                    <img class="menuArrows" src="<?php echo dir_template( '/view/admin/img/arrows.svg' ); ?>" alt="">
                </div>
                <div>
                    <img src="<?php echo dir_template( '/view/admin/img/logo.png' ); ?>" alt="" class="smalllogo">
                </div>
                <div>
                    <img id="close" src="<?php echo dir_template( '/view/admin/img/close.svg' ); ?>" alt="">
                </div>
            </div>
        </div>
        <!----------- End of Menu-->