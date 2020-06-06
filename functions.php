
<?php

/**
 * Enable Logo
 */
add_theme_support('custom-logo');

add_filter('get_custom_logo', 'change_logo_class');

function change_logo_class($html)
{
    $html = str_replace('custom-logo', 'logo-menu', $html);
    $html = str_replace('logo-menu-link', 'logo', $html);

    return $html;
}

// Post Type Elenco
function create_posttype()
{
    register_post_type(
        'atletas',
        // CPT Options
        [
            'labels' => [
                'name' => __('Atletas'),
                'singular_name' => __('Atletas')
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'elenco'],
        ]
    );
}
add_action('init', 'create_posttype');
// Fim Pos Type Elenco
