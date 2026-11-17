<?php
/**
 * Title: 404 text
 * Slug: frameword-lite/404
 * Categories: frameword-lite
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80","right":"var:preset|spacing|40","left":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--80);padding-left:var(--wp--preset--spacing--40)"><!-- wp:paragraph -->
    <p><?php esc_html_e('┐(￣ヘ￣;)┌', 'frameword-lite'); ?></p>
    <!-- /wp:paragraph -->

    <!-- wp:heading {"level":1} -->
    <h1 class="wp-block-heading"><?php esc_html_e('404. Page not found.', 'frameword-lite'); ?></h1>
    <!-- /wp:heading -->

    <!-- wp:paragraph -->
    <p><?php echo wp_kses_post( __( 'It looks like you\'ve reached a URL that doesn’t exist. Let\'s start from the beginning! <a href="/">Go to the main page →</a>', 'frameword-lite' ) ); ?></p>
    <!-- /wp:paragraph --></main>
<!-- /wp:group -->
