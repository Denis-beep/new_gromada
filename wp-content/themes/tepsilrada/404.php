<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package tepsilrada
 */

get_header();
?>
<script>window.location.href = '/';</script>
	<main role="main" class="not-found__main">
        <section class="not-found__container">

            <h1 class="not-found__title">404</h1>
            <h2 class="not-found__text"><?php esc_html_e( 'Вибачте, але цієї сторінки не існує.', 'tepsilrada' ); ?></h2>
</section>
</main>

<?php
get_footer();
