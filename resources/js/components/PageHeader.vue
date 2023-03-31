<template>
    <div class="single bg-secondary relative z-1">
        <div v-if="image" class="ornament w-1/2 absolute right-0 top-80 md:top-0 bg-light z-10 h-full w-5/12" style="border-radius: 90px 0px 0px 0px;"></div>
        <div class="container mx-auto space-y-4 pt-5 pb-10 overflow-hidden">
            <span class="line"></span>
            <div class="flex flex-col md:flex-row gap-5 justify-between items-center">
                <svg-vue
                    icon="ornament-logo"
                    alt="logo"
                    aria-label="Readify logo"
                    class="absolute w-11/12 z-10 md:w-7/12 top-0 icon" :class="{'left-0': image, 'right-0': !image}"
                ></svg-vue>
                <div
                    class="content flex flex-col gap-[27px] py-16 relative z-30 w-full" :class="{'md:w-[90%]': !image, 'md:w-1/2': image}"
                >
                    <a :href="$settings.site.url" class="arrow flex gap-3 items-center" title="back to home">
                        <svg-vue icon="arrow-left" class="w-6 h-6"></svg-vue>
                        <p class="paragraph-2 text-white">Back to Home</p>
                    </a>
                    <div>
                        <h1
                            class="leading-9 lg:text-[50px] font-bold text-white lg:leading-snug"
                            :class="{'text-3xl xl:text-[76px] xl:leading-[91.2px]':title.length <= 70 }"
                            v-html="title"
                        ></h1>
                    </div>
                </div>
                <div v-if="image" class="w-full relative z-20 md:w-1/2 banner-image">
                    <LazyImage
                        :src="image"
                        :alt="title"
                        class-name="object-cover max-h-400"
                    />
                </div>
            </div>
            <span class="line"></span>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title","image"],
}
</script>