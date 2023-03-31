<?php
/* Template Name: fullwidth page */ 
get_header();

$title = get_the_title(get_the_ID());

// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);

?>
<div id="vue-app">
    <page-header :title="<?php echo parseToVue($title); ?>" :image="<?php echo parseToVue(get_the_post_thumbnail_url(get_the_ID())); ?>"></page-header>
</div>
<div class="relative z-10 bg-white">
    <div class="container flex mx-auto py-10 gap-5">
        <div class="content-main-wrapper w-full mx-auto">
            <?php the_content(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
