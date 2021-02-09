<!DOCTYPE html>
<html lang="pt">
<head>
    <!-- 1.0.3 -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=Ka, initial-scale=1.0">
    <title><?= get_title_site() ?></title>
    <link rel="shortcut icon" href="<?= dir_template( '/view/site/src/image/ico.png' ) ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= dir_template( '/view/site/src/css/style.css?vsersion=1.0.3' ) ?>">
    <?= get_header() ?>
</head>
<body>
    <?= get_body() ?>
    <div class="load"> <img src="<?= dir_template( '/view/site/src/image/logo.png' ) ?>" alt=""> </div>
    <div class="cargar" hidden> <img src="<?= dir_template( '/view/site/src/image/loading.gif' ) ?>" alt="cargar"> </div>
    <div class="inner inner-menu">
        <div class="container">
            <div class="grid-menu">
                <div> 
                    <a href="<?= dir_template( '/' ) ?>" title="<?= get_title_site() ?>" >
                        <img src="<?= dir_template( '/view/site/src/image/logo.png' ) ?>" alt="<?= get_title_site() ?>"> 
                    </a>
                </div>
                <div class="link-menu menu"> 
                    <div> <img src="<?= dir_template( '/view/site/src/ico/menu.svg' ) ?>" alt=""> <span class="hidden-md">MENU</span> </div>
                    <div> <img src="<?= dir_template( '/view/site/src/ico/close.svg' ) ?>" alt=""> <span class="hidden-md">MENU</span> </div>                     
                </div>
                <div class="link-user user loged"> 
                    <?php if(client_is_logged()):?>
                        <?php  $client = get_client(); ?>
                        <div>
                            <a href="<?= get_fidelidade() ?>" class="hidden-md" target="_blank"> Fidelidade </a>
                            <a href="<?= $_ENV['LINK_FIDELIDADE'] ?>" target="_blank" class="hidden-log ico-user ico--discount"> <img src="<?= dir_template( '/view/site/src/ico/discount.svg' ) ?>" alt="user"> </a>                   
                            <a href="<?= dir_template( '/perfil' ) ?>" class="hidden-log ico-user"> <img src="<?= dir_template( '/view/site/src/ico/user.svg' ) ?>" alt="user"> </a>                   
                            <span class="hidden-md">Olá <b><?= $client['name'] ?></b></span> <span class="hidden-md"> | </span>
                            <a href="<?= dir_template( '/perfil' ) ?>" class="hidden-md">Perfil</a>
                        </div>
                    <?php else:?>
                        <div>
                            <a href="<?= get_fidelidade() ?>" class="hidden-md" target="_blank"> Fidelidade </a>
                            <a href="<?= $_ENV['LINK_FIDELIDADE'] ?>" target="_blank" class="hidden-log ico-user ico--discount"> <img src="<?= dir_template( '/view/site/src/ico/discount.svg' ) ?>" alt="user"> </a>                   
                            <a href="<?= dir_template( '/login' ) ?>" class="hidden-log ico-user"> <img src="<?= dir_template( '/view/site/src/ico/user.svg' ) ?>" alt="user"> </a>                   
                            <a href="<?= dir_template( '/login' ) ?>" class="hidden-md">LOGIN</a> <span class="hidden-md"> | </span>
                            <a href="<?= dir_template( '/me-registrar' ) ?>" class="hidden-md">REGISTRAR</a>
                        </div>
                    <?php endif;?>
                </div>
                <div onclick="globalThis.cart.open()" class="btn-addcart"><img src="<?= dir_template( '/view/site/src/ico/cart.svg' ) ?>" alt=""></div>                    
            </div>
        </div>
    </div>
    <div class="inner inner-pop-menu menu">
        <div class="container">
            <div class="grid-pop-menu">
                <?php foreach( get_last_product(14) as $prod ) : ?>
                    <a href="<?= $prod['link'] ?>" title="<?= $prod['title'] ?>">
                        <img src="<?= $prod['photo'] ?>" alt="<?= $prod['title'] ?>">
                        <span> <?= $prod['title'] ?> </span>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="space"></div>
            <a href="<?= dir_template( '/menu/menu' ) ?>" class="link-menu-completo"> ver menu completo </a>
        </div>
    </div>
    