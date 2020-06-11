<?php

/**
 * template name: atletas
 */

get_header();

query_posts(
    [
        'post_type' => ['atletas'],
        'posts_per_page' => -1,
        'orderby' => 'posicao',
        'order' => 'asc'
    ]
);
?>
<div class="container container-top">
    <section class="inicio-secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina"><?php the_title(); ?></span>
            </h1>
        </div>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-md-3">
                    <div class="card-deck">
                        <div class="card d-flex">
                            <div class="image">
                                <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top text-center']) ?>
                            </div>
                            <div class="card-footer">
                                <h5 class="card-title"><?php the_field('nome'); ?></h5>
                                <p class="card-text">
                                    <span>Nome:</span> <?php the_field('nome_completo'); ?>
                                </p>
                                <p class="card-text">
                                    <span>Peso:</span> <?php the_field('peso'); ?>kg
                                </p>
                                <p class="card-text">
                                    <span> Altura:</span> <?php the_field('altura'); ?>cm
                                </p>
                                <p class="card-text">
                                    <span>Nascimento:</span> <?php the_field('data_de_nascimento'); ?>
                                </p>
                                <p class="card-text">
                                    <span>Posição:</span> <?php the_field('posicao'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="col-md-12 row">
                <article class="texto">
                    <p class="texto-pagina">Não há atletas cadastrados</p>
                </article>
            </div>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>
<?php get_footer(); ?>