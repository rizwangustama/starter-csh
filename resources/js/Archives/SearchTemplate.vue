<template>
    <Section>
        <div class="container mx-auto" v-if="posts && posts.length > 0">
            <h1 class="text-2xl my-10">{{ title }}</h1>
            <div class="articles-feed grid grid-cols-1 gap-5" v-if="posts && posts.length >0">
                <a
                v-for="(post, i) in posts"
                :key="i" :href="post.link" class="flex flex-col gap-5 border-b border-neutral pb-5">
                    <article class="article-detail">
                        <span class="date text-sm block mt-5 mb-3" :class="{'text-gray-200':theme=='dark','text-gray-500':theme=='light'}">{{post.date}}</span>
                        <h1 class="heading-3" :class="{'text-white':theme=='dark','text-altBlack':theme=='light'}" v-html="post.title"></h1>
                        <div class="mt-3" v-html="post.content.slice(0,200)+'...'"></div>
                    </article>
                </a>
            </div>
            <div class="flex justify-center gap-x-5 mt-3 mb-10 justify-between">
                <a
                    class="btn btn-arrow-left btn-primary"
                    :class="{
                        'opacity-0 hidden invisible pointer-events-none': (!pagination.prev_page || pagination.current_page == 1),
                    }"
                    :href="`${pagination.prev_page}`"
                    title="Previous Page"
                    preserve-scroll
                    >Prev</a
                >
                <a
                    class="btn btn-arrow btn-primary"
                    :class="{
                        'opacity-0 hidden invisible pointer-events-none':
                            !pagination.has_next_page,
                    }"
                    :href="`${pagination.next_page}`"
                    title="Next Page"
                    preserve-scroll
                    >Next</a
                >
            </div>
        </div>
        <div v-else class="container pt-10 text-center">
            <page-not-found></page-not-found>
        </div>
    </Section>
</template>
<script>
import PageNotFound from "../Components/PageNotFound.vue";
import LazyImage from "../Components/LazyImage.vue";
export default {
    props: ["posts", "pagination", "title"],
    components: {
        LazyImage,
        PageNotFound
    },
};
</script>
