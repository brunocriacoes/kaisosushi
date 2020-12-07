<?php
class Admin
{
    function run()
    {
        #------------- INDEX -----------
        add_router( '/admin', function() {
            admin_login();
            admin_public();
        }, __DIR__ . "/../view/admin/index.php"  );
        #------------ RECUPERAÇÃO DE SENHA ----------
        add_router( '/admin/rec-senha', function() {
            admin_public();
        }, __DIR__ . "/../view/admin/rec-senha.php"  );


        #------------- PAINEL -------------
        add_router( '/admin/painel', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/painel.php"  );


        #------------ PEDIDOS -------------------
        add_router( '/admin/pedidos', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/pedidos.php"  );
        #----------- PEDIDOS VISUALIZAR ------------
        add_router( '/admin/pedidos-visualizar', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/pedidos-visualizar.php"  );


        #------------- CLIENTES -------------------
        add_router( '/admin/clientes', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/clientes.php"  );
        #------------- CLIENTES DETALHES -----------
        add_router( '/admin/clientes-detalhe', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/clientes-detalhe.php"  );


        #------------ DESTAQUES -------------------
        add_router( '/admin/destaques', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/destaques.php"  );
        #-------------- LIXEIRINHA DOS DESTAQUES
        add_router( '/admin/destaques/apagar', function() {
            admin_private();
            remover_banner();
        } );


        #------------- CUPOM ----------------------
        add_router( '/admin/cupom', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/cupom.php"  );
        #------------ CRIAÇÃO CUPOM --------------
        add_router( '/admin/criacao-cupom', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/criacao-cupom.php"  );
        add_router( '/admin/criacao-cupom/:id', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/criacao-cupom.php"  );     


        #----------- PRODUTOS ------------------
        add_router( '/admin/produtos', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/produtos.php"  );
        #---------- EDITAR PRODUTO ----------------
        add_router( '/admin/editar-produto', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-produto.php"  );        
        add_router( '/admin/editar-produto/:id', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-produto.php"  );


        #----------- FRETE ------------
        add_router( '/admin/frete', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/frete.php"  );
        #----------- EDITAR FRETE --------------
        add_router( '/admin/editar-frete', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-frete.php"  );
        add_router( '/admin/editar-frete/:id', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-frete.php"  );


        #------------- CATEGORIAS -----------
        add_router( '/admin/categorias', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/categorias.php"  );
        #------------- EDITAR CATEGORIAS --------
        add_router( '/admin/editar-categorias', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-categoria.php"  );
        add_router( '/admin/editar-categorias/:id', function() {
            admin_private();
        }, __DIR__ . "/../view/admin/editar-categoria.php"  );
        
        
        #------------- lOGOUT ------------
        add_router( '/admin/logout', function() {
            admin_logout();
        }, __DIR__ . "/../view/admin/index.php"  );
    }
}