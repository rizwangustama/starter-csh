<?php
add_action('wp_enqueue_scripts', function () {
    $version = md5_file(get_stylesheet_directory() . '/mix-manifest.json');
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    wp_enqueue_script(
        'jquery',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js',
    );

    wp_enqueue_style(
        'fontAwesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css',
        [],
        '5.9.0'
    );
    

    wp_enqueue_style(
        'woocommerce',
        get_stylesheet_directory_uri() . '/woocommerce.css',
        [],
        $version
    );

    wp_enqueue_style(
        'app',
        get_stylesheet_directory_uri() . '/dist/css/app.css',
        [],
        $version
    );
    wp_enqueue_style(
        'Poppins',
        'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
        [],
        $version
    );
    wp_enqueue_style(
        'Inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap',
        [],
        $version
    );
    wp_enqueue_script(
        'manifest',
        get_stylesheet_directory_uri() . '/dist/js/manifest.js',
        [],
        $version,
        true
    );
    wp_enqueue_script(
        'vendor',
        get_stylesheet_directory_uri() . '/dist/js/vendor.js',
        [],
        $version,
        true
    );
    wp_enqueue_script(
        'app',
        get_stylesheet_directory_uri() . '/dist/js/app.js',
        ['manifest', 'vendor'],
        $version,
        true
    );
    wp_localize_script('app', 'settings', [
        "images" => get_stylesheet_directory_uri() . "/resources/images",
        "endpoint"  => site_url("wp-json"),
        'nonce' => wp_create_nonce('ajax_nonce'),
        'site'=>[
            'url' => site_url(),
        ],
        'primary_menu' => wp_get_menu_array(2),
        'social' => [
            'facebook' => get_field('facebook', 'option') ?? null,
            'instagram' => get_field('instagram', 'option') ?? null,
            'twitter' => get_field('twitter', 'option') ?? null,
            'youtube' => get_field('youtube', 'option') ?? null,
            'linkedin' => get_field('linkedin', 'option') ?? null
        ],
        'footer_setting' => get_field('meta_footer_setting', 'option') ?? null,
        'contact_us_setting' => get_field('meta_section_setting', 'option') ?? null,
        'alert_banner' =>get_field('meta_alert_banner', 'option') ?? null
    ]);
});