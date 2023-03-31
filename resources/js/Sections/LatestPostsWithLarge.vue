<template v-if="meta_data">
    <section class="posts-with-large pt-11 pb-8 lg:pt-20 lg:pb-[70px] flex flex-col container-2">
        <div class="heading-wrapper">
            <h2 class="text-blue pb-[10px] font-bold text-[40px]">{{meta_data.heading.title}}</h2>
            <p class="text-navy max-w-[673px]" v-html="meta_data.heading.description"></p>
        </div>

        <div class="posts-lists">
            <div class="primary-featured" v-if="largePosts">
                <a :href="largePosts.link" class="bg-blue">
                    <LazyImage :src="largePosts.image" 
                        :class-name="'object-cover w-full lg:w-1/2 h-[395px]'"
                        :alt="largePosts.title" />
                    <div class="post-data">
                        <h3 class="heading-1 text-white" v-html="largePosts.title"></h3>
                        <div class="text-sm my-2 md:text-base text-gray-300" v-html="largePosts.excerpt"></div>
                    </div>
                </a>
            </div>
            <div class="more-posts" v-if="meta_data.latest_posts">
                <a :href="item.link" class="flex flex-col gap-[10px]" v-for="item in meta_data.latest_posts" :key="item.id">
                    <lazy-image :src="item.image"
                        :alt="item.title"
                        :className="'max-h-[200px] object-cover'"/>
                    <h5 class="px-[10px]" v-html="item.excerpt"></h5>
                </a>
            </div>
        </div>

        <a v-if="meta_data.navigation_url" class="btn btn-primary mx-auto min-w-[316px]"
            :href="meta_data.navigation_url.url"
            :target="meta_data.navigation_url.target !== '' ? meta_data.navigation_url.target : '_self'"><span
                class="mx-auto">{{meta_data.navigation_url.title}}</span></a>
    </section>
</template>
<script>
    export default {
        props: ["meta_data"],
        data() {
            return {
                largePosts: null,
            }
        },
        mounted() {
            if (this.meta_data.latest_posts) {
                this.largePosts = this.meta_data.latest_posts.shift();
            }
        },
    }
</script>
<style lang="scss" scoped>
    .posts-with-large{
        @apply flex flex-col gap-[50px];
        .heading-wrapper {
            @apply w-full;
        }
        .posts-lists{
            @apply lg:pb-[50px] flex flex-col gap-[50px];
            .primary-featured{
                a{
                    @apply flex flex-col lg:flex-row gap-[25px];
                    .post-data{
                        @apply w-full lg:w-1/2 pb-6 lg:py-10 px-[25px] flex flex-col gap-5 lg:gap-[70px];
                    }
                }
            }
            .more-posts{
                @apply grid lg:grid-cols-3 gap-5 lg:gap-y-[50px];
            }
        }
    }
</style>