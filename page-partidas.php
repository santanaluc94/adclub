<?php

/**
 * template name: partidas
 */

query_posts([
    'post_type' => ['partidas'],
    'posts_per_page' => -1
]);

$campeonatos = get_terms('campeonatos');

get_header(); ?>

?>
<div class="container container-top">
    <section class="inicio-secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina"><?php the_title(); ?></span>
            </h1>
        </div>
    </section>
    <section class="secao">
        <div class="colunas-secao d-flex align-items-center">
            <div class="col-md-12">
                <?php foreach ($campeonatos as $campeonato) : ?>
                    <div class="row conteudo-partida">
                        <h2>
                            <span class="titulo-campeonato"><?= $campeonato->name ?></span>
                        </h2>
                    </div>
                    <?php if (have_posts()) : ?>
                        <div class="row">
                            <?php while (have_posts()) : the_post(); ?>


                                <div class="col-md-5 card">
                                    <div class="card-header">


                                        <div class="d-flex">
                                            <div class="placar">
                                                <img class="escudo" src="<?= bloginfo("template_directory") . '/img/adc-logo.png' ?>" />
                                                <span class="texto-card" style=><?= substr(get_post_meta(get_the_ID(), 'mandante')[0], 0, 3); ?></span>
                                                <span class="texto-card-info"><?= get_post_meta(get_the_ID(), 'estadio')[0]; ?></span>
                                            </div>
                                            <div class="placar">
                                                <span class="texto-card-placar">1 x 1</span>
                                            </div>
                                            <div class="placar">
                                                <img class="escudo" src="<?= bloginfo("template_directory") . '/img/adc-logo.png' ?>" />
                                                <span class="texto-card"><?= substr(get_post_meta(get_the_ID(), 'visitante')[0], 0, 3); ?></span>
                                                <span class="texto-card-info">
                                                    <?= get_post_meta(get_the_ID(), 'data')[0]; ?> <?= get_post_meta(get_the_ID(), 'horario')[0]; ?>
                                                </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        Não há partidas cadastradas.
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>