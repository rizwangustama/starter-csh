<template>
    <section>
        <transition
            tag="div"
            enter-active-class="duration-200 transition-all"
            leave-active-class="duration-200 transition-all"
            enter-class="opacity-75 transform translate-y-8"
        >
            <section>
                <PageHeader :title="title" :image="image" />
                <div class="relative z-10 bg-white background-content">
                    <div class="container flex mx-auto py-10 sm:py-14 md:py-20 lg:py-28 gap-5">
                        <div class="content-main-wrapper w-full grid grid-cols-1 gap-x-16 lg:gap-x-32 lg:grid-cols-2 mx-auto">
                            <div class="left-side">
                                <h1
                                    class="leading-9 lg:text-[50px] font-semibold mb-6 lg:mb-16 lg:leading-snug"
                                    :class="{'text-2xl xl:text-[54] xl:leading-[55px]':title.length <= 70 }"
                                    v-html="left_title"
                                ></h1>
                                <div class="content-main paragraph" v-html="content"></div>
                            </div>
                            <div class="right-side">
                                <h2
                                    class="leading-9 lg:text-[50px] font-semibold mb-6 lg:mb-16  lg:leading-snug"
                                    :class="{'text-2xl xl:text-[54] xl:leading-[55px]':title.length <= 70 }"
                                    v-html="right_title"
                                ></h2>
                                <div class="grid grid-cols-1 gap-y-5 lg:gap-y-10">
                                    <div class="pillar-item" v-for="(item, index) in content_alt" :key="index">
                                        <div class="w-1/6 mt-1 font-semibold text-[#BFBFBF]">0{{index+1}}</div>
                                        <div class="w-5/6">
                                            <h3 class="text-2xl mb-3">{{item.title}}</h3>
                                            <div v-html="item.content"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </transition>
    </section>
</template>

<script>
export default {
    props: ["title", "left_title", "right_title","content","content_alt","image"],
    data() {
        return {
            loaded: false,
        };
    },
    mounted() {
        this.$nextTick(() => (this.loaded = true));
    },
};
</script>

<style lang="scss" scoped>
    @media screen and (min-width: 1024px) {   
        .background-content {
            background: linear-gradient(to right, #F5F5F5 50% , white 50%);
        }
    }
    .pillar-item {
        @apply flex flex-wrap;
        &:not(:last-child) {
            @apply border-b border-[#BFBFBF] pb-5 lg:pb-10;
        }
    }
</style>