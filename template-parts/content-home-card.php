<article id="post-<?php the_ID(); ?>" <?php post_class('nexora-home-card'); ?>>
    <a class="post-thumbnail" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
        <?php nexora_post_thumbnail('medium_large'); ?>
    </a>
    <div class="nexora-home-card__body">
        <p class="entry-meta">
            <span class="entry-meta__item"><?php nexora_icon('calendar'); ?><time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time></span>
            <span aria-hidden="true"> &middot; </span>
            <span class="entry-meta__item"><?php nexora_icon('user'); ?><span><?php echo esc_html(get_the_author()); ?></span></span>
        </p>
        <?php if (has_category()) : ?>
            <p class="nexora-home-card__category"><?php the_category(', '); ?></p>
        <?php endif; ?>
        <h3 class="nexora-home-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="nexora-home-card__excerpt"><?php the_excerpt(); ?></div>
        <a class="nexora-text-link" href="<?php the_permalink(); ?>">
            <?php esc_html_e('Read insight', 'nexora'); ?>
            <?php nexora_icon('arrow-right'); ?>
        </a>
    </div>
</article>
