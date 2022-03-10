let mix = require('laravel-mix');
require('laravel-mix-zip');
let path = require('path');

mix.setResourceRoot('../');
mix.setPublicPath(path.resolve('./'));

mix.webpackConfig({
    watchOptions: { ignored: [
        path.posix.resolve(__dirname, './node_modules'),
        path.posix.resolve(__dirname, './css'),
        path.posix.resolve(__dirname, './js')
    ] }
});

mix.js('resources/js/app.js', 'js');

mix.postCss("resources/css/app.css", "css");

mix.postCss("resources/css/editor-style.css", "css");

// mix.browserSync({
//     proxy: 'http://tailpress.test',
//     host: 'tailpress.test',
//     open: 'external',
//     port: 8000
// });

if (mix.inProduction()) {
    mix.zip(['css', 'js', 'images', 'parts', 'templates', 'styles', 'includes'], ['functions.php', 'index.php', 'README.md', 'CHANGELOG.md', 'style.css', 'theme.json', 'screenshot.png', 'LICENSE'], 'wp-theme-boilerplate.zip');
    mix.version();
} else {
    Mix.manifest.refresh = _ => void 0
}