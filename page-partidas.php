<?php

/**
 * template name: partidas
 */
get_header();

query_posts([
    'post_type' => ['partidas'],
    'posts_per_page' => -1
]);

get_header(); ?>

?>
<div class="container d-flex">
    <div class="conteudo-flex col-md-9 col-sm-12">
        <section class="inicio-secao">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php the_title(); ?></span>
                </h1>
            </div>
        </section>
        <section class="inicio-secao">
            <div class="col-12 colunas-secao d-flex align-items-center">
                <div id="" class="col-12">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <?php $campeonato = get_the_term_list(get_the_ID(), 'campeonatos'); ?>
                            <div class="row titulo-site">
                                <h1>
                                    <span class="titulo-pagina"><?= $campeonato ?></span>
                                </h1>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-link" style="width:100%">
                                        <div class="d-flex">
                                            <div class="placar">
                                                <img class="escudo" src="<?= get_post_meta(get_the_ID(), '')[0]; ?>" />
                                                <span class="texto-card"><?= get_post_meta(get_the_ID(), 'mandante')[0];; ?></span>
                                                <span class="texto-card-info"><?= get_post_meta(get_the_ID(), 'estadio')[0]; ?></span>
                                            </div>
                                            <div class="placar">
                                                <span class="texto-card-placar"><?= get_post_meta(get_the_ID(), '')[0]; ?> x <?= get_post_meta(get_the_ID(), '')[0]; ?></span>
                                            </div>
                                            <div class="placar">
                                                <img class="escudo" src="<?= get_post_meta(get_the_ID(), '')[0];; ?>" />
                                                <span class="texto-card"><?= get_post_meta(get_the_ID(), 'visitante')[0]; ?></span>
                                                <span class="texto-card-info"><?= get_post_meta(get_the_ID(), 'horario')[0]; ?></span>
                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else : ?>
                        Não há partidas cadastradas.
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>