<?php

get_header();

$post_destaques = [
    'post_type' => 'post',
    'posts_per_page' => 3,
    'category_name' => 'Highlights'
];

$post_noticias = [
    'post_type' => 'post',
    'posts_per_page' => 6,
    'category_name' => 'Notices'
];

$post_games = [
    'post_type' => 'games',
    'posts_per_page' => 2,
    'order' => 'DESC',
    'orderby' => 'date',
];
?>

<div class="container container-top">
    <!-- Carrossel de Destaques -->
    <section class="inicio-secao">
        <?php if (have_posts()) : ?>
            <?php $query = new WP_Query($post_destaques); ?>
            <?php if ($query->have_posts()) : ?>
                <?php $post = $posts[0]; ?>
                <?php $contador_carrossel = 0; ?>
                <?php $contador_indicador = 0; ?>

                <div id="carousel-slide" class="carousel slide" style="z-index: 0;">
                    <ol class="carousel-indicators">
                        <?php while ($contador_indicador < 3) : ?>
                            <li data-target="#carousel-slide" data-slide-to="<?php echo $contador_indicador++; ?>" class="<?php if ($contador_indicador === 1) echo 'active'; ?>"></li>
                        <?php endwhile; ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php while ($query->have_posts()) : ?>
                            <?php $query->the_post(); ?>
                            <div class="carousel-item<?php $contador_carrossel++ ?> <?php if ($contador_carrossel === 1) echo ' active'; ?>">
                                <?php the_post_thumbnail('post_thumbnail', ['id' => 'carousel-img', 'class' => 'carousel-img', 'alt' => 'First Slide']); ?>
                                <div class="carousel-caption">
                                    <a class="link-carrossel" href="<?php echo get_permalink(); ?>">
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
                </div>
            <?php else : ?>
                <article class="texto">
                    <p>Não temos nenhuma postagem marcada com "Importante" em Destaques no momento.</p>
                </article>
            <?php endif; ?>
        <?php endif; ?>
    </section>

    <!-- Blocos dos Próximos Jogos -->
    <section class="secao">
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php echo __('Games') ?></span>
                </h1>
            </div>
            <div class="col-md-12">
                <?php $query = new WP_Query($post_games); ?>
                <?php if ($query->have_posts()) : $qtd_game = 0; ?>
                    <div class="row">
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <?php
                            $home_club = get_post_meta(get_the_ID(), 'home')[0];
                            $stadium = get_post_meta(get_the_ID(), 'stadium')[0];
                            $home_score =  get_post_meta(get_the_ID(), 'score_home')[0];
                            $guest_score =  get_post_meta(get_the_ID(), 'score_guest')[0];
                            $guest_club = get_post_meta(get_the_ID(), 'guest')[0];
                            $date = get_post_meta(get_the_ID(), 'date')[0];
                            $hour = get_post_meta(get_the_ID(), 'hour')[0];
                            $club_name = esc_attr(get_option('section_club_abbreviation'));
                            $games_indication = [
                                0 => 'Next Game',
                                1 => 'Last Game'
                            ]
                            ?>
                            <div class="col-md-5 card">
                                <div class="card-header">
                                    <div class="game-title-header">
                                        <?php echo $games_indication[$qtd_game] ?>
                                    </div>
                                    <div class="d-flex">
                                        <div class="placar">
                                            <?php if ($club_name == $home_club) : ?>
                                                <img class="escudo" src="<?php echo esc_url(get_template_directory_uri()) . '/img/adc-logo.png' ?>" />
                                            <?php else : ?>
                                                <?php the_post_thumbnail('thumbnail', ['class' => 'escudo']) ?>
                                            <?php endif; ?>
                                            <span class="texto-card"><?php echo substr($home_club, 0, 3); ?></span>
                                            <span class="texto-card-info"><?php echo $stadium; ?></span>
                                        </div>
                                        <div class="placar">
                                            <span class="texto-card-placar"><?php echo $home_score ?> x <?php echo $guest_score; ?></span>
                                        </div>
                                        <div class="placar">
                                            <?php if ($club_name == $guest_club) : ?>
                                                <img class="escudo" src="<?php echo esc_url(get_template_directory_uri()) . '/img/adc-logo.png' ?>" />
                                            <?php else : ?>
                                                <?php the_post_thumbnail('thumbnail', ['class' => 'escudo']) ?>
                                            <?php endif; ?>
                                            <span class="texto-card"><?php echo substr($guest_club, 0, 3); ?></span>
                                            <span class="texto-card-info">
                                                <?php echo format_date($date); ?> <?php echo $hour ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $qtd_game++; ?>
                        <?php endwhile; ?>
                    </div>
                <?php else : ?>
                    <article class="texto">
                        <p><?php echo __('The club does not have games.'); ?></p>
                    </article>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            </div>
        </article>
    </section>

    <!-- Blocos das Matérias -->
    <section class="secao">
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina">Notícias</span>
                </h1>
            </div>

            <?php if (have_posts()) : ?>
                <?php $query = new WP_Query($post_noticias); ?>
                <?php if ($query->have_posts()) : ?>
                    <div class="noticias">
                        <div class="bloco-inferior">
                            <?php $post = $posts[0]; ?>
                            <?php $contador_carrossel = 0; ?>
                            <?php $contador_indicador = 0; ?>
                            <div class="noticias">
                                <?php while ($query->have_posts()) : ?>
                                    <?php $query->the_post(); ?>

                                    <div class="noticia col-md-4">
                                        <a class="texto-noticia" href="<?php echo get_permalink(); ?>">
                                            <?php the_post_thumbnail('post_thumbnail', ['class' => 'img-noticias']); ?>
                                            <div class="chamada-noticia">
                                                <span><?php echo the_title() ?></span>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <article class="texto">
                        <p>Não temos nenhuma postagem marcada como "Matéria" em Destaques no momento.</p>
                    </article>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php endif; ?>
        </article>
    </section>
</div>
<?php get_footer(); ?>