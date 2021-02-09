<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/ico.svg' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body>
    <div class="wrapper">
        <div id="menu" onclick="show()">
            <div>
                <div class="header">
                    <a href="<?php echo dir_template( '/admin' ); ?>" style="margin: 0px"><img class="logo" src="<?php echo dir_template( '/view/admin/img/logo.png' ); ?>" alt="Logo-Kaiso"></a>
                    <div>
                        <span>Olá, <?= the_name_admin() ?></span>
                        <img class="user" src="<?php echo dir_template( '/view/admin/img/user.png' ); ?>" alt="Perfil">
                    </div>
                </div>
                <a href="<?php echo dir_template( '/admin/painel' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/gauge.svg' ); ?>" alt=""><h2>Painel</h2></a>
                <a href="<?php echo dir_template( '/admin/pedidos' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/box.svg' ); ?>" alt=""><h2>Pedidos</h2></a>
                <a href="<?php echo dir_template( '/admin/clientes' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/user.svg' ); ?>" alt=""><h2>Clientes</h2></a>
                <a href="<?php echo dir_template( '/admin/destaques' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/shooting-stars.svg' ); ?>" alt=""><h2>Destaques</h2></a>
                <a href="<?php echo dir_template( '/admin/cupom' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/coupon.svg' ); ?>" alt=""><h2>Cupom</h2></a>
                <a href="<?php echo dir_template( '/admin/produtos' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/sushi.svg' ); ?>" alt=""><h2>Produtos</h2></a>
                <a href="<?php echo dir_template( '/admin/frete' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/truck.svg' ); ?>" alt=""><h2>Frete</h2></a>
                <a href="<?php echo dir_template( '/admin/categorias' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/list.svg' ); ?>" alt=""><h2>Categorias</h2></a>
                <a href="<?php echo dir_template( '/admin/scripts' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/scrip.svg' ); ?>" alt=""><h2>Scripts</h2></a>
                <a href="<?php echo dir_template( '/admin/logout' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/logout.svg' ); ?>" alt=""><h2>Sair</h2></a>
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
        <?php include __DIR__ . "/uteis.php" ?>
        <!----------- End of Menu-->