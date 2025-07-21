<?php

add_action('wp_ajax_get_all_tags', 'get_all_tags_callback');
add_action('wp_ajax_nopriv_get_all_tags', 'get_all_tags_callback');

function get_all_tags_callback() {
    $tags = get_tags(array('hide_empty' => false));
    $tag_list = [];

    foreach ($tags as $tag) {
        $tag_list[] = [
            'id' => $tag->term_id,
            'name' => $tag->name,
            'slug' => $tag->slug
        ];
    }

    wp_send_json($tag_list);
}