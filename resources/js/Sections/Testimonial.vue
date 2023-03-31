<template v-if="testimonial">
    <section class="testimonial bg-[#F3F4F9] pt-[60px]  lg:pt-[120px] pb-[70px] lg:pb-[140px]">
        <div class="container flex flex-col gap-5 lg:gap-[50px]">
            <h2 class="text-blue text-center">Testimonials</h2>
            <Carousel :settings="settings" :breakpoints="breakpoints">
                <Slide v-for="item in testimonial" :key="item.id">
                    <div class="testimonial-item px-5 lg:px-0 text-blue w-full lg:max-w-[555px] text-center">
                        <p class="text-navy pb-12 lg:pb-[90px] text-center" v-html="item.content"></p>
                        <p class="text-navy font-semibold text-center">{{item.title}}</p>
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
                        itemsToShow: 1,
                        snapAlign: 'center',

                    },
                    // 1024 and up
                    1024: {
                        itemsToShow: 1,
                        snapAlign: 'center',

                    },
                },
            }
        },
    }
</script>
<style lang="scss">
    .testimonial{
        @apply flex flex-col gap-[50px];
        .carousel{
            @apply w-full lg:max-w-[944px] mx-auto;
            button.carousel__next, button.carousel__prev{
                @apply bg-white rounded-full mx-0 lg:mx-10 hover:bg-white/[0.2];
                box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
                .carousel__icon{
                    path{
                        fill: red;
                    }
                }
            }
            button.carousel__prev{
                @apply -translate-y-1/2 -translate-x-[40%] lg:translate-x-0;
            }
            button.carousel__next{
                @apply -translate-y-1/2 translate-x-[40%] lg:translate-x-0;
            }
            .carousel__prev--disabled, .carousel__next--disabled{
                @apply hidden;
            }
        }
    }
</style>