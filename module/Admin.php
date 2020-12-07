<?php
class Admin
{
    function run()
    {
        add_router( '/admin', function() {
            admin_login();
            admin_public();
        }, __DIR__ . "/../view/admin/index.php"  );
        add_router( '/admin/logout', function() {
            admin_logout();
        }, __DIR__ . "/../view/admin/index.php"  );
        add_router( '/admin/painel', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/painel.php"  );
        add_router( '/admin/categorias', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/categorias.php"  );
        add_router( '/admin/clientes-detalhe', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/clientes-detalhe.php"  );
        add_router( '/admin/clientes', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/clientes.php"  );
        add_router( '/admin/cupom', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/cupom.php"  );
        add_router( '/admin/destaques', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/destaques.php"  );
        add_router( '/admin/editar-categorias', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-categoria.php"  );
        add_router( '/admin/editar-frete', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-frete.php"  );
        add_router( '/admin/editar-produto', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-produto.php"  );
        add_router( '/admin/pedidos-visualizar', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/pedidos-visualizar.php"  );
        add_router( '/admin/frete', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/frete.php"  );
        add_router( '/admin/pedidos', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/pedidos.php"  );
        add_router( '/admin/produtos', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/produtos.php"  );
        add_router( '/admin/produtos', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/produtos.php"  );
        add_router( '/admin/criacao-cupom', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/criacao-cupom.php"  );
        add_router( '/admin/rec-senha', function() {
            admin_public();
        }, __DIR__ . "/../view/admin/rec-senha.php"  );
        add_router( '/admin/destaques/apagar', function() {
            admin_private();
            remover_banner();
        } );
    }
}