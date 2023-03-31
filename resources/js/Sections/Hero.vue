<template>
    <section class="hero-section relative">
        <div class="hero-layout w-full xl:container mx-auto">
            <div class="left">
                <div class="title-wrapper">
                    <h1 class="text-blue" v-html="meta_data.hero_text_heading"></h1>

                    <div class="action-wrapper" v-if="meta_data.hero_button_actions">
                        <a :href="item.navigation_url.url" v-for="(item,index) in meta_data.hero_button_actions" :key="index" 
                            :target="item.navigation_url.target !== '' ? item.navigation_url.target : '_self'"
                            class="btn w-full lg:w-fit"
                            :class="item.button_style === 'primary' ? 'btn-primary' : 'btn-secondary'"><span class="mx-auto lg:mx-0">{{item.navigation_url.title}}</span></a>
                    </div>
                </div>
            </div>
            <img class="right object-cover min-h-[687px] rounded-bl-[120px]" :src="meta_data.image" alt="hero-image" width="658" height="687" v-if="meta_data.image">
        </div>
        <div class="section-background absolute top-0 left-0 w-full h-[627px] bg-navy/5 -z-10"></div>
    </section>
</template>
<script>
export default {
    props:["meta_data"]
    
}
</script>
<style lang="scss" scoped>
    .hero-section{
        @apply -mt-[72px];
        .hero-layout{
            @apply flex flex-col lg:flex-row items-center justify-between lg:overflow-hidden;
            .left {
                    @apply absolute lg:relative top-1/2 transform -translate-y-1/2 lg:translate-y-0;
                .title-wrapper{
                    @apply flex flex-col gap-[26px];
                    .action-wrapper{
                        @apply flex flex-col lg:flex-row gap-[18px];
                    }
                }

            }
            .right{
                @apply lg:transform lg:translate-x-[20%] 2xl:translate-x-0;
            }
        }
    }
</style>