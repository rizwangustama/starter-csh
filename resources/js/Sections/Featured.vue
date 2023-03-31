<template>
    <section class="featured pt-16 pb-11 lg:pt-[100px] lg:pb-[70px]">
        <div class="wrapper container flex flex-col gap-5 lg:gap-[50px] w-full lg:max-w-[855px]">
            <div class="content-heading gap-5 lg:gap-[30px] py-[10px] flex flex-col text-center">
                <h2 class="text-blue">{{meta_data.featured_group_heding.title}}</h2>
                <p class="text-navy">{{meta_data.featured_group_heding.description}}</p>
            </div>
            <div class="card-featured" v-if="meta_data.featured_item">

                <div class="card-item" :class="item.image ? 'flex flex-col-reverse lg:flex-row gap-6 lg:gap-10 items-start':''"
                    v-for="(item, index) in meta_data.featured_item" :key="index">
                    <div class="card-content" :class="item.image ? 'w-full lg:w-4/6':'w-full'">
                        <h6 class="text-blue">{{item.sub_title}}</h6>
                        <h4 class="font-semibold text-navy">{{item.title}}</h4>
                        <article class="text-navy" v-html="item.content"></article>
                    </div>
                    <lazy-image v-if="item.image" 
                        :class="item.image ? 'w-full lg:w-2/6':'w-full'" 
                        :className="'object-contain max-h-[210px]'"
                        :src="item.image.url"
                        :alt="item.image.title" />
                </div>

            </div>
            <a v-if="meta_data.featured_navigation_url" class="btn btn-primary mx-auto"
                :href="meta_data.featured_navigation_url.url"
                :target="meta_data.featured_navigation_url.target !== '' ? meta_data.featured_navigation_url.target : '_self'">{{meta_data.featured_navigation_url.title}}</a>
        </div>
    </section>
</template>
<script>
    export default {
        props: ["meta_data"],

    }
</script>
<style lang="scss">
    .featured {
        .wrapper {
            .card-featured {
                @apply flex flex-col gap-[20px];
                .card-item {
                    @apply p-[30px] rounded-[30px] shadow-lg;

                    p {
                        @apply leading-snug;
                    }

                    a {
                        @apply underline;
                    }
                }
            }
        }

    }
</style>