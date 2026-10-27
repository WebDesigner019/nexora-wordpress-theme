<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
        <?php nexora_post_thumbnail('medium_large'); ?>
    </a>

    <header class="entry-header">
        <p class="entry-meta">
            <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time>
            <span aria-hidden="true"> &middot; </span>
            <span><?php echo esc_html(get_the_author()); ?></span>
        </p>
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>

    <div class="entry-content">
        <?php the_excerpt(); ?>
    </div>
</article>
