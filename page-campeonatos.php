<?php

/**
 * template name: campeonatos
 */

get_header();

$campeonatos = get_terms(['taxonomy' => 'campeonatos']);
$taxonomy = get_taxonomy('campeonatos');
?>

<div class="container container-top">
    <section class="inicio-secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina"><?= $taxonomy->name  . PHP_EOL . date('Y') ?></span>
            </h1>
        </div>
        <?php if (!empty($campeonatos)) : ?>
            <?php foreach ($campeonatos as $campeonato) : ?>
                <?php if (date('Y') === (get_option('taxonomy_' . $campeonato->term_id)['ano'])) : ?>
                <article class="texto">
                    <div class="conteudo-campeonato">
                        <h2 class="titulo-campeonato">
                            <?= $campeonato->name ?>
                        </h2>
                        <div class="sobre-campeonato">
                            <?php if (!empty($campeonato->description)) : ?>
                                <?= $campeonato->description ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?= get_site_url('', '/campeonatos/' . $campeonato->slug . '/', 'http') ?>">Vá para a página do campeonato.</a>
                    </div>
                </article>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            O clube não está em campeonatos no momento.
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>
<?php get_footer(); ?>