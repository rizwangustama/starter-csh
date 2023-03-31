<template>
        <transition
            tag="div"
            enter-active-class="duration-200 transition-all"
            leave-active-class="duration-200 transition-all"
            enter-class="opacity-75 transform translate-y-8" >
            <div>
                <Hero :meta_data="meta_page"></Hero>
                <TextContent :meta_data="meta_page" />
                <FullCtaWithForm :meta_data="meta_page.meta_cta_with_form_setting"/>
                <ImageCarousel :meta_data="meta_page.meta_image_slider"/>
                <Featured :meta_data="meta_page.meta_featured"/>
                <posts-carousel :meta_data="meta_page.meta_latest_posts"/>
                <partner :meta_data="meta_page.meta_partner"/>
                <FullCta :meta_data="meta_page.meta_blue_cta"/>
                <testimonial :testimonial="posts_testimonials"/>
            </div>
        </transition>
</template>

<script>
import Hero from './../Sections/Hero.vue';
import TextContent from './../Sections/TextContent.vue';
import ImageCarousel from './../Sections/ImageCarousel.vue';
import FullCtaWithForm from './../Sections/FullCtaWithForm.vue';
import Featured from './../Sections/Featured.vue'
import PostsCarousel from './../Sections/PostsCarousel.vue'
import Partner from '../Sections/Partner.vue';
import FullCta from './../Sections/FullCta.vue';
import Testimonial from '../Sections/Testimonial.vue';

export default {
    props: ["meta_page", "posts_testimonials"],
    components:{
        Hero,
        TextContent,
        FullCtaWithForm,
        ImageCarousel,
        Featured,
        PostsCarousel,
        Partner,
        FullCta,
        Testimonial
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
