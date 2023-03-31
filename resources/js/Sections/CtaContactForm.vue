<template v-if="meta_data">
    <section class="cta-contact-us container-2">
        <div class="flex flex-col lg:flex-row justify-center gap-6 lg:gap-[72px] bg-blue pt-9 pb-10 w-full lg:pt-[60px] lg:pb-[70px] px-10">
            <div class='left'>
                <div class="title-wrapper">
                    <h2 class="text-white font-bold pb-[10px]">{{meta_data.title}}</h2>
                    <p class="text-white">{{meta_data.description}}</p>
                </div>
                <div class="social-media-wrapper">
                    <a :href="$settings.social.twitter" v-if="$settings.social.twitter !== ''">
                        <svg-vue
                            icon="social-media/twitter"
                            alt="twitter"
                            aria-label="twitter logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                    <a :href="$settings.social.facebook" v-if="$settings.social.facebook !== ''">
                        <svg-vue
                            icon="social-media/facebook"
                            alt="facebook"
                            aria-label="facebook logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                    <a :href="$settings.social.youtube" v-if="$settings.social.youtube !== ''">
                        <svg-vue
                            icon="social-media/youtube"
                            alt="youtube"
                            aria-label="youtube logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                    <a :href="$settings.social.instagram" v-if="$settings.social.instagram !== ''">
                        <svg-vue
                            icon="social-media/instagram"
                            alt="instagram"
                            aria-label="instagram logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                    <a :href="$settings.social.linkedin" v-if="$settings.social.linkedin !== ''">
                        <svg-vue
                            icon="social-media/linkedin"
                            alt="linkedin"
                            aria-label="linkedin logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                    <a :href="'#'">
                        <svg-vue
                            icon="social-media/email"
                            alt="linkedin"
                            aria-label="email logo"
                            class="icon"
                            width="26px"
                            height="26px"
                        ></svg-vue>
                    </a>
                </div>
            </div>
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
<style lang="scss" scoped>
    .cta-contact-us{
        .left{
            @apply w-full lg:w-1/2 flex flex-col gap-5 lg:justify-between;
            .social-media-wrapper{
                @apply flex justify-between pt-3 lg:pt-0 transform -translate-y-1/2;
            }
        }
        .right{
            @apply w-full lg:w-1/2;
            input{
                @apply w-full;
            }
        }
    }
</style>

<style lang="scss">
.cta-contact-us{
    #gform_wrapper_2{
            @apply w-full lg:w-1/2;
            form#gform_2{
                .gform_body.gform-body{
                    @apply pb-[15px];
                }
                .gform_footer.top_label{
                    @apply m-0 py-0 w-full ;
                    input:first-child{
                        @apply w-full py-2 px-5 inline-flex items-center justify-center rounded-lg text-base lg:text-lg font-semibold transition-colors shadow-lg box-border bg-accent text-white hover:bg-red;
                    }
                }
            }
        }
}
</style>