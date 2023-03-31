<template>
    <div class="bg-primary py-10 lg:py-20">
        <div class="container">
            <h2 class="heading-1 py-6 md:py-10 text-white">Related articles</h2>
            <div
                class="articles-feed grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5"
                v-if="data"
            >
                <a
                    v-for="(items, i) in data.posts.nodes"
                    :key="i"
                    :href="items.link"
                    :title="items.title"
                    class="flex flex-col gap-5 border-b md:border-b-0 border-neutral pb-5"
                >
                    <LazyImage
                        :alt="items.title"
                        :src="
                            items.featuredImage
                                ? items.featuredImage.node.mediaItemUrl
                                : $images + '/news-1.jpeg'
                        "
                        style="height: 300px;"
                        class-name="object-cover w-full"
                    />
                    <article class="article-detail">
                        <span
                            class="date text-sm block mt-5 mb-3 text-neutral"
                            >{{ customdate(items.date) }}</span
                        >
                        <h3
                            class="heading-3 text-white"
                            v-html="items.title"
                        ></h3>
                    </article>
                </a>
            </div>
        </div>
    </div>
</template>
<script>
import { useQuery } from "villus";
import { NEW_ARTICLE } from "../graphql/posts";
import dateFormat from "dateformat";
import { computed, ref } from "vue";
export default {
    props: ["post"],
    setup(props) {
        const variables = computed(() => {
            return {
                notIn: props.post.id,
            };
        });

        const { data, isFetching } = useQuery({
            query: NEW_ARTICLE,
            variables: variables,
            cachePolicy: "network-only",
        });

        return {
            data,
            isFetching,
        };
    },
    methods: {
        customdate(tempdate) {
            let postDate = new Date(tempdate);
            return dateFormat(postDate, "mmmm dd, yyyy");
        },
    },
};
</script>

<style lang="scss">
.content-main .single{
    p {
        @apply text-base leading-normal sm:text-lg md:text-xl text-neutral-70 sm:leading-[30px] pb-7;
    }

    pre {
        @apply mb-7;
    }
    .alignleft {
        float: left;
        padding-right: 20px;
    }
    .alignright {
        float: right;
        padding-left: 20px;
    }
    ul {
        list-style-type: disc;
        @apply pl-10;
        li {
            @apply text-base leading-normal text-neutral-70 sm:text-lg md:text-xl pl-2.5;
        }
    }
}
</style>
