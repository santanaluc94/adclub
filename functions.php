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

/**
 * Create custom posts type - Atleta
 */
function create_post_type()
{
    // Function to create post atletas
    register_post_type(
        'atletas',
        [
            'labels' => [
                'name' => __('Atletas'),
                'singular_name' => __('Atleta'),
                'add_new' => __('Adicionar Atleta'),
                'add_new_item' => __('Adicionar Novo Atleta'),
                'edit_item' => __('Editar Atleta'),
                'all_items' => __('Todos os Atletas'),
                'view_item' => __('Visualizar Atleta'),
                'search_item' => __('Buscar Atleta'),
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'atleta'],
            'supports' => [
                'thumbnail'
            ]
        ]
    );

    // Function to create post Patrocinadores
    register_post_type(
        'patrocinadores',
        [
            'labels' => [
                'name' => __('Patrocinadores'),
                'singular_name' => __('Patrocinador'),
                'add_new' => __('Adicionar Patrocinador'),
                'add_new_item' => __('Adicionar Novo Patrocinador'),
                'edit_item' => __('Editar Patrocinador'),
                'all_items' => __('Todos os Patrocinadores'),
                'view_item' => __('Visualizar Patrocinador'),
                'search_item' => __('Buscar Patrocinador'),
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'patrocinador'],
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ]
        ]
    );
}

/**
 * Call function to create custom posts type
 */
add_action('init', 'create_post_type');

/**
 * Create form to Atletas and Patrocinador in SQL
 */
function register_custom_posts()
{
    add_meta_box(
        'info-atleta',
        'Informações do Atleta',
        'form_atleta',
        'atletas',
        'normal',
        'high'
    );

    add_meta_box(
        'info-patrocinador',
        'Informações do Patrocinador',
        'form_patrocinador',
        'patrocinadores',
        'normal',
        'high'
    );
}

/**
 * Call function to create form to atletas
 */
add_action('add_meta_boxes', 'register_custom_posts');

/**
 * Create form to Atletas in custom post
 *
 * @param object $post
 * @return void
 */
function form_atleta($post)
{
    $atleta = get_post_meta($post->ID);
?>

    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form_atleta.css">

    <form method="post">
        <h1>Form atleta</h1>

        <fieldset>
            <div>
                <label>
                    <span>Nome</span>
                </label>
                <input name="nome" id="nome" type="text" value="<?= $atleta['nome'][0] ?>" required />
            </div>

            <div>
                <label>
                    <span>Nome Completo:</span>
                </label>
                <input name="nome_completo" id="nome_completo" type="text" value="<?= $atleta['nome_completo'][0] ?>" required />
            </div>

            <div>
                <label>
                    <span>Altura:</span>
                </label>
                <input name="altura" id="altura" type="text" value="<?= $atleta['altura'][0] ?>" />
                <span>cm</span>
            </div>

            <div>
                <label>
                    <span>Peso:</span>
                </label>
                <input name="peso" id="peso" type="text" value="<?= $atleta['peso'][0] ?>" />
                <span>kg</span>
            </div>

            <div>
                <label>
                    <span>Posição:</span>
                </label>
                <input name="posicao" id="posicao" type="text" value="<?= $atleta['posicao'][0] ?>" />
            </div>

            <div>
                <label>
                    <span>Data de Nascimento:</span>
                </label>
                <input name="data_de_nascimento" id="data_de_nascimento" type="date" value="<?= $atleta['data_de_nascimento'][0] ?>" required />
            </div>
        </fieldset>
    </form>
<?php
}

/**
 * Create form to Atletas in custom post
 *
 * @param object $post
 * @return void
 */
function form_patrocinador($post)
{
    $patrocinador = get_post_meta($post->ID);
?>

    <form method="post">
        <fieldset>
            <div>
                <label>
                    <span>Site</span>
                </label>
                <input name="site" id="site" type="text" value="<?= $patrocinador['site'][0] ?>" required />
            </div>
        </fieldset>
    </form>
<?php
}

/**
 * Save custom post Atletas in SQL
 *
 * @param int $post_id
 * @return void
 */
function save_atletas($post_id)
{
    if (isset($_POST['nome'])) {
        update_post_meta($post_id, 'nome', sanitize_text_field($_POST['nome']));

        global $wpdb;
        $wpdb->update($wpdb->posts, array('post_title' => sanitize_text_field($_POST['nome'])), array('ID' => $post_id));
    }

    if (isset($_POST['nome_completo'])) {
        update_post_meta($post_id, 'nome_completo', sanitize_text_field($_POST['nome_completo']));
    }

    if (isset($_POST['altura'])) {
        update_post_meta($post_id, 'altura', sanitize_text_field($_POST['altura']));
    }

    if (isset($_POST['peso'])) {
        update_post_meta($post_id, 'peso', sanitize_text_field($_POST['peso']));
    }

    if (isset($_POST['posicao'])) {
        update_post_meta($post_id, 'posicao', sanitize_text_field($_POST['posicao']));
    }

    if (isset($_POST['data_de_nascimento'])) {
        update_post_meta($post_id, 'data_de_nascimento', sanitize_text_field($_POST['data_de_nascimento']));
    }
}

/**
 * Call function to save cutom post Atletas in SQL
 */
add_action('save_post', 'save_atletas');


/**
 * Save custom post Patrocinador in SQL
 *
 * @param int $post_id
 * @return void
 */
function save_patrocinador($post_id)
{
    if (isset($_POST['site'])) {
        update_post_meta($post_id, 'site', sanitize_text_field($_POST['site']));
    }
}

/**
 * Call function to save cutom post Patrocinador in SQL
 */
add_action('save_post', 'save_patrocinador');


/**
 * Insert categories programmatically
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
 * Create static Pages
 *
 * @return void
 */
function create_static_pages()
{
    $html_sobre = '<p class="texto-pagina">Conteúdo sobre o Clube.</p>';

    $html_extras = '
    <article class="texto">
        <article class="sub-texto">
            <p class="texto-pagina">
                Texto extra sobre o clube.
            </p>
        </article>
        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina">Torcida do Clube</span>
                </h1>
            </div>
            <p class="texto-pagina">
                Texto sobre a torcida do clube.
            </p>
        </article>

        <article class="sub-texto">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina">Hino do Clube</span>
                </h1>
            </div>
            <p class="hino">
                Primeira linha do hino do Clube<br />
                Segunda linha do hino do Clube<br />
                Terceira linha do hino do Clube<br />
                Quarta linha do hino do Clube<br />
            </p>
        </article>
    </article>';


    if (get_option('function_execute_once_01') !== 'completed') {
        $page_sobre = [
            'post_title' => 'Sobre o Clube',
            'post_content' => $html_sobre,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        ];

        $page_elenco = [
            'post_title' => 'Atletas',
            'post_content' => '',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        ];

        $page_campeonatos = [
            'post_title' => 'Campeonatos',
            'post_content' => '',
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
        wp_insert_post($page_elenco);
        wp_insert_post($page_campeonatos);
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
