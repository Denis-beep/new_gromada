<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

?>

<article class="category-posts__post">
    <div class="category-posts__image-wrapper">
        <?php if (get_the_post_thumbnail_url(get_the_ID(), [920, 680]) !== false): ?>
            <img class="category-posts__post-image" src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        <?php endif; ?>
    </div>
    <div class="category-posts__content-wrapper">
        <h3 class="category-posts__title"><?php the_title() ?></h3>
        <?php the_excerpt() ?>
    </div>
    <footer class="category-posts__info-wrapper">
        <span class="news__date"><?= get_the_date('d.m.Y'); ?></span>
        <a href="<?php the_permalink(get_the_ID()); ?>" class="button__size_sm">Читати</a>
    </footer>
</article>
