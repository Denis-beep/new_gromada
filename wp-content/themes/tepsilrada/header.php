<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tepsilrada
 */

$uri = get_template_directory_uri();
?>
<!DOCTYPE html <?php get_language_attributes(); ?>>


<head>
    <title><?= get_bloginfo('name'); ?></title>
    <meta name="description" content="Теплицька територіальна громада">
    <link rel="preconnect" href="https://fonts.gstatic.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700&family=Oswald:wght@200;300;400;500;600;700&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet"/>
    <?php wp_head(); ?>
</head>

<?php if (is_front_page()): ?>
    <header class="header--large">
        <nav class="floating-nav">
            <?php wp_nav_menu(array(
                'menu' => 'Menu',
                'container' => false,
                'menu_class' => false,
                'echo' => true,
                'fallback_cb' => 'wp_page_menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="floating-nav__list">%3$s</ul>',
                'depth' => 0,
                'walker' => '',
            )); ?>
        </nav>
        <div class="header__logo-wrapper">
            <?php the_custom_logo(); ?>
        </div>
        <div class="header__info">
            <h1 class="header title--thin"><?php bloginfo('name'); ?></h1>
            <h3 class="header__subtitle"><?php the_field('header_subtitle1', 'options'); ?></h3>
            <h3 class="header__subtitle">
                <?php the_field('header_subtitle2', 'options'); ?>
            </h3>
        </div>
        <div class="header__search container">
            <?php get_search_form(); ?>
        </div>

        <div class="header__arrow--down">
            <svg class="blink-1" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 407.437 407.437"
                 style="enable-background: new 0 0 407.437 407.437" xml:space="preserve">
        <polygon points="386.258,91.567 203.718,273.512 21.179,91.567 0,112.815 203.718,315.87 407.437,112.815 ">
        </polygon>
      </svg>
        </div>
    </header>
    <div data-modal="schedule" class="modal schedule" role="dialog">
        <h1 class="title"><?php the_field('council_head_title') ?></h1>
        <ul class="schedule__list mobile-list">
            <?php $rows = get_field('council_head_timetable');
            if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <li>
                        <h2 class="caption"><?= $row['day']; ?></h2>
                        <h3 class="subcaption"><?= $row['time']; ?></h3>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div data-modal="letter" class="modal letter" role="dialog">
        <form method="POST" action="<?= admin_url() . 'admin-ajax.php' ?>" class="letter__form">
            <h1 class="title">Письмо до голови</h1>
            <fieldset class="letter__userdata">
                <div class="letter__fields">
                    <label for="letter__email">Ваш е-мейл</label>
                    <input name="email" required type="email" id="letter__email" class="letter__email">
                </div>
                <div class="letter__fields">
                    <label for="letter__phone">Ваш телефон</label>
                    <input name="phone" required type="tel" id="letter__phone" class="letter__phone">
                </div>
                <div class="letter__fields">
                    <label for="letter__name">Ваше имя</label>
                    <input name="name" required type="text" id="letter__name" class="letter__name">
                </div>
                <div class="letter__fields">
                    <label for="letter__lastname">Ваша фамилия</label>
                    <input name="lastname" required type="text" id="letter__lastname" class="letter__lastname">
                </div>
            </fieldset>
            <div class="letter__content">
                <label for="letter__text">Ваш запит</label>
                <textarea name="message" required id="letter__text" cols="50" rows="10"></textarea>
            </div>
            <button class="button--md" type="submit">Отправить</button>
        </form>
    </div>

<?php else: ?>
    <header class="short-header">
        <section class="short-header__info">
            <h1 class="short-header__title--thin"><?php bloginfo('name');?></h1>
            <h3 class="short-header__subtitle"><?php the_field('header_subtitle1', 'options'); ?></h3>
            <h3 class="short-header__subtitle"><?php the_field('header_subtitle2', 'options'); ?></h3>
        </section>
        <section class="short-header__logo-wrapper">
            <?php the_custom_logo();?>
        </section>
        <section class="short-header__other">
            <nav class="short-header__nav">
                <?php wp_nav_menu(array(
                    'menu' => 'Menu',
                    'container' => false,
                    'menu_class' => false,
                    'echo' => true,
                    'fallback_cb' => 'wp_page_menu',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'items_wrap' => '<ul id="%1$s" class="short-header__list">%3$s</ul>',
                    'depth' => 0,
                    'walker' => '',
                )); ?>
            </nav>
            <div class="search container">
                <?php get_search_form(); ?>
            </div>
        </section>
    </header>
<?php endif; ?>


<div data-reference="sidebar" class="floating-button__menu">
    <svg class="menu-icon" height="100%" viewBox="0 -53 384 384" width="100%" xmlns="http://www.w3.org/2000/svg">
        <path fill="#FFFFFF"
              d="m368 154.667969h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0">
        </path>
        <path fill="#FFFFFF"
              d="m368 32h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0">
        </path>
        <path fill="#FFFFFF"
              d="m368 277.332031h-352c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h352c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0">
        </path>
    </svg>
</div>
<div data-reference="search" class="floating-button__search --hidden">
    <svg version="1.1" class="search-icon" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.005 512.005"
         style="enable-background: new 0 0 512.005 512.005" xml:space="preserve">
        <g>
            <g>
                <path fill="#FFFFFF" d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667
 S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6
 c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z
 M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z">
                </path>
            </g>
        </g>
      </svg>
</div>
<?php if (!is_front_page()): ?>
    <div class="floating-button__back">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
        <g>
            <g>
                <path d="M492,236H68.442l70.164-69.824c7.829-7.792,7.859-20.455,0.067-28.284c-7.792-7.83-20.456-7.859-28.285-0.068
l-104.504,104c-0.007,0.006-0.012,0.013-0.018,0.019c-7.809,7.792-7.834,20.496-0.002,28.314c0.007,0.006,0.012,0.013,0.018,0.019
l104.504,104c7.828,7.79,20.492,7.763,28.285-0.068c7.792-7.829,7.762-20.492-0.067-28.284L68.442,276H492
c11.046,0,20-8.954,20-20C512,244.954,503.046,236,492,236z"/>
            </g>
        </g>
      </svg>
    </div>
<?php endif; ?>
<div data-modal="search" class="modal search" role="dialog">
    <form method="get" action="<?php bloginfo('url'); ?>">
        <div class="search__decorator">
            <input name="s" type="text" class="search" value="<?php if (!empty($_GET['s'])) {
                echo $_GET['s'];
            } ?>" placeholder="Введiть ваш запит">
            <input type="submit" class="--hidden">
        </div>
    </form>
</div>

