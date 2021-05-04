<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tepsilrada
 */
?>

<?php wp_footer();?>
<footer class="footer">
    <div class="footer__first">
        <section class="footer__maps">
            <h1 class="title--thin">Мапа села</h1>
            <div class="footer__map">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26224.61032083126!2d29.360245259093443!3d45.986442808197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b7e653fbf602f7%3A0x6bd2c841040c21c0!2z0KLQtdC_0LvQuNGG0LAsINCe0LTQtdGB0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDY4NDIx!5e0!3m2!1sru!2sua!4v1619062532012!5m2!1sru!2sua"
                        allowfullscreen="" loading="lazy"></iframe>
            </div>
        </section>
        <section class="footer__address">
            <h1 class="title--thin">Наші контакти</h1>
            <address>
                <ul class="mobile-list">
                    <li class="footer__item">
                        <h2 class="footer__caption">Е-мейл</h2>
                        <h3 class="footer__subcaption"><?= get_field('contacts_email', 'options') ?></h3>
                    </li>
                    <li class="footer__item">
                        <h2 class="footer__caption">Адреса</h2>
                        <h3 class="footer__subcaption"><?php the_field('contacts_address', 'options'); ?></h3>
                    </li>
                </ul>
            </address>
        </section>
    </div>
    <div class="footer__second">
        <section class="footer__useful-links">
            <h1 class="title--thin">Кориснi посилання</h1>
            <nav class="footer__nav">
                <?php wp_nav_menu( [
                    'menu'            => 'footer_menu1',
                    'container'       => false,
                    'echo'            => true,
                    'fallback_cb'     => false,
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="mobile-list">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ] );?>

                <?php wp_nav_menu([
                    'theme_location' => 'footer_menu2',
                    'menu'            => 'footer_menu2',
                    'container'       => false,
                    'echo'            => true,
                    'fallback_cb'     => 'footer_menu2',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul id="%1$s" class="mobile-list">%3$s</ul>',
                    'depth'           => 0,
                    'walker'          => '',
                ] );?>
            </nav>
            <p class="footer__rights">© Всi права захищенi</p>
        </section>
    </div>
</footer>
