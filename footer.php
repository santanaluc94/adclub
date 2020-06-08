<section class="secao-patrocinadores container">
    <div class="row titulo-site">
        <?php query_posts(['post_type' => ['patrocinadores']]); ?>
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
                <a href="<?php the_field('site'); ?>" target="_blank" class="link-marcas">
                    <?php the_post_thumbnail('thumbnail', ['class' => 'img-patrocinador']) ?>
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
                <h4 class="titulo-footer">Sobre o A.D. Clube</h4>
                <div class="texto-footer">
                    <p class="mb-2">
                        O A.D. Clube é um template para Wordpress que visa disponibilizar uma opção gratuita para clubes
                        que possuem baixo orçamento para investir em um site.
                    </p>
                </div>
                <!-- Text about club -->
            </div>
            <div class="col-sm-4 col-md col-sm-4 col-12 col">
                <h4 class="titulo-footer">Inscreva-se</h4>
                <div class="mb-3 texto-footer">
                    <p>Para receber todas as notícias, atualizações e promoções do <?= get_bloginfo('name') ?: 'clube' ?> cadastre seu
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
            <div class="col-sm-4 col-md col-sm-4 col-12 col">
                <h4 class="titulo-footer">Entre em Contato:</h4>
                <div class="mb-2 texto-footer">
                    <p><span>E-mail: </span>santanaluc94@gmail.com</p>
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
                Copyright @2020 | Desenvolvido por <a href="https://www.linkedin.com/in/lucastssantana" target="_blank">Lucas Santana</a>.
            </p>
        </div>
    </div>
</footer>
</body>

</html>