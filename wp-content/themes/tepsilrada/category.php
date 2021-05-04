<?php
/**
 * The template for displaying category posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

get_header();

dump(get_fields('options'));
?>
    <main class="posts">
        <section class="category">
            <?php if (have_posts()): ?>
                <h1 class="title"><?php single_cat_title(); ?>
                </h1>
                <div class="category__posts">
                    <ul class="mobile-list">
                        <?php while (have_posts()): the_post(); ?>
                            <li class="category__item">
                                <article class="category__post">
                                    <?php if (!get_the_post_thumbnail_url()): ?>
                                        <img src="<?= get_template_directory_uri() . '/assets/embedded/docs.jpg' ?>"
                                             class="category__picture"
                                             alt="">
                                    <?php else: ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>"
                                             class="category__picture"
                                             alt="">
                                    <?php endif; ?>
                                    <div class="category__content-wrapper">
                                        <h2 class="category__caption"><?php the_title(); ?>
                                        </h2>
                                        <h3 class="category__subcaption">
                                            <?php the_excerpt(); ?>
                                        </h3>
                                    </div>
                                    <div class="category__interaction">
                                        <a class="button--sm" href="<?php the_permalink() ?>">
                                            Читати
                                            <img src="<?= get_template_directory_uri() . '/assets/embedded/book.svg' ?>"
                                                 alt="book svg"/>
                                        </a>
                                    </div>
                                </article>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php wp_reset_query();
                wp_reset_postdata(); endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </main>
<?php
get_footer();
?>