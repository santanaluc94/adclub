<?php

/**
 * Enable setting if Sponsors is enable
 */
if ((bool) esc_attr(get_option('section_settings_sponsors')) === true) {
    /**
     * Create custom post Sponsors
     *
     * @return void
     */
    function create_post_sponsor()
    {
        register_post_type(
            'sponsors',
            [
                'labels' => [
                    'name' => __('Sponsors', 'BR'),
                    'singular_name' => __('Sponsor', 'BR'),
                    'add_new' => __('Add Sponsor', 'BR'),
                    'add_new_item' => __('Add new Sponsor', 'BR'),
                    'edit_item' => __('Edit Sponsor', 'BR'),
                    'all_items' => __('All Sponsors', 'BR'),
                    'view_item' => __('View Sponsor', 'BR'),
                    'search_item' => __('Search Sponsor', 'BR'),
                ],
                'public' => true,
                'has_archive' => false,
                'rewrite' => ['slug' => 'sponsor'],
                'supports' => [
                    'thumbnail',
                    'title'
                ],
                'menu_icon' => 'dashicons-money'
            ]
        );
    }

    /**
     * Call function to create custom post Sponsor
     */
    add_action('init', 'create_post_sponsor');

    /**
     * Create form to Sponsors in SQL
     */
    function register_custom_posts_sponsor()
    {
        // Patrocinadores
        add_meta_box(
            'sponsors-info',
            __('Sponsors Information', 'BR'),
            'form_sponsors',
            'sponsors',
            'side',
            'high'
        );
    }

    /**
     * Call function to create form to Sponsors
     */
    add_action('add_meta_boxes', 'register_custom_posts_sponsor');

    /**
     * Create form to custom post Sponsors
     *
     * @param array $post
     * @return void
     */
    function form_sponsors($post)
    {
        $sponsor = get_post_meta($post->ID);
?>
        <?php if ($_SESSION['my_admin_errors_sponsors']) : ?>
            <div class="error">
                <p><?= $_SESSION['my_admin_errors_sponsors'] ?></p>
                <?php unset($_SESSION['my_admin_errors_sponsors']); ?>
            </div>
        <?php endif; ?>

        <form method="post">
            <fieldset>
                <div class="row form-box">
                    <label class="form-lab" for="site"><?= __('Site') ?>:</label>
                    <input class="form-sidebar" name="site" id="site" type="text" value="<?= $sponsor['site'][0] ?>" required />
                </div>
            </fieldset>
        </form>
<?php
    }

    /**
     * Save custom post Sponsor in SQL
     *
     * @param int $post_id
     * @return void
     */
    function save_sponsor($post_id)
    {
        $_SESSION['my_admin_errors_sponsors'] = '';

        if (isset($_POST['site'])) {
            if (filter_var($_POST['site'], FILTER_VALIDATE_URL)) {
                update_post_meta($post_id, 'site', sanitize_text_field($_POST['site']));
            } else {
                $_SESSION['my_admin_errors_sponsors'] .= __('The field Site must be an URL.');
                return;
            }
        }
    }

    /**
     * Call function to save cutom post Sponsor in SQL
     */
    add_action('save_post', 'save_sponsor');
}
