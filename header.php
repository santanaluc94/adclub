<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css">

    <title>
        <?php if (!empty(get_bloginfo('name'))) : ?>
            <?= get_bloginfo('name') ?>
        <?php else : ?>
            <?= __('Página Inicial', 'header') ?>
        <?php endif; ?>
    </title>
</head>

<body>
    <section>
        <nav>
            <div class="menu-barra-superior">
                <!-- Escudo do Time -->
                <a href="<?= get_home_url() ?>">
                    <?php if (function_exists('the_custom_logo')) : ?>
                        <?php the_custom_logo() ?>
                    <?php else : ?>
                        <img src="<?= get_home_url() . '/img/adc-logo.png' ?>" />
                    <?php endif; ?>
                </a>

                <div class="titulo">
                    <!-- Nome do Clube -->
                    <h2 class="titulo_nome">
                        <?php if (get_bloginfo('name') === null) : ?>
                            <?= get_bloginfo('name') ?>
                        <?php else : ?>
                            Associação Desportiva Clube
                        <?php endif; ?>
                    </h2>
                    <h3 class="titulo_site">Site Oficial</h3>
                </div>
            </div>

            <div class="menu-barra-inferior">
                <div class="barra_navegacao botoes">
                    <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
                </div>
            </div>
        </nav>
    </section>