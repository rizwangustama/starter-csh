<template v-if="meta_data">
    <section class="side-content-with-image">
        <div class="wrapper container-2">
            <div class="left content" v-html="meta_data.content"></div>
            <div class="right">
                <LazyImage :src="meta_data.image ? meta_data.image.url : $images + '/img-overlap.jpg'"
                    :alt="'content image'" :className="''" />
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        props: ["meta_data"]
    }
</script>
<style lang="scss">
    .side-content-with-image {
        .wrapper {
            .left {
                &.content {
                    h2 {
                        @apply text-blue lg:pb-[10px] font-bold;
                    }
                    p {
                        @apply text-navy;
                    }
                }
            }
        }
    }
</style>
<style lang="scss" scoped>
    .side-content-with-image {
        @apply pt-20 pb-16 lg:pt-40 lg:pb-[140px];

        .wrapper {
            @apply flex flex-col-reverse lg:flex-row gap-5 lg:gap-11;

            .left {
                @apply w-full lg:w-1/2;

                &.content {
                    h2 {
                        @apply text-blue font-bold text-[40px] pb-[10px];
                    }
                }
            }

            .right {
                @apply w-full lg:w-1/2;
            }
        }
    }
</style>