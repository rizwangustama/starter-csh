<template>
    <section>
        <div class="header-primary relative">
            <div class="container flex items-center text-blue justify-between mx-auto py-3 text-lg" >
                <div class="space-y-2">
                    <div class="flex items-center space-x-2">
                        <a :href="$settings.site.url" title="back to homepage" class="ico-svg" >
                            <svg-vue
                                icon="logo"
                                alt="logo"
                                aria-label="logo"
                                class="icon"
                                width="272px"
                                height="30px"
                            ></svg-vue>
                        </a>
                    </div>
                </div>
                <nav class="right-navigation" v-if="$settings.primary_menu" >
                    <div class="flex items-center justify-end gap-5 lg:gap-8">
                        <ul class="hidden items-center space-x-4 text-sm tracking-wide md:flex gap-5 lg:gap-8" >
                            <li v-for="item in $settings.primary_menu" :key="item.id" >
                                <a :href="item.url" :title="item.title">{{ item.title }}</a>
                            </li>
                        </ul>
                        <div class="flex items-center justify-end gap-x-2">
                            <button class="hidden lg:inline-flex btn btn-primary">Sign Up</button>
                            <!-- <a v-if="isLogin" href="/my-account" title="account settings" alt="account settings" class="flex items-center gap-x-2">
                                <span class="account text-xs">Hi, {{accountName}}</span>
                                <svg-vue
                                    icon="account"
                                    alt="search button"
                                    aria-label="account"
                                    class="icon"
                                    width="24px"
                                    height="24px"
                                ></svg-vue>
                            </a> -->
                            <!-- <div v-click-outside="closeSearch">
                                <button title="click to search" @click="showSearch()" class="p-0 m-0 flex">
                                    <svg-vue
                                        icon="search"
                                        alt="search button"
                                        class="icon"
                                        width="24px"
                                        height="24px"
                                    ></svg-vue>
                                </button>
                                <TopSearchBar :class="{ activeSearch :  searchBar }" class="show-search" :closeSearchBar="closeSearch"/>
                            </div> -->
                            <button title="open navigation" class="open-navigation md:hidden" v-if="showDropdown" @click="showDropdown = !showDropdown" >
                                <svg-vue
                                    icon="menu-outline"
                                    width="24"
                                    height="24"
                                ></svg-vue>
                            </button>
                            <button title="close navigation" class="close-navigation" v-else @click="showDropdown = !showDropdown">
                                <svg-vue icon="close" width="24" height="24"></svg-vue>
                            </button>
                        </div>
                    </div>
                    <div class="top-bar border-t pt-3 mt-3 hidden">
                        <ul class="items-center justify-end text-sm tracking-wide md:flex gap-x-3 lg:gap-x-5" >
                            <li v-for="item in $settings.topbar_menu" :key="item.id" >
                                <a class="scrollToEl text-sm font-semibold hover:underline" :href="'/#category-feed-'+item.slug">{{ item.name }}</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div :class="{ active: showDropdown }" class="menu-mobile">
            <div class="container py-16" v-if="$settings.primary_menu">
                <ul class="flex flex-col py-14 text-white items-center text-sm tracking-wide md:flex gap-5 lg:gap-8" >
                    <li v-for="item in $settings.primary_menu" :key="item.id">
                        <a :href="item.url" :alt="item.title">{{ item.title }}</a>
                    </li>
                </ul>
                <ul class="sosmed flex justify-center gap-3">
                    <li v-if="$settings.social.facebook">
                        <a :href="$settings.social.facebook" alt="visit facebook url of publiquemoslo">
                            <svg-vue icon="facebook" width="24px" height="24px" ></svg-vue>
                        </a>
                    </li>
                   <li v-if="$settings.social.instagram">
                        <a :href="$settings.social.instagram" alt="visit instagram url of publiquemoslo">
                            <svg-vue icon="instagram" width="24px" height="24px" ></svg-vue>
                        </a>
                    </li>
                    <li v-if="$settings.social.twitter">
                        <a :href="$settings.social.twitter" alt="visit twitter url of publiquemoslo">
                            <svg-vue icon="twitter" width="24px" height="24px" ></svg-vue>
                        </a>
                    </li>
                    <li v-if="$settings.social.linkedin">
                        <a :href="$settings.social.linkedin" alt="visit linkedin url of publiquemoslo">
                            <svg-vue icon="linkedIn" width="24px" height="24px" ></svg-vue>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </section>
</template>

<script>
import TopSearchBar from "../Components/SearchBar";
export default {
    props: {
        isLogin: {
            type: Boolean,
            default: false,
        },
        accountName: {
            type: String,
            default: "",
        }
    },
    components: {
        TopSearchBar,
    },
    data() {
        return {
            showDropdown: true,
            searchBar: false
        };
    },
    methods: {
        showSearch() {
            this.searchBar = !this.searchBar;
        },
        closeSearch() {
            this.searchBar = false;
        }
    },
};
</script>

<style lang="scss" scoped>

/* header#vue-header {
    @apply sticky w-full top-0;
    z-index: 99;
} */
header#vue-header {
    @apply w-full top-0;
    z-index: 99;
}
</style>

<style lang="scss" scoped>
.bounce {
    animation: bounce 1500ms;
    animation-iteration-count: infinite;
}

nav.right-navigation a:not([class*="text-"]) {
    @apply font-medium tracking-wide text-lg;
}
@keyframes bounce {
    0% {
        transform: translateX(0.5rem);
    }

    50% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(0.5rem);
    }
}

.header-primary {
    z-index: 99;
}
.active {
    // display: none;
    right: 100% !important;
    transition: right 0.3s ease-in-out, opacity 0.25s ease-in-out;
}
.menu-mobile {
    @apply fixed top-0 right-0 w-full h-screen bg-navy;
    z-index: 70;
    ul {
        @apply list-none;
        li {
            @apply m-0 p-0;
            a:not([class*="text-"]){
                @apply text-base;
            }
        }
    }
    transition: right 0.3s ease-in-out, opacity 0.25s ease-in-out;

}

.show-search{
    top: -200px;
    transition: top 0.3s ease-in-out, opacity 0.25s ease-in-out;

    // display: none;
}
.activeSearch{
    top: 0;
    transition: top 0.3s ease-in-out, opacity 0.25s ease-in-out;
    // display: block;
}
</style>

<style lang="scss">
    button.open-navigation{
        path{
            stroke: #17247E;
        }
    }

    button.close-navigation{
        path{
            stroke: #1c32c5;
        }
    }
</style>