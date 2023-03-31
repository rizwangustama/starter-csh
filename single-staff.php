<?php
get_header();

$author = [
    "name"=> get_the_title(),
    "image"=> get_the_post_thumbnail_url(),
    "link"=> get_permalink(get_the_ID()),
    "bio"=> get_the_content(),
    "id" => get_the_ID(),
];

$authorType = "staff";

?>
<div id="vue-app" class="min-h-content">
    <author-template 
        :post="<?php echo parseToVue([
            "title"=>$author["name"], 
            "excerpt"=>$author["bio"]
        ]); ?>" 
        :author="<?php echo parseToVue($author); ?>" 
        :author-type="<?php echo parseToVue($authorType); ?>">
    </author-template>
</div>
<?php
get_footer();