<?php

/**
 * Does not allow executing this file, if it is not executed by Wordpress
 */
if (!defined('ABSPATH')) {
    die;
}

/**
 * Create club settings
 *
 * @return void
 */
function create_club_settings()
{
    add_menu_page(
        __('My Club'),
        __('My Club'),
        'manage_options',
        'my_club',
        'create_my_club_configurations',
        'dashicons-admin-generic',
        2
    );
}

/**
 * Call function to create club settings
 */
add_action('admin_menu', 'create_club_settings');

/**
 * Function to renderize My Club page
 *
 * @return void
 */
function create_my_club_configurations()
{
?>
    <div>
        <h1><?= __('My Club') ?></h1>
    </div>

    <form method="post" action="options.php">
        <?php do_settings_sections('my_club'); ?>

        <?php settings_fields('group_club'); ?>

        <?php settings_fields('group_social_medias'); ?>

        <?php settings_fields('group_footer'); ?>

        <?php settings_fields('group_admin_settings'); ?>

        <?php submit_button(); ?>
    </form>
<?php
}


/**
 * Ceate Meu Clube section
 *
 * @return void
 */
function create_my_club_section()
{
    // My Club section
    add_settings_section(
        'section_club',
        __('Club Settings'),
        'create_fields_section_club',
        'my_club'
    );


    // Add My Club name field
    add_settings_field(
        'section_club_name',
        __('Club name'),
        'club_name',
        'my_club',
        'section_club'
    );

    // Save My Club name field
    register_setting('group_club', 'section_club_name');

    // // Add My Club third field
    // add_settings_field(
    //     'section_club_logo',
    //     __('Club Logo'),
    //     'club_logo',
    //     'my_club',
    //     'section_club'
    // );

    // // Save My Club third field
    // register_setting('group_club', 'section_club_logo');


    // // Add My Club stadium field
    // add_settings_field(
    //     'section_club_stadium',
    //     __('Club Stadium'),
    //     'club_stadium',
    //     'my_club',
    //     'section_club'
    // );

    // // Save My Club stadium field
    // register_setting('group_club', 'section_club_stadium');


    // // Add My Club stadium field
    // add_settings_field(
    //     'section_club_first',
    //     __('Club First Color:'),
    //     'club_first_color',
    //     'my_club',
    //     'section_club'
    // );

    // // Save My Club stadium field
    // register_setting('group_club', 'section_club_first');


    // // Add My Club second field
    // add_settings_field(
    //     'section_club_second',
    //     __('Club Second Color'),
    //     'club_second_color',
    //     'my_club',
    //     'section_club'
    // );

    // // Save My Club second field
    // register_setting('group_club', 'section_club_second');


    // // Add My Club third field
    // add_settings_field(
    //     'section_club_third',
    //     __('Club Third Color'),
    //     'club_third_color',
    //     'my_club',
    //     'section_club'
    // );

    // // Save My Club third field
    // register_setting('group_club', 'club_third_color');




    // Social Medias section
    add_settings_section(
        'section_social_medias',
        __('Redes Sociais do Meu Clube'),
        'create_fields_section_social_medias',
        'my_club'
    );


    // Add Social Medias store field
    add_settings_field(
        'section_social_medias_store',
        __('Sua Loja'),
        'social_medias_store',
        'my_club',
        'section_social_medias'
    );

    // Save Social Medias store field
    register_setting('group_footer', 'section_social_medias_store');

    // Add Social Medias facebook field
    add_settings_field(
        'section_social_medias_facebook',
        __('Facebook'),
        'social_medias_facebook',
        'my_club',
        'section_social_medias'
    );

    // Save Social Medias facebook field
    register_setting('group_footer', 'section_social_medias_facebook');

    // Add Social Medias twitter field
    add_settings_field(
        'section_social_medias_twitter',
        __('Twitter'),
        'social_medias_twitter',
        'my_club',
        'section_social_medias'
    );

    // Save Social Medias twitter field
    register_setting('group_footer', 'section_social_medias_twitter');

    // Add Social Medias instagram field
    add_settings_field(
        'section_social_medias_instagram',
        __('Instagram'),
        'social_medias_instagram',
        'my_club',
        'section_social_medias'
    );

    // Save Social Medias instagram field
    register_setting('group_footer', 'section_social_medias_instagram');

    // Add Social Medias youtube field
    add_settings_field(
        'section_social_medias_youtube',
        __('YouTube'),
        'social_medias_youtube',
        'my_club',
        'section_social_medias'
    );

    // Save Social Medias youtube field
    register_setting('group_footer', 'section_social_medias_youtube');




    // Footer section
    add_settings_section(
        'section_footer',
        __('Rodapé do Meu Clube'),
        'create_fields_section_footer',
        'my_club'
    );

    // Add Footer about field
    add_settings_field(
        'section_footer_about',
        __('Sobre o Clube'),
        'footer_about',
        'my_club',
        'section_footer'
    );

    // Save Footer about field
    register_setting('group_footer', 'section_footer_about');

    // Add Footer contact field
    add_settings_field(
        'section_footer_contact',
        __('Contatos'),
        'footer_contact',
        'my_club',
        'section_footer'
    );

    // Save Footer contact field
    register_setting('group_footer', 'section_footer_contact');





    // Admin settings section
    add_settings_section(
        'section_settings',
        __('Admin Settings'),
        'create_fields_section_admin',
        'my_club'
    );

    // Sponsors configuration field
    add_settings_field(
        'section_settings_sponsors',
        __('Enabled Sponsors'),
        'settings_sponsors',
        'my_club',
        'section_settings'
    );

    // Register configuration field
    register_setting('group_admin_settings', 'section_settings_sponsors');

    // Players configuration field
    add_settings_field(
        'section_settings_players',
        __('Enabled Players'),
        'settings_players',
        'my_club',
        'section_settings'
    );

    // Register configuration field
    register_setting('group_admin_settings', 'section_settings_players');

    // Gams configuration field
    add_settings_field(
        'section_settings_games',
        __('Enabled Games'),
        'settings_games',
        'my_club',
        'section_settings'
    );

    // Register configuration field
    register_setting('group_admin_settings', 'section_settings_games');
}

/**
 * Call function to create Meu Clube section
 */
add_action('admin_menu', 'create_my_club_section');

/**
 * Comment to section Meu Clube
 *
 * @return void
 */
function create_fields_section_club()
{
?>
    <p><?= __('Configure o nome, o estádio e as cores do seu time.') ?></p>
<?php
}

/**
 * Comment to section Social Medias
 *
 * @return void
 */
function create_fields_section_social_medias()
{
?>
    <p><?= __('Configure os links das redes sociais do seu clube.') ?></p>
<?php
}

/**
 * Comment to section Footer
 *
 * @return void
 */
function create_fields_section_footer()
{
?>
    <p><?= __('Configure os textos que irão no rodapé do clube.') ?></p>
<?php
}

/**
 * Comment to section Footer
 *
 * @return void
 */
function create_fields_section_admin()
{
?>
    <p><?= __('Habilite as páginas no painel do Wordpress que será utilizada pelo Clube.') ?></p>
<?php
}

/**
 * Create input name in Meu Clube page
 *
 * @return void
 */
function club_name()
{
?>
    <input type="text" id="section_club_name" name="section_club_name" style="width: 40%;" value="<?= esc_attr(get_option('section_club_name')) ?>" required />
<?php
}

/**
 * Create input name in Meu Clube page
 *
 * @return void
 */
function club_logo()
{
?>
    <input type="file" id="section_club_logo" name="section_club_logo" style="width: 40%;" value="<?= esc_attr(get_option('section_club_logo')) ?>" />
<?php
}

/**
 * Create input stadium in Meu Clube page
 *
 * @return void
 */
function club_stadium()
{
?>
    <input type="text" id="section_club_stadium" name="section_club_stadium" style="width: 40%;" value="<?= esc_attr(get_option('section_club_stadium')) ?>" required />
<?php
}

/**
 * Create input main color in Meu Clube page
 *
 * @return void
 */
function club_first_color()
{
?>
    <input type="color" id="section_club_first" name="section_club_first" value="<?= esc_attr(get_option('section_club_first')) ?: '#c70039' ?>" />
<?php
}

/**
 * Create input second color in Meu Clube page
 *
 * @return void
 */
function club_second_color()
{
?>
    <input type="color" id="section_club_second" name="section_club_second" value="<?= esc_attr(get_option('section_club_second')) ?: '#FFC300' ?>" />
<?php
}

/**
 * Create input third color in Meu Clube page
 *
 * @return void
 */
function club_third_color()
{
?>
    <input type="color" id="section_club_third" name="section_club_third" value="<?= esc_attr(get_option('section_club_third')) ?: '#FFFFFF' ?>" />
<?php
}

/**
 * Create input store in Meu Clube page
 *
 * @return void
 */
function social_medias_store()
{
?>
    <input type="text" id="section_social_medias_store" name="section_social_medias_store" style="width: 40%;" value="<?= esc_attr(get_option('section_social_medias_store')) ?>" />
<?php
}

/**
 * Create input facebook in Meu Clube page
 *
 * @return void
 */
function social_medias_facebook()
{
?>
    <input type="text" id="section_social_medias_facebook" name="section_social_medias_facebook" style="width: 40%;" value="<?= esc_attr(get_option('section_social_medias_facebook')) ?>" />
<?php
}

/**
 * Create input twitter in Meu Clube page
 *
 * @return void
 */
function social_medias_twitter()
{
?>
    <input type="text" id="section_social_medias_twitter" name="section_social_medias_twitter" style="width: 40%;" value="<?= esc_attr(get_option('section_social_medias_twitter')) ?>" />
<?php
}

/**
 * Create input instagram in Meu Clube page
 *
 * @return void
 */
function social_medias_instagram()
{
?>
    <input type="text" id="section_social_medias_instagram" name="section_social_medias_instagram" style="width: 40%;" value="<?= esc_attr(get_option('section_social_medias_instagram')) ?>" />
<?php
}

/**
 * Create input youtube in Meu Clube page
 *
 * @return void
 */
function social_medias_youtube()
{
?>
    <input type="text" id="section_social_medias_youtube" name="section_social_medias_youtube" style="width: 40%;" value="<?= esc_attr(get_option('section_social_medias_youtube')) ?>" />
<?php
}

/**
 * Create textarea about in Meu Clube page
 *
 * @return void
 */
function footer_about()
{
?>
    <textarea type="text" id="section_footer_about" name="section_footer_about" style="width:40%; height:100px;" maxlength="300" value="">
        <?= esc_attr(get_option('section_footer_about')) ?: __('Insira o texto que irá no campo Sobre o Clube do rodapé.') ?>
    </textarea>
    <p><?= __('Limite máximo de 300 caracteres.') ?></p>
<?php
}

/**
 * Create textarea contact in Meu Clube page
 *
 * @return void
 */
function footer_contact()
{
?>
    <textarea type="text" id="section_footer_contact" name="section_footer_contact" style="width:40%; height:100px;" maxlength="300" value="">
        <?= esc_attr(get_option('section_footer_contact')) ?: __('Insira o texto que irá no campo Entre em Contato do rodapé.') ?>
    </textarea>
    <p><?= __('Limite máximo de 300 caracteres.') ?></p>
<?php
}

/**
 * Create textarea contact in Meu Clube page
 *
 * @return void
 */
function settings_sponsors()
{
?>
    <select id="section_settings_sponsors" name="section_settings_sponsors">
        <option <?= esc_attr(get_option('section_settings_sponsors')) === '1' ? 'selected' : '' ?> value="1"><?= __('Yes') ?></option>
        <option <?= esc_attr(get_option('section_settings_sponsors')) === '0' ? 'selected' : '' ?> value="0"><?= __('No') ?></option>
    </select>
<?php
}

/**
 * Create textarea contact in Meu Clube page
 *
 * @return void
 */
function settings_players()
{
?>
    <select id="section_settings_players" name="section_settings_players">
        <option <?= esc_attr(get_option('section_settings_players')) === '1' ? 'selected' : '' ?> value="1"><?= __('Yes') ?></option>
        <option <?= esc_attr(get_option('section_settings_players')) === '0' ? 'selected' : '' ?> value="0"><?= __('No') ?></option>
    </select>
<?php
}

/**
 * Create textarea contact in Meu Clube page
 *
 * @return void
 */
function settings_games()
{
?>
    <select id="section_settings_games" name="section_settings_games">
        <option <?= esc_attr(get_option('section_settings_games')) === '1' ? 'selected' : '' ?> value="1"><?= __('Yes') ?></option>
        <option <?= esc_attr(get_option('section_settings_games')) === '0' ? 'selected' : '' ?> value="0"><?= __('No') ?></option>
    </select>
<?php
}
