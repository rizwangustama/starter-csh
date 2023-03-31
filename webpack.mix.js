const mix = require('laravel-mix');
require("laravel-mix-svg-vue");
require("laravel-mix-bundle-analyzer");
const path = require("path");

const config = require("./webpack.config"); 
mix.setPublicPath('./');
mix.webpackConfig(config);

mix.browserSync("csh.test");
mix
  .sass('resources/sass/app.scss', 'dist/css')
  .options({
    processCssUrls: false,
    postCss: [
        require("postcss-import"),
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("autoprefixer"),
    ],
  });

mix.js("resources/js/app.js", "dist/js")
    .vue({ version: 3,
      options:{
        compilerOptions:{
          isCustomElement:(tag)=>['App'].includes(tag)
        }
      }
    })
    .svgVue({
        svgPath: 'resources/images/svg',
        extract: false,
        svgoSettings: [
            { removeTitle: true },
            { removeViewBox: false },
            { removeDimensions: true }
        ]
    }).version();

mix.sourceMaps().version();
mix.disableSuccessNotifications();

if (!mix.inProduction()) {
    mix.bundleAnalyzer();
}

mix.webpackConfig({
  stats: {
      children: true,
  },
});

