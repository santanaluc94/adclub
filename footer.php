<section class="secao-patrocinadores container">
    <div class="row titulo-site">

        <?php query_posts(array('post_type' => array('patrocinadores'))); ?>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post();
                $qtd++; ?>
        <?php endwhile;
        endif; ?>

        <?php if ($qtd == 1) : ?>
            <h1>
                <span class="titulo-pagina">Patrocinador</span>
            </h1>
        <?php elseif ($qtd >= 2) : ?>
            <h1>
                <span class="titulo-pagina">Patrocinadores</span>
            </h1>
        <?php else : ?>
            <h1>
                <span class="titulo-pagina">Sem Patrocinadores</span>
            </h1>
        <?php endif; ?>
    </div>

    <div class="row patrocinadores">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <a href="<?php the_field('site_do_patrocinador'); ?>" target="_blank" class="link-marcas">
                    <img class="img-patrocinador" src="<?php the_field('imagem_do_patrocinador'); ?>" />
                </a>
            <?php endwhile; ?>
        <?php else : ?>
            <h5>Estamos sem patrocinadores no momento.</h5>
        <?php endif; ?>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row footer-superior">
            <div class=" col-sm-4 col-md col-sm-4 col-12 col">
                <h4 class="titulo-footer">Sobre o A.D. Guarulhos</h4>
                <div class="texto-footer">
                    <p class="mb-2">
                        A Associação Desportiva Guarulhos é um clube brasileiro de futebol da cidade de
                        Guarulhos,
                        região metropolitana do estado de São Paulo. Fundado em 1º de fevereiro de 1964.
                    </p>
                </div>
                <!-- Text about company -->
            </div>
            <div class=" col-sm-4 col-md col-sm-4  col-12 col">
                <h4 class="titulo-footer">Inscreva-se</h4>
                <div class="mb-3 texto-footer">
                    <p>Para receber todas as notícias, atualizações e promoções do A.D. Guarulhos cadastre seu
                        e-mail no campo abaixo.</p>
                    <div class="input-group-append">
                        <input type="email" class="form-control" placeholder="exemplo@email.com">
                        <span class="input-group-btn">
                            <button class="btn btn-warning" type="button">Cadastrar</button>
                        </span>
                    </div>
                </div>
                <!-- Newsletter -->
            </div>
            <div class="col-sm-4 col-md col-sm-4  col-12 col">
                <h4 class="titulo-footer">Entre em Contato:</h4>
                <div class="mb-2 texto-footer">
                    <p><span>E-mail:</span> comunicacaoadguarulhos@gmail.com</p>
                </div>
                <!-- Contact -->
            </div>
        </div>

        <div class="row">
            <ul class="midias-sociais-inferior">
                <li>
                    <a href="https://www.facebook.com/" class="fa-inferior fa fa-facebook-f"></a>
                </li>
                <li>
                    <a href="https://twitter.com/" class="fa-inferior fa fa-twitter"></a>
                </li>
                <li>
                    <a href="https://www.mercadolivre.com.br/" class="fa-inferior fa fa-handshake-o"></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" class="fa-inferior fa fa-instagram"></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/" class="fa-inferior fa fa-youtube-play"></a>
                </li>
            </ul>
        </div>

        <div class="row copyright">
            <p>
                Copyright @2019 | Desenvolvido por <a href="https://www.linkedin.com/in/lucastssantana" target="_blank">Lucas Santana</a>
            </p>
        </div>
    </div>
</footer>
</body>

</html>