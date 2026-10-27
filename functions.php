<?php
if (!defined('ABSPATH')) {
    exit;
}

function nexora_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('responsive-embeds');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('automatic-feed-links');

    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'nexora'),
        )
    );
}
add_action('after_setup_theme', 'nexora_setup');

function nexora_document_title($title) {
    if (is_front_page()) {
        return 'NEXORA';
    }

    return $title;
}
add_filter('pre_get_document_title', 'nexora_document_title');

function nexora_widgets_init() {
    register_sidebar(
        array(
            'name' => __('Primary Sidebar', 'nexora'),
            'id' => 'primary-sidebar',
            'description' => __('Widgets displayed beside archive and single-post content.', 'nexora'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}
add_action('widgets_init', 'nexora_widgets_init');

function nexora_enqueue_assets() {
    wp_enqueue_style(
        'nexora-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_script(
        'nexora-navigation',
        get_theme_file_uri('assets/js/nexora-navigation.js'),
        array(),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'nexora_enqueue_assets');

function nexora_fallback_image_url() {
    return get_theme_file_uri('assets/images/articles/nexora-article-01-ai-infrastructure.png');
}

function nexora_icon($name, $class = '') {
    $filename = sanitize_file_name('nexora-icon-' . $name . '.svg');

    printf(
        '<img class="nexora-icon%1$s" src="%2$s" alt="" aria-hidden="true">',
        $class ? ' ' . esc_attr($class) : '',
        esc_url(get_theme_file_uri('assets/icons/' . $filename))
    );
}

function nexora_post_thumbnail($size = 'large') {
    if (has_post_thumbnail()) {
        the_post_thumbnail(
            $size,
            array(
                'class' => 'post-thumbnail__image',
                'loading' => 'lazy',
            )
        );
        return;
    }

    printf(
        '<img class="post-thumbnail__image" src="%1$s" alt="%2$s" loading="lazy">',
        esc_url(nexora_fallback_image_url()),
        esc_attr(get_the_title())
    );
}

function nexora_pagination() {
    the_posts_pagination(
        array(
            'mid_size' => 1,
            'prev_text' => __('Previous', 'nexora'),
            'next_text' => __('Next', 'nexora'),
            'screen_reader_text' => __('Posts navigation', 'nexora'),
        )
    );
}
