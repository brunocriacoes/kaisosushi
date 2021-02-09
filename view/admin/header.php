<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- 1.0.1 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="icon" href="<?php echo dir_template( '/view/admin/img/ico.svg' ); ?>">
    <link rel="stylesheet" href="<?php echo dir_template( '/view/admin/style.css?version=1.0.1' ); ?>">
    <title><?php echo get_title_site(); ?></title>
</head>
<body>
    <div class="wrapper">
        <div id="menu" onclick="show()">
            <div>
                <div class="header">
                    <a href="<?php echo dir_template( '/admin' ); ?>" style="margin: 0px"><img class="logo" src="<?php echo dir_template( '/view/admin/img/logo-site.svg' ); ?>" alt="Logo-Kaiso"></a>
                    <div>
                        <span>Olá, <?= the_name_admin() ?></span>
                        <img class="user" src="<?php echo get_gravatar_corruent_user(  ); ?>" alt="Perfil">
                    </div>
                </div>
                <a href="<?php echo dir_template( '/admin/painel' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/gauge.svg' ); ?>" >Painel</a>
                <a href="<?php echo dir_template( '/admin/clientes' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/user.svg' ); ?>" >Clientes</a>
                <a href="<?php echo dir_template( '/admin/pedidos' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/box.svg' ); ?>" >Pedidos</a>
                <a href="<?php echo dir_template( '/admin/destaques' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/shooting-stars.svg' ); ?>" >Destaques</a>
                <a href="<?php echo dir_template( '/admin/cupom' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/coupon.svg' ); ?>" >Cupom</a>
                <a href="<?php echo dir_template( '/admin/scripts' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/script.svg' ); ?>" >Scripts</a>
                <a href="<?php echo dir_template( '/admin/categorias' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/list.svg' ); ?>" >Categorias</a>
                <a href="<?php echo dir_template( '/admin/produtos' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/sushi.svg' ); ?>" >Produtos</a>
                <a href="<?php echo dir_template( '/admin/frete' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/truck.svg' ); ?>" >Frete</a>
                <a href="<?php echo dir_template( '/admin/logout' ); ?>"><img class="mIco" src="<?php echo dir_template( '/view/admin/img/logout.svg' ); ?>" >Sair</a>
            </div>
            <div class="mobMenu">
                <div>
                    <img class="menuArrows" src="<?php echo dir_template( '/view/admin/img/arrows.svg' ); ?>" alt="">
                </div>
                <div>
                    <img src="<?php echo dir_template( '/view/admin/img/logo-site.svg' ); ?>" alt="" class="smalllogo">
                </div>
                <div>
                    <img id="close" src="<?php echo dir_template( '/view/admin/img/close.svg' ); ?>" alt="">
                </div>
            </div>
        </div>
        <?php include __DIR__ . "/uteis.php" ?>
        <!----------- End of Menu-->