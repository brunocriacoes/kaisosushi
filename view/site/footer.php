   
    <a href="<?= get_whatsapp() ?>?text=Ola" target="_blank" class="link-whatsapp">
        <img src="<?= dir_template( '/view/site/src/ico/whatsapp.svg' ) ?>" height="50" alt="whatsapp">
    </a>
    <div class="inner inner-footer">
        <div class="container">
            <div class="grid-footer">
                <div>
                    <img src="<?= dir_template( '/view/site/src/image/logo.png' ) ?>" height="120" alt="">
                    <p>
                        <a href="<?= dir_template( '/acerca-kaiso' ) ?>" class="link-footer-more">
                            ACERCA KAISÕ 
                        </a>
                        <a href="<?= dir_template( '/alergenios' ) ?>" class="link-footer-more">
                            ALERGÉNIOS 
                        </a>
                        <a href="<?= dir_template( '/termos-e-consicoes' ) ?>" class="link-footer-more">
                            TERMOS E CONDIÇÕES 
                        </a>
                        <a href="<?= dir_template( '/politica-de-privacidade' ) ?>" class="link-footer-more">
                            POLÍTICA DE PRIVACIDADE 
                        </a>
                        <a href="https://www.livroreclamacoes.pt/inicio" target="_blank" class="link-footer-more">
                            LIVRO DE RECLAMAÇÕES                         
                        </a>
                        <?= get_email() ?>
                    </p>
                </div>
                <div>
                    <h3>CENTRO DE AJUDA</h3>
                    <a href="mail:<?= get_email() ?>" class="btn-to-email">
                        <img src="<?= dir_template( '/view/site/src/ico/email.svg' ) ?>" alt="">
                        Precisa de ajuda?
                    </a>
                </div>
                <div>
                    <h3>NOSSAS REDES SOCIAIS</h3>
                    <a href="<?= get_facebook() ?>"> <img class="ico-redes" src="<?= dir_template( '/view/site/src/ico/facebook.svg' ) ?>" alt=""> </a>
                    <a href="<?= get_instagram() ?>"> <img class="ico-redes" src="<?= dir_template( '/view/site/src/ico/instagram.svg' ) ?>" alt=""> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="cart">
        <div class="cart-header">
            <img src="<?= dir_template( '/view/site/src/ico/close.svg' ) ?>" height="30" alt="" class="cose-cart" > <br>
            <div class="space"></div>
            <strong>Dados da entrega</strong>
            <p>José Mauro de Vasconcelos, 8 - Pirapora do Bom Jesus</p>
            <b>Hoje</b>
        </div>
        <div class="cart-body">
            <strong class="cart-title">
                <span>Seu pedido</span>
            </strong>
            <span class="space"></span>
            <div class="grid-iten-pedido">
                <div>
                    <b>1</b>
                    <span>Missoshiro</span>
                    <b>11,60 €</b>
                    <span onclick="globalThis.add_to_cart('1')"><img src="<?= dir_template( '/view/site/src/ico/trash.svg' ) ?>" alt="remover"></span>
                </div>
                <div>
                    <b>1</b>
                    <span>Cebiche de peixe branco</span>
                    <b>13,90 €</b>
                    <span onclick="globalThis.add_to_cart('1')"><img src="<?= dir_template( '/view/site/src/ico/trash.svg' ) ?>" alt="remover"></span>
                </div>
            </div>
            <span class="space"></span>
            <strong class="cart-title">
                <span>TOTAL</span>
                <span> 25,50 €</span>
            </strong>
            <span class="space"></span>
            <a href="<?= dir_template( '/finalizar' ) ?>" class="btn-cart">Ir para pagamento</a>
        </div>
    </div>
    <script>
        <?php do_action('js_footer')?>
    </script>
    <script src="<?= dir_template( '/view/site/src/js/index.js' ) ?>" type="module"></script>
</body>
</html>