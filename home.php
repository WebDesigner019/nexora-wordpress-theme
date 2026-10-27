<?php
$posts_page_id = (int) get_option('page_for_posts');
$posts_page_title = $posts_page_id ? get_the_title($posts_page_id) : __('Latest articles', 'nexora');

get_header();
?>
<div class="container">
    <div class="content-with-sidebar">
        <div class="content-with-sidebar__main">
            <header class="archive-header">
                <p class="eyebrow"><?php esc_html_e('NEXORA journal', 'nexora'); ?></p>
                <h1 class="archive-title"><?php echo esc_html($posts_page_title); ?></h1>
            </header>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', get_post_type()); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>

            <?php nexora_pagination(); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
?>
