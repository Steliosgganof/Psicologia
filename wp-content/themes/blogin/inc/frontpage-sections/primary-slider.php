<?php
/**
* Template part for displaying front page introduction.
*
* @package Blogin
*/

// Get the content type.
$primary_slider_content_type = get_theme_mod( 'blogin_primary_slider_enable', 'disable' );

if ( 'disable' === $primary_slider_content_type ) {
return;
}

$content_ids    = array();

if ( $primary_slider_content_type === 'post' ) {

    for ( $i = 1; $i <= 3; $i++ ) {
        $content_ids[] = get_theme_mod( 'blogin_primary_slider_post_' . $i );
    }

    $args = array(
        'post_type'           => $primary_slider_content_type,
        'post__in'            => array_filter( $content_ids ),
        'orderby'             => 'post__in',
        'posts_per_page'      => absint( 3 ),
        'ignore_sticky_posts' => true,
    );

}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {

$section_title          = get_theme_mod( 'blogin_primary_slider_title', __('Primary Slider', 'blogin') );
$primary_slider_btn     = get_theme_mod( 'blogin_primary_slider_button_label', __( 'View All', 'blogin') );
$primary_slider_btn_url = get_theme_mod( 'blogin_primary_slider_button_url', '#' );
?>
<div id="adore_blog_primary_slider_section">
    <div id="primary-slider-section" class="paddingt-b same">
        <?php if ( !empty( $section_title ) ) { ?>
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
            </div>
        <?php } ?>
        <div class="primary-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":false, "autoplay": true, "draggable": true, "fade": false }'>
            <?php 
            while ( $query->have_posts() ) :
                $query->the_post();
                ?>
                <article class="has-post-thumbnail" style="background-image: url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) ); ?>');">
                    <div class="overlay"></div>
                    <div class="entry-container">
                        <span class="cat-links">
                            <?php the_category( '', '', get_the_ID() ); ?>
                        </span>
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </header>
                        <div class="entry-meta">
                            <?php
                            adore_blog_post_author(); 
                            adore_blog_posted_on();
                            ?>
                        </div>
                    </div>
                </article>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <?php if ( !empty( $primary_slider_btn ) ) : ?>
            <div class="show-more">
                <a href="<?php echo esc_url( $primary_slider_btn_url ); ?>"><?php echo esc_html( $primary_slider_btn ); ?><i class="fa fa-caret-right" aria-hidden="true"></i></a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php } ?>