<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>
        <?php if (!empty(get_bloginfo('name'))) : ?>
            <?= get_bloginfo('name') ?>
        <?php else : ?>
            Página Inicial
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
                    <a class="logo" href="<?= site_url() ?>">
                        <img class="logo-menu" src="<?= bloginfo("template_directory") . '/img/adc-logo.png' ?>" />
                    </a>
                <?php endif; ?>

                <div class="titulo">
                    <!-- Nome do Clube -->
                    <h2 class="titulo">
                        <?php if (get_bloginfo('name') === null) : ?>
                            <?= get_bloginfo('name') ?>
                        <?php else : ?>
                            Associação Desportiva Clube
                        <?php endif; ?>
                    </h2>
                    <h3 class="titulo">Site Oficial</h3>
                </div>

                <div>
                    <ul class="midias-sociais-superior">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/GuarulhosGRU/" class="fa-superior fa fa-facebook-f"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/GuarulhosGRU" class="fa-superior fa fa-twitter"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.mercadolivre.com.br/GuarulhosGRU" class="fa-superior fa fa-handshake-o"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/guarulhosgru/" class="fa-superior fa fa-instagram"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCduGenvRYg0KopQiJUvzbVQ/videos" class="fa-superior fa fa-youtube-play"></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="menu-barra-inferior">
                <div class="barra_navegacao botoes">
                    <!-- Sobre o Clube, Elenco, Jogos, Extras, Seja sócio -->
                    <?php wp_nav_menu(['theme_location' => 'header_menu']); ?>
                </div>
            </div>
        </nav>
    </section>