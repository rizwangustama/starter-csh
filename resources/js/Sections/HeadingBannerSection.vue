<template>
    <section class="bg-blue relative overflow-hidden">
        <div class="ornament absolute right-0 top-80 md:top-0 bg-[#F3F4F9] z-10 h-full w-5/12" style="border-radius: 90px 0px 0px 0px;"></div>
        <div class="container py-10 lg:py-20 relative z-50 min-h-content mx-auto flex flex-col md:flex-row gap-5 justify-between items-center">
            <div class="w-full relative z-20 md:w-1/2 banner-title flex flex-col gap-5 items-start">
                <span class="text-sm md:text-base date text-gray-300">{{ date }}</span>
                <h1 class="display-1 text-white" v-html="title"></h1>
                <div class="text-sm md:text-base text-gray-300" v-html="excerpt"></div>
                <a :href="url" title="Read More" class="cursor-pointer btn btn-primary btn-arrow">Read More</a>
            </div>
            <div class="w-full relative z-20 md:w-1/2 banner-image">
                <LazyImage
                    :src="imageFeatured"
                    :alt="title"
                    class-name="object-cover max-h-400"
                />
            </div>
        </div>
    </section>
</template>

<style lang="scss" scoped>
    .ornament svg {
        @apply max-w-full;
    }
</style>

<script>
export default {
    props: {
        date: {
            type: String,
            default: "May 05, 2021",
        },
        title: {
            type: String,
            default: "Prescribed burns caused massive New Mexico fire, report finds"
        },
        excerpt: {
            type: String,
            default: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Porttitor morbi enim lectus purus vel pellentesque ipsum pharetra. Tempus pulvinar aliquam blandit varius.",
        },
        url: {
            type: String,
            default: "#"
        },
        image: {
            type: String,
            default: null
        }
    },
    computed: {
        imageFeatured() {
            if (this.image) {
                return this.image;
            }
            return this.$page.props.images+'header.jpg';
        }
    },
}
</script>
