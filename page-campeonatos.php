<?php

/**
 * template name: campeonatos
 */

get_header();

query_posts([
    'post_type' => ['campeonatos'],
    'posts_per_page' => -1,
    'orderby' => 'posicao',
    'order' => 'asc'
]);
?>

<div class="container container-top">
    <section class="inicio-secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina"><?php the_title() ?> <?= date('Y') ?></span>
            </h1>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php if (date('Y') === get_post_meta(get_the_ID(), 'campeonato_ano')[0]) : ?>
                    <article class="texto">
                        <div class="conteudo-campeonato">
                            <h2 class="titulo-campeonato">
                                <?php the_title() ?>
                            </h2>
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="imagem-superior img-responsive">
                                    <?php the_post_thumbnail('post_thumbnail', ['class' => 'imagem-superior img-responsive']); ?>
                                </div>
                            <?php endif; ?>
                            <div class="sobre-campeonato">
                                <?php if (the_content()) : ?>
                                    <?php the_content() ?>
                                <?php endif; ?>
                            </div>
                            <a href="<?= get_permalink() ?>">Vá para a página do campeonato.</a>
                        </div>
                    </article>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php else : ?>
            O clube não está em campeonatos no momento.
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>

<?php get_footer(); ?>