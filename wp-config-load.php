<?php
$root_path="/WORDPRESS-INSTALLATION-PATH/wp-load.php"; //
#WP Configuration starts
###############################################################################
define('WP_USE_THEMES', false);
require($root_path);

$args = array(
    'post_type' => 'post',
    'after'     => 'January 1st, 2018',
    'post_status' => 'publish',
    'tag__not_in' => array(2043),
    'posts_per_page' => 1,
    'orderby' => 'rand'
);

$my_random_post = new WP_Query ( $args );

while ( $my_random_post->have_posts () ) {
    $my_random_post->the_post ();

    $title=html_entity_decode(get_the_title());
    $description=get_the_excerpt();
    $url=get_permalink();
    $thumbnail=get_the_post_thumbnail_url();
    $tags=str_replace(" ","_",wp_get_post_tags( get_the_ID(), array('fields' => 'names') ));
}

$keywords=""; foreach($tags as $tg) { $keywords.='#'.str_replace('-','',$tg).' '; }
$final_url=$url;

##############################################################################
#WP Configuration Ends
