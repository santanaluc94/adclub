<?php

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

include_once __DIR__ . '/includes/custom_posts.php';
include_once __DIR__ . '/includes/my_club.php';

/**
 * Use radio inputs instead of checkboxes for term checklists in Campeonatos taxonomy.
 *
 * @param array $args
 * @return array
 */
function change_radio_in_campeonatos_taxonomy($args)
{
    if (!empty($args['taxonomy']) && $args['taxonomy'] === 'campeonatos') {
        if (empty($args['walker']) || is_a($args['walker'], 'Walker')) {
            if (!class_exists('WPSE_139269_Walker_Category_Radio_Checklist')) {
                /**
                 * Custom walker for switching checkbox inputs to radio.
                 *
                 * @see Walker_Category_Checklist
                 */
                class WPSE_139269_Walker_Category_Radio_Checklist extends Walker_Category_Checklist
                {
                    function walk($elements, $max_depth, ...$args)
                    {
                        $output = parent::walk($elements, $max_depth, ...$args);
                        $output = str_replace(
                            array('type="checkbox"', "type='checkbox'"),
                            array('type="radio"', "type='radio'"),
                            $output
                        );

                        return $output;
                    }
                }
            }

            $args['walker'] = new WPSE_139269_Walker_Category_Radio_Checklist;
        }
    }

    return $args;
}

add_filter('wp_terms_checklist_args', 'change_radio_in_campeonatos_taxonomy');




/**
 * Club name
 *
 * @return string
 */
function meu_clube()
{
    return $meu_clube = "Meu Clube";
}
