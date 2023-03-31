<template>
    <App>
        <article class="user-detail container pt-10 pb-20">
            <div class="flex flex-col md:flex-row mt-2 gap-x-5 mb-5 w-full">
                <img v-if="author.image" :src="author.image" :alt="author.name" class="object-cover mt-6 w-20 h-20 md:w-40 md:h-40">
                <div class="info">
                    <header class="relative flex">
                        <h3
                            v-html="author.name"
                            class="py-5 leading-none font-semibold text-3xl lg:text-5xl"
                        ></h3>
                    </header>
                    <div v-if="author.bio" class="pb-5" v-html="author.bio"></div>
                </div>
            </div>
            <AuthorPost :author="author" :authorType="authorType"></AuthorPost>
        </article>
    </App>
</template>

<script>
import AuthorPost from "../Archives/AuthorPost.vue";

export default {
    components: {
        AuthorPost
    },
    props: {
        author: {
            type: Object,
            required: true,
        },
        authorType: {
            type: String,
            required: true,
        },
    },
}
</script>

<style>

</style>