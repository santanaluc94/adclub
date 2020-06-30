<?php

add_action('after_setup_theme', 'my_theme_setup');

function my_theme_setup()
{
    load_theme_textdomain('adclube', get_template_directory() . '/languages');
}

/**
 * Enable Logo
 */
add_theme_support('custom-logo');

/**
 * Enable thumbnail
 */
add_theme_support('post-thumbnails');

add_action('after_setup_theme', 'wpse_theme_setup');

/**
 * Enable title tag
 *
 * @return void
 */
function wpse_theme_setup(): void
{
    add_theme_support('title-tag');
}

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
        __('Notices', 'adclube'),
        'category',
        [
            'slug' => 'notices'
        ]
    );

    wp_insert_term(
        __('Highlights', 'adclube'),
        'category',
        [
            'slug' => 'highlights'
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
 * Club stadium
 *
 * @return string
 */
function meu_escudo_url()
{
    $url = esc_url(get_template_directory_uri()) . '/img/adc-logo.png';
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
            <p class="texto-pagina"><?php echo __("Content about the club.", "adclube") ?></p>
        </article>';

    $html_extras = '
        <article class="sub-texto">
            <p class="texto-pagina">
                <?php echo __("Text about the club.", "adclube") ?>
            </p>
        </article>
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php echo __("Club Crowd", "adclube") ?></span>
                </h1>
            </div>
            <p class="texto-pagina">
                <?php echo __("Text about club crowd.", "adclube") ?>
            </p>
        </article>
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina"><?php echo __("Club Anthem", "adclube") ?></span>
                </h1>
            </div>
            <p class="hino">
                <?php echo __("Firth line of the club anthem", "adclube") ?><br />
                <?php echo __("Second line of the club anthem", "adclube") ?><br />
                <?php echo __("Third line of the club anthem", "adclube") ?><br />
                <?php echo __("Fourth line of the club anthem", "adclube") ?><br />
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

/**
 * Import all css and js files in header
 *
 * @return void
 */
function add_header_links(): void
{
?>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/reset.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/header.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/style.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/index.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/bootstrap-4.5.0/css/bootstrap.min.css' ?>" />

    <!-- JS -->
    <script src="<?php echo esc_url(get_template_directory_uri()) . '/public/js/jquery-3.5.1.min.js' ?>"></script>
    <script src="<?php echo esc_url(get_template_directory_uri()) . '/public/bootstrap-4.5.0/js/bootstrap.min.js' ?>"></script>
<?php
}

/**
 * Call function to import css and js in header
 */
add_action('wp_head', 'add_header_links');


/**
 * Import all css and js files in footer
 *
 * @return void
 */
function add_footer_links(): void
{
?>
    <script src="<?php echo esc_url(get_template_directory_uri()) . '/public/js/popper.min.js' ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/single.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/atletas.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/campeonatos.css' ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/partidas.css' ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url(get_template_directory_uri()) . '/public/css/footer.css' ?>">
<?php
}

/**
 * Call function to import css and js in header
 */
add_action('wp_footer', 'add_footer_links');

add_theme_support('automatic-feed-links');

/**
 * Add .js script if "Enable threaded comments" is activated in Admin
 * Codex: {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
 *
 * @return void
 */
function function_enqueue_comments_reply(): void
{
    if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script('comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true);
    }
}

/**
 * Call function to add comments repply
 */
add_action('wp_enqueue_scripts', 'function_enqueue_comments_reply');
