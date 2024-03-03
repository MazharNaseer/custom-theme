<?php
/*
Plugin Name: Coffee Generator
Description: A plugin to generate random coffee links.
Version: 1.0
Author: Mazhar Naseer
*/


function hs_give_me_coffee() {

    $json_file = plugin_dir_path(__FILE__) . 'json-data/coffee_links.json';

    $json_data = file_get_contents($json_file);

    $data = json_decode($json_data);

    if (!$data || !is_array($data)) {
        return "Failed to decode coffee data or data format is invalid.";
    }

    $random_index = array_rand($data);
    $random_coffee_link = $data[$random_index];
    return $random_coffee_link;
}

function display_random_coffee_button() {

    $coffee_link = hs_give_me_coffee();
  
    $button_html = '<a style="color:white" href="' . esc_url($coffee_link) . '" class="coffee-button">Get Coffee</a>';

    return $button_html;
}
add_shortcode('random_coffee_button', 'display_random_coffee_button');

?>
