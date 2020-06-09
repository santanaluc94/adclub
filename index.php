<?php get_header(); ?>

<div class="container">
    <!-- Carrossel de Destaques -->
    <section class="inicio-secao">
        <?php if (have_posts()) : ?>
            <?php
            $argumentos = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => 'Destaques'
            );
            $query = new WP_Query($argumentos);
            ?>
            <?php if ($query->have_posts()) : ?>
                <?php $post = $posts[0]; ?>
                <?php $contador_carrossel = 0; ?>
                <?php $contador_indicador = 0; ?>

                <div id="carousel-slide" class="carousel slide" style="z-index: 0;">
                    <ol class="carousel-indicators">
                        <?php while ($contador_indicador < 3) : ?>
                            <li data-target="#carousel-slide" data-slide-to="<?= $contador_indicador++; ?>" class="<?php if ($contador_indicador === 1) echo 'active'; ?>"></li>
                        <?php endwhile; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php while ($query->have_posts()) : ?>
                            <?php $query->the_post(); ?>
                            <div class="carousel-item<?php $contador_carrossel++ ?> <?php if ($contador_carrossel === 1) echo ' active'; ?>">
                                <?php the_post_thumbnail('post_thumbnail', ['id' => 'carousel-img', 'class' => 'carousel-img', 'alt' => 'First Slide']); ?>
                                <div class="carousel-caption">
                                    <a class="link-carrossel" href="<?= get_permalink(); ?>">
                                        <div class="noticia_carrosel">
                                            <h3><?php the_title(); ?></h3>
                                            <span class="d-none d-md-block"><?php the_excerpt(); ?></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_query(); ?>

                    <a class="carousel-control-prev carrossel-botao" href="#carousel-slide" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next carrossel-botao" href="#carousel-slide" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                <?php else : ?>
                    <h5>Não temos nenhuma postagem marcada com "Importante" em Destaques no momento.</h5>
                <?php endif; ?>
                </div>
            <?php endif; ?>
    </section>

    <!-- Blocos das Matérias -->
    <section class="secao">
        <div class="row titulo-site">
            <h1>
                <span class="titulo-pagina">Notícias</span>
            </h1>
        </div>

        <?php if (have_posts()) : ?>
            <div class="noticias">
                <div class="bloco-inferior row">
                    <?php
                    $argumentos = [
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'category_name' => 'Matéria'
                    ];
                    $query = new WP_Query($argumentos);
                    ?>
                    <?php if ($query->have_posts()) : ?>
                        <?php $post = $posts[0]; ?>
                        <?php $contador_carrossel = 0; ?>
                        <?php $contador_indicador = 0; ?>
                        <div class="noticias">

                            <?php while ($query->have_posts()) : ?>
                                <?php $query->the_post(); ?>

                                <div class="noticia col-md-4">
                                    <a class="texto-noticia" href="<?= get_permalink(); ?>">
                                        <?php the_post_thumbnail('post_thumbnail', ['class' => 'img-noticias']); ?>
                                        <div class="chamada-noticia">
                                            <span><?= the_title() ?></span>
                                        </div>
                                    </a>
                                </div>

                            <?php endwhile; ?>

                        <?php else : ?>
                            <h5>Não temos nenhuma postagem marcada como "Matéria" em Destaques no momento.</h5>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                </div>
            </div>
        <?php endif; ?>
    </section>


</div>
<?php get_footer(); ?>