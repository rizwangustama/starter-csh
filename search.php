<?php
get_header();
$search= strtolower(get_search_query());
$categories = get_terms( 
    array(
      "taxonomy" => "category",
      "hide_empty" => true
    ) 
 );

 $allTags = get_terms( 
    array(
      "taxonomy" => "post_tag",
      "hide_empty" => true
    ) 
 );

 $categoriesFound = $tagsFound = array(); // Declare blank array
// Prepare category array
foreach($categories as $category){
   // Find category by slug or title
   if ( strpos(strtolower($category->name), $search) !== false || strpos(strtolower($category->slug), $search) !== false )
      array_push($categoriesFound, $category->term_id);
}
// Prepare tags array
foreach($allTags as $tag){
    // Find tag by slug or title          
    if ( strpos(strtolower($tag->name), $search) !== false || strpos(strtolower($tag->slug), $search) !== false ) {
        array_push($tagsFound, $tag->term_id);
    }
}
$args= array(
  'post_type'=> array('post',"page"),
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'tax_query' => array(
  'relation' => 'OR',
     array(
       'taxonomy' => 'category',
       'field' => 'term_id',
       'terms' => $categoriesFound
     ),
     array(
       'taxonomy' => 'post_tag',
       'field' => 'term_id',
       'terms' => $tagsFound
     ),
   )
);
//---------------------------------
// SEARCH BY POSTS TAGS,CATEGORIES
//---------------------------------
 $matchedPosts = array();
 $query = new WP_Query( $args );
 if ( $query->have_posts() ) {
    while ( $query->have_posts() ){  $query->the_post();
        $matchedPosts[] = get_the_ID();
    }
    wp_reset_postdata();
 }

 $args= array(
    'post_type'=> array('post',"page"),
    'post_status' => 'publish',
    'posts_per_page' => -1,
    's' => $search
 );
 $titleQuery = new WP_Query( $args );
 if ( $titleQuery->have_posts() ) {
    while ( $titleQuery->have_posts() ){  
       $titleQuery->the_post();
       $matchedPosts[] = get_the_ID();
    }
    wp_reset_postdata();
 }
    // redirect to 404 if no posts found

if ( ! $matchedPosts ) {
    wp_redirect( home_url( '/404' ) );
    exit;
}

 $wp_query = new WP_Query( array(
    'post_type'=> array("page","post"),
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'post__in' => $matchedPosts,
    'orderby' => 'post__in',
    'paged' => get_query_var('paged') ?: 1,
 ) );

// Build posts array
$posts = array_map(function ($post) {
    // var_dump($post);
    return [
        'id'     => $post->ID,
        'link'   => get_the_permalink($post->ID),
        'image' => get_the_post_thumbnail_url($post->ID),
        'title'  => html_entity_decode(get_the_title($post->ID)),
        'content'  => apply_filters("the_content",$post->post_content),
        'excerpt' => get_the_excerpt($post)

    ];
}, $wp_query->posts);

// Build pagination array
$current_page = isset($wp_query->query['paged']) ? (int) $wp_query->query['paged'] : 1;
$prev_page    = $current_page > 1 ? $current_page - 1 : false;
$next_page    = $current_page + 1;

$pagination = [
    'prev_page'    => get_previous_posts_page_link(),
    'next_page'    => get_next_posts_page_link(),
    'current_page' => $current_page,
    'has_next_page'  => $wp_query->max_num_pages > $current_page,
    'total_movies' => (int) $wp_query->found_posts,
];

$title = sprintf(
    __('Search Results for "%s"', 'sage'),
    $search
);
?>
<div id="vue-app" class="min-h-content">
    <search-template
        :posts="<?php echo parseToVue($posts); ?>"
		:pagination="<?php echo parseToVue($pagination); ?>"
		:title="<?php echo parseToVue($title); ?>"
	></search-template>
</div>

<?php
get_footer();
