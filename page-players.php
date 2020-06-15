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
                                        <h5 class="card-title"><?= get_post_meta(get_the_ID(), 'nome')[0]; ?></h5>
                                        <p class="card-text">
                                            <span>Nome:</span> <?= get_post_meta(get_the_ID(), 'nome_completo')[0]; ?>
                                        </p>
                                        <p class="card-text">
                                            <span>Peso:</span> <?= get_post_meta(get_the_ID(), 'peso')[0]; ?>kg
                                        </p>
                                        <p class="card-text">
                                            <span> Altura:</span> <?= get_post_meta(get_the_ID(), 'altura')[0]; ?>cm
                                        </p>
                                        <p class="card-text">
                                            <span>Nascimento:</span> <?= get_post_meta(get_the_ID(), 'data_de_nascimento')[0]; ?>
                                        </p>
                                        <p class="card-text">
                                            <span>Posição:</span> <?= get_post_meta(get_the_ID(), 'posicao')[0]; ?>
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
</div>
<?php get_footer(); ?>