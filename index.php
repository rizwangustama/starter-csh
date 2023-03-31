<?php
get_header();

// $posts = array_map(function ($post) {
//     // var_dump($post);
//     preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', get_the_content(null, $post->ID), $image);

//     if (get_the_post_thumbnail_url($post->ID)) {
//         $featured_image = get_the_post_thumbnail_url($post->ID);
//     } elseif (is_array($image) && count($image) > 0 && isset($image['src'])) {
//         // var_dump($image);
//         $featured_image = $image['src'];
//     } else {
//         $featured_image = null;
//     }

//     return [
//         'id'     => $post->ID,
//         'link'   => get_the_permalink($post->ID),
//         'image' => $featured_image,
//         'title'  => html_entity_decode(get_the_title($post->ID)),
//         'excerpt' => get_the_excerpt($post)

//     ];
// }, $wp_query->posts);

// // Build pagination array
// $current_page = isset($wp_query->query['paged']) ? (int) $wp_query->query['paged'] : 1;
// $prev_page    = $current_page > 1 ? $current_page - 1 : false;
// $next_page    = $current_page + 1;

// $pagination = [
//     'prev_page'    => get_previous_posts_page_link(),
//     'next_page'    => get_next_posts_page_link(),
//     'current_page' => $current_page,
//     'has_next_page'  => $wp_query->max_num_pages > $current_page,
//     'total_movies' => (int) $wp_query->found_posts,
// ];

// $title = get_the_title();

// if (is_archive()) {
//     $title = get_the_archive_title();
// }

// else if (is_search()) {
//     /* translators: %s is replaced with the search query */
//     $title = sprintf(
//         __('Search Results for "%s"', 'sage'),
//         get_search_query()
//     );
// }

// else if (is_404()) {
//     $title = __('Not Found', 'sage');
// }

?>
<div id="vue-app" class="min-h-content">
    <!-- <blog-template
        :posts="<?php echo parseToVue($posts); ?>"
		:pagination="<?php echo parseToVue($pagination); ?>"
		:title="<?php echo parseToVue($title); ?>"
	></blog-template> -->
</div>
<?PHP
get_footer();
