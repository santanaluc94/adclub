<?php if ((bool) esc_attr(get_option('section_settings_sponsors'))) : ?>
    <div class="container">
        <section class="secao-patrocinadores">
            <div class="row titulo-site">
                <?php query_posts(['post_type' => ['sponsors']]); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if (has_post_thumbnail()) {
                            $qtd++;
                        } ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if ($qtd == 1) : ?>
                    <h1>
                        <span class="titulo-pagina"><?php echo __('Sponsor', 'adclube') ?></span>
                    </h1>
                <?php elseif ($qtd >= 2) : ?>
                    <h1>
                        <span class="titulo-pagina"><?php echo __('Sponsors', 'adclube') ?></span>
                    </h1>
                <?php else : ?>
                    <h1>
                        <span class="titulo-pagina"><?php echo __('No Sponsor', 'adclube') ?></span>
                    </h1>
                <?php endif; ?>
            </div>

            <div class="row patrocinadores">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <a href="<?php echo get_post_meta(get_the_ID(), 'site')[0]; ?>" target="_blank" class="link-marcas">
                            <?php the_post_thumbnail('thumbnail', ['class' => 'img-patrocinador']) ?>
                        </a>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="col-md-12 row">
                        <article class="texto">
                            <p class="texto-pagina"><?php echo __('We do not have sponsors at the moment.', 'adclube') ?></p>
                        </article>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
<?php endif; ?>

<footer>
    <div class="container">
        <div class="row footer-superior">
            <div class=" col-sm-4 col-md col-sm-4 col-12 col">
                <h4 class="titulo-footer">Sobre o A.D. Clube</h4>
                <?php if (!empty(esc_attr(get_option('section_footer_about')))) : ?>
                    <div class="texto-footer">
                        <p class="mb-2">
                            <?php echo get_option('section_footer_about') ?>
                        </p>
                    </div>
                <?php endif; ?>
                <!-- Text about club -->
            </div>
            <div class="col-sm-4 col-md col-sm-4 col-12 col">
                <h4 class="titulo-footer">Inscreva-se</h4>
                <div class="mb-3 texto-footer">
                    <p>Para receber todas as notícias, atualizações e promoções do <?php echo get_bloginfo('name') ?: 'clube' ?> cadastre seu
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
                    <?php if (!empty(esc_attr(get_option('section_footer_about')))) : ?>
                        <p><?php echo get_option('section_footer_contact') ?></p>
                    <?php endif; ?>
                </div>
                <!-- Contact -->
            </div>
        </div>

        <div class="row">
            <ul class="midias-sociais-inferior">
                <?php if (!empty(esc_attr(get_option('section_social_medias_store')))) : ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_attr(get_option('section_social_medias_store')) ?>" class="fa-inferior fa fa-shopping-cart" target="__blank"></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty(esc_attr(get_option('section_social_medias_facebook')))) : ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_attr(get_option('section_social_medias_facebook')) ?>" class="fa-inferior fa fa-facebook-f" target="__blank"></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty(esc_attr(get_option('section_social_medias_twitter')))) : ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_attr(get_option('section_social_medias_twitter')) ?>" class="fa-inferior fa fa-twitter" target="__blank"></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty(esc_attr(get_option('section_social_medias_instagram')))) : ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_attr(get_option('section_social_medias_instagram')) ?>" class="fa-inferior fa fa-instagram" target="__blank"></a>
                    </li>
                <?php endif; ?>

                <?php if (!empty(esc_attr(get_option('section_social_medias_youtube')))) : ?>
                    <li class="list-inline-item">
                        <a href="<?php echo esc_attr(get_option('section_social_medias_youtube')) ?>" class="fa-inferior fa fa-youtube-play" target="__blank"></a>
                    </li>
                <?php endif; ?>
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