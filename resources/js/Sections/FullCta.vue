<template v-if="meta_data">
    <section class="cta-blue bg-blue pt-12 pb-16 lg:pt-[70px] lg:pb-[90px]">
        <div class="container flex items-center justify-center gap-8 lg:gap-10 flex-col">
            <h2 class="text-white flex flex-col gap-[10px]">{{meta_data.title}}
                <span class="h-1 w-full bg-red"></span>
            </h2>
            <p class="text-white text-center">{{meta_data.description}}</p>
            <a v-if="meta_data.navigation_url" 
                :href="meta_data.navigation_url.url" :target="meta_data.navigation_url.target !== '' ? meta_data.navigation_url.target : '_self'"
                class="btn btn-primary whitespace-nowrap">{{meta_data.navigation_url.title}}</a>
        </div>
    </section>
</template>
<script>
    export default {
        props: ["meta_data"]

    }
</script>
<style lang="scss" scoped>
    .cta-blue{

    }
</style>