<?php include __DIR__ . "/header.php" ?>
    <!------------ Começo do Corpo-->
    <div class="corpo grid produto-grid mob-fix" style="--cols: 2">
        <div class="produto-left">
            <h4>Nome do produto</h4>
            <div class="bef">
                <form>
                    <div>
                    <label for="nome">
                        Nome do produto
                    </label>
                    <input type="text" name="" id="nome">
                    <label for="slug">Slug</label>
                    <input type="text" name="" id="slug">       
                    </div>
                    <div class="grid" style="--cols: 2">
                        <div class="valores">
                        <label for="valor">
                            Valor
                        </label>
                        <input type="number" id="valor">
                        </div>
                        <div class="valores">
                        <label for="valor-prom">
                            Valor Promocional
                        </label>
                        <input type="number" id="valor">
                        </div>
                    </div>                        
                    <label for="desc">
                    Descrição
                    </label>
                    <div id="desc" class="container-areatexto">                
                    <textarea name="" cols="15" rows="100"></textarea>
                    </div>
                    <br>
                    <h5>Imagem de Destaque</h5>
                    <div class="imagem-destaque">
                        <img src="<?php echo dir_template( '/view/admin/img/default.png' ); ?>" alt="">
                    </div>
                    <br>
                    <h5>Imagens do produto</h5>
                    <div class="space" style="height: 10px;"></div>
                    <div class="space" style="height: 10px;"></div>
                    <div class="produto-imagens grid" style="--cols: 3">
                        <div>
                            <span class="plano-de-fundo-img">
                                <img src="<?php echo dir_template( '/view/admin/img/default.png' ); ?>" alt="" class="mini-img">
                                <label for="file">Carregar Imagem</label>
                                <input type="file" name="" id="file">
                            </span>
                        </div>
                        <div>
                            <div class="plano-de-fundo-img">
                                <img src="<?php echo dir_template( '/view/admin/img/default.png' ); ?>" alt="" class="mini-img">
                                <label for="file">Carregar Imagem</label>
                                <input type="file" name="" id="file">
                            </div>
                        </div>
                        <div>
                            <div class="plano-de-fundo-img">
                                <img src="<?php echo dir_template( '/view/admin/img/default.png' ); ?>" alt="" class="mini-img">
                                <label for="file">Carregar Imagem</label>
                                <input type="file" name="" id="file">
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" value="Salvar">
                    </div>
                </form>
            </div>

        </div>
        <div class="produto-right">
            <h4>Categorias</h4>
            <div class="bef lista-categorias">
            <?php foreach( get_all_category() as $cat ) : ?>
                    <div class="grid-custom" style="--cols:1fr 40px">
                    <span><?= $cat["title"] ?></span>
                    <input type="checkbox" name="" id="">
                    </div>     
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include __DIR__ . "/footer.php" ?>