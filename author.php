<?php

get_header();

$author = [
    "name"=> get_the_author_meta('display_name', $post->post_author),
    "image"=> get_avatar_url($post->post_author),
    "link"=> get_author_posts_url($post->post_author),
    "bio"=> get_the_author_meta('description', $post->post_author),
    "id" => $post->post_author,
];

$authorType = 'author';


$authorName = get_the_author_meta('display_name', $post->post_author);
$is_staff = get_page_by_title($authorName, OBJECT, 'staff');
if ($is_staff) {
    $authorType = 'staff';
    $author["id"] = $is_staff->ID;
    $author["bio"] = apply_filters('the_content', $is_staff->post_content);
}
?>

<div id="vue-app" class="min-h-content">
    <author-template 
        :post="<?php echo parseToVue([
            "title"=>$author["name"], 
            "excerpt"=>$author["bio"]
        ]); ?>" 
        :author="<?php echo parseToVue($author); ?>" 
        :authorType="<?php echo parseToVue($authorType); ?>">
    </author-template>
</div>

<?php
get_footer();