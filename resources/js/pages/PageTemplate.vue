<template>
    <App>
        <transition
            tag="div"
            enter-active-class="duration-200 transition-all"
            leave-active-class="duration-200 transition-all"
            enter-class="opacity-75 transform translate-y-8"
        >
            <section>
                <PageHeader :title="title" :image="image" />
                <div class="relative z-10 bg-white">
                    <div class="container flex mx-auto py-10 sm:py-14 md:py-20 lg:py-28 gap-5">
                        <div class="content-main-wrapper w-full lg:w-3/4 mx-auto">
                            <div class="content-main paragraph" v-html="content"></div>
                        </div>
                    </div>
                </div>
            </section>
        </transition>
    </App>
</template>

<script>
export default {
    props: ["title", "image", "content"],
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
