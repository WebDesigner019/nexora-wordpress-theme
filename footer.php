</main>
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="site-footer__inner">
            <a class="site-footer__brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <img src="<?php echo esc_url(get_theme_file_uri('assets/brand/nexora-logo.svg')); ?>" alt="<?php esc_attr_e('NEXORA home', 'nexora'); ?>">
            </a>
            <p class="site-footer__copyright">&copy; <?php echo esc_html(date_i18n('Y')); ?> NEXORA. <?php esc_html_e('All rights reserved.', 'nexora'); ?></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
