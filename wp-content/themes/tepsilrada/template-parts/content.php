<?php
/**
 * Template part for displaying posts
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
    <div class="category-posts__title-wrapper">
        <h3 class="category-posts__post__title"><?php the_title() ?></h3>
        <p class="category-posts__post__text"><?php the_excerpt() ?></p>
    </div>
    <footer class="category-posts__post__info-wrapper">
        <p class="category-posts__post__info__date">
            <?php the_date() ?>
        </p>
        <a href="<?php the_permalink(get_the_ID()); ?>" class="button__size_sm">Читати</a>
    </footer>
</article>