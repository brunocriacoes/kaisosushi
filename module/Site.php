<?php
class Site
{
    function run()
    {
        if ($_SERVER['REQUEST_SCHEME'] == "http" && $_SERVER["HTTP_HOST"] != 'dev.kaisosushi.con' ) {
            header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
            exit();
        }
        add_router( '/', function() {}, __DIR__ . "/../view/site/index.php"  );
        add_router( '/menu/:slug_cat', function() {}, __DIR__ . "/../view/site/menu.php"  );
        add_router( '/produto/:slug_prod', function() {}, __DIR__ . "/../view/site/produto.php"  );
        add_router( '/me-registrar', 'me_registar', __DIR__ . "/../view/site/me-registrar.php"  );
        add_router( '/json/finalizar', 'json_finalizar' );
        add_router( '/finalizar', 'finalizar', __DIR__ . "/../view/site/finalizar.php"  );
        add_router( '/perfil', 'client_perfil', __DIR__ . "/../view/site/perfil.php"  );
        add_router( '/termos-e-consicoes', function() {}, __DIR__ . "/../view/site/termo.php"  );
        add_router( '/politica-de-privacidade', function() {}, __DIR__ . "/../view/site/page-politica.php"  );
        add_router( '/acerca-kaiso', function() {}, __DIR__ . "/../view/site/page-acerca.php"  );
        add_router( '/alergenios', function() {}, __DIR__ . "/../view/site/page-alergenios.php"  );
        add_router( '/login', 'client_login', __DIR__ . "/../view/site/login.php"  );
        add_router( '/recuperar-senha', 'recuperar_senha', __DIR__ . "/../view/site/recuperar-senha.php"  );
        add_router( '/logout', 'client_logout'  );
        add_router( '/perfil/alterar-senha', 'client_alter_pass', __DIR__ . "/../view/site/alter-pass.php"  );
        add_router( '/perfil/moradas', 'client_moradas', __DIR__ . "/../view/site/moradas.php"  );
        add_router( '/perfil/pedidos', 'client_pedidos', __DIR__ . "/../view/site/pedidos.php"  );
        add_router( '/404', function() {}, __DIR__ . "/../view/site/404.php"  );
        add_router( '/api/v1/cart/postcode', 'get_address_search'  );
        add_router( '/api/v1/cart/data_address', 'set_data_address'  );
        add_router( '/postcode/render', 'render_post_code'  );
        add_router( '/api/v1/cart/matrix', 'matrix'  );
        add_router( '/eupago', 'eu_pago' );
        add_router( '/obrigado', function() {}, __DIR__ . "/../view/site/obrigado.php" );
        
        add_router( '/teste', 'calc_frete'  );
        add_router( '/webhook', function() {
            $json = json_encode( $_REQUEST );
            set_log( 'RESPONSE EUPAGO ' . $json );
            webhook();
        }  );

        add_router( '/api/v1/cart', function() {
            echo json_encode( cart_calc() );
        } );
        add_router( '/api/v1/cart/clear', 'cart_clear' );
        add_router( '/api/v1/cart/add/:prod_id/:quant', 'add_prod' );
        add_router( '/api/v1/cart/del/:prod_id', 'del_prod' );
        add_router( '/api/v1/cart/frete/method', 'set_cart_method' );
        add_router( '/api/v1/cart/frete/address', 'set_cart_address' );
        add_router( '/api/v1/cart/coupon/:code', 'set_coupon' );
        
    }
}