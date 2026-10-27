<?php
get_header();

$nexora_default_category_id = (int) get_option('default_category');
$nexora_editorial_query_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => false,
);
if ($nexora_default_category_id) {
    $nexora_editorial_query_args['category__not_in'] = array($nexora_default_category_id);
}

$hero_query = new WP_Query(
    array_merge(
        $nexora_editorial_query_args,
        array(
            'posts_per_page' => 1,
        )
    )
);

$hero_post_id = $hero_query->have_posts() ? $hero_query->posts[0]->ID : 0;
$featured_query = new WP_Query(
    array_merge(
        $nexora_editorial_query_args,
        array(
            'posts_per_page' => 3,
            'post__not_in' => $hero_post_id ? array($hero_post_id) : array(),
        )
    )
);

$excluded_article_ids = array_map('intval', wp_list_pluck($featured_query->posts, 'ID'));
if ($hero_post_id) {
    $excluded_article_ids[] = $hero_post_id;
}

$article_query = new WP_Query(
    array_merge(
        $nexora_editorial_query_args,
        array(
            'posts_per_page' => 4,
            'post__not_in' => array_unique($excluded_article_ids),
        )
    )
);

if ($hero_query->have_posts()) {
    $hero_query->the_post();
}

?>

<div class="nexora-home">
    <section class="nexora-home-hero" aria-labelledby="nexora-home-title">
        <div class="container">
            <div class="nexora-home-hero__media">
                <img
                    class="post-thumbnail__image"
                    src="<?php echo esc_url(get_theme_file_uri('assets/images/hero/nexora-hero-01-data-center.png')); ?>"
                    alt="<?php esc_attr_e('Technology infrastructure', 'nexora'); ?>"
                >

                <div class="nexora-home-hero__overlay"></div>
                <div class="nexora-home-hero__content">
                    <p class="eyebrow"><?php esc_html_e('Technology editorial', 'nexora'); ?></p>
                    <h1 id="nexora-home-title">NEXORA</h1>
                    <p class="nexora-home-hero__tagline">
                        <?php esc_html_e('Technology Insights for a Smarter Tomorrow', 'nexora'); ?>
                    </p>

                    <?php if ($hero_post_id) : ?>
                        <p class="nexora-home-hero__article-label"><?php esc_html_e('Latest insight', 'nexora'); ?></p>
                        <h2 class="nexora-home-hero__article-title"><?php the_title(); ?></h2>
                        <p class="nexora-home-hero__summary"><?php echo esc_html(wp_trim_words(wp_strip_all_tags(get_the_excerpt()), 28)); ?></p>
                        <div class="nexora-home-hero__meta">
                            <time datetime="<?php echo esc_attr(get_the_date(DATE_W3C)); ?>"><?php echo esc_html(get_the_date()); ?></time>
                            <span aria-hidden="true">&middot;</span>
                            <span><?php echo esc_html(get_the_author()); ?></span>
                        </div>
                        <a class="nexora-button-primary" href="<?php the_permalink(); ?>">
                            <?php esc_html_e('Read the latest insight', 'nexora'); ?>
                        </a>
                    <?php else : ?>
                        <p class="nexora-home-hero__summary">
                            <?php esc_html_e('Clean, credible perspectives on the technologies shaping what comes next.', 'nexora'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php wp_reset_postdata(); ?>

    <?php
    $nexora_topics = get_categories(
        array(
            'hide_empty' => true,
            'exclude' => $nexora_default_category_id,
        )
    );
    if ($nexora_topics) :
        ?>
        <nav class="nexora-topic-nav" aria-label="<?php esc_attr_e('Explore topics', 'nexora'); ?>">
            <div class="container nexora-topic-nav__inner">
                <span class="nexora-topic-nav__label"><?php esc_html_e('Explore topics', 'nexora'); ?></span>
                <ul>
                    <?php foreach ($nexora_topics as $nexora_topic) : ?>
                        <li>
                            <a href="<?php echo esc_url(get_category_link($nexora_topic->term_id)); ?>">
                                <?php echo esc_html($nexora_topic->name); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    <?php endif; ?>

    <section class="nexora-home-section" aria-labelledby="nexora-featured-title">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow"><?php esc_html_e('Editor\'s selection', 'nexora'); ?></p>
                    <h2 id="nexora-featured-title"><?php esc_html_e('Featured editorial', 'nexora'); ?></h2>
                </div>
            </div>

            <?php if ($featured_query->have_posts()) : ?>
                <div class="nexora-featured-grid">
                    <?php while ($featured_query->have_posts()) : $featured_query->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'home-card'); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p class="nexora-empty-state"><?php esc_html_e('Featured editorial will appear here as posts are published.', 'nexora'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php wp_reset_postdata(); ?>

    <section class="nexora-home-section nexora-home-section--muted" aria-labelledby="nexora-articles-title">
        <div class="container">
            <div class="section-heading">
                <div>
                    <p class="eyebrow"><?php esc_html_e('Latest perspective', 'nexora'); ?></p>
                    <h2 id="nexora-articles-title"><?php esc_html_e('Across technology and research', 'nexora'); ?></h2>
                </div>
            </div>

            <?php if ($article_query->have_posts()) : ?>
                <div class="nexora-article-grid">
                    <?php while ($article_query->have_posts()) : $article_query->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'home-card'); ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <p class="nexora-empty-state"><?php esc_html_e('New perspectives will appear here as posts are published.', 'nexora'); ?></p>
            <?php endif; ?>
        </div>
    </section>

    <?php wp_reset_postdata(); ?>

    <section class="nexora-home-section" aria-labelledby="nexora-research-title">
        <div class="container">
            <div class="section-heading section-heading--stacked">
                <p class="eyebrow"><?php esc_html_e('Research desk', 'nexora'); ?></p>
                <h2 id="nexora-research-title"><?php esc_html_e('Make complex systems easier to understand', 'nexora'); ?></h2>
                <p><?php esc_html_e('Explore visual references for the architectures and ideas behind modern technology.', 'nexora'); ?></p>
            </div>

            <div class="nexora-diagram-grid">
                <figure class="nexora-diagram-card">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/diagrams/nexora-diagram-rag-flow.svg')); ?>" alt="<?php esc_attr_e('Retrieval augmented generation flow diagram', 'nexora'); ?>">
                    <figcaption><?php esc_html_e('Retrieval augmented generation flow', 'nexora'); ?></figcaption>
                </figure>
                <figure class="nexora-diagram-card">
                    <img src="<?php echo esc_url(get_theme_file_uri('assets/diagrams/nexora-diagram-api-flow.svg')); ?>" alt="<?php esc_attr_e('API flow diagram', 'nexora'); ?>">
                    <figcaption><?php esc_html_e('API flow', 'nexora'); ?></figcaption>
                </figure>
            </div>
        </div>
    </section>

    <section class="nexora-editorial-note" aria-labelledby="nexora-editorial-title">
        <div class="container nexora-editorial-note__inner">
            <img src="<?php echo esc_url(get_theme_file_uri('assets/images/authors/nexora-editorial-avatar.svg')); ?>" alt="" class="nexora-editorial-note__avatar">
            <div>
                <p class="eyebrow"><?php esc_html_e('Editorial perspective', 'nexora'); ?></p>
                <h2 id="nexora-editorial-title"><?php esc_html_e('NEXORA Editorial', 'nexora'); ?></h2>
                <p><?php esc_html_e('A considered point of view on the tools, systems, and research shaping a smarter tomorrow.', 'nexora'); ?></p>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
?>
