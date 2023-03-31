<?php
function get_all_posts() {
    if (!isset($_GET["token"]) || $_GET["token"] != "60195446176DRT65ff6bed6b6d2f") {
        return "failed token";
    }

    $posts = get_posts([
        'post_type'      => "post",
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'order'          => 'ASC',
        'orderby'        => 'ID',
    ]);
    foreach ($posts as $post) {
        $staffId = 111;
        // get current value
        $values = get_field('staff', $post->ID, false);
        if (is_array($values)) {
        // add new id to the array
            $newStaff = $values;
            $newStaff[] = $staffId;
        }else if (is_string($values)) {
            $newStaff = array($values, $staffId);
        }else{
            $newStaff = array($staffId);
        }
        // update the field
        update_field("staff", $newStaff, $post->ID);
        echo $post->post_title.":".$post->post_type." updated \n";
    }
}

add_action('rest_api_init', function () {
    register_rest_route('author', 'update', array(
        'methods' => 'GET',
        'callback' => 'get_all_posts',
        'permission_callback' => '__return_true'
    ));
});
