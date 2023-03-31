<?php
get_header();

$title = get_the_title(get_the_ID());

// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);

?>
<div id="vue-app" class="min-h-content">
    <page-header :title="<?php echo parseToVue($title); ?>" :image="<?php echo parseToVue(get_the_post_thumbnail_url(get_the_ID())); ?>" />
</div>
<div class="relative z-10 bg-white">
    <div class="container flex mx-auto py-10 sm:py-14 md:py-20 lg:py-28 gap-5">
        <div class="content-main-wrapper w-full lg:w-3/4 mx-auto">
            <div class="content-main paragraph"><?php echo $content; ?></div>
        </div>
    </div>
</div>
<?php
get_footer();
