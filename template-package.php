<?php
/* Template Name: Subscription Package */ 

get_header();

$title = get_the_title(get_the_ID());
// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);
$image = get_the_post_thumbnail_url(get_the_ID());
$subscriptions = get_field("subscription", get_the_ID());
?>
<div id="vue-app">
    <page-header :title="<?php echo parseToVue($title); ?>" :image="<?php echo parseToVue($image); ?>"></page-header>
    <div class="relative z-10 bg-white">
        <div class="container flex mx-auto py-10 lg:py-16 gap-5">
            <div class="content-main-wrapper paragraph w-full mx-auto">
                <?php the_content(); ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 py-10 gap-5">
                <?php foreach ($subscriptions as $package) : ?>
                    <div class="bg-secondary p-4 rounded-lg text-white relative overflow-hidden">
                        <svg-vue
                            icon="ornament-logo"
                            alt="logo"
                            aria-label="logo"
                            class="absolute w-[400px] z-10 -bottom-20 right-0"
                        ></svg-vue>
                        <div class="flex h-full relative z-20 flex-col gap-y-3">
                            <h4 class="display-3 text-center"><?php echo $package["title"]; ?></h4>
                            <span class="line"></span>
                            <div class="package-content">
                                <p class="text-base text-center"><?php echo $package["description"]; ?></p>
                                <p class="text-xl font-semibold mt-3">USD <?php echo $package["price"]; ?></p>
                            </div>
                            <div class="package-package mt-auto text-center">
                                <span class="line"></span>
                                <a title="subscribe this package" href="<?php echo site_url();?>/checkout/?add-to-cart=<?php echo $package["product"];?>" class="btn mt-5 mb-3 btn-primary mx-auto">Subscribe</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
