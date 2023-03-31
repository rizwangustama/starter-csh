<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package csh
 */

get_header();

$title = get_the_title(get_the_ID());
// Applies all registered
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);
// Build $posts array
$args = array(
    'posts_per_page'   => 5,
    'post_type'        => 'post',
);
$the_query = new WP_Query( $args );

$posts = array_map('mapping_articles', $the_query->posts);

$featured = $posts[0];
unset($posts[0]);

// $featured_categories = array();

// $featureds = get_field("featured_categories","option");

//     foreach ($featureds as $cat) {
//         $the_query = new WP_Query( [
//             'posts_per_page'   => 4,
//             'post_type'        => 'post',
//             'tax_query'        => [
//                 array('taxonomy' => 'category', 'field' => 'slug', 'terms' => $cat->slug)
//             ]
//         ]);
//         $featured_categories[] = [
//             "title" => $cat->name,
//             "slug" => $cat->slug,
//             "permalink"=> get_term_link($cat->term_id),
//             "posts" => array_map('mapping_articles', $the_query->posts)
//         ];
//     }

?>
<div id="vue-app" class="min-h-content">
    <home-template
        :featured="<?php echo parseToVue($featured); ?>"
        :content="<?php echo parseToVue($content); ?>"
        :featured_posts_section="<?php echo parseToVue([
            'heading' => 'Featured Posts',
            'posts' => array_values($posts)
        ]); ?>"
        :categories="<?php echo parseToVue($featured_categories); ?>"
        :form="<?php echo parseToVue(do_shortcode('[gravityform id="1" title="false" description="false" tabindex="49"]')); ?>"
    ></home-template>
</div>
<?php
get_footer();