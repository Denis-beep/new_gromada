<?php
/**
 * The template for displaying category posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

$current = absint(
    max(
        1,
        get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
    )
);

$posts_per_page = 7;
$category = get_queried_object();
$category_id = $category->term_id;

$query = new WP_Query(
    [
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $current,
        'orderby' => 'date',
        'order' => 'DESC',
        'cat' => $category_id
    ]
);

get_header();
?>
    <main class="posts">
        <section class="category">
            <?php if (have_posts()): ?>
                <h1 class="title"><?php single_cat_title(); ?>
                </h1>
                <div class="category__posts">
                    <ul class="mobile-list">
                        <?php while ($query->have_posts()): $query->the_post(); ?>
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
                                        <span class="news__date"><?= get_the_date('d.m.Y'); ?></span>
                                        <a class="button--sm" href="<?php the_permalink() ?>">
                                            Читати
                                            <img src="<?= get_template_directory_uri() . '/assets/embedded/book.svg' ?>"
                                                 alt="book svg"/>
                                        </a>
                                    </div>
                                </article>
                            </li>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </ul>
                </div>
                <?php if ($query->found_posts > $posts_per_page): ?>
                    <div class="posts__pagination">
                        <?php echo wp_kses_post(
                            paginate_links(
                                [
                                    'prev_next' => false,
                                    'total' => $query->max_num_pages,
                                    'current' => $current,
                                ]
                            )
                        ); ?>
                    </div>
                <?php endif; endif; ?>
        </section>
        <?php get_sidebar(); ?>
    </main>
<?php
get_footer();
?>