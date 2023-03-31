<template v-if="meta_data">
    <section class="partner-with-description pt-9 lg:pt-[60px] pb-16 lg:pb-[130px] flex flex-col gap-6 lg:gap-10 container-2">
        <div class="title-wrapper">
            <h2 class="text-blue font-bold text-[40px] pb-[10px]" v-html="meta_data.heading"></h2>
            <p class="text-navy w-full lg:w-[673px]" v-html="meta_data.description"></p>
        </div>
        <div class="partners-wrapper grid grid-cols-2 lg:grid-cols-3 gap-11 lg:gap-x-[75px] lg:gap-y-20" v-if="meta_data.partner_list">
            <a v-for="(item, index) in meta_data.partner_list" :key="index"
                :href="item.partner_url ? item.partner_url.url : '#'" :target="item.partner_url.target !== '' ? item.partner_url.target : '_self'">
                <lazy-image 
                    :src="item.partner_image.url"
                    :alt="item.partner_image.title"/>
            </a>
        </div>
    </section>
</template>
<script>
export default {
     props: ["meta_data"],
}
</script>
<style lang="scss" scoped>
    .partner-with-description{

    }
</style>