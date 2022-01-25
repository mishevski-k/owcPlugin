<?php

function owc_add_scripts()
{
    //Add Main CSS
    wp_enqueue_style("owc_main_style", plugins_url().'/owcPlugin/css/style.css');
    //Add web componenets
    wp_enqueue_script("owc_webcomponents_scripts", plugins_url().'/owcPlugin/js/main.js');
}

add_action('wp_enqueue_scripts', 'sp_add_scripts');

?>