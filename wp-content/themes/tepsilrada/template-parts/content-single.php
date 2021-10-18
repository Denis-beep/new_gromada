<?php
/**
 * The template for displaying in single post
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tepsilrada
 */
get_header( )
?>
<?php global $post ?>
	<main id="primary" class="post-item__main">
	<article class="post__single | wow fadeInLeftBig" role="article ">
            <h1 class="post title"><?php the_title();?></h1>
            <p class="post__text">
                <?php if(get_the_post_thumbnail_url() !== false) : ?>
                <img src="<?php the_post_thumbnail_url([1200, 450]); ?>" alt="<?php the_title(); ?>">
                <?php endif ?>
                <?php the_content();?>
            </p>
        </article>

<?php
	get_sidebar('sidebar-1');
?>
	</main>

<?php get_footer() ?>