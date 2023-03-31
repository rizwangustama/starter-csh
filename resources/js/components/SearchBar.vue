<template>
    <div class="search-bar bg-secondary w-full py-4 sm:py-6 md:py-10">
        <div
            class="container mx-auto h-full flex items-center gap-2 md:gap-8 lg:gap-8"
        >
            <form action="/" class="relative w-full h-14">
                <input
                    type="text"
                    ref="keywords"
                    autofocus
                    name="s"
                    class="bg-primary text-white keyWords placeholder-gray-500 w-full pt-0 pb-0 pr-0 md:pt-4 md:pb-4 md:pr-4 rounded-lg pl-16 h-full border-transparent focus:outline-none"
                    :value="keywords"
                    placeholder="Search..."
                />
                <button
                    type="submit"
                    class="bg-heading rounded-r-lg p-4 search-button absolute right-0 top-0 h-full"
                    title="submit search"
                >
                    <svg-vue icon="search" width="24" height="24"></svg-vue>
                </button>
            </form>
            <button
                @click="closeSearchBar"
                type="button"
                class="hidden md:flex bg-transparent border-none"
                title="close search"
            >
                <svg-vue icon="close" width="24" height="24"></svg-vue>
            </button>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            keywords: "",
        }
    },
    props: ["closeSearchBar"],
};
</script>
<style lang="scss">
.search-bar {
    @apply absolute top-0 left-0 w-full;
    z-index: 9999;
    form {
        input{
            @apply text-sm;
            &::placeholder{
                @apply text-base md:text-lg;
            }
        }
    }
}
</style>
