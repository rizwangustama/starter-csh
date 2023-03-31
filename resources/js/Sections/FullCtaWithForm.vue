<template v-if="meta_data">
    <section class="cta-blue-form pt-12 pb-16 bg-blue lg:pt-[70px] lg:pb-[90px]">
        <div class="container flex items-center justify-center gap-10 flex-col">
            <h2 class="text-white flex flex-col gap-[10px]">{{meta_data.title}}
                <span class="h-1 w-full bg-red"></span>
            </h2>
            <p class="text-white">{{meta_data.description}}</p>
            <component :is='{
                template:meta_data.short_code
            }'></component>
        </div>
    </section>
</template>
<script>
    export default {
        props:["meta_data"]

    }
</script>
<style lang="scss">
    .cta-blue-form{
        #gform_wrapper_1{
            @apply w-full lg:w-fit;
            form#gform_1{
                @apply flex flex-col lg:flex-row gap-[10px] items-center;
                .gform_body.gform-body{
                    @apply pb-2 w-full;
                }
                .gform_footer.top_label{
                    @apply m-0 p-0 w-full lg:w-fit;
                    input:first-child{
                        @apply w-full lg:w-fit py-2 px-5 inline-flex items-center justify-center rounded-lg text-base lg:text-lg font-semibold transition-colors shadow-lg box-border bg-accent text-white hover:bg-red;
                    }
                }
            }
        }
    }
</style>