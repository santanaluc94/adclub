<?php

/**
 * template name: page
 */

get_header();
?>

<div class="container container-top">
    <section class="inicio-secao">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="conteudo-flex">
                    <div class="row titulo-site">
                        <h1>
                            <span class="titulo-pagina"><?php the_title(); ?></span>
                        </h1>
                    </div>
                    <article class="texto">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="imagem-superior img-responsive">
                                <?php the_post_thumbnail('post_thumbnail', ['class' => 'imagem-superior img-responsive']); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (the_content()) : ?>
                            <p class="texto-pagina">
                                <?php the_content(); ?>
                            </p>
                        <?php endif; ?>
                    </article>
                    <?php comments_template(); ?>

                    <?php comments_popup_link('Sem Comentários', '1 Comentário', '% Comentários', 'comments-link', ''); ?>
                </div>

            <?php endwhile; ?>
        <?php else : ?>
            <div class="artigo">
                <h2>Nada Encontrado</h2>
                <p>Erro 404</p>
                <p>Lamentamos mas não foram encontrados artigos.</p>
            </div>
        <?php endif; ?>
    </section>
</div>

<?php get_footer(); ?>