<?php
get_header();

$detail = [
    'id'      => $post->ID,
    'image'  => get_the_post_thumbnail_url($post->ID),
    'content' => apply_filters("the_content",get_the_post($post)),
    'excerpt' => get_custom_excerpt($post),
    'title'   => html_entity_decode(get_the_title($post->ID)),
    'date'  => get_the_date(null,$post->ID),
    'categories' => getTaxonomy($post->ID,"category")
];

$args = [
    'post_type' => 'staff',
    'post_status' => 'publish',
    'posts_per_page' => -1,
];

if (get_field('staff')) {
    foreach (query_posts($args) as $v) {
        if (in_array($v->ID, get_field('staff'))) {
            $detail['author'][] = [
                "name"=>$v->post_title,
                "link"=>get_permalink($v->ID),
            ];
        }
    }
}else if (get_field('guest_author')) {
    $detail['author'] = [
        "name"=>get_field('guest_author'),
        "link"=>"#",
    ];
}else{
    $detail['author'] = [
        "name"=>get_the_author_meta('display_name', $post->post_author),
        "link"=>get_author_posts_url($post->post_author),
    ];
}

?>
<div id="vue-app" class="min-h-content">
    <post-header
        :post="<?php echo parseToVue($detail); ?>"
	></post-header>
</div>
<div class="relative z-10 bg-white">
    <div class="container flex mx-auto py-10 md:py-14 lg:py-20 gap-5">
        <div class="content-main-wrapper w-full lg:w-3/4 mx-auto">
            <div class="content-main paragraph"><?php echo $detail["content"]; ?></div>
        </div>
    </div>
</div>
<div id="vue-altapp">
    <related-article
        :post="<?php echo parseToVue($detail); ?>"
	></related-article>
</div>
<?php
get_footer();