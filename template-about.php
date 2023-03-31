<?php
/* Template Name: About US */ 

get_header();

$title = get_the_title(get_the_ID());
$left_title = get_field("left_title");
$right_title = get_field("right_title");
$content_alt = get_field("content_alt");
// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);
?>
<div id="vue-app" class="min-h-content">
    <about-template
        :title="<?php echo parseToVue($title); ?>"
        :left_title="<?php echo parseToVue($left_title); ?>"
        :right_title="<?php echo parseToVue($right_title); ?>"
        :content="<?php echo parseToVue($content); ?>"
        :content_alt="<?php echo parseToVue($content_alt); ?>"
        :image="<?php echo parseToVue(get_the_post_thumbnail_url(get_the_ID())); ?>"
	></about-template>
</div>
<?php
get_footer();
