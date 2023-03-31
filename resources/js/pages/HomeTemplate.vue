<template>
    <div>
        <HeadingBannerSection 
            :date="featured.date" 
            :title="featured.title" 
            :excerpt="featured.excerpt" 
            :url="featured.link"
            :image="featured.image"
        />
        <FeaturedPostsSections :featured_posts_section="featured_posts_section"/>
        <template v-for="(item, index) in categories" :key="index">
            <CategoryFeed
                class="py-16"
                :title="item.title"
                :link="item.permalink"
                :posts="item.posts"
                :id="'category-feed-'+item.slug"
                :theme="index % 2 == 1 ? 'dark' : 'light'"
            />
            <Newsletter v-if="index == 0" class="pb-16" :form="form" />
        </template>
    </div>
</template>

<script>
import HeadingBannerSection from "../Sections/HeadingBannerSection.vue";
import FeaturedPostsSections from "../Sections/FeaturedPostsSections.vue";
import CategoryFeed from "../Sections/CategoryFeed.vue";
import Newsletter from "../Sections/Newsletter.vue";

export default {
    props: ["featured","categories","form","featured_posts_section"],
    components: {
        HeadingBannerSection,
        FeaturedPostsSections,
        CategoryFeed,
        Newsletter,
    },
    data() {
        return {
            loaded: false,
        };
    },
    mounted() {
        this.$nextTick(() => (this.loaded = true));
    },
};
</script>
