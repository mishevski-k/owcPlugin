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
    $data_api = file_get_contents('https://ekstrapoint.com/api/v2/achievement?limit=50&ids=2266,2268,2267,2059,2060,2061&language=en&country=INT');
    $data = json_decode($data_api);

    ?> <oap-offers-wrapper> <?php
    foreach($data->items as $item):
        $offerImagePath = $item->stateContent[0]->image->originalImageUrl;
        $offerReward = $item->rewards[0]->value;
        $offerTitle = $item->stateContent[0]->title;
        $offerDescription = $item->stateContent[0]->description;
        $offerButtonText = $item->stateContent[0]->buttonText;
        $offerButtonUrl = $item->stateContent[0]->url;

        if($offerButtonUrl == null)
        {
            $offerButtonUrl = "";
        }
        ?>
            <oap-offer-card
                offerImage="<?php echo $offerImagePath ?>"
                offerRewardValue="<?php echo $offerReward ?>"
                offerTitle="<?php echo $offerTitle ?>"
                offerDescription="<?php echo $offerDescription ?>"
                offerButtonText="<?php echo $offerButtonText ?>"
                offerButtonURL="<?php echo $offerButtonUrl ?>"
            >
            </oap-offer-card>
        <?php
    endforeach;
    ?> </oap-offers-wrapper> <?php
}

add_shortcode('owc_render_offers', 'owc_render_offers');

add_action('wp_enqueue_scripts', 'owc_add_scripts');

?>