<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/reset.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/style.css">

    <title>Associação Desportiva Clube</title>
</head>

<body>
    <section>
        <nav>
            <div class="menu-barra-superior">
                <div class="titulo">
                    <h2 class="titulo_nome">Associação Desportiva Clube</h2>
                    <h3 class="titulo_site">Site Oficial</h3>
                </div>

                <div class="menu-barra-inferior">
                    <div class="barra_navegacao botoes">
                        <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
                    </div>
                </div>
            </div>
        </nav>
    </section>