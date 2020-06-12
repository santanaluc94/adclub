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
 * Create custom posts type - Atleta, Patrocinadores, Campeonatos
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
                'add_new_item' => __('Adicionar Atleta'),
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
            ],
            'menu_icon' => 'dashicons-groups'
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
                'add_new_item' => __('Adicionar Patrocinador'),
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
            ],
            'menu_icon' => 'dashicons-money'
        ]
    );

    // Function to create post Campeonatos
    register_post_type(
        'campeonatos',
        [
            'labels' => [
                'name' => __('Campeonatos'),
                'singular_name' => __('Campeonato'),
                'add_new' => __('Adicionar Campeonato'),
                'add_new_item' => __('Adicionar Campeonato'),
                'edit_item' => __('Editar Campeonato'),
                'all_items' => __('Todos os Campeonatos'),
                'view_item' => __('Visualizar Campeonato'),
                'search_item' => __('Buscar Campeonato'),
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'campeonatos'],
            'supports' => [
                'title',
                'editor',
                'thumbnail'
            ],
            'menu_icon' => 'dashicons-networking'
        ]
    );

    // Function to create post Partidas
    register_post_type(
        'partidas',
        [
            'labels' => [
                'name' => __('Partidas'),
                'singular_name' => __('Partida'),
                'add_new' => __('Adicionar Partida'),
                'add_new_item' => __('Adicionar Partida'),
                'edit_item' => __('Editar Partida'),
                'all_items' => __('Todos os Partidas'),
                'view_item' => __('Visualizar Partida'),
                'search_item' => __('Buscar Partida'),
            ],
            'public' => true,
            'has_archive' => false,
            'rewrite' => ['slug' => 'partidas'],
            'supports' => [
                'thumbnail',
                'title'
            ],
            'menu_icon' => 'dashicons-tickets-alt'
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
    // Atletas
    add_meta_box(
        'info-atleta',
        'Informações do Atleta',
        'form_atleta',
        'atletas',
        'normal',
        'high'
    );

    // Patrocinadores
    add_meta_box(
        'info-patrocinador',
        'Informações do Patrocinador',
        'form_patrocinador',
        'patrocinadores',
        'side',
        'high'
    );

    // Campeonatos
    add_meta_box(
        'info-campeonato',
        'Informações do Campeonato',
        'form_campeonato',
        'campeonatos',
        'side',
        'high'
    );

    // Partidas
    add_meta_box(
        'info-partidas',
        'Informações da Partida',
        'form_partida',
        'partidas',
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

    <?= wp_dropdown_pages('posts') ?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form_atleta.css">

    <div class="container">
        <form method="post">
            <fieldset>
                <div class="row form-box">
                    <label class="form-etiqueta" for="nomes">Nome:</label>
                    <input class="form-campo" name="nome" id="nome" type="text" value="<?= $atleta['nome'][0] ?>" required />
                </div>

                <div class="row form-box">
                    <label class="form-etiqueta" for="nome_completo">Nome Completo:</label>
                    <input class="form-campo" name="nome_completo" id="nome_completo" type="text" value="<?= $atleta['nome_completo'][0] ?>" required />
                </div>

                <div class="row form-box">
                    <label class="form-etiqueta" for="altura">Altura: (cm)</label>
                    <input class="form-campo" name="altura" id="altura" type="text" value="<?= $atleta['altura'][0] ?>" />
                </div>

                <div class="row form-box">
                    <label class="form-etiqueta" for="peso">Peso: (kg)</label>
                    <input class="form-campo" name="peso" id="peso" type="text" value="<?= $atleta['peso'][0] ?>" />
                </div>

                <div class="row form-box">
                    <label class="form-etiqueta" for="posicao">Posição:</label>
                    <input class="form-campo" name="posicao" id="posicao" type="text" value="<?= $atleta['posicao'][0] ?>" />
                </div>

                <div class="row form-box">
                    <label class="form-etiqueta" for="data_de_nascimento">Data de Nascimento:</label>
                    <input class="form-campo" name="data_de_nascimento" id="data_de_nascimento" type="date" value="<?= $atleta['data_de_nascimento'][0] ?>" required />
                </div>
            </fieldset>
        </form>
    </div>
<?php
}

/**
 * Create form to Patrocinadores in custom post
 *
 * @param object $post
 * @return void
 */
function form_patrocinador($post)
{
    $patrocinador = get_post_meta($post->ID);
?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form_atleta.css">

    <form method="post">
        <fieldset>
            <div class="row form-box">
                <label class="form-etiqueta" for="site">Site:</label>
                <input class="form-campo-lateral" name="site" id="site" type="text" value="<?= $patrocinador['site'][0] ?>" required />
            </div>
        </fieldset>
    </form>
<?php
}

/**
 * Create form to Campeonatos in custom post
 *
 * @param object $post
 * @return void
 */
function form_campeonato($post)
{
    $campeonato = get_post_meta($post->ID);
    $ano_atual = date('Y');
    $primeiro_ano = $ano_atual - 30;
    $ultimo_ano = date('Y') + 1;
?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form_atleta.css">

    <form method="post">
        <fieldset>
            <div class="row form-box">
                <label class="form-etiqueta" for="campeonato_ano">Ano:</label>
                <select class="form-campo" name="campeonato_ano">
                    <?php foreach (range($ultimo_ano, $primeiro_ano) as $ano) : ?>
                        <option value="<?= $ano ?>" <?= $campeonato['campeonato_ano'][0] == $ano ? 'selected' : '' ?>>
                            <?= $ano ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </fieldset>
    </form>
<?php
}

/**
 * Create form to Partidas in custom post
 *
 * @param object $post
 * @return void
 */
function form_partida($post)
{
    $partida = get_post_meta($post->ID);
    $clube = meu_clube();
    $partida = get_post_meta($post->ID);

?>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo("template_directory"); ?>/css/form_partidas.css">

    <form method="post">
        <fieldset>
            <input type="text" value="<?= $clube ?>" id="nome_clube" hidden />
            <section class="container partida-data">
                <div class="seletores-box item-seletores">
                    <input class="rad-mandante" type="radio" name="mandante_visitante" id="rad-mandante" value="mandante" />
                    <label for="mandante">
                        <span>Mandante</span>
                    </label>
                </div>
                <div class="seletores-box item-seletores">
                    <input class="rad-visitante" type="radio" name="mandante_visitante" id="rad-visitante" value="visitante" />
                    <label for="visitante">
                        <span>Visitante</span>
                    </label>
                </div>
                <div class="data-partida item-seletores">
                    <label>
                        <span>Data</span>
                    </label>
                    <input type="date" name="data" id="data" value="<?= $partida['data'][0] ?>" />
                </div>
                <div class="data-partida item-seletores">
                    <label id="estadio">
                        <span>Estadio</span>
                    </label>
                    <input type="text" name="estadio" id="estadio" value="<?= $partida['estadio'][0] ?>" />
                </div>
                <div class="data-partida item-seletores">
                    <label id="horario">
                        <span>Horário</span>
                    </label>
                    <input type="time" name="horario" id="horario" value="<?= $partida['horario'][0] ?>" />
                </div>
            </section>

            <section class="container partida-formulario">
                <div class="item-partida">
                    <label for="mandante">
                        <span>Mandante</span>
                    </label>
                    <input type="text" name="mandante" id="mandante" value="<?= $partida['mandante'][0] ?>" />
                </div>
                <div class="item-partida caixa-x">
                    <span>X</span>
                </div>

                <div class="item-partida item-visitante">
                    <input type="text" name="visitante" id="visitante" value="<?= $partida['visitante'][0] ?>" />
                    <label id="visitante">
                        <span>Visitante</span>
                    </label>
                </div>
            </section>
        </fieldset>
    </form>

    <script type="text/javascript">
        let buttonMandante = document.getElementById('rad-mandante');
        let buttonVisitante = document.getElementById('rad-visitante');

        buttonMandante.addEventListener('click', function() {
            document.getElementById('mandante').value = document.getElementById('nome_clube').value;
            document.getElementById('mandante').readOnly = true;
            document.getElementById('visitante').value = null;
            document.getElementById('visitante').readOnly = false;
        });

        buttonVisitante.addEventListener('click', function() {
            document.getElementById('visitante').value = document.getElementById('nome_clube').value;
            document.getElementById('visitante').readOnly = true;
            document.getElementById('mandante').value = null;
            document.getElementById('mandante').readOnly = false;
        });

        function escondeLabelVisitante() {
            if (window.matchMedia("(max-width: 768px)").matches) {
                document.getElementById('visitante-desk').style.display = 'none';
                document.getElementById('visitante-mobile').style.display = 'block';
            }

            if (window.matchMedia("(min-width: 768px)").matches) {
                document.getElementById('visitante-mobile').style.display = 'none';
                document.getElementById('visitante-desk').style.display = 'block';
            }
        }

        window.onload = function() {
            if (document.getElementById('nome_clube').value == document.getElementById('mandante').value) {
                document.getElementById('rad-mandante').checked = true;
                document.getElementById('mandante').readOnly = true;
            }

            if (document.getElementById('nome_clube').value == document.getElementById('visitante').value) {
                document.getElementById('rad-visitante').checked = true;
                document.getElementById('visitante').readOnly = true;
            }

            escondeLabelVisitante();
        }

        window.addEventListener("resize", function() {
            escondeLabelVisitante();
        });
    </script>
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
        $wpdb->update($wpdb->posts, ['post_title' => sanitize_text_field($_POST['nome'])], ['ID' => $post_id]);
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
 * Save custom post Campeonato in SQL
 *
 * @param int $post_id
 * @return void
 */
function save_campeonato($post_id)
{
    if (isset($_POST['campeonato_ano'])) {
        update_post_meta($post_id, 'campeonato_ano', sanitize_text_field($_POST['campeonato_ano']));
    }
}

/**
 * Call function to save cutom post Campeonato in SQL
 */
add_action('save_post', 'save_campeonato');

/**
 * Save custom post Partidas in SQL
 *
 * @param int $post_id
 * @return void
 */
function save_partidas($post_id)
{
    $clube = meu_clube();

    if (isset($_POST['mandante_visitante'])) {
        if ($_POST['mandante_visitante'] === 'mandante') {
            update_post_meta($post_id, 'mandante', $clube);
            update_post_meta($post_id, 'visitante', sanitize_text_field($_POST['visitante']));
        }

        if ($_POST['mandante_visitante'] === 'visitante') {
            update_post_meta($post_id, 'visitante', $clube);
            update_post_meta($post_id, 'mandante', sanitize_text_field($_POST['mandante']));
        }
    }

    if (isset($_POST['data'])) {
        update_post_meta($post_id, 'data', sanitize_text_field($_POST['data']));
    }

    if (isset($_POST['estadio'])) {
        update_post_meta($post_id, 'estadio', sanitize_text_field($_POST['estadio']));
    }

    if (isset($_POST['horario'])) {
        update_post_meta($post_id, 'horario', sanitize_text_field($_POST['horario']));
    }

    if (isset($_POST['mandante']) && isset($_POST['visitante'])) {
        $post_name = sanitize_text_field($_POST['mandante'] . ' x ' . $_POST['visitante']);
        wp_update_post([
            'ID' => $post_id,
            'post_title' => $post_name,
        ]);
    }
}

/**
 * Call function to save cutom post Campeonato in SQL
 */
add_action('save_post', 'save_partidas');


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
    $html_sobre = '
        <article class="sub-texto">
            <p class="texto-pagina">Conteúdo sobre o Clube.</p>
        </article>';

    $html_extras = '
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
        </article>';


    if (get_option('function_execute_once_01') !== 'completed') {
        $page_sobre = [
            'post_title' => 'Sobre o Clube',
            'post_content' => $html_sobre,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page'
        ];

        $page_partidas = [
            'post_title' => 'Partidas',
            'post_content' => '',
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
        wp_insert_post($page_partidas);
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

/**
 * Create Campeonatos taxonomy
 *
 * @return void
 */
function create_campeonatos()
{
    $singular_name = __('Campeonato');
    $plural_name = __('Campeonatos');

    $args = [
        'labels' => [
            'name' => $plural_name,
            'singular_name' => $singular_name,
            'singular_name' => $singular_name,
            'edit_item' => $singular_name,
            'add_new_item' => __("Adicionar novo $singular_name"),
            'add_new' => __("Adicionar novo", $singular_name),
            'new_item' => __("Novo $singular_name"),
            'all_items' => __("All $plural_name"),
            'view_item' => __("Visualizar $singular_name"),
            'search_items' => __("Busque pelo $singular_name"),
            'not_found' =>  __("Não foi encontrado nenhum $plural_name"),
            'not_found_in_trash' => __("Nenhum $singular_name na lixiera"),
            'parent_item_colon' => '',
            'menu_name' => $plural_name
        ],
        'public' => true,
        'hierarchical' => true,
        'has_archive' => true,
        'supports' => array('thumbnail'),
        'show_ui'           => true,
        'show_admin_column' => true,
    ];

    register_taxonomy('campeonatos', 'partidas', $args);
}

/**
 * Call function to create taxonomy Campeonatos
 */
add_action('init', 'create_campeonatos');





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





function meu_clube()
{
    return $meu_clube = "Meu Clube";
}
