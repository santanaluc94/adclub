<!DOCTYPE html>
<html lang="pt-br">
<?php
$first_color = esc_attr(get_option('section_club_first'));
$second_color = esc_attr(get_option('section_club_second'));
$third_color = esc_attr(get_option('section_club_third'));
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/reset.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/header.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/style.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/index.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/single.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/atletas.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/campeonatos.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/partidas.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/bootstrap-4.5.0/dist/css/bootstrap.min.css' ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/footer.css' ?>" >


    <!-- JS -->
    <script src="<?php echo esc_url(get_template_directory_uri()) . '/public/js/jquery-3.5.1.min.js' ?>"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()) . '/public/css/bootstrap-4.5.0/dist/js/bootstrap.min.js' ?>"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


    <style type="text/css">
        :root {
            --main-color: <?php echo $first_color ?>;
            --second-color: <?php echo $second_color ?>;
            --third-color: <?php echo $third_color ?>;
        }
    </style>

    <title>
        <?php if (wp_title()) : ?>
        <?php wp_title() ?>
        <?php elseif (!empty(esc_attr(get_option('section_club_name')))) : ?>
            <?php echo esc_attr(get_option('section_club_name')) ?>
        <?php else : ?>
            <?php echo get_bloginfo('name') ?>
        <?php endif; ?>
    </title>
</head>

<body>
    <section>
        <nav>
            <div class="menu-barra-superior">
                <!-- Escudo do Time -->
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo() ?>
                <?php else : ?>
                    <a class="logo" href="<?php echo site_url() ?>">
                        <img class="logo-menu" src="<?php echo esc_url(get_template_directory_uri()) . '/public/img/adc-logo.png' ?>" />
                    </a>
                <?php endif; ?>

                <div class="titulo">
                    <!-- Nome do Clube -->
                    <h2 class="titulo">
                        <?php if (!empty(esc_attr(get_option('section_club_name')))) : ?>
                            <?php echo esc_attr(get_option('section_club_name')) ?>
                        <?php else : ?>
                            <?php echo get_bloginfo('name') ?>
                        <?php endif; ?>
                    </h2>
                    <h3 class="titulo">Site Oficial</h3>
                </div>

                <div>
                    <ul class="midias-sociais-superior">
                        <?php if (!empty(esc_attr(get_option('section_social_medias_store')))) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_attr(get_option('section_social_medias_store')) ?>" class="fa-superior fa fa-shopping-cart" target="__blank"></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty(esc_attr(get_option('section_social_medias_facebook')))) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_attr(get_option('section_social_medias_facebook')) ?>" class="fa-superior fa fa-facebook-f" target="__blank"></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty(esc_attr(get_option('section_social_medias_twitter')))) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_attr(get_option('section_social_medias_twitter')) ?>" class="fa-superior fa fa-twitter" target="__blank"></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty(esc_attr(get_option('section_social_medias_instagram')))) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_attr(get_option('section_social_medias_instagram')) ?>" class="fa-superior fa fa-instagram" target="__blank"></a>
                            </li>
                        <?php endif; ?>

                        <?php if (!empty(esc_attr(get_option('section_social_medias_youtube')))) : ?>
                            <li class="list-inline-item">
                                <a href="<?php echo esc_attr(get_option('section_social_medias_youtube')) ?>" class="fa-superior fa fa-youtube-play" target="__blank"></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <div class="menu-barra-inferior">
                <input type="checkbox" id="btn_menu" checked>
                <label class="btn_menu" for="btn_menu">&#9776;</label>

                <div class="barra_navegacao">
                    <?php wp_nav_menu(['theme_location' => 'header_menu']); ?>
                </div>
            </div>
        </nav>
    </section>