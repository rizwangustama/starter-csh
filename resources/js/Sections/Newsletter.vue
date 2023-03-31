<template>
    <div class="container">
        <div class="newsletter relative overflow-hidden">
            <svg-vue
                class="absolute right-0 top-0 w-[200px] lg:w-[366px]"
                icon="newsletter-1"
                width="366"
                height="420"
            ></svg-vue>
            <svg-vue
                class="absolute bottom-0 left-0 rotate-180 w-[200px] lg:w-[366px]"
                icon="newsletter-1"
                width="366"
                height="420"
            ></svg-vue>
            <div class="wrapper relative z-10">
                <div class="px-7 sm:px-10 lg:px-60px pt-7 sm:pt-10 lg:pt-60px flex flex-col gap-3 sm:gap-5 md:gap-6">
                    <span class="paragraph">Subscribe and newsletter</span>
                    <h2
                        class="text-2xl leading-9 sm:text-3xl lg:text-5xl text-white text-center font-bold sm:leading-10 lg:leading-[57.6px]"
                    >
                        Start a subscription and enjoy the latest news
                        updates from us
                    </h2>
                </div>
                <div v-if="form" class="newsletter-form" v-html="form"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            form: {
                type: String,
                default: null
            },
        },
    }
</script>

<style lang="scss">
.newsletter {
    .gform_confirmation_message {
        @apply text-center py-10 text-white;
    }
    form {
        @apply text-center;
        .gform_body {
            @apply text-left;
        }
    }
    span {
        @apply text-gray-300 text-base font-normal text-center;
    }
    @apply bg-secondary rounded-3xl;
    input {
        @apply border border-neutral text-white bg-primary rounded-[10px] outline-white;
        padding: 16px;
    }
    .gform_wrapper.gravity-theme .ginput_complex span {
        @apply mb-0;
    }
    .gform_wrapper {
        @apply bg-transparent px-7 sm:px-10 lg:px-60px pb-7 sm:pb-10 lg:pb-60px pt-6;
    }
    .gform_wrapper.gravity-theme .gform_fields {
        @apply gap-y-5 md:gap-y-6;
    }
    .gform_wrapper.gravity-theme .gform_footer {
        @apply inline-block relative mt-7;
        &:after{
            content:"";
            background-image: url("data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTE0LjQzMDIgNS45Mjk5OUwyMC41MDAyIDEyTDE0LjQzMDIgMTguMDciIHN0cm9rZT0id2hpdGUiIHN0cm9rZS13aWR0aD0iMS41IiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8cGF0aCBkPSJNMy41IDEySDIwLjMzIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjEuNSIgc3Ryb2tlLW1pdGVybGltaXQ9IjEwIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPC9zdmc+Cg==");
            width:24px;
            height:24px;
            display:block;
            position:absolute;
            right:18px;
            top:50%;
            transform: translateY(-50%);
            z-index:20;
        }
        @apply justify-center mt-10;
        input[type="submit"] {
            @apply relative hover:bg-hover-green cursor-pointer z-10 text-base text-white py-3 px-6 bg-altGreen pr-16 border-none;
        }
    }
    .top_label {
        padding: 0  #{!important};
    }
    .gform_button {
        margin: 0  #{!important};
    }
}
</style>
