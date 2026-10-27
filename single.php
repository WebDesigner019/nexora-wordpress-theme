<?php
get_header();
?>
<div class="container">
    <div class="content-with-sidebar">
        <div class="content-with-sidebar__main">
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'single'); ?>
                <?php
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                ?>
            <?php endwhile; ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php
get_footer();
?>
