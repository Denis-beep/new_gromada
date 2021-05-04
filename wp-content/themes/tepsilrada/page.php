<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package tepsilrada
 */

get_header();
?>
<?php if (is_front_page()): ?>
    <?php
    $deputies = get_field('deputies');

    $posts = get_posts(array(
        'numberposts' => 5,
        'orderby' => 'date',
        'order' => 'DESC',
        'include' => array(),
        'exclude' => array(),
        'tag' => 'Карусель',
        'nopaging' => true,
        'post_type' => 'post',
    ));

    setup_postdata($posts);

    $uri = get_template_directory_uri();
    $book = $uri . '/assets/embedded/book.svg';
    ?>

    <main class="main">
        <div class="backdrop"></div>

        <section class="slider section">
            <h1 class="slider title--thin">Анонси</h1>
            <div class="splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($posts as $post): ?>
                            <li class="splide__slide">
                                <div class="splide__image-wrapper">
                                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                </div>
                                <div class="splide__caption-wrapper">
                                    <h2 class="splide__caption"><?php the_title(); ?></h2>
                                    <a class="button--sm"
                                       href="<?php the_permalink(); ?>"><img src="<?= $uri . '/assets/embedded/book.svg' ?>"
                                                                             alt="book"> Читати</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="council-heads section">
            <h1 class="council-heads title--thin">Аппарат сільської ради</h1>
            <div class="mobile-list council-heads">
                <div class="council-heads__item">
                    <img src="<?php the_field('council_head_photo'); ?>"
                         alt="Leontev"
                         class="council-heads__picture"/>
                    <div class="council-heads__info">
                        <h2 class="council-heads__caption"><?php the_field('council_head_title'); ?></h2>
                        <h3 class="council-heads__subcaption">
                            <?php the_field('council_head_subtitle'); ?>
                        </h3>
                    </div>
                    <div class="council-heads__interaction">
                        <button data-reference="schedule" class="council-heads button--md">
                            Графік прийому
                            <img src="<?= $uri . '/assets/embedded/paper.svg'; ?>" alt="paper svg"/>
                        </button>
                        <button data-reference="letter" class="council-heads button--md">
                            Інтернет-звертання
                            <img src="<?= $uri . '/assets/embedded/write-letter.svg'; ?>" alt="letter svg"/>
                        </button>
                    </div>
                </div>
                <div class="council-heads__item">
                    <img src="<?php the_field('council_secretary_photo'); ?>"
                         alt="Карат"
                         class="council-heads__picture"/>
                    <div class="council-heads__info">
                        <h2 class="council-heads__caption"><?php the_field('council_secretary_name'); ?></h2>

                        <h3 class="council-heads__subcaption"><?php the_field('council_secretary_position'); ?></h3>
                    </div>
                </div>
                <div class="council-heads__item">
                    <img src="<?php the_field('council_head_deputy_photo'); ?>"
                         alt="Leontev"
                         class="council-heads__picture"/>
                    <div class="council-heads__info">
                        <h2 class="council-heads__caption"><?php the_field('council_head_deputy_name'); ?></h2>

                        <h3 class="council-heads__subcaption">
                            <?php the_field('council_head_deputy_position') ?>
                        </h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="dual section">
            <section class="leftside">
                <section class="news section">
                    <h1 class="news title--thin">Новини</h1>

                    <ul class="mobile-list news">
                        <?php
                        $posts = get_posts(array(
                            'numberposts' => 5,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'nopaging' => true,
                            'post_type' => 'post',
                            'category' => 45
                        ));

                        global $post;

                        setup_postdata($posts);

                        foreach ($posts as $index => $post) : ?>
                            <?php get_template_part('template-parts/content', 'page'); ?>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </section>
                <section class="deputies section">
                    <h1 class="title--thin">Депутатський корпус</h1>
                    <ul class="mobile-list deputies">
                        <?php foreach ($deputies as $deputy): ?>
                            <?php $image = $deputy['deputies_photo'] ?>
                            <li class="deputies__item">
                                <img src="<?= $image; ?>"
                                     alt="deputy mock"
                                     class="deputies__photo"/>
                                <div class="deputies__info">
                                    <h2 class="deputies__caption"><?= $deputy['name']; ?></h2>
                                    <h3 class="deputies__subcaption">
                                        <?= $deputy['position'] ?>
                                    </h3>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>
            </section>
            <?php get_sidebar(); ?>
        </section>
    </main>
<?php else: ?>
    <main class="post">
        <article class="post">
            <h1 class="title"><?php the_title(); ?></h1>
            <div class="post__info" role="article" aria-label="text">
                <?php the_content(); ?>
            </div>
        </article>
        <?php get_sidebar(); ?>
    </main>
<?php endif; wp_reset_query(); wp_reset_postdata(); get_footer(); ?>
