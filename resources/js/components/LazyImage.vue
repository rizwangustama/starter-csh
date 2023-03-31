<template>
    <figure v-lazyload class="image__wrapper relative">
        <div
            class="image__spinner w-full h-full absolute inline-flex items-center justify-center"
            :class="className"
        >
            <svg
                class="animate-spin h-8 w-8 text-slate-300"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
            >
                <circle
                    class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4"
                ></circle>
                <path
                    class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
                ></path>
            </svg>
        </div>

        <img class="image__item h-full" :class="className" :data-url="src" :alt="alt" />
    </figure>
</template>

<script>
export default {
    name: "LazyImage",
    props: {
        className: {
            type: String,
            default: "",
        },
        src: {
            type: String,
            required: true,
            default: "",
        },
        alt: {
            type: String,
            required: true,
            default: "",
        },
    },
};
</script>

<style scoped>
.image {
    &__wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 0px;

        &.loaded {
            .image {
                &__item {
                    visibility: visible;
                    opacity: 1;
                    border: 0;
                }

                &__spinner {
                    display: none;
                    width: 100%;
                }
            }
        }
    }

    &__item {
        width: 100%;
        border-radius: 0px;
        transition: all 0.7s ease-in-out;
        opacity: 0;
        visibility: hidden;
    }
}
</style>
