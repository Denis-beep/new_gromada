<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

?>
<li class="news__item">
    <article class="news__wrapper">
<?php if(get_the_post_thumbnail_url()): ?>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="фото новини" class="news__picture"/>
        <?php endif; ?>        <div class="news__info">
            <h2 class="news__caption">
                <?php the_title(); ?>
            </h2>
            <h3 class="news__subcaption">
                <?php the_excerpt(); ?>
            </h3>
        </div>
        <div class="news__interaction">
			<span class="news__date"><?= get_the_date('d.m.Y'); ?></span>
            <a href="<?php the_permalink(); ?>" class="button--sm">Читати
                <img src="<?= get_template_directory_uri() . '/assets/embedded/book.svg' ?>" alt="book svg"/>
            </a>
        </div>
    </article>
</li>
