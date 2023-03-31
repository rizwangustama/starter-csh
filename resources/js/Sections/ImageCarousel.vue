<template v-if="meta_data">
    <section class="image-carousel pt-12 pb-8 lg:pt-[90px] lg:pb-[70px]">
        <h2 class="text-blue pb-9 lg:pb-[70px] text-center">{{meta_data.heading}}</h2>
        <Carousel :settings="settings" :breakpoints="breakpoints">
            <Slide v-for="item in meta_data.image_gallery" :key="item.ID">
                <lazy-image
                    :src="item.url"
                    :alt="item.title"/>
            </Slide>

            <template #addons>
                <Pagination />
                <Navigation />
            </template>
        </Carousel>
    </section>
</template>
<script>
    import { Carousel, Navigation, Slide, Pagination } from 'vue3-carousel'
    import 'vue3-carousel/dist/carousel.css'

    export default {
        props:["meta_data"],
        components: {
            Pagination,
            Carousel,
            Slide,
            Navigation,
        },
        data() {
            return {
                settings: {
                    itemsToShow: 1,
                    snapAlign: 'center',
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
                        itemsToShow: 2.5,
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
    .image-carousel{
    .carousel{
        .carousel__track{
            .carousel__slide{
                @apply px-4;
                // width: unset!important;
                img {
                    border-radius: 30px!important;
                }
            }
        }
        .carousel__pagination{
            @apply gap-3 mt-7 lg:mt-12;
            .carousel__pagination-item{
                .carousel__pagination-button{
                    @apply w-[10px] h-[10px] bg-[#DA001D]/[20%] rounded-full;
                    &::after{
                        @apply hidden;
                    }
                    &.carousel__pagination-button--active{
                        @apply bg-[#DA001D];
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