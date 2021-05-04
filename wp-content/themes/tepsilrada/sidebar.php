<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tepsilrada
 */

if (!is_active_sidebar('sidebar-1')) {
    return;
}
$items = wp_get_nav_menu_items('side_menu');

?>
<aside data-modal="sidebar" id="sidebar" class="sidebar">
    <section class="sidebar__links section">
        <h1 class="sidebar title--thin">Меню</h1>
        <nav class="sidebar__links">
            <?php wp_nav_menu( [
                'theme-location'=> 'side_menu',
                'menu'            => 'side_menu',
                'container'       => false,
                'menu_class'      => false,
                'echo'            => true,
                'fallback_cb'     => 'side_menu',
                'before'          => '',
                'after'           => '',
                'link_before'     => '',
                'link_after'      => '',
                'items_wrap'      => '<ul id="%1$s" class="sidebar__list">%3$s</ul>',
                'depth'           => 0,
                'walker'          => '',
            ] );?>
        </nav>
    </section>
    <section class="sidebar__weather">
        <h1 class="title--thin">Погода</h1>
        <a class="weatherwidget-io" href="https://forecast7.com/uk/45d9829d34/teplytsya/" data-label_1="Теплиця"
           data-label_2="Погода" data-font="Helvetica" data-icons="Climacons Animated" data-theme="orange"></a>
        <script type="module">
            !(function (d, s, id) {
                var js,
                    fjs = d.getElementsByTagName(s)[0];
                if (!d.getElementById(id)) {
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "https://weatherwidget.io/js/widget.min.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }
            })(document, "script", "weatherwidget-io-js");
        </script>
    </section>
    <section class="sidebar__useful-links">
        <h1 class="title--thin">Корисні посилання</h1>
        <ul class="sidebar__useful-links mobile-list">
            <?php foreach(get_field("useful_links_list", 'options') as $row): ?>
            <li class="sidebar__item">
                <a href="<?= $row['link']; ?>" class="sidebar__link"><img
                            src="<?= $row['link_image_wrapper']; ?>"
                            alt=""/></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
</aside>

