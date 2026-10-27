<?php
get_header();
?>
<div class="container">
    <article class="page">
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e('Page not found', 'nexora'); ?></h1>
        </header>
        <div class="entry-content">
            <p><?php esc_html_e('The page you are looking for could not be found.', 'nexora'); ?></p>
        </div>
    </article>
</div>
<?php
get_footer();
?>
