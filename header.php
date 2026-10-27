<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'nexora'); ?></a>
<header class="site-header" role="banner">
    <div class="container">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/brand/nexora-logo.svg')); ?>" alt="<?php esc_attr_e('NEXORA home', 'nexora'); ?>">
                </a>
            <?php endif; ?>
        </div>

        <button class="menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
            <img src="<?php echo esc_url(get_theme_file_uri('assets/icons/nexora-icon-menu.svg')); ?>" alt="" aria-hidden="true">
            <span class="screen-reader-text"><?php esc_html_e('Open menu', 'nexora'); ?></span>
        </button>

        <nav class="main-navigation" aria-label="<?php esc_attr_e('Primary navigation', 'nexora'); ?>">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'fallback_cb' => false,
                    'menu_id' => 'primary-menu',
                    'menu_class' => 'menu',
                )
            );
            ?>
        </nav>

        <form class="nexora-header-search" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <label class="screen-reader-text" for="nexora-header-search-input"><?php esc_html_e('Search NEXORA', 'nexora'); ?></label>
            <input id="nexora-header-search-input" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search', 'nexora'); ?>">
            <button type="submit">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/icons/nexora-icon-search.svg')); ?>" alt="" aria-hidden="true">
                <span class="screen-reader-text"><?php esc_html_e('Submit search', 'nexora'); ?></span>
            </button>
        </form>
    </div>
</header>
<main id="primary" class="site-main">
