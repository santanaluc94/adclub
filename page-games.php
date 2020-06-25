<?php

/**
 * template name: games
 */

get_header();

$campeonatos = get_terms('championships');
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
                    <?php if ((get_option('taxonomy_' . $campeonato->term_id)['year']) != date('Y')) {
                        continue;
                    } ?>
                    <div class="row conteudo-partida">
                        <h2>
                            <span class="titulo-campeonato"><?php echo $campeonato->name ?></span>
                        </h2>
                    </div>
                    <?php $games = new WP_Query([
                        'post_type' => ['games'],
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'tax_query' => [
                            [
                                'taxonomy' => 'championships',
                                'field' => 'slug',
                                'terms' => $campeonato->slug,
                            ],
                        ],
                    ]); ?>
                    <?php if ($games->have_posts()) : ?>
                        <div class="row">
                            <?php while ($games->have_posts()) : $games->the_post(); ?>
                                <?php
                                $home_club = get_post_meta(get_the_ID(), 'home')[0];
                                $stadium = get_post_meta(get_the_ID(), 'stadium')[0];
                                $home_score =  get_post_meta(get_the_ID(), 'score_home')[0];
                                $guest_score =  get_post_meta(get_the_ID(), 'score_guest')[0];
                                $guest_club = get_post_meta(get_the_ID(), 'guest')[0];
                                $date = get_post_meta(get_the_ID(), 'date')[0];
                                $hour = get_post_meta(get_the_ID(), 'hour')[0];
                                $club_name = esc_attr(get_option('section_club_abbreviation'));
                                ?>
                                <div class="col-md-5 card">
                                    <div class="card-header">
                                        <div class="d-flex">
                                            <div class="placar">
                                                <?php if ($club_name == $home_club) : ?>
                                                    <img class="escudo" src="<?php echo bloginfo("template_directory") . '/img/adc-logo.png' ?>" />
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
                                                    <img class="escudo" src="<?php echo bloginfo("template_directory") . '/img/adc-logo.png' ?>" />
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
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <?php echo __('There is no games registered.') ?>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>