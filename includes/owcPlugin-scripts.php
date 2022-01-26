<?php

function owc_add_scripts()
{
    //Add Main CSS
    wp_enqueue_style("owc_main_style", plugins_url().'/owcPlugin/css/style.css');
    //Add web componenets
    wp_enqueue_script("owc_webcomponents_scripts", plugins_url().'/owcPlugin/js/main.js');
}

function owc_render_offers()
{
    ?>
    <div class="owc-wrapper">
        <oap-offers></oap-offers>
    </div>
    <?php
}

add_shortcode('owc_render_offers', 'owc_render_offers');

add_action('wp_enqueue_scripts', 'owc_add_scripts');

?>