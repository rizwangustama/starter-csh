<template>
    <section class="text-content-section pt-16 pb-20 lg:pt-[140px] lg:pb-[180px] container" 
        v-if="meta_data.meta_text_content && meta_data.meta_text_content.heading !== '' && meta_data.meta_text_content.content !== ''">
        <div class="content-wrapper container">
            <h2 class="text-blue" v-html="meta_data.meta_text_content.heading"></h2>
            <p class="text-navy" v-html="meta_data.meta_text_content.content"></p>
        </div>
    </section>
</template>
<script>
export default {
    props:["meta_data"],
}
</script>
<style lang="scss" scoped>
    .text-content-section{
        .content-wrapper{
            @apply flex flex-col gap-[30px];
            h2{
                @apply text-blue text-center;
            }
            p{
                @apply w-full lg:max-w-[673px] text-center mx-auto;
            }
        }
    }
</style>