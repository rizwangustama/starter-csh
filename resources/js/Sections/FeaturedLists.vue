<template>
    <section class="featured-lists py-11 lg:py-20">
        <div class="wrapper container-2 flex flex-col gap-7 lg:gap-[45px]">
            <div class="content-heading gap-[10px] flex flex-col max-w-[673px]">
                <h2 class="text-blue font-bold text-[40px]">{{meta_data.featured_group_heding.title}}</h2>
                <p class="text-navy">{{meta_data.featured_group_heding.description}}</p>
            </div>
            <div class="list-featured" v-if="meta_data.featured_item">
                <div class="card-item" :class="item.image ? 'flex flex-col-reverse lg:flex-row gap-6 items-start':''"
                    v-for="(item, index) in meta_data.featured_item" :key="index">
                    <div class="card-content" :class="item.image ? 'w-full lg:w-4/6':'w-full'">
                        <h6 class="text-red">{{item.sub_title}}</h6>
                        <h4 class="text-navy font-bold">{{item.title}}</h4>
                        <article class="text-navy" v-html="item.content"></article>
                    </div>
                    <lazy-image v-if="item.image"
                        :className="' object-contain max-h-[210px]'"
                        :class="item.image ? 'w-full lg:w-2/6':'w-full'" :src="item.image.url"
                        :alt="item.image.title" />
                </div>
            </div>
            <a v-if="meta_data.featured_navigation_url" class="btn btn-primary mx-auto min-w-[316px]"
                :href="meta_data.featured_navigation_url.url"
                :target="meta_data.featured_navigation_url.target !== '' ? meta_data.featured_navigation_url.target : '_self'"><span class="mx-auto">{{meta_data.featured_navigation_url.title}}</span></a>
        </div>
    </section>
</template>
<script>
    export default {
        props: ["meta_data"],

    }
</script>
<style lang="scss" scoped>
    .featured-lists {
        .wrapper {
            .list-featured {
                @apply flex flex-col gap-3 lg:gap-[20px];
                .card-item {
                    @apply py-[30px] px-5 border-b border-b-[#CDCFE2];

                    p {
                        @apply leading-snug;
                    }

                    a {
                        @apply underline;
                    }
                }
                .card-item:last-child{
                    @apply border-b-0 border-b-transparent pb-11 lg:pb-[95px];
                }
            }
        }

    }
</style>