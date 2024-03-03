<?php
/*
Plugin Name: Kanye Quotes
Description: Plugin to display Kanye  quotes.
Version: 1.0
Author: Mazhar Naseer
*/


function display_kanye_quotes() {
  
    $api_url = 'https://api.kanye.rest/';

    $quotes = array();
    for ($i = 0; $i < 5; $i++) {
        $response = wp_remote_get($api_url);
        if (!is_wp_error($response)) {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body);
            if ($data && isset($data->quote)) {
                $quotes[] = $data->quote;
            }
        }
    }

    $html = '<ol class="kanye-quotes">';
    foreach ($quotes as $quote) {
        $html .= '<li>' . esc_html($quote) . '</li>';
    }
    $html .= '</ol>';
    return $html;
}
add_shortcode('kanye_quotes', 'display_kanye_quotes');
