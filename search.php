<?php
get_header();
?>
<div class="container">
    <div class="content-with-sidebar">
        <div class="content-with-sidebar__main">
            <header class="archive-header">
                <h1 class="archive-title"><?php printf(esc_html__('Search results for: %s', 'nexora'), get_search_query()); ?></h1>
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
