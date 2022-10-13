<div id="content-wrapper" class="paddingt-b">
    <div class="wrapper">
        <div id="primary" class="content-area">

            <?php
            require get_theme_file_path() . '/inc/frontpage-sections/primary-slider.php';
            require get_theme_file_path() . '/inc/frontpage-sections/trending.php';
            ?>

        </div>

        <div id="secondary" class="widget-area">
           <?php dynamic_sidebar( 'main-content-wrapper-sidebar' ); ?>
        </div>
    </div>
</div>