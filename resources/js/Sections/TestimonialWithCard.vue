<template v-if="testimonial">
    <section class="testimonial-with-card container-2 pt-16 lg:pt-[120px] pb-20 lg:pb-[160px]">
        <div class="flex flex-col gap-5 lg:gap-[50px]">
            <h2 class="text-blue font-bold">Testimonials</h2>
            <Carousel :settings="settings" :breakpoints="breakpoints">
                <Slide v-for="item in testimonial" :key="item.id">
                    <div class="testimonial-item text-blue">
                        <p class="text-navy " v-html="item.content"></p>
                        <p class="text-blue font-semibold">{{item.title}}</p>
                    </div>
                </Slide>

                <template #addons>
                    <Navigation />
                </template>
            </Carousel>
        </div>
    </section>
</template>
<script>
    import { Carousel, Navigation, Slide } from 'vue3-carousel'
    import 'vue3-carousel/dist/carousel.css'

    export default {
        props:["testimonial"],
        components: {
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
                        itemsToShow: 1.5,
                        snapAlign: 'center',

                    },
                    // 1024 and up
                    1024: {
                        itemsToShow: 2,
                        snapAlign: 'center',

                    },
                },
            }
        },
    }
</script>
<style lang="scss">
    .testimonial-with-card{
        @apply flex flex-col gap-[50px];
        .carousel{
            .carousel__track{
                .carousel__slide{
                    @apply lg:px-[17px];
                    .testimonial-item{
                        @apply text-start flex flex-col gap-5 bg-[#F3F4F9] py-4 lg:py-[25px] px-6 lg:px-[55px];
                    }
                }
            }
            button.carousel__next, button.carousel__prev{
                @apply bg-white rounded-full hover:bg-white/[0.2] mx-0 lg:mx-[15px];
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                .carousel__icon{
                    path{
                        fill: red;
                    }
                }
            }
            button.carousel__next{
                @apply transform -translate-y-1/2 translate-x-1/2;
            }
            button.carousel__prev{
                @apply transform -translate-y-1/2 -translate-x-1/2;
            }
            .carousel__prev--disabled, .carousel__next--disabled{
                @apply hidden;
            }
        }
    }
</style>