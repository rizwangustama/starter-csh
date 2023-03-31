window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import { createApp } from 'vue'
window.axios = require("axios");
import LazyImage from "./Components/LazyImage.vue";
import mixins from "./mixins";
import api from './api';
import SvgVue from "svg-vue3";
import { createClient } from "villus";
import {
  ITSHelpers
} from "./utils/ITSUtilities";

import LazyLoadDirective from "./directives/LazyLoadDirective";
import ClickOutside from "./directives/ClickOutside";
import MainHeader from './Layouts/MainHeader.vue'
import MainFooter from './Layouts/MainFooter.vue'
import HomeTemplate from "./Pages/HomeTemplate.vue";
import PostHeader from "./Components/PostHeader.vue";
import RelatedArticle from "./Sections/RelatedArticle.vue";
import PageTemplate from "./Pages/PageTemplate.vue";
import AboutTemplate from "./Pages/AboutTemplate.vue";
import BlogTemplate from "./Archives/BlogTemplate.vue";
import SearchTemplate from "./Archives/SearchTemplate.vue";
import PageNotFound from "./Components/PageNotFound.vue";
import AuthorTemplate from "./Pages/AuthorTemplate.vue";
import PageHeader from "./Components/PageHeader.vue";
import MainHeaderOverlay from './layouts/MainHeaderOverlay.vue'


// Section Imported


// Page Imported
import TemplateOne from './pages/TemplateOne.vue'
import TemplateTwo from './pages/TemplateTwo.vue'

import Custom from "./custom.js";
Custom.init();
const vueSelectors = [
  {"el":"#vue-header","component":MainHeader},
  {"el":"#vue-app","component":""},
  {"el":"#vue-altapp","component":""},
  {"el":"#vue-footer","component":MainFooter}
];
let i=0;
let app=[];
for(const selector of vueSelectors){
  if (document.querySelector(selector.el)) {
    app[i] = createApp({})
    .use(SvgVue)
    .directive("lazyload", LazyLoadDirective)
    .directive("click-outside", ClickOutside);

    const client = createClient({
      url: "/graphql", // your endpoint.
    });
    app[i].config.globalProperties.$images = settings.images;
    app[i].config.globalProperties.$settings = settings;
    app[i].config.globalProperties.$api = api;
    app[i].config.globalProperties.$nonce = settings.nonce;
    app[i].use(client);
    app[i].mixin(mixins);
    app[i].component("main-header", MainHeader);
    app[i].component("main-header-overlay", MainHeaderOverlay);
    app[i].component("main-footer", MainFooter);
    if (selector.el == "#vue-app" || selector.el == "#vue-altapp") {
      app[i].component("template-one", TemplateOne);
      app[i].component("template-two",TemplateTwo);
      app[i].component("home-template", HomeTemplate);
      app[i].component("post-header", PostHeader);
      app[i].component("page-template", PageTemplate);
      app[i].component("about-template", AboutTemplate);
      app[i].component("blog-template", BlogTemplate);
      app[i].component("search-template", SearchTemplate);
      app[i].component("page-not-found", PageNotFound);
      app[i].component("author-template", AuthorTemplate);
      app[i].component("related-article", RelatedArticle);
    }
    app[i].component("page-header", PageHeader)
    app[i].component("LazyImage", LazyImage)
    app[i].mount(selector.el);
    i++;
  }
}