<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <p class="entry-meta">
            <span class="entry-meta__item"><?php nexora_icon('calendar'); ?><time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time></span>
            <span aria-hidden="true"> &middot; </span>
            <span class="entry-meta__item"><?php nexora_icon('user'); ?><span><?php echo esc_html(get_the_author()); ?></span></span>
        </p>
        <h1 class="entry-title"><?php the_title(); ?></h1>

        <?php if (has_category() || has_tag()) : ?>
            <div class="entry-taxonomy">
                <?php the_category(', '); ?>
                <?php if (has_tag()) : ?>
                    <span class="entry-tags"><?php the_tags('', ', '); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </header>

    <figure class="post-thumbnail post-thumbnail--single">
        <?php nexora_post_thumbnail('full'); ?>
    </figure>

    <div class="entry-content">
        <?php
        the_content();
        wp_link_pages(
            array(
                'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page links', 'nexora') . '"><span class="page-links__label">' . esc_html__('Pages:', 'nexora') . '</span>',
                'after' => '</nav>',
            )
        );
        ?>
    </div>

    <?php if (is_singular('post') && get_the_ID() === 15) : ?>
        <?php get_template_part('template-parts/article-diagram', null, array('diagram' => 'rag')); ?>
    <?php elseif (is_singular('post') && get_the_ID() === 19) : ?>
        <?php get_template_part('template-parts/article-diagram', null, array('diagram' => 'api')); ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/editorial-author'); ?>
</article>
