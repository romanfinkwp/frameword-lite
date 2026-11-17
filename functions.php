<?php

function framewordlite_fse_styles() {

    wp_enqueue_style(

        'frameword-lite-style',

        get_stylesheet_uri(),

        array(),

        wp_get_theme()->get( 'Version' )

    );

}

add_action( 'wp_enqueue_scripts', 'framewordlite_fse_styles' );


if ( ! function_exists( 'framewordlite_fse_setup' ) ) {

    function framewordlite_fse_setup() {

        add_theme_support( 'wp-block-styles' );

        add_editor_style( 'style.css' );

    }

}

add_action( 'after_setup_theme', 'framewordlite_fse_setup' );


remove_theme_support( 'core-block-patterns' );


add_filter( 'should_load_remote_block_patterns', '__return_false' );


function framewordlite_register_block_styles() {

    /* BLOCK: DETAILS */

    register_block_style( 'core/heading', array(

        'name'  	=> 'frameword-text-wrap-balance',

        'label' 	=> esc_html__( 'Balance Wrap', 'frameword-lite' ),

    ) );

    register_block_style( 'core/paragraph', array(

        'name'  	=> 'frameword-text-wrap-balance',

        'label' 	=> esc_html__( 'Balance Wrap', 'frameword-lite' ),

    ) );

    register_block_style( 'core/details', array(

        'name'  	=> 'frameword-rounded-borders',

        'label' 	=> esc_html__( 'Rounded Borders', 'frameword-lite' ),

    ) );

	register_block_style( 'core/column', array(

        'name'  	=> 'frameword-rounded-borders-10',

        'label' 	=> esc_html__( 'Rounded 10', 'frameword-lite' ),

    ) );

	register_block_style( 'core/column', array(

        'name'  	=> 'frameword-rounded-borders-20',

        'label' 	=> esc_html__( 'Rounded 20', 'frameword-lite' ),

    ) );

	register_block_style( 'core/column', array(

        'name'  	=> 'frameword-rounded-borders-40',

        'label' 	=> esc_html__( 'Rounded 40', 'frameword-lite' ),

    ) );

	register_block_style( 'core/columns', array(

        'name'  	=> 'frameword-reverse',

        'label' 	=> esc_html__( 'Mobile Reverse', 'frameword-lite' ),

    ) );

}

add_action( 'init', 'framewordlite_register_block_styles' );


function framewordlite_register_pattern_categories() {

    if ( function_exists( 'register_block_pattern_category' ) ) {

        register_block_pattern_category(

            'frameword-lite',

            array(

                'label' => __( 'Frameword Patterns', 'frameword-lite' ),

                'description' => __( 'Frameword theme Patterns', 'frameword-lite' ),

            )

        );

    }

}

add_action( 'init', 'framewordlite_register_pattern_categories' );


function framewordlite_setup_notice() {
    $notice_option_name = 'framewordlite_setup_notice_dismissed';
    $is_dismissed = get_option( $notice_option_name );

    if ( ! $is_dismissed && current_user_can( 'edit_theme_options' ) ) {
        $image_url = get_template_directory_uri() . '/assets/img/me.png';
        $notice_text = '<img src="' . esc_url( $image_url ) . '"
            alt="' . esc_attr__( 'Frameword theme author', 'frameword-lite' ) . '"
            style="max-width: 100%; height: auto; border-radius: 6px;" />

        <div class="makoa-notice-text" style="margin-top: 15px;">
            <h3 style="margin: 0 0 8px; font-size: 18px; line-height: 1.3;">
                ' . esc_html__( 'Hi, I’m Roman Fink — the independent developer behind the Frameword theme.',
                'frameword-lite' ) . '
            </h3>

            <p style="margin: 0 0 14px;">
                ' . esc_html__( 'Thanks for supporting a real person. Your upgrade helps me ship updates and new
                features.', 'frameword-lite' ) . '
            </p>





        </div>';
        echo '<div id="frameword-notice" class="notice notice-info is-dismissible">' . wp_kses_post( $notice_text ) . '</div>';
    }
}

add_action( 'admin_notices', 'framewordlite_setup_notice' );


function framewordlite_notice_script() {
    if ( ! wp_script_is( 'jquery', 'done' ) ) {
        wp_enqueue_script( 'jquery' );
    }

    wp_enqueue_script( 'frameword-notice-script', get_template_directory_uri() . '/assets/js/admin-notice.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );
    wp_localize_script( 'frameword-notice-script', 'framewordliteNotice', array( 'nonce' => wp_create_nonce( 'framewordlite_dismiss_notice' ) ) );
}

add_action( 'admin_enqueue_scripts', 'framewordlite_notice_script' );


function framewordlite_enqueue_custom_admin_styles() {
    $notice_option_name = 'framewordlite_setup_notice_dismissed';
    $is_dismissed = get_option( $notice_option_name );
    if ( ! $is_dismissed ) {
        wp_enqueue_style( 'frameword-admin-notice', get_template_directory_uri() . '/assets/css/admin-notice.css' );
    }
}

add_action( 'admin_enqueue_scripts', 'framewordlite_enqueue_custom_admin_styles' );


function framewordlite_dismiss_notice() {
    check_ajax_referer( 'framewordlite_dismiss_notice', 'nonce' );
    if ( current_user_can( 'edit_theme_options' ) ) {
        update_option( 'framewordlite_setup_notice_dismissed', true );
    }
    wp_die();
}

add_action( 'wp_ajax_framewordlite_dismiss_notice', 'framewordlite_dismiss_notice' );

