<?php

include_once __DIR__ . '/plugins/includes/custom_posts.php';
include_once __DIR__ . '/plugins/sponsors/sponsors.php';
include_once __DIR__ . '/plugins/players/players.php';
include_once __DIR__ . '/plugins/games/games.php';
include_once __DIR__ . '/plugins/includes/my_club.php';

load_theme_textdomain('adclube', get_template_directory() . '/languages');

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
    return "Meu Clube";
}

/**
 * Club stadium
 *
 * @return string
 */
function meu_estadio()
{
    return "Estádio do Meu Clube";
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


define('WP_DEBUG', false);
