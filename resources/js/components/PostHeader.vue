<template>
    <div class="single bg-secondary relative overflow-hidden">
        <div class="ornament w-1/2 absolute right-0 top-80 md:top-0 bg-light z-10 h-full w-5/12" style="border-radius: 90px 0px 0px 0px;"></div>
        <div class="container py-10 lg:py-20 min-h-600 relative z-50 min-h-content mx-auto flex flex-col md:flex-row gap-5 justify-between items-center">
            <svg-vue
                icon="ornament-logo"
                alt="logo"
                aria-label="Readify logo"
                class="absolute w-11/12 z-10 md:w-7/12 top-0 icon"
            ></svg-vue>
            <div class="w-full relative z-20 md:w-1/2 banner-title flex flex-col gap-5 items-start">
                <a :href="$settings.site.url" title="back to home" class="arrow flex gap-3 items-center">
                    <svg-vue icon="arrow-left" class="w-6 h-6"></svg-vue>
                    <p class="paragraph-2 text-white">Back to Home</p>
                </a>
                <div class="chisp gap-3 flex">
                    <a
                        v-for="(item, index) in post.categories" :key="index"
                        :href="item.permalink"
                        :title="item.title"
                        class="paragraph-2 bg-light text-altblack py-1 px-3 rounded-full"
                        >{{ item.title }}</a
                    >
                </div>
                <div>
                    <h1 class="display-1 text-white" v-html="post.title"></h1>
                    <div
                        class="text-white leading-6 paragraph mt-[27px] font-normal"
                        v-html="post.excerpt"
                    >
                    </div>
                    <div class="mt-4 text-white">
                        <div
                            class="inline-block"
                            v-if="
                                Array.isArray(post.author) &&
                                post.author.length > 0
                            "
                        >
                            <span
                                class="author"
                                v-for="(author, i) in post.author"
                                :key="i"
                            >
                                <span v-if="i > 0">, </span>
                                <a
                                    class="underline hover:no-underline"
                                    :href="author.link"
                                    :title="'view all posts by'+ author.name"
                                    v-if="
                                        author.link != '' && author.link != '#'
                                    "
                                    >{{ author.name }}</a
                                >
                                <span v-else>{{ author.name }}</span>
                            </span>
                        </div>
                        <div v-else class="inline-block">
                            <a
                                class="underline hover:no-underline"
                                :href="post.author.link"
                                :title="'view all posts by'+ post.author.name"
                                v-if="
                                    post.author.link != '' &&
                                    post.author.link != '#'
                                "
                                >{{ post.author.name }}</a
                            >
                            <span v-else>{{
                                post.author.name
                            }}</span>
                        </div>
                        &nbsp;|&nbsp;<span
                        class="paragraph-1 text-white"
                        > {{ post.date }}</span
                    >
                    </div>
                </div>
            </div>
            <div class="w-full relative z-20 md:w-1/2 banner-image">
                <LazyImage
                    :src="post.image"
                    :alt="post.title"
                    class-name="object-cover max-h-400"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        post: {
            type: Object,
            required: true,
        },
    },
}
</script>