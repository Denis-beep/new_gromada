<?php

/**
 * The template for displaying single post
 * 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tepsilrada
 */

get_header();
?>
<?php global $post; ?>
    <main class="post">
        <article class="post">
            <h1 class="title"><?php the_title();?></h1>
            <div class="post__info" role="article" aria-label="text">
				<div class="post__date">
					<span class="news__date"><?= get_the_date('d.m.Y'); ?></span>
				</div>
				
                <?php the_content();?>
				
            </div>
        </article>
        <?php get_sidebar(); ?>
    </main>
<?php wp_reset_postdata(); get_footer(); ?>