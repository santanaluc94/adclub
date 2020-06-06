<?php

/**
 * template name: elenco
 */

get_header();
?>
<div class="container d-flex">
    <div class="conteudo-flex col-md-9 col-sm-12">
        <section class="secao">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php the_title(); ?></span>
                </h1>
            </div>
            <div class="card-deck">
                <?php query_posts(array(
                    'post_type' => array('elenco',),
                    'posts_per_page' => -1,
                    'orderby' => 'posicao',
                    'order' => 'asc'
                ));
                ?>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="col-md-4">
                            <div class="card d-flex">
                                <div class="image mx-5 my-2" style="height:200px; width:150px;">
                                    <img class="card-img-top text-center" style="height:200px; width:160px;" src="<?php the_field('foto_do_atleta'); ?>">
                                </div>
                                <div class="card-footer">
                                    <h5 class="card-title"><?php the_field('nome'); ?></h5>
                                    <p class="card-text">
                                        <span>Nome:</span> <?php the_field('nome_completo'); ?>
                                    </p>
                                    <p class="card-text">
                                        <span>Peso:</span> <?php the_field('peso'); ?>kg<span> Altura:</span> <?php the_field('altura'); ?>m
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
                    <?php endwhile; ?>
                <?php else : ?>
                    Não há atletas cadastrados
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            </div>
        </section>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>