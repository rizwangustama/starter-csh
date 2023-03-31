<template>
    <div :class="{'bg-primary':theme=='dark'}">
        <div class="container">
            <h2 class="heading-1 py-10" :class="{'text-white':theme=='dark','text-altBlack':theme=='light'}">{{title}}</h2>
            <div class="articles-feed grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" v-if="posts && posts.length >0">
                <a
                v-for="(post, i) in posts"
                :key="i" :href="post.link" class="flex flex-col gap-5 border-b md:border-b-0 border-neutral pb-5">
                    <LazyImage
                        :alt="post.title"
                        :src="post.image"
                        style="height: 300px"
                        class-name="object-cover w-full"
                    />
                    <article class="article-detail">
                        <span class="date text-sm block mt-5 mb-3" :class="{'text-gray-200':theme=='dark','text-gray-500':theme=='light'}">{{post.date}}</span>
                        <h3 class="heading-3" :class="{'text-white':theme=='dark','text-altBlack':theme=='light'}" v-html="post.title"></h3>
                    </article>
                </a>
            </div>
            <div class="text-center block my-10">
                <a :href="link" title="See All" class="btn btn-arrow" :class="{'btn-primary':theme=='dark','btn-primary btn-outline':theme=='light'}">See All</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            theme: {
                type: String,
                default: 'light'
            },
            title: {
                type: String,
                default:null
            },
            posts: {
                type: Array,
                default: null,
            },
            link: {
                type: String,
                default: "#",
            }
        },
    }
</script>

<style lang="scss" scoped>
    .articles-feed {
        a {
            @apply pr-0 md:pr-[18px];
            // padding-right:18px;
        }
        a:not(:last-child) {
            @apply lg:border-r-[0.5px] lg:border-[#B3B4B9];
            // border-right: 0.5px solid #B3B4B9;
        }
    }

</style>
