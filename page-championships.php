<?php

/**
 * template name: championships
 */

get_header();

$championships = get_terms(['taxonomy' => 'championships']);
$taxonomy = get_taxonomy('championships');
?>

<div class="container container-top">
    <section class="inicio-secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina"><?php echo $taxonomy->name ?></span>
            </h1>
        </div>
        <?php if (!empty($championships)) : ?>
            <?php foreach ($championships as $championship) : ?>
                <?php if (date('Y') === (get_option('taxonomy_' . $championship->term_id)['year'])) : ?>
                    <article class="texto">
                        <div class="conteudo-campeonato">
                            <h2 class="titulo-campeonato">
                                <?php echo $championship->name ?>
                            </h2>
                            <div class="sobre-campeonato">
                                <?php if (!empty($championship->description)) : ?>
                                    <?php echo $championship->description ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </article>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <?php echo __('There is no championships registered.', 'adclube') ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>
<?php get_footer(); ?>