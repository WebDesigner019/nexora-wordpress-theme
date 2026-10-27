<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!is_active_sidebar('primary-sidebar')) {
    return;
}
?>
<aside class="site-sidebar" aria-label="<?php esc_attr_e('Sidebar', 'nexora'); ?>">
    <?php dynamic_sidebar('primary-sidebar'); ?>
</aside>
