<template v-if="meta_data">
    <section class="posts-carousel pt-12 pb-9 lg:pt-[90px] lg:pb-[70px] bg-[#F3F4F9] flex flex-col">
        <div class="heading-wrapper container">
            <h2 class="text-blue text-center">{{meta_data.heading.title}}</h2>
            <p class="text-navy text-center max-w-[672px] mx-auto" v-html="meta_data.heading.description"></p>
        </div>
        <Carousel :settings="settings" :breakpoints="breakpoints" v-if="meta_data.latest_posts">
            <Slide v-for="item in meta_data.latest_posts" :key="item.ID">
                <a :href="item.link" class="posts-card text-blue">
                    <lazy-image
                        :src="item.image"
                        :alt="item.title"/>
                    <h5 class="text-start px-5 line-clamp-2" v-html="item.title"></h5>
                </a>
            </Slide>

            <template #addons>
                <Navigation />
            </template>
        </Carousel>
        <a v-if="meta_data.navigation_url" class="btn btn-primary mx-auto"
                :href="meta_data.navigation_url.url"
                :target="meta_data.navigation_url.target !== '' ? meta_data.navigation_url.target : '_self'">{{meta_data.navigation_url.title}}</a>
    </section>
</template>
<script>
    import { Carousel, Navigation, Slide } from 'vue3-carousel'
    import 'vue3-carousel/dist/carousel.css'

    export default {
        props:["meta_data"],
        components: {
            Carousel,
            Slide,
            Navigation,
        },
        data() {
            return {
                settings: {
                    itemsToShow: 1,
                    snapAlign: 'start',
                    transition: 500,
                },
                // breakpoints are mobile first
                // any settings not specified will fallback to the carousel settings
                breakpoints: {
                    // 700px and up
                    700: {
                        itemsToShow: 2.5,
                        snapAlign: 'start',

                    },
                    // 1024 and up
                    1024: {
                        itemsToShow: 3.5,
                        snapAlign: 'start',

                    },
                },
            }
        },
        mounted() {
        },
    }
</script>
<style lang="scss">
    .posts-carousel{
        .heading-wrapper{
            @apply flex flex-col gap-[30px];
        }
        .carousel{
            .carousel__viewport {
                @apply py-12 lg:py-[70px];
                .carousel__track{
                    // @apply gap-[32px];
                    li:first-child{
                        @apply pl-5 lg:pl-12;
                    }
                    .carousel__slide{
                        @apply px-4;
                        a.posts-card{
                            @apply flex flex-col gap-[18px] rounded-t-[30px] pb-[25px] items-baseline shadow-lg bg-white rounded-[30px];
                            img{
                                @apply rounded-t-[30px]
                            }
                        }
                    }
                }
            }
            button.carousel__next, button.carousel__prev{
                @apply bg-white rounded-full mx-0 lg:mx-10 hover:bg-white/[0.2];
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                .carousel__icon{
                    path{
                        fill: red;
                    }
                }
            }
            .carousel__prev--disabled, .carousel__next--disabled{
                @apply hidden;
            }
        }
    }
    

</style>