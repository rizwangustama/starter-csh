<template>
    <section>
        <div class="container mx-auto" v-if="posts && posts.length > 0">
            <h1 class="text-2xl my-10" v-html="title"></h1>
            <div class="articles-feed grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" v-if="posts && posts.length >0">
                <a
                v-for="(post, i) in posts"
                :key="i" :href="post.link" class="flex flex-col gap-5 border-b md:border-b-0 border-neutral pb-5">
                    <LazyImage
                        :alt="post.title"
                        aria-label="Read more about {{post.title}}"
                        :src="post.image"
                        style="height: 300px"
                        class-name="object-cover w-full"
                    />
                    <article class="article-detail">
                        <span class="date text-sm block mt-5 mb-3" :class="{'text-gray-200':theme=='dark','text-gray-500':theme=='light'}">{{post.date}}</span>
                        <h3 class="heading-3" :class="{'text-white':theme=='dark','text-altBlack':theme=='light'}" v-html="post.title.slice(0,50)+'...'"></h3>
                    </article>
                </a>
            </div>
            <div class="flex justify-center gap-x-5 mt-3 mb-10 justify-between">
                <a
                    class="btn btn-arrow-left btn-primary"
                    :class="{
                        'opacity-0 hidden invisible pointer-events-none': (!pagination.prev_page || pagination.current_page == 1),
                    }"
                    title="Previous Page"
                    :href="`${pagination.prev_page}`"
                    preserve-scroll
                    >Prev</a
                >
                <a
                    class="btn btn-arrow btn-primary"
                    :class="{
                        'opacity-0 hidden invisible pointer-events-none':
                            !pagination.has_next_page,
                    }"
                    title="Next Page"
                    :href="`${pagination.next_page}`"
                    preserve-scroll
                    >Next</a
                >
            </div>
        </div>
        <div v-else class="container pt-10 text-center">
            <page-not-found></page-not-found>
        </div>
    </section>
</template>
<script>
import PageNotFound from "../Components/PageNotFound.vue";
import LazyImage from "../Components/LazyImage.vue";
export default {
    props: ["posts", "pagination", "title","theme"],
    components: {
        LazyImage,
        PageNotFound
    },
};
</script>
