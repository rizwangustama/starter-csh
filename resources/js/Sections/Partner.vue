<template v-if="meta_data">
    <section class="partner pt-[60px] pb-[70px] lg:pt-[100px] lg:pb-[130px] container flex flex-col gap-14 lg:gap-20">
        <h2 class="text-blue text-center" v-html="meta_data.heading"></h2>
        <div class="partners-wrapper grid lg:grid-cols-3 gap-10 lg:gap-20 max-w-[922px] mx-auto" v-if="meta_data.partner_list">
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
    
</style>