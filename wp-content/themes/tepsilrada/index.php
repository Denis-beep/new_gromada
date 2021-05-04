<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

get_header();
?>
<main class="posts">
    <section class="category">
        <h1 class="title">Усі новини
        </h1>
        <div class="category__posts">
            <ul class="mobile-list">
                <?php $posts = get_posts(array(
                    'numberposts' => 5,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'nopaging' => true,
                    'post_type' => 'post',
                    'category' => 45
                ));

                global $post;

                setup_postdata($posts);

                foreach($posts as $post):
                ?>
                <li class="category__item">
                    <article class="category__post">
                        <img src="<?php the_post_thumbnail_url();?>" class="category__picture" alt="">
                        <div class="category__content-wrapper">
                            <h2 class="category__caption"><?php the_title(); ?>
                            </h2>
                            <h3 class="category__subcaption">
                                <?php the_excerpt(); ?>
                            </h3>
                        </div>
                        <div class="category__interaction">
                            <a class="button--sm" href="<?php the_permalink()?>">
                                Читати
                                <img src="<?= get_template_directory_uri() . '/assets/embedded/book.svg'?>" alt="book svg" />
                            </a>
                        </div>
                    </article>
                </li>
                <?php wp_reset_postdata(); wp_reset_query(); endforeach; ?>
            </ul>
        </div>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php
get_footer();
?>
