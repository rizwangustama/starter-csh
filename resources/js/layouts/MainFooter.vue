<template>
    <footer class="bottom-0" :class="customstyle">
        <div class="container mx-auto pt-[50px] pb-[35px]">
            <div class="wrapper">
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
                </div>
                <div class="footer-desc flex gap-2 item-center mx-auto">
                    <svg-vue
                            icon="flag"
                            alt="twitter"
                            aria-label="flag logo"
                            class="icon w-fit"
                            width="100%"
                            height="18px"
                        ></svg-vue>
                    <p class="text-white w-full">{{ $settings.footer_setting.footer_content }}</p>
                </div>
                <div class="footer-info-wrapper">
                    <p class="text-white/50">Media Inquiries: 
                        <template v-if="$settings.footer_setting.footer_media_inquiries">
                            <span
                                v-for="(item, index) in $settings.footer_setting.footer_media_inquiries" :key="index">{{ item.email }}</span>
                        </template>
                    </p>
                    <p class="text-white/50">{{$settings.footer_setting.footer_right_label}}</p>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
    export default{
        props:{
            customstyle :{
                type: String,
                default: 'bg-blue border-t-4 border-t-red'
            }
        }
    }
</script>
<style lang="scss" scoped>
    footer{
        .wrapper{
            @apply flex flex-col gap-[30px];
            .footer-desc{
                @apply items-center lg:items-start;
                p{
                    @apply text-center lg:text-left;
                }
            }
            .social-media-wrapper{
                @apply flex gap-10 justify-center;
            }
            .footer-info-wrapper{
                @apply text-center lg:text-left flex flex-col gap-5 lg:flex-row justify-between pt-[30px] border-t-2 border-t-white/[18%];
                p:first-child{
                    @apply flex flex-col lg:flex-row lg:gap-3;
                }
            }
        }
    }

</style>
