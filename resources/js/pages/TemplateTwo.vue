<template>
        <transition
            tag="div"
            enter-active-class="duration-200 transition-all"
            leave-active-class="duration-200 transition-all"
            enter-class="opacity-75 transform translate-y-8" >
            <div class="main-vue">
                <hero-header-overlap :meta_data="meta_page.meta_hero_with_overlap"/>
                <side-content-with-image :meta_data="meta_page.side_content_with_image"/>
                <container-cta-with-form :meta_data="meta_page.meta_cta_with_form_setting"/>
                <single-image-carousel :meta_data="meta_page.meta_image_slider"/>
                <featured-lists :meta_data="meta_page.meta_featured"/>
                <LatestPostsWithLarge :meta_data="meta_page.meta_latest_posts"/>
                <partner-with-description :meta_data="meta_page.meta_partner"/>
                <cta-contact-form :meta_data="meta_page.meta_cta_contact_us"/>
                <testimonial-with-card :testimonial="posts_testimonials"/>
            </div>
        </transition>
</template>

<script>
import ContainerCtaWithForm from '../Sections/ContainerCtaWithForm.vue';
import HeroHeaderOverlap from '../Sections/HeroWithHeaderOverlap.vue';
import SideContentWithImage from '../Sections/SideContentWithImage.vue';
import SingleImageCarousel from '../Sections/SingleImageCarousel.vue';
import FeaturedLists from '../Sections/FeaturedLists.vue';
import LatestPostsWithLarge from '../Sections/LatestPostsWithLarge.vue';
import PartnerWithDescription from '../Sections/PartnerWithDescription.vue';
import CtaContactForm from '../Sections/CtaContactForm.vue';
import TestimonialWithCard from '../Sections/TestimonialWithCard.vue';




export default {
    props: ["meta_page", "posts_testimonials"],
    components:{
        HeroHeaderOverlap,
        SideContentWithImage,
        ContainerCtaWithForm,
        SingleImageCarousel,
        FeaturedLists,
        LatestPostsWithLarge,
        PartnerWithDescription,
        CtaContactForm,
        TestimonialWithCard
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
