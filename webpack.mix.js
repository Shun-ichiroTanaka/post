let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setResourceRoot('');
mix.js('resources/js/app.js', 'public/js')
mix.sass('resources/sass/app.scss', 'public/css')
mix.options({
        autoprefixer: {
            options: {
                // IE11対応のベンダープレフィックスを出力
                grid: true,
                browsers: ['last 6 versions']
            }
        }
    })
mix.autoload({
    "jquery": ['$', 'window.jQuery'],
    "vue": ['Vue', 'window.Vue']
})
// develop環境の時にソースマップを表示するための設定を書いている。
if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'source-map'
    })
    .sourceMaps()
}
mix.browserSync('http://127.0.0.1:8000/');
