<template>
    <section class="bg-blue">
        <div class="container mx-auto py-32">
            <h2 class="heading-1 pb-10 text-white">Featured Articles</h2>
            <div class="grid md:grid-cols-2 gap-5 items-start">
                <div class="primary-featured">
                    <a :href="featured.link">
                        <LazyImage
                            :src="featured.image"
                            style="height: 300px"
                            class-name="object-cover w-full"
                            :alt="featured.title"
                        />
                        <span class="date text-sm text-gray-300 block mt-5 mb-3">{{featured.date}}</span>
                        <h3 class="heading-1 text-white" v-html="featured.title"></h3>
                        <div class="text-sm my-2 md:text-base text-gray-300" v-html="featured.excerpt"></div>
                        <a :href="featured.link" title="Read More" class="cursor-pointer btn btn-primary btn-arrow mt-2">Read More</a>
                    </a>
                </div>
                <div class="other-featured flex flex-col gap-5">
                    <a 
                    v-for="(post, i) in featured_posts_section.posts.slice(1,4)"
                    :key="i" :href="post.link" :title="post.title" class="grid grid-cols-2 gap-5 items-center w-full">
                        <LazyImage
                            :src="post.image"
                            style="height: 180px"
                            class-name="object-cover w-full"
                            :alt="post.title"
                        />
                        <article class="article-detail">
                            <span class="date text-sm text-gray-300 block mt-5 mb-3">{{post.date}}</span>
                            <h3 class="heading-3 text-white" v-html="post.title"></h3>
                        </article>
                    </a>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    props:["featured_posts_section"],
    computed: {
        featured() {
            return this.featured_posts_section.posts[0];
        },
    },
}
</script>

<style lang="scss" scoped>
    .other-featured {
        a {
            padding-bottom:18px;
        }
        a:not(:last-child) {
            border-bottom: 0.5px solid rgba(#FFFFFF, .6);
        }
    }
</style>
