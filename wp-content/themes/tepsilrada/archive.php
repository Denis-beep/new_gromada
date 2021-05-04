<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

get_header();
?>
	<main id="primary" class="category-posts__main">
		<?php if ( have_posts() ) : ?>
			<div class="category-posts__content">
            <h1 class="category-posts title"><strong><? the_archive_title() ?></strong></h1>
            <div class="category-posts__list">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			else :

			get_template_part( 'template-parts/content', 'none' );

			endif;
		?>
            </div>

        </div>
		<? get_sidebar();?>

	</main>

<?php
get_sidebar();
get_footer();
