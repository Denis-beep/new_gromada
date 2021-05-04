<form method="get" action="<?php bloginfo('url'); ?>">
    <div class="search__decorator">
        <img src='<?= get_template_directory_uri() . "/assets/embedded/loupe.svg" ?>' class="search__loupe" alt="loupe">
        <input name="s" type="text" class="search" value="<?php if (!empty($_GET['s'])) {
            echo $_GET['s'];
        } ?>" placeholder="Введiть ваш запит">
        <input type="submit" class="--hidden">
    </div>
</form>