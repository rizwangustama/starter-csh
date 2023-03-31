<?php

if (!function_exists('get_menu_items_by_registered_slug')) {
    function get_menu_items_by_registered_slug($menu_slug)
    {
        $menu_items = [];

        if (
            ($locations = get_nav_menu_locations()) &&
            isset($locations[$menu_slug])
        ) {
            $menu = get_term($locations[$menu_slug]);

            $menu_items = wp_get_nav_menu_items($menu->term_id);
        }

        return $menu_items;
    }
}
if (!function_exists('get_post_id_by_slug')) {
    function get_post_id_by_slug($slug)
    {
        $post = get_page_by_path($slug);

        if ($post) {
            return $page->ID;
        } else {
            return null;
        }
    }
}

function getTaxonomyList($post_id, $taxonomy) {
    $tax = wp_get_post_terms($post_id, $taxonomy);
    return implode(", ",array_map(function($item){
        return $item->name;
    },$tax));
}

function getTaxonomy($post_id, $taxonomy) {
    $tax = wp_get_post_terms($post_id, $taxonomy);
    return array_map(function($item) use ($taxonomy){
        return [
            "title" => $item->name,
            "permalink"=> $taxonomy == "category" ? get_category_link($item->term_id) : get_permalink($term->term_id),
        ];
    },$tax);
}


function get_custom_excerpt($post){
    if (get_field("custom_excerpt",$post->ID)) {
        return get_field("custom_excerpt",$post->ID);
    }else if ($post->post_excerpt != "") {
        return $post->post_excerpt;
    }
    $str = wpautop( $post->post_content );
    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
    $str = strip_tags($str, '<a><strong><em>');
    return '<p>' . $str . '</p>';
}

function get_the_post($post){
    $str = str_replace(get_custom_excerpt($post), '', $post->post_content);
    return $str;
}

function mapping_articles($post) {
    preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', get_the_content(null, $post->ID), $image);

    if (get_the_post_thumbnail_url($post->ID)) {
        $featured_image = get_the_post_thumbnail_url($post->ID);
    } elseif (is_array($image) && count($image) > 0 && isset($image['src'])) {
        // var_dump($image);
        $featured_image = $image['src'];
    } else {
        $featured_image = null;
    }

    return [
        'id'      => $post->ID,
        'title'   => get_the_title($post->ID),
        'date'    => get_the_date(null,$post->ID),
        'link'    => get_the_permalink($post->ID),
        'image'   => get_the_post_thumbnail_url($post->ID) ? get_the_post_thumbnail_url($post->ID,"original") : false,
        'excerpt' => get_custom_excerpt($post),
        'content' => get_the_content( null, false,  $post->ID)
    ];
}

function wp_get_menu_array($current_menu)
{
    $array_menu = wp_get_nav_menu_items($current_menu);
    $menu = [];
    if (is_array($array_menu) || is_object($array_menu)) {
        foreach ($array_menu as $m) {
            if (empty($m->menu_item_parent)) {
                $menu['menu' . $m->ID] = [];
                $menu['menu' . $m->ID]['id'] = $m->ID;
                $menu['menu' . $m->ID]['title'] = $m->title;
                $menu['menu' . $m->ID]['url'] = str_replace(
                    get_site_url(),
                    '',
                    $m->url
                );
                $menu['menu' . $m->ID]['children'] = [];
                if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                    $menu['menu' . $m->ID][
                        'isElementor'
                    ] = Elementor\Plugin::instance()->db->is_built_with_elementor(
                        $m->object_id
                    );
                }
            }
        }
        $submenu = [];
        foreach ($array_menu as $m) {
            if ($m->menu_item_parent) {
                $submenu['menu' . $m->ID] = [];
                $submenu['menu' . $m->ID]['id'] = $m->ID;
                $submenu['menu' . $m->ID]['title'] = $m->title;
                $submenu['menu' . $m->ID]['url'] = str_replace(
                    get_site_url(),
                    '',
                    $m->url
                );
                if ( in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
                    $submenu['menu' . $m->ID][
                        'isElementor'
                    ] = Elementor\Plugin::instance()->db->is_built_with_elementor(
                        $m->object_id
                    );
                }
                $menu['menu' . $m->menu_item_parent]['children'][
                    'menu' . $m->ID
                ] = $submenu['menu' . $m->ID];
            }
        }
    }

    return $menu;
}

function parseToVue($data)
{
    return htmlspecialchars(json_encode($data), ENT_QUOTES, 'UTF-8');
}