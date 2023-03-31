<template>
<div>
    <div class="posts-author-section pt-5" v-if="data_to_show && data_to_show.length >0">
        <h3 class="lg:ml-0 lg:mb-6 lg:mr-0 ml-0 mb-3 mr-0 text-3xl uppercase font-bold" id="blog">Posts By {{ author.name }}</h3>
        <hr class="border-t-2 border-primary/20">
        <div class="articles-feed grid grid-cols-1 gap-5" v-if="data_to_show && data_to_show.length >0">
            <a
            v-for="(post, i) in data_to_show"
            :key="i" :href="post.link" :title="post.title" class="flex flex-col gap-5 border-b border-neutral pb-5">
                <article class="article-detail">
                    <span class="date text-sm block mt-5 mb-3" :class="{'text-gray-200':theme=='dark','text-gray-500':theme=='light'}">{{ customDate(post.date) }}</span>
                    <h3 class="heading-3" :class="{'text-white':theme=='dark','text-altBlack':theme=='light'}" v-html="post.title"></h3>
                    <div class="mt-3" v-html="post.content.slice(0,200)+'...'"></div>
                </article>
            </a>
        </div>
        <div class="py-10" v-if="!isFetching && data && data.posts.pageInfo.hasNextPage">
            <button type="button" title="load more posts" class="btn btn-arrow btn-primary" @click="loadMore">Load More</button>
        </div> 
    </div>
</div>   
</template>

<script>
import { useQuery } from "villus";
import { NEWS } from "../graphql/news.js";
import dateFormat from "dateformat";
import { ref, reactive, getCurrentInstance, computed } from "vue";
export default {
    data() {
        return {
            data_to_show: null,
            
        }
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
        theme: {
            type: String,
            default: "light",
        },
    },
    setup(props) {
        const nextCursor = ref(null);
        const exclude_ids = ref(null);
        const search_input = ref("");
        const order_options = [
            { id: "DESC", name: "Latest Posts" },
            { id: "ASC", name: "Oldest Posts" },
        ];

        const state = reactive({
            issues_values: null,
            order_values: null,
        });

        const variables = computed(() => {
            let data = {
                first: 6,
            };

            if (props.authorType === "staff") {
                data.staffId = parseInt(props.author.id);
            }else{
                data.author = parseInt(props.author.id);
            }

            if (nextCursor.value) {
                data.after= nextCursor.value
            }

            if (exclude_ids.value) {
                data.exclude_ids = exclude_ids.value
            }
            
            return data
        });

        const { data, isFetching } = useQuery({
            query: NEWS,
            variables: variables,
        });

        return {
            isFetching,
            data,
            state,
            search_input,
            order_options,
            nextCursor,
            exclude_ids
        };
    },
    methods: {
        loadMore() {
            this.nextCursor = this.data.posts.pageInfo.endCursor;
            this.exclude_ids = this.data.posts.nodes[0].databaseId;
        },
        customDate: function (tempdate) {
            let postDate = new Date(tempdate);
            if (isNaN(postDate)) {
                let newDate = tempdate.replace(/\./g, "/");
                return dateFormat(new Date(newDate), "mmmm dd, yyyy");
            } else {
                return dateFormat(new Date(postDate), "mmmm dd, yyyy");
            }
        },
    },
    watch: {
        data: {
            handler() {
                if (this.nextCursor) {
                    this.data_to_show.push(...this.data.posts.nodes);
                } else {
                    this.data_to_show = this.data.posts.nodes;
                }
            },
            deep: true,
        },
    },
}
</script>