<template v-if="meta_data">
    <section class="hero-header-ovelap">
        <LazyImage v-if="meta_data.background"
            :src="meta_data.background ? meta_data.background.url : $settings.images + '/large-image.jpg'"
            :alt="meta_data.background ? meta_data.background.title : 'Hero Image'"
            className="min-h-[345px] lg:min-h-[687px] object-cover"/>
        <div class="overlap container-2">
            <div class="left">
                <LazyImage v-if="meta_data.background"
                    :src="meta_data.image ? meta_data.image.url : $settings.images + '/img-overlap.jpg'" loading="lazy" 
                    :alt="meta_data.image? meta_data.image.title : 'Hero Image'"
                    className="max-h-[368px] w-full object-cover"/>
            </div>
            <div class="right">
                <h1 class="text-white text-3xl lg:text-5xl font-bold" v-html="meta_data.heading"></h1>
                <div class="action-wrapper" v-if="meta_data.primary_navigation_url || meta_data.secondary_navigation_url">
                    <a v-if="meta_data.primary_navigation_url"
                        :href="meta_data.primary_navigation_url.url" 
                        :target="meta_data.primary_navigation_url.target !== '' ? meta_data.primary_navigation_url.target :'_self'" 
                        class="btn btn-primary text-center lg:text-left">{{meta_data.primary_navigation_url.title}}</a>
                    <a v-if="meta_data.secondary_navigation_url"
                        :href="meta_data.secondary_navigation_url.url" 
                        :target="meta_data.secondary_navigation_url.target !== '' ? meta_data.secondary_navigation_url.target :'_self'" 
                        class="btn text-center lg:text-left"
                        :class="'text-white underline cursor-pointer p-0 underline-offset-4'">{{meta_data.primary_navigation_url.title}}</a>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props:["meta_data"]
    }
</script>
<style lang="scss" scoped>
    .hero-header-ovelap{
        .overlap{
            @apply w-full h-[368px] mx-auto flex -mt-20 relative;
            .left{
                @apply hidden lg:block w-1/2;
            }
            .right{
                @apply w-full lg:w-1/2 flex flex-col justify-center py-5 px-8 lg:py-10 lg:px-16 gap-[26px] bg-blue;
                .action-wrapper{
                    @apply flex flex-col gap-[18px];
                }
            }
        }
    }
</style>