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
                <?php

                $current = absint(
                    max(
                        1,
                        get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' )
                    )
                );

                $posts_per_page = 7;

                $query = new WP_Query(
                    [
                        'post_type'      => 'post',
                        'posts_per_page' => $posts_per_page,
                        'paged'          => $current,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'category' => 45
                    ]
                );

                while($query->have_posts()):
                    $query->the_post();
                ?>
                <li class="category__item">
                    <article class="category__post">
                        <img src="<?php the_post_thumbnail_url();?>" class="category__picture" title="<?php the_title(); ?>" alt="<?php the_title(); ?>">
                        <div class="category__content-wrapper">
                            <h2 class="category__caption"><?php the_title(); ?>
                            </h2>
                            <h3 class="category__subcaption">
                                <?php the_excerpt(); ?>
                            </h3>
                        </div>
                        <div class="category__interaction">
                            <span class="news__date"><?= get_the_date('d.m.Y'); ?></span>
                            <a class="button--sm" href="<?php the_permalink()?>">
                                Читати
                                <img src="<?= get_template_directory_uri() . '/assets/embedded/book.svg'?>" alt="book svg" />
                            </a>
                        </div>
                    </article>
                </li>
                <?php endwhile; ?>
            </ul>

            <?php
            wp_reset_postdata();
?>
            <div class="posts__pagination">
                <?php  echo wp_kses_post(
                    paginate_links(
                        [
                                'prev_next' => false,
                            'total'   => $query->max_num_pages,
                            'current' => $current,
                        ]
                    )
                );?>
            </div>
        </div>
    </section>
    <?php get_sidebar(); ?>
</main>
<?php
get_footer();
?>
