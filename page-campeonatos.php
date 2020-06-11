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
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="row titulo-site">
                    <h1>
                        <span class="titulo-pagina"><?php the_title(); ?></span>
                    </h1>
                </div>
                <article class="sub-texto">

                </article>
            <?php endwhile; ?>
        <?php else : ?>
            O clube não está em campeonatos no momento.
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>
<?php get_footer(); ?>