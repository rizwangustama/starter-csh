<?php
/* Template Name: Home Template Style 2 */ 
get_header();

$title = get_the_title(get_the_ID());

// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);

$pageMeta = get_fields();

// Build $posts array
$args = array(
    'posts_per_page'   => 6,
    'post_type'        => 'post',
);
$the_query = new WP_Query( $args );

$latest_posts = array_map('mapping_articles', $the_query->posts);
wp_reset_query();

$pageMeta["meta_latest_posts"]["latest_posts"] = $latest_posts;

// Build $posts testimonial array
$args = array(
    'posts_per_page'   => 6,
    'post_type'        => 'testimonial',
);
$the_query = new WP_Query( $args );

$latest_testimonial = array_map('mapping_articles', $the_query->posts);
wp_reset_query();

// echo "<pre>";
// echo print_r($latest_testimonial);
// echo "</pre>"

?>
<div id="vue-app">
    <template-two :meta_page="<?php echo parseToVue($pageMeta) ;?>"
        :posts_testimonials="<?php echo parseToVue($latest_testimonial) ;?>"/>
</div>

<?php if (!empty(the_content( ))): ?>
    <div class="relative z-10 bg-white">
        <div class="container flex mx-auto py-10 gap-5">
            <div class="content-main-wrapper w-full mx-auto">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
<?php endif ?>

<?php
get_footer();
