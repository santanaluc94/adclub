<?php

include_once __DIR__ . '/plugins/my_club.php';
include_once __DIR__ . '/plugins/sponsors/sponsors.php';
include_once __DIR__ . '/plugins/players/players.php';
include_once __DIR__ . '/plugins/games/games.php';

load_theme_textdomain('page-atletas', basename(dirname(__FILE__)) . '/languages');

/**
 * Enable Logo
 */
add_theme_support('custom-logo');

/**
 * Enable thumbnail
 */
add_theme_support('post-thumbnails');

/**
 * Call function to change logo class
 */
add_filter('get_custom_logo', 'change_logo_class');

/**
 * Change logo class
 *
 * @param string $html
 * @return void
 */
function change_logo_class($html)
{
    $html = str_replace('custom-logo', 'logo-menu', $html);
    $html = str_replace('logo-menu-link', 'logo', $html);

    return $html;
}

/**
 * Insert post categories programmatically
 *
 * @return void
 */
function insert_categories()
{
    wp_insert_term(
        'Matéria',
        'category',
        [
            'slug' => 'materia'
        ]
    );

    wp_insert_term(
        'Destaques',
        'category',
        [
            'slug' => 'destaques'
        ]
    );
}

/**
 * Call function to insert categories
 */
add_action('after_setup_theme', 'insert_categories');

/**
 * Format date to brazilian date
 *
 * @param string $date
 * @return string
 */
function format_date(string $date)
{
    $date_formated = explode('-', $date);

    return $date_formated[2] . '/' . $date_formated[1] . '/' . $date_formated[0];
}

/**
 * Club name
 *
 * @return string
 */
function meu_clube()
{
    return "GRU";
}

/**
 * Club stadium
 *
 * @return string
 */
function meu_estadio()
{
    return "Antônio Soares";
}

/**
 * Club stadium
 *
 * @return string
 */
function meu_escudo_url()
{
    $url = bloginfo("template_directory") . '/img/adc-logo.png';
    return $url;
}

/**
 * Create default Pages
 *
 * @return void
 */
function create_static_pages()
{
    $html_sobre = '
        <article class="sub-texto">
            <p class="texto-pagina"><?= __("Conteúdo sobre o Clube.") ?></p>
        </article>';

    $html_extras = '
        <article class="sub-texto">
            <p class="texto-pagina">
                <?= __("Texto extra sobre o clube.") ?>
            </p>
        </article>
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?= __("Torcida do Clube") ?></span>
                </h1>
            </div>
            <p class="texto-pagina">
                <?= __("Texto sobre a torcida do clube.") ?>
            </p>
        </article>
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?= __("Hino do Clube") ?></span>
                </h1>
            </div>
            <p class="hino">
                <?= __("Primeira linha do hino do Clube") ?><br />
                <?= __("Segunda linha do hino do Clube") ?><br />
                <?= __("Terceira linha do hino do Clube") ?><br />
                <?= __("Quarta linha do hino do Clube") ?><br />
            </p>
        </article>';


    if (get_option('function_execute_once_01') !== 'completed') {
        $page_sobre = [
            'post_title' => 'Sobre o Clube',
            'post_content' => $html_sobre,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        ];
        $page_extra = [
            'post_title' => 'Extras',
            'post_content' => $html_extras,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        ];

        wp_insert_post($page_sobre);
        wp_insert_post($page_extra);
    }

    update_option('function_execute_once_01', 'completed');

    /**
     * Run create_static_pages only once
     */
    add_action('admin_init', 'function_execute_once');
}

/**
 * Call function to create static page
 */
add_action('admin_init', 'create_static_pages');