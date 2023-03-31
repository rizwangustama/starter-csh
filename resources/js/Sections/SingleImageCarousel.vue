<template v-if="meta_data">
    <section class="single-image-carousel pt-11 pb-7 lg:pt-[90px] lg:pb-[70px] container-2">
        <h2 class="text-blue font-bold text-[40px] pb-[30px] text-left">{{meta_data.heading}}</h2>
        <Carousel :settings="settings">
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
            }
        },
        mounted() {
        },
    }
</script>
<style lang="scss">
    .single-image-carousel{
        .carousel{
            .carousel__track{
                .carousel__slide{
                    @apply w-full;
                    figure{
                        @apply w-full;
                    }
                }
            }
            .carousel__pagination{
                @apply gap-3 mt-4 lg:mt-[35px];
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
            button.carousel__next{
                @apply bg-white rounded-full hover:bg-white/[0.2] m-0 transform -translate-y-full translate-x-1/2;
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                .carousel__icon{
                    path{
                        fill: red;
                    }
                }
            }
            button.carousel__prev{
                @apply bg-white rounded-full hover:bg-white/[0.2] m-0 transform -translate-y-full -translate-x-1/2;
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