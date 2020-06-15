<?php

/**
 * template name: players
 */

get_header();

query_posts(
    [
        'post_type' => ['players'],
        'posts_per_page' => -1,
        'orderby' => 'position',
        'order' => 'asc'
    ]
);
?>
<div class="container container-top">
    <div class="conteudo-flex">
        <section class="inicio-secao">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php the_title(); ?></span>
                </h1>
            </div>
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-md-3">
                            <div class="card-deck">
                                <div class="card d-flex">
                                    <div class="image">
                                        <?php the_post_thumbnail('thumbnail', ['class' => 'card-img-top text-center']) ?>
                                    </div>
                                    <div class="card-footer">
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'name')[0])) : ?>
                                            <h5 class="card-title"><?= get_post_meta(get_the_ID(), 'name')[0]; ?></h5>
                                        <?php endif; ?>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'full_name')[0])) : ?>
                                            <p class="card-text">
                                                <span>Nome:</span> <?= get_post_meta(get_the_ID(), 'full_name')[0]; ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'weight')[0])) : ?>
                                            <p class="card-text">
                                                <span>Peso:</span> <?= get_post_meta(get_the_ID(), 'weight')[0]; ?>kg
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'height')[0])) : ?>
                                            <p class="card-text">
                                                <span> Altura:</span> <?= get_post_meta(get_the_ID(), 'height')[0]; ?>cm
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'birthday')[0])) : ?>
                                            <p class="card-text">
                                                <span>Nascimento:</span> <?= format_date(get_post_meta(get_the_ID(), 'birthday')[0]); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if (!empty(get_post_meta(get_the_ID(), 'position')[0])) : ?>
                                            <p class="card-text">
                                                <span>Posição:</span> <?= get_post_meta(get_the_ID(), 'position')[0]; ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="col-md-12 row">
                        <article class="texto">
                            <p class="texto-pagina"><?= 'There is not players registered.' ?></p>
                        </article>
                    </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
        </section>
    </div>
</div>
<?php get_footer(); ?>