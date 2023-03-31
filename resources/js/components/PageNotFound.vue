<template>
    <div>
        <svg-vue
            icon="logo"
            alt="logo"
            aria-label="Readify logo"
            class="icon max-w-full mx-auto"
            width="486px"
            height="90px"
        ></svg-vue>
        <h3>{{ message }}</h3>
        <p>The page you requested was not found</p>
        <form role="search" method="get" class="justify-center flex items-start mt-10 search-form" action="/">
            <div class="flex items-center gap-x-5">
                <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" id="searchfield" class="search-field border-b py-3 w-56" placeholder="Search …" value="" name="s" ref="searchfield">
                </label>
                <button type="submit" title="submit search" class="btn btn-primary flex items-center search-submit">
                    <span>Submit</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </button>
            </div>
        </form>
    </div>
</template>